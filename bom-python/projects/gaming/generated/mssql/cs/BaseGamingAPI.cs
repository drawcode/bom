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

using gaming;
using gaming.ent;

namespace gaming {

    public class BaseGamingAPI {
        BaseGamingACT act = new BaseGamingACT();
        
        public int CACHE_DEFAULT_HOURS = 12;
        
        public string DEFAULT_SET_TYPE = "full";
        
        public BaseGamingAPI(){
        
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
        public virtual int CountGameNetwork(
        )  {            
            return act.CountGameNetwork(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkByUuid(
            string uuid
        )  {            
            return act.CountGameNetworkByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkByCode(
            string code
        )  {            
            return act.CountGameNetworkByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkByUuidByType(
            string uuid
            , string type
        )  {            
            return act.CountGameNetworkByUuidByType(
            uuid
            , type
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameNetworkResult BrowseGameNetworkListByFilter(SearchFilter obj)  {
            return act.BrowseGameNetworkListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkByUuid(string set_type, GameNetwork obj)  {
            return act.SetGameNetworkByUuid(set_type, obj);
        }
        
        public virtual bool SetGameNetworkByUuid(SetType set_type, GameNetwork obj)  {
            return act.SetGameNetworkByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameNetworkByUuid(GameNetwork obj)  {
            return act.SetGameNetworkByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkByCode(string set_type, GameNetwork obj)  {
            return act.SetGameNetworkByCode(set_type, obj);
        }
        
        public virtual bool SetGameNetworkByCode(SetType set_type, GameNetwork obj)  {
            return act.SetGameNetworkByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameNetworkByCode(GameNetwork obj)  {
            return act.SetGameNetworkByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameNetworkByUuid(
            string uuid
        )  {            
            return act.DelGameNetworkByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameNetwork> GetGameNetworkList(
        )  {
            return act.GetGameNetworkList(
            );
        }
        
        public virtual GameNetwork GetGameNetwork(
        )  {
            foreach (GameNetwork item in GetGameNetworkList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkList(
        ) {
            return CachedGetGameNetworkList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameNetwork> objs;

            string method_name = "CachedGetGameNetworkList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameNetwork>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameNetwork> GetGameNetworkListByUuid(
            string uuid
        )  {
            return act.GetGameNetworkListByUuid(
            uuid
            );
        }
        
        public virtual GameNetwork GetGameNetworkByUuid(
            string uuid
        )  {
            foreach (GameNetwork item in GetGameNetworkListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListByUuid(
            string uuid
        ) {
            return CachedGetGameNetworkListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameNetwork> GetGameNetworkListByCode(
            string code
        )  {
            return act.GetGameNetworkListByCode(
            code
            );
        }
        
        public virtual GameNetwork GetGameNetworkByCode(
            string code
        )  {
            foreach (GameNetwork item in GetGameNetworkListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListByCode(
            string code
        ) {
            return CachedGetGameNetworkListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameNetwork> GetGameNetworkListByUuidByType(
            string uuid
            , string type
        )  {
            return act.GetGameNetworkListByUuidByType(
            uuid
            , type
            );
        }
        
        public virtual GameNetwork GetGameNetworkByUuidByType(
            string uuid
            , string type
        )  {
            foreach (GameNetwork item in GetGameNetworkListByUuidByType(
            uuid
            , type
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListByUuidByType(
            string uuid
            , string type
        ) {
            return CachedGetGameNetworkListByUuidByType(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , type
                );
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListByUuidByType(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string type
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkListByUuidByType(
                    uuid
                    , type
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkAuth(
        )  {            
            return act.CountGameNetworkAuth(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkAuthByUuid(
            string uuid
        )  {            
            return act.CountGameNetworkAuthByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkAuthByGameIdByGameNetworkId(
            string game_id
            , string game_network_id
        )  {            
            return act.CountGameNetworkAuthByGameIdByGameNetworkId(
            game_id
            , game_network_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameNetworkAuthResult BrowseGameNetworkAuthListByFilter(SearchFilter obj)  {
            return act.BrowseGameNetworkAuthListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkAuthByUuid(string set_type, GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthByUuid(set_type, obj);
        }
        
        public virtual bool SetGameNetworkAuthByUuid(SetType set_type, GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameNetworkAuthByUuid(GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkAuthByGameIdByGameNetworkId(string set_type, GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthByGameIdByGameNetworkId(set_type, obj);
        }
        
        public virtual bool SetGameNetworkAuthByGameIdByGameNetworkId(SetType set_type, GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthByGameIdByGameNetworkId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameNetworkAuthByGameIdByGameNetworkId(GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthByGameIdByGameNetworkId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameNetworkAuthByUuid(
            string uuid
        )  {            
            return act.DelGameNetworkAuthByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameNetworkAuth> GetGameNetworkAuthList(
        )  {
            return act.GetGameNetworkAuthList(
            );
        }
        
        public virtual GameNetworkAuth GetGameNetworkAuth(
        )  {
            foreach (GameNetworkAuth item in GetGameNetworkAuthList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetworkAuth> CachedGetGameNetworkAuthList(
        ) {
            return CachedGetGameNetworkAuthList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameNetworkAuth> CachedGetGameNetworkAuthList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameNetworkAuth> objs;

            string method_name = "CachedGetGameNetworkAuthList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameNetworkAuth>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkAuthList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameNetworkAuth> GetGameNetworkAuthListByUuid(
            string uuid
        )  {
            return act.GetGameNetworkAuthListByUuid(
            uuid
            );
        }
        
        public virtual GameNetworkAuth GetGameNetworkAuthByUuid(
            string uuid
        )  {
            foreach (GameNetworkAuth item in GetGameNetworkAuthListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetworkAuth> CachedGetGameNetworkAuthListByUuid(
            string uuid
        ) {
            return CachedGetGameNetworkAuthListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameNetworkAuth> CachedGetGameNetworkAuthListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkAuthListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameNetworkAuth> GetGameNetworkAuthListByGameIdByGameNetworkId(
            string game_id
            , string game_network_id
        )  {
            return act.GetGameNetworkAuthListByGameIdByGameNetworkId(
            game_id
            , game_network_id
            );
        }
        
        public virtual GameNetworkAuth GetGameNetworkAuthByGameIdByGameNetworkId(
            string game_id
            , string game_network_id
        )  {
            foreach (GameNetworkAuth item in GetGameNetworkAuthListByGameIdByGameNetworkId(
            game_id
            , game_network_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetworkAuth> CachedGetGameNetworkAuthListByGameIdByGameNetworkId(
            string game_id
            , string game_network_id
        ) {
            return CachedGetGameNetworkAuthListByGameIdByGameNetworkId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , game_network_id
                );
        }
        
        public virtual List<GameNetworkAuth> CachedGetGameNetworkAuthListByGameIdByGameNetworkId(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string game_network_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkAuthListByGameIdByGameNetworkId(
                    game_id
                    , game_network_id
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
        public virtual int CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {            
            return act.CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            profile_id
            , game_id
            , game_network_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {            
            return act.CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
            network_username
            , game_id
            , game_network_id
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
        public virtual bool SetProfileGameNetworkByProfileIdByGameId(string set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByProfileIdByGameId(set_type, obj);
        }
        
        public virtual bool SetProfileGameNetworkByProfileIdByGameId(SetType set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByProfileIdByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameNetworkByProfileIdByGameId(ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByProfileIdByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(string set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(set_type, obj);
        }
        
        public virtual bool SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(SetType set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(string set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(set_type, obj);
        }
        
        public virtual bool SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(SetType set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(DEFAULT_SET_TYPE, obj);
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
        public virtual bool DelProfileGameNetworkByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelProfileGameNetworkByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {            
            return act.DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            profile_id
            , game_id
            , game_network_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {            
            return act.DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
            network_username
            , game_id
            , game_network_id
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
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            return act.GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
            profile_id
            , game_id
            , game_network_id
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
            profile_id
            , game_id
            , game_network_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        ) {
            return CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , game_network_id
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , string game_network_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
                    profile_id
                    , game_id
                    , game_network_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            return act.GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
            network_username
            , game_id
            , game_network_id
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
            network_username
            , game_id
            , game_network_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        ) {
            return CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , network_username
                    , game_id
                    , game_network_id
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
            bool overrideCache
            , int cacheHours
            , string network_username
            , string game_id
            , string game_network_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
                    network_username
                    , game_id
                    , game_network_id
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
        public virtual int CountGamePhoto(
        )  {            
            return act.CountGamePhoto(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoByUuid(
            string uuid
        )  {            
            return act.CountGamePhotoByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoByExternalId(
            string external_id
        )  {            
            return act.CountGamePhotoByExternalId(
            external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoByUrl(
            string url
        )  {            
            return act.CountGamePhotoByUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return act.CountGamePhotoByUrlByExternalId(
            url
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return act.CountGamePhotoByUuidByExternalId(
            uuid
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GamePhotoResult BrowseGamePhotoListByFilter(SearchFilter obj)  {
            return act.BrowseGamePhotoListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUuid(string set_type, GamePhoto obj)  {
            return act.SetGamePhotoByUuid(set_type, obj);
        }
        
        public virtual bool SetGamePhotoByUuid(SetType set_type, GamePhoto obj)  {
            return act.SetGamePhotoByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGamePhotoByUuid(GamePhoto obj)  {
            return act.SetGamePhotoByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByExternalId(string set_type, GamePhoto obj)  {
            return act.SetGamePhotoByExternalId(set_type, obj);
        }
        
        public virtual bool SetGamePhotoByExternalId(SetType set_type, GamePhoto obj)  {
            return act.SetGamePhotoByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGamePhotoByExternalId(GamePhoto obj)  {
            return act.SetGamePhotoByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUrl(string set_type, GamePhoto obj)  {
            return act.SetGamePhotoByUrl(set_type, obj);
        }
        
        public virtual bool SetGamePhotoByUrl(SetType set_type, GamePhoto obj)  {
            return act.SetGamePhotoByUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGamePhotoByUrl(GamePhoto obj)  {
            return act.SetGamePhotoByUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUrlByExternalId(string set_type, GamePhoto obj)  {
            return act.SetGamePhotoByUrlByExternalId(set_type, obj);
        }
        
        public virtual bool SetGamePhotoByUrlByExternalId(SetType set_type, GamePhoto obj)  {
            return act.SetGamePhotoByUrlByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGamePhotoByUrlByExternalId(GamePhoto obj)  {
            return act.SetGamePhotoByUrlByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUuidByExternalId(string set_type, GamePhoto obj)  {
            return act.SetGamePhotoByUuidByExternalId(set_type, obj);
        }
        
        public virtual bool SetGamePhotoByUuidByExternalId(SetType set_type, GamePhoto obj)  {
            return act.SetGamePhotoByUuidByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGamePhotoByUuidByExternalId(GamePhoto obj)  {
            return act.SetGamePhotoByUuidByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoByUuid(
            string uuid
        )  {            
            return act.DelGamePhotoByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoByExternalId(
            string external_id
        )  {            
            return act.DelGamePhotoByExternalId(
            external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoByUrl(
            string url
        )  {            
            return act.DelGamePhotoByUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return act.DelGamePhotoByUrlByExternalId(
            url
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return act.DelGamePhotoByUuidByExternalId(
            uuid
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GamePhoto> GetGamePhotoList(
        )  {
            return act.GetGamePhotoList(
            );
        }
        
        public virtual GamePhoto GetGamePhoto(
        )  {
            foreach (GamePhoto item in GetGamePhotoList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoList(
        ) {
            return CachedGetGamePhotoList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GamePhoto> objs;

            string method_name = "CachedGetGamePhotoList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GamePhoto>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GamePhoto> GetGamePhotoListByUuid(
            string uuid
        )  {
            return act.GetGamePhotoListByUuid(
            uuid
            );
        }
        
        public virtual GamePhoto GetGamePhotoByUuid(
            string uuid
        )  {
            foreach (GamePhoto item in GetGamePhotoListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListByUuid(
            string uuid
        ) {
            return CachedGetGamePhotoListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GamePhoto> GetGamePhotoListByExternalId(
            string external_id
        )  {
            return act.GetGamePhotoListByExternalId(
            external_id
            );
        }
        
        public virtual GamePhoto GetGamePhotoByExternalId(
            string external_id
        )  {
            foreach (GamePhoto item in GetGamePhotoListByExternalId(
            external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListByExternalId(
            string external_id
        ) {
            return CachedGetGamePhotoListByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , external_id
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListByExternalId(
            bool overrideCache
            , int cacheHours
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoListByExternalId(
                    external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GamePhoto> GetGamePhotoListByUrl(
            string url
        )  {
            return act.GetGamePhotoListByUrl(
            url
            );
        }
        
        public virtual GamePhoto GetGamePhotoByUrl(
            string url
        )  {
            foreach (GamePhoto item in GetGamePhotoListByUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListByUrl(
            string url
        ) {
            return CachedGetGamePhotoListByUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListByUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoListByUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GamePhoto> GetGamePhotoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            return act.GetGamePhotoListByUrlByExternalId(
            url
            , external_id
            );
        }
        
        public virtual GamePhoto GetGamePhotoByUrlByExternalId(
            string url
            , string external_id
        )  {
            foreach (GamePhoto item in GetGamePhotoListByUrlByExternalId(
            url
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListByUrlByExternalId(
            string url
            , string external_id
        ) {
            return CachedGetGamePhotoListByUrlByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , external_id
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListByUrlByExternalId(
            bool overrideCache
            , int cacheHours
            , string url
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoListByUrlByExternalId(
                    url
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GamePhoto> GetGamePhotoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            return act.GetGamePhotoListByUuidByExternalId(
            uuid
            , external_id
            );
        }
        
        public virtual GamePhoto GetGamePhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            foreach (GamePhoto item in GetGamePhotoListByUuidByExternalId(
            uuid
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListByUuidByExternalId(
            string uuid
            , string external_id
        ) {
            return CachedGetGamePhotoListByUuidByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , external_id
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListByUuidByExternalId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoListByUuidByExternalId(
                    uuid
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideo(
        )  {            
            return act.CountGameVideo(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoByUuid(
            string uuid
        )  {            
            return act.CountGameVideoByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoByExternalId(
            string external_id
        )  {            
            return act.CountGameVideoByExternalId(
            external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoByUrl(
            string url
        )  {            
            return act.CountGameVideoByUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return act.CountGameVideoByUrlByExternalId(
            url
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return act.CountGameVideoByUuidByExternalId(
            uuid
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameVideoResult BrowseGameVideoListByFilter(SearchFilter obj)  {
            return act.BrowseGameVideoListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUuid(string set_type, GameVideo obj)  {
            return act.SetGameVideoByUuid(set_type, obj);
        }
        
        public virtual bool SetGameVideoByUuid(SetType set_type, GameVideo obj)  {
            return act.SetGameVideoByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameVideoByUuid(GameVideo obj)  {
            return act.SetGameVideoByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByExternalId(string set_type, GameVideo obj)  {
            return act.SetGameVideoByExternalId(set_type, obj);
        }
        
        public virtual bool SetGameVideoByExternalId(SetType set_type, GameVideo obj)  {
            return act.SetGameVideoByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameVideoByExternalId(GameVideo obj)  {
            return act.SetGameVideoByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUrl(string set_type, GameVideo obj)  {
            return act.SetGameVideoByUrl(set_type, obj);
        }
        
        public virtual bool SetGameVideoByUrl(SetType set_type, GameVideo obj)  {
            return act.SetGameVideoByUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameVideoByUrl(GameVideo obj)  {
            return act.SetGameVideoByUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUrlByExternalId(string set_type, GameVideo obj)  {
            return act.SetGameVideoByUrlByExternalId(set_type, obj);
        }
        
        public virtual bool SetGameVideoByUrlByExternalId(SetType set_type, GameVideo obj)  {
            return act.SetGameVideoByUrlByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameVideoByUrlByExternalId(GameVideo obj)  {
            return act.SetGameVideoByUrlByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUuidByExternalId(string set_type, GameVideo obj)  {
            return act.SetGameVideoByUuidByExternalId(set_type, obj);
        }
        
        public virtual bool SetGameVideoByUuidByExternalId(SetType set_type, GameVideo obj)  {
            return act.SetGameVideoByUuidByExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameVideoByUuidByExternalId(GameVideo obj)  {
            return act.SetGameVideoByUuidByExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoByUuid(
            string uuid
        )  {            
            return act.DelGameVideoByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoByExternalId(
            string external_id
        )  {            
            return act.DelGameVideoByExternalId(
            external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoByUrl(
            string url
        )  {            
            return act.DelGameVideoByUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return act.DelGameVideoByUrlByExternalId(
            url
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return act.DelGameVideoByUuidByExternalId(
            uuid
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameVideo> GetGameVideoList(
        )  {
            return act.GetGameVideoList(
            );
        }
        
        public virtual GameVideo GetGameVideo(
        )  {
            foreach (GameVideo item in GetGameVideoList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoList(
        ) {
            return CachedGetGameVideoList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameVideo> objs;

            string method_name = "CachedGetGameVideoList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameVideo>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameVideo> GetGameVideoListByUuid(
            string uuid
        )  {
            return act.GetGameVideoListByUuid(
            uuid
            );
        }
        
        public virtual GameVideo GetGameVideoByUuid(
            string uuid
        )  {
            foreach (GameVideo item in GetGameVideoListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListByUuid(
            string uuid
        ) {
            return CachedGetGameVideoListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameVideo> GetGameVideoListByExternalId(
            string external_id
        )  {
            return act.GetGameVideoListByExternalId(
            external_id
            );
        }
        
        public virtual GameVideo GetGameVideoByExternalId(
            string external_id
        )  {
            foreach (GameVideo item in GetGameVideoListByExternalId(
            external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListByExternalId(
            string external_id
        ) {
            return CachedGetGameVideoListByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , external_id
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListByExternalId(
            bool overrideCache
            , int cacheHours
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoListByExternalId(
                    external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameVideo> GetGameVideoListByUrl(
            string url
        )  {
            return act.GetGameVideoListByUrl(
            url
            );
        }
        
        public virtual GameVideo GetGameVideoByUrl(
            string url
        )  {
            foreach (GameVideo item in GetGameVideoListByUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListByUrl(
            string url
        ) {
            return CachedGetGameVideoListByUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListByUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoListByUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameVideo> GetGameVideoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            return act.GetGameVideoListByUrlByExternalId(
            url
            , external_id
            );
        }
        
        public virtual GameVideo GetGameVideoByUrlByExternalId(
            string url
            , string external_id
        )  {
            foreach (GameVideo item in GetGameVideoListByUrlByExternalId(
            url
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListByUrlByExternalId(
            string url
            , string external_id
        ) {
            return CachedGetGameVideoListByUrlByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , external_id
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListByUrlByExternalId(
            bool overrideCache
            , int cacheHours
            , string url
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoListByUrlByExternalId(
                    url
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameVideo> GetGameVideoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            return act.GetGameVideoListByUuidByExternalId(
            uuid
            , external_id
            );
        }
        
        public virtual GameVideo GetGameVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            foreach (GameVideo item in GetGameVideoListByUuidByExternalId(
            uuid
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListByUuidByExternalId(
            string uuid
            , string external_id
        ) {
            return CachedGetGameVideoListByUuidByExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , external_id
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListByUuidByExternalId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoListByUuidByExternalId(
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
        public virtual int CountGameLeaderboard(
        )  {            
            return act.CountGameLeaderboard(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByUuid(
            string uuid
        )  {            
            return act.CountGameLeaderboardByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByGameId(
            string game_id
        )  {            
            return act.CountGameLeaderboardByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByCode(
            string code
        )  {            
            return act.CountGameLeaderboardByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameLeaderboardByCodeByGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.CountGameLeaderboardByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameLeaderboardByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameLeaderboardResult BrowseGameLeaderboardListByFilter(SearchFilter obj)  {
            return act.BrowseGameLeaderboardListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByUuid(string set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByUuid(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardByUuid(SetType set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardByUuid(GameLeaderboard obj)  {
            return act.SetGameLeaderboardByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(string set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(SetType set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(GameLeaderboard obj)  {
            return act.SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByCode(string set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCode(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardByCode(SetType set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardByCode(GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByCodeByGameId(string set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCodeByGameId(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardByCodeByGameId(SetType set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCodeByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardByCodeByGameId(GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCodeByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByCodeByGameIdByProfileId(string set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCodeByGameIdByProfileId(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardByCodeByGameIdByProfileId(SetType set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCodeByGameIdByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardByCodeByGameIdByProfileId(GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCodeByGameIdByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(string set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(SetType set_type, GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(GameLeaderboard obj)  {
            return act.SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByUuid(
            string uuid
        )  {            
            return act.DelGameLeaderboardByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByCode(
            string code
        )  {            
            return act.DelGameLeaderboardByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameLeaderboardByCodeByGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.DelGameLeaderboardByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameLeaderboardByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboard> GetGameLeaderboardList(
        )  {
            return act.GetGameLeaderboardList(
            );
        }
        
        public virtual GameLeaderboard GetGameLeaderboard(
        )  {
            foreach (GameLeaderboard item in GetGameLeaderboardList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardList(
        ) {
            return CachedGetGameLeaderboardList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameLeaderboard> objs;

            string method_name = "CachedGetGameLeaderboardList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameLeaderboard>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboard> GetGameLeaderboardListByUuid(
            string uuid
        )  {
            return act.GetGameLeaderboardListByUuid(
            uuid
            );
        }
        
        public virtual GameLeaderboard GetGameLeaderboardByUuid(
            string uuid
        )  {
            foreach (GameLeaderboard item in GetGameLeaderboardListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByUuid(
            string uuid
        ) {
            return CachedGetGameLeaderboardListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboard> GetGameLeaderboardListByGameId(
            string game_id
        )  {
            return act.GetGameLeaderboardListByGameId(
            game_id
            );
        }
        
        public virtual GameLeaderboard GetGameLeaderboardByGameId(
            string game_id
        )  {
            foreach (GameLeaderboard item in GetGameLeaderboardListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByGameId(
            string game_id
        ) {
            return CachedGetGameLeaderboardListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboard> GetGameLeaderboardListByCode(
            string code
        )  {
            return act.GetGameLeaderboardListByCode(
            code
            );
        }
        
        public virtual GameLeaderboard GetGameLeaderboardByCode(
            string code
        )  {
            foreach (GameLeaderboard item in GetGameLeaderboardListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByCode(
            string code
        ) {
            return CachedGetGameLeaderboardListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboard> GetGameLeaderboardListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameLeaderboardListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameLeaderboard GetGameLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameLeaderboard item in GetGameLeaderboardListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameLeaderboardListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardListByCodeByGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboard> GetGameLeaderboardListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return act.GetGameLeaderboardListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }
        
        public virtual GameLeaderboard GetGameLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            foreach (GameLeaderboard item in GetGameLeaderboardListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        ) {
            return CachedGetGameLeaderboardListByCodeByGameIdByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                );
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByCodeByGameIdByProfileId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardListByCodeByGameIdByProfileId(
                    code
                    , game_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboard> GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return act.GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }
        
        public virtual GameLeaderboard GetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            foreach (GameLeaderboard item in GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
            return CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                    , timestamp
                );
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboard> GetGameLeaderboardListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameLeaderboardListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameLeaderboard GetGameLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameLeaderboard item in GetGameLeaderboardListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameLeaderboardListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboard> GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameLeaderboard GetGameLeaderboardByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameLeaderboard item in GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameLeaderboard> CachedGetGameLeaderboardListByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItem(
        )  {            
            return act.CountGameLeaderboardItem(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByUuid(
            string uuid
        )  {            
            return act.CountGameLeaderboardItemByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByGameId(
            string game_id
        )  {            
            return act.CountGameLeaderboardItemByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByCode(
            string code
        )  {            
            return act.CountGameLeaderboardItemByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameLeaderboardItemByCodeByGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.CountGameLeaderboardItemByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameLeaderboardItemByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameLeaderboardItemResult BrowseGameLeaderboardItemListByFilter(SearchFilter obj)  {
            return act.BrowseGameLeaderboardItemListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByUuid(string set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByUuid(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardItemByUuid(SetType set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardItemByUuid(GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(string set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(SetType set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByCode(string set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCode(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardItemByCode(SetType set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardItemByCode(GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByCodeByGameId(string set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCodeByGameId(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardItemByCodeByGameId(SetType set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCodeByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardItemByCodeByGameId(GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCodeByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByCodeByGameIdByProfileId(string set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCodeByGameIdByProfileId(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardItemByCodeByGameIdByProfileId(SetType set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCodeByGameIdByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardItemByCodeByGameIdByProfileId(GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCodeByGameIdByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(string set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(SetType set_type, GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(GameLeaderboardItem obj)  {
            return act.SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByUuid(
            string uuid
        )  {            
            return act.DelGameLeaderboardItemByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByCode(
            string code
        )  {            
            return act.DelGameLeaderboardItemByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameLeaderboardItemByCodeByGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.DelGameLeaderboardItemByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameLeaderboardItemByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemList(
        )  {
            return act.GetGameLeaderboardItemList(
            );
        }
        
        public virtual GameLeaderboardItem GetGameLeaderboardItem(
        )  {
            foreach (GameLeaderboardItem item in GetGameLeaderboardItemList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemList(
        ) {
            return CachedGetGameLeaderboardItemList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameLeaderboardItem> objs;

            string method_name = "CachedGetGameLeaderboardItemList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameLeaderboardItem>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardItemList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByUuid(
            string uuid
        )  {
            return act.GetGameLeaderboardItemListByUuid(
            uuid
            );
        }
        
        public virtual GameLeaderboardItem GetGameLeaderboardItemByUuid(
            string uuid
        )  {
            foreach (GameLeaderboardItem item in GetGameLeaderboardItemListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByUuid(
            string uuid
        ) {
            return CachedGetGameLeaderboardItemListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardItemListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByGameId(
            string game_id
        )  {
            return act.GetGameLeaderboardItemListByGameId(
            game_id
            );
        }
        
        public virtual GameLeaderboardItem GetGameLeaderboardItemByGameId(
            string game_id
        )  {
            foreach (GameLeaderboardItem item in GetGameLeaderboardItemListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByGameId(
            string game_id
        ) {
            return CachedGetGameLeaderboardItemListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardItemListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByCode(
            string code
        )  {
            return act.GetGameLeaderboardItemListByCode(
            code
            );
        }
        
        public virtual GameLeaderboardItem GetGameLeaderboardItemByCode(
            string code
        )  {
            foreach (GameLeaderboardItem item in GetGameLeaderboardItemListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByCode(
            string code
        ) {
            return CachedGetGameLeaderboardItemListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardItemListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameLeaderboardItemListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameLeaderboardItem GetGameLeaderboardItemByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameLeaderboardItem item in GetGameLeaderboardItemListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameLeaderboardItemListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardItemListByCodeByGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return act.GetGameLeaderboardItemListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }
        
        public virtual GameLeaderboardItem GetGameLeaderboardItemByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            foreach (GameLeaderboardItem item in GetGameLeaderboardItemListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        ) {
            return CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                );
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByCodeByGameIdByProfileId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardItemListByCodeByGameIdByProfileId(
                    code
                    , game_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return act.GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }
        
        public virtual GameLeaderboardItem GetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            foreach (GameLeaderboardItem item in GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
            return CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                    , timestamp
                );
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameLeaderboardItemListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameLeaderboardItem GetGameLeaderboardItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameLeaderboardItem item in GetGameLeaderboardItemListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameLeaderboardItemListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardItemListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameLeaderboardItem GetGameLeaderboardItemByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameLeaderboardItem item in GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameLeaderboardItem> CachedGetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollup(
        )  {            
            return act.CountGameLeaderboardRollup(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByUuid(
            string uuid
        )  {            
            return act.CountGameLeaderboardRollupByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByGameId(
            string game_id
        )  {            
            return act.CountGameLeaderboardRollupByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByCode(
            string code
        )  {            
            return act.CountGameLeaderboardRollupByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameLeaderboardRollupByCodeByGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.CountGameLeaderboardRollupByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameLeaderboardRollupByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameLeaderboardRollupResult BrowseGameLeaderboardRollupListByFilter(SearchFilter obj)  {
            return act.BrowseGameLeaderboardRollupListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByUuid(string set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByUuid(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByUuid(SetType set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByUuid(GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(string set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(SetType set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByCode(string set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCode(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByCode(SetType set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByCode(GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByCodeByGameId(string set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCodeByGameId(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByCodeByGameId(SetType set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCodeByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByCodeByGameId(GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCodeByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByCodeByGameIdByProfileId(string set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCodeByGameIdByProfileId(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByCodeByGameIdByProfileId(SetType set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCodeByGameIdByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByCodeByGameIdByProfileId(GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCodeByGameIdByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(string set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(SetType set_type, GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(GameLeaderboardRollup obj)  {
            return act.SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByUuid(
            string uuid
        )  {            
            return act.DelGameLeaderboardRollupByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByCode(
            string code
        )  {            
            return act.DelGameLeaderboardRollupByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameLeaderboardRollupByCodeByGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.DelGameLeaderboardRollupByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameLeaderboardRollupByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupList(
        )  {
            return act.GetGameLeaderboardRollupList(
            );
        }
        
        public virtual GameLeaderboardRollup GetGameLeaderboardRollup(
        )  {
            foreach (GameLeaderboardRollup item in GetGameLeaderboardRollupList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupList(
        ) {
            return CachedGetGameLeaderboardRollupList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameLeaderboardRollup> objs;

            string method_name = "CachedGetGameLeaderboardRollupList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameLeaderboardRollup>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardRollupList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByUuid(
            string uuid
        )  {
            return act.GetGameLeaderboardRollupListByUuid(
            uuid
            );
        }
        
        public virtual GameLeaderboardRollup GetGameLeaderboardRollupByUuid(
            string uuid
        )  {
            foreach (GameLeaderboardRollup item in GetGameLeaderboardRollupListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByUuid(
            string uuid
        ) {
            return CachedGetGameLeaderboardRollupListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardRollupListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByGameId(
            string game_id
        )  {
            return act.GetGameLeaderboardRollupListByGameId(
            game_id
            );
        }
        
        public virtual GameLeaderboardRollup GetGameLeaderboardRollupByGameId(
            string game_id
        )  {
            foreach (GameLeaderboardRollup item in GetGameLeaderboardRollupListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByGameId(
            string game_id
        ) {
            return CachedGetGameLeaderboardRollupListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardRollupListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByCode(
            string code
        )  {
            return act.GetGameLeaderboardRollupListByCode(
            code
            );
        }
        
        public virtual GameLeaderboardRollup GetGameLeaderboardRollupByCode(
            string code
        )  {
            foreach (GameLeaderboardRollup item in GetGameLeaderboardRollupListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByCode(
            string code
        ) {
            return CachedGetGameLeaderboardRollupListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardRollupListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameLeaderboardRollupListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameLeaderboardRollup GetGameLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameLeaderboardRollup item in GetGameLeaderboardRollupListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameLeaderboardRollupListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardRollupListByCodeByGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return act.GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }
        
        public virtual GameLeaderboardRollup GetGameLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            foreach (GameLeaderboardRollup item in GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        ) {
            return CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                );
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
                    code
                    , game_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return act.GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }
        
        public virtual GameLeaderboardRollup GetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            foreach (GameLeaderboardRollup item in GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
            return CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                    , timestamp
                );
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameLeaderboardRollupListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameLeaderboardRollup GetGameLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameLeaderboardRollup item in GetGameLeaderboardRollupListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameLeaderboardRollupListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardRollupListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameLeaderboardRollup GetGameLeaderboardRollupByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameLeaderboardRollup item in GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameLeaderboardRollup> CachedGetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                    profile_id
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
        public virtual int CountGameProfileStatistic(
        )  {            
            return act.CountGameProfileStatistic(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByUuid(
            string uuid
        )  {            
            return act.CountGameProfileStatisticByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByCode(
            string code
        )  {            
            return act.CountGameProfileStatisticByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByGameId(
            string game_id
        )  {            
            return act.CountGameProfileStatisticByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameProfileStatisticByCodeByGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileStatisticByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileStatisticByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return act.CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProfileStatisticResult BrowseGameProfileStatisticListByFilter(SearchFilter obj)  {
            return act.BrowseGameProfileStatisticListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByUuid(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByUuid(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticByUuid(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticByUuid(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByProfileIdByCode(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByProfileIdByCode(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticByProfileIdByCode(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByProfileIdByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticByProfileIdByCode(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByProfileIdByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByProfileIdByCodeByTimestamp(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByProfileIdByCodeByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticByProfileIdByCodeByTimestamp(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByProfileIdByCodeByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticByProfileIdByCodeByTimestamp(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByProfileIdByCodeByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByCodeByProfileIdByGameId(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByCodeByProfileIdByGameId(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticByCodeByProfileIdByGameId(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByCodeByProfileIdByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticByCodeByProfileIdByGameId(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticByCodeByProfileIdByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticByUuid(
            string uuid
        )  {            
            return act.DelGameProfileStatisticByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameProfileStatisticByCodeByGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameProfileStatisticByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.DelGameProfileStatisticByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByUuid(
            string uuid
        )  {
            return act.GetGameProfileStatisticListByUuid(
            uuid
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticByUuid(
            string uuid
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByUuid(
            string uuid
        ) {
            return CachedGetGameProfileStatisticListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByCode(
            string code
        )  {
            return act.GetGameProfileStatisticListByCode(
            code
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticByCode(
            string code
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByCode(
            string code
        ) {
            return CachedGetGameProfileStatisticListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByGameId(
            string game_id
        )  {
            return act.GetGameProfileStatisticListByGameId(
            game_id
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticByGameId(
            string game_id
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByGameId(
            string game_id
        ) {
            return CachedGetGameProfileStatisticListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameProfileStatisticListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameProfileStatisticListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListByCodeByGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameProfileStatisticListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileStatisticListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return act.GetGameProfileStatisticListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileStatisticListByCodeByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByCodeByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListByCodeByProfileIdByGameId(
                    code
                    , profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        public virtual int CountGameStatisticMetaByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameStatisticMetaByCodeByGameId(
            code
            , game_id
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
        public virtual int CountGameStatisticMetaByGameId(
            string game_id
        )  {            
            return act.CountGameStatisticMetaByGameId(
            game_id
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
        public virtual bool SetGameStatisticMetaByCodeByGameId(string set_type, GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaByCodeByGameId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticMetaByCodeByGameId(SetType set_type, GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaByCodeByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticMetaByCodeByGameId(GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaByCodeByGameId(DEFAULT_SET_TYPE, obj);
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
        public virtual bool DelGameStatisticMetaByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameStatisticMetaByCodeByGameId(
            code
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
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameStatisticMetaListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameStatisticMetaListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListByCodeByGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItem(
        )  {            
            return act.CountGameProfileStatisticItem(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemByUuid(
            string uuid
        )  {            
            return act.CountGameProfileStatisticItemByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemByCode(
            string code
        )  {            
            return act.CountGameProfileStatisticItemByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemByGameId(
            string game_id
        )  {            
            return act.CountGameProfileStatisticItemByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameProfileStatisticItemByCodeByGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileStatisticItemByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileStatisticItemByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return act.CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProfileStatisticItemResult BrowseGameProfileStatisticItemListByFilter(SearchFilter obj)  {
            return act.BrowseGameProfileStatisticItemListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByUuid(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByUuid(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByUuid(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByUuid(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByProfileIdByCode(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByProfileIdByCode(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByProfileIdByCode(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByProfileIdByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByProfileIdByCode(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByProfileIdByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByCodeByProfileIdByGameId(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByCodeByProfileIdByGameId(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByCodeByProfileIdByGameId(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByCodeByProfileIdByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemByCodeByProfileIdByGameId(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemByCodeByProfileIdByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemByUuid(
            string uuid
        )  {            
            return act.DelGameProfileStatisticItemByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameProfileStatisticItemByCodeByGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameProfileStatisticItemByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.DelGameProfileStatisticItemByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByUuid(
            string uuid
        )  {
            return act.GetGameProfileStatisticItemListByUuid(
            uuid
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemByUuid(
            string uuid
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByUuid(
            string uuid
        ) {
            return CachedGetGameProfileStatisticItemListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticItemListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByCode(
            string code
        )  {
            return act.GetGameProfileStatisticItemListByCode(
            code
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemByCode(
            string code
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByCode(
            string code
        ) {
            return CachedGetGameProfileStatisticItemListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticItemListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByGameId(
            string game_id
        )  {
            return act.GetGameProfileStatisticItemListByGameId(
            game_id
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemByGameId(
            string game_id
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByGameId(
            string game_id
        ) {
            return CachedGetGameProfileStatisticItemListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticItemListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameProfileStatisticItemListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameProfileStatisticItemListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticItemListByCodeByGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameProfileStatisticItemListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileStatisticItemListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticItemListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return act.GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
                    code
                    , profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        public virtual int CountGameKeyMetaByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameKeyMetaByCodeByGameId(
            code
            , game_id
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
        public virtual bool SetGameKeyMetaByCodeByGameId(string set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaByCodeByGameId(set_type, obj);
        }
        
        public virtual bool SetGameKeyMetaByCodeByGameId(SetType set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaByCodeByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameKeyMetaByCodeByGameId(GameKeyMeta obj)  {
            return act.SetGameKeyMetaByCodeByGameId(DEFAULT_SET_TYPE, obj);
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
        public virtual bool DelGameKeyMetaByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameKeyMetaByCodeByGameId(
            code
            , game_id
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
        public virtual List<GameKeyMeta> GetGameKeyMetaListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameKeyMetaListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameKeyMetaListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListByCodeByGameId(
                    code
                    , game_id
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
        public virtual int CountGameLevelByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameLevelByCodeByGameId(
            code
            , game_id
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
        public virtual int CountGameLevelByGameId(
            string game_id
        )  {            
            return act.CountGameLevelByGameId(
            game_id
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
        public virtual bool SetGameLevelByCodeByGameId(string set_type, GameLevel obj)  {
            return act.SetGameLevelByCodeByGameId(set_type, obj);
        }
        
        public virtual bool SetGameLevelByCodeByGameId(SetType set_type, GameLevel obj)  {
            return act.SetGameLevelByCodeByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLevelByCodeByGameId(GameLevel obj)  {
            return act.SetGameLevelByCodeByGameId(DEFAULT_SET_TYPE, obj);
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
        public virtual bool DelGameLevelByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameLevelByCodeByGameId(
            code
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
        public virtual List<GameLevel> GetGameLevelListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameLevelListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameLevel GetGameLevelByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameLevel item in GetGameLevelListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameLevelListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListByCodeByGameId(
                    code
                    , game_id
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
        public virtual int CountGameProfileAchievement(
        )  {            
            return act.CountGameProfileAchievement(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementByUuid(
            string uuid
        )  {            
            return act.CountGameProfileAchievementByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementByProfileIdByCode(
            string profile_id
            , string code
        )  {            
            return act.CountGameProfileAchievementByProfileIdByCode(
            profile_id
            , code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementByUsername(
            string username
        )  {            
            return act.CountGameProfileAchievementByUsername(
            username
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileAchievementByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return act.CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProfileAchievementResult BrowseGameProfileAchievementListByFilter(SearchFilter obj)  {
            return act.BrowseGameProfileAchievementListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByUuid(string set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByUuid(set_type, obj);
        }
        
        public virtual bool SetGameProfileAchievementByUuid(SetType set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileAchievementByUuid(GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByUuidByCode(string set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByUuidByCode(set_type, obj);
        }
        
        public virtual bool SetGameProfileAchievementByUuidByCode(SetType set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByUuidByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileAchievementByUuidByCode(GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByUuidByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByProfileIdByCode(string set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByProfileIdByCode(set_type, obj);
        }
        
        public virtual bool SetGameProfileAchievementByProfileIdByCode(SetType set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByProfileIdByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileAchievementByProfileIdByCode(GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByProfileIdByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByCodeByProfileIdByGameId(string set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByCodeByProfileIdByGameId(set_type, obj);
        }
        
        public virtual bool SetGameProfileAchievementByCodeByProfileIdByGameId(SetType set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByCodeByProfileIdByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileAchievementByCodeByProfileIdByGameId(GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByCodeByProfileIdByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(SetType set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementByUuid(
            string uuid
        )  {            
            return act.DelGameProfileAchievementByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementByProfileIdByCode(
            string profile_id
            , string code
        )  {            
            return act.DelGameProfileAchievementByProfileIdByCode(
            profile_id
            , code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementByUuidByCode(
            string uuid
            , string code
        )  {            
            return act.DelGameProfileAchievementByUuidByCode(
            uuid
            , code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByUuid(
            string uuid
        )  {
            return act.GetGameProfileAchievementListByUuid(
            uuid
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementByUuid(
            string uuid
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByUuid(
            string uuid
        ) {
            return CachedGetGameProfileAchievementListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByProfileIdByCode(
            string profile_id
            , string code
        )  {
            return act.GetGameProfileAchievementListByProfileIdByCode(
            profile_id
            , code
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementByProfileIdByCode(
            string profile_id
            , string code
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListByProfileIdByCode(
            profile_id
            , code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByProfileIdByCode(
            string profile_id
            , string code
        ) {
            return CachedGetGameProfileAchievementListByProfileIdByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , code
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByProfileIdByCode(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListByProfileIdByCode(
                    profile_id
                    , code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByUsername(
            string username
        )  {
            return act.GetGameProfileAchievementListByUsername(
            username
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementByUsername(
            string username
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListByUsername(
            username
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByUsername(
            string username
        ) {
            return CachedGetGameProfileAchievementListByUsername(
                    false
                    , CACHE_DEFAULT_HOURS
                    , username
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByUsername(
            bool overrideCache
            , int cacheHours
            , string username
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListByUsername(
                    username
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByCode(
            string code
        )  {
            return act.GetGameProfileAchievementListByCode(
            code
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementByCode(
            string code
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByCode(
            string code
        ) {
            return CachedGetGameProfileAchievementListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByGameId(
            string game_id
        )  {
            return act.GetGameProfileAchievementListByGameId(
            game_id
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementByGameId(
            string game_id
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByGameId(
            string game_id
        ) {
            return CachedGetGameProfileAchievementListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameProfileAchievementListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameProfileAchievementListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListByCodeByGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameProfileAchievementListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileAchievementListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return act.GetGameProfileAchievementListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileAchievementListByCodeByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByCodeByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListByCodeByProfileIdByGameId(
                    code
                    , profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        public virtual int CountGameAchievementMetaByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameAchievementMetaByCodeByGameId(
            code
            , game_id
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
        public virtual int CountGameAchievementMetaByGameId(
            string game_id
        )  {            
            return act.CountGameAchievementMetaByGameId(
            game_id
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
        public virtual bool SetGameAchievementMetaByCodeByGameId(string set_type, GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaByCodeByGameId(set_type, obj);
        }
        
        public virtual bool SetGameAchievementMetaByCodeByGameId(SetType set_type, GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaByCodeByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAchievementMetaByCodeByGameId(GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaByCodeByGameId(DEFAULT_SET_TYPE, obj);
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
        public virtual bool DelGameAchievementMetaByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameAchievementMetaByCodeByGameId(
            code
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
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameAchievementMetaListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameAchievementMetaListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListByCodeByGameId(
                    code
                    , game_id
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
        public virtual int CountProfileReward(
        )  {            
            return act.CountProfileReward(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByUuid(
            string uuid
        )  {            
            return act.CountProfileRewardByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByProfileId(
            string profile_id
        )  {            
            return act.CountProfileRewardByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByRewardId(
            string reward_id
        )  {            
            return act.CountProfileRewardByRewardId(
            reward_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByProfileIdByRewardId(
            string profile_id
            , string reward_id
        )  {            
            return act.CountProfileRewardByProfileIdByRewardId(
            profile_id
            , reward_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByProfileIdByChannelId(
            string profile_id
            , string channel_id
        )  {            
            return act.CountProfileRewardByProfileIdByChannelId(
            profile_id
            , channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByProfileIdByChannelIdByRewardId(
            string profile_id
            , string channel_id
            , string reward_id
        )  {            
            return act.CountProfileRewardByProfileIdByChannelIdByRewardId(
            profile_id
            , channel_id
            , reward_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileRewardResult BrowseProfileRewardListByFilter(SearchFilter obj)  {
            return act.BrowseProfileRewardListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileRewardByUuid(string set_type, ProfileReward obj)  {
            return act.SetProfileRewardByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileRewardByUuid(SetType set_type, ProfileReward obj)  {
            return act.SetProfileRewardByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileRewardByUuid(ProfileReward obj)  {
            return act.SetProfileRewardByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileRewardByProfileIdByChannelIdByRewardId(string set_type, ProfileReward obj)  {
            return act.SetProfileRewardByProfileIdByChannelIdByRewardId(set_type, obj);
        }
        
        public virtual bool SetProfileRewardByProfileIdByChannelIdByRewardId(SetType set_type, ProfileReward obj)  {
            return act.SetProfileRewardByProfileIdByChannelIdByRewardId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileRewardByProfileIdByChannelIdByRewardId(ProfileReward obj)  {
            return act.SetProfileRewardByProfileIdByChannelIdByRewardId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileRewardByUuid(
            string uuid
        )  {            
            return act.DelProfileRewardByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileRewardByProfileIdByRewardId(
            string profile_id
            , string reward_id
        )  {            
            return act.DelProfileRewardByProfileIdByRewardId(
            profile_id
            , reward_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileReward> GetProfileRewardListByUuid(
            string uuid
        )  {
            return act.GetProfileRewardListByUuid(
            uuid
            );
        }
        
        public virtual ProfileReward GetProfileRewardByUuid(
            string uuid
        )  {
            foreach (ProfileReward item in GetProfileRewardListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByUuid(
            string uuid
        ) {
            return CachedGetProfileRewardListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileReward> GetProfileRewardListByProfileId(
            string profile_id
        )  {
            return act.GetProfileRewardListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileReward GetProfileRewardByProfileId(
            string profile_id
        )  {
            foreach (ProfileReward item in GetProfileRewardListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileRewardListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileReward> GetProfileRewardListByRewardId(
            string reward_id
        )  {
            return act.GetProfileRewardListByRewardId(
            reward_id
            );
        }
        
        public virtual ProfileReward GetProfileRewardByRewardId(
            string reward_id
        )  {
            foreach (ProfileReward item in GetProfileRewardListByRewardId(
            reward_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByRewardId(
            string reward_id
        ) {
            return CachedGetProfileRewardListByRewardId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , reward_id
                );
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByRewardId(
            bool overrideCache
            , int cacheHours
            , string reward_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardListByRewardId(
                    reward_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileReward> GetProfileRewardListByProfileIdByRewardId(
            string profile_id
            , string reward_id
        )  {
            return act.GetProfileRewardListByProfileIdByRewardId(
            profile_id
            , reward_id
            );
        }
        
        public virtual ProfileReward GetProfileRewardByProfileIdByRewardId(
            string profile_id
            , string reward_id
        )  {
            foreach (ProfileReward item in GetProfileRewardListByProfileIdByRewardId(
            profile_id
            , reward_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByProfileIdByRewardId(
            string profile_id
            , string reward_id
        ) {
            return CachedGetProfileRewardListByProfileIdByRewardId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , reward_id
                );
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByProfileIdByRewardId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string reward_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardListByProfileIdByRewardId(
                    profile_id
                    , reward_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileReward> GetProfileRewardListByProfileIdByChannelId(
            string profile_id
            , string channel_id
        )  {
            return act.GetProfileRewardListByProfileIdByChannelId(
            profile_id
            , channel_id
            );
        }
        
        public virtual ProfileReward GetProfileRewardByProfileIdByChannelId(
            string profile_id
            , string channel_id
        )  {
            foreach (ProfileReward item in GetProfileRewardListByProfileIdByChannelId(
            profile_id
            , channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByProfileIdByChannelId(
            string profile_id
            , string channel_id
        ) {
            return CachedGetProfileRewardListByProfileIdByChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , channel_id
                );
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByProfileIdByChannelId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardListByProfileIdByChannelId(
                    profile_id
                    , channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileReward> GetProfileRewardListByProfileIdByChannelIdByRewardId(
            string profile_id
            , string channel_id
            , string reward_id
        )  {
            return act.GetProfileRewardListByProfileIdByChannelIdByRewardId(
            profile_id
            , channel_id
            , reward_id
            );
        }
        
        public virtual ProfileReward GetProfileRewardByProfileIdByChannelIdByRewardId(
            string profile_id
            , string channel_id
            , string reward_id
        )  {
            foreach (ProfileReward item in GetProfileRewardListByProfileIdByChannelIdByRewardId(
            profile_id
            , channel_id
            , reward_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByProfileIdByChannelIdByRewardId(
            string profile_id
            , string channel_id
            , string reward_id
        ) {
            return CachedGetProfileRewardListByProfileIdByChannelIdByRewardId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , channel_id
                    , reward_id
                );
        }
        
        public virtual List<ProfileReward> CachedGetProfileRewardListByProfileIdByChannelIdByRewardId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string channel_id
            , string reward_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardListByProfileIdByChannelIdByRewardId(
                    profile_id
                    , channel_id
                    , reward_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountCoupon(
        )  {            
            return act.CountCoupon(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCouponByUuid(
            string uuid
        )  {            
            return act.CountCouponByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCouponByCode(
            string code
        )  {            
            return act.CountCouponByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCouponByName(
            string name
        )  {            
            return act.CountCouponByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCouponByOrgId(
            string org_id
        )  {            
            return act.CountCouponByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual CouponResult BrowseCouponListByFilter(SearchFilter obj)  {
            return act.BrowseCouponListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCouponByUuid(string set_type, Coupon obj)  {
            return act.SetCouponByUuid(set_type, obj);
        }
        
        public virtual bool SetCouponByUuid(SetType set_type, Coupon obj)  {
            return act.SetCouponByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetCouponByUuid(Coupon obj)  {
            return act.SetCouponByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelCouponByUuid(
            string uuid
        )  {            
            return act.DelCouponByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelCouponByOrgId(
            string org_id
        )  {            
            return act.DelCouponByOrgId(
            org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Coupon> GetCouponListByUuid(
            string uuid
        )  {
            return act.GetCouponListByUuid(
            uuid
            );
        }
        
        public virtual Coupon GetCouponByUuid(
            string uuid
        )  {
            foreach (Coupon item in GetCouponListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Coupon> CachedGetCouponListByUuid(
            string uuid
        ) {
            return CachedGetCouponListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Coupon> CachedGetCouponListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetCouponListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Coupon> GetCouponListByCode(
            string code
        )  {
            return act.GetCouponListByCode(
            code
            );
        }
        
        public virtual Coupon GetCouponByCode(
            string code
        )  {
            foreach (Coupon item in GetCouponListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Coupon> CachedGetCouponListByCode(
            string code
        ) {
            return CachedGetCouponListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Coupon> CachedGetCouponListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetCouponListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Coupon> GetCouponListByName(
            string name
        )  {
            return act.GetCouponListByName(
            name
            );
        }
        
        public virtual Coupon GetCouponByName(
            string name
        )  {
            foreach (Coupon item in GetCouponListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Coupon> CachedGetCouponListByName(
            string name
        ) {
            return CachedGetCouponListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Coupon> CachedGetCouponListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetCouponListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Coupon> GetCouponListByOrgId(
            string org_id
        )  {
            return act.GetCouponListByOrgId(
            org_id
            );
        }
        
        public virtual Coupon GetCouponByOrgId(
            string org_id
        )  {
            foreach (Coupon item in GetCouponListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Coupon> CachedGetCouponListByOrgId(
            string org_id
        ) {
            return CachedGetCouponListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<Coupon> CachedGetCouponListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetCouponListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileCoupon(
        )  {            
            return act.CountProfileCoupon(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileCouponByUuid(
            string uuid
        )  {            
            return act.CountProfileCouponByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileCouponByProfileId(
            string profile_id
        )  {            
            return act.CountProfileCouponByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileCouponResult BrowseProfileCouponListByFilter(SearchFilter obj)  {
            return act.BrowseProfileCouponListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileCouponByUuid(string set_type, ProfileCoupon obj)  {
            return act.SetProfileCouponByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileCouponByUuid(SetType set_type, ProfileCoupon obj)  {
            return act.SetProfileCouponByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileCouponByUuid(ProfileCoupon obj)  {
            return act.SetProfileCouponByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileCouponByUuid(
            string uuid
        )  {            
            return act.DelProfileCouponByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileCouponByProfileId(
            string profile_id
        )  {            
            return act.DelProfileCouponByProfileId(
            profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileCoupon> GetProfileCouponListByUuid(
            string uuid
        )  {
            return act.GetProfileCouponListByUuid(
            uuid
            );
        }
        
        public virtual ProfileCoupon GetProfileCouponByUuid(
            string uuid
        )  {
            foreach (ProfileCoupon item in GetProfileCouponListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileCoupon> CachedGetProfileCouponListByUuid(
            string uuid
        ) {
            return CachedGetProfileCouponListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileCoupon> CachedGetProfileCouponListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileCouponListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileCoupon> GetProfileCouponListByProfileId(
            string profile_id
        )  {
            return act.GetProfileCouponListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileCoupon GetProfileCouponByProfileId(
            string profile_id
        )  {
            foreach (ProfileCoupon item in GetProfileCouponListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileCoupon> CachedGetProfileCouponListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileCouponListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileCoupon> CachedGetProfileCouponListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileCouponListByProfileId(
                    profile_id
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
        public virtual int CountReward(
        )  {            
            return act.CountReward(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByUuid(
            string uuid
        )  {            
            return act.CountRewardByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByCode(
            string code
        )  {            
            return act.CountRewardByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByName(
            string name
        )  {            
            return act.CountRewardByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByOrgId(
            string org_id
        )  {            
            return act.CountRewardByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByChannelId(
            string channel_id
        )  {            
            return act.CountRewardByChannelId(
            channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {            
            return act.CountRewardByOrgIdByChannelId(
            org_id
            , channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual RewardResult BrowseRewardListByFilter(SearchFilter obj)  {
            return act.BrowseRewardListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetRewardByUuid(string set_type, Reward obj)  {
            return act.SetRewardByUuid(set_type, obj);
        }
        
        public virtual bool SetRewardByUuid(SetType set_type, Reward obj)  {
            return act.SetRewardByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetRewardByUuid(Reward obj)  {
            return act.SetRewardByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardByUuid(
            string uuid
        )  {            
            return act.DelRewardByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {            
            return act.DelRewardByOrgIdByChannelId(
            org_id
            , channel_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Reward> GetRewardListByUuid(
            string uuid
        )  {
            return act.GetRewardListByUuid(
            uuid
            );
        }
        
        public virtual Reward GetRewardByUuid(
            string uuid
        )  {
            foreach (Reward item in GetRewardListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Reward> CachedGetRewardListByUuid(
            string uuid
        ) {
            return CachedGetRewardListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Reward> CachedGetRewardListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Reward> GetRewardListByCode(
            string code
        )  {
            return act.GetRewardListByCode(
            code
            );
        }
        
        public virtual Reward GetRewardByCode(
            string code
        )  {
            foreach (Reward item in GetRewardListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Reward> CachedGetRewardListByCode(
            string code
        ) {
            return CachedGetRewardListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Reward> CachedGetRewardListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Reward> GetRewardListByName(
            string name
        )  {
            return act.GetRewardListByName(
            name
            );
        }
        
        public virtual Reward GetRewardByName(
            string name
        )  {
            foreach (Reward item in GetRewardListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Reward> CachedGetRewardListByName(
            string name
        ) {
            return CachedGetRewardListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Reward> CachedGetRewardListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Reward> GetRewardListByOrgId(
            string org_id
        )  {
            return act.GetRewardListByOrgId(
            org_id
            );
        }
        
        public virtual Reward GetRewardByOrgId(
            string org_id
        )  {
            foreach (Reward item in GetRewardListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Reward> CachedGetRewardListByOrgId(
            string org_id
        ) {
            return CachedGetRewardListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<Reward> CachedGetRewardListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Reward> GetRewardListByChannelId(
            string channel_id
        )  {
            return act.GetRewardListByChannelId(
            channel_id
            );
        }
        
        public virtual Reward GetRewardByChannelId(
            string channel_id
        )  {
            foreach (Reward item in GetRewardListByChannelId(
            channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Reward> CachedGetRewardListByChannelId(
            string channel_id
        ) {
            return CachedGetRewardListByChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                );
        }
        
        public virtual List<Reward> CachedGetRewardListByChannelId(
            bool overrideCache
            , int cacheHours
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardListByChannelId(
                    channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Reward> GetRewardListByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            return act.GetRewardListByOrgIdByChannelId(
            org_id
            , channel_id
            );
        }
        
        public virtual Reward GetRewardByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            foreach (Reward item in GetRewardListByOrgIdByChannelId(
            org_id
            , channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Reward> CachedGetRewardListByOrgIdByChannelId(
            string org_id
            , string channel_id
        ) {
            return CachedGetRewardListByOrgIdByChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , channel_id
                );
        }
        
        public virtual List<Reward> CachedGetRewardListByOrgIdByChannelId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardListByOrgIdByChannelId(
                    org_id
                    , channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountRewardType(
        )  {            
            return act.CountRewardType(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardTypeByUuid(
            string uuid
        )  {            
            return act.CountRewardTypeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardTypeByCode(
            string code
        )  {            
            return act.CountRewardTypeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardTypeByName(
            string name
        )  {            
            return act.CountRewardTypeByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardTypeByType(
            string type
        )  {            
            return act.CountRewardTypeByType(
            type
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual RewardTypeResult BrowseRewardTypeListByFilter(SearchFilter obj)  {
            return act.BrowseRewardTypeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetRewardTypeByUuid(string set_type, RewardType obj)  {
            return act.SetRewardTypeByUuid(set_type, obj);
        }
        
        public virtual bool SetRewardTypeByUuid(SetType set_type, RewardType obj)  {
            return act.SetRewardTypeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetRewardTypeByUuid(RewardType obj)  {
            return act.SetRewardTypeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardTypeByUuid(
            string uuid
        )  {            
            return act.DelRewardTypeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<RewardType> GetRewardTypeListByUuid(
            string uuid
        )  {
            return act.GetRewardTypeListByUuid(
            uuid
            );
        }
        
        public virtual RewardType GetRewardTypeByUuid(
            string uuid
        )  {
            foreach (RewardType item in GetRewardTypeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardType> CachedGetRewardTypeListByUuid(
            string uuid
        ) {
            return CachedGetRewardTypeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<RewardType> CachedGetRewardTypeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardTypeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardType> GetRewardTypeListByCode(
            string code
        )  {
            return act.GetRewardTypeListByCode(
            code
            );
        }
        
        public virtual RewardType GetRewardTypeByCode(
            string code
        )  {
            foreach (RewardType item in GetRewardTypeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardType> CachedGetRewardTypeListByCode(
            string code
        ) {
            return CachedGetRewardTypeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<RewardType> CachedGetRewardTypeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardTypeListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardType> GetRewardTypeListByName(
            string name
        )  {
            return act.GetRewardTypeListByName(
            name
            );
        }
        
        public virtual RewardType GetRewardTypeByName(
            string name
        )  {
            foreach (RewardType item in GetRewardTypeListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardType> CachedGetRewardTypeListByName(
            string name
        ) {
            return CachedGetRewardTypeListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<RewardType> CachedGetRewardTypeListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardTypeListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardType> GetRewardTypeListByType(
            string type
        )  {
            return act.GetRewardTypeListByType(
            type
            );
        }
        
        public virtual RewardType GetRewardTypeByType(
            string type
        )  {
            foreach (RewardType item in GetRewardTypeListByType(
            type
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardType> CachedGetRewardTypeListByType(
            string type
        ) {
            return CachedGetRewardTypeListByType(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type
                );
        }
        
        public virtual List<RewardType> CachedGetRewardTypeListByType(
            bool overrideCache
            , int cacheHours
            , string type
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardTypeListByType(
                    type
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCondition(
        )  {            
            return act.CountRewardCondition(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByUuid(
            string uuid
        )  {            
            return act.CountRewardConditionByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByCode(
            string code
        )  {            
            return act.CountRewardConditionByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByName(
            string name
        )  {            
            return act.CountRewardConditionByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByOrgId(
            string org_id
        )  {            
            return act.CountRewardConditionByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByChannelId(
            string channel_id
        )  {            
            return act.CountRewardConditionByChannelId(
            channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {            
            return act.CountRewardConditionByOrgIdByChannelId(
            org_id
            , channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        )  {            
            return act.CountRewardConditionByOrgIdByChannelIdByRewardId(
            org_id
            , channel_id
            , reward_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByRewardId(
            string reward_id
        )  {            
            return act.CountRewardConditionByRewardId(
            reward_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual RewardConditionResult BrowseRewardConditionListByFilter(SearchFilter obj)  {
            return act.BrowseRewardConditionListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetRewardConditionByUuid(string set_type, RewardCondition obj)  {
            return act.SetRewardConditionByUuid(set_type, obj);
        }
        
        public virtual bool SetRewardConditionByUuid(SetType set_type, RewardCondition obj)  {
            return act.SetRewardConditionByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetRewardConditionByUuid(RewardCondition obj)  {
            return act.SetRewardConditionByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardConditionByUuid(
            string uuid
        )  {            
            return act.DelRewardConditionByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardConditionByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        )  {            
            return act.DelRewardConditionByOrgIdByChannelIdByRewardId(
            org_id
            , channel_id
            , reward_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<RewardCondition> GetRewardConditionListByUuid(
            string uuid
        )  {
            return act.GetRewardConditionListByUuid(
            uuid
            );
        }
        
        public virtual RewardCondition GetRewardConditionByUuid(
            string uuid
        )  {
            foreach (RewardCondition item in GetRewardConditionListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByUuid(
            string uuid
        ) {
            return CachedGetRewardConditionListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCondition> GetRewardConditionListByCode(
            string code
        )  {
            return act.GetRewardConditionListByCode(
            code
            );
        }
        
        public virtual RewardCondition GetRewardConditionByCode(
            string code
        )  {
            foreach (RewardCondition item in GetRewardConditionListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByCode(
            string code
        ) {
            return CachedGetRewardConditionListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCondition> GetRewardConditionListByName(
            string name
        )  {
            return act.GetRewardConditionListByName(
            name
            );
        }
        
        public virtual RewardCondition GetRewardConditionByName(
            string name
        )  {
            foreach (RewardCondition item in GetRewardConditionListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByName(
            string name
        ) {
            return CachedGetRewardConditionListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCondition> GetRewardConditionListByOrgId(
            string org_id
        )  {
            return act.GetRewardConditionListByOrgId(
            org_id
            );
        }
        
        public virtual RewardCondition GetRewardConditionByOrgId(
            string org_id
        )  {
            foreach (RewardCondition item in GetRewardConditionListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByOrgId(
            string org_id
        ) {
            return CachedGetRewardConditionListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCondition> GetRewardConditionListByChannelId(
            string channel_id
        )  {
            return act.GetRewardConditionListByChannelId(
            channel_id
            );
        }
        
        public virtual RewardCondition GetRewardConditionByChannelId(
            string channel_id
        )  {
            foreach (RewardCondition item in GetRewardConditionListByChannelId(
            channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByChannelId(
            string channel_id
        ) {
            return CachedGetRewardConditionListByChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                );
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByChannelId(
            bool overrideCache
            , int cacheHours
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionListByChannelId(
                    channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCondition> GetRewardConditionListByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            return act.GetRewardConditionListByOrgIdByChannelId(
            org_id
            , channel_id
            );
        }
        
        public virtual RewardCondition GetRewardConditionByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            foreach (RewardCondition item in GetRewardConditionListByOrgIdByChannelId(
            org_id
            , channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByOrgIdByChannelId(
            string org_id
            , string channel_id
        ) {
            return CachedGetRewardConditionListByOrgIdByChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , channel_id
                );
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByOrgIdByChannelId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionListByOrgIdByChannelId(
                    org_id
                    , channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCondition> GetRewardConditionListByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        )  {
            return act.GetRewardConditionListByOrgIdByChannelIdByRewardId(
            org_id
            , channel_id
            , reward_id
            );
        }
        
        public virtual RewardCondition GetRewardConditionByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        )  {
            foreach (RewardCondition item in GetRewardConditionListByOrgIdByChannelIdByRewardId(
            org_id
            , channel_id
            , reward_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        ) {
            return CachedGetRewardConditionListByOrgIdByChannelIdByRewardId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , channel_id
                    , reward_id
                );
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByOrgIdByChannelIdByRewardId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string channel_id
            , string reward_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionListByOrgIdByChannelIdByRewardId(
                    org_id
                    , channel_id
                    , reward_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCondition> GetRewardConditionListByRewardId(
            string reward_id
        )  {
            return act.GetRewardConditionListByRewardId(
            reward_id
            );
        }
        
        public virtual RewardCondition GetRewardConditionByRewardId(
            string reward_id
        )  {
            foreach (RewardCondition item in GetRewardConditionListByRewardId(
            reward_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByRewardId(
            string reward_id
        ) {
            return CachedGetRewardConditionListByRewardId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , reward_id
                );
        }
        
        public virtual List<RewardCondition> CachedGetRewardConditionListByRewardId(
            bool overrideCache
            , int cacheHours
            , string reward_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionListByRewardId(
                    reward_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionType(
        )  {            
            return act.CountRewardConditionType(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionTypeByUuid(
            string uuid
        )  {            
            return act.CountRewardConditionTypeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionTypeByCode(
            string code
        )  {            
            return act.CountRewardConditionTypeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionTypeByName(
            string name
        )  {            
            return act.CountRewardConditionTypeByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionTypeByType(
            string type
        )  {            
            return act.CountRewardConditionTypeByType(
            type
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual RewardConditionTypeResult BrowseRewardConditionTypeListByFilter(SearchFilter obj)  {
            return act.BrowseRewardConditionTypeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetRewardConditionTypeByUuid(string set_type, RewardConditionType obj)  {
            return act.SetRewardConditionTypeByUuid(set_type, obj);
        }
        
        public virtual bool SetRewardConditionTypeByUuid(SetType set_type, RewardConditionType obj)  {
            return act.SetRewardConditionTypeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetRewardConditionTypeByUuid(RewardConditionType obj)  {
            return act.SetRewardConditionTypeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardConditionTypeByUuid(
            string uuid
        )  {            
            return act.DelRewardConditionTypeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<RewardConditionType> GetRewardConditionTypeListByUuid(
            string uuid
        )  {
            return act.GetRewardConditionTypeListByUuid(
            uuid
            );
        }
        
        public virtual RewardConditionType GetRewardConditionTypeByUuid(
            string uuid
        )  {
            foreach (RewardConditionType item in GetRewardConditionTypeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardConditionType> CachedGetRewardConditionTypeListByUuid(
            string uuid
        ) {
            return CachedGetRewardConditionTypeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<RewardConditionType> CachedGetRewardConditionTypeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionTypeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardConditionType> GetRewardConditionTypeListByCode(
            string code
        )  {
            return act.GetRewardConditionTypeListByCode(
            code
            );
        }
        
        public virtual RewardConditionType GetRewardConditionTypeByCode(
            string code
        )  {
            foreach (RewardConditionType item in GetRewardConditionTypeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardConditionType> CachedGetRewardConditionTypeListByCode(
            string code
        ) {
            return CachedGetRewardConditionTypeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<RewardConditionType> CachedGetRewardConditionTypeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionTypeListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardConditionType> GetRewardConditionTypeListByName(
            string name
        )  {
            return act.GetRewardConditionTypeListByName(
            name
            );
        }
        
        public virtual RewardConditionType GetRewardConditionTypeByName(
            string name
        )  {
            foreach (RewardConditionType item in GetRewardConditionTypeListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardConditionType> CachedGetRewardConditionTypeListByName(
            string name
        ) {
            return CachedGetRewardConditionTypeListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<RewardConditionType> CachedGetRewardConditionTypeListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionTypeListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardConditionType> GetRewardConditionTypeListByType(
            string type
        )  {
            return act.GetRewardConditionTypeListByType(
            type
            );
        }
        
        public virtual RewardConditionType GetRewardConditionTypeByType(
            string type
        )  {
            foreach (RewardConditionType item in GetRewardConditionTypeListByType(
            type
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardConditionType> CachedGetRewardConditionTypeListByType(
            string type
        ) {
            return CachedGetRewardConditionTypeListByType(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type
                );
        }
        
        public virtual List<RewardConditionType> CachedGetRewardConditionTypeListByType(
            bool overrideCache
            , int cacheHours
            , string type
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardConditionTypeListByType(
                    type
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
        public virtual int CountProfileRewardPoints(
        )  {            
            return act.CountProfileRewardPoints(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByUuid(
            string uuid
        )  {            
            return act.CountProfileRewardPointsByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByChannelId(
            string channel_id
        )  {            
            return act.CountProfileRewardPointsByChannelId(
            channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByOrgId(
            string org_id
        )  {            
            return act.CountProfileRewardPointsByOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByProfileId(
            string profile_id
        )  {            
            return act.CountProfileRewardPointsByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return act.CountProfileRewardPointsByChannelIdByOrgId(
            channel_id
            , org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {            
            return act.CountProfileRewardPointsByChannelIdByProfileId(
            channel_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileRewardPointsResult BrowseProfileRewardPointsListByFilter(SearchFilter obj)  {
            return act.BrowseProfileRewardPointsListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileRewardPointsByUuid(string set_type, ProfileRewardPoints obj)  {
            return act.SetProfileRewardPointsByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileRewardPointsByUuid(SetType set_type, ProfileRewardPoints obj)  {
            return act.SetProfileRewardPointsByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileRewardPointsByUuid(ProfileRewardPoints obj)  {
            return act.SetProfileRewardPointsByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileRewardPointsByUuid(
            string uuid
        )  {            
            return act.DelProfileRewardPointsByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileRewardPointsByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return act.DelProfileRewardPointsByChannelIdByOrgId(
            channel_id
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByUuid(
            string uuid
        )  {
            return act.GetProfileRewardPointsListByUuid(
            uuid
            );
        }
        
        public virtual ProfileRewardPoints GetProfileRewardPointsByUuid(
            string uuid
        )  {
            foreach (ProfileRewardPoints item in GetProfileRewardPointsListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByUuid(
            string uuid
        ) {
            return CachedGetProfileRewardPointsListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardPointsListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByChannelId(
            string channel_id
        )  {
            return act.GetProfileRewardPointsListByChannelId(
            channel_id
            );
        }
        
        public virtual ProfileRewardPoints GetProfileRewardPointsByChannelId(
            string channel_id
        )  {
            foreach (ProfileRewardPoints item in GetProfileRewardPointsListByChannelId(
            channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByChannelId(
            string channel_id
        ) {
            return CachedGetProfileRewardPointsListByChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                );
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByChannelId(
            bool overrideCache
            , int cacheHours
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardPointsListByChannelId(
                    channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByOrgId(
            string org_id
        )  {
            return act.GetProfileRewardPointsListByOrgId(
            org_id
            );
        }
        
        public virtual ProfileRewardPoints GetProfileRewardPointsByOrgId(
            string org_id
        )  {
            foreach (ProfileRewardPoints item in GetProfileRewardPointsListByOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByOrgId(
            string org_id
        ) {
            return CachedGetProfileRewardPointsListByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardPointsListByOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByProfileId(
            string profile_id
        )  {
            return act.GetProfileRewardPointsListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileRewardPoints GetProfileRewardPointsByProfileId(
            string profile_id
        )  {
            foreach (ProfileRewardPoints item in GetProfileRewardPointsListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileRewardPointsListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardPointsListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            return act.GetProfileRewardPointsListByChannelIdByOrgId(
            channel_id
            , org_id
            );
        }
        
        public virtual ProfileRewardPoints GetProfileRewardPointsByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            foreach (ProfileRewardPoints item in GetProfileRewardPointsListByChannelIdByOrgId(
            channel_id
            , org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByChannelIdByOrgId(
            string channel_id
            , string org_id
        ) {
            return CachedGetProfileRewardPointsListByChannelIdByOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , org_id
                );
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByChannelIdByOrgId(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardPointsListByChannelIdByOrgId(
                    channel_id
                    , org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            return act.GetProfileRewardPointsListByChannelIdByProfileId(
            channel_id
            , profile_id
            );
        }
        
        public virtual ProfileRewardPoints GetProfileRewardPointsByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            foreach (ProfileRewardPoints item in GetProfileRewardPointsListByChannelIdByProfileId(
            channel_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        ) {
            return CachedGetProfileRewardPointsListByChannelIdByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , profile_id
                );
        }
        
        public virtual List<ProfileRewardPoints> CachedGetProfileRewardPointsListByChannelIdByProfileId(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileRewardPointsListByChannelIdByProfileId(
                    channel_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByUuid(
            string uuid
        )  {            
            return act.CountRewardCompetitionByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByCode(
            string code
        )  {            
            return act.CountRewardCompetitionByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByName(
            string name
        )  {            
            return act.CountRewardCompetitionByName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByPath(
            string path
        )  {            
            return act.CountRewardCompetitionByPath(
            path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByChannelId(
            string channel_id
        )  {            
            return act.CountRewardCompetitionByChannelId(
            channel_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByChannelIdByCompleted(
            string channel_id
            , bool completed
        )  {            
            return act.CountRewardCompetitionByChannelIdByCompleted(
            channel_id
            , completed
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual RewardCompetitionResult BrowseRewardCompetitionListByFilter(SearchFilter obj)  {
            return act.BrowseRewardCompetitionListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetRewardCompetitionByUuid(string set_type, RewardCompetition obj)  {
            return act.SetRewardCompetitionByUuid(set_type, obj);
        }
        
        public virtual bool SetRewardCompetitionByUuid(SetType set_type, RewardCompetition obj)  {
            return act.SetRewardCompetitionByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetRewardCompetitionByUuid(RewardCompetition obj)  {
            return act.SetRewardCompetitionByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardCompetitionByUuid(
            string uuid
        )  {            
            return act.DelRewardCompetitionByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardCompetitionByCode(
            string code
        )  {            
            return act.DelRewardCompetitionByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardCompetitionByPathByChannelId(
            string path
            , string channel_id
        )  {            
            return act.DelRewardCompetitionByPathByChannelId(
            path
            , channel_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardCompetitionByPath(
            string path
        )  {            
            return act.DelRewardCompetitionByPath(
            path
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardCompetitionByChannelIdByPath(
            string channel_id
            , string path
        )  {            
            return act.DelRewardCompetitionByChannelIdByPath(
            channel_id
            , path
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<RewardCompetition> GetRewardCompetitionListByUuid(
            string uuid
        )  {
            return act.GetRewardCompetitionListByUuid(
            uuid
            );
        }
        
        public virtual RewardCompetition GetRewardCompetitionByUuid(
            string uuid
        )  {
            foreach (RewardCompetition item in GetRewardCompetitionListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByUuid(
            string uuid
        ) {
            return CachedGetRewardCompetitionListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardCompetitionListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCompetition> GetRewardCompetitionListByCode(
            string code
        )  {
            return act.GetRewardCompetitionListByCode(
            code
            );
        }
        
        public virtual RewardCompetition GetRewardCompetitionByCode(
            string code
        )  {
            foreach (RewardCompetition item in GetRewardCompetitionListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByCode(
            string code
        ) {
            return CachedGetRewardCompetitionListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardCompetitionListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCompetition> GetRewardCompetitionListByName(
            string name
        )  {
            return act.GetRewardCompetitionListByName(
            name
            );
        }
        
        public virtual RewardCompetition GetRewardCompetitionByName(
            string name
        )  {
            foreach (RewardCompetition item in GetRewardCompetitionListByName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByName(
            string name
        ) {
            return CachedGetRewardCompetitionListByName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardCompetitionListByName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCompetition> GetRewardCompetitionListByPath(
            string path
        )  {
            return act.GetRewardCompetitionListByPath(
            path
            );
        }
        
        public virtual RewardCompetition GetRewardCompetitionByPath(
            string path
        )  {
            foreach (RewardCompetition item in GetRewardCompetitionListByPath(
            path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByPath(
            string path
        ) {
            return CachedGetRewardCompetitionListByPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , path
                );
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByPath(
            bool overrideCache
            , int cacheHours
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardCompetitionListByPath(
                    path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCompetition> GetRewardCompetitionListByChannelId(
            string channel_id
        )  {
            return act.GetRewardCompetitionListByChannelId(
            channel_id
            );
        }
        
        public virtual RewardCompetition GetRewardCompetitionByChannelId(
            string channel_id
        )  {
            foreach (RewardCompetition item in GetRewardCompetitionListByChannelId(
            channel_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByChannelId(
            string channel_id
        ) {
            return CachedGetRewardCompetitionListByChannelId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                );
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByChannelId(
            bool overrideCache
            , int cacheHours
            , string channel_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardCompetitionListByChannelId(
                    channel_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCompetition> GetRewardCompetitionListByChannelIdByCompleted(
            string channel_id
            , bool completed
        )  {
            return act.GetRewardCompetitionListByChannelIdByCompleted(
            channel_id
            , completed
            );
        }
        
        public virtual RewardCompetition GetRewardCompetitionByChannelIdByCompleted(
            string channel_id
            , bool completed
        )  {
            foreach (RewardCompetition item in GetRewardCompetitionListByChannelIdByCompleted(
            channel_id
            , completed
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByChannelIdByCompleted(
            string channel_id
            , bool completed
        ) {
            return CachedGetRewardCompetitionListByChannelIdByCompleted(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , completed
                );
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByChannelIdByCompleted(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , bool completed
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardCompetitionListByChannelIdByCompleted(
                    channel_id
                    , completed
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<RewardCompetition> GetRewardCompetitionListByChannelIdByPath(
            string channel_id
            , string path
        )  {
            return act.GetRewardCompetitionListByChannelIdByPath(
            channel_id
            , path
            );
        }
        
        public virtual RewardCompetition GetRewardCompetitionByChannelIdByPath(
            string channel_id
            , string path
        )  {
            foreach (RewardCompetition item in GetRewardCompetitionListByChannelIdByPath(
            channel_id
            , path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByChannelIdByPath(
            string channel_id
            , string path
        ) {
            return CachedGetRewardCompetitionListByChannelIdByPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , channel_id
                    , path
                );
        }
        
        public virtual List<RewardCompetition> CachedGetRewardCompetitionListByChannelIdByPath(
            bool overrideCache
            , int cacheHours
            , string channel_id
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetRewardCompetitionListByChannelIdByPath(
                    channel_id
                    , path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
    }
}






