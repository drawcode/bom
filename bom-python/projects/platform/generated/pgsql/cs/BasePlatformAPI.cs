using System;
using System.Data;
using System.Data.SqlClient;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core;
using ah.core.data;
using ah.core.ent;
using ah.core.util;

using platform;
using platform.ent;

namespace platform {

    public class BasePlatformAPI {
        BasePlatformACT act = new BasePlatformACT();
        
        public int CACHE_DEFAULT_HOURS = 12;
        
        public string DEFAULT_SET_TYPE = "full";
        
        public BasePlatformAPI(){
        
        }
        
        public enum SetType{
            FULL,
            INSERT_ONLY, // use insert only for faster logs, bulk data
            UPDATE_ONLY
        }
        
        public virtual string ConvertSetTypeToString(SetType set_type){
            if(set_type == SetType.UPDATE_ONLY)
                return "updateonly";
            else if(set_type == SetType.INSERT_ONLY)
                return "insertonly";
            else 
                return "full";
        }
        
//------------------------------------------------------------------------------                    
        public virtual int CountApp(
        )  {            
            return act.CountApp(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppUuid(
            string uuid
        )  {            
            return act.CountAppUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppCode(
            string code
        )  {            
            return act.CountAppCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppTypeId(
            string type_id
        )  {            
            return act.CountAppTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppCodeTypeId(
            string code
            , string type_id
        )  {            
            return act.CountAppCodeTypeId(
            code
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppPlatformTypeId(
            string platform
            , string type_id
        )  {            
            return act.CountAppPlatformTypeId(
            platform
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppPlatform(
            string platform
        )  {            
            return act.CountAppPlatform(
            platform
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual AppResult BrowseAppListFilter(SearchFilter obj)  {
            return act.BrowseAppListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppUuid(string set_type, App obj)  {
            return act.SetAppUuid(set_type, obj);
        }
        
        public virtual bool SetAppUuid(SetType set_type, App obj)  {
            return act.SetAppUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetAppUuid(App obj)  {
            return act.SetAppUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppCode(string set_type, App obj)  {
            return act.SetAppCode(set_type, obj);
        }
        
        public virtual bool SetAppCode(SetType set_type, App obj)  {
            return act.SetAppCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetAppCode(App obj)  {
            return act.SetAppCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelAppUuid(
            string uuid
        )  {            
            return act.DelAppUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelAppCode(
            string code
        )  {            
            return act.DelAppCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppList(
        )  {
            return act.GetAppList(
            );
        }
        
        public virtual App GetApp(
        )  {
            foreach (App item in GetAppList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppList(
        ) {
            return CachedGetAppList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<App> CachedGetAppList(
            bool overrideCache
            , int cacheHours
        ) {
            List<App> objs;

            string method_name = "CachedGetAppList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<App>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListUuid(
            string uuid
        )  {
            return act.GetAppListUuid(
            uuid
            );
        }
        
        public virtual App GetAppUuid(
            string uuid
        )  {
            foreach (App item in GetAppListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListUuid(
            string uuid
        ) {
            return CachedGetAppListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<App> CachedGetAppListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListCode(
            string code
        )  {
            return act.GetAppListCode(
            code
            );
        }
        
        public virtual App GetAppCode(
            string code
        )  {
            foreach (App item in GetAppListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListCode(
            string code
        ) {
            return CachedGetAppListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<App> CachedGetAppListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListTypeId(
            string type_id
        )  {
            return act.GetAppListTypeId(
            type_id
            );
        }
        
        public virtual App GetAppTypeId(
            string type_id
        )  {
            foreach (App item in GetAppListTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListTypeId(
            string type_id
        ) {
            return CachedGetAppListTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<App> CachedGetAppListTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListCodeTypeId(
            string code
            , string type_id
        )  {
            return act.GetAppListCodeTypeId(
            code
            , type_id
            );
        }
        
        public virtual App GetAppCodeTypeId(
            string code
            , string type_id
        )  {
            foreach (App item in GetAppListCodeTypeId(
            code
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListCodeTypeId(
            string code
            , string type_id
        ) {
            return CachedGetAppListCodeTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , type_id
                );
        }
        
        public virtual List<App> CachedGetAppListCodeTypeId(
            bool overrideCache
            , int cacheHours
            , string code
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListCodeTypeId(
                    code
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListPlatformTypeId(
            string platform
            , string type_id
        )  {
            return act.GetAppListPlatformTypeId(
            platform
            , type_id
            );
        }
        
        public virtual App GetAppPlatformTypeId(
            string platform
            , string type_id
        )  {
            foreach (App item in GetAppListPlatformTypeId(
            platform
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListPlatformTypeId(
            string platform
            , string type_id
        ) {
            return CachedGetAppListPlatformTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , platform
                    , type_id
                );
        }
        
        public virtual List<App> CachedGetAppListPlatformTypeId(
            bool overrideCache
            , int cacheHours
            , string platform
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListPlatformTypeId(
                    platform
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListPlatform(
            string platform
        )  {
            return act.GetAppListPlatform(
            platform
            );
        }
        
        public virtual App GetAppPlatform(
            string platform
        )  {
            foreach (App item in GetAppListPlatform(
            platform
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListPlatform(
            string platform
        ) {
            return CachedGetAppListPlatform(
                    false
                    , CACHE_DEFAULT_HOURS
                    , platform
                );
        }
        
        public virtual List<App> CachedGetAppListPlatform(
            bool overrideCache
            , int cacheHours
            , string platform
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListPlatform(
                    platform
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountAppType(
        )  {            
            return act.CountAppType(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppTypeUuid(
            string uuid
        )  {            
            return act.CountAppTypeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppTypeCode(
            string code
        )  {            
            return act.CountAppTypeCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual AppTypeResult BrowseAppTypeListFilter(SearchFilter obj)  {
            return act.BrowseAppTypeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppTypeUuid(string set_type, AppType obj)  {
            return act.SetAppTypeUuid(set_type, obj);
        }
        
        public virtual bool SetAppTypeUuid(SetType set_type, AppType obj)  {
            return act.SetAppTypeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetAppTypeUuid(AppType obj)  {
            return act.SetAppTypeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppTypeCode(string set_type, AppType obj)  {
            return act.SetAppTypeCode(set_type, obj);
        }
        
        public virtual bool SetAppTypeCode(SetType set_type, AppType obj)  {
            return act.SetAppTypeCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetAppTypeCode(AppType obj)  {
            return act.SetAppTypeCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelAppTypeUuid(
            string uuid
        )  {            
            return act.DelAppTypeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelAppTypeCode(
            string code
        )  {            
            return act.DelAppTypeCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<AppType> GetAppTypeList(
        )  {
            return act.GetAppTypeList(
            );
        }
        
        public virtual AppType GetAppType(
        )  {
            foreach (AppType item in GetAppTypeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<AppType> CachedGetAppTypeList(
        ) {
            return CachedGetAppTypeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<AppType> CachedGetAppTypeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<AppType> objs;

            string method_name = "CachedGetAppTypeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<AppType>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppTypeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<AppType> GetAppTypeListUuid(
            string uuid
        )  {
            return act.GetAppTypeListUuid(
            uuid
            );
        }
        
        public virtual AppType GetAppTypeUuid(
            string uuid
        )  {
            foreach (AppType item in GetAppTypeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<AppType> CachedGetAppTypeListUuid(
            string uuid
        ) {
            return CachedGetAppTypeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<AppType> CachedGetAppTypeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppTypeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<AppType> GetAppTypeListCode(
            string code
        )  {
            return act.GetAppTypeListCode(
            code
            );
        }
        
        public virtual AppType GetAppTypeCode(
            string code
        )  {
            foreach (AppType item in GetAppTypeListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<AppType> CachedGetAppTypeListCode(
            string code
        ) {
            return CachedGetAppTypeListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<AppType> CachedGetAppTypeListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppTypeListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountSite(
        )  {            
            return act.CountSite(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteUuid(
            string uuid
        )  {            
            return act.CountSiteUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteCode(
            string code
        )  {            
            return act.CountSiteCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteTypeId(
            string type_id
        )  {            
            return act.CountSiteTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteCodeTypeId(
            string code
            , string type_id
        )  {            
            return act.CountSiteCodeTypeId(
            code
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteDomainTypeId(
            string domain
            , string type_id
        )  {            
            return act.CountSiteDomainTypeId(
            domain
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteDomain(
            string domain
        )  {            
            return act.CountSiteDomain(
            domain
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual SiteResult BrowseSiteListFilter(SearchFilter obj)  {
            return act.BrowseSiteListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteUuid(string set_type, Site obj)  {
            return act.SetSiteUuid(set_type, obj);
        }
        
        public virtual bool SetSiteUuid(SetType set_type, Site obj)  {
            return act.SetSiteUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteUuid(Site obj)  {
            return act.SetSiteUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteCode(string set_type, Site obj)  {
            return act.SetSiteCode(set_type, obj);
        }
        
        public virtual bool SetSiteCode(SetType set_type, Site obj)  {
            return act.SetSiteCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteCode(Site obj)  {
            return act.SetSiteCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteUuid(
            string uuid
        )  {            
            return act.DelSiteUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteCode(
            string code
        )  {            
            return act.DelSiteCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteList(
        )  {
            return act.GetSiteList(
            );
        }
        
        public virtual Site GetSite(
        )  {
            foreach (Site item in GetSiteList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteList(
        ) {
            return CachedGetSiteList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<Site> CachedGetSiteList(
            bool overrideCache
            , int cacheHours
        ) {
            List<Site> objs;

            string method_name = "CachedGetSiteList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Site>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListUuid(
            string uuid
        )  {
            return act.GetSiteListUuid(
            uuid
            );
        }
        
        public virtual Site GetSiteUuid(
            string uuid
        )  {
            foreach (Site item in GetSiteListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListUuid(
            string uuid
        ) {
            return CachedGetSiteListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Site> CachedGetSiteListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListCode(
            string code
        )  {
            return act.GetSiteListCode(
            code
            );
        }
        
        public virtual Site GetSiteCode(
            string code
        )  {
            foreach (Site item in GetSiteListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListCode(
            string code
        ) {
            return CachedGetSiteListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Site> CachedGetSiteListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListTypeId(
            string type_id
        )  {
            return act.GetSiteListTypeId(
            type_id
            );
        }
        
        public virtual Site GetSiteTypeId(
            string type_id
        )  {
            foreach (Site item in GetSiteListTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListTypeId(
            string type_id
        ) {
            return CachedGetSiteListTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<Site> CachedGetSiteListTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListCodeTypeId(
            string code
            , string type_id
        )  {
            return act.GetSiteListCodeTypeId(
            code
            , type_id
            );
        }
        
        public virtual Site GetSiteCodeTypeId(
            string code
            , string type_id
        )  {
            foreach (Site item in GetSiteListCodeTypeId(
            code
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListCodeTypeId(
            string code
            , string type_id
        ) {
            return CachedGetSiteListCodeTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , type_id
                );
        }
        
        public virtual List<Site> CachedGetSiteListCodeTypeId(
            bool overrideCache
            , int cacheHours
            , string code
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListCodeTypeId(
                    code
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListDomainTypeId(
            string domain
            , string type_id
        )  {
            return act.GetSiteListDomainTypeId(
            domain
            , type_id
            );
        }
        
        public virtual Site GetSiteDomainTypeId(
            string domain
            , string type_id
        )  {
            foreach (Site item in GetSiteListDomainTypeId(
            domain
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListDomainTypeId(
            string domain
            , string type_id
        ) {
            return CachedGetSiteListDomainTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , domain
                    , type_id
                );
        }
        
        public virtual List<Site> CachedGetSiteListDomainTypeId(
            bool overrideCache
            , int cacheHours
            , string domain
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListDomainTypeId(
                    domain
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListDomain(
            string domain
        )  {
            return act.GetSiteListDomain(
            domain
            );
        }
        
        public virtual Site GetSiteDomain(
            string domain
        )  {
            foreach (Site item in GetSiteListDomain(
            domain
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListDomain(
            string domain
        ) {
            return CachedGetSiteListDomain(
                    false
                    , CACHE_DEFAULT_HOURS
                    , domain
                );
        }
        
        public virtual List<Site> CachedGetSiteListDomain(
            bool overrideCache
            , int cacheHours
            , string domain
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListDomain(
                    domain
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountSiteType(
        )  {            
            return act.CountSiteType(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteTypeUuid(
            string uuid
        )  {            
            return act.CountSiteTypeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteTypeCode(
            string code
        )  {            
            return act.CountSiteTypeCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual SiteTypeResult BrowseSiteTypeListFilter(SearchFilter obj)  {
            return act.BrowseSiteTypeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteTypeUuid(string set_type, SiteType obj)  {
            return act.SetSiteTypeUuid(set_type, obj);
        }
        
        public virtual bool SetSiteTypeUuid(SetType set_type, SiteType obj)  {
            return act.SetSiteTypeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteTypeUuid(SiteType obj)  {
            return act.SetSiteTypeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteTypeCode(string set_type, SiteType obj)  {
            return act.SetSiteTypeCode(set_type, obj);
        }
        
        public virtual bool SetSiteTypeCode(SetType set_type, SiteType obj)  {
            return act.SetSiteTypeCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteTypeCode(SiteType obj)  {
            return act.SetSiteTypeCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteTypeUuid(
            string uuid
        )  {            
            return act.DelSiteTypeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteTypeCode(
            string code
        )  {            
            return act.DelSiteTypeCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<SiteType> GetSiteTypeList(
        )  {
            return act.GetSiteTypeList(
            );
        }
        
        public virtual SiteType GetSiteType(
        )  {
            foreach (SiteType item in GetSiteTypeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteType> CachedGetSiteTypeList(
        ) {
            return CachedGetSiteTypeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<SiteType> CachedGetSiteTypeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<SiteType> objs;

            string method_name = "CachedGetSiteTypeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<SiteType>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteTypeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<SiteType> GetSiteTypeListUuid(
            string uuid
        )  {
            return act.GetSiteTypeListUuid(
            uuid
            );
        }
        
        public virtual SiteType GetSiteTypeUuid(
            string uuid
        )  {
            foreach (SiteType item in GetSiteTypeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteType> CachedGetSiteTypeListUuid(
            string uuid
        ) {
            return CachedGetSiteTypeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<SiteType> CachedGetSiteTypeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteTypeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<SiteType> GetSiteTypeListCode(
            string code
        )  {
            return act.GetSiteTypeListCode(
            code
            );
        }
        
        public virtual SiteType GetSiteTypeCode(
            string code
        )  {
            foreach (SiteType item in GetSiteTypeListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteType> CachedGetSiteTypeListCode(
            string code
        ) {
            return CachedGetSiteTypeListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<SiteType> CachedGetSiteTypeListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteTypeListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountOrg(
        )  {            
            return act.CountOrg(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgUuid(
            string uuid
        )  {            
            return act.CountOrgUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgCode(
            string code
        )  {            
            return act.CountOrgCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgName(
            string name
        )  {            
            return act.CountOrgName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OrgResult BrowseOrgListFilter(SearchFilter obj)  {
            return act.BrowseOrgListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgUuid(string set_type, Org obj)  {
            return act.SetOrgUuid(set_type, obj);
        }
        
        public virtual bool SetOrgUuid(SetType set_type, Org obj)  {
            return act.SetOrgUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOrgUuid(Org obj)  {
            return act.SetOrgUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgUuid(
            string uuid
        )  {            
            return act.DelOrgUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Org> GetOrgList(
        )  {
            return act.GetOrgList(
            );
        }
        
        public virtual Org GetOrg(
        )  {
            foreach (Org item in GetOrgList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Org> CachedGetOrgList(
        ) {
            return CachedGetOrgList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<Org> CachedGetOrgList(
            bool overrideCache
            , int cacheHours
        ) {
            List<Org> objs;

            string method_name = "CachedGetOrgList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Org>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Org> GetOrgListUuid(
            string uuid
        )  {
            return act.GetOrgListUuid(
            uuid
            );
        }
        
        public virtual Org GetOrgUuid(
            string uuid
        )  {
            foreach (Org item in GetOrgListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Org> CachedGetOrgListUuid(
            string uuid
        ) {
            return CachedGetOrgListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Org> CachedGetOrgListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Org> GetOrgListCode(
            string code
        )  {
            return act.GetOrgListCode(
            code
            );
        }
        
        public virtual Org GetOrgCode(
            string code
        )  {
            foreach (Org item in GetOrgListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Org> CachedGetOrgListCode(
            string code
        ) {
            return CachedGetOrgListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Org> CachedGetOrgListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Org> GetOrgListName(
            string name
        )  {
            return act.GetOrgListName(
            name
            );
        }
        
        public virtual Org GetOrgName(
            string name
        )  {
            foreach (Org item in GetOrgListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Org> CachedGetOrgListName(
            string name
        ) {
            return CachedGetOrgListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Org> CachedGetOrgListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountOrgType(
        )  {            
            return act.CountOrgType(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgTypeUuid(
            string uuid
        )  {            
            return act.CountOrgTypeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgTypeCode(
            string code
        )  {            
            return act.CountOrgTypeCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OrgTypeResult BrowseOrgTypeListFilter(SearchFilter obj)  {
            return act.BrowseOrgTypeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgTypeUuid(string set_type, OrgType obj)  {
            return act.SetOrgTypeUuid(set_type, obj);
        }
        
        public virtual bool SetOrgTypeUuid(SetType set_type, OrgType obj)  {
            return act.SetOrgTypeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOrgTypeUuid(OrgType obj)  {
            return act.SetOrgTypeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgTypeCode(string set_type, OrgType obj)  {
            return act.SetOrgTypeCode(set_type, obj);
        }
        
        public virtual bool SetOrgTypeCode(SetType set_type, OrgType obj)  {
            return act.SetOrgTypeCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOrgTypeCode(OrgType obj)  {
            return act.SetOrgTypeCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgTypeUuid(
            string uuid
        )  {            
            return act.DelOrgTypeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgTypeCode(
            string code
        )  {            
            return act.DelOrgTypeCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<OrgType> GetOrgTypeList(
        )  {
            return act.GetOrgTypeList(
            );
        }
        
        public virtual OrgType GetOrgType(
        )  {
            foreach (OrgType item in GetOrgTypeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgType> CachedGetOrgTypeList(
        ) {
            return CachedGetOrgTypeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<OrgType> CachedGetOrgTypeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<OrgType> objs;

            string method_name = "CachedGetOrgTypeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<OrgType>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgTypeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OrgType> GetOrgTypeListUuid(
            string uuid
        )  {
            return act.GetOrgTypeListUuid(
            uuid
            );
        }
        
        public virtual OrgType GetOrgTypeUuid(
            string uuid
        )  {
            foreach (OrgType item in GetOrgTypeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgType> CachedGetOrgTypeListUuid(
            string uuid
        ) {
            return CachedGetOrgTypeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OrgType> CachedGetOrgTypeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgTypeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OrgType> GetOrgTypeListCode(
            string code
        )  {
            return act.GetOrgTypeListCode(
            code
            );
        }
        
        public virtual OrgType GetOrgTypeCode(
            string code
        )  {
            foreach (OrgType item in GetOrgTypeListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgType> CachedGetOrgTypeListCode(
            string code
        ) {
            return CachedGetOrgTypeListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<OrgType> CachedGetOrgTypeListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgTypeListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountContentItem(
        )  {            
            return act.CountContentItem(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemUuid(
            string uuid
        )  {            
            return act.CountContentItemUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemCode(
            string code
        )  {            
            return act.CountContentItemCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemName(
            string name
        )  {            
            return act.CountContentItemName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemPath(
            string path
        )  {            
            return act.CountContentItemPath(
            path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ContentItemResult BrowseContentItemListFilter(SearchFilter obj)  {
            return act.BrowseContentItemListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemUuid(string set_type, ContentItem obj)  {
            return act.SetContentItemUuid(set_type, obj);
        }
        
        public virtual bool SetContentItemUuid(SetType set_type, ContentItem obj)  {
            return act.SetContentItemUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetContentItemUuid(ContentItem obj)  {
            return act.SetContentItemUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemUuid(
            string uuid
        )  {            
            return act.DelContentItemUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemPath(
            string path
        )  {            
            return act.DelContentItemPath(
            path
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ContentItem> GetContentItemList(
        )  {
            return act.GetContentItemList(
            );
        }
        
        public virtual ContentItem GetContentItem(
        )  {
            foreach (ContentItem item in GetContentItemList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItem> CachedGetContentItemList(
        ) {
            return CachedGetContentItemList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ContentItem> CachedGetContentItemList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ContentItem> objs;

            string method_name = "CachedGetContentItemList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ContentItem>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentItem> GetContentItemListUuid(
            string uuid
        )  {
            return act.GetContentItemListUuid(
            uuid
            );
        }
        
        public virtual ContentItem GetContentItemUuid(
            string uuid
        )  {
            foreach (ContentItem item in GetContentItemListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItem> CachedGetContentItemListUuid(
            string uuid
        ) {
            return CachedGetContentItemListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ContentItem> CachedGetContentItemListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentItem> GetContentItemListCode(
            string code
        )  {
            return act.GetContentItemListCode(
            code
            );
        }
        
        public virtual ContentItem GetContentItemCode(
            string code
        )  {
            foreach (ContentItem item in GetContentItemListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItem> CachedGetContentItemListCode(
            string code
        ) {
            return CachedGetContentItemListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ContentItem> CachedGetContentItemListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentItem> GetContentItemListName(
            string name
        )  {
            return act.GetContentItemListName(
            name
            );
        }
        
        public virtual ContentItem GetContentItemName(
            string name
        )  {
            foreach (ContentItem item in GetContentItemListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItem> CachedGetContentItemListName(
            string name
        ) {
            return CachedGetContentItemListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<ContentItem> CachedGetContentItemListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentItem> GetContentItemListPath(
            string path
        )  {
            return act.GetContentItemListPath(
            path
            );
        }
        
        public virtual ContentItem GetContentItemPath(
            string path
        )  {
            foreach (ContentItem item in GetContentItemListPath(
            path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItem> CachedGetContentItemListPath(
            string path
        ) {
            return CachedGetContentItemListPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , path
                );
        }
        
        public virtual List<ContentItem> CachedGetContentItemListPath(
            bool overrideCache
            , int cacheHours
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemListPath(
                    path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemType(
        )  {            
            return act.CountContentItemType(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemTypeUuid(
            string uuid
        )  {            
            return act.CountContentItemTypeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemTypeCode(
            string code
        )  {            
            return act.CountContentItemTypeCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ContentItemTypeResult BrowseContentItemTypeListFilter(SearchFilter obj)  {
            return act.BrowseContentItemTypeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemTypeUuid(string set_type, ContentItemType obj)  {
            return act.SetContentItemTypeUuid(set_type, obj);
        }
        
        public virtual bool SetContentItemTypeUuid(SetType set_type, ContentItemType obj)  {
            return act.SetContentItemTypeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetContentItemTypeUuid(ContentItemType obj)  {
            return act.SetContentItemTypeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemTypeCode(string set_type, ContentItemType obj)  {
            return act.SetContentItemTypeCode(set_type, obj);
        }
        
        public virtual bool SetContentItemTypeCode(SetType set_type, ContentItemType obj)  {
            return act.SetContentItemTypeCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetContentItemTypeCode(ContentItemType obj)  {
            return act.SetContentItemTypeCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemTypeUuid(
            string uuid
        )  {            
            return act.DelContentItemTypeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemTypeCode(
            string code
        )  {            
            return act.DelContentItemTypeCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ContentItemType> GetContentItemTypeList(
        )  {
            return act.GetContentItemTypeList(
            );
        }
        
        public virtual ContentItemType GetContentItemType(
        )  {
            foreach (ContentItemType item in GetContentItemTypeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItemType> CachedGetContentItemTypeList(
        ) {
            return CachedGetContentItemTypeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ContentItemType> CachedGetContentItemTypeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ContentItemType> objs;

            string method_name = "CachedGetContentItemTypeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ContentItemType>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemTypeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentItemType> GetContentItemTypeListUuid(
            string uuid
        )  {
            return act.GetContentItemTypeListUuid(
            uuid
            );
        }
        
        public virtual ContentItemType GetContentItemTypeUuid(
            string uuid
        )  {
            foreach (ContentItemType item in GetContentItemTypeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItemType> CachedGetContentItemTypeListUuid(
            string uuid
        ) {
            return CachedGetContentItemTypeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ContentItemType> CachedGetContentItemTypeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemTypeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentItemType> GetContentItemTypeListCode(
            string code
        )  {
            return act.GetContentItemTypeListCode(
            code
            );
        }
        
        public virtual ContentItemType GetContentItemTypeCode(
            string code
        )  {
            foreach (ContentItemType item in GetContentItemTypeListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItemType> CachedGetContentItemTypeListCode(
            string code
        ) {
            return CachedGetContentItemTypeListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ContentItemType> CachedGetContentItemTypeListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemTypeListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountContentPage(
        )  {            
            return act.CountContentPage(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPageUuid(
            string uuid
        )  {            
            return act.CountContentPageUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPageCode(
            string code
        )  {            
            return act.CountContentPageCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPageName(
            string name
        )  {            
            return act.CountContentPageName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPagePath(
            string path
        )  {            
            return act.CountContentPagePath(
            path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ContentPageResult BrowseContentPageListFilter(SearchFilter obj)  {
            return act.BrowseContentPageListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentPageUuid(string set_type, ContentPage obj)  {
            return act.SetContentPageUuid(set_type, obj);
        }
        
        public virtual bool SetContentPageUuid(SetType set_type, ContentPage obj)  {
            return act.SetContentPageUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetContentPageUuid(ContentPage obj)  {
            return act.SetContentPageUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelContentPageUuid(
            string uuid
        )  {            
            return act.DelContentPageUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelContentPagePathSiteId(
            string path
            , string site_id
        )  {            
            return act.DelContentPagePathSiteId(
            path
            , site_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelContentPagePath(
            string path
        )  {            
            return act.DelContentPagePath(
            path
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageList(
        )  {
            return act.GetContentPageList(
            );
        }
        
        public virtual ContentPage GetContentPage(
        )  {
            foreach (ContentPage item in GetContentPageList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageList(
        ) {
            return CachedGetContentPageList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ContentPage> objs;

            string method_name = "CachedGetContentPageList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ContentPage>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListUuid(
            string uuid
        )  {
            return act.GetContentPageListUuid(
            uuid
            );
        }
        
        public virtual ContentPage GetContentPageUuid(
            string uuid
        )  {
            foreach (ContentPage item in GetContentPageListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListUuid(
            string uuid
        ) {
            return CachedGetContentPageListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListCode(
            string code
        )  {
            return act.GetContentPageListCode(
            code
            );
        }
        
        public virtual ContentPage GetContentPageCode(
            string code
        )  {
            foreach (ContentPage item in GetContentPageListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListCode(
            string code
        ) {
            return CachedGetContentPageListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListName(
            string name
        )  {
            return act.GetContentPageListName(
            name
            );
        }
        
        public virtual ContentPage GetContentPageName(
            string name
        )  {
            foreach (ContentPage item in GetContentPageListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListName(
            string name
        ) {
            return CachedGetContentPageListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListPath(
            string path
        )  {
            return act.GetContentPageListPath(
            path
            );
        }
        
        public virtual ContentPage GetContentPagePath(
            string path
        )  {
            foreach (ContentPage item in GetContentPageListPath(
            path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListPath(
            string path
        ) {
            return CachedGetContentPageListPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , path
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListPath(
            bool overrideCache
            , int cacheHours
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListPath(
                    path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListSiteId(
            string site_id
        )  {
            return act.GetContentPageListSiteId(
            site_id
            );
        }
        
        public virtual ContentPage GetContentPageSiteId(
            string site_id
        )  {
            foreach (ContentPage item in GetContentPageListSiteId(
            site_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListSiteId(
            string site_id
        ) {
            return CachedGetContentPageListSiteId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , site_id
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListSiteId(
            bool overrideCache
            , int cacheHours
            , string site_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListSiteId(
                    site_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListSiteIdPath(
            string site_id
            , string path
        )  {
            return act.GetContentPageListSiteIdPath(
            site_id
            , path
            );
        }
        
        public virtual ContentPage GetContentPageSiteIdPath(
            string site_id
            , string path
        )  {
            foreach (ContentPage item in GetContentPageListSiteIdPath(
            site_id
            , path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListSiteIdPath(
            string site_id
            , string path
        ) {
            return CachedGetContentPageListSiteIdPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , site_id
                    , path
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListSiteIdPath(
            bool overrideCache
            , int cacheHours
            , string site_id
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListSiteIdPath(
                    site_id
                    , path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountMessage(
        )  {            
            return act.CountMessage(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountMessageUuid(
            string uuid
        )  {            
            return act.CountMessageUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual MessageResult BrowseMessageListFilter(SearchFilter obj)  {
            return act.BrowseMessageListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetMessageUuid(string set_type, Message obj)  {
            return act.SetMessageUuid(set_type, obj);
        }
        
        public virtual bool SetMessageUuid(SetType set_type, Message obj)  {
            return act.SetMessageUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetMessageUuid(Message obj)  {
            return act.SetMessageUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelMessageUuid(
            string uuid
        )  {            
            return act.DelMessageUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Message> GetMessageList(
        )  {
            return act.GetMessageList(
            );
        }
        
        public virtual Message GetMessage(
        )  {
            foreach (Message item in GetMessageList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Message> CachedGetMessageList(
        ) {
            return CachedGetMessageList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<Message> CachedGetMessageList(
            bool overrideCache
            , int cacheHours
        ) {
            List<Message> objs;

            string method_name = "CachedGetMessageList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Message>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetMessageList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Message> GetMessageListUuid(
            string uuid
        )  {
            return act.GetMessageListUuid(
            uuid
            );
        }
        
        public virtual Message GetMessageUuid(
            string uuid
        )  {
            foreach (Message item in GetMessageListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Message> CachedGetMessageListUuid(
            string uuid
        ) {
            return CachedGetMessageListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Message> CachedGetMessageListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetMessageListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountOffer(
        )  {            
            return act.CountOffer(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferUuid(
            string uuid
        )  {            
            return act.CountOfferUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCode(
            string code
        )  {            
            return act.CountOfferCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferName(
            string name
        )  {            
            return act.CountOfferName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferOrgId(
            string org_id
        )  {            
            return act.CountOfferOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferResult BrowseOfferListFilter(SearchFilter obj)  {
            return act.BrowseOfferListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferUuid(string set_type, Offer obj)  {
            return act.SetOfferUuid(set_type, obj);
        }
        
        public virtual bool SetOfferUuid(SetType set_type, Offer obj)  {
            return act.SetOfferUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferUuid(Offer obj)  {
            return act.SetOfferUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferUuid(
            string uuid
        )  {            
            return act.DelOfferUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferOrgId(
            string org_id
        )  {            
            return act.DelOfferOrgId(
            org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Offer> GetOfferList(
        )  {
            return act.GetOfferList(
            );
        }
        
        public virtual Offer GetOffer(
        )  {
            foreach (Offer item in GetOfferList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Offer> CachedGetOfferList(
        ) {
            return CachedGetOfferList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<Offer> CachedGetOfferList(
            bool overrideCache
            , int cacheHours
        ) {
            List<Offer> objs;

            string method_name = "CachedGetOfferList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Offer>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Offer> GetOfferListUuid(
            string uuid
        )  {
            return act.GetOfferListUuid(
            uuid
            );
        }
        
        public virtual Offer GetOfferUuid(
            string uuid
        )  {
            foreach (Offer item in GetOfferListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Offer> CachedGetOfferListUuid(
            string uuid
        ) {
            return CachedGetOfferListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Offer> CachedGetOfferListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Offer> GetOfferListCode(
            string code
        )  {
            return act.GetOfferListCode(
            code
            );
        }
        
        public virtual Offer GetOfferCode(
            string code
        )  {
            foreach (Offer item in GetOfferListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Offer> CachedGetOfferListCode(
            string code
        ) {
            return CachedGetOfferListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Offer> CachedGetOfferListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Offer> GetOfferListName(
            string name
        )  {
            return act.GetOfferListName(
            name
            );
        }
        
        public virtual Offer GetOfferName(
            string name
        )  {
            foreach (Offer item in GetOfferListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Offer> CachedGetOfferListName(
            string name
        ) {
            return CachedGetOfferListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Offer> CachedGetOfferListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Offer> GetOfferListOrgId(
            string org_id
        )  {
            return act.GetOfferListOrgId(
            org_id
            );
        }
        
        public virtual Offer GetOfferOrgId(
            string org_id
        )  {
            foreach (Offer item in GetOfferListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Offer> CachedGetOfferListOrgId(
            string org_id
        ) {
            return CachedGetOfferListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<Offer> CachedGetOfferListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountOfferType(
        )  {            
            return act.CountOfferType(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferTypeUuid(
            string uuid
        )  {            
            return act.CountOfferTypeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferTypeCode(
            string code
        )  {            
            return act.CountOfferTypeCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferTypeName(
            string name
        )  {            
            return act.CountOfferTypeName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferTypeResult BrowseOfferTypeListFilter(SearchFilter obj)  {
            return act.BrowseOfferTypeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferTypeUuid(string set_type, OfferType obj)  {
            return act.SetOfferTypeUuid(set_type, obj);
        }
        
        public virtual bool SetOfferTypeUuid(SetType set_type, OfferType obj)  {
            return act.SetOfferTypeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferTypeUuid(OfferType obj)  {
            return act.SetOfferTypeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferTypeUuid(
            string uuid
        )  {            
            return act.DelOfferTypeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<OfferType> GetOfferTypeList(
        )  {
            return act.GetOfferTypeList(
            );
        }
        
        public virtual OfferType GetOfferType(
        )  {
            foreach (OfferType item in GetOfferTypeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferType> CachedGetOfferTypeList(
        ) {
            return CachedGetOfferTypeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<OfferType> CachedGetOfferTypeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<OfferType> objs;

            string method_name = "CachedGetOfferTypeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<OfferType>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferTypeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferType> GetOfferTypeListUuid(
            string uuid
        )  {
            return act.GetOfferTypeListUuid(
            uuid
            );
        }
        
        public virtual OfferType GetOfferTypeUuid(
            string uuid
        )  {
            foreach (OfferType item in GetOfferTypeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListUuid(
            string uuid
        ) {
            return CachedGetOfferTypeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferTypeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferType> GetOfferTypeListCode(
            string code
        )  {
            return act.GetOfferTypeListCode(
            code
            );
        }
        
        public virtual OfferType GetOfferTypeCode(
            string code
        )  {
            foreach (OfferType item in GetOfferTypeListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListCode(
            string code
        ) {
            return CachedGetOfferTypeListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferTypeListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferType> GetOfferTypeListName(
            string name
        )  {
            return act.GetOfferTypeListName(
            name
            );
        }
        
        public virtual OfferType GetOfferTypeName(
            string name
        )  {
            foreach (OfferType item in GetOfferTypeListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListName(
            string name
        ) {
            return CachedGetOfferTypeListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferTypeListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocation(
        )  {            
            return act.CountOfferLocation(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationUuid(
            string uuid
        )  {            
            return act.CountOfferLocationUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationOfferId(
            string offer_id
        )  {            
            return act.CountOfferLocationOfferId(
            offer_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationCity(
            string city
        )  {            
            return act.CountOfferLocationCity(
            city
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationCountryCode(
            string country_code
        )  {            
            return act.CountOfferLocationCountryCode(
            country_code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationPostalCode(
            string postal_code
        )  {            
            return act.CountOfferLocationPostalCode(
            postal_code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferLocationResult BrowseOfferLocationListFilter(SearchFilter obj)  {
            return act.BrowseOfferLocationListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferLocationUuid(string set_type, OfferLocation obj)  {
            return act.SetOfferLocationUuid(set_type, obj);
        }
        
        public virtual bool SetOfferLocationUuid(SetType set_type, OfferLocation obj)  {
            return act.SetOfferLocationUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferLocationUuid(OfferLocation obj)  {
            return act.SetOfferLocationUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferLocationUuid(
            string uuid
        )  {            
            return act.DelOfferLocationUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<OfferLocation> GetOfferLocationList(
        )  {
            return act.GetOfferLocationList(
            );
        }
        
        public virtual OfferLocation GetOfferLocation(
        )  {
            foreach (OfferLocation item in GetOfferLocationList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationList(
        ) {
            return CachedGetOfferLocationList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationList(
            bool overrideCache
            , int cacheHours
        ) {
            List<OfferLocation> objs;

            string method_name = "CachedGetOfferLocationList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<OfferLocation>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferLocation> GetOfferLocationListUuid(
            string uuid
        )  {
            return act.GetOfferLocationListUuid(
            uuid
            );
        }
        
        public virtual OfferLocation GetOfferLocationUuid(
            string uuid
        )  {
            foreach (OfferLocation item in GetOfferLocationListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListUuid(
            string uuid
        ) {
            return CachedGetOfferLocationListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferLocation> GetOfferLocationListOfferId(
            string offer_id
        )  {
            return act.GetOfferLocationListOfferId(
            offer_id
            );
        }
        
        public virtual OfferLocation GetOfferLocationOfferId(
            string offer_id
        )  {
            foreach (OfferLocation item in GetOfferLocationListOfferId(
            offer_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListOfferId(
            string offer_id
        ) {
            return CachedGetOfferLocationListOfferId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , offer_id
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListOfferId(
            bool overrideCache
            , int cacheHours
            , string offer_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationListOfferId(
                    offer_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferLocation> GetOfferLocationListCity(
            string city
        )  {
            return act.GetOfferLocationListCity(
            city
            );
        }
        
        public virtual OfferLocation GetOfferLocationCity(
            string city
        )  {
            foreach (OfferLocation item in GetOfferLocationListCity(
            city
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListCity(
            string city
        ) {
            return CachedGetOfferLocationListCity(
                    false
                    , CACHE_DEFAULT_HOURS
                    , city
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListCity(
            bool overrideCache
            , int cacheHours
            , string city
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationListCity(
                    city
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferLocation> GetOfferLocationListCountryCode(
            string country_code
        )  {
            return act.GetOfferLocationListCountryCode(
            country_code
            );
        }
        
        public virtual OfferLocation GetOfferLocationCountryCode(
            string country_code
        )  {
            foreach (OfferLocation item in GetOfferLocationListCountryCode(
            country_code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListCountryCode(
            string country_code
        ) {
            return CachedGetOfferLocationListCountryCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , country_code
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListCountryCode(
            bool overrideCache
            , int cacheHours
            , string country_code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationListCountryCode(
                    country_code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferLocation> GetOfferLocationListPostalCode(
            string postal_code
        )  {
            return act.GetOfferLocationListPostalCode(
            postal_code
            );
        }
        
        public virtual OfferLocation GetOfferLocationPostalCode(
            string postal_code
        )  {
            foreach (OfferLocation item in GetOfferLocationListPostalCode(
            postal_code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListPostalCode(
            string postal_code
        ) {
            return CachedGetOfferLocationListPostalCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , postal_code
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListPostalCode(
            bool overrideCache
            , int cacheHours
            , string postal_code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationListPostalCode(
                    postal_code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategory(
        )  {            
            return act.CountOfferCategory(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryUuid(
            string uuid
        )  {            
            return act.CountOfferCategoryUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryCode(
            string code
        )  {            
            return act.CountOfferCategoryCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryName(
            string name
        )  {            
            return act.CountOfferCategoryName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryOrgId(
            string org_id
        )  {            
            return act.CountOfferCategoryOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTypeId(
            string type_id
        )  {            
            return act.CountOfferCategoryTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryOrgIdTypeId(
            string org_id
            , string type_id
        )  {            
            return act.CountOfferCategoryOrgIdTypeId(
            org_id
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferCategoryResult BrowseOfferCategoryListFilter(SearchFilter obj)  {
            return act.BrowseOfferCategoryListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryUuid(string set_type, OfferCategory obj)  {
            return act.SetOfferCategoryUuid(set_type, obj);
        }
        
        public virtual bool SetOfferCategoryUuid(SetType set_type, OfferCategory obj)  {
            return act.SetOfferCategoryUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferCategoryUuid(OfferCategory obj)  {
            return act.SetOfferCategoryUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryUuid(
            string uuid
        )  {            
            return act.DelOfferCategoryUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryCodeOrgId(
            string code
            , string org_id
        )  {            
            return act.DelOfferCategoryCodeOrgId(
            code
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryCodeOrgIdTypeId(
            string code
            , string org_id
            , string type_id
        )  {            
            return act.DelOfferCategoryCodeOrgIdTypeId(
            code
            , org_id
            , type_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryList(
        )  {
            return act.GetOfferCategoryList(
            );
        }
        
        public virtual OfferCategory GetOfferCategory(
        )  {
            foreach (OfferCategory item in GetOfferCategoryList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryList(
        ) {
            return CachedGetOfferCategoryList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryList(
            bool overrideCache
            , int cacheHours
        ) {
            List<OfferCategory> objs;

            string method_name = "CachedGetOfferCategoryList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<OfferCategory>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListUuid(
            string uuid
        )  {
            return act.GetOfferCategoryListUuid(
            uuid
            );
        }
        
        public virtual OfferCategory GetOfferCategoryUuid(
            string uuid
        )  {
            foreach (OfferCategory item in GetOfferCategoryListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListUuid(
            string uuid
        ) {
            return CachedGetOfferCategoryListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListCode(
            string code
        )  {
            return act.GetOfferCategoryListCode(
            code
            );
        }
        
        public virtual OfferCategory GetOfferCategoryCode(
            string code
        )  {
            foreach (OfferCategory item in GetOfferCategoryListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListCode(
            string code
        ) {
            return CachedGetOfferCategoryListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListName(
            string name
        )  {
            return act.GetOfferCategoryListName(
            name
            );
        }
        
        public virtual OfferCategory GetOfferCategoryName(
            string name
        )  {
            foreach (OfferCategory item in GetOfferCategoryListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListName(
            string name
        ) {
            return CachedGetOfferCategoryListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListOrgId(
            string org_id
        )  {
            return act.GetOfferCategoryListOrgId(
            org_id
            );
        }
        
        public virtual OfferCategory GetOfferCategoryOrgId(
            string org_id
        )  {
            foreach (OfferCategory item in GetOfferCategoryListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListOrgId(
            string org_id
        ) {
            return CachedGetOfferCategoryListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListTypeId(
            string type_id
        )  {
            return act.GetOfferCategoryListTypeId(
            type_id
            );
        }
        
        public virtual OfferCategory GetOfferCategoryTypeId(
            string type_id
        )  {
            foreach (OfferCategory item in GetOfferCategoryListTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListTypeId(
            string type_id
        ) {
            return CachedGetOfferCategoryListTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            return act.GetOfferCategoryListOrgIdTypeId(
            org_id
            , type_id
            );
        }
        
        public virtual OfferCategory GetOfferCategoryOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            foreach (OfferCategory item in GetOfferCategoryListOrgIdTypeId(
            org_id
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListOrgIdTypeId(
            string org_id
            , string type_id
        ) {
            return CachedGetOfferCategoryListOrgIdTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , type_id
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListOrgIdTypeId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListOrgIdTypeId(
                    org_id
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTree(
        )  {            
            return act.CountOfferCategoryTree(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeUuid(
            string uuid
        )  {            
            return act.CountOfferCategoryTreeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeParentId(
            string parent_id
        )  {            
            return act.CountOfferCategoryTreeParentId(
            parent_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeCategoryId(
            string category_id
        )  {            
            return act.CountOfferCategoryTreeCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.CountOfferCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferCategoryTreeResult BrowseOfferCategoryTreeListFilter(SearchFilter obj)  {
            return act.BrowseOfferCategoryTreeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryTreeUuid(string set_type, OfferCategoryTree obj)  {
            return act.SetOfferCategoryTreeUuid(set_type, obj);
        }
        
        public virtual bool SetOfferCategoryTreeUuid(SetType set_type, OfferCategoryTree obj)  {
            return act.SetOfferCategoryTreeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferCategoryTreeUuid(OfferCategoryTree obj)  {
            return act.SetOfferCategoryTreeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryTreeUuid(
            string uuid
        )  {            
            return act.DelOfferCategoryTreeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryTreeParentId(
            string parent_id
        )  {            
            return act.DelOfferCategoryTreeParentId(
            parent_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryTreeCategoryId(
            string category_id
        )  {            
            return act.DelOfferCategoryTreeCategoryId(
            category_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.DelOfferCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeList(
        )  {
            return act.GetOfferCategoryTreeList(
            );
        }
        
        public virtual OfferCategoryTree GetOfferCategoryTree(
        )  {
            foreach (OfferCategoryTree item in GetOfferCategoryTreeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeList(
        ) {
            return CachedGetOfferCategoryTreeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<OfferCategoryTree> objs;

            string method_name = "CachedGetOfferCategoryTreeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<OfferCategoryTree>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryTreeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListUuid(
            string uuid
        )  {
            return act.GetOfferCategoryTreeListUuid(
            uuid
            );
        }
        
        public virtual OfferCategoryTree GetOfferCategoryTreeUuid(
            string uuid
        )  {
            foreach (OfferCategoryTree item in GetOfferCategoryTreeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListUuid(
            string uuid
        ) {
            return CachedGetOfferCategoryTreeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryTreeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListParentId(
            string parent_id
        )  {
            return act.GetOfferCategoryTreeListParentId(
            parent_id
            );
        }
        
        public virtual OfferCategoryTree GetOfferCategoryTreeParentId(
            string parent_id
        )  {
            foreach (OfferCategoryTree item in GetOfferCategoryTreeListParentId(
            parent_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListParentId(
            string parent_id
        ) {
            return CachedGetOfferCategoryTreeListParentId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                );
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListParentId(
            bool overrideCache
            , int cacheHours
            , string parent_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryTreeListParentId(
                    parent_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListCategoryId(
            string category_id
        )  {
            return act.GetOfferCategoryTreeListCategoryId(
            category_id
            );
        }
        
        public virtual OfferCategoryTree GetOfferCategoryTreeCategoryId(
            string category_id
        )  {
            foreach (OfferCategoryTree item in GetOfferCategoryTreeListCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListCategoryId(
            string category_id
        ) {
            return CachedGetOfferCategoryTreeListCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryTreeListCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            return act.GetOfferCategoryTreeListParentIdCategoryId(
            parent_id
            , category_id
            );
        }
        
        public virtual OfferCategoryTree GetOfferCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            foreach (OfferCategoryTree item in GetOfferCategoryTreeListParentIdCategoryId(
            parent_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListParentIdCategoryId(
            string parent_id
            , string category_id
        ) {
            return CachedGetOfferCategoryTreeListParentIdCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                    , category_id
                );
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListParentIdCategoryId(
            bool overrideCache
            , int cacheHours
            , string parent_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryTreeListParentIdCategoryId(
                    parent_id
                    , category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssoc(
        )  {            
            return act.CountOfferCategoryAssoc(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocUuid(
            string uuid
        )  {            
            return act.CountOfferCategoryAssocUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocOfferId(
            string offer_id
        )  {            
            return act.CountOfferCategoryAssocOfferId(
            offer_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocCategoryId(
            string category_id
        )  {            
            return act.CountOfferCategoryAssocCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocOfferIdCategoryId(
            string offer_id
            , string category_id
        )  {            
            return act.CountOfferCategoryAssocOfferIdCategoryId(
            offer_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferCategoryAssocResult BrowseOfferCategoryAssocListFilter(SearchFilter obj)  {
            return act.BrowseOfferCategoryAssocListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryAssocUuid(string set_type, OfferCategoryAssoc obj)  {
            return act.SetOfferCategoryAssocUuid(set_type, obj);
        }
        
        public virtual bool SetOfferCategoryAssocUuid(SetType set_type, OfferCategoryAssoc obj)  {
            return act.SetOfferCategoryAssocUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferCategoryAssocUuid(OfferCategoryAssoc obj)  {
            return act.SetOfferCategoryAssocUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryAssocUuid(
            string uuid
        )  {            
            return act.DelOfferCategoryAssocUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocList(
        )  {
            return act.GetOfferCategoryAssocList(
            );
        }
        
        public virtual OfferCategoryAssoc GetOfferCategoryAssoc(
        )  {
            foreach (OfferCategoryAssoc item in GetOfferCategoryAssocList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocList(
        ) {
            return CachedGetOfferCategoryAssocList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocList(
            bool overrideCache
            , int cacheHours
        ) {
            List<OfferCategoryAssoc> objs;

            string method_name = "CachedGetOfferCategoryAssocList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<OfferCategoryAssoc>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryAssocList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListUuid(
            string uuid
        )  {
            return act.GetOfferCategoryAssocListUuid(
            uuid
            );
        }
        
        public virtual OfferCategoryAssoc GetOfferCategoryAssocUuid(
            string uuid
        )  {
            foreach (OfferCategoryAssoc item in GetOfferCategoryAssocListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListUuid(
            string uuid
        ) {
            return CachedGetOfferCategoryAssocListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryAssocListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListOfferId(
            string offer_id
        )  {
            return act.GetOfferCategoryAssocListOfferId(
            offer_id
            );
        }
        
        public virtual OfferCategoryAssoc GetOfferCategoryAssocOfferId(
            string offer_id
        )  {
            foreach (OfferCategoryAssoc item in GetOfferCategoryAssocListOfferId(
            offer_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListOfferId(
            string offer_id
        ) {
            return CachedGetOfferCategoryAssocListOfferId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , offer_id
                );
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListOfferId(
            bool overrideCache
            , int cacheHours
            , string offer_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryAssocListOfferId(
                    offer_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListCategoryId(
            string category_id
        )  {
            return act.GetOfferCategoryAssocListCategoryId(
            category_id
            );
        }
        
        public virtual OfferCategoryAssoc GetOfferCategoryAssocCategoryId(
            string category_id
        )  {
            foreach (OfferCategoryAssoc item in GetOfferCategoryAssocListCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListCategoryId(
            string category_id
        ) {
            return CachedGetOfferCategoryAssocListCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryAssocListCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListOfferIdCategoryId(
            string offer_id
            , string category_id
        )  {
            return act.GetOfferCategoryAssocListOfferIdCategoryId(
            offer_id
            , category_id
            );
        }
        
        public virtual OfferCategoryAssoc GetOfferCategoryAssocOfferIdCategoryId(
            string offer_id
            , string category_id
        )  {
            foreach (OfferCategoryAssoc item in GetOfferCategoryAssocListOfferIdCategoryId(
            offer_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListOfferIdCategoryId(
            string offer_id
            , string category_id
        ) {
            return CachedGetOfferCategoryAssocListOfferIdCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , offer_id
                    , category_id
                );
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListOfferIdCategoryId(
            bool overrideCache
            , int cacheHours
            , string offer_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryAssocListOfferIdCategoryId(
                    offer_id
                    , category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocation(
        )  {            
            return act.CountOfferGameLocation(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationUuid(
            string uuid
        )  {            
            return act.CountOfferGameLocationUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationGameLocationId(
            string game_location_id
        )  {            
            return act.CountOfferGameLocationGameLocationId(
            game_location_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationOfferId(
            string offer_id
        )  {            
            return act.CountOfferGameLocationOfferId(
            offer_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationOfferIdGameLocationId(
            string offer_id
            , string game_location_id
        )  {            
            return act.CountOfferGameLocationOfferIdGameLocationId(
            offer_id
            , game_location_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferGameLocationResult BrowseOfferGameLocationListFilter(SearchFilter obj)  {
            return act.BrowseOfferGameLocationListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferGameLocationUuid(string set_type, OfferGameLocation obj)  {
            return act.SetOfferGameLocationUuid(set_type, obj);
        }
        
        public virtual bool SetOfferGameLocationUuid(SetType set_type, OfferGameLocation obj)  {
            return act.SetOfferGameLocationUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferGameLocationUuid(OfferGameLocation obj)  {
            return act.SetOfferGameLocationUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferGameLocationUuid(
            string uuid
        )  {            
            return act.DelOfferGameLocationUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<OfferGameLocation> GetOfferGameLocationList(
        )  {
            return act.GetOfferGameLocationList(
            );
        }
        
        public virtual OfferGameLocation GetOfferGameLocation(
        )  {
            foreach (OfferGameLocation item in GetOfferGameLocationList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationList(
        ) {
            return CachedGetOfferGameLocationList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationList(
            bool overrideCache
            , int cacheHours
        ) {
            List<OfferGameLocation> objs;

            string method_name = "CachedGetOfferGameLocationList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<OfferGameLocation>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferGameLocationList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferGameLocation> GetOfferGameLocationListUuid(
            string uuid
        )  {
            return act.GetOfferGameLocationListUuid(
            uuid
            );
        }
        
        public virtual OfferGameLocation GetOfferGameLocationUuid(
            string uuid
        )  {
            foreach (OfferGameLocation item in GetOfferGameLocationListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListUuid(
            string uuid
        ) {
            return CachedGetOfferGameLocationListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferGameLocationListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferGameLocation> GetOfferGameLocationListGameLocationId(
            string game_location_id
        )  {
            return act.GetOfferGameLocationListGameLocationId(
            game_location_id
            );
        }
        
        public virtual OfferGameLocation GetOfferGameLocationGameLocationId(
            string game_location_id
        )  {
            foreach (OfferGameLocation item in GetOfferGameLocationListGameLocationId(
            game_location_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListGameLocationId(
            string game_location_id
        ) {
            return CachedGetOfferGameLocationListGameLocationId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_location_id
                );
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListGameLocationId(
            bool overrideCache
            , int cacheHours
            , string game_location_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferGameLocationListGameLocationId(
                    game_location_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferGameLocation> GetOfferGameLocationListOfferId(
            string offer_id
        )  {
            return act.GetOfferGameLocationListOfferId(
            offer_id
            );
        }
        
        public virtual OfferGameLocation GetOfferGameLocationOfferId(
            string offer_id
        )  {
            foreach (OfferGameLocation item in GetOfferGameLocationListOfferId(
            offer_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListOfferId(
            string offer_id
        ) {
            return CachedGetOfferGameLocationListOfferId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , offer_id
                );
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListOfferId(
            bool overrideCache
            , int cacheHours
            , string offer_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferGameLocationListOfferId(
                    offer_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferGameLocation> GetOfferGameLocationListOfferIdGameLocationId(
            string offer_id
            , string game_location_id
        )  {
            return act.GetOfferGameLocationListOfferIdGameLocationId(
            offer_id
            , game_location_id
            );
        }
        
        public virtual OfferGameLocation GetOfferGameLocationOfferIdGameLocationId(
            string offer_id
            , string game_location_id
        )  {
            foreach (OfferGameLocation item in GetOfferGameLocationListOfferIdGameLocationId(
            offer_id
            , game_location_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListOfferIdGameLocationId(
            string offer_id
            , string game_location_id
        ) {
            return CachedGetOfferGameLocationListOfferIdGameLocationId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , offer_id
                    , game_location_id
                );
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListOfferIdGameLocationId(
            bool overrideCache
            , int cacheHours
            , string offer_id
            , string game_location_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferGameLocationListOfferIdGameLocationId(
                    offer_id
                    , game_location_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfo(
        )  {            
            return act.CountEventInfo(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoUuid(
            string uuid
        )  {            
            return act.CountEventInfoUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoCode(
            string code
        )  {            
            return act.CountEventInfoCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoName(
            string name
        )  {            
            return act.CountEventInfoName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoOrgId(
            string org_id
        )  {            
            return act.CountEventInfoOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual EventInfoResult BrowseEventInfoListFilter(SearchFilter obj)  {
            return act.BrowseEventInfoListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventInfoUuid(string set_type, EventInfo obj)  {
            return act.SetEventInfoUuid(set_type, obj);
        }
        
        public virtual bool SetEventInfoUuid(SetType set_type, EventInfo obj)  {
            return act.SetEventInfoUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetEventInfoUuid(EventInfo obj)  {
            return act.SetEventInfoUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelEventInfoUuid(
            string uuid
        )  {            
            return act.DelEventInfoUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventInfoOrgId(
            string org_id
        )  {            
            return act.DelEventInfoOrgId(
            org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<EventInfo> GetEventInfoList(
        )  {
            return act.GetEventInfoList(
            );
        }
        
        public virtual EventInfo GetEventInfo(
        )  {
            foreach (EventInfo item in GetEventInfoList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventInfo> CachedGetEventInfoList(
        ) {
            return CachedGetEventInfoList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<EventInfo> CachedGetEventInfoList(
            bool overrideCache
            , int cacheHours
        ) {
            List<EventInfo> objs;

            string method_name = "CachedGetEventInfoList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<EventInfo>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventInfoList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventInfo> GetEventInfoListUuid(
            string uuid
        )  {
            return act.GetEventInfoListUuid(
            uuid
            );
        }
        
        public virtual EventInfo GetEventInfoUuid(
            string uuid
        )  {
            foreach (EventInfo item in GetEventInfoListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListUuid(
            string uuid
        ) {
            return CachedGetEventInfoListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventInfoListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventInfo> GetEventInfoListCode(
            string code
        )  {
            return act.GetEventInfoListCode(
            code
            );
        }
        
        public virtual EventInfo GetEventInfoCode(
            string code
        )  {
            foreach (EventInfo item in GetEventInfoListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListCode(
            string code
        ) {
            return CachedGetEventInfoListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventInfoListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventInfo> GetEventInfoListName(
            string name
        )  {
            return act.GetEventInfoListName(
            name
            );
        }
        
        public virtual EventInfo GetEventInfoName(
            string name
        )  {
            foreach (EventInfo item in GetEventInfoListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListName(
            string name
        ) {
            return CachedGetEventInfoListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventInfoListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventInfo> GetEventInfoListOrgId(
            string org_id
        )  {
            return act.GetEventInfoListOrgId(
            org_id
            );
        }
        
        public virtual EventInfo GetEventInfoOrgId(
            string org_id
        )  {
            foreach (EventInfo item in GetEventInfoListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListOrgId(
            string org_id
        ) {
            return CachedGetEventInfoListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventInfoListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocation(
        )  {            
            return act.CountEventLocation(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationUuid(
            string uuid
        )  {            
            return act.CountEventLocationUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationEventId(
            string event_id
        )  {            
            return act.CountEventLocationEventId(
            event_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationCity(
            string city
        )  {            
            return act.CountEventLocationCity(
            city
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationCountryCode(
            string country_code
        )  {            
            return act.CountEventLocationCountryCode(
            country_code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationPostalCode(
            string postal_code
        )  {            
            return act.CountEventLocationPostalCode(
            postal_code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual EventLocationResult BrowseEventLocationListFilter(SearchFilter obj)  {
            return act.BrowseEventLocationListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventLocationUuid(string set_type, EventLocation obj)  {
            return act.SetEventLocationUuid(set_type, obj);
        }
        
        public virtual bool SetEventLocationUuid(SetType set_type, EventLocation obj)  {
            return act.SetEventLocationUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetEventLocationUuid(EventLocation obj)  {
            return act.SetEventLocationUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelEventLocationUuid(
            string uuid
        )  {            
            return act.DelEventLocationUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<EventLocation> GetEventLocationList(
        )  {
            return act.GetEventLocationList(
            );
        }
        
        public virtual EventLocation GetEventLocation(
        )  {
            foreach (EventLocation item in GetEventLocationList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationList(
        ) {
            return CachedGetEventLocationList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationList(
            bool overrideCache
            , int cacheHours
        ) {
            List<EventLocation> objs;

            string method_name = "CachedGetEventLocationList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<EventLocation>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventLocation> GetEventLocationListUuid(
            string uuid
        )  {
            return act.GetEventLocationListUuid(
            uuid
            );
        }
        
        public virtual EventLocation GetEventLocationUuid(
            string uuid
        )  {
            foreach (EventLocation item in GetEventLocationListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListUuid(
            string uuid
        ) {
            return CachedGetEventLocationListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventLocation> GetEventLocationListEventId(
            string event_id
        )  {
            return act.GetEventLocationListEventId(
            event_id
            );
        }
        
        public virtual EventLocation GetEventLocationEventId(
            string event_id
        )  {
            foreach (EventLocation item in GetEventLocationListEventId(
            event_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListEventId(
            string event_id
        ) {
            return CachedGetEventLocationListEventId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , event_id
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListEventId(
            bool overrideCache
            , int cacheHours
            , string event_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationListEventId(
                    event_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventLocation> GetEventLocationListCity(
            string city
        )  {
            return act.GetEventLocationListCity(
            city
            );
        }
        
        public virtual EventLocation GetEventLocationCity(
            string city
        )  {
            foreach (EventLocation item in GetEventLocationListCity(
            city
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListCity(
            string city
        ) {
            return CachedGetEventLocationListCity(
                    false
                    , CACHE_DEFAULT_HOURS
                    , city
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListCity(
            bool overrideCache
            , int cacheHours
            , string city
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationListCity(
                    city
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventLocation> GetEventLocationListCountryCode(
            string country_code
        )  {
            return act.GetEventLocationListCountryCode(
            country_code
            );
        }
        
        public virtual EventLocation GetEventLocationCountryCode(
            string country_code
        )  {
            foreach (EventLocation item in GetEventLocationListCountryCode(
            country_code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListCountryCode(
            string country_code
        ) {
            return CachedGetEventLocationListCountryCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , country_code
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListCountryCode(
            bool overrideCache
            , int cacheHours
            , string country_code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationListCountryCode(
                    country_code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventLocation> GetEventLocationListPostalCode(
            string postal_code
        )  {
            return act.GetEventLocationListPostalCode(
            postal_code
            );
        }
        
        public virtual EventLocation GetEventLocationPostalCode(
            string postal_code
        )  {
            foreach (EventLocation item in GetEventLocationListPostalCode(
            postal_code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListPostalCode(
            string postal_code
        ) {
            return CachedGetEventLocationListPostalCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , postal_code
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListPostalCode(
            bool overrideCache
            , int cacheHours
            , string postal_code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationListPostalCode(
                    postal_code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategory(
        )  {            
            return act.CountEventCategory(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryUuid(
            string uuid
        )  {            
            return act.CountEventCategoryUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryCode(
            string code
        )  {            
            return act.CountEventCategoryCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryName(
            string name
        )  {            
            return act.CountEventCategoryName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryOrgId(
            string org_id
        )  {            
            return act.CountEventCategoryOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTypeId(
            string type_id
        )  {            
            return act.CountEventCategoryTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryOrgIdTypeId(
            string org_id
            , string type_id
        )  {            
            return act.CountEventCategoryOrgIdTypeId(
            org_id
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual EventCategoryResult BrowseEventCategoryListFilter(SearchFilter obj)  {
            return act.BrowseEventCategoryListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryUuid(string set_type, EventCategory obj)  {
            return act.SetEventCategoryUuid(set_type, obj);
        }
        
        public virtual bool SetEventCategoryUuid(SetType set_type, EventCategory obj)  {
            return act.SetEventCategoryUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetEventCategoryUuid(EventCategory obj)  {
            return act.SetEventCategoryUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryUuid(
            string uuid
        )  {            
            return act.DelEventCategoryUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryCodeOrgId(
            string code
            , string org_id
        )  {            
            return act.DelEventCategoryCodeOrgId(
            code
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryCodeOrgIdTypeId(
            string code
            , string org_id
            , string type_id
        )  {            
            return act.DelEventCategoryCodeOrgIdTypeId(
            code
            , org_id
            , type_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryList(
        )  {
            return act.GetEventCategoryList(
            );
        }
        
        public virtual EventCategory GetEventCategory(
        )  {
            foreach (EventCategory item in GetEventCategoryList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryList(
        ) {
            return CachedGetEventCategoryList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryList(
            bool overrideCache
            , int cacheHours
        ) {
            List<EventCategory> objs;

            string method_name = "CachedGetEventCategoryList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<EventCategory>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListUuid(
            string uuid
        )  {
            return act.GetEventCategoryListUuid(
            uuid
            );
        }
        
        public virtual EventCategory GetEventCategoryUuid(
            string uuid
        )  {
            foreach (EventCategory item in GetEventCategoryListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListUuid(
            string uuid
        ) {
            return CachedGetEventCategoryListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListCode(
            string code
        )  {
            return act.GetEventCategoryListCode(
            code
            );
        }
        
        public virtual EventCategory GetEventCategoryCode(
            string code
        )  {
            foreach (EventCategory item in GetEventCategoryListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListCode(
            string code
        ) {
            return CachedGetEventCategoryListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListName(
            string name
        )  {
            return act.GetEventCategoryListName(
            name
            );
        }
        
        public virtual EventCategory GetEventCategoryName(
            string name
        )  {
            foreach (EventCategory item in GetEventCategoryListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListName(
            string name
        ) {
            return CachedGetEventCategoryListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListOrgId(
            string org_id
        )  {
            return act.GetEventCategoryListOrgId(
            org_id
            );
        }
        
        public virtual EventCategory GetEventCategoryOrgId(
            string org_id
        )  {
            foreach (EventCategory item in GetEventCategoryListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListOrgId(
            string org_id
        ) {
            return CachedGetEventCategoryListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListTypeId(
            string type_id
        )  {
            return act.GetEventCategoryListTypeId(
            type_id
            );
        }
        
        public virtual EventCategory GetEventCategoryTypeId(
            string type_id
        )  {
            foreach (EventCategory item in GetEventCategoryListTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListTypeId(
            string type_id
        ) {
            return CachedGetEventCategoryListTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            return act.GetEventCategoryListOrgIdTypeId(
            org_id
            , type_id
            );
        }
        
        public virtual EventCategory GetEventCategoryOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            foreach (EventCategory item in GetEventCategoryListOrgIdTypeId(
            org_id
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListOrgIdTypeId(
            string org_id
            , string type_id
        ) {
            return CachedGetEventCategoryListOrgIdTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , type_id
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListOrgIdTypeId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListOrgIdTypeId(
                    org_id
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTree(
        )  {            
            return act.CountEventCategoryTree(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeUuid(
            string uuid
        )  {            
            return act.CountEventCategoryTreeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeParentId(
            string parent_id
        )  {            
            return act.CountEventCategoryTreeParentId(
            parent_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeCategoryId(
            string category_id
        )  {            
            return act.CountEventCategoryTreeCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.CountEventCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual EventCategoryTreeResult BrowseEventCategoryTreeListFilter(SearchFilter obj)  {
            return act.BrowseEventCategoryTreeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryTreeUuid(string set_type, EventCategoryTree obj)  {
            return act.SetEventCategoryTreeUuid(set_type, obj);
        }
        
        public virtual bool SetEventCategoryTreeUuid(SetType set_type, EventCategoryTree obj)  {
            return act.SetEventCategoryTreeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetEventCategoryTreeUuid(EventCategoryTree obj)  {
            return act.SetEventCategoryTreeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryTreeUuid(
            string uuid
        )  {            
            return act.DelEventCategoryTreeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryTreeParentId(
            string parent_id
        )  {            
            return act.DelEventCategoryTreeParentId(
            parent_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryTreeCategoryId(
            string category_id
        )  {            
            return act.DelEventCategoryTreeCategoryId(
            category_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.DelEventCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryTree> GetEventCategoryTreeList(
        )  {
            return act.GetEventCategoryTreeList(
            );
        }
        
        public virtual EventCategoryTree GetEventCategoryTree(
        )  {
            foreach (EventCategoryTree item in GetEventCategoryTreeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeList(
        ) {
            return CachedGetEventCategoryTreeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<EventCategoryTree> objs;

            string method_name = "CachedGetEventCategoryTreeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<EventCategoryTree>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryTreeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryTree> GetEventCategoryTreeListUuid(
            string uuid
        )  {
            return act.GetEventCategoryTreeListUuid(
            uuid
            );
        }
        
        public virtual EventCategoryTree GetEventCategoryTreeUuid(
            string uuid
        )  {
            foreach (EventCategoryTree item in GetEventCategoryTreeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListUuid(
            string uuid
        ) {
            return CachedGetEventCategoryTreeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryTreeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryTree> GetEventCategoryTreeListParentId(
            string parent_id
        )  {
            return act.GetEventCategoryTreeListParentId(
            parent_id
            );
        }
        
        public virtual EventCategoryTree GetEventCategoryTreeParentId(
            string parent_id
        )  {
            foreach (EventCategoryTree item in GetEventCategoryTreeListParentId(
            parent_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListParentId(
            string parent_id
        ) {
            return CachedGetEventCategoryTreeListParentId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                );
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListParentId(
            bool overrideCache
            , int cacheHours
            , string parent_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryTreeListParentId(
                    parent_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryTree> GetEventCategoryTreeListCategoryId(
            string category_id
        )  {
            return act.GetEventCategoryTreeListCategoryId(
            category_id
            );
        }
        
        public virtual EventCategoryTree GetEventCategoryTreeCategoryId(
            string category_id
        )  {
            foreach (EventCategoryTree item in GetEventCategoryTreeListCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListCategoryId(
            string category_id
        ) {
            return CachedGetEventCategoryTreeListCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryTreeListCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryTree> GetEventCategoryTreeListParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            return act.GetEventCategoryTreeListParentIdCategoryId(
            parent_id
            , category_id
            );
        }
        
        public virtual EventCategoryTree GetEventCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            foreach (EventCategoryTree item in GetEventCategoryTreeListParentIdCategoryId(
            parent_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListParentIdCategoryId(
            string parent_id
            , string category_id
        ) {
            return CachedGetEventCategoryTreeListParentIdCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                    , category_id
                );
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListParentIdCategoryId(
            bool overrideCache
            , int cacheHours
            , string parent_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryTreeListParentIdCategoryId(
                    parent_id
                    , category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssoc(
        )  {            
            return act.CountEventCategoryAssoc(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocUuid(
            string uuid
        )  {            
            return act.CountEventCategoryAssocUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocEventId(
            string event_id
        )  {            
            return act.CountEventCategoryAssocEventId(
            event_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocCategoryId(
            string category_id
        )  {            
            return act.CountEventCategoryAssocCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocEventIdCategoryId(
            string event_id
            , string category_id
        )  {            
            return act.CountEventCategoryAssocEventIdCategoryId(
            event_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual EventCategoryAssocResult BrowseEventCategoryAssocListFilter(SearchFilter obj)  {
            return act.BrowseEventCategoryAssocListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryAssocUuid(string set_type, EventCategoryAssoc obj)  {
            return act.SetEventCategoryAssocUuid(set_type, obj);
        }
        
        public virtual bool SetEventCategoryAssocUuid(SetType set_type, EventCategoryAssoc obj)  {
            return act.SetEventCategoryAssocUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetEventCategoryAssocUuid(EventCategoryAssoc obj)  {
            return act.SetEventCategoryAssocUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryAssocUuid(
            string uuid
        )  {            
            return act.DelEventCategoryAssocUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocList(
        )  {
            return act.GetEventCategoryAssocList(
            );
        }
        
        public virtual EventCategoryAssoc GetEventCategoryAssoc(
        )  {
            foreach (EventCategoryAssoc item in GetEventCategoryAssocList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocList(
        ) {
            return CachedGetEventCategoryAssocList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocList(
            bool overrideCache
            , int cacheHours
        ) {
            List<EventCategoryAssoc> objs;

            string method_name = "CachedGetEventCategoryAssocList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<EventCategoryAssoc>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryAssocList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListUuid(
            string uuid
        )  {
            return act.GetEventCategoryAssocListUuid(
            uuid
            );
        }
        
        public virtual EventCategoryAssoc GetEventCategoryAssocUuid(
            string uuid
        )  {
            foreach (EventCategoryAssoc item in GetEventCategoryAssocListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListUuid(
            string uuid
        ) {
            return CachedGetEventCategoryAssocListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryAssocListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListEventId(
            string event_id
        )  {
            return act.GetEventCategoryAssocListEventId(
            event_id
            );
        }
        
        public virtual EventCategoryAssoc GetEventCategoryAssocEventId(
            string event_id
        )  {
            foreach (EventCategoryAssoc item in GetEventCategoryAssocListEventId(
            event_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListEventId(
            string event_id
        ) {
            return CachedGetEventCategoryAssocListEventId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , event_id
                );
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListEventId(
            bool overrideCache
            , int cacheHours
            , string event_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryAssocListEventId(
                    event_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListCategoryId(
            string category_id
        )  {
            return act.GetEventCategoryAssocListCategoryId(
            category_id
            );
        }
        
        public virtual EventCategoryAssoc GetEventCategoryAssocCategoryId(
            string category_id
        )  {
            foreach (EventCategoryAssoc item in GetEventCategoryAssocListCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListCategoryId(
            string category_id
        ) {
            return CachedGetEventCategoryAssocListCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryAssocListCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListEventIdCategoryId(
            string event_id
            , string category_id
        )  {
            return act.GetEventCategoryAssocListEventIdCategoryId(
            event_id
            , category_id
            );
        }
        
        public virtual EventCategoryAssoc GetEventCategoryAssocEventIdCategoryId(
            string event_id
            , string category_id
        )  {
            foreach (EventCategoryAssoc item in GetEventCategoryAssocListEventIdCategoryId(
            event_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListEventIdCategoryId(
            string event_id
            , string category_id
        ) {
            return CachedGetEventCategoryAssocListEventIdCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , event_id
                    , category_id
                );
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListEventIdCategoryId(
            bool overrideCache
            , int cacheHours
            , string event_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryAssocListEventIdCategoryId(
                    event_id
                    , category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountChannel(
        )  {            
            return act.CountChannel(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelUuid(
            string uuid
        )  {            
            return act.CountChannelUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelCode(
            string code
        )  {            
            return act.CountChannelCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelName(
            string name
        )  {            
            return act.CountChannelName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelOrgId(
            string org_id
        )  {            
            return act.CountChannelOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelTypeId(
            string type_id
        )  {            
            return act.CountChannelTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelOrgIdTypeId(
            string org_id
            , string type_id
        )  {            
            return act.CountChannelOrgIdTypeId(
            org_id
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ChannelResult BrowseChannelListFilter(SearchFilter obj)  {
            return act.BrowseChannelListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetChannelUuid(string set_type, Channel obj)  {
            return act.SetChannelUuid(set_type, obj);
        }
        
        public virtual bool SetChannelUuid(SetType set_type, Channel obj)  {
            return act.SetChannelUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetChannelUuid(Channel obj)  {
            return act.SetChannelUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelUuid(
            string uuid
        )  {            
            return act.DelChannelUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelCodeOrgId(
            string code
            , string org_id
        )  {            
            return act.DelChannelCodeOrgId(
            code
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelCodeOrgIdTypeId(
            string code
            , string org_id
            , string type_id
        )  {            
            return act.DelChannelCodeOrgIdTypeId(
            code
            , org_id
            , type_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelList(
        )  {
            return act.GetChannelList(
            );
        }
        
        public virtual Channel GetChannel(
        )  {
            foreach (Channel item in GetChannelList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelList(
        ) {
            return CachedGetChannelList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<Channel> CachedGetChannelList(
            bool overrideCache
            , int cacheHours
        ) {
            List<Channel> objs;

            string method_name = "CachedGetChannelList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Channel>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListUuid(
            string uuid
        )  {
            return act.GetChannelListUuid(
            uuid
            );
        }
        
        public virtual Channel GetChannelUuid(
            string uuid
        )  {
            foreach (Channel item in GetChannelListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListUuid(
            string uuid
        ) {
            return CachedGetChannelListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Channel> CachedGetChannelListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListCode(
            string code
        )  {
            return act.GetChannelListCode(
            code
            );
        }
        
        public virtual Channel GetChannelCode(
            string code
        )  {
            foreach (Channel item in GetChannelListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListCode(
            string code
        ) {
            return CachedGetChannelListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Channel> CachedGetChannelListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListName(
            string name
        )  {
            return act.GetChannelListName(
            name
            );
        }
        
        public virtual Channel GetChannelName(
            string name
        )  {
            foreach (Channel item in GetChannelListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListName(
            string name
        ) {
            return CachedGetChannelListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Channel> CachedGetChannelListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListOrgId(
            string org_id
        )  {
            return act.GetChannelListOrgId(
            org_id
            );
        }
        
        public virtual Channel GetChannelOrgId(
            string org_id
        )  {
            foreach (Channel item in GetChannelListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListOrgId(
            string org_id
        ) {
            return CachedGetChannelListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<Channel> CachedGetChannelListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListTypeId(
            string type_id
        )  {
            return act.GetChannelListTypeId(
            type_id
            );
        }
        
        public virtual Channel GetChannelTypeId(
            string type_id
        )  {
            foreach (Channel item in GetChannelListTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListTypeId(
            string type_id
        ) {
            return CachedGetChannelListTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<Channel> CachedGetChannelListTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            return act.GetChannelListOrgIdTypeId(
            org_id
            , type_id
            );
        }
        
        public virtual Channel GetChannelOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            foreach (Channel item in GetChannelListOrgIdTypeId(
            org_id
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListOrgIdTypeId(
            string org_id
            , string type_id
        ) {
            return CachedGetChannelListOrgIdTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , type_id
                );
        }
        
        public virtual List<Channel> CachedGetChannelListOrgIdTypeId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListOrgIdTypeId(
                    org_id
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountChannelType(
        )  {            
            return act.CountChannelType(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelTypeUuid(
            string uuid
        )  {            
            return act.CountChannelTypeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelTypeCode(
            string code
        )  {            
            return act.CountChannelTypeCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelTypeName(
            string name
        )  {            
            return act.CountChannelTypeName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ChannelTypeResult BrowseChannelTypeListFilter(SearchFilter obj)  {
            return act.BrowseChannelTypeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetChannelTypeUuid(string set_type, ChannelType obj)  {
            return act.SetChannelTypeUuid(set_type, obj);
        }
        
        public virtual bool SetChannelTypeUuid(SetType set_type, ChannelType obj)  {
            return act.SetChannelTypeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetChannelTypeUuid(ChannelType obj)  {
            return act.SetChannelTypeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelTypeUuid(
            string uuid
        )  {            
            return act.DelChannelTypeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ChannelType> GetChannelTypeList(
        )  {
            return act.GetChannelTypeList(
            );
        }
        
        public virtual ChannelType GetChannelType(
        )  {
            foreach (ChannelType item in GetChannelTypeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeList(
        ) {
            return CachedGetChannelTypeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ChannelType> objs;

            string method_name = "CachedGetChannelTypeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ChannelType>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelTypeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ChannelType> GetChannelTypeListUuid(
            string uuid
        )  {
            return act.GetChannelTypeListUuid(
            uuid
            );
        }
        
        public virtual ChannelType GetChannelTypeUuid(
            string uuid
        )  {
            foreach (ChannelType item in GetChannelTypeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListUuid(
            string uuid
        ) {
            return CachedGetChannelTypeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelTypeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ChannelType> GetChannelTypeListCode(
            string code
        )  {
            return act.GetChannelTypeListCode(
            code
            );
        }
        
        public virtual ChannelType GetChannelTypeCode(
            string code
        )  {
            foreach (ChannelType item in GetChannelTypeListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListCode(
            string code
        ) {
            return CachedGetChannelTypeListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelTypeListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ChannelType> GetChannelTypeListName(
            string name
        )  {
            return act.GetChannelTypeListName(
            name
            );
        }
        
        public virtual ChannelType GetChannelTypeName(
            string name
        )  {
            foreach (ChannelType item in GetChannelTypeListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListName(
            string name
        ) {
            return CachedGetChannelTypeListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelTypeListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountQuestion(
        )  {            
            return act.CountQuestion(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionUuid(
            string uuid
        )  {            
            return act.CountQuestionUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionCode(
            string code
        )  {            
            return act.CountQuestionCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionName(
            string name
        )  {            
            return act.CountQuestionName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionChannelId(
            string channel_id
        )  {            
            return act.CountQuestionChannelId(
            channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionOrgId(
            string org_id
        )  {            
            return act.CountQuestionOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionChannelIdOrgId(
            string channel_id
            , string org_id
        )  {            
            return act.CountQuestionChannelIdOrgId(
            channel_id
            , org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionChannelIdCode(
            string channel_id
            , string code
        )  {            
            return act.CountQuestionChannelIdCode(
            channel_id
            , code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual QuestionResult BrowseQuestionListFilter(SearchFilter obj)  {
            return act.BrowseQuestionListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetQuestionUuid(string set_type, Question obj)  {
            return act.SetQuestionUuid(set_type, obj);
        }
        
        public virtual bool SetQuestionUuid(SetType set_type, Question obj)  {
            return act.SetQuestionUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetQuestionUuid(Question obj)  {
            return act.SetQuestionUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetQuestionChannelIdCode(string set_type, Question obj)  {
            return act.SetQuestionChannelIdCode(set_type, obj);
        }
        
        public virtual bool SetQuestionChannelIdCode(SetType set_type, Question obj)  {
            return act.SetQuestionChannelIdCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetQuestionChannelIdCode(Question obj)  {
            return act.SetQuestionChannelIdCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelQuestionUuid(
            string uuid
        )  {            
            return act.DelQuestionUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelQuestionChannelIdOrgId(
            string channel_id
            , string org_id
        )  {            
            return act.DelQuestionChannelIdOrgId(
            channel_id
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionList(
        )  {
            return act.GetQuestionList(
            );
        }
        
        public virtual Question GetQuestion(
        )  {
            foreach (Question item in GetQuestionList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionList(
        ) {
            return CachedGetQuestionList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<Question> CachedGetQuestionList(
            bool overrideCache
            , int cacheHours
        ) {
            List<Question> objs;

            string method_name = "CachedGetQuestionList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Question>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListUuid(
            string uuid
        )  {
            return act.GetQuestionListUuid(
            uuid
            );
        }
        
        public virtual Question GetQuestionUuid(
            string uuid
        )  {
            foreach (Question item in GetQuestionListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListUuid(
            string uuid
        ) {
            return CachedGetQuestionListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Question> CachedGetQuestionListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListCode(
            string code
        )  {
            return act.GetQuestionListCode(
            code
            );
        }
        
        public virtual Question GetQuestionCode(
            string code
        )  {
            foreach (Question item in GetQuestionListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListCode(
            string code
        ) {
            return CachedGetQuestionListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Question> CachedGetQuestionListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListName(
            string name
        )  {
            return act.GetQuestionListName(
            name
            );
        }
        
        public virtual Question GetQuestionName(
            string name
        )  {
            foreach (Question item in GetQuestionListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListName(
            string name
        ) {
            return CachedGetQuestionListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Question> CachedGetQuestionListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListType(
            string type
        )  {
            return act.GetQuestionListType(
            type
            );
        }
        
        public virtual Question GetQuestionType(
            string type
        )  {
            foreach (Question item in GetQuestionListType(
            type
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListType(
            string type
        ) {
            return CachedGetQuestionListType(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type
                );
        }
        
        public virtual List<Question> CachedGetQuestionListType(
            bool overrideCache
            , int cacheHours
            , string type
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListType(
                    type
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListChannelId(
            string channel_id
        )  {
            return act.GetQuestionListChannelId(
            channel_id
            );
        }
        
        public virtual Question GetQuestionChannelId(
            string channel_id
        )  {
            foreach (Question item in GetQuestionListChannelId(
            channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListChannelId(
            string channel_id
        ) {
            return CachedGetQuestionListChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                );
        }
        
        public virtual List<Question> CachedGetQuestionListChannelId(
            bool overrideCache
            , int cacheHours
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListChannelId(
                    channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListOrgId(
            string org_id
        )  {
            return act.GetQuestionListOrgId(
            org_id
            );
        }
        
        public virtual Question GetQuestionOrgId(
            string org_id
        )  {
            foreach (Question item in GetQuestionListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListOrgId(
            string org_id
        ) {
            return CachedGetQuestionListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<Question> CachedGetQuestionListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListChannelIdOrgId(
            string channel_id
            , string org_id
        )  {
            return act.GetQuestionListChannelIdOrgId(
            channel_id
            , org_id
            );
        }
        
        public virtual Question GetQuestionChannelIdOrgId(
            string channel_id
            , string org_id
        )  {
            foreach (Question item in GetQuestionListChannelIdOrgId(
            channel_id
            , org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListChannelIdOrgId(
            string channel_id
            , string org_id
        ) {
            return CachedGetQuestionListChannelIdOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , org_id
                );
        }
        
        public virtual List<Question> CachedGetQuestionListChannelIdOrgId(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListChannelIdOrgId(
                    channel_id
                    , org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListChannelIdCode(
            string channel_id
            , string code
        )  {
            return act.GetQuestionListChannelIdCode(
            channel_id
            , code
            );
        }
        
        public virtual Question GetQuestionChannelIdCode(
            string channel_id
            , string code
        )  {
            foreach (Question item in GetQuestionListChannelIdCode(
            channel_id
            , code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListChannelIdCode(
            string channel_id
            , string code
        ) {
            return CachedGetQuestionListChannelIdCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , code
                );
        }
        
        public virtual List<Question> CachedGetQuestionListChannelIdCode(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListChannelIdCode(
                    channel_id
                    , code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOffer(
        )  {            
            return act.CountProfileOffer(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOfferUuid(
            string uuid
        )  {            
            return act.CountProfileOfferUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOfferProfileId(
            string profile_id
        )  {            
            return act.CountProfileOfferProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileOfferResult BrowseProfileOfferListFilter(SearchFilter obj)  {
            return act.BrowseProfileOfferListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileOfferUuid(string set_type, ProfileOffer obj)  {
            return act.SetProfileOfferUuid(set_type, obj);
        }
        
        public virtual bool SetProfileOfferUuid(SetType set_type, ProfileOffer obj)  {
            return act.SetProfileOfferUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileOfferUuid(ProfileOffer obj)  {
            return act.SetProfileOfferUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileOfferUuid(
            string uuid
        )  {            
            return act.DelProfileOfferUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileOfferProfileId(
            string profile_id
        )  {            
            return act.DelProfileOfferProfileId(
            profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileOffer> GetProfileOfferList(
        )  {
            return act.GetProfileOfferList(
            );
        }
        
        public virtual ProfileOffer GetProfileOffer(
        )  {
            foreach (ProfileOffer item in GetProfileOfferList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOffer> CachedGetProfileOfferList(
        ) {
            return CachedGetProfileOfferList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ProfileOffer> CachedGetProfileOfferList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ProfileOffer> objs;

            string method_name = "CachedGetProfileOfferList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileOffer>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOfferList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileOffer> GetProfileOfferListUuid(
            string uuid
        )  {
            return act.GetProfileOfferListUuid(
            uuid
            );
        }
        
        public virtual ProfileOffer GetProfileOfferUuid(
            string uuid
        )  {
            foreach (ProfileOffer item in GetProfileOfferListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOffer> CachedGetProfileOfferListUuid(
            string uuid
        ) {
            return CachedGetProfileOfferListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileOffer> CachedGetProfileOfferListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOfferListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileOffer> GetProfileOfferListProfileId(
            string profile_id
        )  {
            return act.GetProfileOfferListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileOffer GetProfileOfferProfileId(
            string profile_id
        )  {
            foreach (ProfileOffer item in GetProfileOfferListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOffer> CachedGetProfileOfferListProfileId(
            string profile_id
        ) {
            return CachedGetProfileOfferListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileOffer> CachedGetProfileOfferListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOfferListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileApp(
        )  {            
            return act.CountProfileApp(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAppUuid(
            string uuid
        )  {            
            return act.CountProfileAppUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAppProfileIdAppId(
            string profile_id
            , string app_id
        )  {            
            return act.CountProfileAppProfileIdAppId(
            profile_id
            , app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileAppResult BrowseProfileAppListFilter(SearchFilter obj)  {
            return act.BrowseProfileAppListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAppUuid(string set_type, ProfileApp obj)  {
            return act.SetProfileAppUuid(set_type, obj);
        }
        
        public virtual bool SetProfileAppUuid(SetType set_type, ProfileApp obj)  {
            return act.SetProfileAppUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAppUuid(ProfileApp obj)  {
            return act.SetProfileAppUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAppProfileIdAppId(string set_type, ProfileApp obj)  {
            return act.SetProfileAppProfileIdAppId(set_type, obj);
        }
        
        public virtual bool SetProfileAppProfileIdAppId(SetType set_type, ProfileApp obj)  {
            return act.SetProfileAppProfileIdAppId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAppProfileIdAppId(ProfileApp obj)  {
            return act.SetProfileAppProfileIdAppId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAppUuid(
            string uuid
        )  {            
            return act.DelProfileAppUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAppProfileIdAppId(
            string profile_id
            , string app_id
        )  {            
            return act.DelProfileAppProfileIdAppId(
            profile_id
            , app_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileApp> GetProfileAppList(
        )  {
            return act.GetProfileAppList(
            );
        }
        
        public virtual ProfileApp GetProfileApp(
        )  {
            foreach (ProfileApp item in GetProfileAppList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppList(
        ) {
            return CachedGetProfileAppList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ProfileApp> objs;

            string method_name = "CachedGetProfileAppList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileApp>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAppList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileApp> GetProfileAppListUuid(
            string uuid
        )  {
            return act.GetProfileAppListUuid(
            uuid
            );
        }
        
        public virtual ProfileApp GetProfileAppUuid(
            string uuid
        )  {
            foreach (ProfileApp item in GetProfileAppListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListUuid(
            string uuid
        ) {
            return CachedGetProfileAppListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAppListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileApp> GetProfileAppListAppId(
            string app_id
        )  {
            return act.GetProfileAppListAppId(
            app_id
            );
        }
        
        public virtual ProfileApp GetProfileAppAppId(
            string app_id
        )  {
            foreach (ProfileApp item in GetProfileAppListAppId(
            app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListAppId(
            string app_id
        ) {
            return CachedGetProfileAppListAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , app_id
                );
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListAppId(
            bool overrideCache
            , int cacheHours
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAppListAppId(
                    app_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileApp> GetProfileAppListProfileId(
            string profile_id
        )  {
            return act.GetProfileAppListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileApp GetProfileAppProfileId(
            string profile_id
        )  {
            foreach (ProfileApp item in GetProfileAppListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListProfileId(
            string profile_id
        ) {
            return CachedGetProfileAppListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAppListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileApp> GetProfileAppListProfileIdAppId(
            string profile_id
            , string app_id
        )  {
            return act.GetProfileAppListProfileIdAppId(
            profile_id
            , app_id
            );
        }
        
        public virtual ProfileApp GetProfileAppProfileIdAppId(
            string profile_id
            , string app_id
        )  {
            foreach (ProfileApp item in GetProfileAppListProfileIdAppId(
            profile_id
            , app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListProfileIdAppId(
            string profile_id
            , string app_id
        ) {
            return CachedGetProfileAppListProfileIdAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , app_id
                );
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListProfileIdAppId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAppListProfileIdAppId(
                    profile_id
                    , app_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrg(
        )  {            
            return act.CountProfileOrg(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrgUuid(
            string uuid
        )  {            
            return act.CountProfileOrgUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrgOrgId(
            string org_id
        )  {            
            return act.CountProfileOrgOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrgProfileId(
            string profile_id
        )  {            
            return act.CountProfileOrgProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileOrgResult BrowseProfileOrgListFilter(SearchFilter obj)  {
            return act.BrowseProfileOrgListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileOrgUuid(string set_type, ProfileOrg obj)  {
            return act.SetProfileOrgUuid(set_type, obj);
        }
        
        public virtual bool SetProfileOrgUuid(SetType set_type, ProfileOrg obj)  {
            return act.SetProfileOrgUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileOrgUuid(ProfileOrg obj)  {
            return act.SetProfileOrgUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileOrgUuid(
            string uuid
        )  {            
            return act.DelProfileOrgUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileOrg> GetProfileOrgList(
        )  {
            return act.GetProfileOrgList(
            );
        }
        
        public virtual ProfileOrg GetProfileOrg(
        )  {
            foreach (ProfileOrg item in GetProfileOrgList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgList(
        ) {
            return CachedGetProfileOrgList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ProfileOrg> objs;

            string method_name = "CachedGetProfileOrgList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileOrg>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOrgList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileOrg> GetProfileOrgListUuid(
            string uuid
        )  {
            return act.GetProfileOrgListUuid(
            uuid
            );
        }
        
        public virtual ProfileOrg GetProfileOrgUuid(
            string uuid
        )  {
            foreach (ProfileOrg item in GetProfileOrgListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListUuid(
            string uuid
        ) {
            return CachedGetProfileOrgListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOrgListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileOrg> GetProfileOrgListOrgId(
            string org_id
        )  {
            return act.GetProfileOrgListOrgId(
            org_id
            );
        }
        
        public virtual ProfileOrg GetProfileOrgOrgId(
            string org_id
        )  {
            foreach (ProfileOrg item in GetProfileOrgListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListOrgId(
            string org_id
        ) {
            return CachedGetProfileOrgListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOrgListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileOrg> GetProfileOrgListProfileId(
            string profile_id
        )  {
            return act.GetProfileOrgListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileOrg GetProfileOrgProfileId(
            string profile_id
        )  {
            foreach (ProfileOrg item in GetProfileOrgListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListProfileId(
            string profile_id
        ) {
            return CachedGetProfileOrgListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOrgListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestion(
        )  {            
            return act.CountProfileQuestion(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionUuid(
            string uuid
        )  {            
            return act.CountProfileQuestionUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionChannelId(
            string channel_id
        )  {            
            return act.CountProfileQuestionChannelId(
            channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionOrgId(
            string org_id
        )  {            
            return act.CountProfileQuestionOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionProfileId(
            string profile_id
        )  {            
            return act.CountProfileQuestionProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionQuestionId(
            string question_id
        )  {            
            return act.CountProfileQuestionQuestionId(
            question_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionChannelIdOrgId(
            string channel_id
            , string org_id
        )  {            
            return act.CountProfileQuestionChannelIdOrgId(
            channel_id
            , org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {            
            return act.CountProfileQuestionChannelIdProfileId(
            channel_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionQuestionIdProfileId(
            string question_id
            , string profile_id
        )  {            
            return act.CountProfileQuestionQuestionIdProfileId(
            question_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileQuestionResult BrowseProfileQuestionListFilter(SearchFilter obj)  {
            return act.BrowseProfileQuestionListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionUuid(string set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionUuid(set_type, obj);
        }
        
        public virtual bool SetProfileQuestionUuid(SetType set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileQuestionUuid(ProfileQuestion obj)  {
            return act.SetProfileQuestionUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionChannelIdProfileId(string set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionChannelIdProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileQuestionChannelIdProfileId(SetType set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionChannelIdProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileQuestionChannelIdProfileId(ProfileQuestion obj)  {
            return act.SetProfileQuestionChannelIdProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionQuestionIdProfileId(string set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionQuestionIdProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileQuestionQuestionIdProfileId(SetType set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionQuestionIdProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileQuestionQuestionIdProfileId(ProfileQuestion obj)  {
            return act.SetProfileQuestionQuestionIdProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionChannelIdQuestionIdProfileId(string set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionChannelIdQuestionIdProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileQuestionChannelIdQuestionIdProfileId(SetType set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionChannelIdQuestionIdProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileQuestionChannelIdQuestionIdProfileId(ProfileQuestion obj)  {
            return act.SetProfileQuestionChannelIdQuestionIdProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileQuestionUuid(
            string uuid
        )  {            
            return act.DelProfileQuestionUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileQuestionChannelIdOrgId(
            string channel_id
            , string org_id
        )  {            
            return act.DelProfileQuestionChannelIdOrgId(
            channel_id
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionList(
        )  {
            return act.GetProfileQuestionList(
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestion(
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionList(
        ) {
            return CachedGetProfileQuestionList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ProfileQuestion> objs;

            string method_name = "CachedGetProfileQuestionList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileQuestion>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListUuid(
            string uuid
        )  {
            return act.GetProfileQuestionListUuid(
            uuid
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionUuid(
            string uuid
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListUuid(
            string uuid
        ) {
            return CachedGetProfileQuestionListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListChannelId(
            string channel_id
        )  {
            return act.GetProfileQuestionListChannelId(
            channel_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionChannelId(
            string channel_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListChannelId(
            channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListChannelId(
            string channel_id
        ) {
            return CachedGetProfileQuestionListChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListChannelId(
            bool overrideCache
            , int cacheHours
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListChannelId(
                    channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListOrgId(
            string org_id
        )  {
            return act.GetProfileQuestionListOrgId(
            org_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionOrgId(
            string org_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListOrgId(
            string org_id
        ) {
            return CachedGetProfileQuestionListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListProfileId(
            string profile_id
        )  {
            return act.GetProfileQuestionListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionProfileId(
            string profile_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListProfileId(
            string profile_id
        ) {
            return CachedGetProfileQuestionListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListQuestionId(
            string question_id
        )  {
            return act.GetProfileQuestionListQuestionId(
            question_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionQuestionId(
            string question_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListQuestionId(
            question_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListQuestionId(
            string question_id
        ) {
            return CachedGetProfileQuestionListQuestionId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , question_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListQuestionId(
            bool overrideCache
            , int cacheHours
            , string question_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListQuestionId(
                    question_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListChannelIdOrgId(
            string channel_id
            , string org_id
        )  {
            return act.GetProfileQuestionListChannelIdOrgId(
            channel_id
            , org_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionChannelIdOrgId(
            string channel_id
            , string org_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListChannelIdOrgId(
            channel_id
            , org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListChannelIdOrgId(
            string channel_id
            , string org_id
        ) {
            return CachedGetProfileQuestionListChannelIdOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , org_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListChannelIdOrgId(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListChannelIdOrgId(
                    channel_id
                    , org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {
            return act.GetProfileQuestionListChannelIdProfileId(
            channel_id
            , profile_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListChannelIdProfileId(
            channel_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListChannelIdProfileId(
            string channel_id
            , string profile_id
        ) {
            return CachedGetProfileQuestionListChannelIdProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , profile_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListChannelIdProfileId(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListChannelIdProfileId(
                    channel_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListQuestionIdProfileId(
            string question_id
            , string profile_id
        )  {
            return act.GetProfileQuestionListQuestionIdProfileId(
            question_id
            , profile_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionQuestionIdProfileId(
            string question_id
            , string profile_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListQuestionIdProfileId(
            question_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListQuestionIdProfileId(
            string question_id
            , string profile_id
        ) {
            return CachedGetProfileQuestionListQuestionIdProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , question_id
                    , profile_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListQuestionIdProfileId(
            bool overrideCache
            , int cacheHours
            , string question_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListQuestionIdProfileId(
                    question_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannel(
        )  {            
            return act.CountProfileChannel(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelUuid(
            string uuid
        )  {            
            return act.CountProfileChannelUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelChannelId(
            string channel_id
        )  {            
            return act.CountProfileChannelChannelId(
            channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelProfileId(
            string profile_id
        )  {            
            return act.CountProfileChannelProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {            
            return act.CountProfileChannelChannelIdProfileId(
            channel_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileChannelResult BrowseProfileChannelListFilter(SearchFilter obj)  {
            return act.BrowseProfileChannelListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileChannelUuid(string set_type, ProfileChannel obj)  {
            return act.SetProfileChannelUuid(set_type, obj);
        }
        
        public virtual bool SetProfileChannelUuid(SetType set_type, ProfileChannel obj)  {
            return act.SetProfileChannelUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileChannelUuid(ProfileChannel obj)  {
            return act.SetProfileChannelUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileChannelChannelIdProfileId(string set_type, ProfileChannel obj)  {
            return act.SetProfileChannelChannelIdProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileChannelChannelIdProfileId(SetType set_type, ProfileChannel obj)  {
            return act.SetProfileChannelChannelIdProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileChannelChannelIdProfileId(ProfileChannel obj)  {
            return act.SetProfileChannelChannelIdProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileChannelUuid(
            string uuid
        )  {            
            return act.DelProfileChannelUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileChannelChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {            
            return act.DelProfileChannelChannelIdProfileId(
            channel_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileChannel> GetProfileChannelList(
        )  {
            return act.GetProfileChannelList(
            );
        }
        
        public virtual ProfileChannel GetProfileChannel(
        )  {
            foreach (ProfileChannel item in GetProfileChannelList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelList(
        ) {
            return CachedGetProfileChannelList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ProfileChannel> objs;

            string method_name = "CachedGetProfileChannelList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileChannel>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileChannelList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileChannel> GetProfileChannelListUuid(
            string uuid
        )  {
            return act.GetProfileChannelListUuid(
            uuid
            );
        }
        
        public virtual ProfileChannel GetProfileChannelUuid(
            string uuid
        )  {
            foreach (ProfileChannel item in GetProfileChannelListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListUuid(
            string uuid
        ) {
            return CachedGetProfileChannelListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileChannelListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileChannel> GetProfileChannelListChannelId(
            string channel_id
        )  {
            return act.GetProfileChannelListChannelId(
            channel_id
            );
        }
        
        public virtual ProfileChannel GetProfileChannelChannelId(
            string channel_id
        )  {
            foreach (ProfileChannel item in GetProfileChannelListChannelId(
            channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListChannelId(
            string channel_id
        ) {
            return CachedGetProfileChannelListChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                );
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListChannelId(
            bool overrideCache
            , int cacheHours
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileChannelListChannelId(
                    channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileChannel> GetProfileChannelListProfileId(
            string profile_id
        )  {
            return act.GetProfileChannelListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileChannel GetProfileChannelProfileId(
            string profile_id
        )  {
            foreach (ProfileChannel item in GetProfileChannelListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListProfileId(
            string profile_id
        ) {
            return CachedGetProfileChannelListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileChannelListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileChannel> GetProfileChannelListChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {
            return act.GetProfileChannelListChannelIdProfileId(
            channel_id
            , profile_id
            );
        }
        
        public virtual ProfileChannel GetProfileChannelChannelIdProfileId(
            string channel_id
            , string profile_id
        )  {
            foreach (ProfileChannel item in GetProfileChannelListChannelIdProfileId(
            channel_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListChannelIdProfileId(
            string channel_id
            , string profile_id
        ) {
            return CachedGetProfileChannelListChannelIdProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , profile_id
                );
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListChannelIdProfileId(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileChannelListChannelIdProfileId(
                    channel_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSite(
        )  {            
            return act.CountOrgSite(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteUuid(
            string uuid
        )  {            
            return act.CountOrgSiteUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteOrgId(
            string org_id
        )  {            
            return act.CountOrgSiteOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteSiteId(
            string site_id
        )  {            
            return act.CountOrgSiteSiteId(
            site_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteOrgIdSiteId(
            string org_id
            , string site_id
        )  {            
            return act.CountOrgSiteOrgIdSiteId(
            org_id
            , site_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OrgSiteResult BrowseOrgSiteListFilter(SearchFilter obj)  {
            return act.BrowseOrgSiteListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgSiteUuid(string set_type, OrgSite obj)  {
            return act.SetOrgSiteUuid(set_type, obj);
        }
        
        public virtual bool SetOrgSiteUuid(SetType set_type, OrgSite obj)  {
            return act.SetOrgSiteUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOrgSiteUuid(OrgSite obj)  {
            return act.SetOrgSiteUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgSiteOrgIdSiteId(string set_type, OrgSite obj)  {
            return act.SetOrgSiteOrgIdSiteId(set_type, obj);
        }
        
        public virtual bool SetOrgSiteOrgIdSiteId(SetType set_type, OrgSite obj)  {
            return act.SetOrgSiteOrgIdSiteId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOrgSiteOrgIdSiteId(OrgSite obj)  {
            return act.SetOrgSiteOrgIdSiteId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgSiteUuid(
            string uuid
        )  {            
            return act.DelOrgSiteUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgSiteOrgIdSiteId(
            string org_id
            , string site_id
        )  {            
            return act.DelOrgSiteOrgIdSiteId(
            org_id
            , site_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<OrgSite> GetOrgSiteList(
        )  {
            return act.GetOrgSiteList(
            );
        }
        
        public virtual OrgSite GetOrgSite(
        )  {
            foreach (OrgSite item in GetOrgSiteList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteList(
        ) {
            return CachedGetOrgSiteList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteList(
            bool overrideCache
            , int cacheHours
        ) {
            List<OrgSite> objs;

            string method_name = "CachedGetOrgSiteList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<OrgSite>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgSiteList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OrgSite> GetOrgSiteListUuid(
            string uuid
        )  {
            return act.GetOrgSiteListUuid(
            uuid
            );
        }
        
        public virtual OrgSite GetOrgSiteUuid(
            string uuid
        )  {
            foreach (OrgSite item in GetOrgSiteListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListUuid(
            string uuid
        ) {
            return CachedGetOrgSiteListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgSiteListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OrgSite> GetOrgSiteListOrgId(
            string org_id
        )  {
            return act.GetOrgSiteListOrgId(
            org_id
            );
        }
        
        public virtual OrgSite GetOrgSiteOrgId(
            string org_id
        )  {
            foreach (OrgSite item in GetOrgSiteListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListOrgId(
            string org_id
        ) {
            return CachedGetOrgSiteListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgSiteListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OrgSite> GetOrgSiteListSiteId(
            string site_id
        )  {
            return act.GetOrgSiteListSiteId(
            site_id
            );
        }
        
        public virtual OrgSite GetOrgSiteSiteId(
            string site_id
        )  {
            foreach (OrgSite item in GetOrgSiteListSiteId(
            site_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListSiteId(
            string site_id
        ) {
            return CachedGetOrgSiteListSiteId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , site_id
                );
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListSiteId(
            bool overrideCache
            , int cacheHours
            , string site_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgSiteListSiteId(
                    site_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OrgSite> GetOrgSiteListOrgIdSiteId(
            string org_id
            , string site_id
        )  {
            return act.GetOrgSiteListOrgIdSiteId(
            org_id
            , site_id
            );
        }
        
        public virtual OrgSite GetOrgSiteOrgIdSiteId(
            string org_id
            , string site_id
        )  {
            foreach (OrgSite item in GetOrgSiteListOrgIdSiteId(
            org_id
            , site_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListOrgIdSiteId(
            string org_id
            , string site_id
        ) {
            return CachedGetOrgSiteListOrgIdSiteId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , site_id
                );
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListOrgIdSiteId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string site_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgSiteListOrgIdSiteId(
                    org_id
                    , site_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountSiteApp(
        )  {            
            return act.CountSiteApp(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppUuid(
            string uuid
        )  {            
            return act.CountSiteAppUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppAppId(
            string app_id
        )  {            
            return act.CountSiteAppAppId(
            app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppSiteId(
            string site_id
        )  {            
            return act.CountSiteAppSiteId(
            site_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppAppIdSiteId(
            string app_id
            , string site_id
        )  {            
            return act.CountSiteAppAppIdSiteId(
            app_id
            , site_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual SiteAppResult BrowseSiteAppListFilter(SearchFilter obj)  {
            return act.BrowseSiteAppListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteAppUuid(string set_type, SiteApp obj)  {
            return act.SetSiteAppUuid(set_type, obj);
        }
        
        public virtual bool SetSiteAppUuid(SetType set_type, SiteApp obj)  {
            return act.SetSiteAppUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteAppUuid(SiteApp obj)  {
            return act.SetSiteAppUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteAppAppIdSiteId(string set_type, SiteApp obj)  {
            return act.SetSiteAppAppIdSiteId(set_type, obj);
        }
        
        public virtual bool SetSiteAppAppIdSiteId(SetType set_type, SiteApp obj)  {
            return act.SetSiteAppAppIdSiteId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteAppAppIdSiteId(SiteApp obj)  {
            return act.SetSiteAppAppIdSiteId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteAppUuid(
            string uuid
        )  {            
            return act.DelSiteAppUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteAppAppIdSiteId(
            string app_id
            , string site_id
        )  {            
            return act.DelSiteAppAppIdSiteId(
            app_id
            , site_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<SiteApp> GetSiteAppList(
        )  {
            return act.GetSiteAppList(
            );
        }
        
        public virtual SiteApp GetSiteApp(
        )  {
            foreach (SiteApp item in GetSiteAppList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteApp> CachedGetSiteAppList(
        ) {
            return CachedGetSiteAppList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<SiteApp> CachedGetSiteAppList(
            bool overrideCache
            , int cacheHours
        ) {
            List<SiteApp> objs;

            string method_name = "CachedGetSiteAppList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<SiteApp>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteAppList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<SiteApp> GetSiteAppListUuid(
            string uuid
        )  {
            return act.GetSiteAppListUuid(
            uuid
            );
        }
        
        public virtual SiteApp GetSiteAppUuid(
            string uuid
        )  {
            foreach (SiteApp item in GetSiteAppListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListUuid(
            string uuid
        ) {
            return CachedGetSiteAppListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteAppListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<SiteApp> GetSiteAppListAppId(
            string app_id
        )  {
            return act.GetSiteAppListAppId(
            app_id
            );
        }
        
        public virtual SiteApp GetSiteAppAppId(
            string app_id
        )  {
            foreach (SiteApp item in GetSiteAppListAppId(
            app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListAppId(
            string app_id
        ) {
            return CachedGetSiteAppListAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , app_id
                );
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListAppId(
            bool overrideCache
            , int cacheHours
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteAppListAppId(
                    app_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<SiteApp> GetSiteAppListSiteId(
            string site_id
        )  {
            return act.GetSiteAppListSiteId(
            site_id
            );
        }
        
        public virtual SiteApp GetSiteAppSiteId(
            string site_id
        )  {
            foreach (SiteApp item in GetSiteAppListSiteId(
            site_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListSiteId(
            string site_id
        ) {
            return CachedGetSiteAppListSiteId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , site_id
                );
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListSiteId(
            bool overrideCache
            , int cacheHours
            , string site_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteAppListSiteId(
                    site_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<SiteApp> GetSiteAppListAppIdSiteId(
            string app_id
            , string site_id
        )  {
            return act.GetSiteAppListAppIdSiteId(
            app_id
            , site_id
            );
        }
        
        public virtual SiteApp GetSiteAppAppIdSiteId(
            string app_id
            , string site_id
        )  {
            foreach (SiteApp item in GetSiteAppListAppIdSiteId(
            app_id
            , site_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListAppIdSiteId(
            string app_id
            , string site_id
        ) {
            return CachedGetSiteAppListAppIdSiteId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , app_id
                    , site_id
                );
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListAppIdSiteId(
            bool overrideCache
            , int cacheHours
            , string app_id
            , string site_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteAppListAppIdSiteId(
                    app_id
                    , site_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountPhoto(
        )  {            
            return act.CountPhoto(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoUuid(
            string uuid
        )  {            
            return act.CountPhotoUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoExternalId(
            string external_id
        )  {            
            return act.CountPhotoExternalId(
            external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoUrl(
            string url
        )  {            
            return act.CountPhotoUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoUrlExternalId(
            string url
            , string external_id
        )  {            
            return act.CountPhotoUrlExternalId(
            url
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return act.CountPhotoUuidExternalId(
            uuid
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual PhotoResult BrowsePhotoListFilter(SearchFilter obj)  {
            return act.BrowsePhotoListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoUuid(string set_type, Photo obj)  {
            return act.SetPhotoUuid(set_type, obj);
        }
        
        public virtual bool SetPhotoUuid(SetType set_type, Photo obj)  {
            return act.SetPhotoUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPhotoUuid(Photo obj)  {
            return act.SetPhotoUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoExternalId(string set_type, Photo obj)  {
            return act.SetPhotoExternalId(set_type, obj);
        }
        
        public virtual bool SetPhotoExternalId(SetType set_type, Photo obj)  {
            return act.SetPhotoExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPhotoExternalId(Photo obj)  {
            return act.SetPhotoExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoUrl(string set_type, Photo obj)  {
            return act.SetPhotoUrl(set_type, obj);
        }
        
        public virtual bool SetPhotoUrl(SetType set_type, Photo obj)  {
            return act.SetPhotoUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPhotoUrl(Photo obj)  {
            return act.SetPhotoUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoUrlExternalId(string set_type, Photo obj)  {
            return act.SetPhotoUrlExternalId(set_type, obj);
        }
        
        public virtual bool SetPhotoUrlExternalId(SetType set_type, Photo obj)  {
            return act.SetPhotoUrlExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPhotoUrlExternalId(Photo obj)  {
            return act.SetPhotoUrlExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoUuidExternalId(string set_type, Photo obj)  {
            return act.SetPhotoUuidExternalId(set_type, obj);
        }
        
        public virtual bool SetPhotoUuidExternalId(SetType set_type, Photo obj)  {
            return act.SetPhotoUuidExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPhotoUuidExternalId(Photo obj)  {
            return act.SetPhotoUuidExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoUuid(
            string uuid
        )  {            
            return act.DelPhotoUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoExternalId(
            string external_id
        )  {            
            return act.DelPhotoExternalId(
            external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoUrl(
            string url
        )  {            
            return act.DelPhotoUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoUrlExternalId(
            string url
            , string external_id
        )  {            
            return act.DelPhotoUrlExternalId(
            url
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return act.DelPhotoUuidExternalId(
            uuid
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Photo> GetPhotoList(
        )  {
            return act.GetPhotoList(
            );
        }
        
        public virtual Photo GetPhoto(
        )  {
            foreach (Photo item in GetPhotoList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoList(
        ) {
            return CachedGetPhotoList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<Photo> CachedGetPhotoList(
            bool overrideCache
            , int cacheHours
        ) {
            List<Photo> objs;

            string method_name = "CachedGetPhotoList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Photo>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Photo> GetPhotoListUuid(
            string uuid
        )  {
            return act.GetPhotoListUuid(
            uuid
            );
        }
        
        public virtual Photo GetPhotoUuid(
            string uuid
        )  {
            foreach (Photo item in GetPhotoListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoListUuid(
            string uuid
        ) {
            return CachedGetPhotoListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Photo> CachedGetPhotoListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Photo> GetPhotoListExternalId(
            string external_id
        )  {
            return act.GetPhotoListExternalId(
            external_id
            );
        }
        
        public virtual Photo GetPhotoExternalId(
            string external_id
        )  {
            foreach (Photo item in GetPhotoListExternalId(
            external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoListExternalId(
            string external_id
        ) {
            return CachedGetPhotoListExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , external_id
                );
        }
        
        public virtual List<Photo> CachedGetPhotoListExternalId(
            bool overrideCache
            , int cacheHours
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoListExternalId(
                    external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Photo> GetPhotoListUrl(
            string url
        )  {
            return act.GetPhotoListUrl(
            url
            );
        }
        
        public virtual Photo GetPhotoUrl(
            string url
        )  {
            foreach (Photo item in GetPhotoListUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoListUrl(
            string url
        ) {
            return CachedGetPhotoListUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<Photo> CachedGetPhotoListUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoListUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Photo> GetPhotoListUrlExternalId(
            string url
            , string external_id
        )  {
            return act.GetPhotoListUrlExternalId(
            url
            , external_id
            );
        }
        
        public virtual Photo GetPhotoUrlExternalId(
            string url
            , string external_id
        )  {
            foreach (Photo item in GetPhotoListUrlExternalId(
            url
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoListUrlExternalId(
            string url
            , string external_id
        ) {
            return CachedGetPhotoListUrlExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , external_id
                );
        }
        
        public virtual List<Photo> CachedGetPhotoListUrlExternalId(
            bool overrideCache
            , int cacheHours
            , string url
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoListUrlExternalId(
                    url
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Photo> GetPhotoListUuidExternalId(
            string uuid
            , string external_id
        )  {
            return act.GetPhotoListUuidExternalId(
            uuid
            , external_id
            );
        }
        
        public virtual Photo GetPhotoUuidExternalId(
            string uuid
            , string external_id
        )  {
            foreach (Photo item in GetPhotoListUuidExternalId(
            uuid
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoListUuidExternalId(
            string uuid
            , string external_id
        ) {
            return CachedGetPhotoListUuidExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , external_id
                );
        }
        
        public virtual List<Photo> CachedGetPhotoListUuidExternalId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoListUuidExternalId(
                    uuid
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountVideo(
        )  {            
            return act.CountVideo(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoUuid(
            string uuid
        )  {            
            return act.CountVideoUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoExternalId(
            string external_id
        )  {            
            return act.CountVideoExternalId(
            external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoUrl(
            string url
        )  {            
            return act.CountVideoUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoUrlExternalId(
            string url
            , string external_id
        )  {            
            return act.CountVideoUrlExternalId(
            url
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return act.CountVideoUuidExternalId(
            uuid
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual VideoResult BrowseVideoListFilter(SearchFilter obj)  {
            return act.BrowseVideoListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoUuid(string set_type, Video obj)  {
            return act.SetVideoUuid(set_type, obj);
        }
        
        public virtual bool SetVideoUuid(SetType set_type, Video obj)  {
            return act.SetVideoUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetVideoUuid(Video obj)  {
            return act.SetVideoUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoExternalId(string set_type, Video obj)  {
            return act.SetVideoExternalId(set_type, obj);
        }
        
        public virtual bool SetVideoExternalId(SetType set_type, Video obj)  {
            return act.SetVideoExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetVideoExternalId(Video obj)  {
            return act.SetVideoExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoUrl(string set_type, Video obj)  {
            return act.SetVideoUrl(set_type, obj);
        }
        
        public virtual bool SetVideoUrl(SetType set_type, Video obj)  {
            return act.SetVideoUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetVideoUrl(Video obj)  {
            return act.SetVideoUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoUrlExternalId(string set_type, Video obj)  {
            return act.SetVideoUrlExternalId(set_type, obj);
        }
        
        public virtual bool SetVideoUrlExternalId(SetType set_type, Video obj)  {
            return act.SetVideoUrlExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetVideoUrlExternalId(Video obj)  {
            return act.SetVideoUrlExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoUuidExternalId(string set_type, Video obj)  {
            return act.SetVideoUuidExternalId(set_type, obj);
        }
        
        public virtual bool SetVideoUuidExternalId(SetType set_type, Video obj)  {
            return act.SetVideoUuidExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetVideoUuidExternalId(Video obj)  {
            return act.SetVideoUuidExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoUuid(
            string uuid
        )  {            
            return act.DelVideoUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoExternalId(
            string external_id
        )  {            
            return act.DelVideoExternalId(
            external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoUrl(
            string url
        )  {            
            return act.DelVideoUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoUrlExternalId(
            string url
            , string external_id
        )  {            
            return act.DelVideoUrlExternalId(
            url
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return act.DelVideoUuidExternalId(
            uuid
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Video> GetVideoList(
        )  {
            return act.GetVideoList(
            );
        }
        
        public virtual Video GetVideo(
        )  {
            foreach (Video item in GetVideoList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoList(
        ) {
            return CachedGetVideoList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<Video> CachedGetVideoList(
            bool overrideCache
            , int cacheHours
        ) {
            List<Video> objs;

            string method_name = "CachedGetVideoList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Video>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Video> GetVideoListUuid(
            string uuid
        )  {
            return act.GetVideoListUuid(
            uuid
            );
        }
        
        public virtual Video GetVideoUuid(
            string uuid
        )  {
            foreach (Video item in GetVideoListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoListUuid(
            string uuid
        ) {
            return CachedGetVideoListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Video> CachedGetVideoListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Video> GetVideoListExternalId(
            string external_id
        )  {
            return act.GetVideoListExternalId(
            external_id
            );
        }
        
        public virtual Video GetVideoExternalId(
            string external_id
        )  {
            foreach (Video item in GetVideoListExternalId(
            external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoListExternalId(
            string external_id
        ) {
            return CachedGetVideoListExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , external_id
                );
        }
        
        public virtual List<Video> CachedGetVideoListExternalId(
            bool overrideCache
            , int cacheHours
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoListExternalId(
                    external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Video> GetVideoListUrl(
            string url
        )  {
            return act.GetVideoListUrl(
            url
            );
        }
        
        public virtual Video GetVideoUrl(
            string url
        )  {
            foreach (Video item in GetVideoListUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoListUrl(
            string url
        ) {
            return CachedGetVideoListUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<Video> CachedGetVideoListUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoListUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Video> GetVideoListUrlExternalId(
            string url
            , string external_id
        )  {
            return act.GetVideoListUrlExternalId(
            url
            , external_id
            );
        }
        
        public virtual Video GetVideoUrlExternalId(
            string url
            , string external_id
        )  {
            foreach (Video item in GetVideoListUrlExternalId(
            url
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoListUrlExternalId(
            string url
            , string external_id
        ) {
            return CachedGetVideoListUrlExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , external_id
                );
        }
        
        public virtual List<Video> CachedGetVideoListUrlExternalId(
            bool overrideCache
            , int cacheHours
            , string url
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoListUrlExternalId(
                    url
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Video> GetVideoListUuidExternalId(
            string uuid
            , string external_id
        )  {
            return act.GetVideoListUuidExternalId(
            uuid
            , external_id
            );
        }
        
        public virtual Video GetVideoUuidExternalId(
            string uuid
            , string external_id
        )  {
            foreach (Video item in GetVideoListUuidExternalId(
            uuid
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoListUuidExternalId(
            string uuid
            , string external_id
        ) {
            return CachedGetVideoListUuidExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , external_id
                );
        }
        
        public virtual List<Video> CachedGetVideoListUuidExternalId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoListUuidExternalId(
                    uuid
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
    }
}






