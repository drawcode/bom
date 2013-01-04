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
            
    def CountGameUuid(self
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
            
    def CountGameCode(self
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
            
    def CountGameName(self
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
            
    def CountGameOrgId(self
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
            
    def CountGameAppId(self
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
            
    def CountGameOrgIdAppId(self
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
            
    def BrowseGameListFilter(self, filter_obj) :
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

    def SetGameUuid(self, set_type, obj) :
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

    def SetGameCode(self, set_type, obj) :
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

    def SetGameName(self, set_type, obj) :
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

    def SetGameOrgId(self, set_type, obj) :
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

    def SetGameAppId(self, set_type, obj) :
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

    def SetGameOrgIdAppId(self, set_type, obj) :
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

    def DelGameUuid(self
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
             
    def DelGameCode(self
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
             
    def DelGameName(self
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
             
    def DelGameOrgId(self
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
             
    def DelGameAppId(self
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
             
    def DelGameOrgIdAppId(self
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

    def GetGameListUuid(self
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

    def GetGameListCode(self
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

    def GetGameListName(self
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

    def GetGameListOrgId(self
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

    def GetGameListAppId(self
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

    def GetGameListOrgIdAppId(self
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
            
    def CountGameCategoryUuid(self
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
            
    def CountGameCategoryCode(self
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
            
    def CountGameCategoryName(self
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
            
    def CountGameCategoryOrgId(self
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
            
    def CountGameCategoryTypeId(self
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
            
    def CountGameCategoryOrgIdTypeId(self
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
            
    def BrowseGameCategoryListFilter(self, filter_obj) :
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

    def SetGameCategoryUuid(self, set_type, obj) :
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

    def DelGameCategoryUuid(self
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
             
    def DelGameCategoryCodeOrgId(self
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
             
    def DelGameCategoryCodeOrgIdTypeId(self
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

    def GetGameCategoryListUuid(self
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

    def GetGameCategoryListCode(self
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

    def GetGameCategoryListName(self
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

    def GetGameCategoryListOrgId(self
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

    def GetGameCategoryListTypeId(self
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

    def GetGameCategoryListOrgIdTypeId(self
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
            
    def CountGameCategoryTreeUuid(self
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
            
    def CountGameCategoryTreeParentId(self
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
            
    def CountGameCategoryTreeCategoryId(self
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
            
    def CountGameCategoryTreeParentIdCategoryId(self
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
            
    def BrowseGameCategoryTreeListFilter(self, filter_obj) :
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

    def SetGameCategoryTreeUuid(self, set_type, obj) :
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

    def DelGameCategoryTreeUuid(self
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
             
    def DelGameCategoryTreeParentId(self
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
             
    def DelGameCategoryTreeCategoryId(self
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
             
    def DelGameCategoryTreeParentIdCategoryId(self
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

    def GetGameCategoryTreeListUuid(self
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

    def GetGameCategoryTreeListParentId(self
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

    def GetGameCategoryTreeListCategoryId(self
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

    def GetGameCategoryTreeListParentIdCategoryId(self
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
            
    def CountGameCategoryAssocUuid(self
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
            
    def CountGameCategoryAssocGameId(self
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
            
    def CountGameCategoryAssocCategoryId(self
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
            
    def CountGameCategoryAssocGameIdCategoryId(self
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
            
    def BrowseGameCategoryAssocListFilter(self, filter_obj) :
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

    def SetGameCategoryAssocUuid(self, set_type, obj) :
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

    def DelGameCategoryAssocUuid(self
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

    def GetGameCategoryAssocListUuid(self
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

    def GetGameCategoryAssocListGameId(self
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

    def GetGameCategoryAssocListCategoryId(self
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

    def GetGameCategoryAssocListGameIdCategoryId(self
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
            
    def CountGameTypeUuid(self
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
            
    def CountGameTypeCode(self
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
            
    def CountGameTypeName(self
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
            
    def BrowseGameTypeListFilter(self, filter_obj) :
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

    def SetGameTypeUuid(self, set_type, obj) :
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

    def DelGameTypeUuid(self
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

    def GetGameTypeListUuid(self
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

    def GetGameTypeListCode(self
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

    def GetGameTypeListName(self
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
            
    def CountProfileGameUuid(self
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
            
    def CountProfileGameGameId(self
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
            
    def CountProfileGameProfileId(self
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
            
    def CountProfileGameProfileIdGameId(self
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
            
    def BrowseProfileGameListFilter(self, filter_obj) :
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

    def SetProfileGameUuid(self, set_type, obj) :
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

    def DelProfileGameUuid(self
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

    def GetProfileGameListUuid(self
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

    def GetProfileGameListGameId(self
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

    def GetProfileGameListProfileId(self
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

    def GetProfileGameListProfileIdGameId(self
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

    def CountGameNetwork(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameNetworkUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameNetworkCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameNetworkUuidType(self
        , uuid
        , type
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(type) #"in_type"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_count_uuid_type"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameNetworkListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameNetworkUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.secret) #"in_secret"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameNetworkCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.secret) #"in_secret"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameNetworkUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameNetworkList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameNetworkListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameNetworkListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameNetworkListUuidType(self
        , uuid
        , type
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(type) #"in_type"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_get_uuid_type"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameNetworkAuth(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_auth_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameNetworkAuthUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_auth_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameNetworkAuthGameIdGameNetworkId(self
        , game_id
        , game_network_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(game_network_id) #"in_game_network_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_auth_count_game_id_game_network_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameNetworkAuthListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_auth_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameNetworkAuthUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.game_network_id) #"in_game_network_id"
        parameters.append(obj.secret) #"in_secret"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_auth_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameNetworkAuthGameIdGameNetworkId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.display_name) #"in_display_name"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.url) #"in_url"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.app_id) #"in_app_id"
        parameters.append(obj.game_network_id) #"in_game_network_id"
        parameters.append(obj.secret) #"in_secret"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_auth_set_game_id_game_network_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameNetworkAuthUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_auth_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameNetworkAuthList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_auth_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameNetworkAuthListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_auth_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameNetworkAuthListGameIdGameNetworkId(self
        , game_id
        , game_network_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
        parameters.append(game_network_id) #"in_game_network_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_network_auth_get_game_id_game_network_id"
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
            
    def CountProfileGameNetworkUuid(self
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
            
    def CountProfileGameNetworkGameId(self
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
            
    def CountProfileGameNetworkProfileId(self
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
            
    def CountProfileGameNetworkProfileIdGameId(self
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
            
    def CountProfileGameNetworkProfileIdGameId(self
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
            
    def CountProfileGameNetworkProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(game_network_id) #"in_game_network_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_count_profile_id_game_id_game_network_"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountProfileGameNetworkNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :
        parameters = []
        parameters.append(network_username) #"in_network_username"
        parameters.append(game_id) #"in_game_id"
        parameters.append(game_network_id) #"in_game_network_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_count_network_username_game_id_game_ne"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseProfileGameNetworkListFilter(self, filter_obj) :
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

    def SetProfileGameNetworkUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.game_network_id) #"in_game_network_id"
        parameters.append(obj.network_username) #"in_network_username"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.network_fullname) #"in_network_fullname"
        parameters.append(obj.secret) #"in_secret"
        parameters.append(obj.token) #"in_token"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.network_auth) #"in_network_auth"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.network_user_id) #"in_network_user_id"
                        
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

    def SetProfileGameNetworkProfileIdGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.game_network_id) #"in_game_network_id"
        parameters.append(obj.network_username) #"in_network_username"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.network_fullname) #"in_network_fullname"
        parameters.append(obj.secret) #"in_secret"
        parameters.append(obj.token) #"in_token"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.network_auth) #"in_network_auth"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.network_user_id) #"in_network_user_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_set_profile_id_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileGameNetworkProfileIdGameIdGameNetworkId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.game_network_id) #"in_game_network_id"
        parameters.append(obj.network_username) #"in_network_username"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.network_fullname) #"in_network_fullname"
        parameters.append(obj.secret) #"in_secret"
        parameters.append(obj.token) #"in_token"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.network_auth) #"in_network_auth"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.network_user_id) #"in_network_user_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_set_profile_id_game_id_game_network_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetProfileGameNetworkNetworkUsernameGameIdGameNetworkId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.hash) #"in_hash"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.game_network_id) #"in_game_network_id"
        parameters.append(obj.network_username) #"in_network_username"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.network_fullname) #"in_network_fullname"
        parameters.append(obj.secret) #"in_secret"
        parameters.append(obj.token) #"in_token"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.network_auth) #"in_network_auth"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.network_user_id) #"in_network_user_id"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_set_network_username_game_id_game_netw"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelProfileGameNetworkUuid(self
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
             
    def DelProfileGameNetworkProfileIdGameId(self
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
            , "usp_profile_game_network_del_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileGameNetworkProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(game_network_id) #"in_game_network_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_del_profile_id_game_id_game_network_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelProfileGameNetworkNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :
        parameters = []
        parameters.append(network_username) #"in_network_username"
        parameters.append(game_id) #"in_game_id"
        parameters.append(game_network_id) #"in_game_network_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_del_network_username_game_id_game_netw"
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

    def GetProfileGameNetworkListUuid(self
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

    def GetProfileGameNetworkListGameId(self
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

    def GetProfileGameNetworkListProfileId(self
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

    def GetProfileGameNetworkListProfileIdGameId(self
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

    def GetProfileGameNetworkListProfileIdGameIdGameNetworkId(self
        , profile_id
        , game_id
        , game_network_id
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(game_network_id) #"in_game_network_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_get_profile_id_game_id_game_network_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetProfileGameNetworkListNetworkUsernameGameIdGameNetworkId(self
        , network_username
        , game_id
        , game_network_id
    ) :
            
        parameters = []
        parameters.append(network_username) #"in_network_username"
        parameters.append(game_id) #"in_game_id"
        parameters.append(game_network_id) #"in_game_network_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_profile_game_network_get_network_username_game_id_game_netw"
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
            
    def CountProfileGameDataAttributeUuid(self
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
            
    def CountProfileGameDataAttributeProfileId(self
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
            
    def CountProfileGameDataAttributeProfileIdGameIdCode(self
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
            
    def BrowseProfileGameDataAttributeListFilter(self, filter_obj) :
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

    def SetProfileGameDataAttributeUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.val) #"in_val"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.otype) #"in_otype"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
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

    def SetProfileGameDataAttributeProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.val) #"in_val"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.otype) #"in_otype"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
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

    def SetProfileGameDataAttributeProfileIdGameIdCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.name) #"in_name"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.val) #"in_val"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.otype) #"in_otype"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
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

    def DelProfileGameDataAttributeUuid(self
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
             
    def DelProfileGameDataAttributeProfileId(self
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
             
    def DelProfileGameDataAttributeProfileIdGameIdCode(self
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
             
    def GetProfileGameDataAttributeListUuid(self
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

    def GetProfileGameDataAttributeListProfileId(self
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

    def GetProfileGameDataAttributeListProfileIdGameIdCode(self
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
            
    def CountGameSessionUuid(self
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
            
    def CountGameSessionGameId(self
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
            
    def CountGameSessionProfileId(self
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
            
    def CountGameSessionProfileIdGameId(self
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
            
    def BrowseGameSessionListFilter(self, filter_obj) :
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

    def SetGameSessionUuid(self, set_type, obj) :
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

    def DelGameSessionUuid(self
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

    def GetGameSessionListUuid(self
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

    def GetGameSessionListGameId(self
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

    def GetGameSessionListProfileId(self
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

    def GetGameSessionListProfileIdGameId(self
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
            
    def CountGameSessionDataUuid(self
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
            
    def BrowseGameSessionDataListFilter(self, filter_obj) :
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

    def SetGameSessionDataUuid(self, set_type, obj) :
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

    def DelGameSessionDataUuid(self
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

    def GetGameSessionDataListUuid(self
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
            
    def CountGameContentUuid(self
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
            
    def CountGameContentGameId(self
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
            
    def CountGameContentGameIdPath(self
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
            
    def CountGameContentGameIdPathVersion(self
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
            
    def CountGameContentGameIdPathVersionPlatformIncrement(self
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
            
    def BrowseGameContentListFilter(self, filter_obj) :
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

    def SetGameContentUuid(self, set_type, obj) :
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

    def SetGameContentGameId(self, set_type, obj) :
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

    def SetGameContentGameIdPath(self, set_type, obj) :
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

    def SetGameContentGameIdPathVersion(self, set_type, obj) :
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

    def SetGameContentGameIdPathVersionPlatformIncrement(self, set_type, obj) :
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

    def DelGameContentUuid(self
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
             
    def DelGameContentGameId(self
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
             
    def DelGameContentGameIdPath(self
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
             
    def DelGameContentGameIdPathVersion(self
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
             
    def DelGameContentGameIdPathVersionPlatformIncrement(self
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

    def GetGameContentListUuid(self
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

    def GetGameContentListGameId(self
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

    def GetGameContentListGameIdPath(self
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

    def GetGameContentListGameIdPathVersion(self
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

    def GetGameContentListGameIdPathVersionPlatformIncrement(self
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
            
    def CountGameProfileContentUuid(self
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
            
    def CountGameProfileContentGameIdProfileId(self
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
            
    def CountGameProfileContentGameIdUsername(self
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
            
    def CountGameProfileContentUsername(self
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
            
    def CountGameProfileContentGameIdProfileIdPath(self
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
            
    def CountGameProfileContentGameIdProfileIdPathVersion(self
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
            
    def CountGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(self
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
            
    def CountGameProfileContentGameIdUsernamePath(self
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
            
    def CountGameProfileContentGameIdUsernamePathVersion(self
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
            
    def CountGameProfileContentGameIdUsernamePathVersionPlatformIncrement(self
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
            
    def BrowseGameProfileContentListFilter(self, filter_obj) :
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

    def SetGameProfileContentUuid(self, set_type, obj) :
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

    def SetGameProfileContentGameIdProfileId(self, set_type, obj) :
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

    def SetGameProfileContentGameIdUsername(self, set_type, obj) :
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

    def SetGameProfileContentUsername(self, set_type, obj) :
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

    def SetGameProfileContentGameIdProfileIdPath(self, set_type, obj) :
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

    def SetGameProfileContentGameIdProfileIdPathVersion(self, set_type, obj) :
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

    def SetGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(self, set_type, obj) :
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

    def SetGameProfileContentGameIdUsernamePath(self, set_type, obj) :
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

    def SetGameProfileContentGameIdUsernamePathVersion(self, set_type, obj) :
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

    def SetGameProfileContentGameIdUsernamePathVersionPlatformIncrement(self, set_type, obj) :
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

    def DelGameProfileContentUuid(self
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
             
    def DelGameProfileContentGameIdProfileId(self
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
             
    def DelGameProfileContentGameIdUsername(self
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
             
    def DelGameProfileContentUsername(self
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
             
    def DelGameProfileContentGameIdProfileIdPath(self
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
             
    def DelGameProfileContentGameIdProfileIdPathVersion(self
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
             
    def DelGameProfileContentGameIdProfileIdPathVersionPlatformIncrement(self
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
             
    def DelGameProfileContentGameIdUsernamePath(self
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
             
    def DelGameProfileContentGameIdUsernamePathVersion(self
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
             
    def DelGameProfileContentGameIdUsernamePathVersionPlatformIncrement(self
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

    def GetGameProfileContentListUuid(self
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

    def GetGameProfileContentListGameIdProfileId(self
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

    def GetGameProfileContentListGameIdUsername(self
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

    def GetGameProfileContentListUsername(self
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

    def GetGameProfileContentListGameIdProfileIdPath(self
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

    def GetGameProfileContentListGameIdProfileIdPathVersion(self
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

    def GetGameProfileContentListGameIdProfileIdPathVersionPlatformIncrement(self
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

    def GetGameProfileContentListGameIdUsernamePath(self
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

    def GetGameProfileContentListGameIdUsernamePathVersion(self
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

    def GetGameProfileContentListGameIdUsernamePathVersionPlatformIncrement(self
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
            
    def CountGameAppUuid(self
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
            
    def CountGameAppGameId(self
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
            
    def CountGameAppAppId(self
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
            
    def CountGameAppGameIdAppId(self
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
            
    def BrowseGameAppListFilter(self, filter_obj) :
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

    def SetGameAppUuid(self, set_type, obj) :
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

    def DelGameAppUuid(self
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

    def GetGameAppListUuid(self
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

    def GetGameAppListGameId(self
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

    def GetGameAppListAppId(self
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

    def GetGameAppListGameIdAppId(self
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
            
    def CountProfileGameLocationUuid(self
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
            
    def CountProfileGameLocationGameLocationId(self
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
            
    def CountProfileGameLocationProfileId(self
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
            
    def CountProfileGameLocationProfileIdGameLocationId(self
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
            
    def BrowseProfileGameLocationListFilter(self, filter_obj) :
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

    def SetProfileGameLocationUuid(self, set_type, obj) :
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

    def DelProfileGameLocationUuid(self
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

    def GetProfileGameLocationListUuid(self
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

    def GetProfileGameLocationListGameLocationId(self
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

    def GetProfileGameLocationListProfileId(self
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

    def GetProfileGameLocationListProfileIdGameLocationId(self
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
            
    def CountGamePhotoUuid(self
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
            
    def CountGamePhotoExternalId(self
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
            
    def CountGamePhotoUrl(self
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
            
    def CountGamePhotoUrlExternalId(self
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
            
    def CountGamePhotoUuidExternalId(self
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
            
    def BrowseGamePhotoListFilter(self, filter_obj) :
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

    def SetGamePhotoUuid(self, set_type, obj) :
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

    def SetGamePhotoExternalId(self, set_type, obj) :
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

    def SetGamePhotoUrl(self, set_type, obj) :
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

    def SetGamePhotoUrlExternalId(self, set_type, obj) :
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

    def SetGamePhotoUuidExternalId(self, set_type, obj) :
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

    def DelGamePhotoUuid(self
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
             
    def DelGamePhotoExternalId(self
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
             
    def DelGamePhotoUrl(self
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
             
    def DelGamePhotoUrlExternalId(self
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
             
    def DelGamePhotoUuidExternalId(self
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

    def GetGamePhotoListUuid(self
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

    def GetGamePhotoListExternalId(self
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

    def GetGamePhotoListUrl(self
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

    def GetGamePhotoListUrlExternalId(self
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

    def GetGamePhotoListUuidExternalId(self
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
            
    def CountGameVideoUuid(self
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
            
    def CountGameVideoExternalId(self
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
            
    def CountGameVideoUrl(self
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
            
    def CountGameVideoUrlExternalId(self
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
            
    def CountGameVideoUuidExternalId(self
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
            
    def BrowseGameVideoListFilter(self, filter_obj) :
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

    def SetGameVideoUuid(self, set_type, obj) :
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

    def SetGameVideoExternalId(self, set_type, obj) :
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

    def SetGameVideoUrl(self, set_type, obj) :
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

    def SetGameVideoUrlExternalId(self, set_type, obj) :
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

    def SetGameVideoUuidExternalId(self, set_type, obj) :
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

    def DelGameVideoUuid(self
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
             
    def DelGameVideoExternalId(self
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
             
    def DelGameVideoUrl(self
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
             
    def DelGameVideoUrlExternalId(self
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
             
    def DelGameVideoUuidExternalId(self
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

    def GetGameVideoListUuid(self
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

    def GetGameVideoListExternalId(self
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

    def GetGameVideoListUrl(self
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

    def GetGameVideoListUrlExternalId(self
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

    def GetGameVideoListUuidExternalId(self
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
            
    def CountGameRpgItemWeaponUuid(self
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
            
    def CountGameRpgItemWeaponGameId(self
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
            
    def CountGameRpgItemWeaponUrl(self
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
            
    def CountGameRpgItemWeaponUrlGameId(self
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
            
    def CountGameRpgItemWeaponUuidGameId(self
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
            
    def BrowseGameRpgItemWeaponListFilter(self, filter_obj) :
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

    def SetGameRpgItemWeaponUuid(self, set_type, obj) :
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

    def SetGameRpgItemWeaponGameId(self, set_type, obj) :
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

    def SetGameRpgItemWeaponUrl(self, set_type, obj) :
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

    def SetGameRpgItemWeaponUrlGameId(self, set_type, obj) :
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

    def SetGameRpgItemWeaponUuidGameId(self, set_type, obj) :
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

    def DelGameRpgItemWeaponUuid(self
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
             
    def DelGameRpgItemWeaponGameId(self
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
             
    def DelGameRpgItemWeaponUrl(self
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
             
    def DelGameRpgItemWeaponUrlGameId(self
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
             
    def DelGameRpgItemWeaponUuidGameId(self
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

    def GetGameRpgItemWeaponListUuid(self
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

    def GetGameRpgItemWeaponListGameId(self
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

    def GetGameRpgItemWeaponListUrl(self
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

    def GetGameRpgItemWeaponListUrlGameId(self
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

    def GetGameRpgItemWeaponListUuidGameId(self
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
            
    def CountGameRpgItemSkillUuid(self
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
            
    def CountGameRpgItemSkillGameId(self
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
            
    def CountGameRpgItemSkillUrl(self
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
            
    def CountGameRpgItemSkillUrlGameId(self
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
            
    def CountGameRpgItemSkillUuidGameId(self
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
            
    def BrowseGameRpgItemSkillListFilter(self, filter_obj) :
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

    def SetGameRpgItemSkillUuid(self, set_type, obj) :
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

    def SetGameRpgItemSkillGameId(self, set_type, obj) :
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

    def SetGameRpgItemSkillUrl(self, set_type, obj) :
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

    def SetGameRpgItemSkillUrlGameId(self, set_type, obj) :
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

    def SetGameRpgItemSkillUuidGameId(self, set_type, obj) :
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

    def DelGameRpgItemSkillUuid(self
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
             
    def DelGameRpgItemSkillGameId(self
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
             
    def DelGameRpgItemSkillUrl(self
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
             
    def DelGameRpgItemSkillUrlGameId(self
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
             
    def DelGameRpgItemSkillUuidGameId(self
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

    def GetGameRpgItemSkillListUuid(self
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

    def GetGameRpgItemSkillListGameId(self
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

    def GetGameRpgItemSkillListUrl(self
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

    def GetGameRpgItemSkillListUrlGameId(self
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

    def GetGameRpgItemSkillListUuidGameId(self
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
            
    def CountGameProductUuid(self
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
            
    def CountGameProductGameId(self
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
            
    def CountGameProductUrl(self
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
            
    def CountGameProductUrlGameId(self
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
            
    def CountGameProductUuidGameId(self
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
            
    def BrowseGameProductListFilter(self, filter_obj) :
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

    def SetGameProductUuid(self, set_type, obj) :
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

    def SetGameProductGameId(self, set_type, obj) :
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

    def SetGameProductUrl(self, set_type, obj) :
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

    def SetGameProductUrlGameId(self, set_type, obj) :
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

    def SetGameProductUuidGameId(self, set_type, obj) :
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

    def DelGameProductUuid(self
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
             
    def DelGameProductGameId(self
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
             
    def DelGameProductUrl(self
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
             
    def DelGameProductUrlGameId(self
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
             
    def DelGameProductUuidGameId(self
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

    def GetGameProductListUuid(self
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

    def GetGameProductListGameId(self
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

    def GetGameProductListUrl(self
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

    def GetGameProductListUrlGameId(self
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

    def GetGameProductListUuidGameId(self
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
            
    def CountGameStatisticLeaderboardUuid(self
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
            
    def CountGameStatisticLeaderboardGameId(self
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
            
    def CountGameStatisticLeaderboardCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_code_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_code_game_id_profile_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_count_code_game_id_profile_id_ti"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardProfileIdGameId(self
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
            
    def BrowseGameStatisticLeaderboardListFilter(self, filter_obj) :
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

    def SetGameStatisticLeaderboardUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
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

    def SetGameStatisticLeaderboardUuidProfileIdGameIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
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

    def SetGameStatisticLeaderboardCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardCodeGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_set_code_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardCodeGameIdProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_set_code_game_id_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_set_code_game_id_profile_id_time"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameStatisticLeaderboardUuid(self
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
             
    def DelGameStatisticLeaderboardCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_del_code_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_del_code_game_id_profile_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_del_code_game_id_profile_id_time"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardProfileIdGameId(self
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

    def GetGameStatisticLeaderboardListUuid(self
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

    def GetGameStatisticLeaderboardListGameId(self
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

    def GetGameStatisticLeaderboardListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListCodeGameId(self
        , code
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_code_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_code_game_id_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_get_code_game_id_profile_id_time"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardListProfileIdGameId(self
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

    def GetGameStatisticLeaderboardListProfileIdGameIdTimestamp(self
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

    def CountGameStatisticLeaderboardItem(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardItemUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardItemGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardItemCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardItemCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_count_code_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardItemCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_count_code_game_id_profile_"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_count_code_game_id_profile_"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardItemProfileIdGameId(self
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
            , "usp_game_statistic_leaderboard_item_count_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameStatisticLeaderboardItemListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameStatisticLeaderboardItemUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardItemUuidProfileIdGameIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_set_uuid_profile_id_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardItemCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardItemCodeGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_set_code_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardItemCodeGameIdProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_set_code_game_id_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_set_code_game_id_profile_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameStatisticLeaderboardItemUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardItemCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardItemCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_del_code_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardItemCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_del_code_game_id_profile_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardItemCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_del_code_game_id_profile_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardItemProfileIdGameId(self
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
            , "usp_game_statistic_leaderboard_item_del_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameStatisticLeaderboardItemList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardItemListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardItemListGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardItemListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardItemListCodeGameId(self
        , code
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_get_code_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardItemListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_get_code_game_id_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardItemListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_item_get_code_game_id_profile_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardItemListProfileIdGameId(self
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
            , "usp_game_statistic_leaderboard_item_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardItemListProfileIdGameIdTimestamp(self
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
            , "usp_game_statistic_leaderboard_item_get_profile_id_game_id_time"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameStatisticLeaderboardRollup(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardRollupUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardRollupGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardRollupCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardRollupCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_count_code_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardRollupCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_count_code_game_id_profil"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_count_code_game_id_profil"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticLeaderboardRollupProfileIdGameId(self
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
            , "usp_game_statistic_leaderboard_rollup_count_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameStatisticLeaderboardRollupListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameStatisticLeaderboardRollupUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardRollupUuidProfileIdGameIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_set_uuid_profile_id_game_"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardRollupCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_set_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardRollupCodeGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_set_code_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardRollupCodeGameIdProfileId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_set_code_game_id_profile_"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.rank) #"in_rank"
        parameters.append(obj.rank_change) #"in_rank_change"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.rank_total_count) #"in_rank_total_count"
        parameters.append(obj.absolute_value) #"in_absolute_value"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.network) #"in_network"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_set_code_game_id_profile_"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameStatisticLeaderboardRollupUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardRollupCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_del_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardRollupCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_del_code_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardRollupCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_del_code_game_id_profile_"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardRollupCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_del_code_game_id_profile_"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameStatisticLeaderboardRollupProfileIdGameId(self
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
            , "usp_game_statistic_leaderboard_rollup_del_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameStatisticLeaderboardRollupList(self
    ) :
            
        parameters = []
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_get"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardRollupListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardRollupListGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardRollupListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardRollupListCodeGameId(self
        , code
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_get_code_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardRollupListCodeGameIdProfileId(self
        , code
        , game_id
        , profile_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_get_code_game_id_profile_"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardRollupListCodeGameIdProfileIdTimestamp(self
        , code
        , game_id
        , profile_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_leaderboard_rollup_get_code_game_id_profile_"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardRollupListProfileIdGameId(self
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
            , "usp_game_statistic_leaderboard_rollup_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameStatisticLeaderboardRollupListProfileIdGameIdTimestamp(self
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
            , "usp_game_statistic_leaderboard_rollup_get_profile_id_game_id_ti"
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
            
    def CountGameLiveQueueUuid(self
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
            
    def CountGameLiveQueueProfileIdGameId(self
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
            
    def BrowseGameLiveQueueListFilter(self, filter_obj) :
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

    def SetGameLiveQueueUuid(self, set_type, obj) :
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

    def SetGameLiveQueueProfileIdGameId(self, set_type, obj) :
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

    def DelGameLiveQueueUuid(self
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
             
    def DelGameLiveQueueProfileIdGameId(self
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

    def GetGameLiveQueueListUuid(self
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

    def GetGameLiveQueueListGameId(self
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

    def GetGameLiveQueueListProfileIdGameId(self
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
            
    def CountGameLiveRecentQueueUuid(self
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
            
    def CountGameLiveRecentQueueProfileIdGameId(self
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
            
    def BrowseGameLiveRecentQueueListFilter(self, filter_obj) :
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

    def SetGameLiveRecentQueueUuid(self, set_type, obj) :
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

    def SetGameLiveRecentQueueProfileIdGameId(self, set_type, obj) :
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

    def DelGameLiveRecentQueueUuid(self
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
             
    def DelGameLiveRecentQueueProfileIdGameId(self
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

    def GetGameLiveRecentQueueListUuid(self
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

    def GetGameLiveRecentQueueListGameId(self
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

    def GetGameLiveRecentQueueListProfileIdGameId(self
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
            
    def CountGameProfileStatisticUuid(self
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
            
    def CountGameProfileStatisticCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticGameId(self
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
            
    def CountGameProfileStatisticCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_code_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticProfileIdGameId(self
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
            
    def CountGameProfileStatisticCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_code_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_count_code_profile_id_game_id_timest"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameProfileStatisticListFilter(self, filter_obj) :
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

    def SetGameProfileStatisticUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
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

    def SetGameProfileStatisticUuidProfileIdGameIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
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

    def SetGameProfileStatisticProfileIdCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_set_profile_id_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticProfileIdCodeTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_set_profile_id_code_timestamp"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticCodeProfileIdGameIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_set_code_profile_id_game_id_timestam"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticCodeProfileIdGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_set_code_profile_id_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameProfileStatisticUuid(self
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
             
    def DelGameProfileStatisticCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_del_code_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileStatisticProfileIdGameId(self
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
             
    def DelGameProfileStatisticCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_del_code_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameProfileStatisticListUuid(self
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

    def GetGameProfileStatisticListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticListGameId(self
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

    def GetGameProfileStatisticListCodeGameId(self
        , code
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_code_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticListProfileIdGameId(self
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

    def GetGameProfileStatisticListProfileIdGameIdTimestamp(self
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

    def GetGameProfileStatisticListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_code_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_get_code_profile_id_game_id_timestam"
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
            
    def CountGameStatisticMetaUuid(self
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
            
    def CountGameStatisticMetaCode(self
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
            
    def CountGameStatisticMetaCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_count_code_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameStatisticMetaName(self
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
            
    def CountGameStatisticMetaGameId(self
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
            
    def BrowseGameStatisticMetaListFilter(self, filter_obj) :
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

    def SetGameStatisticMetaUuid(self, set_type, obj) :
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
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.store_count) #"in_store_count"
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

    def SetGameStatisticMetaCodeGameId(self, set_type, obj) :
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
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.store_count) #"in_store_count"
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
            , "usp_game_statistic_meta_set_code_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameStatisticMetaUuid(self
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
             
    def DelGameStatisticMetaCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_del_code_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameStatisticMetaListUuid(self
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

    def GetGameStatisticMetaListCode(self
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

    def GetGameStatisticMetaListName(self
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

    def GetGameStatisticMetaListGameId(self
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

    def GetGameStatisticMetaListCodeGameId(self
        , code
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_statistic_meta_get_code_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def CountGameProfileStatisticItem(self
    ) :
        parameters = []
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_count"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticItemUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_count_uuid"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticItemCode(self
        , code
    ) :
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_count_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticItemGameId(self
        , game_id
    ) :
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_count_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticItemCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_count_code_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticItemProfileIdGameId(self
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
            , "usp_game_profile_statistic_item_count_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticItemCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_count_code_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileStatisticItemCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_count_code_profile_id_game_id_t"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameProfileStatisticItemListFilter(self, filter_obj) :
        parameters = []
            
        parameters.append(filter_obj.page) #"in_page"
        parameters.append(filter_obj.page_size) #"in_page_size"
        parameters.append(filter_obj.sort) #"in_sort"
        parameters.append(filter_obj.filter) #"in_filter"
                                    
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_browse_filter"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass

    def SetGameProfileStatisticItemUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_set_uuid"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticItemUuidProfileIdGameIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_set_uuid_profile_id_game_id_tim"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticItemProfileIdCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_set_profile_id_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticItemProfileIdCodeTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_set_profile_id_code_timestamp"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticItemCodeProfileIdGameIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_set_code_profile_id_game_id_tim"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileStatisticItemCodeProfileIdGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.stat_value_formatted) #"in_stat_value_formatted"
        parameters.append(obj.profile_id) #"in_profile_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.data) #"in_data"
        parameters.append(obj.stat_value) #"in_stat_value"
        parameters.append(obj.uuid) #"in_uuid"
        parameters.append(obj.date_modified) #"in_date_modified"
        parameters.append(obj.level) #"in_level"
        parameters.append(obj.points) #"in_points"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.type) #"in_type"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_set_code_profile_id_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameProfileStatisticItemUuid(self
        , uuid
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_del_uuid"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileStatisticItemCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_del_code_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileStatisticItemProfileIdGameId(self
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
            , "usp_game_profile_statistic_item_del_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileStatisticItemCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_del_code_profile_id_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameProfileStatisticItemListUuid(self
        , uuid
    ) :
            
        parameters = []
        parameters.append(uuid) #"in_uuid"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_get_uuid"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticItemListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticItemListGameId(self
        , game_id
    ) :
            
        parameters = []
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_get_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticItemListCodeGameId(self
        , code
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_get_code_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticItemListProfileIdGameId(self
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
            , "usp_game_profile_statistic_item_get_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticItemListProfileIdGameIdTimestamp(self
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
            , "usp_game_profile_statistic_item_get_profile_id_game_id_timestam"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticItemListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_get_code_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileStatisticItemListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_statistic_item_get_code_profile_id_game_id_tim"
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
            
    def CountGameKeyMetaUuid(self
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
            
    def CountGameKeyMetaCode(self
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
            
    def CountGameKeyMetaCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_count_code_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameKeyMetaName(self
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
            
    def CountGameKeyMetaKey(self
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
            
    def CountGameKeyMetaGameId(self
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
            
    def CountGameKeyMetaKeyGameId(self
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
            
    def BrowseGameKeyMetaListFilter(self, filter_obj) :
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

    def SetGameKeyMetaUuid(self, set_type, obj) :
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

    def SetGameKeyMetaCodeGameId(self, set_type, obj) :
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
            , "usp_game_key_meta_set_code_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameKeyMetaKeyGameId(self, set_type, obj) :
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

    def SetGameKeyMetaKeyGameIdLevel(self, set_type, obj) :
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

    def DelGameKeyMetaUuid(self
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
             
    def DelGameKeyMetaCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_del_code_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameKeyMetaKeyGameId(self
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
             
    def GetGameKeyMetaListUuid(self
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

    def GetGameKeyMetaListCode(self
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

    def GetGameKeyMetaListCodeGameId(self
        , code
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_key_meta_get_code_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameKeyMetaListName(self
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

    def GetGameKeyMetaListKey(self
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

    def GetGameKeyMetaListGameId(self
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

    def GetGameKeyMetaListKeyGameId(self
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

    def GetGameKeyMetaListCodeLevel(self
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
            
    def CountGameLevelUuid(self
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
            
    def CountGameLevelCode(self
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
            
    def CountGameLevelCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_count_code_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameLevelName(self
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
            
    def CountGameLevelGameId(self
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
            
    def BrowseGameLevelListFilter(self, filter_obj) :
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

    def SetGameLevelUuid(self, set_type, obj) :
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

    def SetGameLevelCodeGameId(self, set_type, obj) :
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
            , "usp_game_level_set_code_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameLevelUuid(self
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
             
    def DelGameLevelCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_del_code_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameLevelListUuid(self
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

    def GetGameLevelListCode(self
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

    def GetGameLevelListCodeGameId(self
        , code
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_level_get_code_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameLevelListName(self
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

    def GetGameLevelListGameId(self
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
            
    def CountGameProfileAchievementUuid(self
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
            
    def CountGameProfileAchievementProfileIdCode(self
        , profile_id
        , code
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_count_profile_id_code"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileAchievementUsername(self
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
            
    def CountGameProfileAchievementCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_count_code_profile_id_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameProfileAchievementCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_count_code_profile_id_game_id_time"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def BrowseGameProfileAchievementListFilter(self, filter_obj) :
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

    def SetGameProfileAchievementUuid(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.completed) #"in_completed"
        parameters.append(obj.profile_id) #"in_profile_id"
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

    def SetGameProfileAchievementUuidCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.completed) #"in_completed"
        parameters.append(obj.profile_id) #"in_profile_id"
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
            , "usp_game_profile_achievement_set_uuid_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileAchievementProfileIdCode(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.completed) #"in_completed"
        parameters.append(obj.profile_id) #"in_profile_id"
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
            , "usp_game_profile_achievement_set_profile_id_code"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileAchievementCodeProfileIdGameId(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.completed) #"in_completed"
        parameters.append(obj.profile_id) #"in_profile_id"
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
            , "usp_game_profile_achievement_set_code_profile_id_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def SetGameProfileAchievementCodeProfileIdGameIdTimestamp(self, set_type, obj) :
        parameters = []
        parameters.append(set_type) #"in_set_type"
        parameters.append(obj.status) #"in_status"
        parameters.append(obj.username) #"in_username"
        parameters.append(obj.code) #"in_code"
        parameters.append(obj.timestamp) #"in_timestamp"
        parameters.append(obj.completed) #"in_completed"
        parameters.append(obj.profile_id) #"in_profile_id"
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
            , "usp_game_profile_achievement_set_code_profile_id_game_id_timest"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameProfileAchievementUuid(self
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
             
    def DelGameProfileAchievementProfileIdCode(self
        , profile_id
        , code
    ) :
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_del_profile_id_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def DelGameProfileAchievementUuidCode(self
        , uuid
        , code
    ) :
        parameters = []
        parameters.append(uuid) #"in_uuid"
        parameters.append(code) #"in_code"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_del_uuid_code"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameProfileAchievementListUuid(self
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

    def GetGameProfileAchievementListProfileIdCode(self
        , profile_id
        , code
    ) :
            
        parameters = []
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_profile_id_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListUsername(self
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

    def GetGameProfileAchievementListCode(self
        , code
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_code"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListGameId(self
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

    def GetGameProfileAchievementListCodeGameId(self
        , code
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_code_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListProfileIdGameId(self
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

    def GetGameProfileAchievementListProfileIdGameIdTimestamp(self
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

    def GetGameProfileAchievementListCodeProfileIdGameId(self
        , code
        , profile_id
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_code_profile_id_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameProfileAchievementListCodeProfileIdGameIdTimestamp(self
        , code
        , profile_id
        , game_id
        , timestamp
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(profile_id) #"in_profile_id"
        parameters.append(game_id) #"in_game_id"
        parameters.append(timestamp) #"in_timestamp"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_profile_achievement_get_code_profile_id_game_id_timest"
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
            
    def CountGameAchievementMetaUuid(self
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
            
    def CountGameAchievementMetaCode(self
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
            
    def CountGameAchievementMetaCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_count_code_game_id"
            , parameters
            )
        except Exception as err: 
            print err
            return 0
        finally :
            pass
            
    def CountGameAchievementMetaName(self
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
            
    def CountGameAchievementMetaGameId(self
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
            
    def BrowseGameAchievementMetaListFilter(self, filter_obj) :
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

    def SetGameAchievementMetaUuid(self, set_type, obj) :
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
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.modifier) #"in_modifier"
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

    def SetGameAchievementMetaCodeGameId(self, set_type, obj) :
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
        parameters.append(obj.game_id) #"in_game_id"
        parameters.append(obj.active) #"in_active"
        parameters.append(obj.date_created) #"in_date_created"
        parameters.append(obj.modifier) #"in_modifier"
        parameters.append(obj.type) #"in_type"
        parameters.append(obj.leaderboard) #"in_leaderboard"
        parameters.append(obj.description) #"in_description"
                        
        try:
            return bool(self.data_provider.execute_scalar(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_set_code_game_id"
            , parameters
            ))
        except Exception: 
            pass
        finally :
            pass
                
        return False

    def DelGameAchievementMetaUuid(self
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
             
    def DelGameAchievementMetaCodeGameId(self
        , code
        , game_id
    ) :
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            self.data_provider.execute_no_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_del_code_game_id"
            , parameters
            )
            return True
        except Exception: 
            return False
        finally :
            pass
             
    def GetGameAchievementMetaListUuid(self
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

    def GetGameAchievementMetaListCode(self
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

    def GetGameAchievementMetaListCodeGameId(self
        , code
        , game_id
    ) :
            
        parameters = []
        parameters.append(code) #"in_code"
        parameters.append(game_id) #"in_game_id"
                        
        try:
            return self.data_provider.execute_results(
            self.connection_string
            , CommandType.StoredProcedure
            , "usp_game_achievement_meta_get_code_game_id"
            , parameters
            )
        except Exception: 
            pass
        finally :
            pass
                
        return None

    def GetGameAchievementMetaListName(self
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

    def GetGameAchievementMetaListGameId(self
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





