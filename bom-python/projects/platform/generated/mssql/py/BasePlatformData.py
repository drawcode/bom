import ent
from ent import *

class BasePlatformData(object):

    def __init__(self):
        self.connection_string = ''




"""

using System;
using System.Data;
using System.Data.SqlClient;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.config;
using ah.core.data;
using ah.core.data.mssql;

using log4net;

using platform;
using platform.ent;

namespace platform {

    public class BasePlatformData {
    
	private static readonly log4net.ILog log = log4net.LogManager.GetLogger("main");
    
        DataProviderMSSQL data = new DataProviderMSSQL();
        
        public static string connectionString = CoreConfig.GetConnectionStringByName("platform");
                
        public BasePlatformData(){
        }
        
//------------------------------------------------------------------------------                    
        public virtual int CountApp(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_by_code"
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
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_by_type_id"
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
             code
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_by_code_by_type_id"
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
             platform
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_by_platform_by_type_id"
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
             platform
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@platform", platform));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_count_by_platform"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_browse_by_filter"
                , "app"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppByUuid(string set_type, App obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetAppByCode(string set_type, App obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_set_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelAppByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_app_del_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_app_del_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_by_uuid"
                , "app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_by_code"
                , "app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByTypeId(
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_by_type_id"
                , "app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByCodeByTypeId(
             code
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_by_code_by_type_id"
                , "app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByPlatformByTypeId(
             platform
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_by_platform_by_type_id"
                , "app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppListByPlatform(
             platform
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@platform", platform));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_get_by_platform"
                , "app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountAppType(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_count_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_browse_by_filter"
                , "app_type"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetAppTypeByUuid(string set_type, AppType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetAppTypeByCode(string set_type, AppType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_set_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelAppTypeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_app_type_del_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_app_type_del_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppTypeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_get_by_uuid"
                , "app_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetAppTypeListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_app_type_get_by_code"
                , "app_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountSite(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_by_code"
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
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_by_type_id"
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
             code
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_by_code_by_type_id"
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
             domain
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@domain", domain));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_by_domain_by_type_id"
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
             domain
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@domain", domain));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_count_by_domain"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_browse_by_filter"
                , "site"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteByUuid(string set_type, Site obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@domain", obj.domain));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteByCode(string set_type, Site obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@domain", obj.domain));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_set_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_del_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_del_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_by_uuid"
                , "site"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_by_code"
                , "site"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByTypeId(
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_by_type_id"
                , "site"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByCodeByTypeId(
             code
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_by_code_by_type_id"
                , "site"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByDomainByTypeId(
             domain
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@domain", domain));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_by_domain_by_type_id"
                , "site"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteListByDomain(
             domain
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@domain", domain));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_get_by_domain"
                , "site"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountSiteType(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_count_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_browse_by_filter"
                , "site_type"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteTypeByUuid(string set_type, SiteType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteTypeByCode(string set_type, SiteType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_set_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteTypeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_type_del_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_type_del_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteTypeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_get_by_uuid"
                , "site_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteTypeListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_type_get_by_code"
                , "site_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOrg(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_count_by_name"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_browse_by_filter"
                , "org"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgByUuid(string set_type, Org obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_org_del_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_get_by_uuid"
                , "org"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_get_by_code"
                , "org"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_get_by_name"
                , "org"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOrgType(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_count_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_browse_by_filter"
                , "org_type"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgTypeByUuid(string set_type, OrgType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgTypeByCode(string set_type, OrgType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_set_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgTypeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_org_type_del_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_org_type_del_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgTypeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_get_by_uuid"
                , "org_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgTypeListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_type_get_by_code"
                , "org_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountContentItem(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_count_by_name"
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
             path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@path", path));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_count_by_path"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_browse_by_filter"
                , "content_item"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemByUuid(string set_type, ContentItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@date_end", obj.date_end));
            parameters.Add(new SqlParameter("@date_start", obj.date_start));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_item_del_by_uuid"
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
             path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@path", path));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_item_del_by_path"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_get_by_uuid"
                , "content_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_get_by_code"
                , "content_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_get_by_name"
                , "content_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemListByPath(
             path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@path", path));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_get_by_path"
                , "content_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountContentItemType(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_count_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_browse_by_filter"
                , "content_item_type"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemTypeByUuid(string set_type, ContentItemType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetContentItemTypeByCode(string set_type, ContentItemType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_set_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelContentItemTypeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_item_type_del_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_item_type_del_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemTypeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_get_by_uuid"
                , "content_item_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentItemTypeListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_item_type_get_by_code"
                , "content_item_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountContentPage(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_count_by_name"
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
             path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@path", path));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_count_by_path"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_browse_by_filter"
                , "content_page"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetContentPageByUuid(string set_type, ContentPage obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_end", obj.date_end));
            parameters.Add(new SqlParameter("@date_start", obj.date_start));
            parameters.Add(new SqlParameter("@site_id", obj.site_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@template", obj.template));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelContentPageByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_page_del_by_uuid"
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
             path
            ,  site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_page_del_by_path_by_site_id"
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
             path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@path", path));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_content_page_del_by_path"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_by_uuid"
                , "content_page"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_by_code"
                , "content_page"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_by_name"
                , "content_page"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListByPath(
             path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@path", path));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_by_path"
                , "content_page"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListBySiteId(
             site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_by_site_id"
                , "content_page"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetContentPageListBySiteIdByPath(
             site_id
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@site_id", site_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_content_page_get_by_site_id_by_path"
                , "content_page"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountMessage(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_message_count_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_message_browse_by_filter"
                , "message"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetMessageByUuid(string set_type, Message obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@profile_from_name", obj.profile_from_name));
            parameters.Add(new SqlParameter("@read", obj.read));
            parameters.Add(new SqlParameter("@profile_from_id", obj.profile_from_id));
            parameters.Add(new SqlParameter("@profile_to_token", obj.profile_to_token));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@subject", obj.subject));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@profile_to_id", obj.profile_to_id));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@profile_to_name", obj.profile_to_name));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@sent", obj.sent));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_message_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelMessageByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_message_del_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetMessageListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_message_get_by_uuid"
                , "message"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGame(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_by_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_by_org_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_by_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameByOrgIdByAppId(
             org_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_by_org_id_by_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_browse_by_filter"
                , "game"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByUuid(string set_type, Game obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByCode(string set_type, Game obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByName(string set_type, Game obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_by_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByOrgId(string set_type, Game obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_by_org_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByAppId(string set_type, Game obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_by_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByOrgIdByAppId(string set_type, Game obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_by_org_id_by_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_by_uuid"
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
        public virtual bool DelGameByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_by_code"
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
        public virtual bool DelGameByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_by_name"
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
        public virtual bool DelGameByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_by_org_id"
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
        public virtual bool DelGameByAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_by_app_id"
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
        public virtual bool DelGameByOrgIdByAppId(
             org_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_by_org_id_by_app_id"
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
        public virtual DataSet GetGameList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get"
                , "game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_by_uuid"
                , "game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_by_code"
                , "game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_by_name"
                , "game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_by_org_id"
                , "game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_by_app_id"
                , "game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByOrgIdByAppId(
             org_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_by_org_id_by_app_id"
                , "game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategory(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_by_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_by_org_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByTypeId(
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_by_type_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryByOrgIdByTypeId(
             org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_by_org_id_by_type_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameCategoryListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_browse_by_filter"
                , "game_category"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryByUuid(string set_type, GameCategory obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_del_by_uuid"
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
        public virtual bool DelGameCategoryByCodeByOrgId(
             code
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_del_by_code_by_org_id"
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
        public virtual bool DelGameCategoryByCodeByOrgIdByTypeId(
             code
            ,  org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_del_by_code_by_org_id_by_type_id"
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
        public virtual DataSet GetGameCategoryList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get"
                , "game_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_by_uuid"
                , "game_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_by_code"
                , "game_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_by_name"
                , "game_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_by_org_id"
                , "game_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByTypeId(
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_by_type_id"
                , "game_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByOrgIdByTypeId(
             org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_by_org_id_by_type_id"
                , "game_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTree(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeByParentId(
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_count_by_parent_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeByCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_count_by_category_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeByParentIdByCategoryId(
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_count_by_parent_id_by_category_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameCategoryTreeListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_browse_by_filter"
                , "game_category_tree"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryTreeByUuid(string set_type, GameCategoryTree obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@parent_id", obj.parent_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@category_id", obj.category_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_tree_del_by_uuid"
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
        public virtual bool DelGameCategoryTreeByParentId(
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_tree_del_by_parent_id"
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
        public virtual bool DelGameCategoryTreeByCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_tree_del_by_category_id"
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
        public virtual bool DelGameCategoryTreeByParentIdByCategoryId(
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_tree_del_by_parent_id_by_category_id"
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
        public virtual DataSet GetGameCategoryTreeList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_get"
                , "game_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryTreeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_get_by_uuid"
                , "game_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryTreeListByParentId(
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_get_by_parent_id"
                , "game_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryTreeListByCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_get_by_category_id"
                , "game_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryTreeListByParentIdByCategoryId(
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_get_by_parent_id_by_category_id"
                , "game_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssoc(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocByCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_count_by_category_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocByGameIdByCategoryId(
             game_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_count_by_game_id_by_category_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameCategoryAssocListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_browse_by_filter"
                , "game_category_assoc"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryAssocByUuid(string set_type, GameCategoryAssoc obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@category_id", obj.category_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryAssocByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_assoc_del_by_uuid"
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
        public virtual DataSet GetGameCategoryAssocList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_get"
                , "game_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryAssocListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_get_by_uuid"
                , "game_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryAssocListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_get_by_game_id"
                , "game_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryAssocListByCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_get_by_category_id"
                , "game_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryAssocListByGameIdByCategoryId(
             game_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_get_by_game_id_by_category_id"
                , "game_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameType(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameTypeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameTypeByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_count_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameTypeByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_count_by_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameTypeListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_browse_by_filter"
                , "game_type"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameTypeByUuid(string set_type, GameType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameTypeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_type_del_by_uuid"
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
        public virtual DataSet GetGameTypeList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_get"
                , "game_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameTypeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_get_by_uuid"
                , "game_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameTypeListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_get_by_code"
                , "game_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameTypeListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_get_by_name"
                , "game_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGame(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_count_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_count_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileGameListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_browse_by_filter"
                , "profile_game"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameByUuid(string set_type, ProfileGame obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@game_profile", obj.game_profile));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@profile_version", obj.profile_version));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_del_by_uuid"
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
        public virtual DataSet GetProfileGameList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_get"
                , "profile_game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_get_by_uuid"
                , "profile_game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_get_by_game_id"
                , "profile_game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameListByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_get_by_profile_id"
                , "profile_game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameListByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_get_by_profile_id_by_game_id"
                , "profile_game"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetwork(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileGameNetworkListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_browse_by_filter"
                , "profile_game_network"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkByUuid(string set_type, ProfileGameNetwork obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@game_network_id", obj.game_network_id));
            parameters.Add(new SqlParameter("@network_username", obj.network_username));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@secret", obj.secret));
            parameters.Add(new SqlParameter("@token", obj.token));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_network_del_by_uuid"
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
        public virtual DataSet GetProfileGameNetworkList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get"
                , "profile_game_network"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameNetworkListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_by_uuid"
                , "profile_game_network"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameNetworkListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_by_game_id"
                , "profile_game_network"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameNetworkListByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_by_profile_id"
                , "profile_game_network"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameNetworkListByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_by_profile_id_by_game_id"
                , "profile_game_network"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttribute(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttributeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttributeByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_count_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttributeByProfileIdByGameIdByCode(
             profile_id
            ,  game_id
            ,  code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_count_by_profile_id_by_game_id_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileGameDataAttributeListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_browse_by_filter"
                , "profile_game_data_attribute"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeByUuid(string set_type, ProfileGameDataAttribute obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@val", obj.val));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@otype", obj.otype));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@name", obj.name));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeByProfileId(string set_type, ProfileGameDataAttribute obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@val", obj.val));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@otype", obj.otype));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@name", obj.name));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_set_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeByProfileIdByGameIdByCode(string set_type, ProfileGameDataAttribute obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@val", obj.val));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@otype", obj.otype));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@name", obj.name));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_set_by_profile_id_by_game_id_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameDataAttributeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_data_attribute_del_by_uuid"
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
        public virtual bool DelProfileGameDataAttributeByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_data_attribute_del_by_profile_id"
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
        public virtual bool DelProfileGameDataAttributeByProfileIdByGameIdByCode(
             profile_id
            ,  game_id
            ,  code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_data_attribute_del_by_profile_id_by_game_id_by_code"
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
        public virtual DataSet GetProfileGameDataAttributeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_get_by_uuid"
                , "profile_game_data_attribute"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameDataAttributeListByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_get_by_profile_id"
                , "profile_game_data_attribute"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
             profile_id
            ,  game_id
            ,  code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_get_by_profile_id_by_game_id_by_code"
                , "profile_game_data_attribute"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameSession(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_count_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_count_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameSessionListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_browse_by_filter"
                , "game_session"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameSessionByUuid(string set_type, GameSession obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@network_uuid", obj.network_uuid));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@game_area", obj.game_area));
            parameters.Add(new SqlParameter("@profile_network", obj.profile_network));
            parameters.Add(new SqlParameter("@profile_device", obj.profile_device));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@network_external_port", obj.network_external_port));
            parameters.Add(new SqlParameter("@game_players_connected", obj.game_players_connected));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@game_state", obj.game_state));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@network_external_ip", obj.network_external_ip));
            parameters.Add(new SqlParameter("@game_level", obj.game_level));
            parameters.Add(new SqlParameter("@profile_username", obj.profile_username));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_code", obj.game_code));
            parameters.Add(new SqlParameter("@game_player_z", obj.game_player_z));
            parameters.Add(new SqlParameter("@game_player_x", obj.game_player_x));
            parameters.Add(new SqlParameter("@network_port", obj.network_port));
            parameters.Add(new SqlParameter("@game_players_allowed", obj.game_players_allowed));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@network_ip", obj.network_ip));
            parameters.Add(new SqlParameter("@network_use_nat", obj.network_use_nat));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameSessionByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_session_del_by_uuid"
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
        public virtual DataSet GetGameSessionList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_get"
                , "game_session"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameSessionListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_get_by_uuid"
                , "game_session"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameSessionListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_get_by_game_id"
                , "game_session"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameSessionListByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_get_by_profile_id"
                , "game_session"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameSessionListByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_get_by_profile_id_by_game_id"
                , "game_session"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionData(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_data_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionDataByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_data_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameSessionDataListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_data_browse_by_filter"
                , "game_session_data"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameSessionDataByUuid(string set_type, GameSessionData obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data_results", obj.data_results));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@data_layer_projectile", obj.data_layer_projectile));
            parameters.Add(new SqlParameter("@data_layer_actors", obj.data_layer_actors));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@data_layer_enemy", obj.data_layer_enemy));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_data_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameSessionDataByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_session_data_del_by_uuid"
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
        public virtual DataSet GetGameSessionDataList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_data_get"
                , "game_session_data"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameSessionDataListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_data_get_by_uuid"
                , "game_session_data"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameContent(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentByGameIdByPath(
             game_id
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count_by_game_id_by_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentByGameIdByPathByVersion(
             game_id
            ,  path
            ,  version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count_by_game_id_by_path_by_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
             game_id
            ,  path
            ,  version
            ,  platform
            ,  increment
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@increment", increment));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count_by_game_id_by_path_by_version_by_platform_by_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameContentListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_browse_by_filter"
                , "game_content"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByUuid(string set_type, GameContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameId(string set_type, GameContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_set_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameIdByPath(string set_type, GameContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_set_by_game_id_by_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameIdByPathByVersion(string set_type, GameContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_set_by_game_id_by_path_by_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameIdByPathByVersionByPlatformByIncrement(string set_type, GameContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_set_by_game_id_by_path_by_version_by_platform_by_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_content_del_by_uuid"
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
        public virtual bool DelGameContentByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_content_del_by_game_id"
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
        public virtual bool DelGameContentByGameIdByPath(
             game_id
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_content_del_by_game_id_by_path"
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
        public virtual bool DelGameContentByGameIdByPathByVersion(
             game_id
            ,  path
            ,  version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_content_del_by_game_id_by_path_by_version"
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
        public virtual bool DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
             game_id
            ,  path
            ,  version
            ,  platform
            ,  increment
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@increment", increment));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_content_del_by_game_id_by_path_by_version_by_platform_by_increment"
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
        public virtual DataSet GetGameContentList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get"
                , "game_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameContentListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get_by_uuid"
                , "game_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameContentListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get_by_game_id"
                , "game_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameContentListByGameIdByPath(
             game_id
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get_by_game_id_by_path"
                , "game_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameContentListByGameIdByPathByVersion(
             game_id
            ,  path
            ,  version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get_by_game_id_by_path_by_version"
                , "game_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
             game_id
            ,  path
            ,  version
            ,  platform
            ,  increment
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@increment", increment));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get_by_game_id_by_path_by_version_by_platform_by_increment"
                , "game_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContent(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByProfileId(
             game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_by_game_id_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByUsername(
             game_id
            ,  username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_by_game_id_by_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByUsername(
             username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@username", username));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_by_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByProfileIdByPath(
             game_id
            ,  profile_id
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_by_game_id_by_profile_id_by_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByProfileIdByPathByVersion(
             game_id
            ,  profile_id
            ,  path
            ,  version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_by_game_id_by_profile_id_by_path_by_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
             game_id
            ,  profile_id
            ,  path
            ,  version
            ,  platform
            ,  increment
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@increment", increment));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByUsernameByPath(
             game_id
            ,  username
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_by_game_id_by_username_by_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByUsernameByPathByVersion(
             game_id
            ,  username
            ,  path
            ,  version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_by_game_id_by_username_by_path_by_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
             game_id
            ,  username
            ,  path
            ,  version
            ,  platform
            ,  increment
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@increment", increment));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_by_game_id_by_username_by_path_by_version_by_platform_by_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProfileContentListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_browse_by_filter"
                , "game_profile_content"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByUuid(string set_type, GameProfileContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@game_network", obj.game_network));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileId(string set_type, GameProfileContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@game_network", obj.game_network));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_by_game_id_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsername(string set_type, GameProfileContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@game_network", obj.game_network));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_by_game_id_by_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByUsername(string set_type, GameProfileContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@game_network", obj.game_network));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_by_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPath(string set_type, GameProfileContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@game_network", obj.game_network));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_by_game_id_by_profile_id_by_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersion(string set_type, GameProfileContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@game_network", obj.game_network));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_by_game_id_by_profile_id_by_path_by_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(string set_type, GameProfileContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@game_network", obj.game_network));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPath(string set_type, GameProfileContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@game_network", obj.game_network));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_by_game_id_by_username_by_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersion(string set_type, GameProfileContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@game_network", obj.game_network));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_by_game_id_by_username_by_path_by_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(string set_type, GameProfileContent obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@increment", obj.increment));
            parameters.Add(new SqlParameter("@path", obj.path));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@platform", obj.platform));
            parameters.Add(new SqlParameter("@filename", obj.filename));
            parameters.Add(new SqlParameter("@source", obj.source));
            parameters.Add(new SqlParameter("@version", obj.version));
            parameters.Add(new SqlParameter("@game_network", obj.game_network));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@hash", obj.hash));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@extension", obj.extension));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_by_game_id_by_username_by_path_by_version_by_platform_by_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_by_uuid"
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
        public virtual bool DelGameProfileContentByGameIdByProfileId(
             game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_by_game_id_by_profile_id"
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
        public virtual bool DelGameProfileContentByGameIdByUsername(
             game_id
            ,  username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_by_game_id_by_username"
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
        public virtual bool DelGameProfileContentByUsername(
             username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@username", username));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_by_username"
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
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPath(
             game_id
            ,  profile_id
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_by_game_id_by_profile_id_by_path"
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
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPathByVersion(
             game_id
            ,  profile_id
            ,  path
            ,  version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_by_game_id_by_profile_id_by_path_by_version"
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
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
             game_id
            ,  profile_id
            ,  path
            ,  version
            ,  platform
            ,  increment
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@increment", increment));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment"
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
        public virtual bool DelGameProfileContentByGameIdByUsernameByPath(
             game_id
            ,  username
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_by_game_id_by_username_by_path"
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
        public virtual bool DelGameProfileContentByGameIdByUsernameByPathByVersion(
             game_id
            ,  username
            ,  path
            ,  version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_by_game_id_by_username_by_path_by_version"
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
        public virtual bool DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
             game_id
            ,  username
            ,  path
            ,  version
            ,  platform
            ,  increment
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@increment", increment));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_by_game_id_by_username_by_path_by_version_by_platform_by_increment"
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
        public virtual DataSet GetGameProfileContentList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_by_uuid"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByProfileId(
             game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_by_game_id_by_profile_id"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByUsername(
             game_id
            ,  username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_by_game_id_by_username"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByUsername(
             username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@username", username));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_by_username"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByProfileIdByPath(
             game_id
            ,  profile_id
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_by_game_id_by_profile_id_by_path"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
             game_id
            ,  profile_id
            ,  path
            ,  version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_by_game_id_by_profile_id_by_path_by_version"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
             game_id
            ,  profile_id
            ,  path
            ,  version
            ,  platform
            ,  increment
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@increment", increment));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_by_game_id_by_profile_id_by_path_by_version_by_platform_by_increment"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByUsernameByPath(
             game_id
            ,  username
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_by_game_id_by_username_by_path"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByUsernameByPathByVersion(
             game_id
            ,  username
            ,  path
            ,  version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_by_game_id_by_username_by_path_by_version"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
             game_id
            ,  username
            ,  path
            ,  version
            ,  platform
            ,  increment
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            parameters.Add(new SqlParameter("@platform", platform));
            parameters.Add(new SqlParameter("@increment", increment));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_by_game_id_by_username_by_path_by_version_by_platform_by_increment"
                , "game_profile_content"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameApp(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppByAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_count_by_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppByGameIdByAppId(
             game_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_count_by_game_id_by_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameAppListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_browse_by_filter"
                , "game_app"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAppByUuid(string set_type, GameApp obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAppByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_app_del_by_uuid"
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
        public virtual DataSet GetGameAppList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_get"
                , "game_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAppListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_get_by_uuid"
                , "game_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAppListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_get_by_game_id"
                , "game_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAppListByAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_get_by_app_id"
                , "game_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAppListByGameIdByAppId(
             game_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_get_by_game_id_by_app_id"
                , "game_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOffer(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_count_by_name"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_count_by_org_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_browse_by_filter"
                , "offer"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferByUuid(string set_type, Offer obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@usage_count", obj.usage_count));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_del_by_uuid"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_del_by_org_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_get_by_uuid"
                , "offer"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_get_by_code"
                , "offer"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_get_by_name"
                , "offer"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_get_by_org_id"
                , "offer"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferType(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_count_by_name"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_browse_by_filter"
                , "offer_type"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferTypeByUuid(string set_type, OfferType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferTypeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_type_del_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferTypeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_get_by_uuid"
                , "offer_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferTypeListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_get_by_code"
                , "offer_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferTypeListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_type_get_by_name"
                , "offer_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferLocation(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count_by_uuid"
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
             offer_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@offer_id", offer_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count_by_offer_id"
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
             city
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@city", city));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count_by_city"
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
             country_code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@country_code", country_code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count_by_country_code"
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
             postal_code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@postal_code", postal_code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_count_by_postal_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_browse_by_filter"
                , "offer_location"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferLocationByUuid(string set_type, OfferLocation obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@fax", obj.fax));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@address1", obj.address1));
            parameters.Add(new SqlParameter("@twitter", obj.twitter));
            parameters.Add(new SqlParameter("@phone", obj.phone));
            parameters.Add(new SqlParameter("@postal_code", obj.postal_code));
            parameters.Add(new SqlParameter("@offer_id", obj.offer_id));
            parameters.Add(new SqlParameter("@country_code", obj.country_code));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@state_province", obj.state_province));
            parameters.Add(new SqlParameter("@city", obj.city));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@dob", obj.dob));
            parameters.Add(new SqlParameter("@date_start", obj.date_start));
            parameters.Add(new SqlParameter("@longitude", obj.longitude));
            parameters.Add(new SqlParameter("@email", obj.email));
            parameters.Add(new SqlParameter("@date_end", obj.date_end));
            parameters.Add(new SqlParameter("@latitude", obj.latitude));
            parameters.Add(new SqlParameter("@facebook", obj.facebook));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@address2", obj.address2));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferLocationByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_location_del_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferLocationListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get_by_uuid"
                , "offer_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferLocationListByOfferId(
             offer_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@offer_id", offer_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get_by_offer_id"
                , "offer_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferLocationListByCity(
             city
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@city", city));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get_by_city"
                , "offer_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferLocationListByCountryCode(
             country_code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@country_code", country_code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get_by_country_code"
                , "offer_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferLocationListByPostalCode(
             postal_code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@postal_code", postal_code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_location_get_by_postal_code"
                , "offer_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategory(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_by_name"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_by_org_id"
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
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_by_type_id"
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
             org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_count_by_org_id_by_type_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_browse_by_filter"
                , "offer_category"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryByUuid(string set_type, OfferCategory obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_del_by_uuid"
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
             code
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_del_by_code_by_org_id"
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
             code
            ,  org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_del_by_code_by_org_id_by_type_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_by_uuid"
                , "offer_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_by_code"
                , "offer_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_by_name"
                , "offer_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_by_org_id"
                , "offer_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByTypeId(
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_by_type_id"
                , "offer_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryListByOrgIdByTypeId(
             org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_get_by_org_id_by_type_id"
                , "offer_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryTree(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_count_by_uuid"
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
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_count_by_parent_id"
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
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_count_by_category_id"
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
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_count_by_parent_id_by_category_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_browse_by_filter"
                , "offer_category_tree"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryTreeByUuid(string set_type, OfferCategoryTree obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@parent_id", obj.parent_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@category_id", obj.category_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryTreeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_tree_del_by_uuid"
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
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_tree_del_by_parent_id"
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
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_tree_del_by_category_id"
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
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_tree_del_by_parent_id_by_category_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryTreeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_get_by_uuid"
                , "offer_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryTreeListByParentId(
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_get_by_parent_id"
                , "offer_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryTreeListByCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_get_by_category_id"
                , "offer_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryTreeListByParentIdByCategoryId(
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_tree_get_by_parent_id_by_category_id"
                , "offer_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferCategoryAssoc(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_count_by_uuid"
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
             offer_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@offer_id", offer_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_count_by_offer_id"
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
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_count_by_category_id"
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
             offer_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@offer_id", offer_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_count_by_offer_id_by_category_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_browse_by_filter"
                , "offer_category_assoc"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferCategoryAssocByUuid(string set_type, OfferCategoryAssoc obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@offer_id", obj.offer_id));
            parameters.Add(new SqlParameter("@category_id", obj.category_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferCategoryAssocByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_category_assoc_del_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryAssocListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_get_by_uuid"
                , "offer_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryAssocListByOfferId(
             offer_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@offer_id", offer_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_get_by_offer_id"
                , "offer_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryAssocListByCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_get_by_category_id"
                , "offer_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferCategoryAssocListByOfferIdByCategoryId(
             offer_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@offer_id", offer_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_category_assoc_get_by_offer_id_by_category_id"
                , "offer_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOfferGameLocation(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_count_by_uuid"
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
             game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_count_by_game_location_id"
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
             offer_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@offer_id", offer_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_count_by_offer_id"
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
             offer_id
            ,  game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@offer_id", offer_id));
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_count_by_offer_id_by_game_location_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_browse_by_filter"
                , "offer_game_location"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOfferGameLocationByUuid(string set_type, OfferGameLocation obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@game_location_id", obj.game_location_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@offer_id", obj.offer_id));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOfferGameLocationByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_offer_game_location_del_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferGameLocationListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_get_by_uuid"
                , "offer_game_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferGameLocationListByGameLocationId(
             game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_get_by_game_location_id"
                , "offer_game_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferGameLocationListByOfferId(
             offer_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@offer_id", offer_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_get_by_offer_id"
                , "offer_game_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOfferGameLocationListByOfferIdByGameLocationId(
             offer_id
            ,  game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@offer_id", offer_id));
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_offer_game_location_get_by_offer_id_by_game_location_id"
                , "offer_game_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountEventInfo(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_count_by_name"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_count_by_org_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_browse_by_filter"
                , "event_info"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventInfoByUuid(string set_type, EventInfo obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@usage_count", obj.usage_count));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelEventInfoByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_info_del_by_uuid"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_info_del_by_org_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventInfoListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_get_by_uuid"
                , "event_info"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventInfoListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_get_by_code"
                , "event_info"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventInfoListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_get_by_name"
                , "event_info"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventInfoListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_info_get_by_org_id"
                , "event_info"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountEventLocation(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count_by_uuid"
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
             event_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@event_id", event_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count_by_event_id"
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
             city
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@city", city));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count_by_city"
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
             country_code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@country_code", country_code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count_by_country_code"
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
             postal_code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@postal_code", postal_code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_count_by_postal_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_browse_by_filter"
                , "event_location"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventLocationByUuid(string set_type, EventLocation obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@fax", obj.fax));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@address1", obj.address1));
            parameters.Add(new SqlParameter("@twitter", obj.twitter));
            parameters.Add(new SqlParameter("@phone", obj.phone));
            parameters.Add(new SqlParameter("@postal_code", obj.postal_code));
            parameters.Add(new SqlParameter("@country_code", obj.country_code));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@state_province", obj.state_province));
            parameters.Add(new SqlParameter("@city", obj.city));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@dob", obj.dob));
            parameters.Add(new SqlParameter("@date_start", obj.date_start));
            parameters.Add(new SqlParameter("@longitude", obj.longitude));
            parameters.Add(new SqlParameter("@email", obj.email));
            parameters.Add(new SqlParameter("@event_id", obj.event_id));
            parameters.Add(new SqlParameter("@date_end", obj.date_end));
            parameters.Add(new SqlParameter("@latitude", obj.latitude));
            parameters.Add(new SqlParameter("@facebook", obj.facebook));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@address2", obj.address2));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelEventLocationByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_location_del_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventLocationListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get_by_uuid"
                , "event_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventLocationListByEventId(
             event_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@event_id", event_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get_by_event_id"
                , "event_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventLocationListByCity(
             city
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@city", city));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get_by_city"
                , "event_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventLocationListByCountryCode(
             country_code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@country_code", country_code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get_by_country_code"
                , "event_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventLocationListByPostalCode(
             postal_code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@postal_code", postal_code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_location_get_by_postal_code"
                , "event_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategory(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_by_name"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_by_org_id"
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
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_by_type_id"
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
             org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_count_by_org_id_by_type_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_browse_by_filter"
                , "event_category"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryByUuid(string set_type, EventCategory obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_del_by_uuid"
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
             code
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_del_by_code_by_org_id"
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
             code
            ,  org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_del_by_code_by_org_id_by_type_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_by_uuid"
                , "event_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_by_code"
                , "event_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_by_name"
                , "event_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_by_org_id"
                , "event_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByTypeId(
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_by_type_id"
                , "event_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryListByOrgIdByTypeId(
             org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_get_by_org_id_by_type_id"
                , "event_category"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryTree(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_count_by_uuid"
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
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_count_by_parent_id"
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
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_count_by_category_id"
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
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_count_by_parent_id_by_category_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_browse_by_filter"
                , "event_category_tree"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryTreeByUuid(string set_type, EventCategoryTree obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@parent_id", obj.parent_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@category_id", obj.category_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryTreeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_tree_del_by_uuid"
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
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_tree_del_by_parent_id"
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
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_tree_del_by_category_id"
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
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_tree_del_by_parent_id_by_category_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryTreeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_get_by_uuid"
                , "event_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryTreeListByParentId(
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_get_by_parent_id"
                , "event_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryTreeListByCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_get_by_category_id"
                , "event_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryTreeListByParentIdByCategoryId(
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_tree_get_by_parent_id_by_category_id"
                , "event_category_tree"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountEventCategoryAssoc(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_count_by_uuid"
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
             event_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@event_id", event_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_count_by_event_id"
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
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_count_by_category_id"
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
             event_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@event_id", event_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_count_by_event_id_by_category_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_browse_by_filter"
                , "event_category_assoc"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetEventCategoryAssocByUuid(string set_type, EventCategoryAssoc obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@event_id", obj.event_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@category_id", obj.category_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelEventCategoryAssocByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_event_category_assoc_del_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryAssocListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_get_by_uuid"
                , "event_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryAssocListByEventId(
             event_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@event_id", event_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_get_by_event_id"
                , "event_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryAssocListByCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_get_by_category_id"
                , "event_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetEventCategoryAssocListByEventIdByCategoryId(
             event_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@event_id", event_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_event_category_assoc_get_by_event_id_by_category_id"
                , "event_category_assoc"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountChannel(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_by_name"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_by_org_id"
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
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_by_type_id"
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
             org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_count_by_org_id_by_type_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_browse_by_filter"
                , "channel"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetChannelByUuid(string set_type, Channel obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_channel_del_by_uuid"
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
             code
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_channel_del_by_code_by_org_id"
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
             code
            ,  org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_channel_del_by_code_by_org_id_by_type_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_by_uuid"
                , "channel"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_by_code"
                , "channel"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_by_name"
                , "channel"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_by_org_id"
                , "channel"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByTypeId(
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_by_type_id"
                , "channel"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelListByOrgIdByTypeId(
             org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_get_by_org_id_by_type_id"
                , "channel"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountChannelType(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_count_by_name"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_browse_by_filter"
                , "channel_type"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetChannelTypeByUuid(string set_type, ChannelType obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelChannelTypeByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_channel_type_del_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelTypeListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_get_by_uuid"
                , "channel_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelTypeListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_get_by_code"
                , "channel_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetChannelTypeListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_channel_type_get_by_name"
                , "channel_type"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountQuestion(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_by_uuid"
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
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_by_code"
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
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_by_name"
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
             channel_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_by_channel_id"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_by_org_id"
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
             channel_id
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_by_channel_id_by_org_id"
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
             channel_id
            ,  code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_count_by_channel_id_by_code"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_browse_by_filter"
                , "question"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetQuestionByUuid(string set_type, Question obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@choices", obj.choices));
            parameters.Add(new SqlParameter("@channel_id", obj.channel_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetQuestionByChannelIdByCode(string set_type, Question obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@choices", obj.choices));
            parameters.Add(new SqlParameter("@channel_id", obj.channel_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_set_by_channel_id_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelQuestionByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_question_del_by_uuid"
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
             channel_id
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_question_del_by_channel_id_by_org_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_by_uuid"
                , "question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_by_code"
                , "question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_by_name"
                , "question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByType(
             type
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@type", type));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_by_type"
                , "question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByChannelId(
             channel_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_by_channel_id"
                , "question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_by_org_id"
                , "question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByChannelIdByOrgId(
             channel_id
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_by_channel_id_by_org_id"
                , "question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetQuestionListByChannelIdByCode(
             channel_id
            ,  code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_question_get_by_channel_id_by_code"
                , "question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOffer(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_count_by_uuid"
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
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_count_by_profile_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_browse_by_filter"
                , "profile_offer"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileOfferByUuid(string set_type, ProfileOffer obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@redeem_code", obj.redeem_code));
            parameters.Add(new SqlParameter("@offer_id", obj.offer_id));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@redeemed", obj.redeemed));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileOfferByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_offer_del_by_uuid"
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
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_offer_del_by_profile_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileOfferListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_get_by_uuid"
                , "profile_offer"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileOfferListByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_offer_get_by_profile_id"
                , "profile_offer"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileApp(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_count_by_uuid"
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
             profile_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_count_by_profile_id_by_app_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_browse_by_filter"
                , "profile_app"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAppByUuid(string set_type, ProfileApp obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileAppByProfileIdByAppId(string set_type, ProfileApp obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_set_by_profile_id_by_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileAppByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_app_del_by_uuid"
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
             profile_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_app_del_by_profile_id_by_app_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAppListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_get_by_uuid"
                , "profile_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAppListByAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_get_by_app_id"
                , "profile_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAppListByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_get_by_profile_id"
                , "profile_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileAppListByProfileIdByAppId(
             profile_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_app_get_by_profile_id_by_app_id"
                , "profile_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileOrg(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_count_by_uuid"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_count_by_org_id"
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
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_count_by_profile_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_browse_by_filter"
                , "profile_org"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileOrgByUuid(string set_type, ProfileOrg obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileOrgByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_org_del_by_uuid"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileOrgListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_get_by_uuid"
                , "profile_org"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileOrgListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_get_by_org_id"
                , "profile_org"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileOrgListByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_org_get_by_profile_id"
                , "profile_org"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocation(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationByGameLocationId(
             game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_count_by_game_location_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_count_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationByProfileIdByGameLocationId(
             profile_id
            ,  game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_count_by_profile_id_by_game_location_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileGameLocationListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_browse_by_filter"
                , "profile_game_location"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameLocationByUuid(string set_type, ProfileGameLocation obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@game_location_id", obj.game_location_id));
            parameters.Add(new SqlParameter("@type_id", obj.type_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameLocationByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_location_del_by_uuid"
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
        public virtual DataSet GetProfileGameLocationList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_get"
                , "profile_game_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameLocationListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_get_by_uuid"
                , "profile_game_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameLocationListByGameLocationId(
             game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_get_by_game_location_id"
                , "profile_game_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameLocationListByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_get_by_profile_id"
                , "profile_game_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameLocationListByProfileIdByGameLocationId(
             profile_id
            ,  game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_get_by_profile_id_by_game_location_id"
                , "profile_game_location"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileQuestion(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_by_uuid"
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
             channel_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_by_channel_id"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_by_org_id"
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
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_by_profile_id"
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
             question_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@question_id", question_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_by_question_id"
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
             channel_id
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_by_channel_id_by_org_id"
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
             channel_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_by_channel_id_by_profile_id"
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
             question_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@question_id", question_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_count_by_question_id_by_profile_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_browse_by_filter"
                , "profile_question"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByUuid(string set_type, ProfileQuestion obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@channel_id", obj.channel_id));
            parameters.Add(new SqlParameter("@answer", obj.answer));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@question_id", obj.question_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByChannelIdByProfileId(string set_type, ProfileQuestion obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@channel_id", obj.channel_id));
            parameters.Add(new SqlParameter("@answer", obj.answer));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@question_id", obj.question_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_set_by_channel_id_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByQuestionIdByProfileId(string set_type, ProfileQuestion obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@channel_id", obj.channel_id));
            parameters.Add(new SqlParameter("@answer", obj.answer));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@question_id", obj.question_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_set_by_question_id_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileQuestionByChannelIdByQuestionIdByProfileId(string set_type, ProfileQuestion obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
            parameters.Add(new SqlParameter("@channel_id", obj.channel_id));
            parameters.Add(new SqlParameter("@answer", obj.answer));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@question_id", obj.question_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_set_by_channel_id_by_question_id_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileQuestionByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_question_del_by_uuid"
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
             channel_id
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_question_del_by_channel_id_by_org_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_by_uuid"
                , "profile_question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByChannelId(
             channel_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_by_channel_id"
                , "profile_question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_by_org_id"
                , "profile_question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_by_profile_id"
                , "profile_question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByQuestionId(
             question_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@question_id", question_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_by_question_id"
                , "profile_question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByChannelIdByOrgId(
             channel_id
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_by_channel_id_by_org_id"
                , "profile_question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByChannelIdByProfileId(
             channel_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_by_channel_id_by_profile_id"
                , "profile_question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileQuestionListByQuestionIdByProfileId(
             question_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@question_id", question_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_question_get_by_question_id_by_profile_id"
                , "profile_question"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileChannel(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_count_by_uuid"
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
             channel_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_count_by_channel_id"
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
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_count_by_profile_id"
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
             channel_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_count_by_channel_id_by_profile_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_browse_by_filter"
                , "profile_channel"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileChannelByUuid(string set_type, ProfileChannel obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@channel_id", obj.channel_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileChannelByChannelIdByProfileId(string set_type, ProfileChannel obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@channel_id", obj.channel_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_set_by_channel_id_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileChannelByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_channel_del_by_uuid"
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
             channel_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_channel_del_by_channel_id_by_profile_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileChannelListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_get_by_uuid"
                , "profile_channel"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileChannelListByChannelId(
             channel_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_get_by_channel_id"
                , "profile_channel"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileChannelListByProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_get_by_profile_id"
                , "profile_channel"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileChannelListByChannelIdByProfileId(
             channel_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@channel_id", channel_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_channel_get_by_channel_id_by_profile_id"
                , "profile_channel"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountOrgSite(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_count_by_uuid"
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
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_count_by_org_id"
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
             site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_count_by_site_id"
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
             org_id
            ,  site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_count_by_org_id_by_site_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_browse_by_filter"
                , "org_site"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgSiteByUuid(string set_type, OrgSite obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@site_id", obj.site_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetOrgSiteByOrgIdBySiteId(string set_type, OrgSite obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@site_id", obj.site_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@org_id", obj.org_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_set_by_org_id_by_site_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelOrgSiteByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_org_site_del_by_uuid"
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
             org_id
            ,  site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_org_site_del_by_org_id_by_site_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgSiteListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_get_by_uuid"
                , "org_site"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgSiteListByOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_get_by_org_id"
                , "org_site"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgSiteListBySiteId(
             site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_get_by_site_id"
                , "org_site"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetOrgSiteListByOrgIdBySiteId(
             org_id
            ,  site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_org_site_get_by_org_id_by_site_id"
                , "org_site"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountSiteApp(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_count_by_uuid"
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
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_count_by_app_id"
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
             site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_count_by_site_id"
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
             app_id
            ,  site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_count_by_app_id_by_site_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_browse_by_filter"
                , "site_app"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteAppByUuid(string set_type, SiteApp obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@site_id", obj.site_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetSiteAppByAppIdBySiteId(string set_type, SiteApp obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@site_id", obj.site_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_set_by_app_id_by_site_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelSiteAppByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_app_del_by_uuid"
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
             app_id
            ,  site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_site_app_del_by_app_id_by_site_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteAppListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_get_by_uuid"
                , "site_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteAppListByAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_get_by_app_id"
                , "site_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteAppListBySiteId(
             site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_get_by_site_id"
                , "site_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetSiteAppListByAppIdBySiteId(
             app_id
            ,  site_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@app_id", app_id));
            parameters.Add(new SqlParameter("@site_id", site_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_site_app_get_by_app_id_by_site_id"
                , "site_app"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountPhoto(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count_by_uuid"
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
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count_by_external_id"
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
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count_by_url"
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
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count_by_url_by_external_id"
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
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_count_by_uuid_by_external_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_browse_by_filter"
                , "photo"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUuid(string set_type, Photo obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@external_id", obj.external_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByExternalId(string set_type, Photo obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@external_id", obj.external_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_set_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUrl(string set_type, Photo obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@external_id", obj.external_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_set_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUrlByExternalId(string set_type, Photo obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@external_id", obj.external_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_set_by_url_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetPhotoByUuidByExternalId(string set_type, Photo obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@external_id", obj.external_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_set_by_uuid_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelPhotoByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_photo_del_by_uuid"
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
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_photo_del_by_external_id"
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
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_photo_del_by_url"
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
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_photo_del_by_url_by_external_id"
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
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_photo_del_by_uuid_by_external_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPhotoListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get_by_uuid"
                , "photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPhotoListByExternalId(
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get_by_external_id"
                , "photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPhotoListByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get_by_url"
                , "photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPhotoListByUrlByExternalId(
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get_by_url_by_external_id"
                , "photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetPhotoListByUuidByExternalId(
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_photo_get_by_uuid_by_external_id"
                , "photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountVideo(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
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
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count_by_uuid"
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
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count_by_external_id"
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
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count_by_url"
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
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count_by_url_by_external_id"
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
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_count_by_uuid_by_external_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_browse_by_filter"
                , "video"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUuid(string set_type, Video obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@external_id", obj.external_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByExternalId(string set_type, Video obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@external_id", obj.external_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_set_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUrl(string set_type, Video obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@external_id", obj.external_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_set_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUrlByExternalId(string set_type, Video obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@external_id", obj.external_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_set_by_url_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetVideoByUuidByExternalId(string set_type, Video obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@external_id", obj.external_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_set_by_uuid_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelVideoByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_video_del_by_uuid"
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
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_video_del_by_external_id"
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
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_video_del_by_url"
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
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_video_del_by_url_by_external_id"
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
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_video_del_by_uuid_by_external_id"
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
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
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
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetVideoListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get_by_uuid"
                , "video"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetVideoListByExternalId(
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get_by_external_id"
                , "video"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetVideoListByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get_by_url"
                , "video"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetVideoListByUrlByExternalId(
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get_by_url_by_external_id"
                , "video"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetVideoListByUuidByExternalId(
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_video_get_by_uuid_by_external_id"
                , "video"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeapon(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponByUrlByGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count_by_url_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponByUuidByGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count_by_uuid_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameRpgItemWeaponListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_browse_by_filter"
                , "game_rpg_item_weapon"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUuid(string set_type, GameRpgItemWeapon obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@game_defense", obj.game_defense));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_attack", obj.game_attack));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@game_price", obj.game_price));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@game_skill", obj.game_skill));
            parameters.Add(new SqlParameter("@game_health", obj.game_health));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_energy", obj.game_energy));
            parameters.Add(new SqlParameter("@game_data", obj.game_data));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByGameId(string set_type, GameRpgItemWeapon obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@game_defense", obj.game_defense));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_attack", obj.game_attack));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@game_price", obj.game_price));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@game_skill", obj.game_skill));
            parameters.Add(new SqlParameter("@game_health", obj.game_health));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_energy", obj.game_energy));
            parameters.Add(new SqlParameter("@game_data", obj.game_data));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_set_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUrl(string set_type, GameRpgItemWeapon obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@game_defense", obj.game_defense));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_attack", obj.game_attack));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@game_price", obj.game_price));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@game_skill", obj.game_skill));
            parameters.Add(new SqlParameter("@game_health", obj.game_health));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_energy", obj.game_energy));
            parameters.Add(new SqlParameter("@game_data", obj.game_data));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_set_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUrlByGameId(string set_type, GameRpgItemWeapon obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@game_defense", obj.game_defense));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_attack", obj.game_attack));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@game_price", obj.game_price));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@game_skill", obj.game_skill));
            parameters.Add(new SqlParameter("@game_health", obj.game_health));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_energy", obj.game_energy));
            parameters.Add(new SqlParameter("@game_data", obj.game_data));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_set_by_url_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUuidByGameId(string set_type, GameRpgItemWeapon obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@game_defense", obj.game_defense));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_attack", obj.game_attack));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@game_price", obj.game_price));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@game_skill", obj.game_skill));
            parameters.Add(new SqlParameter("@game_health", obj.game_health));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_energy", obj.game_energy));
            parameters.Add(new SqlParameter("@game_data", obj.game_data));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_set_by_uuid_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_weapon_del_by_uuid"
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
        public virtual bool DelGameRpgItemWeaponByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_weapon_del_by_game_id"
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
        public virtual bool DelGameRpgItemWeaponByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_weapon_del_by_url"
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
        public virtual bool DelGameRpgItemWeaponByUrlByGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_weapon_del_by_url_by_game_id"
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
        public virtual bool DelGameRpgItemWeaponByUuidByGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_weapon_del_by_uuid_by_game_id"
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
        public virtual DataSet GetGameRpgItemWeaponList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get"
                , "game_rpg_item_weapon"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemWeaponListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get_by_uuid"
                , "game_rpg_item_weapon"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemWeaponListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get_by_game_id"
                , "game_rpg_item_weapon"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemWeaponListByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get_by_url"
                , "game_rpg_item_weapon"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemWeaponListByUrlByGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get_by_url_by_game_id"
                , "game_rpg_item_weapon"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemWeaponListByUuidByGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get_by_uuid_by_game_id"
                , "game_rpg_item_weapon"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkill(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillByUrlByGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count_by_url_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillByUuidByGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count_by_uuid_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameRpgItemSkillListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_browse_by_filter"
                , "game_rpg_item_skill"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUuid(string set_type, GameRpgItemSkill obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@game_defense", obj.game_defense));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_attack", obj.game_attack));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@game_price", obj.game_price));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@game_skill", obj.game_skill));
            parameters.Add(new SqlParameter("@game_health", obj.game_health));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_energy", obj.game_energy));
            parameters.Add(new SqlParameter("@game_data", obj.game_data));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByGameId(string set_type, GameRpgItemSkill obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@game_defense", obj.game_defense));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_attack", obj.game_attack));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@game_price", obj.game_price));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@game_skill", obj.game_skill));
            parameters.Add(new SqlParameter("@game_health", obj.game_health));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_energy", obj.game_energy));
            parameters.Add(new SqlParameter("@game_data", obj.game_data));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_set_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUrl(string set_type, GameRpgItemSkill obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@game_defense", obj.game_defense));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_attack", obj.game_attack));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@game_price", obj.game_price));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@game_skill", obj.game_skill));
            parameters.Add(new SqlParameter("@game_health", obj.game_health));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_energy", obj.game_energy));
            parameters.Add(new SqlParameter("@game_data", obj.game_data));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_set_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUrlByGameId(string set_type, GameRpgItemSkill obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@game_defense", obj.game_defense));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_attack", obj.game_attack));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@game_price", obj.game_price));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@game_skill", obj.game_skill));
            parameters.Add(new SqlParameter("@game_health", obj.game_health));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_energy", obj.game_energy));
            parameters.Add(new SqlParameter("@game_data", obj.game_data));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_set_by_url_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUuidByGameId(string set_type, GameRpgItemSkill obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@third_party_oembed", obj.third_party_oembed));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@description", obj.description));
            parameters.Add(new SqlParameter("@game_defense", obj.game_defense));
            parameters.Add(new SqlParameter("@third_party_url", obj.third_party_url));
            parameters.Add(new SqlParameter("@third_party_id", obj.third_party_id));
            parameters.Add(new SqlParameter("@content_type", obj.content_type));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_attack", obj.game_attack));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@third_party_data", obj.third_party_data));
            parameters.Add(new SqlParameter("@game_price", obj.game_price));
            parameters.Add(new SqlParameter("@game_type", obj.game_type));
            parameters.Add(new SqlParameter("@game_skill", obj.game_skill));
            parameters.Add(new SqlParameter("@game_health", obj.game_health));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_energy", obj.game_energy));
            parameters.Add(new SqlParameter("@game_data", obj.game_data));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_set_by_uuid_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_skill_del_by_uuid"
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
        public virtual bool DelGameRpgItemSkillByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_skill_del_by_game_id"
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
        public virtual bool DelGameRpgItemSkillByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_skill_del_by_url"
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
        public virtual bool DelGameRpgItemSkillByUrlByGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_skill_del_by_url_by_game_id"
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
        public virtual bool DelGameRpgItemSkillByUuidByGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_skill_del_by_uuid_by_game_id"
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
        public virtual DataSet GetGameRpgItemSkillList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get"
                , "game_rpg_item_skill"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemSkillListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get_by_uuid"
                , "game_rpg_item_skill"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemSkillListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get_by_game_id"
                , "game_rpg_item_skill"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemSkillListByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get_by_url"
                , "game_rpg_item_skill"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemSkillListByUrlByGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get_by_url_by_game_id"
                , "game_rpg_item_skill"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemSkillListByUuidByGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get_by_uuid_by_game_id"
                , "game_rpg_item_skill"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameProduct(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductByUrlByGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count_by_url_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductByUuidByGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count_by_uuid_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProductListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_browse_by_filter"
                , "game_product"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUuid(string set_type, GameProduct obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByGameId(string set_type, GameProduct obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_set_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUrl(string set_type, GameProduct obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_set_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUrlByGameId(string set_type, GameProduct obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_set_by_url_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUuidByGameId(string set_type, GameProduct obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@url", obj.url));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_set_by_uuid_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_product_del_by_uuid"
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
        public virtual bool DelGameProductByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_product_del_by_game_id"
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
        public virtual bool DelGameProductByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_product_del_by_url"
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
        public virtual bool DelGameProductByUrlByGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_product_del_by_url_by_game_id"
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
        public virtual bool DelGameProductByUuidByGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_product_del_by_uuid_by_game_id"
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
        public virtual DataSet GetGameProductList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get"
                , "game_product"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProductListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get_by_uuid"
                , "game_product"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProductListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get_by_game_id"
                , "game_product"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProductListByUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get_by_url"
                , "game_product"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProductListByUrlByGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get_by_url_by_game_id"
                , "game_product"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProductListByUuidByGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get_by_uuid_by_game_id"
                , "game_product"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboard(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
             key
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_by_key_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
             key
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameStatisticLeaderboardListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_browse_by_filter"
                , "game_statistic_leaderboard"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByUuid(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_set_by_uuid_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByProfileIdByKey(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_set_by_profile_id_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_set_by_profile_id_by_key_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByProfileIdByGameIdByKey(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_set_by_profile_id_by_game_id_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_del_by_uuid"
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
        public virtual bool DelGameStatisticLeaderboardByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_del_by_key_by_game_id"
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
        public virtual bool DelGameStatisticLeaderboardByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_del_by_profile_id_by_game_id"
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
        public virtual bool DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
             key
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_del_by_key_by_profile_id_by_game_id"
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
        public virtual DataSet GetGameStatisticLeaderboardList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get"
                , "game_statistic_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_by_uuid"
                , "game_statistic_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_by_key"
                , "game_statistic_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_by_game_id"
                , "game_statistic_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_by_key_by_game_id"
                , "game_statistic_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_by_profile_id_by_game_id"
                , "game_statistic_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
             profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_by_profile_id_by_game_id_by_timestamp"
                , "game_statistic_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
             key
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_by_key_by_profile_id_by_game_id"
                , "game_statistic_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
             key
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_by_key_by_profile_id_by_game_id_by_timestamp"
                , "game_statistic_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveQueue(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveQueueByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveQueueByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_count_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameLiveQueueListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_browse_by_filter"
                , "game_live_queue"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveQueueByUuid(string set_type, GameLiveQueue obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@data_stat", obj.data_stat));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@data_ad", obj.data_ad));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveQueueByProfileIdByGameId(string set_type, GameLiveQueue obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@data_stat", obj.data_stat));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@data_ad", obj.data_ad));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_set_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveQueueByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_live_queue_del_by_uuid"
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
        public virtual bool DelGameLiveQueueByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_live_queue_del_by_profile_id_by_game_id"
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
        public virtual DataSet GetGameLiveQueueList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_get"
                , "game_live_queue"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveQueueListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_get_by_uuid"
                , "game_live_queue"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveQueueListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_get_by_game_id"
                , "game_live_queue"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveQueueListByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_get_by_profile_id_by_game_id"
                , "game_live_queue"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveRecentQueue(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveRecentQueueByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveRecentQueueByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_count_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameLiveRecentQueueListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_browse_by_filter"
                , "game_live_recent_queue"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveRecentQueueByUuid(string set_type, GameLiveRecentQueue obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@game", obj.game));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveRecentQueueByProfileIdByGameId(string set_type, GameLiveRecentQueue obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@game", obj.game));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_set_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveRecentQueueByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_live_recent_queue_del_by_uuid"
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
        public virtual bool DelGameLiveRecentQueueByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_live_recent_queue_del_by_profile_id_by_game_id"
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
        public virtual DataSet GetGameLiveRecentQueueList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_get"
                , "game_live_recent_queue"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveRecentQueueListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_get_by_uuid"
                , "game_live_recent_queue"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveRecentQueueListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_get_by_game_id"
                , "game_live_recent_queue"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveRecentQueueListByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_get_by_profile_id_by_game_id"
                , "game_live_recent_queue"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatistic(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_count_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_count_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_count_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByKeyByProfileIdByGameId(
             key
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_count_by_key_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticByKeyByProfileIdByGameIdByTimestamp(
             key
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_count_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameStatisticListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_browse_by_filter"
                , "game_statistic"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByUuid(string set_type, GameStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByUuidByProfileIdByGameIdByTimestamp(string set_type, GameStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_set_by_uuid_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByProfileIdByKey(string set_type, GameStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_set_by_profile_id_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByProfileIdByKeyByTimestamp(string set_type, GameStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_set_by_profile_id_by_key_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByKeyByProfileIdByGameIdByTimestamp(string set_type, GameStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_set_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticByProfileIdByGameIdByKey(string set_type, GameStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_set_by_profile_id_by_game_id_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_del_by_uuid"
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
        public virtual bool DelGameStatisticByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_del_by_key_by_game_id"
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
        public virtual bool DelGameStatisticByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_del_by_profile_id_by_game_id"
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
        public virtual bool DelGameStatisticByKeyByProfileIdByGameId(
             key
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_del_by_key_by_profile_id_by_game_id"
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
        public virtual DataSet GetGameStatisticListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_get_by_uuid"
                , "game_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticListByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_get_by_key"
                , "game_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_get_by_game_id"
                , "game_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticListByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_get_by_key_by_game_id"
                , "game_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticListByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_get_by_profile_id_by_game_id"
                , "game_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticListByProfileIdByGameIdByTimestamp(
             profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_get_by_profile_id_by_game_id_by_timestamp"
                , "game_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticListByKeyByProfileIdByGameId(
             key
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_get_by_key_by_profile_id_by_game_id"
                , "game_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticListByKeyByProfileIdByGameIdByTimestamp(
             key
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_get_by_key_by_profile_id_by_game_id_by_timestamp"
                , "game_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMeta(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_by_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameStatisticMetaListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_browse_by_filter"
                , "game_statistic_meta"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticMetaByUuid(string set_type, GameStatisticMeta obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@store_count", obj.store_count));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@order", obj.order));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticMetaByKeyByGameId(string set_type, GameStatisticMeta obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@store_count", obj.store_count));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@order", obj.order));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_set_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticMetaByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_meta_del_by_uuid"
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
        public virtual bool DelGameStatisticMetaByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_meta_del_by_key_by_game_id"
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
        public virtual DataSet GetGameStatisticMetaListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_by_uuid"
                , "game_statistic_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticMetaListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_by_code"
                , "game_statistic_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticMetaListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_by_name"
                , "game_statistic_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticMetaListByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_by_key"
                , "game_statistic_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticMetaListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_by_game_id"
                , "game_statistic_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticMetaListByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_by_key_by_game_id"
                , "game_statistic_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticTimestamp(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_timestamp_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticTimestampByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_timestamp_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
             key
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_timestamp_count_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameStatisticTimestampListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_timestamp_browse_by_filter"
                , "game_statistic_timestamp"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticTimestampByUuid(string set_type, GameStatisticTimestamp obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_timestamp_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(string set_type, GameStatisticTimestamp obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_timestamp_set_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticTimestampByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_timestamp_del_by_uuid"
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
        public virtual bool DelGameStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
             key
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_timestamp_del_by_key_by_profile_id_by_game_id_by_timestamp"
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
        public virtual DataSet GetGameStatisticTimestampListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_timestamp_get_by_uuid"
                , "game_statistic_timestamp"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
             key
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_timestamp_get_by_key_by_profile_id_by_game_id_by_timestamp"
                , "game_statistic_timestamp"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMeta(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_by_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameKeyMetaListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_browse_by_filter"
                , "game_key_meta"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaByUuid(string set_type, GameKeyMeta obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@key_level", obj.key_level));
            parameters.Add(new SqlParameter("@store_count", obj.store_count));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@order", obj.order));
            parameters.Add(new SqlParameter("@key_stat", obj.key_stat));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaByKeyByGameId(string set_type, GameKeyMeta obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@key_level", obj.key_level));
            parameters.Add(new SqlParameter("@store_count", obj.store_count));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@order", obj.order));
            parameters.Add(new SqlParameter("@key_stat", obj.key_stat));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_set_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaByKeyByGameIdByLevel(string set_type, GameKeyMeta obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@key_level", obj.key_level));
            parameters.Add(new SqlParameter("@store_count", obj.store_count));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@order", obj.order));
            parameters.Add(new SqlParameter("@key_stat", obj.key_stat));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_set_by_key_by_game_id_by_level"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameKeyMetaByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_key_meta_del_by_uuid"
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
        public virtual bool DelGameKeyMetaByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_key_meta_del_by_key_by_game_id"
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
        public virtual DataSet GetGameKeyMetaListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_by_uuid"
                , "game_key_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_by_code"
                , "game_key_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_by_name"
                , "game_key_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_by_key"
                , "game_key_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_by_game_id"
                , "game_key_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_by_key_by_game_id"
                , "game_key_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByCodeByLevel(
             code
            ,  level
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@level", level));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_by_code_by_level"
                , "game_key_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevel(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_by_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameLevelListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_browse_by_filter"
                , "game_level"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLevelByUuid(string set_type, GameLevel obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@order", obj.order));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLevelByKeyByGameId(string set_type, GameLevel obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@order", obj.order));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_set_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLevelByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_level_del_by_uuid"
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
        public virtual bool DelGameLevelByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_level_del_by_key_by_game_id"
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
        public virtual DataSet GetGameLevelListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_by_uuid"
                , "game_level"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLevelListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_by_code"
                , "game_level"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLevelListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_by_name"
                , "game_level"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLevelListByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_by_key"
                , "game_level"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLevelListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_by_game_id"
                , "game_level"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLevelListByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_by_key_by_game_id"
                , "game_level"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievement(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementByProfileIdByKey(
             profile_id
            ,  key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_count_by_profile_id_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementByUsername(
             username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@username", username));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_count_by_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementByKeyByProfileIdByGameId(
             key
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_count_by_key_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementByKeyByProfileIdByGameIdByTimestamp(
             key
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_count_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameAchievementListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_browse_by_filter"
                , "game_achievement"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementByUuid(string set_type, GameAchievement obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@completed", obj.completed));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@achievement_value", obj.achievement_value));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementByUuidByKey(string set_type, GameAchievement obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@completed", obj.completed));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@achievement_value", obj.achievement_value));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_set_by_uuid_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementByProfileIdByKey(string set_type, GameAchievement obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@completed", obj.completed));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@achievement_value", obj.achievement_value));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_set_by_profile_id_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementByKeyByProfileIdByGameId(string set_type, GameAchievement obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@completed", obj.completed));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@achievement_value", obj.achievement_value));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_set_by_key_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementByKeyByProfileIdByGameIdByTimestamp(string set_type, GameAchievement obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@completed", obj.completed));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@achievement_value", obj.achievement_value));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_set_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_achievement_del_by_uuid"
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
        public virtual bool DelGameAchievementByProfileIdByKey(
             profile_id
            ,  key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@key", key));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_achievement_del_by_profile_id_by_key"
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
        public virtual bool DelGameAchievementByUuidByKey(
             uuid
            ,  key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@key", key));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_achievement_del_by_uuid_by_key"
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
        public virtual DataSet GetGameAchievementListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_get_by_uuid"
                , "game_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementListByProfileIdByKey(
             profile_id
            ,  key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_get_by_profile_id_by_key"
                , "game_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementListByUsername(
             username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@username", username));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_get_by_username"
                , "game_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementListByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_get_by_key"
                , "game_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_get_by_game_id"
                , "game_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementListByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_get_by_key_by_game_id"
                , "game_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementListByProfileIdByGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_get_by_profile_id_by_game_id"
                , "game_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementListByProfileIdByGameIdByTimestamp(
             profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_get_by_profile_id_by_game_id_by_timestamp"
                , "game_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementListByKeyByProfileIdByGameId(
             key
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_get_by_key_by_profile_id_by_game_id"
                , "game_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementListByKeyByProfileIdByGameIdByTimestamp(
             key
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_get_by_key_by_profile_id_by_game_id_by_timestamp"
                , "game_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMeta(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_by_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameAchievementMetaListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_browse_by_filter"
                , "game_achievement_meta"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementMetaByUuid(string set_type, GameAchievementMeta obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@game_stat", obj.game_stat));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@leaderboard", obj.leaderboard));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementMetaByKeyByGameId(string set_type, GameAchievementMeta obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@display_name", obj.display_name));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@game_stat", obj.game_stat));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@leaderboard", obj.leaderboard));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_set_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementMetaByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_achievement_meta_del_by_uuid"
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
        public virtual bool DelGameAchievementMetaByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BasePlatformData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_achievement_meta_del_by_key_by_game_id"
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
        public virtual DataSet GetGameAchievementMetaListByUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_by_uuid"
                , "game_achievement_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementMetaListByCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_by_code"
                , "game_achievement_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementMetaListByName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_by_name"
                , "game_achievement_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementMetaListByKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_by_key"
                , "game_achievement_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementMetaListByGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_by_game_id"
                , "game_achievement_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementMetaListByKeyByGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BasePlatformData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_by_key_by_game_id"
                , "game_achievement_meta"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
    }
}

"""




