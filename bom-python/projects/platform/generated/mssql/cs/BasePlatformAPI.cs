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
        public virtual int CountAppByUuid(
            string uuid
        )  {            
            return act.CountAppByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByCode(
            string code
        )  {            
            return act.CountAppByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByTypeId(
            string type_id
        )  {            
            return act.CountAppByTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByCodeByTypeId(
            string code
            , string type_id
        )  {            
            return act.CountAppByCodeByTypeId(
            code
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByPlatformByTypeId(
            string platform
            , string type_id
        )  {            
            return act.CountAppByPlatformByTypeId(
            platform
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByPlatform(
            string platform
        )  {            
            return act.CountAppByPlatform(
            platform
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual AppResult BrowseAppListByFilter(SearchFilter obj)  {
            return act.BrowseAppListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppByUuid(string set_type, App obj)  {
            return act.SetAppByUuid(set_type, obj);
        }
        
        public virtual bool SetAppByUuid(SetType set_type, App obj)  {
            return act.SetAppByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetAppByUuid(App obj)  {
            return act.SetAppByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppByCode(string set_type, App obj)  {
            return act.SetAppByCode(set_type, obj);
        }
        
        public virtual bool SetAppByCode(SetType set_type, App obj)  {
            return act.SetAppByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetAppByCode(App obj)  {
            return act.SetAppByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelAppByUuid(
            string uuid
        )  {            
            return act.DelAppByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelAppByCode(
            string code
        )  {            
            return act.DelAppByCode(
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
        public virtual List<App> GetAppListByUuid(
            string uuid
        )  {
            return act.GetAppListByUuid(
            uuid
            );
        }
        
        public virtual App GetAppByUuid(
            string uuid
        )  {
            foreach (App item in GetAppListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListByUuid(
            string uuid
        ) {
            return CachedGetAppListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<App> CachedGetAppListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListByCode(
            string code
        )  {
            return act.GetAppListByCode(
            code
            );
        }
        
        public virtual App GetAppByCode(
            string code
        )  {
            foreach (App item in GetAppListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListByCode(
            string code
        ) {
            return CachedGetAppListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<App> CachedGetAppListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListByTypeId(
            string type_id
        )  {
            return act.GetAppListByTypeId(
            type_id
            );
        }
        
        public virtual App GetAppByTypeId(
            string type_id
        )  {
            foreach (App item in GetAppListByTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListByTypeId(
            string type_id
        ) {
            return CachedGetAppListByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<App> CachedGetAppListByTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListByTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListByCodeByTypeId(
            string code
            , string type_id
        )  {
            return act.GetAppListByCodeByTypeId(
            code
            , type_id
            );
        }
        
        public virtual App GetAppByCodeByTypeId(
            string code
            , string type_id
        )  {
            foreach (App item in GetAppListByCodeByTypeId(
            code
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListByCodeByTypeId(
            string code
            , string type_id
        ) {
            return CachedGetAppListByCodeByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , type_id
                );
        }
        
        public virtual List<App> CachedGetAppListByCodeByTypeId(
            bool overrideCache
            , int cacheHours
            , string code
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListByCodeByTypeId(
                    code
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListByPlatformByTypeId(
            string platform
            , string type_id
        )  {
            return act.GetAppListByPlatformByTypeId(
            platform
            , type_id
            );
        }
        
        public virtual App GetAppByPlatformByTypeId(
            string platform
            , string type_id
        )  {
            foreach (App item in GetAppListByPlatformByTypeId(
            platform
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListByPlatformByTypeId(
            string platform
            , string type_id
        ) {
            return CachedGetAppListByPlatformByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , platform
                    , type_id
                );
        }
        
        public virtual List<App> CachedGetAppListByPlatformByTypeId(
            bool overrideCache
            , int cacheHours
            , string platform
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListByPlatformByTypeId(
                    platform
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<App> GetAppListByPlatform(
            string platform
        )  {
            return act.GetAppListByPlatform(
            platform
            );
        }
        
        public virtual App GetAppByPlatform(
            string platform
        )  {
            foreach (App item in GetAppListByPlatform(
            platform
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<App> CachedGetAppListByPlatform(
            string platform
        ) {
            return CachedGetAppListByPlatform(
                    false
                    , CACHE_DEFAULT_HOURS
                    , platform
                );
        }
        
        public virtual List<App> CachedGetAppListByPlatform(
            bool overrideCache
            , int cacheHours
            , string platform
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppListByPlatform(
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
        public virtual int CountAppTypeByUuid(
            string uuid
        )  {            
            return act.CountAppTypeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppTypeByCode(
            string code
        )  {            
            return act.CountAppTypeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual AppTypeResult BrowseAppTypeListByFilter(SearchFilter obj)  {
            return act.BrowseAppTypeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppTypeByUuid(string set_type, AppType obj)  {
            return act.SetAppTypeByUuid(set_type, obj);
        }
        
        public virtual bool SetAppTypeByUuid(SetType set_type, AppType obj)  {
            return act.SetAppTypeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetAppTypeByUuid(AppType obj)  {
            return act.SetAppTypeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppTypeByCode(string set_type, AppType obj)  {
            return act.SetAppTypeByCode(set_type, obj);
        }
        
        public virtual bool SetAppTypeByCode(SetType set_type, AppType obj)  {
            return act.SetAppTypeByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetAppTypeByCode(AppType obj)  {
            return act.SetAppTypeByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelAppTypeByUuid(
            string uuid
        )  {            
            return act.DelAppTypeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelAppTypeByCode(
            string code
        )  {            
            return act.DelAppTypeByCode(
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
        public virtual List<AppType> GetAppTypeListByUuid(
            string uuid
        )  {
            return act.GetAppTypeListByUuid(
            uuid
            );
        }
        
        public virtual AppType GetAppTypeByUuid(
            string uuid
        )  {
            foreach (AppType item in GetAppTypeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<AppType> CachedGetAppTypeListByUuid(
            string uuid
        ) {
            return CachedGetAppTypeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<AppType> CachedGetAppTypeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppTypeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<AppType> GetAppTypeListByCode(
            string code
        )  {
            return act.GetAppTypeListByCode(
            code
            );
        }
        
        public virtual AppType GetAppTypeByCode(
            string code
        )  {
            foreach (AppType item in GetAppTypeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<AppType> CachedGetAppTypeListByCode(
            string code
        ) {
            return CachedGetAppTypeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<AppType> CachedGetAppTypeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetAppTypeListByCode(
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
        public virtual int CountSiteByUuid(
            string uuid
        )  {            
            return act.CountSiteByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByCode(
            string code
        )  {            
            return act.CountSiteByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByTypeId(
            string type_id
        )  {            
            return act.CountSiteByTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByCodeByTypeId(
            string code
            , string type_id
        )  {            
            return act.CountSiteByCodeByTypeId(
            code
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByDomainByTypeId(
            string domain
            , string type_id
        )  {            
            return act.CountSiteByDomainByTypeId(
            domain
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByDomain(
            string domain
        )  {            
            return act.CountSiteByDomain(
            domain
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual SiteResult BrowseSiteListByFilter(SearchFilter obj)  {
            return act.BrowseSiteListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteByUuid(string set_type, Site obj)  {
            return act.SetSiteByUuid(set_type, obj);
        }
        
        public virtual bool SetSiteByUuid(SetType set_type, Site obj)  {
            return act.SetSiteByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteByUuid(Site obj)  {
            return act.SetSiteByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteByCode(string set_type, Site obj)  {
            return act.SetSiteByCode(set_type, obj);
        }
        
        public virtual bool SetSiteByCode(SetType set_type, Site obj)  {
            return act.SetSiteByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteByCode(Site obj)  {
            return act.SetSiteByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteByUuid(
            string uuid
        )  {            
            return act.DelSiteByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteByCode(
            string code
        )  {            
            return act.DelSiteByCode(
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
        public virtual List<Site> GetSiteListByUuid(
            string uuid
        )  {
            return act.GetSiteListByUuid(
            uuid
            );
        }
        
        public virtual Site GetSiteByUuid(
            string uuid
        )  {
            foreach (Site item in GetSiteListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListByUuid(
            string uuid
        ) {
            return CachedGetSiteListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Site> CachedGetSiteListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListByCode(
            string code
        )  {
            return act.GetSiteListByCode(
            code
            );
        }
        
        public virtual Site GetSiteByCode(
            string code
        )  {
            foreach (Site item in GetSiteListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListByCode(
            string code
        ) {
            return CachedGetSiteListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Site> CachedGetSiteListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListByTypeId(
            string type_id
        )  {
            return act.GetSiteListByTypeId(
            type_id
            );
        }
        
        public virtual Site GetSiteByTypeId(
            string type_id
        )  {
            foreach (Site item in GetSiteListByTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListByTypeId(
            string type_id
        ) {
            return CachedGetSiteListByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<Site> CachedGetSiteListByTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListByTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListByCodeByTypeId(
            string code
            , string type_id
        )  {
            return act.GetSiteListByCodeByTypeId(
            code
            , type_id
            );
        }
        
        public virtual Site GetSiteByCodeByTypeId(
            string code
            , string type_id
        )  {
            foreach (Site item in GetSiteListByCodeByTypeId(
            code
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListByCodeByTypeId(
            string code
            , string type_id
        ) {
            return CachedGetSiteListByCodeByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , type_id
                );
        }
        
        public virtual List<Site> CachedGetSiteListByCodeByTypeId(
            bool overrideCache
            , int cacheHours
            , string code
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListByCodeByTypeId(
                    code
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListByDomainByTypeId(
            string domain
            , string type_id
        )  {
            return act.GetSiteListByDomainByTypeId(
            domain
            , type_id
            );
        }
        
        public virtual Site GetSiteByDomainByTypeId(
            string domain
            , string type_id
        )  {
            foreach (Site item in GetSiteListByDomainByTypeId(
            domain
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListByDomainByTypeId(
            string domain
            , string type_id
        ) {
            return CachedGetSiteListByDomainByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , domain
                    , type_id
                );
        }
        
        public virtual List<Site> CachedGetSiteListByDomainByTypeId(
            bool overrideCache
            , int cacheHours
            , string domain
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListByDomainByTypeId(
                    domain
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Site> GetSiteListByDomain(
            string domain
        )  {
            return act.GetSiteListByDomain(
            domain
            );
        }
        
        public virtual Site GetSiteByDomain(
            string domain
        )  {
            foreach (Site item in GetSiteListByDomain(
            domain
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Site> CachedGetSiteListByDomain(
            string domain
        ) {
            return CachedGetSiteListByDomain(
                    false
                    , CACHE_DEFAULT_HOURS
                    , domain
                );
        }
        
        public virtual List<Site> CachedGetSiteListByDomain(
            bool overrideCache
            , int cacheHours
            , string domain
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteListByDomain(
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
        public virtual int CountSiteTypeByUuid(
            string uuid
        )  {            
            return act.CountSiteTypeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteTypeByCode(
            string code
        )  {            
            return act.CountSiteTypeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual SiteTypeResult BrowseSiteTypeListByFilter(SearchFilter obj)  {
            return act.BrowseSiteTypeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteTypeByUuid(string set_type, SiteType obj)  {
            return act.SetSiteTypeByUuid(set_type, obj);
        }
        
        public virtual bool SetSiteTypeByUuid(SetType set_type, SiteType obj)  {
            return act.SetSiteTypeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteTypeByUuid(SiteType obj)  {
            return act.SetSiteTypeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteTypeByCode(string set_type, SiteType obj)  {
            return act.SetSiteTypeByCode(set_type, obj);
        }
        
        public virtual bool SetSiteTypeByCode(SetType set_type, SiteType obj)  {
            return act.SetSiteTypeByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteTypeByCode(SiteType obj)  {
            return act.SetSiteTypeByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteTypeByUuid(
            string uuid
        )  {            
            return act.DelSiteTypeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteTypeByCode(
            string code
        )  {            
            return act.DelSiteTypeByCode(
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
        public virtual List<SiteType> GetSiteTypeListByUuid(
            string uuid
        )  {
            return act.GetSiteTypeListByUuid(
            uuid
            );
        }
        
        public virtual SiteType GetSiteTypeByUuid(
            string uuid
        )  {
            foreach (SiteType item in GetSiteTypeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteType> CachedGetSiteTypeListByUuid(
            string uuid
        ) {
            return CachedGetSiteTypeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<SiteType> CachedGetSiteTypeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteTypeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<SiteType> GetSiteTypeListByCode(
            string code
        )  {
            return act.GetSiteTypeListByCode(
            code
            );
        }
        
        public virtual SiteType GetSiteTypeByCode(
            string code
        )  {
            foreach (SiteType item in GetSiteTypeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteType> CachedGetSiteTypeListByCode(
            string code
        ) {
            return CachedGetSiteTypeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<SiteType> CachedGetSiteTypeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteTypeListByCode(
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
        public virtual int CountOrgByUuid(
            string uuid
        )  {            
            return act.CountOrgByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgByCode(
            string code
        )  {            
            return act.CountOrgByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgByName(
            string name
        )  {            
            return act.CountOrgByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OrgResult BrowseOrgListByFilter(SearchFilter obj)  {
            return act.BrowseOrgListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgByUuid(string set_type, Org obj)  {
            return act.SetOrgByUuid(set_type, obj);
        }
        
        public virtual bool SetOrgByUuid(SetType set_type, Org obj)  {
            return act.SetOrgByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOrgByUuid(Org obj)  {
            return act.SetOrgByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgByUuid(
            string uuid
        )  {            
            return act.DelOrgByUuid(
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
        public virtual List<Org> GetOrgListByUuid(
            string uuid
        )  {
            return act.GetOrgListByUuid(
            uuid
            );
        }
        
        public virtual Org GetOrgByUuid(
            string uuid
        )  {
            foreach (Org item in GetOrgListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Org> CachedGetOrgListByUuid(
            string uuid
        ) {
            return CachedGetOrgListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Org> CachedGetOrgListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Org> GetOrgListByCode(
            string code
        )  {
            return act.GetOrgListByCode(
            code
            );
        }
        
        public virtual Org GetOrgByCode(
            string code
        )  {
            foreach (Org item in GetOrgListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Org> CachedGetOrgListByCode(
            string code
        ) {
            return CachedGetOrgListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Org> CachedGetOrgListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Org> GetOrgListByName(
            string name
        )  {
            return act.GetOrgListByName(
            name
            );
        }
        
        public virtual Org GetOrgByName(
            string name
        )  {
            foreach (Org item in GetOrgListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Org> CachedGetOrgListByName(
            string name
        ) {
            return CachedGetOrgListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Org> CachedGetOrgListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgListByName(
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
        public virtual int CountOrgTypeByUuid(
            string uuid
        )  {            
            return act.CountOrgTypeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgTypeByCode(
            string code
        )  {            
            return act.CountOrgTypeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OrgTypeResult BrowseOrgTypeListByFilter(SearchFilter obj)  {
            return act.BrowseOrgTypeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgTypeByUuid(string set_type, OrgType obj)  {
            return act.SetOrgTypeByUuid(set_type, obj);
        }
        
        public virtual bool SetOrgTypeByUuid(SetType set_type, OrgType obj)  {
            return act.SetOrgTypeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOrgTypeByUuid(OrgType obj)  {
            return act.SetOrgTypeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgTypeByCode(string set_type, OrgType obj)  {
            return act.SetOrgTypeByCode(set_type, obj);
        }
        
        public virtual bool SetOrgTypeByCode(SetType set_type, OrgType obj)  {
            return act.SetOrgTypeByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOrgTypeByCode(OrgType obj)  {
            return act.SetOrgTypeByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgTypeByUuid(
            string uuid
        )  {            
            return act.DelOrgTypeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgTypeByCode(
            string code
        )  {            
            return act.DelOrgTypeByCode(
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
        public virtual List<OrgType> GetOrgTypeListByUuid(
            string uuid
        )  {
            return act.GetOrgTypeListByUuid(
            uuid
            );
        }
        
        public virtual OrgType GetOrgTypeByUuid(
            string uuid
        )  {
            foreach (OrgType item in GetOrgTypeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgType> CachedGetOrgTypeListByUuid(
            string uuid
        ) {
            return CachedGetOrgTypeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OrgType> CachedGetOrgTypeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgTypeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OrgType> GetOrgTypeListByCode(
            string code
        )  {
            return act.GetOrgTypeListByCode(
            code
            );
        }
        
        public virtual OrgType GetOrgTypeByCode(
            string code
        )  {
            foreach (OrgType item in GetOrgTypeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgType> CachedGetOrgTypeListByCode(
            string code
        ) {
            return CachedGetOrgTypeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<OrgType> CachedGetOrgTypeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgTypeListByCode(
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
        public virtual int CountContentItemByUuid(
            string uuid
        )  {            
            return act.CountContentItemByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemByCode(
            string code
        )  {            
            return act.CountContentItemByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemByName(
            string name
        )  {            
            return act.CountContentItemByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemByPath(
            string path
        )  {            
            return act.CountContentItemByPath(
            path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ContentItemResult BrowseContentItemListByFilter(SearchFilter obj)  {
            return act.BrowseContentItemListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemByUuid(string set_type, ContentItem obj)  {
            return act.SetContentItemByUuid(set_type, obj);
        }
        
        public virtual bool SetContentItemByUuid(SetType set_type, ContentItem obj)  {
            return act.SetContentItemByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetContentItemByUuid(ContentItem obj)  {
            return act.SetContentItemByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemByUuid(
            string uuid
        )  {            
            return act.DelContentItemByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemByPath(
            string path
        )  {            
            return act.DelContentItemByPath(
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
        public virtual List<ContentItem> GetContentItemListByUuid(
            string uuid
        )  {
            return act.GetContentItemListByUuid(
            uuid
            );
        }
        
        public virtual ContentItem GetContentItemByUuid(
            string uuid
        )  {
            foreach (ContentItem item in GetContentItemListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItem> CachedGetContentItemListByUuid(
            string uuid
        ) {
            return CachedGetContentItemListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ContentItem> CachedGetContentItemListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentItem> GetContentItemListByCode(
            string code
        )  {
            return act.GetContentItemListByCode(
            code
            );
        }
        
        public virtual ContentItem GetContentItemByCode(
            string code
        )  {
            foreach (ContentItem item in GetContentItemListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItem> CachedGetContentItemListByCode(
            string code
        ) {
            return CachedGetContentItemListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ContentItem> CachedGetContentItemListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentItem> GetContentItemListByName(
            string name
        )  {
            return act.GetContentItemListByName(
            name
            );
        }
        
        public virtual ContentItem GetContentItemByName(
            string name
        )  {
            foreach (ContentItem item in GetContentItemListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItem> CachedGetContentItemListByName(
            string name
        ) {
            return CachedGetContentItemListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<ContentItem> CachedGetContentItemListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentItem> GetContentItemListByPath(
            string path
        )  {
            return act.GetContentItemListByPath(
            path
            );
        }
        
        public virtual ContentItem GetContentItemByPath(
            string path
        )  {
            foreach (ContentItem item in GetContentItemListByPath(
            path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItem> CachedGetContentItemListByPath(
            string path
        ) {
            return CachedGetContentItemListByPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , path
                );
        }
        
        public virtual List<ContentItem> CachedGetContentItemListByPath(
            bool overrideCache
            , int cacheHours
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemListByPath(
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
        public virtual int CountContentItemTypeByUuid(
            string uuid
        )  {            
            return act.CountContentItemTypeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemTypeByCode(
            string code
        )  {            
            return act.CountContentItemTypeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ContentItemTypeResult BrowseContentItemTypeListByFilter(SearchFilter obj)  {
            return act.BrowseContentItemTypeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemTypeByUuid(string set_type, ContentItemType obj)  {
            return act.SetContentItemTypeByUuid(set_type, obj);
        }
        
        public virtual bool SetContentItemTypeByUuid(SetType set_type, ContentItemType obj)  {
            return act.SetContentItemTypeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetContentItemTypeByUuid(ContentItemType obj)  {
            return act.SetContentItemTypeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemTypeByCode(string set_type, ContentItemType obj)  {
            return act.SetContentItemTypeByCode(set_type, obj);
        }
        
        public virtual bool SetContentItemTypeByCode(SetType set_type, ContentItemType obj)  {
            return act.SetContentItemTypeByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetContentItemTypeByCode(ContentItemType obj)  {
            return act.SetContentItemTypeByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemTypeByUuid(
            string uuid
        )  {            
            return act.DelContentItemTypeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemTypeByCode(
            string code
        )  {            
            return act.DelContentItemTypeByCode(
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
        public virtual List<ContentItemType> GetContentItemTypeListByUuid(
            string uuid
        )  {
            return act.GetContentItemTypeListByUuid(
            uuid
            );
        }
        
        public virtual ContentItemType GetContentItemTypeByUuid(
            string uuid
        )  {
            foreach (ContentItemType item in GetContentItemTypeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItemType> CachedGetContentItemTypeListByUuid(
            string uuid
        ) {
            return CachedGetContentItemTypeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ContentItemType> CachedGetContentItemTypeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemTypeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentItemType> GetContentItemTypeListByCode(
            string code
        )  {
            return act.GetContentItemTypeListByCode(
            code
            );
        }
        
        public virtual ContentItemType GetContentItemTypeByCode(
            string code
        )  {
            foreach (ContentItemType item in GetContentItemTypeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentItemType> CachedGetContentItemTypeListByCode(
            string code
        ) {
            return CachedGetContentItemTypeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ContentItemType> CachedGetContentItemTypeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentItemTypeListByCode(
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
        public virtual int CountContentPageByUuid(
            string uuid
        )  {            
            return act.CountContentPageByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPageByCode(
            string code
        )  {            
            return act.CountContentPageByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPageByName(
            string name
        )  {            
            return act.CountContentPageByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPageByPath(
            string path
        )  {            
            return act.CountContentPageByPath(
            path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ContentPageResult BrowseContentPageListByFilter(SearchFilter obj)  {
            return act.BrowseContentPageListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentPageByUuid(string set_type, ContentPage obj)  {
            return act.SetContentPageByUuid(set_type, obj);
        }
        
        public virtual bool SetContentPageByUuid(SetType set_type, ContentPage obj)  {
            return act.SetContentPageByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetContentPageByUuid(ContentPage obj)  {
            return act.SetContentPageByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelContentPageByUuid(
            string uuid
        )  {            
            return act.DelContentPageByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelContentPageByPathBySiteId(
            string path
            , string site_id
        )  {            
            return act.DelContentPageByPathBySiteId(
            path
            , site_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelContentPageByPath(
            string path
        )  {            
            return act.DelContentPageByPath(
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
        public virtual List<ContentPage> GetContentPageListByUuid(
            string uuid
        )  {
            return act.GetContentPageListByUuid(
            uuid
            );
        }
        
        public virtual ContentPage GetContentPageByUuid(
            string uuid
        )  {
            foreach (ContentPage item in GetContentPageListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListByUuid(
            string uuid
        ) {
            return CachedGetContentPageListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListByCode(
            string code
        )  {
            return act.GetContentPageListByCode(
            code
            );
        }
        
        public virtual ContentPage GetContentPageByCode(
            string code
        )  {
            foreach (ContentPage item in GetContentPageListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListByCode(
            string code
        ) {
            return CachedGetContentPageListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListByName(
            string name
        )  {
            return act.GetContentPageListByName(
            name
            );
        }
        
        public virtual ContentPage GetContentPageByName(
            string name
        )  {
            foreach (ContentPage item in GetContentPageListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListByName(
            string name
        ) {
            return CachedGetContentPageListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListByPath(
            string path
        )  {
            return act.GetContentPageListByPath(
            path
            );
        }
        
        public virtual ContentPage GetContentPageByPath(
            string path
        )  {
            foreach (ContentPage item in GetContentPageListByPath(
            path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListByPath(
            string path
        ) {
            return CachedGetContentPageListByPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , path
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListByPath(
            bool overrideCache
            , int cacheHours
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListByPath(
                    path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListBySiteId(
            string site_id
        )  {
            return act.GetContentPageListBySiteId(
            site_id
            );
        }
        
        public virtual ContentPage GetContentPageBySiteId(
            string site_id
        )  {
            foreach (ContentPage item in GetContentPageListBySiteId(
            site_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListBySiteId(
            string site_id
        ) {
            return CachedGetContentPageListBySiteId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , site_id
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListBySiteId(
            bool overrideCache
            , int cacheHours
            , string site_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListBySiteId(
                    site_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ContentPage> GetContentPageListBySiteIdByPath(
            string site_id
            , string path
        )  {
            return act.GetContentPageListBySiteIdByPath(
            site_id
            , path
            );
        }
        
        public virtual ContentPage GetContentPageBySiteIdByPath(
            string site_id
            , string path
        )  {
            foreach (ContentPage item in GetContentPageListBySiteIdByPath(
            site_id
            , path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ContentPage> CachedGetContentPageListBySiteIdByPath(
            string site_id
            , string path
        ) {
            return CachedGetContentPageListBySiteIdByPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , site_id
                    , path
                );
        }
        
        public virtual List<ContentPage> CachedGetContentPageListBySiteIdByPath(
            bool overrideCache
            , int cacheHours
            , string site_id
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetContentPageListBySiteIdByPath(
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
        public virtual int CountMessageByUuid(
            string uuid
        )  {            
            return act.CountMessageByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual MessageResult BrowseMessageListByFilter(SearchFilter obj)  {
            return act.BrowseMessageListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetMessageByUuid(string set_type, Message obj)  {
            return act.SetMessageByUuid(set_type, obj);
        }
        
        public virtual bool SetMessageByUuid(SetType set_type, Message obj)  {
            return act.SetMessageByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetMessageByUuid(Message obj)  {
            return act.SetMessageByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelMessageByUuid(
            string uuid
        )  {            
            return act.DelMessageByUuid(
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
        public virtual List<Message> GetMessageListByUuid(
            string uuid
        )  {
            return act.GetMessageListByUuid(
            uuid
            );
        }
        
        public virtual Message GetMessageByUuid(
            string uuid
        )  {
            foreach (Message item in GetMessageListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Message> CachedGetMessageListByUuid(
            string uuid
        ) {
            return CachedGetMessageListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Message> CachedGetMessageListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetMessageListByUuid(
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
        public virtual int CountOfferByUuid(
            string uuid
        )  {            
            return act.CountOfferByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferByCode(
            string code
        )  {            
            return act.CountOfferByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferByName(
            string name
        )  {            
            return act.CountOfferByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferByOrgId(
            string org_id
        )  {            
            return act.CountOfferByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferResult BrowseOfferListByFilter(SearchFilter obj)  {
            return act.BrowseOfferListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferByUuid(string set_type, Offer obj)  {
            return act.SetOfferByUuid(set_type, obj);
        }
        
        public virtual bool SetOfferByUuid(SetType set_type, Offer obj)  {
            return act.SetOfferByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferByUuid(Offer obj)  {
            return act.SetOfferByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferByUuid(
            string uuid
        )  {            
            return act.DelOfferByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferByOrgId(
            string org_id
        )  {            
            return act.DelOfferByOrgId(
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
        public virtual List<Offer> GetOfferListByUuid(
            string uuid
        )  {
            return act.GetOfferListByUuid(
            uuid
            );
        }
        
        public virtual Offer GetOfferByUuid(
            string uuid
        )  {
            foreach (Offer item in GetOfferListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Offer> CachedGetOfferListByUuid(
            string uuid
        ) {
            return CachedGetOfferListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Offer> CachedGetOfferListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Offer> GetOfferListByCode(
            string code
        )  {
            return act.GetOfferListByCode(
            code
            );
        }
        
        public virtual Offer GetOfferByCode(
            string code
        )  {
            foreach (Offer item in GetOfferListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Offer> CachedGetOfferListByCode(
            string code
        ) {
            return CachedGetOfferListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Offer> CachedGetOfferListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Offer> GetOfferListByName(
            string name
        )  {
            return act.GetOfferListByName(
            name
            );
        }
        
        public virtual Offer GetOfferByName(
            string name
        )  {
            foreach (Offer item in GetOfferListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Offer> CachedGetOfferListByName(
            string name
        ) {
            return CachedGetOfferListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Offer> CachedGetOfferListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Offer> GetOfferListByOrgId(
            string org_id
        )  {
            return act.GetOfferListByOrgId(
            org_id
            );
        }
        
        public virtual Offer GetOfferByOrgId(
            string org_id
        )  {
            foreach (Offer item in GetOfferListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Offer> CachedGetOfferListByOrgId(
            string org_id
        ) {
            return CachedGetOfferListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<Offer> CachedGetOfferListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferListByOrgId(
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
        public virtual int CountOfferTypeByUuid(
            string uuid
        )  {            
            return act.CountOfferTypeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferTypeByCode(
            string code
        )  {            
            return act.CountOfferTypeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferTypeByName(
            string name
        )  {            
            return act.CountOfferTypeByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferTypeResult BrowseOfferTypeListByFilter(SearchFilter obj)  {
            return act.BrowseOfferTypeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferTypeByUuid(string set_type, OfferType obj)  {
            return act.SetOfferTypeByUuid(set_type, obj);
        }
        
        public virtual bool SetOfferTypeByUuid(SetType set_type, OfferType obj)  {
            return act.SetOfferTypeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferTypeByUuid(OfferType obj)  {
            return act.SetOfferTypeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferTypeByUuid(
            string uuid
        )  {            
            return act.DelOfferTypeByUuid(
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
        public virtual List<OfferType> GetOfferTypeListByUuid(
            string uuid
        )  {
            return act.GetOfferTypeListByUuid(
            uuid
            );
        }
        
        public virtual OfferType GetOfferTypeByUuid(
            string uuid
        )  {
            foreach (OfferType item in GetOfferTypeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListByUuid(
            string uuid
        ) {
            return CachedGetOfferTypeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferTypeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferType> GetOfferTypeListByCode(
            string code
        )  {
            return act.GetOfferTypeListByCode(
            code
            );
        }
        
        public virtual OfferType GetOfferTypeByCode(
            string code
        )  {
            foreach (OfferType item in GetOfferTypeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListByCode(
            string code
        ) {
            return CachedGetOfferTypeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferTypeListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferType> GetOfferTypeListByName(
            string name
        )  {
            return act.GetOfferTypeListByName(
            name
            );
        }
        
        public virtual OfferType GetOfferTypeByName(
            string name
        )  {
            foreach (OfferType item in GetOfferTypeListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListByName(
            string name
        ) {
            return CachedGetOfferTypeListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<OfferType> CachedGetOfferTypeListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferTypeListByName(
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
        public virtual int CountOfferLocationByUuid(
            string uuid
        )  {            
            return act.CountOfferLocationByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationByOfferId(
            string offer_id
        )  {            
            return act.CountOfferLocationByOfferId(
            offer_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationByCity(
            string city
        )  {            
            return act.CountOfferLocationByCity(
            city
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationByCountryCode(
            string country_code
        )  {            
            return act.CountOfferLocationByCountryCode(
            country_code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationByPostalCode(
            string postal_code
        )  {            
            return act.CountOfferLocationByPostalCode(
            postal_code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferLocationResult BrowseOfferLocationListByFilter(SearchFilter obj)  {
            return act.BrowseOfferLocationListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferLocationByUuid(string set_type, OfferLocation obj)  {
            return act.SetOfferLocationByUuid(set_type, obj);
        }
        
        public virtual bool SetOfferLocationByUuid(SetType set_type, OfferLocation obj)  {
            return act.SetOfferLocationByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferLocationByUuid(OfferLocation obj)  {
            return act.SetOfferLocationByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferLocationByUuid(
            string uuid
        )  {            
            return act.DelOfferLocationByUuid(
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
        public virtual List<OfferLocation> GetOfferLocationListByUuid(
            string uuid
        )  {
            return act.GetOfferLocationListByUuid(
            uuid
            );
        }
        
        public virtual OfferLocation GetOfferLocationByUuid(
            string uuid
        )  {
            foreach (OfferLocation item in GetOfferLocationListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListByUuid(
            string uuid
        ) {
            return CachedGetOfferLocationListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferLocation> GetOfferLocationListByOfferId(
            string offer_id
        )  {
            return act.GetOfferLocationListByOfferId(
            offer_id
            );
        }
        
        public virtual OfferLocation GetOfferLocationByOfferId(
            string offer_id
        )  {
            foreach (OfferLocation item in GetOfferLocationListByOfferId(
            offer_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListByOfferId(
            string offer_id
        ) {
            return CachedGetOfferLocationListByOfferId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , offer_id
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListByOfferId(
            bool overrideCache
            , int cacheHours
            , string offer_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationListByOfferId(
                    offer_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferLocation> GetOfferLocationListByCity(
            string city
        )  {
            return act.GetOfferLocationListByCity(
            city
            );
        }
        
        public virtual OfferLocation GetOfferLocationByCity(
            string city
        )  {
            foreach (OfferLocation item in GetOfferLocationListByCity(
            city
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListByCity(
            string city
        ) {
            return CachedGetOfferLocationListByCity(
                    false
                    , CACHE_DEFAULT_HOURS
                    , city
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListByCity(
            bool overrideCache
            , int cacheHours
            , string city
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationListByCity(
                    city
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferLocation> GetOfferLocationListByCountryCode(
            string country_code
        )  {
            return act.GetOfferLocationListByCountryCode(
            country_code
            );
        }
        
        public virtual OfferLocation GetOfferLocationByCountryCode(
            string country_code
        )  {
            foreach (OfferLocation item in GetOfferLocationListByCountryCode(
            country_code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListByCountryCode(
            string country_code
        ) {
            return CachedGetOfferLocationListByCountryCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , country_code
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListByCountryCode(
            bool overrideCache
            , int cacheHours
            , string country_code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationListByCountryCode(
                    country_code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferLocation> GetOfferLocationListByPostalCode(
            string postal_code
        )  {
            return act.GetOfferLocationListByPostalCode(
            postal_code
            );
        }
        
        public virtual OfferLocation GetOfferLocationByPostalCode(
            string postal_code
        )  {
            foreach (OfferLocation item in GetOfferLocationListByPostalCode(
            postal_code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListByPostalCode(
            string postal_code
        ) {
            return CachedGetOfferLocationListByPostalCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , postal_code
                );
        }
        
        public virtual List<OfferLocation> CachedGetOfferLocationListByPostalCode(
            bool overrideCache
            , int cacheHours
            , string postal_code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferLocationListByPostalCode(
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
        public virtual int CountOfferCategoryByUuid(
            string uuid
        )  {            
            return act.CountOfferCategoryByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByCode(
            string code
        )  {            
            return act.CountOfferCategoryByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByName(
            string name
        )  {            
            return act.CountOfferCategoryByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByOrgId(
            string org_id
        )  {            
            return act.CountOfferCategoryByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByTypeId(
            string type_id
        )  {            
            return act.CountOfferCategoryByTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {            
            return act.CountOfferCategoryByOrgIdByTypeId(
            org_id
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferCategoryResult BrowseOfferCategoryListByFilter(SearchFilter obj)  {
            return act.BrowseOfferCategoryListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryByUuid(string set_type, OfferCategory obj)  {
            return act.SetOfferCategoryByUuid(set_type, obj);
        }
        
        public virtual bool SetOfferCategoryByUuid(SetType set_type, OfferCategory obj)  {
            return act.SetOfferCategoryByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferCategoryByUuid(OfferCategory obj)  {
            return act.SetOfferCategoryByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryByUuid(
            string uuid
        )  {            
            return act.DelOfferCategoryByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryByCodeByOrgId(
            string code
            , string org_id
        )  {            
            return act.DelOfferCategoryByCodeByOrgId(
            code
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {            
            return act.DelOfferCategoryByCodeByOrgIdByTypeId(
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
        public virtual List<OfferCategory> GetOfferCategoryListByUuid(
            string uuid
        )  {
            return act.GetOfferCategoryListByUuid(
            uuid
            );
        }
        
        public virtual OfferCategory GetOfferCategoryByUuid(
            string uuid
        )  {
            foreach (OfferCategory item in GetOfferCategoryListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByUuid(
            string uuid
        ) {
            return CachedGetOfferCategoryListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListByCode(
            string code
        )  {
            return act.GetOfferCategoryListByCode(
            code
            );
        }
        
        public virtual OfferCategory GetOfferCategoryByCode(
            string code
        )  {
            foreach (OfferCategory item in GetOfferCategoryListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByCode(
            string code
        ) {
            return CachedGetOfferCategoryListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListByName(
            string name
        )  {
            return act.GetOfferCategoryListByName(
            name
            );
        }
        
        public virtual OfferCategory GetOfferCategoryByName(
            string name
        )  {
            foreach (OfferCategory item in GetOfferCategoryListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByName(
            string name
        ) {
            return CachedGetOfferCategoryListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListByOrgId(
            string org_id
        )  {
            return act.GetOfferCategoryListByOrgId(
            org_id
            );
        }
        
        public virtual OfferCategory GetOfferCategoryByOrgId(
            string org_id
        )  {
            foreach (OfferCategory item in GetOfferCategoryListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByOrgId(
            string org_id
        ) {
            return CachedGetOfferCategoryListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListByTypeId(
            string type_id
        )  {
            return act.GetOfferCategoryListByTypeId(
            type_id
            );
        }
        
        public virtual OfferCategory GetOfferCategoryByTypeId(
            string type_id
        )  {
            foreach (OfferCategory item in GetOfferCategoryListByTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByTypeId(
            string type_id
        ) {
            return CachedGetOfferCategoryListByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListByTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategory> GetOfferCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            return act.GetOfferCategoryListByOrgIdByTypeId(
            org_id
            , type_id
            );
        }
        
        public virtual OfferCategory GetOfferCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            foreach (OfferCategory item in GetOfferCategoryListByOrgIdByTypeId(
            org_id
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        ) {
            return CachedGetOfferCategoryListByOrgIdByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , type_id
                );
        }
        
        public virtual List<OfferCategory> CachedGetOfferCategoryListByOrgIdByTypeId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryListByOrgIdByTypeId(
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
        public virtual int CountOfferCategoryTreeByUuid(
            string uuid
        )  {            
            return act.CountOfferCategoryTreeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeByParentId(
            string parent_id
        )  {            
            return act.CountOfferCategoryTreeByParentId(
            parent_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeByCategoryId(
            string category_id
        )  {            
            return act.CountOfferCategoryTreeByCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.CountOfferCategoryTreeByParentIdByCategoryId(
            parent_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferCategoryTreeResult BrowseOfferCategoryTreeListByFilter(SearchFilter obj)  {
            return act.BrowseOfferCategoryTreeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryTreeByUuid(string set_type, OfferCategoryTree obj)  {
            return act.SetOfferCategoryTreeByUuid(set_type, obj);
        }
        
        public virtual bool SetOfferCategoryTreeByUuid(SetType set_type, OfferCategoryTree obj)  {
            return act.SetOfferCategoryTreeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferCategoryTreeByUuid(OfferCategoryTree obj)  {
            return act.SetOfferCategoryTreeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryTreeByUuid(
            string uuid
        )  {            
            return act.DelOfferCategoryTreeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryTreeByParentId(
            string parent_id
        )  {            
            return act.DelOfferCategoryTreeByParentId(
            parent_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryTreeByCategoryId(
            string category_id
        )  {            
            return act.DelOfferCategoryTreeByCategoryId(
            category_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.DelOfferCategoryTreeByParentIdByCategoryId(
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
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListByUuid(
            string uuid
        )  {
            return act.GetOfferCategoryTreeListByUuid(
            uuid
            );
        }
        
        public virtual OfferCategoryTree GetOfferCategoryTreeByUuid(
            string uuid
        )  {
            foreach (OfferCategoryTree item in GetOfferCategoryTreeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListByUuid(
            string uuid
        ) {
            return CachedGetOfferCategoryTreeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryTreeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListByParentId(
            string parent_id
        )  {
            return act.GetOfferCategoryTreeListByParentId(
            parent_id
            );
        }
        
        public virtual OfferCategoryTree GetOfferCategoryTreeByParentId(
            string parent_id
        )  {
            foreach (OfferCategoryTree item in GetOfferCategoryTreeListByParentId(
            parent_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListByParentId(
            string parent_id
        ) {
            return CachedGetOfferCategoryTreeListByParentId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                );
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListByParentId(
            bool overrideCache
            , int cacheHours
            , string parent_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryTreeListByParentId(
                    parent_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListByCategoryId(
            string category_id
        )  {
            return act.GetOfferCategoryTreeListByCategoryId(
            category_id
            );
        }
        
        public virtual OfferCategoryTree GetOfferCategoryTreeByCategoryId(
            string category_id
        )  {
            foreach (OfferCategoryTree item in GetOfferCategoryTreeListByCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListByCategoryId(
            string category_id
        ) {
            return CachedGetOfferCategoryTreeListByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListByCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryTreeListByCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryTree> GetOfferCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            return act.GetOfferCategoryTreeListByParentIdByCategoryId(
            parent_id
            , category_id
            );
        }
        
        public virtual OfferCategoryTree GetOfferCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            foreach (OfferCategoryTree item in GetOfferCategoryTreeListByParentIdByCategoryId(
            parent_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        ) {
            return CachedGetOfferCategoryTreeListByParentIdByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                    , category_id
                );
        }
        
        public virtual List<OfferCategoryTree> CachedGetOfferCategoryTreeListByParentIdByCategoryId(
            bool overrideCache
            , int cacheHours
            , string parent_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryTreeListByParentIdByCategoryId(
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
        public virtual int CountOfferCategoryAssocByUuid(
            string uuid
        )  {            
            return act.CountOfferCategoryAssocByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocByOfferId(
            string offer_id
        )  {            
            return act.CountOfferCategoryAssocByOfferId(
            offer_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocByCategoryId(
            string category_id
        )  {            
            return act.CountOfferCategoryAssocByCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocByOfferIdByCategoryId(
            string offer_id
            , string category_id
        )  {            
            return act.CountOfferCategoryAssocByOfferIdByCategoryId(
            offer_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferCategoryAssocResult BrowseOfferCategoryAssocListByFilter(SearchFilter obj)  {
            return act.BrowseOfferCategoryAssocListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryAssocByUuid(string set_type, OfferCategoryAssoc obj)  {
            return act.SetOfferCategoryAssocByUuid(set_type, obj);
        }
        
        public virtual bool SetOfferCategoryAssocByUuid(SetType set_type, OfferCategoryAssoc obj)  {
            return act.SetOfferCategoryAssocByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferCategoryAssocByUuid(OfferCategoryAssoc obj)  {
            return act.SetOfferCategoryAssocByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryAssocByUuid(
            string uuid
        )  {            
            return act.DelOfferCategoryAssocByUuid(
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
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListByUuid(
            string uuid
        )  {
            return act.GetOfferCategoryAssocListByUuid(
            uuid
            );
        }
        
        public virtual OfferCategoryAssoc GetOfferCategoryAssocByUuid(
            string uuid
        )  {
            foreach (OfferCategoryAssoc item in GetOfferCategoryAssocListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListByUuid(
            string uuid
        ) {
            return CachedGetOfferCategoryAssocListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryAssocListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListByOfferId(
            string offer_id
        )  {
            return act.GetOfferCategoryAssocListByOfferId(
            offer_id
            );
        }
        
        public virtual OfferCategoryAssoc GetOfferCategoryAssocByOfferId(
            string offer_id
        )  {
            foreach (OfferCategoryAssoc item in GetOfferCategoryAssocListByOfferId(
            offer_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListByOfferId(
            string offer_id
        ) {
            return CachedGetOfferCategoryAssocListByOfferId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , offer_id
                );
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListByOfferId(
            bool overrideCache
            , int cacheHours
            , string offer_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryAssocListByOfferId(
                    offer_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListByCategoryId(
            string category_id
        )  {
            return act.GetOfferCategoryAssocListByCategoryId(
            category_id
            );
        }
        
        public virtual OfferCategoryAssoc GetOfferCategoryAssocByCategoryId(
            string category_id
        )  {
            foreach (OfferCategoryAssoc item in GetOfferCategoryAssocListByCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListByCategoryId(
            string category_id
        ) {
            return CachedGetOfferCategoryAssocListByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListByCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryAssocListByCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferCategoryAssoc> GetOfferCategoryAssocListByOfferIdByCategoryId(
            string offer_id
            , string category_id
        )  {
            return act.GetOfferCategoryAssocListByOfferIdByCategoryId(
            offer_id
            , category_id
            );
        }
        
        public virtual OfferCategoryAssoc GetOfferCategoryAssocByOfferIdByCategoryId(
            string offer_id
            , string category_id
        )  {
            foreach (OfferCategoryAssoc item in GetOfferCategoryAssocListByOfferIdByCategoryId(
            offer_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListByOfferIdByCategoryId(
            string offer_id
            , string category_id
        ) {
            return CachedGetOfferCategoryAssocListByOfferIdByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , offer_id
                    , category_id
                );
        }
        
        public virtual List<OfferCategoryAssoc> CachedGetOfferCategoryAssocListByOfferIdByCategoryId(
            bool overrideCache
            , int cacheHours
            , string offer_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferCategoryAssocListByOfferIdByCategoryId(
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
        public virtual int CountOfferGameLocationByUuid(
            string uuid
        )  {            
            return act.CountOfferGameLocationByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationByGameLocationId(
            string game_location_id
        )  {            
            return act.CountOfferGameLocationByGameLocationId(
            game_location_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationByOfferId(
            string offer_id
        )  {            
            return act.CountOfferGameLocationByOfferId(
            offer_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationByOfferIdByGameLocationId(
            string offer_id
            , string game_location_id
        )  {            
            return act.CountOfferGameLocationByOfferIdByGameLocationId(
            offer_id
            , game_location_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OfferGameLocationResult BrowseOfferGameLocationListByFilter(SearchFilter obj)  {
            return act.BrowseOfferGameLocationListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferGameLocationByUuid(string set_type, OfferGameLocation obj)  {
            return act.SetOfferGameLocationByUuid(set_type, obj);
        }
        
        public virtual bool SetOfferGameLocationByUuid(SetType set_type, OfferGameLocation obj)  {
            return act.SetOfferGameLocationByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOfferGameLocationByUuid(OfferGameLocation obj)  {
            return act.SetOfferGameLocationByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferGameLocationByUuid(
            string uuid
        )  {            
            return act.DelOfferGameLocationByUuid(
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
        public virtual List<OfferGameLocation> GetOfferGameLocationListByUuid(
            string uuid
        )  {
            return act.GetOfferGameLocationListByUuid(
            uuid
            );
        }
        
        public virtual OfferGameLocation GetOfferGameLocationByUuid(
            string uuid
        )  {
            foreach (OfferGameLocation item in GetOfferGameLocationListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListByUuid(
            string uuid
        ) {
            return CachedGetOfferGameLocationListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferGameLocationListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferGameLocation> GetOfferGameLocationListByGameLocationId(
            string game_location_id
        )  {
            return act.GetOfferGameLocationListByGameLocationId(
            game_location_id
            );
        }
        
        public virtual OfferGameLocation GetOfferGameLocationByGameLocationId(
            string game_location_id
        )  {
            foreach (OfferGameLocation item in GetOfferGameLocationListByGameLocationId(
            game_location_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListByGameLocationId(
            string game_location_id
        ) {
            return CachedGetOfferGameLocationListByGameLocationId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_location_id
                );
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListByGameLocationId(
            bool overrideCache
            , int cacheHours
            , string game_location_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferGameLocationListByGameLocationId(
                    game_location_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferGameLocation> GetOfferGameLocationListByOfferId(
            string offer_id
        )  {
            return act.GetOfferGameLocationListByOfferId(
            offer_id
            );
        }
        
        public virtual OfferGameLocation GetOfferGameLocationByOfferId(
            string offer_id
        )  {
            foreach (OfferGameLocation item in GetOfferGameLocationListByOfferId(
            offer_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListByOfferId(
            string offer_id
        ) {
            return CachedGetOfferGameLocationListByOfferId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , offer_id
                );
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListByOfferId(
            bool overrideCache
            , int cacheHours
            , string offer_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferGameLocationListByOfferId(
                    offer_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OfferGameLocation> GetOfferGameLocationListByOfferIdByGameLocationId(
            string offer_id
            , string game_location_id
        )  {
            return act.GetOfferGameLocationListByOfferIdByGameLocationId(
            offer_id
            , game_location_id
            );
        }
        
        public virtual OfferGameLocation GetOfferGameLocationByOfferIdByGameLocationId(
            string offer_id
            , string game_location_id
        )  {
            foreach (OfferGameLocation item in GetOfferGameLocationListByOfferIdByGameLocationId(
            offer_id
            , game_location_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListByOfferIdByGameLocationId(
            string offer_id
            , string game_location_id
        ) {
            return CachedGetOfferGameLocationListByOfferIdByGameLocationId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , offer_id
                    , game_location_id
                );
        }
        
        public virtual List<OfferGameLocation> CachedGetOfferGameLocationListByOfferIdByGameLocationId(
            bool overrideCache
            , int cacheHours
            , string offer_id
            , string game_location_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOfferGameLocationListByOfferIdByGameLocationId(
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
        public virtual int CountEventInfoByUuid(
            string uuid
        )  {            
            return act.CountEventInfoByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoByCode(
            string code
        )  {            
            return act.CountEventInfoByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoByName(
            string name
        )  {            
            return act.CountEventInfoByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoByOrgId(
            string org_id
        )  {            
            return act.CountEventInfoByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual EventInfoResult BrowseEventInfoListByFilter(SearchFilter obj)  {
            return act.BrowseEventInfoListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventInfoByUuid(string set_type, EventInfo obj)  {
            return act.SetEventInfoByUuid(set_type, obj);
        }
        
        public virtual bool SetEventInfoByUuid(SetType set_type, EventInfo obj)  {
            return act.SetEventInfoByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetEventInfoByUuid(EventInfo obj)  {
            return act.SetEventInfoByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelEventInfoByUuid(
            string uuid
        )  {            
            return act.DelEventInfoByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventInfoByOrgId(
            string org_id
        )  {            
            return act.DelEventInfoByOrgId(
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
        public virtual List<EventInfo> GetEventInfoListByUuid(
            string uuid
        )  {
            return act.GetEventInfoListByUuid(
            uuid
            );
        }
        
        public virtual EventInfo GetEventInfoByUuid(
            string uuid
        )  {
            foreach (EventInfo item in GetEventInfoListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListByUuid(
            string uuid
        ) {
            return CachedGetEventInfoListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventInfoListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventInfo> GetEventInfoListByCode(
            string code
        )  {
            return act.GetEventInfoListByCode(
            code
            );
        }
        
        public virtual EventInfo GetEventInfoByCode(
            string code
        )  {
            foreach (EventInfo item in GetEventInfoListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListByCode(
            string code
        ) {
            return CachedGetEventInfoListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventInfoListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventInfo> GetEventInfoListByName(
            string name
        )  {
            return act.GetEventInfoListByName(
            name
            );
        }
        
        public virtual EventInfo GetEventInfoByName(
            string name
        )  {
            foreach (EventInfo item in GetEventInfoListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListByName(
            string name
        ) {
            return CachedGetEventInfoListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventInfoListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventInfo> GetEventInfoListByOrgId(
            string org_id
        )  {
            return act.GetEventInfoListByOrgId(
            org_id
            );
        }
        
        public virtual EventInfo GetEventInfoByOrgId(
            string org_id
        )  {
            foreach (EventInfo item in GetEventInfoListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListByOrgId(
            string org_id
        ) {
            return CachedGetEventInfoListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<EventInfo> CachedGetEventInfoListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventInfoListByOrgId(
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
        public virtual int CountEventLocationByUuid(
            string uuid
        )  {            
            return act.CountEventLocationByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationByEventId(
            string event_id
        )  {            
            return act.CountEventLocationByEventId(
            event_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationByCity(
            string city
        )  {            
            return act.CountEventLocationByCity(
            city
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationByCountryCode(
            string country_code
        )  {            
            return act.CountEventLocationByCountryCode(
            country_code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationByPostalCode(
            string postal_code
        )  {            
            return act.CountEventLocationByPostalCode(
            postal_code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual EventLocationResult BrowseEventLocationListByFilter(SearchFilter obj)  {
            return act.BrowseEventLocationListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventLocationByUuid(string set_type, EventLocation obj)  {
            return act.SetEventLocationByUuid(set_type, obj);
        }
        
        public virtual bool SetEventLocationByUuid(SetType set_type, EventLocation obj)  {
            return act.SetEventLocationByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetEventLocationByUuid(EventLocation obj)  {
            return act.SetEventLocationByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelEventLocationByUuid(
            string uuid
        )  {            
            return act.DelEventLocationByUuid(
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
        public virtual List<EventLocation> GetEventLocationListByUuid(
            string uuid
        )  {
            return act.GetEventLocationListByUuid(
            uuid
            );
        }
        
        public virtual EventLocation GetEventLocationByUuid(
            string uuid
        )  {
            foreach (EventLocation item in GetEventLocationListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListByUuid(
            string uuid
        ) {
            return CachedGetEventLocationListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventLocation> GetEventLocationListByEventId(
            string event_id
        )  {
            return act.GetEventLocationListByEventId(
            event_id
            );
        }
        
        public virtual EventLocation GetEventLocationByEventId(
            string event_id
        )  {
            foreach (EventLocation item in GetEventLocationListByEventId(
            event_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListByEventId(
            string event_id
        ) {
            return CachedGetEventLocationListByEventId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , event_id
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListByEventId(
            bool overrideCache
            , int cacheHours
            , string event_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationListByEventId(
                    event_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventLocation> GetEventLocationListByCity(
            string city
        )  {
            return act.GetEventLocationListByCity(
            city
            );
        }
        
        public virtual EventLocation GetEventLocationByCity(
            string city
        )  {
            foreach (EventLocation item in GetEventLocationListByCity(
            city
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListByCity(
            string city
        ) {
            return CachedGetEventLocationListByCity(
                    false
                    , CACHE_DEFAULT_HOURS
                    , city
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListByCity(
            bool overrideCache
            , int cacheHours
            , string city
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationListByCity(
                    city
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventLocation> GetEventLocationListByCountryCode(
            string country_code
        )  {
            return act.GetEventLocationListByCountryCode(
            country_code
            );
        }
        
        public virtual EventLocation GetEventLocationByCountryCode(
            string country_code
        )  {
            foreach (EventLocation item in GetEventLocationListByCountryCode(
            country_code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListByCountryCode(
            string country_code
        ) {
            return CachedGetEventLocationListByCountryCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , country_code
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListByCountryCode(
            bool overrideCache
            , int cacheHours
            , string country_code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationListByCountryCode(
                    country_code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventLocation> GetEventLocationListByPostalCode(
            string postal_code
        )  {
            return act.GetEventLocationListByPostalCode(
            postal_code
            );
        }
        
        public virtual EventLocation GetEventLocationByPostalCode(
            string postal_code
        )  {
            foreach (EventLocation item in GetEventLocationListByPostalCode(
            postal_code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListByPostalCode(
            string postal_code
        ) {
            return CachedGetEventLocationListByPostalCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , postal_code
                );
        }
        
        public virtual List<EventLocation> CachedGetEventLocationListByPostalCode(
            bool overrideCache
            , int cacheHours
            , string postal_code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventLocationListByPostalCode(
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
        public virtual int CountEventCategoryByUuid(
            string uuid
        )  {            
            return act.CountEventCategoryByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByCode(
            string code
        )  {            
            return act.CountEventCategoryByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByName(
            string name
        )  {            
            return act.CountEventCategoryByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByOrgId(
            string org_id
        )  {            
            return act.CountEventCategoryByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByTypeId(
            string type_id
        )  {            
            return act.CountEventCategoryByTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {            
            return act.CountEventCategoryByOrgIdByTypeId(
            org_id
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual EventCategoryResult BrowseEventCategoryListByFilter(SearchFilter obj)  {
            return act.BrowseEventCategoryListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryByUuid(string set_type, EventCategory obj)  {
            return act.SetEventCategoryByUuid(set_type, obj);
        }
        
        public virtual bool SetEventCategoryByUuid(SetType set_type, EventCategory obj)  {
            return act.SetEventCategoryByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetEventCategoryByUuid(EventCategory obj)  {
            return act.SetEventCategoryByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryByUuid(
            string uuid
        )  {            
            return act.DelEventCategoryByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryByCodeByOrgId(
            string code
            , string org_id
        )  {            
            return act.DelEventCategoryByCodeByOrgId(
            code
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {            
            return act.DelEventCategoryByCodeByOrgIdByTypeId(
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
        public virtual List<EventCategory> GetEventCategoryListByUuid(
            string uuid
        )  {
            return act.GetEventCategoryListByUuid(
            uuid
            );
        }
        
        public virtual EventCategory GetEventCategoryByUuid(
            string uuid
        )  {
            foreach (EventCategory item in GetEventCategoryListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByUuid(
            string uuid
        ) {
            return CachedGetEventCategoryListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListByCode(
            string code
        )  {
            return act.GetEventCategoryListByCode(
            code
            );
        }
        
        public virtual EventCategory GetEventCategoryByCode(
            string code
        )  {
            foreach (EventCategory item in GetEventCategoryListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByCode(
            string code
        ) {
            return CachedGetEventCategoryListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListByName(
            string name
        )  {
            return act.GetEventCategoryListByName(
            name
            );
        }
        
        public virtual EventCategory GetEventCategoryByName(
            string name
        )  {
            foreach (EventCategory item in GetEventCategoryListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByName(
            string name
        ) {
            return CachedGetEventCategoryListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListByOrgId(
            string org_id
        )  {
            return act.GetEventCategoryListByOrgId(
            org_id
            );
        }
        
        public virtual EventCategory GetEventCategoryByOrgId(
            string org_id
        )  {
            foreach (EventCategory item in GetEventCategoryListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByOrgId(
            string org_id
        ) {
            return CachedGetEventCategoryListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListByTypeId(
            string type_id
        )  {
            return act.GetEventCategoryListByTypeId(
            type_id
            );
        }
        
        public virtual EventCategory GetEventCategoryByTypeId(
            string type_id
        )  {
            foreach (EventCategory item in GetEventCategoryListByTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByTypeId(
            string type_id
        ) {
            return CachedGetEventCategoryListByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListByTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategory> GetEventCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            return act.GetEventCategoryListByOrgIdByTypeId(
            org_id
            , type_id
            );
        }
        
        public virtual EventCategory GetEventCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            foreach (EventCategory item in GetEventCategoryListByOrgIdByTypeId(
            org_id
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        ) {
            return CachedGetEventCategoryListByOrgIdByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , type_id
                );
        }
        
        public virtual List<EventCategory> CachedGetEventCategoryListByOrgIdByTypeId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryListByOrgIdByTypeId(
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
        public virtual int CountEventCategoryTreeByUuid(
            string uuid
        )  {            
            return act.CountEventCategoryTreeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeByParentId(
            string parent_id
        )  {            
            return act.CountEventCategoryTreeByParentId(
            parent_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeByCategoryId(
            string category_id
        )  {            
            return act.CountEventCategoryTreeByCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.CountEventCategoryTreeByParentIdByCategoryId(
            parent_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual EventCategoryTreeResult BrowseEventCategoryTreeListByFilter(SearchFilter obj)  {
            return act.BrowseEventCategoryTreeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryTreeByUuid(string set_type, EventCategoryTree obj)  {
            return act.SetEventCategoryTreeByUuid(set_type, obj);
        }
        
        public virtual bool SetEventCategoryTreeByUuid(SetType set_type, EventCategoryTree obj)  {
            return act.SetEventCategoryTreeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetEventCategoryTreeByUuid(EventCategoryTree obj)  {
            return act.SetEventCategoryTreeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryTreeByUuid(
            string uuid
        )  {            
            return act.DelEventCategoryTreeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryTreeByParentId(
            string parent_id
        )  {            
            return act.DelEventCategoryTreeByParentId(
            parent_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryTreeByCategoryId(
            string category_id
        )  {            
            return act.DelEventCategoryTreeByCategoryId(
            category_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.DelEventCategoryTreeByParentIdByCategoryId(
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
        public virtual List<EventCategoryTree> GetEventCategoryTreeListByUuid(
            string uuid
        )  {
            return act.GetEventCategoryTreeListByUuid(
            uuid
            );
        }
        
        public virtual EventCategoryTree GetEventCategoryTreeByUuid(
            string uuid
        )  {
            foreach (EventCategoryTree item in GetEventCategoryTreeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListByUuid(
            string uuid
        ) {
            return CachedGetEventCategoryTreeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryTreeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryTree> GetEventCategoryTreeListByParentId(
            string parent_id
        )  {
            return act.GetEventCategoryTreeListByParentId(
            parent_id
            );
        }
        
        public virtual EventCategoryTree GetEventCategoryTreeByParentId(
            string parent_id
        )  {
            foreach (EventCategoryTree item in GetEventCategoryTreeListByParentId(
            parent_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListByParentId(
            string parent_id
        ) {
            return CachedGetEventCategoryTreeListByParentId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                );
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListByParentId(
            bool overrideCache
            , int cacheHours
            , string parent_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryTreeListByParentId(
                    parent_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryTree> GetEventCategoryTreeListByCategoryId(
            string category_id
        )  {
            return act.GetEventCategoryTreeListByCategoryId(
            category_id
            );
        }
        
        public virtual EventCategoryTree GetEventCategoryTreeByCategoryId(
            string category_id
        )  {
            foreach (EventCategoryTree item in GetEventCategoryTreeListByCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListByCategoryId(
            string category_id
        ) {
            return CachedGetEventCategoryTreeListByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListByCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryTreeListByCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryTree> GetEventCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            return act.GetEventCategoryTreeListByParentIdByCategoryId(
            parent_id
            , category_id
            );
        }
        
        public virtual EventCategoryTree GetEventCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            foreach (EventCategoryTree item in GetEventCategoryTreeListByParentIdByCategoryId(
            parent_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        ) {
            return CachedGetEventCategoryTreeListByParentIdByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                    , category_id
                );
        }
        
        public virtual List<EventCategoryTree> CachedGetEventCategoryTreeListByParentIdByCategoryId(
            bool overrideCache
            , int cacheHours
            , string parent_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryTreeListByParentIdByCategoryId(
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
        public virtual int CountEventCategoryAssocByUuid(
            string uuid
        )  {            
            return act.CountEventCategoryAssocByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocByEventId(
            string event_id
        )  {            
            return act.CountEventCategoryAssocByEventId(
            event_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocByCategoryId(
            string category_id
        )  {            
            return act.CountEventCategoryAssocByCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocByEventIdByCategoryId(
            string event_id
            , string category_id
        )  {            
            return act.CountEventCategoryAssocByEventIdByCategoryId(
            event_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual EventCategoryAssocResult BrowseEventCategoryAssocListByFilter(SearchFilter obj)  {
            return act.BrowseEventCategoryAssocListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryAssocByUuid(string set_type, EventCategoryAssoc obj)  {
            return act.SetEventCategoryAssocByUuid(set_type, obj);
        }
        
        public virtual bool SetEventCategoryAssocByUuid(SetType set_type, EventCategoryAssoc obj)  {
            return act.SetEventCategoryAssocByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetEventCategoryAssocByUuid(EventCategoryAssoc obj)  {
            return act.SetEventCategoryAssocByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryAssocByUuid(
            string uuid
        )  {            
            return act.DelEventCategoryAssocByUuid(
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
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListByUuid(
            string uuid
        )  {
            return act.GetEventCategoryAssocListByUuid(
            uuid
            );
        }
        
        public virtual EventCategoryAssoc GetEventCategoryAssocByUuid(
            string uuid
        )  {
            foreach (EventCategoryAssoc item in GetEventCategoryAssocListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListByUuid(
            string uuid
        ) {
            return CachedGetEventCategoryAssocListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryAssocListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListByEventId(
            string event_id
        )  {
            return act.GetEventCategoryAssocListByEventId(
            event_id
            );
        }
        
        public virtual EventCategoryAssoc GetEventCategoryAssocByEventId(
            string event_id
        )  {
            foreach (EventCategoryAssoc item in GetEventCategoryAssocListByEventId(
            event_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListByEventId(
            string event_id
        ) {
            return CachedGetEventCategoryAssocListByEventId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , event_id
                );
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListByEventId(
            bool overrideCache
            , int cacheHours
            , string event_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryAssocListByEventId(
                    event_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListByCategoryId(
            string category_id
        )  {
            return act.GetEventCategoryAssocListByCategoryId(
            category_id
            );
        }
        
        public virtual EventCategoryAssoc GetEventCategoryAssocByCategoryId(
            string category_id
        )  {
            foreach (EventCategoryAssoc item in GetEventCategoryAssocListByCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListByCategoryId(
            string category_id
        ) {
            return CachedGetEventCategoryAssocListByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListByCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryAssocListByCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<EventCategoryAssoc> GetEventCategoryAssocListByEventIdByCategoryId(
            string event_id
            , string category_id
        )  {
            return act.GetEventCategoryAssocListByEventIdByCategoryId(
            event_id
            , category_id
            );
        }
        
        public virtual EventCategoryAssoc GetEventCategoryAssocByEventIdByCategoryId(
            string event_id
            , string category_id
        )  {
            foreach (EventCategoryAssoc item in GetEventCategoryAssocListByEventIdByCategoryId(
            event_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListByEventIdByCategoryId(
            string event_id
            , string category_id
        ) {
            return CachedGetEventCategoryAssocListByEventIdByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , event_id
                    , category_id
                );
        }
        
        public virtual List<EventCategoryAssoc> CachedGetEventCategoryAssocListByEventIdByCategoryId(
            bool overrideCache
            , int cacheHours
            , string event_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetEventCategoryAssocListByEventIdByCategoryId(
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
        public virtual int CountChannelByUuid(
            string uuid
        )  {            
            return act.CountChannelByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByCode(
            string code
        )  {            
            return act.CountChannelByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByName(
            string name
        )  {            
            return act.CountChannelByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByOrgId(
            string org_id
        )  {            
            return act.CountChannelByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByTypeId(
            string type_id
        )  {            
            return act.CountChannelByTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {            
            return act.CountChannelByOrgIdByTypeId(
            org_id
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ChannelResult BrowseChannelListByFilter(SearchFilter obj)  {
            return act.BrowseChannelListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetChannelByUuid(string set_type, Channel obj)  {
            return act.SetChannelByUuid(set_type, obj);
        }
        
        public virtual bool SetChannelByUuid(SetType set_type, Channel obj)  {
            return act.SetChannelByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetChannelByUuid(Channel obj)  {
            return act.SetChannelByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelByUuid(
            string uuid
        )  {            
            return act.DelChannelByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelByCodeByOrgId(
            string code
            , string org_id
        )  {            
            return act.DelChannelByCodeByOrgId(
            code
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {            
            return act.DelChannelByCodeByOrgIdByTypeId(
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
        public virtual List<Channel> GetChannelListByUuid(
            string uuid
        )  {
            return act.GetChannelListByUuid(
            uuid
            );
        }
        
        public virtual Channel GetChannelByUuid(
            string uuid
        )  {
            foreach (Channel item in GetChannelListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListByUuid(
            string uuid
        ) {
            return CachedGetChannelListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Channel> CachedGetChannelListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListByCode(
            string code
        )  {
            return act.GetChannelListByCode(
            code
            );
        }
        
        public virtual Channel GetChannelByCode(
            string code
        )  {
            foreach (Channel item in GetChannelListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListByCode(
            string code
        ) {
            return CachedGetChannelListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Channel> CachedGetChannelListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListByName(
            string name
        )  {
            return act.GetChannelListByName(
            name
            );
        }
        
        public virtual Channel GetChannelByName(
            string name
        )  {
            foreach (Channel item in GetChannelListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListByName(
            string name
        ) {
            return CachedGetChannelListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Channel> CachedGetChannelListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListByOrgId(
            string org_id
        )  {
            return act.GetChannelListByOrgId(
            org_id
            );
        }
        
        public virtual Channel GetChannelByOrgId(
            string org_id
        )  {
            foreach (Channel item in GetChannelListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListByOrgId(
            string org_id
        ) {
            return CachedGetChannelListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<Channel> CachedGetChannelListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListByTypeId(
            string type_id
        )  {
            return act.GetChannelListByTypeId(
            type_id
            );
        }
        
        public virtual Channel GetChannelByTypeId(
            string type_id
        )  {
            foreach (Channel item in GetChannelListByTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListByTypeId(
            string type_id
        ) {
            return CachedGetChannelListByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<Channel> CachedGetChannelListByTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListByTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Channel> GetChannelListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            return act.GetChannelListByOrgIdByTypeId(
            org_id
            , type_id
            );
        }
        
        public virtual Channel GetChannelByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            foreach (Channel item in GetChannelListByOrgIdByTypeId(
            org_id
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Channel> CachedGetChannelListByOrgIdByTypeId(
            string org_id
            , string type_id
        ) {
            return CachedGetChannelListByOrgIdByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , type_id
                );
        }
        
        public virtual List<Channel> CachedGetChannelListByOrgIdByTypeId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelListByOrgIdByTypeId(
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
        public virtual int CountChannelTypeByUuid(
            string uuid
        )  {            
            return act.CountChannelTypeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelTypeByCode(
            string code
        )  {            
            return act.CountChannelTypeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelTypeByName(
            string name
        )  {            
            return act.CountChannelTypeByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ChannelTypeResult BrowseChannelTypeListByFilter(SearchFilter obj)  {
            return act.BrowseChannelTypeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetChannelTypeByUuid(string set_type, ChannelType obj)  {
            return act.SetChannelTypeByUuid(set_type, obj);
        }
        
        public virtual bool SetChannelTypeByUuid(SetType set_type, ChannelType obj)  {
            return act.SetChannelTypeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetChannelTypeByUuid(ChannelType obj)  {
            return act.SetChannelTypeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelTypeByUuid(
            string uuid
        )  {            
            return act.DelChannelTypeByUuid(
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
        public virtual List<ChannelType> GetChannelTypeListByUuid(
            string uuid
        )  {
            return act.GetChannelTypeListByUuid(
            uuid
            );
        }
        
        public virtual ChannelType GetChannelTypeByUuid(
            string uuid
        )  {
            foreach (ChannelType item in GetChannelTypeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListByUuid(
            string uuid
        ) {
            return CachedGetChannelTypeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelTypeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ChannelType> GetChannelTypeListByCode(
            string code
        )  {
            return act.GetChannelTypeListByCode(
            code
            );
        }
        
        public virtual ChannelType GetChannelTypeByCode(
            string code
        )  {
            foreach (ChannelType item in GetChannelTypeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListByCode(
            string code
        ) {
            return CachedGetChannelTypeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelTypeListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ChannelType> GetChannelTypeListByName(
            string name
        )  {
            return act.GetChannelTypeListByName(
            name
            );
        }
        
        public virtual ChannelType GetChannelTypeByName(
            string name
        )  {
            foreach (ChannelType item in GetChannelTypeListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListByName(
            string name
        ) {
            return CachedGetChannelTypeListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<ChannelType> CachedGetChannelTypeListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetChannelTypeListByName(
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
        public virtual int CountQuestionByUuid(
            string uuid
        )  {            
            return act.CountQuestionByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByCode(
            string code
        )  {            
            return act.CountQuestionByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByName(
            string name
        )  {            
            return act.CountQuestionByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByChannelId(
            string channel_id
        )  {            
            return act.CountQuestionByChannelId(
            channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByOrgId(
            string org_id
        )  {            
            return act.CountQuestionByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return act.CountQuestionByChannelIdByOrgId(
            channel_id
            , org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByChannelIdByCode(
            string channel_id
            , string code
        )  {            
            return act.CountQuestionByChannelIdByCode(
            channel_id
            , code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual QuestionResult BrowseQuestionListByFilter(SearchFilter obj)  {
            return act.BrowseQuestionListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetQuestionByUuid(string set_type, Question obj)  {
            return act.SetQuestionByUuid(set_type, obj);
        }
        
        public virtual bool SetQuestionByUuid(SetType set_type, Question obj)  {
            return act.SetQuestionByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetQuestionByUuid(Question obj)  {
            return act.SetQuestionByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetQuestionByChannelIdByCode(string set_type, Question obj)  {
            return act.SetQuestionByChannelIdByCode(set_type, obj);
        }
        
        public virtual bool SetQuestionByChannelIdByCode(SetType set_type, Question obj)  {
            return act.SetQuestionByChannelIdByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetQuestionByChannelIdByCode(Question obj)  {
            return act.SetQuestionByChannelIdByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelQuestionByUuid(
            string uuid
        )  {            
            return act.DelQuestionByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return act.DelQuestionByChannelIdByOrgId(
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
        public virtual List<Question> GetQuestionListByUuid(
            string uuid
        )  {
            return act.GetQuestionListByUuid(
            uuid
            );
        }
        
        public virtual Question GetQuestionByUuid(
            string uuid
        )  {
            foreach (Question item in GetQuestionListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListByUuid(
            string uuid
        ) {
            return CachedGetQuestionListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Question> CachedGetQuestionListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListByCode(
            string code
        )  {
            return act.GetQuestionListByCode(
            code
            );
        }
        
        public virtual Question GetQuestionByCode(
            string code
        )  {
            foreach (Question item in GetQuestionListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListByCode(
            string code
        ) {
            return CachedGetQuestionListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Question> CachedGetQuestionListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListByName(
            string name
        )  {
            return act.GetQuestionListByName(
            name
            );
        }
        
        public virtual Question GetQuestionByName(
            string name
        )  {
            foreach (Question item in GetQuestionListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListByName(
            string name
        ) {
            return CachedGetQuestionListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Question> CachedGetQuestionListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListByType(
            string type
        )  {
            return act.GetQuestionListByType(
            type
            );
        }
        
        public virtual Question GetQuestionByType(
            string type
        )  {
            foreach (Question item in GetQuestionListByType(
            type
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListByType(
            string type
        ) {
            return CachedGetQuestionListByType(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type
                );
        }
        
        public virtual List<Question> CachedGetQuestionListByType(
            bool overrideCache
            , int cacheHours
            , string type
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListByType(
                    type
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListByChannelId(
            string channel_id
        )  {
            return act.GetQuestionListByChannelId(
            channel_id
            );
        }
        
        public virtual Question GetQuestionByChannelId(
            string channel_id
        )  {
            foreach (Question item in GetQuestionListByChannelId(
            channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListByChannelId(
            string channel_id
        ) {
            return CachedGetQuestionListByChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                );
        }
        
        public virtual List<Question> CachedGetQuestionListByChannelId(
            bool overrideCache
            , int cacheHours
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListByChannelId(
                    channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListByOrgId(
            string org_id
        )  {
            return act.GetQuestionListByOrgId(
            org_id
            );
        }
        
        public virtual Question GetQuestionByOrgId(
            string org_id
        )  {
            foreach (Question item in GetQuestionListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListByOrgId(
            string org_id
        ) {
            return CachedGetQuestionListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<Question> CachedGetQuestionListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            return act.GetQuestionListByChannelIdByOrgId(
            channel_id
            , org_id
            );
        }
        
        public virtual Question GetQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            foreach (Question item in GetQuestionListByChannelIdByOrgId(
            channel_id
            , org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListByChannelIdByOrgId(
            string channel_id
            , string org_id
        ) {
            return CachedGetQuestionListByChannelIdByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , org_id
                );
        }
        
        public virtual List<Question> CachedGetQuestionListByChannelIdByOrgId(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListByChannelIdByOrgId(
                    channel_id
                    , org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Question> GetQuestionListByChannelIdByCode(
            string channel_id
            , string code
        )  {
            return act.GetQuestionListByChannelIdByCode(
            channel_id
            , code
            );
        }
        
        public virtual Question GetQuestionByChannelIdByCode(
            string channel_id
            , string code
        )  {
            foreach (Question item in GetQuestionListByChannelIdByCode(
            channel_id
            , code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Question> CachedGetQuestionListByChannelIdByCode(
            string channel_id
            , string code
        ) {
            return CachedGetQuestionListByChannelIdByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , code
                );
        }
        
        public virtual List<Question> CachedGetQuestionListByChannelIdByCode(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetQuestionListByChannelIdByCode(
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
        public virtual int CountProfileOfferByUuid(
            string uuid
        )  {            
            return act.CountProfileOfferByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOfferByProfileId(
            string profile_id
        )  {            
            return act.CountProfileOfferByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileOfferResult BrowseProfileOfferListByFilter(SearchFilter obj)  {
            return act.BrowseProfileOfferListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileOfferByUuid(string set_type, ProfileOffer obj)  {
            return act.SetProfileOfferByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileOfferByUuid(SetType set_type, ProfileOffer obj)  {
            return act.SetProfileOfferByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileOfferByUuid(ProfileOffer obj)  {
            return act.SetProfileOfferByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileOfferByUuid(
            string uuid
        )  {            
            return act.DelProfileOfferByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileOfferByProfileId(
            string profile_id
        )  {            
            return act.DelProfileOfferByProfileId(
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
        public virtual List<ProfileOffer> GetProfileOfferListByUuid(
            string uuid
        )  {
            return act.GetProfileOfferListByUuid(
            uuid
            );
        }
        
        public virtual ProfileOffer GetProfileOfferByUuid(
            string uuid
        )  {
            foreach (ProfileOffer item in GetProfileOfferListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOffer> CachedGetProfileOfferListByUuid(
            string uuid
        ) {
            return CachedGetProfileOfferListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileOffer> CachedGetProfileOfferListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOfferListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileOffer> GetProfileOfferListByProfileId(
            string profile_id
        )  {
            return act.GetProfileOfferListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileOffer GetProfileOfferByProfileId(
            string profile_id
        )  {
            foreach (ProfileOffer item in GetProfileOfferListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOffer> CachedGetProfileOfferListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileOfferListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileOffer> CachedGetProfileOfferListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOfferListByProfileId(
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
        public virtual int CountProfileAppByUuid(
            string uuid
        )  {            
            return act.CountProfileAppByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAppByProfileIdByAppId(
            string profile_id
            , string app_id
        )  {            
            return act.CountProfileAppByProfileIdByAppId(
            profile_id
            , app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileAppResult BrowseProfileAppListByFilter(SearchFilter obj)  {
            return act.BrowseProfileAppListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAppByUuid(string set_type, ProfileApp obj)  {
            return act.SetProfileAppByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileAppByUuid(SetType set_type, ProfileApp obj)  {
            return act.SetProfileAppByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAppByUuid(ProfileApp obj)  {
            return act.SetProfileAppByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAppByProfileIdByAppId(string set_type, ProfileApp obj)  {
            return act.SetProfileAppByProfileIdByAppId(set_type, obj);
        }
        
        public virtual bool SetProfileAppByProfileIdByAppId(SetType set_type, ProfileApp obj)  {
            return act.SetProfileAppByProfileIdByAppId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAppByProfileIdByAppId(ProfileApp obj)  {
            return act.SetProfileAppByProfileIdByAppId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAppByUuid(
            string uuid
        )  {            
            return act.DelProfileAppByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAppByProfileIdByAppId(
            string profile_id
            , string app_id
        )  {            
            return act.DelProfileAppByProfileIdByAppId(
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
        public virtual List<ProfileApp> GetProfileAppListByUuid(
            string uuid
        )  {
            return act.GetProfileAppListByUuid(
            uuid
            );
        }
        
        public virtual ProfileApp GetProfileAppByUuid(
            string uuid
        )  {
            foreach (ProfileApp item in GetProfileAppListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListByUuid(
            string uuid
        ) {
            return CachedGetProfileAppListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAppListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileApp> GetProfileAppListByAppId(
            string app_id
        )  {
            return act.GetProfileAppListByAppId(
            app_id
            );
        }
        
        public virtual ProfileApp GetProfileAppByAppId(
            string app_id
        )  {
            foreach (ProfileApp item in GetProfileAppListByAppId(
            app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListByAppId(
            string app_id
        ) {
            return CachedGetProfileAppListByAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , app_id
                );
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListByAppId(
            bool overrideCache
            , int cacheHours
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAppListByAppId(
                    app_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileApp> GetProfileAppListByProfileId(
            string profile_id
        )  {
            return act.GetProfileAppListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileApp GetProfileAppByProfileId(
            string profile_id
        )  {
            foreach (ProfileApp item in GetProfileAppListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileAppListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAppListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileApp> GetProfileAppListByProfileIdByAppId(
            string profile_id
            , string app_id
        )  {
            return act.GetProfileAppListByProfileIdByAppId(
            profile_id
            , app_id
            );
        }
        
        public virtual ProfileApp GetProfileAppByProfileIdByAppId(
            string profile_id
            , string app_id
        )  {
            foreach (ProfileApp item in GetProfileAppListByProfileIdByAppId(
            profile_id
            , app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListByProfileIdByAppId(
            string profile_id
            , string app_id
        ) {
            return CachedGetProfileAppListByProfileIdByAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , app_id
                );
        }
        
        public virtual List<ProfileApp> CachedGetProfileAppListByProfileIdByAppId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAppListByProfileIdByAppId(
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
        public virtual int CountProfileOrgByUuid(
            string uuid
        )  {            
            return act.CountProfileOrgByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrgByOrgId(
            string org_id
        )  {            
            return act.CountProfileOrgByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrgByProfileId(
            string profile_id
        )  {            
            return act.CountProfileOrgByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileOrgResult BrowseProfileOrgListByFilter(SearchFilter obj)  {
            return act.BrowseProfileOrgListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileOrgByUuid(string set_type, ProfileOrg obj)  {
            return act.SetProfileOrgByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileOrgByUuid(SetType set_type, ProfileOrg obj)  {
            return act.SetProfileOrgByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileOrgByUuid(ProfileOrg obj)  {
            return act.SetProfileOrgByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileOrgByUuid(
            string uuid
        )  {            
            return act.DelProfileOrgByUuid(
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
        public virtual List<ProfileOrg> GetProfileOrgListByUuid(
            string uuid
        )  {
            return act.GetProfileOrgListByUuid(
            uuid
            );
        }
        
        public virtual ProfileOrg GetProfileOrgByUuid(
            string uuid
        )  {
            foreach (ProfileOrg item in GetProfileOrgListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListByUuid(
            string uuid
        ) {
            return CachedGetProfileOrgListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOrgListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileOrg> GetProfileOrgListByOrgId(
            string org_id
        )  {
            return act.GetProfileOrgListByOrgId(
            org_id
            );
        }
        
        public virtual ProfileOrg GetProfileOrgByOrgId(
            string org_id
        )  {
            foreach (ProfileOrg item in GetProfileOrgListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListByOrgId(
            string org_id
        ) {
            return CachedGetProfileOrgListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOrgListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileOrg> GetProfileOrgListByProfileId(
            string profile_id
        )  {
            return act.GetProfileOrgListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileOrg GetProfileOrgByProfileId(
            string profile_id
        )  {
            foreach (ProfileOrg item in GetProfileOrgListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileOrgListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileOrg> CachedGetProfileOrgListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileOrgListByProfileId(
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
        public virtual int CountProfileQuestionByUuid(
            string uuid
        )  {            
            return act.CountProfileQuestionByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByChannelId(
            string channel_id
        )  {            
            return act.CountProfileQuestionByChannelId(
            channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByOrgId(
            string org_id
        )  {            
            return act.CountProfileQuestionByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByProfileId(
            string profile_id
        )  {            
            return act.CountProfileQuestionByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByQuestionId(
            string question_id
        )  {            
            return act.CountProfileQuestionByQuestionId(
            question_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return act.CountProfileQuestionByChannelIdByOrgId(
            channel_id
            , org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {            
            return act.CountProfileQuestionByChannelIdByProfileId(
            channel_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByQuestionIdByProfileId(
            string question_id
            , string profile_id
        )  {            
            return act.CountProfileQuestionByQuestionIdByProfileId(
            question_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileQuestionResult BrowseProfileQuestionListByFilter(SearchFilter obj)  {
            return act.BrowseProfileQuestionListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByUuid(string set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileQuestionByUuid(SetType set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileQuestionByUuid(ProfileQuestion obj)  {
            return act.SetProfileQuestionByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByChannelIdByProfileId(string set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionByChannelIdByProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileQuestionByChannelIdByProfileId(SetType set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionByChannelIdByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileQuestionByChannelIdByProfileId(ProfileQuestion obj)  {
            return act.SetProfileQuestionByChannelIdByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByQuestionIdByProfileId(string set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionByQuestionIdByProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileQuestionByQuestionIdByProfileId(SetType set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionByQuestionIdByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileQuestionByQuestionIdByProfileId(ProfileQuestion obj)  {
            return act.SetProfileQuestionByQuestionIdByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByChannelIdByQuestionIdByProfileId(string set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionByChannelIdByQuestionIdByProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileQuestionByChannelIdByQuestionIdByProfileId(SetType set_type, ProfileQuestion obj)  {
            return act.SetProfileQuestionByChannelIdByQuestionIdByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileQuestionByChannelIdByQuestionIdByProfileId(ProfileQuestion obj)  {
            return act.SetProfileQuestionByChannelIdByQuestionIdByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileQuestionByUuid(
            string uuid
        )  {            
            return act.DelProfileQuestionByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return act.DelProfileQuestionByChannelIdByOrgId(
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
        public virtual List<ProfileQuestion> GetProfileQuestionListByUuid(
            string uuid
        )  {
            return act.GetProfileQuestionListByUuid(
            uuid
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionByUuid(
            string uuid
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByUuid(
            string uuid
        ) {
            return CachedGetProfileQuestionListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListByChannelId(
            string channel_id
        )  {
            return act.GetProfileQuestionListByChannelId(
            channel_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionByChannelId(
            string channel_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListByChannelId(
            channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByChannelId(
            string channel_id
        ) {
            return CachedGetProfileQuestionListByChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByChannelId(
            bool overrideCache
            , int cacheHours
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListByChannelId(
                    channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListByOrgId(
            string org_id
        )  {
            return act.GetProfileQuestionListByOrgId(
            org_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionByOrgId(
            string org_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByOrgId(
            string org_id
        ) {
            return CachedGetProfileQuestionListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListByProfileId(
            string profile_id
        )  {
            return act.GetProfileQuestionListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionByProfileId(
            string profile_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileQuestionListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListByQuestionId(
            string question_id
        )  {
            return act.GetProfileQuestionListByQuestionId(
            question_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionByQuestionId(
            string question_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListByQuestionId(
            question_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByQuestionId(
            string question_id
        ) {
            return CachedGetProfileQuestionListByQuestionId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , question_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByQuestionId(
            bool overrideCache
            , int cacheHours
            , string question_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListByQuestionId(
                    question_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            return act.GetProfileQuestionListByChannelIdByOrgId(
            channel_id
            , org_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListByChannelIdByOrgId(
            channel_id
            , org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByChannelIdByOrgId(
            string channel_id
            , string org_id
        ) {
            return CachedGetProfileQuestionListByChannelIdByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , org_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByChannelIdByOrgId(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListByChannelIdByOrgId(
                    channel_id
                    , org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            return act.GetProfileQuestionListByChannelIdByProfileId(
            channel_id
            , profile_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListByChannelIdByProfileId(
            channel_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        ) {
            return CachedGetProfileQuestionListByChannelIdByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , profile_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByChannelIdByProfileId(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListByChannelIdByProfileId(
                    channel_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileQuestion> GetProfileQuestionListByQuestionIdByProfileId(
            string question_id
            , string profile_id
        )  {
            return act.GetProfileQuestionListByQuestionIdByProfileId(
            question_id
            , profile_id
            );
        }
        
        public virtual ProfileQuestion GetProfileQuestionByQuestionIdByProfileId(
            string question_id
            , string profile_id
        )  {
            foreach (ProfileQuestion item in GetProfileQuestionListByQuestionIdByProfileId(
            question_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByQuestionIdByProfileId(
            string question_id
            , string profile_id
        ) {
            return CachedGetProfileQuestionListByQuestionIdByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , question_id
                    , profile_id
                );
        }
        
        public virtual List<ProfileQuestion> CachedGetProfileQuestionListByQuestionIdByProfileId(
            bool overrideCache
            , int cacheHours
            , string question_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileQuestionListByQuestionIdByProfileId(
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
        public virtual int CountProfileChannelByUuid(
            string uuid
        )  {            
            return act.CountProfileChannelByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelByChannelId(
            string channel_id
        )  {            
            return act.CountProfileChannelByChannelId(
            channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelByProfileId(
            string profile_id
        )  {            
            return act.CountProfileChannelByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {            
            return act.CountProfileChannelByChannelIdByProfileId(
            channel_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileChannelResult BrowseProfileChannelListByFilter(SearchFilter obj)  {
            return act.BrowseProfileChannelListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileChannelByUuid(string set_type, ProfileChannel obj)  {
            return act.SetProfileChannelByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileChannelByUuid(SetType set_type, ProfileChannel obj)  {
            return act.SetProfileChannelByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileChannelByUuid(ProfileChannel obj)  {
            return act.SetProfileChannelByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileChannelByChannelIdByProfileId(string set_type, ProfileChannel obj)  {
            return act.SetProfileChannelByChannelIdByProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileChannelByChannelIdByProfileId(SetType set_type, ProfileChannel obj)  {
            return act.SetProfileChannelByChannelIdByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileChannelByChannelIdByProfileId(ProfileChannel obj)  {
            return act.SetProfileChannelByChannelIdByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileChannelByUuid(
            string uuid
        )  {            
            return act.DelProfileChannelByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileChannelByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {            
            return act.DelProfileChannelByChannelIdByProfileId(
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
        public virtual List<ProfileChannel> GetProfileChannelListByUuid(
            string uuid
        )  {
            return act.GetProfileChannelListByUuid(
            uuid
            );
        }
        
        public virtual ProfileChannel GetProfileChannelByUuid(
            string uuid
        )  {
            foreach (ProfileChannel item in GetProfileChannelListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListByUuid(
            string uuid
        ) {
            return CachedGetProfileChannelListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileChannelListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileChannel> GetProfileChannelListByChannelId(
            string channel_id
        )  {
            return act.GetProfileChannelListByChannelId(
            channel_id
            );
        }
        
        public virtual ProfileChannel GetProfileChannelByChannelId(
            string channel_id
        )  {
            foreach (ProfileChannel item in GetProfileChannelListByChannelId(
            channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListByChannelId(
            string channel_id
        ) {
            return CachedGetProfileChannelListByChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                );
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListByChannelId(
            bool overrideCache
            , int cacheHours
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileChannelListByChannelId(
                    channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileChannel> GetProfileChannelListByProfileId(
            string profile_id
        )  {
            return act.GetProfileChannelListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileChannel GetProfileChannelByProfileId(
            string profile_id
        )  {
            foreach (ProfileChannel item in GetProfileChannelListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileChannelListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileChannelListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileChannel> GetProfileChannelListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            return act.GetProfileChannelListByChannelIdByProfileId(
            channel_id
            , profile_id
            );
        }
        
        public virtual ProfileChannel GetProfileChannelByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            foreach (ProfileChannel item in GetProfileChannelListByChannelIdByProfileId(
            channel_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        ) {
            return CachedGetProfileChannelListByChannelIdByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , profile_id
                );
        }
        
        public virtual List<ProfileChannel> CachedGetProfileChannelListByChannelIdByProfileId(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileChannelListByChannelIdByProfileId(
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
        public virtual int CountOrgSiteByUuid(
            string uuid
        )  {            
            return act.CountOrgSiteByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteByOrgId(
            string org_id
        )  {            
            return act.CountOrgSiteByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteBySiteId(
            string site_id
        )  {            
            return act.CountOrgSiteBySiteId(
            site_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteByOrgIdBySiteId(
            string org_id
            , string site_id
        )  {            
            return act.CountOrgSiteByOrgIdBySiteId(
            org_id
            , site_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual OrgSiteResult BrowseOrgSiteListByFilter(SearchFilter obj)  {
            return act.BrowseOrgSiteListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgSiteByUuid(string set_type, OrgSite obj)  {
            return act.SetOrgSiteByUuid(set_type, obj);
        }
        
        public virtual bool SetOrgSiteByUuid(SetType set_type, OrgSite obj)  {
            return act.SetOrgSiteByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOrgSiteByUuid(OrgSite obj)  {
            return act.SetOrgSiteByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgSiteByOrgIdBySiteId(string set_type, OrgSite obj)  {
            return act.SetOrgSiteByOrgIdBySiteId(set_type, obj);
        }
        
        public virtual bool SetOrgSiteByOrgIdBySiteId(SetType set_type, OrgSite obj)  {
            return act.SetOrgSiteByOrgIdBySiteId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetOrgSiteByOrgIdBySiteId(OrgSite obj)  {
            return act.SetOrgSiteByOrgIdBySiteId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgSiteByUuid(
            string uuid
        )  {            
            return act.DelOrgSiteByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgSiteByOrgIdBySiteId(
            string org_id
            , string site_id
        )  {            
            return act.DelOrgSiteByOrgIdBySiteId(
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
        public virtual List<OrgSite> GetOrgSiteListByUuid(
            string uuid
        )  {
            return act.GetOrgSiteListByUuid(
            uuid
            );
        }
        
        public virtual OrgSite GetOrgSiteByUuid(
            string uuid
        )  {
            foreach (OrgSite item in GetOrgSiteListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListByUuid(
            string uuid
        ) {
            return CachedGetOrgSiteListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgSiteListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OrgSite> GetOrgSiteListByOrgId(
            string org_id
        )  {
            return act.GetOrgSiteListByOrgId(
            org_id
            );
        }
        
        public virtual OrgSite GetOrgSiteByOrgId(
            string org_id
        )  {
            foreach (OrgSite item in GetOrgSiteListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListByOrgId(
            string org_id
        ) {
            return CachedGetOrgSiteListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgSiteListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OrgSite> GetOrgSiteListBySiteId(
            string site_id
        )  {
            return act.GetOrgSiteListBySiteId(
            site_id
            );
        }
        
        public virtual OrgSite GetOrgSiteBySiteId(
            string site_id
        )  {
            foreach (OrgSite item in GetOrgSiteListBySiteId(
            site_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListBySiteId(
            string site_id
        ) {
            return CachedGetOrgSiteListBySiteId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , site_id
                );
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListBySiteId(
            bool overrideCache
            , int cacheHours
            , string site_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgSiteListBySiteId(
                    site_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<OrgSite> GetOrgSiteListByOrgIdBySiteId(
            string org_id
            , string site_id
        )  {
            return act.GetOrgSiteListByOrgIdBySiteId(
            org_id
            , site_id
            );
        }
        
        public virtual OrgSite GetOrgSiteByOrgIdBySiteId(
            string org_id
            , string site_id
        )  {
            foreach (OrgSite item in GetOrgSiteListByOrgIdBySiteId(
            org_id
            , site_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListByOrgIdBySiteId(
            string org_id
            , string site_id
        ) {
            return CachedGetOrgSiteListByOrgIdBySiteId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , site_id
                );
        }
        
        public virtual List<OrgSite> CachedGetOrgSiteListByOrgIdBySiteId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string site_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetOrgSiteListByOrgIdBySiteId(
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
        public virtual int CountSiteAppByUuid(
            string uuid
        )  {            
            return act.CountSiteAppByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppByAppId(
            string app_id
        )  {            
            return act.CountSiteAppByAppId(
            app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppBySiteId(
            string site_id
        )  {            
            return act.CountSiteAppBySiteId(
            site_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppByAppIdBySiteId(
            string app_id
            , string site_id
        )  {            
            return act.CountSiteAppByAppIdBySiteId(
            app_id
            , site_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual SiteAppResult BrowseSiteAppListByFilter(SearchFilter obj)  {
            return act.BrowseSiteAppListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteAppByUuid(string set_type, SiteApp obj)  {
            return act.SetSiteAppByUuid(set_type, obj);
        }
        
        public virtual bool SetSiteAppByUuid(SetType set_type, SiteApp obj)  {
            return act.SetSiteAppByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteAppByUuid(SiteApp obj)  {
            return act.SetSiteAppByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteAppByAppIdBySiteId(string set_type, SiteApp obj)  {
            return act.SetSiteAppByAppIdBySiteId(set_type, obj);
        }
        
        public virtual bool SetSiteAppByAppIdBySiteId(SetType set_type, SiteApp obj)  {
            return act.SetSiteAppByAppIdBySiteId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetSiteAppByAppIdBySiteId(SiteApp obj)  {
            return act.SetSiteAppByAppIdBySiteId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteAppByUuid(
            string uuid
        )  {            
            return act.DelSiteAppByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteAppByAppIdBySiteId(
            string app_id
            , string site_id
        )  {            
            return act.DelSiteAppByAppIdBySiteId(
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
        public virtual List<SiteApp> GetSiteAppListByUuid(
            string uuid
        )  {
            return act.GetSiteAppListByUuid(
            uuid
            );
        }
        
        public virtual SiteApp GetSiteAppByUuid(
            string uuid
        )  {
            foreach (SiteApp item in GetSiteAppListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListByUuid(
            string uuid
        ) {
            return CachedGetSiteAppListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteAppListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<SiteApp> GetSiteAppListByAppId(
            string app_id
        )  {
            return act.GetSiteAppListByAppId(
            app_id
            );
        }
        
        public virtual SiteApp GetSiteAppByAppId(
            string app_id
        )  {
            foreach (SiteApp item in GetSiteAppListByAppId(
            app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListByAppId(
            string app_id
        ) {
            return CachedGetSiteAppListByAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , app_id
                );
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListByAppId(
            bool overrideCache
            , int cacheHours
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteAppListByAppId(
                    app_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<SiteApp> GetSiteAppListBySiteId(
            string site_id
        )  {
            return act.GetSiteAppListBySiteId(
            site_id
            );
        }
        
        public virtual SiteApp GetSiteAppBySiteId(
            string site_id
        )  {
            foreach (SiteApp item in GetSiteAppListBySiteId(
            site_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListBySiteId(
            string site_id
        ) {
            return CachedGetSiteAppListBySiteId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , site_id
                );
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListBySiteId(
            bool overrideCache
            , int cacheHours
            , string site_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteAppListBySiteId(
                    site_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<SiteApp> GetSiteAppListByAppIdBySiteId(
            string app_id
            , string site_id
        )  {
            return act.GetSiteAppListByAppIdBySiteId(
            app_id
            , site_id
            );
        }
        
        public virtual SiteApp GetSiteAppByAppIdBySiteId(
            string app_id
            , string site_id
        )  {
            foreach (SiteApp item in GetSiteAppListByAppIdBySiteId(
            app_id
            , site_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListByAppIdBySiteId(
            string app_id
            , string site_id
        ) {
            return CachedGetSiteAppListByAppIdBySiteId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , app_id
                    , site_id
                );
        }
        
        public virtual List<SiteApp> CachedGetSiteAppListByAppIdBySiteId(
            bool overrideCache
            , int cacheHours
            , string app_id
            , string site_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetSiteAppListByAppIdBySiteId(
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
        public virtual int CountPhotoByUuid(
            string uuid
        )  {            
            return act.CountPhotoByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoByExternalId(
            string external_id
        )  {            
            return act.CountPhotoByExternalId(
            external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoByUrl(
            string url
        )  {            
            return act.CountPhotoByUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return act.CountPhotoByUrlByExternalId(
            url
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return act.CountPhotoByUuidByExternalId(
            uuid
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual PhotoResult BrowsePhotoListByFilter(SearchFilter obj)  {
            return act.BrowsePhotoListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUuid(string set_type, Photo obj)  {
            return act.SetPhotoByUuid(set_type, obj);
        }
        
        public virtual bool SetPhotoByUuid(SetType set_type, Photo obj)  {
            return act.SetPhotoByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPhotoByUuid(Photo obj)  {
            return act.SetPhotoByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByExternalId(string set_type, Photo obj)  {
            return act.SetPhotoByExternalId(set_type, obj);
        }
        
        public virtual bool SetPhotoByExternalId(SetType set_type, Photo obj)  {
            return act.SetPhotoByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPhotoByExternalId(Photo obj)  {
            return act.SetPhotoByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUrl(string set_type, Photo obj)  {
            return act.SetPhotoByUrl(set_type, obj);
        }
        
        public virtual bool SetPhotoByUrl(SetType set_type, Photo obj)  {
            return act.SetPhotoByUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPhotoByUrl(Photo obj)  {
            return act.SetPhotoByUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUrlByExternalId(string set_type, Photo obj)  {
            return act.SetPhotoByUrlByExternalId(set_type, obj);
        }
        
        public virtual bool SetPhotoByUrlByExternalId(SetType set_type, Photo obj)  {
            return act.SetPhotoByUrlByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPhotoByUrlByExternalId(Photo obj)  {
            return act.SetPhotoByUrlByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUuidByExternalId(string set_type, Photo obj)  {
            return act.SetPhotoByUuidByExternalId(set_type, obj);
        }
        
        public virtual bool SetPhotoByUuidByExternalId(SetType set_type, Photo obj)  {
            return act.SetPhotoByUuidByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPhotoByUuidByExternalId(Photo obj)  {
            return act.SetPhotoByUuidByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoByUuid(
            string uuid
        )  {            
            return act.DelPhotoByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoByExternalId(
            string external_id
        )  {            
            return act.DelPhotoByExternalId(
            external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoByUrl(
            string url
        )  {            
            return act.DelPhotoByUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return act.DelPhotoByUrlByExternalId(
            url
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return act.DelPhotoByUuidByExternalId(
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
        public virtual List<Photo> GetPhotoListByUuid(
            string uuid
        )  {
            return act.GetPhotoListByUuid(
            uuid
            );
        }
        
        public virtual Photo GetPhotoByUuid(
            string uuid
        )  {
            foreach (Photo item in GetPhotoListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoListByUuid(
            string uuid
        ) {
            return CachedGetPhotoListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Photo> CachedGetPhotoListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Photo> GetPhotoListByExternalId(
            string external_id
        )  {
            return act.GetPhotoListByExternalId(
            external_id
            );
        }
        
        public virtual Photo GetPhotoByExternalId(
            string external_id
        )  {
            foreach (Photo item in GetPhotoListByExternalId(
            external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoListByExternalId(
            string external_id
        ) {
            return CachedGetPhotoListByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , external_id
                );
        }
        
        public virtual List<Photo> CachedGetPhotoListByExternalId(
            bool overrideCache
            , int cacheHours
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoListByExternalId(
                    external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Photo> GetPhotoListByUrl(
            string url
        )  {
            return act.GetPhotoListByUrl(
            url
            );
        }
        
        public virtual Photo GetPhotoByUrl(
            string url
        )  {
            foreach (Photo item in GetPhotoListByUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoListByUrl(
            string url
        ) {
            return CachedGetPhotoListByUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<Photo> CachedGetPhotoListByUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoListByUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Photo> GetPhotoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            return act.GetPhotoListByUrlByExternalId(
            url
            , external_id
            );
        }
        
        public virtual Photo GetPhotoByUrlByExternalId(
            string url
            , string external_id
        )  {
            foreach (Photo item in GetPhotoListByUrlByExternalId(
            url
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoListByUrlByExternalId(
            string url
            , string external_id
        ) {
            return CachedGetPhotoListByUrlByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , external_id
                );
        }
        
        public virtual List<Photo> CachedGetPhotoListByUrlByExternalId(
            bool overrideCache
            , int cacheHours
            , string url
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoListByUrlByExternalId(
                    url
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Photo> GetPhotoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            return act.GetPhotoListByUuidByExternalId(
            uuid
            , external_id
            );
        }
        
        public virtual Photo GetPhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            foreach (Photo item in GetPhotoListByUuidByExternalId(
            uuid
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Photo> CachedGetPhotoListByUuidByExternalId(
            string uuid
            , string external_id
        ) {
            return CachedGetPhotoListByUuidByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , external_id
                );
        }
        
        public virtual List<Photo> CachedGetPhotoListByUuidByExternalId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPhotoListByUuidByExternalId(
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
        public virtual int CountVideoByUuid(
            string uuid
        )  {            
            return act.CountVideoByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoByExternalId(
            string external_id
        )  {            
            return act.CountVideoByExternalId(
            external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoByUrl(
            string url
        )  {            
            return act.CountVideoByUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return act.CountVideoByUrlByExternalId(
            url
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return act.CountVideoByUuidByExternalId(
            uuid
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual VideoResult BrowseVideoListByFilter(SearchFilter obj)  {
            return act.BrowseVideoListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUuid(string set_type, Video obj)  {
            return act.SetVideoByUuid(set_type, obj);
        }
        
        public virtual bool SetVideoByUuid(SetType set_type, Video obj)  {
            return act.SetVideoByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetVideoByUuid(Video obj)  {
            return act.SetVideoByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByExternalId(string set_type, Video obj)  {
            return act.SetVideoByExternalId(set_type, obj);
        }
        
        public virtual bool SetVideoByExternalId(SetType set_type, Video obj)  {
            return act.SetVideoByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetVideoByExternalId(Video obj)  {
            return act.SetVideoByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUrl(string set_type, Video obj)  {
            return act.SetVideoByUrl(set_type, obj);
        }
        
        public virtual bool SetVideoByUrl(SetType set_type, Video obj)  {
            return act.SetVideoByUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetVideoByUrl(Video obj)  {
            return act.SetVideoByUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUrlByExternalId(string set_type, Video obj)  {
            return act.SetVideoByUrlByExternalId(set_type, obj);
        }
        
        public virtual bool SetVideoByUrlByExternalId(SetType set_type, Video obj)  {
            return act.SetVideoByUrlByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetVideoByUrlByExternalId(Video obj)  {
            return act.SetVideoByUrlByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUuidByExternalId(string set_type, Video obj)  {
            return act.SetVideoByUuidByExternalId(set_type, obj);
        }
        
        public virtual bool SetVideoByUuidByExternalId(SetType set_type, Video obj)  {
            return act.SetVideoByUuidByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetVideoByUuidByExternalId(Video obj)  {
            return act.SetVideoByUuidByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoByUuid(
            string uuid
        )  {            
            return act.DelVideoByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoByExternalId(
            string external_id
        )  {            
            return act.DelVideoByExternalId(
            external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoByUrl(
            string url
        )  {            
            return act.DelVideoByUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return act.DelVideoByUrlByExternalId(
            url
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return act.DelVideoByUuidByExternalId(
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
        public virtual List<Video> GetVideoListByUuid(
            string uuid
        )  {
            return act.GetVideoListByUuid(
            uuid
            );
        }
        
        public virtual Video GetVideoByUuid(
            string uuid
        )  {
            foreach (Video item in GetVideoListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoListByUuid(
            string uuid
        ) {
            return CachedGetVideoListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Video> CachedGetVideoListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Video> GetVideoListByExternalId(
            string external_id
        )  {
            return act.GetVideoListByExternalId(
            external_id
            );
        }
        
        public virtual Video GetVideoByExternalId(
            string external_id
        )  {
            foreach (Video item in GetVideoListByExternalId(
            external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoListByExternalId(
            string external_id
        ) {
            return CachedGetVideoListByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , external_id
                );
        }
        
        public virtual List<Video> CachedGetVideoListByExternalId(
            bool overrideCache
            , int cacheHours
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoListByExternalId(
                    external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Video> GetVideoListByUrl(
            string url
        )  {
            return act.GetVideoListByUrl(
            url
            );
        }
        
        public virtual Video GetVideoByUrl(
            string url
        )  {
            foreach (Video item in GetVideoListByUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoListByUrl(
            string url
        ) {
            return CachedGetVideoListByUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<Video> CachedGetVideoListByUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoListByUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Video> GetVideoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            return act.GetVideoListByUrlByExternalId(
            url
            , external_id
            );
        }
        
        public virtual Video GetVideoByUrlByExternalId(
            string url
            , string external_id
        )  {
            foreach (Video item in GetVideoListByUrlByExternalId(
            url
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoListByUrlByExternalId(
            string url
            , string external_id
        ) {
            return CachedGetVideoListByUrlByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , external_id
                );
        }
        
        public virtual List<Video> CachedGetVideoListByUrlByExternalId(
            bool overrideCache
            , int cacheHours
            , string url
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoListByUrlByExternalId(
                    url
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Video> GetVideoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            return act.GetVideoListByUuidByExternalId(
            uuid
            , external_id
            );
        }
        
        public virtual Video GetVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            foreach (Video item in GetVideoListByUuidByExternalId(
            uuid
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Video> CachedGetVideoListByUuidByExternalId(
            string uuid
            , string external_id
        ) {
            return CachedGetVideoListByUuidByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , external_id
                );
        }
        
        public virtual List<Video> CachedGetVideoListByUuidByExternalId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetVideoListByUuidByExternalId(
                    uuid
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
    }
}






