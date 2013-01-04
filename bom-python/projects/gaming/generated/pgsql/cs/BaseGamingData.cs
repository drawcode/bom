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
        public virtual int CountGameUuid(
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
        public virtual int CountGameCode(
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
        public virtual int CountGameName(
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
        public virtual int CountGameOrgId(
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
        public virtual int CountGameAppId(
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
        public virtual int CountGameOrgIdAppId(
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
        public virtual DataSet BrowseGameListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameUuid(string set_type, Game obj)  {
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
        public virtual bool SetGameCode(string set_type, Game obj)  {
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
        public virtual bool SetGameName(string set_type, Game obj)  {
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
        public virtual bool SetGameOrgId(string set_type, Game obj)  {
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
        public virtual bool SetGameAppId(string set_type, Game obj)  {
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
        public virtual bool SetGameOrgIdAppId(string set_type, Game obj)  {
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
        public virtual bool DelGameUuid(
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
        public virtual bool DelGameCode(
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
        public virtual bool DelGameName(
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
        public virtual bool DelGameOrgId(
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
        public virtual bool DelGameAppId(
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
        public virtual bool DelGameOrgIdAppId(
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
        public virtual DataSet GetGameListUuid(
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
        public virtual DataSet GetGameListCode(
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
        public virtual DataSet GetGameListName(
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
        public virtual DataSet GetGameListOrgId(
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
        public virtual DataSet GetGameListAppId(
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
        public virtual DataSet GetGameListOrgIdAppId(
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
        public virtual int CountGameCategoryUuid(
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
        public virtual int CountGameCategoryCode(
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
        public virtual int CountGameCategoryName(
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
        public virtual int CountGameCategoryOrgId(
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
        public virtual int CountGameCategoryTypeId(
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
        public virtual int CountGameCategoryOrgIdTypeId(
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
        public virtual DataSet BrowseGameCategoryListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameCategoryUuid(string set_type, GameCategory obj)  {
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
        public virtual bool DelGameCategoryUuid(
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
        public virtual bool DelGameCategoryCodeOrgId(
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
        public virtual bool DelGameCategoryCodeOrgIdTypeId(
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
        public virtual DataSet GetGameCategoryListUuid(
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
        public virtual DataSet GetGameCategoryListCode(
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
        public virtual DataSet GetGameCategoryListName(
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
        public virtual DataSet GetGameCategoryListOrgId(
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
        public virtual DataSet GetGameCategoryListTypeId(
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
        public virtual DataSet GetGameCategoryListOrgIdTypeId(
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
        public virtual int CountGameCategoryTreeUuid(
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
        public virtual int CountGameCategoryTreeParentId(
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
        public virtual int CountGameCategoryTreeCategoryId(
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
        public virtual int CountGameCategoryTreeParentIdCategoryId(
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
        public virtual DataSet BrowseGameCategoryTreeListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameCategoryTreeUuid(string set_type, GameCategoryTree obj)  {
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
        public virtual bool DelGameCategoryTreeUuid(
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
        public virtual bool DelGameCategoryTreeParentId(
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
        public virtual bool DelGameCategoryTreeCategoryId(
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
        public virtual bool DelGameCategoryTreeParentIdCategoryId(
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
        public virtual DataSet GetGameCategoryTreeListUuid(
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
        public virtual DataSet GetGameCategoryTreeListParentId(
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
        public virtual DataSet GetGameCategoryTreeListCategoryId(
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
        public virtual DataSet GetGameCategoryTreeListParentIdCategoryId(
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
        public virtual int CountGameCategoryAssocUuid(
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
        public virtual int CountGameCategoryAssocGameId(
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
        public virtual int CountGameCategoryAssocCategoryId(
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
        public virtual int CountGameCategoryAssocGameIdCategoryId(
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
        public virtual DataSet BrowseGameCategoryAssocListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameCategoryAssocUuid(string set_type, GameCategoryAssoc obj)  {
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
        public virtual bool DelGameCategoryAssocUuid(
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
        public virtual DataSet GetGameCategoryAssocListUuid(
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
        public virtual DataSet GetGameCategoryAssocListGameId(
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
        public virtual DataSet GetGameCategoryAssocListCategoryId(
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
        public virtual DataSet GetGameCategoryAssocListGameIdCategoryId(
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
        public virtual int CountGameTypeUuid(
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
        public virtual int CountGameTypeCode(
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
        public virtual int CountGameTypeName(
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
        public virtual DataSet BrowseGameTypeListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameTypeUuid(string set_type, GameType obj)  {
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
        public virtual bool DelGameTypeUuid(
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
        public virtual DataSet GetGameTypeListUuid(
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
        public virtual DataSet GetGameTypeListCode(
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
        public virtual DataSet GetGameTypeListName(
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
        public virtual int CountProfileGameUuid(
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
        public virtual int CountProfileGameGameId(
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
        public virtual int CountProfileGameProfileId(
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
        public virtual int CountProfileGameProfileIdGameId(
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
        public virtual DataSet BrowseProfileGameListFilter(SearchFilter obj)  {
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
        public virtual bool SetProfileGameUuid(string set_type, ProfileGame obj)  {
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
        public virtual bool DelProfileGameUuid(
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
        public virtual DataSet GetProfileGameListUuid(
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
        public virtual DataSet GetProfileGameListGameId(
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
        public virtual DataSet GetProfileGameListProfileId(
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
        public virtual DataSet GetProfileGameListProfileIdGameId(
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
        public virtual int CountGameNetworkUuid(
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
        public virtual int CountGameNetworkCode(
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
        public virtual int CountGameNetworkUuidType(
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
        public virtual DataSet BrowseGameNetworkListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameNetworkUuid(string set_type, GameNetwork obj)  {
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
        public virtual bool SetGameNetworkCode(string set_type, GameNetwork obj)  {
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
        public virtual bool DelGameNetworkUuid(
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
        public virtual DataSet GetGameNetworkListUuid(
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
        public virtual DataSet GetGameNetworkListCode(
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
        public virtual DataSet GetGameNetworkListUuidType(
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
        public virtual int CountGameNetworkAuthUuid(
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
        public virtual int CountGameNetworkAuthGameIdGameNetworkId(
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
        public virtual DataSet BrowseGameNetworkAuthListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameNetworkAuthUuid(string set_type, GameNetworkAuth obj)  {
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
        public virtual bool SetGameNetworkAuthGameIdGameNetworkId(string set_type, GameNetworkAuth obj)  {
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
        public virtual bool DelGameNetworkAuthUuid(
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
        public virtual DataSet GetGameNetworkAuthListUuid(
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
        public virtual DataSet GetGameNetworkAuthListGameIdGameNetworkId(
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
        public virtual int CountProfileGameNetworkUuid(
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
        public virtual int CountProfileGameNetworkGameId(
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
        public virtual int CountProfileGameNetworkProfileId(
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
        public virtual int CountProfileGameNetworkProfileIdGameId(
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
        public virtual int CountProfileGameNetworkProfileIdGameId(
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
        public virtual int CountProfileGameNetworkProfileIdGameIdGameNetworkId(
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
        public virtual int CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
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
        public virtual DataSet BrowseProfileGameNetworkListFilter(SearchFilter obj)  {
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
        public virtual bool SetProfileGameNetworkUuid(string set_type, ProfileGameNetwork obj)  {
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
        public virtual bool SetProfileGameNetworkProfileIdGameId(string set_type, ProfileGameNetwork obj)  {
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
        public virtual bool SetProfileGameNetworkProfileIdGameIdGameNetworkId(string set_type, ProfileGameNetwork obj)  {
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
        public virtual bool SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(string set_type, ProfileGameNetwork obj)  {
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
        public virtual bool DelProfileGameNetworkUuid(
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
        public virtual bool DelProfileGameNetworkProfileIdGameId(
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
        public virtual bool DelProfileGameNetworkProfileIdGameIdGameNetworkId(
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
        public virtual bool DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
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
        public virtual DataSet GetProfileGameNetworkListUuid(
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
        public virtual DataSet GetProfileGameNetworkListGameId(
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
        public virtual DataSet GetProfileGameNetworkListProfileId(
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
        public virtual DataSet GetProfileGameNetworkListProfileIdGameId(
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
        public virtual DataSet GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
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
        public virtual DataSet GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
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
        public virtual int CountProfileGameDataAttributeUuid(
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
        public virtual int CountProfileGameDataAttributeProfileId(
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
        public virtual int CountProfileGameDataAttributeProfileIdGameIdCode(
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
        public virtual DataSet BrowseProfileGameDataAttributeListFilter(SearchFilter obj)  {
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
        public virtual bool SetProfileGameDataAttributeUuid(string set_type, ProfileGameDataAttribute obj)  {
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
        public virtual bool SetProfileGameDataAttributeProfileId(string set_type, ProfileGameDataAttribute obj)  {
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
        public virtual bool SetProfileGameDataAttributeProfileIdGameIdCode(string set_type, ProfileGameDataAttribute obj)  {
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
        public virtual bool DelProfileGameDataAttributeUuid(
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
        public virtual bool DelProfileGameDataAttributeProfileId(
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
        public virtual bool DelProfileGameDataAttributeProfileIdGameIdCode(
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
        public virtual DataSet GetProfileGameDataAttributeListUuid(
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
        public virtual DataSet GetProfileGameDataAttributeListProfileId(
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
        public virtual DataSet GetProfileGameDataAttributeListProfileIdGameIdCode(
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
        public virtual int CountGameSessionUuid(
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
        public virtual int CountGameSessionGameId(
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
        public virtual int CountGameSessionProfileId(
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
        public virtual int CountGameSessionProfileIdGameId(
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
        public virtual DataSet BrowseGameSessionListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameSessionUuid(string set_type, GameSession obj)  {
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
        public virtual bool DelGameSessionUuid(
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
        public virtual DataSet GetGameSessionListUuid(
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
        public virtual DataSet GetGameSessionListGameId(
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
        public virtual DataSet GetGameSessionListProfileId(
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
        public virtual DataSet GetGameSessionListProfileIdGameId(
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
        public virtual int CountGameSessionDataUuid(
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
        public virtual DataSet BrowseGameSessionDataListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameSessionDataUuid(string set_type, GameSessionData obj)  {
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
        public virtual bool DelGameSessionDataUuid(
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
        public virtual DataSet GetGameSessionDataListUuid(
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
        public virtual int CountGameContentUuid(
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
        public virtual int CountGameContentGameId(
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
        public virtual int CountGameContentGameIdPath(
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
        public virtual int CountGameContentGameIdPathVersion(
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
        public virtual int CountGameContentGameIdPathVersionPlatformIncrement(
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
        public virtual DataSet BrowseGameContentListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameContentUuid(string set_type, GameContent obj)  {
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
        public virtual bool SetGameContentGameId(string set_type, GameContent obj)  {
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
        public virtual bool SetGameContentGameIdPath(string set_type, GameContent obj)  {
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
        public virtual bool SetGameContentGameIdPathVersion(string set_type, GameContent obj)  {
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
        public virtual bool SetGameContentGameIdPathVersionPlatformIncrement(string set_type, GameContent obj)  {
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
        public virtual bool DelGameContentUuid(
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
        public virtual bool DelGameContentGameId(
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
        public virtual bool DelGameContentGameIdPath(
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
        public virtual bool DelGameContentGameIdPathVersion(
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
        public virtual bool DelGameContentGameIdPathVersionPlatformIncrement(
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
        public virtual DataSet GetGameContentListUuid(
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
        public virtual DataSet GetGameContentListGameId(
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
        public virtual DataSet GetGameContentListGameIdPath(
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
        public virtual DataSet GetGameContentListGameIdPathVersion(
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
        public virtual DataSet GetGameContentListGameIdPathVersionPlatformIncrement(
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
        public virtual int CountGameProfileContentUuid(
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
        public virtual int CountGameProfileContentGameIdProfileId(
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
        public virtual int CountGameProfileContentGameIdUsername(
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
        public virtual int CountGameProfileContentUsername(
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
        public virtual int CountGameProfileContentGameIdProfileIdPath(
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
        public virtual int CountGameProfileContentGameIdProfileIdPathVersion(
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
        public virtual int CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
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
        public virtual int CountGameProfileContentGameIdUsernamePath(
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
        public virtual int CountGameProfileContentGameIdUsernamePathVersion(
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
        public virtual int CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
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
        public virtual DataSet BrowseGameProfileContentListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameProfileContentUuid(string set_type, GameProfileContent obj)  {
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
        public virtual bool SetGameProfileContentGameIdProfileId(string set_type, GameProfileContent obj)  {
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
        public virtual bool SetGameProfileContentGameIdUsername(string set_type, GameProfileContent obj)  {
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
        public virtual bool SetGameProfileContentUsername(string set_type, GameProfileContent obj)  {
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
        public virtual bool SetGameProfileContentGameIdProfileIdPath(string set_type, GameProfileContent obj)  {
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
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersion(string set_type, GameProfileContent obj)  {
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
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(string set_type, GameProfileContent obj)  {
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
        public virtual bool SetGameProfileContentGameIdUsernamePath(string set_type, GameProfileContent obj)  {
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
        public virtual bool SetGameProfileContentGameIdUsernamePathVersion(string set_type, GameProfileContent obj)  {
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
        public virtual bool SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(string set_type, GameProfileContent obj)  {
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
        public virtual bool DelGameProfileContentUuid(
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
        public virtual bool DelGameProfileContentGameIdProfileId(
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
        public virtual bool DelGameProfileContentGameIdUsername(
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
        public virtual bool DelGameProfileContentUsername(
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
        public virtual bool DelGameProfileContentGameIdProfileIdPath(
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
        public virtual bool DelGameProfileContentGameIdProfileIdPathVersion(
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
        public virtual bool DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
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
        public virtual bool DelGameProfileContentGameIdUsernamePath(
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
        public virtual bool DelGameProfileContentGameIdUsernamePathVersion(
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
        public virtual bool DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
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
        public virtual DataSet GetGameProfileContentListUuid(
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
        public virtual DataSet GetGameProfileContentListGameIdProfileId(
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
        public virtual DataSet GetGameProfileContentListGameIdUsername(
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
        public virtual DataSet GetGameProfileContentListUsername(
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
        public virtual DataSet GetGameProfileContentListGameIdProfileIdPath(
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
        public virtual DataSet GetGameProfileContentListGameIdProfileIdPathVersion(
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
        public virtual DataSet GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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
        public virtual DataSet GetGameProfileContentListGameIdUsernamePath(
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
        public virtual DataSet GetGameProfileContentListGameIdUsernamePathVersion(
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
        public virtual DataSet GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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
        public virtual int CountGameAppUuid(
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
        public virtual int CountGameAppGameId(
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
        public virtual int CountGameAppAppId(
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
        public virtual int CountGameAppGameIdAppId(
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
        public virtual DataSet BrowseGameAppListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameAppUuid(string set_type, GameApp obj)  {
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
        public virtual bool DelGameAppUuid(
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
        public virtual DataSet GetGameAppListUuid(
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
        public virtual DataSet GetGameAppListGameId(
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
        public virtual DataSet GetGameAppListAppId(
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
        public virtual DataSet GetGameAppListGameIdAppId(
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
        public virtual int CountProfileGameLocationUuid(
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
        public virtual int CountProfileGameLocationGameLocationId(
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
        public virtual int CountProfileGameLocationProfileId(
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
        public virtual int CountProfileGameLocationProfileIdGameLocationId(
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
        public virtual DataSet BrowseProfileGameLocationListFilter(SearchFilter obj)  {
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
        public virtual bool SetProfileGameLocationUuid(string set_type, ProfileGameLocation obj)  {
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
        public virtual bool DelProfileGameLocationUuid(
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
        public virtual DataSet GetProfileGameLocationListUuid(
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
        public virtual DataSet GetProfileGameLocationListGameLocationId(
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
        public virtual DataSet GetProfileGameLocationListProfileId(
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
        public virtual DataSet GetProfileGameLocationListProfileIdGameLocationId(
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
        public virtual int CountGamePhotoUuid(
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
        public virtual int CountGamePhotoExternalId(
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
        public virtual int CountGamePhotoUrl(
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
        public virtual int CountGamePhotoUrlExternalId(
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
        public virtual int CountGamePhotoUuidExternalId(
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
        public virtual DataSet BrowseGamePhotoListFilter(SearchFilter obj)  {
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
        public virtual bool SetGamePhotoUuid(string set_type, GamePhoto obj)  {
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
        public virtual bool SetGamePhotoExternalId(string set_type, GamePhoto obj)  {
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
        public virtual bool SetGamePhotoUrl(string set_type, GamePhoto obj)  {
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
        public virtual bool SetGamePhotoUrlExternalId(string set_type, GamePhoto obj)  {
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
        public virtual bool SetGamePhotoUuidExternalId(string set_type, GamePhoto obj)  {
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
        public virtual bool DelGamePhotoUuid(
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
        public virtual bool DelGamePhotoExternalId(
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
        public virtual bool DelGamePhotoUrl(
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
        public virtual bool DelGamePhotoUrlExternalId(
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
        public virtual bool DelGamePhotoUuidExternalId(
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
        public virtual DataSet GetGamePhotoListUuid(
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
        public virtual DataSet GetGamePhotoListExternalId(
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
        public virtual DataSet GetGamePhotoListUrl(
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
        public virtual DataSet GetGamePhotoListUrlExternalId(
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
        public virtual DataSet GetGamePhotoListUuidExternalId(
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
        public virtual int CountGameVideoUuid(
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
        public virtual int CountGameVideoExternalId(
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
        public virtual int CountGameVideoUrl(
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
        public virtual int CountGameVideoUrlExternalId(
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
        public virtual int CountGameVideoUuidExternalId(
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
        public virtual DataSet BrowseGameVideoListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameVideoUuid(string set_type, GameVideo obj)  {
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
        public virtual bool SetGameVideoExternalId(string set_type, GameVideo obj)  {
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
        public virtual bool SetGameVideoUrl(string set_type, GameVideo obj)  {
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
        public virtual bool SetGameVideoUrlExternalId(string set_type, GameVideo obj)  {
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
        public virtual bool SetGameVideoUuidExternalId(string set_type, GameVideo obj)  {
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
        public virtual bool DelGameVideoUuid(
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
        public virtual bool DelGameVideoExternalId(
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
        public virtual bool DelGameVideoUrl(
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
        public virtual bool DelGameVideoUrlExternalId(
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
        public virtual bool DelGameVideoUuidExternalId(
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
        public virtual DataSet GetGameVideoListUuid(
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
        public virtual DataSet GetGameVideoListExternalId(
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
        public virtual DataSet GetGameVideoListUrl(
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
        public virtual DataSet GetGameVideoListUrlExternalId(
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
        public virtual DataSet GetGameVideoListUuidExternalId(
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
        public virtual int CountGameRpgItemWeaponUuid(
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
        public virtual int CountGameRpgItemWeaponGameId(
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
        public virtual int CountGameRpgItemWeaponUrl(
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
        public virtual int CountGameRpgItemWeaponUrlGameId(
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
        public virtual int CountGameRpgItemWeaponUuidGameId(
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
        public virtual DataSet BrowseGameRpgItemWeaponListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameRpgItemWeaponUuid(string set_type, GameRpgItemWeapon obj)  {
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
        public virtual bool SetGameRpgItemWeaponGameId(string set_type, GameRpgItemWeapon obj)  {
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
        public virtual bool SetGameRpgItemWeaponUrl(string set_type, GameRpgItemWeapon obj)  {
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
        public virtual bool SetGameRpgItemWeaponUrlGameId(string set_type, GameRpgItemWeapon obj)  {
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
        public virtual bool SetGameRpgItemWeaponUuidGameId(string set_type, GameRpgItemWeapon obj)  {
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
        public virtual bool DelGameRpgItemWeaponUuid(
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
        public virtual bool DelGameRpgItemWeaponGameId(
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
        public virtual bool DelGameRpgItemWeaponUrl(
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
        public virtual bool DelGameRpgItemWeaponUrlGameId(
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
        public virtual bool DelGameRpgItemWeaponUuidGameId(
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
        public virtual DataSet GetGameRpgItemWeaponListUuid(
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
        public virtual DataSet GetGameRpgItemWeaponListGameId(
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
        public virtual DataSet GetGameRpgItemWeaponListUrl(
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
        public virtual DataSet GetGameRpgItemWeaponListUrlGameId(
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
        public virtual DataSet GetGameRpgItemWeaponListUuidGameId(
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
        public virtual int CountGameRpgItemSkillUuid(
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
        public virtual int CountGameRpgItemSkillGameId(
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
        public virtual int CountGameRpgItemSkillUrl(
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
        public virtual int CountGameRpgItemSkillUrlGameId(
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
        public virtual int CountGameRpgItemSkillUuidGameId(
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
        public virtual DataSet BrowseGameRpgItemSkillListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameRpgItemSkillUuid(string set_type, GameRpgItemSkill obj)  {
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
        public virtual bool SetGameRpgItemSkillGameId(string set_type, GameRpgItemSkill obj)  {
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
        public virtual bool SetGameRpgItemSkillUrl(string set_type, GameRpgItemSkill obj)  {
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
        public virtual bool SetGameRpgItemSkillUrlGameId(string set_type, GameRpgItemSkill obj)  {
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
        public virtual bool SetGameRpgItemSkillUuidGameId(string set_type, GameRpgItemSkill obj)  {
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
        public virtual bool DelGameRpgItemSkillUuid(
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
        public virtual bool DelGameRpgItemSkillGameId(
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
        public virtual bool DelGameRpgItemSkillUrl(
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
        public virtual bool DelGameRpgItemSkillUrlGameId(
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
        public virtual bool DelGameRpgItemSkillUuidGameId(
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
        public virtual DataSet GetGameRpgItemSkillListUuid(
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
        public virtual DataSet GetGameRpgItemSkillListGameId(
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
        public virtual DataSet GetGameRpgItemSkillListUrl(
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
        public virtual DataSet GetGameRpgItemSkillListUrlGameId(
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
        public virtual DataSet GetGameRpgItemSkillListUuidGameId(
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
        public virtual int CountGameProductUuid(
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
        public virtual int CountGameProductGameId(
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
        public virtual int CountGameProductUrl(
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
        public virtual int CountGameProductUrlGameId(
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
        public virtual int CountGameProductUuidGameId(
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
        public virtual DataSet BrowseGameProductListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameProductUuid(string set_type, GameProduct obj)  {
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
        public virtual bool SetGameProductGameId(string set_type, GameProduct obj)  {
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
        public virtual bool SetGameProductUrl(string set_type, GameProduct obj)  {
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
        public virtual bool SetGameProductUrlGameId(string set_type, GameProduct obj)  {
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
        public virtual bool SetGameProductUuidGameId(string set_type, GameProduct obj)  {
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
        public virtual bool DelGameProductUuid(
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
        public virtual bool DelGameProductGameId(
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
        public virtual bool DelGameProductUrl(
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
        public virtual bool DelGameProductUrlGameId(
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
        public virtual bool DelGameProductUuidGameId(
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
        public virtual DataSet GetGameProductListUuid(
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
        public virtual DataSet GetGameProductListGameId(
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
        public virtual DataSet GetGameProductListUrl(
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
        public virtual DataSet GetGameProductListUrlGameId(
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
        public virtual DataSet GetGameProductListUuidGameId(
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
        public virtual int CountGameStatisticLeaderboard(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                , "usp_game_statistic_leaderboard_count_code_game_id_profile_id_ti"
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
                , "usp_game_statistic_leaderboard_browse_filter"
                , "game_statistic_leaderboard"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardUuid(string set_type, GameStatisticLeaderboard obj)  {
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
                , "usp_game_statistic_leaderboard_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboard obj)  {
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
                , "usp_game_statistic_leaderboard_set_uuid_profile_id_game_id_time"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCode(string set_type, GameStatisticLeaderboard obj)  {
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
                , "usp_game_statistic_leaderboard_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCodeGameId(string set_type, GameStatisticLeaderboard obj)  {
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
                , "usp_game_statistic_leaderboard_set_code_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileId(string set_type, GameStatisticLeaderboard obj)  {
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
                , "usp_game_statistic_leaderboard_set_code_game_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboard obj)  {
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
                , "usp_game_statistic_leaderboard_set_code_game_id_profile_id_time"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                    , "usp_game_statistic_leaderboard_del_code_game_id_profile_id_time"
                    , parameters
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListCodeGameId(
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
                , "usp_game_statistic_leaderboard_get_code_game_id"
                , "game_statistic_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListCodeGameIdProfileId(
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
                , "usp_game_statistic_leaderboard_get_code_game_id_profile_id"
                , "game_statistic_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
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
                , "usp_game_statistic_leaderboard_get_code_game_id_profile_id_time"
                , "game_statistic_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListProfileIdGameId(
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
                , "usp_game_statistic_leaderboard_get_profile_id_game_id"
                , "game_statistic_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
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
                , "usp_game_statistic_leaderboard_get_profile_id_game_id_timestamp"
                , "game_statistic_leaderboard"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardItem(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                , "usp_game_statistic_leaderboard_item_count_code_game_id_profile_"
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
                , "usp_game_statistic_leaderboard_item_count_code_game_id_profile_"
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
                , "usp_game_statistic_leaderboard_item_browse_filter"
                , "game_statistic_leaderboard_item"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemUuid(string set_type, GameStatisticLeaderboardItem obj)  {
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
                , "usp_game_statistic_leaderboard_item_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboardItem obj)  {
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
                , "usp_game_statistic_leaderboard_item_set_uuid_profile_id_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCode(string set_type, GameStatisticLeaderboardItem obj)  {
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
                , "usp_game_statistic_leaderboard_item_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameId(string set_type, GameStatisticLeaderboardItem obj)  {
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
                , "usp_game_statistic_leaderboard_item_set_code_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileId(string set_type, GameStatisticLeaderboardItem obj)  {
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
                , "usp_game_statistic_leaderboard_item_set_code_game_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboardItem obj)  {
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
                , "usp_game_statistic_leaderboard_item_set_code_game_id_profile_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardItemUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
        public virtual bool DelGameStatisticLeaderboardItemProfileIdGameId(
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListCodeGameId(
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
                , "usp_game_statistic_leaderboard_item_get_code_game_id"
                , "game_statistic_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
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
                , "usp_game_statistic_leaderboard_item_get_code_game_id_profile_id"
                , "game_statistic_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
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
                , "usp_game_statistic_leaderboard_item_get_code_game_id_profile_id"
                , "game_statistic_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListProfileIdGameId(
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
                , "usp_game_statistic_leaderboard_item_get_profile_id_game_id"
                , "game_statistic_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
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
                , "usp_game_statistic_leaderboard_item_get_profile_id_game_id_time"
                , "game_statistic_leaderboard_item"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual int CountGameStatisticLeaderboardRollup(
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
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
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                , "usp_game_statistic_leaderboard_rollup_count_code_game_id_profil"
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
                , "usp_game_statistic_leaderboard_rollup_count_code_game_id_profil"
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
                , "usp_game_statistic_leaderboard_rollup_browse_filter"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );           
            }
            catch (Exception e){  
                log.Error(e);          
                return null;
            }
        }
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupUuid(string set_type, GameStatisticLeaderboardRollup obj)  {
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
                , "usp_game_statistic_leaderboard_rollup_set_uuid"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
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
                , "usp_game_statistic_leaderboard_rollup_set_uuid_profile_id_game_"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCode(string set_type, GameStatisticLeaderboardRollup obj)  {
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
                , "usp_game_statistic_leaderboard_rollup_set_code"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameId(string set_type, GameStatisticLeaderboardRollup obj)  {
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
                , "usp_game_statistic_leaderboard_rollup_set_code_game_id"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileId(string set_type, GameStatisticLeaderboardRollup obj)  {
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
                , "usp_game_statistic_leaderboard_rollup_set_code_game_id_profile_"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {
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
                , "usp_game_statistic_leaderboard_rollup_set_code_game_id_profile_"
                , parameters
                ));           
            }
            catch (Exception e){  
                log.Error(e);          
                return false;
            }    
        }    
//------------------------------------------------------------------------------                    
        public virtual bool DelGameStatisticLeaderboardRollupUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                    , "usp_game_statistic_leaderboard_rollup_del_code_game_id_profile_"
                    , parameters
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
                    , "usp_game_statistic_leaderboard_rollup_del_code_game_id_profile_"
                    , parameters
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
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListUuid(
            string uuid
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_uuid", uuid));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListGameId(
            string game_id
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_game_id", game_id));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListCode(
            string code
        )  {
            List<NpgsqlParameter> parameters 
                = new List<NpgsqlParameter>();                        
            parameters.Add(new NpgsqlParameter("in_code", code));
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
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListCodeGameId(
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
                , "usp_game_statistic_leaderboard_rollup_get_code_game_id"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
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
                , "usp_game_statistic_leaderboard_rollup_get_code_game_id_profile_"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
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
                , "usp_game_statistic_leaderboard_rollup_get_code_game_id_profile_"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListProfileIdGameId(
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
                , "usp_game_statistic_leaderboard_rollup_get_profile_id_game_id"
                , "game_statistic_leaderboard_rollup"
                , parameters
                );          
            }
            catch (Exception e){
                log.Error(e);
                return null;
            }
            
            
        } 
//------------------------------------------------------------------------------                    
        public virtual DataSet GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
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
                , "usp_game_statistic_leaderboard_rollup_get_profile_id_game_id_ti"
                , "game_statistic_leaderboard_rollup"
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
        public virtual int CountGameLiveQueueUuid(
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
        public virtual int CountGameLiveQueueProfileIdGameId(
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
        public virtual DataSet BrowseGameLiveQueueListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameLiveQueueUuid(string set_type, GameLiveQueue obj)  {
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
        public virtual bool SetGameLiveQueueProfileIdGameId(string set_type, GameLiveQueue obj)  {
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
        public virtual bool DelGameLiveQueueUuid(
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
        public virtual bool DelGameLiveQueueProfileIdGameId(
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
        public virtual DataSet GetGameLiveQueueListUuid(
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
        public virtual DataSet GetGameLiveQueueListGameId(
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
        public virtual DataSet GetGameLiveQueueListProfileIdGameId(
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
        public virtual int CountGameLiveRecentQueueUuid(
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
        public virtual int CountGameLiveRecentQueueProfileIdGameId(
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
        public virtual DataSet BrowseGameLiveRecentQueueListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameLiveRecentQueueUuid(string set_type, GameLiveRecentQueue obj)  {
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
        public virtual bool SetGameLiveRecentQueueProfileIdGameId(string set_type, GameLiveRecentQueue obj)  {
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
        public virtual bool DelGameLiveRecentQueueUuid(
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
        public virtual bool DelGameLiveRecentQueueProfileIdGameId(
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
        public virtual DataSet GetGameLiveRecentQueueListUuid(
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
        public virtual DataSet GetGameLiveRecentQueueListGameId(
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
        public virtual DataSet GetGameLiveRecentQueueListProfileIdGameId(
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
        public virtual int CountGameProfileStatisticUuid(
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
        public virtual int CountGameProfileStatisticCode(
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
        public virtual int CountGameProfileStatisticGameId(
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
        public virtual int CountGameProfileStatisticCodeGameId(
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
        public virtual int CountGameProfileStatisticProfileIdGameId(
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
        public virtual int CountGameProfileStatisticCodeProfileIdGameId(
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
        public virtual int CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
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
        public virtual DataSet BrowseGameProfileStatisticListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameProfileStatisticUuid(string set_type, GameProfileStatistic obj)  {
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
        public virtual bool SetGameProfileStatisticUuidProfileIdGameIdTimestamp(string set_type, GameProfileStatistic obj)  {
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
        public virtual bool SetGameProfileStatisticProfileIdCode(string set_type, GameProfileStatistic obj)  {
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
        public virtual bool SetGameProfileStatisticProfileIdCodeTimestamp(string set_type, GameProfileStatistic obj)  {
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
        public virtual bool SetGameProfileStatisticCodeProfileIdGameIdTimestamp(string set_type, GameProfileStatistic obj)  {
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
        public virtual bool SetGameProfileStatisticCodeProfileIdGameId(string set_type, GameProfileStatistic obj)  {
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
        public virtual bool DelGameProfileStatisticUuid(
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
        public virtual bool DelGameProfileStatisticCodeGameId(
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
        public virtual bool DelGameProfileStatisticProfileIdGameId(
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
        public virtual bool DelGameProfileStatisticCodeProfileIdGameId(
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
        public virtual DataSet GetGameProfileStatisticListUuid(
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
        public virtual DataSet GetGameProfileStatisticListCode(
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
        public virtual DataSet GetGameProfileStatisticListGameId(
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
        public virtual DataSet GetGameProfileStatisticListCodeGameId(
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
        public virtual DataSet GetGameProfileStatisticListProfileIdGameId(
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
        public virtual DataSet GetGameProfileStatisticListProfileIdGameIdTimestamp(
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
        public virtual DataSet GetGameProfileStatisticListCodeProfileIdGameId(
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
        public virtual DataSet GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
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
        public virtual int CountGameStatisticMetaUuid(
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
        public virtual int CountGameStatisticMetaCode(
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
        public virtual int CountGameStatisticMetaCodeGameId(
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
        public virtual int CountGameStatisticMetaName(
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
        public virtual int CountGameStatisticMetaGameId(
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
        public virtual DataSet BrowseGameStatisticMetaListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameStatisticMetaUuid(string set_type, GameStatisticMeta obj)  {
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
        public virtual bool SetGameStatisticMetaCodeGameId(string set_type, GameStatisticMeta obj)  {
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
        public virtual bool DelGameStatisticMetaUuid(
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
        public virtual bool DelGameStatisticMetaCodeGameId(
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
        public virtual DataSet GetGameStatisticMetaListUuid(
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
        public virtual DataSet GetGameStatisticMetaListCode(
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
        public virtual DataSet GetGameStatisticMetaListName(
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
        public virtual DataSet GetGameStatisticMetaListGameId(
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
        public virtual DataSet GetGameStatisticMetaListCodeGameId(
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
        public virtual int CountGameProfileStatisticItemUuid(
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
        public virtual int CountGameProfileStatisticItemCode(
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
        public virtual int CountGameProfileStatisticItemGameId(
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
        public virtual int CountGameProfileStatisticItemCodeGameId(
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
        public virtual int CountGameProfileStatisticItemProfileIdGameId(
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
        public virtual int CountGameProfileStatisticItemCodeProfileIdGameId(
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
        public virtual int CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
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
        public virtual DataSet BrowseGameProfileStatisticItemListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameProfileStatisticItemUuid(string set_type, GameProfileStatisticItem obj)  {
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
        public virtual bool SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(string set_type, GameProfileStatisticItem obj)  {
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
        public virtual bool SetGameProfileStatisticItemProfileIdCode(string set_type, GameProfileStatisticItem obj)  {
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
        public virtual bool SetGameProfileStatisticItemProfileIdCodeTimestamp(string set_type, GameProfileStatisticItem obj)  {
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
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(string set_type, GameProfileStatisticItem obj)  {
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
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameId(string set_type, GameProfileStatisticItem obj)  {
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
        public virtual bool DelGameProfileStatisticItemUuid(
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
        public virtual bool DelGameProfileStatisticItemCodeGameId(
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
        public virtual bool DelGameProfileStatisticItemProfileIdGameId(
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
        public virtual bool DelGameProfileStatisticItemCodeProfileIdGameId(
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
        public virtual DataSet GetGameProfileStatisticItemListUuid(
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
        public virtual DataSet GetGameProfileStatisticItemListCode(
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
        public virtual DataSet GetGameProfileStatisticItemListGameId(
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
        public virtual DataSet GetGameProfileStatisticItemListCodeGameId(
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
        public virtual DataSet GetGameProfileStatisticItemListProfileIdGameId(
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
        public virtual DataSet GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
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
        public virtual DataSet GetGameProfileStatisticItemListCodeProfileIdGameId(
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
        public virtual DataSet GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
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
        public virtual int CountGameKeyMetaUuid(
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
        public virtual int CountGameKeyMetaCode(
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
        public virtual int CountGameKeyMetaCodeGameId(
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
        public virtual int CountGameKeyMetaName(
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
        public virtual int CountGameKeyMetaKey(
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
        public virtual int CountGameKeyMetaGameId(
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
        public virtual int CountGameKeyMetaKeyGameId(
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
        public virtual DataSet BrowseGameKeyMetaListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameKeyMetaUuid(string set_type, GameKeyMeta obj)  {
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
        public virtual bool SetGameKeyMetaCodeGameId(string set_type, GameKeyMeta obj)  {
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
        public virtual bool SetGameKeyMetaKeyGameId(string set_type, GameKeyMeta obj)  {
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
        public virtual bool SetGameKeyMetaKeyGameIdLevel(string set_type, GameKeyMeta obj)  {
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
        public virtual bool DelGameKeyMetaUuid(
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
        public virtual bool DelGameKeyMetaCodeGameId(
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
        public virtual bool DelGameKeyMetaKeyGameId(
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
        public virtual DataSet GetGameKeyMetaListUuid(
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
        public virtual DataSet GetGameKeyMetaListCode(
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
        public virtual DataSet GetGameKeyMetaListCodeGameId(
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
        public virtual DataSet GetGameKeyMetaListName(
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
        public virtual DataSet GetGameKeyMetaListKey(
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
        public virtual DataSet GetGameKeyMetaListGameId(
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
        public virtual DataSet GetGameKeyMetaListKeyGameId(
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
        public virtual DataSet GetGameKeyMetaListCodeLevel(
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
        public virtual int CountGameLevelUuid(
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
        public virtual int CountGameLevelCode(
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
        public virtual int CountGameLevelCodeGameId(
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
        public virtual int CountGameLevelName(
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
        public virtual int CountGameLevelGameId(
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
        public virtual DataSet BrowseGameLevelListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameLevelUuid(string set_type, GameLevel obj)  {
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
        public virtual bool SetGameLevelCodeGameId(string set_type, GameLevel obj)  {
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
        public virtual bool DelGameLevelUuid(
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
        public virtual bool DelGameLevelCodeGameId(
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
        public virtual DataSet GetGameLevelListUuid(
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
        public virtual DataSet GetGameLevelListCode(
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
        public virtual DataSet GetGameLevelListCodeGameId(
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
        public virtual DataSet GetGameLevelListName(
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
        public virtual DataSet GetGameLevelListGameId(
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
        public virtual int CountGameProfileAchievementUuid(
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
        public virtual int CountGameProfileAchievementProfileIdCode(
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
        public virtual int CountGameProfileAchievementUsername(
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
        public virtual int CountGameProfileAchievementCodeProfileIdGameId(
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
        public virtual int CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
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
        public virtual DataSet BrowseGameProfileAchievementListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameProfileAchievementUuid(string set_type, GameProfileAchievement obj)  {
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
        public virtual bool SetGameProfileAchievementUuidCode(string set_type, GameProfileAchievement obj)  {
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
        public virtual bool SetGameProfileAchievementProfileIdCode(string set_type, GameProfileAchievement obj)  {
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
        public virtual bool SetGameProfileAchievementCodeProfileIdGameId(string set_type, GameProfileAchievement obj)  {
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
        public virtual bool SetGameProfileAchievementCodeProfileIdGameIdTimestamp(string set_type, GameProfileAchievement obj)  {
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
        public virtual bool DelGameProfileAchievementUuid(
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
        public virtual bool DelGameProfileAchievementProfileIdCode(
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
        public virtual bool DelGameProfileAchievementUuidCode(
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
        public virtual DataSet GetGameProfileAchievementListUuid(
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
        public virtual DataSet GetGameProfileAchievementListProfileIdCode(
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
        public virtual DataSet GetGameProfileAchievementListUsername(
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
        public virtual DataSet GetGameProfileAchievementListCode(
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
        public virtual DataSet GetGameProfileAchievementListGameId(
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
        public virtual DataSet GetGameProfileAchievementListCodeGameId(
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
        public virtual DataSet GetGameProfileAchievementListProfileIdGameId(
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
        public virtual DataSet GetGameProfileAchievementListProfileIdGameIdTimestamp(
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
        public virtual DataSet GetGameProfileAchievementListCodeProfileIdGameId(
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
        public virtual DataSet GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
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
        public virtual int CountGameAchievementMetaUuid(
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
        public virtual int CountGameAchievementMetaCode(
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
        public virtual int CountGameAchievementMetaCodeGameId(
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
        public virtual int CountGameAchievementMetaName(
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
        public virtual int CountGameAchievementMetaGameId(
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
        public virtual DataSet BrowseGameAchievementMetaListFilter(SearchFilter obj)  {
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
        public virtual bool SetGameAchievementMetaUuid(string set_type, GameAchievementMeta obj)  {
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
        public virtual bool SetGameAchievementMetaCodeGameId(string set_type, GameAchievementMeta obj)  {
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
        public virtual bool DelGameAchievementMetaUuid(
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
        public virtual bool DelGameAchievementMetaCodeGameId(
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
        public virtual DataSet GetGameAchievementMetaListUuid(
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
        public virtual DataSet GetGameAchievementMetaListCode(
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
        public virtual DataSet GetGameAchievementMetaListCodeGameId(
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
        public virtual DataSet GetGameAchievementMetaListName(
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
        public virtual DataSet GetGameAchievementMetaListGameId(
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
    }
}






