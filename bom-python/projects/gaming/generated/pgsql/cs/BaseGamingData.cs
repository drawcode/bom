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

using gaming;
using gaming.ent;

namespace gaming {

    public class BaseGamingData {
        
	private static readonly log4net.ILog log = log4net.LogManager.GetLogger("main");
    
        DataProvider data = new DataProvider();
        public static string connectionString = CoreConfig.GetConnectionStringByName("gaming");
                
        public BaseGamingData(){
        }
        
//------------------------------------------------------------------------------                    
        public virtual int CountGame(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
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
        public virtual int CountGameByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
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
        public virtual int CountGameByAppId(
            string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
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
        public virtual int CountGameByOrgIdByAppId(
            string org_id
            , string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
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
        public virtual DataSet BrowseGameListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByUuid(string set_type, Game obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByCode(string set_type, Game obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByName(string set_type, Game obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_name"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByOrgId(string set_type, Game obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_org_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByAppId(string set_type, Game obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_app_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameByOrgIdByAppId(string set_type, Game obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_set_org_id_app_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual bool DelGameByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
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
        public virtual bool DelGameByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
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
        public virtual bool DelGameByAppId(
            string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
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
        public virtual bool DelGameByOrgIdByAppId(
            string org_id
            , string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByAppId(
            string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameListByOrgIdByAppId(
            string org_id
            , string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategory(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameCategoryByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameCategoryByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
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
        public virtual int CountGameCategoryByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
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
        public virtual int CountGameCategoryByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
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
        public virtual int CountGameCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
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
        public virtual DataSet BrowseGameCategoryListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryByUuid(string set_type, GameCategory obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_set_uuid"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameCategoryByCodeByOrgId(
            string code
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
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
        public virtual bool DelGameCategoryByCodeByOrgIdByTypeId(
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByTypeId(
            string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_type_id", type_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryTree(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameCategoryTreeByParentId(
            string parent_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
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
        public virtual int CountGameCategoryTreeByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
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
        public virtual int CountGameCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
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
        public virtual DataSet BrowseGameCategoryTreeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryTreeByUuid(string set_type, GameCategoryTree obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_tree_set_uuid"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameCategoryTreeByParentId(
            string parent_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
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
        public virtual bool DelGameCategoryTreeByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
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
        public virtual bool DelGameCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryTreeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryTreeListByParentId(
            string parent_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryTreeListByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_parent_id", parent_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameCategoryAssoc(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameCategoryAssocByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameCategoryAssocByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
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
        public virtual int CountGameCategoryAssocByGameIdByCategoryId(
            string game_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
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
        public virtual DataSet BrowseGameCategoryAssocListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameCategoryAssocByUuid(string set_type, GameCategoryAssoc obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_category_id", obj.category_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_category_assoc_set_uuid"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryAssocListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryAssocListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryAssocListByCategoryId(
            string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameCategoryAssocListByGameIdByCategoryId(
            string game_id
            , string category_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_category_id", category_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameType(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameTypeByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
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
        public virtual DataSet BrowseGameTypeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameTypeByUuid(string set_type, GameType obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_type_set_uuid"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameTypeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameTypeListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGame(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountProfileGameByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountProfileGameByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
        public virtual int CountProfileGameByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseProfileGameListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameByUuid(string set_type, ProfileGame obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_game_profile", obj.game_profile));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_profile_version", obj.profile_version));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_set_uuid"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetwork(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameNetworkByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameNetworkByUuidByType(
            string uuid
            , string type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_type", type));
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
        public virtual DataSet BrowseGameNetworkListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkByUuid(string set_type, GameNetwork obj)  {
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
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_secret", obj.secret));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkByCode(string set_type, GameNetwork obj)  {
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
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_secret", obj.secret));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_set_code"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkListByUuidByType(
            string uuid
            , string type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_type", type));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameNetworkAuth(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameNetworkAuthByGameIdByGameNetworkId(
            string game_id
            , string game_network_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", game_network_id));
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
        public virtual DataSet BrowseGameNetworkAuthListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkAuthByUuid(string set_type, GameNetworkAuth obj)  {
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
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", obj.game_network_id));
            parameters.Add(new NpgsqlParameter("in_secret", obj.secret));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameNetworkAuthByGameIdByGameNetworkId(string set_type, GameNetworkAuth obj)  {
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
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", obj.game_network_id));
            parameters.Add(new NpgsqlParameter("in_secret", obj.secret));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_network_auth_set_game_id_game_network_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkAuthListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameNetworkAuthListByGameIdByGameNetworkId(
            string game_id
            , string game_network_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", game_network_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetwork(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountProfileGameNetworkByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountProfileGameNetworkByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
        public virtual int CountProfileGameNetworkByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountProfileGameNetworkByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", game_network_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_profile_id_game_id_game_network_"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_network_username", network_username));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", game_network_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_count_network_username_game_id_game_ne"
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkByUuid(string set_type, ProfileGameNetwork obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", obj.game_network_id));
            parameters.Add(new NpgsqlParameter("in_network_username", obj.network_username));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_network_fullname", obj.network_fullname));
            parameters.Add(new NpgsqlParameter("in_secret", obj.secret));
            parameters.Add(new NpgsqlParameter("in_token", obj.token));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_network_auth", obj.network_auth));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_network_user_id", obj.network_user_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkByProfileIdByGameId(string set_type, ProfileGameNetwork obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", obj.game_network_id));
            parameters.Add(new NpgsqlParameter("in_network_username", obj.network_username));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_network_fullname", obj.network_fullname));
            parameters.Add(new NpgsqlParameter("in_secret", obj.secret));
            parameters.Add(new NpgsqlParameter("in_token", obj.token));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_network_auth", obj.network_auth));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_network_user_id", obj.network_user_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_set_profile_id_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(string set_type, ProfileGameNetwork obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", obj.game_network_id));
            parameters.Add(new NpgsqlParameter("in_network_username", obj.network_username));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_network_fullname", obj.network_fullname));
            parameters.Add(new NpgsqlParameter("in_secret", obj.secret));
            parameters.Add(new NpgsqlParameter("in_token", obj.token));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_network_auth", obj.network_auth));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_network_user_id", obj.network_user_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_set_profile_id_game_id_game_network_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(string set_type, ProfileGameNetwork obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", obj.game_network_id));
            parameters.Add(new NpgsqlParameter("in_network_username", obj.network_username));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_network_fullname", obj.network_fullname));
            parameters.Add(new NpgsqlParameter("in_secret", obj.secret));
            parameters.Add(new NpgsqlParameter("in_token", obj.token));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_network_auth", obj.network_auth));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_network_user_id", obj.network_user_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_set_network_username_game_id_game_netw"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelProfileGameNetworkByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", game_network_id));
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
        public virtual bool DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_network_username", network_username));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", game_network_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_game_network_del_network_username_game_id_game_netw"
                    , parameters
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameNetworkListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameNetworkListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameNetworkListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameNetworkListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", game_network_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_network_username", network_username));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_game_network_id", game_network_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_network_get_network_username_game_id_game_netw"
                , "profile_game_network"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameDataAttribute(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountProfileGameDataAttributeByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
        public virtual int CountProfileGameDataAttributeByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual DataSet BrowseProfileGameDataAttributeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeByUuid(string set_type, ProfileGameDataAttribute obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_val", obj.val));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_otype", obj.otype));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeByProfileId(string set_type, ProfileGameDataAttribute obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_val", obj.val));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_otype", obj.otype));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_set_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameDataAttributeByProfileIdByGameIdByCode(string set_type, ProfileGameDataAttribute obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_val", obj.val));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_otype", obj.otype));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_data_attribute_set_profile_id_game_id_code"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelProfileGameDataAttributeByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
        public virtual bool DelProfileGameDataAttributeByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual DataSet GetProfileGameDataAttributeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameDataAttributeListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameSession(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameSessionByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameSessionByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
        public virtual int CountGameSessionByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseGameSessionListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameSessionByUuid(string set_type, GameSession obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_game_area", obj.game_area));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_network_uuid", obj.network_uuid));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_game_level", obj.game_level));
            parameters.Add(new NpgsqlParameter("in_profile_network", obj.profile_network));
            parameters.Add(new NpgsqlParameter("in_profile_device", obj.profile_device));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_network_external_port", obj.network_external_port));
            parameters.Add(new NpgsqlParameter("in_game_players_connected", obj.game_players_connected));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_game_state", obj.game_state));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_network_external_ip", obj.network_external_ip));
            parameters.Add(new NpgsqlParameter("in_profile_username", obj.profile_username));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_code", obj.game_code));
            parameters.Add(new NpgsqlParameter("in_game_player_z", obj.game_player_z));
            parameters.Add(new NpgsqlParameter("in_game_player_x", obj.game_player_x));
            parameters.Add(new NpgsqlParameter("in_game_player_y", obj.game_player_y));
            parameters.Add(new NpgsqlParameter("in_network_port", obj.network_port));
            parameters.Add(new NpgsqlParameter("in_game_players_allowed", obj.game_players_allowed));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_network_ip", obj.network_ip));
            parameters.Add(new NpgsqlParameter("in_network_use_nat", obj.network_use_nat));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_set_uuid"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameSessionListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameSessionListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameSessionListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameSessionListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameSessionData(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual DataSet BrowseGameSessionDataListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameSessionDataByUuid(string set_type, GameSessionData obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data_results", obj.data_results));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_data_layer_projectile", obj.data_layer_projectile));
            parameters.Add(new NpgsqlParameter("in_data_layer_actors", obj.data_layer_actors));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_data_layer_enemy", obj.data_layer_enemy));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_session_data_set_uuid"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameSessionDataListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameContent(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameContentByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameContentByGameIdByPath(
            string game_id
            , string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
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
        public virtual int CountGameContentByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
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
        public virtual int CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_increment", increment));
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
        public virtual DataSet BrowseGameContentListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByUuid(string set_type, GameContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameId(string set_type, GameContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_set_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameIdByPath(string set_type, GameContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_set_game_id_path"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameIdByPathByVersion(string set_type, GameContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_set_game_id_path_version"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameContentByGameIdByPathByVersionByPlatformByIncrement(string set_type, GameContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_content_set_game_id_path_version_platform_increment"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameContentByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameContentByGameIdByPath(
            string game_id
            , string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
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
        public virtual bool DelGameContentByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
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
        public virtual bool DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_increment", increment));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameContentListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameContentListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameContentListByGameIdByPath(
            string game_id
            , string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameContentListByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
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
                return null;
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_increment", increment));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileContent(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameProfileContentByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
        public virtual int CountGameProfileContentByGameIdByUsername(
            string game_id
            , string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
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
        public virtual int CountGameProfileContentByUsername(
            string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_username", username));
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
        public virtual int CountGameProfileContentByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
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
        public virtual int CountGameProfileContentByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
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
        public virtual int CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_increment", increment));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_game_id_profile_id_path_version_"
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_path", path));
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
        public virtual int CountGameProfileContentByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
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
        public virtual int CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_increment", increment));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_count_game_id_username_path_version_pl"
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByUuid(string set_type, GameProfileContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_game_network", obj.game_network));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileId(string set_type, GameProfileContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_game_network", obj.game_network));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_game_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsername(string set_type, GameProfileContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_game_network", obj.game_network));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_game_id_username"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByUsername(string set_type, GameProfileContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_game_network", obj.game_network));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_username"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPath(string set_type, GameProfileContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_game_network", obj.game_network));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_game_id_profile_id_path"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersion(string set_type, GameProfileContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_game_network", obj.game_network));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_game_id_profile_id_path_version"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(string set_type, GameProfileContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_game_network", obj.game_network));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_game_id_profile_id_path_version_pl"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPath(string set_type, GameProfileContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_game_network", obj.game_network));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_game_id_username_path"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersion(string set_type, GameProfileContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_game_network", obj.game_network));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_game_id_username_path_version"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(string set_type, GameProfileContent obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_increment", obj.increment));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_platform", obj.platform));
            parameters.Add(new NpgsqlParameter("in_filename", obj.filename));
            parameters.Add(new NpgsqlParameter("in_source", obj.source));
            parameters.Add(new NpgsqlParameter("in_version", obj.version));
            parameters.Add(new NpgsqlParameter("in_game_network", obj.game_network));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_hash", obj.hash));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_extension", obj.extension));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_set_game_id_username_path_version_plat"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameProfileContentByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
        public virtual bool DelGameProfileContentByGameIdByUsername(
            string game_id
            , string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
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
        public virtual bool DelGameProfileContentByUsername(
            string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_username", username));
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
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
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
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
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
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_increment", increment));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_game_id_profile_id_path_version_pl"
                    , parameters
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_path", path));
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
        public virtual bool DelGameProfileContentByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
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
        public virtual bool DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_increment", increment));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_profile_content_del_game_id_username_path_version_plat"
                    , parameters
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByUsername(
            string game_id
            , string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByUsername(
            string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_username", username));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
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
                return null;
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_increment", increment));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_game_id_profile_id_path_version_pl"
                , "game_profile_content"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_path", path));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileContentListByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
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
                return null;
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_username", username));
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_version", version));
            parameters.Add(new NpgsqlParameter("in_platform", platform));
            parameters.Add(new NpgsqlParameter("in_increment", increment));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_content_get_game_id_username_path_version_plat"
                , "game_profile_content"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameApp(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameAppByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameAppByAppId(
            string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
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
        public virtual int CountGameAppByGameIdByAppId(
            string game_id
            , string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
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
        public virtual DataSet BrowseGameAppListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAppByUuid(string set_type, GameApp obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_app_id", obj.app_id));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_app_set_uuid"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAppListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAppListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAppListByAppId(
            string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAppListByGameIdByAppId(
            string game_id
            , string app_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_app_id", app_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileGameLocation(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountProfileGameLocationByGameLocationId(
            string game_location_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_location_id", game_location_id));
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
        public virtual int CountProfileGameLocationByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
        public virtual int CountProfileGameLocationByProfileIdByGameLocationId(
            string profile_id
            , string game_location_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_location_id", game_location_id));
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
        public virtual DataSet BrowseProfileGameLocationListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileGameLocationByUuid(string set_type, ProfileGameLocation obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_game_location_id", obj.game_location_id));
            parameters.Add(new NpgsqlParameter("in_type_id", obj.type_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_game_location_set_uuid"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameLocationListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameLocationListByGameLocationId(
            string game_location_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_location_id", game_location_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameLocationListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileGameLocationListByProfileIdByGameLocationId(
            string profile_id
            , string game_location_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_location_id", game_location_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGamePhoto(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGamePhotoByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
        public virtual int CountGamePhotoByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
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
        public virtual int CountGamePhotoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
        public virtual int CountGamePhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
        public virtual DataSet BrowseGamePhotoListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUuid(string set_type, GamePhoto obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByExternalId(string set_type, GamePhoto obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_set_external_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUrl(string set_type, GamePhoto obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_set_url"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUrlByExternalId(string set_type, GamePhoto obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_set_url_external_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGamePhotoByUuidByExternalId(string set_type, GamePhoto obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_photo_set_uuid_external_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGamePhotoByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
        public virtual bool DelGamePhotoByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
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
        public virtual bool DelGamePhotoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
        public virtual bool DelGamePhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoListByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoListByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGamePhotoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameVideo(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameVideoByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
        public virtual int CountGameVideoByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
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
        public virtual int CountGameVideoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
        public virtual int CountGameVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
        public virtual DataSet BrowseGameVideoListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUuid(string set_type, GameVideo obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByExternalId(string set_type, GameVideo obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_set_external_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUrl(string set_type, GameVideo obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_set_url"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUrlByExternalId(string set_type, GameVideo obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_set_url_external_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameVideoByUuidByExternalId(string set_type, GameVideo obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_video_set_uuid_external_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameVideoByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
        public virtual bool DelGameVideoByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
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
        public virtual bool DelGameVideoByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
        public virtual bool DelGameVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoListByExternalId(
            string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoListByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameVideoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_external_id", external_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemWeapon(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameRpgItemWeaponByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameRpgItemWeaponByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
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
        public virtual int CountGameRpgItemWeaponByUrlByGameId(
            string url
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameRpgItemWeaponByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseGameRpgItemWeaponListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUuid(string set_type, GameRpgItemWeapon obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_game_defense", obj.game_defense));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_attack", obj.game_attack));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_game_price", obj.game_price));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_game_skill", obj.game_skill));
            parameters.Add(new NpgsqlParameter("in_game_health", obj.game_health));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_energy", obj.game_energy));
            parameters.Add(new NpgsqlParameter("in_game_data", obj.game_data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByGameId(string set_type, GameRpgItemWeapon obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_game_defense", obj.game_defense));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_attack", obj.game_attack));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_game_price", obj.game_price));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_game_skill", obj.game_skill));
            parameters.Add(new NpgsqlParameter("in_game_health", obj.game_health));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_energy", obj.game_energy));
            parameters.Add(new NpgsqlParameter("in_game_data", obj.game_data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_set_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUrl(string set_type, GameRpgItemWeapon obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_game_defense", obj.game_defense));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_attack", obj.game_attack));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_game_price", obj.game_price));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_game_skill", obj.game_skill));
            parameters.Add(new NpgsqlParameter("in_game_health", obj.game_health));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_energy", obj.game_energy));
            parameters.Add(new NpgsqlParameter("in_game_data", obj.game_data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_set_url"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUrlByGameId(string set_type, GameRpgItemWeapon obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_game_defense", obj.game_defense));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_attack", obj.game_attack));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_game_price", obj.game_price));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_game_skill", obj.game_skill));
            parameters.Add(new NpgsqlParameter("in_game_health", obj.game_health));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_energy", obj.game_energy));
            parameters.Add(new NpgsqlParameter("in_game_data", obj.game_data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_set_url_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemWeaponByUuidByGameId(string set_type, GameRpgItemWeapon obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_game_defense", obj.game_defense));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_attack", obj.game_attack));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_game_price", obj.game_price));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_game_skill", obj.game_skill));
            parameters.Add(new NpgsqlParameter("in_game_health", obj.game_health));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_energy", obj.game_energy));
            parameters.Add(new NpgsqlParameter("in_game_data", obj.game_data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_weapon_set_uuid_game_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameRpgItemWeaponByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameRpgItemWeaponByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
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
        public virtual bool DelGameRpgItemWeaponByUrlByGameId(
            string url
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameRpgItemWeaponByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemWeaponListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemWeaponListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemWeaponListByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemWeaponListByUrlByGameId(
            string url
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemWeaponListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameRpgItemSkill(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameRpgItemSkillByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameRpgItemSkillByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
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
        public virtual int CountGameRpgItemSkillByUrlByGameId(
            string url
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameRpgItemSkillByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseGameRpgItemSkillListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUuid(string set_type, GameRpgItemSkill obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_game_defense", obj.game_defense));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_attack", obj.game_attack));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_game_price", obj.game_price));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_game_skill", obj.game_skill));
            parameters.Add(new NpgsqlParameter("in_game_health", obj.game_health));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_energy", obj.game_energy));
            parameters.Add(new NpgsqlParameter("in_game_data", obj.game_data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByGameId(string set_type, GameRpgItemSkill obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_game_defense", obj.game_defense));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_attack", obj.game_attack));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_game_price", obj.game_price));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_game_skill", obj.game_skill));
            parameters.Add(new NpgsqlParameter("in_game_health", obj.game_health));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_energy", obj.game_energy));
            parameters.Add(new NpgsqlParameter("in_game_data", obj.game_data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_set_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUrl(string set_type, GameRpgItemSkill obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_game_defense", obj.game_defense));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_attack", obj.game_attack));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_game_price", obj.game_price));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_game_skill", obj.game_skill));
            parameters.Add(new NpgsqlParameter("in_game_health", obj.game_health));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_energy", obj.game_energy));
            parameters.Add(new NpgsqlParameter("in_game_data", obj.game_data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_set_url"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUrlByGameId(string set_type, GameRpgItemSkill obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_game_defense", obj.game_defense));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_attack", obj.game_attack));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_game_price", obj.game_price));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_game_skill", obj.game_skill));
            parameters.Add(new NpgsqlParameter("in_game_health", obj.game_health));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_energy", obj.game_energy));
            parameters.Add(new NpgsqlParameter("in_game_data", obj.game_data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_set_url_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameRpgItemSkillByUuidByGameId(string set_type, GameRpgItemSkill obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_third_party_oembed", obj.third_party_oembed));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_game_defense", obj.game_defense));
            parameters.Add(new NpgsqlParameter("in_third_party_url", obj.third_party_url));
            parameters.Add(new NpgsqlParameter("in_third_party_id", obj.third_party_id));
            parameters.Add(new NpgsqlParameter("in_content_type", obj.content_type));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_game_attack", obj.game_attack));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_third_party_data", obj.third_party_data));
            parameters.Add(new NpgsqlParameter("in_game_price", obj.game_price));
            parameters.Add(new NpgsqlParameter("in_game_type", obj.game_type));
            parameters.Add(new NpgsqlParameter("in_game_skill", obj.game_skill));
            parameters.Add(new NpgsqlParameter("in_game_health", obj.game_health));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_energy", obj.game_energy));
            parameters.Add(new NpgsqlParameter("in_game_data", obj.game_data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_rpg_item_skill_set_uuid_game_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameRpgItemSkillByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameRpgItemSkillByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
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
        public virtual bool DelGameRpgItemSkillByUrlByGameId(
            string url
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameRpgItemSkillByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemSkillListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemSkillListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemSkillListByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemSkillListByUrlByGameId(
            string url
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameRpgItemSkillListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameProduct(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameProductByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProductByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
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
        public virtual int CountGameProductByUrlByGameId(
            string url
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProductByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseGameProductListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUuid(string set_type, GameProduct obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByGameId(string set_type, GameProduct obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_set_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUrl(string set_type, GameProduct obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_set_url"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUrlByGameId(string set_type, GameProduct obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_set_url_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProductByUuidByGameId(string set_type, GameProduct obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_product_set_uuid_game_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameProductByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameProductByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
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
        public virtual bool DelGameProductByUrlByGameId(
            string url
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameProductByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProductListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProductListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProductListByUrl(
            string url
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProductListByUrlByGameId(
            string url
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_url", url));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProductListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboard(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_count_game_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_count_code_game_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_count_code_game_id_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_count_code_game_id_profile_id_timestamp"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_count_profile_id_game_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameLeaderboardListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_browse_filter"
                , "game_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByUuid(string set_type, GameLeaderboard obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(string set_type, GameLeaderboard obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_set_uuid_profile_id_game_id_timestamp"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByCode(string set_type, GameLeaderboard obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByCodeByGameId(string set_type, GameLeaderboard obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_set_code_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByCodeByGameIdByProfileId(string set_type, GameLeaderboard obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_set_code_game_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(string set_type, GameLeaderboard obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_set_code_game_id_profile_id_timestamp"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_del_code_game_id_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_del_code_game_id_profile_id_timestamp"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_del_profile_id_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_get"
                , "game_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_get_uuid"
                , "game_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_get_game_id"
                , "game_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_get_code"
                , "game_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_get_code_game_id"
                , "game_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_get_code_game_id_profile_id"
                , "game_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_get_code_game_id_profile_id_timestamp"
                , "game_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_get_profile_id_game_id"
                , "game_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_get_profile_id_game_id_timestamp"
                , "game_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItem(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_count_game_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_count_code_game_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_count_code_game_id_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_count_code_game_id_profile_id_timesta"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_count_profile_id_game_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameLeaderboardItemListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_browse_filter"
                , "game_leaderboard_item"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByUuid(string set_type, GameLeaderboardItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(string set_type, GameLeaderboardItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_set_uuid_profile_id_game_id_timestamp"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByCode(string set_type, GameLeaderboardItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByCodeByGameId(string set_type, GameLeaderboardItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_set_code_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByCodeByGameIdByProfileId(string set_type, GameLeaderboardItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_set_code_game_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(string set_type, GameLeaderboardItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_set_code_game_id_profile_id_timestamp"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_item_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_item_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_item_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_item_del_code_game_id_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_item_del_code_game_id_profile_id_timestamp"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_item_del_profile_id_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardItemList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_get"
                , "game_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardItemListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_get_uuid"
                , "game_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardItemListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_get_game_id"
                , "game_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardItemListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_get_code"
                , "game_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardItemListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_get_code_game_id"
                , "game_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardItemListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_get_code_game_id_profile_id"
                , "game_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_get_code_game_id_profile_id_timestamp"
                , "game_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardItemListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_get_profile_id_game_id"
                , "game_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_item_get_profile_id_game_id_timestamp"
                , "game_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollup(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_count_game_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_count_code_game_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_count_code_game_id_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_count_code_game_id_profile_id_times"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountGameLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_count_profile_id_game_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameLeaderboardRollupListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_browse_filter"
                , "game_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByUuid(string set_type, GameLeaderboardRollup obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(string set_type, GameLeaderboardRollup obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_set_uuid_profile_id_game_id_timesta"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByCode(string set_type, GameLeaderboardRollup obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByCodeByGameId(string set_type, GameLeaderboardRollup obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_set_code_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByCodeByGameIdByProfileId(string set_type, GameLeaderboardRollup obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_set_code_game_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(string set_type, GameLeaderboardRollup obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_rank", obj.rank));
            parameters.Add(new NpgsqlParameter("in_rank_change", obj.rank_change));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_rank_total_count", obj.rank_total_count));
            parameters.Add(new NpgsqlParameter("in_absolute_value", obj.absolute_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_network", obj.network));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_set_code_game_id_profile_id_timesta"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_rollup_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_rollup_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_rollup_del_code_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_rollup_del_code_game_id_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_rollup_del_code_game_id_profile_id_timesta"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelGameLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_game_leaderboard_rollup_del_profile_id_game_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardRollupList(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_get"
                , "game_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardRollupListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_get_uuid"
                , "game_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardRollupListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_get_game_id"
                , "game_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardRollupListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_get_code"
                , "game_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardRollupListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_get_code_game_id"
                , "game_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_get_code_game_id_profile_id"
                , "game_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_get_code_game_id_profile_id_timesta"
                , "game_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardRollupListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_get_profile_id_game_id"
                , "game_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_leaderboard_rollup_get_profile_id_game_id_timestamp"
                , "game_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveQueue(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameLiveQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseGameLiveQueueListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveQueueByUuid(string set_type, GameLiveQueue obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_data_stat", obj.data_stat));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_data_ad", obj.data_ad));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveQueueByProfileIdByGameId(string set_type, GameLiveQueue obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_data_stat", obj.data_stat));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_data_ad", obj.data_ad));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_queue_set_profile_id_game_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameLiveQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveQueueListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveQueueListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveQueueListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameLiveRecentQueue(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameLiveRecentQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseGameLiveRecentQueueListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveRecentQueueByUuid(string set_type, GameLiveRecentQueue obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_game", obj.game));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLiveRecentQueueByProfileIdByGameId(string set_type, GameLiveRecentQueue obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_game", obj.game));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_live_recent_queue_set_profile_id_game_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameLiveRecentQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveRecentQueueListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveRecentQueueListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLiveRecentQueueListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatistic(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameProfileStatisticByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameProfileStatisticByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProfileStatisticByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProfileStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProfileStatisticByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_count_code_profile_id_game_id_timest"
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByUuid(string set_type, GameProfileStatistic obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatistic obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_uuid_profile_id_game_id_timestam"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByProfileIdByCode(string set_type, GameProfileStatistic obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_profile_id_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByProfileIdByCodeByTimestamp(string set_type, GameProfileStatistic obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_profile_id_code_timestamp"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatistic obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_code_profile_id_game_id_timestam"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticByCodeByProfileIdByGameId(string set_type, GameProfileStatistic obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_set_code_profile_id_game_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameProfileStatisticByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameProfileStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameProfileStatisticByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet GetGameProfileStatisticListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_get_code_profile_id_game_id_timestam"
                , "game_profile_statistic"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticMeta(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameStatisticMetaByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameStatisticMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameStatisticMetaByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
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
        public virtual int CountGameStatisticMetaByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseGameStatisticMetaListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticMetaByUuid(string set_type, GameStatisticMeta obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_store_count", obj.store_count));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticMetaByCodeByGameId(string set_type, GameStatisticMeta obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_store_count", obj.store_count));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_statistic_meta_set_code_game_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameStatisticMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet GetGameStatisticMetaListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticMetaListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticMetaListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticMetaListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticMetaListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileStatisticItem(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
        public virtual int CountGameProfileStatisticItemByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameProfileStatisticItemByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameProfileStatisticItemByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProfileStatisticItemByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProfileStatisticItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProfileStatisticItemByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_count_code_profile_id_game_id_t"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseGameProfileStatisticItemListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByUuid(string set_type, GameProfileStatisticItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatisticItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_uuid_profile_id_game_id_tim"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByProfileIdByCode(string set_type, GameProfileStatisticItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_profile_id_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(string set_type, GameProfileStatisticItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_profile_id_code_timestamp"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatisticItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_code_profile_id_game_id_tim"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileStatisticItemByCodeByProfileIdByGameId(string set_type, GameProfileStatisticItem obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_stat_value_formatted", obj.stat_value_formatted));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_stat_value", obj.stat_value));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_set_code_profile_id_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameProfileStatisticItemByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameProfileStatisticItemByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameProfileStatisticItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameProfileStatisticItemByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet GetGameProfileStatisticItemListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_get_profile_id_game_id_timestam"
                , "game_profile_statistic_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_statistic_item_get_code_profile_id_game_id_tim"
                , "game_profile_statistic_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameKeyMeta(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameKeyMetaByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameKeyMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameKeyMetaByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
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
        public virtual int CountGameKeyMetaByKey(
            string key
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_key", key));
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
        public virtual int CountGameKeyMetaByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameKeyMetaByKeyByGameId(
            string key
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_key", key));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseGameKeyMetaListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaByUuid(string set_type, GameKeyMeta obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_key_level", obj.key_level));
            parameters.Add(new NpgsqlParameter("in_store_count", obj.store_count));
            parameters.Add(new NpgsqlParameter("in_key", obj.key));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            parameters.Add(new NpgsqlParameter("in_key_stat", obj.key_stat));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaByCodeByGameId(string set_type, GameKeyMeta obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_key_level", obj.key_level));
            parameters.Add(new NpgsqlParameter("in_store_count", obj.store_count));
            parameters.Add(new NpgsqlParameter("in_key", obj.key));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            parameters.Add(new NpgsqlParameter("in_key_stat", obj.key_stat));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_set_code_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaByKeyByGameId(string set_type, GameKeyMeta obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_key_level", obj.key_level));
            parameters.Add(new NpgsqlParameter("in_store_count", obj.store_count));
            parameters.Add(new NpgsqlParameter("in_key", obj.key));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            parameters.Add(new NpgsqlParameter("in_key_stat", obj.key_stat));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_set_key_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameKeyMetaByKeyByGameIdByLevel(string set_type, GameKeyMeta obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_key_level", obj.key_level));
            parameters.Add(new NpgsqlParameter("in_store_count", obj.store_count));
            parameters.Add(new NpgsqlParameter("in_key", obj.key));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            parameters.Add(new NpgsqlParameter("in_key_stat", obj.key_stat));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_key_meta_set_key_game_id_level"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameKeyMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual bool DelGameKeyMetaByKeyByGameId(
            string key
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_key", key));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet GetGameKeyMetaListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByKey(
            string key
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_key", key));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_key", key));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameKeyMetaListByCodeByLevel(
            string code
            , string level
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_level", level));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameLevel(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameLevelByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameLevelByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameLevelByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
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
        public virtual int CountGameLevelByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseGameLevelListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLevelByUuid(string set_type, GameLevel obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameLevelByCodeByGameId(string set_type, GameLevel obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_order", obj.order));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_level_set_code_game_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameLevelByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet GetGameLevelListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLevelListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLevelListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLevelListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameLevelListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameProfileAchievement(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameProfileAchievementByProfileIdByCode(
            string profile_id
            , string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameProfileAchievementByUsername(
            string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_username", username));
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
        public virtual int CountGameProfileAchievementByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_count_code_profile_id_game_id_time"
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByUuid(string set_type, GameProfileAchievement obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_completed", obj.completed));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_achievement_value", obj.achievement_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByUuidByCode(string set_type, GameProfileAchievement obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_completed", obj.completed));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_achievement_value", obj.achievement_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_set_uuid_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByProfileIdByCode(string set_type, GameProfileAchievement obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_completed", obj.completed));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_achievement_value", obj.achievement_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_set_profile_id_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByCodeByProfileIdByGameId(string set_type, GameProfileAchievement obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_completed", obj.completed));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_achievement_value", obj.achievement_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_set_code_profile_id_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileAchievement obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_username", obj.username));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_timestamp", obj.timestamp));
            parameters.Add(new NpgsqlParameter("in_completed", obj.completed));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_achievement_value", obj.achievement_value));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_set_code_profile_id_game_id_timest"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameProfileAchievementByProfileIdByCode(
            string profile_id
            , string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual bool DelGameProfileAchievementByUuidByCode(
            string uuid
            , string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual DataSet GetGameProfileAchievementListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByProfileIdByCode(
            string profile_id
            , string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByUsername(
            string username
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_username", username));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
            parameters.Add(new NpgsqlParameter("in_timestamp", timestamp));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_profile_achievement_get_code_profile_id_game_id_timest"
                , "game_profile_achievement"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameAchievementMeta(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual int CountGameAchievementMetaByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual int CountGameAchievementMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual int CountGameAchievementMetaByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
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
        public virtual int CountGameAchievementMetaByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet BrowseGameAchievementMetaListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
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
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementMetaByUuid(string set_type, GameAchievementMeta obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_game_stat", obj.game_stat));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_modifier", obj.modifier));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_leaderboard", obj.leaderboard));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameAchievementMetaByCodeByGameId(string set_type, GameAchievementMeta obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_game_stat", obj.game_stat));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_level", obj.level));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_game_id", obj.game_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_modifier", obj.modifier));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_leaderboard", obj.leaderboard));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_game_achievement_meta_set_code_game_id"
                , parameters
                ));           
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
        public virtual bool DelGameAchievementMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
        public virtual DataSet GetGameAchievementMetaListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementMetaListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementMetaListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementMetaListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameAchievementMetaListByGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileReward(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_count_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByRewardId(
            string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_count_reward_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByProfileIdByRewardId(
            string profile_id
            , string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_count_profile_id_reward_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByProfileIdByChannelId(
            string profile_id
            , string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_count_profile_id_channel_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardByProfileIdByChannelIdByRewardId(
            string profile_id
            , string channel_id
            , string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_count_profile_id_channel_id_reward_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileRewardListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_browse_filter"
                , "profile_reward"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileRewardByUuid(string set_type, ProfileReward obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_viewed", obj.viewed));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_downloaded", obj.downloaded));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_reward_id", obj.reward_id));
            parameters.Add(new NpgsqlParameter("in_usage_count", obj.usage_count));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_blurb", obj.blurb));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileRewardByProfileIdByChannelIdByRewardId(string set_type, ProfileReward obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_viewed", obj.viewed));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_downloaded", obj.downloaded));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_reward_id", obj.reward_id));
            parameters.Add(new NpgsqlParameter("in_usage_count", obj.usage_count));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_blurb", obj.blurb));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_set_profile_id_channel_id_reward_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileRewardByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_reward_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileRewardByProfileIdByRewardId(
            string profile_id
            , string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_reward_del_profile_id_reward_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_get_uuid"
                , "profile_reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_get_profile_id"
                , "profile_reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardListByRewardId(
            string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_get_reward_id"
                , "profile_reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardListByProfileIdByRewardId(
            string profile_id
            , string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_get_profile_id_reward_id"
                , "profile_reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardListByProfileIdByChannelId(
            string profile_id
            , string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_get_profile_id_channel_id"
                , "profile_reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardListByProfileIdByChannelIdByRewardId(
            string profile_id
            , string channel_id
            , string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_get_profile_id_channel_id_reward_id"
                , "profile_reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountCoupon(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCouponByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCouponByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCouponByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountCouponByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseCouponListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_browse_filter"
                , "coupon"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetCouponByUuid(string set_type, Coupon obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelCouponByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_coupon_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelCouponByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_coupon_del_org_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetCouponListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_get_uuid"
                , "coupon"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetCouponListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_get_code"
                , "coupon"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetCouponListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_get_name"
                , "coupon"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetCouponListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_coupon_get_org_id"
                , "coupon"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountProfileCoupon(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_coupon_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileCouponByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_coupon_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileCouponByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_coupon_count_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileCouponListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_coupon_browse_filter"
                , "profile_coupon"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileCouponByUuid(string set_type, ProfileCoupon obj)  {
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
            parameters.Add(new NpgsqlParameter("in_profile_id", obj.profile_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_coupon_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileCouponByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_coupon_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileCouponByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_coupon_del_profile_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileCouponListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_coupon_get_uuid"
                , "profile_coupon"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileCouponListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_coupon_get_profile_id"
                , "profile_coupon"
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
        public virtual DataSet GetOrgListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
        public virtual int CountChannel(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
        public virtual DataSet GetChannelListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
        public virtual DataSet GetChannelTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
        public virtual int CountReward(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_count_channel_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_count_org_id_channel_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseRewardListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_browse_filter"
                , "reward"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetRewardByUuid(string set_type, Reward obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_type_url", obj.type_url));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_url", obj.url));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_usage_count", obj.usage_count));
            parameters.Add(new NpgsqlParameter("in_external_id", obj.external_id));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_del_org_id_channel_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_get_uuid"
                , "reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_get_code"
                , "reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_get_name"
                , "reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_get_org_id"
                , "reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardListByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_get_channel_id"
                , "reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardListByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_get_org_id_channel_id"
                , "reward"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountRewardType(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardTypeByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardTypeByType(
            string type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_type", type));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_count_type"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseRewardTypeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_browse_filter"
                , "reward_type"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetRewardTypeByUuid(string set_type, RewardType obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_type_url", obj.type_url));
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_type_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_get_uuid"
                , "reward_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardTypeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_get_code"
                , "reward_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardTypeListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_get_name"
                , "reward_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardTypeListByType(
            string type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type", type));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_type_get_type"
                , "reward_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCondition(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_count_channel_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_count_org_id_channel_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_count_org_id_channel_id_reward_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionByRewardId(
            string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_count_reward_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseRewardConditionListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_browse_filter"
                , "reward_condition"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetRewardConditionByUuid(string set_type, RewardCondition obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_end_date", obj.end_date));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_org_id", obj.org_id));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_amount", obj.amount));
            parameters.Add(new NpgsqlParameter("in_global_reward", obj.global_reward));
            parameters.Add(new NpgsqlParameter("in_condition", obj.condition));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_start_date", obj.start_date));
            parameters.Add(new NpgsqlParameter("in_reward_id", obj.reward_id));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardConditionByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_condition_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardConditionByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_condition_del_org_id_channel_id_reward_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_get_uuid"
                , "reward_condition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_get_code"
                , "reward_condition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_get_name"
                , "reward_condition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_get_org_id"
                , "reward_condition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionListByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_get_channel_id"
                , "reward_condition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionListByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_get_org_id_channel_id"
                , "reward_condition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionListByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_get_org_id_channel_id_reward_id"
                , "reward_condition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionListByRewardId(
            string reward_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_reward_id", reward_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_get_reward_id"
                , "reward_condition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionType(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionTypeByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionTypeByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardConditionTypeByType(
            string type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_type", type));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_count_type"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseRewardConditionTypeListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_browse_filter"
                , "reward_condition_type"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetRewardConditionTypeByUuid(string set_type, RewardConditionType obj)  {
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
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardConditionTypeByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_condition_type_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionTypeListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_get_uuid"
                , "reward_condition_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionTypeListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_get_code"
                , "reward_condition_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionTypeListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_get_name"
                , "reward_condition_type"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardConditionTypeListByType(
            string type
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_type", type));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_condition_type_get_type"
                , "reward_condition_type"
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
        public virtual DataSet GetQuestionListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
        public virtual int CountProfileQuestion(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
        public virtual DataSet GetProfileQuestionListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
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
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
                    BaseGamingData.connectionString
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
        public virtual DataSet GetProfileChannelListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
                BaseGamingData.connectionString
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
        public virtual int CountProfileRewardPoints(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_count"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_count_channel_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_count_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_count_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_count_channel_id_org_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountProfileRewardPointsByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_count_channel_id_profile_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseProfileRewardPointsListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_browse_filter"
                , "profile_reward_points"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetProfileRewardPointsByUuid(string set_type, ProfileRewardPoints obj)  {
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
            parameters.Add(new NpgsqlParameter("in_points", obj.points));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileRewardPointsByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_reward_points_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelProfileRewardPointsByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_profile_reward_points_del_channel_id_org_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardPointsListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_get_uuid"
                , "profile_reward_points"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardPointsListByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_get_channel_id"
                , "profile_reward_points"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardPointsListByOrgId(
            string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_get_org_id"
                , "profile_reward_points"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardPointsListByProfileId(
            string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_get_profile_id"
                , "profile_reward_points"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardPointsListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_org_id", org_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_get_channel_id_org_id"
                , "profile_reward_points"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetProfileRewardPointsListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_profile_id", profile_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_profile_reward_points_get_channel_id_profile_id"
                , "profile_reward_points"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_count_uuid"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_count_code"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_count_name"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByPath(
            string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_count_path"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_count_channel_id"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual int CountRewardCompetitionByChannelIdByCompleted(
            string channel_id
            , bool completed
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_completed", completed));
            try {
                return (int)data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_count_channel_id_completed"
                , parameters
                );            
            }
            catch (Exception e){  
                log.Error(e);          
                return 0;
            }
        }       
//------------------------------------------------------------------------------                    
        public virtual DataSet BrowseRewardCompetitionListByFilter(SearchFilter obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_page", obj.page));
            parameters.Add(new NpgsqlParameter("in_page_size", obj.page_size));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_filter", obj.filter));
            
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_browse_filter"
                , "reward_competition"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetRewardCompetitionByUuid(string set_type, RewardCompetition obj)  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();
            parameters.Add(new NpgsqlParameter("in_set_type", set_type));
            parameters.Add(new NpgsqlParameter("in_sort", obj.sort));
            parameters.Add(new NpgsqlParameter("in_code", obj.code));
            parameters.Add(new NpgsqlParameter("in_date_end", obj.date_end));
            parameters.Add(new NpgsqlParameter("in_results", obj.results));
            parameters.Add(new NpgsqlParameter("in_visible", obj.visible));
            parameters.Add(new NpgsqlParameter("in_display_name", obj.display_name));
            parameters.Add(new NpgsqlParameter("in_uuid", obj.uuid));
            parameters.Add(new NpgsqlParameter("in_date_start", obj.date_start));
            parameters.Add(new NpgsqlParameter("in_winners", obj.winners));
            parameters.Add(new NpgsqlParameter("in_template", obj.template));
            parameters.Add(new NpgsqlParameter("in_type", obj.type));
            parameters.Add(new NpgsqlParameter("in_trigger_data", obj.trigger_data));
            parameters.Add(new NpgsqlParameter("in_status", obj.status));
            parameters.Add(new NpgsqlParameter("in_description", obj.description));
            parameters.Add(new NpgsqlParameter("in_completed", obj.completed));
            parameters.Add(new NpgsqlParameter("in_template_url", obj.template_url));
            parameters.Add(new NpgsqlParameter("in_active", obj.active));
            parameters.Add(new NpgsqlParameter("in_path", obj.path));
            parameters.Add(new NpgsqlParameter("in_data", obj.data));
            parameters.Add(new NpgsqlParameter("in_name", obj.name));
            parameters.Add(new NpgsqlParameter("in_date_modified", obj.date_modified));
            parameters.Add(new NpgsqlParameter("in_fulfilled", obj.fulfilled));
            parameters.Add(new NpgsqlParameter("in_channel_id", obj.channel_id));
            parameters.Add(new NpgsqlParameter("in_date_created", obj.date_created));
            
            try {
                return Convert.ToBoolean(data.ExecuteScalar(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardCompetitionByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_competition_del_uuid"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardCompetitionByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_competition_del_code"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardCompetitionByPathByChannelId(
            string path
            , string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_path", path));
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_competition_del_path_channel_id"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardCompetitionByPath(
            string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_competition_del_path"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual bool DelRewardCompetitionByChannelIdByPath(
            string channel_id
            , string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                data.ExecuteNonQuery(
                    BaseGamingData.connectionString
                    , CommandType.StoredProcedure
                    , "usp_reward_competition_del_channel_id_path"
                    , parameters
                    );
                return true;            
            }
            catch (Exception e){      
                log.Error(e);      
                return false;
            }
        }                     
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardCompetitionListByUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_get_uuid"
                , "reward_competition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardCompetitionListByCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_get_code"
                , "reward_competition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardCompetitionListByName(
            string name
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_name", name));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_get_name"
                , "reward_competition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardCompetitionListByPath(
            string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_get_path"
                , "reward_competition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardCompetitionListByChannelId(
            string channel_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_get_channel_id"
                , "reward_competition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardCompetitionListByChannelIdByCompleted(
            string channel_id
            , bool completed
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_completed", completed));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_get_channel_id_completed"
                , "reward_competition"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetRewardCompetitionListByChannelIdByPath(
            string channel_id
            , string path
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_channel_id", channel_id));
            parameters.Add(new NpgsqlParameter("in_path", path));
            try {
                return data.ExecuteDataSet(
                BaseGamingData.connectionString
                , CommandType.StoredProcedure
                , "usp_reward_competition_get_channel_id_path"
                , "reward_competition"
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






