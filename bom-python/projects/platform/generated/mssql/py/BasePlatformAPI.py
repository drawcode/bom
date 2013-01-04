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
    def CountAppUuid(self
        , uuid
    ) :         
        return self.act.CountAppUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountAppCode(self
        , code
    ) :         
        return self.act.CountAppCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountAppTypeId(self
        , type_id
    ) :         
        return self.act.CountAppTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountAppCodeTypeId(self
        , code
        , type_id
    ) :         
        return self.act.CountAppCodeTypeId(
        code
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountAppPlatformTypeId(self
        , platform
        , type_id
    ) :         
        return self.act.CountAppPlatformTypeId(
        platform
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountAppPlatform(self
        , platform
    ) :         
        return self.act.CountAppPlatform(
        platform
        )
        
#------------------------------------------------------------------------------                    
    def BrowseAppListFilter(self, filter_obj) :
        return self.act.BrowseAppListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetAppUuidType(self, set_type, obj) :
        return self.act.SetAppUuid(set_type, obj)
               
    def SetAppUuid(self, obj) :
        return self.act.SetAppUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetAppCodeType(self, set_type, obj) :
        return self.act.SetAppCode(set_type, obj)
               
    def SetAppCode(self, obj) :
        return self.act.SetAppCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelAppUuid(self
        , uuid
    ) :          
        return self.act.DelAppUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelAppCode(self
        , code
    ) :          
        return self.act.DelAppCode(
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
    def GetAppListUuid(self
        , uuid
        ) :
            return self.act.GetAppListUuid(
                uuid
            )
        
    def GetAppUuid(self
        , uuid
    ) :
        for item in self.GetAppListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetAppListUuid(self
        , uuid
    ) :
        return CachedGetAppListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetAppListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListUuid";

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
            objs = GetAppListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListCode(self
        , code
        ) :
            return self.act.GetAppListCode(
                code
            )
        
    def GetAppCode(self
        , code
    ) :
        for item in self.GetAppListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetAppListCode(self
        , code
    ) :
        return CachedGetAppListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetAppListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListCode";

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
            objs = GetAppListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListTypeId(self
        , type_id
        ) :
            return self.act.GetAppListTypeId(
                type_id
            )
        
    def GetAppTypeId(self
        , type_id
    ) :
        for item in self.GetAppListTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetAppListTypeId(self
        , type_id
    ) :
        return CachedGetAppListTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetAppListTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListTypeId";

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
            objs = GetAppListTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListCodeTypeId(self
        , code
        , type_id
        ) :
            return self.act.GetAppListCodeTypeId(
                code
                , type_id
            )
        
    def GetAppCodeTypeId(self
        , code
        , type_id
    ) :
        for item in self.GetAppListCodeTypeId(
        code
        , type_id
        ) :
            return item
        return None
    
    def CachedGetAppListCodeTypeId(self
        , code
        , type_id
    ) :
        return CachedGetAppListCodeTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , type_id
        )
        
    def CachedGetAppListCodeTypeId(self
        , overrideCache
        , cacheHours
        , code
        , type_id
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListCodeTypeId";

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
            objs = GetAppListCodeTypeId(
                code
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListPlatformTypeId(self
        , platform
        , type_id
        ) :
            return self.act.GetAppListPlatformTypeId(
                platform
                , type_id
            )
        
    def GetAppPlatformTypeId(self
        , platform
        , type_id
    ) :
        for item in self.GetAppListPlatformTypeId(
        platform
        , type_id
        ) :
            return item
        return None
    
    def CachedGetAppListPlatformTypeId(self
        , platform
        , type_id
    ) :
        return CachedGetAppListPlatformTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , platform
            , type_id
        )
        
    def CachedGetAppListPlatformTypeId(self
        , overrideCache
        , cacheHours
        , platform
        , type_id
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListPlatformTypeId";

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
            objs = GetAppListPlatformTypeId(
                platform
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppListPlatform(self
        , platform
        ) :
            return self.act.GetAppListPlatform(
                platform
            )
        
    def GetAppPlatform(self
        , platform
    ) :
        for item in self.GetAppListPlatform(
        platform
        ) :
            return item
        return None
    
    def CachedGetAppListPlatform(self
        , platform
    ) :
        return CachedGetAppListPlatform(
            false
            , self.CACHE_DEFAULT_HOURS
            , platform
        )
        
    def CachedGetAppListPlatform(self
        , overrideCache
        , cacheHours
        , platform
    ) :
        pass
        """
        List<App> objs;

        string method_name = "CachedGetAppListPlatform";

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
            objs = GetAppListPlatform(
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
    def CountAppTypeUuid(self
        , uuid
    ) :         
        return self.act.CountAppTypeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountAppTypeCode(self
        , code
    ) :         
        return self.act.CountAppTypeCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseAppTypeListFilter(self, filter_obj) :
        return self.act.BrowseAppTypeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetAppTypeUuidType(self, set_type, obj) :
        return self.act.SetAppTypeUuid(set_type, obj)
               
    def SetAppTypeUuid(self, obj) :
        return self.act.SetAppTypeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetAppTypeCodeType(self, set_type, obj) :
        return self.act.SetAppTypeCode(set_type, obj)
               
    def SetAppTypeCode(self, obj) :
        return self.act.SetAppTypeCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelAppTypeUuid(self
        , uuid
    ) :          
        return self.act.DelAppTypeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelAppTypeCode(self
        , code
    ) :          
        return self.act.DelAppTypeCode(
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
    def GetAppTypeListUuid(self
        , uuid
        ) :
            return self.act.GetAppTypeListUuid(
                uuid
            )
        
    def GetAppTypeUuid(self
        , uuid
    ) :
        for item in self.GetAppTypeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetAppTypeListUuid(self
        , uuid
    ) :
        return CachedGetAppTypeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetAppTypeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<AppType> objs;

        string method_name = "CachedGetAppTypeListUuid";

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
            objs = GetAppTypeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetAppTypeListCode(self
        , code
        ) :
            return self.act.GetAppTypeListCode(
                code
            )
        
    def GetAppTypeCode(self
        , code
    ) :
        for item in self.GetAppTypeListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetAppTypeListCode(self
        , code
    ) :
        return CachedGetAppTypeListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetAppTypeListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<AppType> objs;

        string method_name = "CachedGetAppTypeListCode";

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
            objs = GetAppTypeListCode(
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
    def CountSiteUuid(self
        , uuid
    ) :         
        return self.act.CountSiteUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteCode(self
        , code
    ) :         
        return self.act.CountSiteCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteTypeId(self
        , type_id
    ) :         
        return self.act.CountSiteTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteCodeTypeId(self
        , code
        , type_id
    ) :         
        return self.act.CountSiteCodeTypeId(
        code
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteDomainTypeId(self
        , domain
        , type_id
    ) :         
        return self.act.CountSiteDomainTypeId(
        domain
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteDomain(self
        , domain
    ) :         
        return self.act.CountSiteDomain(
        domain
        )
        
#------------------------------------------------------------------------------                    
    def BrowseSiteListFilter(self, filter_obj) :
        return self.act.BrowseSiteListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetSiteUuidType(self, set_type, obj) :
        return self.act.SetSiteUuid(set_type, obj)
               
    def SetSiteUuid(self, obj) :
        return self.act.SetSiteUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetSiteCodeType(self, set_type, obj) :
        return self.act.SetSiteCode(set_type, obj)
               
    def SetSiteCode(self, obj) :
        return self.act.SetSiteCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelSiteUuid(self
        , uuid
    ) :          
        return self.act.DelSiteUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelSiteCode(self
        , code
    ) :          
        return self.act.DelSiteCode(
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
    def GetSiteListUuid(self
        , uuid
        ) :
            return self.act.GetSiteListUuid(
                uuid
            )
        
    def GetSiteUuid(self
        , uuid
    ) :
        for item in self.GetSiteListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetSiteListUuid(self
        , uuid
    ) :
        return CachedGetSiteListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetSiteListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListUuid";

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
            objs = GetSiteListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListCode(self
        , code
        ) :
            return self.act.GetSiteListCode(
                code
            )
        
    def GetSiteCode(self
        , code
    ) :
        for item in self.GetSiteListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetSiteListCode(self
        , code
    ) :
        return CachedGetSiteListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetSiteListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListCode";

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
            objs = GetSiteListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListTypeId(self
        , type_id
        ) :
            return self.act.GetSiteListTypeId(
                type_id
            )
        
    def GetSiteTypeId(self
        , type_id
    ) :
        for item in self.GetSiteListTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetSiteListTypeId(self
        , type_id
    ) :
        return CachedGetSiteListTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetSiteListTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListTypeId";

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
            objs = GetSiteListTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListCodeTypeId(self
        , code
        , type_id
        ) :
            return self.act.GetSiteListCodeTypeId(
                code
                , type_id
            )
        
    def GetSiteCodeTypeId(self
        , code
        , type_id
    ) :
        for item in self.GetSiteListCodeTypeId(
        code
        , type_id
        ) :
            return item
        return None
    
    def CachedGetSiteListCodeTypeId(self
        , code
        , type_id
    ) :
        return CachedGetSiteListCodeTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
            , type_id
        )
        
    def CachedGetSiteListCodeTypeId(self
        , overrideCache
        , cacheHours
        , code
        , type_id
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListCodeTypeId";

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
            objs = GetSiteListCodeTypeId(
                code
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListDomainTypeId(self
        , domain
        , type_id
        ) :
            return self.act.GetSiteListDomainTypeId(
                domain
                , type_id
            )
        
    def GetSiteDomainTypeId(self
        , domain
        , type_id
    ) :
        for item in self.GetSiteListDomainTypeId(
        domain
        , type_id
        ) :
            return item
        return None
    
    def CachedGetSiteListDomainTypeId(self
        , domain
        , type_id
    ) :
        return CachedGetSiteListDomainTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , domain
            , type_id
        )
        
    def CachedGetSiteListDomainTypeId(self
        , overrideCache
        , cacheHours
        , domain
        , type_id
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListDomainTypeId";

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
            objs = GetSiteListDomainTypeId(
                domain
                , type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteListDomain(self
        , domain
        ) :
            return self.act.GetSiteListDomain(
                domain
            )
        
    def GetSiteDomain(self
        , domain
    ) :
        for item in self.GetSiteListDomain(
        domain
        ) :
            return item
        return None
    
    def CachedGetSiteListDomain(self
        , domain
    ) :
        return CachedGetSiteListDomain(
            false
            , self.CACHE_DEFAULT_HOURS
            , domain
        )
        
    def CachedGetSiteListDomain(self
        , overrideCache
        , cacheHours
        , domain
    ) :
        pass
        """
        List<Site> objs;

        string method_name = "CachedGetSiteListDomain";

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
            objs = GetSiteListDomain(
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
    def CountSiteTypeUuid(self
        , uuid
    ) :         
        return self.act.CountSiteTypeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteTypeCode(self
        , code
    ) :         
        return self.act.CountSiteTypeCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseSiteTypeListFilter(self, filter_obj) :
        return self.act.BrowseSiteTypeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetSiteTypeUuidType(self, set_type, obj) :
        return self.act.SetSiteTypeUuid(set_type, obj)
               
    def SetSiteTypeUuid(self, obj) :
        return self.act.SetSiteTypeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetSiteTypeCodeType(self, set_type, obj) :
        return self.act.SetSiteTypeCode(set_type, obj)
               
    def SetSiteTypeCode(self, obj) :
        return self.act.SetSiteTypeCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelSiteTypeUuid(self
        , uuid
    ) :          
        return self.act.DelSiteTypeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelSiteTypeCode(self
        , code
    ) :          
        return self.act.DelSiteTypeCode(
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
    def GetSiteTypeListUuid(self
        , uuid
        ) :
            return self.act.GetSiteTypeListUuid(
                uuid
            )
        
    def GetSiteTypeUuid(self
        , uuid
    ) :
        for item in self.GetSiteTypeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetSiteTypeListUuid(self
        , uuid
    ) :
        return CachedGetSiteTypeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetSiteTypeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<SiteType> objs;

        string method_name = "CachedGetSiteTypeListUuid";

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
            objs = GetSiteTypeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteTypeListCode(self
        , code
        ) :
            return self.act.GetSiteTypeListCode(
                code
            )
        
    def GetSiteTypeCode(self
        , code
    ) :
        for item in self.GetSiteTypeListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetSiteTypeListCode(self
        , code
    ) :
        return CachedGetSiteTypeListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetSiteTypeListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<SiteType> objs;

        string method_name = "CachedGetSiteTypeListCode";

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
            objs = GetSiteTypeListCode(
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
    def CountOrgUuid(self
        , uuid
    ) :         
        return self.act.CountOrgUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgCode(self
        , code
    ) :         
        return self.act.CountOrgCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgName(self
        , name
    ) :         
        return self.act.CountOrgName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOrgListFilter(self, filter_obj) :
        return self.act.BrowseOrgListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOrgUuidType(self, set_type, obj) :
        return self.act.SetOrgUuid(set_type, obj)
               
    def SetOrgUuid(self, obj) :
        return self.act.SetOrgUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOrgUuid(self
        , uuid
    ) :          
        return self.act.DelOrgUuid(
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
    def GetOrgListUuid(self
        , uuid
        ) :
            return self.act.GetOrgListUuid(
                uuid
            )
        
    def GetOrgUuid(self
        , uuid
    ) :
        for item in self.GetOrgListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOrgListUuid(self
        , uuid
    ) :
        return CachedGetOrgListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOrgListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Org> objs;

        string method_name = "CachedGetOrgListUuid";

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
            objs = GetOrgListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgListCode(self
        , code
        ) :
            return self.act.GetOrgListCode(
                code
            )
        
    def GetOrgCode(self
        , code
    ) :
        for item in self.GetOrgListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetOrgListCode(self
        , code
    ) :
        return CachedGetOrgListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetOrgListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Org> objs;

        string method_name = "CachedGetOrgListCode";

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
            objs = GetOrgListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgListName(self
        , name
        ) :
            return self.act.GetOrgListName(
                name
            )
        
    def GetOrgName(self
        , name
    ) :
        for item in self.GetOrgListName(
        name
        ) :
            return item
        return None
    
    def CachedGetOrgListName(self
        , name
    ) :
        return CachedGetOrgListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetOrgListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Org> objs;

        string method_name = "CachedGetOrgListName";

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
            objs = GetOrgListName(
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
    def CountOrgTypeUuid(self
        , uuid
    ) :         
        return self.act.CountOrgTypeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgTypeCode(self
        , code
    ) :         
        return self.act.CountOrgTypeCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOrgTypeListFilter(self, filter_obj) :
        return self.act.BrowseOrgTypeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOrgTypeUuidType(self, set_type, obj) :
        return self.act.SetOrgTypeUuid(set_type, obj)
               
    def SetOrgTypeUuid(self, obj) :
        return self.act.SetOrgTypeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetOrgTypeCodeType(self, set_type, obj) :
        return self.act.SetOrgTypeCode(set_type, obj)
               
    def SetOrgTypeCode(self, obj) :
        return self.act.SetOrgTypeCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelOrgTypeUuid(self
        , uuid
    ) :          
        return self.act.DelOrgTypeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelOrgTypeCode(self
        , code
    ) :          
        return self.act.DelOrgTypeCode(
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
    def GetOrgTypeListUuid(self
        , uuid
        ) :
            return self.act.GetOrgTypeListUuid(
                uuid
            )
        
    def GetOrgTypeUuid(self
        , uuid
    ) :
        for item in self.GetOrgTypeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOrgTypeListUuid(self
        , uuid
    ) :
        return CachedGetOrgTypeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOrgTypeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OrgType> objs;

        string method_name = "CachedGetOrgTypeListUuid";

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
            objs = GetOrgTypeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgTypeListCode(self
        , code
        ) :
            return self.act.GetOrgTypeListCode(
                code
            )
        
    def GetOrgTypeCode(self
        , code
    ) :
        for item in self.GetOrgTypeListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetOrgTypeListCode(self
        , code
    ) :
        return CachedGetOrgTypeListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetOrgTypeListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<OrgType> objs;

        string method_name = "CachedGetOrgTypeListCode";

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
            objs = GetOrgTypeListCode(
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
    def CountContentItemUuid(self
        , uuid
    ) :         
        return self.act.CountContentItemUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountContentItemCode(self
        , code
    ) :         
        return self.act.CountContentItemCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountContentItemName(self
        , name
    ) :         
        return self.act.CountContentItemName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountContentItemPath(self
        , path
    ) :         
        return self.act.CountContentItemPath(
        path
        )
        
#------------------------------------------------------------------------------                    
    def BrowseContentItemListFilter(self, filter_obj) :
        return self.act.BrowseContentItemListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetContentItemUuidType(self, set_type, obj) :
        return self.act.SetContentItemUuid(set_type, obj)
               
    def SetContentItemUuid(self, obj) :
        return self.act.SetContentItemUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelContentItemUuid(self
        , uuid
    ) :          
        return self.act.DelContentItemUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelContentItemPath(self
        , path
    ) :          
        return self.act.DelContentItemPath(
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
    def GetContentItemListUuid(self
        , uuid
        ) :
            return self.act.GetContentItemListUuid(
                uuid
            )
        
    def GetContentItemUuid(self
        , uuid
    ) :
        for item in self.GetContentItemListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetContentItemListUuid(self
        , uuid
    ) :
        return CachedGetContentItemListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetContentItemListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ContentItem> objs;

        string method_name = "CachedGetContentItemListUuid";

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
            objs = GetContentItemListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentItemListCode(self
        , code
        ) :
            return self.act.GetContentItemListCode(
                code
            )
        
    def GetContentItemCode(self
        , code
    ) :
        for item in self.GetContentItemListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetContentItemListCode(self
        , code
    ) :
        return CachedGetContentItemListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetContentItemListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ContentItem> objs;

        string method_name = "CachedGetContentItemListCode";

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
            objs = GetContentItemListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentItemListName(self
        , name
        ) :
            return self.act.GetContentItemListName(
                name
            )
        
    def GetContentItemName(self
        , name
    ) :
        for item in self.GetContentItemListName(
        name
        ) :
            return item
        return None
    
    def CachedGetContentItemListName(self
        , name
    ) :
        return CachedGetContentItemListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetContentItemListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<ContentItem> objs;

        string method_name = "CachedGetContentItemListName";

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
            objs = GetContentItemListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentItemListPath(self
        , path
        ) :
            return self.act.GetContentItemListPath(
                path
            )
        
    def GetContentItemPath(self
        , path
    ) :
        for item in self.GetContentItemListPath(
        path
        ) :
            return item
        return None
    
    def CachedGetContentItemListPath(self
        , path
    ) :
        return CachedGetContentItemListPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , path
        )
        
    def CachedGetContentItemListPath(self
        , overrideCache
        , cacheHours
        , path
    ) :
        pass
        """
        List<ContentItem> objs;

        string method_name = "CachedGetContentItemListPath";

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
            objs = GetContentItemListPath(
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
    def CountContentItemTypeUuid(self
        , uuid
    ) :         
        return self.act.CountContentItemTypeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountContentItemTypeCode(self
        , code
    ) :         
        return self.act.CountContentItemTypeCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseContentItemTypeListFilter(self, filter_obj) :
        return self.act.BrowseContentItemTypeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetContentItemTypeUuidType(self, set_type, obj) :
        return self.act.SetContentItemTypeUuid(set_type, obj)
               
    def SetContentItemTypeUuid(self, obj) :
        return self.act.SetContentItemTypeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetContentItemTypeCodeType(self, set_type, obj) :
        return self.act.SetContentItemTypeCode(set_type, obj)
               
    def SetContentItemTypeCode(self, obj) :
        return self.act.SetContentItemTypeCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelContentItemTypeUuid(self
        , uuid
    ) :          
        return self.act.DelContentItemTypeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelContentItemTypeCode(self
        , code
    ) :          
        return self.act.DelContentItemTypeCode(
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
    def GetContentItemTypeListUuid(self
        , uuid
        ) :
            return self.act.GetContentItemTypeListUuid(
                uuid
            )
        
    def GetContentItemTypeUuid(self
        , uuid
    ) :
        for item in self.GetContentItemTypeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetContentItemTypeListUuid(self
        , uuid
    ) :
        return CachedGetContentItemTypeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetContentItemTypeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ContentItemType> objs;

        string method_name = "CachedGetContentItemTypeListUuid";

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
            objs = GetContentItemTypeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentItemTypeListCode(self
        , code
        ) :
            return self.act.GetContentItemTypeListCode(
                code
            )
        
    def GetContentItemTypeCode(self
        , code
    ) :
        for item in self.GetContentItemTypeListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetContentItemTypeListCode(self
        , code
    ) :
        return CachedGetContentItemTypeListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetContentItemTypeListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ContentItemType> objs;

        string method_name = "CachedGetContentItemTypeListCode";

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
            objs = GetContentItemTypeListCode(
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
    def CountContentPageUuid(self
        , uuid
    ) :         
        return self.act.CountContentPageUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountContentPageCode(self
        , code
    ) :         
        return self.act.CountContentPageCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountContentPageName(self
        , name
    ) :         
        return self.act.CountContentPageName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountContentPagePath(self
        , path
    ) :         
        return self.act.CountContentPagePath(
        path
        )
        
#------------------------------------------------------------------------------                    
    def BrowseContentPageListFilter(self, filter_obj) :
        return self.act.BrowseContentPageListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetContentPageUuidType(self, set_type, obj) :
        return self.act.SetContentPageUuid(set_type, obj)
               
    def SetContentPageUuid(self, obj) :
        return self.act.SetContentPageUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelContentPageUuid(self
        , uuid
    ) :          
        return self.act.DelContentPageUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelContentPagePathSiteId(self
        , path
        , site_id
    ) :          
        return self.act.DelContentPagePathSiteId(
        path
        , site_id
        )
#------------------------------------------------------------------------------                    
    def DelContentPagePath(self
        , path
    ) :          
        return self.act.DelContentPagePath(
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
    def GetContentPageListUuid(self
        , uuid
        ) :
            return self.act.GetContentPageListUuid(
                uuid
            )
        
    def GetContentPageUuid(self
        , uuid
    ) :
        for item in self.GetContentPageListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetContentPageListUuid(self
        , uuid
    ) :
        return CachedGetContentPageListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetContentPageListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListUuid";

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
            objs = GetContentPageListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListCode(self
        , code
        ) :
            return self.act.GetContentPageListCode(
                code
            )
        
    def GetContentPageCode(self
        , code
    ) :
        for item in self.GetContentPageListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetContentPageListCode(self
        , code
    ) :
        return CachedGetContentPageListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetContentPageListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListCode";

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
            objs = GetContentPageListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListName(self
        , name
        ) :
            return self.act.GetContentPageListName(
                name
            )
        
    def GetContentPageName(self
        , name
    ) :
        for item in self.GetContentPageListName(
        name
        ) :
            return item
        return None
    
    def CachedGetContentPageListName(self
        , name
    ) :
        return CachedGetContentPageListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetContentPageListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListName";

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
            objs = GetContentPageListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListPath(self
        , path
        ) :
            return self.act.GetContentPageListPath(
                path
            )
        
    def GetContentPagePath(self
        , path
    ) :
        for item in self.GetContentPageListPath(
        path
        ) :
            return item
        return None
    
    def CachedGetContentPageListPath(self
        , path
    ) :
        return CachedGetContentPageListPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , path
        )
        
    def CachedGetContentPageListPath(self
        , overrideCache
        , cacheHours
        , path
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListPath";

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
            objs = GetContentPageListPath(
                path
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListSiteId(self
        , site_id
        ) :
            return self.act.GetContentPageListSiteId(
                site_id
            )
        
    def GetContentPageSiteId(self
        , site_id
    ) :
        for item in self.GetContentPageListSiteId(
        site_id
        ) :
            return item
        return None
    
    def CachedGetContentPageListSiteId(self
        , site_id
    ) :
        return CachedGetContentPageListSiteId(
            false
            , self.CACHE_DEFAULT_HOURS
            , site_id
        )
        
    def CachedGetContentPageListSiteId(self
        , overrideCache
        , cacheHours
        , site_id
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListSiteId";

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
            objs = GetContentPageListSiteId(
                site_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetContentPageListSiteIdPath(self
        , site_id
        , path
        ) :
            return self.act.GetContentPageListSiteIdPath(
                site_id
                , path
            )
        
    def GetContentPageSiteIdPath(self
        , site_id
        , path
    ) :
        for item in self.GetContentPageListSiteIdPath(
        site_id
        , path
        ) :
            return item
        return None
    
    def CachedGetContentPageListSiteIdPath(self
        , site_id
        , path
    ) :
        return CachedGetContentPageListSiteIdPath(
            false
            , self.CACHE_DEFAULT_HOURS
            , site_id
            , path
        )
        
    def CachedGetContentPageListSiteIdPath(self
        , overrideCache
        , cacheHours
        , site_id
        , path
    ) :
        pass
        """
        List<ContentPage> objs;

        string method_name = "CachedGetContentPageListSiteIdPath";

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
            objs = GetContentPageListSiteIdPath(
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
    def CountMessageUuid(self
        , uuid
    ) :         
        return self.act.CountMessageUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def BrowseMessageListFilter(self, filter_obj) :
        return self.act.BrowseMessageListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetMessageUuidType(self, set_type, obj) :
        return self.act.SetMessageUuid(set_type, obj)
               
    def SetMessageUuid(self, obj) :
        return self.act.SetMessageUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelMessageUuid(self
        , uuid
    ) :          
        return self.act.DelMessageUuid(
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
    def GetMessageListUuid(self
        , uuid
        ) :
            return self.act.GetMessageListUuid(
                uuid
            )
        
    def GetMessageUuid(self
        , uuid
    ) :
        for item in self.GetMessageListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetMessageListUuid(self
        , uuid
    ) :
        return CachedGetMessageListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetMessageListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Message> objs;

        string method_name = "CachedGetMessageListUuid";

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
            objs = GetMessageListUuid(
                uuid
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
    def CountOfferUuid(self
        , uuid
    ) :         
        return self.act.CountOfferUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCode(self
        , code
    ) :         
        return self.act.CountOfferCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferName(self
        , name
    ) :         
        return self.act.CountOfferName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferOrgId(self
        , org_id
    ) :         
        return self.act.CountOfferOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferListFilter(self, filter_obj) :
        return self.act.BrowseOfferListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferUuidType(self, set_type, obj) :
        return self.act.SetOfferUuid(set_type, obj)
               
    def SetOfferUuid(self, obj) :
        return self.act.SetOfferUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferUuid(self
        , uuid
    ) :          
        return self.act.DelOfferUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelOfferOrgId(self
        , org_id
    ) :          
        return self.act.DelOfferOrgId(
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
    def GetOfferListUuid(self
        , uuid
        ) :
            return self.act.GetOfferListUuid(
                uuid
            )
        
    def GetOfferUuid(self
        , uuid
    ) :
        for item in self.GetOfferListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferListUuid(self
        , uuid
    ) :
        return CachedGetOfferListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Offer> objs;

        string method_name = "CachedGetOfferListUuid";

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
            objs = GetOfferListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferListCode(self
        , code
        ) :
            return self.act.GetOfferListCode(
                code
            )
        
    def GetOfferCode(self
        , code
    ) :
        for item in self.GetOfferListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetOfferListCode(self
        , code
    ) :
        return CachedGetOfferListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetOfferListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Offer> objs;

        string method_name = "CachedGetOfferListCode";

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
            objs = GetOfferListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferListName(self
        , name
        ) :
            return self.act.GetOfferListName(
                name
            )
        
    def GetOfferName(self
        , name
    ) :
        for item in self.GetOfferListName(
        name
        ) :
            return item
        return None
    
    def CachedGetOfferListName(self
        , name
    ) :
        return CachedGetOfferListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetOfferListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Offer> objs;

        string method_name = "CachedGetOfferListName";

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
            objs = GetOfferListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferListOrgId(self
        , org_id
        ) :
            return self.act.GetOfferListOrgId(
                org_id
            )
        
    def GetOfferOrgId(self
        , org_id
    ) :
        for item in self.GetOfferListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetOfferListOrgId(self
        , org_id
    ) :
        return CachedGetOfferListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetOfferListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<Offer> objs;

        string method_name = "CachedGetOfferListOrgId";

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
            objs = GetOfferListOrgId(
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
    def CountOfferTypeUuid(self
        , uuid
    ) :         
        return self.act.CountOfferTypeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferTypeCode(self
        , code
    ) :         
        return self.act.CountOfferTypeCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferTypeName(self
        , name
    ) :         
        return self.act.CountOfferTypeName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferTypeListFilter(self, filter_obj) :
        return self.act.BrowseOfferTypeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferTypeUuidType(self, set_type, obj) :
        return self.act.SetOfferTypeUuid(set_type, obj)
               
    def SetOfferTypeUuid(self, obj) :
        return self.act.SetOfferTypeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferTypeUuid(self
        , uuid
    ) :          
        return self.act.DelOfferTypeUuid(
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
    def GetOfferTypeListUuid(self
        , uuid
        ) :
            return self.act.GetOfferTypeListUuid(
                uuid
            )
        
    def GetOfferTypeUuid(self
        , uuid
    ) :
        for item in self.GetOfferTypeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferTypeListUuid(self
        , uuid
    ) :
        return CachedGetOfferTypeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferTypeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferType> objs;

        string method_name = "CachedGetOfferTypeListUuid";

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
            objs = GetOfferTypeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferTypeListCode(self
        , code
        ) :
            return self.act.GetOfferTypeListCode(
                code
            )
        
    def GetOfferTypeCode(self
        , code
    ) :
        for item in self.GetOfferTypeListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetOfferTypeListCode(self
        , code
    ) :
        return CachedGetOfferTypeListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetOfferTypeListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<OfferType> objs;

        string method_name = "CachedGetOfferTypeListCode";

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
            objs = GetOfferTypeListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferTypeListName(self
        , name
        ) :
            return self.act.GetOfferTypeListName(
                name
            )
        
    def GetOfferTypeName(self
        , name
    ) :
        for item in self.GetOfferTypeListName(
        name
        ) :
            return item
        return None
    
    def CachedGetOfferTypeListName(self
        , name
    ) :
        return CachedGetOfferTypeListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetOfferTypeListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<OfferType> objs;

        string method_name = "CachedGetOfferTypeListName";

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
            objs = GetOfferTypeListName(
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
    def CountOfferLocationUuid(self
        , uuid
    ) :         
        return self.act.CountOfferLocationUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferLocationOfferId(self
        , offer_id
    ) :         
        return self.act.CountOfferLocationOfferId(
        offer_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferLocationCity(self
        , city
    ) :         
        return self.act.CountOfferLocationCity(
        city
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferLocationCountryCode(self
        , country_code
    ) :         
        return self.act.CountOfferLocationCountryCode(
        country_code
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferLocationPostalCode(self
        , postal_code
    ) :         
        return self.act.CountOfferLocationPostalCode(
        postal_code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferLocationListFilter(self, filter_obj) :
        return self.act.BrowseOfferLocationListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferLocationUuidType(self, set_type, obj) :
        return self.act.SetOfferLocationUuid(set_type, obj)
               
    def SetOfferLocationUuid(self, obj) :
        return self.act.SetOfferLocationUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferLocationUuid(self
        , uuid
    ) :          
        return self.act.DelOfferLocationUuid(
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
    def GetOfferLocationListUuid(self
        , uuid
        ) :
            return self.act.GetOfferLocationListUuid(
                uuid
            )
        
    def GetOfferLocationUuid(self
        , uuid
    ) :
        for item in self.GetOfferLocationListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferLocationListUuid(self
        , uuid
    ) :
        return CachedGetOfferLocationListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferLocationListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationListUuid";

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
            objs = GetOfferLocationListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferLocationListOfferId(self
        , offer_id
        ) :
            return self.act.GetOfferLocationListOfferId(
                offer_id
            )
        
    def GetOfferLocationOfferId(self
        , offer_id
    ) :
        for item in self.GetOfferLocationListOfferId(
        offer_id
        ) :
            return item
        return None
    
    def CachedGetOfferLocationListOfferId(self
        , offer_id
    ) :
        return CachedGetOfferLocationListOfferId(
            false
            , self.CACHE_DEFAULT_HOURS
            , offer_id
        )
        
    def CachedGetOfferLocationListOfferId(self
        , overrideCache
        , cacheHours
        , offer_id
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationListOfferId";

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
            objs = GetOfferLocationListOfferId(
                offer_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferLocationListCity(self
        , city
        ) :
            return self.act.GetOfferLocationListCity(
                city
            )
        
    def GetOfferLocationCity(self
        , city
    ) :
        for item in self.GetOfferLocationListCity(
        city
        ) :
            return item
        return None
    
    def CachedGetOfferLocationListCity(self
        , city
    ) :
        return CachedGetOfferLocationListCity(
            false
            , self.CACHE_DEFAULT_HOURS
            , city
        )
        
    def CachedGetOfferLocationListCity(self
        , overrideCache
        , cacheHours
        , city
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationListCity";

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
            objs = GetOfferLocationListCity(
                city
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferLocationListCountryCode(self
        , country_code
        ) :
            return self.act.GetOfferLocationListCountryCode(
                country_code
            )
        
    def GetOfferLocationCountryCode(self
        , country_code
    ) :
        for item in self.GetOfferLocationListCountryCode(
        country_code
        ) :
            return item
        return None
    
    def CachedGetOfferLocationListCountryCode(self
        , country_code
    ) :
        return CachedGetOfferLocationListCountryCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , country_code
        )
        
    def CachedGetOfferLocationListCountryCode(self
        , overrideCache
        , cacheHours
        , country_code
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationListCountryCode";

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
            objs = GetOfferLocationListCountryCode(
                country_code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferLocationListPostalCode(self
        , postal_code
        ) :
            return self.act.GetOfferLocationListPostalCode(
                postal_code
            )
        
    def GetOfferLocationPostalCode(self
        , postal_code
    ) :
        for item in self.GetOfferLocationListPostalCode(
        postal_code
        ) :
            return item
        return None
    
    def CachedGetOfferLocationListPostalCode(self
        , postal_code
    ) :
        return CachedGetOfferLocationListPostalCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , postal_code
        )
        
    def CachedGetOfferLocationListPostalCode(self
        , overrideCache
        , cacheHours
        , postal_code
    ) :
        pass
        """
        List<OfferLocation> objs;

        string method_name = "CachedGetOfferLocationListPostalCode";

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
            objs = GetOfferLocationListPostalCode(
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
    def CountOfferCategoryUuid(self
        , uuid
    ) :         
        return self.act.CountOfferCategoryUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryCode(self
        , code
    ) :         
        return self.act.CountOfferCategoryCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryName(self
        , name
    ) :         
        return self.act.CountOfferCategoryName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryOrgId(self
        , org_id
    ) :         
        return self.act.CountOfferCategoryOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryTypeId(self
        , type_id
    ) :         
        return self.act.CountOfferCategoryTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryOrgIdTypeId(self
        , org_id
        , type_id
    ) :         
        return self.act.CountOfferCategoryOrgIdTypeId(
        org_id
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferCategoryListFilter(self, filter_obj) :
        return self.act.BrowseOfferCategoryListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferCategoryUuidType(self, set_type, obj) :
        return self.act.SetOfferCategoryUuid(set_type, obj)
               
    def SetOfferCategoryUuid(self, obj) :
        return self.act.SetOfferCategoryUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferCategoryUuid(self
        , uuid
    ) :          
        return self.act.DelOfferCategoryUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelOfferCategoryCodeOrgId(self
        , code
        , org_id
    ) :          
        return self.act.DelOfferCategoryCodeOrgId(
        code
        , org_id
        )
#------------------------------------------------------------------------------                    
    def DelOfferCategoryCodeOrgIdTypeId(self
        , code
        , org_id
        , type_id
    ) :          
        return self.act.DelOfferCategoryCodeOrgIdTypeId(
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
    def GetOfferCategoryListUuid(self
        , uuid
        ) :
            return self.act.GetOfferCategoryListUuid(
                uuid
            )
        
    def GetOfferCategoryUuid(self
        , uuid
    ) :
        for item in self.GetOfferCategoryListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListUuid(self
        , uuid
    ) :
        return CachedGetOfferCategoryListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferCategoryListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListUuid";

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
            objs = GetOfferCategoryListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListCode(self
        , code
        ) :
            return self.act.GetOfferCategoryListCode(
                code
            )
        
    def GetOfferCategoryCode(self
        , code
    ) :
        for item in self.GetOfferCategoryListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListCode(self
        , code
    ) :
        return CachedGetOfferCategoryListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetOfferCategoryListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListCode";

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
            objs = GetOfferCategoryListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListName(self
        , name
        ) :
            return self.act.GetOfferCategoryListName(
                name
            )
        
    def GetOfferCategoryName(self
        , name
    ) :
        for item in self.GetOfferCategoryListName(
        name
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListName(self
        , name
    ) :
        return CachedGetOfferCategoryListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetOfferCategoryListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListName";

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
            objs = GetOfferCategoryListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListOrgId(self
        , org_id
        ) :
            return self.act.GetOfferCategoryListOrgId(
                org_id
            )
        
    def GetOfferCategoryOrgId(self
        , org_id
    ) :
        for item in self.GetOfferCategoryListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListOrgId(self
        , org_id
    ) :
        return CachedGetOfferCategoryListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetOfferCategoryListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListOrgId";

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
            objs = GetOfferCategoryListOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListTypeId(self
        , type_id
        ) :
            return self.act.GetOfferCategoryListTypeId(
                type_id
            )
        
    def GetOfferCategoryTypeId(self
        , type_id
    ) :
        for item in self.GetOfferCategoryListTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListTypeId(self
        , type_id
    ) :
        return CachedGetOfferCategoryListTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetOfferCategoryListTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListTypeId";

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
            objs = GetOfferCategoryListTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryListOrgIdTypeId(self
        , org_id
        , type_id
        ) :
            return self.act.GetOfferCategoryListOrgIdTypeId(
                org_id
                , type_id
            )
        
    def GetOfferCategoryOrgIdTypeId(self
        , org_id
        , type_id
    ) :
        for item in self.GetOfferCategoryListOrgIdTypeId(
        org_id
        , type_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryListOrgIdTypeId(self
        , org_id
        , type_id
    ) :
        return CachedGetOfferCategoryListOrgIdTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , type_id
        )
        
    def CachedGetOfferCategoryListOrgIdTypeId(self
        , overrideCache
        , cacheHours
        , org_id
        , type_id
    ) :
        pass
        """
        List<OfferCategory> objs;

        string method_name = "CachedGetOfferCategoryListOrgIdTypeId";

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
            objs = GetOfferCategoryListOrgIdTypeId(
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
    def CountOfferCategoryTreeUuid(self
        , uuid
    ) :         
        return self.act.CountOfferCategoryTreeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryTreeParentId(self
        , parent_id
    ) :         
        return self.act.CountOfferCategoryTreeParentId(
        parent_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryTreeCategoryId(self
        , category_id
    ) :         
        return self.act.CountOfferCategoryTreeCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.act.CountOfferCategoryTreeParentIdCategoryId(
        parent_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferCategoryTreeListFilter(self, filter_obj) :
        return self.act.BrowseOfferCategoryTreeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferCategoryTreeUuidType(self, set_type, obj) :
        return self.act.SetOfferCategoryTreeUuid(set_type, obj)
               
    def SetOfferCategoryTreeUuid(self, obj) :
        return self.act.SetOfferCategoryTreeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferCategoryTreeUuid(self
        , uuid
    ) :          
        return self.act.DelOfferCategoryTreeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelOfferCategoryTreeParentId(self
        , parent_id
    ) :          
        return self.act.DelOfferCategoryTreeParentId(
        parent_id
        )
#------------------------------------------------------------------------------                    
    def DelOfferCategoryTreeCategoryId(self
        , category_id
    ) :          
        return self.act.DelOfferCategoryTreeCategoryId(
        category_id
        )
#------------------------------------------------------------------------------                    
    def DelOfferCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :          
        return self.act.DelOfferCategoryTreeParentIdCategoryId(
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
    def GetOfferCategoryTreeListUuid(self
        , uuid
        ) :
            return self.act.GetOfferCategoryTreeListUuid(
                uuid
            )
        
    def GetOfferCategoryTreeUuid(self
        , uuid
    ) :
        for item in self.GetOfferCategoryTreeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryTreeListUuid(self
        , uuid
    ) :
        return CachedGetOfferCategoryTreeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferCategoryTreeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferCategoryTree> objs;

        string method_name = "CachedGetOfferCategoryTreeListUuid";

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
            objs = GetOfferCategoryTreeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryTreeListParentId(self
        , parent_id
        ) :
            return self.act.GetOfferCategoryTreeListParentId(
                parent_id
            )
        
    def GetOfferCategoryTreeParentId(self
        , parent_id
    ) :
        for item in self.GetOfferCategoryTreeListParentId(
        parent_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryTreeListParentId(self
        , parent_id
    ) :
        return CachedGetOfferCategoryTreeListParentId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
        )
        
    def CachedGetOfferCategoryTreeListParentId(self
        , overrideCache
        , cacheHours
        , parent_id
    ) :
        pass
        """
        List<OfferCategoryTree> objs;

        string method_name = "CachedGetOfferCategoryTreeListParentId";

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
            objs = GetOfferCategoryTreeListParentId(
                parent_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryTreeListCategoryId(self
        , category_id
        ) :
            return self.act.GetOfferCategoryTreeListCategoryId(
                category_id
            )
        
    def GetOfferCategoryTreeCategoryId(self
        , category_id
    ) :
        for item in self.GetOfferCategoryTreeListCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryTreeListCategoryId(self
        , category_id
    ) :
        return CachedGetOfferCategoryTreeListCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetOfferCategoryTreeListCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<OfferCategoryTree> objs;

        string method_name = "CachedGetOfferCategoryTreeListCategoryId";

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
            objs = GetOfferCategoryTreeListCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryTreeListParentIdCategoryId(self
        , parent_id
        , category_id
        ) :
            return self.act.GetOfferCategoryTreeListParentIdCategoryId(
                parent_id
                , category_id
            )
        
    def GetOfferCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :
        for item in self.GetOfferCategoryTreeListParentIdCategoryId(
        parent_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryTreeListParentIdCategoryId(self
        , parent_id
        , category_id
    ) :
        return CachedGetOfferCategoryTreeListParentIdCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
            , category_id
        )
        
    def CachedGetOfferCategoryTreeListParentIdCategoryId(self
        , overrideCache
        , cacheHours
        , parent_id
        , category_id
    ) :
        pass
        """
        List<OfferCategoryTree> objs;

        string method_name = "CachedGetOfferCategoryTreeListParentIdCategoryId";

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
            objs = GetOfferCategoryTreeListParentIdCategoryId(
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
    def CountOfferCategoryAssocUuid(self
        , uuid
    ) :         
        return self.act.CountOfferCategoryAssocUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryAssocOfferId(self
        , offer_id
    ) :         
        return self.act.CountOfferCategoryAssocOfferId(
        offer_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryAssocCategoryId(self
        , category_id
    ) :         
        return self.act.CountOfferCategoryAssocCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferCategoryAssocOfferIdCategoryId(self
        , offer_id
        , category_id
    ) :         
        return self.act.CountOfferCategoryAssocOfferIdCategoryId(
        offer_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferCategoryAssocListFilter(self, filter_obj) :
        return self.act.BrowseOfferCategoryAssocListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferCategoryAssocUuidType(self, set_type, obj) :
        return self.act.SetOfferCategoryAssocUuid(set_type, obj)
               
    def SetOfferCategoryAssocUuid(self, obj) :
        return self.act.SetOfferCategoryAssocUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferCategoryAssocUuid(self
        , uuid
    ) :          
        return self.act.DelOfferCategoryAssocUuid(
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
    def GetOfferCategoryAssocListUuid(self
        , uuid
        ) :
            return self.act.GetOfferCategoryAssocListUuid(
                uuid
            )
        
    def GetOfferCategoryAssocUuid(self
        , uuid
    ) :
        for item in self.GetOfferCategoryAssocListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryAssocListUuid(self
        , uuid
    ) :
        return CachedGetOfferCategoryAssocListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferCategoryAssocListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferCategoryAssoc> objs;

        string method_name = "CachedGetOfferCategoryAssocListUuid";

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
            objs = GetOfferCategoryAssocListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryAssocListOfferId(self
        , offer_id
        ) :
            return self.act.GetOfferCategoryAssocListOfferId(
                offer_id
            )
        
    def GetOfferCategoryAssocOfferId(self
        , offer_id
    ) :
        for item in self.GetOfferCategoryAssocListOfferId(
        offer_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryAssocListOfferId(self
        , offer_id
    ) :
        return CachedGetOfferCategoryAssocListOfferId(
            false
            , self.CACHE_DEFAULT_HOURS
            , offer_id
        )
        
    def CachedGetOfferCategoryAssocListOfferId(self
        , overrideCache
        , cacheHours
        , offer_id
    ) :
        pass
        """
        List<OfferCategoryAssoc> objs;

        string method_name = "CachedGetOfferCategoryAssocListOfferId";

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
            objs = GetOfferCategoryAssocListOfferId(
                offer_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryAssocListCategoryId(self
        , category_id
        ) :
            return self.act.GetOfferCategoryAssocListCategoryId(
                category_id
            )
        
    def GetOfferCategoryAssocCategoryId(self
        , category_id
    ) :
        for item in self.GetOfferCategoryAssocListCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryAssocListCategoryId(self
        , category_id
    ) :
        return CachedGetOfferCategoryAssocListCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetOfferCategoryAssocListCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<OfferCategoryAssoc> objs;

        string method_name = "CachedGetOfferCategoryAssocListCategoryId";

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
            objs = GetOfferCategoryAssocListCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferCategoryAssocListOfferIdCategoryId(self
        , offer_id
        , category_id
        ) :
            return self.act.GetOfferCategoryAssocListOfferIdCategoryId(
                offer_id
                , category_id
            )
        
    def GetOfferCategoryAssocOfferIdCategoryId(self
        , offer_id
        , category_id
    ) :
        for item in self.GetOfferCategoryAssocListOfferIdCategoryId(
        offer_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetOfferCategoryAssocListOfferIdCategoryId(self
        , offer_id
        , category_id
    ) :
        return CachedGetOfferCategoryAssocListOfferIdCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , offer_id
            , category_id
        )
        
    def CachedGetOfferCategoryAssocListOfferIdCategoryId(self
        , overrideCache
        , cacheHours
        , offer_id
        , category_id
    ) :
        pass
        """
        List<OfferCategoryAssoc> objs;

        string method_name = "CachedGetOfferCategoryAssocListOfferIdCategoryId";

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
            objs = GetOfferCategoryAssocListOfferIdCategoryId(
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
    def CountOfferGameLocationUuid(self
        , uuid
    ) :         
        return self.act.CountOfferGameLocationUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferGameLocationGameLocationId(self
        , game_location_id
    ) :         
        return self.act.CountOfferGameLocationGameLocationId(
        game_location_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferGameLocationOfferId(self
        , offer_id
    ) :         
        return self.act.CountOfferGameLocationOfferId(
        offer_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOfferGameLocationOfferIdGameLocationId(self
        , offer_id
        , game_location_id
    ) :         
        return self.act.CountOfferGameLocationOfferIdGameLocationId(
        offer_id
        , game_location_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOfferGameLocationListFilter(self, filter_obj) :
        return self.act.BrowseOfferGameLocationListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOfferGameLocationUuidType(self, set_type, obj) :
        return self.act.SetOfferGameLocationUuid(set_type, obj)
               
    def SetOfferGameLocationUuid(self, obj) :
        return self.act.SetOfferGameLocationUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelOfferGameLocationUuid(self
        , uuid
    ) :          
        return self.act.DelOfferGameLocationUuid(
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
    def GetOfferGameLocationListUuid(self
        , uuid
        ) :
            return self.act.GetOfferGameLocationListUuid(
                uuid
            )
        
    def GetOfferGameLocationUuid(self
        , uuid
    ) :
        for item in self.GetOfferGameLocationListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOfferGameLocationListUuid(self
        , uuid
    ) :
        return CachedGetOfferGameLocationListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOfferGameLocationListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OfferGameLocation> objs;

        string method_name = "CachedGetOfferGameLocationListUuid";

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
            objs = GetOfferGameLocationListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferGameLocationListGameLocationId(self
        , game_location_id
        ) :
            return self.act.GetOfferGameLocationListGameLocationId(
                game_location_id
            )
        
    def GetOfferGameLocationGameLocationId(self
        , game_location_id
    ) :
        for item in self.GetOfferGameLocationListGameLocationId(
        game_location_id
        ) :
            return item
        return None
    
    def CachedGetOfferGameLocationListGameLocationId(self
        , game_location_id
    ) :
        return CachedGetOfferGameLocationListGameLocationId(
            false
            , self.CACHE_DEFAULT_HOURS
            , game_location_id
        )
        
    def CachedGetOfferGameLocationListGameLocationId(self
        , overrideCache
        , cacheHours
        , game_location_id
    ) :
        pass
        """
        List<OfferGameLocation> objs;

        string method_name = "CachedGetOfferGameLocationListGameLocationId";

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
            objs = GetOfferGameLocationListGameLocationId(
                game_location_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferGameLocationListOfferId(self
        , offer_id
        ) :
            return self.act.GetOfferGameLocationListOfferId(
                offer_id
            )
        
    def GetOfferGameLocationOfferId(self
        , offer_id
    ) :
        for item in self.GetOfferGameLocationListOfferId(
        offer_id
        ) :
            return item
        return None
    
    def CachedGetOfferGameLocationListOfferId(self
        , offer_id
    ) :
        return CachedGetOfferGameLocationListOfferId(
            false
            , self.CACHE_DEFAULT_HOURS
            , offer_id
        )
        
    def CachedGetOfferGameLocationListOfferId(self
        , overrideCache
        , cacheHours
        , offer_id
    ) :
        pass
        """
        List<OfferGameLocation> objs;

        string method_name = "CachedGetOfferGameLocationListOfferId";

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
            objs = GetOfferGameLocationListOfferId(
                offer_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOfferGameLocationListOfferIdGameLocationId(self
        , offer_id
        , game_location_id
        ) :
            return self.act.GetOfferGameLocationListOfferIdGameLocationId(
                offer_id
                , game_location_id
            )
        
    def GetOfferGameLocationOfferIdGameLocationId(self
        , offer_id
        , game_location_id
    ) :
        for item in self.GetOfferGameLocationListOfferIdGameLocationId(
        offer_id
        , game_location_id
        ) :
            return item
        return None
    
    def CachedGetOfferGameLocationListOfferIdGameLocationId(self
        , offer_id
        , game_location_id
    ) :
        return CachedGetOfferGameLocationListOfferIdGameLocationId(
            false
            , self.CACHE_DEFAULT_HOURS
            , offer_id
            , game_location_id
        )
        
    def CachedGetOfferGameLocationListOfferIdGameLocationId(self
        , overrideCache
        , cacheHours
        , offer_id
        , game_location_id
    ) :
        pass
        """
        List<OfferGameLocation> objs;

        string method_name = "CachedGetOfferGameLocationListOfferIdGameLocationId";

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
            objs = GetOfferGameLocationListOfferIdGameLocationId(
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
    def CountEventInfoUuid(self
        , uuid
    ) :         
        return self.act.CountEventInfoUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountEventInfoCode(self
        , code
    ) :         
        return self.act.CountEventInfoCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountEventInfoName(self
        , name
    ) :         
        return self.act.CountEventInfoName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountEventInfoOrgId(self
        , org_id
    ) :         
        return self.act.CountEventInfoOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseEventInfoListFilter(self, filter_obj) :
        return self.act.BrowseEventInfoListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetEventInfoUuidType(self, set_type, obj) :
        return self.act.SetEventInfoUuid(set_type, obj)
               
    def SetEventInfoUuid(self, obj) :
        return self.act.SetEventInfoUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelEventInfoUuid(self
        , uuid
    ) :          
        return self.act.DelEventInfoUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelEventInfoOrgId(self
        , org_id
    ) :          
        return self.act.DelEventInfoOrgId(
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
    def GetEventInfoListUuid(self
        , uuid
        ) :
            return self.act.GetEventInfoListUuid(
                uuid
            )
        
    def GetEventInfoUuid(self
        , uuid
    ) :
        for item in self.GetEventInfoListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetEventInfoListUuid(self
        , uuid
    ) :
        return CachedGetEventInfoListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetEventInfoListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<EventInfo> objs;

        string method_name = "CachedGetEventInfoListUuid";

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
            objs = GetEventInfoListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventInfoListCode(self
        , code
        ) :
            return self.act.GetEventInfoListCode(
                code
            )
        
    def GetEventInfoCode(self
        , code
    ) :
        for item in self.GetEventInfoListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetEventInfoListCode(self
        , code
    ) :
        return CachedGetEventInfoListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetEventInfoListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<EventInfo> objs;

        string method_name = "CachedGetEventInfoListCode";

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
            objs = GetEventInfoListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventInfoListName(self
        , name
        ) :
            return self.act.GetEventInfoListName(
                name
            )
        
    def GetEventInfoName(self
        , name
    ) :
        for item in self.GetEventInfoListName(
        name
        ) :
            return item
        return None
    
    def CachedGetEventInfoListName(self
        , name
    ) :
        return CachedGetEventInfoListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetEventInfoListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<EventInfo> objs;

        string method_name = "CachedGetEventInfoListName";

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
            objs = GetEventInfoListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventInfoListOrgId(self
        , org_id
        ) :
            return self.act.GetEventInfoListOrgId(
                org_id
            )
        
    def GetEventInfoOrgId(self
        , org_id
    ) :
        for item in self.GetEventInfoListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetEventInfoListOrgId(self
        , org_id
    ) :
        return CachedGetEventInfoListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetEventInfoListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<EventInfo> objs;

        string method_name = "CachedGetEventInfoListOrgId";

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
            objs = GetEventInfoListOrgId(
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
    def CountEventLocationUuid(self
        , uuid
    ) :         
        return self.act.CountEventLocationUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountEventLocationEventId(self
        , event_id
    ) :         
        return self.act.CountEventLocationEventId(
        event_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventLocationCity(self
        , city
    ) :         
        return self.act.CountEventLocationCity(
        city
        )
        
#------------------------------------------------------------------------------                    
    def CountEventLocationCountryCode(self
        , country_code
    ) :         
        return self.act.CountEventLocationCountryCode(
        country_code
        )
        
#------------------------------------------------------------------------------                    
    def CountEventLocationPostalCode(self
        , postal_code
    ) :         
        return self.act.CountEventLocationPostalCode(
        postal_code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseEventLocationListFilter(self, filter_obj) :
        return self.act.BrowseEventLocationListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetEventLocationUuidType(self, set_type, obj) :
        return self.act.SetEventLocationUuid(set_type, obj)
               
    def SetEventLocationUuid(self, obj) :
        return self.act.SetEventLocationUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelEventLocationUuid(self
        , uuid
    ) :          
        return self.act.DelEventLocationUuid(
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
    def GetEventLocationListUuid(self
        , uuid
        ) :
            return self.act.GetEventLocationListUuid(
                uuid
            )
        
    def GetEventLocationUuid(self
        , uuid
    ) :
        for item in self.GetEventLocationListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetEventLocationListUuid(self
        , uuid
    ) :
        return CachedGetEventLocationListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetEventLocationListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationListUuid";

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
            objs = GetEventLocationListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventLocationListEventId(self
        , event_id
        ) :
            return self.act.GetEventLocationListEventId(
                event_id
            )
        
    def GetEventLocationEventId(self
        , event_id
    ) :
        for item in self.GetEventLocationListEventId(
        event_id
        ) :
            return item
        return None
    
    def CachedGetEventLocationListEventId(self
        , event_id
    ) :
        return CachedGetEventLocationListEventId(
            false
            , self.CACHE_DEFAULT_HOURS
            , event_id
        )
        
    def CachedGetEventLocationListEventId(self
        , overrideCache
        , cacheHours
        , event_id
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationListEventId";

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
            objs = GetEventLocationListEventId(
                event_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventLocationListCity(self
        , city
        ) :
            return self.act.GetEventLocationListCity(
                city
            )
        
    def GetEventLocationCity(self
        , city
    ) :
        for item in self.GetEventLocationListCity(
        city
        ) :
            return item
        return None
    
    def CachedGetEventLocationListCity(self
        , city
    ) :
        return CachedGetEventLocationListCity(
            false
            , self.CACHE_DEFAULT_HOURS
            , city
        )
        
    def CachedGetEventLocationListCity(self
        , overrideCache
        , cacheHours
        , city
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationListCity";

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
            objs = GetEventLocationListCity(
                city
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventLocationListCountryCode(self
        , country_code
        ) :
            return self.act.GetEventLocationListCountryCode(
                country_code
            )
        
    def GetEventLocationCountryCode(self
        , country_code
    ) :
        for item in self.GetEventLocationListCountryCode(
        country_code
        ) :
            return item
        return None
    
    def CachedGetEventLocationListCountryCode(self
        , country_code
    ) :
        return CachedGetEventLocationListCountryCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , country_code
        )
        
    def CachedGetEventLocationListCountryCode(self
        , overrideCache
        , cacheHours
        , country_code
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationListCountryCode";

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
            objs = GetEventLocationListCountryCode(
                country_code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventLocationListPostalCode(self
        , postal_code
        ) :
            return self.act.GetEventLocationListPostalCode(
                postal_code
            )
        
    def GetEventLocationPostalCode(self
        , postal_code
    ) :
        for item in self.GetEventLocationListPostalCode(
        postal_code
        ) :
            return item
        return None
    
    def CachedGetEventLocationListPostalCode(self
        , postal_code
    ) :
        return CachedGetEventLocationListPostalCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , postal_code
        )
        
    def CachedGetEventLocationListPostalCode(self
        , overrideCache
        , cacheHours
        , postal_code
    ) :
        pass
        """
        List<EventLocation> objs;

        string method_name = "CachedGetEventLocationListPostalCode";

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
            objs = GetEventLocationListPostalCode(
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
    def CountEventCategoryUuid(self
        , uuid
    ) :         
        return self.act.CountEventCategoryUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryCode(self
        , code
    ) :         
        return self.act.CountEventCategoryCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryName(self
        , name
    ) :         
        return self.act.CountEventCategoryName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryOrgId(self
        , org_id
    ) :         
        return self.act.CountEventCategoryOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryTypeId(self
        , type_id
    ) :         
        return self.act.CountEventCategoryTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryOrgIdTypeId(self
        , org_id
        , type_id
    ) :         
        return self.act.CountEventCategoryOrgIdTypeId(
        org_id
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseEventCategoryListFilter(self, filter_obj) :
        return self.act.BrowseEventCategoryListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetEventCategoryUuidType(self, set_type, obj) :
        return self.act.SetEventCategoryUuid(set_type, obj)
               
    def SetEventCategoryUuid(self, obj) :
        return self.act.SetEventCategoryUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelEventCategoryUuid(self
        , uuid
    ) :          
        return self.act.DelEventCategoryUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelEventCategoryCodeOrgId(self
        , code
        , org_id
    ) :          
        return self.act.DelEventCategoryCodeOrgId(
        code
        , org_id
        )
#------------------------------------------------------------------------------                    
    def DelEventCategoryCodeOrgIdTypeId(self
        , code
        , org_id
        , type_id
    ) :          
        return self.act.DelEventCategoryCodeOrgIdTypeId(
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
    def GetEventCategoryListUuid(self
        , uuid
        ) :
            return self.act.GetEventCategoryListUuid(
                uuid
            )
        
    def GetEventCategoryUuid(self
        , uuid
    ) :
        for item in self.GetEventCategoryListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListUuid(self
        , uuid
    ) :
        return CachedGetEventCategoryListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetEventCategoryListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListUuid";

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
            objs = GetEventCategoryListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListCode(self
        , code
        ) :
            return self.act.GetEventCategoryListCode(
                code
            )
        
    def GetEventCategoryCode(self
        , code
    ) :
        for item in self.GetEventCategoryListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListCode(self
        , code
    ) :
        return CachedGetEventCategoryListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetEventCategoryListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListCode";

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
            objs = GetEventCategoryListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListName(self
        , name
        ) :
            return self.act.GetEventCategoryListName(
                name
            )
        
    def GetEventCategoryName(self
        , name
    ) :
        for item in self.GetEventCategoryListName(
        name
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListName(self
        , name
    ) :
        return CachedGetEventCategoryListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetEventCategoryListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListName";

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
            objs = GetEventCategoryListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListOrgId(self
        , org_id
        ) :
            return self.act.GetEventCategoryListOrgId(
                org_id
            )
        
    def GetEventCategoryOrgId(self
        , org_id
    ) :
        for item in self.GetEventCategoryListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListOrgId(self
        , org_id
    ) :
        return CachedGetEventCategoryListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetEventCategoryListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListOrgId";

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
            objs = GetEventCategoryListOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListTypeId(self
        , type_id
        ) :
            return self.act.GetEventCategoryListTypeId(
                type_id
            )
        
    def GetEventCategoryTypeId(self
        , type_id
    ) :
        for item in self.GetEventCategoryListTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListTypeId(self
        , type_id
    ) :
        return CachedGetEventCategoryListTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetEventCategoryListTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListTypeId";

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
            objs = GetEventCategoryListTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryListOrgIdTypeId(self
        , org_id
        , type_id
        ) :
            return self.act.GetEventCategoryListOrgIdTypeId(
                org_id
                , type_id
            )
        
    def GetEventCategoryOrgIdTypeId(self
        , org_id
        , type_id
    ) :
        for item in self.GetEventCategoryListOrgIdTypeId(
        org_id
        , type_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryListOrgIdTypeId(self
        , org_id
        , type_id
    ) :
        return CachedGetEventCategoryListOrgIdTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , type_id
        )
        
    def CachedGetEventCategoryListOrgIdTypeId(self
        , overrideCache
        , cacheHours
        , org_id
        , type_id
    ) :
        pass
        """
        List<EventCategory> objs;

        string method_name = "CachedGetEventCategoryListOrgIdTypeId";

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
            objs = GetEventCategoryListOrgIdTypeId(
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
    def CountEventCategoryTreeUuid(self
        , uuid
    ) :         
        return self.act.CountEventCategoryTreeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryTreeParentId(self
        , parent_id
    ) :         
        return self.act.CountEventCategoryTreeParentId(
        parent_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryTreeCategoryId(self
        , category_id
    ) :         
        return self.act.CountEventCategoryTreeCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.act.CountEventCategoryTreeParentIdCategoryId(
        parent_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseEventCategoryTreeListFilter(self, filter_obj) :
        return self.act.BrowseEventCategoryTreeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetEventCategoryTreeUuidType(self, set_type, obj) :
        return self.act.SetEventCategoryTreeUuid(set_type, obj)
               
    def SetEventCategoryTreeUuid(self, obj) :
        return self.act.SetEventCategoryTreeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelEventCategoryTreeUuid(self
        , uuid
    ) :          
        return self.act.DelEventCategoryTreeUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelEventCategoryTreeParentId(self
        , parent_id
    ) :          
        return self.act.DelEventCategoryTreeParentId(
        parent_id
        )
#------------------------------------------------------------------------------                    
    def DelEventCategoryTreeCategoryId(self
        , category_id
    ) :          
        return self.act.DelEventCategoryTreeCategoryId(
        category_id
        )
#------------------------------------------------------------------------------                    
    def DelEventCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :          
        return self.act.DelEventCategoryTreeParentIdCategoryId(
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
    def GetEventCategoryTreeListUuid(self
        , uuid
        ) :
            return self.act.GetEventCategoryTreeListUuid(
                uuid
            )
        
    def GetEventCategoryTreeUuid(self
        , uuid
    ) :
        for item in self.GetEventCategoryTreeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetEventCategoryTreeListUuid(self
        , uuid
    ) :
        return CachedGetEventCategoryTreeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetEventCategoryTreeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<EventCategoryTree> objs;

        string method_name = "CachedGetEventCategoryTreeListUuid";

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
            objs = GetEventCategoryTreeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryTreeListParentId(self
        , parent_id
        ) :
            return self.act.GetEventCategoryTreeListParentId(
                parent_id
            )
        
    def GetEventCategoryTreeParentId(self
        , parent_id
    ) :
        for item in self.GetEventCategoryTreeListParentId(
        parent_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryTreeListParentId(self
        , parent_id
    ) :
        return CachedGetEventCategoryTreeListParentId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
        )
        
    def CachedGetEventCategoryTreeListParentId(self
        , overrideCache
        , cacheHours
        , parent_id
    ) :
        pass
        """
        List<EventCategoryTree> objs;

        string method_name = "CachedGetEventCategoryTreeListParentId";

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
            objs = GetEventCategoryTreeListParentId(
                parent_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryTreeListCategoryId(self
        , category_id
        ) :
            return self.act.GetEventCategoryTreeListCategoryId(
                category_id
            )
        
    def GetEventCategoryTreeCategoryId(self
        , category_id
    ) :
        for item in self.GetEventCategoryTreeListCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryTreeListCategoryId(self
        , category_id
    ) :
        return CachedGetEventCategoryTreeListCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetEventCategoryTreeListCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<EventCategoryTree> objs;

        string method_name = "CachedGetEventCategoryTreeListCategoryId";

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
            objs = GetEventCategoryTreeListCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryTreeListParentIdCategoryId(self
        , parent_id
        , category_id
        ) :
            return self.act.GetEventCategoryTreeListParentIdCategoryId(
                parent_id
                , category_id
            )
        
    def GetEventCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :
        for item in self.GetEventCategoryTreeListParentIdCategoryId(
        parent_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryTreeListParentIdCategoryId(self
        , parent_id
        , category_id
    ) :
        return CachedGetEventCategoryTreeListParentIdCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , parent_id
            , category_id
        )
        
    def CachedGetEventCategoryTreeListParentIdCategoryId(self
        , overrideCache
        , cacheHours
        , parent_id
        , category_id
    ) :
        pass
        """
        List<EventCategoryTree> objs;

        string method_name = "CachedGetEventCategoryTreeListParentIdCategoryId";

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
            objs = GetEventCategoryTreeListParentIdCategoryId(
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
    def CountEventCategoryAssocUuid(self
        , uuid
    ) :         
        return self.act.CountEventCategoryAssocUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryAssocEventId(self
        , event_id
    ) :         
        return self.act.CountEventCategoryAssocEventId(
        event_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryAssocCategoryId(self
        , category_id
    ) :         
        return self.act.CountEventCategoryAssocCategoryId(
        category_id
        )
        
#------------------------------------------------------------------------------                    
    def CountEventCategoryAssocEventIdCategoryId(self
        , event_id
        , category_id
    ) :         
        return self.act.CountEventCategoryAssocEventIdCategoryId(
        event_id
        , category_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseEventCategoryAssocListFilter(self, filter_obj) :
        return self.act.BrowseEventCategoryAssocListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetEventCategoryAssocUuidType(self, set_type, obj) :
        return self.act.SetEventCategoryAssocUuid(set_type, obj)
               
    def SetEventCategoryAssocUuid(self, obj) :
        return self.act.SetEventCategoryAssocUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelEventCategoryAssocUuid(self
        , uuid
    ) :          
        return self.act.DelEventCategoryAssocUuid(
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
    def GetEventCategoryAssocListUuid(self
        , uuid
        ) :
            return self.act.GetEventCategoryAssocListUuid(
                uuid
            )
        
    def GetEventCategoryAssocUuid(self
        , uuid
    ) :
        for item in self.GetEventCategoryAssocListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetEventCategoryAssocListUuid(self
        , uuid
    ) :
        return CachedGetEventCategoryAssocListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetEventCategoryAssocListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<EventCategoryAssoc> objs;

        string method_name = "CachedGetEventCategoryAssocListUuid";

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
            objs = GetEventCategoryAssocListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryAssocListEventId(self
        , event_id
        ) :
            return self.act.GetEventCategoryAssocListEventId(
                event_id
            )
        
    def GetEventCategoryAssocEventId(self
        , event_id
    ) :
        for item in self.GetEventCategoryAssocListEventId(
        event_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryAssocListEventId(self
        , event_id
    ) :
        return CachedGetEventCategoryAssocListEventId(
            false
            , self.CACHE_DEFAULT_HOURS
            , event_id
        )
        
    def CachedGetEventCategoryAssocListEventId(self
        , overrideCache
        , cacheHours
        , event_id
    ) :
        pass
        """
        List<EventCategoryAssoc> objs;

        string method_name = "CachedGetEventCategoryAssocListEventId";

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
            objs = GetEventCategoryAssocListEventId(
                event_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryAssocListCategoryId(self
        , category_id
        ) :
            return self.act.GetEventCategoryAssocListCategoryId(
                category_id
            )
        
    def GetEventCategoryAssocCategoryId(self
        , category_id
    ) :
        for item in self.GetEventCategoryAssocListCategoryId(
        category_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryAssocListCategoryId(self
        , category_id
    ) :
        return CachedGetEventCategoryAssocListCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , category_id
        )
        
    def CachedGetEventCategoryAssocListCategoryId(self
        , overrideCache
        , cacheHours
        , category_id
    ) :
        pass
        """
        List<EventCategoryAssoc> objs;

        string method_name = "CachedGetEventCategoryAssocListCategoryId";

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
            objs = GetEventCategoryAssocListCategoryId(
                category_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetEventCategoryAssocListEventIdCategoryId(self
        , event_id
        , category_id
        ) :
            return self.act.GetEventCategoryAssocListEventIdCategoryId(
                event_id
                , category_id
            )
        
    def GetEventCategoryAssocEventIdCategoryId(self
        , event_id
        , category_id
    ) :
        for item in self.GetEventCategoryAssocListEventIdCategoryId(
        event_id
        , category_id
        ) :
            return item
        return None
    
    def CachedGetEventCategoryAssocListEventIdCategoryId(self
        , event_id
        , category_id
    ) :
        return CachedGetEventCategoryAssocListEventIdCategoryId(
            false
            , self.CACHE_DEFAULT_HOURS
            , event_id
            , category_id
        )
        
    def CachedGetEventCategoryAssocListEventIdCategoryId(self
        , overrideCache
        , cacheHours
        , event_id
        , category_id
    ) :
        pass
        """
        List<EventCategoryAssoc> objs;

        string method_name = "CachedGetEventCategoryAssocListEventIdCategoryId";

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
            objs = GetEventCategoryAssocListEventIdCategoryId(
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
    def CountChannelUuid(self
        , uuid
    ) :         
        return self.act.CountChannelUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelCode(self
        , code
    ) :         
        return self.act.CountChannelCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelName(self
        , name
    ) :         
        return self.act.CountChannelName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelOrgId(self
        , org_id
    ) :         
        return self.act.CountChannelOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelTypeId(self
        , type_id
    ) :         
        return self.act.CountChannelTypeId(
        type_id
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelOrgIdTypeId(self
        , org_id
        , type_id
    ) :         
        return self.act.CountChannelOrgIdTypeId(
        org_id
        , type_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseChannelListFilter(self, filter_obj) :
        return self.act.BrowseChannelListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetChannelUuidType(self, set_type, obj) :
        return self.act.SetChannelUuid(set_type, obj)
               
    def SetChannelUuid(self, obj) :
        return self.act.SetChannelUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelChannelUuid(self
        , uuid
    ) :          
        return self.act.DelChannelUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelChannelCodeOrgId(self
        , code
        , org_id
    ) :          
        return self.act.DelChannelCodeOrgId(
        code
        , org_id
        )
#------------------------------------------------------------------------------                    
    def DelChannelCodeOrgIdTypeId(self
        , code
        , org_id
        , type_id
    ) :          
        return self.act.DelChannelCodeOrgIdTypeId(
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
    def GetChannelListUuid(self
        , uuid
        ) :
            return self.act.GetChannelListUuid(
                uuid
            )
        
    def GetChannelUuid(self
        , uuid
    ) :
        for item in self.GetChannelListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetChannelListUuid(self
        , uuid
    ) :
        return CachedGetChannelListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetChannelListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListUuid";

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
            objs = GetChannelListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelListCode(self
        , code
        ) :
            return self.act.GetChannelListCode(
                code
            )
        
    def GetChannelCode(self
        , code
    ) :
        for item in self.GetChannelListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetChannelListCode(self
        , code
    ) :
        return CachedGetChannelListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetChannelListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListCode";

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
            objs = GetChannelListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelListName(self
        , name
        ) :
            return self.act.GetChannelListName(
                name
            )
        
    def GetChannelName(self
        , name
    ) :
        for item in self.GetChannelListName(
        name
        ) :
            return item
        return None
    
    def CachedGetChannelListName(self
        , name
    ) :
        return CachedGetChannelListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetChannelListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListName";

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
            objs = GetChannelListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelListOrgId(self
        , org_id
        ) :
            return self.act.GetChannelListOrgId(
                org_id
            )
        
    def GetChannelOrgId(self
        , org_id
    ) :
        for item in self.GetChannelListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetChannelListOrgId(self
        , org_id
    ) :
        return CachedGetChannelListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetChannelListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListOrgId";

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
            objs = GetChannelListOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelListTypeId(self
        , type_id
        ) :
            return self.act.GetChannelListTypeId(
                type_id
            )
        
    def GetChannelTypeId(self
        , type_id
    ) :
        for item in self.GetChannelListTypeId(
        type_id
        ) :
            return item
        return None
    
    def CachedGetChannelListTypeId(self
        , type_id
    ) :
        return CachedGetChannelListTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , type_id
        )
        
    def CachedGetChannelListTypeId(self
        , overrideCache
        , cacheHours
        , type_id
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListTypeId";

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
            objs = GetChannelListTypeId(
                type_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelListOrgIdTypeId(self
        , org_id
        , type_id
        ) :
            return self.act.GetChannelListOrgIdTypeId(
                org_id
                , type_id
            )
        
    def GetChannelOrgIdTypeId(self
        , org_id
        , type_id
    ) :
        for item in self.GetChannelListOrgIdTypeId(
        org_id
        , type_id
        ) :
            return item
        return None
    
    def CachedGetChannelListOrgIdTypeId(self
        , org_id
        , type_id
    ) :
        return CachedGetChannelListOrgIdTypeId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , type_id
        )
        
    def CachedGetChannelListOrgIdTypeId(self
        , overrideCache
        , cacheHours
        , org_id
        , type_id
    ) :
        pass
        """
        List<Channel> objs;

        string method_name = "CachedGetChannelListOrgIdTypeId";

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
            objs = GetChannelListOrgIdTypeId(
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
    def CountChannelTypeUuid(self
        , uuid
    ) :         
        return self.act.CountChannelTypeUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelTypeCode(self
        , code
    ) :         
        return self.act.CountChannelTypeCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountChannelTypeName(self
        , name
    ) :         
        return self.act.CountChannelTypeName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def BrowseChannelTypeListFilter(self, filter_obj) :
        return self.act.BrowseChannelTypeListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetChannelTypeUuidType(self, set_type, obj) :
        return self.act.SetChannelTypeUuid(set_type, obj)
               
    def SetChannelTypeUuid(self, obj) :
        return self.act.SetChannelTypeUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelChannelTypeUuid(self
        , uuid
    ) :          
        return self.act.DelChannelTypeUuid(
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
    def GetChannelTypeListUuid(self
        , uuid
        ) :
            return self.act.GetChannelTypeListUuid(
                uuid
            )
        
    def GetChannelTypeUuid(self
        , uuid
    ) :
        for item in self.GetChannelTypeListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetChannelTypeListUuid(self
        , uuid
    ) :
        return CachedGetChannelTypeListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetChannelTypeListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ChannelType> objs;

        string method_name = "CachedGetChannelTypeListUuid";

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
            objs = GetChannelTypeListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelTypeListCode(self
        , code
        ) :
            return self.act.GetChannelTypeListCode(
                code
            )
        
    def GetChannelTypeCode(self
        , code
    ) :
        for item in self.GetChannelTypeListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetChannelTypeListCode(self
        , code
    ) :
        return CachedGetChannelTypeListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetChannelTypeListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<ChannelType> objs;

        string method_name = "CachedGetChannelTypeListCode";

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
            objs = GetChannelTypeListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetChannelTypeListName(self
        , name
        ) :
            return self.act.GetChannelTypeListName(
                name
            )
        
    def GetChannelTypeName(self
        , name
    ) :
        for item in self.GetChannelTypeListName(
        name
        ) :
            return item
        return None
    
    def CachedGetChannelTypeListName(self
        , name
    ) :
        return CachedGetChannelTypeListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetChannelTypeListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<ChannelType> objs;

        string method_name = "CachedGetChannelTypeListName";

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
            objs = GetChannelTypeListName(
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
    def CountQuestionUuid(self
        , uuid
    ) :         
        return self.act.CountQuestionUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionCode(self
        , code
    ) :         
        return self.act.CountQuestionCode(
        code
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionName(self
        , name
    ) :         
        return self.act.CountQuestionName(
        name
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionChannelId(self
        , channel_id
    ) :         
        return self.act.CountQuestionChannelId(
        channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionOrgId(self
        , org_id
    ) :         
        return self.act.CountQuestionOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionChannelIdOrgId(self
        , channel_id
        , org_id
    ) :         
        return self.act.CountQuestionChannelIdOrgId(
        channel_id
        , org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountQuestionChannelIdCode(self
        , channel_id
        , code
    ) :         
        return self.act.CountQuestionChannelIdCode(
        channel_id
        , code
        )
        
#------------------------------------------------------------------------------                    
    def BrowseQuestionListFilter(self, filter_obj) :
        return self.act.BrowseQuestionListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetQuestionUuidType(self, set_type, obj) :
        return self.act.SetQuestionUuid(set_type, obj)
               
    def SetQuestionUuid(self, obj) :
        return self.act.SetQuestionUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetQuestionChannelIdCodeType(self, set_type, obj) :
        return self.act.SetQuestionChannelIdCode(set_type, obj)
               
    def SetQuestionChannelIdCode(self, obj) :
        return self.act.SetQuestionChannelIdCode('full', obj)
#------------------------------------------------------------------------------                    
    def DelQuestionUuid(self
        , uuid
    ) :          
        return self.act.DelQuestionUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelQuestionChannelIdOrgId(self
        , channel_id
        , org_id
    ) :          
        return self.act.DelQuestionChannelIdOrgId(
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
    def GetQuestionListUuid(self
        , uuid
        ) :
            return self.act.GetQuestionListUuid(
                uuid
            )
        
    def GetQuestionUuid(self
        , uuid
    ) :
        for item in self.GetQuestionListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetQuestionListUuid(self
        , uuid
    ) :
        return CachedGetQuestionListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetQuestionListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListUuid";

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
            objs = GetQuestionListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListCode(self
        , code
        ) :
            return self.act.GetQuestionListCode(
                code
            )
        
    def GetQuestionCode(self
        , code
    ) :
        for item in self.GetQuestionListCode(
        code
        ) :
            return item
        return None
    
    def CachedGetQuestionListCode(self
        , code
    ) :
        return CachedGetQuestionListCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , code
        )
        
    def CachedGetQuestionListCode(self
        , overrideCache
        , cacheHours
        , code
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListCode";

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
            objs = GetQuestionListCode(
                code
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListName(self
        , name
        ) :
            return self.act.GetQuestionListName(
                name
            )
        
    def GetQuestionName(self
        , name
    ) :
        for item in self.GetQuestionListName(
        name
        ) :
            return item
        return None
    
    def CachedGetQuestionListName(self
        , name
    ) :
        return CachedGetQuestionListName(
            false
            , self.CACHE_DEFAULT_HOURS
            , name
        )
        
    def CachedGetQuestionListName(self
        , overrideCache
        , cacheHours
        , name
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListName";

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
            objs = GetQuestionListName(
                name
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListType(self
        , type
        ) :
            return self.act.GetQuestionListType(
                type
            )
        
    def GetQuestionType(self
        , type
    ) :
        for item in self.GetQuestionListType(
        type
        ) :
            return item
        return None
    
    def CachedGetQuestionListType(self
        , type
    ) :
        return CachedGetQuestionListType(
            false
            , self.CACHE_DEFAULT_HOURS
            , type
        )
        
    def CachedGetQuestionListType(self
        , overrideCache
        , cacheHours
        , type
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListType";

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
            objs = GetQuestionListType(
                type
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListChannelId(self
        , channel_id
        ) :
            return self.act.GetQuestionListChannelId(
                channel_id
            )
        
    def GetQuestionChannelId(self
        , channel_id
    ) :
        for item in self.GetQuestionListChannelId(
        channel_id
        ) :
            return item
        return None
    
    def CachedGetQuestionListChannelId(self
        , channel_id
    ) :
        return CachedGetQuestionListChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
        )
        
    def CachedGetQuestionListChannelId(self
        , overrideCache
        , cacheHours
        , channel_id
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListChannelId";

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
            objs = GetQuestionListChannelId(
                channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListOrgId(self
        , org_id
        ) :
            return self.act.GetQuestionListOrgId(
                org_id
            )
        
    def GetQuestionOrgId(self
        , org_id
    ) :
        for item in self.GetQuestionListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetQuestionListOrgId(self
        , org_id
    ) :
        return CachedGetQuestionListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetQuestionListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListOrgId";

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
            objs = GetQuestionListOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListChannelIdOrgId(self
        , channel_id
        , org_id
        ) :
            return self.act.GetQuestionListChannelIdOrgId(
                channel_id
                , org_id
            )
        
    def GetQuestionChannelIdOrgId(self
        , channel_id
        , org_id
    ) :
        for item in self.GetQuestionListChannelIdOrgId(
        channel_id
        , org_id
        ) :
            return item
        return None
    
    def CachedGetQuestionListChannelIdOrgId(self
        , channel_id
        , org_id
    ) :
        return CachedGetQuestionListChannelIdOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , org_id
        )
        
    def CachedGetQuestionListChannelIdOrgId(self
        , overrideCache
        , cacheHours
        , channel_id
        , org_id
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListChannelIdOrgId";

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
            objs = GetQuestionListChannelIdOrgId(
                channel_id
                , org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetQuestionListChannelIdCode(self
        , channel_id
        , code
        ) :
            return self.act.GetQuestionListChannelIdCode(
                channel_id
                , code
            )
        
    def GetQuestionChannelIdCode(self
        , channel_id
        , code
    ) :
        for item in self.GetQuestionListChannelIdCode(
        channel_id
        , code
        ) :
            return item
        return None
    
    def CachedGetQuestionListChannelIdCode(self
        , channel_id
        , code
    ) :
        return CachedGetQuestionListChannelIdCode(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , code
        )
        
    def CachedGetQuestionListChannelIdCode(self
        , overrideCache
        , cacheHours
        , channel_id
        , code
    ) :
        pass
        """
        List<Question> objs;

        string method_name = "CachedGetQuestionListChannelIdCode";

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
            objs = GetQuestionListChannelIdCode(
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
    def CountProfileOfferUuid(self
        , uuid
    ) :         
        return self.act.CountProfileOfferUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileOfferProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileOfferProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileOfferListFilter(self, filter_obj) :
        return self.act.BrowseProfileOfferListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileOfferUuidType(self, set_type, obj) :
        return self.act.SetProfileOfferUuid(set_type, obj)
               
    def SetProfileOfferUuid(self, obj) :
        return self.act.SetProfileOfferUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileOfferUuid(self
        , uuid
    ) :          
        return self.act.DelProfileOfferUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileOfferProfileId(self
        , profile_id
    ) :          
        return self.act.DelProfileOfferProfileId(
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
    def GetProfileOfferListUuid(self
        , uuid
        ) :
            return self.act.GetProfileOfferListUuid(
                uuid
            )
        
    def GetProfileOfferUuid(self
        , uuid
    ) :
        for item in self.GetProfileOfferListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileOfferListUuid(self
        , uuid
    ) :
        return CachedGetProfileOfferListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileOfferListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileOffer> objs;

        string method_name = "CachedGetProfileOfferListUuid";

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
            objs = GetProfileOfferListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileOfferListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileOfferListProfileId(
                profile_id
            )
        
    def GetProfileOfferProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileOfferListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileOfferListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileOfferListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileOfferListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileOffer> objs;

        string method_name = "CachedGetProfileOfferListProfileId";

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
            objs = GetProfileOfferListProfileId(
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
    def CountProfileAppUuid(self
        , uuid
    ) :         
        return self.act.CountProfileAppUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileAppProfileIdAppId(self
        , profile_id
        , app_id
    ) :         
        return self.act.CountProfileAppProfileIdAppId(
        profile_id
        , app_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileAppListFilter(self, filter_obj) :
        return self.act.BrowseProfileAppListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileAppUuidType(self, set_type, obj) :
        return self.act.SetProfileAppUuid(set_type, obj)
               
    def SetProfileAppUuid(self, obj) :
        return self.act.SetProfileAppUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileAppProfileIdAppIdType(self, set_type, obj) :
        return self.act.SetProfileAppProfileIdAppId(set_type, obj)
               
    def SetProfileAppProfileIdAppId(self, obj) :
        return self.act.SetProfileAppProfileIdAppId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileAppUuid(self
        , uuid
    ) :          
        return self.act.DelProfileAppUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileAppProfileIdAppId(self
        , profile_id
        , app_id
    ) :          
        return self.act.DelProfileAppProfileIdAppId(
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
    def GetProfileAppListUuid(self
        , uuid
        ) :
            return self.act.GetProfileAppListUuid(
                uuid
            )
        
    def GetProfileAppUuid(self
        , uuid
    ) :
        for item in self.GetProfileAppListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileAppListUuid(self
        , uuid
    ) :
        return CachedGetProfileAppListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileAppListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileApp> objs;

        string method_name = "CachedGetProfileAppListUuid";

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
            objs = GetProfileAppListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAppListAppId(self
        , app_id
        ) :
            return self.act.GetProfileAppListAppId(
                app_id
            )
        
    def GetProfileAppAppId(self
        , app_id
    ) :
        for item in self.GetProfileAppListAppId(
        app_id
        ) :
            return item
        return None
    
    def CachedGetProfileAppListAppId(self
        , app_id
    ) :
        return CachedGetProfileAppListAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , app_id
        )
        
    def CachedGetProfileAppListAppId(self
        , overrideCache
        , cacheHours
        , app_id
    ) :
        pass
        """
        List<ProfileApp> objs;

        string method_name = "CachedGetProfileAppListAppId";

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
            objs = GetProfileAppListAppId(
                app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAppListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileAppListProfileId(
                profile_id
            )
        
    def GetProfileAppProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileAppListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileAppListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileAppListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileAppListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileApp> objs;

        string method_name = "CachedGetProfileAppListProfileId";

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
            objs = GetProfileAppListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileAppListProfileIdAppId(self
        , profile_id
        , app_id
        ) :
            return self.act.GetProfileAppListProfileIdAppId(
                profile_id
                , app_id
            )
        
    def GetProfileAppProfileIdAppId(self
        , profile_id
        , app_id
    ) :
        for item in self.GetProfileAppListProfileIdAppId(
        profile_id
        , app_id
        ) :
            return item
        return None
    
    def CachedGetProfileAppListProfileIdAppId(self
        , profile_id
        , app_id
    ) :
        return CachedGetProfileAppListProfileIdAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
            , app_id
        )
        
    def CachedGetProfileAppListProfileIdAppId(self
        , overrideCache
        , cacheHours
        , profile_id
        , app_id
    ) :
        pass
        """
        List<ProfileApp> objs;

        string method_name = "CachedGetProfileAppListProfileIdAppId";

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
            objs = GetProfileAppListProfileIdAppId(
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
    def CountProfileOrgUuid(self
        , uuid
    ) :         
        return self.act.CountProfileOrgUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileOrgOrgId(self
        , org_id
    ) :         
        return self.act.CountProfileOrgOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileOrgProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileOrgProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileOrgListFilter(self, filter_obj) :
        return self.act.BrowseProfileOrgListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileOrgUuidType(self, set_type, obj) :
        return self.act.SetProfileOrgUuid(set_type, obj)
               
    def SetProfileOrgUuid(self, obj) :
        return self.act.SetProfileOrgUuid('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileOrgUuid(self
        , uuid
    ) :          
        return self.act.DelProfileOrgUuid(
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
    def GetProfileOrgListUuid(self
        , uuid
        ) :
            return self.act.GetProfileOrgListUuid(
                uuid
            )
        
    def GetProfileOrgUuid(self
        , uuid
    ) :
        for item in self.GetProfileOrgListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileOrgListUuid(self
        , uuid
    ) :
        return CachedGetProfileOrgListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileOrgListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileOrg> objs;

        string method_name = "CachedGetProfileOrgListUuid";

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
            objs = GetProfileOrgListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileOrgListOrgId(self
        , org_id
        ) :
            return self.act.GetProfileOrgListOrgId(
                org_id
            )
        
    def GetProfileOrgOrgId(self
        , org_id
    ) :
        for item in self.GetProfileOrgListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetProfileOrgListOrgId(self
        , org_id
    ) :
        return CachedGetProfileOrgListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetProfileOrgListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<ProfileOrg> objs;

        string method_name = "CachedGetProfileOrgListOrgId";

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
            objs = GetProfileOrgListOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileOrgListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileOrgListProfileId(
                profile_id
            )
        
    def GetProfileOrgProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileOrgListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileOrgListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileOrgListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileOrgListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileOrg> objs;

        string method_name = "CachedGetProfileOrgListProfileId";

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
            objs = GetProfileOrgListProfileId(
                profile_id
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
    def CountProfileQuestionUuid(self
        , uuid
    ) :         
        return self.act.CountProfileQuestionUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionChannelId(self
        , channel_id
    ) :         
        return self.act.CountProfileQuestionChannelId(
        channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionOrgId(self
        , org_id
    ) :         
        return self.act.CountProfileQuestionOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileQuestionProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionQuestionId(self
        , question_id
    ) :         
        return self.act.CountProfileQuestionQuestionId(
        question_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionChannelIdOrgId(self
        , channel_id
        , org_id
    ) :         
        return self.act.CountProfileQuestionChannelIdOrgId(
        channel_id
        , org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :         
        return self.act.CountProfileQuestionChannelIdProfileId(
        channel_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileQuestionQuestionIdProfileId(self
        , question_id
        , profile_id
    ) :         
        return self.act.CountProfileQuestionQuestionIdProfileId(
        question_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileQuestionListFilter(self, filter_obj) :
        return self.act.BrowseProfileQuestionListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionUuidType(self, set_type, obj) :
        return self.act.SetProfileQuestionUuid(set_type, obj)
               
    def SetProfileQuestionUuid(self, obj) :
        return self.act.SetProfileQuestionUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionChannelIdProfileIdType(self, set_type, obj) :
        return self.act.SetProfileQuestionChannelIdProfileId(set_type, obj)
               
    def SetProfileQuestionChannelIdProfileId(self, obj) :
        return self.act.SetProfileQuestionChannelIdProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionQuestionIdProfileIdType(self, set_type, obj) :
        return self.act.SetProfileQuestionQuestionIdProfileId(set_type, obj)
               
    def SetProfileQuestionQuestionIdProfileId(self, obj) :
        return self.act.SetProfileQuestionQuestionIdProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileQuestionChannelIdQuestionIdProfileIdType(self, set_type, obj) :
        return self.act.SetProfileQuestionChannelIdQuestionIdProfileId(set_type, obj)
               
    def SetProfileQuestionChannelIdQuestionIdProfileId(self, obj) :
        return self.act.SetProfileQuestionChannelIdQuestionIdProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileQuestionUuid(self
        , uuid
    ) :          
        return self.act.DelProfileQuestionUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileQuestionChannelIdOrgId(self
        , channel_id
        , org_id
    ) :          
        return self.act.DelProfileQuestionChannelIdOrgId(
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
    def GetProfileQuestionListUuid(self
        , uuid
        ) :
            return self.act.GetProfileQuestionListUuid(
                uuid
            )
        
    def GetProfileQuestionUuid(self
        , uuid
    ) :
        for item in self.GetProfileQuestionListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListUuid(self
        , uuid
    ) :
        return CachedGetProfileQuestionListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileQuestionListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListUuid";

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
            objs = GetProfileQuestionListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListChannelId(self
        , channel_id
        ) :
            return self.act.GetProfileQuestionListChannelId(
                channel_id
            )
        
    def GetProfileQuestionChannelId(self
        , channel_id
    ) :
        for item in self.GetProfileQuestionListChannelId(
        channel_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListChannelId(self
        , channel_id
    ) :
        return CachedGetProfileQuestionListChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
        )
        
    def CachedGetProfileQuestionListChannelId(self
        , overrideCache
        , cacheHours
        , channel_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListChannelId";

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
            objs = GetProfileQuestionListChannelId(
                channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListOrgId(self
        , org_id
        ) :
            return self.act.GetProfileQuestionListOrgId(
                org_id
            )
        
    def GetProfileQuestionOrgId(self
        , org_id
    ) :
        for item in self.GetProfileQuestionListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListOrgId(self
        , org_id
    ) :
        return CachedGetProfileQuestionListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetProfileQuestionListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListOrgId";

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
            objs = GetProfileQuestionListOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileQuestionListProfileId(
                profile_id
            )
        
    def GetProfileQuestionProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileQuestionListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileQuestionListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileQuestionListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListProfileId";

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
            objs = GetProfileQuestionListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListQuestionId(self
        , question_id
        ) :
            return self.act.GetProfileQuestionListQuestionId(
                question_id
            )
        
    def GetProfileQuestionQuestionId(self
        , question_id
    ) :
        for item in self.GetProfileQuestionListQuestionId(
        question_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListQuestionId(self
        , question_id
    ) :
        return CachedGetProfileQuestionListQuestionId(
            false
            , self.CACHE_DEFAULT_HOURS
            , question_id
        )
        
    def CachedGetProfileQuestionListQuestionId(self
        , overrideCache
        , cacheHours
        , question_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListQuestionId";

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
            objs = GetProfileQuestionListQuestionId(
                question_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListChannelIdOrgId(self
        , channel_id
        , org_id
        ) :
            return self.act.GetProfileQuestionListChannelIdOrgId(
                channel_id
                , org_id
            )
        
    def GetProfileQuestionChannelIdOrgId(self
        , channel_id
        , org_id
    ) :
        for item in self.GetProfileQuestionListChannelIdOrgId(
        channel_id
        , org_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListChannelIdOrgId(self
        , channel_id
        , org_id
    ) :
        return CachedGetProfileQuestionListChannelIdOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , org_id
        )
        
    def CachedGetProfileQuestionListChannelIdOrgId(self
        , overrideCache
        , cacheHours
        , channel_id
        , org_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListChannelIdOrgId";

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
            objs = GetProfileQuestionListChannelIdOrgId(
                channel_id
                , org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListChannelIdProfileId(self
        , channel_id
        , profile_id
        ) :
            return self.act.GetProfileQuestionListChannelIdProfileId(
                channel_id
                , profile_id
            )
        
    def GetProfileQuestionChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :
        for item in self.GetProfileQuestionListChannelIdProfileId(
        channel_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :
        return CachedGetProfileQuestionListChannelIdProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , profile_id
        )
        
    def CachedGetProfileQuestionListChannelIdProfileId(self
        , overrideCache
        , cacheHours
        , channel_id
        , profile_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListChannelIdProfileId";

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
            objs = GetProfileQuestionListChannelIdProfileId(
                channel_id
                , profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileQuestionListQuestionIdProfileId(self
        , question_id
        , profile_id
        ) :
            return self.act.GetProfileQuestionListQuestionIdProfileId(
                question_id
                , profile_id
            )
        
    def GetProfileQuestionQuestionIdProfileId(self
        , question_id
        , profile_id
    ) :
        for item in self.GetProfileQuestionListQuestionIdProfileId(
        question_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileQuestionListQuestionIdProfileId(self
        , question_id
        , profile_id
    ) :
        return CachedGetProfileQuestionListQuestionIdProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , question_id
            , profile_id
        )
        
    def CachedGetProfileQuestionListQuestionIdProfileId(self
        , overrideCache
        , cacheHours
        , question_id
        , profile_id
    ) :
        pass
        """
        List<ProfileQuestion> objs;

        string method_name = "CachedGetProfileQuestionListQuestionIdProfileId";

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
            objs = GetProfileQuestionListQuestionIdProfileId(
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
    def CountProfileChannelUuid(self
        , uuid
    ) :         
        return self.act.CountProfileChannelUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileChannelChannelId(self
        , channel_id
    ) :         
        return self.act.CountProfileChannelChannelId(
        channel_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileChannelProfileId(self
        , profile_id
    ) :         
        return self.act.CountProfileChannelProfileId(
        profile_id
        )
        
#------------------------------------------------------------------------------                    
    def CountProfileChannelChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :         
        return self.act.CountProfileChannelChannelIdProfileId(
        channel_id
        , profile_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseProfileChannelListFilter(self, filter_obj) :
        return self.act.BrowseProfileChannelListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetProfileChannelUuidType(self, set_type, obj) :
        return self.act.SetProfileChannelUuid(set_type, obj)
               
    def SetProfileChannelUuid(self, obj) :
        return self.act.SetProfileChannelUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetProfileChannelChannelIdProfileIdType(self, set_type, obj) :
        return self.act.SetProfileChannelChannelIdProfileId(set_type, obj)
               
    def SetProfileChannelChannelIdProfileId(self, obj) :
        return self.act.SetProfileChannelChannelIdProfileId('full', obj)
#------------------------------------------------------------------------------                    
    def DelProfileChannelUuid(self
        , uuid
    ) :          
        return self.act.DelProfileChannelUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelProfileChannelChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :          
        return self.act.DelProfileChannelChannelIdProfileId(
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
    def GetProfileChannelListUuid(self
        , uuid
        ) :
            return self.act.GetProfileChannelListUuid(
                uuid
            )
        
    def GetProfileChannelUuid(self
        , uuid
    ) :
        for item in self.GetProfileChannelListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetProfileChannelListUuid(self
        , uuid
    ) :
        return CachedGetProfileChannelListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetProfileChannelListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<ProfileChannel> objs;

        string method_name = "CachedGetProfileChannelListUuid";

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
            objs = GetProfileChannelListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileChannelListChannelId(self
        , channel_id
        ) :
            return self.act.GetProfileChannelListChannelId(
                channel_id
            )
        
    def GetProfileChannelChannelId(self
        , channel_id
    ) :
        for item in self.GetProfileChannelListChannelId(
        channel_id
        ) :
            return item
        return None
    
    def CachedGetProfileChannelListChannelId(self
        , channel_id
    ) :
        return CachedGetProfileChannelListChannelId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
        )
        
    def CachedGetProfileChannelListChannelId(self
        , overrideCache
        , cacheHours
        , channel_id
    ) :
        pass
        """
        List<ProfileChannel> objs;

        string method_name = "CachedGetProfileChannelListChannelId";

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
            objs = GetProfileChannelListChannelId(
                channel_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileChannelListProfileId(self
        , profile_id
        ) :
            return self.act.GetProfileChannelListProfileId(
                profile_id
            )
        
    def GetProfileChannelProfileId(self
        , profile_id
    ) :
        for item in self.GetProfileChannelListProfileId(
        profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileChannelListProfileId(self
        , profile_id
    ) :
        return CachedGetProfileChannelListProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , profile_id
        )
        
    def CachedGetProfileChannelListProfileId(self
        , overrideCache
        , cacheHours
        , profile_id
    ) :
        pass
        """
        List<ProfileChannel> objs;

        string method_name = "CachedGetProfileChannelListProfileId";

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
            objs = GetProfileChannelListProfileId(
                profile_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetProfileChannelListChannelIdProfileId(self
        , channel_id
        , profile_id
        ) :
            return self.act.GetProfileChannelListChannelIdProfileId(
                channel_id
                , profile_id
            )
        
    def GetProfileChannelChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :
        for item in self.GetProfileChannelListChannelIdProfileId(
        channel_id
        , profile_id
        ) :
            return item
        return None
    
    def CachedGetProfileChannelListChannelIdProfileId(self
        , channel_id
        , profile_id
    ) :
        return CachedGetProfileChannelListChannelIdProfileId(
            false
            , self.CACHE_DEFAULT_HOURS
            , channel_id
            , profile_id
        )
        
    def CachedGetProfileChannelListChannelIdProfileId(self
        , overrideCache
        , cacheHours
        , channel_id
        , profile_id
    ) :
        pass
        """
        List<ProfileChannel> objs;

        string method_name = "CachedGetProfileChannelListChannelIdProfileId";

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
            objs = GetProfileChannelListChannelIdProfileId(
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
    def CountOrgSiteUuid(self
        , uuid
    ) :         
        return self.act.CountOrgSiteUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgSiteOrgId(self
        , org_id
    ) :         
        return self.act.CountOrgSiteOrgId(
        org_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgSiteSiteId(self
        , site_id
    ) :         
        return self.act.CountOrgSiteSiteId(
        site_id
        )
        
#------------------------------------------------------------------------------                    
    def CountOrgSiteOrgIdSiteId(self
        , org_id
        , site_id
    ) :         
        return self.act.CountOrgSiteOrgIdSiteId(
        org_id
        , site_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseOrgSiteListFilter(self, filter_obj) :
        return self.act.BrowseOrgSiteListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetOrgSiteUuidType(self, set_type, obj) :
        return self.act.SetOrgSiteUuid(set_type, obj)
               
    def SetOrgSiteUuid(self, obj) :
        return self.act.SetOrgSiteUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetOrgSiteOrgIdSiteIdType(self, set_type, obj) :
        return self.act.SetOrgSiteOrgIdSiteId(set_type, obj)
               
    def SetOrgSiteOrgIdSiteId(self, obj) :
        return self.act.SetOrgSiteOrgIdSiteId('full', obj)
#------------------------------------------------------------------------------                    
    def DelOrgSiteUuid(self
        , uuid
    ) :          
        return self.act.DelOrgSiteUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelOrgSiteOrgIdSiteId(self
        , org_id
        , site_id
    ) :          
        return self.act.DelOrgSiteOrgIdSiteId(
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
    def GetOrgSiteListUuid(self
        , uuid
        ) :
            return self.act.GetOrgSiteListUuid(
                uuid
            )
        
    def GetOrgSiteUuid(self
        , uuid
    ) :
        for item in self.GetOrgSiteListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetOrgSiteListUuid(self
        , uuid
    ) :
        return CachedGetOrgSiteListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetOrgSiteListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<OrgSite> objs;

        string method_name = "CachedGetOrgSiteListUuid";

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
            objs = GetOrgSiteListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgSiteListOrgId(self
        , org_id
        ) :
            return self.act.GetOrgSiteListOrgId(
                org_id
            )
        
    def GetOrgSiteOrgId(self
        , org_id
    ) :
        for item in self.GetOrgSiteListOrgId(
        org_id
        ) :
            return item
        return None
    
    def CachedGetOrgSiteListOrgId(self
        , org_id
    ) :
        return CachedGetOrgSiteListOrgId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
        )
        
    def CachedGetOrgSiteListOrgId(self
        , overrideCache
        , cacheHours
        , org_id
    ) :
        pass
        """
        List<OrgSite> objs;

        string method_name = "CachedGetOrgSiteListOrgId";

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
            objs = GetOrgSiteListOrgId(
                org_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgSiteListSiteId(self
        , site_id
        ) :
            return self.act.GetOrgSiteListSiteId(
                site_id
            )
        
    def GetOrgSiteSiteId(self
        , site_id
    ) :
        for item in self.GetOrgSiteListSiteId(
        site_id
        ) :
            return item
        return None
    
    def CachedGetOrgSiteListSiteId(self
        , site_id
    ) :
        return CachedGetOrgSiteListSiteId(
            false
            , self.CACHE_DEFAULT_HOURS
            , site_id
        )
        
    def CachedGetOrgSiteListSiteId(self
        , overrideCache
        , cacheHours
        , site_id
    ) :
        pass
        """
        List<OrgSite> objs;

        string method_name = "CachedGetOrgSiteListSiteId";

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
            objs = GetOrgSiteListSiteId(
                site_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetOrgSiteListOrgIdSiteId(self
        , org_id
        , site_id
        ) :
            return self.act.GetOrgSiteListOrgIdSiteId(
                org_id
                , site_id
            )
        
    def GetOrgSiteOrgIdSiteId(self
        , org_id
        , site_id
    ) :
        for item in self.GetOrgSiteListOrgIdSiteId(
        org_id
        , site_id
        ) :
            return item
        return None
    
    def CachedGetOrgSiteListOrgIdSiteId(self
        , org_id
        , site_id
    ) :
        return CachedGetOrgSiteListOrgIdSiteId(
            false
            , self.CACHE_DEFAULT_HOURS
            , org_id
            , site_id
        )
        
    def CachedGetOrgSiteListOrgIdSiteId(self
        , overrideCache
        , cacheHours
        , org_id
        , site_id
    ) :
        pass
        """
        List<OrgSite> objs;

        string method_name = "CachedGetOrgSiteListOrgIdSiteId";

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
            objs = GetOrgSiteListOrgIdSiteId(
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
    def CountSiteAppUuid(self
        , uuid
    ) :         
        return self.act.CountSiteAppUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteAppAppId(self
        , app_id
    ) :         
        return self.act.CountSiteAppAppId(
        app_id
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteAppSiteId(self
        , site_id
    ) :         
        return self.act.CountSiteAppSiteId(
        site_id
        )
        
#------------------------------------------------------------------------------                    
    def CountSiteAppAppIdSiteId(self
        , app_id
        , site_id
    ) :         
        return self.act.CountSiteAppAppIdSiteId(
        app_id
        , site_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseSiteAppListFilter(self, filter_obj) :
        return self.act.BrowseSiteAppListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetSiteAppUuidType(self, set_type, obj) :
        return self.act.SetSiteAppUuid(set_type, obj)
               
    def SetSiteAppUuid(self, obj) :
        return self.act.SetSiteAppUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetSiteAppAppIdSiteIdType(self, set_type, obj) :
        return self.act.SetSiteAppAppIdSiteId(set_type, obj)
               
    def SetSiteAppAppIdSiteId(self, obj) :
        return self.act.SetSiteAppAppIdSiteId('full', obj)
#------------------------------------------------------------------------------                    
    def DelSiteAppUuid(self
        , uuid
    ) :          
        return self.act.DelSiteAppUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelSiteAppAppIdSiteId(self
        , app_id
        , site_id
    ) :          
        return self.act.DelSiteAppAppIdSiteId(
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
    def GetSiteAppListUuid(self
        , uuid
        ) :
            return self.act.GetSiteAppListUuid(
                uuid
            )
        
    def GetSiteAppUuid(self
        , uuid
    ) :
        for item in self.GetSiteAppListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetSiteAppListUuid(self
        , uuid
    ) :
        return CachedGetSiteAppListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetSiteAppListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<SiteApp> objs;

        string method_name = "CachedGetSiteAppListUuid";

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
            objs = GetSiteAppListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteAppListAppId(self
        , app_id
        ) :
            return self.act.GetSiteAppListAppId(
                app_id
            )
        
    def GetSiteAppAppId(self
        , app_id
    ) :
        for item in self.GetSiteAppListAppId(
        app_id
        ) :
            return item
        return None
    
    def CachedGetSiteAppListAppId(self
        , app_id
    ) :
        return CachedGetSiteAppListAppId(
            false
            , self.CACHE_DEFAULT_HOURS
            , app_id
        )
        
    def CachedGetSiteAppListAppId(self
        , overrideCache
        , cacheHours
        , app_id
    ) :
        pass
        """
        List<SiteApp> objs;

        string method_name = "CachedGetSiteAppListAppId";

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
            objs = GetSiteAppListAppId(
                app_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteAppListSiteId(self
        , site_id
        ) :
            return self.act.GetSiteAppListSiteId(
                site_id
            )
        
    def GetSiteAppSiteId(self
        , site_id
    ) :
        for item in self.GetSiteAppListSiteId(
        site_id
        ) :
            return item
        return None
    
    def CachedGetSiteAppListSiteId(self
        , site_id
    ) :
        return CachedGetSiteAppListSiteId(
            false
            , self.CACHE_DEFAULT_HOURS
            , site_id
        )
        
    def CachedGetSiteAppListSiteId(self
        , overrideCache
        , cacheHours
        , site_id
    ) :
        pass
        """
        List<SiteApp> objs;

        string method_name = "CachedGetSiteAppListSiteId";

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
            objs = GetSiteAppListSiteId(
                site_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetSiteAppListAppIdSiteId(self
        , app_id
        , site_id
        ) :
            return self.act.GetSiteAppListAppIdSiteId(
                app_id
                , site_id
            )
        
    def GetSiteAppAppIdSiteId(self
        , app_id
        , site_id
    ) :
        for item in self.GetSiteAppListAppIdSiteId(
        app_id
        , site_id
        ) :
            return item
        return None
    
    def CachedGetSiteAppListAppIdSiteId(self
        , app_id
        , site_id
    ) :
        return CachedGetSiteAppListAppIdSiteId(
            false
            , self.CACHE_DEFAULT_HOURS
            , app_id
            , site_id
        )
        
    def CachedGetSiteAppListAppIdSiteId(self
        , overrideCache
        , cacheHours
        , app_id
        , site_id
    ) :
        pass
        """
        List<SiteApp> objs;

        string method_name = "CachedGetSiteAppListAppIdSiteId";

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
            objs = GetSiteAppListAppIdSiteId(
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
    def CountPhotoUuid(self
        , uuid
    ) :         
        return self.act.CountPhotoUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountPhotoExternalId(self
        , external_id
    ) :         
        return self.act.CountPhotoExternalId(
        external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountPhotoUrl(self
        , url
    ) :         
        return self.act.CountPhotoUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountPhotoUrlExternalId(self
        , url
        , external_id
    ) :         
        return self.act.CountPhotoUrlExternalId(
        url
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountPhotoUuidExternalId(self
        , uuid
        , external_id
    ) :         
        return self.act.CountPhotoUuidExternalId(
        uuid
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowsePhotoListFilter(self, filter_obj) :
        return self.act.BrowsePhotoListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetPhotoUuidType(self, set_type, obj) :
        return self.act.SetPhotoUuid(set_type, obj)
               
    def SetPhotoUuid(self, obj) :
        return self.act.SetPhotoUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetPhotoExternalIdType(self, set_type, obj) :
        return self.act.SetPhotoExternalId(set_type, obj)
               
    def SetPhotoExternalId(self, obj) :
        return self.act.SetPhotoExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetPhotoUrlType(self, set_type, obj) :
        return self.act.SetPhotoUrl(set_type, obj)
               
    def SetPhotoUrl(self, obj) :
        return self.act.SetPhotoUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetPhotoUrlExternalIdType(self, set_type, obj) :
        return self.act.SetPhotoUrlExternalId(set_type, obj)
               
    def SetPhotoUrlExternalId(self, obj) :
        return self.act.SetPhotoUrlExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetPhotoUuidExternalIdType(self, set_type, obj) :
        return self.act.SetPhotoUuidExternalId(set_type, obj)
               
    def SetPhotoUuidExternalId(self, obj) :
        return self.act.SetPhotoUuidExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def DelPhotoUuid(self
        , uuid
    ) :          
        return self.act.DelPhotoUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelPhotoExternalId(self
        , external_id
    ) :          
        return self.act.DelPhotoExternalId(
        external_id
        )
#------------------------------------------------------------------------------                    
    def DelPhotoUrl(self
        , url
    ) :          
        return self.act.DelPhotoUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelPhotoUrlExternalId(self
        , url
        , external_id
    ) :          
        return self.act.DelPhotoUrlExternalId(
        url
        , external_id
        )
#------------------------------------------------------------------------------                    
    def DelPhotoUuidExternalId(self
        , uuid
        , external_id
    ) :          
        return self.act.DelPhotoUuidExternalId(
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
    def GetPhotoListUuid(self
        , uuid
        ) :
            return self.act.GetPhotoListUuid(
                uuid
            )
        
    def GetPhotoUuid(self
        , uuid
    ) :
        for item in self.GetPhotoListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetPhotoListUuid(self
        , uuid
    ) :
        return CachedGetPhotoListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetPhotoListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoListUuid";

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
            objs = GetPhotoListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPhotoListExternalId(self
        , external_id
        ) :
            return self.act.GetPhotoListExternalId(
                external_id
            )
        
    def GetPhotoExternalId(self
        , external_id
    ) :
        for item in self.GetPhotoListExternalId(
        external_id
        ) :
            return item
        return None
    
    def CachedGetPhotoListExternalId(self
        , external_id
    ) :
        return CachedGetPhotoListExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , external_id
        )
        
    def CachedGetPhotoListExternalId(self
        , overrideCache
        , cacheHours
        , external_id
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoListExternalId";

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
            objs = GetPhotoListExternalId(
                external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPhotoListUrl(self
        , url
        ) :
            return self.act.GetPhotoListUrl(
                url
            )
        
    def GetPhotoUrl(self
        , url
    ) :
        for item in self.GetPhotoListUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetPhotoListUrl(self
        , url
    ) :
        return CachedGetPhotoListUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetPhotoListUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoListUrl";

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
            objs = GetPhotoListUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPhotoListUrlExternalId(self
        , url
        , external_id
        ) :
            return self.act.GetPhotoListUrlExternalId(
                url
                , external_id
            )
        
    def GetPhotoUrlExternalId(self
        , url
        , external_id
    ) :
        for item in self.GetPhotoListUrlExternalId(
        url
        , external_id
        ) :
            return item
        return None
    
    def CachedGetPhotoListUrlExternalId(self
        , url
        , external_id
    ) :
        return CachedGetPhotoListUrlExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , external_id
        )
        
    def CachedGetPhotoListUrlExternalId(self
        , overrideCache
        , cacheHours
        , url
        , external_id
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoListUrlExternalId";

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
            objs = GetPhotoListUrlExternalId(
                url
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetPhotoListUuidExternalId(self
        , uuid
        , external_id
        ) :
            return self.act.GetPhotoListUuidExternalId(
                uuid
                , external_id
            )
        
    def GetPhotoUuidExternalId(self
        , uuid
        , external_id
    ) :
        for item in self.GetPhotoListUuidExternalId(
        uuid
        , external_id
        ) :
            return item
        return None
    
    def CachedGetPhotoListUuidExternalId(self
        , uuid
        , external_id
    ) :
        return CachedGetPhotoListUuidExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , external_id
        )
        
    def CachedGetPhotoListUuidExternalId(self
        , overrideCache
        , cacheHours
        , uuid
        , external_id
    ) :
        pass
        """
        List<Photo> objs;

        string method_name = "CachedGetPhotoListUuidExternalId";

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
            objs = GetPhotoListUuidExternalId(
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
    def CountVideoUuid(self
        , uuid
    ) :         
        return self.act.CountVideoUuid(
        uuid
        )
        
#------------------------------------------------------------------------------                    
    def CountVideoExternalId(self
        , external_id
    ) :         
        return self.act.CountVideoExternalId(
        external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountVideoUrl(self
        , url
    ) :         
        return self.act.CountVideoUrl(
        url
        )
        
#------------------------------------------------------------------------------                    
    def CountVideoUrlExternalId(self
        , url
        , external_id
    ) :         
        return self.act.CountVideoUrlExternalId(
        url
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def CountVideoUuidExternalId(self
        , uuid
        , external_id
    ) :         
        return self.act.CountVideoUuidExternalId(
        uuid
        , external_id
        )
        
#------------------------------------------------------------------------------                    
    def BrowseVideoListFilter(self, filter_obj) :
        return self.act.BrowseVideoListFilter(filter_obj)
#------------------------------------------------------------------------------                    
    def SetVideoUuidType(self, set_type, obj) :
        return self.act.SetVideoUuid(set_type, obj)
               
    def SetVideoUuid(self, obj) :
        return self.act.SetVideoUuid('full', obj)
#------------------------------------------------------------------------------                    
    def SetVideoExternalIdType(self, set_type, obj) :
        return self.act.SetVideoExternalId(set_type, obj)
               
    def SetVideoExternalId(self, obj) :
        return self.act.SetVideoExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetVideoUrlType(self, set_type, obj) :
        return self.act.SetVideoUrl(set_type, obj)
               
    def SetVideoUrl(self, obj) :
        return self.act.SetVideoUrl('full', obj)
#------------------------------------------------------------------------------                    
    def SetVideoUrlExternalIdType(self, set_type, obj) :
        return self.act.SetVideoUrlExternalId(set_type, obj)
               
    def SetVideoUrlExternalId(self, obj) :
        return self.act.SetVideoUrlExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def SetVideoUuidExternalIdType(self, set_type, obj) :
        return self.act.SetVideoUuidExternalId(set_type, obj)
               
    def SetVideoUuidExternalId(self, obj) :
        return self.act.SetVideoUuidExternalId('full', obj)
#------------------------------------------------------------------------------                    
    def DelVideoUuid(self
        , uuid
    ) :          
        return self.act.DelVideoUuid(
        uuid
        )
#------------------------------------------------------------------------------                    
    def DelVideoExternalId(self
        , external_id
    ) :          
        return self.act.DelVideoExternalId(
        external_id
        )
#------------------------------------------------------------------------------                    
    def DelVideoUrl(self
        , url
    ) :          
        return self.act.DelVideoUrl(
        url
        )
#------------------------------------------------------------------------------                    
    def DelVideoUrlExternalId(self
        , url
        , external_id
    ) :          
        return self.act.DelVideoUrlExternalId(
        url
        , external_id
        )
#------------------------------------------------------------------------------                    
    def DelVideoUuidExternalId(self
        , uuid
        , external_id
    ) :          
        return self.act.DelVideoUuidExternalId(
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
    def GetVideoListUuid(self
        , uuid
        ) :
            return self.act.GetVideoListUuid(
                uuid
            )
        
    def GetVideoUuid(self
        , uuid
    ) :
        for item in self.GetVideoListUuid(
        uuid
        ) :
            return item
        return None
    
    def CachedGetVideoListUuid(self
        , uuid
    ) :
        return CachedGetVideoListUuid(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
        )
        
    def CachedGetVideoListUuid(self
        , overrideCache
        , cacheHours
        , uuid
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoListUuid";

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
            objs = GetVideoListUuid(
                uuid
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetVideoListExternalId(self
        , external_id
        ) :
            return self.act.GetVideoListExternalId(
                external_id
            )
        
    def GetVideoExternalId(self
        , external_id
    ) :
        for item in self.GetVideoListExternalId(
        external_id
        ) :
            return item
        return None
    
    def CachedGetVideoListExternalId(self
        , external_id
    ) :
        return CachedGetVideoListExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , external_id
        )
        
    def CachedGetVideoListExternalId(self
        , overrideCache
        , cacheHours
        , external_id
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoListExternalId";

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
            objs = GetVideoListExternalId(
                external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetVideoListUrl(self
        , url
        ) :
            return self.act.GetVideoListUrl(
                url
            )
        
    def GetVideoUrl(self
        , url
    ) :
        for item in self.GetVideoListUrl(
        url
        ) :
            return item
        return None
    
    def CachedGetVideoListUrl(self
        , url
    ) :
        return CachedGetVideoListUrl(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
        )
        
    def CachedGetVideoListUrl(self
        , overrideCache
        , cacheHours
        , url
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoListUrl";

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
            objs = GetVideoListUrl(
                url
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetVideoListUrlExternalId(self
        , url
        , external_id
        ) :
            return self.act.GetVideoListUrlExternalId(
                url
                , external_id
            )
        
    def GetVideoUrlExternalId(self
        , url
        , external_id
    ) :
        for item in self.GetVideoListUrlExternalId(
        url
        , external_id
        ) :
            return item
        return None
    
    def CachedGetVideoListUrlExternalId(self
        , url
        , external_id
    ) :
        return CachedGetVideoListUrlExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , url
            , external_id
        )
        
    def CachedGetVideoListUrlExternalId(self
        , overrideCache
        , cacheHours
        , url
        , external_id
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoListUrlExternalId";

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
            objs = GetVideoListUrlExternalId(
                url
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
#------------------------------------------------------------------------------                    
    def GetVideoListUuidExternalId(self
        , uuid
        , external_id
        ) :
            return self.act.GetVideoListUuidExternalId(
                uuid
                , external_id
            )
        
    def GetVideoUuidExternalId(self
        , uuid
        , external_id
    ) :
        for item in self.GetVideoListUuidExternalId(
        uuid
        , external_id
        ) :
            return item
        return None
    
    def CachedGetVideoListUuidExternalId(self
        , uuid
        , external_id
    ) :
        return CachedGetVideoListUuidExternalId(
            false
            , self.CACHE_DEFAULT_HOURS
            , uuid
            , external_id
        )
        
    def CachedGetVideoListUuidExternalId(self
        , overrideCache
        , cacheHours
        , uuid
        , external_id
    ) :
        pass
        """
        List<Video> objs;

        string method_name = "CachedGetVideoListUuidExternalId";

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
            objs = GetVideoListUuidExternalId(
                uuid
                , external_id
            );
            CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
        }
        return objs;
        """
              
        

