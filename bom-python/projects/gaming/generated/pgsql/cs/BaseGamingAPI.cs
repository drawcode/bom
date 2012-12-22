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
        public virtual int CountGameStatisticLeaderboardByGameId(
            string game_id
        )  {            
            return act.CountGameStatisticLeaderboardByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByCode(
            string code
        )  {            
            return act.CountGameStatisticLeaderboardByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardByCodeByGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.CountGameStatisticLeaderboardByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.CountGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
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
        public virtual bool SetGameStatisticLeaderboardByCode(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCode(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByCode(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByCode(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByCodeByGameId(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCodeByGameId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByCodeByGameId(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCodeByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByCodeByGameId(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCodeByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByCodeByGameIdByProfileId(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCodeByGameIdByProfileId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByCodeByGameIdByProfileId(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCodeByGameIdByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByCodeByGameIdByProfileId(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCodeByGameIdByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(DEFAULT_SET_TYPE, obj);
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
        public virtual bool DelGameStatisticLeaderboardByCode(
            string code
        )  {            
            return act.DelGameStatisticLeaderboardByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardByCodeByGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.DelGameStatisticLeaderboardByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.DelGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
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
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByCode(
            string code
        )  {
            return act.GetGameStatisticLeaderboardListByCode(
            code
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByCode(
            string code
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByCode(
            string code
        ) {
            return CachedGetGameStatisticLeaderboardListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListByCodeByGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return act.GetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        ) {
            return CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
                    code
                    , game_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        public virtual int CountGameStatisticLeaderboardRollup(
        )  {            
            return act.CountGameStatisticLeaderboardRollup(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByUuid(
            string uuid
        )  {            
            return act.CountGameStatisticLeaderboardRollupByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByGameId(
            string game_id
        )  {            
            return act.CountGameStatisticLeaderboardRollupByGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByCode(
            string code
        )  {            
            return act.CountGameStatisticLeaderboardRollupByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardRollupByCodeByGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardRollupByProfileIdByGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameStatisticLeaderboardRollupResult BrowseGameStatisticLeaderboardRollupListByFilter(SearchFilter obj)  {
            return act.BrowseGameStatisticLeaderboardRollupListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByUuid(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByUuid(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByUuid(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByUuid(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByCode(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCode(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByCode(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByCode(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameId(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCodeByGameId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameId(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCodeByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameId(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCodeByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupByUuid(
            string uuid
        )  {            
            return act.DelGameStatisticLeaderboardRollupByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupByCode(
            string code
        )  {            
            return act.DelGameStatisticLeaderboardRollupByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardRollupByCodeByGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardRollupByProfileIdByGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupList(
        )  {
            return act.GetGameStatisticLeaderboardRollupList(
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollup(
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupList(
        ) {
            return CachedGetGameStatisticLeaderboardRollupList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameStatisticLeaderboardRollup> objs;

            string method_name = "CachedGetGameStatisticLeaderboardRollupList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameStatisticLeaderboardRollup>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByUuid(
            string uuid
        )  {
            return act.GetGameStatisticLeaderboardRollupListByUuid(
            uuid
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupByUuid(
            string uuid
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByUuid(
            string uuid
        ) {
            return CachedGetGameStatisticLeaderboardRollupListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByGameId(
            string game_id
        )  {
            return act.GetGameStatisticLeaderboardRollupListByGameId(
            game_id
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupByGameId(
            string game_id
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListByGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByGameId(
            string game_id
        ) {
            return CachedGetGameStatisticLeaderboardRollupListByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListByGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByCode(
            string code
        )  {
            return act.GetGameStatisticLeaderboardRollupListByCode(
            code
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupByCode(
            string code
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByCode(
            string code
        ) {
            return CachedGetGameStatisticLeaderboardRollupListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByCodeByGameId(
            string code
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardRollupListByCodeByGameId(
            code
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListByCodeByGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByCodeByGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardRollupListByCodeByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByCodeByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListByCodeByGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return act.GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        ) {
            return CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
                    code
                    , game_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
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
        public virtual int CountGameProfileStatisticTimestamp(
        )  {            
            return act.CountGameProfileStatisticTimestamp(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticTimestampByUuid(
            string uuid
        )  {            
            return act.CountGameProfileStatisticTimestampByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticTimestampByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileStatisticTimestampByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {            
            return act.CountGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProfileStatisticTimestampResult BrowseGameProfileStatisticTimestampListByFilter(SearchFilter obj)  {
            return act.BrowseGameProfileStatisticTimestampListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticTimestampByUuid(string set_type, GameProfileStatisticTimestamp obj)  {
            return act.SetGameProfileStatisticTimestampByUuid(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticTimestampByUuid(SetType set_type, GameProfileStatisticTimestamp obj)  {
            return act.SetGameProfileStatisticTimestampByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticTimestampByUuid(GameProfileStatisticTimestamp obj)  {
            return act.SetGameProfileStatisticTimestampByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticTimestampByCodeByProfileIdByGameId(string set_type, GameProfileStatisticTimestamp obj)  {
            return act.SetGameProfileStatisticTimestampByCodeByProfileIdByGameId(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticTimestampByCodeByProfileIdByGameId(SetType set_type, GameProfileStatisticTimestamp obj)  {
            return act.SetGameProfileStatisticTimestampByCodeByProfileIdByGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticTimestampByCodeByProfileIdByGameId(GameProfileStatisticTimestamp obj)  {
            return act.SetGameProfileStatisticTimestampByCodeByProfileIdByGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatisticTimestamp obj)  {
            return act.SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(SetType set_type, GameProfileStatisticTimestamp obj)  {
            return act.SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(GameProfileStatisticTimestamp obj)  {
            return act.SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticTimestampByUuid(
            string uuid
        )  {            
            return act.DelGameProfileStatisticTimestampByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticTimestampByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.DelGameProfileStatisticTimestampByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {            
            return act.DelGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticTimestamp> GetGameProfileStatisticTimestampListByUuid(
            string uuid
        )  {
            return act.GetGameProfileStatisticTimestampListByUuid(
            uuid
            );
        }
        
        public virtual GameProfileStatisticTimestamp GetGameProfileStatisticTimestampByUuid(
            string uuid
        )  {
            foreach (GameProfileStatisticTimestamp item in GetGameProfileStatisticTimestampListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticTimestamp> CachedGetGameProfileStatisticTimestampListByUuid(
            string uuid
        ) {
            return CachedGetGameProfileStatisticTimestampListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProfileStatisticTimestamp> CachedGetGameProfileStatisticTimestampListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticTimestampListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticTimestamp> GetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return act.GetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            );
        }
        
        public virtual GameProfileStatisticTimestamp GetGameProfileStatisticTimestampByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            foreach (GameProfileStatisticTimestamp item in GetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticTimestamp> CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatisticTimestamp> CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
                    code
                    , profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticTimestamp> GetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {
            return act.GetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileStatisticTimestamp GetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {
            foreach (GameProfileStatisticTimestamp item in GetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticTimestamp> CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , DateTime timestamp
        ) {
            return CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileStatisticTimestamp> CachedGetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
            , DateTime timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
    }
}






