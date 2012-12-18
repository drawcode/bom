import ent
from ent import *

import BasePlatformACT
from BasePlatformACT import *

def enum(**enums):
    return type('Enum', (), enums)
    
SetType = enum(FULL='full', INSERT_ONLY='insertonly', UPDATE_ONLY='updateonly')

class BasePlatformAPI(object):

    def __init__(self):
        self.DEFAULT_CACHE_HOURS = 12
        self.DEFAULT_SET_TYPE = 'full'
        self.act = BasePlatformACT()
        
    def set_connection_string(self, connection_string):
        self.act.data.data_provider.connection_string = connection_string
        self.act.data.connection_string = connection_string        

#------------------------------------------------------------------------------                    
    def CountApp(self
    ) :         
        return self.act.CountApp(
        )
        
#------------------------------------------------------------------------------                    
    def CountAppByUuid(self
        , uuid
    ) :         
        return self.act.CountAppByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountAppByCode(self
        , code
    ) :         
        return self.act.CountAppByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountAppByTypeId(self
        , type_id
    ) :         
        return self.act.CountAppByTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountAppByCodeByTypeId(self
        , code
        , type_id
    ) :         
        return self.act.CountAppByCodeByTypeId(
        code
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountAppByPlatformByTypeId(self
        , platform
        , type_id
    ) :         
        return self.act.CountAppByPlatformByTypeId(
        platform
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountAppByPlatform(self
        , platform
    ) :         
        return self.act.CountAppByPlatform(
        platform
        )
        
#------------------------------------------------------------------------------                    
    def BrowseAppListByFilter(self, filter_obj) :
        return self.act.BrowseAppListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetAppByUuid(self, set_type, obj) :
        return self.act.SetAppByUuid(set_type, obj)
               
    def SetAppByUuid(self, set_type, obj) :
        return self.act.SetAppByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetAppByCode(self, set_type, obj) :
        return self.act.SetAppByCode(set_type, obj)
               
    def SetAppByCode(self, set_type, obj) :
        return self.act.SetAppByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelAppByUuid(self
        , uuid
    ) :          
        return self.act.DelAppByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelAppByCode(self
        , code
    ) :          
        return self.act.DelAppByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetAppList(self
        ) :
            return self.act.GetAppList(
            )
        
    def GetApp(self
    ) :
        for item in self.GetAppList(
        ) :
            return item
        return None
    
    def CachedGetAppList(self
    ) :
        return CachedGetAppList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetAppList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<App>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetAppList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListByUuid(self
        , uuid
        ) :
            return self.act.GetAppListByUuid(
                uuid
            )
        
    def GetAppByUuid(self
        , uuid
    ) :
        for item in self.GetAppListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetAppListByUuid(self
        , uuid
    ) :
        return CachedGetAppListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetAppListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<App>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetAppListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListByCode(self
        , code
        ) :
            return self.act.GetAppListByCode(
                code
            )
        
    def GetAppByCode(self
        , code
    ) :
        for item in self.GetAppListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetAppListByCode(self
        , code
    ) :
        return CachedGetAppListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetAppListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<App>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetAppListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListByTypeId(self
        , type_id
        ) :
            return self.act.GetAppListByTypeId(
                type_id
            )
        
    def GetAppByTypeId(self
        , type_id
    ) :
        for item in self.GetAppListByTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetAppListByTypeId(self
        , type_id
    ) :
        return CachedGetAppListByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetAppListByTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<App>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetAppListByTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListByCodeByTypeId(self
        , code
        , type_id
        ) :
            return self.act.GetAppListByCodeByTypeId(
                code
                , type_id
            )
        
    def GetAppByCodeByTypeId(self
        , code
        , type_id
    ) :
        for item in self.GetAppListByCodeByTypeId(
        code
        , type_id
        ) :
            return item
        return None
    
    def CachedGetAppListByCodeByTypeId(self
        , code
        , type_id
    ) :
        return CachedGetAppListByCodeByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , type_id
        )
        
    def CachedGetAppListByCodeByTypeId(self
        , overrideCache
        , cacheHours
        , code
        , type_id
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListByCodeByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<App>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetAppListByCodeByTypeId(
                code
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListByPlatformByTypeId(self
        , platform
        , type_id
        ) :
            return self.act.GetAppListByPlatformByTypeId(
                platform
                , type_id
            )
        
    def GetAppByPlatformByTypeId(self
        , platform
        , type_id
    ) :
        for item in self.GetAppListByPlatformByTypeId(
        platform
        , type_id
        ) :
            return item
        return None
    
    def CachedGetAppListByPlatformByTypeId(self
        , platform
        , type_id
    ) :
        return CachedGetAppListByPlatformByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , platform
            , type_id
        )
        
    def CachedGetAppListByPlatformByTypeId(self
        , overrideCache
        , cacheHours
        , platform
        , type_id
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListByPlatformByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("platform".ToLower());
        sb.Append("_");
        sb.Append(platform);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<App>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetAppListByPlatformByTypeId(
                platform
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListByPlatform(self
        , platform
        ) :
            return self.act.GetAppListByPlatform(
                platform
            )
        
    def GetAppByPlatform(self
        , platform
    ) :
        for item in self.GetAppListByPlatform(
        platform
        ) :
            return item
        return None
    
    def CachedGetAppListByPlatform(self
        , platform
    ) :
        return CachedGetAppListByPlatform(
            false
            , self.CACHE_DEFAULT_HOURS
            , platform
        )
        
    def CachedGetAppListByPlatform(self
        , overrideCache
        , cacheHours
        , platform
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListByPlatform";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("platform".ToLower());
        sb.Append("_");
        sb.Append(platform);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<App>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetAppListByPlatform(
                platform
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountAppType(self
    ) :         
        return self.act.CountAppType(
        )
        
#------------------------------------------------------------------------------                    
    def CountAppTypeByUuid(self
        , uuid
    ) :         
        return self.act.CountAppTypeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountAppTypeByCode(self
        , code
    ) :         
        return self.act.CountAppTypeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseAppTypeListByFilter(self, filter_obj) :
        return self.act.BrowseAppTypeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetAppTypeByUuid(self, set_type, obj) :
        return self.act.SetAppTypeByUuid(set_type, obj)
               
    def SetAppTypeByUuid(self, set_type, obj) :
        return self.act.SetAppTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetAppTypeByCode(self, set_type, obj) :
        return self.act.SetAppTypeByCode(set_type, obj)
               
    def SetAppTypeByCode(self, set_type, obj) :
        return self.act.SetAppTypeByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelAppTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelAppTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelAppTypeByCode(self
        , code
    ) :          
        return self.act.DelAppTypeByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetAppTypeList(self
        ) :
            return self.act.GetAppTypeList(
            )
        
    def GetAppType(self
    ) :
        for item in self.GetAppTypeList(
        ) :
            return item
        return None
    
    def CachedGetAppTypeList(self
    ) :
        return CachedGetAppTypeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetAppTypeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<AppType> objs;

        string method_name = "CachedGetAppTypeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<AppType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetAppTypeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppTypeListByUuid(self
        , uuid
        ) :
            return self.act.GetAppTypeListByUuid(
                uuid
            )
        
    def GetAppTypeByUuid(self
        , uuid
    ) :
        for item in self.GetAppTypeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetAppTypeListByUuid(self
        , uuid
    ) :
        return CachedGetAppTypeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetAppTypeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<AppType> objs;

        string method_name = "CachedGetAppTypeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<AppType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetAppTypeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppTypeListByCode(self
        , code
        ) :
            return self.act.GetAppTypeListByCode(
                code
            )
        
    def GetAppTypeByCode(self
        , code
    ) :
        for item in self.GetAppTypeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetAppTypeListByCode(self
        , code
    ) :
        return CachedGetAppTypeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetAppTypeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<AppType> objs;

        string method_name = "CachedGetAppTypeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<AppType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetAppTypeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountSite(self
    ) :         
        return self.act.CountSite(
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteByUuid(self
        , uuid
    ) :         
        return self.act.CountSiteByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteByCode(self
        , code
    ) :         
        return self.act.CountSiteByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteByTypeId(self
        , type_id
    ) :         
        return self.act.CountSiteByTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteByCodeByTypeId(self
        , code
        , type_id
    ) :         
        return self.act.CountSiteByCodeByTypeId(
        code
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteByDomainByTypeId(self
        , domain
        , type_id
    ) :         
        return self.act.CountSiteByDomainByTypeId(
        domain
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteByDomain(self
        , domain
    ) :         
        return self.act.CountSiteByDomain(
        domain
        )
        
#------------------------------------------------------------------------------                    
    def BrowseSiteListByFilter(self, filter_obj) :
        return self.act.BrowseSiteListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetSiteByUuid(self, set_type, obj) :
        return self.act.SetSiteByUuid(set_type, obj)
               
    def SetSiteByUuid(self, set_type, obj) :
        return self.act.SetSiteByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetSiteByCode(self, set_type, obj) :
        return self.act.SetSiteByCode(set_type, obj)
               
    def SetSiteByCode(self, set_type, obj) :
        return self.act.SetSiteByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelSiteByUuid(self
        , uuid
    ) :          
        return self.act.DelSiteByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelSiteByCode(self
        , code
    ) :          
        return self.act.DelSiteByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetSiteList(self
        ) :
            return self.act.GetSiteList(
            )
        
    def GetSite(self
    ) :
        for item in self.GetSiteList(
        ) :
            return item
        return None
    
    def CachedGetSiteList(self
    ) :
        return CachedGetSiteList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetSiteList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Site>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListByUuid(self
        , uuid
        ) :
            return self.act.GetSiteListByUuid(
                uuid
            )
        
    def GetSiteByUuid(self
        , uuid
    ) :
        for item in self.GetSiteListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetSiteListByUuid(self
        , uuid
    ) :
        return CachedGetSiteListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetSiteListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Site>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListByCode(self
        , code
        ) :
            return self.act.GetSiteListByCode(
                code
            )
        
    def GetSiteByCode(self
        , code
    ) :
        for item in self.GetSiteListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetSiteListByCode(self
        , code
    ) :
        return CachedGetSiteListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetSiteListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Site>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListByTypeId(self
        , type_id
        ) :
            return self.act.GetSiteListByTypeId(
                type_id
            )
        
    def GetSiteByTypeId(self
        , type_id
    ) :
        for item in self.GetSiteListByTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetSiteListByTypeId(self
        , type_id
    ) :
        return CachedGetSiteListByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetSiteListByTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Site>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteListByTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListByCodeByTypeId(self
        , code
        , type_id
        ) :
            return self.act.GetSiteListByCodeByTypeId(
                code
                , type_id
            )
        
    def GetSiteByCodeByTypeId(self
        , code
        , type_id
    ) :
        for item in self.GetSiteListByCodeByTypeId(
        code
        , type_id
        ) :
            return item
        return None
    
    def CachedGetSiteListByCodeByTypeId(self
        , code
        , type_id
    ) :
        return CachedGetSiteListByCodeByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , type_id
        )
        
    def CachedGetSiteListByCodeByTypeId(self
        , overrideCache
        , cacheHours
        , code
        , type_id
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListByCodeByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Site>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteListByCodeByTypeId(
                code
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListByDomainByTypeId(self
        , domain
        , type_id
        ) :
            return self.act.GetSiteListByDomainByTypeId(
                domain
                , type_id
            )
        
    def GetSiteByDomainByTypeId(self
        , domain
        , type_id
    ) :
        for item in self.GetSiteListByDomainByTypeId(
        domain
        , type_id
        ) :
            return item
        return None
    
    def CachedGetSiteListByDomainByTypeId(self
        , domain
        , type_id
    ) :
        return CachedGetSiteListByDomainByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , domain
            , type_id
        )
        
    def CachedGetSiteListByDomainByTypeId(self
        , overrideCache
        , cacheHours
        , domain
        , type_id
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListByDomainByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("domain".ToLower());
        sb.Append("_");
        sb.Append(domain);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Site>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteListByDomainByTypeId(
                domain
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListByDomain(self
        , domain
        ) :
            return self.act.GetSiteListByDomain(
                domain
            )
        
    def GetSiteByDomain(self
        , domain
    ) :
        for item in self.GetSiteListByDomain(
        domain
        ) :
            return item
        return None
    
    def CachedGetSiteListByDomain(self
        , domain
    ) :
        return CachedGetSiteListByDomain(
            false
            , self.CACHE_DEFAULT_HOURS
            , domain
        )
        
    def CachedGetSiteListByDomain(self
        , overrideCache
        , cacheHours
        , domain
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListByDomain";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("domain".ToLower());
        sb.Append("_");
        sb.Append(domain);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Site>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteListByDomain(
                domain
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountSiteType(self
    ) :         
        return self.act.CountSiteType(
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteTypeByUuid(self
        , uuid
    ) :         
        return self.act.CountSiteTypeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteTypeByCode(self
        , code
    ) :         
        return self.act.CountSiteTypeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseSiteTypeListByFilter(self, filter_obj) :
        return self.act.BrowseSiteTypeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetSiteTypeByUuid(self, set_type, obj) :
        return self.act.SetSiteTypeByUuid(set_type, obj)
               
    def SetSiteTypeByUuid(self, set_type, obj) :
        return self.act.SetSiteTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetSiteTypeByCode(self, set_type, obj) :
        return self.act.SetSiteTypeByCode(set_type, obj)
               
    def SetSiteTypeByCode(self, set_type, obj) :
        return self.act.SetSiteTypeByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelSiteTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelSiteTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelSiteTypeByCode(self
        , code
    ) :          
        return self.act.DelSiteTypeByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetSiteTypeList(self
        ) :
            return self.act.GetSiteTypeList(
            )
        
    def GetSiteType(self
    ) :
        for item in self.GetSiteTypeList(
        ) :
            return item
        return None
    
    def CachedGetSiteTypeList(self
    ) :
        return CachedGetSiteTypeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetSiteTypeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<SiteType> objs;

        string method_name = "CachedGetSiteTypeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<SiteType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteTypeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteTypeListByUuid(self
        , uuid
        ) :
            return self.act.GetSiteTypeListByUuid(
                uuid
            )
        
    def GetSiteTypeByUuid(self
        , uuid
    ) :
        for item in self.GetSiteTypeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetSiteTypeListByUuid(self
        , uuid
    ) :
        return CachedGetSiteTypeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetSiteTypeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<SiteType> objs;

        string method_name = "CachedGetSiteTypeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<SiteType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteTypeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteTypeListByCode(self
        , code
        ) :
            return self.act.GetSiteTypeListByCode(
                code
            )
        
    def GetSiteTypeByCode(self
        , code
    ) :
        for item in self.GetSiteTypeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetSiteTypeListByCode(self
        , code
    ) :
        return CachedGetSiteTypeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetSiteTypeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<SiteType> objs;

        string method_name = "CachedGetSiteTypeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<SiteType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteTypeListByCode(
                code
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
    def SetOrgByUuid(self, set_type, obj) :
        return self.act.SetOrgByUuid(set_type, obj)
               
    def SetOrgByUuid(self, set_type, obj) :
        return self.act.SetOrgByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOrgByUuid(self
        , uuid
    ) :          
        return self.act.DelOrgByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetOrgList(self
        ) :
            return self.act.GetOrgList(
            )
        
    def GetOrg(self
    ) :
        for item in self.GetOrgList(
        ) :
            return item
        return None
    
    def CachedGetOrgList(self
    ) :
        return CachedGetOrgList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetOrgList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<Org> objs;

        string method_name = "CachedGetOrgList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Org>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
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
    def CountOrgType(self
    ) :         
        return self.act.CountOrgType(
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgTypeByUuid(self
        , uuid
    ) :         
        return self.act.CountOrgTypeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgTypeByCode(self
        , code
    ) :         
        return self.act.CountOrgTypeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOrgTypeListByFilter(self, filter_obj) :
        return self.act.BrowseOrgTypeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOrgTypeByUuid(self, set_type, obj) :
        return self.act.SetOrgTypeByUuid(set_type, obj)
               
    def SetOrgTypeByUuid(self, set_type, obj) :
        return self.act.SetOrgTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetOrgTypeByCode(self, set_type, obj) :
        return self.act.SetOrgTypeByCode(set_type, obj)
               
    def SetOrgTypeByCode(self, set_type, obj) :
        return self.act.SetOrgTypeByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelOrgTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelOrgTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelOrgTypeByCode(self
        , code
    ) :          
        return self.act.DelOrgTypeByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetOrgTypeList(self
        ) :
            return self.act.GetOrgTypeList(
            )
        
    def GetOrgType(self
    ) :
        for item in self.GetOrgTypeList(
        ) :
            return item
        return None
    
    def CachedGetOrgTypeList(self
    ) :
        return CachedGetOrgTypeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetOrgTypeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<OrgType> objs;

        string method_name = "CachedGetOrgTypeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OrgType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgTypeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgTypeListByUuid(self
        , uuid
        ) :
            return self.act.GetOrgTypeListByUuid(
                uuid
            )
        
    def GetOrgTypeByUuid(self
        , uuid
    ) :
        for item in self.GetOrgTypeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOrgTypeListByUuid(self
        , uuid
    ) :
        return CachedGetOrgTypeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOrgTypeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OrgType> objs;

        string method_name = "CachedGetOrgTypeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OrgType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgTypeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgTypeListByCode(self
        , code
        ) :
            return self.act.GetOrgTypeListByCode(
                code
            )
        
    def GetOrgTypeByCode(self
        , code
    ) :
        for item in self.GetOrgTypeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetOrgTypeListByCode(self
        , code
    ) :
        return CachedGetOrgTypeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetOrgTypeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<OrgType> objs;

        string method_name = "CachedGetOrgTypeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OrgType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgTypeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountContentItem(self
    ) :         
        return self.act.CountContentItem(
        )
        
#------------------------------------------------------------------------------                    
    def CountContentItemByUuid(self
        , uuid
    ) :         
        return self.act.CountContentItemByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountContentItemByCode(self
        , code
    ) :         
        return self.act.CountContentItemByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountContentItemByName(self
        , name
    ) :         
        return self.act.CountContentItemByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountContentItemByPath(self
        , path
    ) :         
        return self.act.CountContentItemByPath(
        path
        )
        
#------------------------------------------------------------------------------                    
    def BrowseContentItemListByFilter(self, filter_obj) :
        return self.act.BrowseContentItemListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetContentItemByUuid(self, set_type, obj) :
        return self.act.SetContentItemByUuid(set_type, obj)
               
    def SetContentItemByUuid(self, set_type, obj) :
        return self.act.SetContentItemByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelContentItemByUuid(self
        , uuid
    ) :          
        return self.act.DelContentItemByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelContentItemByPath(self
        , path
    ) :          
        return self.act.DelContentItemByPath(
        path
        )
#------------------------------------------------------------------------------                    
    def GetContentItemList(self
        ) :
            return self.act.GetContentItemList(
            )
        
    def GetContentItem(self
    ) :
        for item in self.GetContentItemList(
        ) :
            return item
        return None
    
    def CachedGetContentItemList(self
    ) :
        return CachedGetContentItemList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetContentItemList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ContentItem> objs;

        string method_name = "CachedGetContentItemList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentItemList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentItemListByUuid(self
        , uuid
        ) :
            return self.act.GetContentItemListByUuid(
                uuid
            )
        
    def GetContentItemByUuid(self
        , uuid
    ) :
        for item in self.GetContentItemListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetContentItemListByUuid(self
        , uuid
    ) :
        return CachedGetContentItemListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetContentItemListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ContentItem> objs;

        string method_name = "CachedGetContentItemListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentItemListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentItemListByCode(self
        , code
        ) :
            return self.act.GetContentItemListByCode(
                code
            )
        
    def GetContentItemByCode(self
        , code
    ) :
        for item in self.GetContentItemListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetContentItemListByCode(self
        , code
    ) :
        return CachedGetContentItemListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetContentItemListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ContentItem> objs;

        string method_name = "CachedGetContentItemListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentItemListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentItemListByName(self
        , name
        ) :
            return self.act.GetContentItemListByName(
                name
            )
        
    def GetContentItemByName(self
        , name
    ) :
        for item in self.GetContentItemListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetContentItemListByName(self
        , name
    ) :
        return CachedGetContentItemListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetContentItemListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<ContentItem> objs;

        string method_name = "CachedGetContentItemListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentItemListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentItemListByPath(self
        , path
        ) :
            return self.act.GetContentItemListByPath(
                path
            )
        
    def GetContentItemByPath(self
        , path
    ) :
        for item in self.GetContentItemListByPath(
        path
        ) :
            return item
        return None
    
    def CachedGetContentItemListByPath(self
        , path
    ) :
        return CachedGetContentItemListByPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , path
        )
        
    def CachedGetContentItemListByPath(self
        , overrideCache
        , cacheHours
        , path
    ) :
        pass
        """
        List<ContentItem> objs;

        string method_name = "CachedGetContentItemListByPath";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentItem>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentItemListByPath(
                path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountContentItemType(self
    ) :         
        return self.act.CountContentItemType(
        )
        
#------------------------------------------------------------------------------                    
    def CountContentItemTypeByUuid(self
        , uuid
    ) :         
        return self.act.CountContentItemTypeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountContentItemTypeByCode(self
        , code
    ) :         
        return self.act.CountContentItemTypeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseContentItemTypeListByFilter(self, filter_obj) :
        return self.act.BrowseContentItemTypeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetContentItemTypeByUuid(self, set_type, obj) :
        return self.act.SetContentItemTypeByUuid(set_type, obj)
               
    def SetContentItemTypeByUuid(self, set_type, obj) :
        return self.act.SetContentItemTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetContentItemTypeByCode(self, set_type, obj) :
        return self.act.SetContentItemTypeByCode(set_type, obj)
               
    def SetContentItemTypeByCode(self, set_type, obj) :
        return self.act.SetContentItemTypeByCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelContentItemTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelContentItemTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelContentItemTypeByCode(self
        , code
    ) :          
        return self.act.DelContentItemTypeByCode(
        code
        )
#------------------------------------------------------------------------------                    
    def GetContentItemTypeList(self
        ) :
            return self.act.GetContentItemTypeList(
            )
        
    def GetContentItemType(self
    ) :
        for item in self.GetContentItemTypeList(
        ) :
            return item
        return None
    
    def CachedGetContentItemTypeList(self
    ) :
        return CachedGetContentItemTypeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetContentItemTypeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ContentItemType> objs;

        string method_name = "CachedGetContentItemTypeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentItemType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentItemTypeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentItemTypeListByUuid(self
        , uuid
        ) :
            return self.act.GetContentItemTypeListByUuid(
                uuid
            )
        
    def GetContentItemTypeByUuid(self
        , uuid
    ) :
        for item in self.GetContentItemTypeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetContentItemTypeListByUuid(self
        , uuid
    ) :
        return CachedGetContentItemTypeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetContentItemTypeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ContentItemType> objs;

        string method_name = "CachedGetContentItemTypeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentItemType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentItemTypeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentItemTypeListByCode(self
        , code
        ) :
            return self.act.GetContentItemTypeListByCode(
                code
            )
        
    def GetContentItemTypeByCode(self
        , code
    ) :
        for item in self.GetContentItemTypeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetContentItemTypeListByCode(self
        , code
    ) :
        return CachedGetContentItemTypeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetContentItemTypeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ContentItemType> objs;

        string method_name = "CachedGetContentItemTypeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentItemType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentItemTypeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountContentPage(self
    ) :         
        return self.act.CountContentPage(
        )
        
#------------------------------------------------------------------------------                    
    def CountContentPageByUuid(self
        , uuid
    ) :         
        return self.act.CountContentPageByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountContentPageByCode(self
        , code
    ) :         
        return self.act.CountContentPageByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountContentPageByName(self
        , name
    ) :         
        return self.act.CountContentPageByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountContentPageByPath(self
        , path
    ) :         
        return self.act.CountContentPageByPath(
        path
        )
        
#------------------------------------------------------------------------------                    
    def BrowseContentPageListByFilter(self, filter_obj) :
        return self.act.BrowseContentPageListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetContentPageByUuid(self, set_type, obj) :
        return self.act.SetContentPageByUuid(set_type, obj)
               
    def SetContentPageByUuid(self, set_type, obj) :
        return self.act.SetContentPageByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelContentPageByUuid(self
        , uuid
    ) :          
        return self.act.DelContentPageByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelContentPageByPathBySiteId(self
        , path
        , site_id
    ) :          
        return self.act.DelContentPageByPathBySiteId(
        path
        , site_id
        )
#------------------------------------------------------------------------------                    
    def DelContentPageByPath(self
        , path
    ) :          
        return self.act.DelContentPageByPath(
        path
        )
#------------------------------------------------------------------------------                    
    def GetContentPageList(self
        ) :
            return self.act.GetContentPageList(
            )
        
    def GetContentPage(self
    ) :
        for item in self.GetContentPageList(
        ) :
            return item
        return None
    
    def CachedGetContentPageList(self
    ) :
        return CachedGetContentPageList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetContentPageList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentPageList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListByUuid(self
        , uuid
        ) :
            return self.act.GetContentPageListByUuid(
                uuid
            )
        
    def GetContentPageByUuid(self
        , uuid
    ) :
        for item in self.GetContentPageListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetContentPageListByUuid(self
        , uuid
    ) :
        return CachedGetContentPageListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetContentPageListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentPageListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListByCode(self
        , code
        ) :
            return self.act.GetContentPageListByCode(
                code
            )
        
    def GetContentPageByCode(self
        , code
    ) :
        for item in self.GetContentPageListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetContentPageListByCode(self
        , code
    ) :
        return CachedGetContentPageListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetContentPageListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentPageListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListByName(self
        , name
        ) :
            return self.act.GetContentPageListByName(
                name
            )
        
    def GetContentPageByName(self
        , name
    ) :
        for item in self.GetContentPageListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetContentPageListByName(self
        , name
    ) :
        return CachedGetContentPageListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetContentPageListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentPageListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListByPath(self
        , path
        ) :
            return self.act.GetContentPageListByPath(
                path
            )
        
    def GetContentPageByPath(self
        , path
    ) :
        for item in self.GetContentPageListByPath(
        path
        ) :
            return item
        return None
    
    def CachedGetContentPageListByPath(self
        , path
    ) :
        return CachedGetContentPageListByPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , path
        )
        
    def CachedGetContentPageListByPath(self
        , overrideCache
        , cacheHours
        , path
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListByPath";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentPageListByPath(
                path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListBySiteId(self
        , site_id
        ) :
            return self.act.GetContentPageListBySiteId(
                site_id
            )
        
    def GetContentPageBySiteId(self
        , site_id
    ) :
        for item in self.GetContentPageListBySiteId(
        site_id
        ) :
            return item
        return None
    
    def CachedGetContentPageListBySiteId(self
        , site_id
    ) :
        return CachedGetContentPageListBySiteId(
            false
            , self.CACHE_DEFAULT_HOURS
            , site_id
        )
        
    def CachedGetContentPageListBySiteId(self
        , overrideCache
        , cacheHours
        , site_id
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListBySiteId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("site_id".ToLower());
        sb.Append("_");
        sb.Append(site_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentPageListBySiteId(
                site_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListBySiteIdByPath(self
        , site_id
        , path
        ) :
            return self.act.GetContentPageListBySiteIdByPath(
                site_id
                , path
            )
        
    def GetContentPageBySiteIdByPath(self
        , site_id
        , path
    ) :
        for item in self.GetContentPageListBySiteIdByPath(
        site_id
        , path
        ) :
            return item
        return None
    
    def CachedGetContentPageListBySiteIdByPath(self
        , site_id
        , path
    ) :
        return CachedGetContentPageListBySiteIdByPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , site_id
            , path
        )
        
    def CachedGetContentPageListBySiteIdByPath(self
        , overrideCache
        , cacheHours
        , site_id
        , path
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListBySiteIdByPath";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("site_id".ToLower());
        sb.Append("_");
        sb.Append(site_id);
        sb.Append("_");
        sb.Append("path".ToLower());
        sb.Append("_");
        sb.Append(path);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ContentPage>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetContentPageListBySiteIdByPath(
                site_id
                , path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountMessage(self
    ) :         
        return self.act.CountMessage(
        )
        
#------------------------------------------------------------------------------                    
    def CountMessageByUuid(self
        , uuid
    ) :         
        return self.act.CountMessageByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def BrowseMessageListByFilter(self, filter_obj) :
        return self.act.BrowseMessageListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetMessageByUuid(self, set_type, obj) :
        return self.act.SetMessageByUuid(set_type, obj)
               
    def SetMessageByUuid(self, set_type, obj) :
        return self.act.SetMessageByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelMessageByUuid(self
        , uuid
    ) :          
        return self.act.DelMessageByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetMessageList(self
        ) :
            return self.act.GetMessageList(
            )
        
    def GetMessage(self
    ) :
        for item in self.GetMessageList(
        ) :
            return item
        return None
    
    def CachedGetMessageList(self
    ) :
        return CachedGetMessageList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetMessageList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<Message> objs;

        string method_name = "CachedGetMessageList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Message>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetMessageList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetMessageListByUuid(self
        , uuid
        ) :
            return self.act.GetMessageListByUuid(
                uuid
            )
        
    def GetMessageByUuid(self
        , uuid
    ) :
        for item in self.GetMessageListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetMessageListByUuid(self
        , uuid
    ) :
        return CachedGetMessageListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetMessageListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Message> objs;

        string method_name = "CachedGetMessageListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Message>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetMessageListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
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
    def SetGameByUuid(self, set_type, obj) :
        return self.act.SetGameByUuid(set_type, obj)
               
    def SetGameByUuid(self, set_type, obj) :
        return self.act.SetGameByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameByCode(self, set_type, obj) :
        return self.act.SetGameByCode(set_type, obj)
               
    def SetGameByCode(self, set_type, obj) :
        return self.act.SetGameByCode('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameByName(self, set_type, obj) :
        return self.act.SetGameByName(set_type, obj)
               
    def SetGameByName(self, set_type, obj) :
        return self.act.SetGameByName('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameByOrgId(self, set_type, obj) :
        return self.act.SetGameByOrgId(set_type, obj)
               
    def SetGameByOrgId(self, set_type, obj) :
        return self.act.SetGameByOrgId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameByAppId(self, set_type, obj) :
        return self.act.SetGameByAppId(set_type, obj)
               
    def SetGameByAppId(self, set_type, obj) :
        return self.act.SetGameByAppId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameByOrgIdByAppId(self, set_type, obj) :
        return self.act.SetGameByOrgIdByAppId(set_type, obj)
               
    def SetGameByOrgIdByAppId(self, set_type, obj) :
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
    def SetGameCategoryByUuid(self, set_type, obj) :
        return self.act.SetGameCategoryByUuid(set_type, obj)
               
    def SetGameCategoryByUuid(self, set_type, obj) :
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
    def SetGameCategoryTreeByUuid(self, set_type, obj) :
        return self.act.SetGameCategoryTreeByUuid(set_type, obj)
               
    def SetGameCategoryTreeByUuid(self, set_type, obj) :
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
    def SetGameCategoryAssocByUuid(self, set_type, obj) :
        return self.act.SetGameCategoryAssocByUuid(set_type, obj)
               
    def SetGameCategoryAssocByUuid(self, set_type, obj) :
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
    def SetGameTypeByUuid(self, set_type, obj) :
        return self.act.SetGameTypeByUuid(set_type, obj)
               
    def SetGameTypeByUuid(self, set_type, obj) :
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
    def SetProfileGameByUuid(self, set_type, obj) :
        return self.act.SetProfileGameByUuid(set_type, obj)
               
    def SetProfileGameByUuid(self, set_type, obj) :
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
    def BrowseProfileGameNetworkListByFilter(self, filter_obj) :
        return self.act.BrowseProfileGameNetworkListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameNetworkByUuid(self, set_type, obj) :
        return self.act.SetProfileGameNetworkByUuid(set_type, obj)
               
    def SetProfileGameNetworkByUuid(self, set_type, obj) :
        return self.act.SetProfileGameNetworkByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileGameNetworkByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileGameNetworkByUuid(
        uuid
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
    def SetProfileGameDataAttributeByUuid(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeByUuid(set_type, obj)
               
    def SetProfileGameDataAttributeByUuid(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameDataAttributeByProfileId(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeByProfileId(set_type, obj)
               
    def SetProfileGameDataAttributeByProfileId(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileGameDataAttributeByProfileIdByGameIdByCode(self, set_type, obj) :
        return self.act.SetProfileGameDataAttributeByProfileIdByGameIdByCode(set_type, obj)
               
    def SetProfileGameDataAttributeByProfileIdByGameIdByCode(self, set_type, obj) :
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
    def SetGameSessionByUuid(self, set_type, obj) :
        return self.act.SetGameSessionByUuid(set_type, obj)
               
    def SetGameSessionByUuid(self, set_type, obj) :
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
    def SetGameSessionDataByUuid(self, set_type, obj) :
        return self.act.SetGameSessionDataByUuid(set_type, obj)
               
    def SetGameSessionDataByUuid(self, set_type, obj) :
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
    def SetGameContentByUuid(self, set_type, obj) :
        return self.act.SetGameContentByUuid(set_type, obj)
               
    def SetGameContentByUuid(self, set_type, obj) :
        return self.act.SetGameContentByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentByGameId(self, set_type, obj) :
        return self.act.SetGameContentByGameId(set_type, obj)
               
    def SetGameContentByGameId(self, set_type, obj) :
        return self.act.SetGameContentByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentByGameIdByPath(self, set_type, obj) :
        return self.act.SetGameContentByGameIdByPath(set_type, obj)
               
    def SetGameContentByGameIdByPath(self, set_type, obj) :
        return self.act.SetGameContentByGameIdByPath('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentByGameIdByPathByVersion(self, set_type, obj) :
        return self.act.SetGameContentByGameIdByPathByVersion(set_type, obj)
               
    def SetGameContentByGameIdByPathByVersion(self, set_type, obj) :
        return self.act.SetGameContentByGameIdByPathByVersion('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameContentByGameIdByPathByVersionByPlatformByIncrement(self, set_type, obj) :
        return self.act.SetGameContentByGameIdByPathByVersionByPlatformByIncrement(set_type, obj)
               
    def SetGameContentByGameIdByPathByVersionByPlatformByIncrement(self, set_type, obj) :
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
    def SetGameProfileContentByUuid(self, set_type, obj) :
        return self.act.SetGameProfileContentByUuid(set_type, obj)
               
    def SetGameProfileContentByUuid(self, set_type, obj) :
        return self.act.SetGameProfileContentByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByProfileId(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileId(set_type, obj)
               
    def SetGameProfileContentByGameIdByProfileId(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByUsername(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsername(set_type, obj)
               
    def SetGameProfileContentByGameIdByUsername(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsername('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByUsername(self, set_type, obj) :
        return self.act.SetGameProfileContentByUsername(set_type, obj)
               
    def SetGameProfileContentByUsername(self, set_type, obj) :
        return self.act.SetGameProfileContentByUsername('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByProfileIdByPath(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPath(set_type, obj)
               
    def SetGameProfileContentByGameIdByProfileIdByPath(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPath('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByProfileIdByPathByVersion(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPathByVersion(set_type, obj)
               
    def SetGameProfileContentByGameIdByProfileIdByPathByVersion(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPathByVersion('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(set_type, obj)
               
    def SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByUsernameByPath(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPath(set_type, obj)
               
    def SetGameProfileContentByGameIdByUsernameByPath(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPath('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByUsernameByPathByVersion(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPathByVersion(set_type, obj)
               
    def SetGameProfileContentByGameIdByUsernameByPathByVersion(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPathByVersion('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self, set_type, obj) :
        return self.act.SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(set_type, obj)
               
    def SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self, set_type, obj) :
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
    def SetGameAppByUuid(self, set_type, obj) :
        return self.act.SetGameAppByUuid(set_type, obj)
               
    def SetGameAppByUuid(self, set_type, obj) :
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
    def CountOffer(self
    ) :         
        return self.act.CountOffer(
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferByUuid(self
        , uuid
    ) :         
        return self.act.CountOfferByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferByCode(self
        , code
    ) :         
        return self.act.CountOfferByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferByName(self
        , name
    ) :         
        return self.act.CountOfferByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferByOrgId(self
        , org_id
    ) :         
        return self.act.CountOfferByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferListByFilter(self, filter_obj) :
        return self.act.BrowseOfferListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferByUuid(self, set_type, obj) :
        return self.act.SetOfferByUuid(set_type, obj)
               
    def SetOfferByUuid(self, set_type, obj) :
        return self.act.SetOfferByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferByUuid(self
        , uuid
    ) :          
        return self.act.DelOfferByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelOfferByOrgId(self
        , org_id
    ) :          
        return self.act.DelOfferByOrgId(
        org_id
        )
#------------------------------------------------------------------------------                    
    def GetOfferList(self
        ) :
            return self.act.GetOfferList(
            )
        
    def GetOffer(self
    ) :
        for item in self.GetOfferList(
        ) :
            return item
        return None
    
    def CachedGetOfferList(self
    ) :
        return CachedGetOfferList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetOfferList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<Offer> objs;

        string method_name = "CachedGetOfferList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Offer>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferListByUuid(self
        , uuid
        ) :
            return self.act.GetOfferListByUuid(
                uuid
            )
        
    def GetOfferByUuid(self
        , uuid
    ) :
        for item in self.GetOfferListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferListByUuid(self
        , uuid
    ) :
        return CachedGetOfferListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Offer> objs;

        string method_name = "CachedGetOfferListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Offer>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferListByCode(self
        , code
        ) :
            return self.act.GetOfferListByCode(
                code
            )
        
    def GetOfferByCode(self
        , code
    ) :
        for item in self.GetOfferListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetOfferListByCode(self
        , code
    ) :
        return CachedGetOfferListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetOfferListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Offer> objs;

        string method_name = "CachedGetOfferListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Offer>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferListByName(self
        , name
        ) :
            return self.act.GetOfferListByName(
                name
            )
        
    def GetOfferByName(self
        , name
    ) :
        for item in self.GetOfferListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetOfferListByName(self
        , name
    ) :
        return CachedGetOfferListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetOfferListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Offer> objs;

        string method_name = "CachedGetOfferListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Offer>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferListByOrgId(self
        , org_id
        ) :
            return self.act.GetOfferListByOrgId(
                org_id
            )
        
    def GetOfferByOrgId(self
        , org_id
    ) :
        for item in self.GetOfferListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetOfferListByOrgId(self
        , org_id
    ) :
        return CachedGetOfferListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetOfferListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<Offer> objs;

        string method_name = "CachedGetOfferListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Offer>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountOfferType(self
    ) :         
        return self.act.CountOfferType(
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferTypeByUuid(self
        , uuid
    ) :         
        return self.act.CountOfferTypeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferTypeByCode(self
        , code
    ) :         
        return self.act.CountOfferTypeByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferTypeByName(self
        , name
    ) :         
        return self.act.CountOfferTypeByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferTypeListByFilter(self, filter_obj) :
        return self.act.BrowseOfferTypeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferTypeByUuid(self, set_type, obj) :
        return self.act.SetOfferTypeByUuid(set_type, obj)
               
    def SetOfferTypeByUuid(self, set_type, obj) :
        return self.act.SetOfferTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelOfferTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetOfferTypeList(self
        ) :
            return self.act.GetOfferTypeList(
            )
        
    def GetOfferType(self
    ) :
        for item in self.GetOfferTypeList(
        ) :
            return item
        return None
    
    def CachedGetOfferTypeList(self
    ) :
        return CachedGetOfferTypeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetOfferTypeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<OfferType> objs;

        string method_name = "CachedGetOfferTypeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferTypeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferTypeListByUuid(self
        , uuid
        ) :
            return self.act.GetOfferTypeListByUuid(
                uuid
            )
        
    def GetOfferTypeByUuid(self
        , uuid
    ) :
        for item in self.GetOfferTypeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferTypeListByUuid(self
        , uuid
    ) :
        return CachedGetOfferTypeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferTypeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferType> objs;

        string method_name = "CachedGetOfferTypeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferTypeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferTypeListByCode(self
        , code
        ) :
            return self.act.GetOfferTypeListByCode(
                code
            )
        
    def GetOfferTypeByCode(self
        , code
    ) :
        for item in self.GetOfferTypeListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetOfferTypeListByCode(self
        , code
    ) :
        return CachedGetOfferTypeListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetOfferTypeListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<OfferType> objs;

        string method_name = "CachedGetOfferTypeListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferTypeListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferTypeListByName(self
        , name
        ) :
            return self.act.GetOfferTypeListByName(
                name
            )
        
    def GetOfferTypeByName(self
        , name
    ) :
        for item in self.GetOfferTypeListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetOfferTypeListByName(self
        , name
    ) :
        return CachedGetOfferTypeListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetOfferTypeListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<OfferType> objs;

        string method_name = "CachedGetOfferTypeListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferTypeListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountOfferLocation(self
    ) :         
        return self.act.CountOfferLocation(
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferLocationByUuid(self
        , uuid
    ) :         
        return self.act.CountOfferLocationByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferLocationByOfferId(self
        , offer_id
    ) :         
        return self.act.CountOfferLocationByOfferId(
        offer_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferLocationByCity(self
        , city
    ) :         
        return self.act.CountOfferLocationByCity(
        city
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferLocationByCountryCode(self
        , country_code
    ) :         
        return self.act.CountOfferLocationByCountryCode(
        country_code
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferLocationByPostalCode(self
        , postal_code
    ) :         
        return self.act.CountOfferLocationByPostalCode(
        postal_code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferLocationListByFilter(self, filter_obj) :
        return self.act.BrowseOfferLocationListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferLocationByUuid(self, set_type, obj) :
        return self.act.SetOfferLocationByUuid(set_type, obj)
               
    def SetOfferLocationByUuid(self, set_type, obj) :
        return self.act.SetOfferLocationByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferLocationByUuid(self
        , uuid
    ) :          
        return self.act.DelOfferLocationByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetOfferLocationList(self
        ) :
            return self.act.GetOfferLocationList(
            )
        
    def GetOfferLocation(self
    ) :
        for item in self.GetOfferLocationList(
        ) :
            return item
        return None
    
    def CachedGetOfferLocationList(self
    ) :
        return CachedGetOfferLocationList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetOfferLocationList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferLocationList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferLocationListByUuid(self
        , uuid
        ) :
            return self.act.GetOfferLocationListByUuid(
                uuid
            )
        
    def GetOfferLocationByUuid(self
        , uuid
    ) :
        for item in self.GetOfferLocationListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferLocationListByUuid(self
        , uuid
    ) :
        return CachedGetOfferLocationListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferLocationListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferLocationListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferLocationListByOfferId(self
        , offer_id
        ) :
            return self.act.GetOfferLocationListByOfferId(
                offer_id
            )
        
    def GetOfferLocationByOfferId(self
        , offer_id
    ) :
        for item in self.GetOfferLocationListByOfferId(
        offer_id
        ) :
            return item
        return None
    
    def CachedGetOfferLocationListByOfferId(self
        , offer_id
    ) :
        return CachedGetOfferLocationListByOfferId(
            false
            , self.CACHE_DEFAULT_HOURS
            , offer_id
        )
        
    def CachedGetOfferLocationListByOfferId(self
        , overrideCache
        , cacheHours
        , offer_id
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationListByOfferId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("offer_id".ToLower());
        sb.Append("_");
        sb.Append(offer_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferLocationListByOfferId(
                offer_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferLocationListByCity(self
        , city
        ) :
            return self.act.GetOfferLocationListByCity(
                city
            )
        
    def GetOfferLocationByCity(self
        , city
    ) :
        for item in self.GetOfferLocationListByCity(
        city
        ) :
            return item
        return None
    
    def CachedGetOfferLocationListByCity(self
        , city
    ) :
        return CachedGetOfferLocationListByCity(
            false
            , self.CACHE_DEFAULT_HOURS
            , city
        )
        
    def CachedGetOfferLocationListByCity(self
        , overrideCache
        , cacheHours
        , city
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationListByCity";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("city".ToLower());
        sb.Append("_");
        sb.Append(city);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferLocationListByCity(
                city
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferLocationListByCountryCode(self
        , country_code
        ) :
            return self.act.GetOfferLocationListByCountryCode(
                country_code
            )
        
    def GetOfferLocationByCountryCode(self
        , country_code
    ) :
        for item in self.GetOfferLocationListByCountryCode(
        country_code
        ) :
            return item
        return None
    
    def CachedGetOfferLocationListByCountryCode(self
        , country_code
    ) :
        return CachedGetOfferLocationListByCountryCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , country_code
        )
        
    def CachedGetOfferLocationListByCountryCode(self
        , overrideCache
        , cacheHours
        , country_code
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationListByCountryCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("country_code".ToLower());
        sb.Append("_");
        sb.Append(country_code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferLocationListByCountryCode(
                country_code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferLocationListByPostalCode(self
        , postal_code
        ) :
            return self.act.GetOfferLocationListByPostalCode(
                postal_code
            )
        
    def GetOfferLocationByPostalCode(self
        , postal_code
    ) :
        for item in self.GetOfferLocationListByPostalCode(
        postal_code
        ) :
            return item
        return None
    
    def CachedGetOfferLocationListByPostalCode(self
        , postal_code
    ) :
        return CachedGetOfferLocationListByPostalCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , postal_code
        )
        
    def CachedGetOfferLocationListByPostalCode(self
        , overrideCache
        , cacheHours
        , postal_code
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationListByPostalCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("postal_code".ToLower());
        sb.Append("_");
        sb.Append(postal_code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferLocationListByPostalCode(
                postal_code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountOfferCategory(self
    ) :         
        return self.act.CountOfferCategory(
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryByUuid(self
        , uuid
    ) :         
        return self.act.CountOfferCategoryByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryByCode(self
        , code
    ) :         
        return self.act.CountOfferCategoryByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryByName(self
        , name
    ) :         
        return self.act.CountOfferCategoryByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryByOrgId(self
        , org_id
    ) :         
        return self.act.CountOfferCategoryByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryByTypeId(self
        , type_id
    ) :         
        return self.act.CountOfferCategoryByTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :         
        return self.act.CountOfferCategoryByOrgIdByTypeId(
        org_id
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferCategoryListByFilter(self, filter_obj) :
        return self.act.BrowseOfferCategoryListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferCategoryByUuid(self, set_type, obj) :
        return self.act.SetOfferCategoryByUuid(set_type, obj)
               
    def SetOfferCategoryByUuid(self, set_type, obj) :
        return self.act.SetOfferCategoryByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferCategoryByUuid(self
        , uuid
    ) :          
        return self.act.DelOfferCategoryByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelOfferCategoryByCodeByOrgId(self
        , code
        , org_id
    ) :          
        return self.act.DelOfferCategoryByCodeByOrgId(
        code
        , org_id
        )
#------------------------------------------------------------------------------                    
    def DelOfferCategoryByCodeByOrgIdByTypeId(self
        , code
        , org_id
        , type_id
    ) :          
        return self.act.DelOfferCategoryByCodeByOrgIdByTypeId(
        code
        , org_id
        , type_id
        )
#------------------------------------------------------------------------------                    
    def GetOfferCategoryList(self
        ) :
            return self.act.GetOfferCategoryList(
            )
        
    def GetOfferCategory(self
    ) :
        for item in self.GetOfferCategoryList(
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryList(self
    ) :
        return CachedGetOfferCategoryList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetOfferCategoryList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListByUuid(self
        , uuid
        ) :
            return self.act.GetOfferCategoryListByUuid(
                uuid
            )
        
    def GetOfferCategoryByUuid(self
        , uuid
    ) :
        for item in self.GetOfferCategoryListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListByUuid(self
        , uuid
    ) :
        return CachedGetOfferCategoryListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferCategoryListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListByCode(self
        , code
        ) :
            return self.act.GetOfferCategoryListByCode(
                code
            )
        
    def GetOfferCategoryByCode(self
        , code
    ) :
        for item in self.GetOfferCategoryListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListByCode(self
        , code
    ) :
        return CachedGetOfferCategoryListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetOfferCategoryListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListByName(self
        , name
        ) :
            return self.act.GetOfferCategoryListByName(
                name
            )
        
    def GetOfferCategoryByName(self
        , name
    ) :
        for item in self.GetOfferCategoryListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListByName(self
        , name
    ) :
        return CachedGetOfferCategoryListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetOfferCategoryListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListByOrgId(self
        , org_id
        ) :
            return self.act.GetOfferCategoryListByOrgId(
                org_id
            )
        
    def GetOfferCategoryByOrgId(self
        , org_id
    ) :
        for item in self.GetOfferCategoryListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListByOrgId(self
        , org_id
    ) :
        return CachedGetOfferCategoryListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetOfferCategoryListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListByTypeId(self
        , type_id
        ) :
            return self.act.GetOfferCategoryListByTypeId(
                type_id
            )
        
    def GetOfferCategoryByTypeId(self
        , type_id
    ) :
        for item in self.GetOfferCategoryListByTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListByTypeId(self
        , type_id
    ) :
        return CachedGetOfferCategoryListByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetOfferCategoryListByTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryListByTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListByOrgIdByTypeId(self
        , org_id
        , type_id
        ) :
            return self.act.GetOfferCategoryListByOrgIdByTypeId(
                org_id
                , type_id
            )
        
    def GetOfferCategoryByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :
        for item in self.GetOfferCategoryListByOrgIdByTypeId(
        org_id
        , type_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :
        return CachedGetOfferCategoryListByOrgIdByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , type_id
        )
        
    def CachedGetOfferCategoryListByOrgIdByTypeId(self
        , overrideCache
        , cacheHours
        , org_id
        , type_id
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListByOrgIdByTypeId";

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

        objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryListByOrgIdByTypeId(
                org_id
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountOfferCategoryTree(self
    ) :         
        return self.act.CountOfferCategoryTree(
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryTreeByUuid(self
        , uuid
    ) :         
        return self.act.CountOfferCategoryTreeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryTreeByParentId(self
        , parent_id
    ) :         
        return self.act.CountOfferCategoryTreeByParentId(
        parent_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryTreeByCategoryId(self
        , category_id
    ) :         
        return self.act.CountOfferCategoryTreeByCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.act.CountOfferCategoryTreeByParentIdByCategoryId(
        parent_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferCategoryTreeListByFilter(self, filter_obj) :
        return self.act.BrowseOfferCategoryTreeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferCategoryTreeByUuid(self, set_type, obj) :
        return self.act.SetOfferCategoryTreeByUuid(set_type, obj)
               
    def SetOfferCategoryTreeByUuid(self, set_type, obj) :
        return self.act.SetOfferCategoryTreeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferCategoryTreeByUuid(self
        , uuid
    ) :          
        return self.act.DelOfferCategoryTreeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelOfferCategoryTreeByParentId(self
        , parent_id
    ) :          
        return self.act.DelOfferCategoryTreeByParentId(
        parent_id
        )
#------------------------------------------------------------------------------                    
    def DelOfferCategoryTreeByCategoryId(self
        , category_id
    ) :          
        return self.act.DelOfferCategoryTreeByCategoryId(
        category_id
        )
#------------------------------------------------------------------------------                    
    def DelOfferCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :          
        return self.act.DelOfferCategoryTreeByParentIdByCategoryId(
        parent_id
        , category_id
        )
#------------------------------------------------------------------------------                    
    def GetOfferCategoryTreeList(self
        ) :
            return self.act.GetOfferCategoryTreeList(
            )
        
    def GetOfferCategoryTree(self
    ) :
        for item in self.GetOfferCategoryTreeList(
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryTreeList(self
    ) :
        return CachedGetOfferCategoryTreeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetOfferCategoryTreeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<OfferCategoryTree> objs;

        string method_name = "CachedGetOfferCategoryTreeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryTreeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryTreeListByUuid(self
        , uuid
        ) :
            return self.act.GetOfferCategoryTreeListByUuid(
                uuid
            )
        
    def GetOfferCategoryTreeByUuid(self
        , uuid
    ) :
        for item in self.GetOfferCategoryTreeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryTreeListByUuid(self
        , uuid
    ) :
        return CachedGetOfferCategoryTreeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferCategoryTreeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferCategoryTree> objs;

        string method_name = "CachedGetOfferCategoryTreeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryTreeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryTreeListByParentId(self
        , parent_id
        ) :
            return self.act.GetOfferCategoryTreeListByParentId(
                parent_id
            )
        
    def GetOfferCategoryTreeByParentId(self
        , parent_id
    ) :
        for item in self.GetOfferCategoryTreeListByParentId(
        parent_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryTreeListByParentId(self
        , parent_id
    ) :
        return CachedGetOfferCategoryTreeListByParentId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
        )
        
    def CachedGetOfferCategoryTreeListByParentId(self
        , overrideCache
        , cacheHours
        , parent_id
    ) :
        pass
        """
        List<OfferCategoryTree> objs;

        string method_name = "CachedGetOfferCategoryTreeListByParentId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("parent_id".ToLower());
        sb.Append("_");
        sb.Append(parent_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryTreeListByParentId(
                parent_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryTreeListByCategoryId(self
        , category_id
        ) :
            return self.act.GetOfferCategoryTreeListByCategoryId(
                category_id
            )
        
    def GetOfferCategoryTreeByCategoryId(self
        , category_id
    ) :
        for item in self.GetOfferCategoryTreeListByCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryTreeListByCategoryId(self
        , category_id
    ) :
        return CachedGetOfferCategoryTreeListByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetOfferCategoryTreeListByCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<OfferCategoryTree> objs;

        string method_name = "CachedGetOfferCategoryTreeListByCategoryId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("category_id".ToLower());
        sb.Append("_");
        sb.Append(category_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryTreeListByCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryTreeListByParentIdByCategoryId(self
        , parent_id
        , category_id
        ) :
            return self.act.GetOfferCategoryTreeListByParentIdByCategoryId(
                parent_id
                , category_id
            )
        
    def GetOfferCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        for item in self.GetOfferCategoryTreeListByParentIdByCategoryId(
        parent_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryTreeListByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        return CachedGetOfferCategoryTreeListByParentIdByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
            , category_id
        )
        
    def CachedGetOfferCategoryTreeListByParentIdByCategoryId(self
        , overrideCache
        , cacheHours
        , parent_id
        , category_id
    ) :
        pass
        """
        List<OfferCategoryTree> objs;

        string method_name = "CachedGetOfferCategoryTreeListByParentIdByCategoryId";

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

        objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryTreeListByParentIdByCategoryId(
                parent_id
                , category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountOfferCategoryAssoc(self
    ) :         
        return self.act.CountOfferCategoryAssoc(
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryAssocByUuid(self
        , uuid
    ) :         
        return self.act.CountOfferCategoryAssocByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryAssocByOfferId(self
        , offer_id
    ) :         
        return self.act.CountOfferCategoryAssocByOfferId(
        offer_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryAssocByCategoryId(self
        , category_id
    ) :         
        return self.act.CountOfferCategoryAssocByCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryAssocByOfferIdByCategoryId(self
        , offer_id
        , category_id
    ) :         
        return self.act.CountOfferCategoryAssocByOfferIdByCategoryId(
        offer_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferCategoryAssocListByFilter(self, filter_obj) :
        return self.act.BrowseOfferCategoryAssocListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferCategoryAssocByUuid(self, set_type, obj) :
        return self.act.SetOfferCategoryAssocByUuid(set_type, obj)
               
    def SetOfferCategoryAssocByUuid(self, set_type, obj) :
        return self.act.SetOfferCategoryAssocByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferCategoryAssocByUuid(self
        , uuid
    ) :          
        return self.act.DelOfferCategoryAssocByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetOfferCategoryAssocList(self
        ) :
            return self.act.GetOfferCategoryAssocList(
            )
        
    def GetOfferCategoryAssoc(self
    ) :
        for item in self.GetOfferCategoryAssocList(
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryAssocList(self
    ) :
        return CachedGetOfferCategoryAssocList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetOfferCategoryAssocList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<OfferCategoryAssoc> objs;

        string method_name = "CachedGetOfferCategoryAssocList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryAssocList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryAssocListByUuid(self
        , uuid
        ) :
            return self.act.GetOfferCategoryAssocListByUuid(
                uuid
            )
        
    def GetOfferCategoryAssocByUuid(self
        , uuid
    ) :
        for item in self.GetOfferCategoryAssocListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryAssocListByUuid(self
        , uuid
    ) :
        return CachedGetOfferCategoryAssocListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferCategoryAssocListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferCategoryAssoc> objs;

        string method_name = "CachedGetOfferCategoryAssocListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryAssocListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryAssocListByOfferId(self
        , offer_id
        ) :
            return self.act.GetOfferCategoryAssocListByOfferId(
                offer_id
            )
        
    def GetOfferCategoryAssocByOfferId(self
        , offer_id
    ) :
        for item in self.GetOfferCategoryAssocListByOfferId(
        offer_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryAssocListByOfferId(self
        , offer_id
    ) :
        return CachedGetOfferCategoryAssocListByOfferId(
            false
            , self.CACHE_DEFAULT_HOURS
            , offer_id
        )
        
    def CachedGetOfferCategoryAssocListByOfferId(self
        , overrideCache
        , cacheHours
        , offer_id
    ) :
        pass
        """
        List<OfferCategoryAssoc> objs;

        string method_name = "CachedGetOfferCategoryAssocListByOfferId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("offer_id".ToLower());
        sb.Append("_");
        sb.Append(offer_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryAssocListByOfferId(
                offer_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryAssocListByCategoryId(self
        , category_id
        ) :
            return self.act.GetOfferCategoryAssocListByCategoryId(
                category_id
            )
        
    def GetOfferCategoryAssocByCategoryId(self
        , category_id
    ) :
        for item in self.GetOfferCategoryAssocListByCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryAssocListByCategoryId(self
        , category_id
    ) :
        return CachedGetOfferCategoryAssocListByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetOfferCategoryAssocListByCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<OfferCategoryAssoc> objs;

        string method_name = "CachedGetOfferCategoryAssocListByCategoryId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("category_id".ToLower());
        sb.Append("_");
        sb.Append(category_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryAssocListByCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryAssocListByOfferIdByCategoryId(self
        , offer_id
        , category_id
        ) :
            return self.act.GetOfferCategoryAssocListByOfferIdByCategoryId(
                offer_id
                , category_id
            )
        
    def GetOfferCategoryAssocByOfferIdByCategoryId(self
        , offer_id
        , category_id
    ) :
        for item in self.GetOfferCategoryAssocListByOfferIdByCategoryId(
        offer_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryAssocListByOfferIdByCategoryId(self
        , offer_id
        , category_id
    ) :
        return CachedGetOfferCategoryAssocListByOfferIdByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , offer_id
            , category_id
        )
        
    def CachedGetOfferCategoryAssocListByOfferIdByCategoryId(self
        , overrideCache
        , cacheHours
        , offer_id
        , category_id
    ) :
        pass
        """
        List<OfferCategoryAssoc> objs;

        string method_name = "CachedGetOfferCategoryAssocListByOfferIdByCategoryId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("offer_id".ToLower());
        sb.Append("_");
        sb.Append(offer_id);
        sb.Append("_");
        sb.Append("category_id".ToLower());
        sb.Append("_");
        sb.Append(category_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferCategoryAssocListByOfferIdByCategoryId(
                offer_id
                , category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountOfferGameLocation(self
    ) :         
        return self.act.CountOfferGameLocation(
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferGameLocationByUuid(self
        , uuid
    ) :         
        return self.act.CountOfferGameLocationByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferGameLocationByGameLocationId(self
        , game_location_id
    ) :         
        return self.act.CountOfferGameLocationByGameLocationId(
        game_location_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferGameLocationByOfferId(self
        , offer_id
    ) :         
        return self.act.CountOfferGameLocationByOfferId(
        offer_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferGameLocationByOfferIdByGameLocationId(self
        , offer_id
        , game_location_id
    ) :         
        return self.act.CountOfferGameLocationByOfferIdByGameLocationId(
        offer_id
        , game_location_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferGameLocationListByFilter(self, filter_obj) :
        return self.act.BrowseOfferGameLocationListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferGameLocationByUuid(self, set_type, obj) :
        return self.act.SetOfferGameLocationByUuid(set_type, obj)
               
    def SetOfferGameLocationByUuid(self, set_type, obj) :
        return self.act.SetOfferGameLocationByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferGameLocationByUuid(self
        , uuid
    ) :          
        return self.act.DelOfferGameLocationByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetOfferGameLocationList(self
        ) :
            return self.act.GetOfferGameLocationList(
            )
        
    def GetOfferGameLocation(self
    ) :
        for item in self.GetOfferGameLocationList(
        ) :
            return item
        return None
    
    def CachedGetOfferGameLocationList(self
    ) :
        return CachedGetOfferGameLocationList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetOfferGameLocationList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<OfferGameLocation> objs;

        string method_name = "CachedGetOfferGameLocationList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferGameLocationList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferGameLocationListByUuid(self
        , uuid
        ) :
            return self.act.GetOfferGameLocationListByUuid(
                uuid
            )
        
    def GetOfferGameLocationByUuid(self
        , uuid
    ) :
        for item in self.GetOfferGameLocationListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferGameLocationListByUuid(self
        , uuid
    ) :
        return CachedGetOfferGameLocationListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferGameLocationListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferGameLocation> objs;

        string method_name = "CachedGetOfferGameLocationListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferGameLocationListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferGameLocationListByGameLocationId(self
        , game_location_id
        ) :
            return self.act.GetOfferGameLocationListByGameLocationId(
                game_location_id
            )
        
    def GetOfferGameLocationByGameLocationId(self
        , game_location_id
    ) :
        for item in self.GetOfferGameLocationListByGameLocationId(
        game_location_id
        ) :
            return item
        return None
    
    def CachedGetOfferGameLocationListByGameLocationId(self
        , game_location_id
    ) :
        return CachedGetOfferGameLocationListByGameLocationId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_location_id
        )
        
    def CachedGetOfferGameLocationListByGameLocationId(self
        , overrideCache
        , cacheHours
        , game_location_id
    ) :
        pass
        """
        List<OfferGameLocation> objs;

        string method_name = "CachedGetOfferGameLocationListByGameLocationId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_location_id".ToLower());
        sb.Append("_");
        sb.Append(game_location_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferGameLocationListByGameLocationId(
                game_location_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferGameLocationListByOfferId(self
        , offer_id
        ) :
            return self.act.GetOfferGameLocationListByOfferId(
                offer_id
            )
        
    def GetOfferGameLocationByOfferId(self
        , offer_id
    ) :
        for item in self.GetOfferGameLocationListByOfferId(
        offer_id
        ) :
            return item
        return None
    
    def CachedGetOfferGameLocationListByOfferId(self
        , offer_id
    ) :
        return CachedGetOfferGameLocationListByOfferId(
            false
            , self.CACHE_DEFAULT_HOURS
            , offer_id
        )
        
    def CachedGetOfferGameLocationListByOfferId(self
        , overrideCache
        , cacheHours
        , offer_id
    ) :
        pass
        """
        List<OfferGameLocation> objs;

        string method_name = "CachedGetOfferGameLocationListByOfferId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("offer_id".ToLower());
        sb.Append("_");
        sb.Append(offer_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferGameLocationListByOfferId(
                offer_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferGameLocationListByOfferIdByGameLocationId(self
        , offer_id
        , game_location_id
        ) :
            return self.act.GetOfferGameLocationListByOfferIdByGameLocationId(
                offer_id
                , game_location_id
            )
        
    def GetOfferGameLocationByOfferIdByGameLocationId(self
        , offer_id
        , game_location_id
    ) :
        for item in self.GetOfferGameLocationListByOfferIdByGameLocationId(
        offer_id
        , game_location_id
        ) :
            return item
        return None
    
    def CachedGetOfferGameLocationListByOfferIdByGameLocationId(self
        , offer_id
        , game_location_id
    ) :
        return CachedGetOfferGameLocationListByOfferIdByGameLocationId(
            false
            , self.CACHE_DEFAULT_HOURS
            , offer_id
            , game_location_id
        )
        
    def CachedGetOfferGameLocationListByOfferIdByGameLocationId(self
        , overrideCache
        , cacheHours
        , offer_id
        , game_location_id
    ) :
        pass
        """
        List<OfferGameLocation> objs;

        string method_name = "CachedGetOfferGameLocationListByOfferIdByGameLocationId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("offer_id".ToLower());
        sb.Append("_");
        sb.Append(offer_id);
        sb.Append("_");
        sb.Append("game_location_id".ToLower());
        sb.Append("_");
        sb.Append(game_location_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOfferGameLocationListByOfferIdByGameLocationId(
                offer_id
                , game_location_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountEventInfo(self
    ) :         
        return self.act.CountEventInfo(
        )
        
#------------------------------------------------------------------------------                    
    def CountEventInfoByUuid(self
        , uuid
    ) :         
        return self.act.CountEventInfoByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountEventInfoByCode(self
        , code
    ) :         
        return self.act.CountEventInfoByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountEventInfoByName(self
        , name
    ) :         
        return self.act.CountEventInfoByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountEventInfoByOrgId(self
        , org_id
    ) :         
        return self.act.CountEventInfoByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseEventInfoListByFilter(self, filter_obj) :
        return self.act.BrowseEventInfoListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetEventInfoByUuid(self, set_type, obj) :
        return self.act.SetEventInfoByUuid(set_type, obj)
               
    def SetEventInfoByUuid(self, set_type, obj) :
        return self.act.SetEventInfoByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelEventInfoByUuid(self
        , uuid
    ) :          
        return self.act.DelEventInfoByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelEventInfoByOrgId(self
        , org_id
    ) :          
        return self.act.DelEventInfoByOrgId(
        org_id
        )
#------------------------------------------------------------------------------                    
    def GetEventInfoList(self
        ) :
            return self.act.GetEventInfoList(
            )
        
    def GetEventInfo(self
    ) :
        for item in self.GetEventInfoList(
        ) :
            return item
        return None
    
    def CachedGetEventInfoList(self
    ) :
        return CachedGetEventInfoList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetEventInfoList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<EventInfo> objs;

        string method_name = "CachedGetEventInfoList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventInfo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventInfoList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventInfoListByUuid(self
        , uuid
        ) :
            return self.act.GetEventInfoListByUuid(
                uuid
            )
        
    def GetEventInfoByUuid(self
        , uuid
    ) :
        for item in self.GetEventInfoListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetEventInfoListByUuid(self
        , uuid
    ) :
        return CachedGetEventInfoListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetEventInfoListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<EventInfo> objs;

        string method_name = "CachedGetEventInfoListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventInfo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventInfoListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventInfoListByCode(self
        , code
        ) :
            return self.act.GetEventInfoListByCode(
                code
            )
        
    def GetEventInfoByCode(self
        , code
    ) :
        for item in self.GetEventInfoListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetEventInfoListByCode(self
        , code
    ) :
        return CachedGetEventInfoListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetEventInfoListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<EventInfo> objs;

        string method_name = "CachedGetEventInfoListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventInfo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventInfoListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventInfoListByName(self
        , name
        ) :
            return self.act.GetEventInfoListByName(
                name
            )
        
    def GetEventInfoByName(self
        , name
    ) :
        for item in self.GetEventInfoListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetEventInfoListByName(self
        , name
    ) :
        return CachedGetEventInfoListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetEventInfoListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<EventInfo> objs;

        string method_name = "CachedGetEventInfoListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventInfo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventInfoListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventInfoListByOrgId(self
        , org_id
        ) :
            return self.act.GetEventInfoListByOrgId(
                org_id
            )
        
    def GetEventInfoByOrgId(self
        , org_id
    ) :
        for item in self.GetEventInfoListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetEventInfoListByOrgId(self
        , org_id
    ) :
        return CachedGetEventInfoListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetEventInfoListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<EventInfo> objs;

        string method_name = "CachedGetEventInfoListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventInfo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventInfoListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountEventLocation(self
    ) :         
        return self.act.CountEventLocation(
        )
        
#------------------------------------------------------------------------------                    
    def CountEventLocationByUuid(self
        , uuid
    ) :         
        return self.act.CountEventLocationByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountEventLocationByEventId(self
        , event_id
    ) :         
        return self.act.CountEventLocationByEventId(
        event_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventLocationByCity(self
        , city
    ) :         
        return self.act.CountEventLocationByCity(
        city
        )
        
#------------------------------------------------------------------------------                    
    def CountEventLocationByCountryCode(self
        , country_code
    ) :         
        return self.act.CountEventLocationByCountryCode(
        country_code
        )
        
#------------------------------------------------------------------------------                    
    def CountEventLocationByPostalCode(self
        , postal_code
    ) :         
        return self.act.CountEventLocationByPostalCode(
        postal_code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseEventLocationListByFilter(self, filter_obj) :
        return self.act.BrowseEventLocationListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetEventLocationByUuid(self, set_type, obj) :
        return self.act.SetEventLocationByUuid(set_type, obj)
               
    def SetEventLocationByUuid(self, set_type, obj) :
        return self.act.SetEventLocationByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelEventLocationByUuid(self
        , uuid
    ) :          
        return self.act.DelEventLocationByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetEventLocationList(self
        ) :
            return self.act.GetEventLocationList(
            )
        
    def GetEventLocation(self
    ) :
        for item in self.GetEventLocationList(
        ) :
            return item
        return None
    
    def CachedGetEventLocationList(self
    ) :
        return CachedGetEventLocationList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetEventLocationList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventLocationList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventLocationListByUuid(self
        , uuid
        ) :
            return self.act.GetEventLocationListByUuid(
                uuid
            )
        
    def GetEventLocationByUuid(self
        , uuid
    ) :
        for item in self.GetEventLocationListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetEventLocationListByUuid(self
        , uuid
    ) :
        return CachedGetEventLocationListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetEventLocationListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventLocationListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventLocationListByEventId(self
        , event_id
        ) :
            return self.act.GetEventLocationListByEventId(
                event_id
            )
        
    def GetEventLocationByEventId(self
        , event_id
    ) :
        for item in self.GetEventLocationListByEventId(
        event_id
        ) :
            return item
        return None
    
    def CachedGetEventLocationListByEventId(self
        , event_id
    ) :
        return CachedGetEventLocationListByEventId(
            false
            , self.CACHE_DEFAULT_HOURS
            , event_id
        )
        
    def CachedGetEventLocationListByEventId(self
        , overrideCache
        , cacheHours
        , event_id
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationListByEventId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("event_id".ToLower());
        sb.Append("_");
        sb.Append(event_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventLocationListByEventId(
                event_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventLocationListByCity(self
        , city
        ) :
            return self.act.GetEventLocationListByCity(
                city
            )
        
    def GetEventLocationByCity(self
        , city
    ) :
        for item in self.GetEventLocationListByCity(
        city
        ) :
            return item
        return None
    
    def CachedGetEventLocationListByCity(self
        , city
    ) :
        return CachedGetEventLocationListByCity(
            false
            , self.CACHE_DEFAULT_HOURS
            , city
        )
        
    def CachedGetEventLocationListByCity(self
        , overrideCache
        , cacheHours
        , city
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationListByCity";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("city".ToLower());
        sb.Append("_");
        sb.Append(city);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventLocationListByCity(
                city
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventLocationListByCountryCode(self
        , country_code
        ) :
            return self.act.GetEventLocationListByCountryCode(
                country_code
            )
        
    def GetEventLocationByCountryCode(self
        , country_code
    ) :
        for item in self.GetEventLocationListByCountryCode(
        country_code
        ) :
            return item
        return None
    
    def CachedGetEventLocationListByCountryCode(self
        , country_code
    ) :
        return CachedGetEventLocationListByCountryCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , country_code
        )
        
    def CachedGetEventLocationListByCountryCode(self
        , overrideCache
        , cacheHours
        , country_code
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationListByCountryCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("country_code".ToLower());
        sb.Append("_");
        sb.Append(country_code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventLocationListByCountryCode(
                country_code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventLocationListByPostalCode(self
        , postal_code
        ) :
            return self.act.GetEventLocationListByPostalCode(
                postal_code
            )
        
    def GetEventLocationByPostalCode(self
        , postal_code
    ) :
        for item in self.GetEventLocationListByPostalCode(
        postal_code
        ) :
            return item
        return None
    
    def CachedGetEventLocationListByPostalCode(self
        , postal_code
    ) :
        return CachedGetEventLocationListByPostalCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , postal_code
        )
        
    def CachedGetEventLocationListByPostalCode(self
        , overrideCache
        , cacheHours
        , postal_code
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationListByPostalCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("postal_code".ToLower());
        sb.Append("_");
        sb.Append(postal_code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventLocation>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventLocationListByPostalCode(
                postal_code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountEventCategory(self
    ) :         
        return self.act.CountEventCategory(
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryByUuid(self
        , uuid
    ) :         
        return self.act.CountEventCategoryByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryByCode(self
        , code
    ) :         
        return self.act.CountEventCategoryByCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryByName(self
        , name
    ) :         
        return self.act.CountEventCategoryByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryByOrgId(self
        , org_id
    ) :         
        return self.act.CountEventCategoryByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryByTypeId(self
        , type_id
    ) :         
        return self.act.CountEventCategoryByTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :         
        return self.act.CountEventCategoryByOrgIdByTypeId(
        org_id
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseEventCategoryListByFilter(self, filter_obj) :
        return self.act.BrowseEventCategoryListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetEventCategoryByUuid(self, set_type, obj) :
        return self.act.SetEventCategoryByUuid(set_type, obj)
               
    def SetEventCategoryByUuid(self, set_type, obj) :
        return self.act.SetEventCategoryByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelEventCategoryByUuid(self
        , uuid
    ) :          
        return self.act.DelEventCategoryByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelEventCategoryByCodeByOrgId(self
        , code
        , org_id
    ) :          
        return self.act.DelEventCategoryByCodeByOrgId(
        code
        , org_id
        )
#------------------------------------------------------------------------------                    
    def DelEventCategoryByCodeByOrgIdByTypeId(self
        , code
        , org_id
        , type_id
    ) :          
        return self.act.DelEventCategoryByCodeByOrgIdByTypeId(
        code
        , org_id
        , type_id
        )
#------------------------------------------------------------------------------                    
    def GetEventCategoryList(self
        ) :
            return self.act.GetEventCategoryList(
            )
        
    def GetEventCategory(self
    ) :
        for item in self.GetEventCategoryList(
        ) :
            return item
        return None
    
    def CachedGetEventCategoryList(self
    ) :
        return CachedGetEventCategoryList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetEventCategoryList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListByUuid(self
        , uuid
        ) :
            return self.act.GetEventCategoryListByUuid(
                uuid
            )
        
    def GetEventCategoryByUuid(self
        , uuid
    ) :
        for item in self.GetEventCategoryListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListByUuid(self
        , uuid
    ) :
        return CachedGetEventCategoryListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetEventCategoryListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListByCode(self
        , code
        ) :
            return self.act.GetEventCategoryListByCode(
                code
            )
        
    def GetEventCategoryByCode(self
        , code
    ) :
        for item in self.GetEventCategoryListByCode(
        code
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListByCode(self
        , code
    ) :
        return CachedGetEventCategoryListByCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetEventCategoryListByCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListByCode";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("code".ToLower());
        sb.Append("_");
        sb.Append(code);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryListByCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListByName(self
        , name
        ) :
            return self.act.GetEventCategoryListByName(
                name
            )
        
    def GetEventCategoryByName(self
        , name
    ) :
        for item in self.GetEventCategoryListByName(
        name
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListByName(self
        , name
    ) :
        return CachedGetEventCategoryListByName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetEventCategoryListByName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListByName";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("name".ToLower());
        sb.Append("_");
        sb.Append(name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryListByName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListByOrgId(self
        , org_id
        ) :
            return self.act.GetEventCategoryListByOrgId(
                org_id
            )
        
    def GetEventCategoryByOrgId(self
        , org_id
    ) :
        for item in self.GetEventCategoryListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListByOrgId(self
        , org_id
    ) :
        return CachedGetEventCategoryListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetEventCategoryListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListByTypeId(self
        , type_id
        ) :
            return self.act.GetEventCategoryListByTypeId(
                type_id
            )
        
    def GetEventCategoryByTypeId(self
        , type_id
    ) :
        for item in self.GetEventCategoryListByTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListByTypeId(self
        , type_id
    ) :
        return CachedGetEventCategoryListByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetEventCategoryListByTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListByTypeId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("type_id".ToLower());
        sb.Append("_");
        sb.Append(type_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryListByTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListByOrgIdByTypeId(self
        , org_id
        , type_id
        ) :
            return self.act.GetEventCategoryListByOrgIdByTypeId(
                org_id
                , type_id
            )
        
    def GetEventCategoryByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :
        for item in self.GetEventCategoryListByOrgIdByTypeId(
        org_id
        , type_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :
        return CachedGetEventCategoryListByOrgIdByTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , type_id
        )
        
    def CachedGetEventCategoryListByOrgIdByTypeId(self
        , overrideCache
        , cacheHours
        , org_id
        , type_id
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListByOrgIdByTypeId";

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

        objs = CacheUtil.Get<List<EventCategory>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryListByOrgIdByTypeId(
                org_id
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountEventCategoryTree(self
    ) :         
        return self.act.CountEventCategoryTree(
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryTreeByUuid(self
        , uuid
    ) :         
        return self.act.CountEventCategoryTreeByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryTreeByParentId(self
        , parent_id
    ) :         
        return self.act.CountEventCategoryTreeByParentId(
        parent_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryTreeByCategoryId(self
        , category_id
    ) :         
        return self.act.CountEventCategoryTreeByCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.act.CountEventCategoryTreeByParentIdByCategoryId(
        parent_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseEventCategoryTreeListByFilter(self, filter_obj) :
        return self.act.BrowseEventCategoryTreeListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetEventCategoryTreeByUuid(self, set_type, obj) :
        return self.act.SetEventCategoryTreeByUuid(set_type, obj)
               
    def SetEventCategoryTreeByUuid(self, set_type, obj) :
        return self.act.SetEventCategoryTreeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelEventCategoryTreeByUuid(self
        , uuid
    ) :          
        return self.act.DelEventCategoryTreeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelEventCategoryTreeByParentId(self
        , parent_id
    ) :          
        return self.act.DelEventCategoryTreeByParentId(
        parent_id
        )
#------------------------------------------------------------------------------                    
    def DelEventCategoryTreeByCategoryId(self
        , category_id
    ) :          
        return self.act.DelEventCategoryTreeByCategoryId(
        category_id
        )
#------------------------------------------------------------------------------                    
    def DelEventCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :          
        return self.act.DelEventCategoryTreeByParentIdByCategoryId(
        parent_id
        , category_id
        )
#------------------------------------------------------------------------------                    
    def GetEventCategoryTreeList(self
        ) :
            return self.act.GetEventCategoryTreeList(
            )
        
    def GetEventCategoryTree(self
    ) :
        for item in self.GetEventCategoryTreeList(
        ) :
            return item
        return None
    
    def CachedGetEventCategoryTreeList(self
    ) :
        return CachedGetEventCategoryTreeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetEventCategoryTreeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<EventCategoryTree> objs;

        string method_name = "CachedGetEventCategoryTreeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryTreeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryTreeListByUuid(self
        , uuid
        ) :
            return self.act.GetEventCategoryTreeListByUuid(
                uuid
            )
        
    def GetEventCategoryTreeByUuid(self
        , uuid
    ) :
        for item in self.GetEventCategoryTreeListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetEventCategoryTreeListByUuid(self
        , uuid
    ) :
        return CachedGetEventCategoryTreeListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetEventCategoryTreeListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<EventCategoryTree> objs;

        string method_name = "CachedGetEventCategoryTreeListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryTreeListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryTreeListByParentId(self
        , parent_id
        ) :
            return self.act.GetEventCategoryTreeListByParentId(
                parent_id
            )
        
    def GetEventCategoryTreeByParentId(self
        , parent_id
    ) :
        for item in self.GetEventCategoryTreeListByParentId(
        parent_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryTreeListByParentId(self
        , parent_id
    ) :
        return CachedGetEventCategoryTreeListByParentId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
        )
        
    def CachedGetEventCategoryTreeListByParentId(self
        , overrideCache
        , cacheHours
        , parent_id
    ) :
        pass
        """
        List<EventCategoryTree> objs;

        string method_name = "CachedGetEventCategoryTreeListByParentId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("parent_id".ToLower());
        sb.Append("_");
        sb.Append(parent_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryTreeListByParentId(
                parent_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryTreeListByCategoryId(self
        , category_id
        ) :
            return self.act.GetEventCategoryTreeListByCategoryId(
                category_id
            )
        
    def GetEventCategoryTreeByCategoryId(self
        , category_id
    ) :
        for item in self.GetEventCategoryTreeListByCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryTreeListByCategoryId(self
        , category_id
    ) :
        return CachedGetEventCategoryTreeListByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetEventCategoryTreeListByCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<EventCategoryTree> objs;

        string method_name = "CachedGetEventCategoryTreeListByCategoryId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("category_id".ToLower());
        sb.Append("_");
        sb.Append(category_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryTreeListByCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryTreeListByParentIdByCategoryId(self
        , parent_id
        , category_id
        ) :
            return self.act.GetEventCategoryTreeListByParentIdByCategoryId(
                parent_id
                , category_id
            )
        
    def GetEventCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        for item in self.GetEventCategoryTreeListByParentIdByCategoryId(
        parent_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryTreeListByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        return CachedGetEventCategoryTreeListByParentIdByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
            , category_id
        )
        
    def CachedGetEventCategoryTreeListByParentIdByCategoryId(self
        , overrideCache
        , cacheHours
        , parent_id
        , category_id
    ) :
        pass
        """
        List<EventCategoryTree> objs;

        string method_name = "CachedGetEventCategoryTreeListByParentIdByCategoryId";

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

        objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryTreeListByParentIdByCategoryId(
                parent_id
                , category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountEventCategoryAssoc(self
    ) :         
        return self.act.CountEventCategoryAssoc(
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryAssocByUuid(self
        , uuid
    ) :         
        return self.act.CountEventCategoryAssocByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryAssocByEventId(self
        , event_id
    ) :         
        return self.act.CountEventCategoryAssocByEventId(
        event_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryAssocByCategoryId(self
        , category_id
    ) :         
        return self.act.CountEventCategoryAssocByCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryAssocByEventIdByCategoryId(self
        , event_id
        , category_id
    ) :         
        return self.act.CountEventCategoryAssocByEventIdByCategoryId(
        event_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseEventCategoryAssocListByFilter(self, filter_obj) :
        return self.act.BrowseEventCategoryAssocListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetEventCategoryAssocByUuid(self, set_type, obj) :
        return self.act.SetEventCategoryAssocByUuid(set_type, obj)
               
    def SetEventCategoryAssocByUuid(self, set_type, obj) :
        return self.act.SetEventCategoryAssocByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelEventCategoryAssocByUuid(self
        , uuid
    ) :          
        return self.act.DelEventCategoryAssocByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetEventCategoryAssocList(self
        ) :
            return self.act.GetEventCategoryAssocList(
            )
        
    def GetEventCategoryAssoc(self
    ) :
        for item in self.GetEventCategoryAssocList(
        ) :
            return item
        return None
    
    def CachedGetEventCategoryAssocList(self
    ) :
        return CachedGetEventCategoryAssocList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetEventCategoryAssocList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<EventCategoryAssoc> objs;

        string method_name = "CachedGetEventCategoryAssocList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryAssocList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryAssocListByUuid(self
        , uuid
        ) :
            return self.act.GetEventCategoryAssocListByUuid(
                uuid
            )
        
    def GetEventCategoryAssocByUuid(self
        , uuid
    ) :
        for item in self.GetEventCategoryAssocListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetEventCategoryAssocListByUuid(self
        , uuid
    ) :
        return CachedGetEventCategoryAssocListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetEventCategoryAssocListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<EventCategoryAssoc> objs;

        string method_name = "CachedGetEventCategoryAssocListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryAssocListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryAssocListByEventId(self
        , event_id
        ) :
            return self.act.GetEventCategoryAssocListByEventId(
                event_id
            )
        
    def GetEventCategoryAssocByEventId(self
        , event_id
    ) :
        for item in self.GetEventCategoryAssocListByEventId(
        event_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryAssocListByEventId(self
        , event_id
    ) :
        return CachedGetEventCategoryAssocListByEventId(
            false
            , self.CACHE_DEFAULT_HOURS
            , event_id
        )
        
    def CachedGetEventCategoryAssocListByEventId(self
        , overrideCache
        , cacheHours
        , event_id
    ) :
        pass
        """
        List<EventCategoryAssoc> objs;

        string method_name = "CachedGetEventCategoryAssocListByEventId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("event_id".ToLower());
        sb.Append("_");
        sb.Append(event_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryAssocListByEventId(
                event_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryAssocListByCategoryId(self
        , category_id
        ) :
            return self.act.GetEventCategoryAssocListByCategoryId(
                category_id
            )
        
    def GetEventCategoryAssocByCategoryId(self
        , category_id
    ) :
        for item in self.GetEventCategoryAssocListByCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryAssocListByCategoryId(self
        , category_id
    ) :
        return CachedGetEventCategoryAssocListByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetEventCategoryAssocListByCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<EventCategoryAssoc> objs;

        string method_name = "CachedGetEventCategoryAssocListByCategoryId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("category_id".ToLower());
        sb.Append("_");
        sb.Append(category_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryAssocListByCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryAssocListByEventIdByCategoryId(self
        , event_id
        , category_id
        ) :
            return self.act.GetEventCategoryAssocListByEventIdByCategoryId(
                event_id
                , category_id
            )
        
    def GetEventCategoryAssocByEventIdByCategoryId(self
        , event_id
        , category_id
    ) :
        for item in self.GetEventCategoryAssocListByEventIdByCategoryId(
        event_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryAssocListByEventIdByCategoryId(self
        , event_id
        , category_id
    ) :
        return CachedGetEventCategoryAssocListByEventIdByCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , event_id
            , category_id
        )
        
    def CachedGetEventCategoryAssocListByEventIdByCategoryId(self
        , overrideCache
        , cacheHours
        , event_id
        , category_id
    ) :
        pass
        """
        List<EventCategoryAssoc> objs;

        string method_name = "CachedGetEventCategoryAssocListByEventIdByCategoryId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("event_id".ToLower());
        sb.Append("_");
        sb.Append(event_id);
        sb.Append("_");
        sb.Append("category_id".ToLower());
        sb.Append("_");
        sb.Append(category_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetEventCategoryAssocListByEventIdByCategoryId(
                event_id
                , category_id
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
    def SetChannelByUuid(self, set_type, obj) :
        return self.act.SetChannelByUuid(set_type, obj)
               
    def SetChannelByUuid(self, set_type, obj) :
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
    def GetChannelList(self
        ) :
            return self.act.GetChannelList(
            )
        
    def GetChannel(self
    ) :
        for item in self.GetChannelList(
        ) :
            return item
        return None
    
    def CachedGetChannelList(self
    ) :
        return CachedGetChannelList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetChannelList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Channel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
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
    def SetChannelTypeByUuid(self, set_type, obj) :
        return self.act.SetChannelTypeByUuid(set_type, obj)
               
    def SetChannelTypeByUuid(self, set_type, obj) :
        return self.act.SetChannelTypeByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelChannelTypeByUuid(self
        , uuid
    ) :          
        return self.act.DelChannelTypeByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetChannelTypeList(self
        ) :
            return self.act.GetChannelTypeList(
            )
        
    def GetChannelType(self
    ) :
        for item in self.GetChannelTypeList(
        ) :
            return item
        return None
    
    def CachedGetChannelTypeList(self
    ) :
        return CachedGetChannelTypeList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetChannelTypeList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ChannelType> objs;

        string method_name = "CachedGetChannelTypeList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ChannelType>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetChannelTypeList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
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
    def SetQuestionByUuid(self, set_type, obj) :
        return self.act.SetQuestionByUuid(set_type, obj)
               
    def SetQuestionByUuid(self, set_type, obj) :
        return self.act.SetQuestionByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetQuestionByChannelIdByCode(self, set_type, obj) :
        return self.act.SetQuestionByChannelIdByCode(set_type, obj)
               
    def SetQuestionByChannelIdByCode(self, set_type, obj) :
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
    def GetQuestionList(self
        ) :
            return self.act.GetQuestionList(
            )
        
    def GetQuestion(self
    ) :
        for item in self.GetQuestionList(
        ) :
            return item
        return None
    
    def CachedGetQuestionList(self
    ) :
        return CachedGetQuestionList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetQuestionList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Question>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetQuestionList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
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
    def CountProfileOffer(self
    ) :         
        return self.act.CountProfileOffer(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileOfferByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileOfferByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileOfferByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileOfferByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileOfferListByFilter(self, filter_obj) :
        return self.act.BrowseProfileOfferListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileOfferByUuid(self, set_type, obj) :
        return self.act.SetProfileOfferByUuid(set_type, obj)
               
    def SetProfileOfferByUuid(self, set_type, obj) :
        return self.act.SetProfileOfferByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileOfferByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileOfferByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileOfferByProfileId(self
        , profile_id
    ) :          
        return self.act.DelProfileOfferByProfileId(
        profile_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileOfferList(self
        ) :
            return self.act.GetProfileOfferList(
            )
        
    def GetProfileOffer(self
    ) :
        for item in self.GetProfileOfferList(
        ) :
            return item
        return None
    
    def CachedGetProfileOfferList(self
    ) :
        return CachedGetProfileOfferList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetProfileOfferList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ProfileOffer> objs;

        string method_name = "CachedGetProfileOfferList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileOffer>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileOfferList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileOfferListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileOfferListByUuid(
                uuid
            )
        
    def GetProfileOfferByUuid(self
        , uuid
    ) :
        for item in self.GetProfileOfferListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileOfferListByUuid(self
        , uuid
    ) :
        return CachedGetProfileOfferListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileOfferListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileOffer> objs;

        string method_name = "CachedGetProfileOfferListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileOffer>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileOfferListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileOfferListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileOfferListByProfileId(
                profile_id
            )
        
    def GetProfileOfferByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileOfferListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileOfferListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileOfferListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileOfferListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileOffer> objs;

        string method_name = "CachedGetProfileOfferListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileOffer>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileOfferListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileApp(self
    ) :         
        return self.act.CountProfileApp(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAppByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileAppByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAppByProfileIdByAppId(self
        , profile_id
        , app_id
    ) :         
        return self.act.CountProfileAppByProfileIdByAppId(
        profile_id
        , app_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileAppListByFilter(self, filter_obj) :
        return self.act.BrowseProfileAppListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileAppByUuid(self, set_type, obj) :
        return self.act.SetProfileAppByUuid(set_type, obj)
               
    def SetProfileAppByUuid(self, set_type, obj) :
        return self.act.SetProfileAppByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAppByProfileIdByAppId(self, set_type, obj) :
        return self.act.SetProfileAppByProfileIdByAppId(set_type, obj)
               
    def SetProfileAppByProfileIdByAppId(self, set_type, obj) :
        return self.act.SetProfileAppByProfileIdByAppId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileAppByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileAppByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileAppByProfileIdByAppId(self
        , profile_id
        , app_id
    ) :          
        return self.act.DelProfileAppByProfileIdByAppId(
        profile_id
        , app_id
        )
#------------------------------------------------------------------------------                    
    def GetProfileAppList(self
        ) :
            return self.act.GetProfileAppList(
            )
        
    def GetProfileApp(self
    ) :
        for item in self.GetProfileAppList(
        ) :
            return item
        return None
    
    def CachedGetProfileAppList(self
    ) :
        return CachedGetProfileAppList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetProfileAppList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ProfileApp> objs;

        string method_name = "CachedGetProfileAppList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAppList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAppListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileAppListByUuid(
                uuid
            )
        
    def GetProfileAppByUuid(self
        , uuid
    ) :
        for item in self.GetProfileAppListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileAppListByUuid(self
        , uuid
    ) :
        return CachedGetProfileAppListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileAppListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileApp> objs;

        string method_name = "CachedGetProfileAppListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAppListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAppListByAppId(self
        , app_id
        ) :
            return self.act.GetProfileAppListByAppId(
                app_id
            )
        
    def GetProfileAppByAppId(self
        , app_id
    ) :
        for item in self.GetProfileAppListByAppId(
        app_id
        ) :
            return item
        return None
    
    def CachedGetProfileAppListByAppId(self
        , app_id
    ) :
        return CachedGetProfileAppListByAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , app_id
        )
        
    def CachedGetProfileAppListByAppId(self
        , overrideCache
        , cacheHours
        , app_id
    ) :
        pass
        """
        List<ProfileApp> objs;

        string method_name = "CachedGetProfileAppListByAppId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("app_id".ToLower());
        sb.Append("_");
        sb.Append(app_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAppListByAppId(
                app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAppListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileAppListByProfileId(
                profile_id
            )
        
    def GetProfileAppByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileAppListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileAppListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileAppListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileAppListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileApp> objs;

        string method_name = "CachedGetProfileAppListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAppListByProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAppListByProfileIdByAppId(self
        , profile_id
        , app_id
        ) :
            return self.act.GetProfileAppListByProfileIdByAppId(
                profile_id
                , app_id
            )
        
    def GetProfileAppByProfileIdByAppId(self
        , profile_id
        , app_id
    ) :
        for item in self.GetProfileAppListByProfileIdByAppId(
        profile_id
        , app_id
        ) :
            return item
        return None
    
    def CachedGetProfileAppListByProfileIdByAppId(self
        , profile_id
        , app_id
    ) :
        return CachedGetProfileAppListByProfileIdByAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , app_id
        )
        
    def CachedGetProfileAppListByProfileIdByAppId(self
        , overrideCache
        , cacheHours
        , profile_id
        , app_id
    ) :
        pass
        """
        List<ProfileApp> objs;

        string method_name = "CachedGetProfileAppListByProfileIdByAppId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("app_id".ToLower());
        sb.Append("_");
        sb.Append(app_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileAppListByProfileIdByAppId(
                profile_id
                , app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountProfileOrg(self
    ) :         
        return self.act.CountProfileOrg(
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileOrgByUuid(self
        , uuid
    ) :         
        return self.act.CountProfileOrgByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileOrgByOrgId(self
        , org_id
    ) :         
        return self.act.CountProfileOrgByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileOrgByProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileOrgByProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileOrgListByFilter(self, filter_obj) :
        return self.act.BrowseProfileOrgListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileOrgByUuid(self, set_type, obj) :
        return self.act.SetProfileOrgByUuid(set_type, obj)
               
    def SetProfileOrgByUuid(self, set_type, obj) :
        return self.act.SetProfileOrgByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileOrgByUuid(self
        , uuid
    ) :          
        return self.act.DelProfileOrgByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def GetProfileOrgList(self
        ) :
            return self.act.GetProfileOrgList(
            )
        
    def GetProfileOrg(self
    ) :
        for item in self.GetProfileOrgList(
        ) :
            return item
        return None
    
    def CachedGetProfileOrgList(self
    ) :
        return CachedGetProfileOrgList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetProfileOrgList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ProfileOrg> objs;

        string method_name = "CachedGetProfileOrgList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileOrg>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileOrgList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileOrgListByUuid(self
        , uuid
        ) :
            return self.act.GetProfileOrgListByUuid(
                uuid
            )
        
    def GetProfileOrgByUuid(self
        , uuid
    ) :
        for item in self.GetProfileOrgListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileOrgListByUuid(self
        , uuid
    ) :
        return CachedGetProfileOrgListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileOrgListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileOrg> objs;

        string method_name = "CachedGetProfileOrgListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileOrg>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileOrgListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileOrgListByOrgId(self
        , org_id
        ) :
            return self.act.GetProfileOrgListByOrgId(
                org_id
            )
        
    def GetProfileOrgByOrgId(self
        , org_id
    ) :
        for item in self.GetProfileOrgListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetProfileOrgListByOrgId(self
        , org_id
    ) :
        return CachedGetProfileOrgListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetProfileOrgListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<ProfileOrg> objs;

        string method_name = "CachedGetProfileOrgListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileOrg>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileOrgListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileOrgListByProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileOrgListByProfileId(
                profile_id
            )
        
    def GetProfileOrgByProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileOrgListByProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileOrgListByProfileId(self
        , profile_id
    ) :
        return CachedGetProfileOrgListByProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileOrgListByProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileOrg> objs;

        string method_name = "CachedGetProfileOrgListByProfileId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileOrg>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileOrgListByProfileId(
                profile_id
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
    def SetProfileGameLocationByUuid(self, set_type, obj) :
        return self.act.SetProfileGameLocationByUuid(set_type, obj)
               
    def SetProfileGameLocationByUuid(self, set_type, obj) :
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
    def SetProfileQuestionByUuid(self, set_type, obj) :
        return self.act.SetProfileQuestionByUuid(set_type, obj)
               
    def SetProfileQuestionByUuid(self, set_type, obj) :
        return self.act.SetProfileQuestionByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionByChannelIdByProfileId(self, set_type, obj) :
        return self.act.SetProfileQuestionByChannelIdByProfileId(set_type, obj)
               
    def SetProfileQuestionByChannelIdByProfileId(self, set_type, obj) :
        return self.act.SetProfileQuestionByChannelIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionByQuestionIdByProfileId(self, set_type, obj) :
        return self.act.SetProfileQuestionByQuestionIdByProfileId(set_type, obj)
               
    def SetProfileQuestionByQuestionIdByProfileId(self, set_type, obj) :
        return self.act.SetProfileQuestionByQuestionIdByProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionByChannelIdByQuestionIdByProfileId(self, set_type, obj) :
        return self.act.SetProfileQuestionByChannelIdByQuestionIdByProfileId(set_type, obj)
               
    def SetProfileQuestionByChannelIdByQuestionIdByProfileId(self, set_type, obj) :
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
    def GetProfileQuestionList(self
        ) :
            return self.act.GetProfileQuestionList(
            )
        
    def GetProfileQuestion(self
    ) :
        for item in self.GetProfileQuestionList(
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionList(self
    ) :
        return CachedGetProfileQuestionList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetProfileQuestionList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileQuestionList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
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
    def SetProfileChannelByUuid(self, set_type, obj) :
        return self.act.SetProfileChannelByUuid(set_type, obj)
               
    def SetProfileChannelByUuid(self, set_type, obj) :
        return self.act.SetProfileChannelByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileChannelByChannelIdByProfileId(self, set_type, obj) :
        return self.act.SetProfileChannelByChannelIdByProfileId(set_type, obj)
               
    def SetProfileChannelByChannelIdByProfileId(self, set_type, obj) :
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
    def GetProfileChannelList(self
        ) :
            return self.act.GetProfileChannelList(
            )
        
    def GetProfileChannel(self
    ) :
        for item in self.GetProfileChannelList(
        ) :
            return item
        return None
    
    def CachedGetProfileChannelList(self
    ) :
        return CachedGetProfileChannelList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetProfileChannelList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<ProfileChannel> objs;

        string method_name = "CachedGetProfileChannelList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetProfileChannelList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
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
    def CountOrgSite(self
    ) :         
        return self.act.CountOrgSite(
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgSiteByUuid(self
        , uuid
    ) :         
        return self.act.CountOrgSiteByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgSiteByOrgId(self
        , org_id
    ) :         
        return self.act.CountOrgSiteByOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgSiteBySiteId(self
        , site_id
    ) :         
        return self.act.CountOrgSiteBySiteId(
        site_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgSiteByOrgIdBySiteId(self
        , org_id
        , site_id
    ) :         
        return self.act.CountOrgSiteByOrgIdBySiteId(
        org_id
        , site_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOrgSiteListByFilter(self, filter_obj) :
        return self.act.BrowseOrgSiteListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOrgSiteByUuid(self, set_type, obj) :
        return self.act.SetOrgSiteByUuid(set_type, obj)
               
    def SetOrgSiteByUuid(self, set_type, obj) :
        return self.act.SetOrgSiteByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetOrgSiteByOrgIdBySiteId(self, set_type, obj) :
        return self.act.SetOrgSiteByOrgIdBySiteId(set_type, obj)
               
    def SetOrgSiteByOrgIdBySiteId(self, set_type, obj) :
        return self.act.SetOrgSiteByOrgIdBySiteId('full', obj)
#------------------------------------------------------------------------------                    
    def DelOrgSiteByUuid(self
        , uuid
    ) :          
        return self.act.DelOrgSiteByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelOrgSiteByOrgIdBySiteId(self
        , org_id
        , site_id
    ) :          
        return self.act.DelOrgSiteByOrgIdBySiteId(
        org_id
        , site_id
        )
#------------------------------------------------------------------------------                    
    def GetOrgSiteList(self
        ) :
            return self.act.GetOrgSiteList(
            )
        
    def GetOrgSite(self
    ) :
        for item in self.GetOrgSiteList(
        ) :
            return item
        return None
    
    def CachedGetOrgSiteList(self
    ) :
        return CachedGetOrgSiteList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetOrgSiteList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<OrgSite> objs;

        string method_name = "CachedGetOrgSiteList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OrgSite>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgSiteList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgSiteListByUuid(self
        , uuid
        ) :
            return self.act.GetOrgSiteListByUuid(
                uuid
            )
        
    def GetOrgSiteByUuid(self
        , uuid
    ) :
        for item in self.GetOrgSiteListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOrgSiteListByUuid(self
        , uuid
    ) :
        return CachedGetOrgSiteListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOrgSiteListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OrgSite> objs;

        string method_name = "CachedGetOrgSiteListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OrgSite>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgSiteListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgSiteListByOrgId(self
        , org_id
        ) :
            return self.act.GetOrgSiteListByOrgId(
                org_id
            )
        
    def GetOrgSiteByOrgId(self
        , org_id
    ) :
        for item in self.GetOrgSiteListByOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetOrgSiteListByOrgId(self
        , org_id
    ) :
        return CachedGetOrgSiteListByOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetOrgSiteListByOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<OrgSite> objs;

        string method_name = "CachedGetOrgSiteListByOrgId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OrgSite>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgSiteListByOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgSiteListBySiteId(self
        , site_id
        ) :
            return self.act.GetOrgSiteListBySiteId(
                site_id
            )
        
    def GetOrgSiteBySiteId(self
        , site_id
    ) :
        for item in self.GetOrgSiteListBySiteId(
        site_id
        ) :
            return item
        return None
    
    def CachedGetOrgSiteListBySiteId(self
        , site_id
    ) :
        return CachedGetOrgSiteListBySiteId(
            false
            , self.CACHE_DEFAULT_HOURS
            , site_id
        )
        
    def CachedGetOrgSiteListBySiteId(self
        , overrideCache
        , cacheHours
        , site_id
    ) :
        pass
        """
        List<OrgSite> objs;

        string method_name = "CachedGetOrgSiteListBySiteId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("site_id".ToLower());
        sb.Append("_");
        sb.Append(site_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OrgSite>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgSiteListBySiteId(
                site_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgSiteListByOrgIdBySiteId(self
        , org_id
        , site_id
        ) :
            return self.act.GetOrgSiteListByOrgIdBySiteId(
                org_id
                , site_id
            )
        
    def GetOrgSiteByOrgIdBySiteId(self
        , org_id
        , site_id
    ) :
        for item in self.GetOrgSiteListByOrgIdBySiteId(
        org_id
        , site_id
        ) :
            return item
        return None
    
    def CachedGetOrgSiteListByOrgIdBySiteId(self
        , org_id
        , site_id
    ) :
        return CachedGetOrgSiteListByOrgIdBySiteId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , site_id
        )
        
    def CachedGetOrgSiteListByOrgIdBySiteId(self
        , overrideCache
        , cacheHours
        , org_id
        , site_id
    ) :
        pass
        """
        List<OrgSite> objs;

        string method_name = "CachedGetOrgSiteListByOrgIdBySiteId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("org_id".ToLower());
        sb.Append("_");
        sb.Append(org_id);
        sb.Append("_");
        sb.Append("site_id".ToLower());
        sb.Append("_");
        sb.Append(site_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<OrgSite>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetOrgSiteListByOrgIdBySiteId(
                org_id
                , site_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountSiteApp(self
    ) :         
        return self.act.CountSiteApp(
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteAppByUuid(self
        , uuid
    ) :         
        return self.act.CountSiteAppByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteAppByAppId(self
        , app_id
    ) :         
        return self.act.CountSiteAppByAppId(
        app_id
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteAppBySiteId(self
        , site_id
    ) :         
        return self.act.CountSiteAppBySiteId(
        site_id
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteAppByAppIdBySiteId(self
        , app_id
        , site_id
    ) :         
        return self.act.CountSiteAppByAppIdBySiteId(
        app_id
        , site_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseSiteAppListByFilter(self, filter_obj) :
        return self.act.BrowseSiteAppListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetSiteAppByUuid(self, set_type, obj) :
        return self.act.SetSiteAppByUuid(set_type, obj)
               
    def SetSiteAppByUuid(self, set_type, obj) :
        return self.act.SetSiteAppByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetSiteAppByAppIdBySiteId(self, set_type, obj) :
        return self.act.SetSiteAppByAppIdBySiteId(set_type, obj)
               
    def SetSiteAppByAppIdBySiteId(self, set_type, obj) :
        return self.act.SetSiteAppByAppIdBySiteId('full', obj)
#------------------------------------------------------------------------------                    
    def DelSiteAppByUuid(self
        , uuid
    ) :          
        return self.act.DelSiteAppByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelSiteAppByAppIdBySiteId(self
        , app_id
        , site_id
    ) :          
        return self.act.DelSiteAppByAppIdBySiteId(
        app_id
        , site_id
        )
#------------------------------------------------------------------------------                    
    def GetSiteAppList(self
        ) :
            return self.act.GetSiteAppList(
            )
        
    def GetSiteApp(self
    ) :
        for item in self.GetSiteAppList(
        ) :
            return item
        return None
    
    def CachedGetSiteAppList(self
    ) :
        return CachedGetSiteAppList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetSiteAppList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<SiteApp> objs;

        string method_name = "CachedGetSiteAppList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<SiteApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteAppList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteAppListByUuid(self
        , uuid
        ) :
            return self.act.GetSiteAppListByUuid(
                uuid
            )
        
    def GetSiteAppByUuid(self
        , uuid
    ) :
        for item in self.GetSiteAppListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetSiteAppListByUuid(self
        , uuid
    ) :
        return CachedGetSiteAppListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetSiteAppListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<SiteApp> objs;

        string method_name = "CachedGetSiteAppListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<SiteApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteAppListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteAppListByAppId(self
        , app_id
        ) :
            return self.act.GetSiteAppListByAppId(
                app_id
            )
        
    def GetSiteAppByAppId(self
        , app_id
    ) :
        for item in self.GetSiteAppListByAppId(
        app_id
        ) :
            return item
        return None
    
    def CachedGetSiteAppListByAppId(self
        , app_id
    ) :
        return CachedGetSiteAppListByAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , app_id
        )
        
    def CachedGetSiteAppListByAppId(self
        , overrideCache
        , cacheHours
        , app_id
    ) :
        pass
        """
        List<SiteApp> objs;

        string method_name = "CachedGetSiteAppListByAppId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("app_id".ToLower());
        sb.Append("_");
        sb.Append(app_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<SiteApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteAppListByAppId(
                app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteAppListBySiteId(self
        , site_id
        ) :
            return self.act.GetSiteAppListBySiteId(
                site_id
            )
        
    def GetSiteAppBySiteId(self
        , site_id
    ) :
        for item in self.GetSiteAppListBySiteId(
        site_id
        ) :
            return item
        return None
    
    def CachedGetSiteAppListBySiteId(self
        , site_id
    ) :
        return CachedGetSiteAppListBySiteId(
            false
            , self.CACHE_DEFAULT_HOURS
            , site_id
        )
        
    def CachedGetSiteAppListBySiteId(self
        , overrideCache
        , cacheHours
        , site_id
    ) :
        pass
        """
        List<SiteApp> objs;

        string method_name = "CachedGetSiteAppListBySiteId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("site_id".ToLower());
        sb.Append("_");
        sb.Append(site_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<SiteApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteAppListBySiteId(
                site_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteAppListByAppIdBySiteId(self
        , app_id
        , site_id
        ) :
            return self.act.GetSiteAppListByAppIdBySiteId(
                app_id
                , site_id
            )
        
    def GetSiteAppByAppIdBySiteId(self
        , app_id
        , site_id
    ) :
        for item in self.GetSiteAppListByAppIdBySiteId(
        app_id
        , site_id
        ) :
            return item
        return None
    
    def CachedGetSiteAppListByAppIdBySiteId(self
        , app_id
        , site_id
    ) :
        return CachedGetSiteAppListByAppIdBySiteId(
            false
            , self.CACHE_DEFAULT_HOURS
            , app_id
            , site_id
        )
        
    def CachedGetSiteAppListByAppIdBySiteId(self
        , overrideCache
        , cacheHours
        , app_id
        , site_id
    ) :
        pass
        """
        List<SiteApp> objs;

        string method_name = "CachedGetSiteAppListByAppIdBySiteId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("app_id".ToLower());
        sb.Append("_");
        sb.Append(app_id);
        sb.Append("_");
        sb.Append("site_id".ToLower());
        sb.Append("_");
        sb.Append(site_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<SiteApp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetSiteAppListByAppIdBySiteId(
                app_id
                , site_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountPhoto(self
    ) :         
        return self.act.CountPhoto(
        )
        
#------------------------------------------------------------------------------                    
    def CountPhotoByUuid(self
        , uuid
    ) :         
        return self.act.CountPhotoByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountPhotoByExternalId(self
        , external_id
    ) :         
        return self.act.CountPhotoByExternalId(
        external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountPhotoByUrl(self
        , url
    ) :         
        return self.act.CountPhotoByUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountPhotoByUrlByExternalId(self
        , url
        , external_id
    ) :         
        return self.act.CountPhotoByUrlByExternalId(
        url
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountPhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :         
        return self.act.CountPhotoByUuidByExternalId(
        uuid
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowsePhotoListByFilter(self, filter_obj) :
        return self.act.BrowsePhotoListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetPhotoByUuid(self, set_type, obj) :
        return self.act.SetPhotoByUuid(set_type, obj)
               
    def SetPhotoByUuid(self, set_type, obj) :
        return self.act.SetPhotoByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetPhotoByExternalId(self, set_type, obj) :
        return self.act.SetPhotoByExternalId(set_type, obj)
               
    def SetPhotoByExternalId(self, set_type, obj) :
        return self.act.SetPhotoByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetPhotoByUrl(self, set_type, obj) :
        return self.act.SetPhotoByUrl(set_type, obj)
               
    def SetPhotoByUrl(self, set_type, obj) :
        return self.act.SetPhotoByUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetPhotoByUrlByExternalId(self, set_type, obj) :
        return self.act.SetPhotoByUrlByExternalId(set_type, obj)
               
    def SetPhotoByUrlByExternalId(self, set_type, obj) :
        return self.act.SetPhotoByUrlByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetPhotoByUuidByExternalId(self, set_type, obj) :
        return self.act.SetPhotoByUuidByExternalId(set_type, obj)
               
    def SetPhotoByUuidByExternalId(self, set_type, obj) :
        return self.act.SetPhotoByUuidByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def DelPhotoByUuid(self
        , uuid
    ) :          
        return self.act.DelPhotoByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelPhotoByExternalId(self
        , external_id
    ) :          
        return self.act.DelPhotoByExternalId(
        external_id
        )
#------------------------------------------------------------------------------                    
    def DelPhotoByUrl(self
        , url
    ) :          
        return self.act.DelPhotoByUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelPhotoByUrlByExternalId(self
        , url
        , external_id
    ) :          
        return self.act.DelPhotoByUrlByExternalId(
        url
        , external_id
        )
#------------------------------------------------------------------------------                    
    def DelPhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :          
        return self.act.DelPhotoByUuidByExternalId(
        uuid
        , external_id
        )
#------------------------------------------------------------------------------                    
    def GetPhotoList(self
        ) :
            return self.act.GetPhotoList(
            )
        
    def GetPhoto(self
    ) :
        for item in self.GetPhotoList(
        ) :
            return item
        return None
    
    def CachedGetPhotoList(self
    ) :
        return CachedGetPhotoList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetPhotoList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Photo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetPhotoList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPhotoListByUuid(self
        , uuid
        ) :
            return self.act.GetPhotoListByUuid(
                uuid
            )
        
    def GetPhotoByUuid(self
        , uuid
    ) :
        for item in self.GetPhotoListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetPhotoListByUuid(self
        , uuid
    ) :
        return CachedGetPhotoListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetPhotoListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Photo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetPhotoListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPhotoListByExternalId(self
        , external_id
        ) :
            return self.act.GetPhotoListByExternalId(
                external_id
            )
        
    def GetPhotoByExternalId(self
        , external_id
    ) :
        for item in self.GetPhotoListByExternalId(
        external_id
        ) :
            return item
        return None
    
    def CachedGetPhotoListByExternalId(self
        , external_id
    ) :
        return CachedGetPhotoListByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , external_id
        )
        
    def CachedGetPhotoListByExternalId(self
        , overrideCache
        , cacheHours
        , external_id
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoListByExternalId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("external_id".ToLower());
        sb.Append("_");
        sb.Append(external_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Photo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetPhotoListByExternalId(
                external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPhotoListByUrl(self
        , url
        ) :
            return self.act.GetPhotoListByUrl(
                url
            )
        
    def GetPhotoByUrl(self
        , url
    ) :
        for item in self.GetPhotoListByUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetPhotoListByUrl(self
        , url
    ) :
        return CachedGetPhotoListByUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetPhotoListByUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoListByUrl";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Photo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetPhotoListByUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPhotoListByUrlByExternalId(self
        , url
        , external_id
        ) :
            return self.act.GetPhotoListByUrlByExternalId(
                url
                , external_id
            )
        
    def GetPhotoByUrlByExternalId(self
        , url
        , external_id
    ) :
        for item in self.GetPhotoListByUrlByExternalId(
        url
        , external_id
        ) :
            return item
        return None
    
    def CachedGetPhotoListByUrlByExternalId(self
        , url
        , external_id
    ) :
        return CachedGetPhotoListByUrlByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , external_id
        )
        
    def CachedGetPhotoListByUrlByExternalId(self
        , overrideCache
        , cacheHours
        , url
        , external_id
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoListByUrlByExternalId";

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

        objs = CacheUtil.Get<List<Photo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetPhotoListByUrlByExternalId(
                url
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPhotoListByUuidByExternalId(self
        , uuid
        , external_id
        ) :
            return self.act.GetPhotoListByUuidByExternalId(
                uuid
                , external_id
            )
        
    def GetPhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        for item in self.GetPhotoListByUuidByExternalId(
        uuid
        , external_id
        ) :
            return item
        return None
    
    def CachedGetPhotoListByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        return CachedGetPhotoListByUuidByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , external_id
        )
        
    def CachedGetPhotoListByUuidByExternalId(self
        , overrideCache
        , cacheHours
        , uuid
        , external_id
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoListByUuidByExternalId";

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

        objs = CacheUtil.Get<List<Photo>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetPhotoListByUuidByExternalId(
                uuid
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountVideo(self
    ) :         
        return self.act.CountVideo(
        )
        
#------------------------------------------------------------------------------                    
    def CountVideoByUuid(self
        , uuid
    ) :         
        return self.act.CountVideoByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountVideoByExternalId(self
        , external_id
    ) :         
        return self.act.CountVideoByExternalId(
        external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountVideoByUrl(self
        , url
    ) :         
        return self.act.CountVideoByUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountVideoByUrlByExternalId(self
        , url
        , external_id
    ) :         
        return self.act.CountVideoByUrlByExternalId(
        url
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :         
        return self.act.CountVideoByUuidByExternalId(
        uuid
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseVideoListByFilter(self, filter_obj) :
        return self.act.BrowseVideoListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetVideoByUuid(self, set_type, obj) :
        return self.act.SetVideoByUuid(set_type, obj)
               
    def SetVideoByUuid(self, set_type, obj) :
        return self.act.SetVideoByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetVideoByExternalId(self, set_type, obj) :
        return self.act.SetVideoByExternalId(set_type, obj)
               
    def SetVideoByExternalId(self, set_type, obj) :
        return self.act.SetVideoByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetVideoByUrl(self, set_type, obj) :
        return self.act.SetVideoByUrl(set_type, obj)
               
    def SetVideoByUrl(self, set_type, obj) :
        return self.act.SetVideoByUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetVideoByUrlByExternalId(self, set_type, obj) :
        return self.act.SetVideoByUrlByExternalId(set_type, obj)
               
    def SetVideoByUrlByExternalId(self, set_type, obj) :
        return self.act.SetVideoByUrlByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetVideoByUuidByExternalId(self, set_type, obj) :
        return self.act.SetVideoByUuidByExternalId(set_type, obj)
               
    def SetVideoByUuidByExternalId(self, set_type, obj) :
        return self.act.SetVideoByUuidByExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def DelVideoByUuid(self
        , uuid
    ) :          
        return self.act.DelVideoByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelVideoByExternalId(self
        , external_id
    ) :          
        return self.act.DelVideoByExternalId(
        external_id
        )
#------------------------------------------------------------------------------                    
    def DelVideoByUrl(self
        , url
    ) :          
        return self.act.DelVideoByUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelVideoByUrlByExternalId(self
        , url
        , external_id
    ) :          
        return self.act.DelVideoByUrlByExternalId(
        url
        , external_id
        )
#------------------------------------------------------------------------------                    
    def DelVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :          
        return self.act.DelVideoByUuidByExternalId(
        uuid
        , external_id
        )
#------------------------------------------------------------------------------                    
    def GetVideoList(self
        ) :
            return self.act.GetVideoList(
            )
        
    def GetVideo(self
    ) :
        for item in self.GetVideoList(
        ) :
            return item
        return None
    
    def CachedGetVideoList(self
    ) :
        return CachedGetVideoList(
            false
            , self.CACHE_DEFAULT_HOURS
        )
        
    def CachedGetVideoList(self
        , overrideCache
        , cacheHours
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoList";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Video>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetVideoList(
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetVideoListByUuid(self
        , uuid
        ) :
            return self.act.GetVideoListByUuid(
                uuid
            )
        
    def GetVideoByUuid(self
        , uuid
    ) :
        for item in self.GetVideoListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetVideoListByUuid(self
        , uuid
    ) :
        return CachedGetVideoListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetVideoListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Video>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetVideoListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetVideoListByExternalId(self
        , external_id
        ) :
            return self.act.GetVideoListByExternalId(
                external_id
            )
        
    def GetVideoByExternalId(self
        , external_id
    ) :
        for item in self.GetVideoListByExternalId(
        external_id
        ) :
            return item
        return None
    
    def CachedGetVideoListByExternalId(self
        , external_id
    ) :
        return CachedGetVideoListByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , external_id
        )
        
    def CachedGetVideoListByExternalId(self
        , overrideCache
        , cacheHours
        , external_id
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoListByExternalId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("external_id".ToLower());
        sb.Append("_");
        sb.Append(external_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Video>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetVideoListByExternalId(
                external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetVideoListByUrl(self
        , url
        ) :
            return self.act.GetVideoListByUrl(
                url
            )
        
    def GetVideoByUrl(self
        , url
    ) :
        for item in self.GetVideoListByUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetVideoListByUrl(self
        , url
    ) :
        return CachedGetVideoListByUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetVideoListByUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoListByUrl";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("url".ToLower());
        sb.Append("_");
        sb.Append(url);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<Video>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetVideoListByUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetVideoListByUrlByExternalId(self
        , url
        , external_id
        ) :
            return self.act.GetVideoListByUrlByExternalId(
                url
                , external_id
            )
        
    def GetVideoByUrlByExternalId(self
        , url
        , external_id
    ) :
        for item in self.GetVideoListByUrlByExternalId(
        url
        , external_id
        ) :
            return item
        return None
    
    def CachedGetVideoListByUrlByExternalId(self
        , url
        , external_id
    ) :
        return CachedGetVideoListByUrlByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , external_id
        )
        
    def CachedGetVideoListByUrlByExternalId(self
        , overrideCache
        , cacheHours
        , url
        , external_id
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoListByUrlByExternalId";

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

        objs = CacheUtil.Get<List<Video>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetVideoListByUrlByExternalId(
                url
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetVideoListByUuidByExternalId(self
        , uuid
        , external_id
        ) :
            return self.act.GetVideoListByUuidByExternalId(
                uuid
                , external_id
            )
        
    def GetVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        for item in self.GetVideoListByUuidByExternalId(
        uuid
        , external_id
        ) :
            return item
        return None
    
    def CachedGetVideoListByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        return CachedGetVideoListByUuidByExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , external_id
        )
        
    def CachedGetVideoListByUuidByExternalId(self
        , overrideCache
        , cacheHours
        , uuid
        , external_id
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoListByUuidByExternalId";

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

        objs = CacheUtil.Get<List<Video>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetVideoListByUuidByExternalId(
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
    def SetGameRpgItemWeaponByUuid(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUuid(set_type, obj)
               
    def SetGameRpgItemWeaponByUuid(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponByGameId(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByGameId(set_type, obj)
               
    def SetGameRpgItemWeaponByGameId(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponByUrl(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUrl(set_type, obj)
               
    def SetGameRpgItemWeaponByUrl(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponByUrlByGameId(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUrlByGameId(set_type, obj)
               
    def SetGameRpgItemWeaponByUrlByGameId(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUrlByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemWeaponByUuidByGameId(self, set_type, obj) :
        return self.act.SetGameRpgItemWeaponByUuidByGameId(set_type, obj)
               
    def SetGameRpgItemWeaponByUuidByGameId(self, set_type, obj) :
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
    def SetGameRpgItemSkillByUuid(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUuid(set_type, obj)
               
    def SetGameRpgItemSkillByUuid(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillByGameId(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByGameId(set_type, obj)
               
    def SetGameRpgItemSkillByGameId(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillByUrl(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUrl(set_type, obj)
               
    def SetGameRpgItemSkillByUrl(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillByUrlByGameId(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUrlByGameId(set_type, obj)
               
    def SetGameRpgItemSkillByUrlByGameId(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUrlByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameRpgItemSkillByUuidByGameId(self, set_type, obj) :
        return self.act.SetGameRpgItemSkillByUuidByGameId(set_type, obj)
               
    def SetGameRpgItemSkillByUuidByGameId(self, set_type, obj) :
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
    def SetGameProductByUuid(self, set_type, obj) :
        return self.act.SetGameProductByUuid(set_type, obj)
               
    def SetGameProductByUuid(self, set_type, obj) :
        return self.act.SetGameProductByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductByGameId(self, set_type, obj) :
        return self.act.SetGameProductByGameId(set_type, obj)
               
    def SetGameProductByGameId(self, set_type, obj) :
        return self.act.SetGameProductByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductByUrl(self, set_type, obj) :
        return self.act.SetGameProductByUrl(set_type, obj)
               
    def SetGameProductByUrl(self, set_type, obj) :
        return self.act.SetGameProductByUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductByUrlByGameId(self, set_type, obj) :
        return self.act.SetGameProductByUrlByGameId(set_type, obj)
               
    def SetGameProductByUrlByGameId(self, set_type, obj) :
        return self.act.SetGameProductByUrlByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameProductByUuidByGameId(self, set_type, obj) :
        return self.act.SetGameProductByUuidByGameId(set_type, obj)
               
    def SetGameProductByUuidByGameId(self, set_type, obj) :
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
    def CountGameStatisticLeaderboardByKey(self
        , key
    ) :         
        return self.act.CountGameStatisticLeaderboardByKey(
        key
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardByGameId(self
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardByKeyByGameId(
        key
        , game_id
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
    def CountGameStatisticLeaderboardByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
        key
        , profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
        key
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticLeaderboardListByFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticLeaderboardListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByUuid(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByUuid(set_type, obj)
               
    def SetGameStatisticLeaderboardByUuid(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByProfileIdByKey(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByProfileIdByKey(set_type, obj)
               
    def SetGameStatisticLeaderboardByProfileIdByKey(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByProfileIdByKey('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticLeaderboardByProfileIdByGameIdByKey(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByProfileIdByGameIdByKey(set_type, obj)
               
    def SetGameStatisticLeaderboardByProfileIdByGameIdByKey(self, set_type, obj) :
        return self.act.SetGameStatisticLeaderboardByProfileIdByGameIdByKey('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardByUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticLeaderboardByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticLeaderboardByKeyByGameId(self
        , key
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardByKeyByGameId(
        key
        , game_id
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
    def DelGameStatisticLeaderboardByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
        key
        , profile_id
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
    def GetGameStatisticLeaderboardListByKey(self
        , key
        ) :
            return self.act.GetGameStatisticLeaderboardListByKey(
                key
            )
        
    def GetGameStatisticLeaderboardByKey(self
        , key
    ) :
        for item in self.GetGameStatisticLeaderboardListByKey(
        key
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByKey(self
        , key
    ) :
        return CachedGetGameStatisticLeaderboardListByKey(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
        )
        
    def CachedGetGameStatisticLeaderboardListByKey(self
        , overrideCache
        , cacheHours
        , key
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByKey";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardListByKey(
                key
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
    def GetGameStatisticLeaderboardListByKeyByGameId(self
        , key
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardListByKeyByGameId(
                key
                , game_id
            )
        
    def GetGameStatisticLeaderboardByKeyByGameId(self
        , key
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardListByKeyByGameId(
        key
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByKeyByGameId(self
        , key
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardListByKeyByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardListByKeyByGameId(self
        , overrideCache
        , cacheHours
        , key
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByKeyByGameId";

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

        objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticLeaderboardListByKeyByGameId(
                key
                , game_id
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
    def GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
        ) :
            return self.act.GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            )
        
    def GetGameStatisticLeaderboardByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        for item in self.GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
        key
        , profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        return CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , profile_id
            , game_id
        )
        
    def CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , key
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);
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
            objs = GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
        key
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameStatisticLeaderboard> objs;

        string method_name = "CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);
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
            objs = GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
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
    def SetGameLiveQueueByUuid(self, set_type, obj) :
        return self.act.SetGameLiveQueueByUuid(set_type, obj)
               
    def SetGameLiveQueueByUuid(self, set_type, obj) :
        return self.act.SetGameLiveQueueByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLiveQueueByProfileIdByGameId(self, set_type, obj) :
        return self.act.SetGameLiveQueueByProfileIdByGameId(set_type, obj)
               
    def SetGameLiveQueueByProfileIdByGameId(self, set_type, obj) :
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
    def SetGameLiveRecentQueueByUuid(self, set_type, obj) :
        return self.act.SetGameLiveRecentQueueByUuid(set_type, obj)
               
    def SetGameLiveRecentQueueByUuid(self, set_type, obj) :
        return self.act.SetGameLiveRecentQueueByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLiveRecentQueueByProfileIdByGameId(self, set_type, obj) :
        return self.act.SetGameLiveRecentQueueByProfileIdByGameId(set_type, obj)
               
    def SetGameLiveRecentQueueByProfileIdByGameId(self, set_type, obj) :
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
    def CountGameStatistic(self
    ) :         
        return self.act.CountGameStatistic(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticByUuid(self
        , uuid
    ) :         
        return self.act.CountGameStatisticByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticByKey(self
        , key
    ) :         
        return self.act.CountGameStatisticByKey(
        key
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticByGameId(self
        , game_id
    ) :         
        return self.act.CountGameStatisticByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.act.CountGameStatisticByKeyByGameId(
        key
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameStatisticByProfileIdByGameId(
        profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameStatisticByKeyByProfileIdByGameId(
        key
        , profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
        key
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticListByFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticByUuid(self, set_type, obj) :
        return self.act.SetGameStatisticByUuid(set_type, obj)
               
    def SetGameStatisticByUuid(self, set_type, obj) :
        return self.act.SetGameStatisticByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticByUuidByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticByProfileIdByKey(self, set_type, obj) :
        return self.act.SetGameStatisticByProfileIdByKey(set_type, obj)
               
    def SetGameStatisticByProfileIdByKey(self, set_type, obj) :
        return self.act.SetGameStatisticByProfileIdByKey('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticByProfileIdByKeyByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticByProfileIdByKeyByTimestamp(set_type, obj)
               
    def SetGameStatisticByProfileIdByKeyByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticByProfileIdByKeyByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticByKeyByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticByProfileIdByGameIdByKey(self, set_type, obj) :
        return self.act.SetGameStatisticByProfileIdByGameIdByKey(set_type, obj)
               
    def SetGameStatisticByProfileIdByGameIdByKey(self, set_type, obj) :
        return self.act.SetGameStatisticByProfileIdByGameIdByKey('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticByUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticByKeyByGameId(self
        , key
        , game_id
    ) :          
        return self.act.DelGameStatisticByKeyByGameId(
        key
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameStatisticByProfileIdByGameId(
        profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :          
        return self.act.DelGameStatisticByKeyByProfileIdByGameId(
        key
        , profile_id
        , game_id
        )
#------------------------------------------------------------------------------                    
    def GetGameStatisticListByUuid(self
        , uuid
        ) :
            return self.act.GetGameStatisticListByUuid(
                uuid
            )
        
    def GetGameStatisticByUuid(self
        , uuid
    ) :
        for item in self.GetGameStatisticListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameStatisticListByUuid(self
        , uuid
    ) :
        return CachedGetGameStatisticListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameStatisticListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameStatistic> objs;

        string method_name = "CachedGetGameStatisticListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticListByKey(self
        , key
        ) :
            return self.act.GetGameStatisticListByKey(
                key
            )
        
    def GetGameStatisticByKey(self
        , key
    ) :
        for item in self.GetGameStatisticListByKey(
        key
        ) :
            return item
        return None
    
    def CachedGetGameStatisticListByKey(self
        , key
    ) :
        return CachedGetGameStatisticListByKey(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
        )
        
    def CachedGetGameStatisticListByKey(self
        , overrideCache
        , cacheHours
        , key
    ) :
        pass
        """
        List<GameStatistic> objs;

        string method_name = "CachedGetGameStatisticListByKey";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticListByKey(
                key
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticListByGameId(self
        , game_id
        ) :
            return self.act.GetGameStatisticListByGameId(
                game_id
            )
        
    def GetGameStatisticByGameId(self
        , game_id
    ) :
        for item in self.GetGameStatisticListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticListByGameId(self
        , game_id
    ) :
        return CachedGetGameStatisticListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameStatisticListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameStatistic> objs;

        string method_name = "CachedGetGameStatisticListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticListByKeyByGameId(self
        , key
        , game_id
        ) :
            return self.act.GetGameStatisticListByKeyByGameId(
                key
                , game_id
            )
        
    def GetGameStatisticByKeyByGameId(self
        , key
        , game_id
    ) :
        for item in self.GetGameStatisticListByKeyByGameId(
        key
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticListByKeyByGameId(self
        , key
        , game_id
    ) :
        return CachedGetGameStatisticListByKeyByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , game_id
        )
        
    def CachedGetGameStatisticListByKeyByGameId(self
        , overrideCache
        , cacheHours
        , key
        , game_id
    ) :
        pass
        """
        List<GameStatistic> objs;

        string method_name = "CachedGetGameStatisticListByKeyByGameId";

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

        objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticListByKeyByGameId(
                key
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameStatisticListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameStatisticListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameStatisticListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameStatisticListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameStatistic> objs;

        string method_name = "CachedGetGameStatisticListByProfileIdByGameId";

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

        objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameStatisticListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameStatisticByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameStatisticListByProfileIdByGameIdByTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameStatisticListByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameStatisticListByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameStatistic> objs;

        string method_name = "CachedGetGameStatisticListByProfileIdByGameIdByTimestamp";

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

        objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
        ) :
            return self.act.GetGameStatisticListByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            )
        
    def GetGameStatisticByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        for item in self.GetGameStatisticListByKeyByProfileIdByGameId(
        key
        , profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        return CachedGetGameStatisticListByKeyByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , profile_id
            , game_id
        )
        
    def CachedGetGameStatisticListByKeyByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , key
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameStatistic> objs;

        string method_name = "CachedGetGameStatisticListByKeyByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticListByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameStatisticByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
        key
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameStatistic> objs;

        string method_name = "CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);
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

        objs = CacheUtil.Get<List<GameStatistic>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
                key
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
    def CountGameStatisticMetaByName(self
        , name
    ) :         
        return self.act.CountGameStatisticMetaByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaByKey(self
        , key
    ) :         
        return self.act.CountGameStatisticMetaByKey(
        key
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaByGameId(self
        , game_id
    ) :         
        return self.act.CountGameStatisticMetaByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticMetaByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.act.CountGameStatisticMetaByKeyByGameId(
        key
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticMetaListByFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticMetaListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticMetaByUuid(self, set_type, obj) :
        return self.act.SetGameStatisticMetaByUuid(set_type, obj)
               
    def SetGameStatisticMetaByUuid(self, set_type, obj) :
        return self.act.SetGameStatisticMetaByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticMetaByKeyByGameId(self, set_type, obj) :
        return self.act.SetGameStatisticMetaByKeyByGameId(set_type, obj)
               
    def SetGameStatisticMetaByKeyByGameId(self, set_type, obj) :
        return self.act.SetGameStatisticMetaByKeyByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticMetaByUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticMetaByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticMetaByKeyByGameId(self
        , key
        , game_id
    ) :          
        return self.act.DelGameStatisticMetaByKeyByGameId(
        key
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
    def GetGameStatisticMetaListByKey(self
        , key
        ) :
            return self.act.GetGameStatisticMetaListByKey(
                key
            )
        
    def GetGameStatisticMetaByKey(self
        , key
    ) :
        for item in self.GetGameStatisticMetaListByKey(
        key
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListByKey(self
        , key
    ) :
        return CachedGetGameStatisticMetaListByKey(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
        )
        
    def CachedGetGameStatisticMetaListByKey(self
        , overrideCache
        , cacheHours
        , key
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListByKey";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticMetaListByKey(
                key
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
    def GetGameStatisticMetaListByKeyByGameId(self
        , key
        , game_id
        ) :
            return self.act.GetGameStatisticMetaListByKeyByGameId(
                key
                , game_id
            )
        
    def GetGameStatisticMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        for item in self.GetGameStatisticMetaListByKeyByGameId(
        key
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameStatisticMetaListByKeyByGameId(self
        , key
        , game_id
    ) :
        return CachedGetGameStatisticMetaListByKeyByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , game_id
        )
        
    def CachedGetGameStatisticMetaListByKeyByGameId(self
        , overrideCache
        , cacheHours
        , key
        , game_id
    ) :
        pass
        """
        List<GameStatisticMeta> objs;

        string method_name = "CachedGetGameStatisticMetaListByKeyByGameId";

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

        objs = CacheUtil.Get<List<GameStatisticMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticMetaListByKeyByGameId(
                key
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameStatisticTimestamp(self
    ) :         
        return self.act.CountGameStatisticTimestamp(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticTimestampByUuid(self
        , uuid
    ) :         
        return self.act.CountGameStatisticTimestampByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        key
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameStatisticTimestampListByFilter(self, filter_obj) :
        return self.act.BrowseGameStatisticTimestampListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticTimestampByUuid(self, set_type, obj) :
        return self.act.SetGameStatisticTimestampByUuid(set_type, obj)
               
    def SetGameStatisticTimestampByUuid(self, set_type, obj) :
        return self.act.SetGameStatisticTimestampByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameStatisticTimestampByUuid(self
        , uuid
    ) :          
        return self.act.DelGameStatisticTimestampByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :          
        return self.act.DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
        key
        , profile_id
        , game_id
        , timestamp
        )
#------------------------------------------------------------------------------                    
    def GetGameStatisticTimestampListByUuid(self
        , uuid
        ) :
            return self.act.GetGameStatisticTimestampListByUuid(
                uuid
            )
        
    def GetGameStatisticTimestampByUuid(self
        , uuid
    ) :
        for item in self.GetGameStatisticTimestampListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameStatisticTimestampListByUuid(self
        , uuid
    ) :
        return CachedGetGameStatisticTimestampListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameStatisticTimestampListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameStatisticTimestamp> objs;

        string method_name = "CachedGetGameStatisticTimestampListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameStatisticTimestamp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticTimestampListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
        key
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameStatisticTimestamp> objs;

        string method_name = "CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);
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

        objs = CacheUtil.Get<List<GameStatisticTimestamp>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
                key
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
    def SetGameKeyMetaByUuid(self, set_type, obj) :
        return self.act.SetGameKeyMetaByUuid(set_type, obj)
               
    def SetGameKeyMetaByUuid(self, set_type, obj) :
        return self.act.SetGameKeyMetaByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameKeyMetaByKeyByGameId(self, set_type, obj) :
        return self.act.SetGameKeyMetaByKeyByGameId(set_type, obj)
               
    def SetGameKeyMetaByKeyByGameId(self, set_type, obj) :
        return self.act.SetGameKeyMetaByKeyByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameKeyMetaByKeyByGameIdByLevel(self, set_type, obj) :
        return self.act.SetGameKeyMetaByKeyByGameIdByLevel(set_type, obj)
               
    def SetGameKeyMetaByKeyByGameIdByLevel(self, set_type, obj) :
        return self.act.SetGameKeyMetaByKeyByGameIdByLevel('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameKeyMetaByUuid(self
        , uuid
    ) :          
        return self.act.DelGameKeyMetaByUuid(
        uuid
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
    def CountGameLevelByName(self
        , name
    ) :         
        return self.act.CountGameLevelByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelByKey(self
        , key
    ) :         
        return self.act.CountGameLevelByKey(
        key
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelByGameId(self
        , game_id
    ) :         
        return self.act.CountGameLevelByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameLevelByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.act.CountGameLevelByKeyByGameId(
        key
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameLevelListByFilter(self, filter_obj) :
        return self.act.BrowseGameLevelListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameLevelByUuid(self, set_type, obj) :
        return self.act.SetGameLevelByUuid(set_type, obj)
               
    def SetGameLevelByUuid(self, set_type, obj) :
        return self.act.SetGameLevelByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameLevelByKeyByGameId(self, set_type, obj) :
        return self.act.SetGameLevelByKeyByGameId(set_type, obj)
               
    def SetGameLevelByKeyByGameId(self, set_type, obj) :
        return self.act.SetGameLevelByKeyByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameLevelByUuid(self
        , uuid
    ) :          
        return self.act.DelGameLevelByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameLevelByKeyByGameId(self
        , key
        , game_id
    ) :          
        return self.act.DelGameLevelByKeyByGameId(
        key
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
    def GetGameLevelListByKey(self
        , key
        ) :
            return self.act.GetGameLevelListByKey(
                key
            )
        
    def GetGameLevelByKey(self
        , key
    ) :
        for item in self.GetGameLevelListByKey(
        key
        ) :
            return item
        return None
    
    def CachedGetGameLevelListByKey(self
        , key
    ) :
        return CachedGetGameLevelListByKey(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
        )
        
    def CachedGetGameLevelListByKey(self
        , overrideCache
        , cacheHours
        , key
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListByKey";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLevelListByKey(
                key
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
    def GetGameLevelListByKeyByGameId(self
        , key
        , game_id
        ) :
            return self.act.GetGameLevelListByKeyByGameId(
                key
                , game_id
            )
        
    def GetGameLevelByKeyByGameId(self
        , key
        , game_id
    ) :
        for item in self.GetGameLevelListByKeyByGameId(
        key
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameLevelListByKeyByGameId(self
        , key
        , game_id
    ) :
        return CachedGetGameLevelListByKeyByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , game_id
        )
        
    def CachedGetGameLevelListByKeyByGameId(self
        , overrideCache
        , cacheHours
        , key
        , game_id
    ) :
        pass
        """
        List<GameLevel> objs;

        string method_name = "CachedGetGameLevelListByKeyByGameId";

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

        objs = CacheUtil.Get<List<GameLevel>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameLevelListByKeyByGameId(
                key
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def CountGameAchievement(self
    ) :         
        return self.act.CountGameAchievement(
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementByUuid(self
        , uuid
    ) :         
        return self.act.CountGameAchievementByUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementByProfileIdByKey(self
        , profile_id
        , key
    ) :         
        return self.act.CountGameAchievementByProfileIdByKey(
        profile_id
        , key
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementByUsername(self
        , username
    ) :         
        return self.act.CountGameAchievementByUsername(
        username
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :         
        return self.act.CountGameAchievementByKeyByProfileIdByGameId(
        key
        , profile_id
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.act.CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
        key
        , profile_id
        , game_id
        , timestamp
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameAchievementListByFilter(self, filter_obj) :
        return self.act.BrowseGameAchievementListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementByUuid(self, set_type, obj) :
        return self.act.SetGameAchievementByUuid(set_type, obj)
               
    def SetGameAchievementByUuid(self, set_type, obj) :
        return self.act.SetGameAchievementByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementByUuidByKey(self, set_type, obj) :
        return self.act.SetGameAchievementByUuidByKey(set_type, obj)
               
    def SetGameAchievementByUuidByKey(self, set_type, obj) :
        return self.act.SetGameAchievementByUuidByKey('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementByProfileIdByKey(self, set_type, obj) :
        return self.act.SetGameAchievementByProfileIdByKey(set_type, obj)
               
    def SetGameAchievementByProfileIdByKey(self, set_type, obj) :
        return self.act.SetGameAchievementByProfileIdByKey('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementByKeyByProfileIdByGameId(self, set_type, obj) :
        return self.act.SetGameAchievementByKeyByProfileIdByGameId(set_type, obj)
               
    def SetGameAchievementByKeyByProfileIdByGameId(self, set_type, obj) :
        return self.act.SetGameAchievementByKeyByProfileIdByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
               
    def SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        return self.act.SetGameAchievementByKeyByProfileIdByGameIdByTimestamp('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameAchievementByUuid(self
        , uuid
    ) :          
        return self.act.DelGameAchievementByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameAchievementByProfileIdByKey(self
        , profile_id
        , key
    ) :          
        return self.act.DelGameAchievementByProfileIdByKey(
        profile_id
        , key
        )
#------------------------------------------------------------------------------                    
    def DelGameAchievementByUuidByKey(self
        , uuid
        , key
    ) :          
        return self.act.DelGameAchievementByUuidByKey(
        uuid
        , key
        )
#------------------------------------------------------------------------------                    
    def GetGameAchievementListByUuid(self
        , uuid
        ) :
            return self.act.GetGameAchievementListByUuid(
                uuid
            )
        
    def GetGameAchievementByUuid(self
        , uuid
    ) :
        for item in self.GetGameAchievementListByUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetGameAchievementListByUuid(self
        , uuid
    ) :
        return CachedGetGameAchievementListByUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetGameAchievementListByUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<GameAchievement> objs;

        string method_name = "CachedGetGameAchievementListByUuid";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("uuid".ToLower());
        sb.Append("_");
        sb.Append(uuid);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementListByUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementListByProfileIdByKey(self
        , profile_id
        , key
        ) :
            return self.act.GetGameAchievementListByProfileIdByKey(
                profile_id
                , key
            )
        
    def GetGameAchievementByProfileIdByKey(self
        , profile_id
        , key
    ) :
        for item in self.GetGameAchievementListByProfileIdByKey(
        profile_id
        , key
        ) :
            return item
        return None
    
    def CachedGetGameAchievementListByProfileIdByKey(self
        , profile_id
        , key
    ) :
        return CachedGetGameAchievementListByProfileIdByKey(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , key
        )
        
    def CachedGetGameAchievementListByProfileIdByKey(self
        , overrideCache
        , cacheHours
        , profile_id
        , key
    ) :
        pass
        """
        List<GameAchievement> objs;

        string method_name = "CachedGetGameAchievementListByProfileIdByKey";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementListByProfileIdByKey(
                profile_id
                , key
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementListByUsername(self
        , username
        ) :
            return self.act.GetGameAchievementListByUsername(
                username
            )
        
    def GetGameAchievementByUsername(self
        , username
    ) :
        for item in self.GetGameAchievementListByUsername(
        username
        ) :
            return item
        return None
    
    def CachedGetGameAchievementListByUsername(self
        , username
    ) :
        return CachedGetGameAchievementListByUsername(
            false
            , self.CACHE_DEFAULT_HOURS
            , username
        )
        
    def CachedGetGameAchievementListByUsername(self
        , overrideCache
        , cacheHours
        , username
    ) :
        pass
        """
        List<GameAchievement> objs;

        string method_name = "CachedGetGameAchievementListByUsername";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("username".ToLower());
        sb.Append("_");
        sb.Append(username);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementListByUsername(
                username
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementListByKey(self
        , key
        ) :
            return self.act.GetGameAchievementListByKey(
                key
            )
        
    def GetGameAchievementByKey(self
        , key
    ) :
        for item in self.GetGameAchievementListByKey(
        key
        ) :
            return item
        return None
    
    def CachedGetGameAchievementListByKey(self
        , key
    ) :
        return CachedGetGameAchievementListByKey(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
        )
        
    def CachedGetGameAchievementListByKey(self
        , overrideCache
        , cacheHours
        , key
    ) :
        pass
        """
        List<GameAchievement> objs;

        string method_name = "CachedGetGameAchievementListByKey";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementListByKey(
                key
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementListByGameId(self
        , game_id
        ) :
            return self.act.GetGameAchievementListByGameId(
                game_id
            )
        
    def GetGameAchievementByGameId(self
        , game_id
    ) :
        for item in self.GetGameAchievementListByGameId(
        game_id
        ) :
            return item
        return None
    
    def CachedGetGameAchievementListByGameId(self
        , game_id
    ) :
        return CachedGetGameAchievementListByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_id
        )
        
    def CachedGetGameAchievementListByGameId(self
        , overrideCache
        , cacheHours
        , game_id
    ) :
        pass
        """
        List<GameAchievement> objs;

        string method_name = "CachedGetGameAchievementListByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementListByGameId(
                game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementListByKeyByGameId(self
        , key
        , game_id
        ) :
            return self.act.GetGameAchievementListByKeyByGameId(
                key
                , game_id
            )
        
    def GetGameAchievementByKeyByGameId(self
        , key
        , game_id
    ) :
        for item in self.GetGameAchievementListByKeyByGameId(
        key
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameAchievementListByKeyByGameId(self
        , key
        , game_id
    ) :
        return CachedGetGameAchievementListByKeyByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , game_id
        )
        
    def CachedGetGameAchievementListByKeyByGameId(self
        , overrideCache
        , cacheHours
        , key
        , game_id
    ) :
        pass
        """
        List<GameAchievement> objs;

        string method_name = "CachedGetGameAchievementListByKeyByGameId";

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

        objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementListByKeyByGameId(
                key
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementListByProfileIdByGameId(self
        , profile_id
        , game_id
        ) :
            return self.act.GetGameAchievementListByProfileIdByGameId(
                profile_id
                , game_id
            )
        
    def GetGameAchievementByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        for item in self.GetGameAchievementListByProfileIdByGameId(
        profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameAchievementListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return CachedGetGameAchievementListByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
        )
        
    def CachedGetGameAchievementListByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameAchievement> objs;

        string method_name = "CachedGetGameAchievementListByProfileIdByGameId";

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

        objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementListByProfileIdByGameId(
                profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameAchievementListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            )
        
    def GetGameAchievementByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameAchievementListByProfileIdByGameIdByTimestamp(
        profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameAchievementListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameAchievementListByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameAchievementListByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameAchievement> objs;

        string method_name = "CachedGetGameAchievementListByProfileIdByGameIdByTimestamp";

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

        objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
        ) :
            return self.act.GetGameAchievementListByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            )
        
    def GetGameAchievementByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        for item in self.GetGameAchievementListByKeyByProfileIdByGameId(
        key
        , profile_id
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameAchievementListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        return CachedGetGameAchievementListByKeyByProfileIdByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , profile_id
            , game_id
        )
        
    def CachedGetGameAchievementListByKeyByProfileIdByGameId(self
        , overrideCache
        , cacheHours
        , key
        , profile_id
        , game_id
    ) :
        pass
        """
        List<GameAchievement> objs;

        string method_name = "CachedGetGameAchievementListByKeyByProfileIdByGameId";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);
        sb.Append("_");
        sb.Append("profile_id".ToLower());
        sb.Append("_");
        sb.Append(profile_id);
        sb.Append("_");
        sb.Append("game_id".ToLower());
        sb.Append("_");
        sb.Append(game_id);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementListByKeyByProfileIdByGameId(
                key
                , profile_id
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
        ) :
            return self.act.GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
                key
                , profile_id
                , game_id
                , timestamp
            )
        
    def GetGameAchievementByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        for item in self.GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
        key
        , profile_id
        , game_id
        , timestamp
        ) :
            return item
        return None
    
    def CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        return CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , profile_id
            , game_id
            , timestamp
        )
        
    def CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(self
        , overrideCache
        , cacheHours
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        pass
        """
        List<GameAchievement> objs;

        string method_name = "CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);
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

        objs = CacheUtil.Get<List<GameAchievement>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
                key
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
    def CountGameAchievementMetaByName(self
        , name
    ) :         
        return self.act.CountGameAchievementMetaByName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaByKey(self
        , key
    ) :         
        return self.act.CountGameAchievementMetaByKey(
        key
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaByGameId(self
        , game_id
    ) :         
        return self.act.CountGameAchievementMetaByGameId(
        game_id
        )
        
#------------------------------------------------------------------------------                    
    def CountGameAchievementMetaByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.act.CountGameAchievementMetaByKeyByGameId(
        key
        , game_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseGameAchievementMetaListByFilter(self, filter_obj) :
        return self.act.BrowseGameAchievementMetaListByFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementMetaByUuid(self, set_type, obj) :
        return self.act.SetGameAchievementMetaByUuid(set_type, obj)
               
    def SetGameAchievementMetaByUuid(self, set_type, obj) :
        return self.act.SetGameAchievementMetaByUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetGameAchievementMetaByKeyByGameId(self, set_type, obj) :
        return self.act.SetGameAchievementMetaByKeyByGameId(set_type, obj)
               
    def SetGameAchievementMetaByKeyByGameId(self, set_type, obj) :
        return self.act.SetGameAchievementMetaByKeyByGameId('full', obj)
#------------------------------------------------------------------------------                    
    def DelGameAchievementMetaByUuid(self
        , uuid
    ) :          
        return self.act.DelGameAchievementMetaByUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelGameAchievementMetaByKeyByGameId(self
        , key
        , game_id
    ) :          
        return self.act.DelGameAchievementMetaByKeyByGameId(
        key
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
    def GetGameAchievementMetaListByKey(self
        , key
        ) :
            return self.act.GetGameAchievementMetaListByKey(
                key
            )
        
    def GetGameAchievementMetaByKey(self
        , key
    ) :
        for item in self.GetGameAchievementMetaListByKey(
        key
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListByKey(self
        , key
    ) :
        return CachedGetGameAchievementMetaListByKey(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
        )
        
    def CachedGetGameAchievementMetaListByKey(self
        , overrideCache
        , cacheHours
        , key
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListByKey";

        StringBuilder sb = new StringBuilder();
        sb.Length = 0;
        sb.Append(method_name);
        sb.Append("_");
        sb.Append("key".ToLower());
        sb.Append("_");
        sb.Append(key);

        string cache_key = sb.ToString();

        objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementMetaListByKey(
                key
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
    def GetGameAchievementMetaListByKeyByGameId(self
        , key
        , game_id
        ) :
            return self.act.GetGameAchievementMetaListByKeyByGameId(
                key
                , game_id
            )
        
    def GetGameAchievementMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        for item in self.GetGameAchievementMetaListByKeyByGameId(
        key
        , game_id
        ) :
            return item
        return None
    
    def CachedGetGameAchievementMetaListByKeyByGameId(self
        , key
        , game_id
    ) :
        return CachedGetGameAchievementMetaListByKeyByGameId(
            false
            , self.CACHE_DEFAULT_HOURS
            , key
            , game_id
        )
        
    def CachedGetGameAchievementMetaListByKeyByGameId(self
        , overrideCache
        , cacheHours
        , key
        , game_id
    ) :
        pass
        """
        List<GameAchievementMeta> objs;

        string method_name = "CachedGetGameAchievementMetaListByKeyByGameId";

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

        objs = CacheUtil.Get<List<GameAchievementMeta>>(cache_key);

        if (objs == None || overrideCache) // if object not cached, get and cache
        {
            objs = GetGameAchievementMetaListByKeyByGameId(
                key
                , game_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
        

