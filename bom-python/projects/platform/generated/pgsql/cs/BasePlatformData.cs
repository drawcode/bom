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

using platform;
using platform.ent;

namespace platform {

    public class BasePlatformData {
        
	private static readonly log4net.ILog log = log4net.LogManager.GetLogger("main");
    
        DataProvider data = new DataProvider();
        public static string connectionString = CoreConfig.GetConnectionStringByName("platform");
                
        public BasePlatformData(){
        }
        
//------------------------------------------------------------------------------                    
        public virtual int CountApp(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByCodeByTypeId(
            string code
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_code_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByPlatformByTypeId(
            string platform
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_platform_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppByPlatform(
            string platform
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_platform"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseAppListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_browse_filter"
                , "app"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppByUuid(string set_type, App obj)  {
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
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetAppByCode(string set_type, App obj)  {
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
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelAppByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_app_del_uuid"
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
        public virtual bool DelAppByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_app_del_code"
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
        public virtual DataSet GetAppList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get"
                , "app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_uuid"
                , "app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_code"
                , "app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_type_id"
                , "app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByCodeByTypeId(
            string code
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_code_type_id"
                , "app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByPlatformByTypeId(
            string platform
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_platform_type_id"
                , "app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByPlatform(
            string platform
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_platform"
                , "app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountAppType(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountAppTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseAppTypeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_browse_filter"
                , "app_type"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppTypeByUuid(string set_type, AppType obj)  {
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
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetAppTypeByCode(string set_type, AppType obj)  {
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
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelAppTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_app_type_del_uuid"
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
        public virtual bool DelAppTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_app_type_del_code"
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
        public virtual DataSet GetAppTypeList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_get"
                , "app_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_get_uuid"
                , "app_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppTypeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_get_code"
                , "app_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountSite(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByCodeByTypeId(
            string code
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_code_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByDomainByTypeId(
            string domain
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_domain", domain));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_domain_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteByDomain(
            string domain
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_domain", domain));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_domain"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseSiteListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_browse_filter"
                , "site"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteByUuid(string set_type, Site obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_domain", obj.domain));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteByCode(string set_type, Site obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_domain", obj.domain));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_del_uuid"
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
        public virtual bool DelSiteByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_del_code"
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
        public virtual DataSet GetSiteList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get"
                , "site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_uuid"
                , "site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_code"
                , "site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_type_id"
                , "site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByCodeByTypeId(
            string code
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_code_type_id"
                , "site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByDomainByTypeId(
            string domain
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_domain", domain));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_domain_type_id"
                , "site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByDomain(
            string domain
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_domain", domain));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_domain"
                , "site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountSiteType(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseSiteTypeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_browse_filter"
                , "site_type"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteTypeByUuid(string set_type, SiteType obj)  {
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
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteTypeByCode(string set_type, SiteType obj)  {
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
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_type_del_uuid"
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
        public virtual bool DelSiteTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_type_del_code"
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
        public virtual DataSet GetSiteTypeList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_get"
                , "site_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_get_uuid"
                , "site_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteTypeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_get_code"
                , "site_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOrg(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseOrgListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_browse_filter"
                , "org"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgByUuid(string set_type, Org obj)  {
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
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_org_del_uuid"
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
        public virtual DataSet GetOrgList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_get"
                , "org"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_get_uuid"
                , "org"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_get_code"
                , "org"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_get_name"
                , "org"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOrgType(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseOrgTypeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_browse_filter"
                , "org_type"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgTypeByUuid(string set_type, OrgType obj)  {
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
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgTypeByCode(string set_type, OrgType obj)  {
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
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_org_type_del_uuid"
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
        public virtual bool DelOrgTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_org_type_del_code"
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
        public virtual DataSet GetOrgTypeList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_get"
                , "org_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_get_uuid"
                , "org_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgTypeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_get_code"
                , "org_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountContentItem(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemByPath(
            string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_count_path"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseContentItemListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_browse_filter"
                , "content_item"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemByUuid(string set_type, ContentItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_date_end", obj.date_end));
            parameters.Add(new NpgsqlParameter("in_date_start", obj.date_start));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_item_del_uuid"
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
        public virtual bool DelContentItemByPath(
            string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_item_del_path"
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
        public virtual DataSet GetContentItemList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_get"
                , "content_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_get_uuid"
                , "content_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_get_code"
                , "content_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_get_name"
                , "content_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemListByPath(
            string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_get_path"
                , "content_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemType(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseContentItemTypeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_browse_filter"
                , "content_item_type"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemTypeByUuid(string set_type, ContentItemType obj)  {
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
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemTypeByCode(string set_type, ContentItemType obj)  {
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
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_item_type_del_uuid"
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
        public virtual bool DelContentItemTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_item_type_del_code"
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
        public virtual DataSet GetContentItemTypeList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_get"
                , "content_item_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_get_uuid"
                , "content_item_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemTypeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_get_code"
                , "content_item_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountContentPage(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPageByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPageByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPageByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountContentPageByPath(
            string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_count_path"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseContentPageListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_browse_filter"
                , "content_page"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentPageByUuid(string set_type, ContentPage obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_date_end", obj.date_end));
            parameters.Add(new NpgsqlParameter("in_date_start", obj.date_start));
            parameters.Add(new NpgsqlParameter("in_site_id", obj.site_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_template", obj.template));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelContentPageByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_page_del_uuid"
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
        public virtual bool DelContentPageByPathBySiteId(
            string path
            , string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_page_del_path_site_id"
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
        public virtual bool DelContentPageByPath(
            string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_page_del_path"
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
        public virtual DataSet GetContentPageList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get"
                , "content_page"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_uuid"
                , "content_page"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_code"
                , "content_page"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_name"
                , "content_page"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListByPath(
            string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_path"
                , "content_page"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListBySiteId(
            string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_site_id"
                , "content_page"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListBySiteIdByPath(
            string site_id
            , string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_site_id_path"
                , "content_page"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountMessage(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_message_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountMessageByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_message_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseMessageListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_message_browse_filter"
                , "message"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetMessageByUuid(string set_type, Message obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_profile_from_name", obj.profile_from_name));
            parameters.Add(new NpgsqlParameter("in_read", obj.read));
            parameters.Add(new NpgsqlParameter("in_profile_from_id", obj.profile_from_id));
            parameters.Add(new NpgsqlParameter("in_profile_to_token", obj.profile_to_token));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_subject", obj.subject));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_profile_to_id", obj.profile_to_id));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_profile_to_name", obj.profile_to_name));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_sent", obj.sent));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_message_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelMessageByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_message_del_uuid"
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
        public virtual DataSet GetMessageList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_message_get"
                , "message"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetMessageListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_message_get_uuid"
                , "message"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOffer(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseOfferListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_browse_filter"
                , "offer"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferByUuid(string set_type, Offer obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_usage_count", obj.usage_count));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_del_uuid"
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
        public virtual bool DelOfferByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_del_org_id"
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
        public virtual DataSet GetOfferList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_get"
                , "offer"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_get_uuid"
                , "offer"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_get_code"
                , "offer"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_get_name"
                , "offer"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_get_org_id"
                , "offer"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferType(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferTypeByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseOfferTypeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_browse_filter"
                , "offer_type"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferTypeByUuid(string set_type, OfferType obj)  {
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
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_type_del_uuid"
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
        public virtual DataSet GetOfferTypeList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_get"
                , "offer_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_get_uuid"
                , "offer_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferTypeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_get_code"
                , "offer_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferTypeListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_get_name"
                , "offer_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocation(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationByOfferId(
            string offer_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_offer_id", offer_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count_offer_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationByCity(
            string city
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_city", city));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count_city"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationByCountryCode(
            string country_code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_country_code", country_code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count_country_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocationByPostalCode(
            string postal_code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_postal_code", postal_code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count_postal_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseOfferLocationListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_browse_filter"
                , "offer_location"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferLocationByUuid(string set_type, OfferLocation obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_fax", obj.fax));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_address1", obj.address1));
            parameters.Add(new NpgsqlParameter("in_twitter", obj.twitter));
            parameters.Add(new NpgsqlParameter("in_phone", obj.phone));
            parameters.Add(new NpgsqlParameter("in_postal_code", obj.postal_code));
            parameters.Add(new NpgsqlParameter("in_offer_id", obj.offer_id));
            parameters.Add(new NpgsqlParameter("in_country_code", obj.country_code));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_state_province", obj.state_province));
            parameters.Add(new NpgsqlParameter("in_city", obj.city));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_dob", obj.dob));
            parameters.Add(new NpgsqlParameter("in_date_start", obj.date_start));
            parameters.Add(new NpgsqlParameter("in_longitude", obj.longitude));
            parameters.Add(new NpgsqlParameter("in_email", obj.email));
            parameters.Add(new NpgsqlParameter("in_date_end", obj.date_end));
            parameters.Add(new NpgsqlParameter("in_latitude", obj.latitude));
            parameters.Add(new NpgsqlParameter("in_facebook", obj.facebook));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_address2", obj.address2));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferLocationByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_location_del_uuid"
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
        public virtual DataSet GetOfferLocationList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get"
                , "offer_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferLocationListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get_uuid"
                , "offer_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferLocationListByOfferId(
            string offer_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_offer_id", offer_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get_offer_id"
                , "offer_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferLocationListByCity(
            string city
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_city", city));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get_city"
                , "offer_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferLocationListByCountryCode(
            string country_code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_country_code", country_code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get_country_code"
                , "offer_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferLocationListByPostalCode(
            string postal_code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_postal_code", postal_code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get_postal_code"
                , "offer_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategory(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_org_id_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseOfferCategoryListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_browse_filter"
                , "offer_category"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryByUuid(string set_type, OfferCategory obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_del_uuid"
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
        public virtual bool DelOfferCategoryByCodeByOrgId(
            string code
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_del_code_org_id"
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
        public virtual bool DelOfferCategoryByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_del_code_org_id_type_id"
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
        public virtual DataSet GetOfferCategoryList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get"
                , "offer_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_uuid"
                , "offer_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_code"
                , "offer_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_name"
                , "offer_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_org_id"
                , "offer_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_type_id"
                , "offer_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_org_id_type_id"
                , "offer_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTree(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeByParentId(
            string parent_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_count_parent_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_count_category_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_count_parent_id_category_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseOfferCategoryTreeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_browse_filter"
                , "offer_category_tree"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryTreeByUuid(string set_type, OfferCategoryTree obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_parent_id", obj.parent_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_category_id", obj.category_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryTreeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_tree_del_uuid"
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
        public virtual bool DelOfferCategoryTreeByParentId(
            string parent_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_tree_del_parent_id"
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
        public virtual bool DelOfferCategoryTreeByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_tree_del_category_id"
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
        public virtual bool DelOfferCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_tree_del_parent_id_category_id"
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
        public virtual DataSet GetOfferCategoryTreeList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_get"
                , "offer_category_tree"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryTreeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_get_uuid"
                , "offer_category_tree"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryTreeListByParentId(
            string parent_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_get_parent_id"
                , "offer_category_tree"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryTreeListByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_get_category_id"
                , "offer_category_tree"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_get_parent_id_category_id"
                , "offer_category_tree"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssoc(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocByOfferId(
            string offer_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_offer_id", offer_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_count_offer_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_count_category_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssocByOfferIdByCategoryId(
            string offer_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_offer_id", offer_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_count_offer_id_category_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseOfferCategoryAssocListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_browse_filter"
                , "offer_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryAssocByUuid(string set_type, OfferCategoryAssoc obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_offer_id", obj.offer_id));
            parameters.Add(new NpgsqlParameter("in_category_id", obj.category_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryAssocByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_assoc_del_uuid"
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
        public virtual DataSet GetOfferCategoryAssocList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_get"
                , "offer_category_assoc"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryAssocListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_get_uuid"
                , "offer_category_assoc"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryAssocListByOfferId(
            string offer_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_offer_id", offer_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_get_offer_id"
                , "offer_category_assoc"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryAssocListByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_get_category_id"
                , "offer_category_assoc"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryAssocListByOfferIdByCategoryId(
            string offer_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_offer_id", offer_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_get_offer_id_category_id"
                , "offer_category_assoc"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocation(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationByGameLocationId(
            string game_location_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_location_id", game_location_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_count_game_location_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationByOfferId(
            string offer_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_offer_id", offer_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_count_offer_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocationByOfferIdByGameLocationId(
            string offer_id
            , string game_location_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_offer_id", offer_id));
            parameters.Add(new NpgsqlParameter("in_game_location_id", game_location_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_count_offer_id_game_location_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseOfferGameLocationListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_browse_filter"
                , "offer_game_location"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferGameLocationByUuid(string set_type, OfferGameLocation obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_game_location_id", obj.game_location_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_offer_id", obj.offer_id));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferGameLocationByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_game_location_del_uuid"
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
        public virtual DataSet GetOfferGameLocationList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_get"
                , "offer_game_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferGameLocationListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_get_uuid"
                , "offer_game_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferGameLocationListByGameLocationId(
            string game_location_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_location_id", game_location_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_get_game_location_id"
                , "offer_game_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferGameLocationListByOfferId(
            string offer_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_offer_id", offer_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_get_offer_id"
                , "offer_game_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferGameLocationListByOfferIdByGameLocationId(
            string offer_id
            , string game_location_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_offer_id", offer_id));
            parameters.Add(new NpgsqlParameter("in_game_location_id", game_location_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_get_offer_id_game_location_id"
                , "offer_game_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfo(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfoByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseEventInfoListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_browse_filter"
                , "event_info"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventInfoByUuid(string set_type, EventInfo obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_usage_count", obj.usage_count));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelEventInfoByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_info_del_uuid"
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
        public virtual bool DelEventInfoByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_info_del_org_id"
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
        public virtual DataSet GetEventInfoList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_get"
                , "event_info"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventInfoListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_get_uuid"
                , "event_info"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventInfoListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_get_code"
                , "event_info"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventInfoListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_get_name"
                , "event_info"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventInfoListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_get_org_id"
                , "event_info"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocation(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationByEventId(
            string event_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_event_id", event_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count_event_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationByCity(
            string city
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_city", city));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count_city"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationByCountryCode(
            string country_code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_country_code", country_code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count_country_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocationByPostalCode(
            string postal_code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_postal_code", postal_code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count_postal_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseEventLocationListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_browse_filter"
                , "event_location"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventLocationByUuid(string set_type, EventLocation obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_fax", obj.fax));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_address1", obj.address1));
            parameters.Add(new NpgsqlParameter("in_twitter", obj.twitter));
            parameters.Add(new NpgsqlParameter("in_phone", obj.phone));
            parameters.Add(new NpgsqlParameter("in_postal_code", obj.postal_code));
            parameters.Add(new NpgsqlParameter("in_country_code", obj.country_code));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_state_province", obj.state_province));
            parameters.Add(new NpgsqlParameter("in_city", obj.city));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_dob", obj.dob));
            parameters.Add(new NpgsqlParameter("in_date_start", obj.date_start));
            parameters.Add(new NpgsqlParameter("in_longitude", obj.longitude));
            parameters.Add(new NpgsqlParameter("in_email", obj.email));
            parameters.Add(new NpgsqlParameter("in_event_id", obj.event_id));
            parameters.Add(new NpgsqlParameter("in_date_end", obj.date_end));
            parameters.Add(new NpgsqlParameter("in_latitude", obj.latitude));
            parameters.Add(new NpgsqlParameter("in_facebook", obj.facebook));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_address2", obj.address2));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelEventLocationByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_location_del_uuid"
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
        public virtual DataSet GetEventLocationList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get"
                , "event_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventLocationListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get_uuid"
                , "event_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventLocationListByEventId(
            string event_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_event_id", event_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get_event_id"
                , "event_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventLocationListByCity(
            string city
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_city", city));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get_city"
                , "event_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventLocationListByCountryCode(
            string country_code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_country_code", country_code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get_country_code"
                , "event_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventLocationListByPostalCode(
            string postal_code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_postal_code", postal_code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get_postal_code"
                , "event_location"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategory(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_org_id_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseEventCategoryListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_browse_filter"
                , "event_category"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryByUuid(string set_type, EventCategory obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_del_uuid"
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
        public virtual bool DelEventCategoryByCodeByOrgId(
            string code
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_del_code_org_id"
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
        public virtual bool DelEventCategoryByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_del_code_org_id_type_id"
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
        public virtual DataSet GetEventCategoryList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get"
                , "event_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_uuid"
                , "event_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_code"
                , "event_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_name"
                , "event_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_org_id"
                , "event_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_type_id"
                , "event_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_org_id_type_id"
                , "event_category"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTree(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeByParentId(
            string parent_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_count_parent_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_count_category_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_count_parent_id_category_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseEventCategoryTreeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_browse_filter"
                , "event_category_tree"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryTreeByUuid(string set_type, EventCategoryTree obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_parent_id", obj.parent_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_category_id", obj.category_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryTreeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_tree_del_uuid"
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
        public virtual bool DelEventCategoryTreeByParentId(
            string parent_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_tree_del_parent_id"
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
        public virtual bool DelEventCategoryTreeByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_tree_del_category_id"
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
        public virtual bool DelEventCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_tree_del_parent_id_category_id"
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
        public virtual DataSet GetEventCategoryTreeList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_get"
                , "event_category_tree"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryTreeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_get_uuid"
                , "event_category_tree"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryTreeListByParentId(
            string parent_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_get_parent_id"
                , "event_category_tree"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryTreeListByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_get_category_id"
                , "event_category_tree"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_get_parent_id_category_id"
                , "event_category_tree"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssoc(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocByEventId(
            string event_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_event_id", event_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_count_event_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_count_category_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssocByEventIdByCategoryId(
            string event_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_event_id", event_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_count_event_id_category_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseEventCategoryAssocListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_browse_filter"
                , "event_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryAssocByUuid(string set_type, EventCategoryAssoc obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_event_id", obj.event_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_category_id", obj.category_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryAssocByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_assoc_del_uuid"
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
        public virtual DataSet GetEventCategoryAssocList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_get"
                , "event_category_assoc"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryAssocListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_get_uuid"
                , "event_category_assoc"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryAssocListByEventId(
            string event_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_event_id", event_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_get_event_id"
                , "event_category_assoc"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryAssocListByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_get_category_id"
                , "event_category_assoc"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryAssocListByEventIdByCategoryId(
            string event_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_event_id", event_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_get_event_id_category_id"
                , "event_category_assoc"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountChannel(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_org_id_type_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseChannelListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_browse_filter"
                , "channel"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetChannelByUuid(string set_type, Channel obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_channel_del_uuid"
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
        public virtual bool DelChannelByCodeByOrgId(
            string code
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_channel_del_code_org_id"
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
        public virtual bool DelChannelByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_channel_del_code_org_id_type_id"
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
        public virtual DataSet GetChannelList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get"
                , "channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_uuid"
                , "channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_code"
                , "channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_name"
                , "channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_org_id"
                , "channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_type_id"
                , "channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_org_id_type_id"
                , "channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountChannelType(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountChannelTypeByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseChannelTypeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_browse_filter"
                , "channel_type"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetChannelTypeByUuid(string set_type, ChannelType obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_channel_type_del_uuid"
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
        public virtual DataSet GetChannelTypeList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_get"
                , "channel_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_get_uuid"
                , "channel_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelTypeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_get_code"
                , "channel_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelTypeListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_get_name"
                , "channel_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountQuestion(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_channel_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_channel_id_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountQuestionByChannelIdByCode(
            string channel_id
            , string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_channel_id_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseQuestionListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_browse_filter"
                , "question"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetQuestionByUuid(string set_type, Question obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_choices", obj.choices));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetQuestionByChannelIdByCode(string set_type, Question obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_choices", obj.choices));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_set_channel_id_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelQuestionByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_question_del_uuid"
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
        public virtual bool DelQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_question_del_channel_id_org_id"
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
        public virtual DataSet GetQuestionList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get"
                , "question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_uuid"
                , "question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_code"
                , "question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_name"
                , "question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByType(
            string type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type", type));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_type"
                , "question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_channel_id"
                , "question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_org_id"
                , "question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_channel_id_org_id"
                , "question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByChannelIdByCode(
            string channel_id
            , string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_channel_id_code"
                , "question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOffer(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOfferByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOfferByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_count_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileOfferListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_browse_filter"
                , "profile_offer"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileOfferByUuid(string set_type, ProfileOffer obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_redeem_code", obj.redeem_code));
            parameters.Add(new NpgsqlParameter("in_offer_id", obj.offer_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_redeemed", obj.redeemed));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileOfferByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_offer_del_uuid"
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
        public virtual bool DelProfileOfferByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_offer_del_profile_id"
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
        public virtual DataSet GetProfileOfferList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_get"
                , "profile_offer"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileOfferListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_get_uuid"
                , "profile_offer"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileOfferListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_get_profile_id"
                , "profile_offer"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileApp(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAppByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileAppByProfileIdByAppId(
            string profile_id
            , string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_count_profile_id_app_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileAppListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_browse_filter"
                , "profile_app"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAppByUuid(string set_type, ProfileApp obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAppByProfileIdByAppId(string set_type, ProfileApp obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_set_profile_id_app_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAppByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_app_del_uuid"
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
        public virtual bool DelProfileAppByProfileIdByAppId(
            string profile_id
            , string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_app_del_profile_id_app_id"
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
        public virtual DataSet GetProfileAppList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_get"
                , "profile_app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAppListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_get_uuid"
                , "profile_app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAppListByAppId(
            string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_get_app_id"
                , "profile_app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAppListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_get_profile_id"
                , "profile_app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAppListByProfileIdByAppId(
            string profile_id
            , string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_get_profile_id_app_id"
                , "profile_app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrg(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrgByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrgByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrgByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_count_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileOrgListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_browse_filter"
                , "profile_org"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileOrgByUuid(string set_type, ProfileOrg obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileOrgByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_org_del_uuid"
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
        public virtual DataSet GetProfileOrgList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_get"
                , "profile_org"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileOrgListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_get_uuid"
                , "profile_org"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileOrgListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_get_org_id"
                , "profile_org"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileOrgListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_get_profile_id"
                , "profile_org"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestion(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_channel_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByQuestionId(
            string question_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_question_id", question_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_question_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_channel_id_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_channel_id_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestionByQuestionIdByProfileId(
            string question_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_question_id", question_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_question_id_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileQuestionListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_browse_filter"
                , "profile_question"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByUuid(string set_type, ProfileQuestion obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_answer", obj.answer));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_question_id", obj.question_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByChannelIdByProfileId(string set_type, ProfileQuestion obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_answer", obj.answer));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_question_id", obj.question_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_set_channel_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByQuestionIdByProfileId(string set_type, ProfileQuestion obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_answer", obj.answer));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_question_id", obj.question_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_set_question_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByChannelIdByQuestionIdByProfileId(string set_type, ProfileQuestion obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_answer", obj.answer));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_question_id", obj.question_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_set_channel_id_question_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileQuestionByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_question_del_uuid"
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
        public virtual bool DelProfileQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_question_del_channel_id_org_id"
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
        public virtual DataSet GetProfileQuestionList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get"
                , "profile_question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_uuid"
                , "profile_question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_channel_id"
                , "profile_question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_org_id"
                , "profile_question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_profile_id"
                , "profile_question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByQuestionId(
            string question_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_question_id", question_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_question_id"
                , "profile_question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_channel_id_org_id"
                , "profile_question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_channel_id_profile_id"
                , "profile_question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByQuestionIdByProfileId(
            string question_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_question_id", question_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_question_id_profile_id"
                , "profile_question"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannel(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_count_channel_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_count_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannelByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_count_channel_id_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileChannelListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_browse_filter"
                , "profile_channel"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileChannelByUuid(string set_type, ProfileChannel obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileChannelByChannelIdByProfileId(string set_type, ProfileChannel obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_set_channel_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileChannelByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_channel_del_uuid"
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
        public virtual bool DelProfileChannelByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_channel_del_channel_id_profile_id"
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
        public virtual DataSet GetProfileChannelList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_get"
                , "profile_channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileChannelListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_get_uuid"
                , "profile_channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileChannelListByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_get_channel_id"
                , "profile_channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileChannelListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_get_profile_id"
                , "profile_channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileChannelListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_get_channel_id_profile_id"
                , "profile_channel"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSite(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteBySiteId(
            string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_count_site_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSiteByOrgIdBySiteId(
            string org_id
            , string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_count_org_id_site_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseOrgSiteListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_browse_filter"
                , "org_site"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgSiteByUuid(string set_type, OrgSite obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_site_id", obj.site_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgSiteByOrgIdBySiteId(string set_type, OrgSite obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_site_id", obj.site_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_set_org_id_site_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgSiteByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_org_site_del_uuid"
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
        public virtual bool DelOrgSiteByOrgIdBySiteId(
            string org_id
            , string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_org_site_del_org_id_site_id"
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
        public virtual DataSet GetOrgSiteList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_get"
                , "org_site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgSiteListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_get_uuid"
                , "org_site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgSiteListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_get_org_id"
                , "org_site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgSiteListBySiteId(
            string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_get_site_id"
                , "org_site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgSiteListByOrgIdBySiteId(
            string org_id
            , string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_get_org_id_site_id"
                , "org_site"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountSiteApp(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppByAppId(
            string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_count_app_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppBySiteId(
            string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_count_site_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountSiteAppByAppIdBySiteId(
            string app_id
            , string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_count_app_id_site_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseSiteAppListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_browse_filter"
                , "site_app"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteAppByUuid(string set_type, SiteApp obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_site_id", obj.site_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteAppByAppIdBySiteId(string set_type, SiteApp obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_site_id", obj.site_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_set_app_id_site_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteAppByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_app_del_uuid"
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
        public virtual bool DelSiteAppByAppIdBySiteId(
            string app_id
            , string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_app_del_app_id_site_id"
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
        public virtual DataSet GetSiteAppList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_get"
                , "site_app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteAppListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_get_uuid"
                , "site_app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteAppListByAppId(
            string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_get_app_id"
                , "site_app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteAppListBySiteId(
            string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_get_site_id"
                , "site_app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteAppListByAppIdBySiteId(
            string app_id
            , string site_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
            parameters.Add(new NpgsqlParameter("in_site_id", site_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_get_app_id_site_id"
                , "site_app"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountPhoto(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count_external_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count_url"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count_url_external_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountPhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count_uuid_external_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowsePhotoListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_browse_filter"
                , "photo"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUuid(string set_type, Photo obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByExternalId(string set_type, Photo obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_set_external_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUrl(string set_type, Photo obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_set_url"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUrlByExternalId(string set_type, Photo obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_set_url_external_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUuidByExternalId(string set_type, Photo obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_set_uuid_external_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_photo_del_uuid"
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
        public virtual bool DelPhotoByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_photo_del_external_id"
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
        public virtual bool DelPhotoByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_photo_del_url"
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
        public virtual bool DelPhotoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_photo_del_url_external_id"
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
        public virtual bool DelPhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_photo_del_uuid_external_id"
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
        public virtual DataSet GetPhotoList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get"
                , "photo"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPhotoListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get_uuid"
                , "photo"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPhotoListByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get_external_id"
                , "photo"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPhotoListByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get_url"
                , "photo"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPhotoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get_url_external_id"
                , "photo"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPhotoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get_uuid_external_id"
                , "photo"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountVideo(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count_external_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count_url"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count_url_external_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count_uuid_external_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseVideoListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_browse_filter"
                , "video"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUuid(string set_type, Video obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByExternalId(string set_type, Video obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_set_external_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUrl(string set_type, Video obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_set_url"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUrlByExternalId(string set_type, Video obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_set_url_external_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUuidByExternalId(string set_type, Video obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_set_uuid_external_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_video_del_uuid"
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
        public virtual bool DelVideoByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_video_del_external_id"
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
        public virtual bool DelVideoByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_video_del_url"
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
        public virtual bool DelVideoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_video_del_url_external_id"
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
        public virtual bool DelVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_video_del_uuid_external_id"
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
        public virtual DataSet GetVideoList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get"
                , "video"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetVideoListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get_uuid"
                , "video"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetVideoListByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get_external_id"
                , "video"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetVideoListByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get_url"
                , "video"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetVideoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get_url_external_id"
                , "video"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetVideoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get_uuid_external_id"
                , "video"
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






