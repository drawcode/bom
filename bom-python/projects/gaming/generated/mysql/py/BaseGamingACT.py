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
        
        
    def FillGameAttribute(self, row) :
        obj = GameAttribute()

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
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['group'] != None) :                 
            obj.group = row['group'] #dataType.FillData(dr, "group");                
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
        
    def CountGameAttribute(self
    ) :         
        return self.data.CountGameAttribute(
        )
               
    def CountGameAttributeByUuid(self
        , uuid
    ) :         
        return self.data.CountGameAttributeByUuid(
            uuid
        )
               
    def CountGameAttributeByCode(self
        , code
    ) :         
        return self.data.CountGameAttributeByCode(
            code
        )
               
    def CountGameAttributeByType(self
        , type
    ) :         
        return self.data.CountGameAttributeByType(
            type
        )
               
    def CountGameAttributeByGroup(self
        , group
    ) :         
        return self.data.CountGameAttributeByGroup(
            group
        )
               
    def CountGameAttributeByCodeByType(self
        , code
        , type
    ) :         
        return self.data.CountGameAttributeByCodeByType(
            code
            , type
        )
               
    def CountGameAttributeByGameId(self
        , game_id
    ) :         
        return self.data.CountGameAttributeByGameId(
            game_id
        )
               
    def CountGameAttributeByGameIdByCode(self
        , game_id
        , code
    ) :         
        return self.data.CountGameAttributeByGameIdByCode(
            game_id
            , code
        )
               
    def BrowseGameAttributeListByFilter(self, filter_obj) :
        result = GameAttributeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameAttributeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_attribute = self.FillGameAttribute(row)
                result.data.append(game_attribute)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameAttributeByUuid(self, set_type, obj) :            
            return self.data.SetGameAttributeByUuid(set_type, obj)
            
    def SetGameAttributeByCode(self, set_type, obj) :            
            return self.data.SetGameAttributeByCode(set_type, obj)
            
    def SetGameAttributeByGameId(self, set_type, obj) :            
            return self.data.SetGameAttributeByGameId(set_type, obj)
            
    def SetGameAttributeByGameIdByCode(self, set_type, obj) :            
            return self.data.SetGameAttributeByGameIdByCode(set_type, obj)
            
    def DelGameAttributeByUuid(self
        , uuid
    ) :
        return self.data.DelGameAttributeByUuid(
            uuid
        )
        
    def DelGameAttributeByCode(self
        , code
    ) :
        return self.data.DelGameAttributeByCode(
            code
        )
        
    def DelGameAttributeByCodeByType(self
        , code
        , type
    ) :
        return self.data.DelGameAttributeByCodeByType(
            code
            , type
        )
        
    def DelGameAttributeByGameId(self
        , game_id
    ) :
        return self.data.DelGameAttributeByGameId(
            game_id
        )
        
    def DelGameAttributeByGameIdByCode(self
        , game_id
        , code
    ) :
        return self.data.DelGameAttributeByGameIdByCode(
            game_id
            , code
        )
        
    def GetGameAttributeList(self
    ) :

        results = []
        rows = self.data.GetGameAttributeList(
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute  = self.FillGameAttribute(row)
                results.append(game_attribute)
            return results        
        
    def GetGameAttributeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameAttributeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute  = self.FillGameAttribute(row)
                results.append(game_attribute)
            return results        
        
    def GetGameAttributeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameAttributeListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute  = self.FillGameAttribute(row)
                results.append(game_attribute)
            return results        
        
    def GetGameAttributeListByType(self
        , type
    ) :

        results = []
        rows = self.data.GetGameAttributeListByType(
            type
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute  = self.FillGameAttribute(row)
                results.append(game_attribute)
            return results        
        
    def GetGameAttributeListByGroup(self
        , group
    ) :

        results = []
        rows = self.data.GetGameAttributeListByGroup(
            group
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute  = self.FillGameAttribute(row)
                results.append(game_attribute)
            return results        
        
    def GetGameAttributeListByCodeByType(self
        , code
        , type
    ) :

        results = []
        rows = self.data.GetGameAttributeListByCodeByType(
            code
            , type
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute  = self.FillGameAttribute(row)
                results.append(game_attribute)
            return results        
        
    def GetGameAttributeListByGameIdByCode(self
        , game_id
        , code
    ) :

        results = []
        rows = self.data.GetGameAttributeListByGameIdByCode(
            game_id
            , code
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute  = self.FillGameAttribute(row)
                results.append(game_attribute)
            return results        
        
        
    def FillGameAttributeText(self, row) :
        obj = GameAttributeText()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['attribute_value'] != None) :                 
            obj.attribute_value = row['attribute_value'] #dataType.FillData(dr, "attribute_value");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['group'] != None) :                 
            obj.group = row['group'] #dataType.FillData(dr, "group");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['attribute_id'] != None) :                 
            obj.attribute_id = row['attribute_id'] #dataType.FillData(dr, "attribute_id");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['order'] != None) :                 
            obj.order = row['order'] #dataType.FillData(dr, "order");                

        return obj
        
    def CountGameAttributeText(self
    ) :         
        return self.data.CountGameAttributeText(
        )
               
    def CountGameAttributeTextByUuid(self
        , uuid
    ) :         
        return self.data.CountGameAttributeTextByUuid(
            uuid
        )
               
    def CountGameAttributeTextByGameId(self
        , game_id
    ) :         
        return self.data.CountGameAttributeTextByGameId(
            game_id
        )
               
    def CountGameAttributeTextByAttributeId(self
        , attribute_id
    ) :         
        return self.data.CountGameAttributeTextByAttributeId(
            attribute_id
        )
               
    def CountGameAttributeTextByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :         
        return self.data.CountGameAttributeTextByGameIdByAttributeId(
            game_id
            , attribute_id
        )
               
    def BrowseGameAttributeTextListByFilter(self, filter_obj) :
        result = GameAttributeTextResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameAttributeTextListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_attribute_text = self.FillGameAttributeText(row)
                result.data.append(game_attribute_text)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameAttributeTextByUuid(self, set_type, obj) :            
            return self.data.SetGameAttributeTextByUuid(set_type, obj)
            
    def SetGameAttributeTextByGameId(self, set_type, obj) :            
            return self.data.SetGameAttributeTextByGameId(set_type, obj)
            
    def SetGameAttributeTextByAttributeId(self, set_type, obj) :            
            return self.data.SetGameAttributeTextByAttributeId(set_type, obj)
            
    def SetGameAttributeTextByGameIdByAttributeId(self, set_type, obj) :            
            return self.data.SetGameAttributeTextByGameIdByAttributeId(set_type, obj)
            
    def DelGameAttributeText(self
    ) :
        return self.data.DelGameAttributeText(
        )
        
    def DelGameAttributeTextByUuid(self
        , uuid
    ) :
        return self.data.DelGameAttributeTextByUuid(
            uuid
        )
        
    def DelGameAttributeTextByGameId(self
        , game_id
    ) :
        return self.data.DelGameAttributeTextByGameId(
            game_id
        )
        
    def DelGameAttributeTextByAttributeId(self
        , attribute_id
    ) :
        return self.data.DelGameAttributeTextByAttributeId(
            attribute_id
        )
        
    def DelGameAttributeTextByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :
        return self.data.DelGameAttributeTextByGameIdByAttributeId(
            game_id
            , attribute_id
        )
        
    def GetGameAttributeTextList(self
    ) :

        results = []
        rows = self.data.GetGameAttributeTextList(
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute_text  = self.FillGameAttributeText(row)
                results.append(game_attribute_text)
            return results        
        
    def GetGameAttributeTextListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameAttributeTextListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute_text  = self.FillGameAttributeText(row)
                results.append(game_attribute_text)
            return results        
        
    def GetGameAttributeTextListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAttributeTextListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute_text  = self.FillGameAttributeText(row)
                results.append(game_attribute_text)
            return results        
        
    def GetGameAttributeTextListByAttributeId(self
        , attribute_id
    ) :

        results = []
        rows = self.data.GetGameAttributeTextListByAttributeId(
            attribute_id
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute_text  = self.FillGameAttributeText(row)
                results.append(game_attribute_text)
            return results        
        
    def GetGameAttributeTextListByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :

        results = []
        rows = self.data.GetGameAttributeTextListByGameIdByAttributeId(
            game_id
            , attribute_id
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute_text  = self.FillGameAttributeText(row)
                results.append(game_attribute_text)
            return results        
        
        
    def FillGameAttributeData(self, row) :
        obj = GameAttributeData()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['attribute_value'] != None) :                 
            obj.attribute_value = row['attribute_value'] #dataType.FillData(dr, "attribute_value");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['group'] != None) :                 
            obj.group = row['group'] #dataType.FillData(dr, "group");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['attribute_id'] != None) :                 
            obj.attribute_id = row['attribute_id'] #dataType.FillData(dr, "attribute_id");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['order'] != None) :                 
            obj.order = row['order'] #dataType.FillData(dr, "order");                

        return obj
        
    def CountGameAttributeData(self
    ) :         
        return self.data.CountGameAttributeData(
        )
               
    def CountGameAttributeDataByUuid(self
        , uuid
    ) :         
        return self.data.CountGameAttributeDataByUuid(
            uuid
        )
               
    def CountGameAttributeDataByGameId(self
        , game_id
    ) :         
        return self.data.CountGameAttributeDataByGameId(
            game_id
        )
               
    def CountGameAttributeDataByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :         
        return self.data.CountGameAttributeDataByGameIdByAttributeId(
            game_id
            , attribute_id
        )
               
    def BrowseGameAttributeDataListByFilter(self, filter_obj) :
        result = GameAttributeDataResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameAttributeDataListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_attribute_data = self.FillGameAttributeData(row)
                result.data.append(game_attribute_data)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameAttributeDataByUuid(self, set_type, obj) :            
            return self.data.SetGameAttributeDataByUuid(set_type, obj)
            
    def SetGameAttributeDataByGameIdByAttributeId(self, set_type, obj) :            
            return self.data.SetGameAttributeDataByGameIdByAttributeId(set_type, obj)
            
    def DelGameAttributeData(self
    ) :
        return self.data.DelGameAttributeData(
        )
        
    def DelGameAttributeDataByUuid(self
        , uuid
    ) :
        return self.data.DelGameAttributeDataByUuid(
            uuid
        )
        
    def DelGameAttributeDataByGameId(self
        , game_id
    ) :
        return self.data.DelGameAttributeDataByGameId(
            game_id
        )
        
    def DelGameAttributeDataByGameId(self
        , game_id
    ) :
        return self.data.DelGameAttributeDataByGameId(
            game_id
        )
        
    def GetGameAttributeDataList(self
    ) :

        results = []
        rows = self.data.GetGameAttributeDataList(
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute_data  = self.FillGameAttributeData(row)
                results.append(game_attribute_data)
            return results        
        
    def GetGameAttributeDataListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameAttributeDataListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute_data  = self.FillGameAttributeData(row)
                results.append(game_attribute_data)
            return results        
        
    def GetGameAttributeDataListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAttributeDataListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute_data  = self.FillGameAttributeData(row)
                results.append(game_attribute_data)
            return results        
        
    def GetGameAttributeDataListByGameIdByAttributeId(self
        , game_id
        , attribute_id
    ) :

        results = []
        rows = self.data.GetGameAttributeDataListByGameIdByAttributeId(
            game_id
            , attribute_id
        )
        
        if(rows != None) :
            for row in rows :
                game_attribute_data  = self.FillGameAttributeData(row)
                results.append(game_attribute_data)
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
        if (row['profile_iteration'] != None) :                 
            obj.profile_iteration = row['profile_iteration'] #dataType.FillData(dr, "profile_iteration");                
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
            
    def SetProfileGameByGameId(self, set_type, obj) :            
            return self.data.SetProfileGameByGameId(set_type, obj)
            
    def SetProfileGameByProfileId(self, set_type, obj) :            
            return self.data.SetProfileGameByProfileId(set_type, obj)
            
    def SetProfileGameByProfileIdByGameId(self, set_type, obj) :            
            return self.data.SetProfileGameByProfileIdByGameId(set_type, obj)
            
    def DelProfileGameByUuid(self
        , uuid
    ) :
        return self.data.DelProfileGameByUuid(
            uuid
        )
        
    def DelProfileGameByGameId(self
        , game_id
    ) :
        return self.data.DelProfileGameByGameId(
            game_id
        )
        
    def DelProfileGameByProfileId(self
        , profile_id
    ) :
        return self.data.DelProfileGameByProfileId(
            profile_id
        )
        
    def DelProfileGameByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelProfileGameByProfileIdByGameId(
            profile_id
            , game_id
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
        
        
    def FillGameProfileAttribute(self, row) :
        obj = GameProfileAttribute()

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
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['group'] != None) :                 
            obj.group = row['group'] #dataType.FillData(dr, "group");                
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
        
    def CountGameProfileAttribute(self
    ) :         
        return self.data.CountGameProfileAttribute(
        )
               
    def CountGameProfileAttributeByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileAttributeByUuid(
            uuid
        )
               
    def CountGameProfileAttributeByCode(self
        , code
    ) :         
        return self.data.CountGameProfileAttributeByCode(
            code
        )
               
    def CountGameProfileAttributeByType(self
        , type
    ) :         
        return self.data.CountGameProfileAttributeByType(
            type
        )
               
    def CountGameProfileAttributeByGroup(self
        , group
    ) :         
        return self.data.CountGameProfileAttributeByGroup(
            group
        )
               
    def CountGameProfileAttributeByCodeByType(self
        , code
        , type
    ) :         
        return self.data.CountGameProfileAttributeByCodeByType(
            code
            , type
        )
               
    def CountGameProfileAttributeByGameId(self
        , game_id
    ) :         
        return self.data.CountGameProfileAttributeByGameId(
            game_id
        )
               
    def CountGameProfileAttributeByGameIdByCode(self
        , game_id
        , code
    ) :         
        return self.data.CountGameProfileAttributeByGameIdByCode(
            game_id
            , code
        )
               
    def BrowseGameProfileAttributeListByFilter(self, filter_obj) :
        result = GameProfileAttributeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileAttributeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_attribute = self.FillGameProfileAttribute(row)
                result.data.append(game_profile_attribute)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileAttributeByUuid(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeByUuid(set_type, obj)
            
    def SetGameProfileAttributeByCode(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeByCode(set_type, obj)
            
    def SetGameProfileAttributeByGameId(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeByGameId(set_type, obj)
            
    def SetGameProfileAttributeByGameIdByCode(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeByGameIdByCode(set_type, obj)
            
    def DelGameProfileAttributeByUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileAttributeByUuid(
            uuid
        )
        
    def DelGameProfileAttributeByCode(self
        , code
    ) :
        return self.data.DelGameProfileAttributeByCode(
            code
        )
        
    def DelGameProfileAttributeByCodeByType(self
        , code
        , type
    ) :
        return self.data.DelGameProfileAttributeByCodeByType(
            code
            , type
        )
        
    def DelGameProfileAttributeByGameId(self
        , game_id
    ) :
        return self.data.DelGameProfileAttributeByGameId(
            game_id
        )
        
    def DelGameProfileAttributeByGameIdByCode(self
        , game_id
        , code
    ) :
        return self.data.DelGameProfileAttributeByGameIdByCode(
            game_id
            , code
        )
        
    def GetGameProfileAttributeList(self
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeList(
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute  = self.FillGameProfileAttribute(row)
                results.append(game_profile_attribute)
            return results        
        
    def GetGameProfileAttributeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute  = self.FillGameProfileAttribute(row)
                results.append(game_profile_attribute)
            return results        
        
    def GetGameProfileAttributeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute  = self.FillGameProfileAttribute(row)
                results.append(game_profile_attribute)
            return results        
        
    def GetGameProfileAttributeListByType(self
        , type
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeListByType(
            type
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute  = self.FillGameProfileAttribute(row)
                results.append(game_profile_attribute)
            return results        
        
    def GetGameProfileAttributeListByGroup(self
        , group
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeListByGroup(
            group
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute  = self.FillGameProfileAttribute(row)
                results.append(game_profile_attribute)
            return results        
        
    def GetGameProfileAttributeListByCodeByType(self
        , code
        , type
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeListByCodeByType(
            code
            , type
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute  = self.FillGameProfileAttribute(row)
                results.append(game_profile_attribute)
            return results        
        
    def GetGameProfileAttributeListByGameIdByCode(self
        , game_id
        , code
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeListByGameIdByCode(
            game_id
            , code
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute  = self.FillGameProfileAttribute(row)
                results.append(game_profile_attribute)
            return results        
        
        
    def FillGameProfileAttributeText(self, row) :
        obj = GameProfileAttributeText()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['attribute_value'] != None) :                 
            obj.attribute_value = row['attribute_value'] #dataType.FillData(dr, "attribute_value");                
        if (row['group'] != None) :                 
            obj.group = row['group'] #dataType.FillData(dr, "group");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['attribute_id'] != None) :                 
            obj.attribute_id = row['attribute_id'] #dataType.FillData(dr, "attribute_id");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['order'] != None) :                 
            obj.order = row['order'] #dataType.FillData(dr, "order");                

        return obj
        
    def CountGameProfileAttributeText(self
    ) :         
        return self.data.CountGameProfileAttributeText(
        )
               
    def CountGameProfileAttributeTextByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileAttributeTextByUuid(
            uuid
        )
               
    def CountGameProfileAttributeTextByProfileId(self
        , profile_id
    ) :         
        return self.data.CountGameProfileAttributeTextByProfileId(
            profile_id
        )
               
    def CountGameProfileAttributeTextByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.data.CountGameProfileAttributeTextByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
               
    def CountGameProfileAttributeTextByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :         
        return self.data.CountGameProfileAttributeTextByGameIdByProfileId(
            game_id
            , profile_id
        )
               
    def CountGameProfileAttributeTextByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :         
        return self.data.CountGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
            game_id
            , profile_id
            , attribute_id
        )
               
    def BrowseGameProfileAttributeTextListByFilter(self, filter_obj) :
        result = GameProfileAttributeTextResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileAttributeTextListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_attribute_text = self.FillGameProfileAttributeText(row)
                result.data.append(game_profile_attribute_text)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileAttributeTextByUuid(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeTextByUuid(set_type, obj)
            
    def SetGameProfileAttributeTextByProfileId(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeTextByProfileId(set_type, obj)
            
    def SetGameProfileAttributeTextByProfileIdByAttributeId(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeTextByProfileIdByAttributeId(set_type, obj)
            
    def SetGameProfileAttributeTextByGameIdByProfileId(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeTextByGameIdByProfileId(set_type, obj)
            
    def SetGameProfileAttributeTextByGameIdByProfileIdByAttributeId(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeTextByGameIdByProfileIdByAttributeId(set_type, obj)
            
    def DelGameProfileAttributeTextByUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileAttributeTextByUuid(
            uuid
        )
        
    def DelGameProfileAttributeTextByProfileId(self
        , profile_id
    ) :
        return self.data.DelGameProfileAttributeTextByProfileId(
            profile_id
        )
        
    def DelGameProfileAttributeTextByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return self.data.DelGameProfileAttributeTextByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
        
    def DelGameProfileAttributeTextByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        return self.data.DelGameProfileAttributeTextByGameIdByProfileId(
            game_id
            , profile_id
        )
        
    def DelGameProfileAttributeTextByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :
        return self.data.DelGameProfileAttributeTextByGameIdByProfileIdByAttributeId(
            game_id
            , profile_id
            , attribute_id
        )
        
    def GetGameProfileAttributeTextListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeTextListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_text  = self.FillGameProfileAttributeText(row)
                results.append(game_profile_attribute_text)
            return results        
        
    def GetGameProfileAttributeTextListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeTextListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_text  = self.FillGameProfileAttributeText(row)
                results.append(game_profile_attribute_text)
            return results        
        
    def GetGameProfileAttributeTextListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeTextListByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_text  = self.FillGameProfileAttributeText(row)
                results.append(game_profile_attribute_text)
            return results        
        
    def GetGameProfileAttributeTextListByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeTextListByGameIdByProfileId(
            game_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_text  = self.FillGameProfileAttributeText(row)
                results.append(game_profile_attribute_text)
            return results        
        
    def GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeTextListByGameIdByProfileIdByAttributeId(
            game_id
            , profile_id
            , attribute_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_text  = self.FillGameProfileAttributeText(row)
                results.append(game_profile_attribute_text)
            return results        
        
        
    def FillGameProfileAttributeData(self, row) :
        obj = GameProfileAttributeData()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['game_id'] != None) :                 
            obj.game_id = row['game_id'] #dataType.FillData(dr, "game_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['attribute_value'] != None) :                 
            obj.attribute_value = row['attribute_value'] #dataType.FillData(dr, "attribute_value");                
        if (row['group'] != None) :                 
            obj.group = row['group'] #dataType.FillData(dr, "group");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['attribute_id'] != None) :                 
            obj.attribute_id = row['attribute_id'] #dataType.FillData(dr, "attribute_id");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['order'] != None) :                 
            obj.order = row['order'] #dataType.FillData(dr, "order");                

        return obj
        
    def CountGameProfileAttributeData(self
    ) :         
        return self.data.CountGameProfileAttributeData(
        )
               
    def CountGameProfileAttributeDataByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileAttributeDataByUuid(
            uuid
        )
               
    def CountGameProfileAttributeDataByProfileId(self
        , profile_id
    ) :         
        return self.data.CountGameProfileAttributeDataByProfileId(
            profile_id
        )
               
    def CountGameProfileAttributeDataByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :         
        return self.data.CountGameProfileAttributeDataByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
               
    def CountGameProfileAttributeDataByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :         
        return self.data.CountGameProfileAttributeDataByGameIdByProfileId(
            game_id
            , profile_id
        )
               
    def CountGameProfileAttributeDataByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :         
        return self.data.CountGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
            game_id
            , profile_id
            , attribute_id
        )
               
    def BrowseGameProfileAttributeDataListByFilter(self, filter_obj) :
        result = GameProfileAttributeDataResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileAttributeDataListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_attribute_data = self.FillGameProfileAttributeData(row)
                result.data.append(game_profile_attribute_data)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileAttributeDataByUuid(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeDataByUuid(set_type, obj)
            
    def SetGameProfileAttributeDataByProfileIdByAttributeId(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeDataByProfileIdByAttributeId(set_type, obj)
            
    def SetGameProfileAttributeDataByGameIdByProfileId(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeDataByGameIdByProfileId(set_type, obj)
            
    def SetGameProfileAttributeDataByGameIdByProfileIdByAttributeId(self, set_type, obj) :            
            return self.data.SetGameProfileAttributeDataByGameIdByProfileIdByAttributeId(set_type, obj)
            
    def DelGameProfileAttributeDataByUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileAttributeDataByUuid(
            uuid
        )
        
    def DelGameProfileAttributeDataByProfileId(self
        , profile_id
    ) :
        return self.data.DelGameProfileAttributeDataByProfileId(
            profile_id
        )
        
    def DelGameProfileAttributeDataByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :
        return self.data.DelGameProfileAttributeDataByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
        
    def DelGameProfileAttributeDataByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        return self.data.DelGameProfileAttributeDataByGameIdByProfileId(
            game_id
            , profile_id
        )
        
    def DelGameProfileAttributeDataByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :
        return self.data.DelGameProfileAttributeDataByGameIdByProfileIdByAttributeId(
            game_id
            , profile_id
            , attribute_id
        )
        
    def GetGameProfileAttributeDataList(self
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeDataList(
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_data  = self.FillGameProfileAttributeData(row)
                results.append(game_profile_attribute_data)
            return results        
        
    def GetGameProfileAttributeDataListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeDataListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_data  = self.FillGameProfileAttributeData(row)
                results.append(game_profile_attribute_data)
            return results        
        
    def GetGameProfileAttributeDataListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeDataListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_data  = self.FillGameProfileAttributeData(row)
                results.append(game_profile_attribute_data)
            return results        
        
    def GetGameProfileAttributeDataListByProfileIdByAttributeId(self
        , profile_id
        , attribute_id
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeDataListByProfileIdByAttributeId(
            profile_id
            , attribute_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_data  = self.FillGameProfileAttributeData(row)
                results.append(game_profile_attribute_data)
            return results        
        
    def GetGameProfileAttributeDataListByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeDataListByGameIdByProfileId(
            game_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_data  = self.FillGameProfileAttributeData(row)
                results.append(game_profile_attribute_data)
            return results        
        
    def GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(self
        , game_id
        , profile_id
        , attribute_id
    ) :

        results = []
        rows = self.data.GetGameProfileAttributeDataListByGameIdByProfileIdByAttributeId(
            game_id
            , profile_id
            , attribute_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_attribute_data  = self.FillGameProfileAttributeData(row)
                results.append(game_profile_attribute_data)
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
               
    def CountGameNetworkByUuid(self
        , uuid
    ) :         
        return self.data.CountGameNetworkByUuid(
            uuid
        )
               
    def CountGameNetworkByCode(self
        , code
    ) :         
        return self.data.CountGameNetworkByCode(
            code
        )
               
    def CountGameNetworkByUuidByType(self
        , uuid
        , type
    ) :         
        return self.data.CountGameNetworkByUuidByType(
            uuid
            , type
        )
               
    def BrowseGameNetworkListByFilter(self, filter_obj) :
        result = GameNetworkResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameNetworkListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_network = self.FillGameNetwork(row)
                result.data.append(game_network)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameNetworkByUuid(self, set_type, obj) :            
            return self.data.SetGameNetworkByUuid(set_type, obj)
            
    def SetGameNetworkByCode(self, set_type, obj) :            
            return self.data.SetGameNetworkByCode(set_type, obj)
            
    def DelGameNetworkByUuid(self
        , uuid
    ) :
        return self.data.DelGameNetworkByUuid(
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
        
    def GetGameNetworkListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameNetworkListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_network  = self.FillGameNetwork(row)
                results.append(game_network)
            return results        
        
    def GetGameNetworkListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameNetworkListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_network  = self.FillGameNetwork(row)
                results.append(game_network)
            return results        
        
    def GetGameNetworkListByUuidByType(self
        , uuid
        , type
    ) :

        results = []
        rows = self.data.GetGameNetworkListByUuidByType(
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
               
    def CountGameNetworkAuthByUuid(self
        , uuid
    ) :         
        return self.data.CountGameNetworkAuthByUuid(
            uuid
        )
               
    def CountGameNetworkAuthByGameIdByGameNetworkId(self
        , game_id
        , game_network_id
    ) :         
        return self.data.CountGameNetworkAuthByGameIdByGameNetworkId(
            game_id
            , game_network_id
        )
               
    def BrowseGameNetworkAuthListByFilter(self, filter_obj) :
        result = GameNetworkAuthResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameNetworkAuthListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_network_auth = self.FillGameNetworkAuth(row)
                result.data.append(game_network_auth)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameNetworkAuthByUuid(self, set_type, obj) :            
            return self.data.SetGameNetworkAuthByUuid(set_type, obj)
            
    def SetGameNetworkAuthByGameIdByGameNetworkId(self, set_type, obj) :            
            return self.data.SetGameNetworkAuthByGameIdByGameNetworkId(set_type, obj)
            
    def DelGameNetworkAuthByUuid(self
        , uuid
    ) :
        return self.data.DelGameNetworkAuthByUuid(
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
        
    def GetGameNetworkAuthListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameNetworkAuthListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_network_auth  = self.FillGameNetworkAuth(row)
                results.append(game_network_auth)
            return results        
        
    def GetGameNetworkAuthListByGameIdByGameNetworkId(self
        , game_id
        , game_network_id
    ) :

        results = []
        rows = self.data.GetGameNetworkAuthListByGameIdByGameNetworkId(
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
               
    def CountProfileGameNetworkByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountProfileGameNetworkByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :         
        return self.data.CountProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            profile_id
            , game_id
            , game_network_id
        )
               
    def CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :         
        return self.data.CountProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
            network_username
            , game_id
            , game_network_id
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
            
    def SetProfileGameNetworkByProfileIdByGameId(self, set_type, obj) :            
            return self.data.SetProfileGameNetworkByProfileIdByGameId(set_type, obj)
            
    def SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(self, set_type, obj) :            
            return self.data.SetProfileGameNetworkByProfileIdByGameIdByGameNetworkId(set_type, obj)
            
    def SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(self, set_type, obj) :            
            return self.data.SetProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(set_type, obj)
            
    def DelProfileGameNetworkByUuid(self
        , uuid
    ) :
        return self.data.DelProfileGameNetworkByUuid(
            uuid
        )
        
    def DelProfileGameNetworkByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelProfileGameNetworkByProfileIdByGameId(
            profile_id
            , game_id
        )
        
    def DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :
        return self.data.DelProfileGameNetworkByProfileIdByGameIdByGameNetworkId(
            profile_id
            , game_id
            , game_network_id
        )
        
    def DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :
        return self.data.DelProfileGameNetworkByNetworkUsernameByGameIdByGameNetworkId(
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
        
    def GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListByProfileIdByGameIdByGameNetworkId(
            profile_id
            , game_id
            , game_network_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_game_network  = self.FillProfileGameNetwork(row)
                results.append(profile_game_network)
            return results        
        
    def GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :

        results = []
        rows = self.data.GetProfileGameNetworkListByNetworkUsernameByGameIdByGameNetworkId(
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
        if (row['type_id'] != None) :                 
            obj.type_id = row['type_id'] #dataType.FillData(dr, "type_id");                

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
        
        
    def FillGameLeaderboard(self, row) :
        obj = GameLeaderboard()

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
        
    def CountGameLeaderboard(self
    ) :         
        return self.data.CountGameLeaderboard(
        )
               
    def CountGameLeaderboardByUuid(self
        , uuid
    ) :         
        return self.data.CountGameLeaderboardByUuid(
            uuid
        )
               
    def CountGameLeaderboardByGameId(self
        , game_id
    ) :         
        return self.data.CountGameLeaderboardByGameId(
            game_id
        )
               
    def CountGameLeaderboardByCode(self
        , code
    ) :         
        return self.data.CountGameLeaderboardByCode(
            code
        )
               
    def CountGameLeaderboardByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameLeaderboardByCodeByGameId(
            code
            , game_id
        )
               
    def CountGameLeaderboardByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.data.CountGameLeaderboardByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
        )
               
    def CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.data.CountGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
               
    def CountGameLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameLeaderboardByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameLeaderboardListByFilter(self, filter_obj) :
        result = GameLeaderboardResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameLeaderboardListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_leaderboard = self.FillGameLeaderboard(row)
                result.data.append(game_leaderboard)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameLeaderboardByUuid(self, set_type, obj) :            
            return self.data.SetGameLeaderboardByUuid(set_type, obj)
            
    def SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameLeaderboardByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameLeaderboardByCode(self, set_type, obj) :            
            return self.data.SetGameLeaderboardByCode(set_type, obj)
            
    def SetGameLeaderboardByCodeByGameId(self, set_type, obj) :            
            return self.data.SetGameLeaderboardByCodeByGameId(set_type, obj)
            
    def SetGameLeaderboardByCodeByGameIdByProfileId(self, set_type, obj) :            
            return self.data.SetGameLeaderboardByCodeByGameIdByProfileId(set_type, obj)
            
    def SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(set_type, obj)
            
    def DelGameLeaderboardByUuid(self
        , uuid
    ) :
        return self.data.DelGameLeaderboardByUuid(
            uuid
        )
        
    def DelGameLeaderboardByCode(self
        , code
    ) :
        return self.data.DelGameLeaderboardByCode(
            code
        )
        
    def DelGameLeaderboardByCodeByGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameLeaderboardByCodeByGameId(
            code
            , game_id
        )
        
    def DelGameLeaderboardByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return self.data.DelGameLeaderboardByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
        )
        
    def DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return self.data.DelGameLeaderboardByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
    def DelGameLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameLeaderboardByProfileIdByGameId(
            profile_id
            , game_id
        )
        
    def GetGameLeaderboardList(self
    ) :

        results = []
        rows = self.data.GetGameLeaderboardList(
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard  = self.FillGameLeaderboard(row)
                results.append(game_leaderboard)
            return results        
        
    def GetGameLeaderboardListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameLeaderboardListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard  = self.FillGameLeaderboard(row)
                results.append(game_leaderboard)
            return results        
        
    def GetGameLeaderboardListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard  = self.FillGameLeaderboard(row)
                results.append(game_leaderboard)
            return results        
        
    def GetGameLeaderboardListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameLeaderboardListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard  = self.FillGameLeaderboard(row)
                results.append(game_leaderboard)
            return results        
        
    def GetGameLeaderboardListByCodeByGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardListByCodeByGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard  = self.FillGameLeaderboard(row)
                results.append(game_leaderboard)
            return results        
        
    def GetGameLeaderboardListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard  = self.FillGameLeaderboard(row)
                results.append(game_leaderboard)
            return results        
        
    def GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameLeaderboardListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard  = self.FillGameLeaderboard(row)
                results.append(game_leaderboard)
            return results        
        
    def GetGameLeaderboardListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard  = self.FillGameLeaderboard(row)
                results.append(game_leaderboard)
            return results        
        
    def GetGameLeaderboardListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameLeaderboardListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard  = self.FillGameLeaderboard(row)
                results.append(game_leaderboard)
            return results        
        
        
    def FillGameLeaderboardItem(self, row) :
        obj = GameLeaderboardItem()

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
        
    def CountGameLeaderboardItem(self
    ) :         
        return self.data.CountGameLeaderboardItem(
        )
               
    def CountGameLeaderboardItemByUuid(self
        , uuid
    ) :         
        return self.data.CountGameLeaderboardItemByUuid(
            uuid
        )
               
    def CountGameLeaderboardItemByGameId(self
        , game_id
    ) :         
        return self.data.CountGameLeaderboardItemByGameId(
            game_id
        )
               
    def CountGameLeaderboardItemByCode(self
        , code
    ) :         
        return self.data.CountGameLeaderboardItemByCode(
            code
        )
               
    def CountGameLeaderboardItemByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameLeaderboardItemByCodeByGameId(
            code
            , game_id
        )
               
    def CountGameLeaderboardItemByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.data.CountGameLeaderboardItemByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
        )
               
    def CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.data.CountGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
               
    def CountGameLeaderboardItemByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameLeaderboardItemByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameLeaderboardItemListByFilter(self, filter_obj) :
        result = GameLeaderboardItemResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameLeaderboardItemListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_leaderboard_item = self.FillGameLeaderboardItem(row)
                result.data.append(game_leaderboard_item)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameLeaderboardItemByUuid(self, set_type, obj) :            
            return self.data.SetGameLeaderboardItemByUuid(set_type, obj)
            
    def SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameLeaderboardItemByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameLeaderboardItemByCode(self, set_type, obj) :            
            return self.data.SetGameLeaderboardItemByCode(set_type, obj)
            
    def SetGameLeaderboardItemByCodeByGameId(self, set_type, obj) :            
            return self.data.SetGameLeaderboardItemByCodeByGameId(set_type, obj)
            
    def SetGameLeaderboardItemByCodeByGameIdByProfileId(self, set_type, obj) :            
            return self.data.SetGameLeaderboardItemByCodeByGameIdByProfileId(set_type, obj)
            
    def SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(set_type, obj)
            
    def DelGameLeaderboardItemByUuid(self
        , uuid
    ) :
        return self.data.DelGameLeaderboardItemByUuid(
            uuid
        )
        
    def DelGameLeaderboardItemByCode(self
        , code
    ) :
        return self.data.DelGameLeaderboardItemByCode(
            code
        )
        
    def DelGameLeaderboardItemByCodeByGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameLeaderboardItemByCodeByGameId(
            code
            , game_id
        )
        
    def DelGameLeaderboardItemByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return self.data.DelGameLeaderboardItemByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
        )
        
    def DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return self.data.DelGameLeaderboardItemByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
    def DelGameLeaderboardItemByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameLeaderboardItemByProfileIdByGameId(
            profile_id
            , game_id
        )
        
    def GetGameLeaderboardItemList(self
    ) :

        results = []
        rows = self.data.GetGameLeaderboardItemList(
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_item  = self.FillGameLeaderboardItem(row)
                results.append(game_leaderboard_item)
            return results        
        
    def GetGameLeaderboardItemListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameLeaderboardItemListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_item  = self.FillGameLeaderboardItem(row)
                results.append(game_leaderboard_item)
            return results        
        
    def GetGameLeaderboardItemListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardItemListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_item  = self.FillGameLeaderboardItem(row)
                results.append(game_leaderboard_item)
            return results        
        
    def GetGameLeaderboardItemListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameLeaderboardItemListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_item  = self.FillGameLeaderboardItem(row)
                results.append(game_leaderboard_item)
            return results        
        
    def GetGameLeaderboardItemListByCodeByGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardItemListByCodeByGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_item  = self.FillGameLeaderboardItem(row)
                results.append(game_leaderboard_item)
            return results        
        
    def GetGameLeaderboardItemListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardItemListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_item  = self.FillGameLeaderboardItem(row)
                results.append(game_leaderboard_item)
            return results        
        
    def GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameLeaderboardItemListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_item  = self.FillGameLeaderboardItem(row)
                results.append(game_leaderboard_item)
            return results        
        
    def GetGameLeaderboardItemListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardItemListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_item  = self.FillGameLeaderboardItem(row)
                results.append(game_leaderboard_item)
            return results        
        
    def GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameLeaderboardItemListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_item  = self.FillGameLeaderboardItem(row)
                results.append(game_leaderboard_item)
            return results        
        
        
    def FillGameLeaderboardRollup(self, row) :
        obj = GameLeaderboardRollup()

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
        
    def CountGameLeaderboardRollup(self
    ) :         
        return self.data.CountGameLeaderboardRollup(
        )
               
    def CountGameLeaderboardRollupByUuid(self
        , uuid
    ) :         
        return self.data.CountGameLeaderboardRollupByUuid(
            uuid
        )
               
    def CountGameLeaderboardRollupByGameId(self
        , game_id
    ) :         
        return self.data.CountGameLeaderboardRollupByGameId(
            game_id
        )
               
    def CountGameLeaderboardRollupByCode(self
        , code
    ) :         
        return self.data.CountGameLeaderboardRollupByCode(
            code
        )
               
    def CountGameLeaderboardRollupByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameLeaderboardRollupByCodeByGameId(
            code
            , game_id
        )
               
    def CountGameLeaderboardRollupByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :         
        return self.data.CountGameLeaderboardRollupByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
        )
               
    def CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :         
        return self.data.CountGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
               
    def CountGameLeaderboardRollupByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameLeaderboardRollupByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def BrowseGameLeaderboardRollupListByFilter(self, filter_obj) :
        result = GameLeaderboardRollupResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameLeaderboardRollupListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_leaderboard_rollup = self.FillGameLeaderboardRollup(row)
                result.data.append(game_leaderboard_rollup)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameLeaderboardRollupByUuid(self, set_type, obj) :            
            return self.data.SetGameLeaderboardRollupByUuid(set_type, obj)
            
    def SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameLeaderboardRollupByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameLeaderboardRollupByCode(self, set_type, obj) :            
            return self.data.SetGameLeaderboardRollupByCode(set_type, obj)
            
    def SetGameLeaderboardRollupByCodeByGameId(self, set_type, obj) :            
            return self.data.SetGameLeaderboardRollupByCodeByGameId(set_type, obj)
            
    def SetGameLeaderboardRollupByCodeByGameIdByProfileId(self, set_type, obj) :            
            return self.data.SetGameLeaderboardRollupByCodeByGameIdByProfileId(set_type, obj)
            
    def SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(set_type, obj)
            
    def DelGameLeaderboardRollupByUuid(self
        , uuid
    ) :
        return self.data.DelGameLeaderboardRollupByUuid(
            uuid
        )
        
    def DelGameLeaderboardRollupByCode(self
        , code
    ) :
        return self.data.DelGameLeaderboardRollupByCode(
            code
        )
        
    def DelGameLeaderboardRollupByCodeByGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameLeaderboardRollupByCodeByGameId(
            code
            , game_id
        )
        
    def DelGameLeaderboardRollupByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        return self.data.DelGameLeaderboardRollupByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
        )
        
    def DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        return self.data.DelGameLeaderboardRollupByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
    def DelGameLeaderboardRollupByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameLeaderboardRollupByProfileIdByGameId(
            profile_id
            , game_id
        )
        
    def GetGameLeaderboardRollupList(self
    ) :

        results = []
        rows = self.data.GetGameLeaderboardRollupList(
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_rollup  = self.FillGameLeaderboardRollup(row)
                results.append(game_leaderboard_rollup)
            return results        
        
    def GetGameLeaderboardRollupListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameLeaderboardRollupListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_rollup  = self.FillGameLeaderboardRollup(row)
                results.append(game_leaderboard_rollup)
            return results        
        
    def GetGameLeaderboardRollupListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardRollupListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_rollup  = self.FillGameLeaderboardRollup(row)
                results.append(game_leaderboard_rollup)
            return results        
        
    def GetGameLeaderboardRollupListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameLeaderboardRollupListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_rollup  = self.FillGameLeaderboardRollup(row)
                results.append(game_leaderboard_rollup)
            return results        
        
    def GetGameLeaderboardRollupListByCodeByGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardRollupListByCodeByGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_rollup  = self.FillGameLeaderboardRollup(row)
                results.append(game_leaderboard_rollup)
            return results        
        
    def GetGameLeaderboardRollupListByCodeByGameIdByProfileId(self
        , code
        , game_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardRollupListByCodeByGameIdByProfileId(
            code
            , game_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_rollup  = self.FillGameLeaderboardRollup(row)
                results.append(game_leaderboard_rollup)
            return results        
        
    def GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameLeaderboardRollupListByCodeByGameIdByProfileIdByTimestamp(
            code
            , game_id
            , profile_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_rollup  = self.FillGameLeaderboardRollup(row)
                results.append(game_leaderboard_rollup)
            return results        
        
    def GetGameLeaderboardRollupListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLeaderboardRollupListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_rollup  = self.FillGameLeaderboardRollup(row)
                results.append(game_leaderboard_rollup)
            return results        
        
    def GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameLeaderboardRollupListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_leaderboard_rollup  = self.FillGameLeaderboardRollup(row)
                results.append(game_leaderboard_rollup)
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
               
    def CountGameProfileStatisticByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileStatisticByUuid(
            uuid
        )
               
    def CountGameProfileStatisticByCode(self
        , code
    ) :         
        return self.data.CountGameProfileStatisticByCode(
            code
        )
               
    def CountGameProfileStatisticByGameId(self
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticByGameId(
            game_id
        )
               
    def CountGameProfileStatisticByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticByCodeByGameId(
            code
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
               
    def CountGameProfileStatisticByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
        )
               
    def CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(
            code
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
            
    def SetGameProfileStatisticByProfileIdByCode(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticByProfileIdByCode(set_type, obj)
            
    def SetGameProfileStatisticByProfileIdByCodeByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticByProfileIdByCodeByTimestamp(set_type, obj)
            
    def SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticByCodeByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameProfileStatisticByCodeByProfileIdByGameId(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticByCodeByProfileIdByGameId(set_type, obj)
            
    def DelGameProfileStatisticByUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileStatisticByUuid(
            uuid
        )
        
    def DelGameProfileStatisticByCodeByGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameProfileStatisticByCodeByGameId(
            code
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
        
    def DelGameProfileStatisticByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return self.data.DelGameProfileStatisticByCodeByProfileIdByGameId(
            code
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
        
    def GetGameProfileStatisticListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByCode(
            code
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
        
    def GetGameProfileStatisticListByCodeByGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByCodeByGameId(
            code
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
        
    def GetGameProfileStatisticListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic  = self.FillGameProfileStatistic(row)
                results.append(game_profile_statistic)
            return results        
        
    def GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticListByCodeByProfileIdByGameIdByTimestamp(
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
               
    def CountGameStatisticMetaByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameStatisticMetaByCodeByGameId(
            code
            , game_id
        )
               
    def CountGameStatisticMetaByName(self
        , name
    ) :         
        return self.data.CountGameStatisticMetaByName(
            name
        )
               
    def CountGameStatisticMetaByGameId(self
        , game_id
    ) :         
        return self.data.CountGameStatisticMetaByGameId(
            game_id
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
            
    def SetGameStatisticMetaByCodeByGameId(self, set_type, obj) :            
            return self.data.SetGameStatisticMetaByCodeByGameId(set_type, obj)
            
    def DelGameStatisticMetaByUuid(self
        , uuid
    ) :
        return self.data.DelGameStatisticMetaByUuid(
            uuid
        )
        
    def DelGameStatisticMetaByCodeByGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameStatisticMetaByCodeByGameId(
            code
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
        
    def GetGameStatisticMetaListByCodeByGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameStatisticMetaListByCodeByGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_statistic_meta  = self.FillGameStatisticMeta(row)
                results.append(game_statistic_meta)
            return results        
        
        
    def FillGameProfileStatisticItem(self, row) :
        obj = GameProfileStatisticItem()

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
        
    def CountGameProfileStatisticItem(self
    ) :         
        return self.data.CountGameProfileStatisticItem(
        )
               
    def CountGameProfileStatisticItemByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileStatisticItemByUuid(
            uuid
        )
               
    def CountGameProfileStatisticItemByCode(self
        , code
    ) :         
        return self.data.CountGameProfileStatisticItemByCode(
            code
        )
               
    def CountGameProfileStatisticItemByGameId(self
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticItemByGameId(
            game_id
        )
               
    def CountGameProfileStatisticItemByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticItemByCodeByGameId(
            code
            , game_id
        )
               
    def CountGameProfileStatisticItemByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticItemByProfileIdByGameId(
            profile_id
            , game_id
        )
               
    def CountGameProfileStatisticItemByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileStatisticItemByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
        )
               
    def CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
        )
               
    def BrowseGameProfileStatisticItemListByFilter(self, filter_obj) :
        result = GameProfileStatisticItemResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseGameProfileStatisticItemListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                game_profile_statistic_item = self.FillGameProfileStatisticItem(row)
                result.data.append(game_profile_statistic_item)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetGameProfileStatisticItemByUuid(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticItemByUuid(set_type, obj)
            
    def SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticItemByUuidByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameProfileStatisticItemByProfileIdByCode(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticItemByProfileIdByCode(set_type, obj)
            
    def SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticItemByProfileIdByCodeByTimestamp(set_type, obj)
            
    def SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticItemByCodeByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def SetGameProfileStatisticItemByCodeByProfileIdByGameId(self, set_type, obj) :            
            return self.data.SetGameProfileStatisticItemByCodeByProfileIdByGameId(set_type, obj)
            
    def DelGameProfileStatisticItemByUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileStatisticItemByUuid(
            uuid
        )
        
    def DelGameProfileStatisticItemByCodeByGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameProfileStatisticItemByCodeByGameId(
            code
            , game_id
        )
        
    def DelGameProfileStatisticItemByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        return self.data.DelGameProfileStatisticItemByProfileIdByGameId(
            profile_id
            , game_id
        )
        
    def DelGameProfileStatisticItemByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :
        return self.data.DelGameProfileStatisticItemByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
        )
        
    def GetGameProfileStatisticItemListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticItemListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_item  = self.FillGameProfileStatisticItem(row)
                results.append(game_profile_statistic_item)
            return results        
        
    def GetGameProfileStatisticItemListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticItemListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_item  = self.FillGameProfileStatisticItem(row)
                results.append(game_profile_statistic_item)
            return results        
        
    def GetGameProfileStatisticItemListByGameId(self
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticItemListByGameId(
            game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_item  = self.FillGameProfileStatisticItem(row)
                results.append(game_profile_statistic_item)
            return results        
        
    def GetGameProfileStatisticItemListByCodeByGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticItemListByCodeByGameId(
            code
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_item  = self.FillGameProfileStatisticItem(row)
                results.append(game_profile_statistic_item)
            return results        
        
    def GetGameProfileStatisticItemListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticItemListByProfileIdByGameId(
            profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_item  = self.FillGameProfileStatisticItem(row)
                results.append(game_profile_statistic_item)
            return results        
        
    def GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticItemListByProfileIdByGameIdByTimestamp(
            profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_item  = self.FillGameProfileStatisticItem(row)
                results.append(game_profile_statistic_item)
            return results        
        
    def GetGameProfileStatisticItemListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticItemListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_item  = self.FillGameProfileStatisticItem(row)
                results.append(game_profile_statistic_item)
            return results        
        
    def GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileStatisticItemListByCodeByProfileIdByGameIdByTimestamp(
            code
            , profile_id
            , game_id
            , timestamp
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_statistic_item  = self.FillGameProfileStatisticItem(row)
                results.append(game_profile_statistic_item)
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
               
    def CountGameKeyMetaByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameKeyMetaByCodeByGameId(
            code
            , game_id
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
            
    def SetGameKeyMetaByCodeByGameId(self, set_type, obj) :            
            return self.data.SetGameKeyMetaByCodeByGameId(set_type, obj)
            
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
        
    def DelGameKeyMetaByCodeByGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameKeyMetaByCodeByGameId(
            code
            , game_id
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
        
    def GetGameKeyMetaListByCodeByGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameKeyMetaListByCodeByGameId(
            code
            , game_id
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
               
    def CountGameLevelByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameLevelByCodeByGameId(
            code
            , game_id
        )
               
    def CountGameLevelByName(self
        , name
    ) :         
        return self.data.CountGameLevelByName(
            name
        )
               
    def CountGameLevelByGameId(self
        , game_id
    ) :         
        return self.data.CountGameLevelByGameId(
            game_id
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
            
    def SetGameLevelByCodeByGameId(self, set_type, obj) :            
            return self.data.SetGameLevelByCodeByGameId(set_type, obj)
            
    def DelGameLevelByUuid(self
        , uuid
    ) :
        return self.data.DelGameLevelByUuid(
            uuid
        )
        
    def DelGameLevelByCodeByGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameLevelByCodeByGameId(
            code
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
        
    def GetGameLevelListByCodeByGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameLevelListByCodeByGameId(
            code
            , game_id
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
               
    def CountGameProfileAchievementByUuid(self
        , uuid
    ) :         
        return self.data.CountGameProfileAchievementByUuid(
            uuid
        )
               
    def CountGameProfileAchievementByProfileIdByCode(self
        , profile_id
        , code
    ) :         
        return self.data.CountGameProfileAchievementByProfileIdByCode(
            profile_id
            , code
        )
               
    def CountGameProfileAchievementByUsername(self
        , username
    ) :         
        return self.data.CountGameProfileAchievementByUsername(
            username
        )
               
    def CountGameProfileAchievementByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :         
        return self.data.CountGameProfileAchievementByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
        )
               
    def CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :         
        return self.data.CountGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(
            code
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
            
    def SetGameProfileAchievementByUuidByCode(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementByUuidByCode(set_type, obj)
            
    def SetGameProfileAchievementByProfileIdByCode(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementByProfileIdByCode(set_type, obj)
            
    def SetGameProfileAchievementByCodeByProfileIdByGameId(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementByCodeByProfileIdByGameId(set_type, obj)
            
    def SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(self, set_type, obj) :            
            return self.data.SetGameProfileAchievementByCodeByProfileIdByGameIdByTimestamp(set_type, obj)
            
    def DelGameProfileAchievementByUuid(self
        , uuid
    ) :
        return self.data.DelGameProfileAchievementByUuid(
            uuid
        )
        
    def DelGameProfileAchievementByProfileIdByCode(self
        , profile_id
        , code
    ) :
        return self.data.DelGameProfileAchievementByProfileIdByCode(
            profile_id
            , code
        )
        
    def DelGameProfileAchievementByUuidByCode(self
        , uuid
        , code
    ) :
        return self.data.DelGameProfileAchievementByUuidByCode(
            uuid
            , code
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
        
    def GetGameProfileAchievementListByProfileIdByCode(self
        , profile_id
        , code
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByProfileIdByCode(
            profile_id
            , code
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
        
    def GetGameProfileAchievementListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByCode(
            code
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
        
    def GetGameProfileAchievementListByCodeByGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByCodeByGameId(
            code
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
        
    def GetGameProfileAchievementListByCodeByProfileIdByGameId(self
        , code
        , profile_id
        , game_id
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByCodeByProfileIdByGameId(
            code
            , profile_id
            , game_id
        )
        
        if(rows != None) :
            for row in rows :
                game_profile_achievement  = self.FillGameProfileAchievement(row)
                results.append(game_profile_achievement)
            return results        
        
    def GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :

        results = []
        rows = self.data.GetGameProfileAchievementListByCodeByProfileIdByGameIdByTimestamp(
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
               
    def CountGameAchievementMetaByCodeByGameId(self
        , code
        , game_id
    ) :         
        return self.data.CountGameAchievementMetaByCodeByGameId(
            code
            , game_id
        )
               
    def CountGameAchievementMetaByName(self
        , name
    ) :         
        return self.data.CountGameAchievementMetaByName(
            name
        )
               
    def CountGameAchievementMetaByGameId(self
        , game_id
    ) :         
        return self.data.CountGameAchievementMetaByGameId(
            game_id
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
            
    def SetGameAchievementMetaByCodeByGameId(self, set_type, obj) :            
            return self.data.SetGameAchievementMetaByCodeByGameId(set_type, obj)
            
    def DelGameAchievementMetaByUuid(self
        , uuid
    ) :
        return self.data.DelGameAchievementMetaByUuid(
            uuid
        )
        
    def DelGameAchievementMetaByCodeByGameId(self
        , code
        , game_id
    ) :
        return self.data.DelGameAchievementMetaByCodeByGameId(
            code
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
        
    def GetGameAchievementMetaListByCodeByGameId(self
        , code
        , game_id
    ) :

        results = []
        rows = self.data.GetGameAchievementMetaListByCodeByGameId(
            code
            , game_id
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
        
        
    def FillProfileReward(self, row) :
        obj = ProfileReward()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['viewed'] != None) :                 
            obj.viewed = row['viewed'] #dataType.FillData(dr, "viewed");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['downloaded'] != None) :                 
            obj.downloaded = row['downloaded'] #dataType.FillData(dr, "downloaded");                
        if (row['channel_id'] != None) :                 
            obj.channel_id = row['channel_id'] #dataType.FillData(dr, "channel_id");                
        if (row['reward_id'] != None) :                 
            obj.reward_id = row['reward_id'] #dataType.FillData(dr, "reward_id");                
        if (row['usage_count'] != None) :                 
            obj.usage_count = row['usage_count'] #dataType.FillData(dr, "usage_count");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['blurb'] != None) :                 
            obj.blurb = row['blurb'] #dataType.FillData(dr, "blurb");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountProfileReward(self
    ) :         
        return self.data.CountProfileReward(
        )
               
    def CountProfileRewardByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileRewardByUuid(
            uuid
        )
               
    def CountProfileRewardByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileRewardByProfileId(
            profile_id
        )
               
    def CountProfileRewardByRewardId(self
        , reward_id
    ) :         
        return self.data.CountProfileRewardByRewardId(
            reward_id
        )
               
    def CountProfileRewardByProfileIdByRewardId(self
        , profile_id
        , reward_id
    ) :         
        return self.data.CountProfileRewardByProfileIdByRewardId(
            profile_id
            , reward_id
        )
               
    def CountProfileRewardByProfileIdByChannelId(self
        , profile_id
        , channel_id
    ) :         
        return self.data.CountProfileRewardByProfileIdByChannelId(
            profile_id
            , channel_id
        )
               
    def CountProfileRewardByProfileIdByChannelIdByRewardId(self
        , profile_id
        , channel_id
        , reward_id
    ) :         
        return self.data.CountProfileRewardByProfileIdByChannelIdByRewardId(
            profile_id
            , channel_id
            , reward_id
        )
               
    def BrowseProfileRewardListByFilter(self, filter_obj) :
        result = ProfileRewardResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileRewardListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_reward = self.FillProfileReward(row)
                result.data.append(profile_reward)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileRewardByUuid(self, set_type, obj) :            
            return self.data.SetProfileRewardByUuid(set_type, obj)
            
    def SetProfileRewardByProfileIdByChannelIdByRewardId(self, set_type, obj) :            
            return self.data.SetProfileRewardByProfileIdByChannelIdByRewardId(set_type, obj)
            
    def DelProfileRewardByUuid(self
        , uuid
    ) :
        return self.data.DelProfileRewardByUuid(
            uuid
        )
        
    def DelProfileRewardByProfileIdByRewardId(self
        , profile_id
        , reward_id
    ) :
        return self.data.DelProfileRewardByProfileIdByRewardId(
            profile_id
            , reward_id
        )
        
    def GetProfileRewardListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileRewardListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward  = self.FillProfileReward(row)
                results.append(profile_reward)
            return results        
        
    def GetProfileRewardListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileRewardListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward  = self.FillProfileReward(row)
                results.append(profile_reward)
            return results        
        
    def GetProfileRewardListByRewardId(self
        , reward_id
    ) :

        results = []
        rows = self.data.GetProfileRewardListByRewardId(
            reward_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward  = self.FillProfileReward(row)
                results.append(profile_reward)
            return results        
        
    def GetProfileRewardListByProfileIdByRewardId(self
        , profile_id
        , reward_id
    ) :

        results = []
        rows = self.data.GetProfileRewardListByProfileIdByRewardId(
            profile_id
            , reward_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward  = self.FillProfileReward(row)
                results.append(profile_reward)
            return results        
        
    def GetProfileRewardListByProfileIdByChannelId(self
        , profile_id
        , channel_id
    ) :

        results = []
        rows = self.data.GetProfileRewardListByProfileIdByChannelId(
            profile_id
            , channel_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward  = self.FillProfileReward(row)
                results.append(profile_reward)
            return results        
        
    def GetProfileRewardListByProfileIdByChannelIdByRewardId(self
        , profile_id
        , channel_id
        , reward_id
    ) :

        results = []
        rows = self.data.GetProfileRewardListByProfileIdByChannelIdByRewardId(
            profile_id
            , channel_id
            , reward_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward  = self.FillProfileReward(row)
                results.append(profile_reward)
            return results        
        
        
    def FillCoupon(self, row) :
        obj = Coupon()

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
        if (row['org_id'] != None) :                 
            obj.org_id = row['org_id'] #dataType.FillData(dr, "org_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['usage_count'] != None) :                 
            obj.usage_count = row['usage_count'] #dataType.FillData(dr, "usage_count");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountCoupon(self
    ) :         
        return self.data.CountCoupon(
        )
               
    def CountCouponByUuid(self
        , uuid
    ) :         
        return self.data.CountCouponByUuid(
            uuid
        )
               
    def CountCouponByCode(self
        , code
    ) :         
        return self.data.CountCouponByCode(
            code
        )
               
    def CountCouponByName(self
        , name
    ) :         
        return self.data.CountCouponByName(
            name
        )
               
    def CountCouponByOrgId(self
        , org_id
    ) :         
        return self.data.CountCouponByOrgId(
            org_id
        )
               
    def BrowseCouponListByFilter(self, filter_obj) :
        result = CouponResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseCouponListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                coupon = self.FillCoupon(row)
                result.data.append(coupon)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetCouponByUuid(self, set_type, obj) :            
            return self.data.SetCouponByUuid(set_type, obj)
            
    def DelCouponByUuid(self
        , uuid
    ) :
        return self.data.DelCouponByUuid(
            uuid
        )
        
    def DelCouponByOrgId(self
        , org_id
    ) :
        return self.data.DelCouponByOrgId(
            org_id
        )
        
    def GetCouponListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetCouponListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                coupon  = self.FillCoupon(row)
                results.append(coupon)
            return results        
        
    def GetCouponListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetCouponListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                coupon  = self.FillCoupon(row)
                results.append(coupon)
            return results        
        
    def GetCouponListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetCouponListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                coupon  = self.FillCoupon(row)
                results.append(coupon)
            return results        
        
    def GetCouponListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetCouponListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                coupon  = self.FillCoupon(row)
                results.append(coupon)
            return results        
        
        
    def FillProfileCoupon(self, row) :
        obj = ProfileCoupon()

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
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
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
        
    def CountProfileCoupon(self
    ) :         
        return self.data.CountProfileCoupon(
        )
               
    def CountProfileCouponByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileCouponByUuid(
            uuid
        )
               
    def CountProfileCouponByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileCouponByProfileId(
            profile_id
        )
               
    def BrowseProfileCouponListByFilter(self, filter_obj) :
        result = ProfileCouponResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileCouponListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_coupon = self.FillProfileCoupon(row)
                result.data.append(profile_coupon)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileCouponByUuid(self, set_type, obj) :            
            return self.data.SetProfileCouponByUuid(set_type, obj)
            
    def DelProfileCouponByUuid(self
        , uuid
    ) :
        return self.data.DelProfileCouponByUuid(
            uuid
        )
        
    def DelProfileCouponByProfileId(self
        , profile_id
    ) :
        return self.data.DelProfileCouponByProfileId(
            profile_id
        )
        
    def GetProfileCouponListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileCouponListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_coupon  = self.FillProfileCoupon(row)
                results.append(profile_coupon)
            return results        
        
    def GetProfileCouponListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileCouponListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_coupon  = self.FillProfileCoupon(row)
                results.append(profile_coupon)
            return results        
        
        
    def FillOrg(self, row) :
        obj = Org()

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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
        
    def CountOrg(self
    ) :         
        return self.data.CountOrg(
        )
               
    def CountOrgByUuid(self
        , uuid
    ) :         
        return self.data.CountOrgByUuid(
            uuid
        )
               
    def CountOrgByCode(self
        , code
    ) :         
        return self.data.CountOrgByCode(
            code
        )
               
    def CountOrgByName(self
        , name
    ) :         
        return self.data.CountOrgByName(
            name
        )
               
    def BrowseOrgListByFilter(self, filter_obj) :
        result = OrgResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseOrgListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                org = self.FillOrg(row)
                result.data.append(org)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetOrgByUuid(self, set_type, obj) :            
            return self.data.SetOrgByUuid(set_type, obj)
            
    def DelOrgByUuid(self
        , uuid
    ) :
        return self.data.DelOrgByUuid(
            uuid
        )
        
    def GetOrgListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetOrgListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                org  = self.FillOrg(row)
                results.append(org)
            return results        
        
    def GetOrgListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetOrgListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                org  = self.FillOrg(row)
                results.append(org)
            return results        
        
    def GetOrgListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetOrgListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                org  = self.FillOrg(row)
                results.append(org)
            return results        
        
        
    def FillChannel(self, row) :
        obj = Channel()

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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
        
    def CountChannel(self
    ) :         
        return self.data.CountChannel(
        )
               
    def CountChannelByUuid(self
        , uuid
    ) :         
        return self.data.CountChannelByUuid(
            uuid
        )
               
    def CountChannelByCode(self
        , code
    ) :         
        return self.data.CountChannelByCode(
            code
        )
               
    def CountChannelByName(self
        , name
    ) :         
        return self.data.CountChannelByName(
            name
        )
               
    def CountChannelByOrgId(self
        , org_id
    ) :         
        return self.data.CountChannelByOrgId(
            org_id
        )
               
    def CountChannelByTypeId(self
        , type_id
    ) :         
        return self.data.CountChannelByTypeId(
            type_id
        )
               
    def CountChannelByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :         
        return self.data.CountChannelByOrgIdByTypeId(
            org_id
            , type_id
        )
               
    def BrowseChannelListByFilter(self, filter_obj) :
        result = ChannelResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseChannelListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                channel = self.FillChannel(row)
                result.data.append(channel)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetChannelByUuid(self, set_type, obj) :            
            return self.data.SetChannelByUuid(set_type, obj)
            
    def DelChannelByUuid(self
        , uuid
    ) :
        return self.data.DelChannelByUuid(
            uuid
        )
        
    def DelChannelByCodeByOrgId(self
        , code
        , org_id
    ) :
        return self.data.DelChannelByCodeByOrgId(
            code
            , org_id
        )
        
    def DelChannelByCodeByOrgIdByTypeId(self
        , code
        , org_id
        , type_id
    ) :
        return self.data.DelChannelByCodeByOrgIdByTypeId(
            code
            , org_id
            , type_id
        )
        
    def GetChannelListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetChannelListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetChannelListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetChannelListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetChannelListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListByTypeId(self
        , type_id
    ) :

        results = []
        rows = self.data.GetChannelListByTypeId(
            type_id
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
    def GetChannelListByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :

        results = []
        rows = self.data.GetChannelListByOrgIdByTypeId(
            org_id
            , type_id
        )
        
        if(rows != None) :
            for row in rows :
                channel  = self.FillChannel(row)
                results.append(channel)
            return results        
        
        
    def FillChannelType(self, row) :
        obj = ChannelType()

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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
        
    def CountChannelType(self
    ) :         
        return self.data.CountChannelType(
        )
               
    def CountChannelTypeByUuid(self
        , uuid
    ) :         
        return self.data.CountChannelTypeByUuid(
            uuid
        )
               
    def CountChannelTypeByCode(self
        , code
    ) :         
        return self.data.CountChannelTypeByCode(
            code
        )
               
    def CountChannelTypeByName(self
        , name
    ) :         
        return self.data.CountChannelTypeByName(
            name
        )
               
    def BrowseChannelTypeListByFilter(self, filter_obj) :
        result = ChannelTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseChannelTypeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                channel_type = self.FillChannelType(row)
                result.data.append(channel_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetChannelTypeByUuid(self, set_type, obj) :            
            return self.data.SetChannelTypeByUuid(set_type, obj)
            
    def DelChannelTypeByUuid(self
        , uuid
    ) :
        return self.data.DelChannelTypeByUuid(
            uuid
        )
        
    def GetChannelTypeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetChannelTypeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                channel_type  = self.FillChannelType(row)
                results.append(channel_type)
            return results        
        
    def GetChannelTypeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetChannelTypeListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                channel_type  = self.FillChannelType(row)
                results.append(channel_type)
            return results        
        
    def GetChannelTypeListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetChannelTypeListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                channel_type  = self.FillChannelType(row)
                results.append(channel_type)
            return results        
        
        
    def FillReward(self, row) :
        obj = Reward()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['type_url'] != None) :                 
            obj.type_url = row['type_url'] #dataType.FillData(dr, "type_url");                
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
        if (row['org_id'] != None) :                 
            obj.org_id = row['org_id'] #dataType.FillData(dr, "org_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['channel_id'] != None) :                 
            obj.channel_id = row['channel_id'] #dataType.FillData(dr, "channel_id");                
        if (row['usage_count'] != None) :                 
            obj.usage_count = row['usage_count'] #dataType.FillData(dr, "usage_count");                
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
        
    def CountReward(self
    ) :         
        return self.data.CountReward(
        )
               
    def CountRewardByUuid(self
        , uuid
    ) :         
        return self.data.CountRewardByUuid(
            uuid
        )
               
    def CountRewardByCode(self
        , code
    ) :         
        return self.data.CountRewardByCode(
            code
        )
               
    def CountRewardByName(self
        , name
    ) :         
        return self.data.CountRewardByName(
            name
        )
               
    def CountRewardByOrgId(self
        , org_id
    ) :         
        return self.data.CountRewardByOrgId(
            org_id
        )
               
    def CountRewardByChannelId(self
        , channel_id
    ) :         
        return self.data.CountRewardByChannelId(
            channel_id
        )
               
    def CountRewardByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :         
        return self.data.CountRewardByOrgIdByChannelId(
            org_id
            , channel_id
        )
               
    def BrowseRewardListByFilter(self, filter_obj) :
        result = RewardResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseRewardListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                reward = self.FillReward(row)
                result.data.append(reward)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetRewardByUuid(self, set_type, obj) :            
            return self.data.SetRewardByUuid(set_type, obj)
            
    def DelRewardByUuid(self
        , uuid
    ) :
        return self.data.DelRewardByUuid(
            uuid
        )
        
    def DelRewardByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :
        return self.data.DelRewardByOrgIdByChannelId(
            org_id
            , channel_id
        )
        
    def GetRewardListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetRewardListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                reward  = self.FillReward(row)
                results.append(reward)
            return results        
        
    def GetRewardListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetRewardListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                reward  = self.FillReward(row)
                results.append(reward)
            return results        
        
    def GetRewardListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetRewardListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                reward  = self.FillReward(row)
                results.append(reward)
            return results        
        
    def GetRewardListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetRewardListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                reward  = self.FillReward(row)
                results.append(reward)
            return results        
        
    def GetRewardListByChannelId(self
        , channel_id
    ) :

        results = []
        rows = self.data.GetRewardListByChannelId(
            channel_id
        )
        
        if(rows != None) :
            for row in rows :
                reward  = self.FillReward(row)
                results.append(reward)
            return results        
        
    def GetRewardListByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :

        results = []
        rows = self.data.GetRewardListByOrgIdByChannelId(
            org_id
            , channel_id
        )
        
        if(rows != None) :
            for row in rows :
                reward  = self.FillReward(row)
                results.append(reward)
            return results        
        
        
    def FillRewardType(self, row) :
        obj = RewardType()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['type_url'] != None) :                 
            obj.type_url = row['type_url'] #dataType.FillData(dr, "type_url");                
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
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountRewardType(self
    ) :         
        return self.data.CountRewardType(
        )
               
    def CountRewardTypeByUuid(self
        , uuid
    ) :         
        return self.data.CountRewardTypeByUuid(
            uuid
        )
               
    def CountRewardTypeByCode(self
        , code
    ) :         
        return self.data.CountRewardTypeByCode(
            code
        )
               
    def CountRewardTypeByName(self
        , name
    ) :         
        return self.data.CountRewardTypeByName(
            name
        )
               
    def CountRewardTypeByType(self
        , type
    ) :         
        return self.data.CountRewardTypeByType(
            type
        )
               
    def BrowseRewardTypeListByFilter(self, filter_obj) :
        result = RewardTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseRewardTypeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                reward_type = self.FillRewardType(row)
                result.data.append(reward_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetRewardTypeByUuid(self, set_type, obj) :            
            return self.data.SetRewardTypeByUuid(set_type, obj)
            
    def DelRewardTypeByUuid(self
        , uuid
    ) :
        return self.data.DelRewardTypeByUuid(
            uuid
        )
        
    def GetRewardTypeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetRewardTypeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                reward_type  = self.FillRewardType(row)
                results.append(reward_type)
            return results        
        
    def GetRewardTypeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetRewardTypeListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                reward_type  = self.FillRewardType(row)
                results.append(reward_type)
            return results        
        
    def GetRewardTypeListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetRewardTypeListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                reward_type  = self.FillRewardType(row)
                results.append(reward_type)
            return results        
        
    def GetRewardTypeListByType(self
        , type
    ) :

        results = []
        rows = self.data.GetRewardTypeListByType(
            type
        )
        
        if(rows != None) :
            for row in rows :
                reward_type  = self.FillRewardType(row)
                results.append(reward_type)
            return results        
        
        
    def FillRewardCondition(self, row) :
        obj = RewardCondition()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['end_date'] != None) :                 
            obj.end_date = row['end_date'] #dataType.FillData(dr, "end_date");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['org_id'] != None) :                 
            obj.org_id = row['org_id'] #dataType.FillData(dr, "org_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['channel_id'] != None) :                 
            obj.channel_id = row['channel_id'] #dataType.FillData(dr, "channel_id");                
        if (row['amount'] != None) :                 
            obj.amount = row['amount'] #dataType.FillData(dr, "amount");                
        if (row['global_reward'] != None) :                 
            obj.global_reward = row['global_reward'] #dataType.FillData(dr, "global_reward");                
        if (row['condition'] != None) :                 
            obj.condition = row['condition'] #dataType.FillData(dr, "condition");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['start_date'] != None) :                 
            obj.start_date = row['start_date'] #dataType.FillData(dr, "start_date");                
        if (row['reward_id'] != None) :                 
            obj.reward_id = row['reward_id'] #dataType.FillData(dr, "reward_id");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountRewardCondition(self
    ) :         
        return self.data.CountRewardCondition(
        )
               
    def CountRewardConditionByUuid(self
        , uuid
    ) :         
        return self.data.CountRewardConditionByUuid(
            uuid
        )
               
    def CountRewardConditionByCode(self
        , code
    ) :         
        return self.data.CountRewardConditionByCode(
            code
        )
               
    def CountRewardConditionByName(self
        , name
    ) :         
        return self.data.CountRewardConditionByName(
            name
        )
               
    def CountRewardConditionByOrgId(self
        , org_id
    ) :         
        return self.data.CountRewardConditionByOrgId(
            org_id
        )
               
    def CountRewardConditionByChannelId(self
        , channel_id
    ) :         
        return self.data.CountRewardConditionByChannelId(
            channel_id
        )
               
    def CountRewardConditionByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :         
        return self.data.CountRewardConditionByOrgIdByChannelId(
            org_id
            , channel_id
        )
               
    def CountRewardConditionByOrgIdByChannelIdByRewardId(self
        , org_id
        , channel_id
        , reward_id
    ) :         
        return self.data.CountRewardConditionByOrgIdByChannelIdByRewardId(
            org_id
            , channel_id
            , reward_id
        )
               
    def CountRewardConditionByRewardId(self
        , reward_id
    ) :         
        return self.data.CountRewardConditionByRewardId(
            reward_id
        )
               
    def BrowseRewardConditionListByFilter(self, filter_obj) :
        result = RewardConditionResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseRewardConditionListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                reward_condition = self.FillRewardCondition(row)
                result.data.append(reward_condition)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetRewardConditionByUuid(self, set_type, obj) :            
            return self.data.SetRewardConditionByUuid(set_type, obj)
            
    def DelRewardConditionByUuid(self
        , uuid
    ) :
        return self.data.DelRewardConditionByUuid(
            uuid
        )
        
    def DelRewardConditionByOrgIdByChannelIdByRewardId(self
        , org_id
        , channel_id
        , reward_id
    ) :
        return self.data.DelRewardConditionByOrgIdByChannelIdByRewardId(
            org_id
            , channel_id
            , reward_id
        )
        
    def GetRewardConditionListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetRewardConditionListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition  = self.FillRewardCondition(row)
                results.append(reward_condition)
            return results        
        
    def GetRewardConditionListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetRewardConditionListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition  = self.FillRewardCondition(row)
                results.append(reward_condition)
            return results        
        
    def GetRewardConditionListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetRewardConditionListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition  = self.FillRewardCondition(row)
                results.append(reward_condition)
            return results        
        
    def GetRewardConditionListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetRewardConditionListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition  = self.FillRewardCondition(row)
                results.append(reward_condition)
            return results        
        
    def GetRewardConditionListByChannelId(self
        , channel_id
    ) :

        results = []
        rows = self.data.GetRewardConditionListByChannelId(
            channel_id
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition  = self.FillRewardCondition(row)
                results.append(reward_condition)
            return results        
        
    def GetRewardConditionListByOrgIdByChannelId(self
        , org_id
        , channel_id
    ) :

        results = []
        rows = self.data.GetRewardConditionListByOrgIdByChannelId(
            org_id
            , channel_id
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition  = self.FillRewardCondition(row)
                results.append(reward_condition)
            return results        
        
    def GetRewardConditionListByOrgIdByChannelIdByRewardId(self
        , org_id
        , channel_id
        , reward_id
    ) :

        results = []
        rows = self.data.GetRewardConditionListByOrgIdByChannelIdByRewardId(
            org_id
            , channel_id
            , reward_id
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition  = self.FillRewardCondition(row)
                results.append(reward_condition)
            return results        
        
    def GetRewardConditionListByRewardId(self
        , reward_id
    ) :

        results = []
        rows = self.data.GetRewardConditionListByRewardId(
            reward_id
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition  = self.FillRewardCondition(row)
                results.append(reward_condition)
            return results        
        
        
    def FillRewardConditionType(self, row) :
        obj = RewardConditionType()

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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
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
        
    def CountRewardConditionType(self
    ) :         
        return self.data.CountRewardConditionType(
        )
               
    def CountRewardConditionTypeByUuid(self
        , uuid
    ) :         
        return self.data.CountRewardConditionTypeByUuid(
            uuid
        )
               
    def CountRewardConditionTypeByCode(self
        , code
    ) :         
        return self.data.CountRewardConditionTypeByCode(
            code
        )
               
    def CountRewardConditionTypeByName(self
        , name
    ) :         
        return self.data.CountRewardConditionTypeByName(
            name
        )
               
    def CountRewardConditionTypeByType(self
        , type
    ) :         
        return self.data.CountRewardConditionTypeByType(
            type
        )
               
    def BrowseRewardConditionTypeListByFilter(self, filter_obj) :
        result = RewardConditionTypeResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseRewardConditionTypeListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                reward_condition_type = self.FillRewardConditionType(row)
                result.data.append(reward_condition_type)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetRewardConditionTypeByUuid(self, set_type, obj) :            
            return self.data.SetRewardConditionTypeByUuid(set_type, obj)
            
    def DelRewardConditionTypeByUuid(self
        , uuid
    ) :
        return self.data.DelRewardConditionTypeByUuid(
            uuid
        )
        
    def GetRewardConditionTypeListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetRewardConditionTypeListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition_type  = self.FillRewardConditionType(row)
                results.append(reward_condition_type)
            return results        
        
    def GetRewardConditionTypeListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetRewardConditionTypeListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition_type  = self.FillRewardConditionType(row)
                results.append(reward_condition_type)
            return results        
        
    def GetRewardConditionTypeListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetRewardConditionTypeListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition_type  = self.FillRewardConditionType(row)
                results.append(reward_condition_type)
            return results        
        
    def GetRewardConditionTypeListByType(self
        , type
    ) :

        results = []
        rows = self.data.GetRewardConditionTypeListByType(
            type
        )
        
        if(rows != None) :
            for row in rows :
                reward_condition_type  = self.FillRewardConditionType(row)
                results.append(reward_condition_type)
            return results        
        
        
    def FillQuestion(self, row) :
        obj = Question()

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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['org_id'] != None) :                 
            obj.org_id = row['org_id'] #dataType.FillData(dr, "org_id");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['choices'] != None) :                 
            obj.choices = row['choices'] #dataType.FillData(dr, "choices");                
        if (row['channel_id'] != None) :                 
            obj.channel_id = row['channel_id'] #dataType.FillData(dr, "channel_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                

        return obj
        
    def CountQuestion(self
    ) :         
        return self.data.CountQuestion(
        )
               
    def CountQuestionByUuid(self
        , uuid
    ) :         
        return self.data.CountQuestionByUuid(
            uuid
        )
               
    def CountQuestionByCode(self
        , code
    ) :         
        return self.data.CountQuestionByCode(
            code
        )
               
    def CountQuestionByName(self
        , name
    ) :         
        return self.data.CountQuestionByName(
            name
        )
               
    def CountQuestionByChannelId(self
        , channel_id
    ) :         
        return self.data.CountQuestionByChannelId(
            channel_id
        )
               
    def CountQuestionByOrgId(self
        , org_id
    ) :         
        return self.data.CountQuestionByOrgId(
            org_id
        )
               
    def CountQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :         
        return self.data.CountQuestionByChannelIdByOrgId(
            channel_id
            , org_id
        )
               
    def CountQuestionByChannelIdByCode(self
        , channel_id
        , code
    ) :         
        return self.data.CountQuestionByChannelIdByCode(
            channel_id
            , code
        )
               
    def BrowseQuestionListByFilter(self, filter_obj) :
        result = QuestionResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseQuestionListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                question = self.FillQuestion(row)
                result.data.append(question)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetQuestionByUuid(self, set_type, obj) :            
            return self.data.SetQuestionByUuid(set_type, obj)
            
    def SetQuestionByChannelIdByCode(self, set_type, obj) :            
            return self.data.SetQuestionByChannelIdByCode(set_type, obj)
            
    def DelQuestionByUuid(self
        , uuid
    ) :
        return self.data.DelQuestionByUuid(
            uuid
        )
        
    def DelQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        return self.data.DelQuestionByChannelIdByOrgId(
            channel_id
            , org_id
        )
        
    def GetQuestionListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetQuestionListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetQuestionListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetQuestionListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListByType(self
        , type
    ) :

        results = []
        rows = self.data.GetQuestionListByType(
            type
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListByChannelId(self
        , channel_id
    ) :

        results = []
        rows = self.data.GetQuestionListByChannelId(
            channel_id
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetQuestionListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :

        results = []
        rows = self.data.GetQuestionListByChannelIdByOrgId(
            channel_id
            , org_id
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
    def GetQuestionListByChannelIdByCode(self
        , channel_id
        , code
    ) :

        results = []
        rows = self.data.GetQuestionListByChannelIdByCode(
            channel_id
            , code
        )
        
        if(rows != None) :
            for row in rows :
                question  = self.FillQuestion(row)
                results.append(question)
            return results        
        
        
    def FillProfileQuestion(self, row) :
        obj = ProfileQuestion()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['org_id'] != None) :                 
            obj.org_id = row['org_id'] #dataType.FillData(dr, "org_id");                
        if (row['channel_id'] != None) :                 
            obj.channel_id = row['channel_id'] #dataType.FillData(dr, "channel_id");                
        if (row['answer'] != None) :                 
            obj.answer = row['answer'] #dataType.FillData(dr, "answer");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['question_id'] != None) :                 
            obj.question_id = row['question_id'] #dataType.FillData(dr, "question_id");                

        return obj
        
    def CountProfileQuestion(self
    ) :         
        return self.data.CountProfileQuestion(
        )
               
    def CountProfileQuestionByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileQuestionByUuid(
            uuid
        )
               
    def CountProfileQuestionByChannelId(self
        , channel_id
    ) :         
        return self.data.CountProfileQuestionByChannelId(
            channel_id
        )
               
    def CountProfileQuestionByOrgId(self
        , org_id
    ) :         
        return self.data.CountProfileQuestionByOrgId(
            org_id
        )
               
    def CountProfileQuestionByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileQuestionByProfileId(
            profile_id
        )
               
    def CountProfileQuestionByQuestionId(self
        , question_id
    ) :         
        return self.data.CountProfileQuestionByQuestionId(
            question_id
        )
               
    def CountProfileQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :         
        return self.data.CountProfileQuestionByChannelIdByOrgId(
            channel_id
            , org_id
        )
               
    def CountProfileQuestionByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :         
        return self.data.CountProfileQuestionByChannelIdByProfileId(
            channel_id
            , profile_id
        )
               
    def CountProfileQuestionByQuestionIdByProfileId(self
        , question_id
        , profile_id
    ) :         
        return self.data.CountProfileQuestionByQuestionIdByProfileId(
            question_id
            , profile_id
        )
               
    def BrowseProfileQuestionListByFilter(self, filter_obj) :
        result = ProfileQuestionResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileQuestionListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_question = self.FillProfileQuestion(row)
                result.data.append(profile_question)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileQuestionByUuid(self, set_type, obj) :            
            return self.data.SetProfileQuestionByUuid(set_type, obj)
            
    def SetProfileQuestionByChannelIdByProfileId(self, set_type, obj) :            
            return self.data.SetProfileQuestionByChannelIdByProfileId(set_type, obj)
            
    def SetProfileQuestionByQuestionIdByProfileId(self, set_type, obj) :            
            return self.data.SetProfileQuestionByQuestionIdByProfileId(set_type, obj)
            
    def SetProfileQuestionByChannelIdByQuestionIdByProfileId(self, set_type, obj) :            
            return self.data.SetProfileQuestionByChannelIdByQuestionIdByProfileId(set_type, obj)
            
    def DelProfileQuestionByUuid(self
        , uuid
    ) :
        return self.data.DelProfileQuestionByUuid(
            uuid
        )
        
    def DelProfileQuestionByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        return self.data.DelProfileQuestionByChannelIdByOrgId(
            channel_id
            , org_id
        )
        
    def GetProfileQuestionListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileQuestionListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListByChannelId(self
        , channel_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListByChannelId(
            channel_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListByQuestionId(self
        , question_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListByQuestionId(
            question_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListByChannelIdByOrgId(
            channel_id
            , org_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListByChannelIdByProfileId(
            channel_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
    def GetProfileQuestionListByQuestionIdByProfileId(self
        , question_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileQuestionListByQuestionIdByProfileId(
            question_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_question  = self.FillProfileQuestion(row)
                results.append(profile_question)
            return results        
        
        
    def FillProfileChannel(self, row) :
        obj = ProfileChannel()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['channel_id'] != None) :                 
            obj.channel_id = row['channel_id'] #dataType.FillData(dr, "channel_id");                
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
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                

        return obj
        
    def CountProfileChannel(self
    ) :         
        return self.data.CountProfileChannel(
        )
               
    def CountProfileChannelByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileChannelByUuid(
            uuid
        )
               
    def CountProfileChannelByChannelId(self
        , channel_id
    ) :         
        return self.data.CountProfileChannelByChannelId(
            channel_id
        )
               
    def CountProfileChannelByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileChannelByProfileId(
            profile_id
        )
               
    def CountProfileChannelByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :         
        return self.data.CountProfileChannelByChannelIdByProfileId(
            channel_id
            , profile_id
        )
               
    def BrowseProfileChannelListByFilter(self, filter_obj) :
        result = ProfileChannelResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileChannelListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_channel = self.FillProfileChannel(row)
                result.data.append(profile_channel)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileChannelByUuid(self, set_type, obj) :            
            return self.data.SetProfileChannelByUuid(set_type, obj)
            
    def SetProfileChannelByChannelIdByProfileId(self, set_type, obj) :            
            return self.data.SetProfileChannelByChannelIdByProfileId(set_type, obj)
            
    def DelProfileChannelByUuid(self
        , uuid
    ) :
        return self.data.DelProfileChannelByUuid(
            uuid
        )
        
    def DelProfileChannelByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :
        return self.data.DelProfileChannelByChannelIdByProfileId(
            channel_id
            , profile_id
        )
        
    def GetProfileChannelListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileChannelListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_channel  = self.FillProfileChannel(row)
                results.append(profile_channel)
            return results        
        
    def GetProfileChannelListByChannelId(self
        , channel_id
    ) :

        results = []
        rows = self.data.GetProfileChannelListByChannelId(
            channel_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_channel  = self.FillProfileChannel(row)
                results.append(profile_channel)
            return results        
        
    def GetProfileChannelListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileChannelListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_channel  = self.FillProfileChannel(row)
                results.append(profile_channel)
            return results        
        
    def GetProfileChannelListByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileChannelListByChannelIdByProfileId(
            channel_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_channel  = self.FillProfileChannel(row)
                results.append(profile_channel)
            return results        
        
        
    def FillProfileRewardPoints(self, row) :
        obj = ProfileRewardPoints()

        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['profile_id'] != None) :                 
            obj.profile_id = row['profile_id'] #dataType.FillData(dr, "profile_id");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['org_id'] != None) :                 
            obj.org_id = row['org_id'] #dataType.FillData(dr, "org_id");                
        if (row['channel_id'] != None) :                 
            obj.channel_id = row['channel_id'] #dataType.FillData(dr, "channel_id");                
        if (row['points'] != None) :                 
            obj.points = row['points'] #dataType.FillData(dr, "points");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                

        return obj
        
    def CountProfileRewardPoints(self
    ) :         
        return self.data.CountProfileRewardPoints(
        )
               
    def CountProfileRewardPointsByUuid(self
        , uuid
    ) :         
        return self.data.CountProfileRewardPointsByUuid(
            uuid
        )
               
    def CountProfileRewardPointsByChannelId(self
        , channel_id
    ) :         
        return self.data.CountProfileRewardPointsByChannelId(
            channel_id
        )
               
    def CountProfileRewardPointsByOrgId(self
        , org_id
    ) :         
        return self.data.CountProfileRewardPointsByOrgId(
            org_id
        )
               
    def CountProfileRewardPointsByProfileId(self
        , profile_id
    ) :         
        return self.data.CountProfileRewardPointsByProfileId(
            profile_id
        )
               
    def CountProfileRewardPointsByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :         
        return self.data.CountProfileRewardPointsByChannelIdByOrgId(
            channel_id
            , org_id
        )
               
    def CountProfileRewardPointsByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :         
        return self.data.CountProfileRewardPointsByChannelIdByProfileId(
            channel_id
            , profile_id
        )
               
    def BrowseProfileRewardPointsListByFilter(self, filter_obj) :
        result = ProfileRewardPointsResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseProfileRewardPointsListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                profile_reward_points = self.FillProfileRewardPoints(row)
                result.data.append(profile_reward_points)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetProfileRewardPointsByUuid(self, set_type, obj) :            
            return self.data.SetProfileRewardPointsByUuid(set_type, obj)
            
    def DelProfileRewardPointsByUuid(self
        , uuid
    ) :
        return self.data.DelProfileRewardPointsByUuid(
            uuid
        )
        
    def DelProfileRewardPointsByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :
        return self.data.DelProfileRewardPointsByChannelIdByOrgId(
            channel_id
            , org_id
        )
        
    def GetProfileRewardPointsListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetProfileRewardPointsListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward_points  = self.FillProfileRewardPoints(row)
                results.append(profile_reward_points)
            return results        
        
    def GetProfileRewardPointsListByChannelId(self
        , channel_id
    ) :

        results = []
        rows = self.data.GetProfileRewardPointsListByChannelId(
            channel_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward_points  = self.FillProfileRewardPoints(row)
                results.append(profile_reward_points)
            return results        
        
    def GetProfileRewardPointsListByOrgId(self
        , org_id
    ) :

        results = []
        rows = self.data.GetProfileRewardPointsListByOrgId(
            org_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward_points  = self.FillProfileRewardPoints(row)
                results.append(profile_reward_points)
            return results        
        
    def GetProfileRewardPointsListByProfileId(self
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileRewardPointsListByProfileId(
            profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward_points  = self.FillProfileRewardPoints(row)
                results.append(profile_reward_points)
            return results        
        
    def GetProfileRewardPointsListByChannelIdByOrgId(self
        , channel_id
        , org_id
    ) :

        results = []
        rows = self.data.GetProfileRewardPointsListByChannelIdByOrgId(
            channel_id
            , org_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward_points  = self.FillProfileRewardPoints(row)
                results.append(profile_reward_points)
            return results        
        
    def GetProfileRewardPointsListByChannelIdByProfileId(self
        , channel_id
        , profile_id
    ) :

        results = []
        rows = self.data.GetProfileRewardPointsListByChannelIdByProfileId(
            channel_id
            , profile_id
        )
        
        if(rows != None) :
            for row in rows :
                profile_reward_points  = self.FillProfileRewardPoints(row)
                results.append(profile_reward_points)
            return results        
        
        
    def FillRewardCompetition(self, row) :
        obj = RewardCompetition()

        if (row['sort'] != None) :                 
            obj.sort = row['sort'] #dataType.FillData(dr, "sort");                
        if (row['code'] != None) :                 
            obj.code = row['code'] #dataType.FillData(dr, "code");                
        if (row['date_end'] != None) :                 
            obj.date_end = row['date_end'] #dataType.FillData(dr, "date_end");                
        if (row['results'] != None) :                 
            obj.results = row['results'] #dataType.FillData(dr, "results");                
        if (row['visible'] != None) :                 
            obj.visible = row['visible'] #dataType.FillData(dr, "visible");                
        if (row['display_name'] != None) :                 
            obj.display_name = row['display_name'] #dataType.FillData(dr, "display_name");                
        if (row['uuid'] != None) :                 
            obj.uuid = row['uuid'] #dataType.FillData(dr, "uuid");                
        if (row['date_start'] != None) :                 
            obj.date_start = row['date_start'] #dataType.FillData(dr, "date_start");                
        if (row['winners'] != None) :                 
            obj.winners = row['winners'] #dataType.FillData(dr, "winners");                
        if (row['template'] != None) :                 
            obj.template = row['template'] #dataType.FillData(dr, "template");                
        if (row['type'] != None) :                 
            obj.type = row['type'] #dataType.FillData(dr, "type");                
        if (row['trigger_data'] != None) :                 
            obj.trigger_data = row['trigger_data'] #dataType.FillData(dr, "trigger_data");                
        if (row['status'] != None) :                 
            obj.status = row['status'] #dataType.FillData(dr, "status");                
        if (row['description'] != None) :                 
            obj.description = row['description'] #dataType.FillData(dr, "description");                
        if (row['completed'] != None) :                 
            obj.completed = row['completed'] #dataType.FillData(dr, "completed");                
        if (row['template_url'] != None) :                 
            obj.template_url = row['template_url'] #dataType.FillData(dr, "template_url");                
        if (row['active'] != None) :                 
            obj.active = row['active'] #dataType.FillData(dr, "active");                
        if (row['path'] != None) :                 
            obj.path = row['path'] #dataType.FillData(dr, "path");                
        if (row['data'] != None) :                 
            obj.data = row['data'] #dataType.FillData(dr, "data");                
        if (row['name'] != None) :                 
            obj.name = row['name'] #dataType.FillData(dr, "name");                
        if (row['date_modified'] != None) :                 
            obj.date_modified = row['date_modified'] #dataType.FillData(dr, "date_modified");                
        if (row['fulfilled'] != None) :                 
            obj.fulfilled = row['fulfilled'] #dataType.FillData(dr, "fulfilled");                
        if (row['channel_id'] != None) :                 
            obj.channel_id = row['channel_id'] #dataType.FillData(dr, "channel_id");                
        if (row['date_created'] != None) :                 
            obj.date_created = row['date_created'] #dataType.FillData(dr, "date_created");                

        return obj
        
    def CountRewardCompetitionByUuid(self
        , uuid
    ) :         
        return self.data.CountRewardCompetitionByUuid(
            uuid
        )
               
    def CountRewardCompetitionByCode(self
        , code
    ) :         
        return self.data.CountRewardCompetitionByCode(
            code
        )
               
    def CountRewardCompetitionByName(self
        , name
    ) :         
        return self.data.CountRewardCompetitionByName(
            name
        )
               
    def CountRewardCompetitionByPath(self
        , path
    ) :         
        return self.data.CountRewardCompetitionByPath(
            path
        )
               
    def CountRewardCompetitionByChannelId(self
        , channel_id
    ) :         
        return self.data.CountRewardCompetitionByChannelId(
            channel_id
        )
               
    def CountRewardCompetitionByChannelIdByCompleted(self
        , channel_id
        , completed
    ) :         
        return self.data.CountRewardCompetitionByChannelIdByCompleted(
            channel_id
            , completed
        )
               
    def BrowseRewardCompetitionListByFilter(self, filter_obj) :
        result = RewardCompetitionResult()
        result.page = filter_obj.page
        result.page_size = filter_obj.page_size
        result.data = []
        
        rows = []
        rows = self.data.BrowseRewardCompetitionListByFilter(filter_obj)
        if(rows != None) :
            for row in rows :
                reward_competition = self.FillRewardCompetition(row)
                result.data.append(reward_competition)
                if(row["total_rows"] != None) :
                    result.total_rows = int(row["total_rows"])
        
        return result

    def SetRewardCompetitionByUuid(self, set_type, obj) :            
            return self.data.SetRewardCompetitionByUuid(set_type, obj)
            
    def DelRewardCompetitionByUuid(self
        , uuid
    ) :
        return self.data.DelRewardCompetitionByUuid(
            uuid
        )
        
    def DelRewardCompetitionByCode(self
        , code
    ) :
        return self.data.DelRewardCompetitionByCode(
            code
        )
        
    def DelRewardCompetitionByPathByChannelId(self
        , path
        , channel_id
    ) :
        return self.data.DelRewardCompetitionByPathByChannelId(
            path
            , channel_id
        )
        
    def DelRewardCompetitionByPath(self
        , path
    ) :
        return self.data.DelRewardCompetitionByPath(
            path
        )
        
    def DelRewardCompetitionByChannelIdByPath(self
        , channel_id
        , path
    ) :
        return self.data.DelRewardCompetitionByChannelIdByPath(
            channel_id
            , path
        )
        
    def GetRewardCompetitionListByUuid(self
        , uuid
    ) :

        results = []
        rows = self.data.GetRewardCompetitionListByUuid(
            uuid
        )
        
        if(rows != None) :
            for row in rows :
                reward_competition  = self.FillRewardCompetition(row)
                results.append(reward_competition)
            return results        
        
    def GetRewardCompetitionListByCode(self
        , code
    ) :

        results = []
        rows = self.data.GetRewardCompetitionListByCode(
            code
        )
        
        if(rows != None) :
            for row in rows :
                reward_competition  = self.FillRewardCompetition(row)
                results.append(reward_competition)
            return results        
        
    def GetRewardCompetitionListByName(self
        , name
    ) :

        results = []
        rows = self.data.GetRewardCompetitionListByName(
            name
        )
        
        if(rows != None) :
            for row in rows :
                reward_competition  = self.FillRewardCompetition(row)
                results.append(reward_competition)
            return results        
        
    def GetRewardCompetitionListByPath(self
        , path
    ) :

        results = []
        rows = self.data.GetRewardCompetitionListByPath(
            path
        )
        
        if(rows != None) :
            for row in rows :
                reward_competition  = self.FillRewardCompetition(row)
                results.append(reward_competition)
            return results        
        
    def GetRewardCompetitionListByChannelId(self
        , channel_id
    ) :

        results = []
        rows = self.data.GetRewardCompetitionListByChannelId(
            channel_id
        )
        
        if(rows != None) :
            for row in rows :
                reward_competition  = self.FillRewardCompetition(row)
                results.append(reward_competition)
            return results        
        
    def GetRewardCompetitionListByChannelIdByCompleted(self
        , channel_id
        , completed
    ) :

        results = []
        rows = self.data.GetRewardCompetitionListByChannelIdByCompleted(
            channel_id
            , completed
        )
        
        if(rows != None) :
            for row in rows :
                reward_competition  = self.FillRewardCompetition(row)
                results.append(reward_competition)
            return results        
        
    def GetRewardCompetitionListByChannelIdByPath(self
        , channel_id
        , path
    ) :

        results = []
        rows = self.data.GetRewardCompetitionListByChannelIdByPath(
            channel_id
            , path
        )
        
        if(rows != None) :
            for row in rows :
                reward_competition  = self.FillRewardCompetition(row)
                results.append(reward_competition)
            return results        
        



