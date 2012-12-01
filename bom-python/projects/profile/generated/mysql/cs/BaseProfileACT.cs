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

            return obj;
        }
        
        public virtual int CountProfile(
        )  {            
            return data.CountProfile(
            );
        }       
        public virtual int CountProfileByUuid(
            string uuid
        )  {            
            return data.CountProfileByUuid(
                uuid
            );
        }       
        public virtual int CountProfileByUsernameByHash(
            string username
            , string hash
        )  {            
            return data.CountProfileByUsernameByHash(
                username
                , hash
            );
        }       
        public virtual int CountProfileByUsername(
            string username
        )  {            
            return data.CountProfileByUsername(
                username
            );
        }       
        public virtual ProfileResult BrowseProfileListByFilter(SearchFilter obj)  {
            ProfileResult result = new ProfileResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileListByFilter(obj);
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
        public virtual bool SetProfileByUuid(string set_type, Profile obj)  {            
            return data.SetProfileByUuid(set_type, obj);
        }    
        public virtual bool SetProfileByUsername(string set_type, Profile obj)  {            
            return data.SetProfileByUsername(set_type, obj);
        }    
        public virtual bool DelProfileByUuid(
            string uuid
        )  {
            return data.DelProfileByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileByUsername(
            string username
        )  {
            return data.DelProfileByUsername(
                username
            );
        }                     
        public virtual List<Profile> GetProfileListByUuid(
            string uuid
        )  {
            List<Profile> list = new List<Profile>();
            DataSet ds = data.GetProfileListByUuid(
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
        
        
        public virtual List<Profile> GetProfileListByUsernameByHash(
            string username
            , string hash
        )  {
            List<Profile> list = new List<Profile>();
            DataSet ds = data.GetProfileListByUsernameByHash(
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
        
        
        public virtual List<Profile> GetProfileListByUsername(
            string username
        )  {
            List<Profile> list = new List<Profile>();
            DataSet ds = data.GetProfileListByUsername(
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
        public virtual int CountProfileTypeByUuid(
            string uuid
        )  {            
            return data.CountProfileTypeByUuid(
                uuid
            );
        }       
        public virtual int CountProfileTypeByTypeId(
            string type_id
        )  {            
            return data.CountProfileTypeByTypeId(
                type_id
            );
        }       
        public virtual ProfileTypeResult BrowseProfileTypeListByFilter(SearchFilter obj)  {
            ProfileTypeResult result = new ProfileTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileTypeListByFilter(obj);
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
        public virtual bool SetProfileTypeByUuid(string set_type, ProfileType obj)  {            
            return data.SetProfileTypeByUuid(set_type, obj);
        }    
        public virtual bool DelProfileTypeByUuid(
            string uuid
        )  {
            return data.DelProfileTypeByUuid(
                uuid
            );
        }                     
        public virtual List<ProfileType> GetProfileTypeListByUuid(
            string uuid
        )  {
            List<ProfileType> list = new List<ProfileType>();
            DataSet ds = data.GetProfileTypeListByUuid(
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
        
        
        public virtual List<ProfileType> GetProfileTypeListByCode(
            string code
        )  {
            List<ProfileType> list = new List<ProfileType>();
            DataSet ds = data.GetProfileTypeListByCode(
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
        
        
        public virtual List<ProfileType> GetProfileTypeListByTypeId(
            string type_id
        )  {
            List<ProfileType> list = new List<ProfileType>();
            DataSet ds = data.GetProfileTypeListByTypeId(
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
        public virtual int CountProfileAttributeByUuid(
            string uuid
        )  {            
            return data.CountProfileAttributeByUuid(
                uuid
            );
        }       
        public virtual int CountProfileAttributeByCode(
            string code
        )  {            
            return data.CountProfileAttributeByCode(
                code
            );
        }       
        public virtual int CountProfileAttributeByType(
            int type
        )  {            
            return data.CountProfileAttributeByType(
                type
            );
        }       
        public virtual int CountProfileAttributeByGroup(
            int group
        )  {            
            return data.CountProfileAttributeByGroup(
                group
            );
        }       
        public virtual int CountProfileAttributeByCodeByType(
            string code
            , int type
        )  {            
            return data.CountProfileAttributeByCodeByType(
                code
                , type
            );
        }       
        public virtual ProfileAttributeResult BrowseProfileAttributeListByFilter(SearchFilter obj)  {
            ProfileAttributeResult result = new ProfileAttributeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileAttributeListByFilter(obj);
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
        public virtual bool SetProfileAttributeByUuid(string set_type, ProfileAttribute obj)  {            
            return data.SetProfileAttributeByUuid(set_type, obj);
        }    
        public virtual bool SetProfileAttributeByCode(string set_type, ProfileAttribute obj)  {            
            return data.SetProfileAttributeByCode(set_type, obj);
        }    
        public virtual bool DelProfileAttributeByUuid(
            string uuid
        )  {
            return data.DelProfileAttributeByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileAttributeByCode(
            string code
        )  {
            return data.DelProfileAttributeByCode(
                code
            );
        }                     
        public virtual List<ProfileAttribute> GetProfileAttributeListByUuid(
            string uuid
        )  {
            List<ProfileAttribute> list = new List<ProfileAttribute>();
            DataSet ds = data.GetProfileAttributeListByUuid(
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
        
        
        public virtual List<ProfileAttribute> GetProfileAttributeListByCode(
            string code
        )  {
            List<ProfileAttribute> list = new List<ProfileAttribute>();
            DataSet ds = data.GetProfileAttributeListByCode(
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
        
        
        public virtual List<ProfileAttribute> GetProfileAttributeListByType(
            int type
        )  {
            List<ProfileAttribute> list = new List<ProfileAttribute>();
            DataSet ds = data.GetProfileAttributeListByType(
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
        
        
        public virtual List<ProfileAttribute> GetProfileAttributeListByGroup(
            int group
        )  {
            List<ProfileAttribute> list = new List<ProfileAttribute>();
            DataSet ds = data.GetProfileAttributeListByGroup(
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
        
        
        public virtual List<ProfileAttribute> GetProfileAttributeListByCodeByType(
            string code
            , int type
        )  {
            List<ProfileAttribute> list = new List<ProfileAttribute>();
            DataSet ds = data.GetProfileAttributeListByCodeByType(
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
        public virtual int CountProfileAttributeTextByUuid(
            string uuid
        )  {            
            return data.CountProfileAttributeTextByUuid(
                uuid
            );
        }       
        public virtual int CountProfileAttributeTextByProfileId(
            string profile_id
        )  {            
            return data.CountProfileAttributeTextByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileAttributeTextByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return data.CountProfileAttributeTextByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
        }       
        public virtual ProfileAttributeTextResult BrowseProfileAttributeTextListByFilter(SearchFilter obj)  {
            ProfileAttributeTextResult result = new ProfileAttributeTextResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileAttributeTextListByFilter(obj);
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
        public virtual bool SetProfileAttributeTextByUuid(string set_type, ProfileAttributeText obj)  {            
            return data.SetProfileAttributeTextByUuid(set_type, obj);
        }    
        public virtual bool SetProfileAttributeTextByProfileId(string set_type, ProfileAttributeText obj)  {            
            return data.SetProfileAttributeTextByProfileId(set_type, obj);
        }    
        public virtual bool SetProfileAttributeTextByProfileIdByAttributeId(string set_type, ProfileAttributeText obj)  {            
            return data.SetProfileAttributeTextByProfileIdByAttributeId(set_type, obj);
        }    
        public virtual bool DelProfileAttributeTextByUuid(
            string uuid
        )  {
            return data.DelProfileAttributeTextByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileAttributeTextByProfileId(
            string profile_id
        )  {
            return data.DelProfileAttributeTextByProfileId(
                profile_id
            );
        }                     
        public virtual bool DelProfileAttributeTextByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            return data.DelProfileAttributeTextByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
        }                     
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListByUuid(
            string uuid
        )  {
            List<ProfileAttributeText> list = new List<ProfileAttributeText>();
            DataSet ds = data.GetProfileAttributeTextListByUuid(
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
        
        
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListByProfileId(
            string profile_id
        )  {
            List<ProfileAttributeText> list = new List<ProfileAttributeText>();
            DataSet ds = data.GetProfileAttributeTextListByProfileId(
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
        
        
        public virtual List<ProfileAttributeText> GetProfileAttributeTextListByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<ProfileAttributeText> list = new List<ProfileAttributeText>();
            DataSet ds = data.GetProfileAttributeTextListByProfileIdByAttributeId(
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
        public virtual int CountProfileAttributeDataByUuid(
            string uuid
        )  {            
            return data.CountProfileAttributeDataByUuid(
                uuid
            );
        }       
        public virtual int CountProfileAttributeDataByProfileId(
            string profile_id
        )  {            
            return data.CountProfileAttributeDataByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileAttributeDataByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return data.CountProfileAttributeDataByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
        }       
        public virtual ProfileAttributeDataResult BrowseProfileAttributeDataListByFilter(SearchFilter obj)  {
            ProfileAttributeDataResult result = new ProfileAttributeDataResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileAttributeDataListByFilter(obj);
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
        public virtual bool SetProfileAttributeDataByUuid(string set_type, ProfileAttributeData obj)  {            
            return data.SetProfileAttributeDataByUuid(set_type, obj);
        }    
        public virtual bool SetProfileAttributeDataByProfileId(string set_type, ProfileAttributeData obj)  {            
            return data.SetProfileAttributeDataByProfileId(set_type, obj);
        }    
        public virtual bool SetProfileAttributeDataByProfileIdByAttributeId(string set_type, ProfileAttributeData obj)  {            
            return data.SetProfileAttributeDataByProfileIdByAttributeId(set_type, obj);
        }    
        public virtual bool DelProfileAttributeDataByUuid(
            string uuid
        )  {
            return data.DelProfileAttributeDataByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileAttributeDataByProfileId(
            string profile_id
        )  {
            return data.DelProfileAttributeDataByProfileId(
                profile_id
            );
        }                     
        public virtual bool DelProfileAttributeDataByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            return data.DelProfileAttributeDataByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
        }                     
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListByUuid(
            string uuid
        )  {
            List<ProfileAttributeData> list = new List<ProfileAttributeData>();
            DataSet ds = data.GetProfileAttributeDataListByUuid(
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
        
        
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListByProfileId(
            string profile_id
        )  {
            List<ProfileAttributeData> list = new List<ProfileAttributeData>();
            DataSet ds = data.GetProfileAttributeDataListByProfileId(
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
        
        
        public virtual List<ProfileAttributeData> GetProfileAttributeDataListByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<ProfileAttributeData> list = new List<ProfileAttributeData>();
            DataSet ds = data.GetProfileAttributeDataListByProfileIdByAttributeId(
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
        public virtual int CountProfileDeviceByUuid(
            string uuid
        )  {            
            return data.CountProfileDeviceByUuid(
                uuid
            );
        }       
        public virtual int CountProfileDeviceByProfileIdByDeviceId(
            string profile_id
            , string device_id
        )  {            
            return data.CountProfileDeviceByProfileIdByDeviceId(
                profile_id
                , device_id
            );
        }       
        public virtual int CountProfileDeviceByProfileIdByToken(
            string profile_id
            , string token
        )  {            
            return data.CountProfileDeviceByProfileIdByToken(
                profile_id
                , token
            );
        }       
        public virtual int CountProfileDeviceByProfileId(
            string profile_id
        )  {            
            return data.CountProfileDeviceByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileDeviceByDeviceId(
            string device_id
        )  {            
            return data.CountProfileDeviceByDeviceId(
                device_id
            );
        }       
        public virtual int CountProfileDeviceByToken(
            string token
        )  {            
            return data.CountProfileDeviceByToken(
                token
            );
        }       
        public virtual ProfileDeviceResult BrowseProfileDeviceListByFilter(SearchFilter obj)  {
            ProfileDeviceResult result = new ProfileDeviceResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileDeviceListByFilter(obj);
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
        public virtual bool SetProfileDeviceByUuid(string set_type, ProfileDevice obj)  {            
            return data.SetProfileDeviceByUuid(set_type, obj);
        }    
        public virtual bool DelProfileDeviceByUuid(
            string uuid
        )  {
            return data.DelProfileDeviceByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileDeviceByProfileIdByDeviceId(
            string profile_id
            , string device_id
        )  {
            return data.DelProfileDeviceByProfileIdByDeviceId(
                profile_id
                , device_id
            );
        }                     
        public virtual bool DelProfileDeviceByProfileIdByToken(
            string profile_id
            , string token
        )  {
            return data.DelProfileDeviceByProfileIdByToken(
                profile_id
                , token
            );
        }                     
        public virtual bool DelProfileDeviceByToken(
            string token
        )  {
            return data.DelProfileDeviceByToken(
                token
            );
        }                     
        public virtual List<ProfileDevice> GetProfileDeviceListByUuid(
            string uuid
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListByUuid(
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
        
        
        public virtual List<ProfileDevice> GetProfileDeviceListByProfileIdByDeviceId(
            string profile_id
            , string device_id
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListByProfileIdByDeviceId(
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
        
        
        public virtual List<ProfileDevice> GetProfileDeviceListByProfileIdByToken(
            string profile_id
            , string token
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListByProfileIdByToken(
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
        
        
        public virtual List<ProfileDevice> GetProfileDeviceListByProfileId(
            string profile_id
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListByProfileId(
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
        
        
        public virtual List<ProfileDevice> GetProfileDeviceListByDeviceId(
            string device_id
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListByDeviceId(
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
        
        
        public virtual List<ProfileDevice> GetProfileDeviceListByToken(
            string token
        )  {
            List<ProfileDevice> list = new List<ProfileDevice>();
            DataSet ds = data.GetProfileDeviceListByToken(
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
        public virtual int CountCountryByUuid(
            string uuid
        )  {            
            return data.CountCountryByUuid(
                uuid
            );
        }       
        public virtual int CountCountryByCode(
            string code
        )  {            
            return data.CountCountryByCode(
                code
            );
        }       
        public virtual CountryResult BrowseCountryListByFilter(SearchFilter obj)  {
            CountryResult result = new CountryResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseCountryListByFilter(obj);
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
        public virtual bool SetCountryByUuid(string set_type, Country obj)  {            
            return data.SetCountryByUuid(set_type, obj);
        }    
        public virtual bool SetCountryByCode(string set_type, Country obj)  {            
            return data.SetCountryByCode(set_type, obj);
        }    
        public virtual bool DelCountryByUuid(
            string uuid
        )  {
            return data.DelCountryByUuid(
                uuid
            );
        }                     
        public virtual bool DelCountryByCode(
            string code
        )  {
            return data.DelCountryByCode(
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
        
        
        public virtual List<Country> GetCountryListByUuid(
            string uuid
        )  {
            List<Country> list = new List<Country>();
            DataSet ds = data.GetCountryListByUuid(
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
        
        
        public virtual List<Country> GetCountryListByCode(
            string code
        )  {
            List<Country> list = new List<Country>();
            DataSet ds = data.GetCountryListByCode(
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
        public virtual int CountStateByUuid(
            string uuid
        )  {            
            return data.CountStateByUuid(
                uuid
            );
        }       
        public virtual int CountStateByCode(
            string code
        )  {            
            return data.CountStateByCode(
                code
            );
        }       
        public virtual StateResult BrowseStateListByFilter(SearchFilter obj)  {
            StateResult result = new StateResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseStateListByFilter(obj);
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
        public virtual bool SetStateByUuid(string set_type, State obj)  {            
            return data.SetStateByUuid(set_type, obj);
        }    
        public virtual bool SetStateByCode(string set_type, State obj)  {            
            return data.SetStateByCode(set_type, obj);
        }    
        public virtual bool DelStateByUuid(
            string uuid
        )  {
            return data.DelStateByUuid(
                uuid
            );
        }                     
        public virtual bool DelStateByCode(
            string code
        )  {
            return data.DelStateByCode(
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
        
        
        public virtual List<State> GetStateListByUuid(
            string uuid
        )  {
            List<State> list = new List<State>();
            DataSet ds = data.GetStateListByUuid(
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
        
        
        public virtual List<State> GetStateListByCode(
            string code
        )  {
            List<State> list = new List<State>();
            DataSet ds = data.GetStateListByCode(
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
        public virtual int CountCityByUuid(
            string uuid
        )  {            
            return data.CountCityByUuid(
                uuid
            );
        }       
        public virtual int CountCityByCode(
            string code
        )  {            
            return data.CountCityByCode(
                code
            );
        }       
        public virtual CityResult BrowseCityListByFilter(SearchFilter obj)  {
            CityResult result = new CityResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseCityListByFilter(obj);
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
        public virtual bool SetCityByUuid(string set_type, City obj)  {            
            return data.SetCityByUuid(set_type, obj);
        }    
        public virtual bool SetCityByCode(string set_type, City obj)  {            
            return data.SetCityByCode(set_type, obj);
        }    
        public virtual bool DelCityByUuid(
            string uuid
        )  {
            return data.DelCityByUuid(
                uuid
            );
        }                     
        public virtual bool DelCityByCode(
            string code
        )  {
            return data.DelCityByCode(
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
        
        
        public virtual List<City> GetCityListByUuid(
            string uuid
        )  {
            List<City> list = new List<City>();
            DataSet ds = data.GetCityListByUuid(
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
        
        
        public virtual List<City> GetCityListByCode(
            string code
        )  {
            List<City> list = new List<City>();
            DataSet ds = data.GetCityListByCode(
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
        public virtual int CountPostalCodeByUuid(
            string uuid
        )  {            
            return data.CountPostalCodeByUuid(
                uuid
            );
        }       
        public virtual int CountPostalCodeByCode(
            string code
        )  {            
            return data.CountPostalCodeByCode(
                code
            );
        }       
        public virtual PostalCodeResult BrowsePostalCodeListByFilter(SearchFilter obj)  {
            PostalCodeResult result = new PostalCodeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowsePostalCodeListByFilter(obj);
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
        public virtual bool SetPostalCodeByUuid(string set_type, PostalCode obj)  {            
            return data.SetPostalCodeByUuid(set_type, obj);
        }    
        public virtual bool SetPostalCodeByCode(string set_type, PostalCode obj)  {            
            return data.SetPostalCodeByCode(set_type, obj);
        }    
        public virtual bool DelPostalCodeByUuid(
            string uuid
        )  {
            return data.DelPostalCodeByUuid(
                uuid
            );
        }                     
        public virtual bool DelPostalCodeByCode(
            string code
        )  {
            return data.DelPostalCodeByCode(
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
        
        
        public virtual List<PostalCode> GetPostalCodeListByUuid(
            string uuid
        )  {
            List<PostalCode> list = new List<PostalCode>();
            DataSet ds = data.GetPostalCodeListByUuid(
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
        
        
        public virtual List<PostalCode> GetPostalCodeListByCode(
            string code
        )  {
            List<PostalCode> list = new List<PostalCode>();
            DataSet ds = data.GetPostalCodeListByCode(
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






