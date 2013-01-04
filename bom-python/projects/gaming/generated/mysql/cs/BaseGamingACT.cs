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
        public virtual int CountGameUuid(
            string uuid
        )  {            
            return data.CountGameUuid(
                uuid
            );
        }       
        public virtual int CountGameCode(
            string code
        )  {            
            return data.CountGameCode(
                code
            );
        }       
        public virtual int CountGameName(
            string name
        )  {            
            return data.CountGameName(
                name
            );
        }       
        public virtual int CountGameOrgId(
            string org_id
        )  {            
            return data.CountGameOrgId(
                org_id
            );
        }       
        public virtual int CountGameAppId(
            string app_id
        )  {            
            return data.CountGameAppId(
                app_id
            );
        }       
        public virtual int CountGameOrgIdAppId(
            string org_id
            , string app_id
        )  {            
            return data.CountGameOrgIdAppId(
                org_id
                , app_id
            );
        }       
        public virtual GameResult BrowseGameListFilter(SearchFilter obj)  {
            GameResult result = new GameResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameListFilter(obj);
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
        public virtual bool SetGameUuid(string set_type, Game obj)  {            
            return data.SetGameUuid(set_type, obj);
        }    
        public virtual bool SetGameCode(string set_type, Game obj)  {            
            return data.SetGameCode(set_type, obj);
        }    
        public virtual bool SetGameName(string set_type, Game obj)  {            
            return data.SetGameName(set_type, obj);
        }    
        public virtual bool SetGameOrgId(string set_type, Game obj)  {            
            return data.SetGameOrgId(set_type, obj);
        }    
        public virtual bool SetGameAppId(string set_type, Game obj)  {            
            return data.SetGameAppId(set_type, obj);
        }    
        public virtual bool SetGameOrgIdAppId(string set_type, Game obj)  {            
            return data.SetGameOrgIdAppId(set_type, obj);
        }    
        public virtual bool DelGameUuid(
            string uuid
        )  {
            return data.DelGameUuid(
                uuid
            );
        }                     
        public virtual bool DelGameCode(
            string code
        )  {
            return data.DelGameCode(
                code
            );
        }                     
        public virtual bool DelGameName(
            string name
        )  {
            return data.DelGameName(
                name
            );
        }                     
        public virtual bool DelGameOrgId(
            string org_id
        )  {
            return data.DelGameOrgId(
                org_id
            );
        }                     
        public virtual bool DelGameAppId(
            string app_id
        )  {
            return data.DelGameAppId(
                app_id
            );
        }                     
        public virtual bool DelGameOrgIdAppId(
            string org_id
            , string app_id
        )  {
            return data.DelGameOrgIdAppId(
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
        
        
        public virtual List<Game> GetGameListUuid(
            string uuid
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListUuid(
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
        
        
        public virtual List<Game> GetGameListCode(
            string code
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListCode(
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
        
        
        public virtual List<Game> GetGameListName(
            string name
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListName(
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
        
        
        public virtual List<Game> GetGameListOrgId(
            string org_id
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListOrgId(
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
        
        
        public virtual List<Game> GetGameListAppId(
            string app_id
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListAppId(
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
        
        
        public virtual List<Game> GetGameListOrgIdAppId(
            string org_id
            , string app_id
        )  {
            List<Game> list = new List<Game>();
            DataSet ds = data.GetGameListOrgIdAppId(
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
        public virtual int CountGameCategoryUuid(
            string uuid
        )  {            
            return data.CountGameCategoryUuid(
                uuid
            );
        }       
        public virtual int CountGameCategoryCode(
            string code
        )  {            
            return data.CountGameCategoryCode(
                code
            );
        }       
        public virtual int CountGameCategoryName(
            string name
        )  {            
            return data.CountGameCategoryName(
                name
            );
        }       
        public virtual int CountGameCategoryOrgId(
            string org_id
        )  {            
            return data.CountGameCategoryOrgId(
                org_id
            );
        }       
        public virtual int CountGameCategoryTypeId(
            string type_id
        )  {            
            return data.CountGameCategoryTypeId(
                type_id
            );
        }       
        public virtual int CountGameCategoryOrgIdTypeId(
            string org_id
            , string type_id
        )  {            
            return data.CountGameCategoryOrgIdTypeId(
                org_id
                , type_id
            );
        }       
        public virtual GameCategoryResult BrowseGameCategoryListFilter(SearchFilter obj)  {
            GameCategoryResult result = new GameCategoryResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameCategoryListFilter(obj);
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
        public virtual bool SetGameCategoryUuid(string set_type, GameCategory obj)  {            
            return data.SetGameCategoryUuid(set_type, obj);
        }    
        public virtual bool DelGameCategoryUuid(
            string uuid
        )  {
            return data.DelGameCategoryUuid(
                uuid
            );
        }                     
        public virtual bool DelGameCategoryCodeOrgId(
            string code
            , string org_id
        )  {
            return data.DelGameCategoryCodeOrgId(
                code
                , org_id
            );
        }                     
        public virtual bool DelGameCategoryCodeOrgIdTypeId(
            string code
            , string org_id
            , string type_id
        )  {
            return data.DelGameCategoryCodeOrgIdTypeId(
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
        
        
        public virtual List<GameCategory> GetGameCategoryListUuid(
            string uuid
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListUuid(
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
        
        
        public virtual List<GameCategory> GetGameCategoryListCode(
            string code
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListCode(
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
        
        
        public virtual List<GameCategory> GetGameCategoryListName(
            string name
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListName(
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
        
        
        public virtual List<GameCategory> GetGameCategoryListOrgId(
            string org_id
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListOrgId(
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
        
        
        public virtual List<GameCategory> GetGameCategoryListTypeId(
            string type_id
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListTypeId(
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
        
        
        public virtual List<GameCategory> GetGameCategoryListOrgIdTypeId(
            string org_id
            , string type_id
        )  {
            List<GameCategory> list = new List<GameCategory>();
            DataSet ds = data.GetGameCategoryListOrgIdTypeId(
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
        public virtual int CountGameCategoryTreeUuid(
            string uuid
        )  {            
            return data.CountGameCategoryTreeUuid(
                uuid
            );
        }       
        public virtual int CountGameCategoryTreeParentId(
            string parent_id
        )  {            
            return data.CountGameCategoryTreeParentId(
                parent_id
            );
        }       
        public virtual int CountGameCategoryTreeCategoryId(
            string category_id
        )  {            
            return data.CountGameCategoryTreeCategoryId(
                category_id
            );
        }       
        public virtual int CountGameCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {            
            return data.CountGameCategoryTreeParentIdCategoryId(
                parent_id
                , category_id
            );
        }       
        public virtual GameCategoryTreeResult BrowseGameCategoryTreeListFilter(SearchFilter obj)  {
            GameCategoryTreeResult result = new GameCategoryTreeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameCategoryTreeListFilter(obj);
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
        public virtual bool SetGameCategoryTreeUuid(string set_type, GameCategoryTree obj)  {            
            return data.SetGameCategoryTreeUuid(set_type, obj);
        }    
        public virtual bool DelGameCategoryTreeUuid(
            string uuid
        )  {
            return data.DelGameCategoryTreeUuid(
                uuid
            );
        }                     
        public virtual bool DelGameCategoryTreeParentId(
            string parent_id
        )  {
            return data.DelGameCategoryTreeParentId(
                parent_id
            );
        }                     
        public virtual bool DelGameCategoryTreeCategoryId(
            string category_id
        )  {
            return data.DelGameCategoryTreeCategoryId(
                category_id
            );
        }                     
        public virtual bool DelGameCategoryTreeParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            return data.DelGameCategoryTreeParentIdCategoryId(
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
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListUuid(
            string uuid
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListUuid(
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
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListParentId(
            string parent_id
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListParentId(
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
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListCategoryId(
            string category_id
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListCategoryId(
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
        
        
        public virtual List<GameCategoryTree> GetGameCategoryTreeListParentIdCategoryId(
            string parent_id
            , string category_id
        )  {
            List<GameCategoryTree> list = new List<GameCategoryTree>();
            DataSet ds = data.GetGameCategoryTreeListParentIdCategoryId(
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
        public virtual int CountGameCategoryAssocUuid(
            string uuid
        )  {            
            return data.CountGameCategoryAssocUuid(
                uuid
            );
        }       
        public virtual int CountGameCategoryAssocGameId(
            string game_id
        )  {            
            return data.CountGameCategoryAssocGameId(
                game_id
            );
        }       
        public virtual int CountGameCategoryAssocCategoryId(
            string category_id
        )  {            
            return data.CountGameCategoryAssocCategoryId(
                category_id
            );
        }       
        public virtual int CountGameCategoryAssocGameIdCategoryId(
            string game_id
            , string category_id
        )  {            
            return data.CountGameCategoryAssocGameIdCategoryId(
                game_id
                , category_id
            );
        }       
        public virtual GameCategoryAssocResult BrowseGameCategoryAssocListFilter(SearchFilter obj)  {
            GameCategoryAssocResult result = new GameCategoryAssocResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameCategoryAssocListFilter(obj);
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
        public virtual bool SetGameCategoryAssocUuid(string set_type, GameCategoryAssoc obj)  {            
            return data.SetGameCategoryAssocUuid(set_type, obj);
        }    
        public virtual bool DelGameCategoryAssocUuid(
            string uuid
        )  {
            return data.DelGameCategoryAssocUuid(
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
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListUuid(
            string uuid
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListUuid(
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
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListGameId(
            string game_id
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListGameId(
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
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListCategoryId(
            string category_id
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListCategoryId(
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
        
        
        public virtual List<GameCategoryAssoc> GetGameCategoryAssocListGameIdCategoryId(
            string game_id
            , string category_id
        )  {
            List<GameCategoryAssoc> list = new List<GameCategoryAssoc>();
            DataSet ds = data.GetGameCategoryAssocListGameIdCategoryId(
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
        public virtual int CountGameTypeUuid(
            string uuid
        )  {            
            return data.CountGameTypeUuid(
                uuid
            );
        }       
        public virtual int CountGameTypeCode(
            string code
        )  {            
            return data.CountGameTypeCode(
                code
            );
        }       
        public virtual int CountGameTypeName(
            string name
        )  {            
            return data.CountGameTypeName(
                name
            );
        }       
        public virtual GameTypeResult BrowseGameTypeListFilter(SearchFilter obj)  {
            GameTypeResult result = new GameTypeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameTypeListFilter(obj);
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
        public virtual bool SetGameTypeUuid(string set_type, GameType obj)  {            
            return data.SetGameTypeUuid(set_type, obj);
        }    
        public virtual bool DelGameTypeUuid(
            string uuid
        )  {
            return data.DelGameTypeUuid(
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
        
        
        public virtual List<GameType> GetGameTypeListUuid(
            string uuid
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeListUuid(
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
        
        
        public virtual List<GameType> GetGameTypeListCode(
            string code
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeListCode(
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
        
        
        public virtual List<GameType> GetGameTypeListName(
            string name
        )  {
            List<GameType> list = new List<GameType>();
            DataSet ds = data.GetGameTypeListName(
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
        public virtual int CountProfileGameUuid(
            string uuid
        )  {            
            return data.CountProfileGameUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameGameId(
            string game_id
        )  {            
            return data.CountProfileGameGameId(
                game_id
            );
        }       
        public virtual int CountProfileGameProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountProfileGameProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual ProfileGameResult BrowseProfileGameListFilter(SearchFilter obj)  {
            ProfileGameResult result = new ProfileGameResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameListFilter(obj);
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
        public virtual bool SetProfileGameUuid(string set_type, ProfileGame obj)  {            
            return data.SetProfileGameUuid(set_type, obj);
        }    
        public virtual bool DelProfileGameUuid(
            string uuid
        )  {
            return data.DelProfileGameUuid(
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
        
        
        public virtual List<ProfileGame> GetProfileGameListUuid(
            string uuid
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListUuid(
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
        
        
        public virtual List<ProfileGame> GetProfileGameListGameId(
            string game_id
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListGameId(
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
        
        
        public virtual List<ProfileGame> GetProfileGameListProfileId(
            string profile_id
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListProfileId(
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
        
        
        public virtual List<ProfileGame> GetProfileGameListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<ProfileGame> list = new List<ProfileGame>();
            DataSet ds = data.GetProfileGameListProfileIdGameId(
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
        public virtual int CountGameNetworkUuid(
            string uuid
        )  {            
            return data.CountGameNetworkUuid(
                uuid
            );
        }       
        public virtual int CountGameNetworkCode(
            string code
        )  {            
            return data.CountGameNetworkCode(
                code
            );
        }       
        public virtual int CountGameNetworkUuidType(
            string uuid
            , string type
        )  {            
            return data.CountGameNetworkUuidType(
                uuid
                , type
            );
        }       
        public virtual GameNetworkResult BrowseGameNetworkListFilter(SearchFilter obj)  {
            GameNetworkResult result = new GameNetworkResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameNetworkListFilter(obj);
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
        public virtual bool SetGameNetworkUuid(string set_type, GameNetwork obj)  {            
            return data.SetGameNetworkUuid(set_type, obj);
        }    
        public virtual bool SetGameNetworkCode(string set_type, GameNetwork obj)  {            
            return data.SetGameNetworkCode(set_type, obj);
        }    
        public virtual bool DelGameNetworkUuid(
            string uuid
        )  {
            return data.DelGameNetworkUuid(
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
        
        
        public virtual List<GameNetwork> GetGameNetworkListUuid(
            string uuid
        )  {
            List<GameNetwork> list = new List<GameNetwork>();
            DataSet ds = data.GetGameNetworkListUuid(
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
        
        
        public virtual List<GameNetwork> GetGameNetworkListCode(
            string code
        )  {
            List<GameNetwork> list = new List<GameNetwork>();
            DataSet ds = data.GetGameNetworkListCode(
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
        
        
        public virtual List<GameNetwork> GetGameNetworkListUuidType(
            string uuid
            , string type
        )  {
            List<GameNetwork> list = new List<GameNetwork>();
            DataSet ds = data.GetGameNetworkListUuidType(
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
        public virtual int CountGameNetworkAuthUuid(
            string uuid
        )  {            
            return data.CountGameNetworkAuthUuid(
                uuid
            );
        }       
        public virtual int CountGameNetworkAuthGameIdGameNetworkId(
            string game_id
            , string game_network_id
        )  {            
            return data.CountGameNetworkAuthGameIdGameNetworkId(
                game_id
                , game_network_id
            );
        }       
        public virtual GameNetworkAuthResult BrowseGameNetworkAuthListFilter(SearchFilter obj)  {
            GameNetworkAuthResult result = new GameNetworkAuthResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameNetworkAuthListFilter(obj);
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
        public virtual bool SetGameNetworkAuthUuid(string set_type, GameNetworkAuth obj)  {            
            return data.SetGameNetworkAuthUuid(set_type, obj);
        }    
        public virtual bool SetGameNetworkAuthGameIdGameNetworkId(string set_type, GameNetworkAuth obj)  {            
            return data.SetGameNetworkAuthGameIdGameNetworkId(set_type, obj);
        }    
        public virtual bool DelGameNetworkAuthUuid(
            string uuid
        )  {
            return data.DelGameNetworkAuthUuid(
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
        
        
        public virtual List<GameNetworkAuth> GetGameNetworkAuthListUuid(
            string uuid
        )  {
            List<GameNetworkAuth> list = new List<GameNetworkAuth>();
            DataSet ds = data.GetGameNetworkAuthListUuid(
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
        
        
        public virtual List<GameNetworkAuth> GetGameNetworkAuthListGameIdGameNetworkId(
            string game_id
            , string game_network_id
        )  {
            List<GameNetworkAuth> list = new List<GameNetworkAuth>();
            DataSet ds = data.GetGameNetworkAuthListGameIdGameNetworkId(
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
        public virtual int CountProfileGameNetworkUuid(
            string uuid
        )  {            
            return data.CountProfileGameNetworkUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameNetworkGameId(
            string game_id
        )  {            
            return data.CountProfileGameNetworkGameId(
                game_id
            );
        }       
        public virtual int CountProfileGameNetworkProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameNetworkProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameNetworkProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountProfileGameNetworkProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual int CountProfileGameNetworkProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountProfileGameNetworkProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual int CountProfileGameNetworkProfileIdGameIdGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {            
            return data.CountProfileGameNetworkProfileIdGameIdGameNetworkId(
                profile_id
                , game_id
                , game_network_id
            );
        }       
        public virtual int CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {            
            return data.CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
                network_username
                , game_id
                , game_network_id
            );
        }       
        public virtual ProfileGameNetworkResult BrowseProfileGameNetworkListFilter(SearchFilter obj)  {
            ProfileGameNetworkResult result = new ProfileGameNetworkResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameNetworkListFilter(obj);
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
        public virtual bool SetProfileGameNetworkUuid(string set_type, ProfileGameNetwork obj)  {            
            return data.SetProfileGameNetworkUuid(set_type, obj);
        }    
        public virtual bool SetProfileGameNetworkProfileIdGameId(string set_type, ProfileGameNetwork obj)  {            
            return data.SetProfileGameNetworkProfileIdGameId(set_type, obj);
        }    
        public virtual bool SetProfileGameNetworkProfileIdGameIdGameNetworkId(string set_type, ProfileGameNetwork obj)  {            
            return data.SetProfileGameNetworkProfileIdGameIdGameNetworkId(set_type, obj);
        }    
        public virtual bool SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(string set_type, ProfileGameNetwork obj)  {            
            return data.SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(set_type, obj);
        }    
        public virtual bool DelProfileGameNetworkUuid(
            string uuid
        )  {
            return data.DelProfileGameNetworkUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileGameNetworkProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelProfileGameNetworkProfileIdGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual bool DelProfileGameNetworkProfileIdGameIdGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            return data.DelProfileGameNetworkProfileIdGameIdGameNetworkId(
                profile_id
                , game_id
                , game_network_id
            );
        }                     
        public virtual bool DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            return data.DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
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
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListUuid(
            string uuid
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListUuid(
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
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListGameId(
            string game_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListGameId(
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
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListProfileId(
            string profile_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListProfileId(
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
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListProfileIdGameId(
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
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
            string profile_id
            , string game_id
            , string game_network_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
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
        
        
        public virtual List<ProfileGameNetwork> GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
            string network_username
            , string game_id
            , string game_network_id
        )  {
            List<ProfileGameNetwork> list = new List<ProfileGameNetwork>();
            DataSet ds = data.GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
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
        public virtual int CountProfileGameDataAttributeUuid(
            string uuid
        )  {            
            return data.CountProfileGameDataAttributeUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameDataAttributeProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameDataAttributeProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameDataAttributeProfileIdGameIdCode(
            string profile_id
            , string game_id
            , string code
        )  {            
            return data.CountProfileGameDataAttributeProfileIdGameIdCode(
                profile_id
                , game_id
                , code
            );
        }       
        public virtual ProfileGameDataAttributeResult BrowseProfileGameDataAttributeListFilter(SearchFilter obj)  {
            ProfileGameDataAttributeResult result = new ProfileGameDataAttributeResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameDataAttributeListFilter(obj);
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
        public virtual bool SetProfileGameDataAttributeUuid(string set_type, ProfileGameDataAttribute obj)  {            
            return data.SetProfileGameDataAttributeUuid(set_type, obj);
        }    
        public virtual bool SetProfileGameDataAttributeProfileId(string set_type, ProfileGameDataAttribute obj)  {            
            return data.SetProfileGameDataAttributeProfileId(set_type, obj);
        }    
        public virtual bool SetProfileGameDataAttributeProfileIdGameIdCode(string set_type, ProfileGameDataAttribute obj)  {            
            return data.SetProfileGameDataAttributeProfileIdGameIdCode(set_type, obj);
        }    
        public virtual bool DelProfileGameDataAttributeUuid(
            string uuid
        )  {
            return data.DelProfileGameDataAttributeUuid(
                uuid
            );
        }                     
        public virtual bool DelProfileGameDataAttributeProfileId(
            string profile_id
        )  {
            return data.DelProfileGameDataAttributeProfileId(
                profile_id
            );
        }                     
        public virtual bool DelProfileGameDataAttributeProfileIdGameIdCode(
            string profile_id
            , string game_id
            , string code
        )  {
            return data.DelProfileGameDataAttributeProfileIdGameIdCode(
                profile_id
                , game_id
                , code
            );
        }                     
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListUuid(
            string uuid
        )  {
            List<ProfileGameDataAttribute> list = new List<ProfileGameDataAttribute>();
            DataSet ds = data.GetProfileGameDataAttributeListUuid(
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
        
        
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListProfileId(
            string profile_id
        )  {
            List<ProfileGameDataAttribute> list = new List<ProfileGameDataAttribute>();
            DataSet ds = data.GetProfileGameDataAttributeListProfileId(
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
        
        
        public virtual List<ProfileGameDataAttribute> GetProfileGameDataAttributeListProfileIdGameIdCode(
            string profile_id
            , string game_id
            , string code
        )  {
            List<ProfileGameDataAttribute> list = new List<ProfileGameDataAttribute>();
            DataSet ds = data.GetProfileGameDataAttributeListProfileIdGameIdCode(
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
        public virtual int CountGameSessionUuid(
            string uuid
        )  {            
            return data.CountGameSessionUuid(
                uuid
            );
        }       
        public virtual int CountGameSessionGameId(
            string game_id
        )  {            
            return data.CountGameSessionGameId(
                game_id
            );
        }       
        public virtual int CountGameSessionProfileId(
            string profile_id
        )  {            
            return data.CountGameSessionProfileId(
                profile_id
            );
        }       
        public virtual int CountGameSessionProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameSessionProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameSessionResult BrowseGameSessionListFilter(SearchFilter obj)  {
            GameSessionResult result = new GameSessionResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameSessionListFilter(obj);
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
        public virtual bool SetGameSessionUuid(string set_type, GameSession obj)  {            
            return data.SetGameSessionUuid(set_type, obj);
        }    
        public virtual bool DelGameSessionUuid(
            string uuid
        )  {
            return data.DelGameSessionUuid(
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
        
        
        public virtual List<GameSession> GetGameSessionListUuid(
            string uuid
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListUuid(
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
        
        
        public virtual List<GameSession> GetGameSessionListGameId(
            string game_id
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListGameId(
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
        
        
        public virtual List<GameSession> GetGameSessionListProfileId(
            string profile_id
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListProfileId(
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
        
        
        public virtual List<GameSession> GetGameSessionListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<GameSession> list = new List<GameSession>();
            DataSet ds = data.GetGameSessionListProfileIdGameId(
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
        public virtual int CountGameSessionDataUuid(
            string uuid
        )  {            
            return data.CountGameSessionDataUuid(
                uuid
            );
        }       
        public virtual GameSessionDataResult BrowseGameSessionDataListFilter(SearchFilter obj)  {
            GameSessionDataResult result = new GameSessionDataResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameSessionDataListFilter(obj);
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
        public virtual bool SetGameSessionDataUuid(string set_type, GameSessionData obj)  {            
            return data.SetGameSessionDataUuid(set_type, obj);
        }    
        public virtual bool DelGameSessionDataUuid(
            string uuid
        )  {
            return data.DelGameSessionDataUuid(
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
        
        
        public virtual List<GameSessionData> GetGameSessionDataListUuid(
            string uuid
        )  {
            List<GameSessionData> list = new List<GameSessionData>();
            DataSet ds = data.GetGameSessionDataListUuid(
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
        public virtual int CountGameContentUuid(
            string uuid
        )  {            
            return data.CountGameContentUuid(
                uuid
            );
        }       
        public virtual int CountGameContentGameId(
            string game_id
        )  {            
            return data.CountGameContentGameId(
                game_id
            );
        }       
        public virtual int CountGameContentGameIdPath(
            string game_id
            , string path
        )  {            
            return data.CountGameContentGameIdPath(
                game_id
                , path
            );
        }       
        public virtual int CountGameContentGameIdPathVersion(
            string game_id
            , string path
            , string version
        )  {            
            return data.CountGameContentGameIdPathVersion(
                game_id
                , path
                , version
            );
        }       
        public virtual int CountGameContentGameIdPathVersionPlatformIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return data.CountGameContentGameIdPathVersionPlatformIncrement(
                game_id
                , path
                , version
                , platform
                , increment
            );
        }       
        public virtual GameContentResult BrowseGameContentListFilter(SearchFilter obj)  {
            GameContentResult result = new GameContentResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameContentListFilter(obj);
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
        public virtual bool SetGameContentUuid(string set_type, GameContent obj)  {            
            return data.SetGameContentUuid(set_type, obj);
        }    
        public virtual bool SetGameContentGameId(string set_type, GameContent obj)  {            
            return data.SetGameContentGameId(set_type, obj);
        }    
        public virtual bool SetGameContentGameIdPath(string set_type, GameContent obj)  {            
            return data.SetGameContentGameIdPath(set_type, obj);
        }    
        public virtual bool SetGameContentGameIdPathVersion(string set_type, GameContent obj)  {            
            return data.SetGameContentGameIdPathVersion(set_type, obj);
        }    
        public virtual bool SetGameContentGameIdPathVersionPlatformIncrement(string set_type, GameContent obj)  {            
            return data.SetGameContentGameIdPathVersionPlatformIncrement(set_type, obj);
        }    
        public virtual bool DelGameContentUuid(
            string uuid
        )  {
            return data.DelGameContentUuid(
                uuid
            );
        }                     
        public virtual bool DelGameContentGameId(
            string game_id
        )  {
            return data.DelGameContentGameId(
                game_id
            );
        }                     
        public virtual bool DelGameContentGameIdPath(
            string game_id
            , string path
        )  {
            return data.DelGameContentGameIdPath(
                game_id
                , path
            );
        }                     
        public virtual bool DelGameContentGameIdPathVersion(
            string game_id
            , string path
            , string version
        )  {
            return data.DelGameContentGameIdPathVersion(
                game_id
                , path
                , version
            );
        }                     
        public virtual bool DelGameContentGameIdPathVersionPlatformIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return data.DelGameContentGameIdPathVersionPlatformIncrement(
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
        
        
        public virtual List<GameContent> GetGameContentListUuid(
            string uuid
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListUuid(
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
        
        
        public virtual List<GameContent> GetGameContentListGameId(
            string game_id
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListGameId(
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
        
        
        public virtual List<GameContent> GetGameContentListGameIdPath(
            string game_id
            , string path
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListGameIdPath(
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
        
        
        public virtual List<GameContent> GetGameContentListGameIdPathVersion(
            string game_id
            , string path
            , string version
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListGameIdPathVersion(
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
        
        
        public virtual List<GameContent> GetGameContentListGameIdPathVersionPlatformIncrement(
            string game_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<GameContent> list = new List<GameContent>();
            DataSet ds = data.GetGameContentListGameIdPathVersionPlatformIncrement(
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
        public virtual int CountGameProfileContentUuid(
            string uuid
        )  {            
            return data.CountGameProfileContentUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileContentGameIdProfileId(
            string game_id
            , string profile_id
        )  {            
            return data.CountGameProfileContentGameIdProfileId(
                game_id
                , profile_id
            );
        }       
        public virtual int CountGameProfileContentGameIdUsername(
            string game_id
            , string username
        )  {            
            return data.CountGameProfileContentGameIdUsername(
                game_id
                , username
            );
        }       
        public virtual int CountGameProfileContentUsername(
            string username
        )  {            
            return data.CountGameProfileContentUsername(
                username
            );
        }       
        public virtual int CountGameProfileContentGameIdProfileIdPath(
            string game_id
            , string profile_id
            , string path
        )  {            
            return data.CountGameProfileContentGameIdProfileIdPath(
                game_id
                , profile_id
                , path
            );
        }       
        public virtual int CountGameProfileContentGameIdProfileIdPathVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {            
            return data.CountGameProfileContentGameIdProfileIdPathVersion(
                game_id
                , profile_id
                , path
                , version
            );
        }       
        public virtual int CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return data.CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            );
        }       
        public virtual int CountGameProfileContentGameIdUsernamePath(
            string game_id
            , string username
            , string path
        )  {            
            return data.CountGameProfileContentGameIdUsernamePath(
                game_id
                , username
                , path
            );
        }       
        public virtual int CountGameProfileContentGameIdUsernamePathVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {            
            return data.CountGameProfileContentGameIdUsernamePathVersion(
                game_id
                , username
                , path
                , version
            );
        }       
        public virtual int CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {            
            return data.CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
                game_id
                , username
                , path
                , version
                , platform
                , increment
            );
        }       
        public virtual GameProfileContentResult BrowseGameProfileContentListFilter(SearchFilter obj)  {
            GameProfileContentResult result = new GameProfileContentResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileContentListFilter(obj);
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
        public virtual bool SetGameProfileContentUuid(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileContentGameIdProfileId(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentGameIdProfileId(set_type, obj);
        }    
        public virtual bool SetGameProfileContentGameIdUsername(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentGameIdUsername(set_type, obj);
        }    
        public virtual bool SetGameProfileContentUsername(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentUsername(set_type, obj);
        }    
        public virtual bool SetGameProfileContentGameIdProfileIdPath(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentGameIdProfileIdPath(set_type, obj);
        }    
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersion(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentGameIdProfileIdPathVersion(set_type, obj);
        }    
        public virtual bool SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(set_type, obj);
        }    
        public virtual bool SetGameProfileContentGameIdUsernamePath(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentGameIdUsernamePath(set_type, obj);
        }    
        public virtual bool SetGameProfileContentGameIdUsernamePathVersion(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentGameIdUsernamePathVersion(set_type, obj);
        }    
        public virtual bool SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(string set_type, GameProfileContent obj)  {            
            return data.SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(set_type, obj);
        }    
        public virtual bool DelGameProfileContentUuid(
            string uuid
        )  {
            return data.DelGameProfileContentUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileContentGameIdProfileId(
            string game_id
            , string profile_id
        )  {
            return data.DelGameProfileContentGameIdProfileId(
                game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameProfileContentGameIdUsername(
            string game_id
            , string username
        )  {
            return data.DelGameProfileContentGameIdUsername(
                game_id
                , username
            );
        }                     
        public virtual bool DelGameProfileContentUsername(
            string username
        )  {
            return data.DelGameProfileContentUsername(
                username
            );
        }                     
        public virtual bool DelGameProfileContentGameIdProfileIdPath(
            string game_id
            , string profile_id
            , string path
        )  {
            return data.DelGameProfileContentGameIdProfileIdPath(
                game_id
                , profile_id
                , path
            );
        }                     
        public virtual bool DelGameProfileContentGameIdProfileIdPathVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            return data.DelGameProfileContentGameIdProfileIdPathVersion(
                game_id
                , profile_id
                , path
                , version
            );
        }                     
        public virtual bool DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return data.DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
                game_id
                , profile_id
                , path
                , version
                , platform
                , increment
            );
        }                     
        public virtual bool DelGameProfileContentGameIdUsernamePath(
            string game_id
            , string username
            , string path
        )  {
            return data.DelGameProfileContentGameIdUsernamePath(
                game_id
                , username
                , path
            );
        }                     
        public virtual bool DelGameProfileContentGameIdUsernamePathVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            return data.DelGameProfileContentGameIdUsernamePathVersion(
                game_id
                , username
                , path
                , version
            );
        }                     
        public virtual bool DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            return data.DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
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
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListUuid(
            string uuid
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListUuid(
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
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdProfileId(
            string game_id
            , string profile_id
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListGameIdProfileId(
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
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdUsername(
            string game_id
            , string username
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListGameIdUsername(
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
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListUsername(
            string username
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListUsername(
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
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdProfileIdPath(
            string game_id
            , string profile_id
            , string path
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListGameIdProfileIdPath(
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
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdProfileIdPathVersion(
            string game_id
            , string profile_id
            , string path
            , string version
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListGameIdProfileIdPathVersion(
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
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
            string game_id
            , string profile_id
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
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
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdUsernamePath(
            string game_id
            , string username
            , string path
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListGameIdUsernamePath(
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
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdUsernamePathVersion(
            string game_id
            , string username
            , string path
            , string version
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListGameIdUsernamePathVersion(
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
        
        
        public virtual List<GameProfileContent> GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
            string game_id
            , string username
            , string path
            , string version
            , string platform
            , int increment
        )  {
            List<GameProfileContent> list = new List<GameProfileContent>();
            DataSet ds = data.GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
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
        public virtual int CountGameAppUuid(
            string uuid
        )  {            
            return data.CountGameAppUuid(
                uuid
            );
        }       
        public virtual int CountGameAppGameId(
            string game_id
        )  {            
            return data.CountGameAppGameId(
                game_id
            );
        }       
        public virtual int CountGameAppAppId(
            string app_id
        )  {            
            return data.CountGameAppAppId(
                app_id
            );
        }       
        public virtual int CountGameAppGameIdAppId(
            string game_id
            , string app_id
        )  {            
            return data.CountGameAppGameIdAppId(
                game_id
                , app_id
            );
        }       
        public virtual GameAppResult BrowseGameAppListFilter(SearchFilter obj)  {
            GameAppResult result = new GameAppResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameAppListFilter(obj);
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
        public virtual bool SetGameAppUuid(string set_type, GameApp obj)  {            
            return data.SetGameAppUuid(set_type, obj);
        }    
        public virtual bool DelGameAppUuid(
            string uuid
        )  {
            return data.DelGameAppUuid(
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
        
        
        public virtual List<GameApp> GetGameAppListUuid(
            string uuid
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListUuid(
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
        
        
        public virtual List<GameApp> GetGameAppListGameId(
            string game_id
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListGameId(
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
        
        
        public virtual List<GameApp> GetGameAppListAppId(
            string app_id
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListAppId(
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
        
        
        public virtual List<GameApp> GetGameAppListGameIdAppId(
            string game_id
            , string app_id
        )  {
            List<GameApp> list = new List<GameApp>();
            DataSet ds = data.GetGameAppListGameIdAppId(
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
        public virtual int CountProfileGameLocationUuid(
            string uuid
        )  {            
            return data.CountProfileGameLocationUuid(
                uuid
            );
        }       
        public virtual int CountProfileGameLocationGameLocationId(
            string game_location_id
        )  {            
            return data.CountProfileGameLocationGameLocationId(
                game_location_id
            );
        }       
        public virtual int CountProfileGameLocationProfileId(
            string profile_id
        )  {            
            return data.CountProfileGameLocationProfileId(
                profile_id
            );
        }       
        public virtual int CountProfileGameLocationProfileIdGameLocationId(
            string profile_id
            , string game_location_id
        )  {            
            return data.CountProfileGameLocationProfileIdGameLocationId(
                profile_id
                , game_location_id
            );
        }       
        public virtual ProfileGameLocationResult BrowseProfileGameLocationListFilter(SearchFilter obj)  {
            ProfileGameLocationResult result = new ProfileGameLocationResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseProfileGameLocationListFilter(obj);
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
        public virtual bool SetProfileGameLocationUuid(string set_type, ProfileGameLocation obj)  {            
            return data.SetProfileGameLocationUuid(set_type, obj);
        }    
        public virtual bool DelProfileGameLocationUuid(
            string uuid
        )  {
            return data.DelProfileGameLocationUuid(
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
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListUuid(
            string uuid
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListUuid(
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
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListGameLocationId(
            string game_location_id
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListGameLocationId(
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
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListProfileId(
            string profile_id
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListProfileId(
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
        
        
        public virtual List<ProfileGameLocation> GetProfileGameLocationListProfileIdGameLocationId(
            string profile_id
            , string game_location_id
        )  {
            List<ProfileGameLocation> list = new List<ProfileGameLocation>();
            DataSet ds = data.GetProfileGameLocationListProfileIdGameLocationId(
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
        public virtual int CountGamePhotoUuid(
            string uuid
        )  {            
            return data.CountGamePhotoUuid(
                uuid
            );
        }       
        public virtual int CountGamePhotoExternalId(
            string external_id
        )  {            
            return data.CountGamePhotoExternalId(
                external_id
            );
        }       
        public virtual int CountGamePhotoUrl(
            string url
        )  {            
            return data.CountGamePhotoUrl(
                url
            );
        }       
        public virtual int CountGamePhotoUrlExternalId(
            string url
            , string external_id
        )  {            
            return data.CountGamePhotoUrlExternalId(
                url
                , external_id
            );
        }       
        public virtual int CountGamePhotoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return data.CountGamePhotoUuidExternalId(
                uuid
                , external_id
            );
        }       
        public virtual GamePhotoResult BrowseGamePhotoListFilter(SearchFilter obj)  {
            GamePhotoResult result = new GamePhotoResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGamePhotoListFilter(obj);
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
        public virtual bool SetGamePhotoUuid(string set_type, GamePhoto obj)  {            
            return data.SetGamePhotoUuid(set_type, obj);
        }    
        public virtual bool SetGamePhotoExternalId(string set_type, GamePhoto obj)  {            
            return data.SetGamePhotoExternalId(set_type, obj);
        }    
        public virtual bool SetGamePhotoUrl(string set_type, GamePhoto obj)  {            
            return data.SetGamePhotoUrl(set_type, obj);
        }    
        public virtual bool SetGamePhotoUrlExternalId(string set_type, GamePhoto obj)  {            
            return data.SetGamePhotoUrlExternalId(set_type, obj);
        }    
        public virtual bool SetGamePhotoUuidExternalId(string set_type, GamePhoto obj)  {            
            return data.SetGamePhotoUuidExternalId(set_type, obj);
        }    
        public virtual bool DelGamePhotoUuid(
            string uuid
        )  {
            return data.DelGamePhotoUuid(
                uuid
            );
        }                     
        public virtual bool DelGamePhotoExternalId(
            string external_id
        )  {
            return data.DelGamePhotoExternalId(
                external_id
            );
        }                     
        public virtual bool DelGamePhotoUrl(
            string url
        )  {
            return data.DelGamePhotoUrl(
                url
            );
        }                     
        public virtual bool DelGamePhotoUrlExternalId(
            string url
            , string external_id
        )  {
            return data.DelGamePhotoUrlExternalId(
                url
                , external_id
            );
        }                     
        public virtual bool DelGamePhotoUuidExternalId(
            string uuid
            , string external_id
        )  {
            return data.DelGamePhotoUuidExternalId(
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
        
        
        public virtual List<GamePhoto> GetGamePhotoListUuid(
            string uuid
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoListUuid(
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
        
        
        public virtual List<GamePhoto> GetGamePhotoListExternalId(
            string external_id
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoListExternalId(
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
        
        
        public virtual List<GamePhoto> GetGamePhotoListUrl(
            string url
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoListUrl(
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
        
        
        public virtual List<GamePhoto> GetGamePhotoListUrlExternalId(
            string url
            , string external_id
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoListUrlExternalId(
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
        
        
        public virtual List<GamePhoto> GetGamePhotoListUuidExternalId(
            string uuid
            , string external_id
        )  {
            List<GamePhoto> list = new List<GamePhoto>();
            DataSet ds = data.GetGamePhotoListUuidExternalId(
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
        public virtual int CountGameVideoUuid(
            string uuid
        )  {            
            return data.CountGameVideoUuid(
                uuid
            );
        }       
        public virtual int CountGameVideoExternalId(
            string external_id
        )  {            
            return data.CountGameVideoExternalId(
                external_id
            );
        }       
        public virtual int CountGameVideoUrl(
            string url
        )  {            
            return data.CountGameVideoUrl(
                url
            );
        }       
        public virtual int CountGameVideoUrlExternalId(
            string url
            , string external_id
        )  {            
            return data.CountGameVideoUrlExternalId(
                url
                , external_id
            );
        }       
        public virtual int CountGameVideoUuidExternalId(
            string uuid
            , string external_id
        )  {            
            return data.CountGameVideoUuidExternalId(
                uuid
                , external_id
            );
        }       
        public virtual GameVideoResult BrowseGameVideoListFilter(SearchFilter obj)  {
            GameVideoResult result = new GameVideoResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameVideoListFilter(obj);
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
        public virtual bool SetGameVideoUuid(string set_type, GameVideo obj)  {            
            return data.SetGameVideoUuid(set_type, obj);
        }    
        public virtual bool SetGameVideoExternalId(string set_type, GameVideo obj)  {            
            return data.SetGameVideoExternalId(set_type, obj);
        }    
        public virtual bool SetGameVideoUrl(string set_type, GameVideo obj)  {            
            return data.SetGameVideoUrl(set_type, obj);
        }    
        public virtual bool SetGameVideoUrlExternalId(string set_type, GameVideo obj)  {            
            return data.SetGameVideoUrlExternalId(set_type, obj);
        }    
        public virtual bool SetGameVideoUuidExternalId(string set_type, GameVideo obj)  {            
            return data.SetGameVideoUuidExternalId(set_type, obj);
        }    
        public virtual bool DelGameVideoUuid(
            string uuid
        )  {
            return data.DelGameVideoUuid(
                uuid
            );
        }                     
        public virtual bool DelGameVideoExternalId(
            string external_id
        )  {
            return data.DelGameVideoExternalId(
                external_id
            );
        }                     
        public virtual bool DelGameVideoUrl(
            string url
        )  {
            return data.DelGameVideoUrl(
                url
            );
        }                     
        public virtual bool DelGameVideoUrlExternalId(
            string url
            , string external_id
        )  {
            return data.DelGameVideoUrlExternalId(
                url
                , external_id
            );
        }                     
        public virtual bool DelGameVideoUuidExternalId(
            string uuid
            , string external_id
        )  {
            return data.DelGameVideoUuidExternalId(
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
        
        
        public virtual List<GameVideo> GetGameVideoListUuid(
            string uuid
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoListUuid(
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
        
        
        public virtual List<GameVideo> GetGameVideoListExternalId(
            string external_id
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoListExternalId(
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
        
        
        public virtual List<GameVideo> GetGameVideoListUrl(
            string url
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoListUrl(
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
        
        
        public virtual List<GameVideo> GetGameVideoListUrlExternalId(
            string url
            , string external_id
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoListUrlExternalId(
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
        
        
        public virtual List<GameVideo> GetGameVideoListUuidExternalId(
            string uuid
            , string external_id
        )  {
            List<GameVideo> list = new List<GameVideo>();
            DataSet ds = data.GetGameVideoListUuidExternalId(
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
        public virtual int CountGameRpgItemWeaponUuid(
            string uuid
        )  {            
            return data.CountGameRpgItemWeaponUuid(
                uuid
            );
        }       
        public virtual int CountGameRpgItemWeaponGameId(
            string game_id
        )  {            
            return data.CountGameRpgItemWeaponGameId(
                game_id
            );
        }       
        public virtual int CountGameRpgItemWeaponUrl(
            string url
        )  {            
            return data.CountGameRpgItemWeaponUrl(
                url
            );
        }       
        public virtual int CountGameRpgItemWeaponUrlGameId(
            string url
            , string game_id
        )  {            
            return data.CountGameRpgItemWeaponUrlGameId(
                url
                , game_id
            );
        }       
        public virtual int CountGameRpgItemWeaponUuidGameId(
            string uuid
            , string game_id
        )  {            
            return data.CountGameRpgItemWeaponUuidGameId(
                uuid
                , game_id
            );
        }       
        public virtual GameRpgItemWeaponResult BrowseGameRpgItemWeaponListFilter(SearchFilter obj)  {
            GameRpgItemWeaponResult result = new GameRpgItemWeaponResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameRpgItemWeaponListFilter(obj);
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
        public virtual bool SetGameRpgItemWeaponUuid(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponUuid(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponGameId(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponUrl(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponUrl(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponUrlGameId(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponUrlGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemWeaponUuidGameId(string set_type, GameRpgItemWeapon obj)  {            
            return data.SetGameRpgItemWeaponUuidGameId(set_type, obj);
        }    
        public virtual bool DelGameRpgItemWeaponUuid(
            string uuid
        )  {
            return data.DelGameRpgItemWeaponUuid(
                uuid
            );
        }                     
        public virtual bool DelGameRpgItemWeaponGameId(
            string game_id
        )  {
            return data.DelGameRpgItemWeaponGameId(
                game_id
            );
        }                     
        public virtual bool DelGameRpgItemWeaponUrl(
            string url
        )  {
            return data.DelGameRpgItemWeaponUrl(
                url
            );
        }                     
        public virtual bool DelGameRpgItemWeaponUrlGameId(
            string url
            , string game_id
        )  {
            return data.DelGameRpgItemWeaponUrlGameId(
                url
                , game_id
            );
        }                     
        public virtual bool DelGameRpgItemWeaponUuidGameId(
            string uuid
            , string game_id
        )  {
            return data.DelGameRpgItemWeaponUuidGameId(
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
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListUuid(
            string uuid
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListUuid(
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
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListGameId(
            string game_id
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListGameId(
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
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListUrl(
            string url
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListUrl(
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
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListUrlGameId(
            string url
            , string game_id
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListUrlGameId(
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
        
        
        public virtual List<GameRpgItemWeapon> GetGameRpgItemWeaponListUuidGameId(
            string uuid
            , string game_id
        )  {
            List<GameRpgItemWeapon> list = new List<GameRpgItemWeapon>();
            DataSet ds = data.GetGameRpgItemWeaponListUuidGameId(
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
        public virtual int CountGameRpgItemSkillUuid(
            string uuid
        )  {            
            return data.CountGameRpgItemSkillUuid(
                uuid
            );
        }       
        public virtual int CountGameRpgItemSkillGameId(
            string game_id
        )  {            
            return data.CountGameRpgItemSkillGameId(
                game_id
            );
        }       
        public virtual int CountGameRpgItemSkillUrl(
            string url
        )  {            
            return data.CountGameRpgItemSkillUrl(
                url
            );
        }       
        public virtual int CountGameRpgItemSkillUrlGameId(
            string url
            , string game_id
        )  {            
            return data.CountGameRpgItemSkillUrlGameId(
                url
                , game_id
            );
        }       
        public virtual int CountGameRpgItemSkillUuidGameId(
            string uuid
            , string game_id
        )  {            
            return data.CountGameRpgItemSkillUuidGameId(
                uuid
                , game_id
            );
        }       
        public virtual GameRpgItemSkillResult BrowseGameRpgItemSkillListFilter(SearchFilter obj)  {
            GameRpgItemSkillResult result = new GameRpgItemSkillResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameRpgItemSkillListFilter(obj);
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
        public virtual bool SetGameRpgItemSkillUuid(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillUuid(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillGameId(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillUrl(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillUrl(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillUrlGameId(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillUrlGameId(set_type, obj);
        }    
        public virtual bool SetGameRpgItemSkillUuidGameId(string set_type, GameRpgItemSkill obj)  {            
            return data.SetGameRpgItemSkillUuidGameId(set_type, obj);
        }    
        public virtual bool DelGameRpgItemSkillUuid(
            string uuid
        )  {
            return data.DelGameRpgItemSkillUuid(
                uuid
            );
        }                     
        public virtual bool DelGameRpgItemSkillGameId(
            string game_id
        )  {
            return data.DelGameRpgItemSkillGameId(
                game_id
            );
        }                     
        public virtual bool DelGameRpgItemSkillUrl(
            string url
        )  {
            return data.DelGameRpgItemSkillUrl(
                url
            );
        }                     
        public virtual bool DelGameRpgItemSkillUrlGameId(
            string url
            , string game_id
        )  {
            return data.DelGameRpgItemSkillUrlGameId(
                url
                , game_id
            );
        }                     
        public virtual bool DelGameRpgItemSkillUuidGameId(
            string uuid
            , string game_id
        )  {
            return data.DelGameRpgItemSkillUuidGameId(
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
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListUuid(
            string uuid
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListUuid(
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
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListGameId(
            string game_id
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListGameId(
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
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListUrl(
            string url
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListUrl(
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
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListUrlGameId(
            string url
            , string game_id
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListUrlGameId(
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
        
        
        public virtual List<GameRpgItemSkill> GetGameRpgItemSkillListUuidGameId(
            string uuid
            , string game_id
        )  {
            List<GameRpgItemSkill> list = new List<GameRpgItemSkill>();
            DataSet ds = data.GetGameRpgItemSkillListUuidGameId(
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
        public virtual int CountGameProductUuid(
            string uuid
        )  {            
            return data.CountGameProductUuid(
                uuid
            );
        }       
        public virtual int CountGameProductGameId(
            string game_id
        )  {            
            return data.CountGameProductGameId(
                game_id
            );
        }       
        public virtual int CountGameProductUrl(
            string url
        )  {            
            return data.CountGameProductUrl(
                url
            );
        }       
        public virtual int CountGameProductUrlGameId(
            string url
            , string game_id
        )  {            
            return data.CountGameProductUrlGameId(
                url
                , game_id
            );
        }       
        public virtual int CountGameProductUuidGameId(
            string uuid
            , string game_id
        )  {            
            return data.CountGameProductUuidGameId(
                uuid
                , game_id
            );
        }       
        public virtual GameProductResult BrowseGameProductListFilter(SearchFilter obj)  {
            GameProductResult result = new GameProductResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProductListFilter(obj);
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
        public virtual bool SetGameProductUuid(string set_type, GameProduct obj)  {            
            return data.SetGameProductUuid(set_type, obj);
        }    
        public virtual bool SetGameProductGameId(string set_type, GameProduct obj)  {            
            return data.SetGameProductGameId(set_type, obj);
        }    
        public virtual bool SetGameProductUrl(string set_type, GameProduct obj)  {            
            return data.SetGameProductUrl(set_type, obj);
        }    
        public virtual bool SetGameProductUrlGameId(string set_type, GameProduct obj)  {            
            return data.SetGameProductUrlGameId(set_type, obj);
        }    
        public virtual bool SetGameProductUuidGameId(string set_type, GameProduct obj)  {            
            return data.SetGameProductUuidGameId(set_type, obj);
        }    
        public virtual bool DelGameProductUuid(
            string uuid
        )  {
            return data.DelGameProductUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProductGameId(
            string game_id
        )  {
            return data.DelGameProductGameId(
                game_id
            );
        }                     
        public virtual bool DelGameProductUrl(
            string url
        )  {
            return data.DelGameProductUrl(
                url
            );
        }                     
        public virtual bool DelGameProductUrlGameId(
            string url
            , string game_id
        )  {
            return data.DelGameProductUrlGameId(
                url
                , game_id
            );
        }                     
        public virtual bool DelGameProductUuidGameId(
            string uuid
            , string game_id
        )  {
            return data.DelGameProductUuidGameId(
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
        
        
        public virtual List<GameProduct> GetGameProductListUuid(
            string uuid
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListUuid(
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
        
        
        public virtual List<GameProduct> GetGameProductListGameId(
            string game_id
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListGameId(
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
        
        
        public virtual List<GameProduct> GetGameProductListUrl(
            string url
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListUrl(
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
        
        
        public virtual List<GameProduct> GetGameProductListUrlGameId(
            string url
            , string game_id
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListUrlGameId(
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
        
        
        public virtual List<GameProduct> GetGameProductListUuidGameId(
            string uuid
            , string game_id
        )  {
            List<GameProduct> list = new List<GameProduct>();
            DataSet ds = data.GetGameProductListUuidGameId(
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
        public virtual int CountGameStatisticLeaderboardUuid(
            string uuid
        )  {            
            return data.CountGameStatisticLeaderboardUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticLeaderboardGameId(
            string game_id
        )  {            
            return data.CountGameStatisticLeaderboardGameId(
                game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardCode(
            string code
        )  {            
            return data.CountGameStatisticLeaderboardCode(
                code
            );
        }       
        public virtual int CountGameStatisticLeaderboardCodeGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardCodeGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return data.CountGameStatisticLeaderboardCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return data.CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }       
        public virtual int CountGameStatisticLeaderboardProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameStatisticLeaderboardResult BrowseGameStatisticLeaderboardListFilter(SearchFilter obj)  {
            GameStatisticLeaderboardResult result = new GameStatisticLeaderboardResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticLeaderboardListFilter(obj);
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
        public virtual bool SetGameStatisticLeaderboardUuid(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardCode(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardCode(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardCodeGameId(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardCodeGameId(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileId(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardCodeGameIdProfileId(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboard obj)  {            
            return data.SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(set_type, obj);
        }    
        public virtual bool DelGameStatisticLeaderboardUuid(
            string uuid
        )  {
            return data.DelGameStatisticLeaderboardUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardCode(
            string code
        )  {
            return data.DelGameStatisticLeaderboardCode(
                code
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardCodeGameId(
            string code
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardCodeGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return data.DelGameStatisticLeaderboardCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return data.DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardProfileIdGameId(
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
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListUuid(
            string uuid
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListUuid(
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
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListGameId(
            string game_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListGameId(
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
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListCode(
            string code
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListCode(
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
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListCodeGameId(
            string code
            , string game_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListCodeGameId(
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
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListCodeGameIdProfileId(
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
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
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
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListProfileIdGameId(
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
        
        
        public virtual List<GameStatisticLeaderboard> GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboard> list = new List<GameStatisticLeaderboard>();
            DataSet ds = data.GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
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
        
        
        
        public virtual GameStatisticLeaderboardItem FillGameStatisticLeaderboardItem(DataRow dr) {
            GameStatisticLeaderboardItem obj = new GameStatisticLeaderboardItem();

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
        
        public virtual int CountGameStatisticLeaderboardItem(
        )  {            
            return data.CountGameStatisticLeaderboardItem(
            );
        }       
        public virtual int CountGameStatisticLeaderboardItemUuid(
            string uuid
        )  {            
            return data.CountGameStatisticLeaderboardItemUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticLeaderboardItemGameId(
            string game_id
        )  {            
            return data.CountGameStatisticLeaderboardItemGameId(
                game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardItemCode(
            string code
        )  {            
            return data.CountGameStatisticLeaderboardItemCode(
                code
            );
        }       
        public virtual int CountGameStatisticLeaderboardItemCodeGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardItemCodeGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardItemCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return data.CountGameStatisticLeaderboardItemCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return data.CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }       
        public virtual int CountGameStatisticLeaderboardItemProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardItemProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameStatisticLeaderboardItemResult BrowseGameStatisticLeaderboardItemListFilter(SearchFilter obj)  {
            GameStatisticLeaderboardItemResult result = new GameStatisticLeaderboardItemResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticLeaderboardItemListFilter(obj);
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardItem game_statistic_leaderboard_item  = FillGameStatisticLeaderboardItem(dr);
                        result.data.Add(game_statistic_leaderboard_item);
                        if (dr["total_rows"] != null)                    
                            result.total_rows = dataType.FillDataInt(dr, "total_rows");                     
                    }
                }
            }
            return result;
        }
        public virtual bool SetGameStatisticLeaderboardItemUuid(string set_type, GameStatisticLeaderboardItem obj)  {            
            return data.SetGameStatisticLeaderboardItemUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboardItem obj)  {            
            return data.SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardItemCode(string set_type, GameStatisticLeaderboardItem obj)  {            
            return data.SetGameStatisticLeaderboardItemCode(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameId(string set_type, GameStatisticLeaderboardItem obj)  {            
            return data.SetGameStatisticLeaderboardItemCodeGameId(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileId(string set_type, GameStatisticLeaderboardItem obj)  {            
            return data.SetGameStatisticLeaderboardItemCodeGameIdProfileId(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboardItem obj)  {            
            return data.SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(set_type, obj);
        }    
        public virtual bool DelGameStatisticLeaderboardItemUuid(
            string uuid
        )  {
            return data.DelGameStatisticLeaderboardItemUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardItemCode(
            string code
        )  {
            return data.DelGameStatisticLeaderboardItemCode(
                code
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardItemCodeGameId(
            string code
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardItemCodeGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardItemCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return data.DelGameStatisticLeaderboardItemCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return data.DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardItemProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardItemProfileIdGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemList(
        )  {
            List<GameStatisticLeaderboardItem> list = new List<GameStatisticLeaderboardItem>();
            DataSet ds = data.GetGameStatisticLeaderboardItemList(
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardItem game_statistic_leaderboard_item  = FillGameStatisticLeaderboardItem(dr);
                        list.Add(game_statistic_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListUuid(
            string uuid
        )  {
            List<GameStatisticLeaderboardItem> list = new List<GameStatisticLeaderboardItem>();
            DataSet ds = data.GetGameStatisticLeaderboardItemListUuid(
                uuid
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardItem game_statistic_leaderboard_item  = FillGameStatisticLeaderboardItem(dr);
                        list.Add(game_statistic_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListGameId(
            string game_id
        )  {
            List<GameStatisticLeaderboardItem> list = new List<GameStatisticLeaderboardItem>();
            DataSet ds = data.GetGameStatisticLeaderboardItemListGameId(
                game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardItem game_statistic_leaderboard_item  = FillGameStatisticLeaderboardItem(dr);
                        list.Add(game_statistic_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListCode(
            string code
        )  {
            List<GameStatisticLeaderboardItem> list = new List<GameStatisticLeaderboardItem>();
            DataSet ds = data.GetGameStatisticLeaderboardItemListCode(
                code
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardItem game_statistic_leaderboard_item  = FillGameStatisticLeaderboardItem(dr);
                        list.Add(game_statistic_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListCodeGameId(
            string code
            , string game_id
        )  {
            List<GameStatisticLeaderboardItem> list = new List<GameStatisticLeaderboardItem>();
            DataSet ds = data.GetGameStatisticLeaderboardItemListCodeGameId(
                code
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardItem game_statistic_leaderboard_item  = FillGameStatisticLeaderboardItem(dr);
                        list.Add(game_statistic_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<GameStatisticLeaderboardItem> list = new List<GameStatisticLeaderboardItem>();
            DataSet ds = data.GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardItem game_statistic_leaderboard_item  = FillGameStatisticLeaderboardItem(dr);
                        list.Add(game_statistic_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboardItem> list = new List<GameStatisticLeaderboardItem>();
            DataSet ds = data.GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardItem game_statistic_leaderboard_item  = FillGameStatisticLeaderboardItem(dr);
                        list.Add(game_statistic_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<GameStatisticLeaderboardItem> list = new List<GameStatisticLeaderboardItem>();
            DataSet ds = data.GetGameStatisticLeaderboardItemListProfileIdGameId(
                profile_id
                , game_id
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardItem game_statistic_leaderboard_item  = FillGameStatisticLeaderboardItem(dr);
                        list.Add(game_statistic_leaderboard_item);
                    }
                }
            }
            return list;
        }
        
        
        public virtual List<GameStatisticLeaderboardItem> GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboardItem> list = new List<GameStatisticLeaderboardItem>();
            DataSet ds = data.GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
                profile_id
                , game_id
                , timestamp
            );
            if(ds != null) {
                foreach(DataTable dt in ds.Tables){
                    foreach(DataRow dr in dt.Rows){
                       GameStatisticLeaderboardItem game_statistic_leaderboard_item  = FillGameStatisticLeaderboardItem(dr);
                        list.Add(game_statistic_leaderboard_item);
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
        public virtual int CountGameStatisticLeaderboardRollupUuid(
            string uuid
        )  {            
            return data.CountGameStatisticLeaderboardRollupUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupGameId(
            string game_id
        )  {            
            return data.CountGameStatisticLeaderboardRollupGameId(
                game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupCode(
            string code
        )  {            
            return data.CountGameStatisticLeaderboardRollupCode(
                code
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupCodeGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardRollupCodeGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {            
            return data.CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {            
            return data.CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }       
        public virtual int CountGameStatisticLeaderboardRollupProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameStatisticLeaderboardRollupProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameStatisticLeaderboardRollupResult BrowseGameStatisticLeaderboardRollupListFilter(SearchFilter obj)  {
            GameStatisticLeaderboardRollupResult result = new GameStatisticLeaderboardRollupResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticLeaderboardRollupListFilter(obj);
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
        public virtual bool SetGameStatisticLeaderboardRollupUuid(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardRollupCode(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupCode(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameId(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupCodeGameId(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileId(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupCodeGameIdProfileId(set_type, obj);
        }    
        public virtual bool SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(string set_type, GameStatisticLeaderboardRollup obj)  {            
            return data.SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(set_type, obj);
        }    
        public virtual bool DelGameStatisticLeaderboardRollupUuid(
            string uuid
        )  {
            return data.DelGameStatisticLeaderboardRollupUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardRollupCode(
            string code
        )  {
            return data.DelGameStatisticLeaderboardRollupCode(
                code
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardRollupCodeGameId(
            string code
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardRollupCodeGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            return data.DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
                code
                , game_id
                , profile_id
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            return data.DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
                code
                , game_id
                , profile_id
                , timestamp
            );
        }                     
        public virtual bool DelGameStatisticLeaderboardRollupProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameStatisticLeaderboardRollupProfileIdGameId(
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
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListUuid(
            string uuid
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListUuid(
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
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListGameId(
            string game_id
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListGameId(
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
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListCode(
            string code
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListCode(
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
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListCodeGameId(
            string code
            , string game_id
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListCodeGameId(
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
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
            string code
            , string game_id
            , string profile_id
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
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
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
            string code
            , string game_id
            , string profile_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
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
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListProfileIdGameId(
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
        
        
        public virtual List<GameStatisticLeaderboardRollup> GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameStatisticLeaderboardRollup> list = new List<GameStatisticLeaderboardRollup>();
            DataSet ds = data.GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
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
        public virtual int CountGameLiveQueueUuid(
            string uuid
        )  {            
            return data.CountGameLiveQueueUuid(
                uuid
            );
        }       
        public virtual int CountGameLiveQueueProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameLiveQueueProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameLiveQueueResult BrowseGameLiveQueueListFilter(SearchFilter obj)  {
            GameLiveQueueResult result = new GameLiveQueueResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLiveQueueListFilter(obj);
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
        public virtual bool SetGameLiveQueueUuid(string set_type, GameLiveQueue obj)  {            
            return data.SetGameLiveQueueUuid(set_type, obj);
        }    
        public virtual bool SetGameLiveQueueProfileIdGameId(string set_type, GameLiveQueue obj)  {            
            return data.SetGameLiveQueueProfileIdGameId(set_type, obj);
        }    
        public virtual bool DelGameLiveQueueUuid(
            string uuid
        )  {
            return data.DelGameLiveQueueUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLiveQueueProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameLiveQueueProfileIdGameId(
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
        
        
        public virtual List<GameLiveQueue> GetGameLiveQueueListUuid(
            string uuid
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueListUuid(
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
        
        
        public virtual List<GameLiveQueue> GetGameLiveQueueListGameId(
            string game_id
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueListGameId(
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
        
        
        public virtual List<GameLiveQueue> GetGameLiveQueueListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<GameLiveQueue> list = new List<GameLiveQueue>();
            DataSet ds = data.GetGameLiveQueueListProfileIdGameId(
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
        public virtual int CountGameLiveRecentQueueUuid(
            string uuid
        )  {            
            return data.CountGameLiveRecentQueueUuid(
                uuid
            );
        }       
        public virtual int CountGameLiveRecentQueueProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameLiveRecentQueueProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual GameLiveRecentQueueResult BrowseGameLiveRecentQueueListFilter(SearchFilter obj)  {
            GameLiveRecentQueueResult result = new GameLiveRecentQueueResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLiveRecentQueueListFilter(obj);
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
        public virtual bool SetGameLiveRecentQueueUuid(string set_type, GameLiveRecentQueue obj)  {            
            return data.SetGameLiveRecentQueueUuid(set_type, obj);
        }    
        public virtual bool SetGameLiveRecentQueueProfileIdGameId(string set_type, GameLiveRecentQueue obj)  {            
            return data.SetGameLiveRecentQueueProfileIdGameId(set_type, obj);
        }    
        public virtual bool DelGameLiveRecentQueueUuid(
            string uuid
        )  {
            return data.DelGameLiveRecentQueueUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLiveRecentQueueProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameLiveRecentQueueProfileIdGameId(
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
        
        
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListUuid(
            string uuid
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueListUuid(
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
        
        
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListGameId(
            string game_id
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueListGameId(
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
        
        
        public virtual List<GameLiveRecentQueue> GetGameLiveRecentQueueListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<GameLiveRecentQueue> list = new List<GameLiveRecentQueue>();
            DataSet ds = data.GetGameLiveRecentQueueListProfileIdGameId(
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
        public virtual int CountGameProfileStatisticUuid(
            string uuid
        )  {            
            return data.CountGameProfileStatisticUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileStatisticCode(
            string code
        )  {            
            return data.CountGameProfileStatisticCode(
                code
            );
        }       
        public virtual int CountGameProfileStatisticGameId(
            string game_id
        )  {            
            return data.CountGameProfileStatisticGameId(
                game_id
            );
        }       
        public virtual int CountGameProfileStatisticCodeGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameProfileStatisticCodeGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileStatisticProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileStatisticCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return data.CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameProfileStatisticResult BrowseGameProfileStatisticListFilter(SearchFilter obj)  {
            GameProfileStatisticResult result = new GameProfileStatisticResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileStatisticListFilter(obj);
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
        public virtual bool SetGameProfileStatisticUuid(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticUuidProfileIdGameIdTimestamp(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticUuidProfileIdGameIdTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticProfileIdCode(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticProfileIdCode(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticProfileIdCodeTimestamp(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticProfileIdCodeTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticCodeProfileIdGameIdTimestamp(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticCodeProfileIdGameIdTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticCodeProfileIdGameId(string set_type, GameProfileStatistic obj)  {            
            return data.SetGameProfileStatisticCodeProfileIdGameId(set_type, obj);
        }    
        public virtual bool DelGameProfileStatisticUuid(
            string uuid
        )  {
            return data.DelGameProfileStatisticUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileStatisticCodeGameId(
            string code
            , string game_id
        )  {
            return data.DelGameProfileStatisticCodeGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameProfileStatisticProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameProfileStatisticProfileIdGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual bool DelGameProfileStatisticCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return data.DelGameProfileStatisticCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            );
        }                     
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListUuid(
            string uuid
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListUuid(
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
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListCode(
            string code
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListCode(
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
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListGameId(
            string game_id
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListGameId(
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
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListCodeGameId(
            string code
            , string game_id
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListCodeGameId(
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
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListProfileIdGameId(
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
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListProfileIdGameIdTimestamp(
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
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListCodeProfileIdGameId(
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
        
        
        public virtual List<GameProfileStatistic> GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileStatistic> list = new List<GameProfileStatistic>();
            DataSet ds = data.GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
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
        public virtual int CountGameStatisticMetaUuid(
            string uuid
        )  {            
            return data.CountGameStatisticMetaUuid(
                uuid
            );
        }       
        public virtual int CountGameStatisticMetaCode(
            string code
        )  {            
            return data.CountGameStatisticMetaCode(
                code
            );
        }       
        public virtual int CountGameStatisticMetaCodeGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameStatisticMetaCodeGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameStatisticMetaName(
            string name
        )  {            
            return data.CountGameStatisticMetaName(
                name
            );
        }       
        public virtual int CountGameStatisticMetaGameId(
            string game_id
        )  {            
            return data.CountGameStatisticMetaGameId(
                game_id
            );
        }       
        public virtual GameStatisticMetaResult BrowseGameStatisticMetaListFilter(SearchFilter obj)  {
            GameStatisticMetaResult result = new GameStatisticMetaResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameStatisticMetaListFilter(obj);
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
        public virtual bool SetGameStatisticMetaUuid(string set_type, GameStatisticMeta obj)  {            
            return data.SetGameStatisticMetaUuid(set_type, obj);
        }    
        public virtual bool SetGameStatisticMetaCodeGameId(string set_type, GameStatisticMeta obj)  {            
            return data.SetGameStatisticMetaCodeGameId(set_type, obj);
        }    
        public virtual bool DelGameStatisticMetaUuid(
            string uuid
        )  {
            return data.DelGameStatisticMetaUuid(
                uuid
            );
        }                     
        public virtual bool DelGameStatisticMetaCodeGameId(
            string code
            , string game_id
        )  {
            return data.DelGameStatisticMetaCodeGameId(
                code
                , game_id
            );
        }                     
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListUuid(
            string uuid
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListUuid(
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
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListCode(
            string code
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListCode(
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
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListName(
            string name
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListName(
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
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListGameId(
            string game_id
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListGameId(
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
        
        
        public virtual List<GameStatisticMeta> GetGameStatisticMetaListCodeGameId(
            string code
            , string game_id
        )  {
            List<GameStatisticMeta> list = new List<GameStatisticMeta>();
            DataSet ds = data.GetGameStatisticMetaListCodeGameId(
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
        public virtual int CountGameProfileStatisticItemUuid(
            string uuid
        )  {            
            return data.CountGameProfileStatisticItemUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileStatisticItemCode(
            string code
        )  {            
            return data.CountGameProfileStatisticItemCode(
                code
            );
        }       
        public virtual int CountGameProfileStatisticItemGameId(
            string game_id
        )  {            
            return data.CountGameProfileStatisticItemGameId(
                game_id
            );
        }       
        public virtual int CountGameProfileStatisticItemCodeGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameProfileStatisticItemCodeGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticItemProfileIdGameId(
            string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileStatisticItemProfileIdGameId(
                profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticItemCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileStatisticItemCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return data.CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameProfileStatisticItemResult BrowseGameProfileStatisticItemListFilter(SearchFilter obj)  {
            GameProfileStatisticItemResult result = new GameProfileStatisticItemResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileStatisticItemListFilter(obj);
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
        public virtual bool SetGameProfileStatisticItemUuid(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticItemProfileIdCode(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemProfileIdCode(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticItemProfileIdCodeTimestamp(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemProfileIdCodeTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(set_type, obj);
        }    
        public virtual bool SetGameProfileStatisticItemCodeProfileIdGameId(string set_type, GameProfileStatisticItem obj)  {            
            return data.SetGameProfileStatisticItemCodeProfileIdGameId(set_type, obj);
        }    
        public virtual bool DelGameProfileStatisticItemUuid(
            string uuid
        )  {
            return data.DelGameProfileStatisticItemUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileStatisticItemCodeGameId(
            string code
            , string game_id
        )  {
            return data.DelGameProfileStatisticItemCodeGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameProfileStatisticItemProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            return data.DelGameProfileStatisticItemProfileIdGameId(
                profile_id
                , game_id
            );
        }                     
        public virtual bool DelGameProfileStatisticItemCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            return data.DelGameProfileStatisticItemCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            );
        }                     
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListUuid(
            string uuid
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListUuid(
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
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListCode(
            string code
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListCode(
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
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListGameId(
            string game_id
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListGameId(
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
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListCodeGameId(
            string code
            , string game_id
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListCodeGameId(
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
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListProfileIdGameId(
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
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListProfileIdGameIdTimestamp(
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
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListCodeProfileIdGameId(
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
        
        
        public virtual List<GameProfileStatisticItem> GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileStatisticItem> list = new List<GameProfileStatisticItem>();
            DataSet ds = data.GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(
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
        public virtual int CountGameKeyMetaUuid(
            string uuid
        )  {            
            return data.CountGameKeyMetaUuid(
                uuid
            );
        }       
        public virtual int CountGameKeyMetaCode(
            string code
        )  {            
            return data.CountGameKeyMetaCode(
                code
            );
        }       
        public virtual int CountGameKeyMetaCodeGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameKeyMetaCodeGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameKeyMetaName(
            string name
        )  {            
            return data.CountGameKeyMetaName(
                name
            );
        }       
        public virtual int CountGameKeyMetaKey(
            string key
        )  {            
            return data.CountGameKeyMetaKey(
                key
            );
        }       
        public virtual int CountGameKeyMetaGameId(
            string game_id
        )  {            
            return data.CountGameKeyMetaGameId(
                game_id
            );
        }       
        public virtual int CountGameKeyMetaKeyGameId(
            string key
            , string game_id
        )  {            
            return data.CountGameKeyMetaKeyGameId(
                key
                , game_id
            );
        }       
        public virtual GameKeyMetaResult BrowseGameKeyMetaListFilter(SearchFilter obj)  {
            GameKeyMetaResult result = new GameKeyMetaResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameKeyMetaListFilter(obj);
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
        public virtual bool SetGameKeyMetaUuid(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaUuid(set_type, obj);
        }    
        public virtual bool SetGameKeyMetaCodeGameId(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaCodeGameId(set_type, obj);
        }    
        public virtual bool SetGameKeyMetaKeyGameId(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaKeyGameId(set_type, obj);
        }    
        public virtual bool SetGameKeyMetaKeyGameIdLevel(string set_type, GameKeyMeta obj)  {            
            return data.SetGameKeyMetaKeyGameIdLevel(set_type, obj);
        }    
        public virtual bool DelGameKeyMetaUuid(
            string uuid
        )  {
            return data.DelGameKeyMetaUuid(
                uuid
            );
        }                     
        public virtual bool DelGameKeyMetaCodeGameId(
            string code
            , string game_id
        )  {
            return data.DelGameKeyMetaCodeGameId(
                code
                , game_id
            );
        }                     
        public virtual bool DelGameKeyMetaKeyGameId(
            string key
            , string game_id
        )  {
            return data.DelGameKeyMetaKeyGameId(
                key
                , game_id
            );
        }                     
        public virtual List<GameKeyMeta> GetGameKeyMetaListUuid(
            string uuid
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListUuid(
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
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListCode(
            string code
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListCode(
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
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListCodeGameId(
            string code
            , string game_id
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListCodeGameId(
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
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListName(
            string name
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListName(
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
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListKey(
            string key
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListKey(
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
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListGameId(
            string game_id
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListGameId(
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
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListKeyGameId(
            string key
            , string game_id
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListKeyGameId(
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
        
        
        public virtual List<GameKeyMeta> GetGameKeyMetaListCodeLevel(
            string code
            , string level
        )  {
            List<GameKeyMeta> list = new List<GameKeyMeta>();
            DataSet ds = data.GetGameKeyMetaListCodeLevel(
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
        public virtual int CountGameLevelUuid(
            string uuid
        )  {            
            return data.CountGameLevelUuid(
                uuid
            );
        }       
        public virtual int CountGameLevelCode(
            string code
        )  {            
            return data.CountGameLevelCode(
                code
            );
        }       
        public virtual int CountGameLevelCodeGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameLevelCodeGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameLevelName(
            string name
        )  {            
            return data.CountGameLevelName(
                name
            );
        }       
        public virtual int CountGameLevelGameId(
            string game_id
        )  {            
            return data.CountGameLevelGameId(
                game_id
            );
        }       
        public virtual GameLevelResult BrowseGameLevelListFilter(SearchFilter obj)  {
            GameLevelResult result = new GameLevelResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameLevelListFilter(obj);
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
        public virtual bool SetGameLevelUuid(string set_type, GameLevel obj)  {            
            return data.SetGameLevelUuid(set_type, obj);
        }    
        public virtual bool SetGameLevelCodeGameId(string set_type, GameLevel obj)  {            
            return data.SetGameLevelCodeGameId(set_type, obj);
        }    
        public virtual bool DelGameLevelUuid(
            string uuid
        )  {
            return data.DelGameLevelUuid(
                uuid
            );
        }                     
        public virtual bool DelGameLevelCodeGameId(
            string code
            , string game_id
        )  {
            return data.DelGameLevelCodeGameId(
                code
                , game_id
            );
        }                     
        public virtual List<GameLevel> GetGameLevelListUuid(
            string uuid
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListUuid(
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
        
        
        public virtual List<GameLevel> GetGameLevelListCode(
            string code
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListCode(
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
        
        
        public virtual List<GameLevel> GetGameLevelListCodeGameId(
            string code
            , string game_id
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListCodeGameId(
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
        
        
        public virtual List<GameLevel> GetGameLevelListName(
            string name
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListName(
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
        
        
        public virtual List<GameLevel> GetGameLevelListGameId(
            string game_id
        )  {
            List<GameLevel> list = new List<GameLevel>();
            DataSet ds = data.GetGameLevelListGameId(
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
        public virtual int CountGameProfileAchievementUuid(
            string uuid
        )  {            
            return data.CountGameProfileAchievementUuid(
                uuid
            );
        }       
        public virtual int CountGameProfileAchievementProfileIdCode(
            string profile_id
            , string code
        )  {            
            return data.CountGameProfileAchievementProfileIdCode(
                profile_id
                , code
            );
        }       
        public virtual int CountGameProfileAchievementUsername(
            string username
        )  {            
            return data.CountGameProfileAchievementUsername(
                username
            );
        }       
        public virtual int CountGameProfileAchievementCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {            
            return data.CountGameProfileAchievementCodeProfileIdGameId(
                code
                , profile_id
                , game_id
            );
        }       
        public virtual int CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {            
            return data.CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
                code
                , profile_id
                , game_id
                , timestamp
            );
        }       
        public virtual GameProfileAchievementResult BrowseGameProfileAchievementListFilter(SearchFilter obj)  {
            GameProfileAchievementResult result = new GameProfileAchievementResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameProfileAchievementListFilter(obj);
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
        public virtual bool SetGameProfileAchievementUuid(string set_type, GameProfileAchievement obj)  {            
            return data.SetGameProfileAchievementUuid(set_type, obj);
        }    
        public virtual bool SetGameProfileAchievementUuidCode(string set_type, GameProfileAchievement obj)  {            
            return data.SetGameProfileAchievementUuidCode(set_type, obj);
        }    
        public virtual bool SetGameProfileAchievementProfileIdCode(string set_type, GameProfileAchievement obj)  {            
            return data.SetGameProfileAchievementProfileIdCode(set_type, obj);
        }    
        public virtual bool SetGameProfileAchievementCodeProfileIdGameId(string set_type, GameProfileAchievement obj)  {            
            return data.SetGameProfileAchievementCodeProfileIdGameId(set_type, obj);
        }    
        public virtual bool SetGameProfileAchievementCodeProfileIdGameIdTimestamp(string set_type, GameProfileAchievement obj)  {            
            return data.SetGameProfileAchievementCodeProfileIdGameIdTimestamp(set_type, obj);
        }    
        public virtual bool DelGameProfileAchievementUuid(
            string uuid
        )  {
            return data.DelGameProfileAchievementUuid(
                uuid
            );
        }                     
        public virtual bool DelGameProfileAchievementProfileIdCode(
            string profile_id
            , string code
        )  {
            return data.DelGameProfileAchievementProfileIdCode(
                profile_id
                , code
            );
        }                     
        public virtual bool DelGameProfileAchievementUuidCode(
            string uuid
            , string code
        )  {
            return data.DelGameProfileAchievementUuidCode(
                uuid
                , code
            );
        }                     
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListUuid(
            string uuid
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListUuid(
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
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListProfileIdCode(
            string profile_id
            , string code
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListProfileIdCode(
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
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListUsername(
            string username
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListUsername(
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
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListCode(
            string code
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListCode(
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
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListGameId(
            string game_id
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListGameId(
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
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListCodeGameId(
            string code
            , string game_id
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListCodeGameId(
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
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListProfileIdGameId(
            string profile_id
            , string game_id
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListProfileIdGameId(
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
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListProfileIdGameIdTimestamp(
            string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListProfileIdGameIdTimestamp(
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
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListCodeProfileIdGameId(
            string code
            , string profile_id
            , string game_id
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListCodeProfileIdGameId(
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
        
        
        public virtual List<GameProfileAchievement> GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
            string code
            , string profile_id
            , string game_id
            , float timestamp
        )  {
            List<GameProfileAchievement> list = new List<GameProfileAchievement>();
            DataSet ds = data.GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
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
        public virtual int CountGameAchievementMetaUuid(
            string uuid
        )  {            
            return data.CountGameAchievementMetaUuid(
                uuid
            );
        }       
        public virtual int CountGameAchievementMetaCode(
            string code
        )  {            
            return data.CountGameAchievementMetaCode(
                code
            );
        }       
        public virtual int CountGameAchievementMetaCodeGameId(
            string code
            , string game_id
        )  {            
            return data.CountGameAchievementMetaCodeGameId(
                code
                , game_id
            );
        }       
        public virtual int CountGameAchievementMetaName(
            string name
        )  {            
            return data.CountGameAchievementMetaName(
                name
            );
        }       
        public virtual int CountGameAchievementMetaGameId(
            string game_id
        )  {            
            return data.CountGameAchievementMetaGameId(
                game_id
            );
        }       
        public virtual GameAchievementMetaResult BrowseGameAchievementMetaListFilter(SearchFilter obj)  {
            GameAchievementMetaResult result = new GameAchievementMetaResult();
            result.page = obj.page;
            result.page_size = obj.page_size;
            DataSet ds = data.BrowseGameAchievementMetaListFilter(obj);
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
        public virtual bool SetGameAchievementMetaUuid(string set_type, GameAchievementMeta obj)  {            
            return data.SetGameAchievementMetaUuid(set_type, obj);
        }    
        public virtual bool SetGameAchievementMetaCodeGameId(string set_type, GameAchievementMeta obj)  {            
            return data.SetGameAchievementMetaCodeGameId(set_type, obj);
        }    
        public virtual bool DelGameAchievementMetaUuid(
            string uuid
        )  {
            return data.DelGameAchievementMetaUuid(
                uuid
            );
        }                     
        public virtual bool DelGameAchievementMetaCodeGameId(
            string code
            , string game_id
        )  {
            return data.DelGameAchievementMetaCodeGameId(
                code
                , game_id
            );
        }                     
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListUuid(
            string uuid
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListUuid(
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
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListCode(
            string code
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListCode(
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
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListCodeGameId(
            string code
            , string game_id
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListCodeGameId(
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
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListName(
            string name
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListName(
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
        
        
        public virtual List<GameAchievementMeta> GetGameAchievementMetaListGameId(
            string game_id
        )  {
            List<GameAchievementMeta> list = new List<GameAchievementMeta>();
            DataSet ds = data.GetGameAchievementMetaListGameId(
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






