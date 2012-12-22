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
        public virtual bool DelProfileGameByUuid(
            string uuid
        )  {
            return data.DelProfileGameByUuid(
                uuid
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
        
        
        
        public virtual GameStatisticLeaderboard FillGameStatisticLeaderboard(DataRow dr) {
            GameStatisticLeaderboard obj = new GameStatisticLeaderboard();

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
        
        public virtual int CountGameStatisticLeaderboard(
        )  {            
            return data.CountGameStatisticLeaderboard(
            );
        }       
        public virtual int CountGameStatisticLeaderboardByUuid(
            string uuid
        )  {            
            return data.CountGameStatisticLeaderboardByUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticLeaderboardByGameId(
            string game_id
        )  {            
            return data.CountGameStatisticLeaderboardByGameId(
                game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardByCode(
            string code
        )  {            
            return data.CountGameStatisticLeaderboardByCode(
                code
            );
        }       
        public virtual int CountGameStatisticLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return data.CountGameStatisticLeaderboardByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return data.CountGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }       
        public virtual int CountGameStatisticLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameStatisticLeaderboardResult BrowseGameStatisticLeaderboardListByFilter(SearchFilter obj)  {
            GameStatisticLeaderboardResult result = new GameStatisticLeaderboardResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticLeaderboardListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        result.data.Add(game_statistic_leaderboard);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameStatisticLeaderboardByUuid(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardByCode(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByCode(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardByCodeByGameId(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByCodeByGameId(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardByCodeByGameIdByProfileId(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByCodeByGameIdByProfileId(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(set_type, obj);
        }    
        public virtual bool DelGameStatisticLeaderboardByUuid(
            string uuid
        )  {
            return data.DelGameStatisticLeaderboardByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardByCode(
            string code
        )  {
            return data.DelGameStatisticLeaderboardByCode(
                code
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return data.DelGameStatisticLeaderboardByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return data.DelGameStatisticLeaderboardByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardList(
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByUuid(
            string uuid
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByGameId(
            string game_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByCode(
            string code
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboard game_statistic_leaderboard  = FillGameStatisticLeaderboard(dr);
                        list.Add(game_statistic_leaderboard);
                    }
                }
            }
            return list;
        }
        
        
        
        public virtual GameStatisticLeaderboardRollup FillGameStatisticLeaderboardRollup(DataRow dr) {
            GameStatisticLeaderboardRollup obj = new GameStatisticLeaderboardRollup();

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
        
        public virtual int CountGameStatisticLeaderboardRollup(
        )  {            
            return data.CountGameStatisticLeaderboardRollup(
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupByUuid(
            string uuid
        )  {            
            return data.CountGameStatisticLeaderboardRollupByUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupByGameId(
            string game_id
        )  {            
            return data.CountGameStatisticLeaderboardRollupByGameId(
                game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupByCode(
            string code
        )  {            
            return data.CountGameStatisticLeaderboardRollupByCode(
                code
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardRollupByCodeByGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return data.CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return data.CountGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardRollupByProfileIdByGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameStatisticLeaderboardRollupResult BrowseGameStatisticLeaderboardRollupListByFilter(SearchFilter obj)  {
            GameStatisticLeaderboardRollupResult result = new GameStatisticLeaderboardRollupResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticLeaderboardRollupListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardRollup game_statistic_leaderboard_rollup  = FillGameStatisticLeaderboardRollup(dr);
                        result.data.Add(game_statistic_leaderboard_rollup);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameStatisticLeaderboardRollupByUuid(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupByUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardRollupByCode(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupByCode(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameId(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupByCodeByGameId(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(set_type, obj);
        }    
        public virtual bool DelGameStatisticLeaderboardRollupByUuid(
            string uuid
        )  {
            return data.DelGameStatisticLeaderboardRollupByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardRollupByCode(
            string code
        )  {
            return data.DelGameStatisticLeaderboardRollupByCode(
                code
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardRollupByCodeByGameId(
            string code
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardRollupByCodeByGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return data.DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return data.DelGameStatisticLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardRollupByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardRollupByProfileIdByGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupList(
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardRollup game_statistic_leaderboard_rollup  = FillGameStatisticLeaderboardRollup(dr);
                        list.Add(game_statistic_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByUuid(
            string uuid
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardRollup game_statistic_leaderboard_rollup  = FillGameStatisticLeaderboardRollup(dr);
                        list.Add(game_statistic_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByGameId(
            string game_id
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListByGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardRollup game_statistic_leaderboard_rollup  = FillGameStatisticLeaderboardRollup(dr);
                        list.Add(game_statistic_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByCode(
            string code
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListByCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardRollup game_statistic_leaderboard_rollup  = FillGameStatisticLeaderboardRollup(dr);
                        list.Add(game_statistic_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByCodeByGameId(
            string code
            , string game_id
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListByCodeByGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardRollup game_statistic_leaderboard_rollup  = FillGameStatisticLeaderboardRollup(dr);
                        list.Add(game_statistic_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileId(
                code
                , game_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardRollup game_statistic_leaderboard_rollup  = FillGameStatisticLeaderboardRollup(dr);
                        list.Add(game_statistic_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardRollup game_statistic_leaderboard_rollup  = FillGameStatisticLeaderboardRollup(dr);
                        list.Add(game_statistic_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
            string profile_id
            , string game_id
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListByProfileIdByGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardRollup game_statistic_leaderboard_rollup  = FillGameStatisticLeaderboardRollup(dr);
                        list.Add(game_statistic_leaderboard_rollup);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListByProfileIdByGameIdByTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardRollup game_statistic_leaderboard_rollup  = FillGameStatisticLeaderboardRollup(dr);
                        list.Add(game_statistic_leaderboard_rollup);
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
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataFloat(dr, "timestamp");                
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
        
        
        
        public virtual GameProfileStatisticTimestamp FillGameProfileStatisticTimestamp(DataRow dr) {
            GameProfileStatisticTimestamp obj = new GameProfileStatisticTimestamp();

            if (dr["status"] != null)                    
                    obj.status = dataType.FillDataString(dr, "status");                
            if (dr["code"] != null)                    
                    obj.code = dataType.FillDataString(dr, "code");                
            if (dr["uuid"] != null)                    
                    obj.uuid = dataType.FillDataString(dr, "uuid");                
            if (dr["timestamp"] != null)                    
                    obj.timestamp = dataType.FillDataDateTime(dr, "timestamp");                
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

            return obj;
        }
        
        public virtual int CountGameProfileStatisticTimestamp(
        )  {            
            return data.CountGameProfileStatisticTimestamp(
            );
        }       
        public virtual int CountGameProfileStatisticTimestampByUuid(
            string uuid
        )  {            
            return data.CountGameProfileStatisticTimestampByUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileStatisticTimestampByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileStatisticTimestampByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {            
            return data.CountGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameProfileStatisticTimestampResult BrowseGameProfileStatisticTimestampListByFilter(SearchFilter obj)  {
            GameProfileStatisticTimestampResult result = new GameProfileStatisticTimestampResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileStatisticTimestampListByFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticTimestamp game_profile_statistic_timestamp  = FillGameProfileStatisticTimestamp(dr);
                        result.data.Add(game_profile_statistic_timestamp);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameProfileStatisticTimestampByUuid(string set_type, GameProfileStatisticTimestamp obj)  {            
            return data.SetGameProfileStatisticTimestampByUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticTimestampByCodeByProfileIdByGameId(string set_type, GameProfileStatisticTimestamp obj)  {            
            return data.SetGameProfileStatisticTimestampByCodeByProfileIdByGameId(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(string set_type, GameProfileStatisticTimestamp obj)  {            
            return data.SetGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(set_type, obj);
        }    
        public virtual bool DelGameProfileStatisticTimestampByUuid(
            string uuid
        )  {
            return data.DelGameProfileStatisticTimestampByUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileStatisticTimestampByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return data.DelGameProfileStatisticTimestampByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
        }                     
        public virtual bool DelGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {
            return data.DelGameProfileStatisticTimestampByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
        }                     
        public virtual List<GameProfileStatisticTimestamp> GetGameProfileStatisticTimestampListByUuid(
            string uuid
        )  {
            List<GameProfileStatisticTimestamp> list = new List<GameProfileStatisticTimestamp>();
            DataSet ds = data.GetGameProfileStatisticTimestampListByUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticTimestamp game_profile_statistic_timestamp  = FillGameProfileStatisticTimestamp(dr);
                        list.Add(game_profile_statistic_timestamp);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatisticTimestamp> GetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<GameProfileStatisticTimestamp> list = new List<GameProfileStatisticTimestamp>();
            DataSet ds = data.GetGameProfileStatisticTimestampListByCodeByProfileIdByGameId(
                code
                , profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticTimestamp game_profile_statistic_timestamp  = FillGameProfileStatisticTimestamp(dr);
                        list.Add(game_profile_statistic_timestamp);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameProfileStatisticTimestamp> GetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
            string code
            , string profile_id
            , string game_id
            , DateTime timestamp
        )  {
            List<GameProfileStatisticTimestamp> list = new List<GameProfileStatisticTimestamp>();
            DataSet ds = data.GetGameProfileStatisticTimestampListByCodeByProfileIdByGameIdByTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameProfileStatisticTimestamp game_profile_statistic_timestamp  = FillGameProfileStatisticTimestamp(dr);
                        list.Add(game_profile_statistic_timestamp);
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
        
        
    }
}






