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

using profile;
using profile.ent;

namespace profile {

    public class BaseProfileAPI {
        BaseProfileACT act = new BaseProfileACT();
        
        public int CACHE_DEFAULT_HOURS = 12;
        
        public string DEFAULT_SET_TYPE = "full";
        
        public BaseProfileAPI(){
        
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
        public virtual int CountProfile(
        )  {            
            return act.CountProfile(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileByUuid(
            string uuid
        )  {            
            return act.CountProfileByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileByUsernameByHash(
            string username
            , string hash
        )  {            
            return act.CountProfileByUsernameByHash(
            username
            , hash
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileByUsername(
            string username
        )  {            
            return act.CountProfileByUsername(
            username
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileResult BrowseProfileListByFilter(SearchFilter obj)  {
            return act.BrowseProfileListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileByUuid(string set_type, Profile obj)  {
            return act.SetProfileByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileByUuid(SetType set_type, Profile obj)  {
            return act.SetProfileByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileByUuid(Profile obj)  {
            return act.SetProfileByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileByUsername(string set_type, Profile obj)  {
            return act.SetProfileByUsername(set_type, obj);
        }
        
        public virtual bool SetProfileByUsername(SetType set_type, Profile obj)  {
            return act.SetProfileByUsername(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileByUsername(Profile obj)  {
            return act.SetProfileByUsername(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileByUuid(
            string uuid
        )  {            
            return act.DelProfileByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileByUsername(
            string username
        )  {            
            return act.DelProfileByUsername(
            username
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Profile> GetProfileListByUuid(
            string uuid
        )  {
            return act.GetProfileListByUuid(
            uuid
            );
        }
        
        public virtual Profile GetProfileByUuid(
            string uuid
        )  {
            foreach (Profile item in GetProfileListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Profile> CachedGetProfileListByUuid(
            string uuid
        ) {
            return CachedGetProfileListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Profile> CachedGetProfileListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<Profile> objs;

            string method_name = "CachedGetProfileListByUuid";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("uuid".ToLower());
            sb.Append("_");
            sb.Append(uuid);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Profile>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Profile> GetProfileListByUsernameByHash(
            string username
            , string hash
        )  {
            return act.GetProfileListByUsernameByHash(
            username
            , hash
            );
        }
        
        public virtual Profile GetProfileByUsernameByHash(
            string username
            , string hash
        )  {
            foreach (Profile item in GetProfileListByUsernameByHash(
            username
            , hash
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Profile> CachedGetProfileListByUsernameByHash(
            string username
            , string hash
        ) {
            return CachedGetProfileListByUsernameByHash(
                    false
                    , CACHE_DEFAULT_HOURS
                    , username
                    , hash
                );
        }
        
        public virtual List<Profile> CachedGetProfileListByUsernameByHash(
            bool overrideCache
            , int cacheHours
            , string username
            , string hash
        ) {
            List<Profile> objs;

            string method_name = "CachedGetProfileListByUsernameByHash";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("username".ToLower());
            sb.Append("_");
            sb.Append(username);
            sb.Append("_");
            sb.Append("hash".ToLower());
            sb.Append("_");
            sb.Append(hash);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Profile>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileListByUsernameByHash(
                    username
                    , hash
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Profile> GetProfileListByUsername(
            string username
        )  {
            return act.GetProfileListByUsername(
            username
            );
        }
        
        public virtual Profile GetProfileByUsername(
            string username
        )  {
            foreach (Profile item in GetProfileListByUsername(
            username
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Profile> CachedGetProfileListByUsername(
            string username
        ) {
            return CachedGetProfileListByUsername(
                    false
                    , CACHE_DEFAULT_HOURS
                    , username
                );
        }
        
        public virtual List<Profile> CachedGetProfileListByUsername(
            bool overrideCache
            , int cacheHours
            , string username
        ) {
            List<Profile> objs;

            string method_name = "CachedGetProfileListByUsername";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("username".ToLower());
            sb.Append("_");
            sb.Append(username);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Profile>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileListByUsername(
                    username
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileType(
        )  {            
            return act.CountProfileType(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileTypeByUuid(
            string uuid
        )  {            
            return act.CountProfileTypeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileTypeByTypeId(
            string type_id
        )  {            
            return act.CountProfileTypeByTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileTypeResult BrowseProfileTypeListByFilter(SearchFilter obj)  {
            return act.BrowseProfileTypeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileTypeByUuid(string set_type, ProfileType obj)  {
            return act.SetProfileTypeByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileTypeByUuid(SetType set_type, ProfileType obj)  {
            return act.SetProfileTypeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileTypeByUuid(ProfileType obj)  {
            return act.SetProfileTypeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileTypeByUuid(
            string uuid
        )  {            
            return act.DelProfileTypeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileType> GetProfileTypeListByUuid(
            string uuid
        )  {
            return act.GetProfileTypeListByUuid(
            uuid
            );
        }
        
        public virtual ProfileType GetProfileTypeByUuid(
            string uuid
        )  {
            foreach (ProfileType item in GetProfileTypeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListByUuid(
            string uuid
        ) {
            return CachedGetProfileTypeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<ProfileType> objs;

            string method_name = "CachedGetProfileTypeListByUuid";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("uuid".ToLower());
            sb.Append("_");
            sb.Append(uuid);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileType>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileTypeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileType> GetProfileTypeListByCode(
            string code
        )  {
            return act.GetProfileTypeListByCode(
            code
            );
        }
        
        public virtual ProfileType GetProfileTypeByCode(
            string code
        )  {
            foreach (ProfileType item in GetProfileTypeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListByCode(
            string code
        ) {
            return CachedGetProfileTypeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<ProfileType> objs;

            string method_name = "CachedGetProfileTypeListByCode";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("code".ToLower());
            sb.Append("_");
            sb.Append(code);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileType>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileTypeListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileType> GetProfileTypeListByTypeId(
            string type_id
        )  {
            return act.GetProfileTypeListByTypeId(
            type_id
            );
        }
        
        public virtual ProfileType GetProfileTypeByTypeId(
            string type_id
        )  {
            foreach (ProfileType item in GetProfileTypeListByTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListByTypeId(
            string type_id
        ) {
            return CachedGetProfileTypeListByTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListByTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
            List<ProfileType> objs;

            string method_name = "CachedGetProfileTypeListByTypeId";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("type_id".ToLower());
            sb.Append("_");
            sb.Append(type_id);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileType>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileTypeListByTypeId(
                    type_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttribute(
        )  {            
            return act.CountProfileAttribute(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeByUuid(
            string uuid
        )  {            
            return act.CountProfileAttributeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeByCode(
            string code
        )  {            
            return act.CountProfileAttributeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeByType(
            int type
        )  {            
            return act.CountProfileAttributeByType(
            type
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeByGroup(
            int group
        )  {            
            return act.CountProfileAttributeByGroup(
            group
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeByCodeByType(
            string code
            , int type
        )  {            
            return act.CountProfileAttributeByCodeByType(
            code
            , type
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileAttributeResult BrowseProfileAttributeListByFilter(SearchFilter obj)  {
            return act.BrowseProfileAttributeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeByUuid(string set_type, ProfileAttribute obj)  {
            return act.SetProfileAttributeByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeByUuid(SetType set_type, ProfileAttribute obj)  {
            return act.SetProfileAttributeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeByUuid(ProfileAttribute obj)  {
            return act.SetProfileAttributeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeByCode(string set_type, ProfileAttribute obj)  {
            return act.SetProfileAttributeByCode(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeByCode(SetType set_type, ProfileAttribute obj)  {
            return act.SetProfileAttributeByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeByCode(ProfileAttribute obj)  {
            return act.SetProfileAttributeByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeByUuid(
            string uuid
        )  {            
            return act.DelProfileAttributeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeByCode(
            string code
        )  {            
            return act.DelProfileAttributeByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttribute> GetProfileAttributeListByUuid(
            string uuid
        )  {
            return act.GetProfileAttributeListByUuid(
            uuid
            );
        }
        
        public virtual ProfileAttribute GetProfileAttributeByUuid(
            string uuid
        )  {
            foreach (ProfileAttribute item in GetProfileAttributeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListByUuid(
            string uuid
        ) {
            return CachedGetProfileAttributeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<ProfileAttribute> objs;

            string method_name = "CachedGetProfileAttributeListByUuid";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("uuid".ToLower());
            sb.Append("_");
            sb.Append(uuid);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttribute> GetProfileAttributeListByCode(
            string code
        )  {
            return act.GetProfileAttributeListByCode(
            code
            );
        }
        
        public virtual ProfileAttribute GetProfileAttributeByCode(
            string code
        )  {
            foreach (ProfileAttribute item in GetProfileAttributeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListByCode(
            string code
        ) {
            return CachedGetProfileAttributeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<ProfileAttribute> objs;

            string method_name = "CachedGetProfileAttributeListByCode";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("code".ToLower());
            sb.Append("_");
            sb.Append(code);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttribute> GetProfileAttributeListByType(
            int type
        )  {
            return act.GetProfileAttributeListByType(
            type
            );
        }
        
        public virtual ProfileAttribute GetProfileAttributeByType(
            int type
        )  {
            foreach (ProfileAttribute item in GetProfileAttributeListByType(
            type
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListByType(
            int type
        ) {
            return CachedGetProfileAttributeListByType(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type
                );
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListByType(
            bool overrideCache
            , int cacheHours
            , int type
        ) {
            List<ProfileAttribute> objs;

            string method_name = "CachedGetProfileAttributeListByType";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("type".ToLower());
            sb.Append("_");
            sb.Append(type);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeListByType(
                    type
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttribute> GetProfileAttributeListByGroup(
            int group
        )  {
            return act.GetProfileAttributeListByGroup(
            group
            );
        }
        
        public virtual ProfileAttribute GetProfileAttributeByGroup(
            int group
        )  {
            foreach (ProfileAttribute item in GetProfileAttributeListByGroup(
            group
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListByGroup(
            int group
        ) {
            return CachedGetProfileAttributeListByGroup(
                    false
                    , CACHE_DEFAULT_HOURS
                    , group
                );
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListByGroup(
            bool overrideCache
            , int cacheHours
            , int group
        ) {
            List<ProfileAttribute> objs;

            string method_name = "CachedGetProfileAttributeListByGroup";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("group".ToLower());
            sb.Append("_");
            sb.Append(group);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeListByGroup(
                    group
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttribute> GetProfileAttributeListByCodeByType(
            string code
            , int type
        )  {
            return act.GetProfileAttributeListByCodeByType(
            code
            , type
            );
        }
        
        public virtual ProfileAttribute GetProfileAttributeByCodeByType(
            string code
            , int type
        )  {
            foreach (ProfileAttribute item in GetProfileAttributeListByCodeByType(
            code
            , type
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListByCodeByType(
            string code
            , int type
        ) {
            return CachedGetProfileAttributeListByCodeByType(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , type
                );
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListByCodeByType(
            bool overrideCache
            , int cacheHours
            , string code
            , int type
        ) {
            List<ProfileAttribute> objs;

            string method_name = "CachedGetProfileAttributeListByCodeByType";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("code".ToLower());
            sb.Append("_");
            sb.Append(code);
            sb.Append("_");
            sb.Append("type".ToLower());
            sb.Append("_");
            sb.Append(type);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttribute>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeListByCodeByType(
                    code
                    , type
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeText(
        )  {            
            return act.CountProfileAttributeText(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeTextByUuid(
            string uuid
        )  {            
            return act.CountProfileAttributeTextByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeTextByProfileId(
            string profile_id
        )  {            
            return act.CountProfileAttributeTextByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeTextByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return act.CountProfileAttributeTextByProfileIdByAttributeId(
            profile_id
            , attribute_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileAttributeTextResult BrowseProfileAttributeTextListByFilter(SearchFilter obj)  {
            return act.BrowseProfileAttributeTextListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeTextByUuid(string set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeTextByUuid(SetType set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeTextByUuid(ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeTextByProfileId(string set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextByProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeTextByProfileId(SetType set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeTextByProfileId(ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeTextByProfileIdByAttributeId(string set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextByProfileIdByAttributeId(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeTextByProfileIdByAttributeId(SetType set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextByProfileIdByAttributeId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeTextByProfileIdByAttributeId(ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextByProfileIdByAttributeId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeTextByUuid(
            string uuid
        )  {            
            return act.DelProfileAttributeTextByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeTextByProfileId(
            string profile_id
        )  {            
            return act.DelProfileAttributeTextByProfileId(
            profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeTextByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return act.DelProfileAttributeTextByProfileIdByAttributeId(
            profile_id
            , attribute_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListByUuid(
            string uuid
        )  {
            return act.GetProfileAttributeTextListByUuid(
            uuid
            );
        }
        
        public virtual ProfileAttributeText GetProfileAttributeTextByUuid(
            string uuid
        )  {
            foreach (ProfileAttributeText item in GetProfileAttributeTextListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListByUuid(
            string uuid
        ) {
            return CachedGetProfileAttributeTextListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<ProfileAttributeText> objs;

            string method_name = "CachedGetProfileAttributeTextListByUuid";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("uuid".ToLower());
            sb.Append("_");
            sb.Append(uuid);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttributeText>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeTextListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListByProfileId(
            string profile_id
        )  {
            return act.GetProfileAttributeTextListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileAttributeText GetProfileAttributeTextByProfileId(
            string profile_id
        )  {
            foreach (ProfileAttributeText item in GetProfileAttributeTextListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileAttributeTextListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
            List<ProfileAttributeText> objs;

            string method_name = "CachedGetProfileAttributeTextListByProfileId";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("profile_id".ToLower());
            sb.Append("_");
            sb.Append(profile_id);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttributeText>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeTextListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            return act.GetProfileAttributeTextListByProfileIdByAttributeId(
            profile_id
            , attribute_id
            );
        }
        
        public virtual ProfileAttributeText GetProfileAttributeTextByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            foreach (ProfileAttributeText item in GetProfileAttributeTextListByProfileIdByAttributeId(
            profile_id
            , attribute_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        ) {
            return CachedGetProfileAttributeTextListByProfileIdByAttributeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , attribute_id
                );
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListByProfileIdByAttributeId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string attribute_id
        ) {
            List<ProfileAttributeText> objs;

            string method_name = "CachedGetProfileAttributeTextListByProfileIdByAttributeId";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("profile_id".ToLower());
            sb.Append("_");
            sb.Append(profile_id);
            sb.Append("_");
            sb.Append("attribute_id".ToLower());
            sb.Append("_");
            sb.Append(attribute_id);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttributeText>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeTextListByProfileIdByAttributeId(
                    profile_id
                    , attribute_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeData(
        )  {            
            return act.CountProfileAttributeData(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeDataByUuid(
            string uuid
        )  {            
            return act.CountProfileAttributeDataByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeDataByProfileId(
            string profile_id
        )  {            
            return act.CountProfileAttributeDataByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeDataByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return act.CountProfileAttributeDataByProfileIdByAttributeId(
            profile_id
            , attribute_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileAttributeDataResult BrowseProfileAttributeDataListByFilter(SearchFilter obj)  {
            return act.BrowseProfileAttributeDataListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeDataByUuid(string set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeDataByUuid(SetType set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeDataByUuid(ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeDataByProfileId(string set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataByProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeDataByProfileId(SetType set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataByProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeDataByProfileId(ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataByProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeDataByProfileIdByAttributeId(string set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataByProfileIdByAttributeId(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeDataByProfileIdByAttributeId(SetType set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataByProfileIdByAttributeId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeDataByProfileIdByAttributeId(ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataByProfileIdByAttributeId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeDataByUuid(
            string uuid
        )  {            
            return act.DelProfileAttributeDataByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeDataByProfileId(
            string profile_id
        )  {            
            return act.DelProfileAttributeDataByProfileId(
            profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeDataByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return act.DelProfileAttributeDataByProfileIdByAttributeId(
            profile_id
            , attribute_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListByUuid(
            string uuid
        )  {
            return act.GetProfileAttributeDataListByUuid(
            uuid
            );
        }
        
        public virtual ProfileAttributeData GetProfileAttributeDataByUuid(
            string uuid
        )  {
            foreach (ProfileAttributeData item in GetProfileAttributeDataListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListByUuid(
            string uuid
        ) {
            return CachedGetProfileAttributeDataListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<ProfileAttributeData> objs;

            string method_name = "CachedGetProfileAttributeDataListByUuid";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("uuid".ToLower());
            sb.Append("_");
            sb.Append(uuid);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttributeData>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeDataListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListByProfileId(
            string profile_id
        )  {
            return act.GetProfileAttributeDataListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileAttributeData GetProfileAttributeDataByProfileId(
            string profile_id
        )  {
            foreach (ProfileAttributeData item in GetProfileAttributeDataListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileAttributeDataListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
            List<ProfileAttributeData> objs;

            string method_name = "CachedGetProfileAttributeDataListByProfileId";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("profile_id".ToLower());
            sb.Append("_");
            sb.Append(profile_id);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttributeData>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeDataListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            return act.GetProfileAttributeDataListByProfileIdByAttributeId(
            profile_id
            , attribute_id
            );
        }
        
        public virtual ProfileAttributeData GetProfileAttributeDataByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            foreach (ProfileAttributeData item in GetProfileAttributeDataListByProfileIdByAttributeId(
            profile_id
            , attribute_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        ) {
            return CachedGetProfileAttributeDataListByProfileIdByAttributeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , attribute_id
                );
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListByProfileIdByAttributeId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string attribute_id
        ) {
            List<ProfileAttributeData> objs;

            string method_name = "CachedGetProfileAttributeDataListByProfileIdByAttributeId";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("profile_id".ToLower());
            sb.Append("_");
            sb.Append(profile_id);
            sb.Append("_");
            sb.Append("attribute_id".ToLower());
            sb.Append("_");
            sb.Append(attribute_id);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileAttributeData>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileAttributeDataListByProfileIdByAttributeId(
                    profile_id
                    , attribute_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDevice(
        )  {            
            return act.CountProfileDevice(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByUuid(
            string uuid
        )  {            
            return act.CountProfileDeviceByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByProfileIdByDeviceId(
            string profile_id
            , string device_id
        )  {            
            return act.CountProfileDeviceByProfileIdByDeviceId(
            profile_id
            , device_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByProfileIdByToken(
            string profile_id
            , string token
        )  {            
            return act.CountProfileDeviceByProfileIdByToken(
            profile_id
            , token
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByProfileId(
            string profile_id
        )  {            
            return act.CountProfileDeviceByProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByDeviceId(
            string device_id
        )  {            
            return act.CountProfileDeviceByDeviceId(
            device_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByToken(
            string token
        )  {            
            return act.CountProfileDeviceByToken(
            token
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileDeviceResult BrowseProfileDeviceListByFilter(SearchFilter obj)  {
            return act.BrowseProfileDeviceListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileDeviceByUuid(string set_type, ProfileDevice obj)  {
            return act.SetProfileDeviceByUuid(set_type, obj);
        }
        
        public virtual bool SetProfileDeviceByUuid(SetType set_type, ProfileDevice obj)  {
            return act.SetProfileDeviceByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileDeviceByUuid(ProfileDevice obj)  {
            return act.SetProfileDeviceByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceByUuid(
            string uuid
        )  {            
            return act.DelProfileDeviceByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceByProfileIdByDeviceId(
            string profile_id
            , string device_id
        )  {            
            return act.DelProfileDeviceByProfileIdByDeviceId(
            profile_id
            , device_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceByProfileIdByToken(
            string profile_id
            , string token
        )  {            
            return act.DelProfileDeviceByProfileIdByToken(
            profile_id
            , token
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceByToken(
            string token
        )  {            
            return act.DelProfileDeviceByToken(
            token
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListByUuid(
            string uuid
        )  {
            return act.GetProfileDeviceListByUuid(
            uuid
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceByUuid(
            string uuid
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByUuid(
            string uuid
        ) {
            return CachedGetProfileDeviceListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListByUuid";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("uuid".ToLower());
            sb.Append("_");
            sb.Append(uuid);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileDeviceListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListByProfileIdByDeviceId(
            string profile_id
            , string device_id
        )  {
            return act.GetProfileDeviceListByProfileIdByDeviceId(
            profile_id
            , device_id
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceByProfileIdByDeviceId(
            string profile_id
            , string device_id
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListByProfileIdByDeviceId(
            profile_id
            , device_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByProfileIdByDeviceId(
            string profile_id
            , string device_id
        ) {
            return CachedGetProfileDeviceListByProfileIdByDeviceId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , device_id
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByProfileIdByDeviceId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string device_id
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListByProfileIdByDeviceId";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("profile_id".ToLower());
            sb.Append("_");
            sb.Append(profile_id);
            sb.Append("_");
            sb.Append("device_id".ToLower());
            sb.Append("_");
            sb.Append(device_id);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileDeviceListByProfileIdByDeviceId(
                    profile_id
                    , device_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListByProfileIdByToken(
            string profile_id
            , string token
        )  {
            return act.GetProfileDeviceListByProfileIdByToken(
            profile_id
            , token
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceByProfileIdByToken(
            string profile_id
            , string token
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListByProfileIdByToken(
            profile_id
            , token
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByProfileIdByToken(
            string profile_id
            , string token
        ) {
            return CachedGetProfileDeviceListByProfileIdByToken(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , token
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByProfileIdByToken(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string token
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListByProfileIdByToken";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("profile_id".ToLower());
            sb.Append("_");
            sb.Append(profile_id);
            sb.Append("_");
            sb.Append("token".ToLower());
            sb.Append("_");
            sb.Append(token);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileDeviceListByProfileIdByToken(
                    profile_id
                    , token
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListByProfileId(
            string profile_id
        )  {
            return act.GetProfileDeviceListByProfileId(
            profile_id
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceByProfileId(
            string profile_id
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListByProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByProfileId(
            string profile_id
        ) {
            return CachedGetProfileDeviceListByProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListByProfileId";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("profile_id".ToLower());
            sb.Append("_");
            sb.Append(profile_id);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileDeviceListByProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListByDeviceId(
            string device_id
        )  {
            return act.GetProfileDeviceListByDeviceId(
            device_id
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceByDeviceId(
            string device_id
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListByDeviceId(
            device_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByDeviceId(
            string device_id
        ) {
            return CachedGetProfileDeviceListByDeviceId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , device_id
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByDeviceId(
            bool overrideCache
            , int cacheHours
            , string device_id
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListByDeviceId";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("device_id".ToLower());
            sb.Append("_");
            sb.Append(device_id);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileDeviceListByDeviceId(
                    device_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListByToken(
            string token
        )  {
            return act.GetProfileDeviceListByToken(
            token
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceByToken(
            string token
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListByToken(
            token
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByToken(
            string token
        ) {
            return CachedGetProfileDeviceListByToken(
                    false
                    , CACHE_DEFAULT_HOURS
                    , token
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListByToken(
            bool overrideCache
            , int cacheHours
            , string token
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListByToken";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("token".ToLower());
            sb.Append("_");
            sb.Append(token);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<ProfileDevice>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetProfileDeviceListByToken(
                    token
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountCountry(
        )  {            
            return act.CountCountry(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCountryByUuid(
            string uuid
        )  {            
            return act.CountCountryByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCountryByCode(
            string code
        )  {            
            return act.CountCountryByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual CountryResult BrowseCountryListByFilter(SearchFilter obj)  {
            return act.BrowseCountryListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCountryByUuid(string set_type, Country obj)  {
            return act.SetCountryByUuid(set_type, obj);
        }
        
        public virtual bool SetCountryByUuid(SetType set_type, Country obj)  {
            return act.SetCountryByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetCountryByUuid(Country obj)  {
            return act.SetCountryByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCountryByCode(string set_type, Country obj)  {
            return act.SetCountryByCode(set_type, obj);
        }
        
        public virtual bool SetCountryByCode(SetType set_type, Country obj)  {
            return act.SetCountryByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetCountryByCode(Country obj)  {
            return act.SetCountryByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelCountryByUuid(
            string uuid
        )  {            
            return act.DelCountryByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelCountryByCode(
            string code
        )  {            
            return act.DelCountryByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Country> GetCountryList(
        )  {
            return act.GetCountryList(
            );
        }
        
        public virtual Country GetCountry(
        )  {
            foreach (Country item in GetCountryList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Country> CachedGetCountryList(
        ) {
            return CachedGetCountryList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<Country> CachedGetCountryList(
            bool overrideCache
            , int cacheHours
        ) {
            List<Country> objs;

            string method_name = "CachedGetCountryList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Country>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetCountryList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Country> GetCountryListByUuid(
            string uuid
        )  {
            return act.GetCountryListByUuid(
            uuid
            );
        }
        
        public virtual Country GetCountryByUuid(
            string uuid
        )  {
            foreach (Country item in GetCountryListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Country> CachedGetCountryListByUuid(
            string uuid
        ) {
            return CachedGetCountryListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Country> CachedGetCountryListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<Country> objs;

            string method_name = "CachedGetCountryListByUuid";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("uuid".ToLower());
            sb.Append("_");
            sb.Append(uuid);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Country>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetCountryListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Country> GetCountryListByCode(
            string code
        )  {
            return act.GetCountryListByCode(
            code
            );
        }
        
        public virtual Country GetCountryByCode(
            string code
        )  {
            foreach (Country item in GetCountryListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Country> CachedGetCountryListByCode(
            string code
        ) {
            return CachedGetCountryListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Country> CachedGetCountryListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<Country> objs;

            string method_name = "CachedGetCountryListByCode";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("code".ToLower());
            sb.Append("_");
            sb.Append(code);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<Country>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetCountryListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountState(
        )  {            
            return act.CountState(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountStateByUuid(
            string uuid
        )  {            
            return act.CountStateByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountStateByCode(
            string code
        )  {            
            return act.CountStateByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual StateResult BrowseStateListByFilter(SearchFilter obj)  {
            return act.BrowseStateListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetStateByUuid(string set_type, State obj)  {
            return act.SetStateByUuid(set_type, obj);
        }
        
        public virtual bool SetStateByUuid(SetType set_type, State obj)  {
            return act.SetStateByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetStateByUuid(State obj)  {
            return act.SetStateByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetStateByCode(string set_type, State obj)  {
            return act.SetStateByCode(set_type, obj);
        }
        
        public virtual bool SetStateByCode(SetType set_type, State obj)  {
            return act.SetStateByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetStateByCode(State obj)  {
            return act.SetStateByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelStateByUuid(
            string uuid
        )  {            
            return act.DelStateByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelStateByCode(
            string code
        )  {            
            return act.DelStateByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<State> GetStateList(
        )  {
            return act.GetStateList(
            );
        }
        
        public virtual State GetState(
        )  {
            foreach (State item in GetStateList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<State> CachedGetStateList(
        ) {
            return CachedGetStateList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<State> CachedGetStateList(
            bool overrideCache
            , int cacheHours
        ) {
            List<State> objs;

            string method_name = "CachedGetStateList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<State>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetStateList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<State> GetStateListByUuid(
            string uuid
        )  {
            return act.GetStateListByUuid(
            uuid
            );
        }
        
        public virtual State GetStateByUuid(
            string uuid
        )  {
            foreach (State item in GetStateListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<State> CachedGetStateListByUuid(
            string uuid
        ) {
            return CachedGetStateListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<State> CachedGetStateListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<State> objs;

            string method_name = "CachedGetStateListByUuid";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("uuid".ToLower());
            sb.Append("_");
            sb.Append(uuid);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<State>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetStateListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<State> GetStateListByCode(
            string code
        )  {
            return act.GetStateListByCode(
            code
            );
        }
        
        public virtual State GetStateByCode(
            string code
        )  {
            foreach (State item in GetStateListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<State> CachedGetStateListByCode(
            string code
        ) {
            return CachedGetStateListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<State> CachedGetStateListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<State> objs;

            string method_name = "CachedGetStateListByCode";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("code".ToLower());
            sb.Append("_");
            sb.Append(code);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<State>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetStateListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountCity(
        )  {            
            return act.CountCity(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCityByUuid(
            string uuid
        )  {            
            return act.CountCityByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCityByCode(
            string code
        )  {            
            return act.CountCityByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual CityResult BrowseCityListByFilter(SearchFilter obj)  {
            return act.BrowseCityListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCityByUuid(string set_type, City obj)  {
            return act.SetCityByUuid(set_type, obj);
        }
        
        public virtual bool SetCityByUuid(SetType set_type, City obj)  {
            return act.SetCityByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetCityByUuid(City obj)  {
            return act.SetCityByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCityByCode(string set_type, City obj)  {
            return act.SetCityByCode(set_type, obj);
        }
        
        public virtual bool SetCityByCode(SetType set_type, City obj)  {
            return act.SetCityByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetCityByCode(City obj)  {
            return act.SetCityByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelCityByUuid(
            string uuid
        )  {            
            return act.DelCityByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelCityByCode(
            string code
        )  {            
            return act.DelCityByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<City> GetCityList(
        )  {
            return act.GetCityList(
            );
        }
        
        public virtual City GetCity(
        )  {
            foreach (City item in GetCityList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<City> CachedGetCityList(
        ) {
            return CachedGetCityList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<City> CachedGetCityList(
            bool overrideCache
            , int cacheHours
        ) {
            List<City> objs;

            string method_name = "CachedGetCityList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<City>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetCityList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<City> GetCityListByUuid(
            string uuid
        )  {
            return act.GetCityListByUuid(
            uuid
            );
        }
        
        public virtual City GetCityByUuid(
            string uuid
        )  {
            foreach (City item in GetCityListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<City> CachedGetCityListByUuid(
            string uuid
        ) {
            return CachedGetCityListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<City> CachedGetCityListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<City> objs;

            string method_name = "CachedGetCityListByUuid";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("uuid".ToLower());
            sb.Append("_");
            sb.Append(uuid);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<City>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetCityListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<City> GetCityListByCode(
            string code
        )  {
            return act.GetCityListByCode(
            code
            );
        }
        
        public virtual City GetCityByCode(
            string code
        )  {
            foreach (City item in GetCityListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<City> CachedGetCityListByCode(
            string code
        ) {
            return CachedGetCityListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<City> CachedGetCityListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<City> objs;

            string method_name = "CachedGetCityListByCode";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("code".ToLower());
            sb.Append("_");
            sb.Append(code);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<City>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetCityListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual int CountPostalCode(
        )  {            
            return act.CountPostalCode(
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPostalCodeByUuid(
            string uuid
        )  {            
            return act.CountPostalCodeByUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPostalCodeByCode(
            string code
        )  {            
            return act.CountPostalCodeByCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual PostalCodeResult BrowsePostalCodeListByFilter(SearchFilter obj)  {
            return act.BrowsePostalCodeListByFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPostalCodeByUuid(string set_type, PostalCode obj)  {
            return act.SetPostalCodeByUuid(set_type, obj);
        }
        
        public virtual bool SetPostalCodeByUuid(SetType set_type, PostalCode obj)  {
            return act.SetPostalCodeByUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPostalCodeByUuid(PostalCode obj)  {
            return act.SetPostalCodeByUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPostalCodeByCode(string set_type, PostalCode obj)  {
            return act.SetPostalCodeByCode(set_type, obj);
        }
        
        public virtual bool SetPostalCodeByCode(SetType set_type, PostalCode obj)  {
            return act.SetPostalCodeByCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPostalCodeByCode(PostalCode obj)  {
            return act.SetPostalCodeByCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelPostalCodeByUuid(
            string uuid
        )  {            
            return act.DelPostalCodeByUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPostalCodeByCode(
            string code
        )  {            
            return act.DelPostalCodeByCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<PostalCode> GetPostalCodeList(
        )  {
            return act.GetPostalCodeList(
            );
        }
        
        public virtual PostalCode GetPostalCode(
        )  {
            foreach (PostalCode item in GetPostalCodeList(
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<PostalCode> CachedGetPostalCodeList(
        ) {
            return CachedGetPostalCodeList(
                    false
                    , CACHE_DEFAULT_HOURS
                );
        }
        
        public virtual List<PostalCode> CachedGetPostalCodeList(
            bool overrideCache
            , int cacheHours
        ) {
            List<PostalCode> objs;

            string method_name = "CachedGetPostalCodeList";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<PostalCode>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPostalCodeList(
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<PostalCode> GetPostalCodeListByUuid(
            string uuid
        )  {
            return act.GetPostalCodeListByUuid(
            uuid
            );
        }
        
        public virtual PostalCode GetPostalCodeByUuid(
            string uuid
        )  {
            foreach (PostalCode item in GetPostalCodeListByUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<PostalCode> CachedGetPostalCodeListByUuid(
            string uuid
        ) {
            return CachedGetPostalCodeListByUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<PostalCode> CachedGetPostalCodeListByUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<PostalCode> objs;

            string method_name = "CachedGetPostalCodeListByUuid";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("uuid".ToLower());
            sb.Append("_");
            sb.Append(uuid);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<PostalCode>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPostalCodeListByUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<PostalCode> GetPostalCodeListByCode(
            string code
        )  {
            return act.GetPostalCodeListByCode(
            code
            );
        }
        
        public virtual PostalCode GetPostalCodeByCode(
            string code
        )  {
            foreach (PostalCode item in GetPostalCodeListByCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<PostalCode> CachedGetPostalCodeListByCode(
            string code
        ) {
            return CachedGetPostalCodeListByCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<PostalCode> CachedGetPostalCodeListByCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<PostalCode> objs;

            string method_name = "CachedGetPostalCodeListByCode";

            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(method_name);
            sb.Append("_");
            sb.Append("code".ToLower());
            sb.Append("_");
            sb.Append(code);

            string cache_key = sb.ToString();

            objs = CacheUtil.Get<List<PostalCode>>(cache_key);

            if (objs == null || overrideCache) // if object not cached, get and cache
            {
                objs = GetPostalCodeListByCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
    }
}






