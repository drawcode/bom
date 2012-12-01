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
        public virtual int CountGame(
        )  {            
            return act.CountGame(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByUuid(
            string uuid
        )  {            
            return act.CountGameByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByCode(
            string code
        )  {            
            return act.CountGameByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByName(
            string name
        )  {            
            return act.CountGameByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByOrgId(
            string org_id
        )  {            
            return act.CountGameByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByAppId(
            string app_id
        )  {            
            return act.CountGameByAppId(
            app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByOrgIdByAppId(
            string org_id
            , string app_id
        )  {            
            return act.CountGameByOrgIdByAppId(
            org_id
            , app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameResult BrowseGameListByFilter(SearchFilter obj)  {
            return act.BrowseGameListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByUuid(string set_type, Game obj)  {
            return act.SetGameByUuid(set_type, obj);
        }
        
        public virtual bool SetGameByUuid(SetType set_type, Game obj)  {
            return act.SetGameByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameByUuid(Game obj)  {
            return act.SetGameByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByCode(string set_type, Game obj)  {
            return act.SetGameByCode(set_type, obj);
        }
        
        public virtual bool SetGameByCode(SetType set_type, Game obj)  {
            return act.SetGameByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameByCode(Game obj)  {
            return act.SetGameByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByName(string set_type, Game obj)  {
            return act.SetGameByName(set_type, obj);
        }
        
        public virtual bool SetGameByName(SetType set_type, Game obj)  {
            return act.SetGameByName(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameByName(Game obj)  {
            return act.SetGameByName(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByOrgId(string set_type, Game obj)  {
            return act.SetGameByOrgId(set_type, obj);
        }
        
        public virtual bool SetGameByOrgId(SetType set_type, Game obj)  {
            return act.SetGameByOrgId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameByOrgId(Game obj)  {
            return act.SetGameByOrgId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByAppId(string set_type, Game obj)  {
            return act.SetGameByAppId(set_type, obj);
        }
        
        public virtual bool SetGameByAppId(SetType set_type, Game obj)  {
            return act.SetGameByAppId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameByAppId(Game obj)  {
            return act.SetGameByAppId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByOrgIdByAppId(string set_type, Game obj)  {
            return act.SetGameByOrgIdByAppId(set_type, obj);
        }
        
        public virtual bool SetGameByOrgIdByAppId(SetType set_type, Game obj)  {
            return act.SetGameByOrgIdByAppId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameByOrgIdByAppId(Game obj)  {
            return act.SetGameByOrgIdByAppId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameByUuid(
            string uuid
        )  {            
            return act.DelGameByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameByCode(
            string code
        )  {            
            return act.DelGameByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameByName(
            string name
        )  {            
            return act.DelGameByName(
            name
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameByOrgId(
            string org_id
        )  {            
            return act.DelGameByOrgId(
            org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameByAppId(
            string app_id
        )  {            
            return act.DelGameByAppId(
            app_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameByOrgIdByAppId(
            string org_id
            , string app_id
        )  {            
            return act.DelGameByOrgIdByAppId(
            org_id
            , app_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameList(
        )  {
            return act.GetGameList(
            );
        }
        
        public virtual Game GetGame(
        )  {
            foreach (Game item in GetGameList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameList(
        ) {
            return CachedGetGameList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<Game> CachedGetGameList(
            bool overrideCache
            , int cacheHours
        ) {
            List<Game> objs;

            string method_name = "CachedGetGameList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Game>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListByUuid(
            string uuid
        )  {
            return act.GetGameListByUuid(
            uuid
            );
        }
        
        public virtual Game GetGameByUuid(
            string uuid
        )  {
            foreach (Game item in GetGameListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListByUuid(
            string uuid
        ) {
            return CachedGetGameListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Game> CachedGetGameListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListByCode(
            string code
        )  {
            return act.GetGameListByCode(
            code
            );
        }
        
        public virtual Game GetGameByCode(
            string code
        )  {
            foreach (Game item in GetGameListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListByCode(
            string code
        ) {
            return CachedGetGameListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Game> CachedGetGameListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListByName(
            string name
        )  {
            return act.GetGameListByName(
            name
            );
        }
        
        public virtual Game GetGameByName(
            string name
        )  {
            foreach (Game item in GetGameListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListByName(
            string name
        ) {
            return CachedGetGameListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Game> CachedGetGameListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListByOrgId(
            string org_id
        )  {
            return act.GetGameListByOrgId(
            org_id
            );
        }
        
        public virtual Game GetGameByOrgId(
            string org_id
        )  {
            foreach (Game item in GetGameListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListByOrgId(
            string org_id
        ) {
            return CachedGetGameListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<Game> CachedGetGameListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListByAppId(
            string app_id
        )  {
            return act.GetGameListByAppId(
            app_id
            );
        }
        
        public virtual Game GetGameByAppId(
            string app_id
        )  {
            foreach (Game item in GetGameListByAppId(
            app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListByAppId(
            string app_id
        ) {
            return CachedGetGameListByAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , app_id
                );
        }
        
        public virtual List<Game> CachedGetGameListByAppId(
            bool overrideCache
            , int cacheHours
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListByAppId(
                    app_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListByOrgIdByAppId(
            string org_id
            , string app_id
        )  {
            return act.GetGameListByOrgIdByAppId(
            org_id
            , app_id
            );
        }
        
        public virtual Game GetGameByOrgIdByAppId(
            string org_id
            , string app_id
        )  {
            foreach (Game item in GetGameListByOrgIdByAppId(
            org_id
            , app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListByOrgIdByAppId(
            string org_id
            , string app_id
        ) {
            return CachedGetGameListByOrgIdByAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , app_id
                );
        }
        
        public virtual List<Game> CachedGetGameListByOrgIdByAppId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListByOrgIdByAppId(
                    org_id
                    , app_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategory(
        )  {            
            return act.CountGameCategory(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByUuid(
            string uuid
        )  {            
            return act.CountGameCategoryByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByCode(
            string code
        )  {            
            return act.CountGameCategoryByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByName(
            string name
        )  {            
            return act.CountGameCategoryByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByOrgId(
            string org_id
        )  {            
            return act.CountGameCategoryByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByTypeId(
            string type_id
        )  {            
            return act.CountGameCategoryByTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {            
            return act.CountGameCategoryByOrgIdByTypeId(
            org_id
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameCategoryResult BrowseGameCategoryListByFilter(SearchFilter obj)  {
            return act.BrowseGameCategoryListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryByUuid(string set_type, GameCategory obj)  {
            return act.SetGameCategoryByUuid(set_type, obj);
        }
        
        public virtual bool SetGameCategoryByUuid(SetType set_type, GameCategory obj)  {
            return act.SetGameCategoryByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameCategoryByUuid(GameCategory obj)  {
            return act.SetGameCategoryByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryByUuid(
            string uuid
        )  {            
            return act.DelGameCategoryByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryByCodeByOrgId(
            string code
            , string org_id
        )  {            
            return act.DelGameCategoryByCodeByOrgId(
            code
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {            
            return act.DelGameCategoryByCodeByOrgIdByTypeId(
            code
            , org_id
            , type_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryList(
        )  {
            return act.GetGameCategoryList(
            );
        }
        
        public virtual GameCategory GetGameCategory(
        )  {
            foreach (GameCategory item in GetGameCategoryList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryList(
        ) {
            return CachedGetGameCategoryList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameCategory> objs;

            string method_name = "CachedGetGameCategoryList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameCategory>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListByUuid(
            string uuid
        )  {
            return act.GetGameCategoryListByUuid(
            uuid
            );
        }
        
        public virtual GameCategory GetGameCategoryByUuid(
            string uuid
        )  {
            foreach (GameCategory item in GetGameCategoryListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByUuid(
            string uuid
        ) {
            return CachedGetGameCategoryListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListByCode(
            string code
        )  {
            return act.GetGameCategoryListByCode(
            code
            );
        }
        
        public virtual GameCategory GetGameCategoryByCode(
            string code
        )  {
            foreach (GameCategory item in GetGameCategoryListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByCode(
            string code
        ) {
            return CachedGetGameCategoryListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListByName(
            string name
        )  {
            return act.GetGameCategoryListByName(
            name
            );
        }
        
        public virtual GameCategory GetGameCategoryByName(
            string name
        )  {
            foreach (GameCategory item in GetGameCategoryListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByName(
            string name
        ) {
            return CachedGetGameCategoryListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListByOrgId(
            string org_id
        )  {
            return act.GetGameCategoryListByOrgId(
            org_id
            );
        }
        
        public virtual GameCategory GetGameCategoryByOrgId(
            string org_id
        )  {
            foreach (GameCategory item in GetGameCategoryListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByOrgId(
            string org_id
        ) {
            return CachedGetGameCategoryListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListByTypeId(
            string type_id
        )  {
            return act.GetGameCategoryListByTypeId(
            type_id
            );
        }
        
        public virtual GameCategory GetGameCategoryByTypeId(
            string type_id
        )  {
            foreach (GameCategory item in GetGameCategoryListByTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByTypeId(
            string type_id
        ) {
            return CachedGetGameCategoryListByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListByTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            return act.GetGameCategoryListByOrgIdByTypeId(
            org_id
            , type_id
            );
        }
        
        public virtual GameCategory GetGameCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            foreach (GameCategory item in GetGameCategoryListByOrgIdByTypeId(
            org_id
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        ) {
            return CachedGetGameCategoryListByOrgIdByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , type_id
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListByOrgIdByTypeId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListByOrgIdByTypeId(
                    org_id
                    , type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTree(
        )  {            
            return act.CountGameCategoryTree(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeByUuid(
            string uuid
        )  {            
            return act.CountGameCategoryTreeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeByParentId(
            string parent_id
        )  {            
            return act.CountGameCategoryTreeByParentId(
            parent_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeByCategoryId(
            string category_id
        )  {            
            return act.CountGameCategoryTreeByCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.CountGameCategoryTreeByParentIdByCategoryId(
            parent_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameCategoryTreeResult BrowseGameCategoryTreeListByFilter(SearchFilter obj)  {
            return act.BrowseGameCategoryTreeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryTreeByUuid(string set_type, GameCategoryTree obj)  {
            return act.SetGameCategoryTreeByUuid(set_type, obj);
        }
        
        public virtual bool SetGameCategoryTreeByUuid(SetType set_type, GameCategoryTree obj)  {
            return act.SetGameCategoryTreeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameCategoryTreeByUuid(GameCategoryTree obj)  {
            return act.SetGameCategoryTreeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeByUuid(
            string uuid
        )  {            
            return act.DelGameCategoryTreeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeByParentId(
            string parent_id
        )  {            
            return act.DelGameCategoryTreeByParentId(
            parent_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeByCategoryId(
            string category_id
        )  {            
            return act.DelGameCategoryTreeByCategoryId(
            category_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.DelGameCategoryTreeByParentIdByCategoryId(
            parent_id
            , category_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryTree> GetGameCategoryTreeList(
        )  {
            return act.GetGameCategoryTreeList(
            );
        }
        
        public virtual GameCategoryTree GetGameCategoryTree(
        )  {
            foreach (GameCategoryTree item in GetGameCategoryTreeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeList(
        ) {
            return CachedGetGameCategoryTreeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameCategoryTree> objs;

            string method_name = "CachedGetGameCategoryTreeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameCategoryTree>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryTreeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByUuid(
            string uuid
        )  {
            return act.GetGameCategoryTreeListByUuid(
            uuid
            );
        }
        
        public virtual GameCategoryTree GetGameCategoryTreeByUuid(
            string uuid
        )  {
            foreach (GameCategoryTree item in GetGameCategoryTreeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListByUuid(
            string uuid
        ) {
            return CachedGetGameCategoryTreeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryTreeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByParentId(
            string parent_id
        )  {
            return act.GetGameCategoryTreeListByParentId(
            parent_id
            );
        }
        
        public virtual GameCategoryTree GetGameCategoryTreeByParentId(
            string parent_id
        )  {
            foreach (GameCategoryTree item in GetGameCategoryTreeListByParentId(
            parent_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListByParentId(
            string parent_id
        ) {
            return CachedGetGameCategoryTreeListByParentId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                );
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListByParentId(
            bool overrideCache
            , int cacheHours
            , string parent_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryTreeListByParentId(
                    parent_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByCategoryId(
            string category_id
        )  {
            return act.GetGameCategoryTreeListByCategoryId(
            category_id
            );
        }
        
        public virtual GameCategoryTree GetGameCategoryTreeByCategoryId(
            string category_id
        )  {
            foreach (GameCategoryTree item in GetGameCategoryTreeListByCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListByCategoryId(
            string category_id
        ) {
            return CachedGetGameCategoryTreeListByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListByCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryTreeListByCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            return act.GetGameCategoryTreeListByParentIdByCategoryId(
            parent_id
            , category_id
            );
        }
        
        public virtual GameCategoryTree GetGameCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            foreach (GameCategoryTree item in GetGameCategoryTreeListByParentIdByCategoryId(
            parent_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        ) {
            return CachedGetGameCategoryTreeListByParentIdByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                    , category_id
                );
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListByParentIdByCategoryId(
            bool overrideCache
            , int cacheHours
            , string parent_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryTreeListByParentIdByCategoryId(
                    parent_id
                    , category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssoc(
        )  {            
            return act.CountGameCategoryAssoc(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocByUuid(
            string uuid
        )  {            
            return act.CountGameCategoryAssocByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocByGameId(
            string game_id
        )  {            
            return act.CountGameCategoryAssocByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocByCategoryId(
            string category_id
        )  {            
            return act.CountGameCategoryAssocByCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocByGameIdByCategoryId(
            string game_id
            , string category_id
        )  {            
            return act.CountGameCategoryAssocByGameIdByCategoryId(
            game_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameCategoryAssocResult BrowseGameCategoryAssocListByFilter(SearchFilter obj)  {
            return act.BrowseGameCategoryAssocListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryAssocByUuid(string set_type, GameCategoryAssoc obj)  {
            return act.SetGameCategoryAssocByUuid(set_type, obj);
        }
        
        public virtual bool SetGameCategoryAssocByUuid(SetType set_type, GameCategoryAssoc obj)  {
            return act.SetGameCategoryAssocByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameCategoryAssocByUuid(GameCategoryAssoc obj)  {
            return act.SetGameCategoryAssocByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryAssocByUuid(
            string uuid
        )  {            
            return act.DelGameCategoryAssocByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocList(
        )  {
            return act.GetGameCategoryAssocList(
            );
        }
        
        public virtual GameCategoryAssoc GetGameCategoryAssoc(
        )  {
            foreach (GameCategoryAssoc item in GetGameCategoryAssocList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocList(
        ) {
            return CachedGetGameCategoryAssocList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameCategoryAssoc> objs;

            string method_name = "CachedGetGameCategoryAssocList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameCategoryAssoc>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryAssocList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByUuid(
            string uuid
        )  {
            return act.GetGameCategoryAssocListByUuid(
            uuid
            );
        }
        
        public virtual GameCategoryAssoc GetGameCategoryAssocByUuid(
            string uuid
        )  {
            foreach (GameCategoryAssoc item in GetGameCategoryAssocListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListByUuid(
            string uuid
        ) {
            return CachedGetGameCategoryAssocListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryAssocListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByGameId(
            string game_id
        )  {
            return act.GetGameCategoryAssocListByGameId(
            game_id
            );
        }
        
        public virtual GameCategoryAssoc GetGameCategoryAssocByGameId(
            string game_id
        )  {
            foreach (GameCategoryAssoc item in GetGameCategoryAssocListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListByGameId(
            string game_id
        ) {
            return CachedGetGameCategoryAssocListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryAssocListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByCategoryId(
            string category_id
        )  {
            return act.GetGameCategoryAssocListByCategoryId(
            category_id
            );
        }
        
        public virtual GameCategoryAssoc GetGameCategoryAssocByCategoryId(
            string category_id
        )  {
            foreach (GameCategoryAssoc item in GetGameCategoryAssocListByCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListByCategoryId(
            string category_id
        ) {
            return CachedGetGameCategoryAssocListByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListByCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryAssocListByCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByGameIdByCategoryId(
            string game_id
            , string category_id
        )  {
            return act.GetGameCategoryAssocListByGameIdByCategoryId(
            game_id
            , category_id
            );
        }
        
        public virtual GameCategoryAssoc GetGameCategoryAssocByGameIdByCategoryId(
            string game_id
            , string category_id
        )  {
            foreach (GameCategoryAssoc item in GetGameCategoryAssocListByGameIdByCategoryId(
            game_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListByGameIdByCategoryId(
            string game_id
            , string category_id
        ) {
            return CachedGetGameCategoryAssocListByGameIdByCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , category_id
                );
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListByGameIdByCategoryId(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryAssocListByGameIdByCategoryId(
                    game_id
                    , category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameType(
        )  {            
            return act.CountGameType(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameTypeByUuid(
            string uuid
        )  {            
            return act.CountGameTypeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameTypeByCode(
            string code
        )  {            
            return act.CountGameTypeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameTypeByName(
            string name
        )  {            
            return act.CountGameTypeByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameTypeResult BrowseGameTypeListByFilter(SearchFilter obj)  {
            return act.BrowseGameTypeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameTypeByUuid(string set_type, GameType obj)  {
            return act.SetGameTypeByUuid(set_type, obj);
        }
        
        public virtual bool SetGameTypeByUuid(SetType set_type, GameType obj)  {
            return act.SetGameTypeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameTypeByUuid(GameType obj)  {
            return act.SetGameTypeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameTypeByUuid(
            string uuid
        )  {            
            return act.DelGameTypeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameType> GetGameTypeList(
        )  {
            return act.GetGameTypeList(
            );
        }
        
        public virtual GameType GetGameType(
        )  {
            foreach (GameType item in GetGameTypeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameType> CachedGetGameTypeList(
        ) {
            return CachedGetGameTypeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameType> CachedGetGameTypeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameType> objs;

            string method_name = "CachedGetGameTypeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameType>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameTypeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameType> GetGameTypeListByUuid(
            string uuid
        )  {
            return act.GetGameTypeListByUuid(
            uuid
            );
        }
        
        public virtual GameType GetGameTypeByUuid(
            string uuid
        )  {
            foreach (GameType item in GetGameTypeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameType> CachedGetGameTypeListByUuid(
            string uuid
        ) {
            return CachedGetGameTypeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameType> CachedGetGameTypeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameTypeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameType> GetGameTypeListByCode(
            string code
        )  {
            return act.GetGameTypeListByCode(
            code
            );
        }
        
        public virtual GameType GetGameTypeByCode(
            string code
        )  {
            foreach (GameType item in GetGameTypeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameType> CachedGetGameTypeListByCode(
            string code
        ) {
            return CachedGetGameTypeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameType> CachedGetGameTypeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameTypeListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameType> GetGameTypeListByName(
            string name
        )  {
            return act.GetGameTypeListByName(
            name
            );
        }
        
        public virtual GameType GetGameTypeByName(
            string name
        )  {
            foreach (GameType item in GetGameTypeListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameType> CachedGetGameTypeListByName(
            string name
        ) {
            return CachedGetGameTypeListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameType> CachedGetGameTypeListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameTypeListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGame(
        )  {            
            return act.CountProfileGame(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameByUuid(
            string uuid
        )  {            
            return act.CountProfileGameByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameByGameId(
            string game_id
        )  {            
            return act.CountProfileGameByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameByProfileId(
            string profile_id
        )  {            
            return act.CountProfileGameByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountProfileGameByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileGameResult BrowseProfileGameListByFilter(SearchFilter obj)  {
            return act.BrowseProfileGameListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameByUuid(string set_type, ProfileGame obj)  {
            return act.SetProfileGameByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileGameByUuid(SetType set_type, ProfileGame obj)  {
            return act.SetProfileGameByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameByUuid(ProfileGame obj)  {
            return act.SetProfileGameByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameByUuid(
            string uuid
        )  {            
            return act.DelProfileGameByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGame> GetProfileGameList(
        )  {
            return act.GetProfileGameList(
            );
        }
        
        public virtual ProfileGame GetProfileGame(
        )  {
            foreach (ProfileGame item in GetProfileGameList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameList(
        ) {
            return CachedGetProfileGameList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ProfileGame> objs;

            string method_name = "CachedGetProfileGameList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileGame>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGame> GetProfileGameListByUuid(
            string uuid
        )  {
            return act.GetProfileGameListByUuid(
            uuid
            );
        }
        
        public virtual ProfileGame GetProfileGameByUuid(
            string uuid
        )  {
            foreach (ProfileGame item in GetProfileGameListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListByUuid(
            string uuid
        ) {
            return CachedGetProfileGameListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGame> GetProfileGameListByGameId(
            string game_id
        )  {
            return act.GetProfileGameListByGameId(
            game_id
            );
        }
        
        public virtual ProfileGame GetProfileGameByGameId(
            string game_id
        )  {
            foreach (ProfileGame item in GetProfileGameListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListByGameId(
            string game_id
        ) {
            return CachedGetProfileGameListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGame> GetProfileGameListByProfileId(
            string profile_id
        )  {
            return act.GetProfileGameListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileGame GetProfileGameByProfileId(
            string profile_id
        )  {
            foreach (ProfileGame item in GetProfileGameListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileGameListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGame> GetProfileGameListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetProfileGameListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual ProfileGame GetProfileGameByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (ProfileGame item in GetProfileGameListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetProfileGameListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetwork(
        )  {            
            return act.CountProfileGameNetwork(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkByUuid(
            string uuid
        )  {            
            return act.CountProfileGameNetworkByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkByGameId(
            string game_id
        )  {            
            return act.CountProfileGameNetworkByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkByProfileId(
            string profile_id
        )  {            
            return act.CountProfileGameNetworkByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountProfileGameNetworkByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileGameNetworkResult BrowseProfileGameNetworkListByFilter(SearchFilter obj)  {
            return act.BrowseProfileGameNetworkListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkByUuid(string set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileGameNetworkByUuid(SetType set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameNetworkByUuid(ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkByUuid(
            string uuid
        )  {            
            return act.DelProfileGameNetworkByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkList(
        )  {
            return act.GetProfileGameNetworkList(
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetwork(
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkList(
        ) {
            return CachedGetProfileGameNetworkList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ProfileGameNetwork> objs;

            string method_name = "CachedGetProfileGameNetworkList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileGameNetwork>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByUuid(
            string uuid
        )  {
            return act.GetProfileGameNetworkListByUuid(
            uuid
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkByUuid(
            string uuid
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByUuid(
            string uuid
        ) {
            return CachedGetProfileGameNetworkListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByGameId(
            string game_id
        )  {
            return act.GetProfileGameNetworkListByGameId(
            game_id
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkByGameId(
            string game_id
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByGameId(
            string game_id
        ) {
            return CachedGetProfileGameNetworkListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByProfileId(
            string profile_id
        )  {
            return act.GetProfileGameNetworkListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkByProfileId(
            string profile_id
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileGameNetworkListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetProfileGameNetworkListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetProfileGameNetworkListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttribute(
        )  {            
            return act.CountProfileGameDataAttribute(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttributeByUuid(
            string uuid
        )  {            
            return act.CountProfileGameDataAttributeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttributeByProfileId(
            string profile_id
        )  {            
            return act.CountProfileGameDataAttributeByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttributeByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {            
            return act.CountProfileGameDataAttributeByProfileIdByGameIdByCode(
            profile_id
            , game_id
            , code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileGameDataAttributeResult BrowseProfileGameDataAttributeListByFilter(SearchFilter obj)  {
            return act.BrowseProfileGameDataAttributeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeByUuid(string set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileGameDataAttributeByUuid(SetType set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameDataAttributeByUuid(ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeByProfileId(string set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeByProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileGameDataAttributeByProfileId(SetType set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameDataAttributeByProfileId(ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeByProfileIdByGameIdByCode(string set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeByProfileIdByGameIdByCode(set_type, obj);
        }
        
        public virtual bool SetProfileGameDataAttributeByProfileIdByGameIdByCode(SetType set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeByProfileIdByGameIdByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameDataAttributeByProfileIdByGameIdByCode(ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeByProfileIdByGameIdByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameDataAttributeByUuid(
            string uuid
        )  {            
            return act.DelProfileGameDataAttributeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameDataAttributeByProfileId(
            string profile_id
        )  {            
            return act.DelProfileGameDataAttributeByProfileId(
            profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameDataAttributeByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {            
            return act.DelProfileGameDataAttributeByProfileIdByGameIdByCode(
            profile_id
            , game_id
            , code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListByUuid(
            string uuid
        )  {
            return act.GetProfileGameDataAttributeListByUuid(
            uuid
            );
        }
        
        public virtual ProfileGameDataAttribute GetProfileGameDataAttributeByUuid(
            string uuid
        )  {
            foreach (ProfileGameDataAttribute item in GetProfileGameDataAttributeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListByUuid(
            string uuid
        ) {
            return CachedGetProfileGameDataAttributeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameDataAttributeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListByProfileId(
            string profile_id
        )  {
            return act.GetProfileGameDataAttributeListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileGameDataAttribute GetProfileGameDataAttributeByProfileId(
            string profile_id
        )  {
            foreach (ProfileGameDataAttribute item in GetProfileGameDataAttributeListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileGameDataAttributeListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameDataAttributeListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {
            return act.GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            profile_id
            , game_id
            , code
            );
        }
        
        public virtual ProfileGameDataAttribute GetProfileGameDataAttributeByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {
            foreach (ProfileGameDataAttribute item in GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            profile_id
            , game_id
            , code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        ) {
            return CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , code
                );
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
                    profile_id
                    , game_id
                    , code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameSession(
        )  {            
            return act.CountGameSession(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionByUuid(
            string uuid
        )  {            
            return act.CountGameSessionByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionByGameId(
            string game_id
        )  {            
            return act.CountGameSessionByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionByProfileId(
            string profile_id
        )  {            
            return act.CountGameSessionByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameSessionByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameSessionResult BrowseGameSessionListByFilter(SearchFilter obj)  {
            return act.BrowseGameSessionListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameSessionByUuid(string set_type, GameSession obj)  {
            return act.SetGameSessionByUuid(set_type, obj);
        }
        
        public virtual bool SetGameSessionByUuid(SetType set_type, GameSession obj)  {
            return act.SetGameSessionByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameSessionByUuid(GameSession obj)  {
            return act.SetGameSessionByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameSessionByUuid(
            string uuid
        )  {            
            return act.DelGameSessionByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameSession> GetGameSessionList(
        )  {
            return act.GetGameSessionList(
            );
        }
        
        public virtual GameSession GetGameSession(
        )  {
            foreach (GameSession item in GetGameSessionList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSession> CachedGetGameSessionList(
        ) {
            return CachedGetGameSessionList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameSession> CachedGetGameSessionList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameSession> objs;

            string method_name = "CachedGetGameSessionList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameSession>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameSession> GetGameSessionListByUuid(
            string uuid
        )  {
            return act.GetGameSessionListByUuid(
            uuid
            );
        }
        
        public virtual GameSession GetGameSessionByUuid(
            string uuid
        )  {
            foreach (GameSession item in GetGameSessionListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSession> CachedGetGameSessionListByUuid(
            string uuid
        ) {
            return CachedGetGameSessionListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameSession> CachedGetGameSessionListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameSession> GetGameSessionListByGameId(
            string game_id
        )  {
            return act.GetGameSessionListByGameId(
            game_id
            );
        }
        
        public virtual GameSession GetGameSessionByGameId(
            string game_id
        )  {
            foreach (GameSession item in GetGameSessionListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSession> CachedGetGameSessionListByGameId(
            string game_id
        ) {
            return CachedGetGameSessionListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameSession> CachedGetGameSessionListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameSession> GetGameSessionListByProfileId(
            string profile_id
        )  {
            return act.GetGameSessionListByProfileId(
            profile_id
            );
        }
        
        public virtual GameSession GetGameSessionByProfileId(
            string profile_id
        )  {
            foreach (GameSession item in GetGameSessionListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSession> CachedGetGameSessionListByProfileId(
            string profile_id
        ) {
            return CachedGetGameSessionListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<GameSession> CachedGetGameSessionListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameSession> GetGameSessionListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameSessionListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameSession GetGameSessionByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameSession item in GetGameSessionListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSession> CachedGetGameSessionListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameSessionListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameSession> CachedGetGameSessionListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionData(
        )  {            
            return act.CountGameSessionData(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionDataByUuid(
            string uuid
        )  {            
            return act.CountGameSessionDataByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameSessionDataResult BrowseGameSessionDataListByFilter(SearchFilter obj)  {
            return act.BrowseGameSessionDataListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameSessionDataByUuid(string set_type, GameSessionData obj)  {
            return act.SetGameSessionDataByUuid(set_type, obj);
        }
        
        public virtual bool SetGameSessionDataByUuid(SetType set_type, GameSessionData obj)  {
            return act.SetGameSessionDataByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameSessionDataByUuid(GameSessionData obj)  {
            return act.SetGameSessionDataByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameSessionDataByUuid(
            string uuid
        )  {            
            return act.DelGameSessionDataByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameSessionData> GetGameSessionDataList(
        )  {
            return act.GetGameSessionDataList(
            );
        }
        
        public virtual GameSessionData GetGameSessionData(
        )  {
            foreach (GameSessionData item in GetGameSessionDataList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSessionData> CachedGetGameSessionDataList(
        ) {
            return CachedGetGameSessionDataList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameSessionData> CachedGetGameSessionDataList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameSessionData> objs;

            string method_name = "CachedGetGameSessionDataList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameSessionData>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionDataList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameSessionData> GetGameSessionDataListByUuid(
            string uuid
        )  {
            return act.GetGameSessionDataListByUuid(
            uuid
            );
        }
        
        public virtual GameSessionData GetGameSessionDataByUuid(
            string uuid
        )  {
            foreach (GameSessionData item in GetGameSessionDataListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSessionData> CachedGetGameSessionDataListByUuid(
            string uuid
        ) {
            return CachedGetGameSessionDataListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameSessionData> CachedGetGameSessionDataListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionDataListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameContent(
        )  {            
            return act.CountGameContent(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentByUuid(
            string uuid
        )  {            
            return act.CountGameContentByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentByGameId(
            string game_id
        )  {            
            return act.CountGameContentByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentByGameIdByPath(
            string game_id
            , string path
        )  {            
            return act.CountGameContentByGameIdByPath(
            game_id
            , path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {            
            return act.CountGameContentByGameIdByPathByVersion(
            game_id
            , path
            , version
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
            game_id
            , path
            , version
            , platform
            , increment
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameContentResult BrowseGameContentListByFilter(SearchFilter obj)  {
            return act.BrowseGameContentListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByUuid(string set_type, GameContent obj)  {
            return act.SetGameContentByUuid(set_type, obj);
        }
        
        public virtual bool SetGameContentByUuid(SetType set_type, GameContent obj)  {
            return act.SetGameContentByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameContentByUuid(GameContent obj)  {
            return act.SetGameContentByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameId(string set_type, GameContent obj)  {
            return act.SetGameContentByGameId(set_type, obj);
        }
        
        public virtual bool SetGameContentByGameId(SetType set_type, GameContent obj)  {
            return act.SetGameContentByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameContentByGameId(GameContent obj)  {
            return act.SetGameContentByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameIdByPath(string set_type, GameContent obj)  {
            return act.SetGameContentByGameIdByPath(set_type, obj);
        }
        
        public virtual bool SetGameContentByGameIdByPath(SetType set_type, GameContent obj)  {
            return act.SetGameContentByGameIdByPath(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameContentByGameIdByPath(GameContent obj)  {
            return act.SetGameContentByGameIdByPath(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameIdByPathByVersion(string set_type, GameContent obj)  {
            return act.SetGameContentByGameIdByPathByVersion(set_type, obj);
        }
        
        public virtual bool SetGameContentByGameIdByPathByVersion(SetType set_type, GameContent obj)  {
            return act.SetGameContentByGameIdByPathByVersion(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameContentByGameIdByPathByVersion(GameContent obj)  {
            return act.SetGameContentByGameIdByPathByVersion(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameIdByPathByVersionByPlatformByIncrement(string set_type, GameContent obj)  {
            return act.SetGameContentByGameIdByPathByVersionByPlatformByIncrement(set_type, obj);
        }
        
        public virtual bool SetGameContentByGameIdByPathByVersionByPlatformByIncrement(SetType set_type, GameContent obj)  {
            return act.SetGameContentByGameIdByPathByVersionByPlatformByIncrement(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameContentByGameIdByPathByVersionByPlatformByIncrement(GameContent obj)  {
            return act.SetGameContentByGameIdByPathByVersionByPlatformByIncrement(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentByUuid(
            string uuid
        )  {            
            return act.DelGameContentByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentByGameId(
            string game_id
        )  {            
            return act.DelGameContentByGameId(
            game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentByGameIdByPath(
            string game_id
            , string path
        )  {            
            return act.DelGameContentByGameIdByPath(
            game_id
            , path
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {            
            return act.DelGameContentByGameIdByPathByVersion(
            game_id
            , path
            , version
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
            game_id
            , path
            , version
            , platform
            , increment
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameContent> GetGameContentList(
        )  {
            return act.GetGameContentList(
            );
        }
        
        public virtual GameContent GetGameContent(
        )  {
            foreach (GameContent item in GetGameContentList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameContent> CachedGetGameContentList(
        ) {
            return CachedGetGameContentList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameContent> objs;

            string method_name = "CachedGetGameContentList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameContent>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameContentList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameContent> GetGameContentListByUuid(
            string uuid
        )  {
            return act.GetGameContentListByUuid(
            uuid
            );
        }
        
        public virtual GameContent GetGameContentByUuid(
            string uuid
        )  {
            foreach (GameContent item in GetGameContentListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameContent> CachedGetGameContentListByUuid(
            string uuid
        ) {
            return CachedGetGameContentListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameContentListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameContent> GetGameContentListByGameId(
            string game_id
        )  {
            return act.GetGameContentListByGameId(
            game_id
            );
        }
        
        public virtual GameContent GetGameContentByGameId(
            string game_id
        )  {
            foreach (GameContent item in GetGameContentListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameContent> CachedGetGameContentListByGameId(
            string game_id
        ) {
            return CachedGetGameContentListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameContentListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameContent> GetGameContentListByGameIdByPath(
            string game_id
            , string path
        )  {
            return act.GetGameContentListByGameIdByPath(
            game_id
            , path
            );
        }
        
        public virtual GameContent GetGameContentByGameIdByPath(
            string game_id
            , string path
        )  {
            foreach (GameContent item in GetGameContentListByGameIdByPath(
            game_id
            , path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameContent> CachedGetGameContentListByGameIdByPath(
            string game_id
            , string path
        ) {
            return CachedGetGameContentListByGameIdByPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , path
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentListByGameIdByPath(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameContentListByGameIdByPath(
                    game_id
                    , path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameContent> GetGameContentListByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {
            return act.GetGameContentListByGameIdByPathByVersion(
            game_id
            , path
            , version
            );
        }
        
        public virtual GameContent GetGameContentByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {
            foreach (GameContent item in GetGameContentListByGameIdByPathByVersion(
            game_id
            , path
            , version
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameContent> CachedGetGameContentListByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        ) {
            return CachedGetGameContentListByGameIdByPathByVersion(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , path
                    , version
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentListByGameIdByPathByVersion(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string path
            , string version
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameContentListByGameIdByPathByVersion(
                    game_id
                    , path
                    , version
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameContent> GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return act.GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
            game_id
            , path
            , version
            , platform
            , increment
            );
        }
        
        public virtual GameContent GetGameContentByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            foreach (GameContent item in GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
            game_id
            , path
            , version
            , platform
            , increment
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameContent> CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        ) {
            return CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , path
                    , version
                    , platform
                    , increment
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string path
            , string version
            , string platform
            , int increment
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContent(
        )  {            
            return act.CountGameProfileContent(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByUuid(
            string uuid
        )  {            
            return act.CountGameProfileContentByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {            
            return act.CountGameProfileContentByGameIdByProfileId(
            game_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByUsername(
            string game_id
            , string username
        )  {            
            return act.CountGameProfileContentByGameIdByUsername(
            game_id
            , username
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByUsername(
            string username
        )  {            
            return act.CountGameProfileContentByUsername(
            username
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {            
            return act.CountGameProfileContentByGameIdByProfileIdByPath(
            game_id
            , profile_id
            , path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {            
            return act.CountGameProfileContentByGameIdByProfileIdByPathByVersion(
            game_id
            , profile_id
            , path
            , version
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {            
            return act.CountGameProfileContentByGameIdByUsernameByPath(
            game_id
            , username
            , path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {            
            return act.CountGameProfileContentByGameIdByUsernameByPathByVersion(
            game_id
            , username
            , path
            , version
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            game_id
            , username
            , path
            , version
            , platform
            , increment
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProfileContentResult BrowseGameProfileContentListByFilter(SearchFilter obj)  {
            return act.BrowseGameProfileContentListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByUuid(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByUuid(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentByUuid(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentByUuid(GameProfileContent obj)  {
            return act.SetGameProfileContentByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileId(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileId(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByProfileId(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByProfileId(GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsername(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsername(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByUsername(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsername(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByUsername(GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsername(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByUsername(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByUsername(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentByUsername(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByUsername(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentByUsername(GameProfileContent obj)  {
            return act.SetGameProfileContentByUsername(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPath(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileIdByPath(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPath(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileIdByPath(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPath(GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileIdByPath(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersion(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileIdByPathByVersion(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersion(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileIdByPathByVersion(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersion(GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileIdByPathByVersion(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPath(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsernameByPath(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByUsernameByPath(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsernameByPath(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByUsernameByPath(GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsernameByPath(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersion(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsernameByPathByVersion(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersion(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsernameByPathByVersion(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersion(GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsernameByPathByVersion(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(GameProfileContent obj)  {
            return act.SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByUuid(
            string uuid
        )  {            
            return act.DelGameProfileContentByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {            
            return act.DelGameProfileContentByGameIdByProfileId(
            game_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByGameIdByUsername(
            string game_id
            , string username
        )  {            
            return act.DelGameProfileContentByGameIdByUsername(
            game_id
            , username
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByUsername(
            string username
        )  {            
            return act.DelGameProfileContentByUsername(
            username
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {            
            return act.DelGameProfileContentByGameIdByProfileIdByPath(
            game_id
            , profile_id
            , path
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {            
            return act.DelGameProfileContentByGameIdByProfileIdByPathByVersion(
            game_id
            , profile_id
            , path
            , version
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {            
            return act.DelGameProfileContentByGameIdByUsernameByPath(
            game_id
            , username
            , path
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {            
            return act.DelGameProfileContentByGameIdByUsernameByPathByVersion(
            game_id
            , username
            , path
            , version
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            game_id
            , username
            , path
            , version
            , platform
            , increment
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentList(
        )  {
            return act.GetGameProfileContentList(
            );
        }
        
        public virtual GameProfileContent GetGameProfileContent(
        )  {
            foreach (GameProfileContent item in GetGameProfileContentList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentList(
        ) {
            return CachedGetGameProfileContentList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameProfileContent> objs;

            string method_name = "CachedGetGameProfileContentList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameProfileContent>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListByUuid(
            string uuid
        )  {
            return act.GetGameProfileContentListByUuid(
            uuid
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentByUuid(
            string uuid
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByUuid(
            string uuid
        ) {
            return CachedGetGameProfileContentListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            return act.GetGameProfileContentListByGameIdByProfileId(
            game_id
            , profile_id
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListByGameIdByProfileId(
            game_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByProfileId(
            string game_id
            , string profile_id
        ) {
            return CachedGetGameProfileContentListByGameIdByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , profile_id
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByProfileId(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListByGameIdByProfileId(
                    game_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsername(
            string game_id
            , string username
        )  {
            return act.GetGameProfileContentListByGameIdByUsername(
            game_id
            , username
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentByGameIdByUsername(
            string game_id
            , string username
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListByGameIdByUsername(
            game_id
            , username
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByUsername(
            string game_id
            , string username
        ) {
            return CachedGetGameProfileContentListByGameIdByUsername(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , username
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByUsername(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string username
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListByGameIdByUsername(
                    game_id
                    , username
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListByUsername(
            string username
        )  {
            return act.GetGameProfileContentListByUsername(
            username
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentByUsername(
            string username
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListByUsername(
            username
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByUsername(
            string username
        ) {
            return CachedGetGameProfileContentListByUsername(
                    false
                    , CACHE_DEFAULT_HOURS
                    , username
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByUsername(
            bool overrideCache
            , int cacheHours
            , string username
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListByUsername(
                    username
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {
            return act.GetGameProfileContentListByGameIdByProfileIdByPath(
            game_id
            , profile_id
            , path
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListByGameIdByProfileIdByPath(
            game_id
            , profile_id
            , path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        ) {
            return CachedGetGameProfileContentListByGameIdByProfileIdByPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , profile_id
                    , path
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByProfileIdByPath(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string profile_id
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListByGameIdByProfileIdByPath(
                    game_id
                    , profile_id
                    , path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            return act.GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            game_id
            , profile_id
            , path
            , version
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            game_id
            , profile_id
            , path
            , version
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        ) {
            return CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , profile_id
                    , path
                    , version
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string profile_id
            , string path
            , string version
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return act.GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        ) {
            return CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , profile_id
                    , path
                    , version
                    , platform
                    , increment
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {
            return act.GetGameProfileContentListByGameIdByUsernameByPath(
            game_id
            , username
            , path
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListByGameIdByUsernameByPath(
            game_id
            , username
            , path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        ) {
            return CachedGetGameProfileContentListByGameIdByUsernameByPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , username
                    , path
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByUsernameByPath(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string username
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListByGameIdByUsernameByPath(
                    game_id
                    , username
                    , path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            return act.GetGameProfileContentListByGameIdByUsernameByPathByVersion(
            game_id
            , username
            , path
            , version
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListByGameIdByUsernameByPathByVersion(
            game_id
            , username
            , path
            , version
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        ) {
            return CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , username
                    , path
                    , version
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByUsernameByPathByVersion(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string username
            , string path
            , string version
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return act.GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            game_id
            , username
            , path
            , version
            , platform
            , increment
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            game_id
            , username
            , path
            , version
            , platform
            , increment
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        ) {
            return CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , username
                    , path
                    , version
                    , platform
                    , increment
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameApp(
        )  {            
            return act.CountGameApp(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppByUuid(
            string uuid
        )  {            
            return act.CountGameAppByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppByGameId(
            string game_id
        )  {            
            return act.CountGameAppByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppByAppId(
            string app_id
        )  {            
            return act.CountGameAppByAppId(
            app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppByGameIdByAppId(
            string game_id
            , string app_id
        )  {            
            return act.CountGameAppByGameIdByAppId(
            game_id
            , app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameAppResult BrowseGameAppListByFilter(SearchFilter obj)  {
            return act.BrowseGameAppListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAppByUuid(string set_type, GameApp obj)  {
            return act.SetGameAppByUuid(set_type, obj);
        }
        
        public virtual bool SetGameAppByUuid(SetType set_type, GameApp obj)  {
            return act.SetGameAppByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAppByUuid(GameApp obj)  {
            return act.SetGameAppByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAppByUuid(
            string uuid
        )  {            
            return act.DelGameAppByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameApp> GetGameAppList(
        )  {
            return act.GetGameAppList(
            );
        }
        
        public virtual GameApp GetGameApp(
        )  {
            foreach (GameApp item in GetGameAppList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameApp> CachedGetGameAppList(
        ) {
            return CachedGetGameAppList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameApp> CachedGetGameAppList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameApp> objs;

            string method_name = "CachedGetGameAppList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameApp>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAppList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameApp> GetGameAppListByUuid(
            string uuid
        )  {
            return act.GetGameAppListByUuid(
            uuid
            );
        }
        
        public virtual GameApp GetGameAppByUuid(
            string uuid
        )  {
            foreach (GameApp item in GetGameAppListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameApp> CachedGetGameAppListByUuid(
            string uuid
        ) {
            return CachedGetGameAppListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameApp> CachedGetGameAppListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAppListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameApp> GetGameAppListByGameId(
            string game_id
        )  {
            return act.GetGameAppListByGameId(
            game_id
            );
        }
        
        public virtual GameApp GetGameAppByGameId(
            string game_id
        )  {
            foreach (GameApp item in GetGameAppListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameApp> CachedGetGameAppListByGameId(
            string game_id
        ) {
            return CachedGetGameAppListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameApp> CachedGetGameAppListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAppListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameApp> GetGameAppListByAppId(
            string app_id
        )  {
            return act.GetGameAppListByAppId(
            app_id
            );
        }
        
        public virtual GameApp GetGameAppByAppId(
            string app_id
        )  {
            foreach (GameApp item in GetGameAppListByAppId(
            app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameApp> CachedGetGameAppListByAppId(
            string app_id
        ) {
            return CachedGetGameAppListByAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , app_id
                );
        }
        
        public virtual List<GameApp> CachedGetGameAppListByAppId(
            bool overrideCache
            , int cacheHours
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAppListByAppId(
                    app_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameApp> GetGameAppListByGameIdByAppId(
            string game_id
            , string app_id
        )  {
            return act.GetGameAppListByGameIdByAppId(
            game_id
            , app_id
            );
        }
        
        public virtual GameApp GetGameAppByGameIdByAppId(
            string game_id
            , string app_id
        )  {
            foreach (GameApp item in GetGameAppListByGameIdByAppId(
            game_id
            , app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameApp> CachedGetGameAppListByGameIdByAppId(
            string game_id
            , string app_id
        ) {
            return CachedGetGameAppListByGameIdByAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , app_id
                );
        }
        
        public virtual List<GameApp> CachedGetGameAppListByGameIdByAppId(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAppListByGameIdByAppId(
                    game_id
                    , app_id
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
        public virtual int CountProfileGameLocation(
        )  {            
            return act.CountProfileGameLocation(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationByUuid(
            string uuid
        )  {            
            return act.CountProfileGameLocationByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationByGameLocationId(
            string game_location_id
        )  {            
            return act.CountProfileGameLocationByGameLocationId(
            game_location_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationByProfileId(
            string profile_id
        )  {            
            return act.CountProfileGameLocationByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationByProfileIdByGameLocationId(
            string profile_id
            , string game_location_id
        )  {            
            return act.CountProfileGameLocationByProfileIdByGameLocationId(
            profile_id
            , game_location_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileGameLocationResult BrowseProfileGameLocationListByFilter(SearchFilter obj)  {
            return act.BrowseProfileGameLocationListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameLocationByUuid(string set_type, ProfileGameLocation obj)  {
            return act.SetProfileGameLocationByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileGameLocationByUuid(SetType set_type, ProfileGameLocation obj)  {
            return act.SetProfileGameLocationByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameLocationByUuid(ProfileGameLocation obj)  {
            return act.SetProfileGameLocationByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameLocationByUuid(
            string uuid
        )  {            
            return act.DelProfileGameLocationByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameLocation> GetProfileGameLocationList(
        )  {
            return act.GetProfileGameLocationList(
            );
        }
        
        public virtual ProfileGameLocation GetProfileGameLocation(
        )  {
            foreach (ProfileGameLocation item in GetProfileGameLocationList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationList(
        ) {
            return CachedGetProfileGameLocationList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationList(
            bool overrideCache
            , int cacheHours
        ) {
            List<ProfileGameLocation> objs;

            string method_name = "CachedGetProfileGameLocationList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileGameLocation>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameLocationList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByUuid(
            string uuid
        )  {
            return act.GetProfileGameLocationListByUuid(
            uuid
            );
        }
        
        public virtual ProfileGameLocation GetProfileGameLocationByUuid(
            string uuid
        )  {
            foreach (ProfileGameLocation item in GetProfileGameLocationListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListByUuid(
            string uuid
        ) {
            return CachedGetProfileGameLocationListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameLocationListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByGameLocationId(
            string game_location_id
        )  {
            return act.GetProfileGameLocationListByGameLocationId(
            game_location_id
            );
        }
        
        public virtual ProfileGameLocation GetProfileGameLocationByGameLocationId(
            string game_location_id
        )  {
            foreach (ProfileGameLocation item in GetProfileGameLocationListByGameLocationId(
            game_location_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListByGameLocationId(
            string game_location_id
        ) {
            return CachedGetProfileGameLocationListByGameLocationId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_location_id
                );
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListByGameLocationId(
            bool overrideCache
            , int cacheHours
            , string game_location_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameLocationListByGameLocationId(
                    game_location_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByProfileId(
            string profile_id
        )  {
            return act.GetProfileGameLocationListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileGameLocation GetProfileGameLocationByProfileId(
            string profile_id
        )  {
            foreach (ProfileGameLocation item in GetProfileGameLocationListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileGameLocationListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameLocationListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByProfileIdByGameLocationId(
            string profile_id
            , string game_location_id
        )  {
            return act.GetProfileGameLocationListByProfileIdByGameLocationId(
            profile_id
            , game_location_id
            );
        }
        
        public virtual ProfileGameLocation GetProfileGameLocationByProfileIdByGameLocationId(
            string profile_id
            , string game_location_id
        )  {
            foreach (ProfileGameLocation item in GetProfileGameLocationListByProfileIdByGameLocationId(
            profile_id
            , game_location_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListByProfileIdByGameLocationId(
            string profile_id
            , string game_location_id
        ) {
            return CachedGetProfileGameLocationListByProfileIdByGameLocationId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_location_id
                );
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListByProfileIdByGameLocationId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_location_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameLocationListByProfileIdByGameLocationId(
                    profile_id
                    , game_location_id
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
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeapon(
        )  {            
            return act.CountGameRpgItemWeapon(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponByUuid(
            string uuid
        )  {            
            return act.CountGameRpgItemWeaponByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponByGameId(
            string game_id
        )  {            
            return act.CountGameRpgItemWeaponByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponByUrl(
            string url
        )  {            
            return act.CountGameRpgItemWeaponByUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponByUrlByGameId(
            string url
            , string game_id
        )  {            
            return act.CountGameRpgItemWeaponByUrlByGameId(
            url
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return act.CountGameRpgItemWeaponByUuidByGameId(
            uuid
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameRpgItemWeaponResult BrowseGameRpgItemWeaponListByFilter(SearchFilter obj)  {
            return act.BrowseGameRpgItemWeaponListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUuid(string set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUuid(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemWeaponByUuid(SetType set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemWeaponByUuid(GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByGameId(string set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemWeaponByGameId(SetType set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemWeaponByGameId(GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUrl(string set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUrl(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemWeaponByUrl(SetType set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemWeaponByUrl(GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUrlByGameId(string set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUrlByGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemWeaponByUrlByGameId(SetType set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUrlByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemWeaponByUrlByGameId(GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUrlByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUuidByGameId(string set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUuidByGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemWeaponByUuidByGameId(SetType set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUuidByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemWeaponByUuidByGameId(GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponByUuidByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponByUuid(
            string uuid
        )  {            
            return act.DelGameRpgItemWeaponByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponByGameId(
            string game_id
        )  {            
            return act.DelGameRpgItemWeaponByGameId(
            game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponByUrl(
            string url
        )  {            
            return act.DelGameRpgItemWeaponByUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponByUrlByGameId(
            string url
            , string game_id
        )  {            
            return act.DelGameRpgItemWeaponByUrlByGameId(
            url
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return act.DelGameRpgItemWeaponByUuidByGameId(
            uuid
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponList(
        )  {
            return act.GetGameRpgItemWeaponList(
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeapon(
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponList(
        ) {
            return CachedGetGameRpgItemWeaponList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameRpgItemWeapon> objs;

            string method_name = "CachedGetGameRpgItemWeaponList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameRpgItemWeapon>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUuid(
            string uuid
        )  {
            return act.GetGameRpgItemWeaponListByUuid(
            uuid
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeaponByUuid(
            string uuid
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListByUuid(
            string uuid
        ) {
            return CachedGetGameRpgItemWeaponListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByGameId(
            string game_id
        )  {
            return act.GetGameRpgItemWeaponListByGameId(
            game_id
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeaponByGameId(
            string game_id
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListByGameId(
            string game_id
        ) {
            return CachedGetGameRpgItemWeaponListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUrl(
            string url
        )  {
            return act.GetGameRpgItemWeaponListByUrl(
            url
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeaponByUrl(
            string url
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponListByUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListByUrl(
            string url
        ) {
            return CachedGetGameRpgItemWeaponListByUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListByUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponListByUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUrlByGameId(
            string url
            , string game_id
        )  {
            return act.GetGameRpgItemWeaponListByUrlByGameId(
            url
            , game_id
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeaponByUrlByGameId(
            string url
            , string game_id
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponListByUrlByGameId(
            url
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListByUrlByGameId(
            string url
            , string game_id
        ) {
            return CachedGetGameRpgItemWeaponListByUrlByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListByUrlByGameId(
            bool overrideCache
            , int cacheHours
            , string url
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponListByUrlByGameId(
                    url
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            return act.GetGameRpgItemWeaponListByUuidByGameId(
            uuid
            , game_id
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeaponByUuidByGameId(
            string uuid
            , string game_id
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponListByUuidByGameId(
            uuid
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListByUuidByGameId(
            string uuid
            , string game_id
        ) {
            return CachedGetGameRpgItemWeaponListByUuidByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListByUuidByGameId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponListByUuidByGameId(
                    uuid
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkill(
        )  {            
            return act.CountGameRpgItemSkill(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillByUuid(
            string uuid
        )  {            
            return act.CountGameRpgItemSkillByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillByGameId(
            string game_id
        )  {            
            return act.CountGameRpgItemSkillByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillByUrl(
            string url
        )  {            
            return act.CountGameRpgItemSkillByUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillByUrlByGameId(
            string url
            , string game_id
        )  {            
            return act.CountGameRpgItemSkillByUrlByGameId(
            url
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return act.CountGameRpgItemSkillByUuidByGameId(
            uuid
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameRpgItemSkillResult BrowseGameRpgItemSkillListByFilter(SearchFilter obj)  {
            return act.BrowseGameRpgItemSkillListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUuid(string set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUuid(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemSkillByUuid(SetType set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemSkillByUuid(GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByGameId(string set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemSkillByGameId(SetType set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemSkillByGameId(GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUrl(string set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUrl(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemSkillByUrl(SetType set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemSkillByUrl(GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUrlByGameId(string set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUrlByGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemSkillByUrlByGameId(SetType set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUrlByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemSkillByUrlByGameId(GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUrlByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUuidByGameId(string set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUuidByGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemSkillByUuidByGameId(SetType set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUuidByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemSkillByUuidByGameId(GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillByUuidByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillByUuid(
            string uuid
        )  {            
            return act.DelGameRpgItemSkillByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillByGameId(
            string game_id
        )  {            
            return act.DelGameRpgItemSkillByGameId(
            game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillByUrl(
            string url
        )  {            
            return act.DelGameRpgItemSkillByUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillByUrlByGameId(
            string url
            , string game_id
        )  {            
            return act.DelGameRpgItemSkillByUrlByGameId(
            url
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return act.DelGameRpgItemSkillByUuidByGameId(
            uuid
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillList(
        )  {
            return act.GetGameRpgItemSkillList(
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkill(
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillList(
        ) {
            return CachedGetGameRpgItemSkillList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameRpgItemSkill> objs;

            string method_name = "CachedGetGameRpgItemSkillList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameRpgItemSkill>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUuid(
            string uuid
        )  {
            return act.GetGameRpgItemSkillListByUuid(
            uuid
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkillByUuid(
            string uuid
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListByUuid(
            string uuid
        ) {
            return CachedGetGameRpgItemSkillListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByGameId(
            string game_id
        )  {
            return act.GetGameRpgItemSkillListByGameId(
            game_id
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkillByGameId(
            string game_id
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListByGameId(
            string game_id
        ) {
            return CachedGetGameRpgItemSkillListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUrl(
            string url
        )  {
            return act.GetGameRpgItemSkillListByUrl(
            url
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkillByUrl(
            string url
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillListByUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListByUrl(
            string url
        ) {
            return CachedGetGameRpgItemSkillListByUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListByUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillListByUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUrlByGameId(
            string url
            , string game_id
        )  {
            return act.GetGameRpgItemSkillListByUrlByGameId(
            url
            , game_id
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkillByUrlByGameId(
            string url
            , string game_id
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillListByUrlByGameId(
            url
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListByUrlByGameId(
            string url
            , string game_id
        ) {
            return CachedGetGameRpgItemSkillListByUrlByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListByUrlByGameId(
            bool overrideCache
            , int cacheHours
            , string url
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillListByUrlByGameId(
                    url
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            return act.GetGameRpgItemSkillListByUuidByGameId(
            uuid
            , game_id
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkillByUuidByGameId(
            string uuid
            , string game_id
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillListByUuidByGameId(
            uuid
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListByUuidByGameId(
            string uuid
            , string game_id
        ) {
            return CachedGetGameRpgItemSkillListByUuidByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListByUuidByGameId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillListByUuidByGameId(
                    uuid
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameProduct(
        )  {            
            return act.CountGameProduct(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductByUuid(
            string uuid
        )  {            
            return act.CountGameProductByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductByGameId(
            string game_id
        )  {            
            return act.CountGameProductByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductByUrl(
            string url
        )  {            
            return act.CountGameProductByUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductByUrlByGameId(
            string url
            , string game_id
        )  {            
            return act.CountGameProductByUrlByGameId(
            url
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return act.CountGameProductByUuidByGameId(
            uuid
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProductResult BrowseGameProductListByFilter(SearchFilter obj)  {
            return act.BrowseGameProductListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUuid(string set_type, GameProduct obj)  {
            return act.SetGameProductByUuid(set_type, obj);
        }
        
        public virtual bool SetGameProductByUuid(SetType set_type, GameProduct obj)  {
            return act.SetGameProductByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProductByUuid(GameProduct obj)  {
            return act.SetGameProductByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByGameId(string set_type, GameProduct obj)  {
            return act.SetGameProductByGameId(set_type, obj);
        }
        
        public virtual bool SetGameProductByGameId(SetType set_type, GameProduct obj)  {
            return act.SetGameProductByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProductByGameId(GameProduct obj)  {
            return act.SetGameProductByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUrl(string set_type, GameProduct obj)  {
            return act.SetGameProductByUrl(set_type, obj);
        }
        
        public virtual bool SetGameProductByUrl(SetType set_type, GameProduct obj)  {
            return act.SetGameProductByUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProductByUrl(GameProduct obj)  {
            return act.SetGameProductByUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUrlByGameId(string set_type, GameProduct obj)  {
            return act.SetGameProductByUrlByGameId(set_type, obj);
        }
        
        public virtual bool SetGameProductByUrlByGameId(SetType set_type, GameProduct obj)  {
            return act.SetGameProductByUrlByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProductByUrlByGameId(GameProduct obj)  {
            return act.SetGameProductByUrlByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUuidByGameId(string set_type, GameProduct obj)  {
            return act.SetGameProductByUuidByGameId(set_type, obj);
        }
        
        public virtual bool SetGameProductByUuidByGameId(SetType set_type, GameProduct obj)  {
            return act.SetGameProductByUuidByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProductByUuidByGameId(GameProduct obj)  {
            return act.SetGameProductByUuidByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductByUuid(
            string uuid
        )  {            
            return act.DelGameProductByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductByGameId(
            string game_id
        )  {            
            return act.DelGameProductByGameId(
            game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductByUrl(
            string url
        )  {            
            return act.DelGameProductByUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductByUrlByGameId(
            string url
            , string game_id
        )  {            
            return act.DelGameProductByUrlByGameId(
            url
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return act.DelGameProductByUuidByGameId(
            uuid
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameProduct> GetGameProductList(
        )  {
            return act.GetGameProductList(
            );
        }
        
        public virtual GameProduct GetGameProduct(
        )  {
            foreach (GameProduct item in GetGameProductList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductList(
        ) {
            return CachedGetGameProductList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameProduct> objs;

            string method_name = "CachedGetGameProductList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameProduct>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProduct> GetGameProductListByUuid(
            string uuid
        )  {
            return act.GetGameProductListByUuid(
            uuid
            );
        }
        
        public virtual GameProduct GetGameProductByUuid(
            string uuid
        )  {
            foreach (GameProduct item in GetGameProductListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductListByUuid(
            string uuid
        ) {
            return CachedGetGameProductListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProduct> GetGameProductListByGameId(
            string game_id
        )  {
            return act.GetGameProductListByGameId(
            game_id
            );
        }
        
        public virtual GameProduct GetGameProductByGameId(
            string game_id
        )  {
            foreach (GameProduct item in GetGameProductListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductListByGameId(
            string game_id
        ) {
            return CachedGetGameProductListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProduct> GetGameProductListByUrl(
            string url
        )  {
            return act.GetGameProductListByUrl(
            url
            );
        }
        
        public virtual GameProduct GetGameProductByUrl(
            string url
        )  {
            foreach (GameProduct item in GetGameProductListByUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductListByUrl(
            string url
        ) {
            return CachedGetGameProductListByUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductListByUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductListByUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProduct> GetGameProductListByUrlByGameId(
            string url
            , string game_id
        )  {
            return act.GetGameProductListByUrlByGameId(
            url
            , game_id
            );
        }
        
        public virtual GameProduct GetGameProductByUrlByGameId(
            string url
            , string game_id
        )  {
            foreach (GameProduct item in GetGameProductListByUrlByGameId(
            url
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductListByUrlByGameId(
            string url
            , string game_id
        ) {
            return CachedGetGameProductListByUrlByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , game_id
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductListByUrlByGameId(
            bool overrideCache
            , int cacheHours
            , string url
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductListByUrlByGameId(
                    url
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProduct> GetGameProductListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            return act.GetGameProductListByUuidByGameId(
            uuid
            , game_id
            );
        }
        
        public virtual GameProduct GetGameProductByUuidByGameId(
            string uuid
            , string game_id
        )  {
            foreach (GameProduct item in GetGameProductListByUuidByGameId(
            uuid
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductListByUuidByGameId(
            string uuid
            , string game_id
        ) {
            return CachedGetGameProductListByUuidByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , game_id
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductListByUuidByGameId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductListByUuidByGameId(
                    uuid
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboard(
        )  {            
            return act.CountGameStatisticLeaderboard(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByUuid(
            string uuid
        )  {            
            return act.CountGameStatisticLeaderboardByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByKey(
            string key
        )  {            
            return act.CountGameStatisticLeaderboardByKey(
            key
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByGameId(
            string game_id
        )  {            
            return act.CountGameStatisticLeaderboardByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardByKeyByGameId(
            key
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return act.CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameStatisticLeaderboardResult BrowseGameStatisticLeaderboardListByFilter(SearchFilter obj)  {
            return act.BrowseGameStatisticLeaderboardListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByUuid(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByUuid(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByUuid(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByUuid(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByProfileIdByKey(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByProfileIdByKey(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByProfileIdByKey(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByProfileIdByKey(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByProfileIdByKey(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByProfileIdByKey(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByProfileIdByGameIdByKey(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByProfileIdByGameIdByKey(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByProfileIdByGameIdByKey(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByProfileIdByGameIdByKey(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByProfileIdByGameIdByKey(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByProfileIdByGameIdByKey(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardByUuid(
            string uuid
        )  {            
            return act.DelGameStatisticLeaderboardByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardByKeyByGameId(
            key
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardList(
        )  {
            return act.GetGameStatisticLeaderboardList(
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboard(
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardList(
        ) {
            return CachedGetGameStatisticLeaderboardList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameStatisticLeaderboard> objs;

            string method_name = "CachedGetGameStatisticLeaderboardList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameStatisticLeaderboard>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByUuid(
            string uuid
        )  {
            return act.GetGameStatisticLeaderboardListByUuid(
            uuid
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByUuid(
            string uuid
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByUuid(
            string uuid
        ) {
            return CachedGetGameStatisticLeaderboardListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByKey(
            string key
        )  {
            return act.GetGameStatisticLeaderboardListByKey(
            key
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByKey(
            string key
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByKey(
            key
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByKey(
            string key
        ) {
            return CachedGetGameStatisticLeaderboardListByKey(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByKey(
            bool overrideCache
            , int cacheHours
            , string key
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListByKey(
                    key
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByGameId(
            string game_id
        )  {
            return act.GetGameStatisticLeaderboardListByGameId(
            game_id
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByGameId(
            string game_id
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByGameId(
            string game_id
        ) {
            return CachedGetGameStatisticLeaderboardListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByKeyByGameId(
            string key
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardListByKeyByGameId(
            key
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByKeyByGameId(
            string key
            , string game_id
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByKeyByGameId(
            key
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByKeyByGameId(
            string key
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardListByKeyByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByKeyByGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListByKeyByGameId(
                    key
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
                    key
                    , profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string key
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveQueue(
        )  {            
            return act.CountGameLiveQueue(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveQueueByUuid(
            string uuid
        )  {            
            return act.CountGameLiveQueueByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameLiveQueueByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameLiveQueueResult BrowseGameLiveQueueListByFilter(SearchFilter obj)  {
            return act.BrowseGameLiveQueueListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveQueueByUuid(string set_type, GameLiveQueue obj)  {
            return act.SetGameLiveQueueByUuid(set_type, obj);
        }
        
        public virtual bool SetGameLiveQueueByUuid(SetType set_type, GameLiveQueue obj)  {
            return act.SetGameLiveQueueByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLiveQueueByUuid(GameLiveQueue obj)  {
            return act.SetGameLiveQueueByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveQueueByProfileIdByGameId(string set_type, GameLiveQueue obj)  {
            return act.SetGameLiveQueueByProfileIdByGameId(set_type, obj);
        }
        
        public virtual bool SetGameLiveQueueByProfileIdByGameId(SetType set_type, GameLiveQueue obj)  {
            return act.SetGameLiveQueueByProfileIdByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLiveQueueByProfileIdByGameId(GameLiveQueue obj)  {
            return act.SetGameLiveQueueByProfileIdByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveQueueByUuid(
            string uuid
        )  {            
            return act.DelGameLiveQueueByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameLiveQueueByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveQueue> GetGameLiveQueueList(
        )  {
            return act.GetGameLiveQueueList(
            );
        }
        
        public virtual GameLiveQueue GetGameLiveQueue(
        )  {
            foreach (GameLiveQueue item in GetGameLiveQueueList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueList(
        ) {
            return CachedGetGameLiveQueueList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameLiveQueue> objs;

            string method_name = "CachedGetGameLiveQueueList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameLiveQueue>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveQueueList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveQueue> GetGameLiveQueueListByUuid(
            string uuid
        )  {
            return act.GetGameLiveQueueListByUuid(
            uuid
            );
        }
        
        public virtual GameLiveQueue GetGameLiveQueueByUuid(
            string uuid
        )  {
            foreach (GameLiveQueue item in GetGameLiveQueueListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListByUuid(
            string uuid
        ) {
            return CachedGetGameLiveQueueListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveQueueListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveQueue> GetGameLiveQueueListByGameId(
            string game_id
        )  {
            return act.GetGameLiveQueueListByGameId(
            game_id
            );
        }
        
        public virtual GameLiveQueue GetGameLiveQueueByGameId(
            string game_id
        )  {
            foreach (GameLiveQueue item in GetGameLiveQueueListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListByGameId(
            string game_id
        ) {
            return CachedGetGameLiveQueueListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveQueueListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveQueue> GetGameLiveQueueListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameLiveQueueListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameLiveQueue GetGameLiveQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameLiveQueue item in GetGameLiveQueueListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameLiveQueueListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveQueueListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveRecentQueue(
        )  {            
            return act.CountGameLiveRecentQueue(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveRecentQueueByUuid(
            string uuid
        )  {            
            return act.CountGameLiveRecentQueueByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveRecentQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameLiveRecentQueueByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameLiveRecentQueueResult BrowseGameLiveRecentQueueListByFilter(SearchFilter obj)  {
            return act.BrowseGameLiveRecentQueueListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveRecentQueueByUuid(string set_type, GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueByUuid(set_type, obj);
        }
        
        public virtual bool SetGameLiveRecentQueueByUuid(SetType set_type, GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLiveRecentQueueByUuid(GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveRecentQueueByProfileIdByGameId(string set_type, GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueByProfileIdByGameId(set_type, obj);
        }
        
        public virtual bool SetGameLiveRecentQueueByProfileIdByGameId(SetType set_type, GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueByProfileIdByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLiveRecentQueueByProfileIdByGameId(GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueByProfileIdByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveRecentQueueByUuid(
            string uuid
        )  {            
            return act.DelGameLiveRecentQueueByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveRecentQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameLiveRecentQueueByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueList(
        )  {
            return act.GetGameLiveRecentQueueList(
            );
        }
        
        public virtual GameLiveRecentQueue GetGameLiveRecentQueue(
        )  {
            foreach (GameLiveRecentQueue item in GetGameLiveRecentQueueList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueList(
        ) {
            return CachedGetGameLiveRecentQueueList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameLiveRecentQueue> objs;

            string method_name = "CachedGetGameLiveRecentQueueList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameLiveRecentQueue>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveRecentQueueList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListByUuid(
            string uuid
        )  {
            return act.GetGameLiveRecentQueueListByUuid(
            uuid
            );
        }
        
        public virtual GameLiveRecentQueue GetGameLiveRecentQueueByUuid(
            string uuid
        )  {
            foreach (GameLiveRecentQueue item in GetGameLiveRecentQueueListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListByUuid(
            string uuid
        ) {
            return CachedGetGameLiveRecentQueueListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveRecentQueueListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListByGameId(
            string game_id
        )  {
            return act.GetGameLiveRecentQueueListByGameId(
            game_id
            );
        }
        
        public virtual GameLiveRecentQueue GetGameLiveRecentQueueByGameId(
            string game_id
        )  {
            foreach (GameLiveRecentQueue item in GetGameLiveRecentQueueListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListByGameId(
            string game_id
        ) {
            return CachedGetGameLiveRecentQueueListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveRecentQueueListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameLiveRecentQueueListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameLiveRecentQueue GetGameLiveRecentQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameLiveRecentQueue item in GetGameLiveRecentQueueListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameLiveRecentQueueListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveRecentQueueListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatistic(
        )  {            
            return act.CountGameStatistic(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByUuid(
            string uuid
        )  {            
            return act.CountGameStatisticByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByKey(
            string key
        )  {            
            return act.CountGameStatisticByKey(
            key
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByGameId(
            string game_id
        )  {            
            return act.CountGameStatisticByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.CountGameStatisticByKeyByGameId(
            key
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameStatisticByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {            
            return act.CountGameStatisticByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return act.CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameStatisticResult BrowseGameStatisticListByFilter(SearchFilter obj)  {
            return act.BrowseGameStatisticListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByUuid(string set_type, GameStatistic obj)  {
            return act.SetGameStatisticByUuid(set_type, obj);
        }
        
        public virtual bool SetGameStatisticByUuid(SetType set_type, GameStatistic obj)  {
            return act.SetGameStatisticByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticByUuid(GameStatistic obj)  {
            return act.SetGameStatisticByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(string set_type, GameStatistic obj)  {
            return act.SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(SetType set_type, GameStatistic obj)  {
            return act.SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(GameStatistic obj)  {
            return act.SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByProfileIdByKey(string set_type, GameStatistic obj)  {
            return act.SetGameStatisticByProfileIdByKey(set_type, obj);
        }
        
        public virtual bool SetGameStatisticByProfileIdByKey(SetType set_type, GameStatistic obj)  {
            return act.SetGameStatisticByProfileIdByKey(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticByProfileIdByKey(GameStatistic obj)  {
            return act.SetGameStatisticByProfileIdByKey(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByProfileIdByKeyByTimestamp(string set_type, GameStatistic obj)  {
            return act.SetGameStatisticByProfileIdByKeyByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticByProfileIdByKeyByTimestamp(SetType set_type, GameStatistic obj)  {
            return act.SetGameStatisticByProfileIdByKeyByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticByProfileIdByKeyByTimestamp(GameStatistic obj)  {
            return act.SetGameStatisticByProfileIdByKeyByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(string set_type, GameStatistic obj)  {
            return act.SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(SetType set_type, GameStatistic obj)  {
            return act.SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(GameStatistic obj)  {
            return act.SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByProfileIdByGameIdByKey(string set_type, GameStatistic obj)  {
            return act.SetGameStatisticByProfileIdByGameIdByKey(set_type, obj);
        }
        
        public virtual bool SetGameStatisticByProfileIdByGameIdByKey(SetType set_type, GameStatistic obj)  {
            return act.SetGameStatisticByProfileIdByGameIdByKey(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticByProfileIdByGameIdByKey(GameStatistic obj)  {
            return act.SetGameStatisticByProfileIdByGameIdByKey(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticByUuid(
            string uuid
        )  {            
            return act.DelGameStatisticByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.DelGameStatisticByKeyByGameId(
            key
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameStatisticByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {            
            return act.DelGameStatisticByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameStatistic> GetGameStatisticListByUuid(
            string uuid
        )  {
            return act.GetGameStatisticListByUuid(
            uuid
            );
        }
        
        public virtual GameStatistic GetGameStatisticByUuid(
            string uuid
        )  {
            foreach (GameStatistic item in GetGameStatisticListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByUuid(
            string uuid
        ) {
            return CachedGetGameStatisticListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatistic> GetGameStatisticListByKey(
            string key
        )  {
            return act.GetGameStatisticListByKey(
            key
            );
        }
        
        public virtual GameStatistic GetGameStatisticByKey(
            string key
        )  {
            foreach (GameStatistic item in GetGameStatisticListByKey(
            key
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByKey(
            string key
        ) {
            return CachedGetGameStatisticListByKey(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                );
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByKey(
            bool overrideCache
            , int cacheHours
            , string key
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticListByKey(
                    key
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatistic> GetGameStatisticListByGameId(
            string game_id
        )  {
            return act.GetGameStatisticListByGameId(
            game_id
            );
        }
        
        public virtual GameStatistic GetGameStatisticByGameId(
            string game_id
        )  {
            foreach (GameStatistic item in GetGameStatisticListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByGameId(
            string game_id
        ) {
            return CachedGetGameStatisticListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatistic> GetGameStatisticListByKeyByGameId(
            string key
            , string game_id
        )  {
            return act.GetGameStatisticListByKeyByGameId(
            key
            , game_id
            );
        }
        
        public virtual GameStatistic GetGameStatisticByKeyByGameId(
            string key
            , string game_id
        )  {
            foreach (GameStatistic item in GetGameStatisticListByKeyByGameId(
            key
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByKeyByGameId(
            string key
            , string game_id
        ) {
            return CachedGetGameStatisticListByKeyByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , game_id
                );
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByKeyByGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticListByKeyByGameId(
                    key
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatistic> GetGameStatisticListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameStatisticListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameStatistic GetGameStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameStatistic item in GetGameStatisticListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameStatisticListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatistic> GetGameStatisticListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameStatisticListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameStatistic GetGameStatisticByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameStatistic item in GetGameStatisticListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameStatisticListByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticListByProfileIdByGameIdByTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatistic> GetGameStatisticListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            return act.GetGameStatisticListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            );
        }
        
        public virtual GameStatistic GetGameStatisticByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            foreach (GameStatistic item in GetGameStatisticListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        ) {
            return CachedGetGameStatisticListByKeyByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByKeyByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticListByKeyByProfileIdByGameId(
                    key
                    , profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatistic> GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameStatistic GetGameStatisticByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameStatistic item in GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatistic> CachedGetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string key
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMeta(
        )  {            
            return act.CountGameStatisticMeta(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByUuid(
            string uuid
        )  {            
            return act.CountGameStatisticMetaByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByCode(
            string code
        )  {            
            return act.CountGameStatisticMetaByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByName(
            string name
        )  {            
            return act.CountGameStatisticMetaByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByKey(
            string key
        )  {            
            return act.CountGameStatisticMetaByKey(
            key
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByGameId(
            string game_id
        )  {            
            return act.CountGameStatisticMetaByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.CountGameStatisticMetaByKeyByGameId(
            key
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameStatisticMetaResult BrowseGameStatisticMetaListByFilter(SearchFilter obj)  {
            return act.BrowseGameStatisticMetaListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticMetaByUuid(string set_type, GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaByUuid(set_type, obj);
        }
        
        public virtual bool SetGameStatisticMetaByUuid(SetType set_type, GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticMetaByUuid(GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticMetaByKeyByGameId(string set_type, GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaByKeyByGameId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticMetaByKeyByGameId(SetType set_type, GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaByKeyByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticMetaByKeyByGameId(GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaByKeyByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticMetaByUuid(
            string uuid
        )  {            
            return act.DelGameStatisticMetaByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticMetaByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.DelGameStatisticMetaByKeyByGameId(
            key
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByUuid(
            string uuid
        )  {
            return act.GetGameStatisticMetaListByUuid(
            uuid
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaByUuid(
            string uuid
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByUuid(
            string uuid
        ) {
            return CachedGetGameStatisticMetaListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByCode(
            string code
        )  {
            return act.GetGameStatisticMetaListByCode(
            code
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaByCode(
            string code
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByCode(
            string code
        ) {
            return CachedGetGameStatisticMetaListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByName(
            string name
        )  {
            return act.GetGameStatisticMetaListByName(
            name
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaByName(
            string name
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByName(
            string name
        ) {
            return CachedGetGameStatisticMetaListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByKey(
            string key
        )  {
            return act.GetGameStatisticMetaListByKey(
            key
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaByKey(
            string key
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListByKey(
            key
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByKey(
            string key
        ) {
            return CachedGetGameStatisticMetaListByKey(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByKey(
            bool overrideCache
            , int cacheHours
            , string key
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListByKey(
                    key
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByGameId(
            string game_id
        )  {
            return act.GetGameStatisticMetaListByGameId(
            game_id
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaByGameId(
            string game_id
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByGameId(
            string game_id
        ) {
            return CachedGetGameStatisticMetaListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByKeyByGameId(
            string key
            , string game_id
        )  {
            return act.GetGameStatisticMetaListByKeyByGameId(
            key
            , game_id
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaByKeyByGameId(
            string key
            , string game_id
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListByKeyByGameId(
            key
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByKeyByGameId(
            string key
            , string game_id
        ) {
            return CachedGetGameStatisticMetaListByKeyByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , game_id
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByKeyByGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListByKeyByGameId(
                    key
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticTimestamp(
        )  {            
            return act.CountGameStatisticTimestamp(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticTimestampByUuid(
            string uuid
        )  {            
            return act.CountGameStatisticTimestampByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {            
            return act.CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameStatisticTimestampResult BrowseGameStatisticTimestampListByFilter(SearchFilter obj)  {
            return act.BrowseGameStatisticTimestampListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticTimestampByUuid(string set_type, GameStatisticTimestamp obj)  {
            return act.SetGameStatisticTimestampByUuid(set_type, obj);
        }
        
        public virtual bool SetGameStatisticTimestampByUuid(SetType set_type, GameStatisticTimestamp obj)  {
            return act.SetGameStatisticTimestampByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticTimestampByUuid(GameStatisticTimestamp obj)  {
            return act.SetGameStatisticTimestampByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(string set_type, GameStatisticTimestamp obj)  {
            return act.SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(SetType set_type, GameStatisticTimestamp obj)  {
            return act.SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(GameStatisticTimestamp obj)  {
            return act.SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticTimestampByUuid(
            string uuid
        )  {            
            return act.DelGameStatisticTimestampByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {            
            return act.DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticTimestamp> GetGameStatisticTimestampListByUuid(
            string uuid
        )  {
            return act.GetGameStatisticTimestampListByUuid(
            uuid
            );
        }
        
        public virtual GameStatisticTimestamp GetGameStatisticTimestampByUuid(
            string uuid
        )  {
            foreach (GameStatisticTimestamp item in GetGameStatisticTimestampListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticTimestamp> CachedGetGameStatisticTimestampListByUuid(
            string uuid
        ) {
            return CachedGetGameStatisticTimestampListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameStatisticTimestamp> CachedGetGameStatisticTimestampListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticTimestampListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticTimestamp> GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {
            return act.GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameStatisticTimestamp GetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {
            foreach (GameStatisticTimestamp item in GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticTimestamp> CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , DateTime timestamp
        ) {
            return CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticTimestamp> CachedGetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string key
            , string profile_id
            , string game_id
            , DateTime timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMeta(
        )  {            
            return act.CountGameKeyMeta(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByUuid(
            string uuid
        )  {            
            return act.CountGameKeyMetaByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByCode(
            string code
        )  {            
            return act.CountGameKeyMetaByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByName(
            string name
        )  {            
            return act.CountGameKeyMetaByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByKey(
            string key
        )  {            
            return act.CountGameKeyMetaByKey(
            key
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByGameId(
            string game_id
        )  {            
            return act.CountGameKeyMetaByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.CountGameKeyMetaByKeyByGameId(
            key
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameKeyMetaResult BrowseGameKeyMetaListByFilter(SearchFilter obj)  {
            return act.BrowseGameKeyMetaListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaByUuid(string set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaByUuid(set_type, obj);
        }
        
        public virtual bool SetGameKeyMetaByUuid(SetType set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameKeyMetaByUuid(GameKeyMeta obj)  {
            return act.SetGameKeyMetaByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaByKeyByGameId(string set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaByKeyByGameId(set_type, obj);
        }
        
        public virtual bool SetGameKeyMetaByKeyByGameId(SetType set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaByKeyByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameKeyMetaByKeyByGameId(GameKeyMeta obj)  {
            return act.SetGameKeyMetaByKeyByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaByKeyByGameIdByLevel(string set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaByKeyByGameIdByLevel(set_type, obj);
        }
        
        public virtual bool SetGameKeyMetaByKeyByGameIdByLevel(SetType set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaByKeyByGameIdByLevel(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameKeyMetaByKeyByGameIdByLevel(GameKeyMeta obj)  {
            return act.SetGameKeyMetaByKeyByGameIdByLevel(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameKeyMetaByUuid(
            string uuid
        )  {            
            return act.DelGameKeyMetaByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameKeyMetaByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.DelGameKeyMetaByKeyByGameId(
            key
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListByUuid(
            string uuid
        )  {
            return act.GetGameKeyMetaListByUuid(
            uuid
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaByUuid(
            string uuid
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByUuid(
            string uuid
        ) {
            return CachedGetGameKeyMetaListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListByCode(
            string code
        )  {
            return act.GetGameKeyMetaListByCode(
            code
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaByCode(
            string code
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByCode(
            string code
        ) {
            return CachedGetGameKeyMetaListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListByName(
            string name
        )  {
            return act.GetGameKeyMetaListByName(
            name
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaByName(
            string name
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByName(
            string name
        ) {
            return CachedGetGameKeyMetaListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListByKey(
            string key
        )  {
            return act.GetGameKeyMetaListByKey(
            key
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaByKey(
            string key
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListByKey(
            key
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByKey(
            string key
        ) {
            return CachedGetGameKeyMetaListByKey(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByKey(
            bool overrideCache
            , int cacheHours
            , string key
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListByKey(
                    key
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListByGameId(
            string game_id
        )  {
            return act.GetGameKeyMetaListByGameId(
            game_id
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaByGameId(
            string game_id
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByGameId(
            string game_id
        ) {
            return CachedGetGameKeyMetaListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListByKeyByGameId(
            string key
            , string game_id
        )  {
            return act.GetGameKeyMetaListByKeyByGameId(
            key
            , game_id
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaByKeyByGameId(
            string key
            , string game_id
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListByKeyByGameId(
            key
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByKeyByGameId(
            string key
            , string game_id
        ) {
            return CachedGetGameKeyMetaListByKeyByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , game_id
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByKeyByGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListByKeyByGameId(
                    key
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListByCodeByLevel(
            string code
            , string level
        )  {
            return act.GetGameKeyMetaListByCodeByLevel(
            code
            , level
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaByCodeByLevel(
            string code
            , string level
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListByCodeByLevel(
            code
            , level
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByCodeByLevel(
            string code
            , string level
        ) {
            return CachedGetGameKeyMetaListByCodeByLevel(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , level
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByCodeByLevel(
            bool overrideCache
            , int cacheHours
            , string code
            , string level
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListByCodeByLevel(
                    code
                    , level
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevel(
        )  {            
            return act.CountGameLevel(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByUuid(
            string uuid
        )  {            
            return act.CountGameLevelByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByCode(
            string code
        )  {            
            return act.CountGameLevelByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByName(
            string name
        )  {            
            return act.CountGameLevelByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByKey(
            string key
        )  {            
            return act.CountGameLevelByKey(
            key
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByGameId(
            string game_id
        )  {            
            return act.CountGameLevelByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.CountGameLevelByKeyByGameId(
            key
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameLevelResult BrowseGameLevelListByFilter(SearchFilter obj)  {
            return act.BrowseGameLevelListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLevelByUuid(string set_type, GameLevel obj)  {
            return act.SetGameLevelByUuid(set_type, obj);
        }
        
        public virtual bool SetGameLevelByUuid(SetType set_type, GameLevel obj)  {
            return act.SetGameLevelByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLevelByUuid(GameLevel obj)  {
            return act.SetGameLevelByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLevelByKeyByGameId(string set_type, GameLevel obj)  {
            return act.SetGameLevelByKeyByGameId(set_type, obj);
        }
        
        public virtual bool SetGameLevelByKeyByGameId(SetType set_type, GameLevel obj)  {
            return act.SetGameLevelByKeyByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLevelByKeyByGameId(GameLevel obj)  {
            return act.SetGameLevelByKeyByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLevelByUuid(
            string uuid
        )  {            
            return act.DelGameLevelByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLevelByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.DelGameLevelByKeyByGameId(
            key
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListByUuid(
            string uuid
        )  {
            return act.GetGameLevelListByUuid(
            uuid
            );
        }
        
        public virtual GameLevel GetGameLevelByUuid(
            string uuid
        )  {
            foreach (GameLevel item in GetGameLevelListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByUuid(
            string uuid
        ) {
            return CachedGetGameLevelListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListByCode(
            string code
        )  {
            return act.GetGameLevelListByCode(
            code
            );
        }
        
        public virtual GameLevel GetGameLevelByCode(
            string code
        )  {
            foreach (GameLevel item in GetGameLevelListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByCode(
            string code
        ) {
            return CachedGetGameLevelListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListByName(
            string name
        )  {
            return act.GetGameLevelListByName(
            name
            );
        }
        
        public virtual GameLevel GetGameLevelByName(
            string name
        )  {
            foreach (GameLevel item in GetGameLevelListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByName(
            string name
        ) {
            return CachedGetGameLevelListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListByKey(
            string key
        )  {
            return act.GetGameLevelListByKey(
            key
            );
        }
        
        public virtual GameLevel GetGameLevelByKey(
            string key
        )  {
            foreach (GameLevel item in GetGameLevelListByKey(
            key
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByKey(
            string key
        ) {
            return CachedGetGameLevelListByKey(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByKey(
            bool overrideCache
            , int cacheHours
            , string key
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListByKey(
                    key
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListByGameId(
            string game_id
        )  {
            return act.GetGameLevelListByGameId(
            game_id
            );
        }
        
        public virtual GameLevel GetGameLevelByGameId(
            string game_id
        )  {
            foreach (GameLevel item in GetGameLevelListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByGameId(
            string game_id
        ) {
            return CachedGetGameLevelListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListByKeyByGameId(
            string key
            , string game_id
        )  {
            return act.GetGameLevelListByKeyByGameId(
            key
            , game_id
            );
        }
        
        public virtual GameLevel GetGameLevelByKeyByGameId(
            string key
            , string game_id
        )  {
            foreach (GameLevel item in GetGameLevelListByKeyByGameId(
            key
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByKeyByGameId(
            string key
            , string game_id
        ) {
            return CachedGetGameLevelListByKeyByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , game_id
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByKeyByGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListByKeyByGameId(
                    key
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievement(
        )  {            
            return act.CountGameAchievement(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementByUuid(
            string uuid
        )  {            
            return act.CountGameAchievementByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementByProfileIdByKey(
            string profile_id
            , string key
        )  {            
            return act.CountGameAchievementByProfileIdByKey(
            profile_id
            , key
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementByUsername(
            string username
        )  {            
            return act.CountGameAchievementByUsername(
            username
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {            
            return act.CountGameAchievementByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return act.CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameAchievementResult BrowseGameAchievementListByFilter(SearchFilter obj)  {
            return act.BrowseGameAchievementListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementByUuid(string set_type, GameAchievement obj)  {
            return act.SetGameAchievementByUuid(set_type, obj);
        }
        
        public virtual bool SetGameAchievementByUuid(SetType set_type, GameAchievement obj)  {
            return act.SetGameAchievementByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAchievementByUuid(GameAchievement obj)  {
            return act.SetGameAchievementByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementByUuidByKey(string set_type, GameAchievement obj)  {
            return act.SetGameAchievementByUuidByKey(set_type, obj);
        }
        
        public virtual bool SetGameAchievementByUuidByKey(SetType set_type, GameAchievement obj)  {
            return act.SetGameAchievementByUuidByKey(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAchievementByUuidByKey(GameAchievement obj)  {
            return act.SetGameAchievementByUuidByKey(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementByProfileIdByKey(string set_type, GameAchievement obj)  {
            return act.SetGameAchievementByProfileIdByKey(set_type, obj);
        }
        
        public virtual bool SetGameAchievementByProfileIdByKey(SetType set_type, GameAchievement obj)  {
            return act.SetGameAchievementByProfileIdByKey(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAchievementByProfileIdByKey(GameAchievement obj)  {
            return act.SetGameAchievementByProfileIdByKey(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementByKeyByProfileIdByGameId(string set_type, GameAchievement obj)  {
            return act.SetGameAchievementByKeyByProfileIdByGameId(set_type, obj);
        }
        
        public virtual bool SetGameAchievementByKeyByProfileIdByGameId(SetType set_type, GameAchievement obj)  {
            return act.SetGameAchievementByKeyByProfileIdByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAchievementByKeyByProfileIdByGameId(GameAchievement obj)  {
            return act.SetGameAchievementByKeyByProfileIdByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(string set_type, GameAchievement obj)  {
            return act.SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(SetType set_type, GameAchievement obj)  {
            return act.SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(GameAchievement obj)  {
            return act.SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementByUuid(
            string uuid
        )  {            
            return act.DelGameAchievementByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementByProfileIdByKey(
            string profile_id
            , string key
        )  {            
            return act.DelGameAchievementByProfileIdByKey(
            profile_id
            , key
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementByUuidByKey(
            string uuid
            , string key
        )  {            
            return act.DelGameAchievementByUuidByKey(
            uuid
            , key
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievement> GetGameAchievementListByUuid(
            string uuid
        )  {
            return act.GetGameAchievementListByUuid(
            uuid
            );
        }
        
        public virtual GameAchievement GetGameAchievementByUuid(
            string uuid
        )  {
            foreach (GameAchievement item in GetGameAchievementListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByUuid(
            string uuid
        ) {
            return CachedGetGameAchievementListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievement> GetGameAchievementListByProfileIdByKey(
            string profile_id
            , string key
        )  {
            return act.GetGameAchievementListByProfileIdByKey(
            profile_id
            , key
            );
        }
        
        public virtual GameAchievement GetGameAchievementByProfileIdByKey(
            string profile_id
            , string key
        )  {
            foreach (GameAchievement item in GetGameAchievementListByProfileIdByKey(
            profile_id
            , key
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByProfileIdByKey(
            string profile_id
            , string key
        ) {
            return CachedGetGameAchievementListByProfileIdByKey(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , key
                );
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByProfileIdByKey(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string key
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementListByProfileIdByKey(
                    profile_id
                    , key
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievement> GetGameAchievementListByUsername(
            string username
        )  {
            return act.GetGameAchievementListByUsername(
            username
            );
        }
        
        public virtual GameAchievement GetGameAchievementByUsername(
            string username
        )  {
            foreach (GameAchievement item in GetGameAchievementListByUsername(
            username
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByUsername(
            string username
        ) {
            return CachedGetGameAchievementListByUsername(
                    false
                    , CACHE_DEFAULT_HOURS
                    , username
                );
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByUsername(
            bool overrideCache
            , int cacheHours
            , string username
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementListByUsername(
                    username
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievement> GetGameAchievementListByKey(
            string key
        )  {
            return act.GetGameAchievementListByKey(
            key
            );
        }
        
        public virtual GameAchievement GetGameAchievementByKey(
            string key
        )  {
            foreach (GameAchievement item in GetGameAchievementListByKey(
            key
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByKey(
            string key
        ) {
            return CachedGetGameAchievementListByKey(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                );
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByKey(
            bool overrideCache
            , int cacheHours
            , string key
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementListByKey(
                    key
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievement> GetGameAchievementListByGameId(
            string game_id
        )  {
            return act.GetGameAchievementListByGameId(
            game_id
            );
        }
        
        public virtual GameAchievement GetGameAchievementByGameId(
            string game_id
        )  {
            foreach (GameAchievement item in GetGameAchievementListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByGameId(
            string game_id
        ) {
            return CachedGetGameAchievementListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievement> GetGameAchievementListByKeyByGameId(
            string key
            , string game_id
        )  {
            return act.GetGameAchievementListByKeyByGameId(
            key
            , game_id
            );
        }
        
        public virtual GameAchievement GetGameAchievementByKeyByGameId(
            string key
            , string game_id
        )  {
            foreach (GameAchievement item in GetGameAchievementListByKeyByGameId(
            key
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByKeyByGameId(
            string key
            , string game_id
        ) {
            return CachedGetGameAchievementListByKeyByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , game_id
                );
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByKeyByGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementListByKeyByGameId(
                    key
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievement> GetGameAchievementListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameAchievementListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameAchievement GetGameAchievementByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameAchievement item in GetGameAchievementListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameAchievementListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievement> GetGameAchievementListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameAchievementListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameAchievement GetGameAchievementByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameAchievement item in GetGameAchievementListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameAchievementListByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementListByProfileIdByGameIdByTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievement> GetGameAchievementListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            return act.GetGameAchievementListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            );
        }
        
        public virtual GameAchievement GetGameAchievementByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            foreach (GameAchievement item in GetGameAchievementListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        ) {
            return CachedGetGameAchievementListByKeyByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByKeyByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementListByKeyByProfileIdByGameId(
                    key
                    , profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievement> GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameAchievement GetGameAchievementByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameAchievement item in GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameAchievement> CachedGetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string key
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMeta(
        )  {            
            return act.CountGameAchievementMeta(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByUuid(
            string uuid
        )  {            
            return act.CountGameAchievementMetaByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByCode(
            string code
        )  {            
            return act.CountGameAchievementMetaByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByName(
            string name
        )  {            
            return act.CountGameAchievementMetaByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByKey(
            string key
        )  {            
            return act.CountGameAchievementMetaByKey(
            key
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByGameId(
            string game_id
        )  {            
            return act.CountGameAchievementMetaByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.CountGameAchievementMetaByKeyByGameId(
            key
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameAchievementMetaResult BrowseGameAchievementMetaListByFilter(SearchFilter obj)  {
            return act.BrowseGameAchievementMetaListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementMetaByUuid(string set_type, GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaByUuid(set_type, obj);
        }
        
        public virtual bool SetGameAchievementMetaByUuid(SetType set_type, GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAchievementMetaByUuid(GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementMetaByKeyByGameId(string set_type, GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaByKeyByGameId(set_type, obj);
        }
        
        public virtual bool SetGameAchievementMetaByKeyByGameId(SetType set_type, GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaByKeyByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAchievementMetaByKeyByGameId(GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaByKeyByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementMetaByUuid(
            string uuid
        )  {            
            return act.DelGameAchievementMetaByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementMetaByKeyByGameId(
            string key
            , string game_id
        )  {            
            return act.DelGameAchievementMetaByKeyByGameId(
            key
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByUuid(
            string uuid
        )  {
            return act.GetGameAchievementMetaListByUuid(
            uuid
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaByUuid(
            string uuid
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByUuid(
            string uuid
        ) {
            return CachedGetGameAchievementMetaListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByCode(
            string code
        )  {
            return act.GetGameAchievementMetaListByCode(
            code
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaByCode(
            string code
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByCode(
            string code
        ) {
            return CachedGetGameAchievementMetaListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByName(
            string name
        )  {
            return act.GetGameAchievementMetaListByName(
            name
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaByName(
            string name
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByName(
            string name
        ) {
            return CachedGetGameAchievementMetaListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByKey(
            string key
        )  {
            return act.GetGameAchievementMetaListByKey(
            key
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaByKey(
            string key
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListByKey(
            key
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByKey(
            string key
        ) {
            return CachedGetGameAchievementMetaListByKey(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByKey(
            bool overrideCache
            , int cacheHours
            , string key
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListByKey(
                    key
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByGameId(
            string game_id
        )  {
            return act.GetGameAchievementMetaListByGameId(
            game_id
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaByGameId(
            string game_id
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByGameId(
            string game_id
        ) {
            return CachedGetGameAchievementMetaListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByKeyByGameId(
            string key
            , string game_id
        )  {
            return act.GetGameAchievementMetaListByKeyByGameId(
            key
            , game_id
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaByKeyByGameId(
            string key
            , string game_id
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListByKeyByGameId(
            key
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByKeyByGameId(
            string key
            , string game_id
        ) {
            return CachedGetGameAchievementMetaListByKeyByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , game_id
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByKeyByGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListByKeyByGameId(
                    key
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
    }
}






