using System;
using System.Data;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.config;
using ah.core.data;
using ah.core.data.pgsql;

using Npgsql;
using log4net;

using profile;
using profile.ent;

namespace profile {

    public class BaseProfileData {
        
	private static readonly log4net.ILog log = log4net.LogManager.GetLogger("main");
    
        DataProvider data = new DataProvider();
        public static string connectionString = CoreConfig.GetConnectionStringByName("profile");
                
        public BaseProfileData(){
        }
        
//------------------------------------------------------------------------------                    
        public virtual int CountProfile(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileByUsernameByHash(
            string username
            , string hash
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_hash", hash));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_count_username_hash"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileByUsername(
            string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_username", username));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_count_username"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_browse_filter"
                , "profile"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileByUuid(string set_type, Profile obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_first_name", obj.first_name));
            parameters.Add(new NpgsqlParameter("in_last_name", obj.last_name));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_email", obj.email));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileByUsername(string set_type, Profile obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_first_name", obj.first_name));
            parameters.Add(new NpgsqlParameter("in_last_name", obj.last_name));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_email", obj.email));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_set_username"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileByUsername(
            string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_username", username));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_del_username"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_get_uuid"
                , "profile"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileListByUsernameByHash(
            string username
            , string hash
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_hash", hash));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_get_username_hash"
                , "profile"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileListByUsername(
            string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_username", username));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_get_username"
                , "profile"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileType(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_type_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_type_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileTypeByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_type_count_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileTypeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_type_browse_filter"
                , "profile_type"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileTypeByUuid(string set_type, ProfileType obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_type_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_type_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_type_get_uuid"
                , "profile_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileTypeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_type_get_code"
                , "profile_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileTypeListByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_type_get_type_id"
                , "profile_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttribute(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeByType(
            int type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_type", type));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_count_type"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeByGroup(
            int group
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_group", group));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_count_group"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeByCodeByType(
            string code
            , int type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_type", type));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_count_code_type"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileAttributeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_browse_filter"
                , "profile_attribute"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeByUuid(string set_type, ProfileAttribute obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_group", obj.group));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeByCode(string set_type, ProfileAttribute obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_group", obj.group));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_attribute_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_attribute_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_get_uuid"
                , "profile_attribute"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_get_code"
                , "profile_attribute"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeListByType(
            int type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type", type));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_get_type"
                , "profile_attribute"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeListByGroup(
            int group
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_group", group));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_get_group"
                , "profile_attribute"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeListByCodeByType(
            string code
            , int type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_type", type));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_get_code_type"
                , "profile_attribute"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeText(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeTextByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeTextByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_count_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeTextByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", attribute_id));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_count_profile_id_attribute_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileAttributeTextListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_browse_filter"
                , "profile_attribute_text"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeTextByUuid(string set_type, ProfileAttributeText obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_group", obj.group));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", obj.attribute_id));
            parameters.Add(new NpgsqlParameter("in_attribute_value", obj.attribute_value));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeTextByProfileId(string set_type, ProfileAttributeText obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_group", obj.group));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", obj.attribute_id));
            parameters.Add(new NpgsqlParameter("in_attribute_value", obj.attribute_value));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_set_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeTextByProfileIdByAttributeId(string set_type, ProfileAttributeText obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_group", obj.group));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", obj.attribute_id));
            parameters.Add(new NpgsqlParameter("in_attribute_value", obj.attribute_value));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_set_profile_id_attribute_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeTextByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_attribute_text_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeTextByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_attribute_text_del_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeTextByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", attribute_id));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_attribute_text_del_profile_id_attribute_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeTextListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_get_uuid"
                , "profile_attribute_text"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeTextListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_get_profile_id"
                , "profile_attribute_text"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeTextListByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", attribute_id));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_text_get_profile_id_attribute_id"
                , "profile_attribute_text"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeData(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeDataByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeDataByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_count_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAttributeDataByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", attribute_id));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_count_profile_id_attribute_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileAttributeDataListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_browse_filter"
                , "profile_attribute_data"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeDataByUuid(string set_type, ProfileAttributeData obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_group", obj.group));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", obj.attribute_id));
            parameters.Add(new NpgsqlParameter("in_attribute_value", obj.attribute_value));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeDataByProfileId(string set_type, ProfileAttributeData obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_group", obj.group));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", obj.attribute_id));
            parameters.Add(new NpgsqlParameter("in_attribute_value", obj.attribute_value));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_set_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAttributeDataByProfileIdByAttributeId(string set_type, ProfileAttributeData obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_group", obj.group));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", obj.attribute_id));
            parameters.Add(new NpgsqlParameter("in_attribute_value", obj.attribute_value));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_set_profile_id_attribute_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeDataByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_attribute_data_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeDataByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_attribute_data_del_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAttributeDataByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", attribute_id));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_attribute_data_del_profile_id_attribute_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeDataListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_get_uuid"
                , "profile_attribute_data"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeDataListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_get_profile_id"
                , "profile_attribute_data"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAttributeDataListByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_attribute_id", attribute_id));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_attribute_data_get_profile_id_attribute_id"
                , "profile_attribute_data"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDevice(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByProfileIdByDeviceId(
            string profile_id
            , string device_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_device_id", device_id));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_count_profile_id_device_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByProfileIdByToken(
            string profile_id
            , string token
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_token", token));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_count_profile_id_token"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_count_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByDeviceId(
            string device_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_device_id", device_id));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_count_device_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileDeviceByToken(
            string token
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_token", token));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_count_token"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileDeviceListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_browse_filter"
                , "profile_device"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileDeviceByUuid(string set_type, ProfileDevice obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_token", obj.token));
            parameters.Add(new NpgsqlParameter("in_secret", obj.secret));
            parameters.Add(new NpgsqlParameter("in_device_version", obj.device_version));
            parameters.Add(new NpgsqlParameter("in_device_type", obj.device_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_device_os", obj.device_os));
            parameters.Add(new NpgsqlParameter("in_device_id", obj.device_id));
            parameters.Add(new NpgsqlParameter("in_device_platform", obj.device_platform));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_device_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceByProfileIdByDeviceId(
            string profile_id
            , string device_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_device_id", device_id));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_device_del_profile_id_device_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceByProfileIdByToken(
            string profile_id
            , string token
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_token", token));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_device_del_profile_id_token"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileDeviceByToken(
            string token
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_token", token));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_device_del_token"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileDeviceListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_get_uuid"
                , "profile_device"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileDeviceListByProfileIdByDeviceId(
            string profile_id
            , string device_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_device_id", device_id));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_get_profile_id_device_id"
                , "profile_device"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileDeviceListByProfileIdByToken(
            string profile_id
            , string token
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_token", token));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_get_profile_id_token"
                , "profile_device"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileDeviceListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_get_profile_id"
                , "profile_device"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileDeviceListByDeviceId(
            string device_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_device_id", device_id));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_get_device_id"
                , "profile_device"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileDeviceListByToken(
            string token
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_token", token));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_device_get_token"
                , "profile_device"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountCountry(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_country_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCountryByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_country_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCountryByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_country_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseCountryListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_country_browse_filter"
                , "country"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCountryByUuid(string set_type, Country obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_country_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetCountryByCode(string set_type, Country obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_country_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelCountryByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_country_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelCountryByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_country_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetCountryList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_country_get"
                , "country"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetCountryListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_country_get_uuid"
                , "country"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetCountryListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_country_get_code"
                , "country"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountState(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_state_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountStateByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_state_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountStateByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_state_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseStateListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_state_browse_filter"
                , "state"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetStateByUuid(string set_type, State obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_state_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetStateByCode(string set_type, State obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_state_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelStateByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_state_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelStateByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_state_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetStateList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_state_get"
                , "state"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetStateListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_state_get_uuid"
                , "state"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetStateListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_state_get_code"
                , "state"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountCity(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_city_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCityByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_city_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCityByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_city_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseCityListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_city_browse_filter"
                , "city"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCityByUuid(string set_type, City obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_city_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetCityByCode(string set_type, City obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_city_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelCityByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_city_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelCityByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_city_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetCityList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_city_get"
                , "city"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetCityListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_city_get_uuid"
                , "city"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetCityListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_city_get_code"
                , "city"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountPostalCode(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_postal_code_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPostalCodeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_postal_code_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPostalCodeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_postal_code_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowsePostalCodeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_postal_code_browse_filter"
                , "postal_code"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPostalCodeByUuid(string set_type, PostalCode obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_postal_code_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetPostalCodeByCode(string set_type, PostalCode obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_postal_code_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelPostalCodeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_postal_code_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelPostalCodeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BaseProfileData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_postal_code_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPostalCodeList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_postal_code_get"
                , "postal_code"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPostalCodeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_postal_code_get_uuid"
                , "postal_code"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPostalCodeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseProfileData.connectionString
                , CommandType.StoredProcedure
                , "usp_postal_code_get_code"
                , "postal_code"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
    }
}






