using System;
using System.Data;
using System.Data.SqlClient;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using ah.core.data;
using ah.core.data.pgsql;
using ah.core.ent;

using gaming;
using gaming.ent;

namespace gaming {

    public class BaseGamingACT {
    
        GamingData data = new GamingData();
        DataType dataType = new DataType();
        
        public BaseGamingACT(){
        
        }
        
        
        public virtual Game FillGame(DataRow dr) {
            Game obj = new Game();

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
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["app_id"] != null)                    
                    obj.app_id = dataType.FillDataString(dr, "app_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGame(
        )  {            
            return data.CountGame(
            );
        }       
        public virtual int CountGameByUuid(
            string uuid
        )  {            
            return data.CountGameByUuid(
                uuid
            );
        }       
        public virtual int CountGameByCode(
            string code
        )  {            
            return data.CountGameByCode(
                code
            );
        }       
        public virtual int CountGameByName(
            string name
        )  {            
            return data.CountGameByName(
                name
            );
        }       
        public virtual int CountGameByOrgId(
            string org_id
        )  {            
            return data.CountGameByOrgId(
                org_id
            );
        }       
        public virtual int CountGameByAppId(
            string app_id
        )  {            
            return data.CountGameByAppId(
                app_id
            );
        }       
        public virtual int CountGameByOrgIdByAppId(
            string org_id
            , string app_id
        )  {            
            return data.CountGameByOrgIdByAppId(
                org_id
                , app_id
            );
        }       
        public virtual GameResult BrowseGameListByFilter(SearchFilter obj)  {
            GameResult result = new GameResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        result.data.Add(game);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameByUuid(string set_type, Game obj)  {            
            return data.SetGameByUuid(set_type, obj);
        }    
        public virtual bool SetGameByCode(string set_type, Game obj)  {            
            return data.SetGameByCode(set_type, obj);
        }    
        public virtual bool SetGameByName(string set_type, Game obj)  {            
            return data.SetGameByName(set_type, obj);
        }    
        public virtual bool SetGameByOrgId(string set_type, Game obj)  {            
            return data.SetGameByOrgId(set_type, obj);
        }    
        public virtual bool SetGameByAppId(string set_type, Game obj)  {            
            return data.SetGameByAppId(set_type, obj);
        }    
        public virtual bool SetGameByOrgIdByAppId(string set_type, Game obj)  {            
            return data.SetGameByOrgIdByAppId(set_type, obj);
        }    
        public virtual bool DelGameByUuid(
            string uuid
        )  {
            return data.DelGameByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameByCode(
            string code
        )  {
            return data.DelGameByCode(
                code
            );
        }                     
        public virtual bool DelGameByName(
            string name
        )  {
            return data.DelGameByName(
                name
            );
        }                     
        public virtual bool DelGameByOrgId(
            string org_id
        )  {
            return data.DelGameByOrgId(
                org_id
            );
        }                     
        public virtual bool DelGameByAppId(
            string app_id
        )  {
            return data.DelGameByAppId(
                app_id
            );
        }                     
        public virtual bool DelGameByOrgIdByAppId(
            string org_id
            , string app_id
        )  {
            return data.DelGameByOrgIdByAppId(
                org_id
                , app_id
            );
        }                     
        public virtual List<Game> GetGameList(
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByUuid(
            string uuid
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByCode(
            string code
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByName(
            string name
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByOrgId(
            string org_id
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByAppId(
            string app_id
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByAppId(
                app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Game> GetGameListByOrgIdByAppId(
            string org_id
            , string app_id
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListByOrgIdByAppId(
                org_id
                , app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Game game  = FillGame(dr);
                        list.Add(game);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameAttribute FillGameAttribute(DataRow dr) {
            GameAttribute obj = new GameAttribute();

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
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
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
        
        public virtual int CountGameAttribute(
        )  {            
            return data.CountGameAttribute(
            );
        }       
        public virtual int CountGameAttributeByUuid(
            string uuid
        )  {            
            return data.CountGameAttributeByUuid(
                uuid
            );
        }       
        public virtual int CountGameAttributeByCode(
            string code
        )  {            
            return data.CountGameAttributeByCode(
                code
            );
        }       
        public virtual int CountGameAttributeByType(
            int type
        )  {            
            return data.CountGameAttributeByType(
                type
            );
        }       
        public virtual int CountGameAttributeByGroup(
            int group
        )  {            
            return data.CountGameAttributeByGroup(
                group
            );
        }       
        public virtual int CountGameAttributeByCodeByType(
            string code
            , int type
        )  {            
            return data.CountGameAttributeByCodeByType(
                code
                , type
            );
        }       
        public virtual int CountGameAttributeByGameId(
            string game_id
        )  {            
            return data.CountGameAttributeByGameId(
                game_id
            );
        }       
        public virtual int CountGameAttributeByGameIdByCode(
            string game_id
            , string code
        )  {            
            return data.CountGameAttributeByGameIdByCode(
                game_id
                , code
            );
        }       
        public virtual GameAttributeResult BrowseGameAttributeListByFilter(SearchFilter obj)  {
            GameAttributeResult result = new GameAttributeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameAttributeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttribute game_attribute  = FillGameAttribute(dr);
                        result.data.Add(game_attribute);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameAttributeByUuid(string set_type, GameAttribute obj)  {            
            return data.SetGameAttributeByUuid(set_type, obj);
        }    
        public virtual bool SetGameAttributeByCode(string set_type, GameAttribute obj)  {            
            return data.SetGameAttributeByCode(set_type, obj);
        }    
        public virtual bool SetGameAttributeByGameId(string set_type, GameAttribute obj)  {            
            return data.SetGameAttributeByGameId(set_type, obj);
        }    
        public virtual bool SetGameAttributeByGameIdByCode(string set_type, GameAttribute obj)  {            
            return data.SetGameAttributeByGameIdByCode(set_type, obj);
        }    
        public virtual bool DelGameAttributeByUuid(
            string uuid
        )  {
            return data.DelGameAttributeByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameAttributeByCode(
            string code
        )  {
            return data.DelGameAttributeByCode(
                code
            );
        }                     
        public virtual bool DelGameAttributeByCodeByType(
            string code
            , int type
        )  {
            return data.DelGameAttributeByCodeByType(
                code
                , type
            );
        }                     
        public virtual bool DelGameAttributeByGameId(
            string game_id
        )  {
            return data.DelGameAttributeByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameAttributeByGameIdByCode(
            string game_id
            , string code
        )  {
            return data.DelGameAttributeByGameIdByCode(
                game_id
                , code
            );
        }                     
        public virtual List<GameAttribute> GetGameAttributeList(
        )  {
            List<GameAttribute> list = new List<GameAttribute>();
            DataSet ds = data.GetGameAttributeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttribute game_attribute  = FillGameAttribute(dr);
                        list.Add(game_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttribute> GetGameAttributeListByUuid(
            string uuid
        )  {
            List<GameAttribute> list = new List<GameAttribute>();
            DataSet ds = data.GetGameAttributeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttribute game_attribute  = FillGameAttribute(dr);
                        list.Add(game_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttribute> GetGameAttributeListByCode(
            string code
        )  {
            List<GameAttribute> list = new List<GameAttribute>();
            DataSet ds = data.GetGameAttributeListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttribute game_attribute  = FillGameAttribute(dr);
                        list.Add(game_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttribute> GetGameAttributeListByType(
            int type
        )  {
            List<GameAttribute> list = new List<GameAttribute>();
            DataSet ds = data.GetGameAttributeListByType(
                type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttribute game_attribute  = FillGameAttribute(dr);
                        list.Add(game_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttribute> GetGameAttributeListByGroup(
            int group
        )  {
            List<GameAttribute> list = new List<GameAttribute>();
            DataSet ds = data.GetGameAttributeListByGroup(
                group
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttribute game_attribute  = FillGameAttribute(dr);
                        list.Add(game_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttribute> GetGameAttributeListByCodeByType(
            string code
            , int type
        )  {
            List<GameAttribute> list = new List<GameAttribute>();
            DataSet ds = data.GetGameAttributeListByCodeByType(
                code
                , type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttribute game_attribute  = FillGameAttribute(dr);
                        list.Add(game_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttribute> GetGameAttributeListByGameIdByCode(
            string game_id
            , string code
        )  {
            List<GameAttribute> list = new List<GameAttribute>();
            DataSet ds = data.GetGameAttributeListByGameIdByCode(
                game_id
                , code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttribute game_attribute  = FillGameAttribute(dr);
                        list.Add(game_attribute);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameAttributeText FillGameAttributeText(DataRow dr) {
            GameAttributeText obj = new GameAttributeText();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
            if (dr["attribute_value"] != null)                    
                    obj.attribute_value = dataType.FillDataString(dr, "attribute_value");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["group"] != null)                    
                    obj.group = dataType.FillDataInt(dr, "group");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["attribute_id"] != null)                    
                    obj.attribute_id = dataType.FillDataString(dr, "attribute_id");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataInt(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataInt(dr, "order");                

            return obj;
        }
        
        public virtual int CountGameAttributeText(
        )  {            
            return data.CountGameAttributeText(
            );
        }       
        public virtual int CountGameAttributeTextByUuid(
            string uuid
        )  {            
            return data.CountGameAttributeTextByUuid(
                uuid
            );
        }       
        public virtual int CountGameAttributeTextByGameId(
            string game_id
        )  {            
            return data.CountGameAttributeTextByGameId(
                game_id
            );
        }       
        public virtual int CountGameAttributeTextByAttributeId(
            string attribute_id
        )  {            
            return data.CountGameAttributeTextByAttributeId(
                attribute_id
            );
        }       
        public virtual int CountGameAttributeTextByGameIdByAttributeId(
            string game_id
            , string attribute_id
        )  {            
            return data.CountGameAttributeTextByGameIdByAttributeId(
                game_id
                , attribute_id
            );
        }       
        public virtual GameAttributeTextResult BrowseGameAttributeTextListByFilter(SearchFilter obj)  {
            GameAttributeTextResult result = new GameAttributeTextResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameAttributeTextListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeText game_attribute_text  = FillGameAttributeText(dr);
                        result.data.Add(game_attribute_text);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameAttributeText(string set_type, GameAttributeText obj)  {            
            return data.SetGameAttributeText(set_type, obj);
        }    
        public virtual bool SetGameAttributeTextByUuid(string set_type, GameAttributeText obj)  {            
            return data.SetGameAttributeTextByUuid(set_type, obj);
        }    
        public virtual bool SetGameAttributeTextByGameId(string set_type, GameAttributeText obj)  {            
            return data.SetGameAttributeTextByGameId(set_type, obj);
        }    
        public virtual bool SetGameAttributeTextByAttributeId(string set_type, GameAttributeText obj)  {            
            return data.SetGameAttributeTextByAttributeId(set_type, obj);
        }    
        public virtual bool SetGameAttributeTextByGameIdByAttributeId(string set_type, GameAttributeText obj)  {            
            return data.SetGameAttributeTextByGameIdByAttributeId(set_type, obj);
        }    
        public virtual bool DelGameAttributeText(
        )  {
            return data.DelGameAttributeText(
            );
        }                     
        public virtual bool DelGameAttributeTextByUuid(
            string uuid
        )  {
            return data.DelGameAttributeTextByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameAttributeTextByGameId(
            string game_id
        )  {
            return data.DelGameAttributeTextByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameAttributeTextByAttributeId(
            string attribute_id
        )  {
            return data.DelGameAttributeTextByAttributeId(
                attribute_id
            );
        }                     
        public virtual bool DelGameAttributeTextByGameIdByAttributeId(
            string game_id
            , string attribute_id
        )  {
            return data.DelGameAttributeTextByGameIdByAttributeId(
                game_id
                , attribute_id
            );
        }                     
        public virtual List<GameAttributeText> GetGameAttributeTextList(
        )  {
            List<GameAttributeText> list = new List<GameAttributeText>();
            DataSet ds = data.GetGameAttributeTextList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeText game_attribute_text  = FillGameAttributeText(dr);
                        list.Add(game_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttributeText> GetGameAttributeTextListByUuid(
            string uuid
        )  {
            List<GameAttributeText> list = new List<GameAttributeText>();
            DataSet ds = data.GetGameAttributeTextListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeText game_attribute_text  = FillGameAttributeText(dr);
                        list.Add(game_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttributeText> GetGameAttributeTextListByGameId(
            string game_id
        )  {
            List<GameAttributeText> list = new List<GameAttributeText>();
            DataSet ds = data.GetGameAttributeTextListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeText game_attribute_text  = FillGameAttributeText(dr);
                        list.Add(game_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttributeText> GetGameAttributeTextListByAttributeId(
            string attribute_id
        )  {
            List<GameAttributeText> list = new List<GameAttributeText>();
            DataSet ds = data.GetGameAttributeTextListByAttributeId(
                attribute_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeText game_attribute_text  = FillGameAttributeText(dr);
                        list.Add(game_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttributeText> GetGameAttributeTextListByGameIdByAttributeId(
            string game_id
            , string attribute_id
        )  {
            List<GameAttributeText> list = new List<GameAttributeText>();
            DataSet ds = data.GetGameAttributeTextListByGameIdByAttributeId(
                game_id
                , attribute_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeText game_attribute_text  = FillGameAttributeText(dr);
                        list.Add(game_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameAttributeData FillGameAttributeData(DataRow dr) {
            GameAttributeData obj = new GameAttributeData();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
            if (dr["attribute_value"] != null)                    
                    obj.attribute_value = dataType.FillDataString(dr, "attribute_value");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["group"] != null)                    
                    obj.group = dataType.FillDataInt(dr, "group");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["attribute_id"] != null)                    
                    obj.attribute_id = dataType.FillDataString(dr, "attribute_id");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataInt(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataInt(dr, "order");                

            return obj;
        }
        
        public virtual int CountGameAttributeData(
        )  {            
            return data.CountGameAttributeData(
            );
        }       
        public virtual int CountGameAttributeDataByUuid(
            string uuid
        )  {            
            return data.CountGameAttributeDataByUuid(
                uuid
            );
        }       
        public virtual int CountGameAttributeDataByGameId(
            string game_id
        )  {            
            return data.CountGameAttributeDataByGameId(
                game_id
            );
        }       
        public virtual int CountGameAttributeDataByGameIdByAttributeId(
            string game_id
            , string attribute_id
        )  {            
            return data.CountGameAttributeDataByGameIdByAttributeId(
                game_id
                , attribute_id
            );
        }       
        public virtual GameAttributeDataResult BrowseGameAttributeDataListByFilter(SearchFilter obj)  {
            GameAttributeDataResult result = new GameAttributeDataResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameAttributeDataListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeData game_attribute_data  = FillGameAttributeData(dr);
                        result.data.Add(game_attribute_data);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameAttributeDataByUuid(string set_type, GameAttributeData obj)  {            
            return data.SetGameAttributeDataByUuid(set_type, obj);
        }    
        public virtual bool SetGameAttributeDataByGameIdByAttributeId(string set_type, GameAttributeData obj)  {            
            return data.SetGameAttributeDataByGameIdByAttributeId(set_type, obj);
        }    
        public virtual bool DelGameAttributeData(
        )  {
            return data.DelGameAttributeData(
            );
        }                     
        public virtual bool DelGameAttributeDataByUuid(
            string uuid
        )  {
            return data.DelGameAttributeDataByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameAttributeDataByGameId(
            string game_id
        )  {
            return data.DelGameAttributeDataByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameAttributeDataByGameId(
            string game_id
        )  {
            return data.DelGameAttributeDataByGameId(
                game_id
            );
        }                     
        public virtual List<GameAttributeData> GetGameAttributeDataList(
        )  {
            List<GameAttributeData> list = new List<GameAttributeData>();
            DataSet ds = data.GetGameAttributeDataList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeData game_attribute_data  = FillGameAttributeData(dr);
                        list.Add(game_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttributeData> GetGameAttributeDataListByUuid(
            string uuid
        )  {
            List<GameAttributeData> list = new List<GameAttributeData>();
            DataSet ds = data.GetGameAttributeDataListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeData game_attribute_data  = FillGameAttributeData(dr);
                        list.Add(game_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttributeData> GetGameAttributeDataListByGameId(
            string game_id
        )  {
            List<GameAttributeData> list = new List<GameAttributeData>();
            DataSet ds = data.GetGameAttributeDataListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeData game_attribute_data  = FillGameAttributeData(dr);
                        list.Add(game_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAttributeData> GetGameAttributeDataListByGameIdByAttributeId(
            string game_id
            , string attribute_id
        )  {
            List<GameAttributeData> list = new List<GameAttributeData>();
            DataSet ds = data.GetGameAttributeDataListByGameIdByAttributeId(
                game_id
                , attribute_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAttributeData game_attribute_data  = FillGameAttributeData(dr);
                        list.Add(game_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameCategory FillGameCategory(DataRow dr) {
            GameCategory obj = new GameCategory();

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
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameCategory(
        )  {            
            return data.CountGameCategory(
            );
        }       
        public virtual int CountGameCategoryByUuid(
            string uuid
        )  {            
            return data.CountGameCategoryByUuid(
                uuid
            );
        }       
        public virtual int CountGameCategoryByCode(
            string code
        )  {            
            return data.CountGameCategoryByCode(
                code
            );
        }       
        public virtual int CountGameCategoryByName(
            string name
        )  {            
            return data.CountGameCategoryByName(
                name
            );
        }       
        public virtual int CountGameCategoryByOrgId(
            string org_id
        )  {            
            return data.CountGameCategoryByOrgId(
                org_id
            );
        }       
        public virtual int CountGameCategoryByTypeId(
            string type_id
        )  {            
            return data.CountGameCategoryByTypeId(
                type_id
            );
        }       
        public virtual int CountGameCategoryByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {            
            return data.CountGameCategoryByOrgIdByTypeId(
                org_id
                , type_id
            );
        }       
        public virtual GameCategoryResult BrowseGameCategoryListByFilter(SearchFilter obj)  {
            GameCategoryResult result = new GameCategoryResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameCategoryListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        result.data.Add(game_category);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameCategoryByUuid(string set_type, GameCategory obj)  {            
            return data.SetGameCategoryByUuid(set_type, obj);
        }    
        public virtual bool DelGameCategoryByUuid(
            string uuid
        )  {
            return data.DelGameCategoryByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameCategoryByCodeByOrgId(
            string code
            , string org_id
        )  {
            return data.DelGameCategoryByCodeByOrgId(
                code
                , org_id
            );
        }                     
        public virtual bool DelGameCategoryByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            return data.DelGameCategoryByCodeByOrgIdByTypeId(
                code
                , org_id
                , type_id
            );
        }                     
        public virtual List<GameCategory> GetGameCategoryList(
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByUuid(
            string uuid
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByCode(
            string code
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByName(
            string name
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByOrgId(
            string org_id
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByTypeId(
            string type_id
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByTypeId(
                type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategory> GetGameCategoryListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListByOrgIdByTypeId(
                org_id
                , type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategory game_category  = FillGameCategory(dr);
                        list.Add(game_category);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameCategoryTree FillGameCategoryTree(DataRow dr) {
            GameCategoryTree obj = new GameCategoryTree();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["parent_id"] != null)                    
                    obj.parent_id = dataType.FillDataString(dr, "parent_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["category_id"] != null)                    
                    obj.category_id = dataType.FillDataString(dr, "category_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameCategoryTree(
        )  {            
            return data.CountGameCategoryTree(
            );
        }       
        public virtual int CountGameCategoryTreeByUuid(
            string uuid
        )  {            
            return data.CountGameCategoryTreeByUuid(
                uuid
            );
        }       
        public virtual int CountGameCategoryTreeByParentId(
            string parent_id
        )  {            
            return data.CountGameCategoryTreeByParentId(
                parent_id
            );
        }       
        public virtual int CountGameCategoryTreeByCategoryId(
            string category_id
        )  {            
            return data.CountGameCategoryTreeByCategoryId(
                category_id
            );
        }       
        public virtual int CountGameCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {            
            return data.CountGameCategoryTreeByParentIdByCategoryId(
                parent_id
                , category_id
            );
        }       
        public virtual GameCategoryTreeResult BrowseGameCategoryTreeListByFilter(SearchFilter obj)  {
            GameCategoryTreeResult result = new GameCategoryTreeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameCategoryTreeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        result.data.Add(game_category_tree);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameCategoryTreeByUuid(string set_type, GameCategoryTree obj)  {            
            return data.SetGameCategoryTreeByUuid(set_type, obj);
        }    
        public virtual bool DelGameCategoryTreeByUuid(
            string uuid
        )  {
            return data.DelGameCategoryTreeByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameCategoryTreeByParentId(
            string parent_id
        )  {
            return data.DelGameCategoryTreeByParentId(
                parent_id
            );
        }                     
        public virtual bool DelGameCategoryTreeByCategoryId(
            string category_id
        )  {
            return data.DelGameCategoryTreeByCategoryId(
                category_id
            );
        }                     
        public virtual bool DelGameCategoryTreeByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            return data.DelGameCategoryTreeByParentIdByCategoryId(
                parent_id
                , category_id
            );
        }                     
        public virtual List<GameCategoryTree> GetGameCategoryTreeList(
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        list.Add(game_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByUuid(
            string uuid
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        list.Add(game_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByParentId(
            string parent_id
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListByParentId(
                parent_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        list.Add(game_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByCategoryId(
            string category_id
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListByCategoryId(
                category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        list.Add(game_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListByParentIdByCategoryId(
            string parent_id
            , string category_id
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListByParentIdByCategoryId(
                parent_id
                , category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryTree game_category_tree  = FillGameCategoryTree(dr);
                        list.Add(game_category_tree);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameCategoryAssoc FillGameCategoryAssoc(DataRow dr) {
            GameCategoryAssoc obj = new GameCategoryAssoc();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["category_id"] != null)                    
                    obj.category_id = dataType.FillDataString(dr, "category_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameCategoryAssoc(
        )  {            
            return data.CountGameCategoryAssoc(
            );
        }       
        public virtual int CountGameCategoryAssocByUuid(
            string uuid
        )  {            
            return data.CountGameCategoryAssocByUuid(
                uuid
            );
        }       
        public virtual int CountGameCategoryAssocByGameId(
            string game_id
        )  {            
            return data.CountGameCategoryAssocByGameId(
                game_id
            );
        }       
        public virtual int CountGameCategoryAssocByCategoryId(
            string category_id
        )  {            
            return data.CountGameCategoryAssocByCategoryId(
                category_id
            );
        }       
        public virtual int CountGameCategoryAssocByGameIdByCategoryId(
            string game_id
            , string category_id
        )  {            
            return data.CountGameCategoryAssocByGameIdByCategoryId(
                game_id
                , category_id
            );
        }       
        public virtual GameCategoryAssocResult BrowseGameCategoryAssocListByFilter(SearchFilter obj)  {
            GameCategoryAssocResult result = new GameCategoryAssocResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameCategoryAssocListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        result.data.Add(game_category_assoc);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameCategoryAssocByUuid(string set_type, GameCategoryAssoc obj)  {            
            return data.SetGameCategoryAssocByUuid(set_type, obj);
        }    
        public virtual bool DelGameCategoryAssocByUuid(
            string uuid
        )  {
            return data.DelGameCategoryAssocByUuid(
                uuid
            );
        }                     
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocList(
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        list.Add(game_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByUuid(
            string uuid
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        list.Add(game_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByGameId(
            string game_id
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        list.Add(game_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByCategoryId(
            string category_id
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListByCategoryId(
                category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        list.Add(game_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListByGameIdByCategoryId(
            string game_id
            , string category_id
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListByGameIdByCategoryId(
                game_id
                , category_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameCategoryAssoc game_category_assoc  = FillGameCategoryAssoc(dr);
                        list.Add(game_category_assoc);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameType FillGameType(DataRow dr) {
            GameType obj = new GameType();

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
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameType(
        )  {            
            return data.CountGameType(
            );
        }       
        public virtual int CountGameTypeByUuid(
            string uuid
        )  {            
            return data.CountGameTypeByUuid(
                uuid
            );
        }       
        public virtual int CountGameTypeByCode(
            string code
        )  {            
            return data.CountGameTypeByCode(
                code
            );
        }       
        public virtual int CountGameTypeByName(
            string name
        )  {            
            return data.CountGameTypeByName(
                name
            );
        }       
        public virtual GameTypeResult BrowseGameTypeListByFilter(SearchFilter obj)  {
            GameTypeResult result = new GameTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameTypeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameType game_type  = FillGameType(dr);
                        result.data.Add(game_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameTypeByUuid(string set_type, GameType obj)  {            
            return data.SetGameTypeByUuid(set_type, obj);
        }    
        public virtual bool DelGameTypeByUuid(
            string uuid
        )  {
            return data.DelGameTypeByUuid(
                uuid
            );
        }                     
        public virtual List<GameType> GetGameTypeList(
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameType game_type  = FillGameType(dr);
                        list.Add(game_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameType> GetGameTypeListByUuid(
            string uuid
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameType game_type  = FillGameType(dr);
                        list.Add(game_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameType> GetGameTypeListByCode(
            string code
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameType game_type  = FillGameType(dr);
                        list.Add(game_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameType> GetGameTypeListByName(
            string name
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameType game_type  = FillGameType(dr);
                        list.Add(game_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileGame FillProfileGame(DataRow dr) {
            ProfileGame obj = new ProfileGame();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["profile_iteration"] != null)                    
                    obj.profile_iteration = dataType.FillDataString(dr, "profile_iteration");                
            if (dr["game_profile"] != null)                    
                    obj.game_profile = dataType.FillDataString(dr, "game_profile");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["profile_version"] != null)                    
                    obj.profile_version = dataType.FillDataString(dr, "profile_version");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountProfileGame(
        )  {            
            return data.CountProfileGame(
            );
        }       
        public virtual int CountProfileGameByUuid(
            string uuid
        )  {            
            return data.CountProfileGameByUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameByGameId(
            string game_id
        )  {            
            return data.CountProfileGameByGameId(
                game_id
            );
        }       
        public virtual int CountProfileGameByProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountProfileGameByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual ProfileGameResult BrowseProfileGameListByFilter(SearchFilter obj)  {
            ProfileGameResult result = new ProfileGameResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        result.data.Add(profile_game);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileGameByUuid(string set_type, ProfileGame obj)  {            
            return data.SetProfileGameByUuid(set_type, obj);
        }    
        public virtual bool SetProfileGameByGameId(string set_type, ProfileGame obj)  {            
            return data.SetProfileGameByGameId(set_type, obj);
        }    
        public virtual bool SetProfileGameByProfileId(string set_type, ProfileGame obj)  {            
            return data.SetProfileGameByProfileId(set_type, obj);
        }    
        public virtual bool SetProfileGameByProfileIdByGameId(string set_type, ProfileGame obj)  {            
            return data.SetProfileGameByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool DelProfileGameByUuid(
            string uuid
        )  {
            return data.DelProfileGameByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileGameByGameId(
            string game_id
        )  {
            return data.DelProfileGameByGameId(
                game_id
            );
        }                     
        public virtual bool DelProfileGameByProfileId(
            string profile_id
        )  {
            return data.DelProfileGameByProfileId(
                profile_id
            );
        }                     
        public virtual bool DelProfileGameByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelProfileGameByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<ProfileGame> GetProfileGameList(
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        list.Add(profile_game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGame> GetProfileGameListByUuid(
            string uuid
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        list.Add(profile_game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGame> GetProfileGameListByGameId(
            string game_id
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        list.Add(profile_game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGame> GetProfileGameListByProfileId(
            string profile_id
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        list.Add(profile_game);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGame> GetProfileGameListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGame profile_game  = FillProfileGame(dr);
                        list.Add(profile_game);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameProfileAttribute FillGameProfileAttribute(DataRow dr) {
            GameProfileAttribute obj = new GameProfileAttribute();

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
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
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
        
        public virtual int CountGameProfileAttribute(
        )  {            
            return data.CountGameProfileAttribute(
            );
        }       
        public virtual int CountGameProfileAttributeByUuid(
            string uuid
        )  {            
            return data.CountGameProfileAttributeByUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileAttributeByCode(
            string code
        )  {            
            return data.CountGameProfileAttributeByCode(
                code
            );
        }       
        public virtual int CountGameProfileAttributeByType(
            int type
        )  {            
            return data.CountGameProfileAttributeByType(
                type
            );
        }       
        public virtual int CountGameProfileAttributeByGroup(
            int group
        )  {            
            return data.CountGameProfileAttributeByGroup(
                group
            );
        }       
        public virtual int CountGameProfileAttributeByCodeByType(
            string code
            , int type
        )  {            
            return data.CountGameProfileAttributeByCodeByType(
                code
                , type
            );
        }       
        public virtual int CountGameProfileAttributeByGameId(
            string game_id
        )  {            
            return data.CountGameProfileAttributeByGameId(
                game_id
            );
        }       
        public virtual int CountGameProfileAttributeByGameIdByCode(
            string game_id
            , string code
        )  {            
            return data.CountGameProfileAttributeByGameIdByCode(
                game_id
                , code
            );
        }       
        public virtual GameProfileAttributeResult BrowseGameProfileAttributeListByFilter(SearchFilter obj)  {
            GameProfileAttributeResult result = new GameProfileAttributeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileAttributeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttribute game_profile_attribute  = FillGameProfileAttribute(dr);
                        result.data.Add(game_profile_attribute);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProfileAttributeByUuid(string set_type, GameProfileAttribute obj)  {            
            return data.SetGameProfileAttributeByUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileAttributeByCode(string set_type, GameProfileAttribute obj)  {            
            return data.SetGameProfileAttributeByCode(set_type, obj);
        }    
        public virtual bool SetGameProfileAttributeByGameId(string set_type, GameProfileAttribute obj)  {            
            return data.SetGameProfileAttributeByGameId(set_type, obj);
        }    
        public virtual bool SetGameProfileAttributeByGameIdByCode(string set_type, GameProfileAttribute obj)  {            
            return data.SetGameProfileAttributeByGameIdByCode(set_type, obj);
        }    
        public virtual bool DelGameProfileAttributeByUuid(
            string uuid
        )  {
            return data.DelGameProfileAttributeByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileAttributeByCode(
            string code
        )  {
            return data.DelGameProfileAttributeByCode(
                code
            );
        }                     
        public virtual bool DelGameProfileAttributeByCodeByType(
            string code
            , int type
        )  {
            return data.DelGameProfileAttributeByCodeByType(
                code
                , type
            );
        }                     
        public virtual bool DelGameProfileAttributeByGameId(
            string game_id
        )  {
            return data.DelGameProfileAttributeByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameProfileAttributeByGameIdByCode(
            string game_id
            , string code
        )  {
            return data.DelGameProfileAttributeByGameIdByCode(
                game_id
                , code
            );
        }                     
        public virtual List<GameProfileAttribute> GetGameProfileAttributeList(
        )  {
            List<GameProfileAttribute> list = new List<GameProfileAttribute>();
            DataSet ds = data.GetGameProfileAttributeList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttribute game_profile_attribute  = FillGameProfileAttribute(dr);
                        list.Add(game_profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttribute> GetGameProfileAttributeListByUuid(
            string uuid
        )  {
            List<GameProfileAttribute> list = new List<GameProfileAttribute>();
            DataSet ds = data.GetGameProfileAttributeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttribute game_profile_attribute  = FillGameProfileAttribute(dr);
                        list.Add(game_profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttribute> GetGameProfileAttributeListByCode(
            string code
        )  {
            List<GameProfileAttribute> list = new List<GameProfileAttribute>();
            DataSet ds = data.GetGameProfileAttributeListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttribute game_profile_attribute  = FillGameProfileAttribute(dr);
                        list.Add(game_profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttribute> GetGameProfileAttributeListByType(
            int type
        )  {
            List<GameProfileAttribute> list = new List<GameProfileAttribute>();
            DataSet ds = data.GetGameProfileAttributeListByType(
                type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttribute game_profile_attribute  = FillGameProfileAttribute(dr);
                        list.Add(game_profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttribute> GetGameProfileAttributeListByGroup(
            int group
        )  {
            List<GameProfileAttribute> list = new List<GameProfileAttribute>();
            DataSet ds = data.GetGameProfileAttributeListByGroup(
                group
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttribute game_profile_attribute  = FillGameProfileAttribute(dr);
                        list.Add(game_profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttribute> GetGameProfileAttributeListByCodeByType(
            string code
            , int type
        )  {
            List<GameProfileAttribute> list = new List<GameProfileAttribute>();
            DataSet ds = data.GetGameProfileAttributeListByCodeByType(
                code
                , type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttribute game_profile_attribute  = FillGameProfileAttribute(dr);
                        list.Add(game_profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttribute> GetGameProfileAttributeListByGameIdByCode(
            string game_id
            , string code
        )  {
            List<GameProfileAttribute> list = new List<GameProfileAttribute>();
            DataSet ds = data.GetGameProfileAttributeListByGameIdByCode(
                game_id
                , code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttribute game_profile_attribute  = FillGameProfileAttribute(dr);
                        list.Add(game_profile_attribute);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameProfileAttributeText FillGameProfileAttributeText(DataRow dr) {
            GameProfileAttributeText obj = new GameProfileAttributeText();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["attribute_value"] != null)                    
                    obj.attribute_value = dataType.FillDataString(dr, "attribute_value");                
            if (dr["group"] != null)                    
                    obj.group = dataType.FillDataInt(dr, "group");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["attribute_id"] != null)                    
                    obj.attribute_id = dataType.FillDataString(dr, "attribute_id");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataInt(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataInt(dr, "order");                

            return obj;
        }
        
        public virtual int CountGameProfileAttributeText(
        )  {            
            return data.CountGameProfileAttributeText(
            );
        }       
        public virtual int CountGameProfileAttributeTextByUuid(
            string uuid
        )  {            
            return data.CountGameProfileAttributeTextByUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileAttributeTextByProfileId(
            string profile_id
        )  {            
            return data.CountGameProfileAttributeTextByProfileId(
                profile_id
            );
        }       
        public virtual int CountGameProfileAttributeTextByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return data.CountGameProfileAttributeTextByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
        }       
        public virtual int CountGameProfileAttributeTextByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {            
            return data.CountGameProfileAttributeTextByGameIdByProfileId(
                game_id
                , profile_id
            );
        }       
        public virtual int CountGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
            string game_id
            , string profile_id
            , string attribute_id
        )  {            
            return data.CountGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
                game_id
                , profile_id
                , attribute_id
            );
        }       
        public virtual GameProfileAttributeTextResult BrowseGameProfileAttributeTextListByFilter(SearchFilter obj)  {
            GameProfileAttributeTextResult result = new GameProfileAttributeTextResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileAttributeTextListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeText game_profile_attribute_text  = FillGameProfileAttributeText(dr);
                        result.data.Add(game_profile_attribute_text);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProfileAttributeTextByUuid(string set_type, GameProfileAttributeText obj)  {            
            return data.SetGameProfileAttributeTextByUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileAttributeTextByProfileId(string set_type, GameProfileAttributeText obj)  {            
            return data.SetGameProfileAttributeTextByProfileId(set_type, obj);
        }    
        public virtual bool SetGameProfileAttributeTextByProfileIdByAttributeId(string set_type, GameProfileAttributeText obj)  {            
            return data.SetGameProfileAttributeTextByProfileIdByAttributeId(set_type, obj);
        }    
        public virtual bool SetGameProfileAttributeTextByGameIdByProfileId(string set_type, GameProfileAttributeText obj)  {            
            return data.SetGameProfileAttributeTextByGameIdByProfileId(set_type, obj);
        }    
        public virtual bool SetGameProfileAttributeTextByGameIdByProfileIdByAttributeId(string set_type, GameProfileAttributeText obj)  {            
            return data.SetGameProfileAttributeTextByGameIdByProfileIdByAttributeId(set_type, obj);
        }    
        public virtual bool DelGameProfileAttributeTextByUuid(
            string uuid
        )  {
            return data.DelGameProfileAttributeTextByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileAttributeTextByProfileId(
            string profile_id
        )  {
            return data.DelGameProfileAttributeTextByProfileId(
                profile_id
            );
        }                     
        public virtual bool DelGameProfileAttributeTextByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            return data.DelGameProfileAttributeTextByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
        }                     
        public virtual bool DelGameProfileAttributeTextByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            return data.DelGameProfileAttributeTextByGameIdByProfileId(
                game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
            string game_id
            , string profile_id
            , string attribute_id
        )  {
            return data.DelGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
                game_id
                , profile_id
                , attribute_id
            );
        }                     
        public virtual List<GameProfileAttributeText> GetGameProfileAttributeTextListByUuid(
            string uuid
        )  {
            List<GameProfileAttributeText> list = new List<GameProfileAttributeText>();
            DataSet ds = data.GetGameProfileAttributeTextListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeText game_profile_attribute_text  = FillGameProfileAttributeText(dr);
                        list.Add(game_profile_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttributeText> GetGameProfileAttributeTextListByProfileId(
            string profile_id
        )  {
            List<GameProfileAttributeText> list = new List<GameProfileAttributeText>();
            DataSet ds = data.GetGameProfileAttributeTextListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeText game_profile_attribute_text  = FillGameProfileAttributeText(dr);
                        list.Add(game_profile_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttributeText> GetGameProfileAttributeTextListByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<GameProfileAttributeText> list = new List<GameProfileAttributeText>();
            DataSet ds = data.GetGameProfileAttributeTextListByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeText game_profile_attribute_text  = FillGameProfileAttributeText(dr);
                        list.Add(game_profile_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttributeText> GetGameProfileAttributeTextListByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            List<GameProfileAttributeText> list = new List<GameProfileAttributeText>();
            DataSet ds = data.GetGameProfileAttributeTextListByGameIdByProfileId(
                game_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeText game_profile_attribute_text  = FillGameProfileAttributeText(dr);
                        list.Add(game_profile_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttributeText> GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
            string game_id
            , string profile_id
            , string attribute_id
        )  {
            List<GameProfileAttributeText> list = new List<GameProfileAttributeText>();
            DataSet ds = data.GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
                game_id
                , profile_id
                , attribute_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeText game_profile_attribute_text  = FillGameProfileAttributeText(dr);
                        list.Add(game_profile_attribute_text);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameProfileAttributeData FillGameProfileAttributeData(DataRow dr) {
            GameProfileAttributeData obj = new GameProfileAttributeData();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["attribute_value"] != null)                    
                    obj.attribute_value = dataType.FillDataString(dr, "attribute_value");                
            if (dr["group"] != null)                    
                    obj.group = dataType.FillDataInt(dr, "group");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["attribute_id"] != null)                    
                    obj.attribute_id = dataType.FillDataString(dr, "attribute_id");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataInt(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataInt(dr, "order");                

            return obj;
        }
        
        public virtual int CountGameProfileAttributeData(
        )  {            
            return data.CountGameProfileAttributeData(
            );
        }       
        public virtual int CountGameProfileAttributeDataByUuid(
            string uuid
        )  {            
            return data.CountGameProfileAttributeDataByUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileAttributeDataByProfileId(
            string profile_id
        )  {            
            return data.CountGameProfileAttributeDataByProfileId(
                profile_id
            );
        }       
        public virtual int CountGameProfileAttributeDataByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {            
            return data.CountGameProfileAttributeDataByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
        }       
        public virtual int CountGameProfileAttributeDataByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {            
            return data.CountGameProfileAttributeDataByGameIdByProfileId(
                game_id
                , profile_id
            );
        }       
        public virtual int CountGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
            string game_id
            , string profile_id
            , string attribute_id
        )  {            
            return data.CountGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
                game_id
                , profile_id
                , attribute_id
            );
        }       
        public virtual GameProfileAttributeDataResult BrowseGameProfileAttributeDataListByFilter(SearchFilter obj)  {
            GameProfileAttributeDataResult result = new GameProfileAttributeDataResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileAttributeDataListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeData game_profile_attribute_data  = FillGameProfileAttributeData(dr);
                        result.data.Add(game_profile_attribute_data);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProfileAttributeDataByUuid(string set_type, GameProfileAttributeData obj)  {            
            return data.SetGameProfileAttributeDataByUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileAttributeDataByProfileIdByAttributeId(string set_type, GameProfileAttributeData obj)  {            
            return data.SetGameProfileAttributeDataByProfileIdByAttributeId(set_type, obj);
        }    
        public virtual bool SetGameProfileAttributeDataByGameIdByProfileId(string set_type, GameProfileAttributeData obj)  {            
            return data.SetGameProfileAttributeDataByGameIdByProfileId(set_type, obj);
        }    
        public virtual bool SetGameProfileAttributeDataByGameIdByProfileIdByAttributeId(string set_type, GameProfileAttributeData obj)  {            
            return data.SetGameProfileAttributeDataByGameIdByProfileIdByAttributeId(set_type, obj);
        }    
        public virtual bool DelGameProfileAttributeDataByUuid(
            string uuid
        )  {
            return data.DelGameProfileAttributeDataByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileAttributeDataByProfileId(
            string profile_id
        )  {
            return data.DelGameProfileAttributeDataByProfileId(
                profile_id
            );
        }                     
        public virtual bool DelGameProfileAttributeDataByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            return data.DelGameProfileAttributeDataByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
        }                     
        public virtual bool DelGameProfileAttributeDataByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            return data.DelGameProfileAttributeDataByGameIdByProfileId(
                game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
            string game_id
            , string profile_id
            , string attribute_id
        )  {
            return data.DelGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
                game_id
                , profile_id
                , attribute_id
            );
        }                     
        public virtual List<GameProfileAttributeData> GetGameProfileAttributeDataList(
        )  {
            List<GameProfileAttributeData> list = new List<GameProfileAttributeData>();
            DataSet ds = data.GetGameProfileAttributeDataList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeData game_profile_attribute_data  = FillGameProfileAttributeData(dr);
                        list.Add(game_profile_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttributeData> GetGameProfileAttributeDataListByUuid(
            string uuid
        )  {
            List<GameProfileAttributeData> list = new List<GameProfileAttributeData>();
            DataSet ds = data.GetGameProfileAttributeDataListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeData game_profile_attribute_data  = FillGameProfileAttributeData(dr);
                        list.Add(game_profile_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttributeData> GetGameProfileAttributeDataListByProfileId(
            string profile_id
        )  {
            List<GameProfileAttributeData> list = new List<GameProfileAttributeData>();
            DataSet ds = data.GetGameProfileAttributeDataListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeData game_profile_attribute_data  = FillGameProfileAttributeData(dr);
                        list.Add(game_profile_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttributeData> GetGameProfileAttributeDataListByProfileIdByAttributeId(
            string profile_id
            , string attribute_id
        )  {
            List<GameProfileAttributeData> list = new List<GameProfileAttributeData>();
            DataSet ds = data.GetGameProfileAttributeDataListByProfileIdByAttributeId(
                profile_id
                , attribute_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeData game_profile_attribute_data  = FillGameProfileAttributeData(dr);
                        list.Add(game_profile_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttributeData> GetGameProfileAttributeDataListByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            List<GameProfileAttributeData> list = new List<GameProfileAttributeData>();
            DataSet ds = data.GetGameProfileAttributeDataListByGameIdByProfileId(
                game_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeData game_profile_attribute_data  = FillGameProfileAttributeData(dr);
                        list.Add(game_profile_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAttributeData> GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
            string game_id
            , string profile_id
            , string attribute_id
        )  {
            List<GameProfileAttributeData> list = new List<GameProfileAttributeData>();
            DataSet ds = data.GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
                game_id
                , profile_id
                , attribute_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAttributeData game_profile_attribute_data  = FillGameProfileAttributeData(dr);
                        list.Add(game_profile_attribute_data);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameNetwork FillGameNetwork(DataRow dr) {
            GameNetwork obj = new GameNetwork();

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
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["secret"] != null)                    
                    obj.secret = dataType.FillDataString(dr, "secret");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameNetwork(
        )  {            
            return data.CountGameNetwork(
            );
        }       
        public virtual int CountGameNetworkByUuid(
            string uuid
        )  {            
            return data.CountGameNetworkByUuid(
                uuid
            );
        }       
        public virtual int CountGameNetworkByCode(
            string code
        )  {            
            return data.CountGameNetworkByCode(
                code
            );
        }       
        public virtual int CountGameNetworkByUuidByType(
            string uuid
            , string type
        )  {            
            return data.CountGameNetworkByUuidByType(
                uuid
                , type
            );
        }       
        public virtual GameNetworkResult BrowseGameNetworkListByFilter(SearchFilter obj)  {
            GameNetworkResult result = new GameNetworkResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameNetworkListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameNetwork game_network  = FillGameNetwork(dr);
                        result.data.Add(game_network);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameNetworkByUuid(string set_type, GameNetwork obj)  {            
            return data.SetGameNetworkByUuid(set_type, obj);
        }    
        public virtual bool SetGameNetworkByCode(string set_type, GameNetwork obj)  {            
            return data.SetGameNetworkByCode(set_type, obj);
        }    
        public virtual bool DelGameNetworkByUuid(
            string uuid
        )  {
            return data.DelGameNetworkByUuid(
                uuid
            );
        }                     
        public virtual List<GameNetwork> GetGameNetworkList(
        )  {
            List<GameNetwork> list = new List<GameNetwork>();
            DataSet ds = data.GetGameNetworkList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameNetwork game_network  = FillGameNetwork(dr);
                        list.Add(game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameNetwork> GetGameNetworkListByUuid(
            string uuid
        )  {
            List<GameNetwork> list = new List<GameNetwork>();
            DataSet ds = data.GetGameNetworkListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameNetwork game_network  = FillGameNetwork(dr);
                        list.Add(game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameNetwork> GetGameNetworkListByCode(
            string code
        )  {
            List<GameNetwork> list = new List<GameNetwork>();
            DataSet ds = data.GetGameNetworkListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameNetwork game_network  = FillGameNetwork(dr);
                        list.Add(game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameNetwork> GetGameNetworkListByUuidByType(
            string uuid
            , string type
        )  {
            List<GameNetwork> list = new List<GameNetwork>();
            DataSet ds = data.GetGameNetworkListByUuidByType(
                uuid
                , type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameNetwork game_network  = FillGameNetwork(dr);
                        list.Add(game_network);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameNetworkAuth FillGameNetworkAuth(DataRow dr) {
            GameNetworkAuth obj = new GameNetworkAuth();

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
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["app_id"] != null)                    
                    obj.app_id = dataType.FillDataString(dr, "app_id");                
            if (dr["game_network_id"] != null)                    
                    obj.game_network_id = dataType.FillDataString(dr, "game_network_id");                
            if (dr["secret"] != null)                    
                    obj.secret = dataType.FillDataString(dr, "secret");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameNetworkAuth(
        )  {            
            return data.CountGameNetworkAuth(
            );
        }       
        public virtual int CountGameNetworkAuthByUuid(
            string uuid
        )  {            
            return data.CountGameNetworkAuthByUuid(
                uuid
            );
        }       
        public virtual int CountGameNetworkAuthByGameIdByGameNetworkId(
            string game_id
            , string game_network_id
        )  {            
            return data.CountGameNetworkAuthByGameIdByGameNetworkId(
                game_id
                , game_network_id
            );
        }       
        public virtual GameNetworkAuthResult BrowseGameNetworkAuthListByFilter(SearchFilter obj)  {
            GameNetworkAuthResult result = new GameNetworkAuthResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameNetworkAuthListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameNetworkAuth game_network_auth  = FillGameNetworkAuth(dr);
                        result.data.Add(game_network_auth);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameNetworkAuthByUuid(string set_type, GameNetworkAuth obj)  {            
            return data.SetGameNetworkAuthByUuid(set_type, obj);
        }    
        public virtual bool SetGameNetworkAuthByGameIdByGameNetworkId(string set_type, GameNetworkAuth obj)  {            
            return data.SetGameNetworkAuthByGameIdByGameNetworkId(set_type, obj);
        }    
        public virtual bool DelGameNetworkAuthByUuid(
            string uuid
        )  {
            return data.DelGameNetworkAuthByUuid(
                uuid
            );
        }                     
        public virtual List<GameNetworkAuth> GetGameNetworkAuthList(
        )  {
            List<GameNetworkAuth> list = new List<GameNetworkAuth>();
            DataSet ds = data.GetGameNetworkAuthList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameNetworkAuth game_network_auth  = FillGameNetworkAuth(dr);
                        list.Add(game_network_auth);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameNetworkAuth> GetGameNetworkAuthListByUuid(
            string uuid
        )  {
            List<GameNetworkAuth> list = new List<GameNetworkAuth>();
            DataSet ds = data.GetGameNetworkAuthListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameNetworkAuth game_network_auth  = FillGameNetworkAuth(dr);
                        list.Add(game_network_auth);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameNetworkAuth> GetGameNetworkAuthListByGameIdByGameNetworkId(
            string game_id
            , string game_network_id
        )  {
            List<GameNetworkAuth> list = new List<GameNetworkAuth>();
            DataSet ds = data.GetGameNetworkAuthListByGameIdByGameNetworkId(
                game_id
                , game_network_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameNetworkAuth game_network_auth  = FillGameNetworkAuth(dr);
                        list.Add(game_network_auth);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileGameNetwork FillProfileGameNetwork(DataRow dr) {
            ProfileGameNetwork obj = new ProfileGameNetwork();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["hash"] != null)                    
                    obj.hash = dataType.FillDataString(dr, "hash");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["game_network_id"] != null)                    
                    obj.game_network_id = dataType.FillDataString(dr, "game_network_id");                
            if (dr["network_username"] != null)                    
                    obj.network_username = dataType.FillDataString(dr, "network_username");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["network_fullname"] != null)                    
                    obj.network_fullname = dataType.FillDataString(dr, "network_fullname");                
            if (dr["secret"] != null)                    
                    obj.secret = dataType.FillDataString(dr, "secret");                
            if (dr["token"] != null)                    
                    obj.token = dataType.FillDataString(dr, "token");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["network_auth"] != null)                    
                    obj.network_auth = dataType.FillDataString(dr, "network_auth");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["network_user_id"] != null)                    
                    obj.network_user_id = dataType.FillDataString(dr, "network_user_id");                

            return obj;
        }
        
        public virtual int CountProfileGameNetwork(
        )  {            
            return data.CountProfileGameNetwork(
            );
        }       
        public virtual int CountProfileGameNetworkByUuid(
            string uuid
        )  {            
            return data.CountProfileGameNetworkByUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameNetworkByGameId(
            string game_id
        )  {            
            return data.CountProfileGameNetworkByGameId(
                game_id
            );
        }       
        public virtual int CountProfileGameNetworkByProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameNetworkByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameNetworkByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountProfileGameNetworkByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual int CountProfileGameNetworkByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountProfileGameNetworkByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual int CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {            
            return data.CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
                profile_id
                , game_id
                , game_network_id
            );
        }       
        public virtual int CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {            
            return data.CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
                network_username
                , game_id
                , game_network_id
            );
        }       
        public virtual ProfileGameNetworkResult BrowseProfileGameNetworkListByFilter(SearchFilter obj)  {
            ProfileGameNetworkResult result = new ProfileGameNetworkResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameNetworkListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        result.data.Add(profile_game_network);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileGameNetworkByUuid(string set_type, ProfileGameNetwork obj)  {            
            return data.SetProfileGameNetworkByUuid(set_type, obj);
        }    
        public virtual bool SetProfileGameNetworkByProfileIdByGameId(string set_type, ProfileGameNetwork obj)  {            
            return data.SetProfileGameNetworkByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(string set_type, ProfileGameNetwork obj)  {            
            return data.SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(set_type, obj);
        }    
        public virtual bool SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(string set_type, ProfileGameNetwork obj)  {            
            return data.SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(set_type, obj);
        }    
        public virtual bool DelProfileGameNetworkByUuid(
            string uuid
        )  {
            return data.DelProfileGameNetworkByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileGameNetworkByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelProfileGameNetworkByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual bool DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            return data.DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
                profile_id
                , game_id
                , game_network_id
            );
        }                     
        public virtual bool DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            return data.DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
                network_username
                , game_id
                , game_network_id
            );
        }                     
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkList(
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByUuid(
            string uuid
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByGameId(
            string game_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByProfileId(
            string profile_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
                profile_id
                , game_id
                , game_network_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
                network_username
                , game_id
                , game_network_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameNetwork profile_game_network  = FillProfileGameNetwork(dr);
                        list.Add(profile_game_network);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileGameDataAttribute FillProfileGameDataAttribute(DataRow dr) {
            ProfileGameDataAttribute obj = new ProfileGameDataAttribute();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["val"] != null)                    
                    obj.val = dataType.FillDataString(dr, "val");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["otype"] != null)                    
                    obj.otype = dataType.FillDataString(dr, "otype");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountProfileGameDataAttribute(
        )  {            
            return data.CountProfileGameDataAttribute(
            );
        }       
        public virtual int CountProfileGameDataAttributeByUuid(
            string uuid
        )  {            
            return data.CountProfileGameDataAttributeByUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameDataAttributeByProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameDataAttributeByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameDataAttributeByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {            
            return data.CountProfileGameDataAttributeByProfileIdByGameIdByCode(
                profile_id
                , game_id
                , code
            );
        }       
        public virtual ProfileGameDataAttributeResult BrowseProfileGameDataAttributeListByFilter(SearchFilter obj)  {
            ProfileGameDataAttributeResult result = new ProfileGameDataAttributeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameDataAttributeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameDataAttribute profile_game_data_attribute  = FillProfileGameDataAttribute(dr);
                        result.data.Add(profile_game_data_attribute);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileGameDataAttributeByUuid(string set_type, ProfileGameDataAttribute obj)  {            
            return data.SetProfileGameDataAttributeByUuid(set_type, obj);
        }    
        public virtual bool SetProfileGameDataAttributeByProfileId(string set_type, ProfileGameDataAttribute obj)  {            
            return data.SetProfileGameDataAttributeByProfileId(set_type, obj);
        }    
        public virtual bool SetProfileGameDataAttributeByProfileIdByGameIdByCode(string set_type, ProfileGameDataAttribute obj)  {            
            return data.SetProfileGameDataAttributeByProfileIdByGameIdByCode(set_type, obj);
        }    
        public virtual bool DelProfileGameDataAttributeByUuid(
            string uuid
        )  {
            return data.DelProfileGameDataAttributeByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileGameDataAttributeByProfileId(
            string profile_id
        )  {
            return data.DelProfileGameDataAttributeByProfileId(
                profile_id
            );
        }                     
        public virtual bool DelProfileGameDataAttributeByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {
            return data.DelProfileGameDataAttributeByProfileIdByGameIdByCode(
                profile_id
                , game_id
                , code
            );
        }                     
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListByUuid(
            string uuid
        )  {
            List<ProfileGameDataAttribute> list = new List<ProfileGameDataAttribute>();
            DataSet ds = data.GetProfileGameDataAttributeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameDataAttribute profile_game_data_attribute  = FillProfileGameDataAttribute(dr);
                        list.Add(profile_game_data_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListByProfileId(
            string profile_id
        )  {
            List<ProfileGameDataAttribute> list = new List<ProfileGameDataAttribute>();
            DataSet ds = data.GetProfileGameDataAttributeListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameDataAttribute profile_game_data_attribute  = FillProfileGameDataAttribute(dr);
                        list.Add(profile_game_data_attribute);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
            string profile_id
            , string game_id
            , string code
        )  {
            List<ProfileGameDataAttribute> list = new List<ProfileGameDataAttribute>();
            DataSet ds = data.GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
                profile_id
                , game_id
                , code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameDataAttribute profile_game_data_attribute  = FillProfileGameDataAttribute(dr);
                        list.Add(profile_game_data_attribute);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameSession FillGameSession(DataRow dr) {
            GameSession obj = new GameSession();

            if (dr["game_area"] != null)                    
                    obj.game_area = dataType.FillDataString(dr, "game_area");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["network_uuid"] != null)                    
                    obj.network_uuid = dataType.FillDataString(dr, "network_uuid");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["game_level"] != null)                    
                    obj.game_level = dataType.FillDataString(dr, "game_level");                
            if (dr["profile_network"] != null)                    
                    obj.profile_network = dataType.FillDataString(dr, "profile_network");                
            if (dr["profile_device"] != null)                    
                    obj.profile_device = dataType.FillDataString(dr, "profile_device");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["network_external_port"] != null)                    
                    obj.network_external_port = dataType.FillDataInt(dr, "network_external_port");                
            if (dr["game_players_connected"] != null)                    
                    obj.game_players_connected = dataType.FillDataInt(dr, "game_players_connected");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["game_state"] != null)                    
                    obj.game_state = dataType.FillDataString(dr, "game_state");                
            if (dr["hash"] != null)                    
                    obj.hash = dataType.FillDataString(dr, "hash");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["network_external_ip"] != null)                    
                    obj.network_external_ip = dataType.FillDataString(dr, "network_external_ip");                
            if (dr["profile_username"] != null)                    
                    obj.profile_username = dataType.FillDataString(dr, "profile_username");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["game_code"] != null)                    
                    obj.game_code = dataType.FillDataString(dr, "game_code");                
            if (dr["game_player_z"] != null)                    
                    obj.game_player_z = dataType.FillDataFloat(dr, "game_player_z");                
            if (dr["game_player_x"] != null)                    
                    obj.game_player_x = dataType.FillDataFloat(dr, "game_player_x");                
            if (dr["game_player_y"] != null)                    
                    obj.game_player_y = dataType.FillDataFloat(dr, "game_player_y");                
            if (dr["network_port"] != null)                    
                    obj.network_port = dataType.FillDataInt(dr, "network_port");                
            if (dr["game_players_allowed"] != null)                    
                    obj.game_players_allowed = dataType.FillDataInt(dr, "game_players_allowed");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["game_type"] != null)                    
                    obj.game_type = dataType.FillDataString(dr, "game_type");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["network_ip"] != null)                    
                    obj.network_ip = dataType.FillDataString(dr, "network_ip");                
            if (dr["network_use_nat"] != null)                    
                    obj.network_use_nat = dataType.FillDataBool(dr, "network_use_nat");                

            return obj;
        }
        
        public virtual int CountGameSession(
        )  {            
            return data.CountGameSession(
            );
        }       
        public virtual int CountGameSessionByUuid(
            string uuid
        )  {            
            return data.CountGameSessionByUuid(
                uuid
            );
        }       
        public virtual int CountGameSessionByGameId(
            string game_id
        )  {            
            return data.CountGameSessionByGameId(
                game_id
            );
        }       
        public virtual int CountGameSessionByProfileId(
            string profile_id
        )  {            
            return data.CountGameSessionByProfileId(
                profile_id
            );
        }       
        public virtual int CountGameSessionByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameSessionByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameSessionResult BrowseGameSessionListByFilter(SearchFilter obj)  {
            GameSessionResult result = new GameSessionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameSessionListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        result.data.Add(game_session);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameSessionByUuid(string set_type, GameSession obj)  {            
            return data.SetGameSessionByUuid(set_type, obj);
        }    
        public virtual bool DelGameSessionByUuid(
            string uuid
        )  {
            return data.DelGameSessionByUuid(
                uuid
            );
        }                     
        public virtual List<GameSession> GetGameSessionList(
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        list.Add(game_session);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameSession> GetGameSessionListByUuid(
            string uuid
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        list.Add(game_session);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameSession> GetGameSessionListByGameId(
            string game_id
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        list.Add(game_session);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameSession> GetGameSessionListByProfileId(
            string profile_id
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        list.Add(game_session);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameSession> GetGameSessionListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSession game_session  = FillGameSession(dr);
                        list.Add(game_session);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameSessionData FillGameSessionData(DataRow dr) {
            GameSessionData obj = new GameSessionData();

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
            if (dr["data_results"] != null)                    
                    obj.data_results = dataType.FillDataString(dr, "data_results");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["data_layer_projectile"] != null)                    
                    obj.data_layer_projectile = dataType.FillDataString(dr, "data_layer_projectile");                
            if (dr["data_layer_actors"] != null)                    
                    obj.data_layer_actors = dataType.FillDataString(dr, "data_layer_actors");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["data_layer_enemy"] != null)                    
                    obj.data_layer_enemy = dataType.FillDataString(dr, "data_layer_enemy");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameSessionData(
        )  {            
            return data.CountGameSessionData(
            );
        }       
        public virtual int CountGameSessionDataByUuid(
            string uuid
        )  {            
            return data.CountGameSessionDataByUuid(
                uuid
            );
        }       
        public virtual GameSessionDataResult BrowseGameSessionDataListByFilter(SearchFilter obj)  {
            GameSessionDataResult result = new GameSessionDataResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameSessionDataListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSessionData game_session_data  = FillGameSessionData(dr);
                        result.data.Add(game_session_data);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameSessionDataByUuid(string set_type, GameSessionData obj)  {            
            return data.SetGameSessionDataByUuid(set_type, obj);
        }    
        public virtual bool DelGameSessionDataByUuid(
            string uuid
        )  {
            return data.DelGameSessionDataByUuid(
                uuid
            );
        }                     
        public virtual List<GameSessionData> GetGameSessionDataList(
        )  {
            List<GameSessionData> list = new List<GameSessionData>();
            DataSet ds = data.GetGameSessionDataList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSessionData game_session_data  = FillGameSessionData(dr);
                        list.Add(game_session_data);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameSessionData> GetGameSessionDataListByUuid(
            string uuid
        )  {
            List<GameSessionData> list = new List<GameSessionData>();
            DataSet ds = data.GetGameSessionDataListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameSessionData game_session_data  = FillGameSessionData(dr);
                        list.Add(game_session_data);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameContent FillGameContent(DataRow dr) {
            GameContent obj = new GameContent();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["extension"] != null)                    
                    obj.extension = dataType.FillDataString(dr, "extension");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["filename"] != null)                    
                    obj.filename = dataType.FillDataString(dr, "filename");                
            if (dr["source"] != null)                    
                    obj.source = dataType.FillDataString(dr, "source");                
            if (dr["version"] != null)                    
                    obj.version = dataType.FillDataString(dr, "version");                
            if (dr["platform"] != null)                    
                    obj.platform = dataType.FillDataString(dr, "platform");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["path"] != null)                    
                    obj.path = dataType.FillDataString(dr, "path");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["increment"] != null)                    
                    obj.increment = dataType.FillDataInt(dr, "increment");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["hash"] != null)                    
                    obj.hash = dataType.FillDataString(dr, "hash");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameContent(
        )  {            
            return data.CountGameContent(
            );
        }       
        public virtual int CountGameContentByUuid(
            string uuid
        )  {            
            return data.CountGameContentByUuid(
                uuid
            );
        }       
        public virtual int CountGameContentByGameId(
            string game_id
        )  {            
            return data.CountGameContentByGameId(
                game_id
            );
        }       
        public virtual int CountGameContentByGameIdByPath(
            string game_id
            , string path
        )  {            
            return data.CountGameContentByGameIdByPath(
                game_id
                , path
            );
        }       
        public virtual int CountGameContentByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {            
            return data.CountGameContentByGameIdByPathByVersion(
                game_id
                , path
                , version
            );
        }       
        public virtual int CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return data.CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
                game_id
                , path
                , version
                , platform
                , increment
            );
        }       
        public virtual GameContentResult BrowseGameContentListByFilter(SearchFilter obj)  {
            GameContentResult result = new GameContentResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameContentListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        result.data.Add(game_content);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameContentByUuid(string set_type, GameContent obj)  {            
            return data.SetGameContentByUuid(set_type, obj);
        }    
        public virtual bool SetGameContentByGameId(string set_type, GameContent obj)  {            
            return data.SetGameContentByGameId(set_type, obj);
        }    
        public virtual bool SetGameContentByGameIdByPath(string set_type, GameContent obj)  {            
            return data.SetGameContentByGameIdByPath(set_type, obj);
        }    
        public virtual bool SetGameContentByGameIdByPathByVersion(string set_type, GameContent obj)  {            
            return data.SetGameContentByGameIdByPathByVersion(set_type, obj);
        }    
        public virtual bool SetGameContentByGameIdByPathByVersionByPlatformByIncrement(string set_type, GameContent obj)  {            
            return data.SetGameContentByGameIdByPathByVersionByPlatformByIncrement(set_type, obj);
        }    
        public virtual bool DelGameContentByUuid(
            string uuid
        )  {
            return data.DelGameContentByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameContentByGameId(
            string game_id
        )  {
            return data.DelGameContentByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameContentByGameIdByPath(
            string game_id
            , string path
        )  {
            return data.DelGameContentByGameIdByPath(
                game_id
                , path
            );
        }                     
        public virtual bool DelGameContentByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {
            return data.DelGameContentByGameIdByPathByVersion(
                game_id
                , path
                , version
            );
        }                     
        public virtual bool DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return data.DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
                game_id
                , path
                , version
                , platform
                , increment
            );
        }                     
        public virtual List<GameContent> GetGameContentList(
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameContent> GetGameContentListByUuid(
            string uuid
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameContent> GetGameContentListByGameId(
            string game_id
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameContent> GetGameContentListByGameIdByPath(
            string game_id
            , string path
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListByGameIdByPath(
                game_id
                , path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameContent> GetGameContentListByGameIdByPathByVersion(
            string game_id
            , string path
            , string version
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListByGameIdByPathByVersion(
                game_id
                , path
                , version
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameContent> GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
                game_id
                , path
                , version
                , platform
                , increment
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameContent game_content  = FillGameContent(dr);
                        list.Add(game_content);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameProfileContent FillGameProfileContent(DataRow dr) {
            GameProfileContent obj = new GameProfileContent();

            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["increment"] != null)                    
                    obj.increment = dataType.FillDataInt(dr, "increment");                
            if (dr["path"] != null)                    
                    obj.path = dataType.FillDataString(dr, "path");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["platform"] != null)                    
                    obj.platform = dataType.FillDataString(dr, "platform");                
            if (dr["filename"] != null)                    
                    obj.filename = dataType.FillDataString(dr, "filename");                
            if (dr["source"] != null)                    
                    obj.source = dataType.FillDataString(dr, "source");                
            if (dr["version"] != null)                    
                    obj.version = dataType.FillDataString(dr, "version");                
            if (dr["game_network"] != null)                    
                    obj.game_network = dataType.FillDataString(dr, "game_network");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["hash"] != null)                    
                    obj.hash = dataType.FillDataString(dr, "hash");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["extension"] != null)                    
                    obj.extension = dataType.FillDataString(dr, "extension");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                

            return obj;
        }
        
        public virtual int CountGameProfileContent(
        )  {            
            return data.CountGameProfileContent(
            );
        }       
        public virtual int CountGameProfileContentByUuid(
            string uuid
        )  {            
            return data.CountGameProfileContentByUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileContentByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {            
            return data.CountGameProfileContentByGameIdByProfileId(
                game_id
                , profile_id
            );
        }       
        public virtual int CountGameProfileContentByGameIdByUsername(
            string game_id
            , string username
        )  {            
            return data.CountGameProfileContentByGameIdByUsername(
                game_id
                , username
            );
        }       
        public virtual int CountGameProfileContentByUsername(
            string username
        )  {            
            return data.CountGameProfileContentByUsername(
                username
            );
        }       
        public virtual int CountGameProfileContentByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {            
            return data.CountGameProfileContentByGameIdByProfileIdByPath(
                game_id
                , profile_id
                , path
            );
        }       
        public virtual int CountGameProfileContentByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {            
            return data.CountGameProfileContentByGameIdByProfileIdByPathByVersion(
                game_id
                , profile_id
                , path
                , version
            );
        }       
        public virtual int CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return data.CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            );
        }       
        public virtual int CountGameProfileContentByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {            
            return data.CountGameProfileContentByGameIdByUsernameByPath(
                game_id
                , username
                , path
            );
        }       
        public virtual int CountGameProfileContentByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {            
            return data.CountGameProfileContentByGameIdByUsernameByPathByVersion(
                game_id
                , username
                , path
                , version
            );
        }       
        public virtual int CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return data.CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                game_id
                , username
                , path
                , version
                , platform
                , increment
            );
        }       
        public virtual GameProfileContentResult BrowseGameProfileContentListByFilter(SearchFilter obj)  {
            GameProfileContentResult result = new GameProfileContentResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileContentListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        result.data.Add(game_profile_content);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProfileContentByUuid(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByProfileId(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByProfileId(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByUsername(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByUsername(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByUsername(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByUsername(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPath(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByProfileIdByPath(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersion(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByProfileIdByPathByVersion(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPath(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByUsernameByPath(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersion(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByUsernameByPathByVersion(set_type, obj);
        }    
        public virtual bool SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(set_type, obj);
        }    
        public virtual bool DelGameProfileContentByUuid(
            string uuid
        )  {
            return data.DelGameProfileContentByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            return data.DelGameProfileContentByGameIdByProfileId(
                game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByUsername(
            string game_id
            , string username
        )  {
            return data.DelGameProfileContentByGameIdByUsername(
                game_id
                , username
            );
        }                     
        public virtual bool DelGameProfileContentByUsername(
            string username
        )  {
            return data.DelGameProfileContentByUsername(
                username
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {
            return data.DelGameProfileContentByGameIdByProfileIdByPath(
                game_id
                , profile_id
                , path
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            return data.DelGameProfileContentByGameIdByProfileIdByPathByVersion(
                game_id
                , profile_id
                , path
                , version
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return data.DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {
            return data.DelGameProfileContentByGameIdByUsernameByPath(
                game_id
                , username
                , path
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            return data.DelGameProfileContentByGameIdByUsernameByPathByVersion(
                game_id
                , username
                , path
                , version
            );
        }                     
        public virtual bool DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return data.DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                game_id
                , username
                , path
                , version
                , platform
                , increment
            );
        }                     
        public virtual List<GameProfileContent> GetGameProfileContentList(
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByUuid(
            string uuid
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileId(
            string game_id
            , string profile_id
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByProfileId(
                game_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsername(
            string game_id
            , string username
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByUsername(
                game_id
                , username
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByUsername(
            string username
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByUsername(
                username
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileIdByPath(
            string game_id
            , string profile_id
            , string path
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByProfileIdByPath(
                game_id
                , profile_id
                , path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
                game_id
                , profile_id
                , path
                , version
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsernameByPath(
            string game_id
            , string username
            , string path
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByUsernameByPath(
                game_id
                , username
                , path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsernameByPathByVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByUsernameByPathByVersion(
                game_id
                , username
                , path
                , version
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
                game_id
                , username
                , path
                , version
                , platform
                , increment
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileContent game_profile_content  = FillGameProfileContent(dr);
                        list.Add(game_profile_content);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameApp FillGameApp(DataRow dr) {
            GameApp obj = new GameApp();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["app_id"] != null)                    
                    obj.app_id = dataType.FillDataString(dr, "app_id");                

            return obj;
        }
        
        public virtual int CountGameApp(
        )  {            
            return data.CountGameApp(
            );
        }       
        public virtual int CountGameAppByUuid(
            string uuid
        )  {            
            return data.CountGameAppByUuid(
                uuid
            );
        }       
        public virtual int CountGameAppByGameId(
            string game_id
        )  {            
            return data.CountGameAppByGameId(
                game_id
            );
        }       
        public virtual int CountGameAppByAppId(
            string app_id
        )  {            
            return data.CountGameAppByAppId(
                app_id
            );
        }       
        public virtual int CountGameAppByGameIdByAppId(
            string game_id
            , string app_id
        )  {            
            return data.CountGameAppByGameIdByAppId(
                game_id
                , app_id
            );
        }       
        public virtual GameAppResult BrowseGameAppListByFilter(SearchFilter obj)  {
            GameAppResult result = new GameAppResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameAppListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        result.data.Add(game_app);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameAppByUuid(string set_type, GameApp obj)  {            
            return data.SetGameAppByUuid(set_type, obj);
        }    
        public virtual bool DelGameAppByUuid(
            string uuid
        )  {
            return data.DelGameAppByUuid(
                uuid
            );
        }                     
        public virtual List<GameApp> GetGameAppList(
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        list.Add(game_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameApp> GetGameAppListByUuid(
            string uuid
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        list.Add(game_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameApp> GetGameAppListByGameId(
            string game_id
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        list.Add(game_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameApp> GetGameAppListByAppId(
            string app_id
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListByAppId(
                app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        list.Add(game_app);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameApp> GetGameAppListByGameIdByAppId(
            string game_id
            , string app_id
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListByGameIdByAppId(
                game_id
                , app_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameApp game_app  = FillGameApp(dr);
                        list.Add(game_app);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileGameLocation FillProfileGameLocation(DataRow dr) {
            ProfileGameLocation obj = new ProfileGameLocation();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["game_location_id"] != null)                    
                    obj.game_location_id = dataType.FillDataString(dr, "game_location_id");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountProfileGameLocation(
        )  {            
            return data.CountProfileGameLocation(
            );
        }       
        public virtual int CountProfileGameLocationByUuid(
            string uuid
        )  {            
            return data.CountProfileGameLocationByUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameLocationByGameLocationId(
            string game_location_id
        )  {            
            return data.CountProfileGameLocationByGameLocationId(
                game_location_id
            );
        }       
        public virtual int CountProfileGameLocationByProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameLocationByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameLocationByProfileIdByGameLocationId(
            string profile_id
            , string game_location_id
        )  {            
            return data.CountProfileGameLocationByProfileIdByGameLocationId(
                profile_id
                , game_location_id
            );
        }       
        public virtual ProfileGameLocationResult BrowseProfileGameLocationListByFilter(SearchFilter obj)  {
            ProfileGameLocationResult result = new ProfileGameLocationResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameLocationListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        result.data.Add(profile_game_location);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileGameLocationByUuid(string set_type, ProfileGameLocation obj)  {            
            return data.SetProfileGameLocationByUuid(set_type, obj);
        }    
        public virtual bool DelProfileGameLocationByUuid(
            string uuid
        )  {
            return data.DelProfileGameLocationByUuid(
                uuid
            );
        }                     
        public virtual List<ProfileGameLocation> GetProfileGameLocationList(
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        list.Add(profile_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByUuid(
            string uuid
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        list.Add(profile_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByGameLocationId(
            string game_location_id
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListByGameLocationId(
                game_location_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        list.Add(profile_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByProfileId(
            string profile_id
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        list.Add(profile_game_location);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListByProfileIdByGameLocationId(
            string profile_id
            , string game_location_id
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListByProfileIdByGameLocationId(
                profile_id
                , game_location_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileGameLocation profile_game_location  = FillProfileGameLocation(dr);
                        list.Add(profile_game_location);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GamePhoto FillGamePhoto(DataRow dr) {
            GamePhoto obj = new GamePhoto();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["third_party_oembed"] != null)                    
                    obj.third_party_oembed = dataType.FillDataString(dr, "third_party_oembed");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["third_party_data"] != null)                    
                    obj.third_party_data = dataType.FillDataString(dr, "third_party_data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["third_party_url"] != null)                    
                    obj.third_party_url = dataType.FillDataString(dr, "third_party_url");                
            if (dr["third_party_id"] != null)                    
                    obj.third_party_id = dataType.FillDataString(dr, "third_party_id");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["external_id"] != null)                    
                    obj.external_id = dataType.FillDataString(dr, "external_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGamePhoto(
        )  {            
            return data.CountGamePhoto(
            );
        }       
        public virtual int CountGamePhotoByUuid(
            string uuid
        )  {            
            return data.CountGamePhotoByUuid(
                uuid
            );
        }       
        public virtual int CountGamePhotoByExternalId(
            string external_id
        )  {            
            return data.CountGamePhotoByExternalId(
                external_id
            );
        }       
        public virtual int CountGamePhotoByUrl(
            string url
        )  {            
            return data.CountGamePhotoByUrl(
                url
            );
        }       
        public virtual int CountGamePhotoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return data.CountGamePhotoByUrlByExternalId(
                url
                , external_id
            );
        }       
        public virtual int CountGamePhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return data.CountGamePhotoByUuidByExternalId(
                uuid
                , external_id
            );
        }       
        public virtual GamePhotoResult BrowseGamePhotoListByFilter(SearchFilter obj)  {
            GamePhotoResult result = new GamePhotoResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGamePhotoListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GamePhoto game_photo  = FillGamePhoto(dr);
                        result.data.Add(game_photo);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGamePhotoByUuid(string set_type, GamePhoto obj)  {            
            return data.SetGamePhotoByUuid(set_type, obj);
        }    
        public virtual bool SetGamePhotoByExternalId(string set_type, GamePhoto obj)  {            
            return data.SetGamePhotoByExternalId(set_type, obj);
        }    
        public virtual bool SetGamePhotoByUrl(string set_type, GamePhoto obj)  {            
            return data.SetGamePhotoByUrl(set_type, obj);
        }    
        public virtual bool SetGamePhotoByUrlByExternalId(string set_type, GamePhoto obj)  {            
            return data.SetGamePhotoByUrlByExternalId(set_type, obj);
        }    
        public virtual bool SetGamePhotoByUuidByExternalId(string set_type, GamePhoto obj)  {            
            return data.SetGamePhotoByUuidByExternalId(set_type, obj);
        }    
        public virtual bool DelGamePhotoByUuid(
            string uuid
        )  {
            return data.DelGamePhotoByUuid(
                uuid
            );
        }                     
        public virtual bool DelGamePhotoByExternalId(
            string external_id
        )  {
            return data.DelGamePhotoByExternalId(
                external_id
            );
        }                     
        public virtual bool DelGamePhotoByUrl(
            string url
        )  {
            return data.DelGamePhotoByUrl(
                url
            );
        }                     
        public virtual bool DelGamePhotoByUrlByExternalId(
            string url
            , string external_id
        )  {
            return data.DelGamePhotoByUrlByExternalId(
                url
                , external_id
            );
        }                     
        public virtual bool DelGamePhotoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            return data.DelGamePhotoByUuidByExternalId(
                uuid
                , external_id
            );
        }                     
        public virtual List<GamePhoto> GetGamePhotoList(
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GamePhoto game_photo  = FillGamePhoto(dr);
                        list.Add(game_photo);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GamePhoto> GetGamePhotoListByUuid(
            string uuid
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GamePhoto game_photo  = FillGamePhoto(dr);
                        list.Add(game_photo);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GamePhoto> GetGamePhotoListByExternalId(
            string external_id
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoListByExternalId(
                external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GamePhoto game_photo  = FillGamePhoto(dr);
                        list.Add(game_photo);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GamePhoto> GetGamePhotoListByUrl(
            string url
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoListByUrl(
                url
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GamePhoto game_photo  = FillGamePhoto(dr);
                        list.Add(game_photo);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GamePhoto> GetGamePhotoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoListByUrlByExternalId(
                url
                , external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GamePhoto game_photo  = FillGamePhoto(dr);
                        list.Add(game_photo);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GamePhoto> GetGamePhotoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoListByUuidByExternalId(
                uuid
                , external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GamePhoto game_photo  = FillGamePhoto(dr);
                        list.Add(game_photo);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameVideo FillGameVideo(DataRow dr) {
            GameVideo obj = new GameVideo();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["third_party_oembed"] != null)                    
                    obj.third_party_oembed = dataType.FillDataString(dr, "third_party_oembed");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["third_party_data"] != null)                    
                    obj.third_party_data = dataType.FillDataString(dr, "third_party_data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["third_party_url"] != null)                    
                    obj.third_party_url = dataType.FillDataString(dr, "third_party_url");                
            if (dr["third_party_id"] != null)                    
                    obj.third_party_id = dataType.FillDataString(dr, "third_party_id");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["external_id"] != null)                    
                    obj.external_id = dataType.FillDataString(dr, "external_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameVideo(
        )  {            
            return data.CountGameVideo(
            );
        }       
        public virtual int CountGameVideoByUuid(
            string uuid
        )  {            
            return data.CountGameVideoByUuid(
                uuid
            );
        }       
        public virtual int CountGameVideoByExternalId(
            string external_id
        )  {            
            return data.CountGameVideoByExternalId(
                external_id
            );
        }       
        public virtual int CountGameVideoByUrl(
            string url
        )  {            
            return data.CountGameVideoByUrl(
                url
            );
        }       
        public virtual int CountGameVideoByUrlByExternalId(
            string url
            , string external_id
        )  {            
            return data.CountGameVideoByUrlByExternalId(
                url
                , external_id
            );
        }       
        public virtual int CountGameVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {            
            return data.CountGameVideoByUuidByExternalId(
                uuid
                , external_id
            );
        }       
        public virtual GameVideoResult BrowseGameVideoListByFilter(SearchFilter obj)  {
            GameVideoResult result = new GameVideoResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameVideoListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameVideo game_video  = FillGameVideo(dr);
                        result.data.Add(game_video);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameVideoByUuid(string set_type, GameVideo obj)  {            
            return data.SetGameVideoByUuid(set_type, obj);
        }    
        public virtual bool SetGameVideoByExternalId(string set_type, GameVideo obj)  {            
            return data.SetGameVideoByExternalId(set_type, obj);
        }    
        public virtual bool SetGameVideoByUrl(string set_type, GameVideo obj)  {            
            return data.SetGameVideoByUrl(set_type, obj);
        }    
        public virtual bool SetGameVideoByUrlByExternalId(string set_type, GameVideo obj)  {            
            return data.SetGameVideoByUrlByExternalId(set_type, obj);
        }    
        public virtual bool SetGameVideoByUuidByExternalId(string set_type, GameVideo obj)  {            
            return data.SetGameVideoByUuidByExternalId(set_type, obj);
        }    
        public virtual bool DelGameVideoByUuid(
            string uuid
        )  {
            return data.DelGameVideoByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameVideoByExternalId(
            string external_id
        )  {
            return data.DelGameVideoByExternalId(
                external_id
            );
        }                     
        public virtual bool DelGameVideoByUrl(
            string url
        )  {
            return data.DelGameVideoByUrl(
                url
            );
        }                     
        public virtual bool DelGameVideoByUrlByExternalId(
            string url
            , string external_id
        )  {
            return data.DelGameVideoByUrlByExternalId(
                url
                , external_id
            );
        }                     
        public virtual bool DelGameVideoByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            return data.DelGameVideoByUuidByExternalId(
                uuid
                , external_id
            );
        }                     
        public virtual List<GameVideo> GetGameVideoList(
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameVideo game_video  = FillGameVideo(dr);
                        list.Add(game_video);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameVideo> GetGameVideoListByUuid(
            string uuid
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameVideo game_video  = FillGameVideo(dr);
                        list.Add(game_video);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameVideo> GetGameVideoListByExternalId(
            string external_id
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoListByExternalId(
                external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameVideo game_video  = FillGameVideo(dr);
                        list.Add(game_video);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameVideo> GetGameVideoListByUrl(
            string url
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoListByUrl(
                url
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameVideo game_video  = FillGameVideo(dr);
                        list.Add(game_video);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameVideo> GetGameVideoListByUrlByExternalId(
            string url
            , string external_id
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoListByUrlByExternalId(
                url
                , external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameVideo game_video  = FillGameVideo(dr);
                        list.Add(game_video);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameVideo> GetGameVideoListByUuidByExternalId(
            string uuid
            , string external_id
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoListByUuidByExternalId(
                uuid
                , external_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameVideo game_video  = FillGameVideo(dr);
                        list.Add(game_video);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameRpgItemWeapon FillGameRpgItemWeapon(DataRow dr) {
            GameRpgItemWeapon obj = new GameRpgItemWeapon();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["third_party_oembed"] != null)                    
                    obj.third_party_oembed = dataType.FillDataString(dr, "third_party_oembed");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["game_defense"] != null)                    
                    obj.game_defense = dataType.FillDataFloat(dr, "game_defense");                
            if (dr["third_party_url"] != null)                    
                    obj.third_party_url = dataType.FillDataString(dr, "third_party_url");                
            if (dr["third_party_id"] != null)                    
                    obj.third_party_id = dataType.FillDataString(dr, "third_party_id");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["game_attack"] != null)                    
                    obj.game_attack = dataType.FillDataFloat(dr, "game_attack");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["third_party_data"] != null)                    
                    obj.third_party_data = dataType.FillDataString(dr, "third_party_data");                
            if (dr["game_price"] != null)                    
                    obj.game_price = dataType.FillDataFloat(dr, "game_price");                
            if (dr["game_type"] != null)                    
                    obj.game_type = dataType.FillDataFloat(dr, "game_type");                
            if (dr["game_skill"] != null)                    
                    obj.game_skill = dataType.FillDataFloat(dr, "game_skill");                
            if (dr["game_health"] != null)                    
                    obj.game_health = dataType.FillDataFloat(dr, "game_health");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["game_energy"] != null)                    
                    obj.game_energy = dataType.FillDataFloat(dr, "game_energy");                
            if (dr["game_data"] != null)                    
                    obj.game_data = dataType.FillDataString(dr, "game_data");                

            return obj;
        }
        
        public virtual int CountGameRpgItemWeapon(
        )  {            
            return data.CountGameRpgItemWeapon(
            );
        }       
        public virtual int CountGameRpgItemWeaponByUuid(
            string uuid
        )  {            
            return data.CountGameRpgItemWeaponByUuid(
                uuid
            );
        }       
        public virtual int CountGameRpgItemWeaponByGameId(
            string game_id
        )  {            
            return data.CountGameRpgItemWeaponByGameId(
                game_id
            );
        }       
        public virtual int CountGameRpgItemWeaponByUrl(
            string url
        )  {            
            return data.CountGameRpgItemWeaponByUrl(
                url
            );
        }       
        public virtual int CountGameRpgItemWeaponByUrlByGameId(
            string url
            , string game_id
        )  {            
            return data.CountGameRpgItemWeaponByUrlByGameId(
                url
                , game_id
            );
        }       
        public virtual int CountGameRpgItemWeaponByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return data.CountGameRpgItemWeaponByUuidByGameId(
                uuid
                , game_id
            );
        }       
        public virtual GameRpgItemWeaponResult BrowseGameRpgItemWeaponListByFilter(SearchFilter obj)  {
            GameRpgItemWeaponResult result = new GameRpgItemWeaponResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameRpgItemWeaponListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        result.data.Add(game_rpg_item_weapon);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameRpgItemWeaponByUuid(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponByUuid(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponByGameId(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponByGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponByUrl(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponByUrl(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponByUrlByGameId(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponByUrlByGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponByUuidByGameId(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponByUuidByGameId(set_type, obj);
        }    
        public virtual bool DelGameRpgItemWeaponByUuid(
            string uuid
        )  {
            return data.DelGameRpgItemWeaponByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameRpgItemWeaponByGameId(
            string game_id
        )  {
            return data.DelGameRpgItemWeaponByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameRpgItemWeaponByUrl(
            string url
        )  {
            return data.DelGameRpgItemWeaponByUrl(
                url
            );
        }                     
        public virtual bool DelGameRpgItemWeaponByUrlByGameId(
            string url
            , string game_id
        )  {
            return data.DelGameRpgItemWeaponByUrlByGameId(
                url
                , game_id
            );
        }                     
        public virtual bool DelGameRpgItemWeaponByUuidByGameId(
            string uuid
            , string game_id
        )  {
            return data.DelGameRpgItemWeaponByUuidByGameId(
                uuid
                , game_id
            );
        }                     
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponList(
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUuid(
            string uuid
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByGameId(
            string game_id
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUrl(
            string url
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListByUrl(
                url
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUrlByGameId(
            string url
            , string game_id
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListByUrlByGameId(
                url
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListByUuidByGameId(
                uuid
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemWeapon game_rpg_item_weapon  = FillGameRpgItemWeapon(dr);
                        list.Add(game_rpg_item_weapon);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameRpgItemSkill FillGameRpgItemSkill(DataRow dr) {
            GameRpgItemSkill obj = new GameRpgItemSkill();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["third_party_oembed"] != null)                    
                    obj.third_party_oembed = dataType.FillDataString(dr, "third_party_oembed");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["game_defense"] != null)                    
                    obj.game_defense = dataType.FillDataFloat(dr, "game_defense");                
            if (dr["third_party_url"] != null)                    
                    obj.third_party_url = dataType.FillDataString(dr, "third_party_url");                
            if (dr["third_party_id"] != null)                    
                    obj.third_party_id = dataType.FillDataString(dr, "third_party_id");                
            if (dr["content_type"] != null)                    
                    obj.content_type = dataType.FillDataString(dr, "content_type");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["game_attack"] != null)                    
                    obj.game_attack = dataType.FillDataFloat(dr, "game_attack");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["third_party_data"] != null)                    
                    obj.third_party_data = dataType.FillDataString(dr, "third_party_data");                
            if (dr["game_price"] != null)                    
                    obj.game_price = dataType.FillDataFloat(dr, "game_price");                
            if (dr["game_type"] != null)                    
                    obj.game_type = dataType.FillDataFloat(dr, "game_type");                
            if (dr["game_skill"] != null)                    
                    obj.game_skill = dataType.FillDataFloat(dr, "game_skill");                
            if (dr["game_health"] != null)                    
                    obj.game_health = dataType.FillDataFloat(dr, "game_health");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["game_energy"] != null)                    
                    obj.game_energy = dataType.FillDataFloat(dr, "game_energy");                
            if (dr["game_data"] != null)                    
                    obj.game_data = dataType.FillDataString(dr, "game_data");                

            return obj;
        }
        
        public virtual int CountGameRpgItemSkill(
        )  {            
            return data.CountGameRpgItemSkill(
            );
        }       
        public virtual int CountGameRpgItemSkillByUuid(
            string uuid
        )  {            
            return data.CountGameRpgItemSkillByUuid(
                uuid
            );
        }       
        public virtual int CountGameRpgItemSkillByGameId(
            string game_id
        )  {            
            return data.CountGameRpgItemSkillByGameId(
                game_id
            );
        }       
        public virtual int CountGameRpgItemSkillByUrl(
            string url
        )  {            
            return data.CountGameRpgItemSkillByUrl(
                url
            );
        }       
        public virtual int CountGameRpgItemSkillByUrlByGameId(
            string url
            , string game_id
        )  {            
            return data.CountGameRpgItemSkillByUrlByGameId(
                url
                , game_id
            );
        }       
        public virtual int CountGameRpgItemSkillByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return data.CountGameRpgItemSkillByUuidByGameId(
                uuid
                , game_id
            );
        }       
        public virtual GameRpgItemSkillResult BrowseGameRpgItemSkillListByFilter(SearchFilter obj)  {
            GameRpgItemSkillResult result = new GameRpgItemSkillResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameRpgItemSkillListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        result.data.Add(game_rpg_item_skill);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameRpgItemSkillByUuid(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillByUuid(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillByGameId(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillByGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillByUrl(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillByUrl(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillByUrlByGameId(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillByUrlByGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillByUuidByGameId(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillByUuidByGameId(set_type, obj);
        }    
        public virtual bool DelGameRpgItemSkillByUuid(
            string uuid
        )  {
            return data.DelGameRpgItemSkillByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameRpgItemSkillByGameId(
            string game_id
        )  {
            return data.DelGameRpgItemSkillByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameRpgItemSkillByUrl(
            string url
        )  {
            return data.DelGameRpgItemSkillByUrl(
                url
            );
        }                     
        public virtual bool DelGameRpgItemSkillByUrlByGameId(
            string url
            , string game_id
        )  {
            return data.DelGameRpgItemSkillByUrlByGameId(
                url
                , game_id
            );
        }                     
        public virtual bool DelGameRpgItemSkillByUuidByGameId(
            string uuid
            , string game_id
        )  {
            return data.DelGameRpgItemSkillByUuidByGameId(
                uuid
                , game_id
            );
        }                     
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillList(
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUuid(
            string uuid
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByGameId(
            string game_id
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUrl(
            string url
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListByUrl(
                url
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUrlByGameId(
            string url
            , string game_id
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListByUrlByGameId(
                url
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListByUuidByGameId(
                uuid
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameRpgItemSkill game_rpg_item_skill  = FillGameRpgItemSkill(dr);
                        list.Add(game_rpg_item_skill);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameProduct FillGameProduct(DataRow dr) {
            GameProduct obj = new GameProduct();

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
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameProduct(
        )  {            
            return data.CountGameProduct(
            );
        }       
        public virtual int CountGameProductByUuid(
            string uuid
        )  {            
            return data.CountGameProductByUuid(
                uuid
            );
        }       
        public virtual int CountGameProductByGameId(
            string game_id
        )  {            
            return data.CountGameProductByGameId(
                game_id
            );
        }       
        public virtual int CountGameProductByUrl(
            string url
        )  {            
            return data.CountGameProductByUrl(
                url
            );
        }       
        public virtual int CountGameProductByUrlByGameId(
            string url
            , string game_id
        )  {            
            return data.CountGameProductByUrlByGameId(
                url
                , game_id
            );
        }       
        public virtual int CountGameProductByUuidByGameId(
            string uuid
            , string game_id
        )  {            
            return data.CountGameProductByUuidByGameId(
                uuid
                , game_id
            );
        }       
        public virtual GameProductResult BrowseGameProductListByFilter(SearchFilter obj)  {
            GameProductResult result = new GameProductResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProductListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        result.data.Add(game_product);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProductByUuid(string set_type, GameProduct obj)  {            
            return data.SetGameProductByUuid(set_type, obj);
        }    
        public virtual bool SetGameProductByGameId(string set_type, GameProduct obj)  {            
            return data.SetGameProductByGameId(set_type, obj);
        }    
        public virtual bool SetGameProductByUrl(string set_type, GameProduct obj)  {            
            return data.SetGameProductByUrl(set_type, obj);
        }    
        public virtual bool SetGameProductByUrlByGameId(string set_type, GameProduct obj)  {            
            return data.SetGameProductByUrlByGameId(set_type, obj);
        }    
        public virtual bool SetGameProductByUuidByGameId(string set_type, GameProduct obj)  {            
            return data.SetGameProductByUuidByGameId(set_type, obj);
        }    
        public virtual bool DelGameProductByUuid(
            string uuid
        )  {
            return data.DelGameProductByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProductByGameId(
            string game_id
        )  {
            return data.DelGameProductByGameId(
                game_id
            );
        }                     
        public virtual bool DelGameProductByUrl(
            string url
        )  {
            return data.DelGameProductByUrl(
                url
            );
        }                     
        public virtual bool DelGameProductByUrlByGameId(
            string url
            , string game_id
        )  {
            return data.DelGameProductByUrlByGameId(
                url
                , game_id
            );
        }                     
        public virtual bool DelGameProductByUuidByGameId(
            string uuid
            , string game_id
        )  {
            return data.DelGameProductByUuidByGameId(
                uuid
                , game_id
            );
        }                     
        public virtual List<GameProduct> GetGameProductList(
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProduct> GetGameProductListByUuid(
            string uuid
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProduct> GetGameProductListByGameId(
            string game_id
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProduct> GetGameProductListByUrl(
            string url
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListByUrl(
                url
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProduct> GetGameProductListByUrlByGameId(
            string url
            , string game_id
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListByUrlByGameId(
                url
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProduct> GetGameProductListByUuidByGameId(
            string uuid
            , string game_id
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListByUuidByGameId(
                uuid
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProduct game_product  = FillGameProduct(dr);
                        list.Add(game_product);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameLeaderboard FillGameLeaderboard(DataRow dr) {
            GameLeaderboard obj = new GameLeaderboard();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataFloat(dr, "timestamp");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["rank"] != null)                    
                    obj.rank = dataType.FillDataInt(dr, "rank");                
            if (dr["rank_change"] != null)                    
                    obj.rank_change = dataType.FillDataInt(dr, "rank_change");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["rank_total_count"] != null)                    
                    obj.rank_total_count = dataType.FillDataInt(dr, "rank_total_count");                
            if (dr["absolute_value"] != null)                    
                    obj.absolute_value = dataType.FillDataFloat(dr, "absolute_value");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["stat_value"] != null)                    
                    obj.stat_value = dataType.FillDataFloat(dr, "stat_value");                
            if (dr["network"] != null)                    
                    obj.network = dataType.FillDataString(dr, "network");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["stat_value_formatted"] != null)                    
                    obj.stat_value_formatted = dataType.FillDataString(dr, "stat_value_formatted");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameLeaderboard(
        )  {            
            return data.CountGameLeaderboard(
            );
        }       
        public virtual int CountGameLeaderboardByUuid(
            string uuid
        )  {            
            return data.CountGameLeaderboardByUuid(
                uuid
            );
        }       
        public virtual int CountGameLeaderboardByGameId(
            string game_id
        )  {            
            return data.CountGameLeaderboardByGameId(
                game_id
            );
        }       
        public virtual int CountGameLeaderboardByCode(
            string code
        )  {            
            return data.CountGameLeaderboardByCode(
                code
            );
        }       
        public virtual int CountGameLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameLeaderboardByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return data.CountGameLeaderboardByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
        }       
        public virtual int CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return data.CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }       
        public virtual int CountGameLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameLeaderboardByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameLeaderboardResult BrowseGameLeaderboardListByFilter(SearchFilter obj)  {
            GameLeaderboardResult result = new GameLeaderboardResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLeaderboardListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboard game_leaderboard  = FillGameLeaderboard(dr);
                        result.data.Add(game_leaderboard);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameLeaderboardByUuid(string set_type, GameLeaderboard obj)  {            
            return data.SetGameLeaderboardByUuid(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(string set_type, GameLeaderboard obj)  {            
            return data.SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardByCode(string set_type, GameLeaderboard obj)  {            
            return data.SetGameLeaderboardByCode(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardByCodeByGameId(string set_type, GameLeaderboard obj)  {            
            return data.SetGameLeaderboardByCodeByGameId(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardByCodeByGameIdByProfileId(string set_type, GameLeaderboard obj)  {            
            return data.SetGameLeaderboardByCodeByGameIdByProfileId(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(string set_type, GameLeaderboard obj)  {            
            return data.SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(set_type, obj);
        }    
        public virtual bool DelGameLeaderboardByUuid(
            string uuid
        )  {
            return data.DelGameLeaderboardByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLeaderboardByCode(
            string code
        )  {
            return data.DelGameLeaderboardByCode(
                code
            );
        }                     
        public virtual bool DelGameLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameLeaderboardByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return data.DelGameLeaderboardByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return data.DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }                     
        public virtual bool DelGameLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameLeaderboardByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<GameLeaderboard> GetGameLeaderboardList(
        )  {
            List<GameLeaderboard> list = new List<GameLeaderboard>();
            DataSet ds = data.GetGameLeaderboardList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboard game_leaderboard  = FillGameLeaderboard(dr);
                        list.Add(game_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboard> GetGameLeaderboardListByUuid(
            string uuid
        )  {
            List<GameLeaderboard> list = new List<GameLeaderboard>();
            DataSet ds = data.GetGameLeaderboardListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboard game_leaderboard  = FillGameLeaderboard(dr);
                        list.Add(game_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboard> GetGameLeaderboardListByGameId(
            string game_id
        )  {
            List<GameLeaderboard> list = new List<GameLeaderboard>();
            DataSet ds = data.GetGameLeaderboardListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboard game_leaderboard  = FillGameLeaderboard(dr);
                        list.Add(game_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboard> GetGameLeaderboardListByCode(
            string code
        )  {
            List<GameLeaderboard> list = new List<GameLeaderboard>();
            DataSet ds = data.GetGameLeaderboardListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboard game_leaderboard  = FillGameLeaderboard(dr);
                        list.Add(game_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboard> GetGameLeaderboardListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameLeaderboard> list = new List<GameLeaderboard>();
            DataSet ds = data.GetGameLeaderboardListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboard game_leaderboard  = FillGameLeaderboard(dr);
                        list.Add(game_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboard> GetGameLeaderboardListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<GameLeaderboard> list = new List<GameLeaderboard>();
            DataSet ds = data.GetGameLeaderboardListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboard game_leaderboard  = FillGameLeaderboard(dr);
                        list.Add(game_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboard> GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<GameLeaderboard> list = new List<GameLeaderboard>();
            DataSet ds = data.GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboard game_leaderboard  = FillGameLeaderboard(dr);
                        list.Add(game_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboard> GetGameLeaderboardListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameLeaderboard> list = new List<GameLeaderboard>();
            DataSet ds = data.GetGameLeaderboardListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboard game_leaderboard  = FillGameLeaderboard(dr);
                        list.Add(game_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboard> GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameLeaderboard> list = new List<GameLeaderboard>();
            DataSet ds = data.GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboard game_leaderboard  = FillGameLeaderboard(dr);
                        list.Add(game_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameLeaderboardItem FillGameLeaderboardItem(DataRow dr) {
            GameLeaderboardItem obj = new GameLeaderboardItem();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataFloat(dr, "timestamp");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["rank"] != null)                    
                    obj.rank = dataType.FillDataInt(dr, "rank");                
            if (dr["rank_change"] != null)                    
                    obj.rank_change = dataType.FillDataInt(dr, "rank_change");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["rank_total_count"] != null)                    
                    obj.rank_total_count = dataType.FillDataInt(dr, "rank_total_count");                
            if (dr["absolute_value"] != null)                    
                    obj.absolute_value = dataType.FillDataFloat(dr, "absolute_value");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["stat_value"] != null)                    
                    obj.stat_value = dataType.FillDataFloat(dr, "stat_value");                
            if (dr["network"] != null)                    
                    obj.network = dataType.FillDataString(dr, "network");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["stat_value_formatted"] != null)                    
                    obj.stat_value_formatted = dataType.FillDataString(dr, "stat_value_formatted");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameLeaderboardItem(
        )  {            
            return data.CountGameLeaderboardItem(
            );
        }       
        public virtual int CountGameLeaderboardItemByUuid(
            string uuid
        )  {            
            return data.CountGameLeaderboardItemByUuid(
                uuid
            );
        }       
        public virtual int CountGameLeaderboardItemByGameId(
            string game_id
        )  {            
            return data.CountGameLeaderboardItemByGameId(
                game_id
            );
        }       
        public virtual int CountGameLeaderboardItemByCode(
            string code
        )  {            
            return data.CountGameLeaderboardItemByCode(
                code
            );
        }       
        public virtual int CountGameLeaderboardItemByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameLeaderboardItemByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameLeaderboardItemByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return data.CountGameLeaderboardItemByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
        }       
        public virtual int CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return data.CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }       
        public virtual int CountGameLeaderboardItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameLeaderboardItemByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameLeaderboardItemResult BrowseGameLeaderboardItemListByFilter(SearchFilter obj)  {
            GameLeaderboardItemResult result = new GameLeaderboardItemResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLeaderboardItemListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardItem game_leaderboard_item  = FillGameLeaderboardItem(dr);
                        result.data.Add(game_leaderboard_item);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameLeaderboardItemByUuid(string set_type, GameLeaderboardItem obj)  {            
            return data.SetGameLeaderboardItemByUuid(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(string set_type, GameLeaderboardItem obj)  {            
            return data.SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardItemByCode(string set_type, GameLeaderboardItem obj)  {            
            return data.SetGameLeaderboardItemByCode(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardItemByCodeByGameId(string set_type, GameLeaderboardItem obj)  {            
            return data.SetGameLeaderboardItemByCodeByGameId(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardItemByCodeByGameIdByProfileId(string set_type, GameLeaderboardItem obj)  {            
            return data.SetGameLeaderboardItemByCodeByGameIdByProfileId(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(string set_type, GameLeaderboardItem obj)  {            
            return data.SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(set_type, obj);
        }    
        public virtual bool DelGameLeaderboardItemByUuid(
            string uuid
        )  {
            return data.DelGameLeaderboardItemByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLeaderboardItemByCode(
            string code
        )  {
            return data.DelGameLeaderboardItemByCode(
                code
            );
        }                     
        public virtual bool DelGameLeaderboardItemByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameLeaderboardItemByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameLeaderboardItemByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return data.DelGameLeaderboardItemByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return data.DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }                     
        public virtual bool DelGameLeaderboardItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameLeaderboardItemByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemList(
        )  {
            List<GameLeaderboardItem> list = new List<GameLeaderboardItem>();
            DataSet ds = data.GetGameLeaderboardItemList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardItem game_leaderboard_item  = FillGameLeaderboardItem(dr);
                        list.Add(game_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByUuid(
            string uuid
        )  {
            List<GameLeaderboardItem> list = new List<GameLeaderboardItem>();
            DataSet ds = data.GetGameLeaderboardItemListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardItem game_leaderboard_item  = FillGameLeaderboardItem(dr);
                        list.Add(game_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByGameId(
            string game_id
        )  {
            List<GameLeaderboardItem> list = new List<GameLeaderboardItem>();
            DataSet ds = data.GetGameLeaderboardItemListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardItem game_leaderboard_item  = FillGameLeaderboardItem(dr);
                        list.Add(game_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByCode(
            string code
        )  {
            List<GameLeaderboardItem> list = new List<GameLeaderboardItem>();
            DataSet ds = data.GetGameLeaderboardItemListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardItem game_leaderboard_item  = FillGameLeaderboardItem(dr);
                        list.Add(game_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameLeaderboardItem> list = new List<GameLeaderboardItem>();
            DataSet ds = data.GetGameLeaderboardItemListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardItem game_leaderboard_item  = FillGameLeaderboardItem(dr);
                        list.Add(game_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<GameLeaderboardItem> list = new List<GameLeaderboardItem>();
            DataSet ds = data.GetGameLeaderboardItemListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardItem game_leaderboard_item  = FillGameLeaderboardItem(dr);
                        list.Add(game_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<GameLeaderboardItem> list = new List<GameLeaderboardItem>();
            DataSet ds = data.GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardItem game_leaderboard_item  = FillGameLeaderboardItem(dr);
                        list.Add(game_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameLeaderboardItem> list = new List<GameLeaderboardItem>();
            DataSet ds = data.GetGameLeaderboardItemListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardItem game_leaderboard_item  = FillGameLeaderboardItem(dr);
                        list.Add(game_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardItem> GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameLeaderboardItem> list = new List<GameLeaderboardItem>();
            DataSet ds = data.GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardItem game_leaderboard_item  = FillGameLeaderboardItem(dr);
                        list.Add(game_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameLeaderboardRollup FillGameLeaderboardRollup(DataRow dr) {
            GameLeaderboardRollup obj = new GameLeaderboardRollup();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataFloat(dr, "timestamp");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["rank"] != null)                    
                    obj.rank = dataType.FillDataInt(dr, "rank");                
            if (dr["rank_change"] != null)                    
                    obj.rank_change = dataType.FillDataInt(dr, "rank_change");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["rank_total_count"] != null)                    
                    obj.rank_total_count = dataType.FillDataInt(dr, "rank_total_count");                
            if (dr["absolute_value"] != null)                    
                    obj.absolute_value = dataType.FillDataFloat(dr, "absolute_value");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["stat_value"] != null)                    
                    obj.stat_value = dataType.FillDataFloat(dr, "stat_value");                
            if (dr["network"] != null)                    
                    obj.network = dataType.FillDataString(dr, "network");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["stat_value_formatted"] != null)                    
                    obj.stat_value_formatted = dataType.FillDataString(dr, "stat_value_formatted");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameLeaderboardRollup(
        )  {            
            return data.CountGameLeaderboardRollup(
            );
        }       
        public virtual int CountGameLeaderboardRollupByUuid(
            string uuid
        )  {            
            return data.CountGameLeaderboardRollupByUuid(
                uuid
            );
        }       
        public virtual int CountGameLeaderboardRollupByGameId(
            string game_id
        )  {            
            return data.CountGameLeaderboardRollupByGameId(
                game_id
            );
        }       
        public virtual int CountGameLeaderboardRollupByCode(
            string code
        )  {            
            return data.CountGameLeaderboardRollupByCode(
                code
            );
        }       
        public virtual int CountGameLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameLeaderboardRollupByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return data.CountGameLeaderboardRollupByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
        }       
        public virtual int CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return data.CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }       
        public virtual int CountGameLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameLeaderboardRollupByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameLeaderboardRollupResult BrowseGameLeaderboardRollupListByFilter(SearchFilter obj)  {
            GameLeaderboardRollupResult result = new GameLeaderboardRollupResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLeaderboardRollupListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardRollup game_leaderboard_rollup  = FillGameLeaderboardRollup(dr);
                        result.data.Add(game_leaderboard_rollup);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameLeaderboardRollupByUuid(string set_type, GameLeaderboardRollup obj)  {            
            return data.SetGameLeaderboardRollupByUuid(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(string set_type, GameLeaderboardRollup obj)  {            
            return data.SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardRollupByCode(string set_type, GameLeaderboardRollup obj)  {            
            return data.SetGameLeaderboardRollupByCode(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardRollupByCodeByGameId(string set_type, GameLeaderboardRollup obj)  {            
            return data.SetGameLeaderboardRollupByCodeByGameId(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardRollupByCodeByGameIdByProfileId(string set_type, GameLeaderboardRollup obj)  {            
            return data.SetGameLeaderboardRollupByCodeByGameIdByProfileId(set_type, obj);
        }    
        public virtual bool SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(string set_type, GameLeaderboardRollup obj)  {            
            return data.SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(set_type, obj);
        }    
        public virtual bool DelGameLeaderboardRollupByUuid(
            string uuid
        )  {
            return data.DelGameLeaderboardRollupByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLeaderboardRollupByCode(
            string code
        )  {
            return data.DelGameLeaderboardRollupByCode(
                code
            );
        }                     
        public virtual bool DelGameLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameLeaderboardRollupByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return data.DelGameLeaderboardRollupByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return data.DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }                     
        public virtual bool DelGameLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameLeaderboardRollupByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupList(
        )  {
            List<GameLeaderboardRollup> list = new List<GameLeaderboardRollup>();
            DataSet ds = data.GetGameLeaderboardRollupList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardRollup game_leaderboard_rollup  = FillGameLeaderboardRollup(dr);
                        list.Add(game_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByUuid(
            string uuid
        )  {
            List<GameLeaderboardRollup> list = new List<GameLeaderboardRollup>();
            DataSet ds = data.GetGameLeaderboardRollupListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardRollup game_leaderboard_rollup  = FillGameLeaderboardRollup(dr);
                        list.Add(game_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByGameId(
            string game_id
        )  {
            List<GameLeaderboardRollup> list = new List<GameLeaderboardRollup>();
            DataSet ds = data.GetGameLeaderboardRollupListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardRollup game_leaderboard_rollup  = FillGameLeaderboardRollup(dr);
                        list.Add(game_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByCode(
            string code
        )  {
            List<GameLeaderboardRollup> list = new List<GameLeaderboardRollup>();
            DataSet ds = data.GetGameLeaderboardRollupListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardRollup game_leaderboard_rollup  = FillGameLeaderboardRollup(dr);
                        list.Add(game_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameLeaderboardRollup> list = new List<GameLeaderboardRollup>();
            DataSet ds = data.GetGameLeaderboardRollupListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardRollup game_leaderboard_rollup  = FillGameLeaderboardRollup(dr);
                        list.Add(game_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<GameLeaderboardRollup> list = new List<GameLeaderboardRollup>();
            DataSet ds = data.GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardRollup game_leaderboard_rollup  = FillGameLeaderboardRollup(dr);
                        list.Add(game_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<GameLeaderboardRollup> list = new List<GameLeaderboardRollup>();
            DataSet ds = data.GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardRollup game_leaderboard_rollup  = FillGameLeaderboardRollup(dr);
                        list.Add(game_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameLeaderboardRollup> list = new List<GameLeaderboardRollup>();
            DataSet ds = data.GetGameLeaderboardRollupListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardRollup game_leaderboard_rollup  = FillGameLeaderboardRollup(dr);
                        list.Add(game_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLeaderboardRollup> GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameLeaderboardRollup> list = new List<GameLeaderboardRollup>();
            DataSet ds = data.GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLeaderboardRollup game_leaderboard_rollup  = FillGameLeaderboardRollup(dr);
                        list.Add(game_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameLiveQueue FillGameLiveQueue(DataRow dr) {
            GameLiveQueue obj = new GameLiveQueue();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["data_stat"] != null)                    
                    obj.data_stat = dataType.FillDataString(dr, "data_stat");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["data_ad"] != null)                    
                    obj.data_ad = dataType.FillDataString(dr, "data_ad");                

            return obj;
        }
        
        public virtual int CountGameLiveQueue(
        )  {            
            return data.CountGameLiveQueue(
            );
        }       
        public virtual int CountGameLiveQueueByUuid(
            string uuid
        )  {            
            return data.CountGameLiveQueueByUuid(
                uuid
            );
        }       
        public virtual int CountGameLiveQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameLiveQueueByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameLiveQueueResult BrowseGameLiveQueueListByFilter(SearchFilter obj)  {
            GameLiveQueueResult result = new GameLiveQueueResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLiveQueueListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveQueue game_live_queue  = FillGameLiveQueue(dr);
                        result.data.Add(game_live_queue);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameLiveQueueByUuid(string set_type, GameLiveQueue obj)  {            
            return data.SetGameLiveQueueByUuid(set_type, obj);
        }    
        public virtual bool SetGameLiveQueueByProfileIdByGameId(string set_type, GameLiveQueue obj)  {            
            return data.SetGameLiveQueueByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool DelGameLiveQueueByUuid(
            string uuid
        )  {
            return data.DelGameLiveQueueByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLiveQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameLiveQueueByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<GameLiveQueue> GetGameLiveQueueList(
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveQueue game_live_queue  = FillGameLiveQueue(dr);
                        list.Add(game_live_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveQueue> GetGameLiveQueueListByUuid(
            string uuid
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveQueue game_live_queue  = FillGameLiveQueue(dr);
                        list.Add(game_live_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveQueue> GetGameLiveQueueListByGameId(
            string game_id
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveQueue game_live_queue  = FillGameLiveQueue(dr);
                        list.Add(game_live_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveQueue> GetGameLiveQueueListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveQueue game_live_queue  = FillGameLiveQueue(dr);
                        list.Add(game_live_queue);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameLiveRecentQueue FillGameLiveRecentQueue(DataRow dr) {
            GameLiveRecentQueue obj = new GameLiveRecentQueue();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["game"] != null)                    
                    obj.game = dataType.FillDataString(dr, "game");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameLiveRecentQueue(
        )  {            
            return data.CountGameLiveRecentQueue(
            );
        }       
        public virtual int CountGameLiveRecentQueueByUuid(
            string uuid
        )  {            
            return data.CountGameLiveRecentQueueByUuid(
                uuid
            );
        }       
        public virtual int CountGameLiveRecentQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameLiveRecentQueueByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameLiveRecentQueueResult BrowseGameLiveRecentQueueListByFilter(SearchFilter obj)  {
            GameLiveRecentQueueResult result = new GameLiveRecentQueueResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLiveRecentQueueListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveRecentQueue game_live_recent_queue  = FillGameLiveRecentQueue(dr);
                        result.data.Add(game_live_recent_queue);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameLiveRecentQueueByUuid(string set_type, GameLiveRecentQueue obj)  {            
            return data.SetGameLiveRecentQueueByUuid(set_type, obj);
        }    
        public virtual bool SetGameLiveRecentQueueByProfileIdByGameId(string set_type, GameLiveRecentQueue obj)  {            
            return data.SetGameLiveRecentQueueByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool DelGameLiveRecentQueueByUuid(
            string uuid
        )  {
            return data.DelGameLiveRecentQueueByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLiveRecentQueueByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameLiveRecentQueueByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueList(
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveRecentQueue game_live_recent_queue  = FillGameLiveRecentQueue(dr);
                        list.Add(game_live_recent_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListByUuid(
            string uuid
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveRecentQueue game_live_recent_queue  = FillGameLiveRecentQueue(dr);
                        list.Add(game_live_recent_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListByGameId(
            string game_id
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveRecentQueue game_live_recent_queue  = FillGameLiveRecentQueue(dr);
                        list.Add(game_live_recent_queue);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLiveRecentQueue game_live_recent_queue  = FillGameLiveRecentQueue(dr);
                        list.Add(game_live_recent_queue);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameProfileStatistic FillGameProfileStatistic(DataRow dr) {
            GameProfileStatistic obj = new GameProfileStatistic();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["stat_value_formatted"] != null)                    
                    obj.stat_value_formatted = dataType.FillDataString(dr, "stat_value_formatted");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["stat_value"] != null)                    
                    obj.stat_value = dataType.FillDataFloat(dr, "stat_value");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["points"] != null)                    
                    obj.points = dataType.FillDataFloat(dr, "points");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataFloat(dr, "timestamp");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameProfileStatistic(
        )  {            
            return data.CountGameProfileStatistic(
            );
        }       
        public virtual int CountGameProfileStatisticByUuid(
            string uuid
        )  {            
            return data.CountGameProfileStatisticByUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileStatisticByCode(
            string code
        )  {            
            return data.CountGameProfileStatisticByCode(
                code
            );
        }       
        public virtual int CountGameProfileStatisticByGameId(
            string game_id
        )  {            
            return data.CountGameProfileStatisticByGameId(
                game_id
            );
        }       
        public virtual int CountGameProfileStatisticByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameProfileStatisticByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileStatisticByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileStatisticByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return data.CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameProfileStatisticResult BrowseGameProfileStatisticListByFilter(SearchFilter obj)  {
            GameProfileStatisticResult result = new GameProfileStatisticResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileStatisticListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatistic game_profile_statistic  = FillGameProfileStatistic(dr);
                        result.data.Add(game_profile_statistic);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProfileStatisticByUuid(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticByUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticByProfileIdByCode(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticByProfileIdByCode(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticByProfileIdByCodeByTimestamp(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticByProfileIdByCodeByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticByCodeByProfileIdByGameId(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticByCodeByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool DelGameProfileStatisticByUuid(
            string uuid
        )  {
            return data.DelGameProfileStatisticByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileStatisticByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameProfileStatisticByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameProfileStatisticByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameProfileStatisticByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual bool DelGameProfileStatisticByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return data.DelGameProfileStatisticByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
        }                     
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByUuid(
            string uuid
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatistic game_profile_statistic  = FillGameProfileStatistic(dr);
                        list.Add(game_profile_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByCode(
            string code
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatistic game_profile_statistic  = FillGameProfileStatistic(dr);
                        list.Add(game_profile_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByGameId(
            string game_id
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatistic game_profile_statistic  = FillGameProfileStatistic(dr);
                        list.Add(game_profile_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatistic game_profile_statistic  = FillGameProfileStatistic(dr);
                        list.Add(game_profile_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatistic game_profile_statistic  = FillGameProfileStatistic(dr);
                        list.Add(game_profile_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatistic game_profile_statistic  = FillGameProfileStatistic(dr);
                        list.Add(game_profile_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatistic game_profile_statistic  = FillGameProfileStatistic(dr);
                        list.Add(game_profile_statistic);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatistic game_profile_statistic  = FillGameProfileStatistic(dr);
                        list.Add(game_profile_statistic);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameStatisticMeta FillGameStatisticMeta(DataRow dr) {
            GameStatisticMeta obj = new GameStatisticMeta();

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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["points"] != null)                    
                    obj.points = dataType.FillDataFloat(dr, "points");                
            if (dr["store_count"] != null)                    
                    obj.store_count = dataType.FillDataInt(dr, "store_count");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataString(dr, "order");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameStatisticMeta(
        )  {            
            return data.CountGameStatisticMeta(
            );
        }       
        public virtual int CountGameStatisticMetaByUuid(
            string uuid
        )  {            
            return data.CountGameStatisticMetaByUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticMetaByCode(
            string code
        )  {            
            return data.CountGameStatisticMetaByCode(
                code
            );
        }       
        public virtual int CountGameStatisticMetaByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameStatisticMetaByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameStatisticMetaByName(
            string name
        )  {            
            return data.CountGameStatisticMetaByName(
                name
            );
        }       
        public virtual int CountGameStatisticMetaByGameId(
            string game_id
        )  {            
            return data.CountGameStatisticMetaByGameId(
                game_id
            );
        }       
        public virtual GameStatisticMetaResult BrowseGameStatisticMetaListByFilter(SearchFilter obj)  {
            GameStatisticMetaResult result = new GameStatisticMetaResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticMetaListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        result.data.Add(game_statistic_meta);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameStatisticMetaByUuid(string set_type, GameStatisticMeta obj)  {            
            return data.SetGameStatisticMetaByUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticMetaByCodeByGameId(string set_type, GameStatisticMeta obj)  {            
            return data.SetGameStatisticMetaByCodeByGameId(set_type, obj);
        }    
        public virtual bool DelGameStatisticMetaByUuid(
            string uuid
        )  {
            return data.DelGameStatisticMetaByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameStatisticMetaByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByUuid(
            string uuid
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByCode(
            string code
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByName(
            string name
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByGameId(
            string game_id
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticMeta game_statistic_meta  = FillGameStatisticMeta(dr);
                        list.Add(game_statistic_meta);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameProfileStatisticItem FillGameProfileStatisticItem(DataRow dr) {
            GameProfileStatisticItem obj = new GameProfileStatisticItem();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["stat_value_formatted"] != null)                    
                    obj.stat_value_formatted = dataType.FillDataString(dr, "stat_value_formatted");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["stat_value"] != null)                    
                    obj.stat_value = dataType.FillDataFloat(dr, "stat_value");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["points"] != null)                    
                    obj.points = dataType.FillDataFloat(dr, "points");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataFloat(dr, "timestamp");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameProfileStatisticItem(
        )  {            
            return data.CountGameProfileStatisticItem(
            );
        }       
        public virtual int CountGameProfileStatisticItemByUuid(
            string uuid
        )  {            
            return data.CountGameProfileStatisticItemByUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileStatisticItemByCode(
            string code
        )  {            
            return data.CountGameProfileStatisticItemByCode(
                code
            );
        }       
        public virtual int CountGameProfileStatisticItemByGameId(
            string game_id
        )  {            
            return data.CountGameProfileStatisticItemByGameId(
                game_id
            );
        }       
        public virtual int CountGameProfileStatisticItemByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameProfileStatisticItemByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileStatisticItemByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticItemByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileStatisticItemByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return data.CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameProfileStatisticItemResult BrowseGameProfileStatisticItemListByFilter(SearchFilter obj)  {
            GameProfileStatisticItemResult result = new GameProfileStatisticItemResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileStatisticItemListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticItem game_profile_statistic_item  = FillGameProfileStatisticItem(dr);
                        result.data.Add(game_profile_statistic_item);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProfileStatisticItemByUuid(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemByUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticItemByProfileIdByCode(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemByProfileIdByCode(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticItemByCodeByProfileIdByGameId(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemByCodeByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool DelGameProfileStatisticItemByUuid(
            string uuid
        )  {
            return data.DelGameProfileStatisticItemByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileStatisticItemByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameProfileStatisticItemByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameProfileStatisticItemByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameProfileStatisticItemByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual bool DelGameProfileStatisticItemByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return data.DelGameProfileStatisticItemByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
        }                     
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByUuid(
            string uuid
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticItem game_profile_statistic_item  = FillGameProfileStatisticItem(dr);
                        list.Add(game_profile_statistic_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByCode(
            string code
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticItem game_profile_statistic_item  = FillGameProfileStatisticItem(dr);
                        list.Add(game_profile_statistic_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByGameId(
            string game_id
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticItem game_profile_statistic_item  = FillGameProfileStatisticItem(dr);
                        list.Add(game_profile_statistic_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticItem game_profile_statistic_item  = FillGameProfileStatisticItem(dr);
                        list.Add(game_profile_statistic_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticItem game_profile_statistic_item  = FillGameProfileStatisticItem(dr);
                        list.Add(game_profile_statistic_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticItem game_profile_statistic_item  = FillGameProfileStatisticItem(dr);
                        list.Add(game_profile_statistic_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticItem game_profile_statistic_item  = FillGameProfileStatisticItem(dr);
                        list.Add(game_profile_statistic_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticItem game_profile_statistic_item  = FillGameProfileStatisticItem(dr);
                        list.Add(game_profile_statistic_item);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameKeyMeta FillGameKeyMeta(DataRow dr) {
            GameKeyMeta obj = new GameKeyMeta();

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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["key_level"] != null)                    
                    obj.key_level = dataType.FillDataString(dr, "key_level");                
            if (dr["store_count"] != null)                    
                    obj.store_count = dataType.FillDataInt(dr, "store_count");                
            if (dr["key"] != null)                    
                    obj.key = dataType.FillDataString(dr, "key");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataString(dr, "order");                
            if (dr["key_stat"] != null)                    
                    obj.key_stat = dataType.FillDataString(dr, "key_stat");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameKeyMeta(
        )  {            
            return data.CountGameKeyMeta(
            );
        }       
        public virtual int CountGameKeyMetaByUuid(
            string uuid
        )  {            
            return data.CountGameKeyMetaByUuid(
                uuid
            );
        }       
        public virtual int CountGameKeyMetaByCode(
            string code
        )  {            
            return data.CountGameKeyMetaByCode(
                code
            );
        }       
        public virtual int CountGameKeyMetaByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameKeyMetaByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameKeyMetaByName(
            string name
        )  {            
            return data.CountGameKeyMetaByName(
                name
            );
        }       
        public virtual int CountGameKeyMetaByKey(
            string key
        )  {            
            return data.CountGameKeyMetaByKey(
                key
            );
        }       
        public virtual int CountGameKeyMetaByGameId(
            string game_id
        )  {            
            return data.CountGameKeyMetaByGameId(
                game_id
            );
        }       
        public virtual int CountGameKeyMetaByKeyByGameId(
            string key
            , string game_id
        )  {            
            return data.CountGameKeyMetaByKeyByGameId(
                key
                , game_id
            );
        }       
        public virtual GameKeyMetaResult BrowseGameKeyMetaListByFilter(SearchFilter obj)  {
            GameKeyMetaResult result = new GameKeyMetaResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameKeyMetaListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        result.data.Add(game_key_meta);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameKeyMetaByUuid(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaByUuid(set_type, obj);
        }    
        public virtual bool SetGameKeyMetaByCodeByGameId(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaByCodeByGameId(set_type, obj);
        }    
        public virtual bool SetGameKeyMetaByKeyByGameId(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaByKeyByGameId(set_type, obj);
        }    
        public virtual bool SetGameKeyMetaByKeyByGameIdByLevel(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaByKeyByGameIdByLevel(set_type, obj);
        }    
        public virtual bool DelGameKeyMetaByUuid(
            string uuid
        )  {
            return data.DelGameKeyMetaByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameKeyMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameKeyMetaByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameKeyMetaByKeyByGameId(
            string key
            , string game_id
        )  {
            return data.DelGameKeyMetaByKeyByGameId(
                key
                , game_id
            );
        }                     
        public virtual List<GameKeyMeta> GetGameKeyMetaListByUuid(
            string uuid
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByCode(
            string code
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByName(
            string name
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByKey(
            string key
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByKey(
                key
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByGameId(
            string game_id
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByKeyByGameId(
            string key
            , string game_id
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByKeyByGameId(
                key
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListByCodeByLevel(
            string code
            , string level
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListByCodeByLevel(
                code
                , level
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameKeyMeta game_key_meta  = FillGameKeyMeta(dr);
                        list.Add(game_key_meta);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameLevel FillGameLevel(DataRow dr) {
            GameLevel obj = new GameLevel();

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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["order"] != null)                    
                    obj.order = dataType.FillDataString(dr, "order");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameLevel(
        )  {            
            return data.CountGameLevel(
            );
        }       
        public virtual int CountGameLevelByUuid(
            string uuid
        )  {            
            return data.CountGameLevelByUuid(
                uuid
            );
        }       
        public virtual int CountGameLevelByCode(
            string code
        )  {            
            return data.CountGameLevelByCode(
                code
            );
        }       
        public virtual int CountGameLevelByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameLevelByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameLevelByName(
            string name
        )  {            
            return data.CountGameLevelByName(
                name
            );
        }       
        public virtual int CountGameLevelByGameId(
            string game_id
        )  {            
            return data.CountGameLevelByGameId(
                game_id
            );
        }       
        public virtual GameLevelResult BrowseGameLevelListByFilter(SearchFilter obj)  {
            GameLevelResult result = new GameLevelResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLevelListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        result.data.Add(game_level);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameLevelByUuid(string set_type, GameLevel obj)  {            
            return data.SetGameLevelByUuid(set_type, obj);
        }    
        public virtual bool SetGameLevelByCodeByGameId(string set_type, GameLevel obj)  {            
            return data.SetGameLevelByCodeByGameId(set_type, obj);
        }    
        public virtual bool DelGameLevelByUuid(
            string uuid
        )  {
            return data.DelGameLevelByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLevelByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameLevelByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual List<GameLevel> GetGameLevelListByUuid(
            string uuid
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLevel> GetGameLevelListByCode(
            string code
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLevel> GetGameLevelListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLevel> GetGameLevelListByName(
            string name
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameLevel> GetGameLevelListByGameId(
            string game_id
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameLevel game_level  = FillGameLevel(dr);
                        list.Add(game_level);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameProfileAchievement FillGameProfileAchievement(DataRow dr) {
            GameProfileAchievement obj = new GameProfileAchievement();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["username"] != null)                    
                    obj.username = dataType.FillDataString(dr, "username");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataFloat(dr, "timestamp");                
            if (dr["completed"] != null)                    
                    obj.completed = dataType.FillDataBool(dr, "completed");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["achievement_value"] != null)                    
                    obj.achievement_value = dataType.FillDataFloat(dr, "achievement_value");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountGameProfileAchievement(
        )  {            
            return data.CountGameProfileAchievement(
            );
        }       
        public virtual int CountGameProfileAchievementByUuid(
            string uuid
        )  {            
            return data.CountGameProfileAchievementByUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileAchievementByProfileIdByCode(
            string profile_id
            , string code
        )  {            
            return data.CountGameProfileAchievementByProfileIdByCode(
                profile_id
                , code
            );
        }       
        public virtual int CountGameProfileAchievementByUsername(
            string username
        )  {            
            return data.CountGameProfileAchievementByUsername(
                username
            );
        }       
        public virtual int CountGameProfileAchievementByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileAchievementByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return data.CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameProfileAchievementResult BrowseGameProfileAchievementListByFilter(SearchFilter obj)  {
            GameProfileAchievementResult result = new GameProfileAchievementResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileAchievementListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        result.data.Add(game_profile_achievement);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProfileAchievementByUuid(string set_type, GameProfileAchievement obj)  {            
            return data.SetGameProfileAchievementByUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileAchievementByUuidByCode(string set_type, GameProfileAchievement obj)  {            
            return data.SetGameProfileAchievementByUuidByCode(set_type, obj);
        }    
        public virtual bool SetGameProfileAchievementByProfileIdByCode(string set_type, GameProfileAchievement obj)  {            
            return data.SetGameProfileAchievementByProfileIdByCode(set_type, obj);
        }    
        public virtual bool SetGameProfileAchievementByCodeByProfileIdByGameId(string set_type, GameProfileAchievement obj)  {            
            return data.SetGameProfileAchievementByCodeByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileAchievement obj)  {            
            return data.SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool DelGameProfileAchievementByUuid(
            string uuid
        )  {
            return data.DelGameProfileAchievementByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileAchievementByProfileIdByCode(
            string profile_id
            , string code
        )  {
            return data.DelGameProfileAchievementByProfileIdByCode(
                profile_id
                , code
            );
        }                     
        public virtual bool DelGameProfileAchievementByUuidByCode(
            string uuid
            , string code
        )  {
            return data.DelGameProfileAchievementByUuidByCode(
                uuid
                , code
            );
        }                     
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByUuid(
            string uuid
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        list.Add(game_profile_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByProfileIdByCode(
            string profile_id
            , string code
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListByProfileIdByCode(
                profile_id
                , code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        list.Add(game_profile_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByUsername(
            string username
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListByUsername(
                username
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        list.Add(game_profile_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByCode(
            string code
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        list.Add(game_profile_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByGameId(
            string game_id
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        list.Add(game_profile_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        list.Add(game_profile_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        list.Add(game_profile_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        list.Add(game_profile_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        list.Add(game_profile_achievement);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileAchievement game_profile_achievement  = FillGameProfileAchievement(dr);
                        list.Add(game_profile_achievement);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameAchievementMeta FillGameAchievementMeta(DataRow dr) {
            GameAchievementMeta obj = new GameAchievementMeta();

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
            if (dr["game_stat"] != null)                    
                    obj.game_stat = dataType.FillDataBool(dr, "game_stat");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["level"] != null)                    
                    obj.level = dataType.FillDataString(dr, "level");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["points"] != null)                    
                    obj.points = dataType.FillDataInt(dr, "points");                
            if (dr["game_id"] != null)                    
                    obj.game_id = dataType.FillDataString(dr, "game_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["modifier"] != null)                    
                    obj.modifier = dataType.FillDataFloat(dr, "modifier");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["leaderboard"] != null)                    
                    obj.leaderboard = dataType.FillDataBool(dr, "leaderboard");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountGameAchievementMeta(
        )  {            
            return data.CountGameAchievementMeta(
            );
        }       
        public virtual int CountGameAchievementMetaByUuid(
            string uuid
        )  {            
            return data.CountGameAchievementMetaByUuid(
                uuid
            );
        }       
        public virtual int CountGameAchievementMetaByCode(
            string code
        )  {            
            return data.CountGameAchievementMetaByCode(
                code
            );
        }       
        public virtual int CountGameAchievementMetaByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameAchievementMetaByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameAchievementMetaByName(
            string name
        )  {            
            return data.CountGameAchievementMetaByName(
                name
            );
        }       
        public virtual int CountGameAchievementMetaByGameId(
            string game_id
        )  {            
            return data.CountGameAchievementMetaByGameId(
                game_id
            );
        }       
        public virtual GameAchievementMetaResult BrowseGameAchievementMetaListByFilter(SearchFilter obj)  {
            GameAchievementMetaResult result = new GameAchievementMetaResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameAchievementMetaListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        result.data.Add(game_achievement_meta);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameAchievementMetaByUuid(string set_type, GameAchievementMeta obj)  {            
            return data.SetGameAchievementMetaByUuid(set_type, obj);
        }    
        public virtual bool SetGameAchievementMetaByCodeByGameId(string set_type, GameAchievementMeta obj)  {            
            return data.SetGameAchievementMetaByCodeByGameId(set_type, obj);
        }    
        public virtual bool DelGameAchievementMetaByUuid(
            string uuid
        )  {
            return data.DelGameAchievementMetaByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameAchievementMetaByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameAchievementMetaByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByUuid(
            string uuid
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByCode(
            string code
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByName(
            string name
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListByGameId(
            string game_id
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameAchievementMeta game_achievement_meta  = FillGameAchievementMeta(dr);
                        list.Add(game_achievement_meta);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileReward FillProfileReward(DataRow dr) {
            ProfileReward obj = new ProfileReward();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["viewed"] != null)                    
                    obj.viewed = dataType.FillDataBool(dr, "viewed");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["downloaded"] != null)                    
                    obj.downloaded = dataType.FillDataBool(dr, "downloaded");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["reward_id"] != null)                    
                    obj.reward_id = dataType.FillDataString(dr, "reward_id");                
            if (dr["usage_count"] != null)                    
                    obj.usage_count = dataType.FillDataInt(dr, "usage_count");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["blurb"] != null)                    
                    obj.blurb = dataType.FillDataString(dr, "blurb");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountProfileReward(
        )  {            
            return data.CountProfileReward(
            );
        }       
        public virtual int CountProfileRewardByUuid(
            string uuid
        )  {            
            return data.CountProfileRewardByUuid(
                uuid
            );
        }       
        public virtual int CountProfileRewardByProfileId(
            string profile_id
        )  {            
            return data.CountProfileRewardByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileRewardByRewardId(
            string reward_id
        )  {            
            return data.CountProfileRewardByRewardId(
                reward_id
            );
        }       
        public virtual int CountProfileRewardByProfileIdByRewardId(
            string profile_id
            , string reward_id
        )  {            
            return data.CountProfileRewardByProfileIdByRewardId(
                profile_id
                , reward_id
            );
        }       
        public virtual int CountProfileRewardByProfileIdByChannelId(
            string profile_id
            , string channel_id
        )  {            
            return data.CountProfileRewardByProfileIdByChannelId(
                profile_id
                , channel_id
            );
        }       
        public virtual int CountProfileRewardByProfileIdByChannelIdByRewardId(
            string profile_id
            , string channel_id
            , string reward_id
        )  {            
            return data.CountProfileRewardByProfileIdByChannelIdByRewardId(
                profile_id
                , channel_id
                , reward_id
            );
        }       
        public virtual ProfileRewardResult BrowseProfileRewardListByFilter(SearchFilter obj)  {
            ProfileRewardResult result = new ProfileRewardResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileRewardListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileReward profile_reward  = FillProfileReward(dr);
                        result.data.Add(profile_reward);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileRewardByUuid(string set_type, ProfileReward obj)  {            
            return data.SetProfileRewardByUuid(set_type, obj);
        }    
        public virtual bool SetProfileRewardByProfileIdByChannelIdByRewardId(string set_type, ProfileReward obj)  {            
            return data.SetProfileRewardByProfileIdByChannelIdByRewardId(set_type, obj);
        }    
        public virtual bool DelProfileRewardByUuid(
            string uuid
        )  {
            return data.DelProfileRewardByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileRewardByProfileIdByRewardId(
            string profile_id
            , string reward_id
        )  {
            return data.DelProfileRewardByProfileIdByRewardId(
                profile_id
                , reward_id
            );
        }                     
        public virtual List<ProfileReward> GetProfileRewardListByUuid(
            string uuid
        )  {
            List<ProfileReward> list = new List<ProfileReward>();
            DataSet ds = data.GetProfileRewardListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileReward profile_reward  = FillProfileReward(dr);
                        list.Add(profile_reward);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileReward> GetProfileRewardListByProfileId(
            string profile_id
        )  {
            List<ProfileReward> list = new List<ProfileReward>();
            DataSet ds = data.GetProfileRewardListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileReward profile_reward  = FillProfileReward(dr);
                        list.Add(profile_reward);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileReward> GetProfileRewardListByRewardId(
            string reward_id
        )  {
            List<ProfileReward> list = new List<ProfileReward>();
            DataSet ds = data.GetProfileRewardListByRewardId(
                reward_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileReward profile_reward  = FillProfileReward(dr);
                        list.Add(profile_reward);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileReward> GetProfileRewardListByProfileIdByRewardId(
            string profile_id
            , string reward_id
        )  {
            List<ProfileReward> list = new List<ProfileReward>();
            DataSet ds = data.GetProfileRewardListByProfileIdByRewardId(
                profile_id
                , reward_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileReward profile_reward  = FillProfileReward(dr);
                        list.Add(profile_reward);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileReward> GetProfileRewardListByProfileIdByChannelId(
            string profile_id
            , string channel_id
        )  {
            List<ProfileReward> list = new List<ProfileReward>();
            DataSet ds = data.GetProfileRewardListByProfileIdByChannelId(
                profile_id
                , channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileReward profile_reward  = FillProfileReward(dr);
                        list.Add(profile_reward);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileReward> GetProfileRewardListByProfileIdByChannelIdByRewardId(
            string profile_id
            , string channel_id
            , string reward_id
        )  {
            List<ProfileReward> list = new List<ProfileReward>();
            DataSet ds = data.GetProfileRewardListByProfileIdByChannelIdByRewardId(
                profile_id
                , channel_id
                , reward_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileReward profile_reward  = FillProfileReward(dr);
                        list.Add(profile_reward);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Coupon FillCoupon(DataRow dr) {
            Coupon obj = new Coupon();

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
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["usage_count"] != null)                    
                    obj.usage_count = dataType.FillDataInt(dr, "usage_count");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountCoupon(
        )  {            
            return data.CountCoupon(
            );
        }       
        public virtual int CountCouponByUuid(
            string uuid
        )  {            
            return data.CountCouponByUuid(
                uuid
            );
        }       
        public virtual int CountCouponByCode(
            string code
        )  {            
            return data.CountCouponByCode(
                code
            );
        }       
        public virtual int CountCouponByName(
            string name
        )  {            
            return data.CountCouponByName(
                name
            );
        }       
        public virtual int CountCouponByOrgId(
            string org_id
        )  {            
            return data.CountCouponByOrgId(
                org_id
            );
        }       
        public virtual CouponResult BrowseCouponListByFilter(SearchFilter obj)  {
            CouponResult result = new CouponResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseCouponListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Coupon coupon  = FillCoupon(dr);
                        result.data.Add(coupon);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetCouponByUuid(string set_type, Coupon obj)  {            
            return data.SetCouponByUuid(set_type, obj);
        }    
        public virtual bool DelCouponByUuid(
            string uuid
        )  {
            return data.DelCouponByUuid(
                uuid
            );
        }                     
        public virtual bool DelCouponByOrgId(
            string org_id
        )  {
            return data.DelCouponByOrgId(
                org_id
            );
        }                     
        public virtual List<Coupon> GetCouponListByUuid(
            string uuid
        )  {
            List<Coupon> list = new List<Coupon>();
            DataSet ds = data.GetCouponListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Coupon coupon  = FillCoupon(dr);
                        list.Add(coupon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Coupon> GetCouponListByCode(
            string code
        )  {
            List<Coupon> list = new List<Coupon>();
            DataSet ds = data.GetCouponListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Coupon coupon  = FillCoupon(dr);
                        list.Add(coupon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Coupon> GetCouponListByName(
            string name
        )  {
            List<Coupon> list = new List<Coupon>();
            DataSet ds = data.GetCouponListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Coupon coupon  = FillCoupon(dr);
                        list.Add(coupon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Coupon> GetCouponListByOrgId(
            string org_id
        )  {
            List<Coupon> list = new List<Coupon>();
            DataSet ds = data.GetCouponListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Coupon coupon  = FillCoupon(dr);
                        list.Add(coupon);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileCoupon FillProfileCoupon(DataRow dr) {
            ProfileCoupon obj = new ProfileCoupon();

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
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountProfileCoupon(
        )  {            
            return data.CountProfileCoupon(
            );
        }       
        public virtual int CountProfileCouponByUuid(
            string uuid
        )  {            
            return data.CountProfileCouponByUuid(
                uuid
            );
        }       
        public virtual int CountProfileCouponByProfileId(
            string profile_id
        )  {            
            return data.CountProfileCouponByProfileId(
                profile_id
            );
        }       
        public virtual ProfileCouponResult BrowseProfileCouponListByFilter(SearchFilter obj)  {
            ProfileCouponResult result = new ProfileCouponResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileCouponListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileCoupon profile_coupon  = FillProfileCoupon(dr);
                        result.data.Add(profile_coupon);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileCouponByUuid(string set_type, ProfileCoupon obj)  {            
            return data.SetProfileCouponByUuid(set_type, obj);
        }    
        public virtual bool DelProfileCouponByUuid(
            string uuid
        )  {
            return data.DelProfileCouponByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileCouponByProfileId(
            string profile_id
        )  {
            return data.DelProfileCouponByProfileId(
                profile_id
            );
        }                     
        public virtual List<ProfileCoupon> GetProfileCouponListByUuid(
            string uuid
        )  {
            List<ProfileCoupon> list = new List<ProfileCoupon>();
            DataSet ds = data.GetProfileCouponListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileCoupon profile_coupon  = FillProfileCoupon(dr);
                        list.Add(profile_coupon);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileCoupon> GetProfileCouponListByProfileId(
            string profile_id
        )  {
            List<ProfileCoupon> list = new List<ProfileCoupon>();
            DataSet ds = data.GetProfileCouponListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileCoupon profile_coupon  = FillProfileCoupon(dr);
                        list.Add(profile_coupon);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Org FillOrg(DataRow dr) {
            Org obj = new Org();

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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountOrg(
        )  {            
            return data.CountOrg(
            );
        }       
        public virtual int CountOrgByUuid(
            string uuid
        )  {            
            return data.CountOrgByUuid(
                uuid
            );
        }       
        public virtual int CountOrgByCode(
            string code
        )  {            
            return data.CountOrgByCode(
                code
            );
        }       
        public virtual int CountOrgByName(
            string name
        )  {            
            return data.CountOrgByName(
                name
            );
        }       
        public virtual OrgResult BrowseOrgListByFilter(SearchFilter obj)  {
            OrgResult result = new OrgResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseOrgListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Org org  = FillOrg(dr);
                        result.data.Add(org);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetOrgByUuid(string set_type, Org obj)  {            
            return data.SetOrgByUuid(set_type, obj);
        }    
        public virtual bool DelOrgByUuid(
            string uuid
        )  {
            return data.DelOrgByUuid(
                uuid
            );
        }                     
        public virtual List<Org> GetOrgListByUuid(
            string uuid
        )  {
            List<Org> list = new List<Org>();
            DataSet ds = data.GetOrgListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Org org  = FillOrg(dr);
                        list.Add(org);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Org> GetOrgListByCode(
            string code
        )  {
            List<Org> list = new List<Org>();
            DataSet ds = data.GetOrgListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Org org  = FillOrg(dr);
                        list.Add(org);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Org> GetOrgListByName(
            string name
        )  {
            List<Org> list = new List<Org>();
            DataSet ds = data.GetOrgListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Org org  = FillOrg(dr);
                        list.Add(org);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Channel FillChannel(DataRow dr) {
            Channel obj = new Channel();

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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["type_id"] != null)                    
                    obj.type_id = dataType.FillDataString(dr, "type_id");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountChannel(
        )  {            
            return data.CountChannel(
            );
        }       
        public virtual int CountChannelByUuid(
            string uuid
        )  {            
            return data.CountChannelByUuid(
                uuid
            );
        }       
        public virtual int CountChannelByCode(
            string code
        )  {            
            return data.CountChannelByCode(
                code
            );
        }       
        public virtual int CountChannelByName(
            string name
        )  {            
            return data.CountChannelByName(
                name
            );
        }       
        public virtual int CountChannelByOrgId(
            string org_id
        )  {            
            return data.CountChannelByOrgId(
                org_id
            );
        }       
        public virtual int CountChannelByTypeId(
            string type_id
        )  {            
            return data.CountChannelByTypeId(
                type_id
            );
        }       
        public virtual int CountChannelByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {            
            return data.CountChannelByOrgIdByTypeId(
                org_id
                , type_id
            );
        }       
        public virtual ChannelResult BrowseChannelListByFilter(SearchFilter obj)  {
            ChannelResult result = new ChannelResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseChannelListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        result.data.Add(channel);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetChannelByUuid(string set_type, Channel obj)  {            
            return data.SetChannelByUuid(set_type, obj);
        }    
        public virtual bool DelChannelByUuid(
            string uuid
        )  {
            return data.DelChannelByUuid(
                uuid
            );
        }                     
        public virtual bool DelChannelByCodeByOrgId(
            string code
            , string org_id
        )  {
            return data.DelChannelByCodeByOrgId(
                code
                , org_id
            );
        }                     
        public virtual bool DelChannelByCodeByOrgIdByTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            return data.DelChannelByCodeByOrgIdByTypeId(
                code
                , org_id
                , type_id
            );
        }                     
        public virtual List<Channel> GetChannelListByUuid(
            string uuid
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListByCode(
            string code
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListByName(
            string name
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListByOrgId(
            string org_id
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListByTypeId(
            string type_id
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByTypeId(
                type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Channel> GetChannelListByOrgIdByTypeId(
            string org_id
            , string type_id
        )  {
            List<Channel> list = new List<Channel>();
            DataSet ds = data.GetChannelListByOrgIdByTypeId(
                org_id
                , type_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Channel channel  = FillChannel(dr);
                        list.Add(channel);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ChannelType FillChannelType(DataRow dr) {
            ChannelType obj = new ChannelType();

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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountChannelType(
        )  {            
            return data.CountChannelType(
            );
        }       
        public virtual int CountChannelTypeByUuid(
            string uuid
        )  {            
            return data.CountChannelTypeByUuid(
                uuid
            );
        }       
        public virtual int CountChannelTypeByCode(
            string code
        )  {            
            return data.CountChannelTypeByCode(
                code
            );
        }       
        public virtual int CountChannelTypeByName(
            string name
        )  {            
            return data.CountChannelTypeByName(
                name
            );
        }       
        public virtual ChannelTypeResult BrowseChannelTypeListByFilter(SearchFilter obj)  {
            ChannelTypeResult result = new ChannelTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseChannelTypeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ChannelType channel_type  = FillChannelType(dr);
                        result.data.Add(channel_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetChannelTypeByUuid(string set_type, ChannelType obj)  {            
            return data.SetChannelTypeByUuid(set_type, obj);
        }    
        public virtual bool DelChannelTypeByUuid(
            string uuid
        )  {
            return data.DelChannelTypeByUuid(
                uuid
            );
        }                     
        public virtual List<ChannelType> GetChannelTypeListByUuid(
            string uuid
        )  {
            List<ChannelType> list = new List<ChannelType>();
            DataSet ds = data.GetChannelTypeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ChannelType channel_type  = FillChannelType(dr);
                        list.Add(channel_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ChannelType> GetChannelTypeListByCode(
            string code
        )  {
            List<ChannelType> list = new List<ChannelType>();
            DataSet ds = data.GetChannelTypeListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ChannelType channel_type  = FillChannelType(dr);
                        list.Add(channel_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ChannelType> GetChannelTypeListByName(
            string name
        )  {
            List<ChannelType> list = new List<ChannelType>();
            DataSet ds = data.GetChannelTypeListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ChannelType channel_type  = FillChannelType(dr);
                        list.Add(channel_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Reward FillReward(DataRow dr) {
            Reward obj = new Reward();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["type_url"] != null)                    
                    obj.type_url = dataType.FillDataString(dr, "type_url");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["url"] != null)                    
                    obj.url = dataType.FillDataString(dr, "url");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["usage_count"] != null)                    
                    obj.usage_count = dataType.FillDataInt(dr, "usage_count");                
            if (dr["external_id"] != null)                    
                    obj.external_id = dataType.FillDataString(dr, "external_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountReward(
        )  {            
            return data.CountReward(
            );
        }       
        public virtual int CountRewardByUuid(
            string uuid
        )  {            
            return data.CountRewardByUuid(
                uuid
            );
        }       
        public virtual int CountRewardByCode(
            string code
        )  {            
            return data.CountRewardByCode(
                code
            );
        }       
        public virtual int CountRewardByName(
            string name
        )  {            
            return data.CountRewardByName(
                name
            );
        }       
        public virtual int CountRewardByOrgId(
            string org_id
        )  {            
            return data.CountRewardByOrgId(
                org_id
            );
        }       
        public virtual int CountRewardByChannelId(
            string channel_id
        )  {            
            return data.CountRewardByChannelId(
                channel_id
            );
        }       
        public virtual int CountRewardByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {            
            return data.CountRewardByOrgIdByChannelId(
                org_id
                , channel_id
            );
        }       
        public virtual RewardResult BrowseRewardListByFilter(SearchFilter obj)  {
            RewardResult result = new RewardResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseRewardListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Reward reward  = FillReward(dr);
                        result.data.Add(reward);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetRewardByUuid(string set_type, Reward obj)  {            
            return data.SetRewardByUuid(set_type, obj);
        }    
        public virtual bool DelRewardByUuid(
            string uuid
        )  {
            return data.DelRewardByUuid(
                uuid
            );
        }                     
        public virtual bool DelRewardByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            return data.DelRewardByOrgIdByChannelId(
                org_id
                , channel_id
            );
        }                     
        public virtual List<Reward> GetRewardListByUuid(
            string uuid
        )  {
            List<Reward> list = new List<Reward>();
            DataSet ds = data.GetRewardListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Reward reward  = FillReward(dr);
                        list.Add(reward);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Reward> GetRewardListByCode(
            string code
        )  {
            List<Reward> list = new List<Reward>();
            DataSet ds = data.GetRewardListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Reward reward  = FillReward(dr);
                        list.Add(reward);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Reward> GetRewardListByName(
            string name
        )  {
            List<Reward> list = new List<Reward>();
            DataSet ds = data.GetRewardListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Reward reward  = FillReward(dr);
                        list.Add(reward);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Reward> GetRewardListByOrgId(
            string org_id
        )  {
            List<Reward> list = new List<Reward>();
            DataSet ds = data.GetRewardListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Reward reward  = FillReward(dr);
                        list.Add(reward);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Reward> GetRewardListByChannelId(
            string channel_id
        )  {
            List<Reward> list = new List<Reward>();
            DataSet ds = data.GetRewardListByChannelId(
                channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Reward reward  = FillReward(dr);
                        list.Add(reward);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Reward> GetRewardListByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            List<Reward> list = new List<Reward>();
            DataSet ds = data.GetRewardListByOrgIdByChannelId(
                org_id
                , channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Reward reward  = FillReward(dr);
                        list.Add(reward);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual RewardType FillRewardType(DataRow dr) {
            RewardType obj = new RewardType();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["type_url"] != null)                    
                    obj.type_url = dataType.FillDataString(dr, "type_url");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountRewardType(
        )  {            
            return data.CountRewardType(
            );
        }       
        public virtual int CountRewardTypeByUuid(
            string uuid
        )  {            
            return data.CountRewardTypeByUuid(
                uuid
            );
        }       
        public virtual int CountRewardTypeByCode(
            string code
        )  {            
            return data.CountRewardTypeByCode(
                code
            );
        }       
        public virtual int CountRewardTypeByName(
            string name
        )  {            
            return data.CountRewardTypeByName(
                name
            );
        }       
        public virtual int CountRewardTypeByType(
            string type
        )  {            
            return data.CountRewardTypeByType(
                type
            );
        }       
        public virtual RewardTypeResult BrowseRewardTypeListByFilter(SearchFilter obj)  {
            RewardTypeResult result = new RewardTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseRewardTypeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardType reward_type  = FillRewardType(dr);
                        result.data.Add(reward_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetRewardTypeByUuid(string set_type, RewardType obj)  {            
            return data.SetRewardTypeByUuid(set_type, obj);
        }    
        public virtual bool DelRewardTypeByUuid(
            string uuid
        )  {
            return data.DelRewardTypeByUuid(
                uuid
            );
        }                     
        public virtual List<RewardType> GetRewardTypeListByUuid(
            string uuid
        )  {
            List<RewardType> list = new List<RewardType>();
            DataSet ds = data.GetRewardTypeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardType reward_type  = FillRewardType(dr);
                        list.Add(reward_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardType> GetRewardTypeListByCode(
            string code
        )  {
            List<RewardType> list = new List<RewardType>();
            DataSet ds = data.GetRewardTypeListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardType reward_type  = FillRewardType(dr);
                        list.Add(reward_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardType> GetRewardTypeListByName(
            string name
        )  {
            List<RewardType> list = new List<RewardType>();
            DataSet ds = data.GetRewardTypeListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardType reward_type  = FillRewardType(dr);
                        list.Add(reward_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardType> GetRewardTypeListByType(
            string type
        )  {
            List<RewardType> list = new List<RewardType>();
            DataSet ds = data.GetRewardTypeListByType(
                type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardType reward_type  = FillRewardType(dr);
                        list.Add(reward_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual RewardCondition FillRewardCondition(DataRow dr) {
            RewardCondition obj = new RewardCondition();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["end_date"] != null)                    
                    obj.end_date = dataType.FillDataDateTime(dr, "end_date");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["amount"] != null)                    
                    obj.amount = dataType.FillDataInt(dr, "amount");                
            if (dr["global_reward"] != null)                    
                    obj.global_reward = dataType.FillDataBool(dr, "global_reward");                
            if (dr["condition"] != null)                    
                    obj.condition = dataType.FillDataString(dr, "condition");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["start_date"] != null)                    
                    obj.start_date = dataType.FillDataDateTime(dr, "start_date");                
            if (dr["reward_id"] != null)                    
                    obj.reward_id = dataType.FillDataString(dr, "reward_id");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountRewardCondition(
        )  {            
            return data.CountRewardCondition(
            );
        }       
        public virtual int CountRewardConditionByUuid(
            string uuid
        )  {            
            return data.CountRewardConditionByUuid(
                uuid
            );
        }       
        public virtual int CountRewardConditionByCode(
            string code
        )  {            
            return data.CountRewardConditionByCode(
                code
            );
        }       
        public virtual int CountRewardConditionByName(
            string name
        )  {            
            return data.CountRewardConditionByName(
                name
            );
        }       
        public virtual int CountRewardConditionByOrgId(
            string org_id
        )  {            
            return data.CountRewardConditionByOrgId(
                org_id
            );
        }       
        public virtual int CountRewardConditionByChannelId(
            string channel_id
        )  {            
            return data.CountRewardConditionByChannelId(
                channel_id
            );
        }       
        public virtual int CountRewardConditionByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {            
            return data.CountRewardConditionByOrgIdByChannelId(
                org_id
                , channel_id
            );
        }       
        public virtual int CountRewardConditionByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        )  {            
            return data.CountRewardConditionByOrgIdByChannelIdByRewardId(
                org_id
                , channel_id
                , reward_id
            );
        }       
        public virtual int CountRewardConditionByRewardId(
            string reward_id
        )  {            
            return data.CountRewardConditionByRewardId(
                reward_id
            );
        }       
        public virtual RewardConditionResult BrowseRewardConditionListByFilter(SearchFilter obj)  {
            RewardConditionResult result = new RewardConditionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseRewardConditionListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCondition reward_condition  = FillRewardCondition(dr);
                        result.data.Add(reward_condition);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetRewardConditionByUuid(string set_type, RewardCondition obj)  {            
            return data.SetRewardConditionByUuid(set_type, obj);
        }    
        public virtual bool DelRewardConditionByUuid(
            string uuid
        )  {
            return data.DelRewardConditionByUuid(
                uuid
            );
        }                     
        public virtual bool DelRewardConditionByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        )  {
            return data.DelRewardConditionByOrgIdByChannelIdByRewardId(
                org_id
                , channel_id
                , reward_id
            );
        }                     
        public virtual List<RewardCondition> GetRewardConditionListByUuid(
            string uuid
        )  {
            List<RewardCondition> list = new List<RewardCondition>();
            DataSet ds = data.GetRewardConditionListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCondition reward_condition  = FillRewardCondition(dr);
                        list.Add(reward_condition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCondition> GetRewardConditionListByCode(
            string code
        )  {
            List<RewardCondition> list = new List<RewardCondition>();
            DataSet ds = data.GetRewardConditionListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCondition reward_condition  = FillRewardCondition(dr);
                        list.Add(reward_condition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCondition> GetRewardConditionListByName(
            string name
        )  {
            List<RewardCondition> list = new List<RewardCondition>();
            DataSet ds = data.GetRewardConditionListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCondition reward_condition  = FillRewardCondition(dr);
                        list.Add(reward_condition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCondition> GetRewardConditionListByOrgId(
            string org_id
        )  {
            List<RewardCondition> list = new List<RewardCondition>();
            DataSet ds = data.GetRewardConditionListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCondition reward_condition  = FillRewardCondition(dr);
                        list.Add(reward_condition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCondition> GetRewardConditionListByChannelId(
            string channel_id
        )  {
            List<RewardCondition> list = new List<RewardCondition>();
            DataSet ds = data.GetRewardConditionListByChannelId(
                channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCondition reward_condition  = FillRewardCondition(dr);
                        list.Add(reward_condition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCondition> GetRewardConditionListByOrgIdByChannelId(
            string org_id
            , string channel_id
        )  {
            List<RewardCondition> list = new List<RewardCondition>();
            DataSet ds = data.GetRewardConditionListByOrgIdByChannelId(
                org_id
                , channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCondition reward_condition  = FillRewardCondition(dr);
                        list.Add(reward_condition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCondition> GetRewardConditionListByOrgIdByChannelIdByRewardId(
            string org_id
            , string channel_id
            , string reward_id
        )  {
            List<RewardCondition> list = new List<RewardCondition>();
            DataSet ds = data.GetRewardConditionListByOrgIdByChannelIdByRewardId(
                org_id
                , channel_id
                , reward_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCondition reward_condition  = FillRewardCondition(dr);
                        list.Add(reward_condition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCondition> GetRewardConditionListByRewardId(
            string reward_id
        )  {
            List<RewardCondition> list = new List<RewardCondition>();
            DataSet ds = data.GetRewardConditionListByRewardId(
                reward_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCondition reward_condition  = FillRewardCondition(dr);
                        list.Add(reward_condition);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual RewardConditionType FillRewardConditionType(DataRow dr) {
            RewardConditionType obj = new RewardConditionType();

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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountRewardConditionType(
        )  {            
            return data.CountRewardConditionType(
            );
        }       
        public virtual int CountRewardConditionTypeByUuid(
            string uuid
        )  {            
            return data.CountRewardConditionTypeByUuid(
                uuid
            );
        }       
        public virtual int CountRewardConditionTypeByCode(
            string code
        )  {            
            return data.CountRewardConditionTypeByCode(
                code
            );
        }       
        public virtual int CountRewardConditionTypeByName(
            string name
        )  {            
            return data.CountRewardConditionTypeByName(
                name
            );
        }       
        public virtual int CountRewardConditionTypeByType(
            string type
        )  {            
            return data.CountRewardConditionTypeByType(
                type
            );
        }       
        public virtual RewardConditionTypeResult BrowseRewardConditionTypeListByFilter(SearchFilter obj)  {
            RewardConditionTypeResult result = new RewardConditionTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseRewardConditionTypeListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardConditionType reward_condition_type  = FillRewardConditionType(dr);
                        result.data.Add(reward_condition_type);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetRewardConditionTypeByUuid(string set_type, RewardConditionType obj)  {            
            return data.SetRewardConditionTypeByUuid(set_type, obj);
        }    
        public virtual bool DelRewardConditionTypeByUuid(
            string uuid
        )  {
            return data.DelRewardConditionTypeByUuid(
                uuid
            );
        }                     
        public virtual List<RewardConditionType> GetRewardConditionTypeListByUuid(
            string uuid
        )  {
            List<RewardConditionType> list = new List<RewardConditionType>();
            DataSet ds = data.GetRewardConditionTypeListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardConditionType reward_condition_type  = FillRewardConditionType(dr);
                        list.Add(reward_condition_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardConditionType> GetRewardConditionTypeListByCode(
            string code
        )  {
            List<RewardConditionType> list = new List<RewardConditionType>();
            DataSet ds = data.GetRewardConditionTypeListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardConditionType reward_condition_type  = FillRewardConditionType(dr);
                        list.Add(reward_condition_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardConditionType> GetRewardConditionTypeListByName(
            string name
        )  {
            List<RewardConditionType> list = new List<RewardConditionType>();
            DataSet ds = data.GetRewardConditionTypeListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardConditionType reward_condition_type  = FillRewardConditionType(dr);
                        list.Add(reward_condition_type);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardConditionType> GetRewardConditionTypeListByType(
            string type
        )  {
            List<RewardConditionType> list = new List<RewardConditionType>();
            DataSet ds = data.GetRewardConditionTypeListByType(
                type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardConditionType reward_condition_type  = FillRewardConditionType(dr);
                        list.Add(reward_condition_type);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual Question FillQuestion(DataRow dr) {
            Question obj = new Question();

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
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["choices"] != null)                    
                    obj.choices = dataType.FillDataString(dr, "choices");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                

            return obj;
        }
        
        public virtual int CountQuestion(
        )  {            
            return data.CountQuestion(
            );
        }       
        public virtual int CountQuestionByUuid(
            string uuid
        )  {            
            return data.CountQuestionByUuid(
                uuid
            );
        }       
        public virtual int CountQuestionByCode(
            string code
        )  {            
            return data.CountQuestionByCode(
                code
            );
        }       
        public virtual int CountQuestionByName(
            string name
        )  {            
            return data.CountQuestionByName(
                name
            );
        }       
        public virtual int CountQuestionByChannelId(
            string channel_id
        )  {            
            return data.CountQuestionByChannelId(
                channel_id
            );
        }       
        public virtual int CountQuestionByOrgId(
            string org_id
        )  {            
            return data.CountQuestionByOrgId(
                org_id
            );
        }       
        public virtual int CountQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return data.CountQuestionByChannelIdByOrgId(
                channel_id
                , org_id
            );
        }       
        public virtual int CountQuestionByChannelIdByCode(
            string channel_id
            , string code
        )  {            
            return data.CountQuestionByChannelIdByCode(
                channel_id
                , code
            );
        }       
        public virtual QuestionResult BrowseQuestionListByFilter(SearchFilter obj)  {
            QuestionResult result = new QuestionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseQuestionListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        result.data.Add(question);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetQuestionByUuid(string set_type, Question obj)  {            
            return data.SetQuestionByUuid(set_type, obj);
        }    
        public virtual bool SetQuestionByChannelIdByCode(string set_type, Question obj)  {            
            return data.SetQuestionByChannelIdByCode(set_type, obj);
        }    
        public virtual bool DelQuestionByUuid(
            string uuid
        )  {
            return data.DelQuestionByUuid(
                uuid
            );
        }                     
        public virtual bool DelQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            return data.DelQuestionByChannelIdByOrgId(
                channel_id
                , org_id
            );
        }                     
        public virtual List<Question> GetQuestionListByUuid(
            string uuid
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListByCode(
            string code
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListByName(
            string name
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListByType(
            string type
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByType(
                type
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListByChannelId(
            string channel_id
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByChannelId(
                channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListByOrgId(
            string org_id
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByChannelIdByOrgId(
                channel_id
                , org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<Question> GetQuestionListByChannelIdByCode(
            string channel_id
            , string code
        )  {
            List<Question> list = new List<Question>();
            DataSet ds = data.GetQuestionListByChannelIdByCode(
                channel_id
                , code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       Question question  = FillQuestion(dr);
                        list.Add(question);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileQuestion FillProfileQuestion(DataRow dr) {
            ProfileQuestion obj = new ProfileQuestion();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["answer"] != null)                    
                    obj.answer = dataType.FillDataString(dr, "answer");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["question_id"] != null)                    
                    obj.question_id = dataType.FillDataString(dr, "question_id");                

            return obj;
        }
        
        public virtual int CountProfileQuestion(
        )  {            
            return data.CountProfileQuestion(
            );
        }       
        public virtual int CountProfileQuestionByUuid(
            string uuid
        )  {            
            return data.CountProfileQuestionByUuid(
                uuid
            );
        }       
        public virtual int CountProfileQuestionByChannelId(
            string channel_id
        )  {            
            return data.CountProfileQuestionByChannelId(
                channel_id
            );
        }       
        public virtual int CountProfileQuestionByOrgId(
            string org_id
        )  {            
            return data.CountProfileQuestionByOrgId(
                org_id
            );
        }       
        public virtual int CountProfileQuestionByProfileId(
            string profile_id
        )  {            
            return data.CountProfileQuestionByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileQuestionByQuestionId(
            string question_id
        )  {            
            return data.CountProfileQuestionByQuestionId(
                question_id
            );
        }       
        public virtual int CountProfileQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return data.CountProfileQuestionByChannelIdByOrgId(
                channel_id
                , org_id
            );
        }       
        public virtual int CountProfileQuestionByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {            
            return data.CountProfileQuestionByChannelIdByProfileId(
                channel_id
                , profile_id
            );
        }       
        public virtual int CountProfileQuestionByQuestionIdByProfileId(
            string question_id
            , string profile_id
        )  {            
            return data.CountProfileQuestionByQuestionIdByProfileId(
                question_id
                , profile_id
            );
        }       
        public virtual ProfileQuestionResult BrowseProfileQuestionListByFilter(SearchFilter obj)  {
            ProfileQuestionResult result = new ProfileQuestionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileQuestionListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        result.data.Add(profile_question);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileQuestionByUuid(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionByUuid(set_type, obj);
        }    
        public virtual bool SetProfileQuestionByChannelIdByProfileId(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionByChannelIdByProfileId(set_type, obj);
        }    
        public virtual bool SetProfileQuestionByQuestionIdByProfileId(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionByQuestionIdByProfileId(set_type, obj);
        }    
        public virtual bool SetProfileQuestionByChannelIdByQuestionIdByProfileId(string set_type, ProfileQuestion obj)  {            
            return data.SetProfileQuestionByChannelIdByQuestionIdByProfileId(set_type, obj);
        }    
        public virtual bool DelProfileQuestionByUuid(
            string uuid
        )  {
            return data.DelProfileQuestionByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileQuestionByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            return data.DelProfileQuestionByChannelIdByOrgId(
                channel_id
                , org_id
            );
        }                     
        public virtual List<ProfileQuestion> GetProfileQuestionListByUuid(
            string uuid
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByChannelId(
            string channel_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByChannelId(
                channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByOrgId(
            string org_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByProfileId(
            string profile_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByQuestionId(
            string question_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByQuestionId(
                question_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByChannelIdByOrgId(
                channel_id
                , org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByChannelIdByProfileId(
                channel_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileQuestion> GetProfileQuestionListByQuestionIdByProfileId(
            string question_id
            , string profile_id
        )  {
            List<ProfileQuestion> list = new List<ProfileQuestion>();
            DataSet ds = data.GetProfileQuestionListByQuestionIdByProfileId(
                question_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileQuestion profile_question  = FillProfileQuestion(dr);
                        list.Add(profile_question);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileChannel FillProfileChannel(DataRow dr) {
            ProfileChannel obj = new ProfileChannel();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                

            return obj;
        }
        
        public virtual int CountProfileChannel(
        )  {            
            return data.CountProfileChannel(
            );
        }       
        public virtual int CountProfileChannelByUuid(
            string uuid
        )  {            
            return data.CountProfileChannelByUuid(
                uuid
            );
        }       
        public virtual int CountProfileChannelByChannelId(
            string channel_id
        )  {            
            return data.CountProfileChannelByChannelId(
                channel_id
            );
        }       
        public virtual int CountProfileChannelByProfileId(
            string profile_id
        )  {            
            return data.CountProfileChannelByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileChannelByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {            
            return data.CountProfileChannelByChannelIdByProfileId(
                channel_id
                , profile_id
            );
        }       
        public virtual ProfileChannelResult BrowseProfileChannelListByFilter(SearchFilter obj)  {
            ProfileChannelResult result = new ProfileChannelResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileChannelListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        result.data.Add(profile_channel);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileChannelByUuid(string set_type, ProfileChannel obj)  {            
            return data.SetProfileChannelByUuid(set_type, obj);
        }    
        public virtual bool SetProfileChannelByChannelIdByProfileId(string set_type, ProfileChannel obj)  {            
            return data.SetProfileChannelByChannelIdByProfileId(set_type, obj);
        }    
        public virtual bool DelProfileChannelByUuid(
            string uuid
        )  {
            return data.DelProfileChannelByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileChannelByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            return data.DelProfileChannelByChannelIdByProfileId(
                channel_id
                , profile_id
            );
        }                     
        public virtual List<ProfileChannel> GetProfileChannelListByUuid(
            string uuid
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        list.Add(profile_channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileChannel> GetProfileChannelListByChannelId(
            string channel_id
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListByChannelId(
                channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        list.Add(profile_channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileChannel> GetProfileChannelListByProfileId(
            string profile_id
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        list.Add(profile_channel);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileChannel> GetProfileChannelListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<ProfileChannel> list = new List<ProfileChannel>();
            DataSet ds = data.GetProfileChannelListByChannelIdByProfileId(
                channel_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileChannel profile_channel  = FillProfileChannel(dr);
                        list.Add(profile_channel);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual ProfileRewardPoints FillProfileRewardPoints(DataRow dr) {
            ProfileRewardPoints obj = new ProfileRewardPoints();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["profile_id"] != null)                    
                    obj.profile_id = dataType.FillDataString(dr, "profile_id");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["org_id"] != null)                    
                    obj.org_id = dataType.FillDataString(dr, "org_id");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["points"] != null)                    
                    obj.points = dataType.FillDataInt(dr, "points");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                

            return obj;
        }
        
        public virtual int CountProfileRewardPoints(
        )  {            
            return data.CountProfileRewardPoints(
            );
        }       
        public virtual int CountProfileRewardPointsByUuid(
            string uuid
        )  {            
            return data.CountProfileRewardPointsByUuid(
                uuid
            );
        }       
        public virtual int CountProfileRewardPointsByChannelId(
            string channel_id
        )  {            
            return data.CountProfileRewardPointsByChannelId(
                channel_id
            );
        }       
        public virtual int CountProfileRewardPointsByOrgId(
            string org_id
        )  {            
            return data.CountProfileRewardPointsByOrgId(
                org_id
            );
        }       
        public virtual int CountProfileRewardPointsByProfileId(
            string profile_id
        )  {            
            return data.CountProfileRewardPointsByProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileRewardPointsByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {            
            return data.CountProfileRewardPointsByChannelIdByOrgId(
                channel_id
                , org_id
            );
        }       
        public virtual int CountProfileRewardPointsByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {            
            return data.CountProfileRewardPointsByChannelIdByProfileId(
                channel_id
                , profile_id
            );
        }       
        public virtual ProfileRewardPointsResult BrowseProfileRewardPointsListByFilter(SearchFilter obj)  {
            ProfileRewardPointsResult result = new ProfileRewardPointsResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileRewardPointsListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileRewardPoints profile_reward_points  = FillProfileRewardPoints(dr);
                        result.data.Add(profile_reward_points);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetProfileRewardPointsByUuid(string set_type, ProfileRewardPoints obj)  {            
            return data.SetProfileRewardPointsByUuid(set_type, obj);
        }    
        public virtual bool DelProfileRewardPointsByUuid(
            string uuid
        )  {
            return data.DelProfileRewardPointsByUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileRewardPointsByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            return data.DelProfileRewardPointsByChannelIdByOrgId(
                channel_id
                , org_id
            );
        }                     
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByUuid(
            string uuid
        )  {
            List<ProfileRewardPoints> list = new List<ProfileRewardPoints>();
            DataSet ds = data.GetProfileRewardPointsListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileRewardPoints profile_reward_points  = FillProfileRewardPoints(dr);
                        list.Add(profile_reward_points);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByChannelId(
            string channel_id
        )  {
            List<ProfileRewardPoints> list = new List<ProfileRewardPoints>();
            DataSet ds = data.GetProfileRewardPointsListByChannelId(
                channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileRewardPoints profile_reward_points  = FillProfileRewardPoints(dr);
                        list.Add(profile_reward_points);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByOrgId(
            string org_id
        )  {
            List<ProfileRewardPoints> list = new List<ProfileRewardPoints>();
            DataSet ds = data.GetProfileRewardPointsListByOrgId(
                org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileRewardPoints profile_reward_points  = FillProfileRewardPoints(dr);
                        list.Add(profile_reward_points);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByProfileId(
            string profile_id
        )  {
            List<ProfileRewardPoints> list = new List<ProfileRewardPoints>();
            DataSet ds = data.GetProfileRewardPointsListByProfileId(
                profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileRewardPoints profile_reward_points  = FillProfileRewardPoints(dr);
                        list.Add(profile_reward_points);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByChannelIdByOrgId(
            string channel_id
            , string org_id
        )  {
            List<ProfileRewardPoints> list = new List<ProfileRewardPoints>();
            DataSet ds = data.GetProfileRewardPointsListByChannelIdByOrgId(
                channel_id
                , org_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileRewardPoints profile_reward_points  = FillProfileRewardPoints(dr);
                        list.Add(profile_reward_points);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<ProfileRewardPoints> GetProfileRewardPointsListByChannelIdByProfileId(
            string channel_id
            , string profile_id
        )  {
            List<ProfileRewardPoints> list = new List<ProfileRewardPoints>();
            DataSet ds = data.GetProfileRewardPointsListByChannelIdByProfileId(
                channel_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       ProfileRewardPoints profile_reward_points  = FillProfileRewardPoints(dr);
                        list.Add(profile_reward_points);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual RewardCompetition FillRewardCompetition(DataRow dr) {
            RewardCompetition obj = new RewardCompetition();

            if (dr["sort"] != null)                    
                    obj.sort = dataType.FillDataInt(dr, "sort");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["date_end"] != null)                    
                    obj.date_end = dataType.FillDataDateTime(dr, "date_end");                
            if (dr["results"] != null)                    
                    obj.results = dataType.FillDataString(dr, "results");                
            if (dr["visible"] != null)                    
                    obj.visible = dataType.FillDataBool(dr, "visible");                
            if (dr["display_name"] != null)                    
                    obj.display_name = dataType.FillDataString(dr, "display_name");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["date_start"] != null)                    
                    obj.date_start = dataType.FillDataDateTime(dr, "date_start");                
            if (dr["winners"] != null)                    
                    obj.winners = dataType.FillDataString(dr, "winners");                
            if (dr["template"] != null)                    
                    obj.template = dataType.FillDataString(dr, "template");                
            if (dr["type"] != null)                    
                    obj.type = dataType.FillDataString(dr, "type");                
            if (dr["trigger_data"] != null)                    
                    obj.trigger_data = dataType.FillDataString(dr, "trigger_data");                
            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["description"] != null)                    
                    obj.description = dataType.FillDataString(dr, "description");                
            if (dr["completed"] != null)                    
                    obj.completed = dataType.FillDataBool(dr, "completed");                
            if (dr["template_url"] != null)                    
                    obj.template_url = dataType.FillDataString(dr, "template_url");                
            if (dr["active"] != null)                    
                    obj.active = dataType.FillDataBool(dr, "active");                
            if (dr["path"] != null)                    
                    obj.path = dataType.FillDataString(dr, "path");                
            if (dr["data"] != null)                    
                    obj.data = dataType.FillDataString(dr, "data");                
            if (dr["name"] != null)                    
                    obj.name = dataType.FillDataString(dr, "name");                
            if (dr["date_modified"] != null)                    
                    obj.date_modified = dataType.FillDataDateTime(dr, "date_modified");                
            if (dr["fulfilled"] != null)                    
                    obj.fulfilled = dataType.FillDataBool(dr, "fulfilled");                
            if (dr["channel_id"] != null)                    
                    obj.channel_id = dataType.FillDataString(dr, "channel_id");                
            if (dr["date_created"] != null)                    
                    obj.date_created = dataType.FillDataDateTime(dr, "date_created");                

            return obj;
        }
        
        public virtual int CountRewardCompetitionByUuid(
            string uuid
        )  {            
            return data.CountRewardCompetitionByUuid(
                uuid
            );
        }       
        public virtual int CountRewardCompetitionByCode(
            string code
        )  {            
            return data.CountRewardCompetitionByCode(
                code
            );
        }       
        public virtual int CountRewardCompetitionByName(
            string name
        )  {            
            return data.CountRewardCompetitionByName(
                name
            );
        }       
        public virtual int CountRewardCompetitionByPath(
            string path
        )  {            
            return data.CountRewardCompetitionByPath(
                path
            );
        }       
        public virtual int CountRewardCompetitionByChannelId(
            string channel_id
        )  {            
            return data.CountRewardCompetitionByChannelId(
                channel_id
            );
        }       
        public virtual int CountRewardCompetitionByChannelIdByCompleted(
            string channel_id
            , bool completed
        )  {            
            return data.CountRewardCompetitionByChannelIdByCompleted(
                channel_id
                , completed
            );
        }       
        public virtual RewardCompetitionResult BrowseRewardCompetitionListByFilter(SearchFilter obj)  {
            RewardCompetitionResult result = new RewardCompetitionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseRewardCompetitionListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCompetition reward_competition  = FillRewardCompetition(dr);
                        result.data.Add(reward_competition);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetRewardCompetitionByUuid(string set_type, RewardCompetition obj)  {            
            return data.SetRewardCompetitionByUuid(set_type, obj);
        }    
        public virtual bool DelRewardCompetitionByUuid(
            string uuid
        )  {
            return data.DelRewardCompetitionByUuid(
                uuid
            );
        }                     
        public virtual bool DelRewardCompetitionByCode(
            string code
        )  {
            return data.DelRewardCompetitionByCode(
                code
            );
        }                     
        public virtual bool DelRewardCompetitionByPathByChannelId(
            string path
            , string channel_id
        )  {
            return data.DelRewardCompetitionByPathByChannelId(
                path
                , channel_id
            );
        }                     
        public virtual bool DelRewardCompetitionByPath(
            string path
        )  {
            return data.DelRewardCompetitionByPath(
                path
            );
        }                     
        public virtual bool DelRewardCompetitionByChannelIdByPath(
            string channel_id
            , string path
        )  {
            return data.DelRewardCompetitionByChannelIdByPath(
                channel_id
                , path
            );
        }                     
        public virtual List<RewardCompetition> GetRewardCompetitionListByUuid(
            string uuid
        )  {
            List<RewardCompetition> list = new List<RewardCompetition>();
            DataSet ds = data.GetRewardCompetitionListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCompetition reward_competition  = FillRewardCompetition(dr);
                        list.Add(reward_competition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCompetition> GetRewardCompetitionListByCode(
            string code
        )  {
            List<RewardCompetition> list = new List<RewardCompetition>();
            DataSet ds = data.GetRewardCompetitionListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCompetition reward_competition  = FillRewardCompetition(dr);
                        list.Add(reward_competition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCompetition> GetRewardCompetitionListByName(
            string name
        )  {
            List<RewardCompetition> list = new List<RewardCompetition>();
            DataSet ds = data.GetRewardCompetitionListByName(
                name
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCompetition reward_competition  = FillRewardCompetition(dr);
                        list.Add(reward_competition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCompetition> GetRewardCompetitionListByPath(
            string path
        )  {
            List<RewardCompetition> list = new List<RewardCompetition>();
            DataSet ds = data.GetRewardCompetitionListByPath(
                path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCompetition reward_competition  = FillRewardCompetition(dr);
                        list.Add(reward_competition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCompetition> GetRewardCompetitionListByChannelId(
            string channel_id
        )  {
            List<RewardCompetition> list = new List<RewardCompetition>();
            DataSet ds = data.GetRewardCompetitionListByChannelId(
                channel_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCompetition reward_competition  = FillRewardCompetition(dr);
                        list.Add(reward_competition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCompetition> GetRewardCompetitionListByChannelIdByCompleted(
            string channel_id
            , bool completed
        )  {
            List<RewardCompetition> list = new List<RewardCompetition>();
            DataSet ds = data.GetRewardCompetitionListByChannelIdByCompleted(
                channel_id
                , completed
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCompetition reward_competition  = FillRewardCompetition(dr);
                        list.Add(reward_competition);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<RewardCompetition> GetRewardCompetitionListByChannelIdByPath(
            string channel_id
            , string path
        )  {
            List<RewardCompetition> list = new List<RewardCompetition>();
            DataSet ds = data.GetRewardCompetitionListByChannelIdByPath(
                channel_id
                , path
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       RewardCompetition reward_competition  = FillRewardCompetition(dr);
                        list.Add(reward_competition);
                    }
                }
            }
            return list;
        }
        
        
    }
}






