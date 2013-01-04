using System;
using System.Data;
using System.Data.SqlClient;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.data.pgsql;
using ah.core.ent;

using profile;
using profile.ent;

namespace profile {

    public class BaseProfileACT {
    
        ProfileData data = new ProfileData();
        DataType dataType = new DataType();
        
        public BaseProfileACT(){
        
        }
        
        
        public virtual Profile FillProfile(DataRow dr) {
            Profile obj = new Profile();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["first_name"] != null)                    
                    obj.first_name = dataType.FillDataString(dr, "first_name");                
            if (dr["last_name"] != null)                    
                    obj.last_name = dataType.FillDataString(dr, "last_name");                
            if (dr["hash"] != null)                    
                    obj.hash = dataType.FillDataString(dr, "hash");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["email"] != null)                    
                    obj.email = dataType.FillDataString(dr, "email");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                

            return obj;
        }
        
        public virtual int CountProfile(
        )  {            
            return data.CountProfile(
            );
        }       
        public virtual int CountProfileUuid(
            string uuid
        )  {            
            return data.CountProfileUuid(
                uuid
            );
        }       
        public virtual int CountProfileUsernameHash(
            string username
            , string hash
        )  {            
            return data.CountProfileUsernameHash(
                username
                , hash
            );
        }       
        public virtual int CountProfileUsername(
            string username
        )  {            
            return data.CountProfileUsername(
                username
            );
        }       
        public virtual ProfileResult BrowseProfileListFilter(SearchFilter obj)  {
            ProfileResult result = new ProfileResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Profile profile  = FillProfile(dr);
                        result.data.Add(profile);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileUuid(string set_type, Profile obj)  {            
            return data.SetProfileUuid(set_type, obj);
        }    
        public virtual bool SetProfileUsername(string set_type, Profile obj)  {            
            return data.SetProfileUsername(set_type, obj);
        }    
        public virtual bool DelProfileUuid(
            string uuid
        )  {
            return data.DelProfileUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileUsername(
            string username
        )  {
            return data.DelProfileUsername(
                username
            );
        }                     
        public virtual List<Profile> GetProfileListUuid(
            string uuid
        )  {
            List<Profile> list = new List<Profile>();
            DataSet ds = data.GetProfileListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Profile profile  = FillProfile(dr);
                        list.Add(profile);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Profile> GetProfileListUsernameHash(
            string username
            , string hash
        )  {
            List<Profile> list = new List<Profile>();
            DataSet ds = data.GetProfileListUsernameHash(
                username
                , hash
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Profile profile  = FillProfile(dr);
                        list.Add(profile);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Profile> GetProfileListUsername(
            string username
        )  {
            List<Profile> list = new List<Profile>();
            DataSet ds = data.GetProfileListUsername(
                username
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Profile profile  = FillProfile(dr);
                        list.Add(profile);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileType FillProfileType(DataRow dr) {
            ProfileType obj = new ProfileType();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountProfileType(
        )  {            
            return data.CountProfileType(
            );
        }       
        public virtual int CountProfileTypeUuid(
            string uuid
        )  {            
            return data.CountProfileTypeUuid(
                uuid
            );
        }       
        public virtual int CountProfileTypeTypeId(
            string type_id
        )  {            
            return data.CountProfileTypeTypeId(
                type_id
            );
        }       
        public virtual ProfileTypeResult BrowseProfileTypeListFilter(SearchFilter obj)  {
            ProfileTypeResult result = new ProfileTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileTypeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileType profile_type  = FillProfileType(dr);
                        result.data.Add(profile_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileTypeUuid(string set_type, ProfileType obj)  {            
            return data.SetProfileTypeUuid(set_type, obj);
        }    
        public virtual bool DelProfileTypeUuid(
            string uuid
        )  {
            return data.DelProfileTypeUuid(
                uuid
            );
        }                     
        public virtual List<ProfileType> GetProfileTypeListUuid(
            string uuid
        )  {
            List<ProfileType> list = new List<ProfileType>();
            DataSet ds = data.GetProfileTypeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileType profile_type  = FillProfileType(dr);
                        list.Add(profile_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileType> GetProfileTypeListCode(
            string code
        )  {
            List<ProfileType> list = new List<ProfileType>();
            DataSet ds = data.GetProfileTypeListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileType profile_type  = FillProfileType(dr);
                        list.Add(profile_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileType> GetProfileTypeListTypeId(
            string type_id
        )  {
            List<ProfileType> list = new List<ProfileType>();
            DataSet ds = data.GetProfileTypeListTypeId(
                type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileType profile_type  = FillProfileType(dr);
                        list.Add(profile_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileAttribute FillProfileAttribute(DataRow dr) {
            ProfileAttribute obj = new ProfileAttribute();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["group"] != null)                    
                    obj.group = dataType.FillDataInt(dr, "group");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataInt(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataInt(dr, "order");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountProfileAttribute(
        )  {            
            return data.CountProfileAttribute(
            );
        }       
        public virtual int CountProfileAttributeUuid(
            string uuid
        )  {            
            return data.CountProfileAttributeUuid(
                uuid
            );
        }       
        public virtual int CountProfileAttributeCode(
            string code
        )  {            
            return data.CountProfileAttributeCode(
                code
            );
        }       
        public virtual int CountProfileAttributeType(
            int type
        )  {            
            return data.CountProfileAttributeType(
                type
            );
        }       
        public virtual int CountProfileAttributeGroup(
            int group
        )  {            
            return data.CountProfileAttributeGroup(
                group
            );
        }       
        public virtual int CountProfileAttributeCodeType(
            string code
            , int type
        )  {            
            return data.CountProfileAttributeCodeType(
                code
                , type
            );
        }       
        public virtual ProfileAttributeResult BrowseProfileAttributeListFilter(SearchFilter obj)  {
            ProfileAttributeResult result = new ProfileAttributeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileAttributeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttribute profile_attribute  = FillProfileAttribute(dr);
                        result.data.Add(profile_attribute);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileAttributeUuid(string set_type, ProfileAttribute obj)  {            
            return data.SetProfileAttributeUuid(set_type, obj);
        }    
        public virtual bool SetProfileAttributeCode(string set_type, ProfileAttribute obj)  {            
            return data.SetProfileAttributeCode(set_type, obj);
        }    
        public virtual bool DelProfileAttributeUuid(
            string uuid
        )  {
            return data.DelProfileAttributeUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileAttributeCode(
            string code
        )  {
            return data.DelProfileAttributeCode(
                code
            );
        }                     
        public virtual List<ProfileAttribute> GetProfileAttributeListUuid(
            string uuid
        )  {
            List<ProfileAttribute> list = new List<ProfileAttribute>();
            DataSet ds = data.GetProfileAttributeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttribute profile_attribute  = FillProfileAttribute(dr);
                        list.Add(profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileAttribute> GetProfileAttributeListCode(
            string code
        )  {
            List<ProfileAttribute> list = new List<ProfileAttribute>();
            DataSet ds = data.GetProfileAttributeListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttribute profile_attribute  = FillProfileAttribute(dr);
                        list.Add(profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileAttribute> GetProfileAttributeListType(
            int type
        )  {
            List<ProfileAttribute> list = new List<ProfileAttribute>();
            DataSet ds = data.GetProfileAttributeListType(
                type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttribute profile_attribute  = FillProfileAttribute(dr);
                        list.Add(profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileAttribute> GetProfileAttributeListGroup(
            int group
        )  {
            List<ProfileAttribute> list = new List<ProfileAttribute>();
            DataSet ds = data.GetProfileAttributeListGroup(
                group
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttribute profile_attribute  = FillProfileAttribute(dr);
                        list.Add(profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileAttribute> GetProfileAttributeListCodeType(
            string code
            , int type
        )  {
            List<ProfileAttribute> list = new List<ProfileAttribute>();
            DataSet ds = data.GetProfileAttributeListCodeType(
                code
                , type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttribute profile_attribute  = FillProfileAttribute(dr);
                        list.Add(profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileAttributeText FillProfileAttributeText(DataRow dr) {
            ProfileAttributeText obj = new ProfileAttributeText();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
            if (dr["group"] != null)                    
                    obj.group = dataType.FillDataInt(dr, "group");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["attribute_id"] != null)                    
                    obj.attribute_id = dataType.FillDataString(dr, "attribute_id");                
            if (dr["attribute_value"] != null)                    
                    obj.attribute_value = dataType.FillDataString(dr, "attribute_value");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataInt(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataInt(dr, "order");                

            return obj;
        }
        
        public virtual int CountProfileAttributeText(
        )  {            
            return data.CountProfileAttributeText(
            );
        }       
        public virtual int CountProfileAttributeTextUuid(
            string uuid
        )  {            
            return data.CountProfileAttributeTextUuid(
                uuid
            );
        }       
        public virtual int CountProfileAttributeTextProfileId(
            string profile_id
        )  {            
            return data.CountProfileAttributeTextProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileAttributeTextProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return data.CountProfileAttributeTextProfileIdAttributeId(
                profile_id
                , attribute_id
            );
        }       
        public virtual ProfileAttributeTextResult BrowseProfileAttributeTextListFilter(SearchFilter obj)  {
            ProfileAttributeTextResult result = new ProfileAttributeTextResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileAttributeTextListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttributeText profile_attribute_text  = FillProfileAttributeText(dr);
                        result.data.Add(profile_attribute_text);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileAttributeTextUuid(string set_type, ProfileAttributeText obj)  {            
            return data.SetProfileAttributeTextUuid(set_type, obj);
        }    
        public virtual bool SetProfileAttributeTextProfileId(string set_type, ProfileAttributeText obj)  {            
            return data.SetProfileAttributeTextProfileId(set_type, obj);
        }    
        public virtual bool SetProfileAttributeTextProfileIdAttributeId(string set_type, ProfileAttributeText obj)  {            
            return data.SetProfileAttributeTextProfileIdAttributeId(set_type, obj);
        }    
        public virtual bool DelProfileAttributeTextUuid(
            string uuid
        )  {
            return data.DelProfileAttributeTextUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileAttributeTextProfileId(
            string profile_id
        )  {
            return data.DelProfileAttributeTextProfileId(
                profile_id
            );
        }                     
        public virtual bool DelProfileAttributeTextProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {
            return data.DelProfileAttributeTextProfileIdAttributeId(
                profile_id
                , attribute_id
            );
        }                     
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListUuid(
            string uuid
        )  {
            List<ProfileAttributeText> list = new List<ProfileAttributeText>();
            DataSet ds = data.GetProfileAttributeTextListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttributeText profile_attribute_text  = FillProfileAttributeText(dr);
                        list.Add(profile_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListProfileId(
            string profile_id
        )  {
            List<ProfileAttributeText> list = new List<ProfileAttributeText>();
            DataSet ds = data.GetProfileAttributeTextListProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttributeText profile_attribute_text  = FillProfileAttributeText(dr);
                        list.Add(profile_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<ProfileAttributeText> list = new List<ProfileAttributeText>();
            DataSet ds = data.GetProfileAttributeTextListProfileIdAttributeId(
                profile_id
                , attribute_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttributeText profile_attribute_text  = FillProfileAttributeText(dr);
                        list.Add(profile_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileAttributeData FillProfileAttributeData(DataRow dr) {
            ProfileAttributeData obj = new ProfileAttributeData();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
            if (dr["group"] != null)                    
                    obj.group = dataType.FillDataInt(dr, "group");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["attribute_id"] != null)                    
                    obj.attribute_id = dataType.FillDataString(dr, "attribute_id");                
            if (dr["attribute_value"] != null)                    
                    obj.attribute_value = dataType.FillDataString(dr, "attribute_value");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataInt(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataInt(dr, "order");                

            return obj;
        }
        
        public virtual int CountProfileAttributeData(
        )  {            
            return data.CountProfileAttributeData(
            );
        }       
        public virtual int CountProfileAttributeDataUuid(
            string uuid
        )  {            
            return data.CountProfileAttributeDataUuid(
                uuid
            );
        }       
        public virtual int CountProfileAttributeDataProfileId(
            string profile_id
        )  {            
            return data.CountProfileAttributeDataProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileAttributeDataProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return data.CountProfileAttributeDataProfileIdAttributeId(
                profile_id
                , attribute_id
            );
        }       
        public virtual ProfileAttributeDataResult BrowseProfileAttributeDataListFilter(SearchFilter obj)  {
            ProfileAttributeDataResult result = new ProfileAttributeDataResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileAttributeDataListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttributeData profile_attribute_data  = FillProfileAttributeData(dr);
                        result.data.Add(profile_attribute_data);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileAttributeDataUuid(string set_type, ProfileAttributeData obj)  {            
            return data.SetProfileAttributeDataUuid(set_type, obj);
        }    
        public virtual bool SetProfileAttributeDataProfileId(string set_type, ProfileAttributeData obj)  {            
            return data.SetProfileAttributeDataProfileId(set_type, obj);
        }    
        public virtual bool SetProfileAttributeDataProfileIdAttributeId(string set_type, ProfileAttributeData obj)  {            
            return data.SetProfileAttributeDataProfileIdAttributeId(set_type, obj);
        }    
        public virtual bool DelProfileAttributeDataUuid(
            string uuid
        )  {
            return data.DelProfileAttributeDataUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileAttributeDataProfileId(
            string profile_id
        )  {
            return data.DelProfileAttributeDataProfileId(
                profile_id
            );
        }                     
        public virtual bool DelProfileAttributeDataProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {
            return data.DelProfileAttributeDataProfileIdAttributeId(
                profile_id
                , attribute_id
            );
        }                     
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListUuid(
            string uuid
        )  {
            List<ProfileAttributeData> list = new List<ProfileAttributeData>();
            DataSet ds = data.GetProfileAttributeDataListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttributeData profile_attribute_data  = FillProfileAttributeData(dr);
                        list.Add(profile_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListProfileId(
            string profile_id
        )  {
            List<ProfileAttributeData> list = new List<ProfileAttributeData>();
            DataSet ds = data.GetProfileAttributeDataListProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttributeData profile_attribute_data  = FillProfileAttributeData(dr);
                        list.Add(profile_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListProfileIdAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<ProfileAttributeData> list = new List<ProfileAttributeData>();
            DataSet ds = data.GetProfileAttributeDataListProfileIdAttributeId(
                profile_id
                , attribute_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileAttributeData profile_attribute_data  = FillProfileAttributeData(dr);
                        list.Add(profile_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileDevice FillProfileDevice(DataRow dr) {
            ProfileDevice obj = new ProfileDevice();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["token"] != null)                    
                    obj.token = dataType.FillDataString(dr, "token");                
            if (dr["secret"] != null)                    
                    obj.secret = dataType.FillDataString(dr, "secret");                
            if (dr["device_version"] != null)                    
                    obj.device_version = dataType.FillDataString(dr, "device_version");                
            if (dr["device_type"] != null)                    
                    obj.device_type = dataType.FillDataString(dr, "device_type");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["device_os"] != null)                    
                    obj.device_os = dataType.FillDataString(dr, "device_os");                
            if (dr["device_id"] != null)                    
                    obj.device_id = dataType.FillDataString(dr, "device_id");                
            if (dr["device_platform"] != null)                    
                    obj.device_platform = dataType.FillDataString(dr, "device_platform");                

            return obj;
        }
        
        public virtual int CountProfileDevice(
        )  {            
            return data.CountProfileDevice(
            );
        }       
        public virtual int CountProfileDeviceUuid(
            string uuid
        )  {            
            return data.CountProfileDeviceUuid(
                uuid
            );
        }       
        public virtual int CountProfileDeviceProfileIdDeviceId(
            string profile_id
            , string device_id
        )  {            
            return data.CountProfileDeviceProfileIdDeviceId(
                profile_id
                , device_id
            );
        }       
        public virtual int CountProfileDeviceProfileIdToken(
            string profile_id
            , string token
        )  {            
            return data.CountProfileDeviceProfileIdToken(
                profile_id
                , token
            );
        }       
        public virtual int CountProfileDeviceProfileId(
            string profile_id
        )  {            
            return data.CountProfileDeviceProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileDeviceDeviceId(
            string device_id
        )  {            
            return data.CountProfileDeviceDeviceId(
                device_id
            );
        }       
        public virtual int CountProfileDeviceToken(
            string token
        )  {            
            return data.CountProfileDeviceToken(
                token
            );
        }       
        public virtual ProfileDeviceResult BrowseProfileDeviceListFilter(SearchFilter obj)  {
            ProfileDeviceResult result = new ProfileDeviceResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileDeviceListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileDevice profile_device  = FillProfileDevice(dr);
                        result.data.Add(profile_device);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileDeviceUuid(string set_type, ProfileDevice obj)  {            
            return data.SetProfileDeviceUuid(set_type, obj);
        }    
        public virtual bool DelProfileDeviceUuid(
            string uuid
        )  {
            return data.DelProfileDeviceUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileDeviceProfileIdDeviceId(
            string profile_id
            , string device_id
        )  {
            return data.DelProfileDeviceProfileIdDeviceId(
                profile_id
                , device_id
            );
        }                     
        public virtual bool DelProfileDeviceProfileIdToken(
            string profile_id
            , string token
        )  {
            return data.DelProfileDeviceProfileIdToken(
                profile_id
                , token
            );
        }                     
        public virtual bool DelProfileDeviceToken(
            string token
        )  {
            return data.DelProfileDeviceToken(
                token
            );
        }                     
        public virtual List<ProfileDevice> GetProfileDeviceListUuid(
            string uuid
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileDevice profile_device  = FillProfileDevice(dr);
                        list.Add(profile_device);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileDevice> GetProfileDeviceListProfileIdDeviceId(
            string profile_id
            , string device_id
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListProfileIdDeviceId(
                profile_id
                , device_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileDevice profile_device  = FillProfileDevice(dr);
                        list.Add(profile_device);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileDevice> GetProfileDeviceListProfileIdToken(
            string profile_id
            , string token
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListProfileIdToken(
                profile_id
                , token
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileDevice profile_device  = FillProfileDevice(dr);
                        list.Add(profile_device);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileDevice> GetProfileDeviceListProfileId(
            string profile_id
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileDevice profile_device  = FillProfileDevice(dr);
                        list.Add(profile_device);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileDevice> GetProfileDeviceListDeviceId(
            string device_id
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListDeviceId(
                device_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileDevice profile_device  = FillProfileDevice(dr);
                        list.Add(profile_device);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileDevice> GetProfileDeviceListToken(
            string token
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListToken(
                token
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileDevice profile_device  = FillProfileDevice(dr);
                        list.Add(profile_device);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Country FillCountry(DataRow dr) {
            Country obj = new Country();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountCountry(
        )  {            
            return data.CountCountry(
            );
        }       
        public virtual int CountCountryUuid(
            string uuid
        )  {            
            return data.CountCountryUuid(
                uuid
            );
        }       
        public virtual int CountCountryCode(
            string code
        )  {            
            return data.CountCountryCode(
                code
            );
        }       
        public virtual CountryResult BrowseCountryListFilter(SearchFilter obj)  {
            CountryResult result = new CountryResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseCountryListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Country country  = FillCountry(dr);
                        result.data.Add(country);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetCountryUuid(string set_type, Country obj)  {            
            return data.SetCountryUuid(set_type, obj);
        }    
        public virtual bool SetCountryCode(string set_type, Country obj)  {            
            return data.SetCountryCode(set_type, obj);
        }    
        public virtual bool DelCountryUuid(
            string uuid
        )  {
            return data.DelCountryUuid(
                uuid
            );
        }                     
        public virtual bool DelCountryCode(
            string code
        )  {
            return data.DelCountryCode(
                code
            );
        }                     
        public virtual List<Country> GetCountryList(
        )  {
            List<Country> list = new List<Country>();
            DataSet ds = data.GetCountryList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Country country  = FillCountry(dr);
                        list.Add(country);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Country> GetCountryListUuid(
            string uuid
        )  {
            List<Country> list = new List<Country>();
            DataSet ds = data.GetCountryListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Country country  = FillCountry(dr);
                        list.Add(country);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Country> GetCountryListCode(
            string code
        )  {
            List<Country> list = new List<Country>();
            DataSet ds = data.GetCountryListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Country country  = FillCountry(dr);
                        list.Add(country);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual State FillState(DataRow dr) {
            State obj = new State();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountState(
        )  {            
            return data.CountState(
            );
        }       
        public virtual int CountStateUuid(
            string uuid
        )  {            
            return data.CountStateUuid(
                uuid
            );
        }       
        public virtual int CountStateCode(
            string code
        )  {            
            return data.CountStateCode(
                code
            );
        }       
        public virtual StateResult BrowseStateListFilter(SearchFilter obj)  {
            StateResult result = new StateResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseStateListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       State state  = FillState(dr);
                        result.data.Add(state);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetStateUuid(string set_type, State obj)  {            
            return data.SetStateUuid(set_type, obj);
        }    
        public virtual bool SetStateCode(string set_type, State obj)  {            
            return data.SetStateCode(set_type, obj);
        }    
        public virtual bool DelStateUuid(
            string uuid
        )  {
            return data.DelStateUuid(
                uuid
            );
        }                     
        public virtual bool DelStateCode(
            string code
        )  {
            return data.DelStateCode(
                code
            );
        }                     
        public virtual List<State> GetStateList(
        )  {
            List<State> list = new List<State>();
            DataSet ds = data.GetStateList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       State state  = FillState(dr);
                        list.Add(state);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<State> GetStateListUuid(
            string uuid
        )  {
            List<State> list = new List<State>();
            DataSet ds = data.GetStateListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       State state  = FillState(dr);
                        list.Add(state);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<State> GetStateListCode(
            string code
        )  {
            List<State> list = new List<State>();
            DataSet ds = data.GetStateListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       State state  = FillState(dr);
                        list.Add(state);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual City FillCity(DataRow dr) {
            City obj = new City();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountCity(
        )  {            
            return data.CountCity(
            );
        }       
        public virtual int CountCityUuid(
            string uuid
        )  {            
            return data.CountCityUuid(
                uuid
            );
        }       
        public virtual int CountCityCode(
            string code
        )  {            
            return data.CountCityCode(
                code
            );
        }       
        public virtual CityResult BrowseCityListFilter(SearchFilter obj)  {
            CityResult result = new CityResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseCityListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       City city  = FillCity(dr);
                        result.data.Add(city);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetCityUuid(string set_type, City obj)  {            
            return data.SetCityUuid(set_type, obj);
        }    
        public virtual bool SetCityCode(string set_type, City obj)  {            
            return data.SetCityCode(set_type, obj);
        }    
        public virtual bool DelCityUuid(
            string uuid
        )  {
            return data.DelCityUuid(
                uuid
            );
        }                     
        public virtual bool DelCityCode(
            string code
        )  {
            return data.DelCityCode(
                code
            );
        }                     
        public virtual List<City> GetCityList(
        )  {
            List<City> list = new List<City>();
            DataSet ds = data.GetCityList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       City city  = FillCity(dr);
                        list.Add(city);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<City> GetCityListUuid(
            string uuid
        )  {
            List<City> list = new List<City>();
            DataSet ds = data.GetCityListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       City city  = FillCity(dr);
                        list.Add(city);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<City> GetCityListCode(
            string code
        )  {
            List<City> list = new List<City>();
            DataSet ds = data.GetCityListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       City city  = FillCity(dr);
                        list.Add(city);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual PostalCode FillPostalCode(DataRow dr) {
            PostalCode obj = new PostalCode();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountPostalCode(
        )  {            
            return data.CountPostalCode(
            );
        }       
        public virtual int CountPostalCodeUuid(
            string uuid
        )  {            
            return data.CountPostalCodeUuid(
                uuid
            );
        }       
        public virtual int CountPostalCodeCode(
            string code
        )  {            
            return data.CountPostalCodeCode(
                code
            );
        }       
        public virtual PostalCodeResult BrowsePostalCodeListFilter(SearchFilter obj)  {
            PostalCodeResult result = new PostalCodeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowsePostalCodeListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       PostalCode postal_code  = FillPostalCode(dr);
                        result.data.Add(postal_code);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetPostalCodeUuid(string set_type, PostalCode obj)  {            
            return data.SetPostalCodeUuid(set_type, obj);
        }    
        public virtual bool SetPostalCodeCode(string set_type, PostalCode obj)  {            
            return data.SetPostalCodeCode(set_type, obj);
        }    
        public virtual bool DelPostalCodeUuid(
            string uuid
        )  {
            return data.DelPostalCodeUuid(
                uuid
            );
        }                     
        public virtual bool DelPostalCodeCode(
            string code
        )  {
            return data.DelPostalCodeCode(
                code
            );
        }                     
        public virtual List<PostalCode> GetPostalCodeList(
        )  {
            List<PostalCode> list = new List<PostalCode>();
            DataSet ds = data.GetPostalCodeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       PostalCode postal_code  = FillPostalCode(dr);
                        list.Add(postal_code);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<PostalCode> GetPostalCodeListUuid(
            string uuid
        )  {
            List<PostalCode> list = new List<PostalCode>();
            DataSet ds = data.GetPostalCodeListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       PostalCode postal_code  = FillPostalCode(dr);
                        list.Add(postal_code);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<PostalCode> GetPostalCodeListCode(
            string code
        )  {
            List<PostalCode> list = new List<PostalCode>();
            DataSet ds = data.GetPostalCodeListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       PostalCode postal_code  = FillPostalCode(dr);
                        list.Add(postal_code);
                    }
                }
            }
            return list;
        }
        
        
    }
}






