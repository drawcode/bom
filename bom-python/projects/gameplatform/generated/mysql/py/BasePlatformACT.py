import ent
from ent import *

import BasePlatformData
from BasePlatformData import *

class BasePlatformACT(object):

    def __init__(self):
        self.connection_string = ''
        self.data = BasePlatformData()
        
        
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
               
    def CountGameByUuid(self
        , uuid
    ) :         
        return self.data.CountGameByUuid(
            uuid
        )
               
    def CountGameByCode(self
        , code
    ) :         
        return self.data.CountGameByCode(
            code
        )
               
    def CountGameByName(self
        , name
    ) :         
        return self.data.CountGameByName(
            name
        )
               
    def CountGameByOrgId(self
        , org_id
    ) :         
        return self.data.CountGameByOrgId(
            org_id
        )
               
    def CountGameByAppId(self
        , app_id
    ) :         
        return self.data.CountGameByAppId(
            app_id
        )
               
    def CountGameByOrgIdByAppId(self
        , org_id
        , app_id
    ) :         
        return self.data.CountGameByOrgIdByAppId(
            org_id
            , app_id
        )
               
    def BrowseGameListByFilter(self, filter_obj) :
        result = GameResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game = self.FillGame(row)
                result.data.append(game)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameByUuid(self, set_type, obj) :            
            return self.data.SetGameByUuid(set_type, obj)
            
    def SetGameByCode(self, set_type, obj) :            
            return self.data.SetGameByCode(set_type, obj)
            
    def SetGameByName(self, set_type, obj) :            
            return self.data.SetGameByName(set_type, obj)
            
    def SetGameByOrgId(self, set_type, obj) :            
            return self.data.SetGameByOrgId(set_type, obj)
            
    def SetGameByAppId(self, set_type, obj) :            
            return self.data.SetGameByAppId(set_type, obj)
            
    def SetGameByOrgIdByAppId(self, set_type, obj) :            
            return self.data.SetGameByOrgIdByAppId(set_type, obj)
            
    def DelGameByUuid(self
        , uuid
    ) :
        return self.data.DelGameByUuid(
            uuid
        )
        
    def DelGameByCode(self
        , code
    ) :
        return self.data.DelGameByCode(
            code
        )
        
    def DelGameByName(self
        , name
    ) :
        return self.data.DelGameByName(
            name
        )
        
    def DelGameByOrgId(self
        , org_id
    ) :
        return self.data.DelGameByOrgId(
            org_id
        )
        
    def DelGameByAppId(self
        , app_id
    ) :
        return self.data.DelGameByAppId(
            app_id
        )
        
    def DelGameByOrgIdByAppId(self
        , org_id
        , app_id
    ) :
        return self.data.DelGameByOrgIdByAppId(
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
        
    def GetGameListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetGameListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListByAppId(self
        , app_id
    ) :

        results = []
        rows = self.data.GetGameListByAppId(
            app_id
        )
        
        if(rows != None) :
            for row in rows :
                game  = self.FillGame(row)
                results.append(game)
            return results        
        
    def GetGameListByOrgIdByAppId(self
        , org_id
        , app_id
    ) :

        results = []
        rows = self.data.GetGameListByOrgIdByAppId(
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
               
    def CountGameCategoryByUuid(self
        , uuid
    ) :         
        return self.data.CountGameCategoryByUuid(
            uuid
        )
               
    def CountGameCategoryByCode(self
        , code
    ) :         
        return self.data.CountGameCategoryByCode(
            code
        )
               
    def CountGameCategoryByName(self
        , name
    ) :         
        return self.data.CountGameCategoryByName(
            name
        )
               
    def CountGameCategoryByOrgId(self
        , org_id
    ) :         
        return self.data.CountGameCategoryByOrgId(
            org_id
        )
               
    def CountGameCategoryByTypeId(self
        , type_id
    ) :         
        return self.data.CountGameCategoryByTypeId(
            type_id
        )
               
    def CountGameCategoryByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :         
        return self.data.CountGameCategoryByOrgIdByTypeId(
            org_id
            , type_id
        )
               
    def BrowseGameCategoryListByFilter(self, filter_obj) :
        result = GameCategoryResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameCategoryListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_category = self.FillGameCategory(row)
                result.data.append(game_category)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameCategoryByUuid(self, set_type, obj) :            
            return self.data.SetGameCategoryByUuid(set_type, obj)
            
    def DelGameCategoryByUuid(self
        , uuid
    ) :
        return self.data.DelGameCategoryByUuid(
            uuid
        )
        
    def DelGameCategoryByCodeByOrgId(self
        , code
        , org_id
    ) :
        return self.data.DelGameCategoryByCodeByOrgId(
            code
            , org_id
        )
        
    def DelGameCategoryByCodeByOrgIdByTypeId(self
        , code
        , org_id
        , type_id
    ) :
        return self.data.DelGameCategoryByCodeByOrgIdByTypeId(
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
        
    def GetGameCategoryListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameCategoryListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameCategoryListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameCategoryListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetGameCategoryListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListByTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetGameCategoryListByTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category  = self.FillGameCategory(row)
                results.append(game_category)
            return results        
        
    def GetGameCategoryListByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :

        results = []
        rows = self.data.GetGameCategoryListByOrgIdByTypeId(
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
               
    def CountGameCategoryTreeByUuid(self
        , uuid
    ) :         
        return self.data.CountGameCategoryTreeByUuid(
            uuid
        )
               
    def CountGameCategoryTreeByParentId(self
        , parent_id
    ) :         
        return self.data.CountGameCategoryTreeByParentId(
            parent_id
        )
               
    def CountGameCategoryTreeByCategoryId(self
        , category_id
    ) :         
        return self.data.CountGameCategoryTreeByCategoryId(
            category_id
        )
               
    def CountGameCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :         
        return self.data.CountGameCategoryTreeByParentIdByCategoryId(
            parent_id
            , category_id
        )
               
    def BrowseGameCategoryTreeListByFilter(self, filter_obj) :
        result = GameCategoryTreeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameCategoryTreeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_category_tree = self.FillGameCategoryTree(row)
                result.data.append(game_category_tree)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameCategoryTreeByUuid(self, set_type, obj) :            
            return self.data.SetGameCategoryTreeByUuid(set_type, obj)
            
    def DelGameCategoryTreeByUuid(self
        , uuid
    ) :
        return self.data.DelGameCategoryTreeByUuid(
            uuid
        )
        
    def DelGameCategoryTreeByParentId(self
        , parent_id
    ) :
        return self.data.DelGameCategoryTreeByParentId(
            parent_id
        )
        
    def DelGameCategoryTreeByCategoryId(self
        , category_id
    ) :
        return self.data.DelGameCategoryTreeByCategoryId(
            category_id
        )
        
    def DelGameCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        return self.data.DelGameCategoryTreeByParentIdByCategoryId(
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
        
    def GetGameCategoryTreeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameCategoryTreeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_category_tree  = self.FillGameCategoryTree(row)
                results.append(game_category_tree)
            return results        
        
    def GetGameCategoryTreeListByParentId(self
        , parent_id
    ) :

        results = []
        rows = self.data.GetGameCategoryTreeListByParentId(
            parent_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category_tree  = self.FillGameCategoryTree(row)
                results.append(game_category_tree)
            return results        
        
    def GetGameCategoryTreeListByCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetGameCategoryTreeListByCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category_tree  = self.FillGameCategoryTree(row)
                results.append(game_category_tree)
            return results        
        
    def GetGameCategoryTreeListByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :

        results = []
        rows = self.data.GetGameCategoryTreeListByParentIdByCategoryId(
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
               
    def CountGameCategoryAssocByUuid(self
        , uuid
    ) :         
        return self.data.CountGameCategoryAssocByUuid(
            uuid
        )
               
    def CountGameCategoryAssocByGameId(self
        , game_id
    ) :         
        return self.data.CountGameCategoryAssocByGameId(
            game_id
        )
               
    def CountGameCategoryAssocByCategoryId(self
        , category_id
    ) :         
        return self.data.CountGameCategoryAssocByCategoryId(
            category_id
        )
               
    def CountGameCategoryAssocByGameIdByCategoryId(self
        , game_id
        , category_id
    ) :         
        return self.data.CountGameCategoryAssocByGameIdByCategoryId(
            game_id
            , category_id
        )
               
    def BrowseGameCategoryAssocListByFilter(self, filter_obj) :
        result = GameCategoryAssocResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameCategoryAssocListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_category_assoc = self.FillGameCategoryAssoc(row)
                result.data.append(game_category_assoc)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameCategoryAssocByUuid(self, set_type, obj) :            
            return self.data.SetGameCategoryAssocByUuid(set_type, obj)
            
    def DelGameCategoryAssocByUuid(self
        , uuid
    ) :
        return self.data.DelGameCategoryAssocByUuid(
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
        
    def GetGameCategoryAssocListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameCategoryAssocListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_category_assoc  = self.FillGameCategoryAssoc(row)
                results.append(game_category_assoc)
            return results        
        
    def GetGameCategoryAssocListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameCategoryAssocListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category_assoc  = self.FillGameCategoryAssoc(row)
                results.append(game_category_assoc)
            return results        
        
    def GetGameCategoryAssocListByCategoryId(self
        , category_id
    ) :

        results = []
        rows = self.data.GetGameCategoryAssocListByCategoryId(
            category_id
        )
        
        if(rows != None) :
            for row in rows :
                game_category_assoc  = self.FillGameCategoryAssoc(row)
                results.append(game_category_assoc)
            return results        
        
    def GetGameCategoryAssocListByGameIdByCategoryId(self
        , game_id
        , category_id
    ) :

        results = []
        rows = self.data.GetGameCategoryAssocListByGameIdByCategoryId(
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
               
    def CountGameTypeByUuid(self
        , uuid
    ) :         
        return self.data.CountGameTypeByUuid(
            uuid
        )
               
    def CountGameTypeByCode(self
        , code
    ) :         
        return self.data.CountGameTypeByCode(
            code
        )
               
    def CountGameTypeByName(self
        , name
    ) :         
        return self.data.CountGameTypeByName(
            name
        )
               
    def BrowseGameTypeListByFilter(self, filter_obj) :
        result = GameTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameTypeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_type = self.FillGameType(row)
                result.data.append(game_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameTypeByUuid(self, set_type, obj) :            
            return self.data.SetGameTypeByUuid(set_type, obj)
            
    def DelGameTypeByUuid(self
        , uuid
    ) :
        return self.data.DelGameTypeByUuid(
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
        
    def GetGameTypeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameTypeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_type  = self.FillGameType(row)
                results.append(game_type)
            return results        
        
    def GetGameTypeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameTypeListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_type  = self.FillGameType(row)
                results.append(game_type)
            return results        
        
    def GetGameTypeListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameTypeListByName(
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
               
    def CountProfileGameByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileGameByUuid(
            uuid
        )
               
    def CountProfileGameByGameId(self
        , game_id
    ) :         
        return self.data.CountProfileGameByGameId(
            game_id
        )
               
    def CountProfileGameByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileGameByProfileId(
            profile_id
        )
               
    def CountProfileGameByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountProfileGameByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def BrowseProfileGameListByFilter(self, filter_obj) :
        result = ProfileGameResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileGameListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_game = self.FillProfileGame(row)
                result.data.append(profile_game)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileGameByUuid(self, set_type, obj) :            
            return self.data.SetProfileGameByUuid(set_type, obj)
            
    def DelProfileGameByUuid(self
        , uuid
    ) :
        return self.data.DelProfileGameByUuid(
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
        
    def GetProfileGameListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileGameListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_game  = self.FillProfileGame(row)
                results.append(profile_game)
            return results        
        
    def GetProfileGameListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetProfileGameListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game  = self.FillProfileGame(row)
                results.append(profile_game)
            return results        
        
    def GetProfileGameListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileGameListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game  = self.FillProfileGame(row)
                results.append(profile_game)
            return results        
        
    def GetProfileGameListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetProfileGameListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game  = self.FillProfileGame(row)
                results.append(profile_game)
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
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['secret'] != None) :                 
            obj.secret = row['secret'] #dataType.FillData(dr, "secret");                
        if (row['token'] != None) :                 
            obj.token = row['token'] #dataType.FillData(dr, "token");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountProfileGameNetwork(self
    ) :         
        return self.data.CountProfileGameNetwork(
        )
               
    def CountProfileGameNetworkByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileGameNetworkByUuid(
            uuid
        )
               
    def CountProfileGameNetworkByGameId(self
        , game_id
    ) :         
        return self.data.CountProfileGameNetworkByGameId(
            game_id
        )
               
    def CountProfileGameNetworkByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileGameNetworkByProfileId(
            profile_id
        )
               
    def CountProfileGameNetworkByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountProfileGameNetworkByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def BrowseProfileGameNetworkListByFilter(self, filter_obj) :
        result = ProfileGameNetworkResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileGameNetworkListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_game_network = self.FillProfileGameNetwork(row)
                result.data.append(profile_game_network)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileGameNetworkByUuid(self, set_type, obj) :            
            return self.data.SetProfileGameNetworkByUuid(set_type, obj)
            
    def DelProfileGameNetworkByUuid(self
        , uuid
    ) :
        return self.data.DelProfileGameNetworkByUuid(
            uuid
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
        
    def GetProfileGameNetworkListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
    def GetProfileGameNetworkListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
    def GetProfileGameNetworkListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
    def GetProfileGameNetworkListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
        
    def FillProfileGameDataAttribute(self, row) :
        obj = ProfileGameDataAttribute()

        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['val'] != None) :                 
            obj.val = row['val'] #dataType.FillData(dr, "val");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['otype'] != None) :                 
            obj.otype = row['otype'] #dataType.FillData(dr, "otype");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                

        return obj
        
    def CountProfileGameDataAttribute(self
    ) :         
        return self.data.CountProfileGameDataAttribute(
        )
               
    def CountProfileGameDataAttributeByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileGameDataAttributeByUuid(
            uuid
        )
               
    def CountProfileGameDataAttributeByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileGameDataAttributeByProfileId(
            profile_id
        )
               
    def CountProfileGameDataAttributeByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
    ) :         
        return self.data.CountProfileGameDataAttributeByProfileIdByGameIdByCode(
            profile_id
            , game_id
            , code
        )
               
    def BrowseProfileGameDataAttributeListByFilter(self, filter_obj) :
        result = ProfileGameDataAttributeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileGameDataAttributeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_game_data_attribute = self.FillProfileGameDataAttribute(row)
                result.data.append(profile_game_data_attribute)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileGameDataAttributeByUuid(self, set_type, obj) :            
            return self.data.SetProfileGameDataAttributeByUuid(set_type, obj)
            
    def SetProfileGameDataAttributeByProfileId(self, set_type, obj) :            
            return self.data.SetProfileGameDataAttributeByProfileId(set_type, obj)
            
    def SetProfileGameDataAttributeByProfileIdByGameIdByCode(self, set_type, obj) :            
            return self.data.SetProfileGameDataAttributeByProfileIdByGameIdByCode(set_type, obj)
            
    def DelProfileGameDataAttributeByUuid(self
        , uuid
    ) :
        return self.data.DelProfileGameDataAttributeByUuid(
            uuid
        )
        
    def DelProfileGameDataAttributeByProfileId(self
        , profile_id
    ) :
        return self.data.DelProfileGameDataAttributeByProfileId(
            profile_id
        )
        
    def DelProfileGameDataAttributeByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
    ) :
        return self.data.DelProfileGameDataAttributeByProfileIdByGameIdByCode(
            profile_id
            , game_id
            , code
        )
        
    def GetProfileGameDataAttributeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileGameDataAttributeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_data_attribute  = self.FillProfileGameDataAttribute(row)
                results.append(profile_game_data_attribute)
            return results        
        
    def GetProfileGameDataAttributeListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileGameDataAttributeListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_data_attribute  = self.FillProfileGameDataAttribute(row)
                results.append(profile_game_data_attribute)
            return results        
        
    def GetProfileGameDataAttributeListByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
    ) :

        results = []
        rows = self.data.GetProfileGameDataAttributeListByProfileIdByGameIdByCode(
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
               
    def CountGameSessionByUuid(self
        , uuid
    ) :         
        return self.data.CountGameSessionByUuid(
            uuid
        )
               
    def CountGameSessionByGameId(self
        , game_id
    ) :         
        return self.data.CountGameSessionByGameId(
            game_id
        )
               
    def CountGameSessionByProfileId(self
        , profile_id
    ) :         
        return self.data.CountGameSessionByProfileId(
            profile_id
        )
               
    def CountGameSessionByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameSessionByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameSessionListByFilter(self, filter_obj) :
        result = GameSessionResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameSessionListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_session = self.FillGameSession(row)
                result.data.append(game_session)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameSessionByUuid(self, set_type, obj) :            
            return self.data.SetGameSessionByUuid(set_type, obj)
            
    def DelGameSessionByUuid(self
        , uuid
    ) :
        return self.data.DelGameSessionByUuid(
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
        
    def GetGameSessionListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameSessionListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_session  = self.FillGameSession(row)
                results.append(game_session)
            return results        
        
    def GetGameSessionListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameSessionListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_session  = self.FillGameSession(row)
                results.append(game_session)
            return results        
        
    def GetGameSessionListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameSessionListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_session  = self.FillGameSession(row)
                results.append(game_session)
            return results        
        
    def GetGameSessionListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameSessionListByProfileIdByGameId(
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
               
    def CountGameSessionDataByUuid(self
        , uuid
    ) :         
        return self.data.CountGameSessionDataByUuid(
            uuid
        )
               
    def BrowseGameSessionDataListByFilter(self, filter_obj) :
        result = GameSessionDataResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameSessionDataListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_session_data = self.FillGameSessionData(row)
                result.data.append(game_session_data)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameSessionDataByUuid(self, set_type, obj) :            
            return self.data.SetGameSessionDataByUuid(set_type, obj)
            
    def DelGameSessionDataByUuid(self
        , uuid
    ) :
        return self.data.DelGameSessionDataByUuid(
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
        
    def GetGameSessionDataListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameSessionDataListByUuid(
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
               
    def CountGameContentByUuid(self
        , uuid
    ) :         
        return self.data.CountGameContentByUuid(
            uuid
        )
               
    def CountGameContentByGameId(self
        , game_id
    ) :         
        return self.data.CountGameContentByGameId(
            game_id
        )
               
    def CountGameContentByGameIdByPath(self
        , game_id
        , path
    ) :         
        return self.data.CountGameContentByGameIdByPath(
            game_id
            , path
        )
               
    def CountGameContentByGameIdByPathByVersion(self
        , game_id
        , path
        , version
    ) :         
        return self.data.CountGameContentByGameIdByPathByVersion(
            game_id
            , path
            , version
        )
               
    def CountGameContentByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :         
        return self.data.CountGameContentByGameIdByPathByVersionByPlatformByIncrement(
            game_id
            , path
            , version
            , platform
            , increment
        )
               
    def BrowseGameContentListByFilter(self, filter_obj) :
        result = GameContentResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameContentListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_content = self.FillGameContent(row)
                result.data.append(game_content)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameContentByUuid(self, set_type, obj) :            
            return self.data.SetGameContentByUuid(set_type, obj)
            
    def SetGameContentByGameId(self, set_type, obj) :            
            return self.data.SetGameContentByGameId(set_type, obj)
            
    def SetGameContentByGameIdByPath(self, set_type, obj) :            
            return self.data.SetGameContentByGameIdByPath(set_type, obj)
            
    def SetGameContentByGameIdByPathByVersion(self, set_type, obj) :            
            return self.data.SetGameContentByGameIdByPathByVersion(set_type, obj)
            
    def SetGameContentByGameIdByPathByVersionByPlatformByIncrement(self, set_type, obj) :            
            return self.data.SetGameContentByGameIdByPathByVersionByPlatformByIncrement(set_type, obj)
            
    def DelGameContentByUuid(self
        , uuid
    ) :
        return self.data.DelGameContentByUuid(
            uuid
        )
        
    def DelGameContentByGameId(self
        , game_id
    ) :
        return self.data.DelGameContentByGameId(
            game_id
        )
        
    def DelGameContentByGameIdByPath(self
        , game_id
        , path
    ) :
        return self.data.DelGameContentByGameIdByPath(
            game_id
            , path
        )
        
    def DelGameContentByGameIdByPathByVersion(self
        , game_id
        , path
        , version
    ) :
        return self.data.DelGameContentByGameIdByPathByVersion(
            game_id
            , path
            , version
        )
        
    def DelGameContentByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :
        return self.data.DelGameContentByGameIdByPathByVersionByPlatformByIncrement(
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
        
    def GetGameContentListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameContentListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_content  = self.FillGameContent(row)
                results.append(game_content)
            return results        
        
    def GetGameContentListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameContentListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_content  = self.FillGameContent(row)
                results.append(game_content)
            return results        
        
    def GetGameContentListByGameIdByPath(self
        , game_id
        , path
    ) :

        results = []
        rows = self.data.GetGameContentListByGameIdByPath(
            game_id
            , path
        )
        
        if(rows != None) :
            for row in rows :
                game_content  = self.FillGameContent(row)
                results.append(game_content)
            return results        
        
    def GetGameContentListByGameIdByPathByVersion(self
        , game_id
        , path
        , version
    ) :

        results = []
        rows = self.data.GetGameContentListByGameIdByPathByVersion(
            game_id
            , path
            , version
        )
        
        if(rows != None) :
            for row in rows :
                game_content  = self.FillGameContent(row)
                results.append(game_content)
            return results        
        
    def GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :

        results = []
        rows = self.data.GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(
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
               
    def CountGameProfileContentByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileContentByUuid(
            uuid
        )
               
    def CountGameProfileContentByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :         
        return self.data.CountGameProfileContentByGameIdByProfileId(
            game_id
            , profile_id
        )
               
    def CountGameProfileContentByGameIdByUsername(self
        , game_id
        , username
    ) :         
        return self.data.CountGameProfileContentByGameIdByUsername(
            game_id
            , username
        )
               
    def CountGameProfileContentByUsername(self
        , username
    ) :         
        return self.data.CountGameProfileContentByUsername(
            username
        )
               
    def CountGameProfileContentByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
    ) :         
        return self.data.CountGameProfileContentByGameIdByProfileIdByPath(
            game_id
            , profile_id
            , path
        )
               
    def CountGameProfileContentByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :         
        return self.data.CountGameProfileContentByGameIdByProfileIdByPathByVersion(
            game_id
            , profile_id
            , path
            , version
        )
               
    def CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :         
        return self.data.CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
        )
               
    def CountGameProfileContentByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
    ) :         
        return self.data.CountGameProfileContentByGameIdByUsernameByPath(
            game_id
            , username
            , path
        )
               
    def CountGameProfileContentByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
    ) :         
        return self.data.CountGameProfileContentByGameIdByUsernameByPathByVersion(
            game_id
            , username
            , path
            , version
        )
               
    def CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :         
        return self.data.CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
            game_id
            , username
            , path
            , version
            , platform
            , increment
        )
               
    def BrowseGameProfileContentListByFilter(self, filter_obj) :
        result = GameProfileContentResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileContentListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_content = self.FillGameProfileContent(row)
                result.data.append(game_profile_content)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileContentByUuid(self, set_type, obj) :            
            return self.data.SetGameProfileContentByUuid(set_type, obj)
            
    def SetGameProfileContentByGameIdByProfileId(self, set_type, obj) :            
            return self.data.SetGameProfileContentByGameIdByProfileId(set_type, obj)
            
    def SetGameProfileContentByGameIdByUsername(self, set_type, obj) :            
            return self.data.SetGameProfileContentByGameIdByUsername(set_type, obj)
            
    def SetGameProfileContentByUsername(self, set_type, obj) :            
            return self.data.SetGameProfileContentByUsername(set_type, obj)
            
    def SetGameProfileContentByGameIdByProfileIdByPath(self, set_type, obj) :            
            return self.data.SetGameProfileContentByGameIdByProfileIdByPath(set_type, obj)
            
    def SetGameProfileContentByGameIdByProfileIdByPathByVersion(self, set_type, obj) :            
            return self.data.SetGameProfileContentByGameIdByProfileIdByPathByVersion(set_type, obj)
            
    def SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self, set_type, obj) :            
            return self.data.SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(set_type, obj)
            
    def SetGameProfileContentByGameIdByUsernameByPath(self, set_type, obj) :            
            return self.data.SetGameProfileContentByGameIdByUsernameByPath(set_type, obj)
            
    def SetGameProfileContentByGameIdByUsernameByPathByVersion(self, set_type, obj) :            
            return self.data.SetGameProfileContentByGameIdByUsernameByPathByVersion(set_type, obj)
            
    def SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self, set_type, obj) :            
            return self.data.SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(set_type, obj)
            
    def DelGameProfileContentByUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileContentByUuid(
            uuid
        )
        
    def DelGameProfileContentByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        return self.data.DelGameProfileContentByGameIdByProfileId(
            game_id
            , profile_id
        )
        
    def DelGameProfileContentByGameIdByUsername(self
        , game_id
        , username
    ) :
        return self.data.DelGameProfileContentByGameIdByUsername(
            game_id
            , username
        )
        
    def DelGameProfileContentByUsername(self
        , username
    ) :
        return self.data.DelGameProfileContentByUsername(
            username
        )
        
    def DelGameProfileContentByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
    ) :
        return self.data.DelGameProfileContentByGameIdByProfileIdByPath(
            game_id
            , profile_id
            , path
        )
        
    def DelGameProfileContentByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :
        return self.data.DelGameProfileContentByGameIdByProfileIdByPathByVersion(
            game_id
            , profile_id
            , path
            , version
        )
        
    def DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :
        return self.data.DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
            game_id
            , profile_id
            , path
            , version
            , platform
            , increment
        )
        
    def DelGameProfileContentByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
    ) :
        return self.data.DelGameProfileContentByGameIdByUsernameByPath(
            game_id
            , username
            , path
        )
        
    def DelGameProfileContentByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
    ) :
        return self.data.DelGameProfileContentByGameIdByUsernameByPathByVersion(
            game_id
            , username
            , path
            , version
        )
        
    def DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :
        return self.data.DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(
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
        
    def GetGameProfileContentListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileContentListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameProfileContentListByGameIdByProfileId(
            game_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListByGameIdByUsername(self
        , game_id
        , username
    ) :

        results = []
        rows = self.data.GetGameProfileContentListByGameIdByUsername(
            game_id
            , username
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListByUsername(self
        , username
    ) :

        results = []
        rows = self.data.GetGameProfileContentListByUsername(
            username
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
    ) :

        results = []
        rows = self.data.GetGameProfileContentListByGameIdByProfileIdByPath(
            game_id
            , profile_id
            , path
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :

        results = []
        rows = self.data.GetGameProfileContentListByGameIdByProfileIdByPathByVersion(
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
        
    def GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :

        results = []
        rows = self.data.GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(
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
        
    def GetGameProfileContentListByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
    ) :

        results = []
        rows = self.data.GetGameProfileContentListByGameIdByUsernameByPath(
            game_id
            , username
            , path
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_content  = self.FillGameProfileContent(row)
                results.append(game_profile_content)
            return results        
        
    def GetGameProfileContentListByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
    ) :

        results = []
        rows = self.data.GetGameProfileContentListByGameIdByUsernameByPathByVersion(
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
        
    def GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :

        results = []
        rows = self.data.GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(
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
               
    def CountGameAppByUuid(self
        , uuid
    ) :         
        return self.data.CountGameAppByUuid(
            uuid
        )
               
    def CountGameAppByGameId(self
        , game_id
    ) :         
        return self.data.CountGameAppByGameId(
            game_id
        )
               
    def CountGameAppByAppId(self
        , app_id
    ) :         
        return self.data.CountGameAppByAppId(
            app_id
        )
               
    def CountGameAppByGameIdByAppId(self
        , game_id
        , app_id
    ) :         
        return self.data.CountGameAppByGameIdByAppId(
            game_id
            , app_id
        )
               
    def BrowseGameAppListByFilter(self, filter_obj) :
        result = GameAppResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameAppListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_app = self.FillGameApp(row)
                result.data.append(game_app)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameAppByUuid(self, set_type, obj) :            
            return self.data.SetGameAppByUuid(set_type, obj)
            
    def DelGameAppByUuid(self
        , uuid
    ) :
        return self.data.DelGameAppByUuid(
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
        
    def GetGameAppListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameAppListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_app  = self.FillGameApp(row)
                results.append(game_app)
            return results        
        
    def GetGameAppListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAppListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_app  = self.FillGameApp(row)
                results.append(game_app)
            return results        
        
    def GetGameAppListByAppId(self
        , app_id
    ) :

        results = []
        rows = self.data.GetGameAppListByAppId(
            app_id
        )
        
        if(rows != None) :
            for row in rows :
                game_app  = self.FillGameApp(row)
                results.append(game_app)
            return results        
        
    def GetGameAppListByGameIdByAppId(self
        , game_id
        , app_id
    ) :

        results = []
        rows = self.data.GetGameAppListByGameIdByAppId(
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
               
    def CountProfileGameLocationByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileGameLocationByUuid(
            uuid
        )
               
    def CountProfileGameLocationByGameLocationId(self
        , game_location_id
    ) :         
        return self.data.CountProfileGameLocationByGameLocationId(
            game_location_id
        )
               
    def CountProfileGameLocationByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileGameLocationByProfileId(
            profile_id
        )
               
    def CountProfileGameLocationByProfileIdByGameLocationId(self
        , profile_id
        , game_location_id
    ) :         
        return self.data.CountProfileGameLocationByProfileIdByGameLocationId(
            profile_id
            , game_location_id
        )
               
    def BrowseProfileGameLocationListByFilter(self, filter_obj) :
        result = ProfileGameLocationResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileGameLocationListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_game_location = self.FillProfileGameLocation(row)
                result.data.append(profile_game_location)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileGameLocationByUuid(self, set_type, obj) :            
            return self.data.SetProfileGameLocationByUuid(set_type, obj)
            
    def DelProfileGameLocationByUuid(self
        , uuid
    ) :
        return self.data.DelProfileGameLocationByUuid(
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
        
    def GetProfileGameLocationListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileGameLocationListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_location  = self.FillProfileGameLocation(row)
                results.append(profile_game_location)
            return results        
        
    def GetProfileGameLocationListByGameLocationId(self
        , game_location_id
    ) :

        results = []
        rows = self.data.GetProfileGameLocationListByGameLocationId(
            game_location_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_location  = self.FillProfileGameLocation(row)
                results.append(profile_game_location)
            return results        
        
    def GetProfileGameLocationListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileGameLocationListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_location  = self.FillProfileGameLocation(row)
                results.append(profile_game_location)
            return results        
        
    def GetProfileGameLocationListByProfileIdByGameLocationId(self
        , profile_id
        , game_location_id
    ) :

        results = []
        rows = self.data.GetProfileGameLocationListByProfileIdByGameLocationId(
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
               
    def CountGamePhotoByUuid(self
        , uuid
    ) :         
        return self.data.CountGamePhotoByUuid(
            uuid
        )
               
    def CountGamePhotoByExternalId(self
        , external_id
    ) :         
        return self.data.CountGamePhotoByExternalId(
            external_id
        )
               
    def CountGamePhotoByUrl(self
        , url
    ) :         
        return self.data.CountGamePhotoByUrl(
            url
        )
               
    def CountGamePhotoByUrlByExternalId(self
        , url
        , external_id
    ) :         
        return self.data.CountGamePhotoByUrlByExternalId(
            url
            , external_id
        )
               
    def CountGamePhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :         
        return self.data.CountGamePhotoByUuidByExternalId(
            uuid
            , external_id
        )
               
    def BrowseGamePhotoListByFilter(self, filter_obj) :
        result = GamePhotoResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGamePhotoListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_photo = self.FillGamePhoto(row)
                result.data.append(game_photo)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGamePhotoByUuid(self, set_type, obj) :            
            return self.data.SetGamePhotoByUuid(set_type, obj)
            
    def SetGamePhotoByExternalId(self, set_type, obj) :            
            return self.data.SetGamePhotoByExternalId(set_type, obj)
            
    def SetGamePhotoByUrl(self, set_type, obj) :            
            return self.data.SetGamePhotoByUrl(set_type, obj)
            
    def SetGamePhotoByUrlByExternalId(self, set_type, obj) :            
            return self.data.SetGamePhotoByUrlByExternalId(set_type, obj)
            
    def SetGamePhotoByUuidByExternalId(self, set_type, obj) :            
            return self.data.SetGamePhotoByUuidByExternalId(set_type, obj)
            
    def DelGamePhotoByUuid(self
        , uuid
    ) :
        return self.data.DelGamePhotoByUuid(
            uuid
        )
        
    def DelGamePhotoByExternalId(self
        , external_id
    ) :
        return self.data.DelGamePhotoByExternalId(
            external_id
        )
        
    def DelGamePhotoByUrl(self
        , url
    ) :
        return self.data.DelGamePhotoByUrl(
            url
        )
        
    def DelGamePhotoByUrlByExternalId(self
        , url
        , external_id
    ) :
        return self.data.DelGamePhotoByUrlByExternalId(
            url
            , external_id
        )
        
    def DelGamePhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        return self.data.DelGamePhotoByUuidByExternalId(
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
        
    def GetGamePhotoListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGamePhotoListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_photo  = self.FillGamePhoto(row)
                results.append(game_photo)
            return results        
        
    def GetGamePhotoListByExternalId(self
        , external_id
    ) :

        results = []
        rows = self.data.GetGamePhotoListByExternalId(
            external_id
        )
        
        if(rows != None) :
            for row in rows :
                game_photo  = self.FillGamePhoto(row)
                results.append(game_photo)
            return results        
        
    def GetGamePhotoListByUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetGamePhotoListByUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                game_photo  = self.FillGamePhoto(row)
                results.append(game_photo)
            return results        
        
    def GetGamePhotoListByUrlByExternalId(self
        , url
        , external_id
    ) :

        results = []
        rows = self.data.GetGamePhotoListByUrlByExternalId(
            url
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                game_photo  = self.FillGamePhoto(row)
                results.append(game_photo)
            return results        
        
    def GetGamePhotoListByUuidByExternalId(self
        , uuid
        , external_id
    ) :

        results = []
        rows = self.data.GetGamePhotoListByUuidByExternalId(
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
               
    def CountGameVideoByUuid(self
        , uuid
    ) :         
        return self.data.CountGameVideoByUuid(
            uuid
        )
               
    def CountGameVideoByExternalId(self
        , external_id
    ) :         
        return self.data.CountGameVideoByExternalId(
            external_id
        )
               
    def CountGameVideoByUrl(self
        , url
    ) :         
        return self.data.CountGameVideoByUrl(
            url
        )
               
    def CountGameVideoByUrlByExternalId(self
        , url
        , external_id
    ) :         
        return self.data.CountGameVideoByUrlByExternalId(
            url
            , external_id
        )
               
    def CountGameVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :         
        return self.data.CountGameVideoByUuidByExternalId(
            uuid
            , external_id
        )
               
    def BrowseGameVideoListByFilter(self, filter_obj) :
        result = GameVideoResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameVideoListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_video = self.FillGameVideo(row)
                result.data.append(game_video)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameVideoByUuid(self, set_type, obj) :            
            return self.data.SetGameVideoByUuid(set_type, obj)
            
    def SetGameVideoByExternalId(self, set_type, obj) :            
            return self.data.SetGameVideoByExternalId(set_type, obj)
            
    def SetGameVideoByUrl(self, set_type, obj) :            
            return self.data.SetGameVideoByUrl(set_type, obj)
            
    def SetGameVideoByUrlByExternalId(self, set_type, obj) :            
            return self.data.SetGameVideoByUrlByExternalId(set_type, obj)
            
    def SetGameVideoByUuidByExternalId(self, set_type, obj) :            
            return self.data.SetGameVideoByUuidByExternalId(set_type, obj)
            
    def DelGameVideoByUuid(self
        , uuid
    ) :
        return self.data.DelGameVideoByUuid(
            uuid
        )
        
    def DelGameVideoByExternalId(self
        , external_id
    ) :
        return self.data.DelGameVideoByExternalId(
            external_id
        )
        
    def DelGameVideoByUrl(self
        , url
    ) :
        return self.data.DelGameVideoByUrl(
            url
        )
        
    def DelGameVideoByUrlByExternalId(self
        , url
        , external_id
    ) :
        return self.data.DelGameVideoByUrlByExternalId(
            url
            , external_id
        )
        
    def DelGameVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        return self.data.DelGameVideoByUuidByExternalId(
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
        
    def GetGameVideoListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameVideoListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_video  = self.FillGameVideo(row)
                results.append(game_video)
            return results        
        
    def GetGameVideoListByExternalId(self
        , external_id
    ) :

        results = []
        rows = self.data.GetGameVideoListByExternalId(
            external_id
        )
        
        if(rows != None) :
            for row in rows :
                game_video  = self.FillGameVideo(row)
                results.append(game_video)
            return results        
        
    def GetGameVideoListByUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetGameVideoListByUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                game_video  = self.FillGameVideo(row)
                results.append(game_video)
            return results        
        
    def GetGameVideoListByUrlByExternalId(self
        , url
        , external_id
    ) :

        results = []
        rows = self.data.GetGameVideoListByUrlByExternalId(
            url
            , external_id
        )
        
        if(rows != None) :
            for row in rows :
                game_video  = self.FillGameVideo(row)
                results.append(game_video)
            return results        
        
    def GetGameVideoListByUuidByExternalId(self
        , uuid
        , external_id
    ) :

        results = []
        rows = self.data.GetGameVideoListByUuidByExternalId(
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
               
    def CountGameRpgItemWeaponByUuid(self
        , uuid
    ) :         
        return self.data.CountGameRpgItemWeaponByUuid(
            uuid
        )
               
    def CountGameRpgItemWeaponByGameId(self
        , game_id
    ) :         
        return self.data.CountGameRpgItemWeaponByGameId(
            game_id
        )
               
    def CountGameRpgItemWeaponByUrl(self
        , url
    ) :         
        return self.data.CountGameRpgItemWeaponByUrl(
            url
        )
               
    def CountGameRpgItemWeaponByUrlByGameId(self
        , url
        , game_id
    ) :         
        return self.data.CountGameRpgItemWeaponByUrlByGameId(
            url
            , game_id
        )
               
    def CountGameRpgItemWeaponByUuidByGameId(self
        , uuid
        , game_id
    ) :         
        return self.data.CountGameRpgItemWeaponByUuidByGameId(
            uuid
            , game_id
        )
               
    def BrowseGameRpgItemWeaponListByFilter(self, filter_obj) :
        result = GameRpgItemWeaponResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameRpgItemWeaponListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon = self.FillGameRpgItemWeapon(row)
                result.data.append(game_rpg_item_weapon)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameRpgItemWeaponByUuid(self, set_type, obj) :            
            return self.data.SetGameRpgItemWeaponByUuid(set_type, obj)
            
    def SetGameRpgItemWeaponByGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemWeaponByGameId(set_type, obj)
            
    def SetGameRpgItemWeaponByUrl(self, set_type, obj) :            
            return self.data.SetGameRpgItemWeaponByUrl(set_type, obj)
            
    def SetGameRpgItemWeaponByUrlByGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemWeaponByUrlByGameId(set_type, obj)
            
    def SetGameRpgItemWeaponByUuidByGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemWeaponByUuidByGameId(set_type, obj)
            
    def DelGameRpgItemWeaponByUuid(self
        , uuid
    ) :
        return self.data.DelGameRpgItemWeaponByUuid(
            uuid
        )
        
    def DelGameRpgItemWeaponByGameId(self
        , game_id
    ) :
        return self.data.DelGameRpgItemWeaponByGameId(
            game_id
        )
        
    def DelGameRpgItemWeaponByUrl(self
        , url
    ) :
        return self.data.DelGameRpgItemWeaponByUrl(
            url
        )
        
    def DelGameRpgItemWeaponByUrlByGameId(self
        , url
        , game_id
    ) :
        return self.data.DelGameRpgItemWeaponByUrlByGameId(
            url
            , game_id
        )
        
    def DelGameRpgItemWeaponByUuidByGameId(self
        , uuid
        , game_id
    ) :
        return self.data.DelGameRpgItemWeaponByUuidByGameId(
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
        
    def GetGameRpgItemWeaponListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon  = self.FillGameRpgItemWeapon(row)
                results.append(game_rpg_item_weapon)
            return results        
        
    def GetGameRpgItemWeaponListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon  = self.FillGameRpgItemWeapon(row)
                results.append(game_rpg_item_weapon)
            return results        
        
    def GetGameRpgItemWeaponListByUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponListByUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon  = self.FillGameRpgItemWeapon(row)
                results.append(game_rpg_item_weapon)
            return results        
        
    def GetGameRpgItemWeaponListByUrlByGameId(self
        , url
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponListByUrlByGameId(
            url
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_weapon  = self.FillGameRpgItemWeapon(row)
                results.append(game_rpg_item_weapon)
            return results        
        
    def GetGameRpgItemWeaponListByUuidByGameId(self
        , uuid
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemWeaponListByUuidByGameId(
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
               
    def CountGameRpgItemSkillByUuid(self
        , uuid
    ) :         
        return self.data.CountGameRpgItemSkillByUuid(
            uuid
        )
               
    def CountGameRpgItemSkillByGameId(self
        , game_id
    ) :         
        return self.data.CountGameRpgItemSkillByGameId(
            game_id
        )
               
    def CountGameRpgItemSkillByUrl(self
        , url
    ) :         
        return self.data.CountGameRpgItemSkillByUrl(
            url
        )
               
    def CountGameRpgItemSkillByUrlByGameId(self
        , url
        , game_id
    ) :         
        return self.data.CountGameRpgItemSkillByUrlByGameId(
            url
            , game_id
        )
               
    def CountGameRpgItemSkillByUuidByGameId(self
        , uuid
        , game_id
    ) :         
        return self.data.CountGameRpgItemSkillByUuidByGameId(
            uuid
            , game_id
        )
               
    def BrowseGameRpgItemSkillListByFilter(self, filter_obj) :
        result = GameRpgItemSkillResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameRpgItemSkillListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill = self.FillGameRpgItemSkill(row)
                result.data.append(game_rpg_item_skill)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameRpgItemSkillByUuid(self, set_type, obj) :            
            return self.data.SetGameRpgItemSkillByUuid(set_type, obj)
            
    def SetGameRpgItemSkillByGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemSkillByGameId(set_type, obj)
            
    def SetGameRpgItemSkillByUrl(self, set_type, obj) :            
            return self.data.SetGameRpgItemSkillByUrl(set_type, obj)
            
    def SetGameRpgItemSkillByUrlByGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemSkillByUrlByGameId(set_type, obj)
            
    def SetGameRpgItemSkillByUuidByGameId(self, set_type, obj) :            
            return self.data.SetGameRpgItemSkillByUuidByGameId(set_type, obj)
            
    def DelGameRpgItemSkillByUuid(self
        , uuid
    ) :
        return self.data.DelGameRpgItemSkillByUuid(
            uuid
        )
        
    def DelGameRpgItemSkillByGameId(self
        , game_id
    ) :
        return self.data.DelGameRpgItemSkillByGameId(
            game_id
        )
        
    def DelGameRpgItemSkillByUrl(self
        , url
    ) :
        return self.data.DelGameRpgItemSkillByUrl(
            url
        )
        
    def DelGameRpgItemSkillByUrlByGameId(self
        , url
        , game_id
    ) :
        return self.data.DelGameRpgItemSkillByUrlByGameId(
            url
            , game_id
        )
        
    def DelGameRpgItemSkillByUuidByGameId(self
        , uuid
        , game_id
    ) :
        return self.data.DelGameRpgItemSkillByUuidByGameId(
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
        
    def GetGameRpgItemSkillListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill  = self.FillGameRpgItemSkill(row)
                results.append(game_rpg_item_skill)
            return results        
        
    def GetGameRpgItemSkillListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill  = self.FillGameRpgItemSkill(row)
                results.append(game_rpg_item_skill)
            return results        
        
    def GetGameRpgItemSkillListByUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillListByUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill  = self.FillGameRpgItemSkill(row)
                results.append(game_rpg_item_skill)
            return results        
        
    def GetGameRpgItemSkillListByUrlByGameId(self
        , url
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillListByUrlByGameId(
            url
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_rpg_item_skill  = self.FillGameRpgItemSkill(row)
                results.append(game_rpg_item_skill)
            return results        
        
    def GetGameRpgItemSkillListByUuidByGameId(self
        , uuid
        , game_id
    ) :

        results = []
        rows = self.data.GetGameRpgItemSkillListByUuidByGameId(
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
               
    def CountGameProductByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProductByUuid(
            uuid
        )
               
    def CountGameProductByGameId(self
        , game_id
    ) :         
        return self.data.CountGameProductByGameId(
            game_id
        )
               
    def CountGameProductByUrl(self
        , url
    ) :         
        return self.data.CountGameProductByUrl(
            url
        )
               
    def CountGameProductByUrlByGameId(self
        , url
        , game_id
    ) :         
        return self.data.CountGameProductByUrlByGameId(
            url
            , game_id
        )
               
    def CountGameProductByUuidByGameId(self
        , uuid
        , game_id
    ) :         
        return self.data.CountGameProductByUuidByGameId(
            uuid
            , game_id
        )
               
    def BrowseGameProductListByFilter(self, filter_obj) :
        result = GameProductResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProductListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_product = self.FillGameProduct(row)
                result.data.append(game_product)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProductByUuid(self, set_type, obj) :            
            return self.data.SetGameProductByUuid(set_type, obj)
            
    def SetGameProductByGameId(self, set_type, obj) :            
            return self.data.SetGameProductByGameId(set_type, obj)
            
    def SetGameProductByUrl(self, set_type, obj) :            
            return self.data.SetGameProductByUrl(set_type, obj)
            
    def SetGameProductByUrlByGameId(self, set_type, obj) :            
            return self.data.SetGameProductByUrlByGameId(set_type, obj)
            
    def SetGameProductByUuidByGameId(self, set_type, obj) :            
            return self.data.SetGameProductByUuidByGameId(set_type, obj)
            
    def DelGameProductByUuid(self
        , uuid
    ) :
        return self.data.DelGameProductByUuid(
            uuid
        )
        
    def DelGameProductByGameId(self
        , game_id
    ) :
        return self.data.DelGameProductByGameId(
            game_id
        )
        
    def DelGameProductByUrl(self
        , url
    ) :
        return self.data.DelGameProductByUrl(
            url
        )
        
    def DelGameProductByUrlByGameId(self
        , url
        , game_id
    ) :
        return self.data.DelGameProductByUrlByGameId(
            url
            , game_id
        )
        
    def DelGameProductByUuidByGameId(self
        , uuid
        , game_id
    ) :
        return self.data.DelGameProductByUuidByGameId(
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
        
    def GetGameProductListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProductListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_product  = self.FillGameProduct(row)
                results.append(game_product)
            return results        
        
    def GetGameProductListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProductListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_product  = self.FillGameProduct(row)
                results.append(game_product)
            return results        
        
    def GetGameProductListByUrl(self
        , url
    ) :

        results = []
        rows = self.data.GetGameProductListByUrl(
            url
        )
        
        if(rows != None) :
            for row in rows :
                game_product  = self.FillGameProduct(row)
                results.append(game_product)
            return results        
        
    def GetGameProductListByUrlByGameId(self
        , url
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProductListByUrlByGameId(
            url
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_product  = self.FillGameProduct(row)
                results.append(game_product)
            return results        
        
    def GetGameProductListByUuidByGameId(self
        , uuid
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProductListByUuidByGameId(
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
        if (row['key'] != None) :                 
            obj.key = row['key'] #dataType.FillData(dr, "key");                
        if (row['stat_value_formatted'] != None) :                 
            obj.stat_value_formatted = row['stat_value_formatted'] #dataType.FillData(dr, "stat_value_formatted");                
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
        if (row['timestamp'] != None) :                 
            obj.timestamp = row['timestamp'] #dataType.FillData(dr, "timestamp");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountGameStatisticLeaderboard(self
    ) :         
        return self.data.CountGameStatisticLeaderboard(
        )
               
    def CountGameStatisticLeaderboardByUuid(self
        , uuid
    ) :         
        return self.data.CountGameStatisticLeaderboardByUuid(
            uuid
        )
               
    def CountGameStatisticLeaderboardByKey(self
        , key
    ) :         
        return self.data.CountGameStatisticLeaderboardByKey(
            key
        )
               
    def CountGameStatisticLeaderboardByGameId(self
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardByGameId(
            game_id
        )
               
    def CountGameStatisticLeaderboardByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardByKeyByGameId(
            key
            , game_id
        )
               
    def CountGameStatisticLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def CountGameStatisticLeaderboardByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameStatisticLeaderboardByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
               
    def CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameStatisticLeaderboardListByFilter(self, filter_obj) :
        result = GameStatisticLeaderboardResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameStatisticLeaderboardListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard = self.FillGameStatisticLeaderboard(row)
                result.data.append(game_statistic_leaderboard)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameStatisticLeaderboardByUuid(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardByUuid(set_type, obj)
            
    def SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameStatisticLeaderboardByProfileIdByKey(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardByProfileIdByKey(set_type, obj)
            
    def SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(set_type, obj)
            
    def SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameStatisticLeaderboardByProfileIdByGameIdByKey(self, set_type, obj) :            
            return self.data.SetGameStatisticLeaderboardByProfileIdByGameIdByKey(set_type, obj)
            
    def DelGameStatisticLeaderboardByUuid(self
        , uuid
    ) :
        return self.data.DelGameStatisticLeaderboardByUuid(
            uuid
        )
        
    def DelGameStatisticLeaderboardByKeyByGameId(self
        , key
        , game_id
    ) :
        return self.data.DelGameStatisticLeaderboardByKeyByGameId(
            key
            , game_id
        )
        
    def DelGameStatisticLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameStatisticLeaderboardByProfileIdByGameId(
            profile_id
            , game_id
        )
        
    def DelGameStatisticLeaderboardByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        return self.data.DelGameStatisticLeaderboardByKeyByProfileIdByGameId(
            key
            , profile_id
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
        
    def GetGameStatisticLeaderboardListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListByKey(self
        , key
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListByKey(
            key
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListByKeyByGameId(self
        , key
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListByKeyByGameId(
            key
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
            return results        
        
    def GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_leaderboard  = self.FillGameStatisticLeaderboard(row)
                results.append(game_statistic_leaderboard)
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
               
    def CountGameLiveQueueByUuid(self
        , uuid
    ) :         
        return self.data.CountGameLiveQueueByUuid(
            uuid
        )
               
    def CountGameLiveQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameLiveQueueByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameLiveQueueListByFilter(self, filter_obj) :
        result = GameLiveQueueResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameLiveQueueListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_live_queue = self.FillGameLiveQueue(row)
                result.data.append(game_live_queue)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameLiveQueueByUuid(self, set_type, obj) :            
            return self.data.SetGameLiveQueueByUuid(set_type, obj)
            
    def SetGameLiveQueueByProfileIdByGameId(self, set_type, obj) :            
            return self.data.SetGameLiveQueueByProfileIdByGameId(set_type, obj)
            
    def DelGameLiveQueueByUuid(self
        , uuid
    ) :
        return self.data.DelGameLiveQueueByUuid(
            uuid
        )
        
    def DelGameLiveQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameLiveQueueByProfileIdByGameId(
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
        
    def GetGameLiveQueueListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameLiveQueueListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_live_queue  = self.FillGameLiveQueue(row)
                results.append(game_live_queue)
            return results        
        
    def GetGameLiveQueueListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLiveQueueListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_live_queue  = self.FillGameLiveQueue(row)
                results.append(game_live_queue)
            return results        
        
    def GetGameLiveQueueListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLiveQueueListByProfileIdByGameId(
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
               
    def CountGameLiveRecentQueueByUuid(self
        , uuid
    ) :         
        return self.data.CountGameLiveRecentQueueByUuid(
            uuid
        )
               
    def CountGameLiveRecentQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameLiveRecentQueueByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameLiveRecentQueueListByFilter(self, filter_obj) :
        result = GameLiveRecentQueueResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameLiveRecentQueueListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_live_recent_queue = self.FillGameLiveRecentQueue(row)
                result.data.append(game_live_recent_queue)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameLiveRecentQueueByUuid(self, set_type, obj) :            
            return self.data.SetGameLiveRecentQueueByUuid(set_type, obj)
            
    def SetGameLiveRecentQueueByProfileIdByGameId(self, set_type, obj) :            
            return self.data.SetGameLiveRecentQueueByProfileIdByGameId(set_type, obj)
            
    def DelGameLiveRecentQueueByUuid(self
        , uuid
    ) :
        return self.data.DelGameLiveRecentQueueByUuid(
            uuid
        )
        
    def DelGameLiveRecentQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameLiveRecentQueueByProfileIdByGameId(
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
        
    def GetGameLiveRecentQueueListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameLiveRecentQueueListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_live_recent_queue  = self.FillGameLiveRecentQueue(row)
                results.append(game_live_recent_queue)
            return results        
        
    def GetGameLiveRecentQueueListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLiveRecentQueueListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_live_recent_queue  = self.FillGameLiveRecentQueue(row)
                results.append(game_live_recent_queue)
            return results        
        
    def GetGameLiveRecentQueueListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLiveRecentQueueListByProfileIdByGameId(
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
        if (row['timestamp'] != None) :                 
            obj.timestamp = row['timestamp'] #dataType.FillData(dr, "timestamp");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['key'] != None) :                 
            obj.key = row['key'] #dataType.FillData(dr, "key");                
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
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountGameProfileStatistic(self
    ) :         
        return self.data.CountGameProfileStatistic(
        )
               
    def CountGameProfileStatisticByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileStatisticByUuid(
            uuid
        )
               
    def CountGameProfileStatisticByKey(self
        , key
    ) :         
        return self.data.CountGameProfileStatisticByKey(
            key
        )
               
    def CountGameProfileStatisticByGameId(self
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticByGameId(
            game_id
        )
               
    def CountGameProfileStatisticByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticByKeyByGameId(
            key
            , game_id
        )
               
    def CountGameProfileStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def CountGameProfileStatisticByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
               
    def CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameProfileStatisticListByFilter(self, filter_obj) :
        result = GameProfileStatisticResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileStatisticListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_statistic = self.FillGameProfileStatistic(row)
                result.data.append(game_profile_statistic)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileStatisticByUuid(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticByUuid(set_type, obj)
            
    def SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameProfileStatisticByProfileIdByKey(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticByProfileIdByKey(set_type, obj)
            
    def SetGameProfileStatisticByProfileIdByKeyByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticByProfileIdByKeyByTimestamp(set_type, obj)
            
    def SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameProfileStatisticByProfileIdByGameIdByKey(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticByProfileIdByGameIdByKey(set_type, obj)
            
    def DelGameProfileStatisticByUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileStatisticByUuid(
            uuid
        )
        
    def DelGameProfileStatisticByKeyByGameId(self
        , key
        , game_id
    ) :
        return self.data.DelGameProfileStatisticByKeyByGameId(
            key
            , game_id
        )
        
    def DelGameProfileStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameProfileStatisticByProfileIdByGameId(
            profile_id
            , game_id
        )
        
    def DelGameProfileStatisticByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        return self.data.DelGameProfileStatisticByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
        
    def GetGameProfileStatisticListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListByKey(self
        , key
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByKey(
            key
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListByKeyByGameId(self
        , key
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByKeyByGameId(
            key
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(
            key
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
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameStatisticMeta(self
    ) :         
        return self.data.CountGameStatisticMeta(
        )
               
    def CountGameStatisticMetaByUuid(self
        , uuid
    ) :         
        return self.data.CountGameStatisticMetaByUuid(
            uuid
        )
               
    def CountGameStatisticMetaByCode(self
        , code
    ) :         
        return self.data.CountGameStatisticMetaByCode(
            code
        )
               
    def CountGameStatisticMetaByName(self
        , name
    ) :         
        return self.data.CountGameStatisticMetaByName(
            name
        )
               
    def CountGameStatisticMetaByKey(self
        , key
    ) :         
        return self.data.CountGameStatisticMetaByKey(
            key
        )
               
    def CountGameStatisticMetaByGameId(self
        , game_id
    ) :         
        return self.data.CountGameStatisticMetaByGameId(
            game_id
        )
               
    def CountGameStatisticMetaByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.data.CountGameStatisticMetaByKeyByGameId(
            key
            , game_id
        )
               
    def BrowseGameStatisticMetaListByFilter(self, filter_obj) :
        result = GameStatisticMetaResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameStatisticMetaListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_statistic_meta = self.FillGameStatisticMeta(row)
                result.data.append(game_statistic_meta)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameStatisticMetaByUuid(self, set_type, obj) :            
            return self.data.SetGameStatisticMetaByUuid(set_type, obj)
            
    def SetGameStatisticMetaByKeyByGameId(self, set_type, obj) :            
            return self.data.SetGameStatisticMetaByKeyByGameId(set_type, obj)
            
    def DelGameStatisticMetaByUuid(self
        , uuid
    ) :
        return self.data.DelGameStatisticMetaByUuid(
            uuid
        )
        
    def DelGameStatisticMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        return self.data.DelGameStatisticMetaByKeyByGameId(
            key
            , game_id
        )
        
    def GetGameStatisticMetaListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
    def GetGameStatisticMetaListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
    def GetGameStatisticMetaListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
    def GetGameStatisticMetaListByKey(self
        , key
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListByKey(
            key
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
    def GetGameStatisticMetaListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
    def GetGameStatisticMetaListByKeyByGameId(self
        , key
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListByKeyByGameId(
            key
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
        if (row['timestamp'] != None) :                 
            obj.timestamp = row['timestamp'] #dataType.FillData(dr, "timestamp");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['key'] != None) :                 
            obj.key = row['key'] #dataType.FillData(dr, "key");                
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
               
    def CountGameProfileStatisticTimestampByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileStatisticTimestampByUuid(
            uuid
        )
               
    def CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameProfileStatisticTimestampListByFilter(self, filter_obj) :
        result = GameProfileStatisticTimestampResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileStatisticTimestampListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_statistic_timestamp = self.FillGameProfileStatisticTimestamp(row)
                result.data.append(game_profile_statistic_timestamp)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileStatisticTimestampByUuid(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticTimestampByUuid(set_type, obj)
            
    def SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def DelGameProfileStatisticTimestampByUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileStatisticTimestampByUuid(
            uuid
        )
        
    def DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        return self.data.DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
        
    def GetGameProfileStatisticTimestampListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticTimestampListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_timestamp  = self.FillGameProfileStatisticTimestamp(row)
                results.append(game_profile_statistic_timestamp)
            return results        
        
    def GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(
            key
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
               
    def CountGameKeyMetaByUuid(self
        , uuid
    ) :         
        return self.data.CountGameKeyMetaByUuid(
            uuid
        )
               
    def CountGameKeyMetaByCode(self
        , code
    ) :         
        return self.data.CountGameKeyMetaByCode(
            code
        )
               
    def CountGameKeyMetaByName(self
        , name
    ) :         
        return self.data.CountGameKeyMetaByName(
            name
        )
               
    def CountGameKeyMetaByKey(self
        , key
    ) :         
        return self.data.CountGameKeyMetaByKey(
            key
        )
               
    def CountGameKeyMetaByGameId(self
        , game_id
    ) :         
        return self.data.CountGameKeyMetaByGameId(
            game_id
        )
               
    def CountGameKeyMetaByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.data.CountGameKeyMetaByKeyByGameId(
            key
            , game_id
        )
               
    def BrowseGameKeyMetaListByFilter(self, filter_obj) :
        result = GameKeyMetaResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameKeyMetaListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_key_meta = self.FillGameKeyMeta(row)
                result.data.append(game_key_meta)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameKeyMetaByUuid(self, set_type, obj) :            
            return self.data.SetGameKeyMetaByUuid(set_type, obj)
            
    def SetGameKeyMetaByKeyByGameId(self, set_type, obj) :            
            return self.data.SetGameKeyMetaByKeyByGameId(set_type, obj)
            
    def SetGameKeyMetaByKeyByGameIdByLevel(self, set_type, obj) :            
            return self.data.SetGameKeyMetaByKeyByGameIdByLevel(set_type, obj)
            
    def DelGameKeyMetaByUuid(self
        , uuid
    ) :
        return self.data.DelGameKeyMetaByUuid(
            uuid
        )
        
    def DelGameKeyMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        return self.data.DelGameKeyMetaByKeyByGameId(
            key
            , game_id
        )
        
    def GetGameKeyMetaListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListByKey(self
        , key
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListByKey(
            key
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListByKeyByGameId(self
        , key
        , game_id
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListByKeyByGameId(
            key
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_key_meta  = self.FillGameKeyMeta(row)
                results.append(game_key_meta)
            return results        
        
    def GetGameKeyMetaListByCodeByLevel(self
        , code
        , level
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListByCodeByLevel(
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
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameLevel(self
    ) :         
        return self.data.CountGameLevel(
        )
               
    def CountGameLevelByUuid(self
        , uuid
    ) :         
        return self.data.CountGameLevelByUuid(
            uuid
        )
               
    def CountGameLevelByCode(self
        , code
    ) :         
        return self.data.CountGameLevelByCode(
            code
        )
               
    def CountGameLevelByName(self
        , name
    ) :         
        return self.data.CountGameLevelByName(
            name
        )
               
    def CountGameLevelByKey(self
        , key
    ) :         
        return self.data.CountGameLevelByKey(
            key
        )
               
    def CountGameLevelByGameId(self
        , game_id
    ) :         
        return self.data.CountGameLevelByGameId(
            game_id
        )
               
    def CountGameLevelByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.data.CountGameLevelByKeyByGameId(
            key
            , game_id
        )
               
    def BrowseGameLevelListByFilter(self, filter_obj) :
        result = GameLevelResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameLevelListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_level = self.FillGameLevel(row)
                result.data.append(game_level)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameLevelByUuid(self, set_type, obj) :            
            return self.data.SetGameLevelByUuid(set_type, obj)
            
    def SetGameLevelByKeyByGameId(self, set_type, obj) :            
            return self.data.SetGameLevelByKeyByGameId(set_type, obj)
            
    def DelGameLevelByUuid(self
        , uuid
    ) :
        return self.data.DelGameLevelByUuid(
            uuid
        )
        
    def DelGameLevelByKeyByGameId(self
        , key
        , game_id
    ) :
        return self.data.DelGameLevelByKeyByGameId(
            key
            , game_id
        )
        
    def GetGameLevelListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameLevelListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_level  = self.FillGameLevel(row)
                results.append(game_level)
            return results        
        
    def GetGameLevelListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameLevelListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_level  = self.FillGameLevel(row)
                results.append(game_level)
            return results        
        
    def GetGameLevelListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameLevelListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_level  = self.FillGameLevel(row)
                results.append(game_level)
            return results        
        
    def GetGameLevelListByKey(self
        , key
    ) :

        results = []
        rows = self.data.GetGameLevelListByKey(
            key
        )
        
        if(rows != None) :
            for row in rows :
                game_level  = self.FillGameLevel(row)
                results.append(game_level)
            return results        
        
    def GetGameLevelListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLevelListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_level  = self.FillGameLevel(row)
                results.append(game_level)
            return results        
        
    def GetGameLevelListByKeyByGameId(self
        , key
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLevelListByKeyByGameId(
            key
            , game_id
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
        if (row['timestamp'] != None) :                 
            obj.timestamp = row['timestamp'] #dataType.FillData(dr, "timestamp");                
        if (row['completed'] != None) :                 
            obj.completed = row['completed'] #dataType.FillData(dr, "completed");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['key'] != None) :                 
            obj.key = row['key'] #dataType.FillData(dr, "key");                
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
               
    def CountGameProfileAchievementByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileAchievementByUuid(
            uuid
        )
               
    def CountGameProfileAchievementByProfileIdByKey(self
        , profile_id
        , key
    ) :         
        return self.data.CountGameProfileAchievementByProfileIdByKey(
            profile_id
            , key
        )
               
    def CountGameProfileAchievementByUsername(self
        , username
    ) :         
        return self.data.CountGameProfileAchievementByUsername(
            username
        )
               
    def CountGameProfileAchievementByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileAchievementByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
               
    def CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(
            key
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameProfileAchievementListByFilter(self, filter_obj) :
        result = GameProfileAchievementResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileAchievementListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_achievement = self.FillGameProfileAchievement(row)
                result.data.append(game_profile_achievement)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileAchievementByUuid(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementByUuid(set_type, obj)
            
    def SetGameProfileAchievementByUuidByKey(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementByUuidByKey(set_type, obj)
            
    def SetGameProfileAchievementByProfileIdByKey(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementByProfileIdByKey(set_type, obj)
            
    def SetGameProfileAchievementByKeyByProfileIdByGameId(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementByKeyByProfileIdByGameId(set_type, obj)
            
    def SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def DelGameProfileAchievementByUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileAchievementByUuid(
            uuid
        )
        
    def DelGameProfileAchievementByProfileIdByKey(self
        , profile_id
        , key
    ) :
        return self.data.DelGameProfileAchievementByProfileIdByKey(
            profile_id
            , key
        )
        
    def DelGameProfileAchievementByUuidByKey(self
        , uuid
        , key
    ) :
        return self.data.DelGameProfileAchievementByUuidByKey(
            uuid
            , key
        )
        
    def GetGameProfileAchievementListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListByProfileIdByKey(self
        , profile_id
        , key
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByProfileIdByKey(
            profile_id
            , key
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListByUsername(self
        , username
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByUsername(
            username
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListByKey(self
        , key
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByKey(
            key
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListByKeyByGameId(self
        , key
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByKeyByGameId(
            key
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByKeyByProfileIdByGameId(
            key
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(
            key
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
        if (row['leaderboard'] != None) :                 
            obj.leaderboard = row['leaderboard'] #dataType.FillData(dr, "leaderboard");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountGameAchievementMeta(self
    ) :         
        return self.data.CountGameAchievementMeta(
        )
               
    def CountGameAchievementMetaByUuid(self
        , uuid
    ) :         
        return self.data.CountGameAchievementMetaByUuid(
            uuid
        )
               
    def CountGameAchievementMetaByCode(self
        , code
    ) :         
        return self.data.CountGameAchievementMetaByCode(
            code
        )
               
    def CountGameAchievementMetaByName(self
        , name
    ) :         
        return self.data.CountGameAchievementMetaByName(
            name
        )
               
    def CountGameAchievementMetaByKey(self
        , key
    ) :         
        return self.data.CountGameAchievementMetaByKey(
            key
        )
               
    def CountGameAchievementMetaByGameId(self
        , game_id
    ) :         
        return self.data.CountGameAchievementMetaByGameId(
            game_id
        )
               
    def CountGameAchievementMetaByKeyByGameId(self
        , key
        , game_id
    ) :         
        return self.data.CountGameAchievementMetaByKeyByGameId(
            key
            , game_id
        )
               
    def BrowseGameAchievementMetaListByFilter(self, filter_obj) :
        result = GameAchievementMetaResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameAchievementMetaListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_achievement_meta = self.FillGameAchievementMeta(row)
                result.data.append(game_achievement_meta)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameAchievementMetaByUuid(self, set_type, obj) :            
            return self.data.SetGameAchievementMetaByUuid(set_type, obj)
            
    def SetGameAchievementMetaByKeyByGameId(self, set_type, obj) :            
            return self.data.SetGameAchievementMetaByKeyByGameId(set_type, obj)
            
    def DelGameAchievementMetaByUuid(self
        , uuid
    ) :
        return self.data.DelGameAchievementMetaByUuid(
            uuid
        )
        
    def DelGameAchievementMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        return self.data.DelGameAchievementMetaByKeyByGameId(
            key
            , game_id
        )
        
    def GetGameAchievementMetaListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        
    def GetGameAchievementMetaListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        
    def GetGameAchievementMetaListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        
    def GetGameAchievementMetaListByKey(self
        , key
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListByKey(
            key
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        
    def GetGameAchievementMetaListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        
    def GetGameAchievementMetaListByKeyByGameId(self
        , key
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListByKeyByGameId(
            key
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_achievement_meta  = self.FillGameAchievementMeta(row)
                results.append(game_achievement_meta)
            return results        
        



