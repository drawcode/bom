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
        public virtual int CountGameUuid(
            string uuid
        )  {            
            return act.CountGameUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCode(
            string code
        )  {            
            return act.CountGameCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameName(
            string name
        )  {            
            return act.CountGameName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameOrgId(
            string org_id
        )  {            
            return act.CountGameOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppId(
            string app_id
        )  {            
            return act.CountGameAppId(
            app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameOrgIdAppId(
            string org_id
            , string app_id
        )  {            
            return act.CountGameOrgIdAppId(
            org_id
            , app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameResult BrowseGameListFilter(SearchFilter obj)  {
            return act.BrowseGameListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameUuid(string set_type, Game obj)  {
            return act.SetGameUuid(set_type, obj);
        }
        
        public virtual bool SetGameUuid(SetType set_type, Game obj)  {
            return act.SetGameUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameUuid(Game obj)  {
            return act.SetGameUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCode(string set_type, Game obj)  {
            return act.SetGameCode(set_type, obj);
        }
        
        public virtual bool SetGameCode(SetType set_type, Game obj)  {
            return act.SetGameCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameCode(Game obj)  {
            return act.SetGameCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameName(string set_type, Game obj)  {
            return act.SetGameName(set_type, obj);
        }
        
        public virtual bool SetGameName(SetType set_type, Game obj)  {
            return act.SetGameName(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameName(Game obj)  {
            return act.SetGameName(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameOrgId(string set_type, Game obj)  {
            return act.SetGameOrgId(set_type, obj);
        }
        
        public virtual bool SetGameOrgId(SetType set_type, Game obj)  {
            return act.SetGameOrgId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameOrgId(Game obj)  {
            return act.SetGameOrgId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAppId(string set_type, Game obj)  {
            return act.SetGameAppId(set_type, obj);
        }
        
        public virtual bool SetGameAppId(SetType set_type, Game obj)  {
            return act.SetGameAppId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAppId(Game obj)  {
            return act.SetGameAppId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameOrgIdAppId(string set_type, Game obj)  {
            return act.SetGameOrgIdAppId(set_type, obj);
        }
        
        public virtual bool SetGameOrgIdAppId(SetType set_type, Game obj)  {
            return act.SetGameOrgIdAppId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameOrgIdAppId(Game obj)  {
            return act.SetGameOrgIdAppId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameUuid(
            string uuid
        )  {            
            return act.DelGameUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCode(
            string code
        )  {            
            return act.DelGameCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameName(
            string name
        )  {            
            return act.DelGameName(
            name
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameOrgId(
            string org_id
        )  {            
            return act.DelGameOrgId(
            org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAppId(
            string app_id
        )  {            
            return act.DelGameAppId(
            app_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameOrgIdAppId(
            string org_id
            , string app_id
        )  {            
            return act.DelGameOrgIdAppId(
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
        public virtual List<Game> GetGameListUuid(
            string uuid
        )  {
            return act.GetGameListUuid(
            uuid
            );
        }
        
        public virtual Game GetGameUuid(
            string uuid
        )  {
            foreach (Game item in GetGameListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListUuid(
            string uuid
        ) {
            return CachedGetGameListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Game> CachedGetGameListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListCode(
            string code
        )  {
            return act.GetGameListCode(
            code
            );
        }
        
        public virtual Game GetGameCode(
            string code
        )  {
            foreach (Game item in GetGameListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListCode(
            string code
        ) {
            return CachedGetGameListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Game> CachedGetGameListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListName(
            string name
        )  {
            return act.GetGameListName(
            name
            );
        }
        
        public virtual Game GetGameName(
            string name
        )  {
            foreach (Game item in GetGameListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListName(
            string name
        ) {
            return CachedGetGameListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<Game> CachedGetGameListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListOrgId(
            string org_id
        )  {
            return act.GetGameListOrgId(
            org_id
            );
        }
        
        public virtual Game GetGameOrgId(
            string org_id
        )  {
            foreach (Game item in GetGameListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListOrgId(
            string org_id
        ) {
            return CachedGetGameListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<Game> CachedGetGameListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListAppId(
            string app_id
        )  {
            return act.GetGameListAppId(
            app_id
            );
        }
        
        public virtual Game GetGameAppId(
            string app_id
        )  {
            foreach (Game item in GetGameListAppId(
            app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListAppId(
            string app_id
        ) {
            return CachedGetGameListAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , app_id
                );
        }
        
        public virtual List<Game> CachedGetGameListAppId(
            bool overrideCache
            , int cacheHours
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListAppId(
                    app_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Game> GetGameListOrgIdAppId(
            string org_id
            , string app_id
        )  {
            return act.GetGameListOrgIdAppId(
            org_id
            , app_id
            );
        }
        
        public virtual Game GetGameOrgIdAppId(
            string org_id
            , string app_id
        )  {
            foreach (Game item in GetGameListOrgIdAppId(
            org_id
            , app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Game> CachedGetGameListOrgIdAppId(
            string org_id
            , string app_id
        ) {
            return CachedGetGameListOrgIdAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , app_id
                );
        }
        
        public virtual List<Game> CachedGetGameListOrgIdAppId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameListOrgIdAppId(
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
        public virtual int CountGameCategoryUuid(
            string uuid
        )  {            
            return act.CountGameCategoryUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryCode(
            string code
        )  {            
            return act.CountGameCategoryCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryName(
            string name
        )  {            
            return act.CountGameCategoryName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryOrgId(
            string org_id
        )  {            
            return act.CountGameCategoryOrgId(
            org_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTypeId(
            string type_id
        )  {            
            return act.CountGameCategoryTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryOrgIdTypeId(
            string org_id
            , string type_id
        )  {            
            return act.CountGameCategoryOrgIdTypeId(
            org_id
            , type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameCategoryResult BrowseGameCategoryListFilter(SearchFilter obj)  {
            return act.BrowseGameCategoryListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryUuid(string set_type, GameCategory obj)  {
            return act.SetGameCategoryUuid(set_type, obj);
        }
        
        public virtual bool SetGameCategoryUuid(SetType set_type, GameCategory obj)  {
            return act.SetGameCategoryUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameCategoryUuid(GameCategory obj)  {
            return act.SetGameCategoryUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryUuid(
            string uuid
        )  {            
            return act.DelGameCategoryUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryCodeOrgId(
            string code
            , string org_id
        )  {            
            return act.DelGameCategoryCodeOrgId(
            code
            , org_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryCodeOrgIdTypeId(
            string code
            , string org_id
            , string type_id
        )  {            
            return act.DelGameCategoryCodeOrgIdTypeId(
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
        public virtual List<GameCategory> GetGameCategoryListUuid(
            string uuid
        )  {
            return act.GetGameCategoryListUuid(
            uuid
            );
        }
        
        public virtual GameCategory GetGameCategoryUuid(
            string uuid
        )  {
            foreach (GameCategory item in GetGameCategoryListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListUuid(
            string uuid
        ) {
            return CachedGetGameCategoryListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListCode(
            string code
        )  {
            return act.GetGameCategoryListCode(
            code
            );
        }
        
        public virtual GameCategory GetGameCategoryCode(
            string code
        )  {
            foreach (GameCategory item in GetGameCategoryListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListCode(
            string code
        ) {
            return CachedGetGameCategoryListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListName(
            string name
        )  {
            return act.GetGameCategoryListName(
            name
            );
        }
        
        public virtual GameCategory GetGameCategoryName(
            string name
        )  {
            foreach (GameCategory item in GetGameCategoryListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListName(
            string name
        ) {
            return CachedGetGameCategoryListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListOrgId(
            string org_id
        )  {
            return act.GetGameCategoryListOrgId(
            org_id
            );
        }
        
        public virtual GameCategory GetGameCategoryOrgId(
            string org_id
        )  {
            foreach (GameCategory item in GetGameCategoryListOrgId(
            org_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListOrgId(
            string org_id
        ) {
            return CachedGetGameCategoryListOrgId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListOrgId(
            bool overrideCache
            , int cacheHours
            , string org_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListOrgId(
                    org_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListTypeId(
            string type_id
        )  {
            return act.GetGameCategoryListTypeId(
            type_id
            );
        }
        
        public virtual GameCategory GetGameCategoryTypeId(
            string type_id
        )  {
            foreach (GameCategory item in GetGameCategoryListTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListTypeId(
            string type_id
        ) {
            return CachedGetGameCategoryListTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategory> GetGameCategoryListOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            return act.GetGameCategoryListOrgIdTypeId(
            org_id
            , type_id
            );
        }
        
        public virtual GameCategory GetGameCategoryOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            foreach (GameCategory item in GetGameCategoryListOrgIdTypeId(
            org_id
            , type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListOrgIdTypeId(
            string org_id
            , string type_id
        ) {
            return CachedGetGameCategoryListOrgIdTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , org_id
                    , type_id
                );
        }
        
        public virtual List<GameCategory> CachedGetGameCategoryListOrgIdTypeId(
            bool overrideCache
            , int cacheHours
            , string org_id
            , string type_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryListOrgIdTypeId(
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
        public virtual int CountGameCategoryTreeUuid(
            string uuid
        )  {            
            return act.CountGameCategoryTreeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeParentId(
            string parent_id
        )  {            
            return act.CountGameCategoryTreeParentId(
            parent_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeCategoryId(
            string category_id
        )  {            
            return act.CountGameCategoryTreeCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.CountGameCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameCategoryTreeResult BrowseGameCategoryTreeListFilter(SearchFilter obj)  {
            return act.BrowseGameCategoryTreeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryTreeUuid(string set_type, GameCategoryTree obj)  {
            return act.SetGameCategoryTreeUuid(set_type, obj);
        }
        
        public virtual bool SetGameCategoryTreeUuid(SetType set_type, GameCategoryTree obj)  {
            return act.SetGameCategoryTreeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameCategoryTreeUuid(GameCategoryTree obj)  {
            return act.SetGameCategoryTreeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeUuid(
            string uuid
        )  {            
            return act.DelGameCategoryTreeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeParentId(
            string parent_id
        )  {            
            return act.DelGameCategoryTreeParentId(
            parent_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeCategoryId(
            string category_id
        )  {            
            return act.DelGameCategoryTreeCategoryId(
            category_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {            
            return act.DelGameCategoryTreeParentIdCategoryId(
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
        public virtual List<GameCategoryTree> GetGameCategoryTreeListUuid(
            string uuid
        )  {
            return act.GetGameCategoryTreeListUuid(
            uuid
            );
        }
        
        public virtual GameCategoryTree GetGameCategoryTreeUuid(
            string uuid
        )  {
            foreach (GameCategoryTree item in GetGameCategoryTreeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListUuid(
            string uuid
        ) {
            return CachedGetGameCategoryTreeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryTreeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryTree> GetGameCategoryTreeListParentId(
            string parent_id
        )  {
            return act.GetGameCategoryTreeListParentId(
            parent_id
            );
        }
        
        public virtual GameCategoryTree GetGameCategoryTreeParentId(
            string parent_id
        )  {
            foreach (GameCategoryTree item in GetGameCategoryTreeListParentId(
            parent_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListParentId(
            string parent_id
        ) {
            return CachedGetGameCategoryTreeListParentId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                );
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListParentId(
            bool overrideCache
            , int cacheHours
            , string parent_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryTreeListParentId(
                    parent_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryTree> GetGameCategoryTreeListCategoryId(
            string category_id
        )  {
            return act.GetGameCategoryTreeListCategoryId(
            category_id
            );
        }
        
        public virtual GameCategoryTree GetGameCategoryTreeCategoryId(
            string category_id
        )  {
            foreach (GameCategoryTree item in GetGameCategoryTreeListCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListCategoryId(
            string category_id
        ) {
            return CachedGetGameCategoryTreeListCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryTreeListCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryTree> GetGameCategoryTreeListParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            return act.GetGameCategoryTreeListParentIdCategoryId(
            parent_id
            , category_id
            );
        }
        
        public virtual GameCategoryTree GetGameCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            foreach (GameCategoryTree item in GetGameCategoryTreeListParentIdCategoryId(
            parent_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListParentIdCategoryId(
            string parent_id
            , string category_id
        ) {
            return CachedGetGameCategoryTreeListParentIdCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , parent_id
                    , category_id
                );
        }
        
        public virtual List<GameCategoryTree> CachedGetGameCategoryTreeListParentIdCategoryId(
            bool overrideCache
            , int cacheHours
            , string parent_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryTreeListParentIdCategoryId(
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
        public virtual int CountGameCategoryAssocUuid(
            string uuid
        )  {            
            return act.CountGameCategoryAssocUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocGameId(
            string game_id
        )  {            
            return act.CountGameCategoryAssocGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocCategoryId(
            string category_id
        )  {            
            return act.CountGameCategoryAssocCategoryId(
            category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocGameIdCategoryId(
            string game_id
            , string category_id
        )  {            
            return act.CountGameCategoryAssocGameIdCategoryId(
            game_id
            , category_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameCategoryAssocResult BrowseGameCategoryAssocListFilter(SearchFilter obj)  {
            return act.BrowseGameCategoryAssocListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryAssocUuid(string set_type, GameCategoryAssoc obj)  {
            return act.SetGameCategoryAssocUuid(set_type, obj);
        }
        
        public virtual bool SetGameCategoryAssocUuid(SetType set_type, GameCategoryAssoc obj)  {
            return act.SetGameCategoryAssocUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameCategoryAssocUuid(GameCategoryAssoc obj)  {
            return act.SetGameCategoryAssocUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryAssocUuid(
            string uuid
        )  {            
            return act.DelGameCategoryAssocUuid(
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
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListUuid(
            string uuid
        )  {
            return act.GetGameCategoryAssocListUuid(
            uuid
            );
        }
        
        public virtual GameCategoryAssoc GetGameCategoryAssocUuid(
            string uuid
        )  {
            foreach (GameCategoryAssoc item in GetGameCategoryAssocListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListUuid(
            string uuid
        ) {
            return CachedGetGameCategoryAssocListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryAssocListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListGameId(
            string game_id
        )  {
            return act.GetGameCategoryAssocListGameId(
            game_id
            );
        }
        
        public virtual GameCategoryAssoc GetGameCategoryAssocGameId(
            string game_id
        )  {
            foreach (GameCategoryAssoc item in GetGameCategoryAssocListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListGameId(
            string game_id
        ) {
            return CachedGetGameCategoryAssocListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryAssocListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListCategoryId(
            string category_id
        )  {
            return act.GetGameCategoryAssocListCategoryId(
            category_id
            );
        }
        
        public virtual GameCategoryAssoc GetGameCategoryAssocCategoryId(
            string category_id
        )  {
            foreach (GameCategoryAssoc item in GetGameCategoryAssocListCategoryId(
            category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListCategoryId(
            string category_id
        ) {
            return CachedGetGameCategoryAssocListCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , category_id
                );
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListCategoryId(
            bool overrideCache
            , int cacheHours
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryAssocListCategoryId(
                    category_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListGameIdCategoryId(
            string game_id
            , string category_id
        )  {
            return act.GetGameCategoryAssocListGameIdCategoryId(
            game_id
            , category_id
            );
        }
        
        public virtual GameCategoryAssoc GetGameCategoryAssocGameIdCategoryId(
            string game_id
            , string category_id
        )  {
            foreach (GameCategoryAssoc item in GetGameCategoryAssocListGameIdCategoryId(
            game_id
            , category_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListGameIdCategoryId(
            string game_id
            , string category_id
        ) {
            return CachedGetGameCategoryAssocListGameIdCategoryId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , category_id
                );
        }
        
        public virtual List<GameCategoryAssoc> CachedGetGameCategoryAssocListGameIdCategoryId(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string category_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameCategoryAssocListGameIdCategoryId(
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
        public virtual int CountGameTypeUuid(
            string uuid
        )  {            
            return act.CountGameTypeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameTypeCode(
            string code
        )  {            
            return act.CountGameTypeCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameTypeName(
            string name
        )  {            
            return act.CountGameTypeName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameTypeResult BrowseGameTypeListFilter(SearchFilter obj)  {
            return act.BrowseGameTypeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameTypeUuid(string set_type, GameType obj)  {
            return act.SetGameTypeUuid(set_type, obj);
        }
        
        public virtual bool SetGameTypeUuid(SetType set_type, GameType obj)  {
            return act.SetGameTypeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameTypeUuid(GameType obj)  {
            return act.SetGameTypeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameTypeUuid(
            string uuid
        )  {            
            return act.DelGameTypeUuid(
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
        public virtual List<GameType> GetGameTypeListUuid(
            string uuid
        )  {
            return act.GetGameTypeListUuid(
            uuid
            );
        }
        
        public virtual GameType GetGameTypeUuid(
            string uuid
        )  {
            foreach (GameType item in GetGameTypeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameType> CachedGetGameTypeListUuid(
            string uuid
        ) {
            return CachedGetGameTypeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameType> CachedGetGameTypeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameTypeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameType> GetGameTypeListCode(
            string code
        )  {
            return act.GetGameTypeListCode(
            code
            );
        }
        
        public virtual GameType GetGameTypeCode(
            string code
        )  {
            foreach (GameType item in GetGameTypeListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameType> CachedGetGameTypeListCode(
            string code
        ) {
            return CachedGetGameTypeListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameType> CachedGetGameTypeListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameTypeListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameType> GetGameTypeListName(
            string name
        )  {
            return act.GetGameTypeListName(
            name
            );
        }
        
        public virtual GameType GetGameTypeName(
            string name
        )  {
            foreach (GameType item in GetGameTypeListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameType> CachedGetGameTypeListName(
            string name
        ) {
            return CachedGetGameTypeListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameType> CachedGetGameTypeListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameTypeListName(
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
        public virtual int CountProfileGameUuid(
            string uuid
        )  {            
            return act.CountProfileGameUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameGameId(
            string game_id
        )  {            
            return act.CountProfileGameGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameProfileId(
            string profile_id
        )  {            
            return act.CountProfileGameProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountProfileGameProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileGameResult BrowseProfileGameListFilter(SearchFilter obj)  {
            return act.BrowseProfileGameListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameUuid(string set_type, ProfileGame obj)  {
            return act.SetProfileGameUuid(set_type, obj);
        }
        
        public virtual bool SetProfileGameUuid(SetType set_type, ProfileGame obj)  {
            return act.SetProfileGameUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameUuid(ProfileGame obj)  {
            return act.SetProfileGameUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameUuid(
            string uuid
        )  {            
            return act.DelProfileGameUuid(
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
        public virtual List<ProfileGame> GetProfileGameListUuid(
            string uuid
        )  {
            return act.GetProfileGameListUuid(
            uuid
            );
        }
        
        public virtual ProfileGame GetProfileGameUuid(
            string uuid
        )  {
            foreach (ProfileGame item in GetProfileGameListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListUuid(
            string uuid
        ) {
            return CachedGetProfileGameListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGame> GetProfileGameListGameId(
            string game_id
        )  {
            return act.GetProfileGameListGameId(
            game_id
            );
        }
        
        public virtual ProfileGame GetProfileGameGameId(
            string game_id
        )  {
            foreach (ProfileGame item in GetProfileGameListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListGameId(
            string game_id
        ) {
            return CachedGetProfileGameListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGame> GetProfileGameListProfileId(
            string profile_id
        )  {
            return act.GetProfileGameListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileGame GetProfileGameProfileId(
            string profile_id
        )  {
            foreach (ProfileGame item in GetProfileGameListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListProfileId(
            string profile_id
        ) {
            return CachedGetProfileGameListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGame> GetProfileGameListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetProfileGameListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual ProfileGame GetProfileGameProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (ProfileGame item in GetProfileGameListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetProfileGameListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<ProfileGame> CachedGetProfileGameListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameListProfileIdGameId(
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
        public virtual int CountGameNetworkUuid(
            string uuid
        )  {            
            return act.CountGameNetworkUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkCode(
            string code
        )  {            
            return act.CountGameNetworkCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkUuidType(
            string uuid
            , string type
        )  {            
            return act.CountGameNetworkUuidType(
            uuid
            , type
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameNetworkResult BrowseGameNetworkListFilter(SearchFilter obj)  {
            return act.BrowseGameNetworkListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkUuid(string set_type, GameNetwork obj)  {
            return act.SetGameNetworkUuid(set_type, obj);
        }
        
        public virtual bool SetGameNetworkUuid(SetType set_type, GameNetwork obj)  {
            return act.SetGameNetworkUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameNetworkUuid(GameNetwork obj)  {
            return act.SetGameNetworkUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkCode(string set_type, GameNetwork obj)  {
            return act.SetGameNetworkCode(set_type, obj);
        }
        
        public virtual bool SetGameNetworkCode(SetType set_type, GameNetwork obj)  {
            return act.SetGameNetworkCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameNetworkCode(GameNetwork obj)  {
            return act.SetGameNetworkCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameNetworkUuid(
            string uuid
        )  {            
            return act.DelGameNetworkUuid(
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
        public virtual List<GameNetwork> GetGameNetworkListUuid(
            string uuid
        )  {
            return act.GetGameNetworkListUuid(
            uuid
            );
        }
        
        public virtual GameNetwork GetGameNetworkUuid(
            string uuid
        )  {
            foreach (GameNetwork item in GetGameNetworkListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListUuid(
            string uuid
        ) {
            return CachedGetGameNetworkListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameNetwork> GetGameNetworkListCode(
            string code
        )  {
            return act.GetGameNetworkListCode(
            code
            );
        }
        
        public virtual GameNetwork GetGameNetworkCode(
            string code
        )  {
            foreach (GameNetwork item in GetGameNetworkListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListCode(
            string code
        ) {
            return CachedGetGameNetworkListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameNetwork> GetGameNetworkListUuidType(
            string uuid
            , string type
        )  {
            return act.GetGameNetworkListUuidType(
            uuid
            , type
            );
        }
        
        public virtual GameNetwork GetGameNetworkUuidType(
            string uuid
            , string type
        )  {
            foreach (GameNetwork item in GetGameNetworkListUuidType(
            uuid
            , type
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListUuidType(
            string uuid
            , string type
        ) {
            return CachedGetGameNetworkListUuidType(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , type
                );
        }
        
        public virtual List<GameNetwork> CachedGetGameNetworkListUuidType(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string type
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkListUuidType(
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
        public virtual int CountGameNetworkAuthUuid(
            string uuid
        )  {            
            return act.CountGameNetworkAuthUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkAuthGameIdGameNetworkId(
            string game_id
            , string game_network_id
        )  {            
            return act.CountGameNetworkAuthGameIdGameNetworkId(
            game_id
            , game_network_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameNetworkAuthResult BrowseGameNetworkAuthListFilter(SearchFilter obj)  {
            return act.BrowseGameNetworkAuthListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkAuthUuid(string set_type, GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthUuid(set_type, obj);
        }
        
        public virtual bool SetGameNetworkAuthUuid(SetType set_type, GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameNetworkAuthUuid(GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkAuthGameIdGameNetworkId(string set_type, GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthGameIdGameNetworkId(set_type, obj);
        }
        
        public virtual bool SetGameNetworkAuthGameIdGameNetworkId(SetType set_type, GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthGameIdGameNetworkId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameNetworkAuthGameIdGameNetworkId(GameNetworkAuth obj)  {
            return act.SetGameNetworkAuthGameIdGameNetworkId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameNetworkAuthUuid(
            string uuid
        )  {            
            return act.DelGameNetworkAuthUuid(
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
        public virtual List<GameNetworkAuth> GetGameNetworkAuthListUuid(
            string uuid
        )  {
            return act.GetGameNetworkAuthListUuid(
            uuid
            );
        }
        
        public virtual GameNetworkAuth GetGameNetworkAuthUuid(
            string uuid
        )  {
            foreach (GameNetworkAuth item in GetGameNetworkAuthListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetworkAuth> CachedGetGameNetworkAuthListUuid(
            string uuid
        ) {
            return CachedGetGameNetworkAuthListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameNetworkAuth> CachedGetGameNetworkAuthListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkAuthListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameNetworkAuth> GetGameNetworkAuthListGameIdGameNetworkId(
            string game_id
            , string game_network_id
        )  {
            return act.GetGameNetworkAuthListGameIdGameNetworkId(
            game_id
            , game_network_id
            );
        }
        
        public virtual GameNetworkAuth GetGameNetworkAuthGameIdGameNetworkId(
            string game_id
            , string game_network_id
        )  {
            foreach (GameNetworkAuth item in GetGameNetworkAuthListGameIdGameNetworkId(
            game_id
            , game_network_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameNetworkAuth> CachedGetGameNetworkAuthListGameIdGameNetworkId(
            string game_id
            , string game_network_id
        ) {
            return CachedGetGameNetworkAuthListGameIdGameNetworkId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , game_network_id
                );
        }
        
        public virtual List<GameNetworkAuth> CachedGetGameNetworkAuthListGameIdGameNetworkId(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string game_network_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameNetworkAuthListGameIdGameNetworkId(
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
        public virtual int CountProfileGameNetworkUuid(
            string uuid
        )  {            
            return act.CountProfileGameNetworkUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkGameId(
            string game_id
        )  {            
            return act.CountProfileGameNetworkGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkProfileId(
            string profile_id
        )  {            
            return act.CountProfileGameNetworkProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountProfileGameNetworkProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountProfileGameNetworkProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkProfileIdGameIdGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {            
            return act.CountProfileGameNetworkProfileIdGameIdGameNetworkId(
            profile_id
            , game_id
            , game_network_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {            
            return act.CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
            network_username
            , game_id
            , game_network_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileGameNetworkResult BrowseProfileGameNetworkListFilter(SearchFilter obj)  {
            return act.BrowseProfileGameNetworkListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkUuid(string set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkUuid(set_type, obj);
        }
        
        public virtual bool SetProfileGameNetworkUuid(SetType set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameNetworkUuid(ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkProfileIdGameId(string set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkProfileIdGameId(set_type, obj);
        }
        
        public virtual bool SetProfileGameNetworkProfileIdGameId(SetType set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkProfileIdGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameNetworkProfileIdGameId(ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkProfileIdGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkProfileIdGameIdGameNetworkId(string set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkProfileIdGameIdGameNetworkId(set_type, obj);
        }
        
        public virtual bool SetProfileGameNetworkProfileIdGameIdGameNetworkId(SetType set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkProfileIdGameIdGameNetworkId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameNetworkProfileIdGameIdGameNetworkId(ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkProfileIdGameIdGameNetworkId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(string set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(set_type, obj);
        }
        
        public virtual bool SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(SetType set_type, ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(ProfileGameNetwork obj)  {
            return act.SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkUuid(
            string uuid
        )  {            
            return act.DelProfileGameNetworkUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelProfileGameNetworkProfileIdGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkProfileIdGameIdGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {            
            return act.DelProfileGameNetworkProfileIdGameIdGameNetworkId(
            profile_id
            , game_id
            , game_network_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {            
            return act.DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
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
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListUuid(
            string uuid
        )  {
            return act.GetProfileGameNetworkListUuid(
            uuid
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkUuid(
            string uuid
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListUuid(
            string uuid
        ) {
            return CachedGetProfileGameNetworkListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListGameId(
            string game_id
        )  {
            return act.GetProfileGameNetworkListGameId(
            game_id
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkGameId(
            string game_id
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListGameId(
            string game_id
        ) {
            return CachedGetProfileGameNetworkListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListProfileId(
            string profile_id
        )  {
            return act.GetProfileGameNetworkListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkProfileId(
            string profile_id
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListProfileId(
            string profile_id
        ) {
            return CachedGetProfileGameNetworkListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetProfileGameNetworkListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetProfileGameNetworkListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListProfileIdGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            return act.GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
            profile_id
            , game_id
            , game_network_id
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkProfileIdGameIdGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
            profile_id
            , game_id
            , game_network_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        ) {
            return CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , game_network_id
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListProfileIdGameIdGameNetworkId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , string game_network_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
                    profile_id
                    , game_id
                    , game_network_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            return act.GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
            network_username
            , game_id
            , game_network_id
            );
        }
        
        public virtual ProfileGameNetwork GetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            foreach (ProfileGameNetwork item in GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
            network_username
            , game_id
            , game_network_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        ) {
            return CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , network_username
                    , game_id
                    , game_network_id
                );
        }
        
        public virtual List<ProfileGameNetwork> CachedGetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
            bool overrideCache
            , int cacheHours
            , string network_username
            , string game_id
            , string game_network_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
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
        public virtual int CountProfileGameDataAttributeUuid(
            string uuid
        )  {            
            return act.CountProfileGameDataAttributeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttributeProfileId(
            string profile_id
        )  {            
            return act.CountProfileGameDataAttributeProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttributeProfileIdGameIdCode(
            string profile_id
            , string game_id
            , string code
        )  {            
            return act.CountProfileGameDataAttributeProfileIdGameIdCode(
            profile_id
            , game_id
            , code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileGameDataAttributeResult BrowseProfileGameDataAttributeListFilter(SearchFilter obj)  {
            return act.BrowseProfileGameDataAttributeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeUuid(string set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeUuid(set_type, obj);
        }
        
        public virtual bool SetProfileGameDataAttributeUuid(SetType set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameDataAttributeUuid(ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeProfileId(string set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileGameDataAttributeProfileId(SetType set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameDataAttributeProfileId(ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeProfileIdGameIdCode(string set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeProfileIdGameIdCode(set_type, obj);
        }
        
        public virtual bool SetProfileGameDataAttributeProfileIdGameIdCode(SetType set_type, ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeProfileIdGameIdCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameDataAttributeProfileIdGameIdCode(ProfileGameDataAttribute obj)  {
            return act.SetProfileGameDataAttributeProfileIdGameIdCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameDataAttributeUuid(
            string uuid
        )  {            
            return act.DelProfileGameDataAttributeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameDataAttributeProfileId(
            string profile_id
        )  {            
            return act.DelProfileGameDataAttributeProfileId(
            profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameDataAttributeProfileIdGameIdCode(
            string profile_id
            , string game_id
            , string code
        )  {            
            return act.DelProfileGameDataAttributeProfileIdGameIdCode(
            profile_id
            , game_id
            , code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListUuid(
            string uuid
        )  {
            return act.GetProfileGameDataAttributeListUuid(
            uuid
            );
        }
        
        public virtual ProfileGameDataAttribute GetProfileGameDataAttributeUuid(
            string uuid
        )  {
            foreach (ProfileGameDataAttribute item in GetProfileGameDataAttributeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListUuid(
            string uuid
        ) {
            return CachedGetProfileGameDataAttributeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameDataAttributeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListProfileId(
            string profile_id
        )  {
            return act.GetProfileGameDataAttributeListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileGameDataAttribute GetProfileGameDataAttributeProfileId(
            string profile_id
        )  {
            foreach (ProfileGameDataAttribute item in GetProfileGameDataAttributeListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListProfileId(
            string profile_id
        ) {
            return CachedGetProfileGameDataAttributeListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameDataAttributeListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListProfileIdGameIdCode(
            string profile_id
            , string game_id
            , string code
        )  {
            return act.GetProfileGameDataAttributeListProfileIdGameIdCode(
            profile_id
            , game_id
            , code
            );
        }
        
        public virtual ProfileGameDataAttribute GetProfileGameDataAttributeProfileIdGameIdCode(
            string profile_id
            , string game_id
            , string code
        )  {
            foreach (ProfileGameDataAttribute item in GetProfileGameDataAttributeListProfileIdGameIdCode(
            profile_id
            , game_id
            , code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListProfileIdGameIdCode(
            string profile_id
            , string game_id
            , string code
        ) {
            return CachedGetProfileGameDataAttributeListProfileIdGameIdCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , code
                );
        }
        
        public virtual List<ProfileGameDataAttribute> CachedGetProfileGameDataAttributeListProfileIdGameIdCode(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameDataAttributeListProfileIdGameIdCode(
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
        public virtual int CountGameSessionUuid(
            string uuid
        )  {            
            return act.CountGameSessionUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionGameId(
            string game_id
        )  {            
            return act.CountGameSessionGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionProfileId(
            string profile_id
        )  {            
            return act.CountGameSessionProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameSessionProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameSessionResult BrowseGameSessionListFilter(SearchFilter obj)  {
            return act.BrowseGameSessionListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameSessionUuid(string set_type, GameSession obj)  {
            return act.SetGameSessionUuid(set_type, obj);
        }
        
        public virtual bool SetGameSessionUuid(SetType set_type, GameSession obj)  {
            return act.SetGameSessionUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameSessionUuid(GameSession obj)  {
            return act.SetGameSessionUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameSessionUuid(
            string uuid
        )  {            
            return act.DelGameSessionUuid(
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
        public virtual List<GameSession> GetGameSessionListUuid(
            string uuid
        )  {
            return act.GetGameSessionListUuid(
            uuid
            );
        }
        
        public virtual GameSession GetGameSessionUuid(
            string uuid
        )  {
            foreach (GameSession item in GetGameSessionListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSession> CachedGetGameSessionListUuid(
            string uuid
        ) {
            return CachedGetGameSessionListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameSession> CachedGetGameSessionListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameSession> GetGameSessionListGameId(
            string game_id
        )  {
            return act.GetGameSessionListGameId(
            game_id
            );
        }
        
        public virtual GameSession GetGameSessionGameId(
            string game_id
        )  {
            foreach (GameSession item in GetGameSessionListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSession> CachedGetGameSessionListGameId(
            string game_id
        ) {
            return CachedGetGameSessionListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameSession> CachedGetGameSessionListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameSession> GetGameSessionListProfileId(
            string profile_id
        )  {
            return act.GetGameSessionListProfileId(
            profile_id
            );
        }
        
        public virtual GameSession GetGameSessionProfileId(
            string profile_id
        )  {
            foreach (GameSession item in GetGameSessionListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSession> CachedGetGameSessionListProfileId(
            string profile_id
        ) {
            return CachedGetGameSessionListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<GameSession> CachedGetGameSessionListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameSession> GetGameSessionListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameSessionListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameSession GetGameSessionProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameSession item in GetGameSessionListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSession> CachedGetGameSessionListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameSessionListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameSession> CachedGetGameSessionListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionListProfileIdGameId(
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
        public virtual int CountGameSessionDataUuid(
            string uuid
        )  {            
            return act.CountGameSessionDataUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameSessionDataResult BrowseGameSessionDataListFilter(SearchFilter obj)  {
            return act.BrowseGameSessionDataListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameSessionDataUuid(string set_type, GameSessionData obj)  {
            return act.SetGameSessionDataUuid(set_type, obj);
        }
        
        public virtual bool SetGameSessionDataUuid(SetType set_type, GameSessionData obj)  {
            return act.SetGameSessionDataUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameSessionDataUuid(GameSessionData obj)  {
            return act.SetGameSessionDataUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameSessionDataUuid(
            string uuid
        )  {            
            return act.DelGameSessionDataUuid(
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
        public virtual List<GameSessionData> GetGameSessionDataListUuid(
            string uuid
        )  {
            return act.GetGameSessionDataListUuid(
            uuid
            );
        }
        
        public virtual GameSessionData GetGameSessionDataUuid(
            string uuid
        )  {
            foreach (GameSessionData item in GetGameSessionDataListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameSessionData> CachedGetGameSessionDataListUuid(
            string uuid
        ) {
            return CachedGetGameSessionDataListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameSessionData> CachedGetGameSessionDataListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameSessionDataListUuid(
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
        public virtual int CountGameContentUuid(
            string uuid
        )  {            
            return act.CountGameContentUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentGameId(
            string game_id
        )  {            
            return act.CountGameContentGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentGameIdPath(
            string game_id
            , string path
        )  {            
            return act.CountGameContentGameIdPath(
            game_id
            , path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentGameIdPathVersion(
            string game_id
            , string path
            , string version
        )  {            
            return act.CountGameContentGameIdPathVersion(
            game_id
            , path
            , version
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentGameIdPathVersionPlatformIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.CountGameContentGameIdPathVersionPlatformIncrement(
            game_id
            , path
            , version
            , platform
            , increment
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameContentResult BrowseGameContentListFilter(SearchFilter obj)  {
            return act.BrowseGameContentListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentUuid(string set_type, GameContent obj)  {
            return act.SetGameContentUuid(set_type, obj);
        }
        
        public virtual bool SetGameContentUuid(SetType set_type, GameContent obj)  {
            return act.SetGameContentUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameContentUuid(GameContent obj)  {
            return act.SetGameContentUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentGameId(string set_type, GameContent obj)  {
            return act.SetGameContentGameId(set_type, obj);
        }
        
        public virtual bool SetGameContentGameId(SetType set_type, GameContent obj)  {
            return act.SetGameContentGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameContentGameId(GameContent obj)  {
            return act.SetGameContentGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentGameIdPath(string set_type, GameContent obj)  {
            return act.SetGameContentGameIdPath(set_type, obj);
        }
        
        public virtual bool SetGameContentGameIdPath(SetType set_type, GameContent obj)  {
            return act.SetGameContentGameIdPath(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameContentGameIdPath(GameContent obj)  {
            return act.SetGameContentGameIdPath(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentGameIdPathVersion(string set_type, GameContent obj)  {
            return act.SetGameContentGameIdPathVersion(set_type, obj);
        }
        
        public virtual bool SetGameContentGameIdPathVersion(SetType set_type, GameContent obj)  {
            return act.SetGameContentGameIdPathVersion(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameContentGameIdPathVersion(GameContent obj)  {
            return act.SetGameContentGameIdPathVersion(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentGameIdPathVersionPlatformIncrement(string set_type, GameContent obj)  {
            return act.SetGameContentGameIdPathVersionPlatformIncrement(set_type, obj);
        }
        
        public virtual bool SetGameContentGameIdPathVersionPlatformIncrement(SetType set_type, GameContent obj)  {
            return act.SetGameContentGameIdPathVersionPlatformIncrement(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameContentGameIdPathVersionPlatformIncrement(GameContent obj)  {
            return act.SetGameContentGameIdPathVersionPlatformIncrement(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentUuid(
            string uuid
        )  {            
            return act.DelGameContentUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentGameId(
            string game_id
        )  {            
            return act.DelGameContentGameId(
            game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentGameIdPath(
            string game_id
            , string path
        )  {            
            return act.DelGameContentGameIdPath(
            game_id
            , path
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentGameIdPathVersion(
            string game_id
            , string path
            , string version
        )  {            
            return act.DelGameContentGameIdPathVersion(
            game_id
            , path
            , version
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentGameIdPathVersionPlatformIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.DelGameContentGameIdPathVersionPlatformIncrement(
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
        public virtual List<GameContent> GetGameContentListUuid(
            string uuid
        )  {
            return act.GetGameContentListUuid(
            uuid
            );
        }
        
        public virtual GameContent GetGameContentUuid(
            string uuid
        )  {
            foreach (GameContent item in GetGameContentListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameContent> CachedGetGameContentListUuid(
            string uuid
        ) {
            return CachedGetGameContentListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameContentListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameContent> GetGameContentListGameId(
            string game_id
        )  {
            return act.GetGameContentListGameId(
            game_id
            );
        }
        
        public virtual GameContent GetGameContentGameId(
            string game_id
        )  {
            foreach (GameContent item in GetGameContentListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameContent> CachedGetGameContentListGameId(
            string game_id
        ) {
            return CachedGetGameContentListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameContentListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameContent> GetGameContentListGameIdPath(
            string game_id
            , string path
        )  {
            return act.GetGameContentListGameIdPath(
            game_id
            , path
            );
        }
        
        public virtual GameContent GetGameContentGameIdPath(
            string game_id
            , string path
        )  {
            foreach (GameContent item in GetGameContentListGameIdPath(
            game_id
            , path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameContent> CachedGetGameContentListGameIdPath(
            string game_id
            , string path
        ) {
            return CachedGetGameContentListGameIdPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , path
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentListGameIdPath(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameContentListGameIdPath(
                    game_id
                    , path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameContent> GetGameContentListGameIdPathVersion(
            string game_id
            , string path
            , string version
        )  {
            return act.GetGameContentListGameIdPathVersion(
            game_id
            , path
            , version
            );
        }
        
        public virtual GameContent GetGameContentGameIdPathVersion(
            string game_id
            , string path
            , string version
        )  {
            foreach (GameContent item in GetGameContentListGameIdPathVersion(
            game_id
            , path
            , version
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameContent> CachedGetGameContentListGameIdPathVersion(
            string game_id
            , string path
            , string version
        ) {
            return CachedGetGameContentListGameIdPathVersion(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , path
                    , version
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentListGameIdPathVersion(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string path
            , string version
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameContentListGameIdPathVersion(
                    game_id
                    , path
                    , version
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameContent> GetGameContentListGameIdPathVersionPlatformIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return act.GetGameContentListGameIdPathVersionPlatformIncrement(
            game_id
            , path
            , version
            , platform
            , increment
            );
        }
        
        public virtual GameContent GetGameContentGameIdPathVersionPlatformIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            foreach (GameContent item in GetGameContentListGameIdPathVersionPlatformIncrement(
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
        
        public virtual List<GameContent> CachedGetGameContentListGameIdPathVersionPlatformIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        ) {
            return CachedGetGameContentListGameIdPathVersionPlatformIncrement(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , path
                    , version
                    , platform
                    , increment
                );
        }
        
        public virtual List<GameContent> CachedGetGameContentListGameIdPathVersionPlatformIncrement(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string path
            , string version
            , string platform
            , int increment
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContent(
        )  {            
            return act.CountGameProfileContent(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentUuid(
            string uuid
        )  {            
            return act.CountGameProfileContentUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdProfileId(
            string game_id
            , string profile_id
        )  {            
            return act.CountGameProfileContentGameIdProfileId(
            game_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdUsername(
            string game_id
            , string username
        )  {            
            return act.CountGameProfileContentGameIdUsername(
            game_id
            , username
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentUsername(
            string username
        )  {            
            return act.CountGameProfileContentUsername(
            username
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdProfileIdPath(
            string game_id
            , string profile_id
            , string path
        )  {            
            return act.CountGameProfileContentGameIdProfileIdPath(
            game_id
            , profile_id
            , path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdProfileIdPathVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {            
            return act.CountGameProfileContentGameIdProfileIdPathVersion(
            game_id
            , profile_id
            , path
            , version
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdUsernamePath(
            string game_id
            , string username
            , string path
        )  {            
            return act.CountGameProfileContentGameIdUsernamePath(
            game_id
            , username
            , path
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdUsernamePathVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {            
            return act.CountGameProfileContentGameIdUsernamePathVersion(
            game_id
            , username
            , path
            , version
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
            game_id
            , username
            , path
            , version
            , platform
            , increment
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProfileContentResult BrowseGameProfileContentListFilter(SearchFilter obj)  {
            return act.BrowseGameProfileContentListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentUuid(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentUuid(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentUuid(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentUuid(GameProfileContent obj)  {
            return act.SetGameProfileContentUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdProfileId(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileId(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentGameIdProfileId(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentGameIdProfileId(GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdUsername(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsername(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentGameIdUsername(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsername(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentGameIdUsername(GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsername(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentUsername(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentUsername(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentUsername(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentUsername(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentUsername(GameProfileContent obj)  {
            return act.SetGameProfileContentUsername(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdProfileIdPath(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileIdPath(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentGameIdProfileIdPath(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileIdPath(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentGameIdProfileIdPath(GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileIdPath(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersion(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileIdPathVersion(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersion(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileIdPathVersion(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersion(GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileIdPathVersion(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdUsernamePath(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsernamePath(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentGameIdUsernamePath(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsernamePath(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentGameIdUsernamePath(GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsernamePath(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdUsernamePathVersion(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsernamePathVersion(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentGameIdUsernamePathVersion(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsernamePathVersion(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentGameIdUsernamePathVersion(GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsernamePathVersion(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(string set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(set_type, obj);
        }
        
        public virtual bool SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(SetType set_type, GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(GameProfileContent obj)  {
            return act.SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentUuid(
            string uuid
        )  {            
            return act.DelGameProfileContentUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdProfileId(
            string game_id
            , string profile_id
        )  {            
            return act.DelGameProfileContentGameIdProfileId(
            game_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdUsername(
            string game_id
            , string username
        )  {            
            return act.DelGameProfileContentGameIdUsername(
            game_id
            , username
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentUsername(
            string username
        )  {            
            return act.DelGameProfileContentUsername(
            username
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdProfileIdPath(
            string game_id
            , string profile_id
            , string path
        )  {            
            return act.DelGameProfileContentGameIdProfileIdPath(
            game_id
            , profile_id
            , path
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdProfileIdPathVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {            
            return act.DelGameProfileContentGameIdProfileIdPathVersion(
            game_id
            , profile_id
            , path
            , version
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdUsernamePath(
            string game_id
            , string username
            , string path
        )  {            
            return act.DelGameProfileContentGameIdUsernamePath(
            game_id
            , username
            , path
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdUsernamePathVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {            
            return act.DelGameProfileContentGameIdUsernamePathVersion(
            game_id
            , username
            , path
            , version
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return act.DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
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
        public virtual List<GameProfileContent> GetGameProfileContentListUuid(
            string uuid
        )  {
            return act.GetGameProfileContentListUuid(
            uuid
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentUuid(
            string uuid
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListUuid(
            string uuid
        ) {
            return CachedGetGameProfileContentListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdProfileId(
            string game_id
            , string profile_id
        )  {
            return act.GetGameProfileContentListGameIdProfileId(
            game_id
            , profile_id
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentGameIdProfileId(
            string game_id
            , string profile_id
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListGameIdProfileId(
            game_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdProfileId(
            string game_id
            , string profile_id
        ) {
            return CachedGetGameProfileContentListGameIdProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , profile_id
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdProfileId(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListGameIdProfileId(
                    game_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdUsername(
            string game_id
            , string username
        )  {
            return act.GetGameProfileContentListGameIdUsername(
            game_id
            , username
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentGameIdUsername(
            string game_id
            , string username
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListGameIdUsername(
            game_id
            , username
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdUsername(
            string game_id
            , string username
        ) {
            return CachedGetGameProfileContentListGameIdUsername(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , username
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdUsername(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string username
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListGameIdUsername(
                    game_id
                    , username
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListUsername(
            string username
        )  {
            return act.GetGameProfileContentListUsername(
            username
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentUsername(
            string username
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListUsername(
            username
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListUsername(
            string username
        ) {
            return CachedGetGameProfileContentListUsername(
                    false
                    , CACHE_DEFAULT_HOURS
                    , username
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListUsername(
            bool overrideCache
            , int cacheHours
            , string username
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListUsername(
                    username
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdProfileIdPath(
            string game_id
            , string profile_id
            , string path
        )  {
            return act.GetGameProfileContentListGameIdProfileIdPath(
            game_id
            , profile_id
            , path
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentGameIdProfileIdPath(
            string game_id
            , string profile_id
            , string path
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListGameIdProfileIdPath(
            game_id
            , profile_id
            , path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdProfileIdPath(
            string game_id
            , string profile_id
            , string path
        ) {
            return CachedGetGameProfileContentListGameIdProfileIdPath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , profile_id
                    , path
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdProfileIdPath(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string profile_id
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListGameIdProfileIdPath(
                    game_id
                    , profile_id
                    , path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdProfileIdPathVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            return act.GetGameProfileContentListGameIdProfileIdPathVersion(
            game_id
            , profile_id
            , path
            , version
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentGameIdProfileIdPathVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListGameIdProfileIdPathVersion(
            game_id
            , profile_id
            , path
            , version
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdProfileIdPathVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        ) {
            return CachedGetGameProfileContentListGameIdProfileIdPathVersion(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , profile_id
                    , path
                    , version
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdProfileIdPathVersion(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string profile_id
            , string path
            , string version
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return act.GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        ) {
            return CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdUsernamePath(
            string game_id
            , string username
            , string path
        )  {
            return act.GetGameProfileContentListGameIdUsernamePath(
            game_id
            , username
            , path
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentGameIdUsernamePath(
            string game_id
            , string username
            , string path
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListGameIdUsernamePath(
            game_id
            , username
            , path
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdUsernamePath(
            string game_id
            , string username
            , string path
        ) {
            return CachedGetGameProfileContentListGameIdUsernamePath(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , username
                    , path
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdUsernamePath(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string username
            , string path
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileContentListGameIdUsernamePath(
                    game_id
                    , username
                    , path
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdUsernamePathVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            return act.GetGameProfileContentListGameIdUsernamePathVersion(
            game_id
            , username
            , path
            , version
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentGameIdUsernamePathVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListGameIdUsernamePathVersion(
            game_id
            , username
            , path
            , version
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdUsernamePathVersion(
            string game_id
            , string username
            , string path
            , string version
        ) {
            return CachedGetGameProfileContentListGameIdUsernamePathVersion(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , username
                    , path
                    , version
                );
        }
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdUsernamePathVersion(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string username
            , string path
            , string version
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return act.GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
            game_id
            , username
            , path
            , version
            , platform
            , increment
            );
        }
        
        public virtual GameProfileContent GetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            foreach (GameProfileContent item in GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        ) {
            return CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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
        
        public virtual List<GameProfileContent> CachedGetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameApp(
        )  {            
            return act.CountGameApp(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppUuid(
            string uuid
        )  {            
            return act.CountGameAppUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppGameId(
            string game_id
        )  {            
            return act.CountGameAppGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppAppId(
            string app_id
        )  {            
            return act.CountGameAppAppId(
            app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppGameIdAppId(
            string game_id
            , string app_id
        )  {            
            return act.CountGameAppGameIdAppId(
            game_id
            , app_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameAppResult BrowseGameAppListFilter(SearchFilter obj)  {
            return act.BrowseGameAppListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAppUuid(string set_type, GameApp obj)  {
            return act.SetGameAppUuid(set_type, obj);
        }
        
        public virtual bool SetGameAppUuid(SetType set_type, GameApp obj)  {
            return act.SetGameAppUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAppUuid(GameApp obj)  {
            return act.SetGameAppUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAppUuid(
            string uuid
        )  {            
            return act.DelGameAppUuid(
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
        public virtual List<GameApp> GetGameAppListUuid(
            string uuid
        )  {
            return act.GetGameAppListUuid(
            uuid
            );
        }
        
        public virtual GameApp GetGameAppUuid(
            string uuid
        )  {
            foreach (GameApp item in GetGameAppListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameApp> CachedGetGameAppListUuid(
            string uuid
        ) {
            return CachedGetGameAppListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameApp> CachedGetGameAppListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAppListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameApp> GetGameAppListGameId(
            string game_id
        )  {
            return act.GetGameAppListGameId(
            game_id
            );
        }
        
        public virtual GameApp GetGameAppGameId(
            string game_id
        )  {
            foreach (GameApp item in GetGameAppListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameApp> CachedGetGameAppListGameId(
            string game_id
        ) {
            return CachedGetGameAppListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameApp> CachedGetGameAppListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAppListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameApp> GetGameAppListAppId(
            string app_id
        )  {
            return act.GetGameAppListAppId(
            app_id
            );
        }
        
        public virtual GameApp GetGameAppAppId(
            string app_id
        )  {
            foreach (GameApp item in GetGameAppListAppId(
            app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameApp> CachedGetGameAppListAppId(
            string app_id
        ) {
            return CachedGetGameAppListAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , app_id
                );
        }
        
        public virtual List<GameApp> CachedGetGameAppListAppId(
            bool overrideCache
            , int cacheHours
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAppListAppId(
                    app_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameApp> GetGameAppListGameIdAppId(
            string game_id
            , string app_id
        )  {
            return act.GetGameAppListGameIdAppId(
            game_id
            , app_id
            );
        }
        
        public virtual GameApp GetGameAppGameIdAppId(
            string game_id
            , string app_id
        )  {
            foreach (GameApp item in GetGameAppListGameIdAppId(
            game_id
            , app_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameApp> CachedGetGameAppListGameIdAppId(
            string game_id
            , string app_id
        ) {
            return CachedGetGameAppListGameIdAppId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                    , app_id
                );
        }
        
        public virtual List<GameApp> CachedGetGameAppListGameIdAppId(
            bool overrideCache
            , int cacheHours
            , string game_id
            , string app_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAppListGameIdAppId(
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
        public virtual int CountProfileGameLocationUuid(
            string uuid
        )  {            
            return act.CountProfileGameLocationUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationGameLocationId(
            string game_location_id
        )  {            
            return act.CountProfileGameLocationGameLocationId(
            game_location_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationProfileId(
            string profile_id
        )  {            
            return act.CountProfileGameLocationProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationProfileIdGameLocationId(
            string profile_id
            , string game_location_id
        )  {            
            return act.CountProfileGameLocationProfileIdGameLocationId(
            profile_id
            , game_location_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileGameLocationResult BrowseProfileGameLocationListFilter(SearchFilter obj)  {
            return act.BrowseProfileGameLocationListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameLocationUuid(string set_type, ProfileGameLocation obj)  {
            return act.SetProfileGameLocationUuid(set_type, obj);
        }
        
        public virtual bool SetProfileGameLocationUuid(SetType set_type, ProfileGameLocation obj)  {
            return act.SetProfileGameLocationUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileGameLocationUuid(ProfileGameLocation obj)  {
            return act.SetProfileGameLocationUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameLocationUuid(
            string uuid
        )  {            
            return act.DelProfileGameLocationUuid(
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
        public virtual List<ProfileGameLocation> GetProfileGameLocationListUuid(
            string uuid
        )  {
            return act.GetProfileGameLocationListUuid(
            uuid
            );
        }
        
        public virtual ProfileGameLocation GetProfileGameLocationUuid(
            string uuid
        )  {
            foreach (ProfileGameLocation item in GetProfileGameLocationListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListUuid(
            string uuid
        ) {
            return CachedGetProfileGameLocationListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameLocationListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameLocation> GetProfileGameLocationListGameLocationId(
            string game_location_id
        )  {
            return act.GetProfileGameLocationListGameLocationId(
            game_location_id
            );
        }
        
        public virtual ProfileGameLocation GetProfileGameLocationGameLocationId(
            string game_location_id
        )  {
            foreach (ProfileGameLocation item in GetProfileGameLocationListGameLocationId(
            game_location_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListGameLocationId(
            string game_location_id
        ) {
            return CachedGetProfileGameLocationListGameLocationId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_location_id
                );
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListGameLocationId(
            bool overrideCache
            , int cacheHours
            , string game_location_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameLocationListGameLocationId(
                    game_location_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameLocation> GetProfileGameLocationListProfileId(
            string profile_id
        )  {
            return act.GetProfileGameLocationListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileGameLocation GetProfileGameLocationProfileId(
            string profile_id
        )  {
            foreach (ProfileGameLocation item in GetProfileGameLocationListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListProfileId(
            string profile_id
        ) {
            return CachedGetProfileGameLocationListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameLocationListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileGameLocation> GetProfileGameLocationListProfileIdGameLocationId(
            string profile_id
            , string game_location_id
        )  {
            return act.GetProfileGameLocationListProfileIdGameLocationId(
            profile_id
            , game_location_id
            );
        }
        
        public virtual ProfileGameLocation GetProfileGameLocationProfileIdGameLocationId(
            string profile_id
            , string game_location_id
        )  {
            foreach (ProfileGameLocation item in GetProfileGameLocationListProfileIdGameLocationId(
            profile_id
            , game_location_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListProfileIdGameLocationId(
            string profile_id
            , string game_location_id
        ) {
            return CachedGetProfileGameLocationListProfileIdGameLocationId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_location_id
                );
        }
        
        public virtual List<ProfileGameLocation> CachedGetProfileGameLocationListProfileIdGameLocationId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_location_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileGameLocationListProfileIdGameLocationId(
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
        public virtual int CountGamePhotoUuid(
            string uuid
        )  {            
            return act.CountGamePhotoUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoExternalId(
            string external_id
        )  {            
            return act.CountGamePhotoExternalId(
            external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoUrl(
            string url
        )  {            
            return act.CountGamePhotoUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoUrlExternalId(
            string url
            , string external_id
        )  {            
            return act.CountGamePhotoUrlExternalId(
            url
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return act.CountGamePhotoUuidExternalId(
            uuid
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GamePhotoResult BrowseGamePhotoListFilter(SearchFilter obj)  {
            return act.BrowseGamePhotoListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoUuid(string set_type, GamePhoto obj)  {
            return act.SetGamePhotoUuid(set_type, obj);
        }
        
        public virtual bool SetGamePhotoUuid(SetType set_type, GamePhoto obj)  {
            return act.SetGamePhotoUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGamePhotoUuid(GamePhoto obj)  {
            return act.SetGamePhotoUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoExternalId(string set_type, GamePhoto obj)  {
            return act.SetGamePhotoExternalId(set_type, obj);
        }
        
        public virtual bool SetGamePhotoExternalId(SetType set_type, GamePhoto obj)  {
            return act.SetGamePhotoExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGamePhotoExternalId(GamePhoto obj)  {
            return act.SetGamePhotoExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoUrl(string set_type, GamePhoto obj)  {
            return act.SetGamePhotoUrl(set_type, obj);
        }
        
        public virtual bool SetGamePhotoUrl(SetType set_type, GamePhoto obj)  {
            return act.SetGamePhotoUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGamePhotoUrl(GamePhoto obj)  {
            return act.SetGamePhotoUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoUrlExternalId(string set_type, GamePhoto obj)  {
            return act.SetGamePhotoUrlExternalId(set_type, obj);
        }
        
        public virtual bool SetGamePhotoUrlExternalId(SetType set_type, GamePhoto obj)  {
            return act.SetGamePhotoUrlExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGamePhotoUrlExternalId(GamePhoto obj)  {
            return act.SetGamePhotoUrlExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoUuidExternalId(string set_type, GamePhoto obj)  {
            return act.SetGamePhotoUuidExternalId(set_type, obj);
        }
        
        public virtual bool SetGamePhotoUuidExternalId(SetType set_type, GamePhoto obj)  {
            return act.SetGamePhotoUuidExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGamePhotoUuidExternalId(GamePhoto obj)  {
            return act.SetGamePhotoUuidExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoUuid(
            string uuid
        )  {            
            return act.DelGamePhotoUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoExternalId(
            string external_id
        )  {            
            return act.DelGamePhotoExternalId(
            external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoUrl(
            string url
        )  {            
            return act.DelGamePhotoUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoUrlExternalId(
            string url
            , string external_id
        )  {            
            return act.DelGamePhotoUrlExternalId(
            url
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return act.DelGamePhotoUuidExternalId(
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
        public virtual List<GamePhoto> GetGamePhotoListUuid(
            string uuid
        )  {
            return act.GetGamePhotoListUuid(
            uuid
            );
        }
        
        public virtual GamePhoto GetGamePhotoUuid(
            string uuid
        )  {
            foreach (GamePhoto item in GetGamePhotoListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListUuid(
            string uuid
        ) {
            return CachedGetGamePhotoListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GamePhoto> GetGamePhotoListExternalId(
            string external_id
        )  {
            return act.GetGamePhotoListExternalId(
            external_id
            );
        }
        
        public virtual GamePhoto GetGamePhotoExternalId(
            string external_id
        )  {
            foreach (GamePhoto item in GetGamePhotoListExternalId(
            external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListExternalId(
            string external_id
        ) {
            return CachedGetGamePhotoListExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , external_id
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListExternalId(
            bool overrideCache
            , int cacheHours
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoListExternalId(
                    external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GamePhoto> GetGamePhotoListUrl(
            string url
        )  {
            return act.GetGamePhotoListUrl(
            url
            );
        }
        
        public virtual GamePhoto GetGamePhotoUrl(
            string url
        )  {
            foreach (GamePhoto item in GetGamePhotoListUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListUrl(
            string url
        ) {
            return CachedGetGamePhotoListUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoListUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GamePhoto> GetGamePhotoListUrlExternalId(
            string url
            , string external_id
        )  {
            return act.GetGamePhotoListUrlExternalId(
            url
            , external_id
            );
        }
        
        public virtual GamePhoto GetGamePhotoUrlExternalId(
            string url
            , string external_id
        )  {
            foreach (GamePhoto item in GetGamePhotoListUrlExternalId(
            url
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListUrlExternalId(
            string url
            , string external_id
        ) {
            return CachedGetGamePhotoListUrlExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , external_id
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListUrlExternalId(
            bool overrideCache
            , int cacheHours
            , string url
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoListUrlExternalId(
                    url
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GamePhoto> GetGamePhotoListUuidExternalId(
            string uuid
            , string external_id
        )  {
            return act.GetGamePhotoListUuidExternalId(
            uuid
            , external_id
            );
        }
        
        public virtual GamePhoto GetGamePhotoUuidExternalId(
            string uuid
            , string external_id
        )  {
            foreach (GamePhoto item in GetGamePhotoListUuidExternalId(
            uuid
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListUuidExternalId(
            string uuid
            , string external_id
        ) {
            return CachedGetGamePhotoListUuidExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , external_id
                );
        }
        
        public virtual List<GamePhoto> CachedGetGamePhotoListUuidExternalId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGamePhotoListUuidExternalId(
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
        public virtual int CountGameVideoUuid(
            string uuid
        )  {            
            return act.CountGameVideoUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoExternalId(
            string external_id
        )  {            
            return act.CountGameVideoExternalId(
            external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoUrl(
            string url
        )  {            
            return act.CountGameVideoUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoUrlExternalId(
            string url
            , string external_id
        )  {            
            return act.CountGameVideoUrlExternalId(
            url
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return act.CountGameVideoUuidExternalId(
            uuid
            , external_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameVideoResult BrowseGameVideoListFilter(SearchFilter obj)  {
            return act.BrowseGameVideoListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoUuid(string set_type, GameVideo obj)  {
            return act.SetGameVideoUuid(set_type, obj);
        }
        
        public virtual bool SetGameVideoUuid(SetType set_type, GameVideo obj)  {
            return act.SetGameVideoUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameVideoUuid(GameVideo obj)  {
            return act.SetGameVideoUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoExternalId(string set_type, GameVideo obj)  {
            return act.SetGameVideoExternalId(set_type, obj);
        }
        
        public virtual bool SetGameVideoExternalId(SetType set_type, GameVideo obj)  {
            return act.SetGameVideoExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameVideoExternalId(GameVideo obj)  {
            return act.SetGameVideoExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoUrl(string set_type, GameVideo obj)  {
            return act.SetGameVideoUrl(set_type, obj);
        }
        
        public virtual bool SetGameVideoUrl(SetType set_type, GameVideo obj)  {
            return act.SetGameVideoUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameVideoUrl(GameVideo obj)  {
            return act.SetGameVideoUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoUrlExternalId(string set_type, GameVideo obj)  {
            return act.SetGameVideoUrlExternalId(set_type, obj);
        }
        
        public virtual bool SetGameVideoUrlExternalId(SetType set_type, GameVideo obj)  {
            return act.SetGameVideoUrlExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameVideoUrlExternalId(GameVideo obj)  {
            return act.SetGameVideoUrlExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoUuidExternalId(string set_type, GameVideo obj)  {
            return act.SetGameVideoUuidExternalId(set_type, obj);
        }
        
        public virtual bool SetGameVideoUuidExternalId(SetType set_type, GameVideo obj)  {
            return act.SetGameVideoUuidExternalId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameVideoUuidExternalId(GameVideo obj)  {
            return act.SetGameVideoUuidExternalId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoUuid(
            string uuid
        )  {            
            return act.DelGameVideoUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoExternalId(
            string external_id
        )  {            
            return act.DelGameVideoExternalId(
            external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoUrl(
            string url
        )  {            
            return act.DelGameVideoUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoUrlExternalId(
            string url
            , string external_id
        )  {            
            return act.DelGameVideoUrlExternalId(
            url
            , external_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return act.DelGameVideoUuidExternalId(
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
        public virtual List<GameVideo> GetGameVideoListUuid(
            string uuid
        )  {
            return act.GetGameVideoListUuid(
            uuid
            );
        }
        
        public virtual GameVideo GetGameVideoUuid(
            string uuid
        )  {
            foreach (GameVideo item in GetGameVideoListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListUuid(
            string uuid
        ) {
            return CachedGetGameVideoListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameVideo> GetGameVideoListExternalId(
            string external_id
        )  {
            return act.GetGameVideoListExternalId(
            external_id
            );
        }
        
        public virtual GameVideo GetGameVideoExternalId(
            string external_id
        )  {
            foreach (GameVideo item in GetGameVideoListExternalId(
            external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListExternalId(
            string external_id
        ) {
            return CachedGetGameVideoListExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , external_id
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListExternalId(
            bool overrideCache
            , int cacheHours
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoListExternalId(
                    external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameVideo> GetGameVideoListUrl(
            string url
        )  {
            return act.GetGameVideoListUrl(
            url
            );
        }
        
        public virtual GameVideo GetGameVideoUrl(
            string url
        )  {
            foreach (GameVideo item in GetGameVideoListUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListUrl(
            string url
        ) {
            return CachedGetGameVideoListUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoListUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameVideo> GetGameVideoListUrlExternalId(
            string url
            , string external_id
        )  {
            return act.GetGameVideoListUrlExternalId(
            url
            , external_id
            );
        }
        
        public virtual GameVideo GetGameVideoUrlExternalId(
            string url
            , string external_id
        )  {
            foreach (GameVideo item in GetGameVideoListUrlExternalId(
            url
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListUrlExternalId(
            string url
            , string external_id
        ) {
            return CachedGetGameVideoListUrlExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , external_id
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListUrlExternalId(
            bool overrideCache
            , int cacheHours
            , string url
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoListUrlExternalId(
                    url
                    , external_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameVideo> GetGameVideoListUuidExternalId(
            string uuid
            , string external_id
        )  {
            return act.GetGameVideoListUuidExternalId(
            uuid
            , external_id
            );
        }
        
        public virtual GameVideo GetGameVideoUuidExternalId(
            string uuid
            , string external_id
        )  {
            foreach (GameVideo item in GetGameVideoListUuidExternalId(
            uuid
            , external_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListUuidExternalId(
            string uuid
            , string external_id
        ) {
            return CachedGetGameVideoListUuidExternalId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , external_id
                );
        }
        
        public virtual List<GameVideo> CachedGetGameVideoListUuidExternalId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string external_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameVideoListUuidExternalId(
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
        public virtual int CountGameRpgItemWeaponUuid(
            string uuid
        )  {            
            return act.CountGameRpgItemWeaponUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponGameId(
            string game_id
        )  {            
            return act.CountGameRpgItemWeaponGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponUrl(
            string url
        )  {            
            return act.CountGameRpgItemWeaponUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponUrlGameId(
            string url
            , string game_id
        )  {            
            return act.CountGameRpgItemWeaponUrlGameId(
            url
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponUuidGameId(
            string uuid
            , string game_id
        )  {            
            return act.CountGameRpgItemWeaponUuidGameId(
            uuid
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameRpgItemWeaponResult BrowseGameRpgItemWeaponListFilter(SearchFilter obj)  {
            return act.BrowseGameRpgItemWeaponListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponUuid(string set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUuid(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemWeaponUuid(SetType set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemWeaponUuid(GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponGameId(string set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemWeaponGameId(SetType set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemWeaponGameId(GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponUrl(string set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUrl(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemWeaponUrl(SetType set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemWeaponUrl(GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponUrlGameId(string set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUrlGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemWeaponUrlGameId(SetType set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUrlGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemWeaponUrlGameId(GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUrlGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponUuidGameId(string set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUuidGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemWeaponUuidGameId(SetType set_type, GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUuidGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemWeaponUuidGameId(GameRpgItemWeapon obj)  {
            return act.SetGameRpgItemWeaponUuidGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponUuid(
            string uuid
        )  {            
            return act.DelGameRpgItemWeaponUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponGameId(
            string game_id
        )  {            
            return act.DelGameRpgItemWeaponGameId(
            game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponUrl(
            string url
        )  {            
            return act.DelGameRpgItemWeaponUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponUrlGameId(
            string url
            , string game_id
        )  {            
            return act.DelGameRpgItemWeaponUrlGameId(
            url
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponUuidGameId(
            string uuid
            , string game_id
        )  {            
            return act.DelGameRpgItemWeaponUuidGameId(
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
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListUuid(
            string uuid
        )  {
            return act.GetGameRpgItemWeaponListUuid(
            uuid
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeaponUuid(
            string uuid
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListUuid(
            string uuid
        ) {
            return CachedGetGameRpgItemWeaponListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListGameId(
            string game_id
        )  {
            return act.GetGameRpgItemWeaponListGameId(
            game_id
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeaponGameId(
            string game_id
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListGameId(
            string game_id
        ) {
            return CachedGetGameRpgItemWeaponListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListUrl(
            string url
        )  {
            return act.GetGameRpgItemWeaponListUrl(
            url
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeaponUrl(
            string url
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponListUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListUrl(
            string url
        ) {
            return CachedGetGameRpgItemWeaponListUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponListUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListUrlGameId(
            string url
            , string game_id
        )  {
            return act.GetGameRpgItemWeaponListUrlGameId(
            url
            , game_id
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeaponUrlGameId(
            string url
            , string game_id
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponListUrlGameId(
            url
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListUrlGameId(
            string url
            , string game_id
        ) {
            return CachedGetGameRpgItemWeaponListUrlGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListUrlGameId(
            bool overrideCache
            , int cacheHours
            , string url
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponListUrlGameId(
                    url
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListUuidGameId(
            string uuid
            , string game_id
        )  {
            return act.GetGameRpgItemWeaponListUuidGameId(
            uuid
            , game_id
            );
        }
        
        public virtual GameRpgItemWeapon GetGameRpgItemWeaponUuidGameId(
            string uuid
            , string game_id
        )  {
            foreach (GameRpgItemWeapon item in GetGameRpgItemWeaponListUuidGameId(
            uuid
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListUuidGameId(
            string uuid
            , string game_id
        ) {
            return CachedGetGameRpgItemWeaponListUuidGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemWeapon> CachedGetGameRpgItemWeaponListUuidGameId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemWeaponListUuidGameId(
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
        public virtual int CountGameRpgItemSkillUuid(
            string uuid
        )  {            
            return act.CountGameRpgItemSkillUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillGameId(
            string game_id
        )  {            
            return act.CountGameRpgItemSkillGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillUrl(
            string url
        )  {            
            return act.CountGameRpgItemSkillUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillUrlGameId(
            string url
            , string game_id
        )  {            
            return act.CountGameRpgItemSkillUrlGameId(
            url
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillUuidGameId(
            string uuid
            , string game_id
        )  {            
            return act.CountGameRpgItemSkillUuidGameId(
            uuid
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameRpgItemSkillResult BrowseGameRpgItemSkillListFilter(SearchFilter obj)  {
            return act.BrowseGameRpgItemSkillListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillUuid(string set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUuid(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemSkillUuid(SetType set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemSkillUuid(GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillGameId(string set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemSkillGameId(SetType set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemSkillGameId(GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillUrl(string set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUrl(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemSkillUrl(SetType set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemSkillUrl(GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillUrlGameId(string set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUrlGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemSkillUrlGameId(SetType set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUrlGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemSkillUrlGameId(GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUrlGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillUuidGameId(string set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUuidGameId(set_type, obj);
        }
        
        public virtual bool SetGameRpgItemSkillUuidGameId(SetType set_type, GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUuidGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameRpgItemSkillUuidGameId(GameRpgItemSkill obj)  {
            return act.SetGameRpgItemSkillUuidGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillUuid(
            string uuid
        )  {            
            return act.DelGameRpgItemSkillUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillGameId(
            string game_id
        )  {            
            return act.DelGameRpgItemSkillGameId(
            game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillUrl(
            string url
        )  {            
            return act.DelGameRpgItemSkillUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillUrlGameId(
            string url
            , string game_id
        )  {            
            return act.DelGameRpgItemSkillUrlGameId(
            url
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillUuidGameId(
            string uuid
            , string game_id
        )  {            
            return act.DelGameRpgItemSkillUuidGameId(
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
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListUuid(
            string uuid
        )  {
            return act.GetGameRpgItemSkillListUuid(
            uuid
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkillUuid(
            string uuid
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListUuid(
            string uuid
        ) {
            return CachedGetGameRpgItemSkillListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListGameId(
            string game_id
        )  {
            return act.GetGameRpgItemSkillListGameId(
            game_id
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkillGameId(
            string game_id
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListGameId(
            string game_id
        ) {
            return CachedGetGameRpgItemSkillListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListUrl(
            string url
        )  {
            return act.GetGameRpgItemSkillListUrl(
            url
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkillUrl(
            string url
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillListUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListUrl(
            string url
        ) {
            return CachedGetGameRpgItemSkillListUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillListUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListUrlGameId(
            string url
            , string game_id
        )  {
            return act.GetGameRpgItemSkillListUrlGameId(
            url
            , game_id
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkillUrlGameId(
            string url
            , string game_id
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillListUrlGameId(
            url
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListUrlGameId(
            string url
            , string game_id
        ) {
            return CachedGetGameRpgItemSkillListUrlGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListUrlGameId(
            bool overrideCache
            , int cacheHours
            , string url
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillListUrlGameId(
                    url
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListUuidGameId(
            string uuid
            , string game_id
        )  {
            return act.GetGameRpgItemSkillListUuidGameId(
            uuid
            , game_id
            );
        }
        
        public virtual GameRpgItemSkill GetGameRpgItemSkillUuidGameId(
            string uuid
            , string game_id
        )  {
            foreach (GameRpgItemSkill item in GetGameRpgItemSkillListUuidGameId(
            uuid
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListUuidGameId(
            string uuid
            , string game_id
        ) {
            return CachedGetGameRpgItemSkillListUuidGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , game_id
                );
        }
        
        public virtual List<GameRpgItemSkill> CachedGetGameRpgItemSkillListUuidGameId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameRpgItemSkillListUuidGameId(
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
        public virtual int CountGameProductUuid(
            string uuid
        )  {            
            return act.CountGameProductUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductGameId(
            string game_id
        )  {            
            return act.CountGameProductGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductUrl(
            string url
        )  {            
            return act.CountGameProductUrl(
            url
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductUrlGameId(
            string url
            , string game_id
        )  {            
            return act.CountGameProductUrlGameId(
            url
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductUuidGameId(
            string uuid
            , string game_id
        )  {            
            return act.CountGameProductUuidGameId(
            uuid
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProductResult BrowseGameProductListFilter(SearchFilter obj)  {
            return act.BrowseGameProductListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductUuid(string set_type, GameProduct obj)  {
            return act.SetGameProductUuid(set_type, obj);
        }
        
        public virtual bool SetGameProductUuid(SetType set_type, GameProduct obj)  {
            return act.SetGameProductUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProductUuid(GameProduct obj)  {
            return act.SetGameProductUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductGameId(string set_type, GameProduct obj)  {
            return act.SetGameProductGameId(set_type, obj);
        }
        
        public virtual bool SetGameProductGameId(SetType set_type, GameProduct obj)  {
            return act.SetGameProductGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProductGameId(GameProduct obj)  {
            return act.SetGameProductGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductUrl(string set_type, GameProduct obj)  {
            return act.SetGameProductUrl(set_type, obj);
        }
        
        public virtual bool SetGameProductUrl(SetType set_type, GameProduct obj)  {
            return act.SetGameProductUrl(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProductUrl(GameProduct obj)  {
            return act.SetGameProductUrl(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductUrlGameId(string set_type, GameProduct obj)  {
            return act.SetGameProductUrlGameId(set_type, obj);
        }
        
        public virtual bool SetGameProductUrlGameId(SetType set_type, GameProduct obj)  {
            return act.SetGameProductUrlGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProductUrlGameId(GameProduct obj)  {
            return act.SetGameProductUrlGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductUuidGameId(string set_type, GameProduct obj)  {
            return act.SetGameProductUuidGameId(set_type, obj);
        }
        
        public virtual bool SetGameProductUuidGameId(SetType set_type, GameProduct obj)  {
            return act.SetGameProductUuidGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProductUuidGameId(GameProduct obj)  {
            return act.SetGameProductUuidGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductUuid(
            string uuid
        )  {            
            return act.DelGameProductUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductGameId(
            string game_id
        )  {            
            return act.DelGameProductGameId(
            game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductUrl(
            string url
        )  {            
            return act.DelGameProductUrl(
            url
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductUrlGameId(
            string url
            , string game_id
        )  {            
            return act.DelGameProductUrlGameId(
            url
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductUuidGameId(
            string uuid
            , string game_id
        )  {            
            return act.DelGameProductUuidGameId(
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
        public virtual List<GameProduct> GetGameProductListUuid(
            string uuid
        )  {
            return act.GetGameProductListUuid(
            uuid
            );
        }
        
        public virtual GameProduct GetGameProductUuid(
            string uuid
        )  {
            foreach (GameProduct item in GetGameProductListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductListUuid(
            string uuid
        ) {
            return CachedGetGameProductListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProduct> GetGameProductListGameId(
            string game_id
        )  {
            return act.GetGameProductListGameId(
            game_id
            );
        }
        
        public virtual GameProduct GetGameProductGameId(
            string game_id
        )  {
            foreach (GameProduct item in GetGameProductListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductListGameId(
            string game_id
        ) {
            return CachedGetGameProductListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProduct> GetGameProductListUrl(
            string url
        )  {
            return act.GetGameProductListUrl(
            url
            );
        }
        
        public virtual GameProduct GetGameProductUrl(
            string url
        )  {
            foreach (GameProduct item in GetGameProductListUrl(
            url
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductListUrl(
            string url
        ) {
            return CachedGetGameProductListUrl(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductListUrl(
            bool overrideCache
            , int cacheHours
            , string url
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductListUrl(
                    url
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProduct> GetGameProductListUrlGameId(
            string url
            , string game_id
        )  {
            return act.GetGameProductListUrlGameId(
            url
            , game_id
            );
        }
        
        public virtual GameProduct GetGameProductUrlGameId(
            string url
            , string game_id
        )  {
            foreach (GameProduct item in GetGameProductListUrlGameId(
            url
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductListUrlGameId(
            string url
            , string game_id
        ) {
            return CachedGetGameProductListUrlGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , url
                    , game_id
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductListUrlGameId(
            bool overrideCache
            , int cacheHours
            , string url
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductListUrlGameId(
                    url
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProduct> GetGameProductListUuidGameId(
            string uuid
            , string game_id
        )  {
            return act.GetGameProductListUuidGameId(
            uuid
            , game_id
            );
        }
        
        public virtual GameProduct GetGameProductUuidGameId(
            string uuid
            , string game_id
        )  {
            foreach (GameProduct item in GetGameProductListUuidGameId(
            uuid
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProduct> CachedGetGameProductListUuidGameId(
            string uuid
            , string game_id
        ) {
            return CachedGetGameProductListUuidGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                    , game_id
                );
        }
        
        public virtual List<GameProduct> CachedGetGameProductListUuidGameId(
            bool overrideCache
            , int cacheHours
            , string uuid
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProductListUuidGameId(
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
        public virtual int CountGameStatisticLeaderboardUuid(
            string uuid
        )  {            
            return act.CountGameStatisticLeaderboardUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardGameId(
            string game_id
        )  {            
            return act.CountGameStatisticLeaderboardGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardCode(
            string code
        )  {            
            return act.CountGameStatisticLeaderboardCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardCodeGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardCodeGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.CountGameStatisticLeaderboardCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameStatisticLeaderboardResult BrowseGameStatisticLeaderboardListFilter(SearchFilter obj)  {
            return act.BrowseGameStatisticLeaderboardListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardUuid(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardUuid(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardUuid(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardUuid(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCode(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCode(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardCode(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardCode(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCodeGameId(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCodeGameId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardCodeGameId(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCodeGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardCodeGameId(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCodeGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileId(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCodeGameIdProfileId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileId(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCodeGameIdProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileId(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCodeGameIdProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(SetType set_type, GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(GameStatisticLeaderboard obj)  {
            return act.SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardUuid(
            string uuid
        )  {            
            return act.DelGameStatisticLeaderboardUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardCode(
            string code
        )  {            
            return act.DelGameStatisticLeaderboardCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardCodeGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardCodeGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.DelGameStatisticLeaderboardCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardProfileIdGameId(
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
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListUuid(
            string uuid
        )  {
            return act.GetGameStatisticLeaderboardListUuid(
            uuid
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardUuid(
            string uuid
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListUuid(
            string uuid
        ) {
            return CachedGetGameStatisticLeaderboardListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListGameId(
            string game_id
        )  {
            return act.GetGameStatisticLeaderboardListGameId(
            game_id
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardGameId(
            string game_id
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListGameId(
            string game_id
        ) {
            return CachedGetGameStatisticLeaderboardListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListCode(
            string code
        )  {
            return act.GetGameStatisticLeaderboardListCode(
            code
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardCode(
            string code
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListCode(
            string code
        ) {
            return CachedGetGameStatisticLeaderboardListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListCodeGameId(
            string code
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardListCodeGameId(
            code
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardCodeGameId(
            string code
            , string game_id
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListCodeGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListCodeGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardListCodeGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListCodeGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListCodeGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return act.GetGameStatisticLeaderboardListCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        ) {
            return CachedGetGameStatisticLeaderboardListCodeGameIdProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListCodeGameIdProfileId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListCodeGameIdProfileId(
                    code
                    , game_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListProfileIdGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboard GetGameStatisticLeaderboardProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboard item in GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboard> CachedGetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItem(
        )  {            
            return act.CountGameStatisticLeaderboardItem(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemUuid(
            string uuid
        )  {            
            return act.CountGameStatisticLeaderboardItemUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemGameId(
            string game_id
        )  {            
            return act.CountGameStatisticLeaderboardItemGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemCode(
            string code
        )  {            
            return act.CountGameStatisticLeaderboardItemCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemCodeGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardItemCodeGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.CountGameStatisticLeaderboardItemCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardItemProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameStatisticLeaderboardItemResult BrowseGameStatisticLeaderboardItemListFilter(SearchFilter obj)  {
            return act.BrowseGameStatisticLeaderboardItemListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemUuid(string set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemUuid(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemUuid(SetType set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemUuid(GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(SetType set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCode(string set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCode(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemCode(SetType set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemCode(GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameId(string set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCodeGameId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemCodeGameId(SetType set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCodeGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemCodeGameId(GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCodeGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileId(string set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCodeGameIdProfileId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileId(SetType set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCodeGameIdProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileId(GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCodeGameIdProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(SetType set_type, GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(GameStatisticLeaderboardItem obj)  {
            return act.SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemUuid(
            string uuid
        )  {            
            return act.DelGameStatisticLeaderboardItemUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemCode(
            string code
        )  {            
            return act.DelGameStatisticLeaderboardItemCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemCodeGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardItemCodeGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.DelGameStatisticLeaderboardItemCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardItemProfileIdGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemList(
        )  {
            return act.GetGameStatisticLeaderboardItemList(
            );
        }
        
        public virtual GameStatisticLeaderboardItem GetGameStatisticLeaderboardItem(
        )  {
            foreach (GameStatisticLeaderboardItem item in GetGameStatisticLeaderboardItemList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemList(
        ) {
            return CachedGetGameStatisticLeaderboardItemList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemList(
            bool overrideCache
            , int cacheHours
        ) {
            List<GameStatisticLeaderboardItem> objs;

            string method_name = "CachedGetGameStatisticLeaderboardItemList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<GameStatisticLeaderboardItem>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardItemList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListUuid(
            string uuid
        )  {
            return act.GetGameStatisticLeaderboardItemListUuid(
            uuid
            );
        }
        
        public virtual GameStatisticLeaderboardItem GetGameStatisticLeaderboardItemUuid(
            string uuid
        )  {
            foreach (GameStatisticLeaderboardItem item in GetGameStatisticLeaderboardItemListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListUuid(
            string uuid
        ) {
            return CachedGetGameStatisticLeaderboardItemListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardItemListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListGameId(
            string game_id
        )  {
            return act.GetGameStatisticLeaderboardItemListGameId(
            game_id
            );
        }
        
        public virtual GameStatisticLeaderboardItem GetGameStatisticLeaderboardItemGameId(
            string game_id
        )  {
            foreach (GameStatisticLeaderboardItem item in GetGameStatisticLeaderboardItemListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListGameId(
            string game_id
        ) {
            return CachedGetGameStatisticLeaderboardItemListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardItemListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListCode(
            string code
        )  {
            return act.GetGameStatisticLeaderboardItemListCode(
            code
            );
        }
        
        public virtual GameStatisticLeaderboardItem GetGameStatisticLeaderboardItemCode(
            string code
        )  {
            foreach (GameStatisticLeaderboardItem item in GetGameStatisticLeaderboardItemListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListCode(
            string code
        ) {
            return CachedGetGameStatisticLeaderboardItemListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardItemListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListCodeGameId(
            string code
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardItemListCodeGameId(
            code
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboardItem GetGameStatisticLeaderboardItemCodeGameId(
            string code
            , string game_id
        )  {
            foreach (GameStatisticLeaderboardItem item in GetGameStatisticLeaderboardItemListCodeGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListCodeGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardItemListCodeGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListCodeGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardItemListCodeGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return act.GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            );
        }
        
        public virtual GameStatisticLeaderboardItem GetGameStatisticLeaderboardItemCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            foreach (GameStatisticLeaderboardItem item in GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        ) {
            return CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
                    code
                    , game_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboardItem GetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboardItem item in GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardItemListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboardItem GetGameStatisticLeaderboardItemProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameStatisticLeaderboardItem item in GetGameStatisticLeaderboardItemListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardItemListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardItemListProfileIdGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboardItem GetGameStatisticLeaderboardItemProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboardItem item in GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboardItem> CachedGetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
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
        public virtual int CountGameStatisticLeaderboardRollupUuid(
            string uuid
        )  {            
            return act.CountGameStatisticLeaderboardRollupUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupGameId(
            string game_id
        )  {            
            return act.CountGameStatisticLeaderboardRollupGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupCode(
            string code
        )  {            
            return act.CountGameStatisticLeaderboardRollupCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupCodeGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardRollupCodeGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameStatisticLeaderboardRollupProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameStatisticLeaderboardRollupResult BrowseGameStatisticLeaderboardRollupListFilter(SearchFilter obj)  {
            return act.BrowseGameStatisticLeaderboardRollupListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupUuid(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupUuid(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupUuid(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupUuid(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCode(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCode(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupCode(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupCode(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameId(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCodeGameId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameId(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCodeGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameId(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCodeGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileId(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCodeGameIdProfileId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileId(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCodeGameIdProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileId(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCodeGameIdProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(SetType set_type, GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(GameStatisticLeaderboardRollup obj)  {
            return act.SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupUuid(
            string uuid
        )  {            
            return act.DelGameStatisticLeaderboardRollupUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupCode(
            string code
        )  {            
            return act.DelGameStatisticLeaderboardRollupCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupCodeGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardRollupCodeGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return act.DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return act.DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameStatisticLeaderboardRollupProfileIdGameId(
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
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListUuid(
            string uuid
        )  {
            return act.GetGameStatisticLeaderboardRollupListUuid(
            uuid
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupUuid(
            string uuid
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListUuid(
            string uuid
        ) {
            return CachedGetGameStatisticLeaderboardRollupListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListGameId(
            string game_id
        )  {
            return act.GetGameStatisticLeaderboardRollupListGameId(
            game_id
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupGameId(
            string game_id
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListGameId(
            string game_id
        ) {
            return CachedGetGameStatisticLeaderboardRollupListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListCode(
            string code
        )  {
            return act.GetGameStatisticLeaderboardRollupListCode(
            code
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupCode(
            string code
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListCode(
            string code
        ) {
            return CachedGetGameStatisticLeaderboardRollupListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListCodeGameId(
            string code
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardRollupListCodeGameId(
            code
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupCodeGameId(
            string code
            , string game_id
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListCodeGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListCodeGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardRollupListCodeGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListCodeGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListCodeGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return act.GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
            code
            , game_id
            , profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        ) {
            return CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
                    code
                    , game_id
                    , profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                    , profile_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
            , string profile_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameStatisticLeaderboardRollupListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameStatisticLeaderboardRollupListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListProfileIdGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameStatisticLeaderboardRollup GetGameStatisticLeaderboardRollupProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameStatisticLeaderboardRollup item in GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameStatisticLeaderboardRollup> CachedGetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
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
        public virtual int CountGameLiveQueueUuid(
            string uuid
        )  {            
            return act.CountGameLiveQueueUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveQueueProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameLiveQueueProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameLiveQueueResult BrowseGameLiveQueueListFilter(SearchFilter obj)  {
            return act.BrowseGameLiveQueueListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveQueueUuid(string set_type, GameLiveQueue obj)  {
            return act.SetGameLiveQueueUuid(set_type, obj);
        }
        
        public virtual bool SetGameLiveQueueUuid(SetType set_type, GameLiveQueue obj)  {
            return act.SetGameLiveQueueUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLiveQueueUuid(GameLiveQueue obj)  {
            return act.SetGameLiveQueueUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveQueueProfileIdGameId(string set_type, GameLiveQueue obj)  {
            return act.SetGameLiveQueueProfileIdGameId(set_type, obj);
        }
        
        public virtual bool SetGameLiveQueueProfileIdGameId(SetType set_type, GameLiveQueue obj)  {
            return act.SetGameLiveQueueProfileIdGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLiveQueueProfileIdGameId(GameLiveQueue obj)  {
            return act.SetGameLiveQueueProfileIdGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveQueueUuid(
            string uuid
        )  {            
            return act.DelGameLiveQueueUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveQueueProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameLiveQueueProfileIdGameId(
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
        public virtual List<GameLiveQueue> GetGameLiveQueueListUuid(
            string uuid
        )  {
            return act.GetGameLiveQueueListUuid(
            uuid
            );
        }
        
        public virtual GameLiveQueue GetGameLiveQueueUuid(
            string uuid
        )  {
            foreach (GameLiveQueue item in GetGameLiveQueueListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListUuid(
            string uuid
        ) {
            return CachedGetGameLiveQueueListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveQueueListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveQueue> GetGameLiveQueueListGameId(
            string game_id
        )  {
            return act.GetGameLiveQueueListGameId(
            game_id
            );
        }
        
        public virtual GameLiveQueue GetGameLiveQueueGameId(
            string game_id
        )  {
            foreach (GameLiveQueue item in GetGameLiveQueueListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListGameId(
            string game_id
        ) {
            return CachedGetGameLiveQueueListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveQueueListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveQueue> GetGameLiveQueueListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameLiveQueueListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameLiveQueue GetGameLiveQueueProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameLiveQueue item in GetGameLiveQueueListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameLiveQueueListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameLiveQueue> CachedGetGameLiveQueueListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveQueueListProfileIdGameId(
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
        public virtual int CountGameLiveRecentQueueUuid(
            string uuid
        )  {            
            return act.CountGameLiveRecentQueueUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveRecentQueueProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameLiveRecentQueueProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameLiveRecentQueueResult BrowseGameLiveRecentQueueListFilter(SearchFilter obj)  {
            return act.BrowseGameLiveRecentQueueListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveRecentQueueUuid(string set_type, GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueUuid(set_type, obj);
        }
        
        public virtual bool SetGameLiveRecentQueueUuid(SetType set_type, GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLiveRecentQueueUuid(GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveRecentQueueProfileIdGameId(string set_type, GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueProfileIdGameId(set_type, obj);
        }
        
        public virtual bool SetGameLiveRecentQueueProfileIdGameId(SetType set_type, GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueProfileIdGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLiveRecentQueueProfileIdGameId(GameLiveRecentQueue obj)  {
            return act.SetGameLiveRecentQueueProfileIdGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveRecentQueueUuid(
            string uuid
        )  {            
            return act.DelGameLiveRecentQueueUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveRecentQueueProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameLiveRecentQueueProfileIdGameId(
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
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListUuid(
            string uuid
        )  {
            return act.GetGameLiveRecentQueueListUuid(
            uuid
            );
        }
        
        public virtual GameLiveRecentQueue GetGameLiveRecentQueueUuid(
            string uuid
        )  {
            foreach (GameLiveRecentQueue item in GetGameLiveRecentQueueListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListUuid(
            string uuid
        ) {
            return CachedGetGameLiveRecentQueueListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveRecentQueueListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListGameId(
            string game_id
        )  {
            return act.GetGameLiveRecentQueueListGameId(
            game_id
            );
        }
        
        public virtual GameLiveRecentQueue GetGameLiveRecentQueueGameId(
            string game_id
        )  {
            foreach (GameLiveRecentQueue item in GetGameLiveRecentQueueListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListGameId(
            string game_id
        ) {
            return CachedGetGameLiveRecentQueueListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveRecentQueueListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameLiveRecentQueueListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameLiveRecentQueue GetGameLiveRecentQueueProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameLiveRecentQueue item in GetGameLiveRecentQueueListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameLiveRecentQueueListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameLiveRecentQueue> CachedGetGameLiveRecentQueueListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLiveRecentQueueListProfileIdGameId(
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
        public virtual int CountGameProfileStatisticUuid(
            string uuid
        )  {            
            return act.CountGameProfileStatisticUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticCode(
            string code
        )  {            
            return act.CountGameProfileStatisticCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticGameId(
            string game_id
        )  {            
            return act.CountGameProfileStatisticGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticCodeGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameProfileStatisticCodeGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileStatisticProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileStatisticCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return act.CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProfileStatisticResult BrowseGameProfileStatisticListFilter(SearchFilter obj)  {
            return act.BrowseGameProfileStatisticListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticUuid(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticUuid(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticUuid(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticUuid(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticUuidProfileIdGameIdTimestamp(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticUuidProfileIdGameIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticUuidProfileIdGameIdTimestamp(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticUuidProfileIdGameIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticUuidProfileIdGameIdTimestamp(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticUuidProfileIdGameIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticProfileIdCode(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticProfileIdCode(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticProfileIdCode(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticProfileIdCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticProfileIdCode(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticProfileIdCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticProfileIdCodeTimestamp(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticProfileIdCodeTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticProfileIdCodeTimestamp(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticProfileIdCodeTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticProfileIdCodeTimestamp(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticProfileIdCodeTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticCodeProfileIdGameIdTimestamp(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticCodeProfileIdGameIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticCodeProfileIdGameIdTimestamp(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticCodeProfileIdGameIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticCodeProfileIdGameIdTimestamp(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticCodeProfileIdGameIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticCodeProfileIdGameId(string set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticCodeProfileIdGameId(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticCodeProfileIdGameId(SetType set_type, GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticCodeProfileIdGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticCodeProfileIdGameId(GameProfileStatistic obj)  {
            return act.SetGameProfileStatisticCodeProfileIdGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticUuid(
            string uuid
        )  {            
            return act.DelGameProfileStatisticUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticCodeGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameProfileStatisticCodeGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameProfileStatisticProfileIdGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.DelGameProfileStatisticCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListUuid(
            string uuid
        )  {
            return act.GetGameProfileStatisticListUuid(
            uuid
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticUuid(
            string uuid
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListUuid(
            string uuid
        ) {
            return CachedGetGameProfileStatisticListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListCode(
            string code
        )  {
            return act.GetGameProfileStatisticListCode(
            code
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticCode(
            string code
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListCode(
            string code
        ) {
            return CachedGetGameProfileStatisticListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListGameId(
            string game_id
        )  {
            return act.GetGameProfileStatisticListGameId(
            game_id
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticGameId(
            string game_id
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListGameId(
            string game_id
        ) {
            return CachedGetGameProfileStatisticListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListCodeGameId(
            string code
            , string game_id
        )  {
            return act.GetGameProfileStatisticListCodeGameId(
            code
            , game_id
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticCodeGameId(
            string code
            , string game_id
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListCodeGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListCodeGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameProfileStatisticListCodeGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListCodeGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListCodeGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameProfileStatisticListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileStatisticListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListProfileIdGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileStatisticListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileStatisticListProfileIdGameIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListProfileIdGameIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListProfileIdGameIdTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return act.GetGameProfileStatisticListCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileStatisticListCodeProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListCodeProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileStatisticListCodeProfileIdGameId(
                    code
                    , profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileStatistic GetGameProfileStatisticCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileStatistic item in GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileStatistic> CachedGetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMeta(
        )  {            
            return act.CountGameStatisticMeta(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaUuid(
            string uuid
        )  {            
            return act.CountGameStatisticMetaUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaCode(
            string code
        )  {            
            return act.CountGameStatisticMetaCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaCodeGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameStatisticMetaCodeGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaName(
            string name
        )  {            
            return act.CountGameStatisticMetaName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaGameId(
            string game_id
        )  {            
            return act.CountGameStatisticMetaGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameStatisticMetaResult BrowseGameStatisticMetaListFilter(SearchFilter obj)  {
            return act.BrowseGameStatisticMetaListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticMetaUuid(string set_type, GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaUuid(set_type, obj);
        }
        
        public virtual bool SetGameStatisticMetaUuid(SetType set_type, GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticMetaUuid(GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticMetaCodeGameId(string set_type, GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaCodeGameId(set_type, obj);
        }
        
        public virtual bool SetGameStatisticMetaCodeGameId(SetType set_type, GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaCodeGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameStatisticMetaCodeGameId(GameStatisticMeta obj)  {
            return act.SetGameStatisticMetaCodeGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticMetaUuid(
            string uuid
        )  {            
            return act.DelGameStatisticMetaUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticMetaCodeGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameStatisticMetaCodeGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListUuid(
            string uuid
        )  {
            return act.GetGameStatisticMetaListUuid(
            uuid
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaUuid(
            string uuid
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListUuid(
            string uuid
        ) {
            return CachedGetGameStatisticMetaListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListCode(
            string code
        )  {
            return act.GetGameStatisticMetaListCode(
            code
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaCode(
            string code
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListCode(
            string code
        ) {
            return CachedGetGameStatisticMetaListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListName(
            string name
        )  {
            return act.GetGameStatisticMetaListName(
            name
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaName(
            string name
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListName(
            string name
        ) {
            return CachedGetGameStatisticMetaListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListGameId(
            string game_id
        )  {
            return act.GetGameStatisticMetaListGameId(
            game_id
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaGameId(
            string game_id
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListGameId(
            string game_id
        ) {
            return CachedGetGameStatisticMetaListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListCodeGameId(
            string code
            , string game_id
        )  {
            return act.GetGameStatisticMetaListCodeGameId(
            code
            , game_id
            );
        }
        
        public virtual GameStatisticMeta GetGameStatisticMetaCodeGameId(
            string code
            , string game_id
        )  {
            foreach (GameStatisticMeta item in GetGameStatisticMetaListCodeGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListCodeGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameStatisticMetaListCodeGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameStatisticMeta> CachedGetGameStatisticMetaListCodeGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameStatisticMetaListCodeGameId(
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
        public virtual int CountGameProfileStatisticItemUuid(
            string uuid
        )  {            
            return act.CountGameProfileStatisticItemUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemCode(
            string code
        )  {            
            return act.CountGameProfileStatisticItemCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemGameId(
            string game_id
        )  {            
            return act.CountGameProfileStatisticItemGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemCodeGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameProfileStatisticItemCodeGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileStatisticItemProfileIdGameId(
            profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileStatisticItemCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return act.CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProfileStatisticItemResult BrowseGameProfileStatisticItemListFilter(SearchFilter obj)  {
            return act.BrowseGameProfileStatisticItemListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemUuid(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemUuid(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemUuid(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemUuid(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemProfileIdCode(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemProfileIdCode(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemProfileIdCode(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemProfileIdCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemProfileIdCode(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemProfileIdCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemProfileIdCodeTimestamp(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemProfileIdCodeTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemProfileIdCodeTimestamp(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemProfileIdCodeTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemProfileIdCodeTimestamp(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemProfileIdCodeTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameId(string set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemCodeProfileIdGameId(set_type, obj);
        }
        
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameId(SetType set_type, GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemCodeProfileIdGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameId(GameProfileStatisticItem obj)  {
            return act.SetGameProfileStatisticItemCodeProfileIdGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemUuid(
            string uuid
        )  {            
            return act.DelGameProfileStatisticItemUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemCodeGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameProfileStatisticItemCodeGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return act.DelGameProfileStatisticItemProfileIdGameId(
            profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.DelGameProfileStatisticItemCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListUuid(
            string uuid
        )  {
            return act.GetGameProfileStatisticItemListUuid(
            uuid
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemUuid(
            string uuid
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListUuid(
            string uuid
        ) {
            return CachedGetGameProfileStatisticItemListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<GameProfileStatisticItem> objs;

            string method_name = "CachedGetGameProfileStatisticItemListUuid";

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
                objs = GetGameProfileStatisticItemListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListCode(
            string code
        )  {
            return act.GetGameProfileStatisticItemListCode(
            code
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemCode(
            string code
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListCode(
            string code
        ) {
            return CachedGetGameProfileStatisticItemListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<GameProfileStatisticItem> objs;

            string method_name = "CachedGetGameProfileStatisticItemListCode";

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
                objs = GetGameProfileStatisticItemListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListGameId(
            string game_id
        )  {
            return act.GetGameProfileStatisticItemListGameId(
            game_id
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemGameId(
            string game_id
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListGameId(
            string game_id
        ) {
            return CachedGetGameProfileStatisticItemListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
            List<GameProfileStatisticItem> objs;

            string method_name = "CachedGetGameProfileStatisticItemListGameId";

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
                objs = GetGameProfileStatisticItemListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListCodeGameId(
            string code
            , string game_id
        )  {
            return act.GetGameProfileStatisticItemListCodeGameId(
            code
            , game_id
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemCodeGameId(
            string code
            , string game_id
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListCodeGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListCodeGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameProfileStatisticItemListCodeGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListCodeGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
            List<GameProfileStatisticItem> objs;

            string method_name = "CachedGetGameProfileStatisticItemListCodeGameId";

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
                objs = GetGameProfileStatisticItemListCodeGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameProfileStatisticItemListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileStatisticItemListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
            List<GameProfileStatisticItem> objs;

            string method_name = "CachedGetGameProfileStatisticItemListProfileIdGameId";

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
                objs = GetGameProfileStatisticItemListProfileIdGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileStatisticItemListProfileIdGameIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListProfileIdGameIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            List<GameProfileStatisticItem> objs;

            string method_name = "CachedGetGameProfileStatisticItemListProfileIdGameIdTimestamp";

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
                objs = GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return act.GetGameProfileStatisticItemListCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileStatisticItemListCodeProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListCodeProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
        ) {
            List<GameProfileStatisticItem> objs;

            string method_name = "CachedGetGameProfileStatisticItemListCodeProfileIdGameId";

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
                objs = GetGameProfileStatisticItemListCodeProfileIdGameId(
                    code
                    , profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileStatisticItem GetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileStatisticItem item in GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileStatisticItem> CachedGetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            List<GameProfileStatisticItem> objs;

            string method_name = "CachedGetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp";

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
                objs = GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
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
        public virtual int CountGameKeyMetaUuid(
            string uuid
        )  {            
            return act.CountGameKeyMetaUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaCode(
            string code
        )  {            
            return act.CountGameKeyMetaCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaCodeGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameKeyMetaCodeGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaName(
            string name
        )  {            
            return act.CountGameKeyMetaName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaKey(
            string key
        )  {            
            return act.CountGameKeyMetaKey(
            key
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaGameId(
            string game_id
        )  {            
            return act.CountGameKeyMetaGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaKeyGameId(
            string key
            , string game_id
        )  {            
            return act.CountGameKeyMetaKeyGameId(
            key
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameKeyMetaResult BrowseGameKeyMetaListFilter(SearchFilter obj)  {
            return act.BrowseGameKeyMetaListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaUuid(string set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaUuid(set_type, obj);
        }
        
        public virtual bool SetGameKeyMetaUuid(SetType set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameKeyMetaUuid(GameKeyMeta obj)  {
            return act.SetGameKeyMetaUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaCodeGameId(string set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaCodeGameId(set_type, obj);
        }
        
        public virtual bool SetGameKeyMetaCodeGameId(SetType set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaCodeGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameKeyMetaCodeGameId(GameKeyMeta obj)  {
            return act.SetGameKeyMetaCodeGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaKeyGameId(string set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaKeyGameId(set_type, obj);
        }
        
        public virtual bool SetGameKeyMetaKeyGameId(SetType set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaKeyGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameKeyMetaKeyGameId(GameKeyMeta obj)  {
            return act.SetGameKeyMetaKeyGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaKeyGameIdLevel(string set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaKeyGameIdLevel(set_type, obj);
        }
        
        public virtual bool SetGameKeyMetaKeyGameIdLevel(SetType set_type, GameKeyMeta obj)  {
            return act.SetGameKeyMetaKeyGameIdLevel(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameKeyMetaKeyGameIdLevel(GameKeyMeta obj)  {
            return act.SetGameKeyMetaKeyGameIdLevel(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameKeyMetaUuid(
            string uuid
        )  {            
            return act.DelGameKeyMetaUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameKeyMetaCodeGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameKeyMetaCodeGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameKeyMetaKeyGameId(
            string key
            , string game_id
        )  {            
            return act.DelGameKeyMetaKeyGameId(
            key
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListUuid(
            string uuid
        )  {
            return act.GetGameKeyMetaListUuid(
            uuid
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaUuid(
            string uuid
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListUuid(
            string uuid
        ) {
            return CachedGetGameKeyMetaListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListCode(
            string code
        )  {
            return act.GetGameKeyMetaListCode(
            code
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaCode(
            string code
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListCode(
            string code
        ) {
            return CachedGetGameKeyMetaListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListCodeGameId(
            string code
            , string game_id
        )  {
            return act.GetGameKeyMetaListCodeGameId(
            code
            , game_id
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaCodeGameId(
            string code
            , string game_id
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListCodeGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListCodeGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameKeyMetaListCodeGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListCodeGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListCodeGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListName(
            string name
        )  {
            return act.GetGameKeyMetaListName(
            name
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaName(
            string name
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListName(
            string name
        ) {
            return CachedGetGameKeyMetaListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListKey(
            string key
        )  {
            return act.GetGameKeyMetaListKey(
            key
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaKey(
            string key
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListKey(
            key
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListKey(
            string key
        ) {
            return CachedGetGameKeyMetaListKey(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListKey(
            bool overrideCache
            , int cacheHours
            , string key
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListKey(
                    key
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListGameId(
            string game_id
        )  {
            return act.GetGameKeyMetaListGameId(
            game_id
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaGameId(
            string game_id
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListGameId(
            string game_id
        ) {
            return CachedGetGameKeyMetaListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListKeyGameId(
            string key
            , string game_id
        )  {
            return act.GetGameKeyMetaListKeyGameId(
            key
            , game_id
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaKeyGameId(
            string key
            , string game_id
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListKeyGameId(
            key
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListKeyGameId(
            string key
            , string game_id
        ) {
            return CachedGetGameKeyMetaListKeyGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , key
                    , game_id
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListKeyGameId(
            bool overrideCache
            , int cacheHours
            , string key
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListKeyGameId(
                    key
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameKeyMeta> GetGameKeyMetaListCodeLevel(
            string code
            , string level
        )  {
            return act.GetGameKeyMetaListCodeLevel(
            code
            , level
            );
        }
        
        public virtual GameKeyMeta GetGameKeyMetaCodeLevel(
            string code
            , string level
        )  {
            foreach (GameKeyMeta item in GetGameKeyMetaListCodeLevel(
            code
            , level
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListCodeLevel(
            string code
            , string level
        ) {
            return CachedGetGameKeyMetaListCodeLevel(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , level
                );
        }
        
        public virtual List<GameKeyMeta> CachedGetGameKeyMetaListCodeLevel(
            bool overrideCache
            , int cacheHours
            , string code
            , string level
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameKeyMetaListCodeLevel(
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
        public virtual int CountGameLevelUuid(
            string uuid
        )  {            
            return act.CountGameLevelUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelCode(
            string code
        )  {            
            return act.CountGameLevelCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelCodeGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameLevelCodeGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelName(
            string name
        )  {            
            return act.CountGameLevelName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelGameId(
            string game_id
        )  {            
            return act.CountGameLevelGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameLevelResult BrowseGameLevelListFilter(SearchFilter obj)  {
            return act.BrowseGameLevelListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLevelUuid(string set_type, GameLevel obj)  {
            return act.SetGameLevelUuid(set_type, obj);
        }
        
        public virtual bool SetGameLevelUuid(SetType set_type, GameLevel obj)  {
            return act.SetGameLevelUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLevelUuid(GameLevel obj)  {
            return act.SetGameLevelUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLevelCodeGameId(string set_type, GameLevel obj)  {
            return act.SetGameLevelCodeGameId(set_type, obj);
        }
        
        public virtual bool SetGameLevelCodeGameId(SetType set_type, GameLevel obj)  {
            return act.SetGameLevelCodeGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameLevelCodeGameId(GameLevel obj)  {
            return act.SetGameLevelCodeGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLevelUuid(
            string uuid
        )  {            
            return act.DelGameLevelUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLevelCodeGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameLevelCodeGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListUuid(
            string uuid
        )  {
            return act.GetGameLevelListUuid(
            uuid
            );
        }
        
        public virtual GameLevel GetGameLevelUuid(
            string uuid
        )  {
            foreach (GameLevel item in GetGameLevelListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListUuid(
            string uuid
        ) {
            return CachedGetGameLevelListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListCode(
            string code
        )  {
            return act.GetGameLevelListCode(
            code
            );
        }
        
        public virtual GameLevel GetGameLevelCode(
            string code
        )  {
            foreach (GameLevel item in GetGameLevelListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListCode(
            string code
        ) {
            return CachedGetGameLevelListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListCodeGameId(
            string code
            , string game_id
        )  {
            return act.GetGameLevelListCodeGameId(
            code
            , game_id
            );
        }
        
        public virtual GameLevel GetGameLevelCodeGameId(
            string code
            , string game_id
        )  {
            foreach (GameLevel item in GetGameLevelListCodeGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListCodeGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameLevelListCodeGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListCodeGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListCodeGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListName(
            string name
        )  {
            return act.GetGameLevelListName(
            name
            );
        }
        
        public virtual GameLevel GetGameLevelName(
            string name
        )  {
            foreach (GameLevel item in GetGameLevelListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListName(
            string name
        ) {
            return CachedGetGameLevelListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameLevel> GetGameLevelListGameId(
            string game_id
        )  {
            return act.GetGameLevelListGameId(
            game_id
            );
        }
        
        public virtual GameLevel GetGameLevelGameId(
            string game_id
        )  {
            foreach (GameLevel item in GetGameLevelListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListGameId(
            string game_id
        ) {
            return CachedGetGameLevelListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameLevel> CachedGetGameLevelListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameLevelListGameId(
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
        public virtual int CountGameProfileAchievementUuid(
            string uuid
        )  {            
            return act.CountGameProfileAchievementUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementProfileIdCode(
            string profile_id
            , string code
        )  {            
            return act.CountGameProfileAchievementProfileIdCode(
            profile_id
            , code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementUsername(
            string username
        )  {            
            return act.CountGameProfileAchievementUsername(
            username
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return act.CountGameProfileAchievementCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return act.CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameProfileAchievementResult BrowseGameProfileAchievementListFilter(SearchFilter obj)  {
            return act.BrowseGameProfileAchievementListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementUuid(string set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementUuid(set_type, obj);
        }
        
        public virtual bool SetGameProfileAchievementUuid(SetType set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileAchievementUuid(GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementUuidCode(string set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementUuidCode(set_type, obj);
        }
        
        public virtual bool SetGameProfileAchievementUuidCode(SetType set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementUuidCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileAchievementUuidCode(GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementUuidCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementProfileIdCode(string set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementProfileIdCode(set_type, obj);
        }
        
        public virtual bool SetGameProfileAchievementProfileIdCode(SetType set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementProfileIdCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileAchievementProfileIdCode(GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementProfileIdCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementCodeProfileIdGameId(string set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementCodeProfileIdGameId(set_type, obj);
        }
        
        public virtual bool SetGameProfileAchievementCodeProfileIdGameId(SetType set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementCodeProfileIdGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileAchievementCodeProfileIdGameId(GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementCodeProfileIdGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementCodeProfileIdGameIdTimestamp(string set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementCodeProfileIdGameIdTimestamp(set_type, obj);
        }
        
        public virtual bool SetGameProfileAchievementCodeProfileIdGameIdTimestamp(SetType set_type, GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementCodeProfileIdGameIdTimestamp(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameProfileAchievementCodeProfileIdGameIdTimestamp(GameProfileAchievement obj)  {
            return act.SetGameProfileAchievementCodeProfileIdGameIdTimestamp(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementUuid(
            string uuid
        )  {            
            return act.DelGameProfileAchievementUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementProfileIdCode(
            string profile_id
            , string code
        )  {            
            return act.DelGameProfileAchievementProfileIdCode(
            profile_id
            , code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementUuidCode(
            string uuid
            , string code
        )  {            
            return act.DelGameProfileAchievementUuidCode(
            uuid
            , code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListUuid(
            string uuid
        )  {
            return act.GetGameProfileAchievementListUuid(
            uuid
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementUuid(
            string uuid
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListUuid(
            string uuid
        ) {
            return CachedGetGameProfileAchievementListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListProfileIdCode(
            string profile_id
            , string code
        )  {
            return act.GetGameProfileAchievementListProfileIdCode(
            profile_id
            , code
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementProfileIdCode(
            string profile_id
            , string code
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListProfileIdCode(
            profile_id
            , code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListProfileIdCode(
            string profile_id
            , string code
        ) {
            return CachedGetGameProfileAchievementListProfileIdCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , code
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListProfileIdCode(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListProfileIdCode(
                    profile_id
                    , code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListUsername(
            string username
        )  {
            return act.GetGameProfileAchievementListUsername(
            username
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementUsername(
            string username
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListUsername(
            username
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListUsername(
            string username
        ) {
            return CachedGetGameProfileAchievementListUsername(
                    false
                    , CACHE_DEFAULT_HOURS
                    , username
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListUsername(
            bool overrideCache
            , int cacheHours
            , string username
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListUsername(
                    username
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListCode(
            string code
        )  {
            return act.GetGameProfileAchievementListCode(
            code
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementCode(
            string code
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListCode(
            string code
        ) {
            return CachedGetGameProfileAchievementListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListGameId(
            string game_id
        )  {
            return act.GetGameProfileAchievementListGameId(
            game_id
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementGameId(
            string game_id
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListGameId(
            string game_id
        ) {
            return CachedGetGameProfileAchievementListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListCodeGameId(
            string code
            , string game_id
        )  {
            return act.GetGameProfileAchievementListCodeGameId(
            code
            , game_id
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementCodeGameId(
            string code
            , string game_id
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListCodeGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListCodeGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameProfileAchievementListCodeGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListCodeGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListCodeGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return act.GetGameProfileAchievementListProfileIdGameId(
            profile_id
            , game_id
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListProfileIdGameId(
            profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListProfileIdGameId(
            string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileAchievementListProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListProfileIdGameId(
                    profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileAchievementListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileAchievementListProfileIdGameIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListProfileIdGameIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListProfileIdGameIdTimestamp(
                    profile_id
                    , game_id
                    , timestamp
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return act.GetGameProfileAchievementListCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListCodeProfileIdGameId(
            code
            , profile_id
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        ) {
            return CachedGetGameProfileAchievementListCodeProfileIdGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListCodeProfileIdGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameProfileAchievementListCodeProfileIdGameId(
                    code
                    , profile_id
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            return act.GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            );
        }
        
        public virtual GameProfileAchievement GetGameProfileAchievementCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            foreach (GameProfileAchievement item in GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
            return CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , profile_id
                    , game_id
                    , timestamp
                );
        }
        
        public virtual List<GameProfileAchievement> CachedGetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
            bool overrideCache
            , int cacheHours
            , string code
            , string profile_id
            , string game_id
            , float timestamp
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
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
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMeta(
        )  {            
            return act.CountGameAchievementMeta(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaUuid(
            string uuid
        )  {            
            return act.CountGameAchievementMetaUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaCode(
            string code
        )  {            
            return act.CountGameAchievementMetaCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaCodeGameId(
            string code
            , string game_id
        )  {            
            return act.CountGameAchievementMetaCodeGameId(
            code
            , game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaName(
            string name
        )  {            
            return act.CountGameAchievementMetaName(
            name
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaGameId(
            string game_id
        )  {            
            return act.CountGameAchievementMetaGameId(
            game_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual GameAchievementMetaResult BrowseGameAchievementMetaListFilter(SearchFilter obj)  {
            return act.BrowseGameAchievementMetaListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementMetaUuid(string set_type, GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaUuid(set_type, obj);
        }
        
        public virtual bool SetGameAchievementMetaUuid(SetType set_type, GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAchievementMetaUuid(GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementMetaCodeGameId(string set_type, GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaCodeGameId(set_type, obj);
        }
        
        public virtual bool SetGameAchievementMetaCodeGameId(SetType set_type, GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaCodeGameId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetGameAchievementMetaCodeGameId(GameAchievementMeta obj)  {
            return act.SetGameAchievementMetaCodeGameId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementMetaUuid(
            string uuid
        )  {            
            return act.DelGameAchievementMetaUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementMetaCodeGameId(
            string code
            , string game_id
        )  {            
            return act.DelGameAchievementMetaCodeGameId(
            code
            , game_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListUuid(
            string uuid
        )  {
            return act.GetGameAchievementMetaListUuid(
            uuid
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaUuid(
            string uuid
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListUuid(
            string uuid
        ) {
            return CachedGetGameAchievementMetaListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListCode(
            string code
        )  {
            return act.GetGameAchievementMetaListCode(
            code
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaCode(
            string code
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListCode(
            string code
        ) {
            return CachedGetGameAchievementMetaListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListCodeGameId(
            string code
            , string game_id
        )  {
            return act.GetGameAchievementMetaListCodeGameId(
            code
            , game_id
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaCodeGameId(
            string code
            , string game_id
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListCodeGameId(
            code
            , game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListCodeGameId(
            string code
            , string game_id
        ) {
            return CachedGetGameAchievementMetaListCodeGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , game_id
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListCodeGameId(
            bool overrideCache
            , int cacheHours
            , string code
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListCodeGameId(
                    code
                    , game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListName(
            string name
        )  {
            return act.GetGameAchievementMetaListName(
            name
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaName(
            string name
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListName(
            name
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListName(
            string name
        ) {
            return CachedGetGameAchievementMetaListName(
                    false
                    , CACHE_DEFAULT_HOURS
                    , name
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListName(
            bool overrideCache
            , int cacheHours
            , string name
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListName(
                    name
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListGameId(
            string game_id
        )  {
            return act.GetGameAchievementMetaListGameId(
            game_id
            );
        }
        
        public virtual GameAchievementMeta GetGameAchievementMetaGameId(
            string game_id
        )  {
            foreach (GameAchievementMeta item in GetGameAchievementMetaListGameId(
            game_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListGameId(
            string game_id
        ) {
            return CachedGetGameAchievementMetaListGameId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , game_id
                );
        }
        
        public virtual List<GameAchievementMeta> CachedGetGameAchievementMetaListGameId(
            bool overrideCache
            , int cacheHours
            , string game_id
        ) {
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

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetGameAchievementMetaListGameId(
                    game_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
    }
}






