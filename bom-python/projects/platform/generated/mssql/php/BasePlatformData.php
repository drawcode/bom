<?php // namespace Platform;

require_once('core/data/mssql/DataProvider.php');


class BasePlatformData {

    public $data;
    
    public function __construct() {
        $this->data = new DataProvider();
    }
    
    public function __destruct() {
        
    }

}

/*
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
            string uuid
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
            string code
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
            string type_id
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
            string code
            , string type_id
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
            string platform
            , string type_id
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
            string platform
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string type_id
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
            string code
            , string type_id
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
            string platform
            , string type_id
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
            string platform
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string type_id
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
            string code
            , string type_id
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
            string domain
            , string type_id
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
            string domain
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string type_id
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
            string code
            , string type_id
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
            string domain
            , string type_id
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
            string domain
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string name
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
            string uuid
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
            string uuid
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
            string code
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
            string name
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string name
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
            string path
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
            string uuid
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
            string path
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
            string uuid
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
            string code
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
            string name
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
            string path
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string uuid
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
            string code
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
            string name
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
            string path
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string path
            , string site_id
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
            string path
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
            string uuid
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
            string code
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
            string name
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
            string path
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
            string site_id
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
            string site_id
            , string path
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
            string uuid
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string uuid
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
            string uuid
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
            string code
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
            string name
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
            string org_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string org_id
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
            string uuid
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
            string code
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
            string name
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
            string org_id
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
            string uuid
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
            string code
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
            string name
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
            string uuid
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
            string uuid
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
            string code
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
            string name
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
            string uuid
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
            string offer_id
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
            string city
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
            string country_code
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
            string postal_code
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string uuid
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
            string offer_id
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
            string city
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
            string country_code
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
            string postal_code
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
            string uuid
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
            string code
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
            string name
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
            string org_id
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
            string type_id
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
            string org_id
            , string type_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string code
            , string org_id
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
            string code
            , string org_id
            , string type_id
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
            string uuid
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
            string code
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
            string name
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
            string org_id
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
            string type_id
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
            string org_id
            , string type_id
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
            string uuid
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
            string parent_id
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
            string category_id
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
            string parent_id
            , string category_id
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
            string uuid
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
            string parent_id
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
            string category_id
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
            string parent_id
            , string category_id
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
            string uuid
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
            string parent_id
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
            string category_id
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
            string parent_id
            , string category_id
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
            string uuid
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
            string offer_id
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
            string category_id
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
            string offer_id
            , string category_id
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
            string uuid
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
            string uuid
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
            string offer_id
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
            string category_id
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
            string offer_id
            , string category_id
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
            string uuid
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
            string game_location_id
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
            string offer_id
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
            string offer_id
            , string game_location_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
                        
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
            string uuid
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
            string uuid
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
            string game_location_id
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
            string offer_id
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
            string offer_id
            , string game_location_id
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
            string uuid
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
            string code
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
            string name
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
            string org_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string org_id
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
            string uuid
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
            string code
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
            string name
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
            string org_id
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
            string uuid
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
            string event_id
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
            string city
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
            string country_code
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
            string postal_code
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string uuid
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
            string event_id
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
            string city
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
            string country_code
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
            string postal_code
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
            string uuid
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
            string code
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
            string name
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
            string org_id
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
            string type_id
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
            string org_id
            , string type_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string code
            , string org_id
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
            string code
            , string org_id
            , string type_id
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
            string uuid
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
            string code
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
            string name
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
            string org_id
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
            string type_id
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
            string org_id
            , string type_id
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
            string uuid
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
            string parent_id
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
            string category_id
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
            string parent_id
            , string category_id
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
            string uuid
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
            string parent_id
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
            string category_id
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
            string parent_id
            , string category_id
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
            string uuid
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
            string parent_id
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
            string category_id
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
            string parent_id
            , string category_id
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
            string uuid
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
            string event_id
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
            string category_id
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
            string event_id
            , string category_id
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
            string uuid
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
            string uuid
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
            string event_id
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
            string category_id
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
            string event_id
            , string category_id
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
            string uuid
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
            string code
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
            string name
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
            string org_id
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
            string type_id
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
            string org_id
            , string type_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string code
            , string org_id
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
            string code
            , string org_id
            , string type_id
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
            string uuid
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
            string code
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
            string name
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
            string org_id
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
            string type_id
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
            string org_id
            , string type_id
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
            string uuid
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
            string code
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
            string name
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string uuid
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
            string code
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
            string name
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
            string uuid
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
            string code
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
            string name
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
            string channel_id
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
            string org_id
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
            string channel_id
            , string org_id
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
            string channel_id
            , string code
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string channel_id
            , string org_id
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
            string uuid
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
            string code
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
            string name
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
            string type
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
            string channel_id
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
            string org_id
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
            string channel_id
            , string org_id
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
            string channel_id
            , string code
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
            string uuid
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
            string profile_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string profile_id
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
            string uuid
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
            string profile_id
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
            string uuid
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
            string profile_id
            , string app_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
                        
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
            parameters.Add(new SqlParameter("@data", obj.data));
                        
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
            string uuid
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
            string profile_id
            , string app_id
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
            string uuid
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
            string app_id
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
            string profile_id
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
            string profile_id
            , string app_id
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
            string uuid
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
            string org_id
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
            string profile_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
                        
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
            string uuid
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
            string uuid
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
            string org_id
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
            string profile_id
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
            string uuid
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
            string channel_id
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
            string org_id
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
            string profile_id
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
            string question_id
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
            string channel_id
            , string org_id
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
            string channel_id
            , string profile_id
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
            string question_id
            , string profile_id
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
            string uuid
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
            string channel_id
            , string org_id
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
            string uuid
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
            string channel_id
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
            string org_id
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
            string profile_id
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
            string question_id
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
            string channel_id
            , string org_id
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
            string channel_id
            , string profile_id
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
            string question_id
            , string profile_id
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
            string uuid
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
            string channel_id
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
            string profile_id
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
            string channel_id
            , string profile_id
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
            string uuid
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
            string channel_id
            , string profile_id
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
            string uuid
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
            string channel_id
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
            string profile_id
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
            string channel_id
            , string profile_id
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
            string uuid
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
            string org_id
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
            string site_id
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
            string org_id
            , string site_id
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
            string uuid
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
            string org_id
            , string site_id
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
            string uuid
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
            string org_id
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
            string site_id
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
            string org_id
            , string site_id
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
            string uuid
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
            string app_id
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
            string site_id
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
            string app_id
            , string site_id
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
            string uuid
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
            string app_id
            , string site_id
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
            string uuid
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
            string app_id
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
            string site_id
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
            string app_id
            , string site_id
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
            string uuid
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
            string external_id
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
            string url
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
            string url
            , string external_id
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
            string uuid
            , string external_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string external_id
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
            string url
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
            string url
            , string external_id
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
            string uuid
            , string external_id
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
            string uuid
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
            string external_id
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
            string url
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
            string url
            , string external_id
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
            string uuid
            , string external_id
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
            string uuid
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
            string external_id
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
            string url
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
            string url
            , string external_id
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
            string uuid
            , string external_id
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            parameters.Add(new SqlParameter("@data", obj.data));
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
            string uuid
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
            string external_id
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
            string url
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
            string url
            , string external_id
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
            string uuid
            , string external_id
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
            string uuid
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
            string external_id
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
            string url
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
            string url
            , string external_id
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
            string uuid
            , string external_id
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
    }
}

"""
*/
?>



