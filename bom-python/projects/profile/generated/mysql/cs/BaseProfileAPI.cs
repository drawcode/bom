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
        public virtual int CountProfileUuid(
            string uuid
        )  {            
            return act.CountProfileUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileUsernameHash(
            string username
            , string hash
        )  {            
            return act.CountProfileUsernameHash(
            username
            , hash
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileUsername(
            string username
        )  {            
            return act.CountProfileUsername(
            username
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileResult BrowseProfileListFilter(SearchFilter obj)  {
            return act.BrowseProfileListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileUuid(string set_type, Profile obj)  {
            return act.SetProfileUuid(set_type, obj);
        }
        
        public virtual bool SetProfileUuid(SetType set_type, Profile obj)  {
            return act.SetProfileUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileUuid(Profile obj)  {
            return act.SetProfileUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileUsername(string set_type, Profile obj)  {
            return act.SetProfileUsername(set_type, obj);
        }
        
        public virtual bool SetProfileUsername(SetType set_type, Profile obj)  {
            return act.SetProfileUsername(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileUsername(Profile obj)  {
            return act.SetProfileUsername(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileUuid(
            string uuid
        )  {            
            return act.DelProfileUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileUsername(
            string username
        )  {            
            return act.DelProfileUsername(
            username
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<Profile> GetProfileListUuid(
            string uuid
        )  {
            return act.GetProfileListUuid(
            uuid
            );
        }
        
        public virtual Profile GetProfileUuid(
            string uuid
        )  {
            foreach (Profile item in GetProfileListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Profile> CachedGetProfileListUuid(
            string uuid
        ) {
            return CachedGetProfileListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Profile> CachedGetProfileListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<Profile> objs;

            string method_name = "CachedGetProfileListUuid";

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
                objs = GetProfileListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Profile> GetProfileListUsernameHash(
            string username
            , string hash
        )  {
            return act.GetProfileListUsernameHash(
            username
            , hash
            );
        }
        
        public virtual Profile GetProfileUsernameHash(
            string username
            , string hash
        )  {
            foreach (Profile item in GetProfileListUsernameHash(
            username
            , hash
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Profile> CachedGetProfileListUsernameHash(
            string username
            , string hash
        ) {
            return CachedGetProfileListUsernameHash(
                    false
                    , CACHE_DEFAULT_HOURS
                    , username
                    , hash
                );
        }
        
        public virtual List<Profile> CachedGetProfileListUsernameHash(
            bool overrideCache
            , int cacheHours
            , string username
            , string hash
        ) {
            List<Profile> objs;

            string method_name = "CachedGetProfileListUsernameHash";

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
                objs = GetProfileListUsernameHash(
                    username
                    , hash
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Profile> GetProfileListUsername(
            string username
        )  {
            return act.GetProfileListUsername(
            username
            );
        }
        
        public virtual Profile GetProfileUsername(
            string username
        )  {
            foreach (Profile item in GetProfileListUsername(
            username
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Profile> CachedGetProfileListUsername(
            string username
        ) {
            return CachedGetProfileListUsername(
                    false
                    , CACHE_DEFAULT_HOURS
                    , username
                );
        }
        
        public virtual List<Profile> CachedGetProfileListUsername(
            bool overrideCache
            , int cacheHours
            , string username
        ) {
            List<Profile> objs;

            string method_name = "CachedGetProfileListUsername";

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
                objs = GetProfileListUsername(
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
        public virtual int CountProfileTypeUuid(
            string uuid
        )  {            
            return act.CountProfileTypeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileTypeTypeId(
            string type_id
        )  {            
            return act.CountProfileTypeTypeId(
            type_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileTypeResult BrowseProfileTypeListFilter(SearchFilter obj)  {
            return act.BrowseProfileTypeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileTypeUuid(string set_type, ProfileType obj)  {
            return act.SetProfileTypeUuid(set_type, obj);
        }
        
        public virtual bool SetProfileTypeUuid(SetType set_type, ProfileType obj)  {
            return act.SetProfileTypeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileTypeUuid(ProfileType obj)  {
            return act.SetProfileTypeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileTypeUuid(
            string uuid
        )  {            
            return act.DelProfileTypeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileType> GetProfileTypeListUuid(
            string uuid
        )  {
            return act.GetProfileTypeListUuid(
            uuid
            );
        }
        
        public virtual ProfileType GetProfileTypeUuid(
            string uuid
        )  {
            foreach (ProfileType item in GetProfileTypeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListUuid(
            string uuid
        ) {
            return CachedGetProfileTypeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<ProfileType> objs;

            string method_name = "CachedGetProfileTypeListUuid";

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
                objs = GetProfileTypeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileType> GetProfileTypeListCode(
            string code
        )  {
            return act.GetProfileTypeListCode(
            code
            );
        }
        
        public virtual ProfileType GetProfileTypeCode(
            string code
        )  {
            foreach (ProfileType item in GetProfileTypeListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListCode(
            string code
        ) {
            return CachedGetProfileTypeListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<ProfileType> objs;

            string method_name = "CachedGetProfileTypeListCode";

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
                objs = GetProfileTypeListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileType> GetProfileTypeListTypeId(
            string type_id
        )  {
            return act.GetProfileTypeListTypeId(
            type_id
            );
        }
        
        public virtual ProfileType GetProfileTypeTypeId(
            string type_id
        )  {
            foreach (ProfileType item in GetProfileTypeListTypeId(
            type_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListTypeId(
            string type_id
        ) {
            return CachedGetProfileTypeListTypeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type_id
                );
        }
        
        public virtual List<ProfileType> CachedGetProfileTypeListTypeId(
            bool overrideCache
            , int cacheHours
            , string type_id
        ) {
            List<ProfileType> objs;

            string method_name = "CachedGetProfileTypeListTypeId";

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
                objs = GetProfileTypeListTypeId(
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
        public virtual int CountProfileAttributeUuid(
            string uuid
        )  {            
            return act.CountProfileAttributeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeCode(
            string code
        )  {            
            return act.CountProfileAttributeCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeType(
            int type
        )  {            
            return act.CountProfileAttributeType(
            type
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeGroup(
            int group
        )  {            
            return act.CountProfileAttributeGroup(
            group
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeCodeType(
            string code
            , int type
        )  {            
            return act.CountProfileAttributeCodeType(
            code
            , type
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileAttributeResult BrowseProfileAttributeListFilter(SearchFilter obj)  {
            return act.BrowseProfileAttributeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeUuid(string set_type, ProfileAttribute obj)  {
            return act.SetProfileAttributeUuid(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeUuid(SetType set_type, ProfileAttribute obj)  {
            return act.SetProfileAttributeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeUuid(ProfileAttribute obj)  {
            return act.SetProfileAttributeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeCode(string set_type, ProfileAttribute obj)  {
            return act.SetProfileAttributeCode(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeCode(SetType set_type, ProfileAttribute obj)  {
            return act.SetProfileAttributeCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeCode(ProfileAttribute obj)  {
            return act.SetProfileAttributeCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeUuid(
            string uuid
        )  {            
            return act.DelProfileAttributeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeCode(
            string code
        )  {            
            return act.DelProfileAttributeCode(
            code
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttribute> GetProfileAttributeListUuid(
            string uuid
        )  {
            return act.GetProfileAttributeListUuid(
            uuid
            );
        }
        
        public virtual ProfileAttribute GetProfileAttributeUuid(
            string uuid
        )  {
            foreach (ProfileAttribute item in GetProfileAttributeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListUuid(
            string uuid
        ) {
            return CachedGetProfileAttributeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<ProfileAttribute> objs;

            string method_name = "CachedGetProfileAttributeListUuid";

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
                objs = GetProfileAttributeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttribute> GetProfileAttributeListCode(
            string code
        )  {
            return act.GetProfileAttributeListCode(
            code
            );
        }
        
        public virtual ProfileAttribute GetProfileAttributeCode(
            string code
        )  {
            foreach (ProfileAttribute item in GetProfileAttributeListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListCode(
            string code
        ) {
            return CachedGetProfileAttributeListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<ProfileAttribute> objs;

            string method_name = "CachedGetProfileAttributeListCode";

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
                objs = GetProfileAttributeListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttribute> GetProfileAttributeListType(
            int type
        )  {
            return act.GetProfileAttributeListType(
            type
            );
        }
        
        public virtual ProfileAttribute GetProfileAttributeType(
            int type
        )  {
            foreach (ProfileAttribute item in GetProfileAttributeListType(
            type
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListType(
            int type
        ) {
            return CachedGetProfileAttributeListType(
                    false
                    , CACHE_DEFAULT_HOURS
                    , type
                );
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListType(
            bool overrideCache
            , int cacheHours
            , int type
        ) {
            List<ProfileAttribute> objs;

            string method_name = "CachedGetProfileAttributeListType";

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
                objs = GetProfileAttributeListType(
                    type
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttribute> GetProfileAttributeListGroup(
            int group
        )  {
            return act.GetProfileAttributeListGroup(
            group
            );
        }
        
        public virtual ProfileAttribute GetProfileAttributeGroup(
            int group
        )  {
            foreach (ProfileAttribute item in GetProfileAttributeListGroup(
            group
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListGroup(
            int group
        ) {
            return CachedGetProfileAttributeListGroup(
                    false
                    , CACHE_DEFAULT_HOURS
                    , group
                );
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListGroup(
            bool overrideCache
            , int cacheHours
            , int group
        ) {
            List<ProfileAttribute> objs;

            string method_name = "CachedGetProfileAttributeListGroup";

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
                objs = GetProfileAttributeListGroup(
                    group
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttribute> GetProfileAttributeListCodeType(
            string code
            , int type
        )  {
            return act.GetProfileAttributeListCodeType(
            code
            , type
            );
        }
        
        public virtual ProfileAttribute GetProfileAttributeCodeType(
            string code
            , int type
        )  {
            foreach (ProfileAttribute item in GetProfileAttributeListCodeType(
            code
            , type
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListCodeType(
            string code
            , int type
        ) {
            return CachedGetProfileAttributeListCodeType(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                    , type
                );
        }
        
        public virtual List<ProfileAttribute> CachedGetProfileAttributeListCodeType(
            bool overrideCache
            , int cacheHours
            , string code
            , int type
        ) {
            List<ProfileAttribute> objs;

            string method_name = "CachedGetProfileAttributeListCodeType";

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
                objs = GetProfileAttributeListCodeType(
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
        public virtual int CountProfileAttributeTextUuid(
            string uuid
        )  {            
            return act.CountProfileAttributeTextUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeTextProfileId(
            string profile_id
        )  {            
            return act.CountProfileAttributeTextProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeTextProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return act.CountProfileAttributeTextProfileIdAttributeId(
            profile_id
            , attribute_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileAttributeTextResult BrowseProfileAttributeTextListFilter(SearchFilter obj)  {
            return act.BrowseProfileAttributeTextListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeTextUuid(string set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextUuid(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeTextUuid(SetType set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeTextUuid(ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeTextProfileId(string set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeTextProfileId(SetType set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeTextProfileId(ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeTextProfileIdAttributeId(string set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextProfileIdAttributeId(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeTextProfileIdAttributeId(SetType set_type, ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextProfileIdAttributeId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeTextProfileIdAttributeId(ProfileAttributeText obj)  {
            return act.SetProfileAttributeTextProfileIdAttributeId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeTextUuid(
            string uuid
        )  {            
            return act.DelProfileAttributeTextUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeTextProfileId(
            string profile_id
        )  {            
            return act.DelProfileAttributeTextProfileId(
            profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeTextProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return act.DelProfileAttributeTextProfileIdAttributeId(
            profile_id
            , attribute_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListUuid(
            string uuid
        )  {
            return act.GetProfileAttributeTextListUuid(
            uuid
            );
        }
        
        public virtual ProfileAttributeText GetProfileAttributeTextUuid(
            string uuid
        )  {
            foreach (ProfileAttributeText item in GetProfileAttributeTextListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListUuid(
            string uuid
        ) {
            return CachedGetProfileAttributeTextListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<ProfileAttributeText> objs;

            string method_name = "CachedGetProfileAttributeTextListUuid";

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
                objs = GetProfileAttributeTextListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListProfileId(
            string profile_id
        )  {
            return act.GetProfileAttributeTextListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileAttributeText GetProfileAttributeTextProfileId(
            string profile_id
        )  {
            foreach (ProfileAttributeText item in GetProfileAttributeTextListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListProfileId(
            string profile_id
        ) {
            return CachedGetProfileAttributeTextListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
            List<ProfileAttributeText> objs;

            string method_name = "CachedGetProfileAttributeTextListProfileId";

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
                objs = GetProfileAttributeTextListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {
            return act.GetProfileAttributeTextListProfileIdAttributeId(
            profile_id
            , attribute_id
            );
        }
        
        public virtual ProfileAttributeText GetProfileAttributeTextProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {
            foreach (ProfileAttributeText item in GetProfileAttributeTextListProfileIdAttributeId(
            profile_id
            , attribute_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListProfileIdAttributeId(
            string profile_id
            , string attribute_id
        ) {
            return CachedGetProfileAttributeTextListProfileIdAttributeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , attribute_id
                );
        }
        
        public virtual List<ProfileAttributeText> CachedGetProfileAttributeTextListProfileIdAttributeId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string attribute_id
        ) {
            List<ProfileAttributeText> objs;

            string method_name = "CachedGetProfileAttributeTextListProfileIdAttributeId";

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
                objs = GetProfileAttributeTextListProfileIdAttributeId(
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
        public virtual int CountProfileAttributeDataUuid(
            string uuid
        )  {            
            return act.CountProfileAttributeDataUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeDataProfileId(
            string profile_id
        )  {            
            return act.CountProfileAttributeDataProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeDataProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return act.CountProfileAttributeDataProfileIdAttributeId(
            profile_id
            , attribute_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileAttributeDataResult BrowseProfileAttributeDataListFilter(SearchFilter obj)  {
            return act.BrowseProfileAttributeDataListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeDataUuid(string set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataUuid(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeDataUuid(SetType set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeDataUuid(ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeDataProfileId(string set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataProfileId(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeDataProfileId(SetType set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataProfileId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeDataProfileId(ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataProfileId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeDataProfileIdAttributeId(string set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataProfileIdAttributeId(set_type, obj);
        }
        
        public virtual bool SetProfileAttributeDataProfileIdAttributeId(SetType set_type, ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataProfileIdAttributeId(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileAttributeDataProfileIdAttributeId(ProfileAttributeData obj)  {
            return act.SetProfileAttributeDataProfileIdAttributeId(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeDataUuid(
            string uuid
        )  {            
            return act.DelProfileAttributeDataUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeDataProfileId(
            string profile_id
        )  {            
            return act.DelProfileAttributeDataProfileId(
            profile_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeDataProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return act.DelProfileAttributeDataProfileIdAttributeId(
            profile_id
            , attribute_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListUuid(
            string uuid
        )  {
            return act.GetProfileAttributeDataListUuid(
            uuid
            );
        }
        
        public virtual ProfileAttributeData GetProfileAttributeDataUuid(
            string uuid
        )  {
            foreach (ProfileAttributeData item in GetProfileAttributeDataListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListUuid(
            string uuid
        ) {
            return CachedGetProfileAttributeDataListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<ProfileAttributeData> objs;

            string method_name = "CachedGetProfileAttributeDataListUuid";

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
                objs = GetProfileAttributeDataListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListProfileId(
            string profile_id
        )  {
            return act.GetProfileAttributeDataListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileAttributeData GetProfileAttributeDataProfileId(
            string profile_id
        )  {
            foreach (ProfileAttributeData item in GetProfileAttributeDataListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListProfileId(
            string profile_id
        ) {
            return CachedGetProfileAttributeDataListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
            List<ProfileAttributeData> objs;

            string method_name = "CachedGetProfileAttributeDataListProfileId";

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
                objs = GetProfileAttributeDataListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {
            return act.GetProfileAttributeDataListProfileIdAttributeId(
            profile_id
            , attribute_id
            );
        }
        
        public virtual ProfileAttributeData GetProfileAttributeDataProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {
            foreach (ProfileAttributeData item in GetProfileAttributeDataListProfileIdAttributeId(
            profile_id
            , attribute_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListProfileIdAttributeId(
            string profile_id
            , string attribute_id
        ) {
            return CachedGetProfileAttributeDataListProfileIdAttributeId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , attribute_id
                );
        }
        
        public virtual List<ProfileAttributeData> CachedGetProfileAttributeDataListProfileIdAttributeId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string attribute_id
        ) {
            List<ProfileAttributeData> objs;

            string method_name = "CachedGetProfileAttributeDataListProfileIdAttributeId";

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
                objs = GetProfileAttributeDataListProfileIdAttributeId(
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
        public virtual int CountProfileDeviceUuid(
            string uuid
        )  {            
            return act.CountProfileDeviceUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceProfileIdDeviceId(
            string profile_id
            , string device_id
        )  {            
            return act.CountProfileDeviceProfileIdDeviceId(
            profile_id
            , device_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceProfileIdToken(
            string profile_id
            , string token
        )  {            
            return act.CountProfileDeviceProfileIdToken(
            profile_id
            , token
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceProfileId(
            string profile_id
        )  {            
            return act.CountProfileDeviceProfileId(
            profile_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceDeviceId(
            string device_id
        )  {            
            return act.CountProfileDeviceDeviceId(
            device_id
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceToken(
            string token
        )  {            
            return act.CountProfileDeviceToken(
            token
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual ProfileDeviceResult BrowseProfileDeviceListFilter(SearchFilter obj)  {
            return act.BrowseProfileDeviceListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileDeviceUuid(string set_type, ProfileDevice obj)  {
            return act.SetProfileDeviceUuid(set_type, obj);
        }
        
        public virtual bool SetProfileDeviceUuid(SetType set_type, ProfileDevice obj)  {
            return act.SetProfileDeviceUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetProfileDeviceUuid(ProfileDevice obj)  {
            return act.SetProfileDeviceUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceUuid(
            string uuid
        )  {            
            return act.DelProfileDeviceUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceProfileIdDeviceId(
            string profile_id
            , string device_id
        )  {            
            return act.DelProfileDeviceProfileIdDeviceId(
            profile_id
            , device_id
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceProfileIdToken(
            string profile_id
            , string token
        )  {            
            return act.DelProfileDeviceProfileIdToken(
            profile_id
            , token
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceToken(
            string token
        )  {            
            return act.DelProfileDeviceToken(
            token
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListUuid(
            string uuid
        )  {
            return act.GetProfileDeviceListUuid(
            uuid
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceUuid(
            string uuid
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListUuid(
            string uuid
        ) {
            return CachedGetProfileDeviceListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListUuid";

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
                objs = GetProfileDeviceListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListProfileIdDeviceId(
            string profile_id
            , string device_id
        )  {
            return act.GetProfileDeviceListProfileIdDeviceId(
            profile_id
            , device_id
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceProfileIdDeviceId(
            string profile_id
            , string device_id
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListProfileIdDeviceId(
            profile_id
            , device_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListProfileIdDeviceId(
            string profile_id
            , string device_id
        ) {
            return CachedGetProfileDeviceListProfileIdDeviceId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , device_id
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListProfileIdDeviceId(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string device_id
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListProfileIdDeviceId";

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
                objs = GetProfileDeviceListProfileIdDeviceId(
                    profile_id
                    , device_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListProfileIdToken(
            string profile_id
            , string token
        )  {
            return act.GetProfileDeviceListProfileIdToken(
            profile_id
            , token
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceProfileIdToken(
            string profile_id
            , string token
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListProfileIdToken(
            profile_id
            , token
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListProfileIdToken(
            string profile_id
            , string token
        ) {
            return CachedGetProfileDeviceListProfileIdToken(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                    , token
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListProfileIdToken(
            bool overrideCache
            , int cacheHours
            , string profile_id
            , string token
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListProfileIdToken";

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
                objs = GetProfileDeviceListProfileIdToken(
                    profile_id
                    , token
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListProfileId(
            string profile_id
        )  {
            return act.GetProfileDeviceListProfileId(
            profile_id
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceProfileId(
            string profile_id
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListProfileId(
            profile_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListProfileId(
            string profile_id
        ) {
            return CachedGetProfileDeviceListProfileId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , profile_id
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListProfileId(
            bool overrideCache
            , int cacheHours
            , string profile_id
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListProfileId";

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
                objs = GetProfileDeviceListProfileId(
                    profile_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListDeviceId(
            string device_id
        )  {
            return act.GetProfileDeviceListDeviceId(
            device_id
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceDeviceId(
            string device_id
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListDeviceId(
            device_id
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListDeviceId(
            string device_id
        ) {
            return CachedGetProfileDeviceListDeviceId(
                    false
                    , CACHE_DEFAULT_HOURS
                    , device_id
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListDeviceId(
            bool overrideCache
            , int cacheHours
            , string device_id
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListDeviceId";

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
                objs = GetProfileDeviceListDeviceId(
                    device_id
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<ProfileDevice> GetProfileDeviceListToken(
            string token
        )  {
            return act.GetProfileDeviceListToken(
            token
            );
        }
        
        public virtual ProfileDevice GetProfileDeviceToken(
            string token
        )  {
            foreach (ProfileDevice item in GetProfileDeviceListToken(
            token
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListToken(
            string token
        ) {
            return CachedGetProfileDeviceListToken(
                    false
                    , CACHE_DEFAULT_HOURS
                    , token
                );
        }
        
        public virtual List<ProfileDevice> CachedGetProfileDeviceListToken(
            bool overrideCache
            , int cacheHours
            , string token
        ) {
            List<ProfileDevice> objs;

            string method_name = "CachedGetProfileDeviceListToken";

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
                objs = GetProfileDeviceListToken(
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
        public virtual int CountCountryUuid(
            string uuid
        )  {            
            return act.CountCountryUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCountryCode(
            string code
        )  {            
            return act.CountCountryCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual CountryResult BrowseCountryListFilter(SearchFilter obj)  {
            return act.BrowseCountryListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCountryUuid(string set_type, Country obj)  {
            return act.SetCountryUuid(set_type, obj);
        }
        
        public virtual bool SetCountryUuid(SetType set_type, Country obj)  {
            return act.SetCountryUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetCountryUuid(Country obj)  {
            return act.SetCountryUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCountryCode(string set_type, Country obj)  {
            return act.SetCountryCode(set_type, obj);
        }
        
        public virtual bool SetCountryCode(SetType set_type, Country obj)  {
            return act.SetCountryCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetCountryCode(Country obj)  {
            return act.SetCountryCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelCountryUuid(
            string uuid
        )  {            
            return act.DelCountryUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelCountryCode(
            string code
        )  {            
            return act.DelCountryCode(
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
        public virtual List<Country> GetCountryListUuid(
            string uuid
        )  {
            return act.GetCountryListUuid(
            uuid
            );
        }
        
        public virtual Country GetCountryUuid(
            string uuid
        )  {
            foreach (Country item in GetCountryListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Country> CachedGetCountryListUuid(
            string uuid
        ) {
            return CachedGetCountryListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<Country> CachedGetCountryListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<Country> objs;

            string method_name = "CachedGetCountryListUuid";

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
                objs = GetCountryListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<Country> GetCountryListCode(
            string code
        )  {
            return act.GetCountryListCode(
            code
            );
        }
        
        public virtual Country GetCountryCode(
            string code
        )  {
            foreach (Country item in GetCountryListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<Country> CachedGetCountryListCode(
            string code
        ) {
            return CachedGetCountryListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<Country> CachedGetCountryListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<Country> objs;

            string method_name = "CachedGetCountryListCode";

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
                objs = GetCountryListCode(
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
        public virtual int CountStateUuid(
            string uuid
        )  {            
            return act.CountStateUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountStateCode(
            string code
        )  {            
            return act.CountStateCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual StateResult BrowseStateListFilter(SearchFilter obj)  {
            return act.BrowseStateListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetStateUuid(string set_type, State obj)  {
            return act.SetStateUuid(set_type, obj);
        }
        
        public virtual bool SetStateUuid(SetType set_type, State obj)  {
            return act.SetStateUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetStateUuid(State obj)  {
            return act.SetStateUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetStateCode(string set_type, State obj)  {
            return act.SetStateCode(set_type, obj);
        }
        
        public virtual bool SetStateCode(SetType set_type, State obj)  {
            return act.SetStateCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetStateCode(State obj)  {
            return act.SetStateCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelStateUuid(
            string uuid
        )  {            
            return act.DelStateUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelStateCode(
            string code
        )  {            
            return act.DelStateCode(
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
        public virtual List<State> GetStateListUuid(
            string uuid
        )  {
            return act.GetStateListUuid(
            uuid
            );
        }
        
        public virtual State GetStateUuid(
            string uuid
        )  {
            foreach (State item in GetStateListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<State> CachedGetStateListUuid(
            string uuid
        ) {
            return CachedGetStateListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<State> CachedGetStateListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<State> objs;

            string method_name = "CachedGetStateListUuid";

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
                objs = GetStateListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<State> GetStateListCode(
            string code
        )  {
            return act.GetStateListCode(
            code
            );
        }
        
        public virtual State GetStateCode(
            string code
        )  {
            foreach (State item in GetStateListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<State> CachedGetStateListCode(
            string code
        ) {
            return CachedGetStateListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<State> CachedGetStateListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<State> objs;

            string method_name = "CachedGetStateListCode";

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
                objs = GetStateListCode(
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
        public virtual int CountCityUuid(
            string uuid
        )  {            
            return act.CountCityUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCityCode(
            string code
        )  {            
            return act.CountCityCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual CityResult BrowseCityListFilter(SearchFilter obj)  {
            return act.BrowseCityListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCityUuid(string set_type, City obj)  {
            return act.SetCityUuid(set_type, obj);
        }
        
        public virtual bool SetCityUuid(SetType set_type, City obj)  {
            return act.SetCityUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetCityUuid(City obj)  {
            return act.SetCityUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCityCode(string set_type, City obj)  {
            return act.SetCityCode(set_type, obj);
        }
        
        public virtual bool SetCityCode(SetType set_type, City obj)  {
            return act.SetCityCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetCityCode(City obj)  {
            return act.SetCityCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelCityUuid(
            string uuid
        )  {            
            return act.DelCityUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelCityCode(
            string code
        )  {            
            return act.DelCityCode(
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
        public virtual List<City> GetCityListUuid(
            string uuid
        )  {
            return act.GetCityListUuid(
            uuid
            );
        }
        
        public virtual City GetCityUuid(
            string uuid
        )  {
            foreach (City item in GetCityListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<City> CachedGetCityListUuid(
            string uuid
        ) {
            return CachedGetCityListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<City> CachedGetCityListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<City> objs;

            string method_name = "CachedGetCityListUuid";

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
                objs = GetCityListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<City> GetCityListCode(
            string code
        )  {
            return act.GetCityListCode(
            code
            );
        }
        
        public virtual City GetCityCode(
            string code
        )  {
            foreach (City item in GetCityListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<City> CachedGetCityListCode(
            string code
        ) {
            return CachedGetCityListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<City> CachedGetCityListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<City> objs;

            string method_name = "CachedGetCityListCode";

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
                objs = GetCityListCode(
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
        public virtual int CountPostalCodeUuid(
            string uuid
        )  {            
            return act.CountPostalCodeUuid(
            uuid
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPostalCodeCode(
            string code
        )  {            
            return act.CountPostalCodeCode(
            code
            );
        }       
//------------------------------------------------------------------------------                    
        public virtual PostalCodeResult BrowsePostalCodeListFilter(SearchFilter obj)  {
            return act.BrowsePostalCodeListFilter(obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPostalCodeUuid(string set_type, PostalCode obj)  {
            return act.SetPostalCodeUuid(set_type, obj);
        }
        
        public virtual bool SetPostalCodeUuid(SetType set_type, PostalCode obj)  {
            return act.SetPostalCodeUuid(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPostalCodeUuid(PostalCode obj)  {
            return act.SetPostalCodeUuid(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPostalCodeCode(string set_type, PostalCode obj)  {
            return act.SetPostalCodeCode(set_type, obj);
        }
        
        public virtual bool SetPostalCodeCode(SetType set_type, PostalCode obj)  {
            return act.SetPostalCodeCode(ConvertSetTypeToString(set_type), obj);
        }
        
        public virtual bool SetPostalCodeCode(PostalCode obj)  {
            return act.SetPostalCodeCode(DEFAULT_SET_TYPE, obj);
        }
//------------------------------------------------------------------------------                    
        public virtual bool DelPostalCodeUuid(
            string uuid
        )  {            
            return act.DelPostalCodeUuid(
            uuid
            );
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPostalCodeCode(
            string code
        )  {            
            return act.DelPostalCodeCode(
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
        public virtual List<PostalCode> GetPostalCodeListUuid(
            string uuid
        )  {
            return act.GetPostalCodeListUuid(
            uuid
            );
        }
        
        public virtual PostalCode GetPostalCodeUuid(
            string uuid
        )  {
            foreach (PostalCode item in GetPostalCodeListUuid(
            uuid
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<PostalCode> CachedGetPostalCodeListUuid(
            string uuid
        ) {
            return CachedGetPostalCodeListUuid(
                    false
                    , CACHE_DEFAULT_HOURS
                    , uuid
                );
        }
        
        public virtual List<PostalCode> CachedGetPostalCodeListUuid(
            bool overrideCache
            , int cacheHours
            , string uuid
        ) {
            List<PostalCode> objs;

            string method_name = "CachedGetPostalCodeListUuid";

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
                objs = GetPostalCodeListUuid(
                    uuid
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
//------------------------------------------------------------------------------                    
        public virtual List<PostalCode> GetPostalCodeListCode(
            string code
        )  {
            return act.GetPostalCodeListCode(
            code
            );
        }
        
        public virtual PostalCode GetPostalCodeCode(
            string code
        )  {
            foreach (PostalCode item in GetPostalCodeListCode(
            code
            ))  {
                return item;
            }
            return null;
        }
        
        public virtual List<PostalCode> CachedGetPostalCodeListCode(
            string code
        ) {
            return CachedGetPostalCodeListCode(
                    false
                    , CACHE_DEFAULT_HOURS
                    , code
                );
        }
        
        public virtual List<PostalCode> CachedGetPostalCodeListCode(
            bool overrideCache
            , int cacheHours
            , string code
        ) {
            List<PostalCode> objs;

            string method_name = "CachedGetPostalCodeListCode";

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
                objs = GetPostalCodeListCode(
                    code
                );
                CacheUtil.AddAbsoluteByHours(objs, cache_key, cacheHours);
            }
            return objs;
        }        
    }
}






