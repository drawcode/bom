import ent
from ent import *

import libs.py.core.data.pgsql
from libs.py.core.data.pgsql import *

class BaseGamingData(object):

    def __init__(self):
        self.connection_string = ''
        self.data_provider = DataProvider()
        
    def CountGame(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameByAppId(self
        , app_id
    ) :
        parameters = []
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_count_app_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameByOrgIdByAppId(self
        , org_id
        , app_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_count_org_id_app_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameByCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameByName(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_set_name"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameByOrgId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_set_org_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameByAppId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_set_app_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameByOrgIdByAppId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_set_org_id_app_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_del_name"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_del_org_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameByAppId(self
        , app_id
    ) :
        parameters = []
        parameters.append(app_id) #"in_app_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_del_app_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameByOrgIdByAppId(self
        , org_id
        , app_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
        parameters.append(app_id) #"in_app_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_del_org_id_app_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameListByAppId(self
        , app_id
    ) :
            
        parameters = []
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_get_app_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameListByOrgIdByAppId(self
        , org_id
        , app_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_get_org_id_app_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameCategory(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryByOrgId(self
        , org_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_count_org_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryByTypeId(self
        , type_id
    ) :
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_count_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :
        parameters = []
        parameters.append(org_id) #"in_org_id"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_count_org_id_type_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameCategoryListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameCategoryByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.org_id) #"in_org_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameCategoryByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameCategoryByCodeByOrgId(self
        , code
        , org_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(org_id) #"in_org_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_del_code_org_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameCategoryByCodeByOrgIdByTypeId(self
        , code
        , org_id
        , type_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(org_id) #"in_org_id"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_del_code_org_id_type_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameCategoryList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryListByOrgId(self
        , org_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_get_org_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryListByTypeId(self
        , type_id
    ) :
            
        parameters = []
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_get_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryListByOrgIdByTypeId(self
        , org_id
        , type_id
    ) :
            
        parameters = []
        parameters.append(org_id) #"in_org_id"
        parameters.append(type_id) #"in_type_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_get_org_id_type_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameCategoryTree(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryTreeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryTreeByParentId(self
        , parent_id
    ) :
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_count_parent_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryTreeByCategoryId(self
        , category_id
    ) :
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_count_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_count_parent_id_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameCategoryTreeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameCategoryTreeByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.parent_id) #"in_parent_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.category_id) #"in_category_id"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameCategoryTreeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameCategoryTreeByParentId(self
        , parent_id
    ) :
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_del_parent_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameCategoryTreeByCategoryId(self
        , category_id
    ) :
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_del_category_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameCategoryTreeByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
        parameters.append(category_id) #"in_category_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_del_parent_id_category_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameCategoryTreeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryTreeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryTreeListByParentId(self
        , parent_id
    ) :
            
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_get_parent_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryTreeListByCategoryId(self
        , category_id
    ) :
            
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_get_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryTreeListByParentIdByCategoryId(self
        , parent_id
        , category_id
    ) :
            
        parameters = []
        parameters.append(parent_id) #"in_parent_id"
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_tree_get_parent_id_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameCategoryAssoc(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryAssocByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryAssocByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryAssocByCategoryId(self
        , category_id
    ) :
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_count_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameCategoryAssocByGameIdByCategoryId(self
        , game_id
        , category_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_count_game_id_category_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameCategoryAssocListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameCategoryAssocByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.category_id) #"in_category_id"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameCategoryAssocByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameCategoryAssocList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryAssocListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryAssocListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryAssocListByCategoryId(self
        , category_id
    ) :
            
        parameters = []
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_get_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameCategoryAssocListByGameIdByCategoryId(self
        , game_id
        , category_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(category_id) #"in_category_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_category_assoc_get_game_id_category_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameType(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameTypeByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameTypeByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameTypeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameTypeByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameTypeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameTypeList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameTypeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameTypeListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameTypeListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_type_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileGame(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_count_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileGameListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileGameByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.game_profile) #"in_game_profile"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.profile_version) #"in_profile_version"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileGameByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileGameList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameListByProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileGameNetwork(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameNetworkByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameNetworkByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameNetworkByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameNetworkByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_count_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileGameNetworkListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileGameNetworkByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.game_network_id) #"in_game_network_id"
        parameters.append(obj.network_username) #"in_network_username"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.secret) #"in_secret"
        parameters.append(obj.token) #"in_token"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileGameNetworkByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileGameNetworkList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameNetworkListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameNetworkListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameNetworkListByProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameNetworkListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileGameDataAttribute(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameDataAttributeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameDataAttributeByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameDataAttributeByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_count_profile_id_game_id_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileGameDataAttributeListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileGameDataAttributeByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.val) #"in_val"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.otype) #"in_otype"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.name) #"in_name"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileGameDataAttributeByProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.val) #"in_val"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.otype) #"in_otype"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.name) #"in_name"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_set_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileGameDataAttributeByProfileIdByGameIdByCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.val) #"in_val"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.otype) #"in_otype"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.name) #"in_name"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_set_profile_id_game_id_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileGameDataAttributeByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileGameDataAttributeByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_del_profile_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileGameDataAttributeByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_del_profile_id_game_id_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileGameDataAttributeListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameDataAttributeListByProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameDataAttributeListByProfileIdByGameIdByCode(self
        , profile_id
        , game_id
        , code
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_data_attribute_get_profile_id_game_id_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameSession(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameSessionByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameSessionByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameSessionByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameSessionByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_count_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameSessionListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameSessionByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.game_area) #"in_game_area"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.network_uuid) #"in_network_uuid"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.game_level) #"in_game_level"
        parameters.append(obj.profile_network) #"in_profile_network"
        parameters.append(obj.profile_device) #"in_profile_device"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.network_external_port) #"in_network_external_port"
        parameters.append(obj.game_players_connected) #"in_game_players_connected"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.game_state) #"in_game_state"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.network_external_ip) #"in_network_external_ip"
        parameters.append(obj.profile_username) #"in_profile_username"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_code) #"in_game_code"
        parameters.append(obj.game_player_z) #"in_game_player_z"
        parameters.append(obj.game_player_x) #"in_game_player_x"
        parameters.append(obj.game_player_y) #"in_game_player_y"
        parameters.append(obj.network_port) #"in_network_port"
        parameters.append(obj.game_players_allowed) #"in_game_players_allowed"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.network_ip) #"in_network_ip"
        parameters.append(obj.network_use_nat) #"in_network_use_nat"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameSessionByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameSessionList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameSessionListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameSessionListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameSessionListByProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameSessionListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameSessionData(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_data_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameSessionDataByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_data_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameSessionDataListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_data_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameSessionDataByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data_results) #"in_data_results"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.data_layer_projectile) #"in_data_layer_projectile"
        parameters.append(obj.data_layer_actors) #"in_data_layer_actors"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.data_layer_enemy) #"in_data_layer_enemy"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_data_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameSessionDataByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_data_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameSessionDataList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_data_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameSessionDataListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_session_data_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameContent(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameContentByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameContentByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameContentByGameIdByPath(self
        , game_id
        , path
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_count_game_id_path"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameContentByGameIdByPathByVersion(self
        , game_id
        , path
        , version
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_count_game_id_path_version"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameContentByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
        parameters.append(platform) #"in_platform"
        parameters.append(increment) #"in_increment"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_count_game_id_path_version_platform_increment"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameContentListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameContentByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameContentByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_set_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameContentByGameIdByPath(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_set_game_id_path"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameContentByGameIdByPathByVersion(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_set_game_id_path_version"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameContentByGameIdByPathByVersionByPlatformByIncrement(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_set_game_id_path_version_platform_increment"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameContentByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameContentByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_del_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameContentByGameIdByPath(self
        , game_id
        , path
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(path) #"in_path"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_del_game_id_path"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameContentByGameIdByPathByVersion(self
        , game_id
        , path
        , version
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_del_game_id_path_version"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameContentByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
        parameters.append(platform) #"in_platform"
        parameters.append(increment) #"in_increment"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_del_game_id_path_version_platform_increment"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameContentList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameContentListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameContentListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameContentListByGameIdByPath(self
        , game_id
        , path
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_get_game_id_path"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameContentListByGameIdByPathByVersion(self
        , game_id
        , path
        , version
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_get_game_id_path_version"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameContentListByGameIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , path
        , version
        , platform
        , increment
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
        parameters.append(platform) #"in_platform"
        parameters.append(increment) #"in_increment"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_content_get_game_id_path_version_platform_increment"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameProfileContent(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileContentByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileContentByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count_game_id_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileContentByGameIdByUsername(self
        , game_id
        , username
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count_game_id_username"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileContentByUsername(self
        , username
    ) :
        parameters = []
        parameters.append(username) #"in_username"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count_username"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileContentByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count_game_id_profile_id_path"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileContentByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count_game_id_profile_id_path_version"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
        parameters.append(platform) #"in_platform"
        parameters.append(increment) #"in_increment"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count_game_id_profile_id_path_version_"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileContentByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count_game_id_username_path"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileContentByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count_game_id_username_path_version"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
        parameters.append(platform) #"in_platform"
        parameters.append(increment) #"in_increment"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_count_game_id_username_path_version_pl"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameProfileContentListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameProfileContentByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.game_network) #"in_game_network"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileContentByGameIdByProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.game_network) #"in_game_network"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_set_game_id_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileContentByGameIdByUsername(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.game_network) #"in_game_network"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_set_game_id_username"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileContentByUsername(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.game_network) #"in_game_network"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_set_username"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileContentByGameIdByProfileIdByPath(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.game_network) #"in_game_network"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_set_game_id_profile_id_path"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileContentByGameIdByProfileIdByPathByVersion(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.game_network) #"in_game_network"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_set_game_id_profile_id_path_version"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.game_network) #"in_game_network"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_set_game_id_profile_id_path_version_pl"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileContentByGameIdByUsernameByPath(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.game_network) #"in_game_network"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_set_game_id_username_path"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileContentByGameIdByUsernameByPathByVersion(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.game_network) #"in_game_network"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_set_game_id_username_path_version"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.increment) #"in_increment"
        parameters.append(obj.path) #"in_path"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.platform) #"in_platform"
        parameters.append(obj.filename) #"in_filename"
        parameters.append(obj.source) #"in_source"
        parameters.append(obj.version) #"in_version"
        parameters.append(obj.game_network) #"in_game_network"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.extension) #"in_extension"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.date_created) #"in_date_created"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_set_game_id_username_path_version_plat"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameProfileContentByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileContentByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_del_game_id_profile_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileContentByGameIdByUsername(self
        , game_id
        , username
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_del_game_id_username"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileContentByUsername(self
        , username
    ) :
        parameters = []
        parameters.append(username) #"in_username"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_del_username"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileContentByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(path) #"in_path"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_del_game_id_profile_id_path"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileContentByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_del_game_id_profile_id_path_version"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileContentByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
        parameters.append(platform) #"in_platform"
        parameters.append(increment) #"in_increment"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_del_game_id_profile_id_path_version_pl"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileContentByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
        parameters.append(path) #"in_path"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_del_game_id_username_path"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileContentByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_del_game_id_username_path_version"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileContentByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
        parameters.append(platform) #"in_platform"
        parameters.append(increment) #"in_increment"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_del_game_id_username_path_version_plat"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameProfileContentList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileContentListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileContentListByGameIdByProfileId(self
        , game_id
        , profile_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get_game_id_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileContentListByGameIdByUsername(self
        , game_id
        , username
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get_game_id_username"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileContentListByUsername(self
        , username
    ) :
            
        parameters = []
        parameters.append(username) #"in_username"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get_username"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileContentListByGameIdByProfileIdByPath(self
        , game_id
        , profile_id
        , path
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get_game_id_profile_id_path"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileContentListByGameIdByProfileIdByPathByVersion(self
        , game_id
        , profile_id
        , path
        , version
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get_game_id_profile_id_path_version"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileContentListByGameIdByProfileIdByPathByVersionByPlatformByIncrement(self
        , game_id
        , profile_id
        , path
        , version
        , platform
        , increment
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
        parameters.append(platform) #"in_platform"
        parameters.append(increment) #"in_increment"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get_game_id_profile_id_path_version_pl"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileContentListByGameIdByUsernameByPath(self
        , game_id
        , username
        , path
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
        parameters.append(path) #"in_path"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get_game_id_username_path"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileContentListByGameIdByUsernameByPathByVersion(self
        , game_id
        , username
        , path
        , version
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get_game_id_username_path_version"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileContentListByGameIdByUsernameByPathByVersionByPlatformByIncrement(self
        , game_id
        , username
        , path
        , version
        , platform
        , increment
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(username) #"in_username"
        parameters.append(path) #"in_path"
        parameters.append(version) #"in_version"
        parameters.append(platform) #"in_platform"
        parameters.append(increment) #"in_increment"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_content_get_game_id_username_path_version_plat"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameApp(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAppByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAppByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAppByAppId(self
        , app_id
    ) :
        parameters = []
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_count_app_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAppByGameIdByAppId(self
        , game_id
        , app_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_count_game_id_app_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameAppListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameAppByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.app_id) #"in_app_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameAppByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameAppList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameAppListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameAppListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameAppListByAppId(self
        , app_id
    ) :
            
        parameters = []
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_get_app_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameAppListByGameIdByAppId(self
        , game_id
        , app_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(app_id) #"in_app_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_app_get_game_id_app_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountProfileGameLocation(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameLocationByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameLocationByGameLocationId(self
        , game_location_id
    ) :
        parameters = []
        parameters.append(game_location_id) #"in_game_location_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_count_game_location_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameLocationByProfileId(self
        , profile_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_count_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameLocationByProfileIdByGameLocationId(self
        , profile_id
        , game_location_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_location_id) #"in_game_location_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_count_profile_id_game_location_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileGameLocationListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetProfileGameLocationByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.game_location_id) #"in_game_location_id"
        parameters.append(obj.type_id) #"in_type_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileGameLocationByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetProfileGameLocationList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameLocationListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameLocationListByGameLocationId(self
        , game_location_id
    ) :
            
        parameters = []
        parameters.append(game_location_id) #"in_game_location_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_get_game_location_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameLocationListByProfileId(self
        , profile_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_get_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameLocationListByProfileIdByGameLocationId(self
        , profile_id
        , game_location_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_location_id) #"in_game_location_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_location_get_profile_id_game_location_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGamePhoto(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGamePhotoByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGamePhotoByExternalId(self
        , external_id
    ) :
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_count_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGamePhotoByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_count_url"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGamePhotoByUrlByExternalId(self
        , url
        , external_id
    ) :
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_count_url_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGamePhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_count_uuid_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGamePhotoListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGamePhotoByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.external_id) #"in_external_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGamePhotoByExternalId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.external_id) #"in_external_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_set_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGamePhotoByUrl(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.external_id) #"in_external_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_set_url"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGamePhotoByUrlByExternalId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.external_id) #"in_external_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_set_url_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGamePhotoByUuidByExternalId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.external_id) #"in_external_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_set_uuid_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGamePhotoByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGamePhotoByExternalId(self
        , external_id
    ) :
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_del_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGamePhotoByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_del_url"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGamePhotoByUrlByExternalId(self
        , url
        , external_id
    ) :
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_del_url_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGamePhotoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_del_uuid_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGamePhotoList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGamePhotoListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGamePhotoListByExternalId(self
        , external_id
    ) :
            
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_get_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGamePhotoListByUrl(self
        , url
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_get_url"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGamePhotoListByUrlByExternalId(self
        , url
        , external_id
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_get_url_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGamePhotoListByUuidByExternalId(self
        , uuid
        , external_id
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_photo_get_uuid_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameVideo(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameVideoByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameVideoByExternalId(self
        , external_id
    ) :
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_count_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameVideoByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_count_url"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameVideoByUrlByExternalId(self
        , url
        , external_id
    ) :
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_count_url_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_count_uuid_external_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameVideoListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameVideoByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.external_id) #"in_external_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameVideoByExternalId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.external_id) #"in_external_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_set_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameVideoByUrl(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.external_id) #"in_external_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_set_url"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameVideoByUrlByExternalId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.external_id) #"in_external_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_set_url_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameVideoByUuidByExternalId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.external_id) #"in_external_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_set_uuid_external_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameVideoByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameVideoByExternalId(self
        , external_id
    ) :
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_del_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameVideoByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_del_url"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameVideoByUrlByExternalId(self
        , url
        , external_id
    ) :
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_del_url_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameVideoByUuidByExternalId(self
        , uuid
        , external_id
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_del_uuid_external_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameVideoList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameVideoListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameVideoListByExternalId(self
        , external_id
    ) :
            
        parameters = []
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_get_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameVideoListByUrl(self
        , url
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_get_url"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameVideoListByUrlByExternalId(self
        , url
        , external_id
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_get_url_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameVideoListByUuidByExternalId(self
        , uuid
        , external_id
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(external_id) #"in_external_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_video_get_uuid_external_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameRpgItemWeapon(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameRpgItemWeaponByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameRpgItemWeaponByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameRpgItemWeaponByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_count_url"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameRpgItemWeaponByUrlByGameId(self
        , url
        , game_id
    ) :
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_count_url_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameRpgItemWeaponByUuidByGameId(self
        , uuid
        , game_id
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_count_uuid_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameRpgItemWeaponListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameRpgItemWeaponByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.game_defense) #"in_game_defense"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_attack) #"in_game_attack"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.game_price) #"in_game_price"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.game_skill) #"in_game_skill"
        parameters.append(obj.game_health) #"in_game_health"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_energy) #"in_game_energy"
        parameters.append(obj.game_data) #"in_game_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameRpgItemWeaponByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.game_defense) #"in_game_defense"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_attack) #"in_game_attack"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.game_price) #"in_game_price"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.game_skill) #"in_game_skill"
        parameters.append(obj.game_health) #"in_game_health"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_energy) #"in_game_energy"
        parameters.append(obj.game_data) #"in_game_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_set_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameRpgItemWeaponByUrl(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.game_defense) #"in_game_defense"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_attack) #"in_game_attack"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.game_price) #"in_game_price"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.game_skill) #"in_game_skill"
        parameters.append(obj.game_health) #"in_game_health"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_energy) #"in_game_energy"
        parameters.append(obj.game_data) #"in_game_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_set_url"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameRpgItemWeaponByUrlByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.game_defense) #"in_game_defense"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_attack) #"in_game_attack"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.game_price) #"in_game_price"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.game_skill) #"in_game_skill"
        parameters.append(obj.game_health) #"in_game_health"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_energy) #"in_game_energy"
        parameters.append(obj.game_data) #"in_game_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_set_url_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameRpgItemWeaponByUuidByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.game_defense) #"in_game_defense"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_attack) #"in_game_attack"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.game_price) #"in_game_price"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.game_skill) #"in_game_skill"
        parameters.append(obj.game_health) #"in_game_health"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_energy) #"in_game_energy"
        parameters.append(obj.game_data) #"in_game_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_set_uuid_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameRpgItemWeaponByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameRpgItemWeaponByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_del_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameRpgItemWeaponByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_del_url"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameRpgItemWeaponByUrlByGameId(self
        , url
        , game_id
    ) :
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_del_url_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameRpgItemWeaponByUuidByGameId(self
        , uuid
        , game_id
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_del_uuid_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameRpgItemWeaponList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameRpgItemWeaponListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameRpgItemWeaponListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameRpgItemWeaponListByUrl(self
        , url
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_get_url"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameRpgItemWeaponListByUrlByGameId(self
        , url
        , game_id
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_get_url_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameRpgItemWeaponListByUuidByGameId(self
        , uuid
        , game_id
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_weapon_get_uuid_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameRpgItemSkill(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameRpgItemSkillByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameRpgItemSkillByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameRpgItemSkillByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_count_url"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameRpgItemSkillByUrlByGameId(self
        , url
        , game_id
    ) :
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_count_url_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameRpgItemSkillByUuidByGameId(self
        , uuid
        , game_id
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_count_uuid_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameRpgItemSkillListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameRpgItemSkillByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.game_defense) #"in_game_defense"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_attack) #"in_game_attack"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.game_price) #"in_game_price"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.game_skill) #"in_game_skill"
        parameters.append(obj.game_health) #"in_game_health"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_energy) #"in_game_energy"
        parameters.append(obj.game_data) #"in_game_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameRpgItemSkillByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.game_defense) #"in_game_defense"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_attack) #"in_game_attack"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.game_price) #"in_game_price"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.game_skill) #"in_game_skill"
        parameters.append(obj.game_health) #"in_game_health"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_energy) #"in_game_energy"
        parameters.append(obj.game_data) #"in_game_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_set_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameRpgItemSkillByUrl(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.game_defense) #"in_game_defense"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_attack) #"in_game_attack"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.game_price) #"in_game_price"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.game_skill) #"in_game_skill"
        parameters.append(obj.game_health) #"in_game_health"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_energy) #"in_game_energy"
        parameters.append(obj.game_data) #"in_game_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_set_url"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameRpgItemSkillByUrlByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.game_defense) #"in_game_defense"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_attack) #"in_game_attack"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.game_price) #"in_game_price"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.game_skill) #"in_game_skill"
        parameters.append(obj.game_health) #"in_game_health"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_energy) #"in_game_energy"
        parameters.append(obj.game_data) #"in_game_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_set_url_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameRpgItemSkillByUuidByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.third_party_oembed) #"in_third_party_oembed"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.description) #"in_description"
        parameters.append(obj.game_defense) #"in_game_defense"
        parameters.append(obj.third_party_url) #"in_third_party_url"
        parameters.append(obj.third_party_id) #"in_third_party_id"
        parameters.append(obj.content_type) #"in_content_type"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.game_attack) #"in_game_attack"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.third_party_data) #"in_third_party_data"
        parameters.append(obj.game_price) #"in_game_price"
        parameters.append(obj.game_type) #"in_game_type"
        parameters.append(obj.game_skill) #"in_game_skill"
        parameters.append(obj.game_health) #"in_game_health"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_energy) #"in_game_energy"
        parameters.append(obj.game_data) #"in_game_data"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_set_uuid_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameRpgItemSkillByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameRpgItemSkillByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_del_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameRpgItemSkillByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_del_url"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameRpgItemSkillByUrlByGameId(self
        , url
        , game_id
    ) :
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_del_url_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameRpgItemSkillByUuidByGameId(self
        , uuid
        , game_id
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_del_uuid_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameRpgItemSkillList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameRpgItemSkillListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameRpgItemSkillListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameRpgItemSkillListByUrl(self
        , url
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_get_url"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameRpgItemSkillListByUrlByGameId(self
        , url
        , game_id
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_get_url_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameRpgItemSkillListByUuidByGameId(self
        , uuid
        , game_id
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_rpg_item_skill_get_uuid_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameProduct(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProductByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProductByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProductByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_count_url"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProductByUrlByGameId(self
        , url
        , game_id
    ) :
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_count_url_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProductByUuidByGameId(self
        , uuid
        , game_id
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_count_uuid_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameProductListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameProductByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProductByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_set_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProductByUrl(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_set_url"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProductByUrlByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_set_url_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProductByUuidByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_set_uuid_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameProductByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProductByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_del_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProductByUrl(self
        , url
    ) :
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_del_url"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProductByUrlByGameId(self
        , url
        , game_id
    ) :
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_del_url_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProductByUuidByGameId(self
        , uuid
        , game_id
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_del_uuid_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameProductList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProductListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProductListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProductListByUrl(self
        , url
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_get_url"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProductListByUrlByGameId(self
        , url
        , game_id
    ) :
            
        parameters = []
        parameters.append(url) #"in_url"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_get_url_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProductListByUuidByGameId(self
        , uuid
        , game_id
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_product_get_uuid_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameStatisticLeaderboard(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardByKey(self
        , key
    ) :
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_key"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_key_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_key_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_key_profile_id_game_id_tim"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameStatisticLeaderboardListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameStatisticLeaderboardByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_set_uuid_profile_id_game_id_time"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardByProfileIdByKey(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_set_profile_id_key"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardByProfileIdByKeyByTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_set_profile_id_key_timestamp"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_set_key_profile_id_game_id_times"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardByProfileIdByGameIdByKey(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_set_profile_id_game_id_key"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameStatisticLeaderboardByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_del_key_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_del_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_del_key_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameStatisticLeaderboardList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListByKey(self
        , key
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_key"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListByKeyByGameId(self
        , key
        , game_id
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_key_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_profile_id_game_id_timestamp"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_key_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_key_profile_id_game_id_times"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameLiveQueue(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLiveQueueByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLiveQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_count_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameLiveQueueListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameLiveQueueByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.data_stat) #"in_data_stat"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.data_ad) #"in_data_ad"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameLiveQueueByProfileIdByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.data_stat) #"in_data_stat"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.data_ad) #"in_data_ad"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_set_profile_id_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameLiveQueueByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameLiveQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_del_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameLiveQueueList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLiveQueueListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLiveQueueListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLiveQueueListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_queue_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameLiveRecentQueue(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLiveRecentQueueByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLiveRecentQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_count_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameLiveRecentQueueListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameLiveRecentQueueByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.game) #"in_game"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameLiveRecentQueueByProfileIdByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.game) #"in_game"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_set_profile_id_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameLiveRecentQueueByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameLiveRecentQueueByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_del_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameLiveRecentQueueList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLiveRecentQueueListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLiveRecentQueueListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLiveRecentQueueListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_live_recent_queue_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameProfileStatistic(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticByKey(self
        , key
    ) :
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_key"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_key_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_key_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_key_profile_id_game_id_timesta"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameProfileStatisticListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameProfileStatisticByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticByUuidByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_set_uuid_profile_id_game_id_timestam"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticByProfileIdByKey(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_set_profile_id_key"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticByProfileIdByKeyByTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_set_profile_id_key_timestamp"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_set_key_profile_id_game_id_timestamp"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticByProfileIdByGameIdByKey(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_set_profile_id_game_id_key"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameProfileStatisticByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileStatisticByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_del_key_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileStatisticByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_del_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileStatisticByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_del_key_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameProfileStatisticListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticListByKey(self
        , key
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_key"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticListByKeyByGameId(self
        , key
        , game_id
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_key_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_profile_id_game_id_timestamp"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_key_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_key_profile_id_game_id_timestamp"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameStatisticMeta(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticMetaByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticMetaByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticMetaByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticMetaByKey(self
        , key
    ) :
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_count_key"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticMetaByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_count_key_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameStatisticMetaListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameStatisticMetaByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.store_count) #"in_store_count"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticMetaByKeyByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.store_count) #"in_store_count"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_set_key_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameStatisticMetaByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_del_key_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameStatisticMetaListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticMetaListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticMetaListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticMetaListByKey(self
        , key
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_get_key"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticMetaListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticMetaListByKeyByGameId(self
        , key
        , game_id
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_get_key_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameProfileStatisticTimestamp(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_timestamp_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticTimestampByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_timestamp_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_timestamp_count_key_profile_id_game_"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameProfileStatisticTimestampListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_timestamp_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameProfileStatisticTimestampByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_timestamp_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_timestamp_set_key_profile_id_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameProfileStatisticTimestampByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_timestamp_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileStatisticTimestampByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_timestamp_del_key_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameProfileStatisticTimestampListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_timestamp_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticTimestampListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_timestamp_get_key_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameKeyMeta(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameKeyMetaByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameKeyMetaByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameKeyMetaByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameKeyMetaByKey(self
        , key
    ) :
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_count_key"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameKeyMetaByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameKeyMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_count_key_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameKeyMetaListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameKeyMetaByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.key_level) #"in_key_level"
        parameters.append(obj.store_count) #"in_store_count"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
        parameters.append(obj.key_stat) #"in_key_stat"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameKeyMetaByKeyByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.key_level) #"in_key_level"
        parameters.append(obj.store_count) #"in_store_count"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
        parameters.append(obj.key_stat) #"in_key_stat"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_set_key_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameKeyMetaByKeyByGameIdByLevel(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.key_level) #"in_key_level"
        parameters.append(obj.store_count) #"in_store_count"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
        parameters.append(obj.key_stat) #"in_key_stat"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_set_key_game_id_level"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameKeyMetaByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameKeyMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_del_key_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameKeyMetaListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameKeyMetaListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameKeyMetaListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameKeyMetaListByKey(self
        , key
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_get_key"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameKeyMetaListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameKeyMetaListByKeyByGameId(self
        , key
        , game_id
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_get_key_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameKeyMetaListByCodeByLevel(self
        , code
        , level
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(level) #"in_level"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_get_code_level"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameLevel(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLevelByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLevelByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLevelByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLevelByKey(self
        , key
    ) :
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_count_key"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLevelByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLevelByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_count_key_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameLevelListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameLevelByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameLevelByKeyByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.order) #"in_order"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_set_key_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameLevelByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameLevelByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_del_key_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameLevelListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLevelListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLevelListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLevelListByKey(self
        , key
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_get_key"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLevelListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLevelListByKeyByGameId(self
        , key
        , game_id
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_get_key_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameProfileAchievement(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileAchievementByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileAchievementByProfileIdByKey(self
        , profile_id
        , key
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_count_profile_id_key"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileAchievementByUsername(self
        , username
    ) :
        parameters = []
        parameters.append(username) #"in_username"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_count_username"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileAchievementByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_count_key_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_count_key_profile_id_game_id_times"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameProfileAchievementListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameProfileAchievementByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.completed) #"in_completed"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.achievement_value) #"in_achievement_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileAchievementByUuidByKey(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.completed) #"in_completed"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.achievement_value) #"in_achievement_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_set_uuid_key"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileAchievementByProfileIdByKey(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.completed) #"in_completed"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.achievement_value) #"in_achievement_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_set_profile_id_key"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileAchievementByKeyByProfileIdByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.completed) #"in_completed"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.achievement_value) #"in_achievement_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_set_key_profile_id_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileAchievementByKeyByProfileIdByGameIdByTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.completed) #"in_completed"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.achievement_value) #"in_achievement_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_set_key_profile_id_game_id_timesta"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameProfileAchievementByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileAchievementByProfileIdByKey(self
        , profile_id
        , key
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(key) #"in_key"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_del_profile_id_key"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileAchievementByUuidByKey(self
        , uuid
        , key
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(key) #"in_key"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_del_uuid_key"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameProfileAchievementListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListByProfileIdByKey(self
        , profile_id
        , key
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_profile_id_key"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListByUsername(self
        , username
    ) :
            
        parameters = []
        parameters.append(username) #"in_username"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_username"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListByKey(self
        , key
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_key"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListByKeyByGameId(self
        , key
        , game_id
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_key_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListByProfileIdByGameId(self
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListByProfileIdByGameIdByTimestamp(self
        , profile_id
        , game_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_profile_id_game_id_timestamp"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListByKeyByProfileIdByGameId(self
        , key
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_key_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListByKeyByProfileIdByGameIdByTimestamp(self
        , key
        , profile_id
        , game_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_key_profile_id_game_id_timesta"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameAchievementMeta(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAchievementMetaByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAchievementMetaByCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAchievementMetaByName(self
        , name
    ) :
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_count_name"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAchievementMetaByKey(self
        , key
    ) :
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_count_key"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAchievementMetaByGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAchievementMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_count_key_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameAchievementMetaListByFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameAchievementMetaByUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.game_stat) #"in_game_stat"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.leaderboard) #"in_leaderboard"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameAchievementMetaByKeyByGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.sort) #"in_sort"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.game_stat) #"in_game_stat"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.key) #"in_key"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.leaderboard) #"in_leaderboard"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_set_key_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameAchievementMetaByUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameAchievementMetaByKeyByGameId(self
        , key
        , game_id
    ) :
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_del_key_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameAchievementMetaListByUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameAchievementMetaListByCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameAchievementMetaListByName(self
        , name
    ) :
            
        parameters = []
        parameters.append(name) #"in_name"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_get_name"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameAchievementMetaListByKey(self
        , key
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_get_key"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameAchievementMetaListByGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameAchievementMetaListByKeyByGameId(self
        , key
        , game_id
    ) :
            
        parameters = []
        parameters.append(key) #"in_key"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_get_key_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None





