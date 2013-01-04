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
        public virtual int CountGameUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_org_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameOrgIdAppId(
             org_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_count_org_id_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameListFilter(SearchFilter obj)  {
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
                , "usp_game_browse_filter"
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
        public virtual bool SetGameUuid(string set_type, Game obj)  {
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
                , "usp_game_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCode(string set_type, Game obj)  {
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
                , "usp_game_set_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameName(string set_type, Game obj)  {
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
                , "usp_game_set_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameOrgId(string set_type, Game obj)  {
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
                , "usp_game_set_org_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAppId(string set_type, Game obj)  {
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
                , "usp_game_set_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameOrgIdAppId(string set_type, Game obj)  {
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
                , "usp_game_set_org_id_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_name"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_org_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_app_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameOrgIdAppId(
             org_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_del_org_id_app_id"
                    , parameters
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
        public virtual DataSet GetGameListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_uuid"
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
        public virtual DataSet GetGameListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_code"
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
        public virtual DataSet GetGameListName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_name"
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
        public virtual DataSet GetGameListOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_org_id"
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
        public virtual DataSet GetGameListAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_app_id"
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
        public virtual DataSet GetGameListOrgIdAppId(
             org_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_get_org_id_app_id"
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
        public virtual int CountGameCategoryUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_org_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTypeId(
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_type_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryOrgIdTypeId(
             org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_count_org_id_type_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameCategoryListFilter(SearchFilter obj)  {
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
                , "usp_game_category_browse_filter"
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
        public virtual bool SetGameCategoryUuid(string set_type, GameCategory obj)  {
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
                , "usp_game_category_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryCodeOrgId(
             code
            ,  org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_del_code_org_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryCodeOrgIdTypeId(
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
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_del_code_org_id_type_id"
                    , parameters
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
        public virtual DataSet GetGameCategoryListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_uuid"
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
        public virtual DataSet GetGameCategoryListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_code"
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
        public virtual DataSet GetGameCategoryListName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_name"
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
        public virtual DataSet GetGameCategoryListOrgId(
             org_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_org_id"
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
        public virtual DataSet GetGameCategoryListTypeId(
             type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_type_id"
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
        public virtual DataSet GetGameCategoryListOrgIdTypeId(
             org_id
            ,  type_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@org_id", org_id));
            parameters.Add(new SqlParameter("@type_id", type_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_get_org_id_type_id"
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
        public virtual int CountGameCategoryTreeUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeParentId(
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_count_parent_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_count_category_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTreeParentIdCategoryId(
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_count_parent_id_category_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameCategoryTreeListFilter(SearchFilter obj)  {
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
                , "usp_game_category_tree_browse_filter"
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
        public virtual bool SetGameCategoryTreeUuid(string set_type, GameCategoryTree obj)  {
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
                , "usp_game_category_tree_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_tree_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeParentId(
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_tree_del_parent_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_tree_del_category_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryTreeParentIdCategoryId(
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_tree_del_parent_id_category_id"
                    , parameters
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
        public virtual DataSet GetGameCategoryTreeListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_get_uuid"
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
        public virtual DataSet GetGameCategoryTreeListParentId(
             parent_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_get_parent_id"
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
        public virtual DataSet GetGameCategoryTreeListCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_get_category_id"
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
        public virtual DataSet GetGameCategoryTreeListParentIdCategoryId(
             parent_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@parent_id", parent_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_get_parent_id_category_id"
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
        public virtual int CountGameCategoryAssocUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_count_category_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssocGameIdCategoryId(
             game_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_count_game_id_category_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameCategoryAssocListFilter(SearchFilter obj)  {
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
                , "usp_game_category_assoc_browse_filter"
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
        public virtual bool SetGameCategoryAssocUuid(string set_type, GameCategoryAssoc obj)  {
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
                , "usp_game_category_assoc_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameCategoryAssocUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_category_assoc_del_uuid"
                    , parameters
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
        public virtual DataSet GetGameCategoryAssocListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_get_uuid"
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
        public virtual DataSet GetGameCategoryAssocListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_get_game_id"
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
        public virtual DataSet GetGameCategoryAssocListCategoryId(
             category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_get_category_id"
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
        public virtual DataSet GetGameCategoryAssocListGameIdCategoryId(
             game_id
            ,  category_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@category_id", category_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_get_game_id_category_id"
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
        public virtual int CountGameTypeUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameTypeCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameTypeName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_count_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameTypeListFilter(SearchFilter obj)  {
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
                , "usp_game_type_browse_filter"
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
        public virtual bool SetGameTypeUuid(string set_type, GameType obj)  {
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
                , "usp_game_type_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameTypeUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_type_del_uuid"
                    , parameters
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
        public virtual DataSet GetGameTypeListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_get_uuid"
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
        public virtual DataSet GetGameTypeListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_get_code"
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
        public virtual DataSet GetGameTypeListName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_get_name"
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
        public virtual int CountProfileGameUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_count_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileGameListFilter(SearchFilter obj)  {
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
                , "usp_profile_game_browse_filter"
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
        public virtual bool SetProfileGameUuid(string set_type, ProfileGame obj)  {
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
                , "usp_profile_game_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_del_uuid"
                    , parameters
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
        public virtual DataSet GetProfileGameListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_get_uuid"
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
        public virtual DataSet GetProfileGameListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_get_game_id"
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
        public virtual DataSet GetProfileGameListProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_get_profile_id"
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
        public virtual DataSet GetProfileGameListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_get_profile_id_game_id"
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
        public virtual int CountGameNetworkUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkUuidType(
             uuid
            ,  type
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@type", type));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_count_uuid_type"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameNetworkListFilter(SearchFilter obj)  {
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
                , "usp_game_network_browse_filter"
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
        public virtual bool SetGameNetworkUuid(string set_type, GameNetwork obj)  {
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
                , "usp_game_network_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkCode(string set_type, GameNetwork obj)  {
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
                , "usp_game_network_set_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameNetworkUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_network_del_uuid"
                    , parameters
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
        public virtual DataSet GetGameNetworkListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_get_uuid"
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
        public virtual DataSet GetGameNetworkListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_get_code"
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
        public virtual DataSet GetGameNetworkListUuidType(
             uuid
            ,  type
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@type", type));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_get_uuid_type"
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
        public virtual int CountGameNetworkAuthUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkAuthGameIdGameNetworkId(
             game_id
            ,  game_network_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@game_network_id", game_network_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_count_game_id_game_network_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameNetworkAuthListFilter(SearchFilter obj)  {
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
                , "usp_game_network_auth_browse_filter"
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
        public virtual bool SetGameNetworkAuthUuid(string set_type, GameNetworkAuth obj)  {
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
                , "usp_game_network_auth_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkAuthGameIdGameNetworkId(string set_type, GameNetworkAuth obj)  {
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
                , "usp_game_network_auth_set_game_id_game_network_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameNetworkAuthUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_network_auth_del_uuid"
                    , parameters
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
        public virtual DataSet GetGameNetworkAuthListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_get_uuid"
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
        public virtual DataSet GetGameNetworkAuthListGameIdGameNetworkId(
             game_id
            ,  game_network_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@game_network_id", game_network_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_get_game_id_game_network_id"
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
        public virtual int CountProfileGameNetworkUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkProfileIdGameIdGameNetworkId(
             profile_id
            ,  game_id
            ,  game_network_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@game_network_id", game_network_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_profile_id_game_id_game_network_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
             network_username
            ,  game_id
            ,  game_network_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@network_username", network_username));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@game_network_id", game_network_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_network_username_game_id_game_network_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileGameNetworkListFilter(SearchFilter obj)  {
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
                , "usp_profile_game_network_browse_filter"
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
        public virtual bool SetProfileGameNetworkUuid(string set_type, ProfileGameNetwork obj)  {
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
            parameters.Add(new SqlParameter("@network_fullname", obj.network_fullname));
            parameters.Add(new SqlParameter("@secret", obj.secret));
            parameters.Add(new SqlParameter("@token", obj.token));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@network_auth", obj.network_auth));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@network_user_id", obj.network_user_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkProfileIdGameId(string set_type, ProfileGameNetwork obj)  {
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
            parameters.Add(new SqlParameter("@network_fullname", obj.network_fullname));
            parameters.Add(new SqlParameter("@secret", obj.secret));
            parameters.Add(new SqlParameter("@token", obj.token));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@network_auth", obj.network_auth));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@network_user_id", obj.network_user_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_set_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkProfileIdGameIdGameNetworkId(string set_type, ProfileGameNetwork obj)  {
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
            parameters.Add(new SqlParameter("@network_fullname", obj.network_fullname));
            parameters.Add(new SqlParameter("@secret", obj.secret));
            parameters.Add(new SqlParameter("@token", obj.token));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@network_auth", obj.network_auth));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@network_user_id", obj.network_user_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_set_profile_id_game_id_game_network_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(string set_type, ProfileGameNetwork obj)  {
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
            parameters.Add(new SqlParameter("@network_fullname", obj.network_fullname));
            parameters.Add(new SqlParameter("@secret", obj.secret));
            parameters.Add(new SqlParameter("@token", obj.token));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@network_auth", obj.network_auth));
            parameters.Add(new SqlParameter("@type", obj.type));
            parameters.Add(new SqlParameter("@network_user_id", obj.network_user_id));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_set_network_username_game_id_game_network_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_network_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_network_del_profile_id_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkProfileIdGameIdGameNetworkId(
             profile_id
            ,  game_id
            ,  game_network_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@game_network_id", game_network_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_network_del_profile_id_game_id_game_network_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
             network_username
            ,  game_id
            ,  game_network_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@network_username", network_username));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@game_network_id", game_network_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_network_del_network_username_game_id_game_network_id"
                    , parameters
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
        public virtual DataSet GetProfileGameNetworkListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_uuid"
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
        public virtual DataSet GetProfileGameNetworkListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_game_id"
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
        public virtual DataSet GetProfileGameNetworkListProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_profile_id"
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
        public virtual DataSet GetProfileGameNetworkListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_profile_id_game_id"
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
        public virtual DataSet GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
             profile_id
            ,  game_id
            ,  game_network_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@game_network_id", game_network_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_profile_id_game_id_game_network_id"
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
        public virtual DataSet GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
             network_username
            ,  game_id
            ,  game_network_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@network_username", network_username));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@game_network_id", game_network_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_network_username_game_id_game_network_id"
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
        public virtual int CountProfileGameDataAttributeUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttributeProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_count_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttributeProfileIdGameIdCode(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_count_profile_id_game_id_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileGameDataAttributeListFilter(SearchFilter obj)  {
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
                , "usp_profile_game_data_attribute_browse_filter"
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
        public virtual bool SetProfileGameDataAttributeUuid(string set_type, ProfileGameDataAttribute obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@val", obj.val));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@otype", obj.otype));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeProfileId(string set_type, ProfileGameDataAttribute obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@val", obj.val));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@otype", obj.otype));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_set_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeProfileIdGameIdCode(string set_type, ProfileGameDataAttribute obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@name", obj.name));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@val", obj.val));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@otype", obj.otype));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_set_profile_id_game_id_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameDataAttributeUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_data_attribute_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameDataAttributeProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_data_attribute_del_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameDataAttributeProfileIdGameIdCode(
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
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_data_attribute_del_profile_id_game_id_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameDataAttributeListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_get_uuid"
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
        public virtual DataSet GetProfileGameDataAttributeListProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_get_profile_id"
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
        public virtual DataSet GetProfileGameDataAttributeListProfileIdGameIdCode(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_get_profile_id_game_id_code"
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
        public virtual int CountGameSessionUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_count_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameSessionListFilter(SearchFilter obj)  {
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
                , "usp_game_session_browse_filter"
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
        public virtual bool SetGameSessionUuid(string set_type, GameSession obj)  {
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
                , "usp_game_session_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameSessionUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_session_del_uuid"
                    , parameters
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
        public virtual DataSet GetGameSessionListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_get_uuid"
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
        public virtual DataSet GetGameSessionListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_get_game_id"
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
        public virtual DataSet GetGameSessionListProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_get_profile_id"
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
        public virtual DataSet GetGameSessionListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_get_profile_id_game_id"
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
        public virtual int CountGameSessionDataUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_data_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameSessionDataListFilter(SearchFilter obj)  {
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
                , "usp_game_session_data_browse_filter"
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
        public virtual bool SetGameSessionDataUuid(string set_type, GameSessionData obj)  {
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
                , "usp_game_session_data_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameSessionDataUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_session_data_del_uuid"
                    , parameters
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
        public virtual DataSet GetGameSessionDataListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_data_get_uuid"
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
        public virtual int CountGameContentUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentGameIdPath(
             game_id
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count_game_id_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentGameIdPathVersion(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count_game_id_path_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameContentGameIdPathVersionPlatformIncrement(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_count_game_id_path_version_platform_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameContentListFilter(SearchFilter obj)  {
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
                , "usp_game_content_browse_filter"
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
        public virtual bool SetGameContentUuid(string set_type, GameContent obj)  {
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
                , "usp_game_content_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentGameId(string set_type, GameContent obj)  {
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
                , "usp_game_content_set_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentGameIdPath(string set_type, GameContent obj)  {
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
                , "usp_game_content_set_game_id_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentGameIdPathVersion(string set_type, GameContent obj)  {
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
                , "usp_game_content_set_game_id_path_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentGameIdPathVersionPlatformIncrement(string set_type, GameContent obj)  {
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
                , "usp_game_content_set_game_id_path_version_platform_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_content_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_content_del_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentGameIdPath(
             game_id
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_content_del_game_id_path"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentGameIdPathVersion(
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
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_content_del_game_id_path_version"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameContentGameIdPathVersionPlatformIncrement(
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
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_content_del_game_id_path_version_platform_increment"
                    , parameters
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
        public virtual DataSet GetGameContentListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get_uuid"
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
        public virtual DataSet GetGameContentListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get_game_id"
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
        public virtual DataSet GetGameContentListGameIdPath(
             game_id
            ,  path
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@path", path));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get_game_id_path"
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
        public virtual DataSet GetGameContentListGameIdPathVersion(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get_game_id_path_version"
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
        public virtual DataSet GetGameContentListGameIdPathVersionPlatformIncrement(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_get_game_id_path_version_platform_increment"
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
        public virtual int CountGameProfileContentUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdProfileId(
             game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_game_id_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdUsername(
             game_id
            ,  username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_game_id_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentUsername(
             username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@username", username));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdProfileIdPath(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_game_id_profile_id_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdProfileIdPathVersion(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_game_id_profile_id_path_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_game_id_profile_id_path_version_platform_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdUsernamePath(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_game_id_username_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdUsernamePathVersion(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_game_id_username_path_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_game_id_username_path_version_platform_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProfileContentListFilter(SearchFilter obj)  {
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
                , "usp_game_profile_content_browse_filter"
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
        public virtual bool SetGameProfileContentUuid(string set_type, GameProfileContent obj)  {
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
                , "usp_game_profile_content_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdProfileId(string set_type, GameProfileContent obj)  {
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
                , "usp_game_profile_content_set_game_id_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdUsername(string set_type, GameProfileContent obj)  {
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
                , "usp_game_profile_content_set_game_id_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentUsername(string set_type, GameProfileContent obj)  {
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
                , "usp_game_profile_content_set_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdProfileIdPath(string set_type, GameProfileContent obj)  {
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
                , "usp_game_profile_content_set_game_id_profile_id_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersion(string set_type, GameProfileContent obj)  {
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
                , "usp_game_profile_content_set_game_id_profile_id_path_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(string set_type, GameProfileContent obj)  {
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
                , "usp_game_profile_content_set_game_id_profile_id_path_version_platform_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdUsernamePath(string set_type, GameProfileContent obj)  {
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
                , "usp_game_profile_content_set_game_id_username_path"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdUsernamePathVersion(string set_type, GameProfileContent obj)  {
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
                , "usp_game_profile_content_set_game_id_username_path_version"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(string set_type, GameProfileContent obj)  {
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
                , "usp_game_profile_content_set_game_id_username_path_version_platform_increment"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdProfileId(
             game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_game_id_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdUsername(
             game_id
            ,  username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_game_id_username"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentUsername(
             username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@username", username));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_username"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdProfileIdPath(
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
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_game_id_profile_id_path"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdProfileIdPathVersion(
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
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_game_id_profile_id_path_version"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
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
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_game_id_profile_id_path_version_platform_increment"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdUsernamePath(
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
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_game_id_username_path"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdUsernamePathVersion(
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
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_game_id_username_path_version"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
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
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_game_id_username_path_version_platform_increment"
                    , parameters
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
        public virtual DataSet GetGameProfileContentListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_uuid"
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
        public virtual DataSet GetGameProfileContentListGameIdProfileId(
             game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_game_id_profile_id"
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
        public virtual DataSet GetGameProfileContentListGameIdUsername(
             game_id
            ,  username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@username", username));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_game_id_username"
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
        public virtual DataSet GetGameProfileContentListUsername(
             username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@username", username));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_username"
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
        public virtual DataSet GetGameProfileContentListGameIdProfileIdPath(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_game_id_profile_id_path"
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
        public virtual DataSet GetGameProfileContentListGameIdProfileIdPathVersion(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_game_id_profile_id_path_version"
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
        public virtual DataSet GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_game_id_profile_id_path_version_platform_increment"
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
        public virtual DataSet GetGameProfileContentListGameIdUsernamePath(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_game_id_username_path"
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
        public virtual DataSet GetGameProfileContentListGameIdUsernamePathVersion(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_game_id_username_path_version"
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
        public virtual DataSet GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_game_id_username_path_version_platform_increment"
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
        public virtual int CountGameAppUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_count_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAppGameIdAppId(
             game_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_count_game_id_app_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameAppListFilter(SearchFilter obj)  {
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
                , "usp_game_app_browse_filter"
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
        public virtual bool SetGameAppUuid(string set_type, GameApp obj)  {
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
                , "usp_game_app_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAppUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_app_del_uuid"
                    , parameters
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
        public virtual DataSet GetGameAppListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_get_uuid"
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
        public virtual DataSet GetGameAppListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_get_game_id"
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
        public virtual DataSet GetGameAppListAppId(
             app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_get_app_id"
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
        public virtual DataSet GetGameAppListGameIdAppId(
             game_id
            ,  app_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@app_id", app_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_get_game_id_app_id"
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
        public virtual int CountProfileGameLocationUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationGameLocationId(
             game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_count_game_location_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_count_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocationProfileIdGameLocationId(
             profile_id
            ,  game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_count_profile_id_game_location_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileGameLocationListFilter(SearchFilter obj)  {
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
                , "usp_profile_game_location_browse_filter"
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
        public virtual bool SetProfileGameLocationUuid(string set_type, ProfileGameLocation obj)  {
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
                , "usp_profile_game_location_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileGameLocationUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_location_del_uuid"
                    , parameters
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
        public virtual DataSet GetProfileGameLocationListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_get_uuid"
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
        public virtual DataSet GetProfileGameLocationListGameLocationId(
             game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_get_game_location_id"
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
        public virtual DataSet GetProfileGameLocationListProfileId(
             profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_get_profile_id"
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
        public virtual DataSet GetProfileGameLocationListProfileIdGameLocationId(
             profile_id
            ,  game_location_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_location_id", game_location_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_get_profile_id_game_location_id"
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
        public virtual int CountGamePhotoUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoExternalId(
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoUrlExternalId(
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count_url_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhotoUuidExternalId(
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_count_uuid_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGamePhotoListFilter(SearchFilter obj)  {
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
                , "usp_game_photo_browse_filter"
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
        public virtual bool SetGamePhotoUuid(string set_type, GamePhoto obj)  {
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
                , "usp_game_photo_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoExternalId(string set_type, GamePhoto obj)  {
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
                , "usp_game_photo_set_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoUrl(string set_type, GamePhoto obj)  {
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
                , "usp_game_photo_set_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoUrlExternalId(string set_type, GamePhoto obj)  {
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
                , "usp_game_photo_set_url_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoUuidExternalId(string set_type, GamePhoto obj)  {
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
                , "usp_game_photo_set_uuid_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_photo_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoExternalId(
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_photo_del_external_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_photo_del_url"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoUrlExternalId(
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_photo_del_url_external_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGamePhotoUuidExternalId(
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_photo_del_uuid_external_id"
                    , parameters
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
        public virtual DataSet GetGamePhotoListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get_uuid"
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
        public virtual DataSet GetGamePhotoListExternalId(
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get_external_id"
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
        public virtual DataSet GetGamePhotoListUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get_url"
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
        public virtual DataSet GetGamePhotoListUrlExternalId(
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get_url_external_id"
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
        public virtual DataSet GetGamePhotoListUuidExternalId(
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_get_uuid_external_id"
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
        public virtual int CountGameVideoUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoExternalId(
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoUrlExternalId(
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count_url_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideoUuidExternalId(
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_count_uuid_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameVideoListFilter(SearchFilter obj)  {
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
                , "usp_game_video_browse_filter"
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
        public virtual bool SetGameVideoUuid(string set_type, GameVideo obj)  {
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
                , "usp_game_video_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoExternalId(string set_type, GameVideo obj)  {
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
                , "usp_game_video_set_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoUrl(string set_type, GameVideo obj)  {
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
                , "usp_game_video_set_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoUrlExternalId(string set_type, GameVideo obj)  {
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
                , "usp_game_video_set_url_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoUuidExternalId(string set_type, GameVideo obj)  {
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
                , "usp_game_video_set_uuid_external_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_video_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoExternalId(
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_video_del_external_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_video_del_url"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoUrlExternalId(
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_video_del_url_external_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameVideoUuidExternalId(
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_video_del_uuid_external_id"
                    , parameters
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
        public virtual DataSet GetGameVideoListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get_uuid"
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
        public virtual DataSet GetGameVideoListExternalId(
             external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get_external_id"
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
        public virtual DataSet GetGameVideoListUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get_url"
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
        public virtual DataSet GetGameVideoListUrlExternalId(
             url
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get_url_external_id"
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
        public virtual DataSet GetGameVideoListUuidExternalId(
             uuid
            ,  external_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@external_id", external_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_get_uuid_external_id"
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
        public virtual int CountGameRpgItemWeaponUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponUrlGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count_url_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeaponUuidGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_count_uuid_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameRpgItemWeaponListFilter(SearchFilter obj)  {
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
                , "usp_game_rpg_item_weapon_browse_filter"
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
        public virtual bool SetGameRpgItemWeaponUuid(string set_type, GameRpgItemWeapon obj)  {
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
                , "usp_game_rpg_item_weapon_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponGameId(string set_type, GameRpgItemWeapon obj)  {
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
                , "usp_game_rpg_item_weapon_set_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponUrl(string set_type, GameRpgItemWeapon obj)  {
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
                , "usp_game_rpg_item_weapon_set_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponUrlGameId(string set_type, GameRpgItemWeapon obj)  {
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
                , "usp_game_rpg_item_weapon_set_url_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponUuidGameId(string set_type, GameRpgItemWeapon obj)  {
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
                , "usp_game_rpg_item_weapon_set_uuid_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_weapon_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_weapon_del_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_weapon_del_url"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponUrlGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_weapon_del_url_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemWeaponUuidGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_weapon_del_uuid_game_id"
                    , parameters
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
        public virtual DataSet GetGameRpgItemWeaponListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get_uuid"
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
        public virtual DataSet GetGameRpgItemWeaponListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get_game_id"
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
        public virtual DataSet GetGameRpgItemWeaponListUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get_url"
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
        public virtual DataSet GetGameRpgItemWeaponListUrlGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get_url_game_id"
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
        public virtual DataSet GetGameRpgItemWeaponListUuidGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_get_uuid_game_id"
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
        public virtual int CountGameRpgItemSkillUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillUrlGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count_url_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkillUuidGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_count_uuid_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameRpgItemSkillListFilter(SearchFilter obj)  {
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
                , "usp_game_rpg_item_skill_browse_filter"
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
        public virtual bool SetGameRpgItemSkillUuid(string set_type, GameRpgItemSkill obj)  {
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
                , "usp_game_rpg_item_skill_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillGameId(string set_type, GameRpgItemSkill obj)  {
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
                , "usp_game_rpg_item_skill_set_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillUrl(string set_type, GameRpgItemSkill obj)  {
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
                , "usp_game_rpg_item_skill_set_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillUrlGameId(string set_type, GameRpgItemSkill obj)  {
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
                , "usp_game_rpg_item_skill_set_url_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillUuidGameId(string set_type, GameRpgItemSkill obj)  {
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
                , "usp_game_rpg_item_skill_set_uuid_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_skill_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_skill_del_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_skill_del_url"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillUrlGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_skill_del_url_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameRpgItemSkillUuidGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_rpg_item_skill_del_uuid_game_id"
                    , parameters
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
        public virtual DataSet GetGameRpgItemSkillListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get_uuid"
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
        public virtual DataSet GetGameRpgItemSkillListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get_game_id"
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
        public virtual DataSet GetGameRpgItemSkillListUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get_url"
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
        public virtual DataSet GetGameRpgItemSkillListUrlGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get_url_game_id"
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
        public virtual DataSet GetGameRpgItemSkillListUuidGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_get_uuid_game_id"
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
        public virtual int CountGameProductUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductUrlGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count_url_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProductUuidGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_count_uuid_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProductListFilter(SearchFilter obj)  {
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
                , "usp_game_product_browse_filter"
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
        public virtual bool SetGameProductUuid(string set_type, GameProduct obj)  {
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
                , "usp_game_product_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductGameId(string set_type, GameProduct obj)  {
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
                , "usp_game_product_set_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductUrl(string set_type, GameProduct obj)  {
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
                , "usp_game_product_set_url"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductUrlGameId(string set_type, GameProduct obj)  {
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
                , "usp_game_product_set_url_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductUuidGameId(string set_type, GameProduct obj)  {
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
                , "usp_game_product_set_uuid_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_product_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_product_del_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_product_del_url"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductUrlGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_product_del_url_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProductUuidGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_product_del_uuid_game_id"
                    , parameters
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
        public virtual DataSet GetGameProductListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get_uuid"
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
        public virtual DataSet GetGameProductListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get_game_id"
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
        public virtual DataSet GetGameProductListUrl(
             url
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get_url"
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
        public virtual DataSet GetGameProductListUrlGameId(
             url
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@url", url));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get_url_game_id"
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
        public virtual DataSet GetGameProductListUuidGameId(
             uuid
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_get_uuid_game_id"
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
        public virtual int CountGameStatisticLeaderboardUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardCodeGameIdProfileId(
             code
            ,  game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_code_game_id_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
             code
            ,  game_id
            ,  profile_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_code_game_id_profile_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameStatisticLeaderboardListFilter(SearchFilter obj)  {
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
                , "usp_game_statistic_leaderboard_browse_filter"
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
        public virtual bool SetGameStatisticLeaderboardUuid(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_set_uuid_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCode(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_set_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCodeGameId(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_set_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileId(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_set_code_game_id_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboard obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_set_code_game_id_profile_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardCodeGameIdProfileId(
             code
            ,  game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_del_code_game_id_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
             code
            ,  game_id
            ,  profile_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_del_code_game_id_profile_id_timestamp"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_del_profile_id_game_id"
                    , parameters
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
        public virtual DataSet GetGameStatisticLeaderboardListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_uuid"
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
        public virtual DataSet GetGameStatisticLeaderboardListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_game_id"
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
        public virtual DataSet GetGameStatisticLeaderboardListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_code"
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
        public virtual DataSet GetGameStatisticLeaderboardListCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_code_game_id"
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
        public virtual DataSet GetGameStatisticLeaderboardListCodeGameIdProfileId(
             code
            ,  game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_code_game_id_profile_id"
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
        public virtual DataSet GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
             code
            ,  game_id
            ,  profile_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_code_game_id_profile_id_timestamp"
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
        public virtual DataSet GetGameStatisticLeaderboardListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_profile_id_game_id"
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
        public virtual DataSet GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_get_profile_id_game_id_timestamp"
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
        public virtual int CountGameStatisticLeaderboardItem(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_count_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemCodeGameIdProfileId(
             code
            ,  game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_count_code_game_id_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
             code
            ,  game_id
            ,  profile_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_count_code_game_id_profile_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItemProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameStatisticLeaderboardItemListFilter(SearchFilter obj)  {
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
                , "usp_game_statistic_leaderboard_item_browse_filter"
                , "game_statistic_leaderboard_item"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemUuid(string set_type, GameStatisticLeaderboardItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_item_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboardItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_item_set_uuid_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCode(string set_type, GameStatisticLeaderboardItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_item_set_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameId(string set_type, GameStatisticLeaderboardItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_item_set_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileId(string set_type, GameStatisticLeaderboardItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_item_set_code_game_id_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboardItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_item_set_code_game_id_profile_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_item_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_item_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_item_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemCodeGameIdProfileId(
             code
            ,  game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_item_del_code_game_id_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
             code
            ,  game_id
            ,  profile_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_item_del_code_game_id_profile_id_timestamp"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_item_del_profile_id_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemList(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_get"
                , "game_statistic_leaderboard_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_get_uuid"
                , "game_statistic_leaderboard_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_get_game_id"
                , "game_statistic_leaderboard_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_get_code"
                , "game_statistic_leaderboard_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_get_code_game_id"
                , "game_statistic_leaderboard_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
             code
            ,  game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_get_code_game_id_profile_id"
                , "game_statistic_leaderboard_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
             code
            ,  game_id
            ,  profile_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_get_code_game_id_profile_id_timestamp"
                , "game_statistic_leaderboard_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_get_profile_id_game_id"
                , "game_statistic_leaderboard_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_item_get_profile_id_game_id_timestamp"
                , "game_statistic_leaderboard_item"
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
        public virtual int CountGameStatisticLeaderboardRollupUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
             code
            ,  game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_code_game_id_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
             code
            ,  game_id
            ,  profile_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_code_game_id_profile_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollupProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameStatisticLeaderboardRollupListFilter(SearchFilter obj)  {
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
                , "usp_game_statistic_leaderboard_rollup_browse_filter"
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
        public virtual bool SetGameStatisticLeaderboardRollupUuid(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_rollup_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_rollup_set_uuid_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCode(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_rollup_set_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameId(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_rollup_set_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileId(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_rollup_set_code_game_id_profile_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@rank", obj.rank));
            parameters.Add(new SqlParameter("@rank_change", obj.rank_change));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@rank_total_count", obj.rank_total_count));
            parameters.Add(new SqlParameter("@absolute_value", obj.absolute_value));
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
                , "usp_game_statistic_leaderboard_rollup_set_code_game_id_profile_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_rollup_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_rollup_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_rollup_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
             code
            ,  game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_rollup_del_code_game_id_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
             code
            ,  game_id
            ,  profile_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_rollup_del_code_game_id_profile_id_timestamp"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_leaderboard_rollup_del_profile_id_game_id"
                    , parameters
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
        public virtual DataSet GetGameStatisticLeaderboardRollupListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_uuid"
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
        public virtual DataSet GetGameStatisticLeaderboardRollupListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_game_id"
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
        public virtual DataSet GetGameStatisticLeaderboardRollupListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_code"
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
        public virtual DataSet GetGameStatisticLeaderboardRollupListCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_code_game_id"
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
        public virtual DataSet GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
             code
            ,  game_id
            ,  profile_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_code_game_id_profile_id"
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
        public virtual DataSet GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
             code
            ,  game_id
            ,  profile_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_code_game_id_profile_id_timestamp"
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
        public virtual DataSet GetGameStatisticLeaderboardRollupListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_profile_id_game_id"
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
        public virtual DataSet GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_leaderboard_rollup_get_profile_id_game_id_timestamp"
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
        public virtual int CountGameLiveQueueUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveQueueProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameLiveQueueListFilter(SearchFilter obj)  {
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
                , "usp_game_live_queue_browse_filter"
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
        public virtual bool SetGameLiveQueueUuid(string set_type, GameLiveQueue obj)  {
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
                , "usp_game_live_queue_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveQueueProfileIdGameId(string set_type, GameLiveQueue obj)  {
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
                , "usp_game_live_queue_set_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveQueueUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_live_queue_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveQueueProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_live_queue_del_profile_id_game_id"
                    , parameters
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
        public virtual DataSet GetGameLiveQueueListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_get_uuid"
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
        public virtual DataSet GetGameLiveQueueListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_get_game_id"
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
        public virtual DataSet GetGameLiveQueueListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_get_profile_id_game_id"
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
        public virtual int CountGameLiveRecentQueueUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveRecentQueueProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameLiveRecentQueueListFilter(SearchFilter obj)  {
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
                , "usp_game_live_recent_queue_browse_filter"
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
        public virtual bool SetGameLiveRecentQueueUuid(string set_type, GameLiveRecentQueue obj)  {
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
                , "usp_game_live_recent_queue_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveRecentQueueProfileIdGameId(string set_type, GameLiveRecentQueue obj)  {
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
                , "usp_game_live_recent_queue_set_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveRecentQueueUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_live_recent_queue_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLiveRecentQueueProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_live_recent_queue_del_profile_id_game_id"
                    , parameters
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
        public virtual DataSet GetGameLiveRecentQueueListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_get_uuid"
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
        public virtual DataSet GetGameLiveRecentQueueListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_get_game_id"
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
        public virtual DataSet GetGameLiveRecentQueueListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_get_profile_id_game_id"
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
        public virtual int CountGameProfileStatisticUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticCodeProfileIdGameId(
             code
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_code_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
             code
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_code_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProfileStatisticListFilter(SearchFilter obj)  {
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
                , "usp_game_profile_statistic_browse_filter"
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
        public virtual bool SetGameProfileStatisticUuid(string set_type, GameProfileStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticUuidProfileIdGameIdTimestamp(string set_type, GameProfileStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_uuid_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticProfileIdCode(string set_type, GameProfileStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_profile_id_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticProfileIdCodeTimestamp(string set_type, GameProfileStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_profile_id_code_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticCodeProfileIdGameIdTimestamp(string set_type, GameProfileStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_code_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticCodeProfileIdGameId(string set_type, GameProfileStatistic obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_code_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_del_profile_id_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticCodeProfileIdGameId(
             code
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_del_code_profile_id_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_uuid"
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
        public virtual DataSet GetGameProfileStatisticListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_code"
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
        public virtual DataSet GetGameProfileStatisticListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_game_id"
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
        public virtual DataSet GetGameProfileStatisticListCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_code_game_id"
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
        public virtual DataSet GetGameProfileStatisticListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_profile_id_game_id"
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
        public virtual DataSet GetGameProfileStatisticListProfileIdGameIdTimestamp(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_profile_id_game_id_timestamp"
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
        public virtual DataSet GetGameProfileStatisticListCodeProfileIdGameId(
             code
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_code_profile_id_game_id"
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
        public virtual DataSet GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
             code
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_code_profile_id_game_id_timestamp"
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
        public virtual int CountGameStatisticMetaUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMetaGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameStatisticMetaListFilter(SearchFilter obj)  {
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
                , "usp_game_statistic_meta_browse_filter"
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
        public virtual bool SetGameStatisticMetaUuid(string set_type, GameStatisticMeta obj)  {
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
                , "usp_game_statistic_meta_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticMetaCodeGameId(string set_type, GameStatisticMeta obj)  {
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
                , "usp_game_statistic_meta_set_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticMetaUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_meta_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticMetaCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_statistic_meta_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticMetaListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_uuid"
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
        public virtual DataSet GetGameStatisticMetaListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_code"
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
        public virtual DataSet GetGameStatisticMetaListName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_name"
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
        public virtual DataSet GetGameStatisticMetaListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_game_id"
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
        public virtual DataSet GetGameStatisticMetaListCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_get_code_game_id"
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
        public virtual int CountGameProfileStatisticItem(
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_count"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_count_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_count_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemCodeProfileIdGameId(
             code
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_count_code_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
             code
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_count_code_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProfileStatisticItemListFilter(SearchFilter obj)  {
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
                , "usp_game_profile_statistic_item_browse_filter"
                , "game_profile_statistic_item"
                , parameters
                );         
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
            
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemUuid(string set_type, GameProfileStatisticItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(string set_type, GameProfileStatisticItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_uuid_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemProfileIdCode(string set_type, GameProfileStatisticItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_profile_id_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemProfileIdCodeTimestamp(string set_type, GameProfileStatisticItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_profile_id_code_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(string set_type, GameProfileStatisticItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_code_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameId(string set_type, GameProfileStatisticItem obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
            parameters.Add(new SqlParameter("@active", obj.active));
            parameters.Add(new SqlParameter("@game_id", obj.game_id));
            parameters.Add(new SqlParameter("@data", obj.data));
            parameters.Add(new SqlParameter("@stat_value", obj.stat_value));
            parameters.Add(new SqlParameter("@uuid", obj.uuid));
            parameters.Add(new SqlParameter("@date_modified", obj.date_modified));
            parameters.Add(new SqlParameter("@level", obj.level));
            parameters.Add(new SqlParameter("@points", obj.points));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@date_created", obj.date_created));
            parameters.Add(new SqlParameter("@type", obj.type));
                        
            try { 
                return (bool)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_code_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_item_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_item_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_item_del_profile_id_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemCodeProfileIdGameId(
             code
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_statistic_item_del_code_profile_id_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_get_uuid"
                , "game_profile_statistic_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_get_code"
                , "game_profile_statistic_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_get_game_id"
                , "game_profile_statistic_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_get_code_game_id"
                , "game_profile_statistic_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_get_profile_id_game_id"
                , "game_profile_statistic_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_get_profile_id_game_id_timestamp"
                , "game_profile_statistic_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListCodeProfileIdGameId(
             code
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_get_code_profile_id_game_id"
                , "game_profile_statistic_item"
                , parameters
                );           
            }
            catch (Exception e){     
                log.Error(e);       
                return None;
            }
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
             code
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_get_code_profile_id_game_id_timestamp"
                , "game_profile_statistic_item"
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
        public virtual int CountGameKeyMetaUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_key"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMetaKeyGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_count_key_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameKeyMetaListFilter(SearchFilter obj)  {
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
                , "usp_game_key_meta_browse_filter"
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
        public virtual bool SetGameKeyMetaUuid(string set_type, GameKeyMeta obj)  {
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
                , "usp_game_key_meta_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaCodeGameId(string set_type, GameKeyMeta obj)  {
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
                , "usp_game_key_meta_set_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaKeyGameId(string set_type, GameKeyMeta obj)  {
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
                , "usp_game_key_meta_set_key_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaKeyGameIdLevel(string set_type, GameKeyMeta obj)  {
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
                , "usp_game_key_meta_set_key_game_id_level"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameKeyMetaUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_key_meta_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameKeyMetaCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_key_meta_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameKeyMetaKeyGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_key_meta_del_key_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_uuid"
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
        public virtual DataSet GetGameKeyMetaListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_code"
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
        public virtual DataSet GetGameKeyMetaListCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_code_game_id"
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
        public virtual DataSet GetGameKeyMetaListName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_name"
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
        public virtual DataSet GetGameKeyMetaListKey(
             key
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_key"
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
        public virtual DataSet GetGameKeyMetaListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_game_id"
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
        public virtual DataSet GetGameKeyMetaListKeyGameId(
             key
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@key", key));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_key_game_id"
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
        public virtual DataSet GetGameKeyMetaListCodeLevel(
             code
            ,  level
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@level", level));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_get_code_level"
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
        public virtual int CountGameLevelUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevelGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameLevelListFilter(SearchFilter obj)  {
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
                , "usp_game_level_browse_filter"
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
        public virtual bool SetGameLevelUuid(string set_type, GameLevel obj)  {
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
                , "usp_game_level_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLevelCodeGameId(string set_type, GameLevel obj)  {
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
                , "usp_game_level_set_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLevelUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_level_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLevelCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_level_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLevelListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_uuid"
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
        public virtual DataSet GetGameLevelListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_code"
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
        public virtual DataSet GetGameLevelListCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_code_game_id"
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
        public virtual DataSet GetGameLevelListName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_name"
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
        public virtual DataSet GetGameLevelListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_get_game_id"
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
        public virtual int CountGameProfileAchievementUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementProfileIdCode(
             profile_id
            ,  code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_profile_id_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementUsername(
             username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@username", username));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_username"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementCodeProfileIdGameId(
             code
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_code_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
             code
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_code_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProfileAchievementListFilter(SearchFilter obj)  {
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
                , "usp_game_profile_achievement_browse_filter"
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
        public virtual bool SetGameProfileAchievementUuid(string set_type, GameProfileAchievement obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@completed", obj.completed));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
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
                , "usp_game_profile_achievement_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementUuidCode(string set_type, GameProfileAchievement obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@completed", obj.completed));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
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
                , "usp_game_profile_achievement_set_uuid_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementProfileIdCode(string set_type, GameProfileAchievement obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@completed", obj.completed));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
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
                , "usp_game_profile_achievement_set_profile_id_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementCodeProfileIdGameId(string set_type, GameProfileAchievement obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@completed", obj.completed));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
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
                , "usp_game_profile_achievement_set_code_profile_id_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementCodeProfileIdGameIdTimestamp(string set_type, GameProfileAchievement obj)  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();
            parameters.Add(new SqlParameter("@set_type", set_type));
            parameters.Add(new SqlParameter("@status", obj.status));
            parameters.Add(new SqlParameter("@username", obj.username));
            parameters.Add(new SqlParameter("@code", obj.code));
            parameters.Add(new SqlParameter("@timestamp", obj.timestamp));
            parameters.Add(new SqlParameter("@completed", obj.completed));
            parameters.Add(new SqlParameter("@profile_id", obj.profile_id));
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
                , "usp_game_profile_achievement_set_code_profile_id_game_id_timestamp"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_achievement_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementProfileIdCode(
             profile_id
            ,  code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_achievement_del_profile_id_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileAchievementUuidCode(
             uuid
            ,  code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            parameters.Add(new SqlParameter("@code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_achievement_del_uuid_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_uuid"
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
        public virtual DataSet GetGameProfileAchievementListProfileIdCode(
             profile_id
            ,  code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_profile_id_code"
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
        public virtual DataSet GetGameProfileAchievementListUsername(
             username
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@username", username));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_username"
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
        public virtual DataSet GetGameProfileAchievementListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_code"
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
        public virtual DataSet GetGameProfileAchievementListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_game_id"
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
        public virtual DataSet GetGameProfileAchievementListCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_code_game_id"
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
        public virtual DataSet GetGameProfileAchievementListProfileIdGameId(
             profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_profile_id_game_id"
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
        public virtual DataSet GetGameProfileAchievementListProfileIdGameIdTimestamp(
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_profile_id_game_id_timestamp"
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
        public virtual DataSet GetGameProfileAchievementListCodeProfileIdGameId(
             code
            ,  profile_id
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_code_profile_id_game_id"
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
        public virtual DataSet GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
             code
            ,  profile_id
            ,  game_id
            ,  timestamp
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@profile_id", profile_id));
            parameters.Add(new SqlParameter("@game_id", game_id));
            parameters.Add(new SqlParameter("@timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_code_profile_id_game_id_timestamp"
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
        public virtual int CountGameAchievementMetaUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_code"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@name", name));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_name"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMetaGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {        
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_count_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return 0;
            }    
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameAchievementMetaListFilter(SearchFilter obj)  {
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
                , "usp_game_achievement_meta_browse_filter"
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
        public virtual bool SetGameAchievementMetaUuid(string set_type, GameAchievementMeta obj)  {
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
                , "usp_game_achievement_meta_set_uuid"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementMetaCodeGameId(string set_type, GameAchievementMeta obj)  {
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
                , "usp_game_achievement_meta_set_code_game_id"
                , parameters
                );          
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
            
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementMetaUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_achievement_meta_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameAchievementMetaCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_achievement_meta_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){     
                log.Error(e);       
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementMetaListUuid(
             uuid
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_uuid"
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
        public virtual DataSet GetGameAchievementMetaListCode(
             code
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_code"
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
        public virtual DataSet GetGameAchievementMetaListCodeGameId(
             code
            ,  game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@code", code));
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_code_game_id"
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
        public virtual DataSet GetGameAchievementMetaListName(
             name
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_name"
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
        public virtual DataSet GetGameAchievementMetaListGameId(
             game_id
        )  {
            List<SqlParameter> parameters 
                = new List<SqlParameter>();                        
            parameters.Add(new SqlParameter("@game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_get_game_id"
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




