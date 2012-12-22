<?php // namespace Gaming;

require_once('core/data/mssql/DataProvider.php');


class BaseGamingData {

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

class BaseGamingData(object):

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

using gaming;
using gaming.ent;

namespace gaming {

    public class BaseGamingData {
    
	private static readonly log4net.ILog log = log4net.LogManager.GetLogger("main");
    
        DataProviderMSSQL data = new DataProviderMSSQL();
        
        public static string connectionString = CoreConfig.GetConnectionStringByName("gaming");
                
        public BaseGamingData(){
        }
        
//------------------------------------------------------------------------------                    
        public virtual int CountGame(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string org_id
            , string app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string org_id
            , string app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string org_id
            , string app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string org_id
            , string type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string code
            , string org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string org_id
            , string type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string parent_id
            , string category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string parent_id
            , string category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string parent_id
            , string category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
        public virtual int CountGameNetwork(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkByCode(
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_count_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkByUuidByType(
            string uuid
            , string type
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@type", type));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_count_by_uuid_by_type"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameNetworkListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_browse_by_filter"
                , "game_network"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkByUuid(string set_type, GameNetwork obj)  {
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
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@secret", obj.secret));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkByCode(string set_type, GameNetwork obj)  {
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
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@secret", obj.secret));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_set_by_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameNetworkByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_network_del_by_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_get"
                , "game_network"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkListByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_get_by_uuid"
                , "game_network"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkListByCode(
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_get_by_code"
                , "game_network"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkListByUuidByType(
            string uuid
            , string type
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@type", type));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_get_by_uuid_by_type"
                , "game_network"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkAuth(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkAuthByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkAuthByGameIdByGameNetworkId(
            string game_id
            , string game_network_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@game_network_id", game_network_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_count_by_game_id_by_game_network_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameNetworkAuthListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_browse_by_filter"
                , "game_network_auth"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkAuthByUuid(string set_type, GameNetworkAuth obj)  {
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
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
            parameters.Add(new SqlParameter("@game_network_id", obj.game_network_id));
            parameters.Add(new SqlParameter("@secret", obj.secret));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkAuthByGameIdByGameNetworkId(string set_type, GameNetworkAuth obj)  {
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
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@app_id", obj.app_id));
            parameters.Add(new SqlParameter("@game_network_id", obj.game_network_id));
            parameters.Add(new SqlParameter("@secret", obj.secret));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_set_by_game_id_by_game_network_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameNetworkAuthByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_network_auth_del_by_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkAuthList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_get"
                , "game_network_auth"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkAuthListByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_get_by_uuid"
                , "game_network_auth"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkAuthListByGameIdByGameNetworkId(
            string game_id
            , string game_network_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@game_network_id", game_network_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_get_by_game_id_by_game_network_id"
                , "game_network_auth"
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@secret", obj.secret));
            parameters.Add(new SqlParameter("@token", obj.token));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
            , string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string profile_id
            , string game_id
            , string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
            , string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            parameters.Add(new SqlParameter("@game_area", obj.game_area));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@network_uuid", obj.network_uuid));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@game_level", obj.game_level));
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
            parameters.Add(new SqlParameter("@profile_username", obj.profile_username));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@game_code", obj.game_code));
            parameters.Add(new SqlParameter("@game_player_z", obj.game_player_z));
            parameters.Add(new SqlParameter("@game_player_x", obj.game_player_x));
            parameters.Add(new SqlParameter("@game_player_y", obj.game_player_y));
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string path
            , string version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string path
            , string version
            , string platform
            , int increment
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
            , string path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
            , string path
            , string version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
            , string path
            , string version
            , string platform
            , int increment
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
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string path
            , string version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string path
            , string version
            , string platform
            , int increment
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@username", username));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string profile_id
            , string path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
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
                BaseGamingData.connectionString
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
            string game_id
            , string username
            , string path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string username
            , string path
            , string version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
            , string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
            , string username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@username", username));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
            , string profile_id
            , string path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
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
                    BaseGamingData.connectionString
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
            string game_id
            , string username
            , string path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
            , string username
            , string path
            , string version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
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
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@username", username));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string profile_id
            , string path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
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
                BaseGamingData.connectionString
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
            string game_id
            , string username
            , string path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string username
            , string path
            , string version
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            parameters.Add(new SqlParameter("@path", path));
            parameters.Add(new SqlParameter("@version", version));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
            , string app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
            , string app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
        public virtual int CountProfileGameLocation(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
        public virtual int CountGamePhoto(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoByExternalId(
            string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoByUrl(
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count_by_url_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count_by_uuid_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGamePhotoListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_browse_by_filter"
                , "game_photo"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUuid(string set_type, GamePhoto obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByExternalId(string set_type, GamePhoto obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_set_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUrl(string set_type, GamePhoto obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_set_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUrlByExternalId(string set_type, GamePhoto obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_set_by_url_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUuidByExternalId(string set_type, GamePhoto obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_set_by_uuid_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_photo_del_by_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoByExternalId(
            string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_photo_del_by_external_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoByUrl(
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_photo_del_by_url"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_photo_del_by_url_by_external_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_photo_del_by_uuid_by_external_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get"
                , "game_photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoListByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get_by_uuid"
                , "game_photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoListByExternalId(
            string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get_by_external_id"
                , "game_photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoListByUrl(
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get_by_url"
                , "game_photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get_by_url_by_external_id"
                , "game_photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get_by_uuid_by_external_id"
                , "game_photo"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideo(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoByExternalId(
            string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoByUrl(
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count_by_url_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count_by_uuid_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameVideoListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_browse_by_filter"
                , "game_video"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUuid(string set_type, GameVideo obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByExternalId(string set_type, GameVideo obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_set_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUrl(string set_type, GameVideo obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_set_by_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUrlByExternalId(string set_type, GameVideo obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_set_by_url_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUuidByExternalId(string set_type, GameVideo obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_set_by_uuid_by_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_video_del_by_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoByExternalId(
            string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_video_del_by_external_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoByUrl(
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_video_del_by_url"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_video_del_by_url_by_external_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_video_del_by_uuid_by_external_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get"
                , "game_video"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoListByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get_by_uuid"
                , "game_video"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoListByExternalId(
            string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get_by_external_id"
                , "game_video"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoListByUrl(
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get_by_url"
                , "game_video"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get_by_url_by_external_id"
                , "game_video"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get_by_uuid_by_external_id"
                , "game_video"
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string url
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string uuid
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string url
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string uuid
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string url
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string uuid
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string url
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string uuid
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string url
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string uuid
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string url
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string uuid
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string url
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string uuid
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string url
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string uuid
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string url
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string uuid
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
        public virtual int CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
        public virtual int CountGameStatisticLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
        public virtual DataSet BrowseGameStatisticLeaderboardListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
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
        public virtual bool SetGameStatisticLeaderboardByKeyByProfileId(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_set_by_key_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardByKeyByProfileIdByTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_timestamp"
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
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
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
        public virtual bool SetGameStatisticLeaderboardByKeyByProfileIdByGameId(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_set_by_key_by_profile_id_by_game_id"
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
        public virtual bool DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
        public virtual bool DelGameStatisticLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
        public virtual DataSet GetGameStatisticLeaderboardList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
        public virtual DataSet GetGameStatisticLeaderboardListByKeyByGameIdByNetwork(
            string key
            , string game_id
            , string network
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@network", network));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_by_key_by_game_id_by_network"
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
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
        public virtual DataSet GetGameStatisticLeaderboardListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
        public virtual int CountGameStatisticLeaderboardRollup(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByKey(
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByGameId(
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByKeyByGameId(
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_by_key_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameStatisticLeaderboardRollupListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_browse_by_filter"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByUuid(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_set_by_uuid_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByKeyByProfileId(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByKeyByProfileIdByTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@key", obj.key));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@network", obj.network));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_set_by_key_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_rollup_del_by_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupByKeyByGameId(
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_rollup_del_by_key_by_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_rollup_del_by_key_by_profile_id_by_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_rollup_del_by_profile_id_by_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_by_uuid"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListByKey(
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_by_key"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListByGameId(
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_by_game_id"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_by_key_by_game_id"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListByKeyByGameIdByNetwork(
            string key
            , string game_id
            , string network
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@network", network));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_by_key_by_game_id_by_network"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_by_key_by_profile_id_by_game_id"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_by_key_by_profile_id_by_game_id_by_timestamp"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_by_profile_id_by_game_id"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_by_profile_id_by_game_id_by_timestamp"
                , "game_statistic_leaderboard_rollup"
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
        public virtual int CountGameProfileStatistic(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByKey(
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByGameId(
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByKeyByGameId(
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_by_key_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_by_key_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProfileStatisticListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_browse_by_filter"
                , "game_profile_statistic"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByUuid(string set_type, GameProfileStatistic obj)  {
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
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatistic obj)  {
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
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_by_uuid_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByProfileIdByKey(string set_type, GameProfileStatistic obj)  {
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
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_by_profile_id_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByProfileIdByKeyByTimestamp(string set_type, GameProfileStatistic obj)  {
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
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_by_profile_id_by_key_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatistic obj)  {
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
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByProfileIdByGameIdByKey(string set_type, GameProfileStatistic obj)  {
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
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_by_profile_id_by_game_id_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_del_by_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticByKeyByGameId(
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_del_by_key_by_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_del_by_profile_id_by_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_del_by_key_by_profile_id_by_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_by_uuid"
                , "game_profile_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByKey(
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_by_key"
                , "game_profile_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByGameId(
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_by_game_id"
                , "game_profile_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_by_key_by_game_id"
                , "game_profile_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_by_profile_id_by_game_id"
                , "game_profile_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_by_profile_id_by_game_id_by_timestamp"
                , "game_profile_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_by_key_by_profile_id_by_game_id"
                , "game_profile_statistic"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_by_key_by_profile_id_by_game_id_by_timestamp"
                , "game_profile_statistic"
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            parameters.Add(new SqlParameter("@points", obj.points));
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
                BaseGamingData.connectionString
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
            parameters.Add(new SqlParameter("@points", obj.points));
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
        public virtual int CountGameProfileStatisticTimestamp(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_timestamp_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticTimestampByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_timestamp_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , Date timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_timestamp_count_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProfileStatisticTimestampListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_timestamp_browse_by_filter"
                , "game_profile_statistic_timestamp"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticTimestampByUuid(string set_type, GameProfileStatisticTimestamp obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_timestamp_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatisticTimestamp obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_timestamp_set_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticTimestampByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_timestamp_del_by_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , Date timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_timestamp_del_by_key_by_profile_id_by_game_id_by_timestamp"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticTimestampListByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_timestamp_get_by_uuid"
                , "game_profile_statistic_timestamp"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , Date timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_timestamp_get_by_key_by_profile_id_by_game_id_by_timestamp"
                , "game_profile_statistic_timestamp"
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string code
            , string level
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@level", level));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
        public virtual int CountGameProfileAchievement(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementByProfileIdByKey(
            string profile_id
            , string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_by_profile_id_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementByUsername(
            string username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@username", username));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_by_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_by_key_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProfileAchievementListByFilter(SearchFilter obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@page", obj.page));
            parameters.Add(new SqlParameter("@page_size", obj.page_size));
            parameters.Add(new SqlParameter("@sort", obj.sort));
            parameters.Add(new SqlParameter("@filter", obj.filter));
            
            try { 
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_browse_by_filter"
                , "game_profile_achievement"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByUuid(string set_type, GameProfileAchievement obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_set_by_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByUuidByKey(string set_type, GameProfileAchievement obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_set_by_uuid_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByProfileIdByKey(string set_type, GameProfileAchievement obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_set_by_profile_id_by_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByKeyByProfileIdByGameId(string set_type, GameProfileAchievement obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_set_by_key_by_profile_id_by_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(string set_type, GameProfileAchievement obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_set_by_key_by_profile_id_by_game_id_by_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_achievement_del_by_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementByProfileIdByKey(
            string profile_id
            , string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@key", key));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_achievement_del_by_profile_id_by_key"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementByUuidByKey(
            string uuid
            , string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@key", key));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_achievement_del_by_uuid_by_key"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByUuid(
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_by_uuid"
                , "game_profile_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByProfileIdByKey(
            string profile_id
            , string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_by_profile_id_by_key"
                , "game_profile_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByUsername(
            string username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@username", username));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_by_username"
                , "game_profile_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByKey(
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_by_key"
                , "game_profile_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByGameId(
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_by_game_id"
                , "game_profile_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_by_key_by_game_id"
                , "game_profile_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_by_profile_id_by_game_id"
                , "game_profile_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_by_profile_id_by_game_id_by_timestamp"
                , "game_profile_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByKeyByProfileIdByGameId(
            string key
            , string profile_id
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_by_key_by_profile_id_by_game_id"
                , "game_profile_achievement"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
            string key
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_by_key_by_profile_id_by_game_id_by_timestamp"
                , "game_profile_achievement"
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
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            parameters.Add(new SqlParameter("@modifier", obj.modifier));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@leaderboard", obj.leaderboard));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            parameters.Add(new SqlParameter("@modifier", obj.modifier));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@leaderboard", obj.leaderboard));
            parameters.Add(new SqlParameter("@description", obj.description));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
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
            string uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
            string key
            , string game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
*/
?>



