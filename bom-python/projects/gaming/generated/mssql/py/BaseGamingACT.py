import ent
from ent import *

import BaseGamingData
from BaseGamingData import *

class BaseGamingACT(object):

    def __init__(self):
        self.connection_string = ''
        self.data = BaseGamingData()
        
        
    def FillGame(self, row) :
        obj = Game()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['org_id'] != None) :                 
            obj.org_id = row['org_id'] #dataType.FillData(dr, "org_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['app_id'] != None) :                 
            obj.app_id = row['app_id'] #dataType.FillData(dr, "app_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGame(self
    ) :         
        return self.data.CountGame(
        )
               
    def CountGameUuid(self
        , uuid
    ) :         
        return self.data.CountGameUuid(
            uuid
        )
               
    def CountGameCode(self
        , code
    ) :         
        return self.data.CountGameCode(
            code
        )
               
    def CountGameName(self
        , name
    ) :         
        return self.data.CountGameName(
            name
        )
               
    def CountGameOrgId(self
        , org_id
    ) :         
        return self.data.CountGameOrgId(
            org_id
        )
               
    def CountGameAppId(self
        , app_id
    ) :         
        return self.data.CountGameAppId(
            app_id
        )
               
    def CountGameOrgIdAppId(self
        , org_id
        , app_id
    ) :         
        return self.data.CountGameOrgIdAppId(
            org_id
            , app_id
        )
               
    def BrowseGameListFilter(self, filter_obj) :
        result = GameResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game = self.FillGame(row)
                result.data.append(game)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameUuid(self, set_type, obj) :            
            return self.data.SetGameUuid(set_type, obj)
            
    def SetGameCode(self, set_type, obj) :            
            return self.data.SetGameCode(set_type, obj)
            
    def SetGameName(self, set_type, obj) :            
            return self.data.SetGameName(set_type, obj)
            
    def SetGameOrgId(self, set_type, obj) :            
            return self.data.SetGameOrgId(set_type, obj)
            
    def SetGameAppId(self, set_type, obj) :            
            return self.data.SetGameAppId(set_type, obj)
            
    def SetGameOrgIdAppId(self, set_type, obj) :            
            return self.data.SetGameOrgIdAppId(set_type, obj)
            
    def DelGameUuid(self
        , uuid
    ) :
        return self.data.DelGameUuid(
            uuid
        )
        
    def DelGameCode(self
        , code
    ) :
        return self.data.DelGameCode(
            code
        )
        
    def DelGameName(self
        , name
    ) :
        return self.data.DelGameName(
            name
        )
        
    def DelGameOrgId(self
        , org_id
    ) :
        return self.data.DelGameOrgId(
            org_id
        )
        
    def DelGameAppId(self
        , app_id
    ) :
        return self.data.DelGameAppId(
            app_id
        )
        
    def DelGameOrgIdAppId(self
        , org_id
        , app_id
    ) :
        return self.data.DelGameOrgIdAppId(
            org_id
            , app_id
        )
        
    def GetGameList(self
    ) :

        results = []
        rows = self.data.GetGameList(
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetGameListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListAppId(self
        , app_id
    ) :

        results = []
        rows = self.data.GetGameListAppId(
            app_id
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListOrgIdAppId(self
        , org_id
        , app_id
    ) :

        results = []
        rows = self.data.GetGameListOrgIdAppId(
            org_id
            , app_id
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
        
    def FillGameCategory(self, row) :
        obj = GameCategory()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['type_id'] != None) :                 
            obj.type_id = row['type_id'] #dataType.FillData(dr, "type_id");                
        if (row['org_id'] != None) :                 
            obj.org_id = row['org_id'] #dataType.FillData(dr, "org_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameCategory(self
    ) :         
        return self.data.CountGameCategory(
        )
               
    def CountGameCategoryUuid(self
        , uuid
    ) :         
        return self.data.CountGameCategoryUuid(
            uuid
        )
               
    def CountGameCategoryCode(self
        , code
    ) :         
        return self.data.CountGameCategoryCode(
            code
        )
               
    def CountGameCategoryName(self
        , name
    ) :         
        return self.data.CountGameCategoryName(
            name
        )
               
    def CountGameCategoryOrgId(self
        , org_id
    ) :         
        return self.data.CountGameCategoryOrgId(
            org_id
        )
               
    def CountGameCategoryTypeId(self
        , type_id
    ) :         
        return self.data.CountGameCategoryTypeId(
            type_id
        )
               
    def CountGameCategoryOrgIdTypeId(self
        , org_id
        , type_id
    ) :         
        return self.data.CountGameCategoryOrgIdTypeId(
            org_id
            , type_id
        )
               
    def BrowseGameCategoryListFilter(self, filter_obj) :
        result = GameCategoryResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameCategoryListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_category = self.FillGameCategory(row)
                result.data.append(game_category)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameCategoryUuid(self, set_type, obj) :            
            return self.data.SetGameCategoryUuid(set_type, obj)
            
    def DelGameCategoryUuid(self
        , uuid
    ) :
        return self.data.DelGameCategoryUuid(
            uuid
        )
        
    def DelGameCategoryCodeOrgId(self
        , code
        , org_id
    ) :
        return self.data.DelGameCategoryCodeOrgId(
            code
            , org_id
        )
        
    def DelGameCategoryCodeOrgIdTypeId(self
        , code
        , org_id
        , type_id
    ) :
        return self.data.DelGameCategoryCodeOrgIdTypeId(
            code
            , org_id
            , type_id
        )
        
    def GetGameCategoryList(self
    ) :

        results = []
        rows = self.data.GetGameCategoryList(
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameCategoryListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameCategoryListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameCategoryListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetGameCategoryListOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetGameCategoryListTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListOrgIdTypeId(self
        , org_id
        , type_id
    ) :

        results = []
        rows = self.data.GetGameCategoryListOrgIdTypeId(
            org_id
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
        
    def FillGameCategoryTree(self, row) :
        obj = GameCategoryTree()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['parent_id'] != None) :                 
            obj.parent_id = row['parent_id'] #dataType.FillData(dr, "parent_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['category_id'] != None) :                 
            obj.category_id = row['category_id'] #dataType.FillData(dr, "category_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountGameCategoryTree(self
    ) :         
        return self.data.CountGameCategoryTree(
        )
               
    def CountGameCategoryTreeUuid(self
        , uuid
    ) :         
        return self.data.CountGameCategoryTreeUuid(
            uuid
        )
               
    def CountGameCategoryTreeParentId(self
        , parent_id
    ) :         
        return self.data.CountGameCategoryTreeParentId(
            parent_id
        )
               
    def CountGameCategoryTreeCategoryId(self
        , category_id
    ) :         
        return self.data.CountGameCategoryTreeCategoryId(
            category_id
        )
               
    def CountGameCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.data.CountGameCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
        )
               
    def BrowseGameCategoryTreeListFilter(self, filter_obj) :
        result = GameCategoryTreeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameCategoryTreeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_category_tree = self.FillGameCategoryTree(row)
                result.data.append(game_category_tree)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameCategoryTreeUuid(self, set_type, obj) :            
            return self.data.SetGameCategoryTreeUuid(set_type, obj)
            
    def DelGameCategoryTreeUuid(self
        , uuid
    ) :
        return self.data.DelGameCategoryTreeUuid(
            uuid
        )
        
    def DelGameCategoryTreeParentId(self
        , parent_id
    ) :
        return self.data.DelGameCategoryTreeParentId(
            parent_id
        )
        
    def DelGameCategoryTreeCategoryId(self
        , category_id
    ) :
        return self.data.DelGameCategoryTreeCategoryId(
            category_id
        )
        
    def DelGameCategoryTreeParentIdCategoryId(self
        , parent_id
        , category_id
    ) :
        return self.data.DelGameCategoryTreeParentIdCategoryId(
            parent_id
            , category_id
        )
        
    def GetGameCategoryTreeList(self
    ) :

        results = []
        rows = self.data.GetGameCategoryTreeList(
        )
        
        if(rows != None) :
            for row in rows :
                game_category_tree  = self.FillGameCategoryTree(row)
                results.append(game_category_tree)
            return results        
        
    def GetGameCategoryTreeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameCategoryTreeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_category_tree  = self.FillGameCategoryTree(row)
                results.append(game_category_tree)
            return results        
        
    def GetGameCategoryTreeListParentId(self
        , parent_id
    ) :

        results = []
        rows = self.data.GetGameCategoryTreeListParentId(
            parent_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category_tree  = self.FillGameCategoryTree(row)
                results.append(game_category_tree)
            return results        
        
    def GetGameCategoryTreeListCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetGameCategoryTreeListCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category_tree  = self.FillGameCategoryTree(row)
                results.append(game_category_tree)
            return results        
        
    def GetGameCategoryTreeListParentIdCategoryId(self
        , parent_id
        , category_id
    ) :

        results = []
        rows = self.data.GetGameCategoryTreeListParentIdCategoryId(
            parent_id
            , category_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category_tree  = self.FillGameCategoryTree(row)
                results.append(game_category_tree)
            return results        
        
        
    def FillGameCategoryAssoc(self, row) :
        obj = GameCategoryAssoc()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['category_id'] != None) :                 
            obj.category_id = row['category_id'] #dataType.FillData(dr, "category_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountGameCategoryAssoc(self
    ) :         
        return self.data.CountGameCategoryAssoc(
        )
               
    def CountGameCategoryAssocUuid(self
        , uuid
    ) :         
        return self.data.CountGameCategoryAssocUuid(
            uuid
        )
               
    def CountGameCategoryAssocGameId(self
        , game_id
    ) :         
        return self.data.CountGameCategoryAssocGameId(
            game_id
        )
               
    def CountGameCategoryAssocCategoryId(self
        , category_id
    ) :         
        return self.data.CountGameCategoryAssocCategoryId(
            category_id
        )
               
    def CountGameCategoryAssocGameIdCategoryId(self
        , game_id
        , category_id
    ) :         
        return self.data.CountGameCategoryAssocGameIdCategoryId(
            game_id
            , category_id
        )
               
    def BrowseGameCategoryAssocListFilter(self, filter_obj) :
        result = GameCategoryAssocResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameCategoryAssocListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_category_assoc = self.FillGameCategoryAssoc(row)
                result.data.append(game_category_assoc)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameCategoryAssocUuid(self, set_type, obj) :            
            return self.data.SetGameCategoryAssocUuid(set_type, obj)
            
    def DelGameCategoryAssocUuid(self
        , uuid
    ) :
        return self.data.DelGameCategoryAssocUuid(
            uuid
        )
        
    def GetGameCategoryAssocList(self
    ) :

        results = []
        rows = self.data.GetGameCategoryAssocList(
        )
        
        if(rows != None) :
            for row in rows :
                game_category_assoc  = self.FillGameCategoryAssoc(row)
                results.append(game_category_assoc)
            return results        
        
    def GetGameCategoryAssocListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameCategoryAssocListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_category_assoc  = self.FillGameCategoryAssoc(row)
                results.append(game_category_assoc)
            return results        
        
    def GetGameCategoryAssocListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameCategoryAssocListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category_assoc  = self.FillGameCategoryAssoc(row)
                results.append(game_category_assoc)
            return results        
        
    def GetGameCategoryAssocListCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetGameCategoryAssocListCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category_assoc  = self.FillGameCategoryAssoc(row)
                results.append(game_category_assoc)
            return results        
        
    def GetGameCategoryAssocListGameIdCategoryId(self
        , game_id
        , category_id
    ) :

        results = []
        rows = self.data.GetGameCategoryAssocListGameIdCategoryId(
            game_id
            , category_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category_assoc  = self.FillGameCategoryAssoc(row)
                results.append(game_category_assoc)
            return results        
        
        
    def FillGameType(self, row) :
        obj = GameType()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameType(self
    ) :         
        return self.data.CountGameType(
        )
               
    def CountGameTypeUuid(self
        , uuid
    ) :         
        return self.data.CountGameTypeUuid(
            uuid
        )
               
    def CountGameTypeCode(self
        , code
    ) :         
        return self.data.CountGameTypeCode(
            code
        )
               
    def CountGameTypeName(self
        , name
    ) :         
        return self.data.CountGameTypeName(
            name
        )
               
    def BrowseGameTypeListFilter(self, filter_obj) :
        result = GameTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameTypeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_type = self.FillGameType(row)
                result.data.append(game_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameTypeUuid(self, set_type, obj) :            
            return self.data.SetGameTypeUuid(set_type, obj)
            
    def DelGameTypeUuid(self
        , uuid
    ) :
        return self.data.DelGameTypeUuid(
            uuid
        )
        
    def GetGameTypeList(self
    ) :

        results = []
        rows = self.data.GetGameTypeList(
        )
        
        if(rows != None) :
            for row in rows :
                game_type  = self.FillGameType(row)
                results.append(game_type)
            return results        
        
    def GetGameTypeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameTypeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_type  = self.FillGameType(row)
                results.append(game_type)
            return results        
        
    def GetGameTypeListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameTypeListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_type  = self.FillGameType(row)
                results.append(game_type)
            return results        
        
    def GetGameTypeListName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameTypeListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_type  = self.FillGameType(row)
                results.append(game_type)
            return results        
        
        
    def FillProfileGame(self, row) :
        obj = ProfileGame()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['type_id'] != None) :                 
            obj.type_id = row['type_id'] #dataType.FillData(dr, "type_id");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['game_profile'] != None) :                 
            obj.game_profile = row['game_profile'] #dataType.FillData(dr, "game_profile");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['profile_version'] != None) :                 
            obj.profile_version = row['profile_version'] #dataType.FillData(dr, "profile_version");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountProfileGame(self
    ) :         
        return self.data.CountProfileGame(
        )
               
    def CountProfileGameUuid(self
        , uuid
    ) :         
        return self.data.CountProfileGameUuid(
            uuid
        )
               
    def CountProfileGameGameId(self
        , game_id
    ) :         
        return self.data.CountProfileGameGameId(
            game_id
        )
               
    def CountProfileGameProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileGameProfileId(
            profile_id
        )
               
    def CountProfileGameProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountProfileGameProfileIdGameId(
            profile_id
            , game_id
        )
               
    def BrowseProfileGameListFilter(self, filter_obj) :
        result = ProfileGameResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileGameListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_game = self.FillProfileGame(row)
                result.data.append(profile_game)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileGameUuid(self, set_type, obj) :            
            return self.data.SetProfileGameUuid(set_type, obj)
            
    def DelProfileGameUuid(self
        , uuid
    ) :
        return self.data.DelProfileGameUuid(
            uuid
        )
        
    def GetProfileGameList(self
    ) :

        results = []
        rows = self.data.GetProfileGameList(
        )
        
        if(rows != None) :
            for row in rows :
                profile_game  = self.FillProfileGame(row)
                results.append(profile_game)
            return results        
        
    def GetProfileGameListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileGameListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_game  = self.FillProfileGame(row)
                results.append(profile_game)
            return results        
        
    def GetProfileGameListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetProfileGameListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game  = self.FillProfileGame(row)
                results.append(profile_game)
            return results        
        
    def GetProfileGameListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileGameListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game  = self.FillProfileGame(row)
                results.append(profile_game)
            return results        
        
    def GetProfileGameListProfileIdGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetProfileGameListProfileIdGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game  = self.FillProfileGame(row)
                results.append(profile_game)
            return results        
        
        
    def FillGameNetwork(self, row) :
        obj = GameNetwork()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['url'] != None) :                 
            obj.url = row['url'] #dataType.FillData(dr, "url");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['secret'] != None) :                 
            obj.secret = row['secret'] #dataType.FillData(dr, "secret");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameNetwork(self
    ) :         
        return self.data.CountGameNetwork(
        )
               
    def CountGameNetworkUuid(self
        , uuid
    ) :         
        return self.data.CountGameNetworkUuid(
            uuid
        )
               
    def CountGameNetworkCode(self
        , code
    ) :         
        return self.data.CountGameNetworkCode(
            code
        )
               
    def CountGameNetworkUuidType(self
        , uuid
        , type
    ) :         
        return self.data.CountGameNetworkUuidType(
            uuid
            , type
        )
               
    def BrowseGameNetworkListFilter(self, filter_obj) :
        result = GameNetworkResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameNetworkListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_network = self.FillGameNetwork(row)
                result.data.append(game_network)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameNetworkUuid(self, set_type, obj) :            
            return self.data.SetGameNetworkUuid(set_type, obj)
            
    def SetGameNetworkCode(self, set_type, obj) :            
            return self.data.SetGameNetworkCode(set_type, obj)
            
    def DelGameNetworkUuid(self
        , uuid
    ) :
        return self.data.DelGameNetworkUuid(
            uuid
        )
        
    def GetGameNetworkList(self
    ) :

        results = []
        rows = self.data.GetGameNetworkList(
        )
        
        if(rows != None) :
            for row in rows :
                game_network  = self.FillGameNetwork(row)
                results.append(game_network)
            return results        
        
    def GetGameNetworkListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameNetworkListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_network  = self.FillGameNetwork(row)
                results.append(game_network)
            return results        
        
    def GetGameNetworkListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameNetworkListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_network  = self.FillGameNetwork(row)
                results.append(game_network)
            return results        
        
    def GetGameNetworkListUuidType(self
        , uuid
        , type
    ) :

        results = []
        rows = self.data.GetGameNetworkListUuidType(
            uuid
            , type
        )
        
        if(rows != None) :
            for row in rows :
                game_network  = self.FillGameNetwork(row)
                results.append(game_network)
            return results        
        
        
    def FillGameNetworkAuth(self, row) :
        obj = GameNetworkAuth()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['url'] != None) :                 
            obj.url = row['url'] #dataType.FillData(dr, "url");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['app_id'] != None) :                 
            obj.app_id = row['app_id'] #dataType.FillData(dr, "app_id");                
        if (row['game_network_id'] != None) :                 
            obj.game_network_id = row['game_network_id'] #dataType.FillData(dr, "game_network_id");                
        if (row['secret'] != None) :                 
            obj.secret = row['secret'] #dataType.FillData(dr, "secret");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameNetworkAuth(self
    ) :         
        return self.data.CountGameNetworkAuth(
        )
               
    def CountGameNetworkAuthUuid(self
        , uuid
    ) :         
        return self.data.CountGameNetworkAuthUuid(
            uuid
        )
               
    def CountGameNetworkAuthGameIdGameNetworkId(self
        , game_id
        , game_network_id
    ) :         
        return self.data.CountGameNetworkAuthGameIdGameNetworkId(
            game_id
            , game_network_id
        )
               
    def BrowseGameNetworkAuthListFilter(self, filter_obj) :
        result = GameNetworkAuthResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameNetworkAuthListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_network_auth = self.FillGameNetworkAuth(row)
                result.data.append(game_network_auth)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameNetworkAuthUuid(self, set_type, obj) :            
            return self.data.SetGameNetworkAuthUuid(set_type, obj)
            
    def SetGameNetworkAuthGameIdGameNetworkId(self, set_type, obj) :            
            return self.data.SetGameNetworkAuthGameIdGameNetworkId(set_type, obj)
            
    def DelGameNetworkAuthUuid(self
        , uuid
    ) :
        return self.data.DelGameNetworkAuthUuid(
            uuid
        )
        
    def GetGameNetworkAuthList(self
    ) :

        results = []
        rows = self.data.GetGameNetworkAuthList(
        )
        
        if(rows != None) :
            for row in rows :
                game_network_auth  = self.FillGameNetworkAuth(row)
                results.append(game_network_auth)
            return results        
        
    def GetGameNetworkAuthListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameNetworkAuthListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_network_auth  = self.FillGameNetworkAuth(row)
                results.append(game_network_auth)
            return results        
        
    def GetGameNetworkAuthListGameIdGameNetworkId(self
        , game_id
        , game_network_id
    ) :

        results = []
        rows = self.data.GetGameNetworkAuthListGameIdGameNetworkId(
            game_id
            , game_network_id
        )
        
        if(rows != None) :
            for row in rows :
                game_network_auth  = self.FillGameNetworkAuth(row)
                results.append(game_network_auth)
            return results        
        
        
    def FillProfileGameNetwork(self, row) :
        obj = ProfileGameNetwork()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['hash'] != None) :                 
            obj.hash = row['hash'] #dataType.FillData(dr, "hash");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['game_network_id'] != None) :                 
            obj.game_network_id = row['game_network_id'] #dataType.FillData(dr, "game_network_id");                
        if (row['network_username'] != None) :                 
            obj.network_username = row['network_username'] #dataType.FillData(dr, "network_username");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['network_fullname'] != None) :                 
            obj.network_fullname = row['network_fullname'] #dataType.FillData(dr, "network_fullname");                
        if (row['secret'] != None) :                 
            obj.secret = row['secret'] #dataType.FillData(dr, "secret");                
        if (row['token'] != None) :                 
            obj.token = row['token'] #dataType.FillData(dr, "token");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['network_auth'] != None) :                 
            obj.network_auth = row['network_auth'] #dataType.FillData(dr, "network_auth");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['network_user_id'] != None) :                 
            obj.network_user_id = row['network_user_id'] #dataType.FillData(dr, "network_user_id");                

        return obj
        
    def CountProfileGameNetwork(self
    ) :         
        return self.data.CountProfileGameNetwork(
        )
               
    def CountProfileGameNetworkUuid(self
        , uuid
    ) :         
        return self.data.CountProfileGameNetworkUuid(
            uuid
        )
               
    def CountProfileGameNetworkGameId(self
        , game_id
    ) :         
        return self.data.CountProfileGameNetworkGameId(
            game_id
        )
               
    def CountProfileGameNetworkProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileGameNetworkProfileId(
            profile_id
        )
               
    def CountProfileGameNetworkProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountProfileGameNetworkProfileIdGameId(
            profile_id
            , game_id
        )
               
    def CountProfileGameNetworkProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountProfileGameNetworkProfileIdGameId(
            profile_id
            , game_id
        )
               
    def CountProfileGameNetworkProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :         
        return self.data.CountProfileGameNetworkProfileIdGameIdGameNetworkId(
            profile_id
            , game_id
            , game_network_id
        )
               
    def CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :         
        return self.data.CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
            network_username
            , game_id
            , game_network_id
        )
               
    def BrowseProfileGameNetworkListFilter(self, filter_obj) :
        result = ProfileGameNetworkResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileGameNetworkListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_game_network = self.FillProfileGameNetwork(row)
                result.data.append(profile_game_network)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileGameNetworkUuid(self, set_type, obj) :            
            return self.data.SetProfileGameNetworkUuid(set_type, obj)
            
    def SetProfileGameNetworkProfileIdGameId(self, set_type, obj) :            
            return self.data.SetProfileGameNetworkProfileIdGameId(set_type, obj)
            
    def SetProfileGameNetworkProfileIdGameIdGameNetworkId(self, set_type, obj) :            
            return self.data.SetProfileGameNetworkProfileIdGameIdGameNetworkId(set_type, obj)
            
    def SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(self, set_type, obj) :            
            return self.data.SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(set_type, obj)
            
    def DelProfileGameNetworkUuid(self
        , uuid
    ) :
        return self.data.DelProfileGameNetworkUuid(
            uuid
        )
        
    def DelProfileGameNetworkProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelProfileGameNetworkProfileIdGameId(
            profile_id
            , game_id
        )
        
    def DelProfileGameNetworkProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :
        return self.data.DelProfileGameNetworkProfileIdGameIdGameNetworkId(
            profile_id
            , game_id
            , game_network_id
        )
        
    def DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :
        return self.data.DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(
            network_username
            , game_id
            , game_network_id
        )
        
    def GetProfileGameNetworkList(self
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkList(
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
    def GetProfileGameNetworkListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
    def GetProfileGameNetworkListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
    def GetProfileGameNetworkListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
    def GetProfileGameNetworkListProfileIdGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListProfileIdGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
    def GetProfileGameNetworkListProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListProfileIdGameIdGameNetworkId(
            profile_id
            , game_id
            , game_network_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
    def GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(
            network_username
            , game_id
            , game_network_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
        
    def FillProfileGameDataAttribute(self, row) :
        obj = ProfileGameDataAttribute()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['val'] != None) :                 
            obj.val = row['val'] #dataType.FillData(dr, "val");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['otype'] != None) :                 
            obj.otype = row['otype'] #dataType.FillData(dr, "otype");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountProfileGameDataAttribute(self
    ) :         
        return self.data.CountProfileGameDataAttribute(
        )
               
    def CountProfileGameDataAttributeUuid(self
        , uuid
    ) :         
        return self.data.CountProfileGameDataAttributeUuid(
            uuid
        )
               
    def CountProfileGameDataAttributeProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileGameDataAttributeProfileId(
            profile_id
        )
               
    def CountProfileGameDataAttributeProfileIdGameIdCode(self
        , profile_id
        , game_id
        , code
    ) :         
        return self.data.CountProfileGameDataAttributeProfileIdGameIdCode(
            profile_id
            , game_id
            , code
        )
               
    def BrowseProfileGameDataAttributeListFilter(self, filter_obj) :
        result = ProfileGameDataAttributeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileGameDataAttributeListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_game_data_attribute = self.FillProfileGameDataAttribute(row)
                result.data.append(profile_game_data_attribute)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileGameDataAttributeUuid(self, set_type, obj) :            
            return self.data.SetProfileGameDataAttributeUuid(set_type, obj)
            
    def SetProfileGameDataAttributeProfileId(self, set_type, obj) :            
            return self.data.SetProfileGameDataAttributeProfileId(set_type, obj)
            
    def SetProfileGameDataAttributeProfileIdGameIdCode(self, set_type, obj) :            
            return self.data.SetProfileGameDataAttributeProfileIdGameIdCode(set_type, obj)
            
    def DelProfileGameDataAttributeUuid(self
        , uuid
    ) :
        return self.data.DelProfileGameDataAttributeUuid(
            uuid
        )
        
    def DelProfileGameDataAttributeProfileId(self
        , profile_id
    ) :
        return self.data.DelProfileGameDataAttributeProfileId(
            profile_id
        )
        
    def DelProfileGameDataAttributeProfileIdGameIdCode(self
        , profile_id
        , game_id
        , code
    ) :
        return self.data.DelProfileGameDataAttributeProfileIdGameIdCode(
            profile_id
            , game_id
            , code
        )
        
    def GetProfileGameDataAttributeListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileGameDataAttributeListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_data_attribute  = self.FillProfileGameDataAttribute(row)
                results.append(profile_game_data_attribute)
            return results        
        
    def GetProfileGameDataAttributeListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileGameDataAttributeListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_data_attribute  = self.FillProfileGameDataAttribute(row)
                results.append(profile_game_data_attribute)
            return results        
        
    def GetProfileGameDataAttributeListProfileIdGameIdCode(self
        , profile_id
        , game_id
        , code
    ) :

        results = []
        rows = self.data.GetProfileGameDataAttributeListProfileIdGameIdCode(
            profile_id
            , game_id
            , code
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_data_attribute  = self.FillProfileGameDataAttribute(row)
                results.append(profile_game_data_attribute)
            return results        
        
        
    def FillGameSession(self, row) :
        obj = GameSession()

        if (row['game_area'] != None) :                 
            obj.game_area = row['game_area'] #dataType.FillData(dr, "game_area");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['network_uuid'] != None) :                 
            obj.network_uuid = row['network_uuid'] #dataType.FillData(dr, "network_uuid");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['game_level'] != None) :                 
            obj.game_level = row['game_level'] #dataType.FillData(dr, "game_level");                
        if (row['profile_network'] != None) :                 
            obj.profile_network = row['profile_network'] #dataType.FillData(dr, "profile_network");                
        if (row['profile_device'] != None) :                 
            obj.profile_device = row['profile_device'] #dataType.FillData(dr, "profile_device");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['network_external_port'] != None) :                 
            obj.network_external_port = row['network_external_port'] #dataType.FillData(dr, "network_external_port");                
        if (row['game_players_connected'] != None) :                 
            obj.game_players_connected = row['game_players_connected'] #dataType.FillData(dr, "game_players_connected");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['game_state'] != None) :                 
            obj.game_state = row['game_state'] #dataType.FillData(dr, "game_state");                
        if (row['hash'] != None) :                 
            obj.hash = row['hash'] #dataType.FillData(dr, "hash");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                
        if (row['network_external_ip'] != None) :                 
            obj.network_external_ip = row['network_external_ip'] #dataType.FillData(dr, "network_external_ip");                
        if (row['profile_username'] != None) :                 
            obj.profile_username = row['profile_username'] #dataType.FillData(dr, "profile_username");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['game_code'] != None) :                 
            obj.game_code = row['game_code'] #dataType.FillData(dr, "game_code");                
        if (row['game_player_z'] != None) :                 
            obj.game_player_z = row['game_player_z'] #dataType.FillData(dr, "game_player_z");                
        if (row['game_player_x'] != None) :                 
            obj.game_player_x = row['game_player_x'] #dataType.FillData(dr, "game_player_x");                
        if (row['game_player_y'] != None) :                 
            obj.game_player_y = row['game_player_y'] #dataType.FillData(dr, "game_player_y");                
        if (row['network_port'] != None) :                 
            obj.network_port = row['network_port'] #dataType.FillData(dr, "network_port");                
        if (row['game_players_allowed'] != None) :                 
            obj.game_players_allowed = row['game_players_allowed'] #dataType.FillData(dr, "game_players_allowed");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['game_type'] != None) :                 
            obj.game_type = row['game_type'] #dataType.FillData(dr, "game_type");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['network_ip'] != None) :                 
            obj.network_ip = row['network_ip'] #dataType.FillData(dr, "network_ip");                
        if (row['network_use_nat'] != None) :                 
            obj.network_use_nat = row['network_use_nat'] #dataType.FillData(dr, "network_use_nat");                

        return obj
        
    def CountGameSession(self
    ) :         
        return self.data.CountGameSession(
        )
               
    def CountGameSessionUuid(self
        , uuid
    ) :         
        return self.data.CountGameSessionUuid(
            uuid
        )
               
    def CountGameSessionGameId(self
        , game_id
    ) :         
        return self.data.CountGameSessionGameId(
            game_id
        )
               
    def CountGameSessionProfileId(self
        , profile_id
    ) :         
        return self.data.CountGameSessionProfileId(
            profile_id
        )
               
    def CountGameSessionProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameSessionProfileIdGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameSessionListFilter(self, filter_obj) :
        result = GameSessionResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameSessionListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_session = self.FillGameSession(row)
                result.data.append(game_session)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameSessionUuid(self, set_type, obj) :            
            return self.data.SetGameSessionUuid(set_type, obj)
            
    def DelGameSessionUuid(self
        , uuid
    ) :
        return self.data.DelGameSessionUuid(
            uuid
        )
        
    def GetGameSessionList(self
    ) :

        results = []
        rows = self.data.GetGameSessionList(
        )
        
        if(rows != None) :
            for row in rows :
                game_session  = self.FillGameSession(row)
                results.append(game_session)
            return results        
        
    def GetGameSessionListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameSessionListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_session  = self.FillGameSession(row)
                results.append(game_session)
            return results        
        
    def GetGameSessionListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameSessionListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_session  = self.FillGameSession(row)
                results.append(game_session)
            return results        
        
    def GetGameSessionListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameSessionListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_session  = self.FillGameSession(row)
                results.append(game_session)
            return results        
        
    def GetGameSessionListProfileIdGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameSessionListProfileIdGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_session  = self.FillGameSession(row)
                results.append(game_session)
            return results        
        
        
    def FillGameSessionData(self, row) :
        obj = GameSessionData()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['data_results'] != None) :                 
            obj.data_results = row['data_results'] #dataType.FillData(dr, "data_results");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['data_layer_projectile'] != None) :                 
            obj.data_layer_projectile = row['data_layer_projectile'] #dataType.FillData(dr, "data_layer_projectile");                
        if (row['data_layer_actors'] != None) :                 
            obj.data_layer_actors = row['data_layer_actors'] #dataType.FillData(dr, "data_layer_actors");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['data_layer_enemy'] != None) :                 
            obj.data_layer_enemy = row['data_layer_enemy'] #dataType.FillData(dr, "data_layer_enemy");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameSessionData(self
    ) :         
        return self.data.CountGameSessionData(
        )
               
    def CountGameSessionDataUuid(self
        , uuid
    ) :         
        return self.data.CountGameSessionDataUuid(
            uuid
        )
               
    def BrowseGameSessionDataListFilter(self, filter_obj) :
        result = GameSessionDataResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameSessionDataListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_session_data = self.FillGameSessionData(row)
                result.data.append(game_session_data)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameSessionDataUuid(self, set_type, obj) :            
            return self.data.SetGameSessionDataUuid(set_type, obj)
            
    def DelGameSessionDataUuid(self
        , uuid
    ) :
        return self.data.DelGameSessionDataUuid(
            uuid
        )
        
    def GetGameSessionDataList(self
    ) :

        results = []
        rows = self.data.GetGameSessionDataList(
        )
        
        if(rows != None) :
            for row in rows :
                game_session_data  = self.FillGameSessionData(row)
                results.append(game_session_data)
            return results        
        
    def GetGameSessionDataListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameSessionDataListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_session_data  = self.FillGameSessionData(row)
                results.append(game_session_data)
            return results        
        
        
    def FillGameContent(self, row) :
        obj = GameContent()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['extension'] != None) :                 
            obj.extension = row['extension'] #dataType.FillData(dr, "extension");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['filename'] != None) :                 
            obj.filename = row['filename'] #dataType.FillData(dr, "filename");                
        if (row['source'] != None) :                 
            obj.source = row['source'] #dataType.FillData(dr, "source");                
        if (row['version'] != None) :                 
            obj.version = row['version'] #dataType.FillData(dr, "version");                
        if (row['platform'] != None) :                 
            obj.platform = row['platform'] #dataType.FillData(dr, "platform");                
        if (row['content_type'] != None) :                 
            obj.content_type = row['content_type'] #dataType.FillData(dr, "content_type");                
        if (row['path'] != None) :                 
            obj.path = row['path'] #dataType.FillData(dr, "path");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['increment'] != None) :                 
            obj.increment = row['increment'] #dataType.FillData(dr, "increment");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['hash'] != None) :                 
            obj.hash = row['hash'] #dataType.FillData(dr, "hash");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameContent(self
    ) :         
        return self.data.CountGameContent(
        )
               
    def CountGameContentUuid(self
        , uuid
    ) :         
        return self.data.CountGameContentUuid(
            uuid
        )
               
    def CountGameContentGameId(self
        , game_id
    ) :         
        return self.data.CountGameContentGameId(
            game_id
        )
               
    def CountGameContentGameIdPath(self
        , game_id
        , path
    ) :         
        return self.data.CountGameContentGameIdPath(
            game_id
            , path
        )
               
    def CountGameContentGameIdPathVersion(self
        , game_id
        , path
        , version
    ) :         
        return self.data.CountGameContentGameIdPathVersion(
            game_id
            , path
            , version
        )
               
    def CountGameContentGameIdPathVersionPlatformIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :         
        return self.data.CountGameContentGameIdPathVersionPlatformIncrement(
            game_id
            , path
            , version
            , platform
            , increment
        )
               
    def BrowseGameContentListFilter(self, filter_obj) :
        result = GameContentResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameContentListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_content = self.FillGameContent(row)
                result.data.append(game_content)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameContentUuid(self, set_type, obj) :            
            return self.data.SetGameContentUuid(set_type, obj)
            
    def SetGameContentGameId(self, set_type, obj) :            
            return self.data.SetGameContentGameId(set_type, obj)
            
    def SetGameContentGameIdPath(self, set_type, obj) :            
            return self.data.SetGameContentGameIdPath(set_type, obj)
            
    def SetGameContentGameIdPathVersion(self, set_type, obj) :            
            return self.data.SetGameContentGameIdPathVersion(set_type, obj)
            
    def SetGameContentGameIdPathVersionPlatformIncrement(self, set_type, obj) :            
            return self.data.SetGameContentGameIdPathVersionPlatformIncrement(set_type, obj)
            
    def DelGameContentUuid(self
        , uuid
    ) :
        return self.data.DelGameContentUuid(
            uuid
        )
        
    def DelGameContentGameId(self
        , game_id
    ) :
        return self.data.DelGameContentGameId(
            game_id
        )
        
    def DelGameContentGameIdPath(self
        , game_id
        , path
    ) :
        return self.data.DelGameContentGameIdPath(
            game_id
            , path
        )
        
    def DelGameContentGameIdPathVersion(self
        , game_id
        , path
        , version
    ) :
        return self.data.DelGameContentGameIdPathVersion(
            game_id
            , path
            , version
        )
        
    def DelGameContentGameIdPathVersionPlatformIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :
        return self.data.DelGameContentGameIdPathVersionPlatformIncrement(
            game_id
            , path
            , version
            , platform
            , increment
        )
        
    def GetGameContentList(self
    ) :

        results = []
        rows = self.data.GetGameContentList(
        )
        
        if(rows != None) :
            for row in rows :
                game_content  = self.FillGameContent(row)
                results.append(game_content)
            return results        
        
    def GetGameContentListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameContentListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_content  = self.FillGameContent(row)
                results.append(game_content)
            return results        
        
    def GetGameContentListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameContentListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_content  = self.FillGameContent(row)
                results.append(game_content)
            return results        
        
    def GetGameContentListGameIdPath(self
        , game_id
        , path
    ) :

        results = []
        rows = self.data.GetGameContentListGameIdPath(
            game_id
            , path
        )
        
        if(rows != None) :
            for row in rows :
                game_content  = self.FillGameContent(row)
                results.append(game_content)
            return results        
        
    def GetGameContentListGameIdPathVersion(self
        , game_id
        , path
        , version
    ) :

        results = []
        rows = self.data.GetGameContentListGameIdPathVersion(
            game_id
            , path
            , version
        )
        
        if(rows != None) :
            for row in rows :
                game_content  = self.FillGameContent(row)
                results.append(game_content)
            return results        
        
    def GetGameContentListGameIdPathVersionPlatformIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :

        results = []
        rows = self.data.GetGameContentListGameIdPathVersionPlatformIncrement(
            game_id
            , path
            , version
            , platform
            , increment
        )
        
        if(rows != None) :
            for row in rows :
                game_content  = self.FillGameContent(row)
                results.append(game_content)
            return results        
        
        
    def FillGameProfileContent(self, row) :
        obj = GameProfileContent()

        if (row['username'] != None) :                 
            obj.username = row['username'] #dataType.FillData(dr, "username");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['increment'] != None) :                 
            obj.increment = row['increment'] #dataType.FillData(dr, "increment");                
        if (row['path'] != None) :                 
            obj.path = row['path'] #dataType.FillData(dr, "path");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['platform'] != None) :                 
            obj.platform = row['platform'] #dataType.FillData(dr, "platform");                
        if (row['filename'] != None) :                 
            obj.filename = row['filename'] #dataType.FillData(dr, "filename");                
        if (row['source'] != None) :                 
            obj.source = row['source'] #dataType.FillData(dr, "source");                
        if (row['version'] != None) :                 
            obj.version = row['version'] #dataType.FillData(dr, "version");                
        if (row['game_network'] != None) :                 
            obj.game_network = row['game_network'] #dataType.FillData(dr, "game_network");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['hash'] != None) :                 
            obj.hash = row['hash'] #dataType.FillData(dr, "hash");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                
        if (row['content_type'] != None) :                 
            obj.content_type = row['content_type'] #dataType.FillData(dr, "content_type");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['extension'] != None) :                 
            obj.extension = row['extension'] #dataType.FillData(dr, "extension");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                

        return obj
        
    def CountGameProfileContent(self
    ) :         
        return self.data.CountGameProfileContent(
        )
               
    def CountGameProfileContentUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileContentUuid(
            uuid
        )
               
    def CountGameProfileContentGameIdProfileId(self
        , game_id
        , profile_id
    ) :         
        return self.data.CountGameProfileContentGameIdProfileId(
            game_id
            , profile_id
        )
               
    def CountGameProfileContentGameIdUsername(self
        , game_id
        , username
    ) :         
        return self.data.CountGameProfileContentGameIdUsername(
            game_id
            , username
        )
               
    def CountGameProfileContentUsername(self
        , username
    ) :         
        return self.data.CountGameProfileContentUsername(
            username
        )
               
    def CountGameProfileContentGameIdProfileIdPath(self
        , game_id
        , profile_id
        , path
    ) :         
        return self.data.CountGameProfileContentGameIdProfileIdPath(
            game_id
            , profile_id
            , path
        )
               
    def CountGameProfileContentGameIdProfileIdPathVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :         
        return self.data.CountGameProfileContentGameIdProfileIdPathVersion(
            game_id
            , profile_id
            , path
            , version
        )
               
    def CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :         
        return self.data.CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
        )
               
    def CountGameProfileContentGameIdUsernamePath(self
        , game_id
        , username
        , path
    ) :         
        return self.data.CountGameProfileContentGameIdUsernamePath(
            game_id
            , username
            , path
        )
               
    def CountGameProfileContentGameIdUsernamePathVersion(self
        , game_id
        , username
        , path
        , version
    ) :         
        return self.data.CountGameProfileContentGameIdUsernamePathVersion(
            game_id
            , username
            , path
            , version
        )
               
    def CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :         
        return self.data.CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
            game_id
            , username
            , path
            , version
            , platform
            , increment
        )
               
    def BrowseGameProfileContentListFilter(self, filter_obj) :
        result = GameProfileContentResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileContentListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_content = self.FillGameProfileContent(row)
                result.data.append(game_profile_content)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileContentUuid(self, set_type, obj) :            
            return self.data.SetGameProfileContentUuid(set_type, obj)
            
    def SetGameProfileContentGameIdProfileId(self, set_type, obj) :            
            return self.data.SetGameProfileContentGameIdProfileId(set_type, obj)
            
    def SetGameProfileContentGameIdUsername(self, set_type, obj) :            
            return self.data.SetGameProfileContentGameIdUsername(set_type, obj)
            
    def SetGameProfileContentUsername(self, set_type, obj) :            
            return self.data.SetGameProfileContentUsername(set_type, obj)
            
    def SetGameProfileContentGameIdProfileIdPath(self, set_type, obj) :            
            return self.data.SetGameProfileContentGameIdProfileIdPath(set_type, obj)
            
    def SetGameProfileContentGameIdProfileIdPathVersion(self, set_type, obj) :            
            return self.data.SetGameProfileContentGameIdProfileIdPathVersion(set_type, obj)
            
    def SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(self, set_type, obj) :            
            return self.data.SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(set_type, obj)
            
    def SetGameProfileContentGameIdUsernamePath(self, set_type, obj) :            
            return self.data.SetGameProfileContentGameIdUsernamePath(set_type, obj)
            
    def SetGameProfileContentGameIdUsernamePathVersion(self, set_type, obj) :            
            return self.data.SetGameProfileContentGameIdUsernamePathVersion(set_type, obj)
            
    def SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(self, set_type, obj) :            
            return self.data.SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(set_type, obj)
            
    def DelGameProfileContentUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileContentUuid(
            uuid
        )
        
    def DelGameProfileContentGameIdProfileId(self
        , game_id
        , profile_id
    ) :
        return self.data.DelGameProfileContentGameIdProfileId(
            game_id
            , profile_id
        )
        
    def DelGameProfileContentGameIdUsername(self
        , game_id
        , username
    ) :
        return self.data.DelGameProfileContentGameIdUsername(
            game_id
            , username
        )
        
    def DelGameProfileContentUsername(self
        , username
    ) :
        return self.data.DelGameProfileContentUsername(
            username
        )
        
    def DelGameProfileContentGameIdProfileIdPath(self
        , game_id
        , profile_id
        , path
    ) :
        return self.data.DelGameProfileContentGameIdProfileIdPath(
            game_id
            , profile_id
            , path
        )
        
    def DelGameProfileContentGameIdProfileIdPathVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :
        return self.data.DelGameProfileContentGameIdProfileIdPathVersion(
            game_id
            , profile_id
            , path
            , version
        )
        
    def DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :
        return self.data.DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
        )
        
    def DelGameProfileContentGameIdUsernamePath(self
        , game_id
        , username
        , path
    ) :
        return self.data.DelGameProfileContentGameIdUsernamePath(
            game_id
            , username
            , path
        )
        
    def DelGameProfileContentGameIdUsernamePathVersion(self
        , game_id
        , username
        , path
        , version
    ) :
        return self.data.DelGameProfileContentGameIdUsernamePathVersion(
            game_id
            , username
            , path
            , version
        )
        
    def DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :
        return self.data.DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(
            game_id
            , username
            , path
            , version
            , platform
            , increment
        )
        
    def GetGameProfileContentList(self
    ) :

        results = []
        rows = self.data.GetGameProfileContentList(
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileContentListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListGameIdProfileId(self
        , game_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameProfileContentListGameIdProfileId(
            game_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListGameIdUsername(self
        , game_id
        , username
    ) :

        results = []
        rows = self.data.GetGameProfileContentListGameIdUsername(
            game_id
            , username
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListUsername(self
        , username
    ) :

        results = []
        rows = self.data.GetGameProfileContentListUsername(
            username
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListGameIdProfileIdPath(self
        , game_id
        , profile_id
        , path
    ) :

        results = []
        rows = self.data.GetGameProfileContentListGameIdProfileIdPath(
            game_id
            , profile_id
            , path
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListGameIdProfileIdPathVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :

        results = []
        rows = self.data.GetGameProfileContentListGameIdProfileIdPathVersion(
            game_id
            , profile_id
            , path
            , version
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :

        results = []
        rows = self.data.GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListGameIdUsernamePath(self
        , game_id
        , username
        , path
    ) :

        results = []
        rows = self.data.GetGameProfileContentListGameIdUsernamePath(
            game_id
            , username
            , path
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListGameIdUsernamePathVersion(self
        , game_id
        , username
        , path
        , version
    ) :

        results = []
        rows = self.data.GetGameProfileContentListGameIdUsernamePathVersion(
            game_id
            , username
            , path
            , version
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :

        results = []
        rows = self.data.GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(
            game_id
            , username
            , path
            , version
            , platform
            , increment
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
        
    def FillGameApp(self, row) :
        obj = GameApp()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['app_id'] != None) :                 
            obj.app_id = row['app_id'] #dataType.FillData(dr, "app_id");                

        return obj
        
    def CountGameApp(self
    ) :         
        return self.data.CountGameApp(
        )
               
    def CountGameAppUuid(self
        , uuid
    ) :         
        return self.data.CountGameAppUuid(
            uuid
        )
               
    def CountGameAppGameId(self
        , game_id
    ) :         
        return self.data.CountGameAppGameId(
            game_id
        )
               
    def CountGameAppAppId(self
        , app_id
    ) :         
        return self.data.CountGameAppAppId(
            app_id
        )
               
    def CountGameAppGameIdAppId(self
        , game_id
        , app_id
    ) :         
        return self.data.CountGameAppGameIdAppId(
            game_id
            , app_id
        )
               
    def BrowseGameAppListFilter(self, filter_obj) :
        result = GameAppResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameAppListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_app = self.FillGameApp(row)
                result.data.append(game_app)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameAppUuid(self, set_type, obj) :            
            return self.data.SetGameAppUuid(set_type, obj)
            
    def DelGameAppUuid(self
        , uuid
    ) :
        return self.data.DelGameAppUuid(
            uuid
        )
        
    def GetGameAppList(self
    ) :

        results = []
        rows = self.data.GetGameAppList(
        )
        
        if(rows != None) :
            for row in rows :
                game_app  = self.FillGameApp(row)
                results.append(game_app)
            return results        
        
    def GetGameAppListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameAppListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_app  = self.FillGameApp(row)
                results.append(game_app)
            return results        
        
    def GetGameAppListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAppListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_app  = self.FillGameApp(row)
                results.append(game_app)
            return results        
        
    def GetGameAppListAppId(self
        , app_id
    ) :

        results = []
        rows = self.data.GetGameAppListAppId(
            app_id
        )
        
        if(rows != None) :
            for row in rows :
                game_app  = self.FillGameApp(row)
                results.append(game_app)
            return results        
        
    def GetGameAppListGameIdAppId(self
        , game_id
        , app_id
    ) :

        results = []
        rows = self.data.GetGameAppListGameIdAppId(
            game_id
            , app_id
        )
        
        if(rows != None) :
            for row in rows :
                game_app  = self.FillGameApp(row)
                results.append(game_app)
            return results        
        
        
    def FillProfileGameLocation(self, row) :
        obj = ProfileGameLocation()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['game_location_id'] != None) :                 
            obj.game_location_id = row['game_location_id'] #dataType.FillData(dr, "game_location_id");                
        if (row['type_id'] != None) :                 
            obj.type_id = row['type_id'] #dataType.FillData(dr, "type_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountProfileGameLocation(self
    ) :         
        return self.data.CountProfileGameLocation(
        )
               
    def CountProfileGameLocationUuid(self
        , uuid
    ) :         
        return self.data.CountProfileGameLocationUuid(
            uuid
        )
               
    def CountProfileGameLocationGameLocationId(self
        , game_location_id
    ) :         
        return self.data.CountProfileGameLocationGameLocationId(
            game_location_id
        )
               
    def CountProfileGameLocationProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileGameLocationProfileId(
            profile_id
        )
               
    def CountProfileGameLocationProfileIdGameLocationId(self
        , profile_id
        , game_location_id
    ) :         
        return self.data.CountProfileGameLocationProfileIdGameLocationId(
            profile_id
            , game_location_id
        )
               
    def BrowseProfileGameLocationListFilter(self, filter_obj) :
        result = ProfileGameLocationResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileGameLocationListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_game_location = self.FillProfileGameLocation(row)
                result.data.append(profile_game_location)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileGameLocationUuid(self, set_type, obj) :            
            return self.data.SetProfileGameLocationUuid(set_type, obj)
            
    def DelProfileGameLocationUuid(self
        , uuid
    ) :
        return self.data.DelProfileGameLocationUuid(
            uuid
        )
        
    def GetProfileGameLocationList(self
    ) :

        results = []
        rows = self.data.GetProfileGameLocationList(
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_location  = self.FillProfileGameLocation(row)
                results.append(profile_game_location)
            return results        
        
    def GetProfileGameLocationListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileGameLocationListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_location  = self.FillProfileGameLocation(row)
                results.append(profile_game_location)
            return results        
        
    def GetProfileGameLocationListGameLocationId(self
        , game_location_id
    ) :

        results = []
        rows = self.data.GetProfileGameLocationListGameLocationId(
            game_location_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_location  = self.FillProfileGameLocation(row)
                results.append(profile_game_location)
            return results        
        
    def GetProfileGameLocationListProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileGameLocationListProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_location  = self.FillProfileGameLocation(row)
                results.append(profile_game_location)
            return results        
        
    def GetProfileGameLocationListProfileIdGameLocationId(self
        , profile_id
        , game_location_id
    ) :

        results = []
        rows = self.data.GetProfileGameLocationListProfileIdGameLocationId(
            profile_id
            , game_location_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_location  = self.FillProfileGameLocation(row)
                results.append(profile_game_location)
            return results        
        
        
    def FillGamePhoto(self, row) :
        obj = GamePhoto()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['third_party_oembed'] != None) :                 
            obj.third_party_oembed = row['third_party_oembed'] #dataType.FillData(dr, "third_party_oembed");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['url'] != None) :                 
            obj.url = row['url'] #dataType.FillData(dr, "url");                
        if (row['third_party_data'] != None) :                 
            obj.third_party_data = row['third_party_data'] #dataType.FillData(dr, "third_party_data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['third_party_url'] != None) :                 
            obj.third_party_url = row['third_party_url'] #dataType.FillData(dr, "third_party_url");                
        if (row['third_party_id'] != None) :                 
            obj.third_party_id = row['third_party_id'] #dataType.FillData(dr, "third_party_id");                
        if (row['content_type'] != None) :                 
            obj.content_type = row['content_type'] #dataType.FillData(dr, "content_type");                
        if (row['external_id'] != None) :                 
            obj.external_id = row['external_id'] #dataType.FillData(dr, "external_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGamePhoto(self
    ) :         
        return self.data.CountGamePhoto(
        )
               
    def CountGamePhotoUuid(self
        , uuid
    ) :         
        return self.data.CountGamePhotoUuid(
            uuid
        )
               
    def CountGamePhotoExternalId(self
        , external_id
    ) :         
        return self.data.CountGamePhotoExternalId(
            external_id
        )
               
    def CountGamePhotoUrl(self
        , url
    ) :         
        return self.data.CountGamePhotoUrl(
            url
        )
               
    def CountGamePhotoUrlExternalId(self
        , url
        , external_id
    ) :         
        return self.data.CountGamePhotoUrlExternalId(
            url
            , external_id
        )
               
    def CountGamePhotoUuidExternalId(self
        , uuid
        , external_id
    ) :         
        return self.data.CountGamePhotoUuidExternalId(
            uuid
            , external_id
        )
               
    def BrowseGamePhotoListFilter(self, filter_obj) :
        result = GamePhotoResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGamePhotoListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_photo = self.FillGamePhoto(row)
                result.data.append(game_photo)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGamePhotoUuid(self, set_type, obj) :            
            return self.data.SetGamePhotoUuid(set_type, obj)
            
    def SetGamePhotoExternalId(self, set_type, obj) :            
            return self.data.SetGamePhotoExternalId(set_type, obj)
            
    def SetGamePhotoUrl(self, set_type, obj) :            
            return self.data.SetGamePhotoUrl(set_type, obj)
            
    def SetGamePhotoUrlExternalId(self, set_type, obj) :            
            return self.data.SetGamePhotoUrlExternalId(set_type, obj)
            
    def SetGamePhotoUuidExternalId(self, set_type, obj) :            
            return self.data.SetGamePhotoUuidExternalId(set_type, obj)
            
    def DelGamePhotoUuid(self
        , uuid
    ) :
        return self.data.DelGamePhotoUuid(
            uuid
        )
        
    def DelGamePhotoExternalId(self
        , external_id
    ) :
        return self.data.DelGamePhotoExternalId(
            external_id
        )
        
    def DelGamePhotoUrl(self
        , url
    ) :
        return self.data.DelGamePhotoUrl(
            url
        )
        
    def DelGamePhotoUrlExternalId(self
        , url
        , external_id
    ) :
        return self.data.DelGamePhotoUrlExternalId(
            url
            , external_id
        )
        
    def DelGamePhotoUuidExternalId(self
        , uuid
        , external_id
    ) :
        return self.data.DelGamePhotoUuidExternalId(
            uuid
            , external_id
        )
        
    def GetGamePhotoList(self
    ) :

        results = []
        rows = self.data.GetGamePhotoList(
        )
        
        if(rows != None) :
            for row in rows :
                game_photo  = self.FillGamePhoto(row)
                results.append(game_photo)
            return results        
        
    def GetGamePhotoListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGamePhotoListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_photo  = self.FillGamePhoto(row)
                results.append(game_photo)
            return results        
        
    def GetGamePhotoListExternalId(self
        , external_id
    ) :

        results = []
        rows = self.data.GetGamePhotoListExternalId(
            external_id
        )
        
        if(rows != None) :
            for row in rows :
                game_photo  = self.FillGamePhoto(row)
                results.append(game_photo)
            return results        
        
    def GetGamePhotoListUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetGamePhotoListUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                game_photo  = self.FillGamePhoto(row)
                results.append(game_photo)
            return results        
        
    def GetGamePhotoListUrlExternalId(self
        , url
        , external_id
    ) :

        results = []
        rows = self.data.GetGamePhotoListUrlExternalId(
            url
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                game_photo  = self.FillGamePhoto(row)
                results.append(game_photo)
            return results        
        
    def GetGamePhotoListUuidExternalId(self
        , uuid
        , external_id
    ) :

        results = []
        rows = self.data.GetGamePhotoListUuidExternalId(
            uuid
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                game_photo  = self.FillGamePhoto(row)
                results.append(game_photo)
            return results        
        
        
    def FillGameVideo(self, row) :
        obj = GameVideo()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['third_party_oembed'] != None) :                 
            obj.third_party_oembed = row['third_party_oembed'] #dataType.FillData(dr, "third_party_oembed");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['url'] != None) :                 
            obj.url = row['url'] #dataType.FillData(dr, "url");                
        if (row['third_party_data'] != None) :                 
            obj.third_party_data = row['third_party_data'] #dataType.FillData(dr, "third_party_data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['third_party_url'] != None) :                 
            obj.third_party_url = row['third_party_url'] #dataType.FillData(dr, "third_party_url");                
        if (row['third_party_id'] != None) :                 
            obj.third_party_id = row['third_party_id'] #dataType.FillData(dr, "third_party_id");                
        if (row['content_type'] != None) :                 
            obj.content_type = row['content_type'] #dataType.FillData(dr, "content_type");                
        if (row['external_id'] != None) :                 
            obj.external_id = row['external_id'] #dataType.FillData(dr, "external_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameVideo(self
    ) :         
        return self.data.CountGameVideo(
        )
               
    def CountGameVideoUuid(self
        , uuid
    ) :         
        return self.data.CountGameVideoUuid(
            uuid
        )
               
    def CountGameVideoExternalId(self
        , external_id
    ) :         
        return self.data.CountGameVideoExternalId(
            external_id
        )
               
    def CountGameVideoUrl(self
        , url
    ) :         
        return self.data.CountGameVideoUrl(
            url
        )
               
    def CountGameVideoUrlExternalId(self
        , url
        , external_id
    ) :         
        return self.data.CountGameVideoUrlExternalId(
            url
            , external_id
        )
               
    def CountGameVideoUuidExternalId(self
        , uuid
        , external_id
    ) :         
        return self.data.CountGameVideoUuidExternalId(
            uuid
            , external_id
        )
               
    def BrowseGameVideoListFilter(self, filter_obj) :
        result = GameVideoResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameVideoListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_video = self.FillGameVideo(row)
                result.data.append(game_video)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameVideoUuid(self, set_type, obj) :            
            return self.data.SetGameVideoUuid(set_type, obj)
            
    def SetGameVideoExternalId(self, set_type, obj) :            
            return self.data.SetGameVideoExternalId(set_type, obj)
            
    def SetGameVideoUrl(self, set_type, obj) :            
            return self.data.SetGameVideoUrl(set_type, obj)
            
    def SetGameVideoUrlExternalId(self, set_type, obj) :            
            return self.data.SetGameVideoUrlExternalId(set_type, obj)
            
    def SetGameVideoUuidExternalId(self, set_type, obj) :            
            return self.data.SetGameVideoUuidExternalId(set_type, obj)
            
    def DelGameVideoUuid(self
        , uuid
    ) :
        return self.data.DelGameVideoUuid(
            uuid
        )
        
    def DelGameVideoExternalId(self
        , external_id
    ) :
        return self.data.DelGameVideoExternalId(
            external_id
        )
        
    def DelGameVideoUrl(self
        , url
    ) :
        return self.data.DelGameVideoUrl(
            url
        )
        
    def DelGameVideoUrlExternalId(self
        , url
        , external_id
    ) :
        return self.data.DelGameVideoUrlExternalId(
            url
            , external_id
        )
        
    def DelGameVideoUuidExternalId(self
        , uuid
        , external_id
    ) :
        return self.data.DelGameVideoUuidExternalId(
            uuid
            , external_id
        )
        
    def GetGameVideoList(self
    ) :

        results = []
        rows = self.data.GetGameVideoList(
        )
        
        if(rows != None) :
            for row in rows :
                game_video  = self.FillGameVideo(row)
                results.append(game_video)
            return results        
        
    def GetGameVideoListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameVideoListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_video  = self.FillGameVideo(row)
                results.append(game_video)
            return results        
        
    def GetGameVideoListExternalId(self
        , external_id
    ) :

        results = []
        rows = self.data.GetGameVideoListExternalId(
            external_id
        )
        
        if(rows != None) :
            for row in rows :
                game_video  = self.FillGameVideo(row)
                results.append(game_video)
            return results        
        
    def GetGameVideoListUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetGameVideoListUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                game_video  = self.FillGameVideo(row)
                results.append(game_video)
            return results        
        
    def GetGameVideoListUrlExternalId(self
        , url
        , external_id
    ) :

        results = []
        rows = self.data.GetGameVideoListUrlExternalId(
            url
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                game_video  = self.FillGameVideo(row)
                results.append(game_video)
            return results        
        
    def GetGameVideoListUuidExternalId(self
        , uuid
        , external_id
    ) :

        results = []
        rows = self.data.GetGameVideoListUuidExternalId(
            uuid
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                game_video  = self.FillGameVideo(row)
                results.append(game_video)
            return results        
        
        
    def FillGameRpgItemWeapon(self, row) :
        obj = GameRpgItemWeapon()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['third_party_oembed'] != None) :                 
            obj.third_party_oembed = row['third_party_oembed'] #dataType.FillData(dr, "third_party_oembed");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                
        if (row['game_defense'] != None) :                 
            obj.game_defense = row['game_defense'] #dataType.FillData(dr, "game_defense");                
        if (row['third_party_url'] != None) :                 
            obj.third_party_url = row['third_party_url'] #dataType.FillData(dr, "third_party_url");                
        if (row['third_party_id'] != None) :                 
            obj.third_party_id = row['third_party_id'] #dataType.FillData(dr, "third_party_id");                
        if (row['content_type'] != None) :                 
            obj.content_type = row['content_type'] #dataType.FillData(dr, "content_type");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['game_attack'] != None) :                 
            obj.game_attack = row['game_attack'] #dataType.FillData(dr, "game_attack");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['url'] != None) :                 
            obj.url = row['url'] #dataType.FillData(dr, "url");                
        if (row['third_party_data'] != None) :                 
            obj.third_party_data = row['third_party_data'] #dataType.FillData(dr, "third_party_data");                
        if (row['game_price'] != None) :                 
            obj.game_price = row['game_price'] #dataType.FillData(dr, "game_price");                
        if (row['game_type'] != None) :                 
            obj.game_type = row['game_type'] #dataType.FillData(dr, "game_type");                
        if (row['game_skill'] != None) :                 
            obj.game_skill = row['game_skill'] #dataType.FillData(dr, "game_skill");                
        if (row['game_health'] != None) :                 
            obj.game_health = row['game_health'] #dataType.FillData(dr, "game_health");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['game_energy'] != None) :                 
            obj.game_energy = row['game_energy'] #dataType.FillData(dr, "game_energy");                
        if (row['game_data'] != None) :                 
            obj.game_data = row['game_data'] #dataType.FillData(dr, "game_data");                

        return obj
        
    def CountGameRpgItemWeapon(self
    ) :         
        return self.data.CountGameRpgItemWeapon(
        )
               
    def CountGameRpgItemWeaponUuid(self
        , uuid
    ) :         
        return self.data.CountGameRpgItemWeaponUuid(
            uuid
        )
               
    def CountGameRpgItemWeaponGameId(self
        , game_id
    ) :         
        return self.data.CountGameRpgItemWeaponGameId(
            game_id
        )
               
    def CountGameRpgItemWeaponUrl(self
        , url
    ) :         
        return self.data.CountGameRpgItemWeaponUrl(
            url
        )
               
    def CountGameRpgItemWeaponUrlGameId(self
        , url
        , game_id
    ) :         
        return self.data.CountGameRpgItemWeaponUrlGameId(
            url
            , game_id
        )
               
    def CountGameRpgItemWeaponUuidGameId(self
        , uuid
        , game_id
    ) :         
        return self.data.CountGameRpgItemWeaponUuidGameId(
            uuid
            , game_id
        )
               
    def BrowseGameRpgItemWeaponListFilter(self, filter_obj) :
        result = GameRpgItemWeaponResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameRpgItemWeaponListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon = self.FillGameRpgItemWeapon(row)
                result.data.append(game_rpg_item_weapon)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameRpgItemWeaponUuid(self, set_type, obj) :            
            return self.data.SetGameRpgItemWeaponUuid(set_type, obj)
            
    def SetGameRpgItemWeaponGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemWeaponGameId(set_type, obj)
            
    def SetGameRpgItemWeaponUrl(self, set_type, obj) :            
            return self.data.SetGameRpgItemWeaponUrl(set_type, obj)
            
    def SetGameRpgItemWeaponUrlGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemWeaponUrlGameId(set_type, obj)
            
    def SetGameRpgItemWeaponUuidGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemWeaponUuidGameId(set_type, obj)
            
    def DelGameRpgItemWeaponUuid(self
        , uuid
    ) :
        return self.data.DelGameRpgItemWeaponUuid(
            uuid
        )
        
    def DelGameRpgItemWeaponGameId(self
        , game_id
    ) :
        return self.data.DelGameRpgItemWeaponGameId(
            game_id
        )
        
    def DelGameRpgItemWeaponUrl(self
        , url
    ) :
        return self.data.DelGameRpgItemWeaponUrl(
            url
        )
        
    def DelGameRpgItemWeaponUrlGameId(self
        , url
        , game_id
    ) :
        return self.data.DelGameRpgItemWeaponUrlGameId(
            url
            , game_id
        )
        
    def DelGameRpgItemWeaponUuidGameId(self
        , uuid
        , game_id
    ) :
        return self.data.DelGameRpgItemWeaponUuidGameId(
            uuid
            , game_id
        )
        
    def GetGameRpgItemWeaponList(self
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponList(
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon  = self.FillGameRpgItemWeapon(row)
                results.append(game_rpg_item_weapon)
            return results        
        
    def GetGameRpgItemWeaponListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon  = self.FillGameRpgItemWeapon(row)
                results.append(game_rpg_item_weapon)
            return results        
        
    def GetGameRpgItemWeaponListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon  = self.FillGameRpgItemWeapon(row)
                results.append(game_rpg_item_weapon)
            return results        
        
    def GetGameRpgItemWeaponListUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponListUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon  = self.FillGameRpgItemWeapon(row)
                results.append(game_rpg_item_weapon)
            return results        
        
    def GetGameRpgItemWeaponListUrlGameId(self
        , url
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponListUrlGameId(
            url
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon  = self.FillGameRpgItemWeapon(row)
                results.append(game_rpg_item_weapon)
            return results        
        
    def GetGameRpgItemWeaponListUuidGameId(self
        , uuid
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponListUuidGameId(
            uuid
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon  = self.FillGameRpgItemWeapon(row)
                results.append(game_rpg_item_weapon)
            return results        
        
        
    def FillGameRpgItemSkill(self, row) :
        obj = GameRpgItemSkill()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['third_party_oembed'] != None) :                 
            obj.third_party_oembed = row['third_party_oembed'] #dataType.FillData(dr, "third_party_oembed");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                
        if (row['game_defense'] != None) :                 
            obj.game_defense = row['game_defense'] #dataType.FillData(dr, "game_defense");                
        if (row['third_party_url'] != None) :                 
            obj.third_party_url = row['third_party_url'] #dataType.FillData(dr, "third_party_url");                
        if (row['third_party_id'] != None) :                 
            obj.third_party_id = row['third_party_id'] #dataType.FillData(dr, "third_party_id");                
        if (row['content_type'] != None) :                 
            obj.content_type = row['content_type'] #dataType.FillData(dr, "content_type");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['game_attack'] != None) :                 
            obj.game_attack = row['game_attack'] #dataType.FillData(dr, "game_attack");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['url'] != None) :                 
            obj.url = row['url'] #dataType.FillData(dr, "url");                
        if (row['third_party_data'] != None) :                 
            obj.third_party_data = row['third_party_data'] #dataType.FillData(dr, "third_party_data");                
        if (row['game_price'] != None) :                 
            obj.game_price = row['game_price'] #dataType.FillData(dr, "game_price");                
        if (row['game_type'] != None) :                 
            obj.game_type = row['game_type'] #dataType.FillData(dr, "game_type");                
        if (row['game_skill'] != None) :                 
            obj.game_skill = row['game_skill'] #dataType.FillData(dr, "game_skill");                
        if (row['game_health'] != None) :                 
            obj.game_health = row['game_health'] #dataType.FillData(dr, "game_health");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['game_energy'] != None) :                 
            obj.game_energy = row['game_energy'] #dataType.FillData(dr, "game_energy");                
        if (row['game_data'] != None) :                 
            obj.game_data = row['game_data'] #dataType.FillData(dr, "game_data");                

        return obj
        
    def CountGameRpgItemSkill(self
    ) :         
        return self.data.CountGameRpgItemSkill(
        )
               
    def CountGameRpgItemSkillUuid(self
        , uuid
    ) :         
        return self.data.CountGameRpgItemSkillUuid(
            uuid
        )
               
    def CountGameRpgItemSkillGameId(self
        , game_id
    ) :         
        return self.data.CountGameRpgItemSkillGameId(
            game_id
        )
               
    def CountGameRpgItemSkillUrl(self
        , url
    ) :         
        return self.data.CountGameRpgItemSkillUrl(
            url
        )
               
    def CountGameRpgItemSkillUrlGameId(self
        , url
        , game_id
    ) :         
        return self.data.CountGameRpgItemSkillUrlGameId(
            url
            , game_id
        )
               
    def CountGameRpgItemSkillUuidGameId(self
        , uuid
        , game_id
    ) :         
        return self.data.CountGameRpgItemSkillUuidGameId(
            uuid
            , game_id
        )
               
    def BrowseGameRpgItemSkillListFilter(self, filter_obj) :
        result = GameRpgItemSkillResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameRpgItemSkillListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill = self.FillGameRpgItemSkill(row)
                result.data.append(game_rpg_item_skill)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameRpgItemSkillUuid(self, set_type, obj) :            
            return self.data.SetGameRpgItemSkillUuid(set_type, obj)
            
    def SetGameRpgItemSkillGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemSkillGameId(set_type, obj)
            
    def SetGameRpgItemSkillUrl(self, set_type, obj) :            
            return self.data.SetGameRpgItemSkillUrl(set_type, obj)
            
    def SetGameRpgItemSkillUrlGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemSkillUrlGameId(set_type, obj)
            
    def SetGameRpgItemSkillUuidGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemSkillUuidGameId(set_type, obj)
            
    def DelGameRpgItemSkillUuid(self
        , uuid
    ) :
        return self.data.DelGameRpgItemSkillUuid(
            uuid
        )
        
    def DelGameRpgItemSkillGameId(self
        , game_id
    ) :
        return self.data.DelGameRpgItemSkillGameId(
            game_id
        )
        
    def DelGameRpgItemSkillUrl(self
        , url
    ) :
        return self.data.DelGameRpgItemSkillUrl(
            url
        )
        
    def DelGameRpgItemSkillUrlGameId(self
        , url
        , game_id
    ) :
        return self.data.DelGameRpgItemSkillUrlGameId(
            url
            , game_id
        )
        
    def DelGameRpgItemSkillUuidGameId(self
        , uuid
        , game_id
    ) :
        return self.data.DelGameRpgItemSkillUuidGameId(
            uuid
            , game_id
        )
        
    def GetGameRpgItemSkillList(self
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillList(
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill  = self.FillGameRpgItemSkill(row)
                results.append(game_rpg_item_skill)
            return results        
        
    def GetGameRpgItemSkillListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill  = self.FillGameRpgItemSkill(row)
                results.append(game_rpg_item_skill)
            return results        
        
    def GetGameRpgItemSkillListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill  = self.FillGameRpgItemSkill(row)
                results.append(game_rpg_item_skill)
            return results        
        
    def GetGameRpgItemSkillListUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillListUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill  = self.FillGameRpgItemSkill(row)
                results.append(game_rpg_item_skill)
            return results        
        
    def GetGameRpgItemSkillListUrlGameId(self
        , url
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillListUrlGameId(
            url
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill  = self.FillGameRpgItemSkill(row)
                results.append(game_rpg_item_skill)
            return results        
        
    def GetGameRpgItemSkillListUuidGameId(self
        , uuid
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillListUuidGameId(
            uuid
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill  = self.FillGameRpgItemSkill(row)
                results.append(game_rpg_item_skill)
            return results        
        
        
    def FillGameProduct(self, row) :
        obj = GameProduct()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['url'] != None) :                 
            obj.url = row['url'] #dataType.FillData(dr, "url");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameProduct(self
    ) :         
        return self.data.CountGameProduct(
        )
               
    def CountGameProductUuid(self
        , uuid
    ) :         
        return self.data.CountGameProductUuid(
            uuid
        )
               
    def CountGameProductGameId(self
        , game_id
    ) :         
        return self.data.CountGameProductGameId(
            game_id
        )
               
    def CountGameProductUrl(self
        , url
    ) :         
        return self.data.CountGameProductUrl(
            url
        )
               
    def CountGameProductUrlGameId(self
        , url
        , game_id
    ) :         
        return self.data.CountGameProductUrlGameId(
            url
            , game_id
        )
               
    def CountGameProductUuidGameId(self
        , uuid
        , game_id
    ) :         
        return self.data.CountGameProductUuidGameId(
            uuid
            , game_id
        )
               
    def BrowseGameProductListFilter(self, filter_obj) :
        result = GameProductResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProductListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_product = self.FillGameProduct(row)
                result.data.append(game_product)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProductUuid(self, set_type, obj) :            
            return self.data.SetGameProductUuid(set_type, obj)
            
    def SetGameProductGameId(self, set_type, obj) :            
            return self.data.SetGameProductGameId(set_type, obj)
            
    def SetGameProductUrl(self, set_type, obj) :            
            return self.data.SetGameProductUrl(set_type, obj)
            
    def SetGameProductUrlGameId(self, set_type, obj) :            
            return self.data.SetGameProductUrlGameId(set_type, obj)
            
    def SetGameProductUuidGameId(self, set_type, obj) :            
            return self.data.SetGameProductUuidGameId(set_type, obj)
            
    def DelGameProductUuid(self
        , uuid
    ) :
        return self.data.DelGameProductUuid(
            uuid
        )
        
    def DelGameProductGameId(self
        , game_id
    ) :
        return self.data.DelGameProductGameId(
            game_id
        )
        
    def DelGameProductUrl(self
        , url
    ) :
        return self.data.DelGameProductUrl(
            url
        )
        
    def DelGameProductUrlGameId(self
        , url
        , game_id
    ) :
        return self.data.DelGameProductUrlGameId(
            url
            , game_id
        )
        
    def DelGameProductUuidGameId(self
        , uuid
        , game_id
    ) :
        return self.data.DelGameProductUuidGameId(
            uuid
            , game_id
        )
        
    def GetGameProductList(self
    ) :

        results = []
        rows = self.data.GetGameProductList(
        )
        
        if(rows != None) :
            for row in rows :
                game_product  = self.FillGameProduct(row)
                results.append(game_product)
            return results        
        
    def GetGameProductListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProductListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_product  = self.FillGameProduct(row)
                results.append(game_product)
            return results        
        
    def GetGameProductListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProductListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_product  = self.FillGameProduct(row)
                results.append(game_product)
            return results        
        
    def GetGameProductListUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetGameProductListUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                game_product  = self.FillGameProduct(row)
                results.append(game_product)
            return results        
        
    def GetGameProductListUrlGameId(self
        , url
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProductListUrlGameId(
            url
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_product  = self.FillGameProduct(row)
                results.append(game_product)
            return results        
        
    def GetGameProductListUuidGameId(self
        , uuid
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProductListUuidGameId(
            uuid
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_product  = self.FillGameProduct(row)
                results.append(game_product)
            return results        
        
        
    def FillGameStatisticLeaderboard(self, row) :
        obj = GameStatisticLeaderboard()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['username'] != None) :                 
            obj.username = row['username'] #dataType.FillData(dr, "username");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['timestamp'] != None) :                 
            obj.timestamp = row['timestamp'] #dataType.FillData(dr, "timestamp");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['rank'] != None) :                 
            obj.rank = row['rank'] #dataType.FillData(dr, "rank");                
        if (row['rank_change'] != None) :                 
            obj.rank_change = row['rank_change'] #dataType.FillData(dr, "rank_change");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['rank_total_count'] != None) :                 
            obj.rank_total_count = row['rank_total_count'] #dataType.FillData(dr, "rank_total_count");                
        if (row['absolute_value'] != None) :                 
            obj.absolute_value = row['absolute_value'] #dataType.FillData(dr, "absolute_value");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['stat_value'] != None) :                 
            obj.stat_value = row['stat_value'] #dataType.FillData(dr, "stat_value");                
        if (row['network'] != None) :                 
            obj.network = row['network'] #dataType.FillData(dr, "network");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['level'] != None) :                 
            obj.level = row['level'] #dataType.FillData(dr, "level");                
        if (row['stat_value_formatted'] != None) :                 
            obj.stat_value_formatted = row['stat_value_formatted'] #dataType.FillData(dr, "stat_value_formatted");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountGameStatisticLeaderboard(self
    ) :         
        return self.data.CountGameStatisticLeaderboard(
        )
               
    def CountGameStatisticLeaderboardUuid(self
        , uuid
    ) :         
        return self.data.CountGameStatisticLeaderboardUuid(
            uuid
        )
               
    def CountGameStatisticLeaderboardGameId(self
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardGameId(
            game_id
        )
               
    def CountGameStatisticLeaderboardCode(self
        , code
    ) :         
        return self.data.CountGameStatisticLeaderboardCode(
            code
        )
               
    def CountGameStatisticLeaderboardCodeGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardCodeGameId(
            code
            , game_id
        )
               
    def CountGameStatisticLeaderboardCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.data.CountGameStatisticLeaderboardCodeGameIdProfileId(
            code
            , game_id
            , profile_id
        )
               
    def CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.data.CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
               
    def CountGameStatisticLeaderboardProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardProfileIdGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameStatisticLeaderboardListFilter(self, filter_obj) :
        result = GameStatisticLeaderboardResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameStatisticLeaderboardListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard = self.FillGameStatisticLeaderboard(row)
                result.data.append(game_statistic_leaderboard)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameStatisticLeaderboardUuid(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardUuid(set_type, obj)
            
    def SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(set_type, obj)
            
    def SetGameStatisticLeaderboardCode(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardCode(set_type, obj)
            
    def SetGameStatisticLeaderboardCodeGameId(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardCodeGameId(set_type, obj)
            
    def SetGameStatisticLeaderboardCodeGameIdProfileId(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardCodeGameIdProfileId(set_type, obj)
            
    def SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(set_type, obj)
            
    def DelGameStatisticLeaderboardUuid(self
        , uuid
    ) :
        return self.data.DelGameStatisticLeaderboardUuid(
            uuid
        )
        
    def DelGameStatisticLeaderboardCode(self
        , code
    ) :
        return self.data.DelGameStatisticLeaderboardCode(
            code
        )
        
    def DelGameStatisticLeaderboardCodeGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameStatisticLeaderboardCodeGameId(
            code
            , game_id
        )
        
    def DelGameStatisticLeaderboardCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return self.data.DelGameStatisticLeaderboardCodeGameIdProfileId(
            code
            , game_id
            , profile_id
        )
        
    def DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return self.data.DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
    def DelGameStatisticLeaderboardProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameStatisticLeaderboardProfileIdGameId(
            profile_id
            , game_id
        )
        
    def GetGameStatisticLeaderboardList(self
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardList(
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListCodeGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListCodeGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListCodeGameIdProfileId(
            code
            , game_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListProfileIdGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListProfileIdGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
        
    def FillGameStatisticLeaderboardItem(self, row) :
        obj = GameStatisticLeaderboardItem()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['username'] != None) :                 
            obj.username = row['username'] #dataType.FillData(dr, "username");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['timestamp'] != None) :                 
            obj.timestamp = row['timestamp'] #dataType.FillData(dr, "timestamp");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['rank'] != None) :                 
            obj.rank = row['rank'] #dataType.FillData(dr, "rank");                
        if (row['rank_change'] != None) :                 
            obj.rank_change = row['rank_change'] #dataType.FillData(dr, "rank_change");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['rank_total_count'] != None) :                 
            obj.rank_total_count = row['rank_total_count'] #dataType.FillData(dr, "rank_total_count");                
        if (row['absolute_value'] != None) :                 
            obj.absolute_value = row['absolute_value'] #dataType.FillData(dr, "absolute_value");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['stat_value'] != None) :                 
            obj.stat_value = row['stat_value'] #dataType.FillData(dr, "stat_value");                
        if (row['network'] != None) :                 
            obj.network = row['network'] #dataType.FillData(dr, "network");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['level'] != None) :                 
            obj.level = row['level'] #dataType.FillData(dr, "level");                
        if (row['stat_value_formatted'] != None) :                 
            obj.stat_value_formatted = row['stat_value_formatted'] #dataType.FillData(dr, "stat_value_formatted");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountGameStatisticLeaderboardItem(self
    ) :         
        return self.data.CountGameStatisticLeaderboardItem(
        )
               
    def CountGameStatisticLeaderboardItemUuid(self
        , uuid
    ) :         
        return self.data.CountGameStatisticLeaderboardItemUuid(
            uuid
        )
               
    def CountGameStatisticLeaderboardItemGameId(self
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardItemGameId(
            game_id
        )
               
    def CountGameStatisticLeaderboardItemCode(self
        , code
    ) :         
        return self.data.CountGameStatisticLeaderboardItemCode(
            code
        )
               
    def CountGameStatisticLeaderboardItemCodeGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardItemCodeGameId(
            code
            , game_id
        )
               
    def CountGameStatisticLeaderboardItemCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.data.CountGameStatisticLeaderboardItemCodeGameIdProfileId(
            code
            , game_id
            , profile_id
        )
               
    def CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.data.CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
               
    def CountGameStatisticLeaderboardItemProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardItemProfileIdGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameStatisticLeaderboardItemListFilter(self, filter_obj) :
        result = GameStatisticLeaderboardItemResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameStatisticLeaderboardItemListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_item = self.FillGameStatisticLeaderboardItem(row)
                result.data.append(game_statistic_leaderboard_item)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameStatisticLeaderboardItemUuid(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardItemUuid(set_type, obj)
            
    def SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(set_type, obj)
            
    def SetGameStatisticLeaderboardItemCode(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardItemCode(set_type, obj)
            
    def SetGameStatisticLeaderboardItemCodeGameId(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardItemCodeGameId(set_type, obj)
            
    def SetGameStatisticLeaderboardItemCodeGameIdProfileId(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardItemCodeGameIdProfileId(set_type, obj)
            
    def SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(set_type, obj)
            
    def DelGameStatisticLeaderboardItemUuid(self
        , uuid
    ) :
        return self.data.DelGameStatisticLeaderboardItemUuid(
            uuid
        )
        
    def DelGameStatisticLeaderboardItemCode(self
        , code
    ) :
        return self.data.DelGameStatisticLeaderboardItemCode(
            code
        )
        
    def DelGameStatisticLeaderboardItemCodeGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameStatisticLeaderboardItemCodeGameId(
            code
            , game_id
        )
        
    def DelGameStatisticLeaderboardItemCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return self.data.DelGameStatisticLeaderboardItemCodeGameIdProfileId(
            code
            , game_id
            , profile_id
        )
        
    def DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return self.data.DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
    def DelGameStatisticLeaderboardItemProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameStatisticLeaderboardItemProfileIdGameId(
            profile_id
            , game_id
        )
        
    def GetGameStatisticLeaderboardItemList(self
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardItemList(
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_item  = self.FillGameStatisticLeaderboardItem(row)
                results.append(game_statistic_leaderboard_item)
            return results        
        
    def GetGameStatisticLeaderboardItemListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardItemListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_item  = self.FillGameStatisticLeaderboardItem(row)
                results.append(game_statistic_leaderboard_item)
            return results        
        
    def GetGameStatisticLeaderboardItemListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardItemListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_item  = self.FillGameStatisticLeaderboardItem(row)
                results.append(game_statistic_leaderboard_item)
            return results        
        
    def GetGameStatisticLeaderboardItemListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardItemListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_item  = self.FillGameStatisticLeaderboardItem(row)
                results.append(game_statistic_leaderboard_item)
            return results        
        
    def GetGameStatisticLeaderboardItemListCodeGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardItemListCodeGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_item  = self.FillGameStatisticLeaderboardItem(row)
                results.append(game_statistic_leaderboard_item)
            return results        
        
    def GetGameStatisticLeaderboardItemListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardItemListCodeGameIdProfileId(
            code
            , game_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_item  = self.FillGameStatisticLeaderboardItem(row)
                results.append(game_statistic_leaderboard_item)
            return results        
        
    def GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_item  = self.FillGameStatisticLeaderboardItem(row)
                results.append(game_statistic_leaderboard_item)
            return results        
        
    def GetGameStatisticLeaderboardItemListProfileIdGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardItemListProfileIdGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_item  = self.FillGameStatisticLeaderboardItem(row)
                results.append(game_statistic_leaderboard_item)
            return results        
        
    def GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_item  = self.FillGameStatisticLeaderboardItem(row)
                results.append(game_statistic_leaderboard_item)
            return results        
        
        
    def FillGameStatisticLeaderboardRollup(self, row) :
        obj = GameStatisticLeaderboardRollup()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['username'] != None) :                 
            obj.username = row['username'] #dataType.FillData(dr, "username");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['timestamp'] != None) :                 
            obj.timestamp = row['timestamp'] #dataType.FillData(dr, "timestamp");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['rank'] != None) :                 
            obj.rank = row['rank'] #dataType.FillData(dr, "rank");                
        if (row['rank_change'] != None) :                 
            obj.rank_change = row['rank_change'] #dataType.FillData(dr, "rank_change");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['rank_total_count'] != None) :                 
            obj.rank_total_count = row['rank_total_count'] #dataType.FillData(dr, "rank_total_count");                
        if (row['absolute_value'] != None) :                 
            obj.absolute_value = row['absolute_value'] #dataType.FillData(dr, "absolute_value");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['stat_value'] != None) :                 
            obj.stat_value = row['stat_value'] #dataType.FillData(dr, "stat_value");                
        if (row['network'] != None) :                 
            obj.network = row['network'] #dataType.FillData(dr, "network");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['level'] != None) :                 
            obj.level = row['level'] #dataType.FillData(dr, "level");                
        if (row['stat_value_formatted'] != None) :                 
            obj.stat_value_formatted = row['stat_value_formatted'] #dataType.FillData(dr, "stat_value_formatted");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountGameStatisticLeaderboardRollup(self
    ) :         
        return self.data.CountGameStatisticLeaderboardRollup(
        )
               
    def CountGameStatisticLeaderboardRollupUuid(self
        , uuid
    ) :         
        return self.data.CountGameStatisticLeaderboardRollupUuid(
            uuid
        )
               
    def CountGameStatisticLeaderboardRollupGameId(self
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardRollupGameId(
            game_id
        )
               
    def CountGameStatisticLeaderboardRollupCode(self
        , code
    ) :         
        return self.data.CountGameStatisticLeaderboardRollupCode(
            code
        )
               
    def CountGameStatisticLeaderboardRollupCodeGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardRollupCodeGameId(
            code
            , game_id
        )
               
    def CountGameStatisticLeaderboardRollupCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.data.CountGameStatisticLeaderboardRollupCodeGameIdProfileId(
            code
            , game_id
            , profile_id
        )
               
    def CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.data.CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
               
    def CountGameStatisticLeaderboardRollupProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardRollupProfileIdGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameStatisticLeaderboardRollupListFilter(self, filter_obj) :
        result = GameStatisticLeaderboardRollupResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameStatisticLeaderboardRollupListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_rollup = self.FillGameStatisticLeaderboardRollup(row)
                result.data.append(game_statistic_leaderboard_rollup)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameStatisticLeaderboardRollupUuid(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardRollupUuid(set_type, obj)
            
    def SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(set_type, obj)
            
    def SetGameStatisticLeaderboardRollupCode(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardRollupCode(set_type, obj)
            
    def SetGameStatisticLeaderboardRollupCodeGameId(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardRollupCodeGameId(set_type, obj)
            
    def SetGameStatisticLeaderboardRollupCodeGameIdProfileId(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardRollupCodeGameIdProfileId(set_type, obj)
            
    def SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(set_type, obj)
            
    def DelGameStatisticLeaderboardRollupUuid(self
        , uuid
    ) :
        return self.data.DelGameStatisticLeaderboardRollupUuid(
            uuid
        )
        
    def DelGameStatisticLeaderboardRollupCode(self
        , code
    ) :
        return self.data.DelGameStatisticLeaderboardRollupCode(
            code
        )
        
    def DelGameStatisticLeaderboardRollupCodeGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameStatisticLeaderboardRollupCodeGameId(
            code
            , game_id
        )
        
    def DelGameStatisticLeaderboardRollupCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return self.data.DelGameStatisticLeaderboardRollupCodeGameIdProfileId(
            code
            , game_id
            , profile_id
        )
        
    def DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return self.data.DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
    def DelGameStatisticLeaderboardRollupProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameStatisticLeaderboardRollupProfileIdGameId(
            profile_id
            , game_id
        )
        
    def GetGameStatisticLeaderboardRollupList(self
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardRollupList(
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_rollup  = self.FillGameStatisticLeaderboardRollup(row)
                results.append(game_statistic_leaderboard_rollup)
            return results        
        
    def GetGameStatisticLeaderboardRollupListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardRollupListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_rollup  = self.FillGameStatisticLeaderboardRollup(row)
                results.append(game_statistic_leaderboard_rollup)
            return results        
        
    def GetGameStatisticLeaderboardRollupListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardRollupListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_rollup  = self.FillGameStatisticLeaderboardRollup(row)
                results.append(game_statistic_leaderboard_rollup)
            return results        
        
    def GetGameStatisticLeaderboardRollupListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardRollupListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_rollup  = self.FillGameStatisticLeaderboardRollup(row)
                results.append(game_statistic_leaderboard_rollup)
            return results        
        
    def GetGameStatisticLeaderboardRollupListCodeGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardRollupListCodeGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_rollup  = self.FillGameStatisticLeaderboardRollup(row)
                results.append(game_statistic_leaderboard_rollup)
            return results        
        
    def GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(
            code
            , game_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_rollup  = self.FillGameStatisticLeaderboardRollup(row)
                results.append(game_statistic_leaderboard_rollup)
            return results        
        
    def GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_rollup  = self.FillGameStatisticLeaderboardRollup(row)
                results.append(game_statistic_leaderboard_rollup)
            return results        
        
    def GetGameStatisticLeaderboardRollupListProfileIdGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardRollupListProfileIdGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_rollup  = self.FillGameStatisticLeaderboardRollup(row)
                results.append(game_statistic_leaderboard_rollup)
            return results        
        
    def GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard_rollup  = self.FillGameStatisticLeaderboardRollup(row)
                results.append(game_statistic_leaderboard_rollup)
            return results        
        
        
    def FillGameLiveQueue(self, row) :
        obj = GameLiveQueue()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['data_stat'] != None) :                 
            obj.data_stat = row['data_stat'] #dataType.FillData(dr, "data_stat");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['data_ad'] != None) :                 
            obj.data_ad = row['data_ad'] #dataType.FillData(dr, "data_ad");                

        return obj
        
    def CountGameLiveQueue(self
    ) :         
        return self.data.CountGameLiveQueue(
        )
               
    def CountGameLiveQueueUuid(self
        , uuid
    ) :         
        return self.data.CountGameLiveQueueUuid(
            uuid
        )
               
    def CountGameLiveQueueProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameLiveQueueProfileIdGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameLiveQueueListFilter(self, filter_obj) :
        result = GameLiveQueueResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameLiveQueueListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_live_queue = self.FillGameLiveQueue(row)
                result.data.append(game_live_queue)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameLiveQueueUuid(self, set_type, obj) :            
            return self.data.SetGameLiveQueueUuid(set_type, obj)
            
    def SetGameLiveQueueProfileIdGameId(self, set_type, obj) :            
            return self.data.SetGameLiveQueueProfileIdGameId(set_type, obj)
            
    def DelGameLiveQueueUuid(self
        , uuid
    ) :
        return self.data.DelGameLiveQueueUuid(
            uuid
        )
        
    def DelGameLiveQueueProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameLiveQueueProfileIdGameId(
            profile_id
            , game_id
        )
        
    def GetGameLiveQueueList(self
    ) :

        results = []
        rows = self.data.GetGameLiveQueueList(
        )
        
        if(rows != None) :
            for row in rows :
                game_live_queue  = self.FillGameLiveQueue(row)
                results.append(game_live_queue)
            return results        
        
    def GetGameLiveQueueListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameLiveQueueListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_live_queue  = self.FillGameLiveQueue(row)
                results.append(game_live_queue)
            return results        
        
    def GetGameLiveQueueListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLiveQueueListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_live_queue  = self.FillGameLiveQueue(row)
                results.append(game_live_queue)
            return results        
        
    def GetGameLiveQueueListProfileIdGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLiveQueueListProfileIdGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_live_queue  = self.FillGameLiveQueue(row)
                results.append(game_live_queue)
            return results        
        
        
    def FillGameLiveRecentQueue(self, row) :
        obj = GameLiveRecentQueue()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['username'] != None) :                 
            obj.username = row['username'] #dataType.FillData(dr, "username");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['game'] != None) :                 
            obj.game = row['game'] #dataType.FillData(dr, "game");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameLiveRecentQueue(self
    ) :         
        return self.data.CountGameLiveRecentQueue(
        )
               
    def CountGameLiveRecentQueueUuid(self
        , uuid
    ) :         
        return self.data.CountGameLiveRecentQueueUuid(
            uuid
        )
               
    def CountGameLiveRecentQueueProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameLiveRecentQueueProfileIdGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameLiveRecentQueueListFilter(self, filter_obj) :
        result = GameLiveRecentQueueResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameLiveRecentQueueListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_live_recent_queue = self.FillGameLiveRecentQueue(row)
                result.data.append(game_live_recent_queue)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameLiveRecentQueueUuid(self, set_type, obj) :            
            return self.data.SetGameLiveRecentQueueUuid(set_type, obj)
            
    def SetGameLiveRecentQueueProfileIdGameId(self, set_type, obj) :            
            return self.data.SetGameLiveRecentQueueProfileIdGameId(set_type, obj)
            
    def DelGameLiveRecentQueueUuid(self
        , uuid
    ) :
        return self.data.DelGameLiveRecentQueueUuid(
            uuid
        )
        
    def DelGameLiveRecentQueueProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameLiveRecentQueueProfileIdGameId(
            profile_id
            , game_id
        )
        
    def GetGameLiveRecentQueueList(self
    ) :

        results = []
        rows = self.data.GetGameLiveRecentQueueList(
        )
        
        if(rows != None) :
            for row in rows :
                game_live_recent_queue  = self.FillGameLiveRecentQueue(row)
                results.append(game_live_recent_queue)
            return results        
        
    def GetGameLiveRecentQueueListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameLiveRecentQueueListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_live_recent_queue  = self.FillGameLiveRecentQueue(row)
                results.append(game_live_recent_queue)
            return results        
        
    def GetGameLiveRecentQueueListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLiveRecentQueueListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_live_recent_queue  = self.FillGameLiveRecentQueue(row)
                results.append(game_live_recent_queue)
            return results        
        
    def GetGameLiveRecentQueueListProfileIdGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLiveRecentQueueListProfileIdGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_live_recent_queue  = self.FillGameLiveRecentQueue(row)
                results.append(game_live_recent_queue)
            return results        
        
        
    def FillGameProfileStatistic(self, row) :
        obj = GameProfileStatistic()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['username'] != None) :                 
            obj.username = row['username'] #dataType.FillData(dr, "username");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['stat_value_formatted'] != None) :                 
            obj.stat_value_formatted = row['stat_value_formatted'] #dataType.FillData(dr, "stat_value_formatted");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['stat_value'] != None) :                 
            obj.stat_value = row['stat_value'] #dataType.FillData(dr, "stat_value");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['level'] != None) :                 
            obj.level = row['level'] #dataType.FillData(dr, "level");                
        if (row['points'] != None) :                 
            obj.points = row['points'] #dataType.FillData(dr, "points");                
        if (row['timestamp'] != None) :                 
            obj.timestamp = row['timestamp'] #dataType.FillData(dr, "timestamp");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountGameProfileStatistic(self
    ) :         
        return self.data.CountGameProfileStatistic(
        )
               
    def CountGameProfileStatisticUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileStatisticUuid(
            uuid
        )
               
    def CountGameProfileStatisticCode(self
        , code
    ) :         
        return self.data.CountGameProfileStatisticCode(
            code
        )
               
    def CountGameProfileStatisticGameId(self
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticGameId(
            game_id
        )
               
    def CountGameProfileStatisticCodeGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticCodeGameId(
            code
            , game_id
        )
               
    def CountGameProfileStatisticProfileIdGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticProfileIdGameId(
            profile_id
            , game_id
        )
               
    def CountGameProfileStatisticCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticCodeProfileIdGameId(
            code
            , profile_id
            , game_id
        )
               
    def CountGameProfileStatisticCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameProfileStatisticCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameProfileStatisticListFilter(self, filter_obj) :
        result = GameProfileStatisticResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileStatisticListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_statistic = self.FillGameProfileStatistic(row)
                result.data.append(game_profile_statistic)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileStatisticUuid(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticUuid(set_type, obj)
            
    def SetGameProfileStatisticUuidProfileIdGameIdTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticUuidProfileIdGameIdTimestamp(set_type, obj)
            
    def SetGameProfileStatisticProfileIdCode(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticProfileIdCode(set_type, obj)
            
    def SetGameProfileStatisticProfileIdCodeTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticProfileIdCodeTimestamp(set_type, obj)
            
    def SetGameProfileStatisticCodeProfileIdGameIdTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticCodeProfileIdGameIdTimestamp(set_type, obj)
            
    def SetGameProfileStatisticCodeProfileIdGameId(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticCodeProfileIdGameId(set_type, obj)
            
    def DelGameProfileStatisticUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileStatisticUuid(
            uuid
        )
        
    def DelGameProfileStatisticCodeGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameProfileStatisticCodeGameId(
            code
            , game_id
        )
        
    def DelGameProfileStatisticProfileIdGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameProfileStatisticProfileIdGameId(
            profile_id
            , game_id
        )
        
    def DelGameProfileStatisticCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return self.data.DelGameProfileStatisticCodeProfileIdGameId(
            code
            , profile_id
            , game_id
        )
        
    def GetGameProfileStatisticListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListCodeGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListCodeGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListProfileIdGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListProfileIdGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListCodeProfileIdGameId(
            code
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
        
    def FillGameStatisticMeta(self, row) :
        obj = GameStatisticMeta()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['points'] != None) :                 
            obj.points = row['points'] #dataType.FillData(dr, "points");                
        if (row['store_count'] != None) :                 
            obj.store_count = row['store_count'] #dataType.FillData(dr, "store_count");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['order'] != None) :                 
            obj.order = row['order'] #dataType.FillData(dr, "order");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameStatisticMeta(self
    ) :         
        return self.data.CountGameStatisticMeta(
        )
               
    def CountGameStatisticMetaUuid(self
        , uuid
    ) :         
        return self.data.CountGameStatisticMetaUuid(
            uuid
        )
               
    def CountGameStatisticMetaCode(self
        , code
    ) :         
        return self.data.CountGameStatisticMetaCode(
            code
        )
               
    def CountGameStatisticMetaCodeGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameStatisticMetaCodeGameId(
            code
            , game_id
        )
               
    def CountGameStatisticMetaName(self
        , name
    ) :         
        return self.data.CountGameStatisticMetaName(
            name
        )
               
    def CountGameStatisticMetaGameId(self
        , game_id
    ) :         
        return self.data.CountGameStatisticMetaGameId(
            game_id
        )
               
    def BrowseGameStatisticMetaListFilter(self, filter_obj) :
        result = GameStatisticMetaResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameStatisticMetaListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_statistic_meta = self.FillGameStatisticMeta(row)
                result.data.append(game_statistic_meta)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameStatisticMetaUuid(self, set_type, obj) :            
            return self.data.SetGameStatisticMetaUuid(set_type, obj)
            
    def SetGameStatisticMetaCodeGameId(self, set_type, obj) :            
            return self.data.SetGameStatisticMetaCodeGameId(set_type, obj)
            
    def DelGameStatisticMetaUuid(self
        , uuid
    ) :
        return self.data.DelGameStatisticMetaUuid(
            uuid
        )
        
    def DelGameStatisticMetaCodeGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameStatisticMetaCodeGameId(
            code
            , game_id
        )
        
    def GetGameStatisticMetaListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
    def GetGameStatisticMetaListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
    def GetGameStatisticMetaListName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
    def GetGameStatisticMetaListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
    def GetGameStatisticMetaListCodeGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListCodeGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
        
    def FillGameProfileStatisticTimestamp(self, row) :
        obj = GameProfileStatisticTimestamp()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['timestamp'] != None) :                 
            obj.timestamp = row['timestamp'] #dataType.FillData(dr, "timestamp");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountGameProfileStatisticTimestamp(self
    ) :         
        return self.data.CountGameProfileStatisticTimestamp(
        )
               
    def CountGameProfileStatisticTimestampUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileStatisticTimestampUuid(
            uuid
        )
               
    def CountGameProfileStatisticTimestampCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticTimestampCodeProfileIdGameId(
            code
            , profile_id
            , game_id
        )
               
    def CountGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameProfileStatisticTimestampListFilter(self, filter_obj) :
        result = GameProfileStatisticTimestampResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileStatisticTimestampListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_statistic_timestamp = self.FillGameProfileStatisticTimestamp(row)
                result.data.append(game_profile_statistic_timestamp)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileStatisticTimestampUuid(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticTimestampUuid(set_type, obj)
            
    def SetGameProfileStatisticTimestampCodeProfileIdGameId(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticTimestampCodeProfileIdGameId(set_type, obj)
            
    def SetGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(set_type, obj)
            
    def DelGameProfileStatisticTimestampUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileStatisticTimestampUuid(
            uuid
        )
        
    def DelGameProfileStatisticTimestampCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return self.data.DelGameProfileStatisticTimestampCodeProfileIdGameId(
            code
            , profile_id
            , game_id
        )
        
    def DelGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        return self.data.DelGameProfileStatisticTimestampCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
        )
        
    def GetGameProfileStatisticTimestampListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticTimestampListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_timestamp  = self.FillGameProfileStatisticTimestamp(row)
                results.append(game_profile_statistic_timestamp)
            return results        
        
    def GetGameProfileStatisticTimestampListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticTimestampListCodeProfileIdGameId(
            code
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_timestamp  = self.FillGameProfileStatisticTimestamp(row)
                results.append(game_profile_statistic_timestamp)
            return results        
        
    def GetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticTimestampListCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_timestamp  = self.FillGameProfileStatisticTimestamp(row)
                results.append(game_profile_statistic_timestamp)
            return results        
        
        
    def FillGameKeyMeta(self, row) :
        obj = GameKeyMeta()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['level'] != None) :                 
            obj.level = row['level'] #dataType.FillData(dr, "level");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['key_level'] != None) :                 
            obj.key_level = row['key_level'] #dataType.FillData(dr, "key_level");                
        if (row['store_count'] != None) :                 
            obj.store_count = row['store_count'] #dataType.FillData(dr, "store_count");                
        if (row['key'] != None) :                 
            obj.key = row['key'] #dataType.FillData(dr, "key");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['order'] != None) :                 
            obj.order = row['order'] #dataType.FillData(dr, "order");                
        if (row['key_stat'] != None) :                 
            obj.key_stat = row['key_stat'] #dataType.FillData(dr, "key_stat");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameKeyMeta(self
    ) :         
        return self.data.CountGameKeyMeta(
        )
               
    def CountGameKeyMetaUuid(self
        , uuid
    ) :         
        return self.data.CountGameKeyMetaUuid(
            uuid
        )
               
    def CountGameKeyMetaCode(self
        , code
    ) :         
        return self.data.CountGameKeyMetaCode(
            code
        )
               
    def CountGameKeyMetaCodeGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameKeyMetaCodeGameId(
            code
            , game_id
        )
               
    def CountGameKeyMetaName(self
        , name
    ) :         
        return self.data.CountGameKeyMetaName(
            name
        )
               
    def CountGameKeyMetaKey(self
        , key
    ) :         
        return self.data.CountGameKeyMetaKey(
            key
        )
               
    def CountGameKeyMetaGameId(self
        , game_id
    ) :         
        return self.data.CountGameKeyMetaGameId(
            game_id
        )
               
    def CountGameKeyMetaKeyGameId(self
        , key
        , game_id
    ) :         
        return self.data.CountGameKeyMetaKeyGameId(
            key
            , game_id
        )
               
    def BrowseGameKeyMetaListFilter(self, filter_obj) :
        result = GameKeyMetaResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameKeyMetaListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_key_meta = self.FillGameKeyMeta(row)
                result.data.append(game_key_meta)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameKeyMetaUuid(self, set_type, obj) :            
            return self.data.SetGameKeyMetaUuid(set_type, obj)
            
    def SetGameKeyMetaCodeGameId(self, set_type, obj) :            
            return self.data.SetGameKeyMetaCodeGameId(set_type, obj)
            
    def SetGameKeyMetaKeyGameId(self, set_type, obj) :            
            return self.data.SetGameKeyMetaKeyGameId(set_type, obj)
            
    def SetGameKeyMetaKeyGameIdLevel(self, set_type, obj) :            
            return self.data.SetGameKeyMetaKeyGameIdLevel(set_type, obj)
            
    def DelGameKeyMetaUuid(self
        , uuid
    ) :
        return self.data.DelGameKeyMetaUuid(
            uuid
        )
        
    def DelGameKeyMetaCodeGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameKeyMetaCodeGameId(
            code
            , game_id
        )
        
    def DelGameKeyMetaKeyGameId(self
        , key
        , game_id
    ) :
        return self.data.DelGameKeyMetaKeyGameId(
            key
            , game_id
        )
        
    def GetGameKeyMetaListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListCodeGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListCodeGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListKey(self
        , key
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListKey(
            key
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListKeyGameId(self
        , key
        , game_id
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListKeyGameId(
            key
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListCodeLevel(self
        , code
        , level
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListCodeLevel(
            code
            , level
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
        
    def FillGameLevel(self, row) :
        obj = GameLevel()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['order'] != None) :                 
            obj.order = row['order'] #dataType.FillData(dr, "order");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameLevel(self
    ) :         
        return self.data.CountGameLevel(
        )
               
    def CountGameLevelUuid(self
        , uuid
    ) :         
        return self.data.CountGameLevelUuid(
            uuid
        )
               
    def CountGameLevelCode(self
        , code
    ) :         
        return self.data.CountGameLevelCode(
            code
        )
               
    def CountGameLevelCodeGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameLevelCodeGameId(
            code
            , game_id
        )
               
    def CountGameLevelName(self
        , name
    ) :         
        return self.data.CountGameLevelName(
            name
        )
               
    def CountGameLevelGameId(self
        , game_id
    ) :         
        return self.data.CountGameLevelGameId(
            game_id
        )
               
    def BrowseGameLevelListFilter(self, filter_obj) :
        result = GameLevelResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameLevelListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_level = self.FillGameLevel(row)
                result.data.append(game_level)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameLevelUuid(self, set_type, obj) :            
            return self.data.SetGameLevelUuid(set_type, obj)
            
    def SetGameLevelCodeGameId(self, set_type, obj) :            
            return self.data.SetGameLevelCodeGameId(set_type, obj)
            
    def DelGameLevelUuid(self
        , uuid
    ) :
        return self.data.DelGameLevelUuid(
            uuid
        )
        
    def DelGameLevelCodeGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameLevelCodeGameId(
            code
            , game_id
        )
        
    def GetGameLevelListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameLevelListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_level  = self.FillGameLevel(row)
                results.append(game_level)
            return results        
        
    def GetGameLevelListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameLevelListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_level  = self.FillGameLevel(row)
                results.append(game_level)
            return results        
        
    def GetGameLevelListCodeGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLevelListCodeGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_level  = self.FillGameLevel(row)
                results.append(game_level)
            return results        
        
    def GetGameLevelListName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameLevelListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_level  = self.FillGameLevel(row)
                results.append(game_level)
            return results        
        
    def GetGameLevelListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLevelListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_level  = self.FillGameLevel(row)
                results.append(game_level)
            return results        
        
        
    def FillGameProfileAchievement(self, row) :
        obj = GameProfileAchievement()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['username'] != None) :                 
            obj.username = row['username'] #dataType.FillData(dr, "username");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['timestamp'] != None) :                 
            obj.timestamp = row['timestamp'] #dataType.FillData(dr, "timestamp");                
        if (row['completed'] != None) :                 
            obj.completed = row['completed'] #dataType.FillData(dr, "completed");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['achievement_value'] != None) :                 
            obj.achievement_value = row['achievement_value'] #dataType.FillData(dr, "achievement_value");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['level'] != None) :                 
            obj.level = row['level'] #dataType.FillData(dr, "level");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountGameProfileAchievement(self
    ) :         
        return self.data.CountGameProfileAchievement(
        )
               
    def CountGameProfileAchievementUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileAchievementUuid(
            uuid
        )
               
    def CountGameProfileAchievementProfileIdCode(self
        , profile_id
        , code
    ) :         
        return self.data.CountGameProfileAchievementProfileIdCode(
            profile_id
            , code
        )
               
    def CountGameProfileAchievementUsername(self
        , username
    ) :         
        return self.data.CountGameProfileAchievementUsername(
            username
        )
               
    def CountGameProfileAchievementCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileAchievementCodeProfileIdGameId(
            code
            , profile_id
            , game_id
        )
               
    def CountGameProfileAchievementCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameProfileAchievementCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameProfileAchievementListFilter(self, filter_obj) :
        result = GameProfileAchievementResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileAchievementListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_achievement = self.FillGameProfileAchievement(row)
                result.data.append(game_profile_achievement)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileAchievementUuid(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementUuid(set_type, obj)
            
    def SetGameProfileAchievementUuidCode(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementUuidCode(set_type, obj)
            
    def SetGameProfileAchievementProfileIdCode(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementProfileIdCode(set_type, obj)
            
    def SetGameProfileAchievementCodeProfileIdGameId(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementCodeProfileIdGameId(set_type, obj)
            
    def SetGameProfileAchievementCodeProfileIdGameIdTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementCodeProfileIdGameIdTimestamp(set_type, obj)
            
    def DelGameProfileAchievementUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileAchievementUuid(
            uuid
        )
        
    def DelGameProfileAchievementProfileIdCode(self
        , profile_id
        , code
    ) :
        return self.data.DelGameProfileAchievementProfileIdCode(
            profile_id
            , code
        )
        
    def DelGameProfileAchievementUuidCode(self
        , uuid
        , code
    ) :
        return self.data.DelGameProfileAchievementUuidCode(
            uuid
            , code
        )
        
    def GetGameProfileAchievementListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListProfileIdCode(self
        , profile_id
        , code
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListProfileIdCode(
            profile_id
            , code
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListUsername(self
        , username
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListUsername(
            username
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListCodeGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListCodeGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListProfileIdGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListProfileIdGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListProfileIdGameIdTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListProfileIdGameIdTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListCodeProfileIdGameId(
            code
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
        
    def FillGameAchievementMeta(self, row) :
        obj = GameAchievementMeta()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['game_stat'] != None) :                 
            obj.game_stat = row['game_stat'] #dataType.FillData(dr, "game_stat");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['level'] != None) :                 
            obj.level = row['level'] #dataType.FillData(dr, "level");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['points'] != None) :                 
            obj.points = row['points'] #dataType.FillData(dr, "points");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['modifier'] != None) :                 
            obj.modifier = row['modifier'] #dataType.FillData(dr, "modifier");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['leaderboard'] != None) :                 
            obj.leaderboard = row['leaderboard'] #dataType.FillData(dr, "leaderboard");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameAchievementMeta(self
    ) :         
        return self.data.CountGameAchievementMeta(
        )
               
    def CountGameAchievementMetaUuid(self
        , uuid
    ) :         
        return self.data.CountGameAchievementMetaUuid(
            uuid
        )
               
    def CountGameAchievementMetaCode(self
        , code
    ) :         
        return self.data.CountGameAchievementMetaCode(
            code
        )
               
    def CountGameAchievementMetaCodeGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameAchievementMetaCodeGameId(
            code
            , game_id
        )
               
    def CountGameAchievementMetaName(self
        , name
    ) :         
        return self.data.CountGameAchievementMetaName(
            name
        )
               
    def CountGameAchievementMetaGameId(self
        , game_id
    ) :         
        return self.data.CountGameAchievementMetaGameId(
            game_id
        )
               
    def BrowseGameAchievementMetaListFilter(self, filter_obj) :
        result = GameAchievementMetaResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameAchievementMetaListFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_achievement_meta = self.FillGameAchievementMeta(row)
                result.data.append(game_achievement_meta)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameAchievementMetaUuid(self, set_type, obj) :            
            return self.data.SetGameAchievementMetaUuid(set_type, obj)
            
    def SetGameAchievementMetaCodeGameId(self, set_type, obj) :            
            return self.data.SetGameAchievementMetaCodeGameId(set_type, obj)
            
    def DelGameAchievementMetaUuid(self
        , uuid
    ) :
        return self.data.DelGameAchievementMetaUuid(
            uuid
        )
        
    def DelGameAchievementMetaCodeGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameAchievementMetaCodeGameId(
            code
            , game_id
        )
        
    def GetGameAchievementMetaListUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        
    def GetGameAchievementMetaListCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        
    def GetGameAchievementMetaListCodeGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListCodeGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        
    def GetGameAchievementMetaListName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        
    def GetGameAchievementMetaListGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        



