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
    def CountGameUuid(self
        , uuid
    ) :         
        return self.act.CountGameUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCode(self
        , code
    ) :         
        return self.act.CountGameCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameName(self
        , name
    ) :         
        return self.act.CountGameName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameOrgId(self
        , org_id
    ) :         
        return self.act.CountGameOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAppId(self
        , app_id
    ) :         
        return self.act.CountGameAppId(
        app_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameOrgIdAppId(self
        , org_id
        , app_id
    ) :         
        return self.act.CountGameOrgIdAppId(
        org_id
        , app_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameListFilter(self, filter_obj) :
        return self.act.BrowseGameListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameUuidType(self, set_type, obj) :
        return self.act.SetGameUuid(set_type, obj)
               
    def SetGameUuid(self, obj) :
        return self.act.SetGameUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameCodeType(self, set_type, obj) :
        return self.act.SetGameCode(set_type, obj)
               
    def SetGameCode(self, obj) :
        return self.act.SetGameCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameNameType(self, set_type, obj) :
        return self.act.SetGameName(set_type, obj)
               
    def SetGameName(self, obj) :
        return self.act.SetGameName('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameOrgIdType(self, set_type, obj) :
        return self.act.SetGameOrgId(set_type, obj)
               
    def SetGameOrgId(self, obj) :
        return self.act.SetGameOrgId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAppIdType(self, set_type, obj) :
        return self.act.SetGameAppId(set_type, obj)
               
    def SetGameAppId(self, obj) :
        return self.act.SetGameAppId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameOrgIdAppIdType(self, set_type, obj) :
        return self.act.SetGameOrgIdAppId(set_type, obj)
               
    def SetGameOrgIdAppId(self, obj) :
        return self.act.SetGameOrgIdAppId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameUuid(self
        , uuid
    ) :          
        return self.act.DelGameUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameCode(self
        , code
    ) :          
        return self.act.DelGameCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameName(self
        , name
    ) :          
        return self.act.DelGameName(
        name
        )
#------------------------------------------------------------------------------                    
    def DelGameOrgId(self
        , org_id
    ) :          
        return self.act.DelGameOrgId(
        org_id
        )
#------------------------------------------------------------------------------                    
    def DelGameAppId(self
        , app_id
    ) :          
        return self.act.DelGameAppId(
        app_id
        )
#------------------------------------------------------------------------------                    
    def DelGameOrgIdAppId(self
        , org_id
        , app_id
    ) :          
        return self.act.DelGameOrgIdAppId(
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
    def GetGameListUuid(self
        , uuid
        ) :
            return self.act.GetGameListUuid(
                uuid
            )
        
    def GetGameUuid(self
        , uuid
    ) :
        for item in self.GetGameListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameListUuid(self
        , uuid
    ) :
        return CachedGetGameListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListUuid";

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
            objs = GetGameListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListCode(self
        , code
        ) :
            return self.act.GetGameListCode(
                code
            )
        
    def GetGameCode(self
        , code
    ) :
        for item in self.GetGameListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameListCode(self
        , code
    ) :
        return CachedGetGameListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListCode";

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
            objs = GetGameListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListName(self
        , name
        ) :
            return self.act.GetGameListName(
                name
            )
        
    def GetGameName(self
        , name
    ) :
        for item in self.GetGameListName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameListName(self
        , name
    ) :
        return CachedGetGameListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListName";

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
            objs = GetGameListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListOrgId(self
        , org_id
        ) :
            return self.act.GetGameListOrgId(
                org_id
            )
        
    def GetGameOrgId(self
        , org_id
    ) :
        for item in self.GetGameListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetGameListOrgId(self
        , org_id
    ) :
        return CachedGetGameListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetGameListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListOrgId";

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
            objs = GetGameListOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListAppId(self
        , app_id
        ) :
            return self.act.GetGameListAppId(
                app_id
            )
        
    def GetGameAppId(self
        , app_id
    ) :
        for item in self.GetGameListAppId(
        app_id
        ) :
            return item
        return None
    
    def CachedGetGameListAppId(self
        , app_id
    ) :
        return CachedGetGameListAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , app_id
        )
        
    def CachedGetGameListAppId(self
        , overrideCache
        , cacheHours
        , app_id
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListAppId";

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
            objs = GetGameListAppId(
                app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameListOrgIdAppId(self
        , org_id
        , app_id
        ) :
            return self.act.GetGameListOrgIdAppId(
                org_id
                , app_id
            )
        
    def GetGameOrgIdAppId(self
        , org_id
        , app_id
    ) :
        for item in self.GetGameListOrgIdAppId(
        org_id
        , app_id
        ) :
            return item
        return None
    
    def CachedGetGameListOrgIdAppId(self
        , org_id
        , app_id
    ) :
        return CachedGetGameListOrgIdAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , app_id
        )
        
    def CachedGetGameListOrgIdAppId(self
        , overrideCache
        , cacheHours
        , org_id
        , app_id
    ) :
        pass
        """
        List<Game> objs;

        string method_name = "CachedGetGameListOrgIdAppId";

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
            objs = GetGameListOrgIdAppId(
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
    def CountGameCategoryUuid(self
        , uuid
    ) :         
        return self.act.CountGameCategoryUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryCode(self
        , code
    ) :         
        return self.act.CountGameCategoryCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryName(self
        , name
    ) :         
        return self.act.CountGameCategoryName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryOrgId(self
        , org_id
    ) :         
        return self.act.CountGameCategoryOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryTypeId(self
        , type_id
    ) :         
        return self.act.CountGameCategoryTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryOrgIdTypeId(self
        , org_id
        , type_id
    ) :         
        return self.act.CountGameCategoryOrgIdTypeId(
        org_id
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameCategoryListFilter(self, filter_obj) :
        return self.act.BrowseGameCategoryListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameCategoryUuidType(self, set_type, obj) :
        return self.act.SetGameCategoryUuid(set_type, obj)
               
    def SetGameCategoryUuid(self, obj) :
        return self.act.SetGameCategoryUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameCategoryUuid(self
        , uuid
    ) :          
        return self.act.DelGameCategoryUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameCategoryCodeOrgId(self
        , code
        , org_id
    ) :          
        return self.act.DelGameCategoryCodeOrgId(
        code
        , org_id
        )
#------------------------------------------------------------------------------                    
    def DelGameCategoryCodeOrgIdTypeId(self
        , code
        , org_id
        , type_id
    ) :          
        return self.act.DelGameCategoryCodeOrgIdTypeId(
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
    def GetGameCategoryListUuid(self
        , uuid
        ) :
            return self.act.GetGameCategoryListUuid(
                uuid
            )
        
    def GetGameCategoryUuid(self
        , uuid
    ) :
        for item in self.GetGameCategoryListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListUuid(self
        , uuid
    ) :
        return CachedGetGameCategoryListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameCategoryListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListUuid";

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
            objs = GetGameCategoryListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListCode(self
        , code
        ) :
            return self.act.GetGameCategoryListCode(
                code
            )
        
    def GetGameCategoryCode(self
        , code
    ) :
        for item in self.GetGameCategoryListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListCode(self
        , code
    ) :
        return CachedGetGameCategoryListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameCategoryListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListCode";

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
            objs = GetGameCategoryListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListName(self
        , name
        ) :
            return self.act.GetGameCategoryListName(
                name
            )
        
    def GetGameCategoryName(self
        , name
    ) :
        for item in self.GetGameCategoryListName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListName(self
        , name
    ) :
        return CachedGetGameCategoryListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameCategoryListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListName";

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
            objs = GetGameCategoryListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListOrgId(self
        , org_id
        ) :
            return self.act.GetGameCategoryListOrgId(
                org_id
            )
        
    def GetGameCategoryOrgId(self
        , org_id
    ) :
        for item in self.GetGameCategoryListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListOrgId(self
        , org_id
    ) :
        return CachedGetGameCategoryListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetGameCategoryListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListOrgId";

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
            objs = GetGameCategoryListOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListTypeId(self
        , type_id
        ) :
            return self.act.GetGameCategoryListTypeId(
                type_id
            )
        
    def GetGameCategoryTypeId(self
        , type_id
    ) :
        for item in self.GetGameCategoryListTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListTypeId(self
        , type_id
    ) :
        return CachedGetGameCategoryListTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetGameCategoryListTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListTypeId";

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
            objs = GetGameCategoryListTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryListOrgIdTypeId(self
        , org_id
        , type_id
        ) :
            return self.act.GetGameCategoryListOrgIdTypeId(
                org_id
                , type_id
            )
        
    def GetGameCategoryOrgIdTypeId(self
        , org_id
        , type_id
    ) :
        for item in self.GetGameCategoryListOrgIdTypeId(
        org_id
        , type_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryListOrgIdTypeId(self
        , org_id
        , type_id
    ) :
        return CachedGetGameCategoryListOrgIdTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , type_id
        )
        
    def CachedGetGameCategoryListOrgIdTypeId(self
        , overrideCache
        , cacheHours
        , org_id
        , type_id
    ) :
        pass
        """
        List<GameCategory> objs;

        string method_name = "CachedGetGameCategoryListOrgIdTypeId";

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
            objs = GetGameCategoryListOrgIdTypeId(
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
    def CountGameCategoryTreeUuid(self
        , uuid
    ) :         
        return self.act.CountGameCategoryTreeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryTreeParentId(self
        , parent_id
    ) :         
        return self.act.CountGameCategoryTreeParentId(
        parent_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryTreeCategoryId(self
        , category_id
    ) :         
        return self.act.CountGameCategoryTreeCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.act.CountGameCategoryTreeParentIdCategoryId(
        parent_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameCategoryTreeListFilter(self, filter_obj) :
        return self.act.BrowseGameCategoryTreeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameCategoryTreeUuidType(self, set_type, obj) :
        return self.act.SetGameCategoryTreeUuid(set_type, obj)
               
    def SetGameCategoryTreeUuid(self, obj) :
        return self.act.SetGameCategoryTreeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameCategoryTreeUuid(self
        , uuid
    ) :          
        return self.act.DelGameCategoryTreeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameCategoryTreeParentId(self
        , parent_id
    ) :          
        return self.act.DelGameCategoryTreeParentId(
        parent_id
        )
#------------------------------------------------------------------------------                    
    def DelGameCategoryTreeCategoryId(self
        , category_id
    ) :          
        return self.act.DelGameCategoryTreeCategoryId(
        category_id
        )
#------------------------------------------------------------------------------                    
    def DelGameCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :          
        return self.act.DelGameCategoryTreeParentIdCategoryId(
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
    def GetGameCategoryTreeListUuid(self
        , uuid
        ) :
            return self.act.GetGameCategoryTreeListUuid(
                uuid
            )
        
    def GetGameCategoryTreeUuid(self
        , uuid
    ) :
        for item in self.GetGameCategoryTreeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameCategoryTreeListUuid(self
        , uuid
    ) :
        return CachedGetGameCategoryTreeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameCategoryTreeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameCategoryTree> objs;

        string method_name = "CachedGetGameCategoryTreeListUuid";

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
            objs = GetGameCategoryTreeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryTreeListParentId(self
        , parent_id
        ) :
            return self.act.GetGameCategoryTreeListParentId(
                parent_id
            )
        
    def GetGameCategoryTreeParentId(self
        , parent_id
    ) :
        for item in self.GetGameCategoryTreeListParentId(
        parent_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryTreeListParentId(self
        , parent_id
    ) :
        return CachedGetGameCategoryTreeListParentId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
        )
        
    def CachedGetGameCategoryTreeListParentId(self
        , overrideCache
        , cacheHours
        , parent_id
    ) :
        pass
        """
        List<GameCategoryTree> objs;

        string method_name = "CachedGetGameCategoryTreeListParentId";

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
            objs = GetGameCategoryTreeListParentId(
                parent_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryTreeListCategoryId(self
        , category_id
        ) :
            return self.act.GetGameCategoryTreeListCategoryId(
                category_id
            )
        
    def GetGameCategoryTreeCategoryId(self
        , category_id
    ) :
        for item in self.GetGameCategoryTreeListCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryTreeListCategoryId(self
        , category_id
    ) :
        return CachedGetGameCategoryTreeListCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetGameCategoryTreeListCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<GameCategoryTree> objs;

        string method_name = "CachedGetGameCategoryTreeListCategoryId";

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
            objs = GetGameCategoryTreeListCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryTreeListParentIdCategoryId(self
        , parent_id
        , category_id
        ) :
            return self.act.GetGameCategoryTreeListParentIdCategoryId(
                parent_id
                , category_id
            )
        
    def GetGameCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :
        for item in self.GetGameCategoryTreeListParentIdCategoryId(
        parent_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryTreeListParentIdCategoryId(self
        , parent_id
        , category_id
    ) :
        return CachedGetGameCategoryTreeListParentIdCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
            , category_id
        )
        
    def CachedGetGameCategoryTreeListParentIdCategoryId(self
        , overrideCache
        , cacheHours
        , parent_id
        , category_id
    ) :
        pass
        """
        List<GameCategoryTree> objs;

        string method_name = "CachedGetGameCategoryTreeListParentIdCategoryId";

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
            objs = GetGameCategoryTreeListParentIdCategoryId(
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
    def CountGameCategoryAssocUuid(self
        , uuid
    ) :         
        return self.act.CountGameCategoryAssocUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryAssocGameId(self
        , game_id
    ) :         
        return self.act.CountGameCategoryAssocGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryAssocCategoryId(self
        , category_id
    ) :         
        return self.act.CountGameCategoryAssocCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameCategoryAssocGameIdCategoryId(self
        , game_id
        , category_id
    ) :         
        return self.act.CountGameCategoryAssocGameIdCategoryId(
        game_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameCategoryAssocListFilter(self, filter_obj) :
        return self.act.BrowseGameCategoryAssocListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameCategoryAssocUuidType(self, set_type, obj) :
        return self.act.SetGameCategoryAssocUuid(set_type, obj)
               
    def SetGameCategoryAssocUuid(self, obj) :
        return self.act.SetGameCategoryAssocUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameCategoryAssocUuid(self
        , uuid
    ) :          
        return self.act.DelGameCategoryAssocUuid(
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
    def GetGameCategoryAssocListUuid(self
        , uuid
        ) :
            return self.act.GetGameCategoryAssocListUuid(
                uuid
            )
        
    def GetGameCategoryAssocUuid(self
        , uuid
    ) :
        for item in self.GetGameCategoryAssocListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameCategoryAssocListUuid(self
        , uuid
    ) :
        return CachedGetGameCategoryAssocListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameCategoryAssocListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameCategoryAssoc> objs;

        string method_name = "CachedGetGameCategoryAssocListUuid";

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
            objs = GetGameCategoryAssocListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryAssocListGameId(self
        , game_id
        ) :
            return self.act.GetGameCategoryAssocListGameId(
                game_id
            )
        
    def GetGameCategoryAssocGameId(self
        , game_id
    ) :
        for item in self.GetGameCategoryAssocListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryAssocListGameId(self
        , game_id
    ) :
        return CachedGetGameCategoryAssocListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameCategoryAssocListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameCategoryAssoc> objs;

        string method_name = "CachedGetGameCategoryAssocListGameId";

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
            objs = GetGameCategoryAssocListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryAssocListCategoryId(self
        , category_id
        ) :
            return self.act.GetGameCategoryAssocListCategoryId(
                category_id
            )
        
    def GetGameCategoryAssocCategoryId(self
        , category_id
    ) :
        for item in self.GetGameCategoryAssocListCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryAssocListCategoryId(self
        , category_id
    ) :
        return CachedGetGameCategoryAssocListCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetGameCategoryAssocListCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<GameCategoryAssoc> objs;

        string method_name = "CachedGetGameCategoryAssocListCategoryId";

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
            objs = GetGameCategoryAssocListCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameCategoryAssocListGameIdCategoryId(self
        , game_id
        , category_id
        ) :
            return self.act.GetGameCategoryAssocListGameIdCategoryId(
                game_id
                , category_id
            )
        
    def GetGameCategoryAssocGameIdCategoryId(self
        , game_id
        , category_id
    ) :
        for item in self.GetGameCategoryAssocListGameIdCategoryId(
        game_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetGameCategoryAssocListGameIdCategoryId(self
        , game_id
        , category_id
    ) :
        return CachedGetGameCategoryAssocListGameIdCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , category_id
        )
        
    def CachedGetGameCategoryAssocListGameIdCategoryId(self
        , overrideCache
        , cacheHours
        , game_id
        , category_id
    ) :
        pass
        """
        List<GameCategoryAssoc> objs;

        string method_name = "CachedGetGameCategoryAssocListGameIdCategoryId";

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
            objs = GetGameCategoryAssocListGameIdCategoryId(
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
    def CountGameTypeUuid(self
        , uuid
    ) :         
        return self.act.CountGameTypeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameTypeCode(self
        , code
    ) :         
        return self.act.CountGameTypeCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameTypeName(self
        , name
    ) :         
        return self.act.CountGameTypeName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameTypeListFilter(self, filter_obj) :
        return self.act.BrowseGameTypeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameTypeUuidType(self, set_type, obj) :
        return self.act.SetGameTypeUuid(set_type, obj)
               
    def SetGameTypeUuid(self, obj) :
        return self.act.SetGameTypeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameTypeUuid(self
        , uuid
    ) :          
        return self.act.DelGameTypeUuid(
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
    def GetGameTypeListUuid(self
        , uuid
        ) :
            return self.act.GetGameTypeListUuid(
                uuid
            )
        
    def GetGameTypeUuid(self
        , uuid
    ) :
        for item in self.GetGameTypeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameTypeListUuid(self
        , uuid
    ) :
        return CachedGetGameTypeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameTypeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameType> objs;

        string method_name = "CachedGetGameTypeListUuid";

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
            objs = GetGameTypeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameTypeListCode(self
        , code
        ) :
            return self.act.GetGameTypeListCode(
                code
            )
        
    def GetGameTypeCode(self
        , code
    ) :
        for item in self.GetGameTypeListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameTypeListCode(self
        , code
    ) :
        return CachedGetGameTypeListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameTypeListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameType> objs;

        string method_name = "CachedGetGameTypeListCode";

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
            objs = GetGameTypeListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameTypeListName(self
        , name
        ) :
            return self.act.GetGameTypeListName(
                name
            )
        
    def GetGameTypeName(self
        , name
    ) :
        for item in self.GetGameTypeListName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameTypeListName(self
        , name
    ) :
        return CachedGetGameTypeListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameTypeListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameType> objs;

        string method_name = "CachedGetGameTypeListName";

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
            objs = GetGameTypeListName(
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
    def CountProfileGameUuid(self
        , uuid
    ) :         
        return self.act.CountProfileGameUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameGameId(self
        , game_id
    ) :         
        return self.act.CountProfileGameGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileGameProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountProfileGameProfileIdGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileGameListFilter(self, filter_obj) :
        return self.act.BrowseProfileGameListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameUuidType(self, set_type, obj) :
        return self.act.SetProfileGameUuid(set_type, obj)
               
    def SetProfileGameUuid(self, obj) :
        return self.act.SetProfileGameUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileGameUuid(self
        , uuid
    ) :          
        return self.act.DelProfileGameUuid(
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
    def GetProfileGameListUuid(self
        , uuid
        ) :
            return self.act.GetProfileGameListUuid(
                uuid
            )
        
    def GetProfileGameUuid(self
        , uuid
    ) :
        for item in self.GetProfileGameListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileGameListUuid(self
        , uuid
    ) :
        return CachedGetProfileGameListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileGameListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileGame> objs;

        string method_name = "CachedGetProfileGameListUuid";

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
            objs = GetProfileGameListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameListGameId(self
        , game_id
        ) :
            return self.act.GetProfileGameListGameId(
                game_id
            )
        
    def GetProfileGameGameId(self
        , game_id
    ) :
        for item in self.GetProfileGameListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameListGameId(self
        , game_id
    ) :
        return CachedGetProfileGameListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetProfileGameListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<ProfileGame> objs;

        string method_name = "CachedGetProfileGameListGameId";

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
            objs = GetProfileGameListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileGameListProfileId(
                profile_id
            )
        
    def GetProfileGameProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileGameListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileGameListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileGameListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileGame> objs;

        string method_name = "CachedGetProfileGameListProfileId";

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
            objs = GetProfileGameListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameListProfileIdGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetProfileGameListProfileIdGameId(
                profile_id
                , game_id
            )
        
    def GetProfileGameProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetProfileGameListProfileIdGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameListProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetProfileGameListProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetProfileGameListProfileIdGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<ProfileGame> objs;

        string method_name = "CachedGetProfileGameListProfileIdGameId";

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
            objs = GetProfileGameListProfileIdGameId(
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
    def CountGameNetworkUuid(self
        , uuid
    ) :         
        return self.act.CountGameNetworkUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameNetworkCode(self
        , code
    ) :         
        return self.act.CountGameNetworkCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameNetworkUuidType(self
        , uuid
        , type
    ) :         
        return self.act.CountGameNetworkUuidType(
        uuid
        , type
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameNetworkListFilter(self, filter_obj) :
        return self.act.BrowseGameNetworkListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameNetworkUuidType(self, set_type, obj) :
        return self.act.SetGameNetworkUuid(set_type, obj)
               
    def SetGameNetworkUuid(self, obj) :
        return self.act.SetGameNetworkUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameNetworkCodeType(self, set_type, obj) :
        return self.act.SetGameNetworkCode(set_type, obj)
               
    def SetGameNetworkCode(self, obj) :
        return self.act.SetGameNetworkCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameNetworkUuid(self
        , uuid
    ) :          
        return self.act.DelGameNetworkUuid(
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
    def GetGameNetworkListUuid(self
        , uuid
        ) :
            return self.act.GetGameNetworkListUuid(
                uuid
            )
        
    def GetGameNetworkUuid(self
        , uuid
    ) :
        for item in self.GetGameNetworkListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameNetworkListUuid(self
        , uuid
    ) :
        return CachedGetGameNetworkListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameNetworkListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameNetwork> objs;

        string method_name = "CachedGetGameNetworkListUuid";

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
            objs = GetGameNetworkListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameNetworkListCode(self
        , code
        ) :
            return self.act.GetGameNetworkListCode(
                code
            )
        
    def GetGameNetworkCode(self
        , code
    ) :
        for item in self.GetGameNetworkListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameNetworkListCode(self
        , code
    ) :
        return CachedGetGameNetworkListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameNetworkListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameNetwork> objs;

        string method_name = "CachedGetGameNetworkListCode";

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
            objs = GetGameNetworkListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameNetworkListUuidType(self
        , uuid
        , type
        ) :
            return self.act.GetGameNetworkListUuidType(
                uuid
                , type
            )
        
    def GetGameNetworkUuidType(self
        , uuid
        , type
    ) :
        for item in self.GetGameNetworkListUuidType(
        uuid
        , type
        ) :
            return item
        return None
    
    def CachedGetGameNetworkListUuidType(self
        , uuid
        , type
    ) :
        return CachedGetGameNetworkListUuidType(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , type
        )
        
    def CachedGetGameNetworkListUuidType(self
        , overrideCache
        , cacheHours
        , uuid
        , type
    ) :
        pass
        """
        List<GameNetwork> objs;

        string method_name = "CachedGetGameNetworkListUuidType";

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
            objs = GetGameNetworkListUuidType(
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
    def CountGameNetworkAuthUuid(self
        , uuid
    ) :         
        return self.act.CountGameNetworkAuthUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameNetworkAuthGameIdGameNetworkId(self
        , game_id
        , game_network_id
    ) :         
        return self.act.CountGameNetworkAuthGameIdGameNetworkId(
        game_id
        , game_network_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameNetworkAuthListFilter(self, filter_obj) :
        return self.act.BrowseGameNetworkAuthListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameNetworkAuthUuidType(self, set_type, obj) :
        return self.act.SetGameNetworkAuthUuid(set_type, obj)
               
    def SetGameNetworkAuthUuid(self, obj) :
        return self.act.SetGameNetworkAuthUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameNetworkAuthGameIdGameNetworkIdType(self, set_type, obj) :
        return self.act.SetGameNetworkAuthGameIdGameNetworkId(set_type, obj)
               
    def SetGameNetworkAuthGameIdGameNetworkId(self, obj) :
        return self.act.SetGameNetworkAuthGameIdGameNetworkId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameNetworkAuthUuid(self
        , uuid
    ) :          
        return self.act.DelGameNetworkAuthUuid(
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
    def GetGameNetworkAuthListUuid(self
        , uuid
        ) :
            return self.act.GetGameNetworkAuthListUuid(
                uuid
            )
        
    def GetGameNetworkAuthUuid(self
        , uuid
    ) :
        for item in self.GetGameNetworkAuthListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameNetworkAuthListUuid(self
        , uuid
    ) :
        return CachedGetGameNetworkAuthListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameNetworkAuthListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameNetworkAuth> objs;

        string method_name = "CachedGetGameNetworkAuthListUuid";

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
            objs = GetGameNetworkAuthListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameNetworkAuthListGameIdGameNetworkId(self
        , game_id
        , game_network_id
        ) :
            return self.act.GetGameNetworkAuthListGameIdGameNetworkId(
                game_id
                , game_network_id
            )
        
    def GetGameNetworkAuthGameIdGameNetworkId(self
        , game_id
        , game_network_id
    ) :
        for item in self.GetGameNetworkAuthListGameIdGameNetworkId(
        game_id
        , game_network_id
        ) :
            return item
        return None
    
    def CachedGetGameNetworkAuthListGameIdGameNetworkId(self
        , game_id
        , game_network_id
    ) :
        return CachedGetGameNetworkAuthListGameIdGameNetworkId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , game_network_id
        )
        
    def CachedGetGameNetworkAuthListGameIdGameNetworkId(self
        , overrideCache
        , cacheHours
        , game_id
        , game_network_id
    ) :
        pass
        """
        List<GameNetworkAuth> objs;

        string method_name = "CachedGetGameNetworkAuthListGameIdGameNetworkId";

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
            objs = GetGameNetworkAuthListGameIdGameNetworkId(
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
    def CountProfileGameNetworkUuid(self
        , uuid
    ) :         
        return self.act.CountProfileGameNetworkUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkGameId(self
        , game_id
    ) :         
        return self.act.CountProfileGameNetworkGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileGameNetworkProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountProfileGameNetworkProfileIdGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountProfileGameNetworkProfileIdGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :         
        return self.act.CountProfileGameNetworkProfileIdGameIdGameNetworkId(
        profile_id
        , game_id
        , game_network_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :         
        return self.act.CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
        network_username
        , game_id
        , game_network_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileGameNetworkListFilter(self, filter_obj) :
        return self.act.BrowseProfileGameNetworkListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameNetworkUuidType(self, set_type, obj) :
        return self.act.SetProfileGameNetworkUuid(set_type, obj)
               
    def SetProfileGameNetworkUuid(self, obj) :
        return self.act.SetProfileGameNetworkUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameNetworkProfileIdGameIdType(self, set_type, obj) :
        return self.act.SetProfileGameNetworkProfileIdGameId(set_type, obj)
               
    def SetProfileGameNetworkProfileIdGameId(self, obj) :
        return self.act.SetProfileGameNetworkProfileIdGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameNetworkProfileIdGameIdGameNetworkIdType(self, set_type, obj) :
        return self.act.SetProfileGameNetworkProfileIdGameIdGameNetworkId(set_type, obj)
               
    def SetProfileGameNetworkProfileIdGameIdGameNetworkId(self, obj) :
        return self.act.SetProfileGameNetworkProfileIdGameIdGameNetworkId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameNetworkNetworkUsernameGameIdGameNetworkIdType(self, set_type, obj) :
        return self.act.SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(set_type, obj)
               
    def SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(self, obj) :
        return self.act.SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileGameNetworkUuid(self
        , uuid
    ) :          
        return self.act.DelProfileGameNetworkUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameNetworkProfileIdGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelProfileGameNetworkProfileIdGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameNetworkProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :          
        return self.act.DelProfileGameNetworkProfileIdGameIdGameNetworkId(
        profile_id
        , game_id
        , game_network_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :          
        return self.act.DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
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
    def GetProfileGameNetworkListUuid(self
        , uuid
        ) :
            return self.act.GetProfileGameNetworkListUuid(
                uuid
            )
        
    def GetProfileGameNetworkUuid(self
        , uuid
    ) :
        for item in self.GetProfileGameNetworkListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListUuid(self
        , uuid
    ) :
        return CachedGetProfileGameNetworkListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileGameNetworkListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListUuid";

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
            objs = GetProfileGameNetworkListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListGameId(self
        , game_id
        ) :
            return self.act.GetProfileGameNetworkListGameId(
                game_id
            )
        
    def GetProfileGameNetworkGameId(self
        , game_id
    ) :
        for item in self.GetProfileGameNetworkListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListGameId(self
        , game_id
    ) :
        return CachedGetProfileGameNetworkListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetProfileGameNetworkListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListGameId";

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
            objs = GetProfileGameNetworkListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileGameNetworkListProfileId(
                profile_id
            )
        
    def GetProfileGameNetworkProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileGameNetworkListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileGameNetworkListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileGameNetworkListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListProfileId";

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
            objs = GetProfileGameNetworkListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListProfileIdGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetProfileGameNetworkListProfileIdGameId(
                profile_id
                , game_id
            )
        
    def GetProfileGameNetworkProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetProfileGameNetworkListProfileIdGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetProfileGameNetworkListProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetProfileGameNetworkListProfileIdGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListProfileIdGameId";

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
            objs = GetProfileGameNetworkListProfileIdGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
        ) :
            return self.act.GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
                profile_id
                , game_id
                , game_network_id
            )
        
    def GetProfileGameNetworkProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :
        for item in self.GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
        profile_id
        , game_id
        , game_network_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :
        return CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , game_network_id
        )
        
    def CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , game_network_id
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId";

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
            objs = GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
                profile_id
                , game_id
                , game_network_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
        ) :
            return self.act.GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
                network_username
                , game_id
                , game_network_id
            )
        
    def GetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :
        for item in self.GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
        network_username
        , game_id
        , game_network_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :
        return CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
            false
            , self.CACHE_DEFAULT_HOURS
            , network_username
            , game_id
            , game_network_id
        )
        
    def CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(self
        , overrideCache
        , cacheHours
        , network_username
        , game_id
        , game_network_id
    ) :
        pass
        """
        List<ProfileGameNetwork> objs;

        string method_name = "CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId";

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
            objs = GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
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
    def CountProfileGameDataAttributeUuid(self
        , uuid
    ) :         
        return self.act.CountProfileGameDataAttributeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameDataAttributeProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileGameDataAttributeProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameDataAttributeProfileIdGameIdCode(self
        , profile_id
        , game_id
        , code
    ) :         
        return self.act.CountProfileGameDataAttributeProfileIdGameIdCode(
        profile_id
        , game_id
        , code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileGameDataAttributeListFilter(self, filter_obj) :
        return self.act.BrowseProfileGameDataAttributeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameDataAttributeUuidType(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeUuid(set_type, obj)
               
    def SetProfileGameDataAttributeUuid(self, obj) :
        return self.act.SetProfileGameDataAttributeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameDataAttributeProfileIdType(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeProfileId(set_type, obj)
               
    def SetProfileGameDataAttributeProfileId(self, obj) :
        return self.act.SetProfileGameDataAttributeProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameDataAttributeProfileIdGameIdCodeType(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeProfileIdGameIdCode(set_type, obj)
               
    def SetProfileGameDataAttributeProfileIdGameIdCode(self, obj) :
        return self.act.SetProfileGameDataAttributeProfileIdGameIdCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileGameDataAttributeUuid(self
        , uuid
    ) :          
        return self.act.DelProfileGameDataAttributeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameDataAttributeProfileId(self
        , profile_id
    ) :          
        return self.act.DelProfileGameDataAttributeProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def DelProfileGameDataAttributeProfileIdGameIdCode(self
        , profile_id
        , game_id
        , code
    ) :          
        return self.act.DelProfileGameDataAttributeProfileIdGameIdCode(
        profile_id
        , game_id
        , code
        )
#------------------------------------------------------------------------------                    
    def GetProfileGameDataAttributeListUuid(self
        , uuid
        ) :
            return self.act.GetProfileGameDataAttributeListUuid(
                uuid
            )
        
    def GetProfileGameDataAttributeUuid(self
        , uuid
    ) :
        for item in self.GetProfileGameDataAttributeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileGameDataAttributeListUuid(self
        , uuid
    ) :
        return CachedGetProfileGameDataAttributeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileGameDataAttributeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileGameDataAttribute> objs;

        string method_name = "CachedGetProfileGameDataAttributeListUuid";

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
            objs = GetProfileGameDataAttributeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameDataAttributeListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileGameDataAttributeListProfileId(
                profile_id
            )
        
    def GetProfileGameDataAttributeProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileGameDataAttributeListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameDataAttributeListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileGameDataAttributeListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileGameDataAttributeListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileGameDataAttribute> objs;

        string method_name = "CachedGetProfileGameDataAttributeListProfileId";

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
            objs = GetProfileGameDataAttributeListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameDataAttributeListProfileIdGameIdCode(self
        , profile_id
        , game_id
        , code
        ) :
            return self.act.GetProfileGameDataAttributeListProfileIdGameIdCode(
                profile_id
                , game_id
                , code
            )
        
    def GetProfileGameDataAttributeProfileIdGameIdCode(self
        , profile_id
        , game_id
        , code
    ) :
        for item in self.GetProfileGameDataAttributeListProfileIdGameIdCode(
        profile_id
        , game_id
        , code
        ) :
            return item
        return None
    
    def CachedGetProfileGameDataAttributeListProfileIdGameIdCode(self
        , profile_id
        , game_id
        , code
    ) :
        return CachedGetProfileGameDataAttributeListProfileIdGameIdCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , code
        )
        
    def CachedGetProfileGameDataAttributeListProfileIdGameIdCode(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , code
    ) :
        pass
        """
        List<ProfileGameDataAttribute> objs;

        string method_name = "CachedGetProfileGameDataAttributeListProfileIdGameIdCode";

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
            objs = GetProfileGameDataAttributeListProfileIdGameIdCode(
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
    def CountGameSessionUuid(self
        , uuid
    ) :         
        return self.act.CountGameSessionUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameSessionGameId(self
        , game_id
    ) :         
        return self.act.CountGameSessionGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameSessionProfileId(self
        , profile_id
    ) :         
        return self.act.CountGameSessionProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameSessionProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameSessionProfileIdGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameSessionListFilter(self, filter_obj) :
        return self.act.BrowseGameSessionListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameSessionUuidType(self, set_type, obj) :
        return self.act.SetGameSessionUuid(set_type, obj)
               
    def SetGameSessionUuid(self, obj) :
        return self.act.SetGameSessionUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameSessionUuid(self
        , uuid
    ) :          
        return self.act.DelGameSessionUuid(
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
    def GetGameSessionListUuid(self
        , uuid
        ) :
            return self.act.GetGameSessionListUuid(
                uuid
            )
        
    def GetGameSessionUuid(self
        , uuid
    ) :
        for item in self.GetGameSessionListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameSessionListUuid(self
        , uuid
    ) :
        return CachedGetGameSessionListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameSessionListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameSession> objs;

        string method_name = "CachedGetGameSessionListUuid";

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
            objs = GetGameSessionListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameSessionListGameId(self
        , game_id
        ) :
            return self.act.GetGameSessionListGameId(
                game_id
            )
        
    def GetGameSessionGameId(self
        , game_id
    ) :
        for item in self.GetGameSessionListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameSessionListGameId(self
        , game_id
    ) :
        return CachedGetGameSessionListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameSessionListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameSession> objs;

        string method_name = "CachedGetGameSessionListGameId";

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
            objs = GetGameSessionListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameSessionListProfileId(self
        , profile_id
        ) :
            return self.act.GetGameSessionListProfileId(
                profile_id
            )
        
    def GetGameSessionProfileId(self
        , profile_id
    ) :
        for item in self.GetGameSessionListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetGameSessionListProfileId(self
        , profile_id
    ) :
        return CachedGetGameSessionListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetGameSessionListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<GameSession> objs;

        string method_name = "CachedGetGameSessionListProfileId";

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
            objs = GetGameSessionListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameSessionListProfileIdGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameSessionListProfileIdGameId(
                profile_id
                , game_id
            )
        
    def GetGameSessionProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameSessionListProfileIdGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameSessionListProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameSessionListProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameSessionListProfileIdGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameSession> objs;

        string method_name = "CachedGetGameSessionListProfileIdGameId";

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
            objs = GetGameSessionListProfileIdGameId(
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
    def CountGameSessionDataUuid(self
        , uuid
    ) :         
        return self.act.CountGameSessionDataUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameSessionDataListFilter(self, filter_obj) :
        return self.act.BrowseGameSessionDataListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameSessionDataUuidType(self, set_type, obj) :
        return self.act.SetGameSessionDataUuid(set_type, obj)
               
    def SetGameSessionDataUuid(self, obj) :
        return self.act.SetGameSessionDataUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameSessionDataUuid(self
        , uuid
    ) :          
        return self.act.DelGameSessionDataUuid(
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
    def GetGameSessionDataListUuid(self
        , uuid
        ) :
            return self.act.GetGameSessionDataListUuid(
                uuid
            )
        
    def GetGameSessionDataUuid(self
        , uuid
    ) :
        for item in self.GetGameSessionDataListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameSessionDataListUuid(self
        , uuid
    ) :
        return CachedGetGameSessionDataListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameSessionDataListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameSessionData> objs;

        string method_name = "CachedGetGameSessionDataListUuid";

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
            objs = GetGameSessionDataListUuid(
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
    def CountGameContentUuid(self
        , uuid
    ) :         
        return self.act.CountGameContentUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameContentGameId(self
        , game_id
    ) :         
        return self.act.CountGameContentGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameContentGameIdPath(self
        , game_id
        , path
    ) :         
        return self.act.CountGameContentGameIdPath(
        game_id
        , path
        )
        
#------------------------------------------------------------------------------                    
    def CountGameContentGameIdPathVersion(self
        , game_id
        , path
        , version
    ) :         
        return self.act.CountGameContentGameIdPathVersion(
        game_id
        , path
        , version
        )
        
#------------------------------------------------------------------------------                    
    def CountGameContentGameIdPathVersionPlatformIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :         
        return self.act.CountGameContentGameIdPathVersionPlatformIncrement(
        game_id
        , path
        , version
        , platform
        , increment
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameContentListFilter(self, filter_obj) :
        return self.act.BrowseGameContentListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameContentUuidType(self, set_type, obj) :
        return self.act.SetGameContentUuid(set_type, obj)
               
    def SetGameContentUuid(self, obj) :
        return self.act.SetGameContentUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentGameIdType(self, set_type, obj) :
        return self.act.SetGameContentGameId(set_type, obj)
               
    def SetGameContentGameId(self, obj) :
        return self.act.SetGameContentGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentGameIdPathType(self, set_type, obj) :
        return self.act.SetGameContentGameIdPath(set_type, obj)
               
    def SetGameContentGameIdPath(self, obj) :
        return self.act.SetGameContentGameIdPath('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentGameIdPathVersionType(self, set_type, obj) :
        return self.act.SetGameContentGameIdPathVersion(set_type, obj)
               
    def SetGameContentGameIdPathVersion(self, obj) :
        return self.act.SetGameContentGameIdPathVersion('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentGameIdPathVersionPlatformIncrementType(self, set_type, obj) :
        return self.act.SetGameContentGameIdPathVersionPlatformIncrement(set_type, obj)
               
    def SetGameContentGameIdPathVersionPlatformIncrement(self, obj) :
        return self.act.SetGameContentGameIdPathVersionPlatformIncrement('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameContentUuid(self
        , uuid
    ) :          
        return self.act.DelGameContentUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameContentGameId(self
        , game_id
    ) :          
        return self.act.DelGameContentGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameContentGameIdPath(self
        , game_id
        , path
    ) :          
        return self.act.DelGameContentGameIdPath(
        game_id
        , path
        )
#------------------------------------------------------------------------------                    
    def DelGameContentGameIdPathVersion(self
        , game_id
        , path
        , version
    ) :          
        return self.act.DelGameContentGameIdPathVersion(
        game_id
        , path
        , version
        )
#------------------------------------------------------------------------------                    
    def DelGameContentGameIdPathVersionPlatformIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :          
        return self.act.DelGameContentGameIdPathVersionPlatformIncrement(
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
    def GetGameContentListUuid(self
        , uuid
        ) :
            return self.act.GetGameContentListUuid(
                uuid
            )
        
    def GetGameContentUuid(self
        , uuid
    ) :
        for item in self.GetGameContentListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameContentListUuid(self
        , uuid
    ) :
        return CachedGetGameContentListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameContentListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameContent> objs;

        string method_name = "CachedGetGameContentListUuid";

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
            objs = GetGameContentListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameContentListGameId(self
        , game_id
        ) :
            return self.act.GetGameContentListGameId(
                game_id
            )
        
    def GetGameContentGameId(self
        , game_id
    ) :
        for item in self.GetGameContentListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameContentListGameId(self
        , game_id
    ) :
        return CachedGetGameContentListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameContentListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameContent> objs;

        string method_name = "CachedGetGameContentListGameId";

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
            objs = GetGameContentListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameContentListGameIdPath(self
        , game_id
        , path
        ) :
            return self.act.GetGameContentListGameIdPath(
                game_id
                , path
            )
        
    def GetGameContentGameIdPath(self
        , game_id
        , path
    ) :
        for item in self.GetGameContentListGameIdPath(
        game_id
        , path
        ) :
            return item
        return None
    
    def CachedGetGameContentListGameIdPath(self
        , game_id
        , path
    ) :
        return CachedGetGameContentListGameIdPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , path
        )
        
    def CachedGetGameContentListGameIdPath(self
        , overrideCache
        , cacheHours
        , game_id
        , path
    ) :
        pass
        """
        List<GameContent> objs;

        string method_name = "CachedGetGameContentListGameIdPath";

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
            objs = GetGameContentListGameIdPath(
                game_id
                , path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameContentListGameIdPathVersion(self
        , game_id
        , path
        , version
        ) :
            return self.act.GetGameContentListGameIdPathVersion(
                game_id
                , path
                , version
            )
        
    def GetGameContentGameIdPathVersion(self
        , game_id
        , path
        , version
    ) :
        for item in self.GetGameContentListGameIdPathVersion(
        game_id
        , path
        , version
        ) :
            return item
        return None
    
    def CachedGetGameContentListGameIdPathVersion(self
        , game_id
        , path
        , version
    ) :
        return CachedGetGameContentListGameIdPathVersion(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , path
            , version
        )
        
    def CachedGetGameContentListGameIdPathVersion(self
        , overrideCache
        , cacheHours
        , game_id
        , path
        , version
    ) :
        pass
        """
        List<GameContent> objs;

        string method_name = "CachedGetGameContentListGameIdPathVersion";

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
            objs = GetGameContentListGameIdPathVersion(
                game_id
                , path
                , version
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameContentListGameIdPathVersionPlatformIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
        ) :
            return self.act.GetGameContentListGameIdPathVersionPlatformIncrement(
                game_id
                , path
                , version
                , platform
                , increment
            )
        
    def GetGameContentGameIdPathVersionPlatformIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :
        for item in self.GetGameContentListGameIdPathVersionPlatformIncrement(
        game_id
        , path
        , version
        , platform
        , increment
        ) :
            return item
        return None
    
    def CachedGetGameContentListGameIdPathVersionPlatformIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :
        return CachedGetGameContentListGameIdPathVersionPlatformIncrement(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , path
            , version
            , platform
            , increment
        )
        
    def CachedGetGameContentListGameIdPathVersionPlatformIncrement(self
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

        string method_name = "CachedGetGameContentListGameIdPathVersionPlatformIncrement";

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
            objs = GetGameContentListGameIdPathVersionPlatformIncrement(
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
    def CountGameProfileContentUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileContentUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentGameIdProfileId(self
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameProfileContentGameIdProfileId(
        game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentGameIdUsername(self
        , game_id
        , username
    ) :         
        return self.act.CountGameProfileContentGameIdUsername(
        game_id
        , username
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentUsername(self
        , username
    ) :         
        return self.act.CountGameProfileContentUsername(
        username
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentGameIdProfileIdPath(self
        , game_id
        , profile_id
        , path
    ) :         
        return self.act.CountGameProfileContentGameIdProfileIdPath(
        game_id
        , profile_id
        , path
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentGameIdProfileIdPathVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :         
        return self.act.CountGameProfileContentGameIdProfileIdPathVersion(
        game_id
        , profile_id
        , path
        , version
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :         
        return self.act.CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        game_id
        , profile_id
        , path
        , version
        , platform
        , increment
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentGameIdUsernamePath(self
        , game_id
        , username
        , path
    ) :         
        return self.act.CountGameProfileContentGameIdUsernamePath(
        game_id
        , username
        , path
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentGameIdUsernamePathVersion(self
        , game_id
        , username
        , path
        , version
    ) :         
        return self.act.CountGameProfileContentGameIdUsernamePathVersion(
        game_id
        , username
        , path
        , version
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :         
        return self.act.CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
        game_id
        , username
        , path
        , version
        , platform
        , increment
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileContentListFilter(self, filter_obj) :
        return self.act.BrowseGameProfileContentListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentUuidType(self, set_type, obj) :
        return self.act.SetGameProfileContentUuid(set_type, obj)
               
    def SetGameProfileContentUuid(self, obj) :
        return self.act.SetGameProfileContentUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentGameIdProfileIdType(self, set_type, obj) :
        return self.act.SetGameProfileContentGameIdProfileId(set_type, obj)
               
    def SetGameProfileContentGameIdProfileId(self, obj) :
        return self.act.SetGameProfileContentGameIdProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentGameIdUsernameType(self, set_type, obj) :
        return self.act.SetGameProfileContentGameIdUsername(set_type, obj)
               
    def SetGameProfileContentGameIdUsername(self, obj) :
        return self.act.SetGameProfileContentGameIdUsername('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentUsernameType(self, set_type, obj) :
        return self.act.SetGameProfileContentUsername(set_type, obj)
               
    def SetGameProfileContentUsername(self, obj) :
        return self.act.SetGameProfileContentUsername('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentGameIdProfileIdPathType(self, set_type, obj) :
        return self.act.SetGameProfileContentGameIdProfileIdPath(set_type, obj)
               
    def SetGameProfileContentGameIdProfileIdPath(self, obj) :
        return self.act.SetGameProfileContentGameIdProfileIdPath('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentGameIdProfileIdPathVersionType(self, set_type, obj) :
        return self.act.SetGameProfileContentGameIdProfileIdPathVersion(set_type, obj)
               
    def SetGameProfileContentGameIdProfileIdPathVersion(self, obj) :
        return self.act.SetGameProfileContentGameIdProfileIdPathVersion('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrementType(self, set_type, obj) :
        return self.act.SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(set_type, obj)
               
    def SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(self, obj) :
        return self.act.SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentGameIdUsernamePathType(self, set_type, obj) :
        return self.act.SetGameProfileContentGameIdUsernamePath(set_type, obj)
               
    def SetGameProfileContentGameIdUsernamePath(self, obj) :
        return self.act.SetGameProfileContentGameIdUsernamePath('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentGameIdUsernamePathVersionType(self, set_type, obj) :
        return self.act.SetGameProfileContentGameIdUsernamePathVersion(set_type, obj)
               
    def SetGameProfileContentGameIdUsernamePathVersion(self, obj) :
        return self.act.SetGameProfileContentGameIdUsernamePathVersion('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentGameIdUsernamePathVersionPlatformIncrementType(self, set_type, obj) :
        return self.act.SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(set_type, obj)
               
    def SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(self, obj) :
        return self.act.SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileContentUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileContentUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentGameIdProfileId(self
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameProfileContentGameIdProfileId(
        game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentGameIdUsername(self
        , game_id
        , username
    ) :          
        return self.act.DelGameProfileContentGameIdUsername(
        game_id
        , username
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentUsername(self
        , username
    ) :          
        return self.act.DelGameProfileContentUsername(
        username
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentGameIdProfileIdPath(self
        , game_id
        , profile_id
        , path
    ) :          
        return self.act.DelGameProfileContentGameIdProfileIdPath(
        game_id
        , profile_id
        , path
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentGameIdProfileIdPathVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :          
        return self.act.DelGameProfileContentGameIdProfileIdPathVersion(
        game_id
        , profile_id
        , path
        , version
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :          
        return self.act.DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
        game_id
        , profile_id
        , path
        , version
        , platform
        , increment
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentGameIdUsernamePath(self
        , game_id
        , username
        , path
    ) :          
        return self.act.DelGameProfileContentGameIdUsernamePath(
        game_id
        , username
        , path
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentGameIdUsernamePathVersion(self
        , game_id
        , username
        , path
        , version
    ) :          
        return self.act.DelGameProfileContentGameIdUsernamePathVersion(
        game_id
        , username
        , path
        , version
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :          
        return self.act.DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
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
    def GetGameProfileContentListUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileContentListUuid(
                uuid
            )
        
    def GetGameProfileContentUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileContentListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListUuid(self
        , uuid
    ) :
        return CachedGetGameProfileContentListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileContentListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListUuid";

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
            objs = GetGameProfileContentListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListGameIdProfileId(self
        , game_id
        , profile_id
        ) :
            return self.act.GetGameProfileContentListGameIdProfileId(
                game_id
                , profile_id
            )
        
    def GetGameProfileContentGameIdProfileId(self
        , game_id
        , profile_id
    ) :
        for item in self.GetGameProfileContentListGameIdProfileId(
        game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListGameIdProfileId(self
        , game_id
        , profile_id
    ) :
        return CachedGetGameProfileContentListGameIdProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
        )
        
    def CachedGetGameProfileContentListGameIdProfileId(self
        , overrideCache
        , cacheHours
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListGameIdProfileId";

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
            objs = GetGameProfileContentListGameIdProfileId(
                game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListGameIdUsername(self
        , game_id
        , username
        ) :
            return self.act.GetGameProfileContentListGameIdUsername(
                game_id
                , username
            )
        
    def GetGameProfileContentGameIdUsername(self
        , game_id
        , username
    ) :
        for item in self.GetGameProfileContentListGameIdUsername(
        game_id
        , username
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListGameIdUsername(self
        , game_id
        , username
    ) :
        return CachedGetGameProfileContentListGameIdUsername(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , username
        )
        
    def CachedGetGameProfileContentListGameIdUsername(self
        , overrideCache
        , cacheHours
        , game_id
        , username
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListGameIdUsername";

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
            objs = GetGameProfileContentListGameIdUsername(
                game_id
                , username
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListUsername(self
        , username
        ) :
            return self.act.GetGameProfileContentListUsername(
                username
            )
        
    def GetGameProfileContentUsername(self
        , username
    ) :
        for item in self.GetGameProfileContentListUsername(
        username
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListUsername(self
        , username
    ) :
        return CachedGetGameProfileContentListUsername(
            false
            , self.CACHE_DEFAULT_HOURS
            , username
        )
        
    def CachedGetGameProfileContentListUsername(self
        , overrideCache
        , cacheHours
        , username
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListUsername";

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
            objs = GetGameProfileContentListUsername(
                username
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListGameIdProfileIdPath(self
        , game_id
        , profile_id
        , path
        ) :
            return self.act.GetGameProfileContentListGameIdProfileIdPath(
                game_id
                , profile_id
                , path
            )
        
    def GetGameProfileContentGameIdProfileIdPath(self
        , game_id
        , profile_id
        , path
    ) :
        for item in self.GetGameProfileContentListGameIdProfileIdPath(
        game_id
        , profile_id
        , path
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListGameIdProfileIdPath(self
        , game_id
        , profile_id
        , path
    ) :
        return CachedGetGameProfileContentListGameIdProfileIdPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
            , path
        )
        
    def CachedGetGameProfileContentListGameIdProfileIdPath(self
        , overrideCache
        , cacheHours
        , game_id
        , profile_id
        , path
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListGameIdProfileIdPath";

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
            objs = GetGameProfileContentListGameIdProfileIdPath(
                game_id
                , profile_id
                , path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListGameIdProfileIdPathVersion(self
        , game_id
        , profile_id
        , path
        , version
        ) :
            return self.act.GetGameProfileContentListGameIdProfileIdPathVersion(
                game_id
                , profile_id
                , path
                , version
            )
        
    def GetGameProfileContentGameIdProfileIdPathVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :
        for item in self.GetGameProfileContentListGameIdProfileIdPathVersion(
        game_id
        , profile_id
        , path
        , version
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListGameIdProfileIdPathVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :
        return CachedGetGameProfileContentListGameIdProfileIdPathVersion(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
            , path
            , version
        )
        
    def CachedGetGameProfileContentListGameIdProfileIdPathVersion(self
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

        string method_name = "CachedGetGameProfileContentListGameIdProfileIdPathVersion";

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
            objs = GetGameProfileContentListGameIdProfileIdPathVersion(
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
    def GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
        ) :
            return self.act.GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            )
        
    def GetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :
        for item in self.GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
        game_id
        , profile_id
        , path
        , version
        , platform
        , increment
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :
        return CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , profile_id
            , path
            , version
            , platform
            , increment
        )
        
    def CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(self
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

        string method_name = "CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement";

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
            objs = GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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
    def GetGameProfileContentListGameIdUsernamePath(self
        , game_id
        , username
        , path
        ) :
            return self.act.GetGameProfileContentListGameIdUsernamePath(
                game_id
                , username
                , path
            )
        
    def GetGameProfileContentGameIdUsernamePath(self
        , game_id
        , username
        , path
    ) :
        for item in self.GetGameProfileContentListGameIdUsernamePath(
        game_id
        , username
        , path
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListGameIdUsernamePath(self
        , game_id
        , username
        , path
    ) :
        return CachedGetGameProfileContentListGameIdUsernamePath(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , username
            , path
        )
        
    def CachedGetGameProfileContentListGameIdUsernamePath(self
        , overrideCache
        , cacheHours
        , game_id
        , username
        , path
    ) :
        pass
        """
        List<GameProfileContent> objs;

        string method_name = "CachedGetGameProfileContentListGameIdUsernamePath";

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
            objs = GetGameProfileContentListGameIdUsernamePath(
                game_id
                , username
                , path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileContentListGameIdUsernamePathVersion(self
        , game_id
        , username
        , path
        , version
        ) :
            return self.act.GetGameProfileContentListGameIdUsernamePathVersion(
                game_id
                , username
                , path
                , version
            )
        
    def GetGameProfileContentGameIdUsernamePathVersion(self
        , game_id
        , username
        , path
        , version
    ) :
        for item in self.GetGameProfileContentListGameIdUsernamePathVersion(
        game_id
        , username
        , path
        , version
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListGameIdUsernamePathVersion(self
        , game_id
        , username
        , path
        , version
    ) :
        return CachedGetGameProfileContentListGameIdUsernamePathVersion(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , username
            , path
            , version
        )
        
    def CachedGetGameProfileContentListGameIdUsernamePathVersion(self
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

        string method_name = "CachedGetGameProfileContentListGameIdUsernamePathVersion";

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
            objs = GetGameProfileContentListGameIdUsernamePathVersion(
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
    def GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
        ) :
            return self.act.GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
                game_id
                , username
                , path
                , version
                , platform
                , increment
            )
        
    def GetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :
        for item in self.GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
        game_id
        , username
        , path
        , version
        , platform
        , increment
        ) :
            return item
        return None
    
    def CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :
        return CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , username
            , path
            , version
            , platform
            , increment
        )
        
    def CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(self
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

        string method_name = "CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement";

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
            objs = GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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
    def CountGameAppUuid(self
        , uuid
    ) :         
        return self.act.CountGameAppUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAppGameId(self
        , game_id
    ) :         
        return self.act.CountGameAppGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAppAppId(self
        , app_id
    ) :         
        return self.act.CountGameAppAppId(
        app_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAppGameIdAppId(self
        , game_id
        , app_id
    ) :         
        return self.act.CountGameAppGameIdAppId(
        game_id
        , app_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameAppListFilter(self, filter_obj) :
        return self.act.BrowseGameAppListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameAppUuidType(self, set_type, obj) :
        return self.act.SetGameAppUuid(set_type, obj)
               
    def SetGameAppUuid(self, obj) :
        return self.act.SetGameAppUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameAppUuid(self
        , uuid
    ) :          
        return self.act.DelGameAppUuid(
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
    def GetGameAppListUuid(self
        , uuid
        ) :
            return self.act.GetGameAppListUuid(
                uuid
            )
        
    def GetGameAppUuid(self
        , uuid
    ) :
        for item in self.GetGameAppListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameAppListUuid(self
        , uuid
    ) :
        return CachedGetGameAppListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameAppListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameApp> objs;

        string method_name = "CachedGetGameAppListUuid";

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
            objs = GetGameAppListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAppListGameId(self
        , game_id
        ) :
            return self.act.GetGameAppListGameId(
                game_id
            )
        
    def GetGameAppGameId(self
        , game_id
    ) :
        for item in self.GetGameAppListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameAppListGameId(self
        , game_id
    ) :
        return CachedGetGameAppListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameAppListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameApp> objs;

        string method_name = "CachedGetGameAppListGameId";

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
            objs = GetGameAppListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAppListAppId(self
        , app_id
        ) :
            return self.act.GetGameAppListAppId(
                app_id
            )
        
    def GetGameAppAppId(self
        , app_id
    ) :
        for item in self.GetGameAppListAppId(
        app_id
        ) :
            return item
        return None
    
    def CachedGetGameAppListAppId(self
        , app_id
    ) :
        return CachedGetGameAppListAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , app_id
        )
        
    def CachedGetGameAppListAppId(self
        , overrideCache
        , cacheHours
        , app_id
    ) :
        pass
        """
        List<GameApp> objs;

        string method_name = "CachedGetGameAppListAppId";

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
            objs = GetGameAppListAppId(
                app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAppListGameIdAppId(self
        , game_id
        , app_id
        ) :
            return self.act.GetGameAppListGameIdAppId(
                game_id
                , app_id
            )
        
    def GetGameAppGameIdAppId(self
        , game_id
        , app_id
    ) :
        for item in self.GetGameAppListGameIdAppId(
        game_id
        , app_id
        ) :
            return item
        return None
    
    def CachedGetGameAppListGameIdAppId(self
        , game_id
        , app_id
    ) :
        return CachedGetGameAppListGameIdAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
            , app_id
        )
        
    def CachedGetGameAppListGameIdAppId(self
        , overrideCache
        , cacheHours
        , game_id
        , app_id
    ) :
        pass
        """
        List<GameApp> objs;

        string method_name = "CachedGetGameAppListGameIdAppId";

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
            objs = GetGameAppListGameIdAppId(
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
    def CountProfileGameLocationUuid(self
        , uuid
    ) :         
        return self.act.CountProfileGameLocationUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameLocationGameLocationId(self
        , game_location_id
    ) :         
        return self.act.CountProfileGameLocationGameLocationId(
        game_location_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameLocationProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileGameLocationProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileGameLocationProfileIdGameLocationId(self
        , profile_id
        , game_location_id
    ) :         
        return self.act.CountProfileGameLocationProfileIdGameLocationId(
        profile_id
        , game_location_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileGameLocationListFilter(self, filter_obj) :
        return self.act.BrowseProfileGameLocationListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameLocationUuidType(self, set_type, obj) :
        return self.act.SetProfileGameLocationUuid(set_type, obj)
               
    def SetProfileGameLocationUuid(self, obj) :
        return self.act.SetProfileGameLocationUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileGameLocationUuid(self
        , uuid
    ) :          
        return self.act.DelProfileGameLocationUuid(
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
    def GetProfileGameLocationListUuid(self
        , uuid
        ) :
            return self.act.GetProfileGameLocationListUuid(
                uuid
            )
        
    def GetProfileGameLocationUuid(self
        , uuid
    ) :
        for item in self.GetProfileGameLocationListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileGameLocationListUuid(self
        , uuid
    ) :
        return CachedGetProfileGameLocationListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileGameLocationListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileGameLocation> objs;

        string method_name = "CachedGetProfileGameLocationListUuid";

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
            objs = GetProfileGameLocationListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameLocationListGameLocationId(self
        , game_location_id
        ) :
            return self.act.GetProfileGameLocationListGameLocationId(
                game_location_id
            )
        
    def GetProfileGameLocationGameLocationId(self
        , game_location_id
    ) :
        for item in self.GetProfileGameLocationListGameLocationId(
        game_location_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameLocationListGameLocationId(self
        , game_location_id
    ) :
        return CachedGetProfileGameLocationListGameLocationId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_location_id
        )
        
    def CachedGetProfileGameLocationListGameLocationId(self
        , overrideCache
        , cacheHours
        , game_location_id
    ) :
        pass
        """
        List<ProfileGameLocation> objs;

        string method_name = "CachedGetProfileGameLocationListGameLocationId";

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
            objs = GetProfileGameLocationListGameLocationId(
                game_location_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameLocationListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileGameLocationListProfileId(
                profile_id
            )
        
    def GetProfileGameLocationProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileGameLocationListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameLocationListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileGameLocationListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileGameLocationListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileGameLocation> objs;

        string method_name = "CachedGetProfileGameLocationListProfileId";

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
            objs = GetProfileGameLocationListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileGameLocationListProfileIdGameLocationId(self
        , profile_id
        , game_location_id
        ) :
            return self.act.GetProfileGameLocationListProfileIdGameLocationId(
                profile_id
                , game_location_id
            )
        
    def GetProfileGameLocationProfileIdGameLocationId(self
        , profile_id
        , game_location_id
    ) :
        for item in self.GetProfileGameLocationListProfileIdGameLocationId(
        profile_id
        , game_location_id
        ) :
            return item
        return None
    
    def CachedGetProfileGameLocationListProfileIdGameLocationId(self
        , profile_id
        , game_location_id
    ) :
        return CachedGetProfileGameLocationListProfileIdGameLocationId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_location_id
        )
        
    def CachedGetProfileGameLocationListProfileIdGameLocationId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_location_id
    ) :
        pass
        """
        List<ProfileGameLocation> objs;

        string method_name = "CachedGetProfileGameLocationListProfileIdGameLocationId";

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
            objs = GetProfileGameLocationListProfileIdGameLocationId(
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
    def CountGamePhotoUuid(self
        , uuid
    ) :         
        return self.act.CountGamePhotoUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGamePhotoExternalId(self
        , external_id
    ) :         
        return self.act.CountGamePhotoExternalId(
        external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGamePhotoUrl(self
        , url
    ) :         
        return self.act.CountGamePhotoUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountGamePhotoUrlExternalId(self
        , url
        , external_id
    ) :         
        return self.act.CountGamePhotoUrlExternalId(
        url
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGamePhotoUuidExternalId(self
        , uuid
        , external_id
    ) :         
        return self.act.CountGamePhotoUuidExternalId(
        uuid
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGamePhotoListFilter(self, filter_obj) :
        return self.act.BrowseGamePhotoListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGamePhotoUuidType(self, set_type, obj) :
        return self.act.SetGamePhotoUuid(set_type, obj)
               
    def SetGamePhotoUuid(self, obj) :
        return self.act.SetGamePhotoUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGamePhotoExternalIdType(self, set_type, obj) :
        return self.act.SetGamePhotoExternalId(set_type, obj)
               
    def SetGamePhotoExternalId(self, obj) :
        return self.act.SetGamePhotoExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGamePhotoUrlType(self, set_type, obj) :
        return self.act.SetGamePhotoUrl(set_type, obj)
               
    def SetGamePhotoUrl(self, obj) :
        return self.act.SetGamePhotoUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGamePhotoUrlExternalIdType(self, set_type, obj) :
        return self.act.SetGamePhotoUrlExternalId(set_type, obj)
               
    def SetGamePhotoUrlExternalId(self, obj) :
        return self.act.SetGamePhotoUrlExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGamePhotoUuidExternalIdType(self, set_type, obj) :
        return self.act.SetGamePhotoUuidExternalId(set_type, obj)
               
    def SetGamePhotoUuidExternalId(self, obj) :
        return self.act.SetGamePhotoUuidExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGamePhotoUuid(self
        , uuid
    ) :          
        return self.act.DelGamePhotoUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGamePhotoExternalId(self
        , external_id
    ) :          
        return self.act.DelGamePhotoExternalId(
        external_id
        )
#------------------------------------------------------------------------------                    
    def DelGamePhotoUrl(self
        , url
    ) :          
        return self.act.DelGamePhotoUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelGamePhotoUrlExternalId(self
        , url
        , external_id
    ) :          
        return self.act.DelGamePhotoUrlExternalId(
        url
        , external_id
        )
#------------------------------------------------------------------------------                    
    def DelGamePhotoUuidExternalId(self
        , uuid
        , external_id
    ) :          
        return self.act.DelGamePhotoUuidExternalId(
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
    def GetGamePhotoListUuid(self
        , uuid
        ) :
            return self.act.GetGamePhotoListUuid(
                uuid
            )
        
    def GetGamePhotoUuid(self
        , uuid
    ) :
        for item in self.GetGamePhotoListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGamePhotoListUuid(self
        , uuid
    ) :
        return CachedGetGamePhotoListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGamePhotoListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoListUuid";

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
            objs = GetGamePhotoListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGamePhotoListExternalId(self
        , external_id
        ) :
            return self.act.GetGamePhotoListExternalId(
                external_id
            )
        
    def GetGamePhotoExternalId(self
        , external_id
    ) :
        for item in self.GetGamePhotoListExternalId(
        external_id
        ) :
            return item
        return None
    
    def CachedGetGamePhotoListExternalId(self
        , external_id
    ) :
        return CachedGetGamePhotoListExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , external_id
        )
        
    def CachedGetGamePhotoListExternalId(self
        , overrideCache
        , cacheHours
        , external_id
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoListExternalId";

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
            objs = GetGamePhotoListExternalId(
                external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGamePhotoListUrl(self
        , url
        ) :
            return self.act.GetGamePhotoListUrl(
                url
            )
        
    def GetGamePhotoUrl(self
        , url
    ) :
        for item in self.GetGamePhotoListUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetGamePhotoListUrl(self
        , url
    ) :
        return CachedGetGamePhotoListUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetGamePhotoListUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoListUrl";

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
            objs = GetGamePhotoListUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGamePhotoListUrlExternalId(self
        , url
        , external_id
        ) :
            return self.act.GetGamePhotoListUrlExternalId(
                url
                , external_id
            )
        
    def GetGamePhotoUrlExternalId(self
        , url
        , external_id
    ) :
        for item in self.GetGamePhotoListUrlExternalId(
        url
        , external_id
        ) :
            return item
        return None
    
    def CachedGetGamePhotoListUrlExternalId(self
        , url
        , external_id
    ) :
        return CachedGetGamePhotoListUrlExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , external_id
        )
        
    def CachedGetGamePhotoListUrlExternalId(self
        , overrideCache
        , cacheHours
        , url
        , external_id
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoListUrlExternalId";

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
            objs = GetGamePhotoListUrlExternalId(
                url
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGamePhotoListUuidExternalId(self
        , uuid
        , external_id
        ) :
            return self.act.GetGamePhotoListUuidExternalId(
                uuid
                , external_id
            )
        
    def GetGamePhotoUuidExternalId(self
        , uuid
        , external_id
    ) :
        for item in self.GetGamePhotoListUuidExternalId(
        uuid
        , external_id
        ) :
            return item
        return None
    
    def CachedGetGamePhotoListUuidExternalId(self
        , uuid
        , external_id
    ) :
        return CachedGetGamePhotoListUuidExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , external_id
        )
        
    def CachedGetGamePhotoListUuidExternalId(self
        , overrideCache
        , cacheHours
        , uuid
        , external_id
    ) :
        pass
        """
        List<GamePhoto> objs;

        string method_name = "CachedGetGamePhotoListUuidExternalId";

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
            objs = GetGamePhotoListUuidExternalId(
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
    def CountGameVideoUuid(self
        , uuid
    ) :         
        return self.act.CountGameVideoUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameVideoExternalId(self
        , external_id
    ) :         
        return self.act.CountGameVideoExternalId(
        external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameVideoUrl(self
        , url
    ) :         
        return self.act.CountGameVideoUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountGameVideoUrlExternalId(self
        , url
        , external_id
    ) :         
        return self.act.CountGameVideoUrlExternalId(
        url
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameVideoUuidExternalId(self
        , uuid
        , external_id
    ) :         
        return self.act.CountGameVideoUuidExternalId(
        uuid
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameVideoListFilter(self, filter_obj) :
        return self.act.BrowseGameVideoListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameVideoUuidType(self, set_type, obj) :
        return self.act.SetGameVideoUuid(set_type, obj)
               
    def SetGameVideoUuid(self, obj) :
        return self.act.SetGameVideoUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameVideoExternalIdType(self, set_type, obj) :
        return self.act.SetGameVideoExternalId(set_type, obj)
               
    def SetGameVideoExternalId(self, obj) :
        return self.act.SetGameVideoExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameVideoUrlType(self, set_type, obj) :
        return self.act.SetGameVideoUrl(set_type, obj)
               
    def SetGameVideoUrl(self, obj) :
        return self.act.SetGameVideoUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameVideoUrlExternalIdType(self, set_type, obj) :
        return self.act.SetGameVideoUrlExternalId(set_type, obj)
               
    def SetGameVideoUrlExternalId(self, obj) :
        return self.act.SetGameVideoUrlExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameVideoUuidExternalIdType(self, set_type, obj) :
        return self.act.SetGameVideoUuidExternalId(set_type, obj)
               
    def SetGameVideoUuidExternalId(self, obj) :
        return self.act.SetGameVideoUuidExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameVideoUuid(self
        , uuid
    ) :          
        return self.act.DelGameVideoUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameVideoExternalId(self
        , external_id
    ) :          
        return self.act.DelGameVideoExternalId(
        external_id
        )
#------------------------------------------------------------------------------                    
    def DelGameVideoUrl(self
        , url
    ) :          
        return self.act.DelGameVideoUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelGameVideoUrlExternalId(self
        , url
        , external_id
    ) :          
        return self.act.DelGameVideoUrlExternalId(
        url
        , external_id
        )
#------------------------------------------------------------------------------                    
    def DelGameVideoUuidExternalId(self
        , uuid
        , external_id
    ) :          
        return self.act.DelGameVideoUuidExternalId(
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
    def GetGameVideoListUuid(self
        , uuid
        ) :
            return self.act.GetGameVideoListUuid(
                uuid
            )
        
    def GetGameVideoUuid(self
        , uuid
    ) :
        for item in self.GetGameVideoListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameVideoListUuid(self
        , uuid
    ) :
        return CachedGetGameVideoListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameVideoListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoListUuid";

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
            objs = GetGameVideoListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameVideoListExternalId(self
        , external_id
        ) :
            return self.act.GetGameVideoListExternalId(
                external_id
            )
        
    def GetGameVideoExternalId(self
        , external_id
    ) :
        for item in self.GetGameVideoListExternalId(
        external_id
        ) :
            return item
        return None
    
    def CachedGetGameVideoListExternalId(self
        , external_id
    ) :
        return CachedGetGameVideoListExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , external_id
        )
        
    def CachedGetGameVideoListExternalId(self
        , overrideCache
        , cacheHours
        , external_id
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoListExternalId";

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
            objs = GetGameVideoListExternalId(
                external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameVideoListUrl(self
        , url
        ) :
            return self.act.GetGameVideoListUrl(
                url
            )
        
    def GetGameVideoUrl(self
        , url
    ) :
        for item in self.GetGameVideoListUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetGameVideoListUrl(self
        , url
    ) :
        return CachedGetGameVideoListUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetGameVideoListUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoListUrl";

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
            objs = GetGameVideoListUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameVideoListUrlExternalId(self
        , url
        , external_id
        ) :
            return self.act.GetGameVideoListUrlExternalId(
                url
                , external_id
            )
        
    def GetGameVideoUrlExternalId(self
        , url
        , external_id
    ) :
        for item in self.GetGameVideoListUrlExternalId(
        url
        , external_id
        ) :
            return item
        return None
    
    def CachedGetGameVideoListUrlExternalId(self
        , url
        , external_id
    ) :
        return CachedGetGameVideoListUrlExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , external_id
        )
        
    def CachedGetGameVideoListUrlExternalId(self
        , overrideCache
        , cacheHours
        , url
        , external_id
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoListUrlExternalId";

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
            objs = GetGameVideoListUrlExternalId(
                url
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameVideoListUuidExternalId(self
        , uuid
        , external_id
        ) :
            return self.act.GetGameVideoListUuidExternalId(
                uuid
                , external_id
            )
        
    def GetGameVideoUuidExternalId(self
        , uuid
        , external_id
    ) :
        for item in self.GetGameVideoListUuidExternalId(
        uuid
        , external_id
        ) :
            return item
        return None
    
    def CachedGetGameVideoListUuidExternalId(self
        , uuid
        , external_id
    ) :
        return CachedGetGameVideoListUuidExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , external_id
        )
        
    def CachedGetGameVideoListUuidExternalId(self
        , overrideCache
        , cacheHours
        , uuid
        , external_id
    ) :
        pass
        """
        List<GameVideo> objs;

        string method_name = "CachedGetGameVideoListUuidExternalId";

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
            objs = GetGameVideoListUuidExternalId(
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
    def CountGameRpgItemWeaponUuid(self
        , uuid
    ) :         
        return self.act.CountGameRpgItemWeaponUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemWeaponGameId(self
        , game_id
    ) :         
        return self.act.CountGameRpgItemWeaponGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemWeaponUrl(self
        , url
    ) :         
        return self.act.CountGameRpgItemWeaponUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemWeaponUrlGameId(self
        , url
        , game_id
    ) :         
        return self.act.CountGameRpgItemWeaponUrlGameId(
        url
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemWeaponUuidGameId(self
        , uuid
        , game_id
    ) :         
        return self.act.CountGameRpgItemWeaponUuidGameId(
        uuid
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameRpgItemWeaponListFilter(self, filter_obj) :
        return self.act.BrowseGameRpgItemWeaponListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponUuidType(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponUuid(set_type, obj)
               
    def SetGameRpgItemWeaponUuid(self, obj) :
        return self.act.SetGameRpgItemWeaponUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponGameId(set_type, obj)
               
    def SetGameRpgItemWeaponGameId(self, obj) :
        return self.act.SetGameRpgItemWeaponGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponUrlType(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponUrl(set_type, obj)
               
    def SetGameRpgItemWeaponUrl(self, obj) :
        return self.act.SetGameRpgItemWeaponUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponUrlGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponUrlGameId(set_type, obj)
               
    def SetGameRpgItemWeaponUrlGameId(self, obj) :
        return self.act.SetGameRpgItemWeaponUrlGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponUuidGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponUuidGameId(set_type, obj)
               
    def SetGameRpgItemWeaponUuidGameId(self, obj) :
        return self.act.SetGameRpgItemWeaponUuidGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameRpgItemWeaponUuid(self
        , uuid
    ) :          
        return self.act.DelGameRpgItemWeaponUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemWeaponGameId(self
        , game_id
    ) :          
        return self.act.DelGameRpgItemWeaponGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemWeaponUrl(self
        , url
    ) :          
        return self.act.DelGameRpgItemWeaponUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemWeaponUrlGameId(self
        , url
        , game_id
    ) :          
        return self.act.DelGameRpgItemWeaponUrlGameId(
        url
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemWeaponUuidGameId(self
        , uuid
        , game_id
    ) :          
        return self.act.DelGameRpgItemWeaponUuidGameId(
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
    def GetGameRpgItemWeaponListUuid(self
        , uuid
        ) :
            return self.act.GetGameRpgItemWeaponListUuid(
                uuid
            )
        
    def GetGameRpgItemWeaponUuid(self
        , uuid
    ) :
        for item in self.GetGameRpgItemWeaponListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponListUuid(self
        , uuid
    ) :
        return CachedGetGameRpgItemWeaponListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameRpgItemWeaponListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponListUuid";

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
            objs = GetGameRpgItemWeaponListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemWeaponListGameId(self
        , game_id
        ) :
            return self.act.GetGameRpgItemWeaponListGameId(
                game_id
            )
        
    def GetGameRpgItemWeaponGameId(self
        , game_id
    ) :
        for item in self.GetGameRpgItemWeaponListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponListGameId(self
        , game_id
    ) :
        return CachedGetGameRpgItemWeaponListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameRpgItemWeaponListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponListGameId";

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
            objs = GetGameRpgItemWeaponListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemWeaponListUrl(self
        , url
        ) :
            return self.act.GetGameRpgItemWeaponListUrl(
                url
            )
        
    def GetGameRpgItemWeaponUrl(self
        , url
    ) :
        for item in self.GetGameRpgItemWeaponListUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponListUrl(self
        , url
    ) :
        return CachedGetGameRpgItemWeaponListUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetGameRpgItemWeaponListUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponListUrl";

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
            objs = GetGameRpgItemWeaponListUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemWeaponListUrlGameId(self
        , url
        , game_id
        ) :
            return self.act.GetGameRpgItemWeaponListUrlGameId(
                url
                , game_id
            )
        
    def GetGameRpgItemWeaponUrlGameId(self
        , url
        , game_id
    ) :
        for item in self.GetGameRpgItemWeaponListUrlGameId(
        url
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponListUrlGameId(self
        , url
        , game_id
    ) :
        return CachedGetGameRpgItemWeaponListUrlGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , game_id
        )
        
    def CachedGetGameRpgItemWeaponListUrlGameId(self
        , overrideCache
        , cacheHours
        , url
        , game_id
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponListUrlGameId";

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
            objs = GetGameRpgItemWeaponListUrlGameId(
                url
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemWeaponListUuidGameId(self
        , uuid
        , game_id
        ) :
            return self.act.GetGameRpgItemWeaponListUuidGameId(
                uuid
                , game_id
            )
        
    def GetGameRpgItemWeaponUuidGameId(self
        , uuid
        , game_id
    ) :
        for item in self.GetGameRpgItemWeaponListUuidGameId(
        uuid
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemWeaponListUuidGameId(self
        , uuid
        , game_id
    ) :
        return CachedGetGameRpgItemWeaponListUuidGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , game_id
        )
        
    def CachedGetGameRpgItemWeaponListUuidGameId(self
        , overrideCache
        , cacheHours
        , uuid
        , game_id
    ) :
        pass
        """
        List<GameRpgItemWeapon> objs;

        string method_name = "CachedGetGameRpgItemWeaponListUuidGameId";

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
            objs = GetGameRpgItemWeaponListUuidGameId(
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
    def CountGameRpgItemSkillUuid(self
        , uuid
    ) :         
        return self.act.CountGameRpgItemSkillUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemSkillGameId(self
        , game_id
    ) :         
        return self.act.CountGameRpgItemSkillGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemSkillUrl(self
        , url
    ) :         
        return self.act.CountGameRpgItemSkillUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemSkillUrlGameId(self
        , url
        , game_id
    ) :         
        return self.act.CountGameRpgItemSkillUrlGameId(
        url
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameRpgItemSkillUuidGameId(self
        , uuid
        , game_id
    ) :         
        return self.act.CountGameRpgItemSkillUuidGameId(
        uuid
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameRpgItemSkillListFilter(self, filter_obj) :
        return self.act.BrowseGameRpgItemSkillListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillUuidType(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillUuid(set_type, obj)
               
    def SetGameRpgItemSkillUuid(self, obj) :
        return self.act.SetGameRpgItemSkillUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillGameId(set_type, obj)
               
    def SetGameRpgItemSkillGameId(self, obj) :
        return self.act.SetGameRpgItemSkillGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillUrlType(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillUrl(set_type, obj)
               
    def SetGameRpgItemSkillUrl(self, obj) :
        return self.act.SetGameRpgItemSkillUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillUrlGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillUrlGameId(set_type, obj)
               
    def SetGameRpgItemSkillUrlGameId(self, obj) :
        return self.act.SetGameRpgItemSkillUrlGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillUuidGameIdType(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillUuidGameId(set_type, obj)
               
    def SetGameRpgItemSkillUuidGameId(self, obj) :
        return self.act.SetGameRpgItemSkillUuidGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameRpgItemSkillUuid(self
        , uuid
    ) :          
        return self.act.DelGameRpgItemSkillUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemSkillGameId(self
        , game_id
    ) :          
        return self.act.DelGameRpgItemSkillGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemSkillUrl(self
        , url
    ) :          
        return self.act.DelGameRpgItemSkillUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemSkillUrlGameId(self
        , url
        , game_id
    ) :          
        return self.act.DelGameRpgItemSkillUrlGameId(
        url
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameRpgItemSkillUuidGameId(self
        , uuid
        , game_id
    ) :          
        return self.act.DelGameRpgItemSkillUuidGameId(
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
    def GetGameRpgItemSkillListUuid(self
        , uuid
        ) :
            return self.act.GetGameRpgItemSkillListUuid(
                uuid
            )
        
    def GetGameRpgItemSkillUuid(self
        , uuid
    ) :
        for item in self.GetGameRpgItemSkillListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillListUuid(self
        , uuid
    ) :
        return CachedGetGameRpgItemSkillListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameRpgItemSkillListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillListUuid";

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
            objs = GetGameRpgItemSkillListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemSkillListGameId(self
        , game_id
        ) :
            return self.act.GetGameRpgItemSkillListGameId(
                game_id
            )
        
    def GetGameRpgItemSkillGameId(self
        , game_id
    ) :
        for item in self.GetGameRpgItemSkillListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillListGameId(self
        , game_id
    ) :
        return CachedGetGameRpgItemSkillListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameRpgItemSkillListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillListGameId";

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
            objs = GetGameRpgItemSkillListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemSkillListUrl(self
        , url
        ) :
            return self.act.GetGameRpgItemSkillListUrl(
                url
            )
        
    def GetGameRpgItemSkillUrl(self
        , url
    ) :
        for item in self.GetGameRpgItemSkillListUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillListUrl(self
        , url
    ) :
        return CachedGetGameRpgItemSkillListUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetGameRpgItemSkillListUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillListUrl";

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
            objs = GetGameRpgItemSkillListUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemSkillListUrlGameId(self
        , url
        , game_id
        ) :
            return self.act.GetGameRpgItemSkillListUrlGameId(
                url
                , game_id
            )
        
    def GetGameRpgItemSkillUrlGameId(self
        , url
        , game_id
    ) :
        for item in self.GetGameRpgItemSkillListUrlGameId(
        url
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillListUrlGameId(self
        , url
        , game_id
    ) :
        return CachedGetGameRpgItemSkillListUrlGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , game_id
        )
        
    def CachedGetGameRpgItemSkillListUrlGameId(self
        , overrideCache
        , cacheHours
        , url
        , game_id
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillListUrlGameId";

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
            objs = GetGameRpgItemSkillListUrlGameId(
                url
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameRpgItemSkillListUuidGameId(self
        , uuid
        , game_id
        ) :
            return self.act.GetGameRpgItemSkillListUuidGameId(
                uuid
                , game_id
            )
        
    def GetGameRpgItemSkillUuidGameId(self
        , uuid
        , game_id
    ) :
        for item in self.GetGameRpgItemSkillListUuidGameId(
        uuid
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameRpgItemSkillListUuidGameId(self
        , uuid
        , game_id
    ) :
        return CachedGetGameRpgItemSkillListUuidGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , game_id
        )
        
    def CachedGetGameRpgItemSkillListUuidGameId(self
        , overrideCache
        , cacheHours
        , uuid
        , game_id
    ) :
        pass
        """
        List<GameRpgItemSkill> objs;

        string method_name = "CachedGetGameRpgItemSkillListUuidGameId";

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
            objs = GetGameRpgItemSkillListUuidGameId(
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
    def CountGameProductUuid(self
        , uuid
    ) :         
        return self.act.CountGameProductUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProductGameId(self
        , game_id
    ) :         
        return self.act.CountGameProductGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProductUrl(self
        , url
    ) :         
        return self.act.CountGameProductUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProductUrlGameId(self
        , url
        , game_id
    ) :         
        return self.act.CountGameProductUrlGameId(
        url
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProductUuidGameId(self
        , uuid
        , game_id
    ) :         
        return self.act.CountGameProductUuidGameId(
        uuid
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProductListFilter(self, filter_obj) :
        return self.act.BrowseGameProductListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProductUuidType(self, set_type, obj) :
        return self.act.SetGameProductUuid(set_type, obj)
               
    def SetGameProductUuid(self, obj) :
        return self.act.SetGameProductUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductGameIdType(self, set_type, obj) :
        return self.act.SetGameProductGameId(set_type, obj)
               
    def SetGameProductGameId(self, obj) :
        return self.act.SetGameProductGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductUrlType(self, set_type, obj) :
        return self.act.SetGameProductUrl(set_type, obj)
               
    def SetGameProductUrl(self, obj) :
        return self.act.SetGameProductUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductUrlGameIdType(self, set_type, obj) :
        return self.act.SetGameProductUrlGameId(set_type, obj)
               
    def SetGameProductUrlGameId(self, obj) :
        return self.act.SetGameProductUrlGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductUuidGameIdType(self, set_type, obj) :
        return self.act.SetGameProductUuidGameId(set_type, obj)
               
    def SetGameProductUuidGameId(self, obj) :
        return self.act.SetGameProductUuidGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProductUuid(self
        , uuid
    ) :          
        return self.act.DelGameProductUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProductGameId(self
        , game_id
    ) :          
        return self.act.DelGameProductGameId(
        game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProductUrl(self
        , url
    ) :          
        return self.act.DelGameProductUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelGameProductUrlGameId(self
        , url
        , game_id
    ) :          
        return self.act.DelGameProductUrlGameId(
        url
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProductUuidGameId(self
        , uuid
        , game_id
    ) :          
        return self.act.DelGameProductUuidGameId(
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
    def GetGameProductListUuid(self
        , uuid
        ) :
            return self.act.GetGameProductListUuid(
                uuid
            )
        
    def GetGameProductUuid(self
        , uuid
    ) :
        for item in self.GetGameProductListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProductListUuid(self
        , uuid
    ) :
        return CachedGetGameProductListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProductListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductListUuid";

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
            objs = GetGameProductListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProductListGameId(self
        , game_id
        ) :
            return self.act.GetGameProductListGameId(
                game_id
            )
        
    def GetGameProductGameId(self
        , game_id
    ) :
        for item in self.GetGameProductListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameProductListGameId(self
        , game_id
    ) :
        return CachedGetGameProductListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameProductListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductListGameId";

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
            objs = GetGameProductListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProductListUrl(self
        , url
        ) :
            return self.act.GetGameProductListUrl(
                url
            )
        
    def GetGameProductUrl(self
        , url
    ) :
        for item in self.GetGameProductListUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetGameProductListUrl(self
        , url
    ) :
        return CachedGetGameProductListUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetGameProductListUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductListUrl";

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
            objs = GetGameProductListUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProductListUrlGameId(self
        , url
        , game_id
        ) :
            return self.act.GetGameProductListUrlGameId(
                url
                , game_id
            )
        
    def GetGameProductUrlGameId(self
        , url
        , game_id
    ) :
        for item in self.GetGameProductListUrlGameId(
        url
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProductListUrlGameId(self
        , url
        , game_id
    ) :
        return CachedGetGameProductListUrlGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , game_id
        )
        
    def CachedGetGameProductListUrlGameId(self
        , overrideCache
        , cacheHours
        , url
        , game_id
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductListUrlGameId";

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
            objs = GetGameProductListUrlGameId(
                url
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProductListUuidGameId(self
        , uuid
        , game_id
        ) :
            return self.act.GetGameProductListUuidGameId(
                uuid
                , game_id
            )
        
    def GetGameProductUuidGameId(self
        , uuid
        , game_id
    ) :
        for item in self.GetGameProductListUuidGameId(
        uuid
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProductListUuidGameId(self
        , uuid
        , game_id
    ) :
        return CachedGetGameProductListUuidGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , game_id
        )
        
    def CachedGetGameProductListUuidGameId(self
        , overrideCache
        , cacheHours
        , uuid
        , game_id
    ) :
        pass
        """
        List<GameProduct> objs;

        string method_name = "CachedGetGameProductListUuidGameId";

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
            objs = GetGameProductListUuidGameId(
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
    def CountGameStatisticLeaderboardUuid(self
        , uuid
    ) :         
        return self.act.CountGameStatisticLeaderboardUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardGameId(self
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardCode(self
        , code
    ) :         
        return self.act.CountGameStatisticLeaderboardCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardCodeGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardCodeGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameStatisticLeaderboardCodeGameIdProfileId(
        code
        , game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.act.CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardProfileIdGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticLeaderboardListFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticLeaderboardListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardUuidType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardUuid(set_type, obj)
               
    def SetGameStatisticLeaderboardUuid(self, obj) :
        return self.act.SetGameStatisticLeaderboardUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardUuidProfileIdGameIdTimestampType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(self, obj) :
        return self.act.SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardCodeType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardCode(set_type, obj)
               
    def SetGameStatisticLeaderboardCode(self, obj) :
        return self.act.SetGameStatisticLeaderboardCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardCodeGameIdType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardCodeGameId(set_type, obj)
               
    def SetGameStatisticLeaderboardCodeGameId(self, obj) :
        return self.act.SetGameStatisticLeaderboardCodeGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardCodeGameIdProfileIdType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardCodeGameIdProfileId(set_type, obj)
               
    def SetGameStatisticLeaderboardCodeGameIdProfileId(self, obj) :
        return self.act.SetGameStatisticLeaderboardCodeGameIdProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardCodeGameIdProfileIdTimestampType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(self, obj) :
        return self.act.SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticLeaderboardUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardCode(self
        , code
    ) :          
        return self.act.DelGameStatisticLeaderboardCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardCodeGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardCodeGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameStatisticLeaderboardCodeGameIdProfileId(
        code
        , game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :          
        return self.act.DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardProfileIdGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardProfileIdGameId(
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
    def GetGameStatisticLeaderboardListUuid(self
        , uuid
        ) :
            return self.act.GetGameStatisticLeaderboardListUuid(
                uuid
            )
        
    def GetGameStatisticLeaderboardUuid(self
        , uuid
    ) :
        for item in self.GetGameStatisticLeaderboardListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListUuid(self
        , uuid
    ) :
        return CachedGetGameStatisticLeaderboardListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameStatisticLeaderboardListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListUuid";

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
            objs = GetGameStatisticLeaderboardListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListGameId(self
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardListGameId(
                game_id
            )
        
    def GetGameStatisticLeaderboardGameId(self
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListGameId(self
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListGameId";

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
            objs = GetGameStatisticLeaderboardListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListCode(self
        , code
        ) :
            return self.act.GetGameStatisticLeaderboardListCode(
                code
            )
        
    def GetGameStatisticLeaderboardCode(self
        , code
    ) :
        for item in self.GetGameStatisticLeaderboardListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListCode(self
        , code
    ) :
        return CachedGetGameStatisticLeaderboardListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameStatisticLeaderboardListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListCode";

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
            objs = GetGameStatisticLeaderboardListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListCodeGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardListCodeGameId(
                code
                , game_id
            )
        
    def GetGameStatisticLeaderboardCodeGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardListCodeGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListCodeGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardListCodeGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardListCodeGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListCodeGameId";

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
            objs = GetGameStatisticLeaderboardListCodeGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
        ) :
            return self.act.GetGameStatisticLeaderboardListCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            )
        
    def GetGameStatisticLeaderboardCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        for item in self.GetGameStatisticLeaderboardListCodeGameIdProfileId(
        code
        , game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return CachedGetGameStatisticLeaderboardListCodeGameIdProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
        )
        
    def CachedGetGameStatisticLeaderboardListCodeGameIdProfileId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListCodeGameIdProfileId";

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
            objs = GetGameStatisticLeaderboardListCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(self
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

        string method_name = "CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp";

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
            objs = GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
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
    def GetGameStatisticLeaderboardListProfileIdGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardListProfileIdGameId(
                profile_id
                , game_id
            )
        
    def GetGameStatisticLeaderboardProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardListProfileIdGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardListProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardListProfileIdGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListProfileIdGameId";

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
            objs = GetGameStatisticLeaderboardListProfileIdGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp";

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
            objs = GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardItem(self
    ) :         
        return self.act.CountGameStatisticLeaderboardItem(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardItemUuid(self
        , uuid
    ) :         
        return self.act.CountGameStatisticLeaderboardItemUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardItemGameId(self
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardItemGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardItemCode(self
        , code
    ) :         
        return self.act.CountGameStatisticLeaderboardItemCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardItemCodeGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardItemCodeGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardItemCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameStatisticLeaderboardItemCodeGameIdProfileId(
        code
        , game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.act.CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardItemProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardItemProfileIdGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticLeaderboardItemListFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticLeaderboardItemListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardItemUuidType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardItemUuid(set_type, obj)
               
    def SetGameStatisticLeaderboardItemUuid(self, obj) :
        return self.act.SetGameStatisticLeaderboardItemUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestampType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(self, obj) :
        return self.act.SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardItemCodeType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardItemCode(set_type, obj)
               
    def SetGameStatisticLeaderboardItemCode(self, obj) :
        return self.act.SetGameStatisticLeaderboardItemCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardItemCodeGameIdType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardItemCodeGameId(set_type, obj)
               
    def SetGameStatisticLeaderboardItemCodeGameId(self, obj) :
        return self.act.SetGameStatisticLeaderboardItemCodeGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardItemCodeGameIdProfileIdType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardItemCodeGameIdProfileId(set_type, obj)
               
    def SetGameStatisticLeaderboardItemCodeGameIdProfileId(self, obj) :
        return self.act.SetGameStatisticLeaderboardItemCodeGameIdProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestampType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(self, obj) :
        return self.act.SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardItemUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticLeaderboardItemUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardItemCode(self
        , code
    ) :          
        return self.act.DelGameStatisticLeaderboardItemCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardItemCodeGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardItemCodeGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardItemCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameStatisticLeaderboardItemCodeGameIdProfileId(
        code
        , game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :          
        return self.act.DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardItemProfileIdGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardItemProfileIdGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardItemList(self
        ) :
            return self.act.GetGameStatisticLeaderboardItemList(
            )
        
    def GetGameStatisticLeaderboardItem(self
    ) :
        for item in self.GetGameStatisticLeaderboardItemList(
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardItemList(self
    ) :
        return CachedGetGameStatisticLeaderboardItemList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetGameStatisticLeaderboardItemList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<GameStatisticLeaderboardItem> objs;

        string method_name = "CachedGetGameStatisticLeaderboardItemList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardItemList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardItemListUuid(self
        , uuid
        ) :
            return self.act.GetGameStatisticLeaderboardItemListUuid(
                uuid
            )
        
    def GetGameStatisticLeaderboardItemUuid(self
        , uuid
    ) :
        for item in self.GetGameStatisticLeaderboardItemListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardItemListUuid(self
        , uuid
    ) :
        return CachedGetGameStatisticLeaderboardItemListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameStatisticLeaderboardItemListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameStatisticLeaderboardItem> objs;

        string method_name = "CachedGetGameStatisticLeaderboardItemListUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardItemListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardItemListGameId(self
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardItemListGameId(
                game_id
            )
        
    def GetGameStatisticLeaderboardItemGameId(self
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardItemListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardItemListGameId(self
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardItemListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardItemListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardItem> objs;

        string method_name = "CachedGetGameStatisticLeaderboardItemListGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardItemListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardItemListCode(self
        , code
        ) :
            return self.act.GetGameStatisticLeaderboardItemListCode(
                code
            )
        
    def GetGameStatisticLeaderboardItemCode(self
        , code
    ) :
        for item in self.GetGameStatisticLeaderboardItemListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardItemListCode(self
        , code
    ) :
        return CachedGetGameStatisticLeaderboardItemListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameStatisticLeaderboardItemListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameStatisticLeaderboardItem> objs;

        string method_name = "CachedGetGameStatisticLeaderboardItemListCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardItemListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardItemListCodeGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardItemListCodeGameId(
                code
                , game_id
            )
        
    def GetGameStatisticLeaderboardItemCodeGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardItemListCodeGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardItemListCodeGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardItemListCodeGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardItemListCodeGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardItem> objs;

        string method_name = "CachedGetGameStatisticLeaderboardItemListCodeGameId";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardItemListCodeGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardItemListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
        ) :
            return self.act.GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            )
        
    def GetGameStatisticLeaderboardItemCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        for item in self.GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
        code
        , game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
        )
        
    def CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardItem> objs;

        string method_name = "CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        pass
        """
        List<GameStatisticLeaderboardItem> objs;

        string method_name = "CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
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
    def GetGameStatisticLeaderboardItemListProfileIdGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardItemListProfileIdGameId(
                profile_id
                , game_id
            )
        
    def GetGameStatisticLeaderboardItemProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardItemListProfileIdGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardItemListProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardItemListProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardItemListProfileIdGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardItem> objs;

        string method_name = "CachedGetGameStatisticLeaderboardItemListProfileIdGameId";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardItemListProfileIdGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardItemProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameStatisticLeaderboardItem> objs;

        string method_name = "CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
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
    def CountGameStatisticLeaderboardRollupUuid(self
        , uuid
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupGameId(self
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupCode(self
        , code
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupCodeGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupCodeGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
        code
        , game_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardRollupProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardRollupProfileIdGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticLeaderboardRollupListFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticLeaderboardRollupListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupUuidType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupUuid(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupUuid(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestampType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupCodeType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupCode(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupCode(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupCodeGameIdType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupCodeGameId(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupCodeGameId(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupCodeGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupCodeGameIdProfileIdType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupCodeGameIdProfileId(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupCodeGameIdProfileId(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupCodeGameIdProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestampType(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(self, obj) :
        return self.act.SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupCode(self
        , code
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupCode(
        code
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupCodeGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupCodeGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
        code
        , game_id
        , profile_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardRollupProfileIdGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardRollupProfileIdGameId(
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
    def GetGameStatisticLeaderboardRollupListUuid(self
        , uuid
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListUuid(
                uuid
            )
        
    def GetGameStatisticLeaderboardRollupUuid(self
        , uuid
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListUuid(self
        , uuid
    ) :
        return CachedGetGameStatisticLeaderboardRollupListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameStatisticLeaderboardRollupListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListUuid";

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
            objs = GetGameStatisticLeaderboardRollupListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListGameId(self
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListGameId(
                game_id
            )
        
    def GetGameStatisticLeaderboardRollupGameId(self
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListGameId(self
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardRollupListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardRollupListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListGameId";

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
            objs = GetGameStatisticLeaderboardRollupListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListCode(self
        , code
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListCode(
                code
            )
        
    def GetGameStatisticLeaderboardRollupCode(self
        , code
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListCode(self
        , code
    ) :
        return CachedGetGameStatisticLeaderboardRollupListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameStatisticLeaderboardRollupListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListCode";

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
            objs = GetGameStatisticLeaderboardRollupListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListCodeGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListCodeGameId(
                code
                , game_id
            )
        
    def GetGameStatisticLeaderboardRollupCodeGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListCodeGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListCodeGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardRollupListCodeGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardRollupListCodeGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListCodeGameId";

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
            objs = GetGameStatisticLeaderboardRollupListCodeGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            )
        
    def GetGameStatisticLeaderboardRollupCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
        code
        , game_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
        )
        
    def CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
        , profile_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId";

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
            objs = GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
        code
        , game_id
        , profile_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
            , profile_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(self
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

        string method_name = "CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp";

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
            objs = GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
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
    def GetGameStatisticLeaderboardRollupListProfileIdGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListProfileIdGameId(
                profile_id
                , game_id
            )
        
    def GetGameStatisticLeaderboardRollupProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListProfileIdGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardRollupListProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardRollupListProfileIdGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListProfileIdGameId";

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
            objs = GetGameStatisticLeaderboardRollupListProfileIdGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardRollupProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameStatisticLeaderboardRollup> objs;

        string method_name = "CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp";

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
            objs = GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
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
    def CountGameLiveQueueUuid(self
        , uuid
    ) :         
        return self.act.CountGameLiveQueueUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLiveQueueProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameLiveQueueProfileIdGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameLiveQueueListFilter(self, filter_obj) :
        return self.act.BrowseGameLiveQueueListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameLiveQueueUuidType(self, set_type, obj) :
        return self.act.SetGameLiveQueueUuid(set_type, obj)
               
    def SetGameLiveQueueUuid(self, obj) :
        return self.act.SetGameLiveQueueUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLiveQueueProfileIdGameIdType(self, set_type, obj) :
        return self.act.SetGameLiveQueueProfileIdGameId(set_type, obj)
               
    def SetGameLiveQueueProfileIdGameId(self, obj) :
        return self.act.SetGameLiveQueueProfileIdGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameLiveQueueUuid(self
        , uuid
    ) :          
        return self.act.DelGameLiveQueueUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameLiveQueueProfileIdGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameLiveQueueProfileIdGameId(
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
    def GetGameLiveQueueListUuid(self
        , uuid
        ) :
            return self.act.GetGameLiveQueueListUuid(
                uuid
            )
        
    def GetGameLiveQueueUuid(self
        , uuid
    ) :
        for item in self.GetGameLiveQueueListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameLiveQueueListUuid(self
        , uuid
    ) :
        return CachedGetGameLiveQueueListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameLiveQueueListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameLiveQueue> objs;

        string method_name = "CachedGetGameLiveQueueListUuid";

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
            objs = GetGameLiveQueueListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLiveQueueListGameId(self
        , game_id
        ) :
            return self.act.GetGameLiveQueueListGameId(
                game_id
            )
        
    def GetGameLiveQueueGameId(self
        , game_id
    ) :
        for item in self.GetGameLiveQueueListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameLiveQueueListGameId(self
        , game_id
    ) :
        return CachedGetGameLiveQueueListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameLiveQueueListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameLiveQueue> objs;

        string method_name = "CachedGetGameLiveQueueListGameId";

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
            objs = GetGameLiveQueueListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLiveQueueListProfileIdGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameLiveQueueListProfileIdGameId(
                profile_id
                , game_id
            )
        
    def GetGameLiveQueueProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameLiveQueueListProfileIdGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLiveQueueListProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameLiveQueueListProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameLiveQueueListProfileIdGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameLiveQueue> objs;

        string method_name = "CachedGetGameLiveQueueListProfileIdGameId";

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
            objs = GetGameLiveQueueListProfileIdGameId(
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
    def CountGameLiveRecentQueueUuid(self
        , uuid
    ) :         
        return self.act.CountGameLiveRecentQueueUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLiveRecentQueueProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameLiveRecentQueueProfileIdGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameLiveRecentQueueListFilter(self, filter_obj) :
        return self.act.BrowseGameLiveRecentQueueListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameLiveRecentQueueUuidType(self, set_type, obj) :
        return self.act.SetGameLiveRecentQueueUuid(set_type, obj)
               
    def SetGameLiveRecentQueueUuid(self, obj) :
        return self.act.SetGameLiveRecentQueueUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLiveRecentQueueProfileIdGameIdType(self, set_type, obj) :
        return self.act.SetGameLiveRecentQueueProfileIdGameId(set_type, obj)
               
    def SetGameLiveRecentQueueProfileIdGameId(self, obj) :
        return self.act.SetGameLiveRecentQueueProfileIdGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameLiveRecentQueueUuid(self
        , uuid
    ) :          
        return self.act.DelGameLiveRecentQueueUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameLiveRecentQueueProfileIdGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameLiveRecentQueueProfileIdGameId(
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
    def GetGameLiveRecentQueueListUuid(self
        , uuid
        ) :
            return self.act.GetGameLiveRecentQueueListUuid(
                uuid
            )
        
    def GetGameLiveRecentQueueUuid(self
        , uuid
    ) :
        for item in self.GetGameLiveRecentQueueListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameLiveRecentQueueListUuid(self
        , uuid
    ) :
        return CachedGetGameLiveRecentQueueListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameLiveRecentQueueListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameLiveRecentQueue> objs;

        string method_name = "CachedGetGameLiveRecentQueueListUuid";

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
            objs = GetGameLiveRecentQueueListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLiveRecentQueueListGameId(self
        , game_id
        ) :
            return self.act.GetGameLiveRecentQueueListGameId(
                game_id
            )
        
    def GetGameLiveRecentQueueGameId(self
        , game_id
    ) :
        for item in self.GetGameLiveRecentQueueListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameLiveRecentQueueListGameId(self
        , game_id
    ) :
        return CachedGetGameLiveRecentQueueListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameLiveRecentQueueListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameLiveRecentQueue> objs;

        string method_name = "CachedGetGameLiveRecentQueueListGameId";

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
            objs = GetGameLiveRecentQueueListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLiveRecentQueueListProfileIdGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameLiveRecentQueueListProfileIdGameId(
                profile_id
                , game_id
            )
        
    def GetGameLiveRecentQueueProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameLiveRecentQueueListProfileIdGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLiveRecentQueueListProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameLiveRecentQueueListProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameLiveRecentQueueListProfileIdGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameLiveRecentQueue> objs;

        string method_name = "CachedGetGameLiveRecentQueueListProfileIdGameId";

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
            objs = GetGameLiveRecentQueueListProfileIdGameId(
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
    def CountGameProfileStatisticUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileStatisticUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticCode(self
        , code
    ) :         
        return self.act.CountGameProfileStatisticCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticGameId(self
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticCodeGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticCodeGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticProfileIdGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticCodeProfileIdGameId(
        code
        , profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileStatisticListFilter(self, filter_obj) :
        return self.act.BrowseGameProfileStatisticListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticUuidType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticUuid(set_type, obj)
               
    def SetGameProfileStatisticUuid(self, obj) :
        return self.act.SetGameProfileStatisticUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticUuidProfileIdGameIdTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticUuidProfileIdGameIdTimestamp(set_type, obj)
               
    def SetGameProfileStatisticUuidProfileIdGameIdTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticUuidProfileIdGameIdTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticProfileIdCodeType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticProfileIdCode(set_type, obj)
               
    def SetGameProfileStatisticProfileIdCode(self, obj) :
        return self.act.SetGameProfileStatisticProfileIdCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticProfileIdCodeTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticProfileIdCodeTimestamp(set_type, obj)
               
    def SetGameProfileStatisticProfileIdCodeTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticProfileIdCodeTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticCodeProfileIdGameIdTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticCodeProfileIdGameIdTimestamp(set_type, obj)
               
    def SetGameProfileStatisticCodeProfileIdGameIdTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticCodeProfileIdGameIdTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticCodeProfileIdGameIdType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticCodeProfileIdGameId(set_type, obj)
               
    def SetGameProfileStatisticCodeProfileIdGameId(self, obj) :
        return self.act.SetGameProfileStatisticCodeProfileIdGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileStatisticUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticCodeGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticCodeGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticProfileIdGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticProfileIdGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticCodeProfileIdGameId(
        code
        , profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileStatisticListUuid(
                uuid
            )
        
    def GetGameProfileStatisticUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileStatisticListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListUuid(self
        , uuid
    ) :
        return CachedGetGameProfileStatisticListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileStatisticListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListUuid";

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
            objs = GetGameProfileStatisticListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListCode(self
        , code
        ) :
            return self.act.GetGameProfileStatisticListCode(
                code
            )
        
    def GetGameProfileStatisticCode(self
        , code
    ) :
        for item in self.GetGameProfileStatisticListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListCode(self
        , code
    ) :
        return CachedGetGameProfileStatisticListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameProfileStatisticListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListCode";

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
            objs = GetGameProfileStatisticListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListGameId(self
        , game_id
        ) :
            return self.act.GetGameProfileStatisticListGameId(
                game_id
            )
        
    def GetGameProfileStatisticGameId(self
        , game_id
    ) :
        for item in self.GetGameProfileStatisticListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListGameId(self
        , game_id
    ) :
        return CachedGetGameProfileStatisticListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameProfileStatisticListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListGameId";

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
            objs = GetGameProfileStatisticListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListCodeGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameProfileStatisticListCodeGameId(
                code
                , game_id
            )
        
    def GetGameProfileStatisticCodeGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameProfileStatisticListCodeGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListCodeGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameProfileStatisticListCodeGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameProfileStatisticListCodeGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListCodeGameId";

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
            objs = GetGameProfileStatisticListCodeGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListProfileIdGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileStatisticListProfileIdGameId(
                profile_id
                , game_id
            )
        
    def GetGameProfileStatisticProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileStatisticListProfileIdGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileStatisticListProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileStatisticListProfileIdGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListProfileIdGameId";

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
            objs = GetGameProfileStatisticListProfileIdGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileStatisticListProfileIdGameIdTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileStatisticProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileStatisticListProfileIdGameIdTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileStatisticListProfileIdGameIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileStatisticListProfileIdGameIdTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListProfileIdGameIdTimestamp";

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
            objs = GetGameProfileStatisticListProfileIdGameIdTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileStatisticListCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            )
        
    def GetGameProfileStatisticCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileStatisticListCodeProfileIdGameId(
        code
        , profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileStatisticListCodeProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileStatisticListCodeProfileIdGameId(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileStatistic> objs;

        string method_name = "CachedGetGameProfileStatisticListCodeProfileIdGameId";

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
            objs = GetGameProfileStatisticListCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileStatisticCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp(self
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

        string method_name = "CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp";

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
            objs = GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
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
    def CountGameStatisticMetaUuid(self
        , uuid
    ) :         
        return self.act.CountGameStatisticMetaUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaCode(self
        , code
    ) :         
        return self.act.CountGameStatisticMetaCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaCodeGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameStatisticMetaCodeGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaName(self
        , name
    ) :         
        return self.act.CountGameStatisticMetaName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaGameId(self
        , game_id
    ) :         
        return self.act.CountGameStatisticMetaGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticMetaListFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticMetaListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticMetaUuidType(self, set_type, obj) :
        return self.act.SetGameStatisticMetaUuid(set_type, obj)
               
    def SetGameStatisticMetaUuid(self, obj) :
        return self.act.SetGameStatisticMetaUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticMetaCodeGameIdType(self, set_type, obj) :
        return self.act.SetGameStatisticMetaCodeGameId(set_type, obj)
               
    def SetGameStatisticMetaCodeGameId(self, obj) :
        return self.act.SetGameStatisticMetaCodeGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticMetaUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticMetaUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticMetaCodeGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameStatisticMetaCodeGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameStatisticMetaListUuid(self
        , uuid
        ) :
            return self.act.GetGameStatisticMetaListUuid(
                uuid
            )
        
    def GetGameStatisticMetaUuid(self
        , uuid
    ) :
        for item in self.GetGameStatisticMetaListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListUuid(self
        , uuid
    ) :
        return CachedGetGameStatisticMetaListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameStatisticMetaListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListUuid";

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
            objs = GetGameStatisticMetaListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticMetaListCode(self
        , code
        ) :
            return self.act.GetGameStatisticMetaListCode(
                code
            )
        
    def GetGameStatisticMetaCode(self
        , code
    ) :
        for item in self.GetGameStatisticMetaListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListCode(self
        , code
    ) :
        return CachedGetGameStatisticMetaListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameStatisticMetaListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListCode";

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
            objs = GetGameStatisticMetaListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticMetaListName(self
        , name
        ) :
            return self.act.GetGameStatisticMetaListName(
                name
            )
        
    def GetGameStatisticMetaName(self
        , name
    ) :
        for item in self.GetGameStatisticMetaListName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListName(self
        , name
    ) :
        return CachedGetGameStatisticMetaListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameStatisticMetaListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListName";

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
            objs = GetGameStatisticMetaListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticMetaListGameId(self
        , game_id
        ) :
            return self.act.GetGameStatisticMetaListGameId(
                game_id
            )
        
    def GetGameStatisticMetaGameId(self
        , game_id
    ) :
        for item in self.GetGameStatisticMetaListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListGameId(self
        , game_id
    ) :
        return CachedGetGameStatisticMetaListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameStatisticMetaListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListGameId";

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
            objs = GetGameStatisticMetaListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticMetaListCodeGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameStatisticMetaListCodeGameId(
                code
                , game_id
            )
        
    def GetGameStatisticMetaCodeGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameStatisticMetaListCodeGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListCodeGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameStatisticMetaListCodeGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameStatisticMetaListCodeGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListCodeGameId";

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
            objs = GetGameStatisticMetaListCodeGameId(
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
    def CountGameProfileStatisticTimestampUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileStatisticTimestampUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticTimestampCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameProfileStatisticTimestampCodeProfileIdGameId(
        code
        , profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileStatisticTimestampListFilter(self, filter_obj) :
        return self.act.BrowseGameProfileStatisticTimestampListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticTimestampUuidType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticTimestampUuid(set_type, obj)
               
    def SetGameProfileStatisticTimestampUuid(self, obj) :
        return self.act.SetGameProfileStatisticTimestampUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticTimestampCodeProfileIdGameIdType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticTimestampCodeProfileIdGameId(set_type, obj)
               
    def SetGameProfileStatisticTimestampCodeProfileIdGameId(self, obj) :
        return self.act.SetGameProfileStatisticTimestampCodeProfileIdGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileStatisticTimestampCodeProfileIdGameIdTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(set_type, obj)
               
    def SetGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(self, obj) :
        return self.act.SetGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticTimestampUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileStatisticTimestampUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticTimestampCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameProfileStatisticTimestampCodeProfileIdGameId(
        code
        , profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :          
        return self.act.DelGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticTimestampListUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileStatisticTimestampListUuid(
                uuid
            )
        
    def GetGameProfileStatisticTimestampUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileStatisticTimestampListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticTimestampListUuid(self
        , uuid
    ) :
        return CachedGetGameProfileStatisticTimestampListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileStatisticTimestampListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileStatisticTimestamp> objs;

        string method_name = "CachedGetGameProfileStatisticTimestampListUuid";

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
            objs = GetGameProfileStatisticTimestampListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticTimestampListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileStatisticTimestampListCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            )
        
    def GetGameProfileStatisticTimestampCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileStatisticTimestampListCodeProfileIdGameId(
        code
        , profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticTimestampListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileStatisticTimestampListCodeProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileStatisticTimestampListCodeProfileIdGameId(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileStatisticTimestamp> objs;

        string method_name = "CachedGetGameProfileStatisticTimestampListCodeProfileIdGameId";

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
            objs = GetGameProfileStatisticTimestampListCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp(self
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

        string method_name = "CachedGetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp";

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
            objs = GetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp(
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
    def CountGameKeyMetaUuid(self
        , uuid
    ) :         
        return self.act.CountGameKeyMetaUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaCode(self
        , code
    ) :         
        return self.act.CountGameKeyMetaCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaCodeGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameKeyMetaCodeGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaName(self
        , name
    ) :         
        return self.act.CountGameKeyMetaName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaKey(self
        , key
    ) :         
        return self.act.CountGameKeyMetaKey(
        key
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaGameId(self
        , game_id
    ) :         
        return self.act.CountGameKeyMetaGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameKeyMetaKeyGameId(self
        , key
        , game_id
    ) :         
        return self.act.CountGameKeyMetaKeyGameId(
        key
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameKeyMetaListFilter(self, filter_obj) :
        return self.act.BrowseGameKeyMetaListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameKeyMetaUuidType(self, set_type, obj) :
        return self.act.SetGameKeyMetaUuid(set_type, obj)
               
    def SetGameKeyMetaUuid(self, obj) :
        return self.act.SetGameKeyMetaUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameKeyMetaCodeGameIdType(self, set_type, obj) :
        return self.act.SetGameKeyMetaCodeGameId(set_type, obj)
               
    def SetGameKeyMetaCodeGameId(self, obj) :
        return self.act.SetGameKeyMetaCodeGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameKeyMetaKeyGameIdType(self, set_type, obj) :
        return self.act.SetGameKeyMetaKeyGameId(set_type, obj)
               
    def SetGameKeyMetaKeyGameId(self, obj) :
        return self.act.SetGameKeyMetaKeyGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameKeyMetaKeyGameIdLevelType(self, set_type, obj) :
        return self.act.SetGameKeyMetaKeyGameIdLevel(set_type, obj)
               
    def SetGameKeyMetaKeyGameIdLevel(self, obj) :
        return self.act.SetGameKeyMetaKeyGameIdLevel('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameKeyMetaUuid(self
        , uuid
    ) :          
        return self.act.DelGameKeyMetaUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameKeyMetaCodeGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameKeyMetaCodeGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameKeyMetaKeyGameId(self
        , key
        , game_id
    ) :          
        return self.act.DelGameKeyMetaKeyGameId(
        key
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListUuid(self
        , uuid
        ) :
            return self.act.GetGameKeyMetaListUuid(
                uuid
            )
        
    def GetGameKeyMetaUuid(self
        , uuid
    ) :
        for item in self.GetGameKeyMetaListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListUuid(self
        , uuid
    ) :
        return CachedGetGameKeyMetaListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameKeyMetaListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListUuid";

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
            objs = GetGameKeyMetaListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListCode(self
        , code
        ) :
            return self.act.GetGameKeyMetaListCode(
                code
            )
        
    def GetGameKeyMetaCode(self
        , code
    ) :
        for item in self.GetGameKeyMetaListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListCode(self
        , code
    ) :
        return CachedGetGameKeyMetaListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameKeyMetaListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListCode";

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
            objs = GetGameKeyMetaListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListCodeGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameKeyMetaListCodeGameId(
                code
                , game_id
            )
        
    def GetGameKeyMetaCodeGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameKeyMetaListCodeGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListCodeGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameKeyMetaListCodeGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameKeyMetaListCodeGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListCodeGameId";

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
            objs = GetGameKeyMetaListCodeGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListName(self
        , name
        ) :
            return self.act.GetGameKeyMetaListName(
                name
            )
        
    def GetGameKeyMetaName(self
        , name
    ) :
        for item in self.GetGameKeyMetaListName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListName(self
        , name
    ) :
        return CachedGetGameKeyMetaListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameKeyMetaListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListName";

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
            objs = GetGameKeyMetaListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListKey(self
        , key
        ) :
            return self.act.GetGameKeyMetaListKey(
                key
            )
        
    def GetGameKeyMetaKey(self
        , key
    ) :
        for item in self.GetGameKeyMetaListKey(
        key
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListKey(self
        , key
    ) :
        return CachedGetGameKeyMetaListKey(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
        )
        
    def CachedGetGameKeyMetaListKey(self
        , overrideCache
        , cacheHours
        , key
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListKey";

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
            objs = GetGameKeyMetaListKey(
                key
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListGameId(self
        , game_id
        ) :
            return self.act.GetGameKeyMetaListGameId(
                game_id
            )
        
    def GetGameKeyMetaGameId(self
        , game_id
    ) :
        for item in self.GetGameKeyMetaListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListGameId(self
        , game_id
    ) :
        return CachedGetGameKeyMetaListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameKeyMetaListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListGameId";

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
            objs = GetGameKeyMetaListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListKeyGameId(self
        , key
        , game_id
        ) :
            return self.act.GetGameKeyMetaListKeyGameId(
                key
                , game_id
            )
        
    def GetGameKeyMetaKeyGameId(self
        , key
        , game_id
    ) :
        for item in self.GetGameKeyMetaListKeyGameId(
        key
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListKeyGameId(self
        , key
        , game_id
    ) :
        return CachedGetGameKeyMetaListKeyGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , game_id
        )
        
    def CachedGetGameKeyMetaListKeyGameId(self
        , overrideCache
        , cacheHours
        , key
        , game_id
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListKeyGameId";

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
            objs = GetGameKeyMetaListKeyGameId(
                key
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameKeyMetaListCodeLevel(self
        , code
        , level
        ) :
            return self.act.GetGameKeyMetaListCodeLevel(
                code
                , level
            )
        
    def GetGameKeyMetaCodeLevel(self
        , code
        , level
    ) :
        for item in self.GetGameKeyMetaListCodeLevel(
        code
        , level
        ) :
            return item
        return None
    
    def CachedGetGameKeyMetaListCodeLevel(self
        , code
        , level
    ) :
        return CachedGetGameKeyMetaListCodeLevel(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , level
        )
        
    def CachedGetGameKeyMetaListCodeLevel(self
        , overrideCache
        , cacheHours
        , code
        , level
    ) :
        pass
        """
        List<GameKeyMeta> objs;

        string method_name = "CachedGetGameKeyMetaListCodeLevel";

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
            objs = GetGameKeyMetaListCodeLevel(
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
    def CountGameLevelUuid(self
        , uuid
    ) :         
        return self.act.CountGameLevelUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelCode(self
        , code
    ) :         
        return self.act.CountGameLevelCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelCodeGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameLevelCodeGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelName(self
        , name
    ) :         
        return self.act.CountGameLevelName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelGameId(self
        , game_id
    ) :         
        return self.act.CountGameLevelGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameLevelListFilter(self, filter_obj) :
        return self.act.BrowseGameLevelListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameLevelUuidType(self, set_type, obj) :
        return self.act.SetGameLevelUuid(set_type, obj)
               
    def SetGameLevelUuid(self, obj) :
        return self.act.SetGameLevelUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLevelCodeGameIdType(self, set_type, obj) :
        return self.act.SetGameLevelCodeGameId(set_type, obj)
               
    def SetGameLevelCodeGameId(self, obj) :
        return self.act.SetGameLevelCodeGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameLevelUuid(self
        , uuid
    ) :          
        return self.act.DelGameLevelUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameLevelCodeGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameLevelCodeGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameLevelListUuid(self
        , uuid
        ) :
            return self.act.GetGameLevelListUuid(
                uuid
            )
        
    def GetGameLevelUuid(self
        , uuid
    ) :
        for item in self.GetGameLevelListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameLevelListUuid(self
        , uuid
    ) :
        return CachedGetGameLevelListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameLevelListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListUuid";

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
            objs = GetGameLevelListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLevelListCode(self
        , code
        ) :
            return self.act.GetGameLevelListCode(
                code
            )
        
    def GetGameLevelCode(self
        , code
    ) :
        for item in self.GetGameLevelListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameLevelListCode(self
        , code
    ) :
        return CachedGetGameLevelListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameLevelListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListCode";

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
            objs = GetGameLevelListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLevelListCodeGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameLevelListCodeGameId(
                code
                , game_id
            )
        
    def GetGameLevelCodeGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameLevelListCodeGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLevelListCodeGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameLevelListCodeGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameLevelListCodeGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListCodeGameId";

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
            objs = GetGameLevelListCodeGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLevelListName(self
        , name
        ) :
            return self.act.GetGameLevelListName(
                name
            )
        
    def GetGameLevelName(self
        , name
    ) :
        for item in self.GetGameLevelListName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameLevelListName(self
        , name
    ) :
        return CachedGetGameLevelListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameLevelListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListName";

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
            objs = GetGameLevelListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameLevelListGameId(self
        , game_id
        ) :
            return self.act.GetGameLevelListGameId(
                game_id
            )
        
    def GetGameLevelGameId(self
        , game_id
    ) :
        for item in self.GetGameLevelListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameLevelListGameId(self
        , game_id
    ) :
        return CachedGetGameLevelListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameLevelListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListGameId";

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
            objs = GetGameLevelListGameId(
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
    def CountGameProfileAchievementUuid(self
        , uuid
    ) :         
        return self.act.CountGameProfileAchievementUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAchievementProfileIdCode(self
        , profile_id
        , code
    ) :         
        return self.act.CountGameProfileAchievementProfileIdCode(
        profile_id
        , code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAchievementUsername(self
        , username
    ) :         
        return self.act.CountGameProfileAchievementUsername(
        username
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAchievementCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameProfileAchievementCodeProfileIdGameId(
        code
        , profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameProfileAchievementCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameProfileAchievementListFilter(self, filter_obj) :
        return self.act.BrowseGameProfileAchievementListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAchievementUuidType(self, set_type, obj) :
        return self.act.SetGameProfileAchievementUuid(set_type, obj)
               
    def SetGameProfileAchievementUuid(self, obj) :
        return self.act.SetGameProfileAchievementUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAchievementUuidCodeType(self, set_type, obj) :
        return self.act.SetGameProfileAchievementUuidCode(set_type, obj)
               
    def SetGameProfileAchievementUuidCode(self, obj) :
        return self.act.SetGameProfileAchievementUuidCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAchievementProfileIdCodeType(self, set_type, obj) :
        return self.act.SetGameProfileAchievementProfileIdCode(set_type, obj)
               
    def SetGameProfileAchievementProfileIdCode(self, obj) :
        return self.act.SetGameProfileAchievementProfileIdCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAchievementCodeProfileIdGameIdType(self, set_type, obj) :
        return self.act.SetGameProfileAchievementCodeProfileIdGameId(set_type, obj)
               
    def SetGameProfileAchievementCodeProfileIdGameId(self, obj) :
        return self.act.SetGameProfileAchievementCodeProfileIdGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileAchievementCodeProfileIdGameIdTimestampType(self, set_type, obj) :
        return self.act.SetGameProfileAchievementCodeProfileIdGameIdTimestamp(set_type, obj)
               
    def SetGameProfileAchievementCodeProfileIdGameIdTimestamp(self, obj) :
        return self.act.SetGameProfileAchievementCodeProfileIdGameIdTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameProfileAchievementUuid(self
        , uuid
    ) :          
        return self.act.DelGameProfileAchievementUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAchievementProfileIdCode(self
        , profile_id
        , code
    ) :          
        return self.act.DelGameProfileAchievementProfileIdCode(
        profile_id
        , code
        )
#------------------------------------------------------------------------------                    
    def DelGameProfileAchievementUuidCode(self
        , uuid
        , code
    ) :          
        return self.act.DelGameProfileAchievementUuidCode(
        uuid
        , code
        )
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListUuid(self
        , uuid
        ) :
            return self.act.GetGameProfileAchievementListUuid(
                uuid
            )
        
    def GetGameProfileAchievementUuid(self
        , uuid
    ) :
        for item in self.GetGameProfileAchievementListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListUuid(self
        , uuid
    ) :
        return CachedGetGameProfileAchievementListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameProfileAchievementListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListUuid";

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
            objs = GetGameProfileAchievementListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListProfileIdCode(self
        , profile_id
        , code
        ) :
            return self.act.GetGameProfileAchievementListProfileIdCode(
                profile_id
                , code
            )
        
    def GetGameProfileAchievementProfileIdCode(self
        , profile_id
        , code
    ) :
        for item in self.GetGameProfileAchievementListProfileIdCode(
        profile_id
        , code
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListProfileIdCode(self
        , profile_id
        , code
    ) :
        return CachedGetGameProfileAchievementListProfileIdCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , code
        )
        
    def CachedGetGameProfileAchievementListProfileIdCode(self
        , overrideCache
        , cacheHours
        , profile_id
        , code
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListProfileIdCode";

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
            objs = GetGameProfileAchievementListProfileIdCode(
                profile_id
                , code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListUsername(self
        , username
        ) :
            return self.act.GetGameProfileAchievementListUsername(
                username
            )
        
    def GetGameProfileAchievementUsername(self
        , username
    ) :
        for item in self.GetGameProfileAchievementListUsername(
        username
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListUsername(self
        , username
    ) :
        return CachedGetGameProfileAchievementListUsername(
            false
            , self.CACHE_DEFAULT_HOURS
            , username
        )
        
    def CachedGetGameProfileAchievementListUsername(self
        , overrideCache
        , cacheHours
        , username
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListUsername";

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
            objs = GetGameProfileAchievementListUsername(
                username
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListCode(self
        , code
        ) :
            return self.act.GetGameProfileAchievementListCode(
                code
            )
        
    def GetGameProfileAchievementCode(self
        , code
    ) :
        for item in self.GetGameProfileAchievementListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListCode(self
        , code
    ) :
        return CachedGetGameProfileAchievementListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameProfileAchievementListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListCode";

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
            objs = GetGameProfileAchievementListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListGameId(self
        , game_id
        ) :
            return self.act.GetGameProfileAchievementListGameId(
                game_id
            )
        
    def GetGameProfileAchievementGameId(self
        , game_id
    ) :
        for item in self.GetGameProfileAchievementListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListGameId(self
        , game_id
    ) :
        return CachedGetGameProfileAchievementListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameProfileAchievementListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListGameId";

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
            objs = GetGameProfileAchievementListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListCodeGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameProfileAchievementListCodeGameId(
                code
                , game_id
            )
        
    def GetGameProfileAchievementCodeGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameProfileAchievementListCodeGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListCodeGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameProfileAchievementListCodeGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameProfileAchievementListCodeGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListCodeGameId";

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
            objs = GetGameProfileAchievementListCodeGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListProfileIdGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileAchievementListProfileIdGameId(
                profile_id
                , game_id
            )
        
    def GetGameProfileAchievementProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileAchievementListProfileIdGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileAchievementListProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileAchievementListProfileIdGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListProfileIdGameId";

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
            objs = GetGameProfileAchievementListProfileIdGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileAchievementListProfileIdGameIdTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileAchievementProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileAchievementListProfileIdGameIdTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileAchievementListProfileIdGameIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileAchievementListProfileIdGameIdTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListProfileIdGameIdTimestamp";

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
            objs = GetGameProfileAchievementListProfileIdGameIdTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
        ) :
            return self.act.GetGameProfileAchievementListCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            )
        
    def GetGameProfileAchievementCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        for item in self.GetGameProfileAchievementListCodeProfileIdGameId(
        code
        , profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return CachedGetGameProfileAchievementListCodeProfileIdGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
        )
        
    def CachedGetGameProfileAchievementListCodeProfileIdGameId(self
        , overrideCache
        , cacheHours
        , code
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameProfileAchievement> objs;

        string method_name = "CachedGetGameProfileAchievementListCodeProfileIdGameId";

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
            objs = GetGameProfileAchievementListCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameProfileAchievementCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
        code
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp(self
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

        string method_name = "CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp";

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
            objs = GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
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
    def CountGameAchievementMetaUuid(self
        , uuid
    ) :         
        return self.act.CountGameAchievementMetaUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaCode(self
        , code
    ) :         
        return self.act.CountGameAchievementMetaCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaCodeGameId(self
        , code
        , game_id
    ) :         
        return self.act.CountGameAchievementMetaCodeGameId(
        code
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaName(self
        , name
    ) :         
        return self.act.CountGameAchievementMetaName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaGameId(self
        , game_id
    ) :         
        return self.act.CountGameAchievementMetaGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameAchievementMetaListFilter(self, filter_obj) :
        return self.act.BrowseGameAchievementMetaListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementMetaUuidType(self, set_type, obj) :
        return self.act.SetGameAchievementMetaUuid(set_type, obj)
               
    def SetGameAchievementMetaUuid(self, obj) :
        return self.act.SetGameAchievementMetaUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementMetaCodeGameIdType(self, set_type, obj) :
        return self.act.SetGameAchievementMetaCodeGameId(set_type, obj)
               
    def SetGameAchievementMetaCodeGameId(self, obj) :
        return self.act.SetGameAchievementMetaCodeGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameAchievementMetaUuid(self
        , uuid
    ) :          
        return self.act.DelGameAchievementMetaUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameAchievementMetaCodeGameId(self
        , code
        , game_id
    ) :          
        return self.act.DelGameAchievementMetaCodeGameId(
        code
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameAchievementMetaListUuid(self
        , uuid
        ) :
            return self.act.GetGameAchievementMetaListUuid(
                uuid
            )
        
    def GetGameAchievementMetaUuid(self
        , uuid
    ) :
        for item in self.GetGameAchievementMetaListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListUuid(self
        , uuid
    ) :
        return CachedGetGameAchievementMetaListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameAchievementMetaListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListUuid";

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
            objs = GetGameAchievementMetaListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementMetaListCode(self
        , code
        ) :
            return self.act.GetGameAchievementMetaListCode(
                code
            )
        
    def GetGameAchievementMetaCode(self
        , code
    ) :
        for item in self.GetGameAchievementMetaListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListCode(self
        , code
    ) :
        return CachedGetGameAchievementMetaListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetGameAchievementMetaListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListCode";

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
            objs = GetGameAchievementMetaListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementMetaListCodeGameId(self
        , code
        , game_id
        ) :
            return self.act.GetGameAchievementMetaListCodeGameId(
                code
                , game_id
            )
        
    def GetGameAchievementMetaCodeGameId(self
        , code
        , game_id
    ) :
        for item in self.GetGameAchievementMetaListCodeGameId(
        code
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListCodeGameId(self
        , code
        , game_id
    ) :
        return CachedGetGameAchievementMetaListCodeGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , game_id
        )
        
    def CachedGetGameAchievementMetaListCodeGameId(self
        , overrideCache
        , cacheHours
        , code
        , game_id
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListCodeGameId";

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
            objs = GetGameAchievementMetaListCodeGameId(
                code
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementMetaListName(self
        , name
        ) :
            return self.act.GetGameAchievementMetaListName(
                name
            )
        
    def GetGameAchievementMetaName(self
        , name
    ) :
        for item in self.GetGameAchievementMetaListName(
        name
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListName(self
        , name
    ) :
        return CachedGetGameAchievementMetaListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetGameAchievementMetaListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListName";

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
            objs = GetGameAchievementMetaListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementMetaListGameId(self
        , game_id
        ) :
            return self.act.GetGameAchievementMetaListGameId(
                game_id
            )
        
    def GetGameAchievementMetaGameId(self
        , game_id
    ) :
        for item in self.GetGameAchievementMetaListGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListGameId(self
        , game_id
    ) :
        return CachedGetGameAchievementMetaListGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameAchievementMetaListGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListGameId";

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
            objs = GetGameAchievementMetaListGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
        

